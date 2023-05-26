<?php

declare(strict_types = 1);

use Monolog\Logger;
use Slim\Views\Twig;
use DI\ContainerBuilder;
use Doctrine\ORM\ORMSetup;
use Psr\Log\LoggerInterface;
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
            $doctrineSettings = $settings->get('doctrine');

            $ormConfig = ORMSetup::createAttributeMetadataConfiguration(
                $doctrineSettings['entity_dir'],
                $doctrineSettings['dev_mode']
            );
        
            $conn = DriverManager::getConnection($doctrineSettings['connection']);

            return new EntityManager($conn, $ormConfig);
        },
        Twig::class => function(ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $twigSettings = $settings->get('twig');
            $twigDebug = $twigSettings['debug'];
            $twigCache = $twigSettings['cache'];
            $twigAutoReload = $twigSettings['auto_reload'];

            $twig = Twig::create($twigSettings['templates'], [
                'debug' => $twigDebug,
                'cache' => $twigCache,
                'auto_reload' => $twigAutoReload
            ]);

            $twig->addExtension(new DebugExtension);

            return $twig;
        },
        LoggerInterface::class => function(ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);
            $loggerSettings = $settings->get('logger');

            $logger = new Logger($loggerSettings['name']);
            
            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        }
    ]);
};