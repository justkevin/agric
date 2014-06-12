<?php
$host = 'localhost';
$username = 'root';
$password = 'sweeetmoyo';
$database = 'agric';

$connection = mysql_connect($host,$username,$password) or die(mysql_error());
mysql_select_db($database);

?>