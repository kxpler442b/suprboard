<?php

declare(strict_types = 1);

use Monolog\Logger;
use DI\ContainerBuilder;
use App\Support\Settings\Settings;
use App\Support\Settings\SettingsInterface;

return function(ContainerBuilder $cb)
{
    $cb->addDefinitions([

        SettingsInterface::class => function() {
            return new Settings([
                'displayErrorDetails' => true,
                'logError' => false,
                'logErrorDetails' => false,
                'wsdl' => 'https://m2mconnect.ee.co.uk/orange-soap/services/MessageServiceByCountry?wsdl',
                'm2mconnect' => [
                    'username' => $_ENV['M2M_USERNAME'],
                    'password' => $_ENV['M2M_PASSWORD'],
                    'msisdn' => $_ENV['M2M_MSISDN'],
                    'countryCode' => $_ENV['M2M_COUNTRYCODE'],
                    'deliveryReport' => false,
                    'mtBearer' => $_ENV['M2M_MTBEARER']
                ],
                'doctrine' => [
                    'dev_mode' => true,
                    'cache_dir' => __DIR__ . '/../cache/doctrine',
                    'entity_dir' => [__DIR__ . '/../src/Domain'],
                    'connection' => [
                        'driver' => 'pdo_mysql',
                        'host' => $_ENV['DB_HOST'],
                        'port' => $_ENV['DB_PORT'],
                        'dbname' => $_ENV['DB_NAME'],
                        'user' => $_ENV['DB_USER'],
                        'password' => $_ENV['DB_PASS']
                    ]
                ],
                'twig' => [
                    'debug' => true,
                    'cache' => __DIR__ . '/../cache/twig',
                    'auto_reload' => true,
                    'templates' => __DIR__ . '/../templates'
                ],
                'logger' => [
                    'name' => 'suprboard',
                    'path' => isset($_ENV['DOCKER']) ? 'php://stdout' : __DIR__ . '/../logs/suprboard.log',
                    'level' => Logger::DEBUG
                ]
            ]);
        }

    ]);
};