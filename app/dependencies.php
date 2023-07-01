<?php

declare(strict_types = 1);

use App\M2M\M2M;
use App\Auth\Auth;
use Monolog\Logger;
use Slim\Views\Twig;
use App\M2M\SoapClient;
use DI\ContainerBuilder;
use Doctrine\ORM\ORMSetup;
use App\Auth\AuthInterface;
use Psr\Log\LoggerInterface;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use App\Support\Session\Session;
use Doctrine\DBAL\DriverManager;
use Monolog\Handler\StreamHandler;
use Twig\Extension\DebugExtension;
use App\M2M\Interface\M2MInterface;
use App\OAuth\OAuthProvider;
use App\OAuth\OAuthProviderInterface;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use App\Support\Session\SessionInterface;
use App\Support\Settings\SettingsInterface;
use League\OAuth2\Client\Provider\GenericProvider;

return function(ContainerBuilder $cb)
{
    $cb->addDefinitions([
        M2MInterface::class => function(ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $soap = new SoapClient($settings->get('wsdl'));

            return new M2M($soap, $settings->get('m2mconnect'));
        },
        EntityManager::class => function(ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            Type::addType('uuid', 'Ramsey\Uuid\Doctrine\UuidType');

            $entityDir = $settings->get('doctrine.entity_dir');

            $ormConfig = ORMSetup::createAttributeMetadataConfiguration(
                $entityDir,
                $settings->get('doctrine.dev_mode')
            );
        
            $conn = DriverManager::getConnection($settings->get('doctrine.connection'));

            return new EntityManager($conn, $ormConfig);
        },
        Twig::class => function(ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $twig = Twig::create($settings->get('twig.templates'), [
                'debug' => $settings->get('twig.debug'),
                'cache' => $settings->get('twig.cache'),
                'auto_reload' => $settings->get('twig.auto_reload')
            ]);

            $twig->addExtension(new DebugExtension);

            $twig->getEnvironment()->addGlobal('globals', [
                'base_url' => $settings->get('base_url'),
                'stylesheet' => implode('', [$settings->get('base_url'), '/css/app.css']),
                'images' => implode('', [$settings->get('base_url'), '/img'])
            ]);

            return $twig;
        },
        OAuthProviderInterface::class => function() {
            return new OAuthProvider([
                'clientId' => $_ENV['OAUTH_CLIENT_ID'],
                'clientSecret' => $_ENV['OAUTH_CLIENT_SECRET'],
                'redirectUri' => $_ENV['OAUTH_REDIRECT_URI'],
                'urlAuthorize' => $_ENV['OAUTH_URL_AUTHORIZE'],
                'urlAccessToken' => $_ENV['OAUTH_URL_TOKEN'],
                'urlResourceOwnerDetails' => $_ENV['OAUTH_URL_RESOURCE']
            ]);
        },
        SessionInterface::class => function(ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);
            $params = $settings->get('session');

            return new Session($params);
        },
        LoggerInterface::class => function(ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $logger = new Logger($settings->get('logger.name'));
            
            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($settings->get('logger.path'), $settings->get('logger.level'));
            $logger->pushHandler($handler);

            return $logger;
        }
    ]);
};