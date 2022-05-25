<?php
header("Content-Type:text/html; charset=utf-8");
$serverName="LAPTOP-6OOQPQ9E\SQLEXPRESS";
$connectionInfo=array("Database"=>"workstudy_system","UID"=>"ulohg","PWD"=>"123456","CharacterSet" => "UTF-8");
$conn=sqlsrv_connect($serverName,$connectionInfo);
if(!$conn){
	echo "Connection failed!";
}        
?>