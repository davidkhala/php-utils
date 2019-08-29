<?php
echo "hello world";
require_once 'vendor/autoload.php';

use \RedBeanPHP\R as R;
R::setup( "mysql:dbname=dbname", 'root' );

$book = R::dispense("book");
//$book->author = "Santa Claus";
//$book->title = "Secrets of Christmas";
//$id = R::store( $book );
