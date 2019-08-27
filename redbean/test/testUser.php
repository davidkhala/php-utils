<?php
use \RedBeanPHP\R as R;

$book = R::dispense("book");
$book->author = "Santa Claus";
$book->title = "Secrets of Christmas";
$id = R::store( $book );
