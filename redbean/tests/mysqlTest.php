<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use \RedBeanPHP\R as R;

// schema=test should exist in advance
$dbname = 'sys';
R::setup("mysql:host=localhost;dbname=$dbname", 'root', 'password');
$result = R::inspect();
print_r($result);

