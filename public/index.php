<?php

/**
 * Prepare and execute the application.
 * 
 * @author Benjamin Moss <ben@yubit.social>
 * 
 * Date: 26/05/23
 */

declare(strict_types = 1);

use DI\ContainerBuilder;
use Slim\ResponseEmitter;
use Slim\Factory\AppFactory;
use App\Core\Handler\HttpErrorHandler;
use App\Support\Settings\SettingsInterface;
use Slim\Factory\ServerRequestCreatorFactory;

require __DIR__ . '/../vendor/autoload.php';

$cb = new ContainerBuilder();

$settings = require __DIR__ . '/../app/settings.php';
$settings($cb);

$dependencies = require __DIR__ . '/../app/dependencies.php';
$dependencies($cb);

$c = $cb->build();

AppFactory::setContainer($c);
$app = AppFactory::create();
$callableResolver = $app->getCallableResolver();

$middleware = require __DIR__ . '/../app/middleware.php';
$middleware($app);

$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

$settings = $c->get(SettingsInterface::class);

$serverRequestCreator = ServerRequestCreatorFactory::create();
$request = $serverRequestCreator->createServerRequestFromGlobals();

$responseFactory = $app->getResponseFactory();
$errorHandler = new HttpErrorHandler($callableResolver, $responseFactory);

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(
    (bool) $settings->get('displayErrorDetails'), 
    (bool) $settings->get('logError'), 
    (bool) $settings->get('logErrorDetails')
);
$errorMiddleware->setDefaultErrorHandler($errorHandler);

$response = $app->handle($request);
$responseEmitter = new ResponseEmitter();
$responseEmitter->emit($response);