<?php


use Psr\Http\Message\ResponseInterface as Response;

class ResponseBody
{
	public $errCode = 'success';
	public $message; // for Error
	public $type; // for Error
	public $data; // for Success
}

function successHandle(Response $response, String $data)
{
	$responseBody = new ResponseBody();
	$responseBody->data = $data;

	$response->getBody()->write(json_encode(get_object_vars($responseBody)));
	return $response;
}

function errorHandle(Response $response, String $message, $errCode = 'error', $type = 'unknown')
{
	if ($errCode == null) $errCode = 'error';
	if ($type == null) $type = 'unknown';
	$responseBody = new ResponseBody();
	$responseBody->message = $message;
	$responseBody->errCode = $errCode;
	$responseBody->type = $type;
	$response->getBody()->write(json_encode(get_object_vars($responseBody)));
	return $response;
}

function unsupportedHttpMethodError($response)
{
	return errorHandle($response, 'Unsupported http method', null, 'undefined');
}