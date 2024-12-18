<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use RedBeanPHP\R as R;
require_once 'dbc.php';

$app->any('/{dbname}', function (Request $request, Response $response, $args) {
	$httpMethod = $request->getMethod();

	$dbname = $args['dbname'];

	$db = newDBConnection($dbname);

	switch ($httpMethod) {
		case 'GET':
			$listOfTables = R::inspect();
			$message = json_encode($listOfTables);
			break;
		case 'POST':
			$AffectedRows = $db->Execute("CREATE DATABASE IF NOT EXISTS `$dbname` DEFAULT CHARACTER SET utf8;");
			$message = $AffectedRows;
			break;
		case 'DELETE':
			//			TODO access control here
			$AffectedRows = $db->Execute("DROP DATABASE `$dbname`;");
			$message = $AffectedRows;
			break;
		default:
			return unsupportedHttpMethodError($response);
	}
	closeDBConnection();
	return successHandle($response, $message);
});

$app->any('/{dbname}/{tableName}', function (Request $request, Response $response, $args) {
	$httpMethod = $request->getMethod();
	$dbname = $args['dbname'];
	$table = $args['tableName'];

	$db = newDBConnection($dbname);
	switch ($httpMethod) {
		//	http POST is not allowed since it required column data structure
		case 'GET':
			$columns = R::inspect($table);
			$message = json_encode($columns);
			break;
		case 'DELETE':
			//			TODO access control here
			$AffectedRows = $db->Execute("DROP TABLE `$dbname`.`$table`;"); // TODO only for mysql dialect
			$message = $AffectedRows;
			break;
		default:
			return unsupportedHttpMethodError($response);
	}

	closeDBConnection();
	return successHandle($response, $message);

});