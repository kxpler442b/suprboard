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
                'logError' => true,
                'logErrorDetails' => true,
                'base_url' => $_ENV['APP_BASE_URL'],
                'wsdl' => 'https://m2mconnect.ee.co.uk/orange-soap/services/MessageServiceByCountry?wsdl',
                'm2mconnect' => [
                    'username' => $_ENV['M2M_USERNAME'],
                    'password' => $_ENV['M2M_PASSWORD'],
                    'msisdn' => $_ENV['M2M_MSISDN'],
                    'countryCode' => $_ENV['M2M_COUNTRYCODE'],
                    'deliveryReport' => false,
                    'mtBearer' => $_ENV['M2M_MTBEARER']
                ],
                'auth0' => [
                    'client_id' => $_ENV['AUTH0_CLIENT_ID'],
                    'domain' => $_ENV['AUTH0_DOMAIN'],
                    'client_secret' => $_ENV['AUTH0_CLIENT_SECRET'],
                    'cookie_secret' => $_ENV['AUTH0_COOKIE_SECRET'],
                ],
                'doctrine' => [
                    'dev_mode' => true,
                    'cache_dir' => __DIR__ . '/../var/cache/doctrine',
                    'entity_dir' => [__DIR__ . '/../src/Domain'],
                    'connection' => [
                        'driver' => 'pdo_pgsql',
                        'host' => $_ENV['DB_HOST'],
                        'port' => $_ENV['DB_PORT'],
                        'dbname' => $_ENV['DB_NAME'],
                        'user' => $_ENV['DB_USER'],
                        'password' => $_ENV['DB_PASS']
                    ]
                ],
                'twig' => [
                    'debug' => true,
                    'cache' => __DIR__ . '/../var/cache/twig',
                    'auto_reload' => true,
                    'templates' => __DIR__ . '/../templates'
                ],
                'session' => [
                    'name' => 'suprboard-app',
                    'lifetime' => 7200,
                    'path' => null,
                    'domain' => null,
                    'secure' => false,
                    'httponly' => true,
                    'cache_limiter' => 'nocache',
                    'cookie_samesite' => 'Lax',
                    'cookie_secure' => false
                ],
                'passwordManager' => [
                    'memory_cost' => PASSWORD_ARGON2_DEFAULT_MEMORY_COST,
                    'time_cost' => PASSWORD_ARGON2_DEFAULT_TIME_COST,
                    'threads' => PASSWORD_ARGON2_DEFAULT_THREADS
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