<?php

use RedBeanPHP\R as R;
const rootUser = 'root';
const rootPassword = "password";

function newDBConnection(String $dbname){
	R::setup("mysql:host=localhost;dbname=$dbname", rootUser, rootPassword);
	$db = R::getDatabaseAdapter()->getDatabase();
	return $db;
}
function closeDBConnection(){
	R::close();
}
