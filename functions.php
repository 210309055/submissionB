<?php
//session start
session_start();

//connect to database

mysql_connect("localhost","Project","0000")or die("Database connection failed");
mysql_select_db("e-commerce")or die("Incorrect database selected");




?>