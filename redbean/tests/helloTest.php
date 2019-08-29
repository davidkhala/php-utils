<?php
require_once '../vendor/autoload.php';

use \RedBeanPHP\R as R;

// schema=test should exist in advance
$dbname = 'sys';
R::setup("mysql:host=localhost;dbname=$dbname", 'root', 'password');
$result = R::getDatabaseAdapter()->getDatabase()->GetAll('show tables;');
print_r($result);

