<?php

$dbhost = "localhost";
$dbuser = "bascrum1_final";
$dbpass = "basccapstone";
$dbname = "bascrum1_final";

/*
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "final";
*/

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

