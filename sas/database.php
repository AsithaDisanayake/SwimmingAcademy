<?php 
function Connect(){
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'swimming_class';

    $connection = new mysqli('localhost', 'root', '', 'swimming_class') or die($connection->mysqli_connect_error);

    //checking the connection
    if (!$connection){
    	die('Database connection faild' . mysql_error());
    }
    	
    return $connection;
}

 ?>