<?php
$username = "root";
$password = "1123";
$hostname = "localhost";

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
 or die("Unable to connect to MySQL");

 mysql_query("set names 'utf8'");   
//select a database to work with
$selected = mysql_select_db("epretest_estudio",$dbhandle)
  or die("Could not select examples");
?>