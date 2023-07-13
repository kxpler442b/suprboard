<?php

declare(strict_types = 1);

use App\M2M\M2M;
use Monolog\Logger;
use Auth0\SDK\Auth0;
use Slim\Views\Twig;
use App\M2M\SoapClient;
use DI\ContainerBuilder;
use Doctrine\ORM\ORMSetup;
use Odan\Session\PhpSession;
use Psr\Log\LoggerInterface;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Monolog\Handler\StreamHandler;
use Odan\Session\SessionInterface;
use Twig\Extension\DebugExtension;
use App\M2M\Interface\M2MInterface;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Auth0\SDK\Contract\Auth0Interface;
use App\Support\Bouncer\PasswordManager;
use Doctrine\ORM\EntityManagerInterface;
use Odan\Session\SessionManagerInterface;
use App\Support\Settings\SettingsInterface;
use App\Support\Bouncer\PasswordManagerInterface;

return function(ContainerBuilder $cb)
{
    $cb->addDefinitions([
        M2MInterface::class => function(ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $soap = new SoapClient($settings->get('wsdl'));

            return new M2M($soap, $settings->get('m2mconnect'));
        },
        Auth0Interface::class => function(ContainerInterface $c) {
            $s = $c->get(SettingsInterface::class);

            return new Auth0([
                'domain' => $s->get('auth0.domain'),
                'clientId' => $s->get('auth0.client_id'),
                'clientSecret' => $s->get('auth0.client_secret'),
                'cookieSecret' => $s->get('auth0.cookie_secret')
            ]);
        },
        EntityManagerInterface::class => function(ContainerInterface $c) {
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
        PasswordManagerInterface::class => function(ContainerInterface $c) {
            $s = $c->get(SettingsInterface::class);

            return new PasswordManager($s->get('passwordManager'));
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
                'base_url' => $settings->get('base_url')
            ]);

            return $twig;
        },
        SessionManagerInterface::class => function(ContainerInterface $c)
        {
            return $c->get(SessionInterface::class);
        },
        SessionInterface::class => function(ContainerInterface $c)
        {
            $s = $c->get(SettingsInterface::class);
            $config = $s->get('session');

            return new PhpSession($config);
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