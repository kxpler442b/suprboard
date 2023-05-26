<?php

declare(strict_types = 1);

use Monolog\Logger;
use Slim\Views\Twig;
use DI\ContainerBuilder;
use Doctrine\ORM\ORMSetup;
use Psr\Log\LoggerInterface;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Monolog\Handler\StreamHandler;
use Twig\Extension\DebugExtension;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use App\Support\Settings\SettingsInterface;

return function(ContainerBuilder $cb)
{
    $cb->addDefinitions([
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

            return $twig;
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