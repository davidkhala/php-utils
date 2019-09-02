<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once 'vendor/autoload.php';
require_once 'ResponseBody.php';

$app = AppFactory::create();


/*
 * The routing middleware should be added earlier than the ErrorMiddleware
 * Otherwise exceptions thrown from it will not be handled by the middleware
 */
$app->addRoutingMiddleware(); // required: Add Routing Middleware

// Define Custom Error Handler
$customErrorHandler = function (
	Request $request,
	Throwable $exception,
	bool $displayErrorDetails,
	bool $logErrors,
	bool $logErrorDetails
) use ($app) {
	if($logErrors){
		error_log($exception->__toString());
	}
	$response = $app->getResponseFactory()->createResponse();
	errorHandle($response, $exception->getMessage(), $exception->getCode());// TODO how to specify a type
	return $response;
};

/*
 * @param bool $displayErrorDetails -> Should be set to false in production
 * @param bool $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool $logErrorDetails -> Display error details in error log
 * which can be replaced by a callable of your choice.

 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$errorMiddleware = $app->addErrorMiddleware(true, true, true); // TODO: not to use html page as error display format

$errorMiddleware->setDefaultErrorHandler($customErrorHandler);


$app->get('/', function (Request $request, Response $response, $args) {
	$response->getBody()->write("pong from network-middleware");
	return $response;
});
// Note: $app in the scope is accessible in another file
require_once 'API/user.php';
require_once 'dba.php';

$app->run();

