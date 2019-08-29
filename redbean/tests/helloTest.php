<?php
require_once 'vendor/autoload.php';

use \RedBeanPHP\R as R;
// schema=test should exist in advance
R::setup( "mysql:host=localhost;dbname=test", 'root' ,'password');

$book = R::dispense("book");
$book->author = "Santa Claus";
$book->title = "Secrets of Christmas";
$id = R::store( $book );
