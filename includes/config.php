<?php
ob_start(); // turn on output buffering / waits until all php code is executed.

session_start(); // starts the session // saving data , values in browsers / used to check if user is logged in or not
print_r($_SESSION);
date_default_timezone_set("Asia/Kolkata"); // Setting indian time zone.

try {
    $con = new PDO("mysql:dbname=php_netflix_db;host=localhost", "root", ""); // PHP data objects used to connect to database
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // setting error reporting 
} catch (PDOException $e) {
    exit("Connection failed : " . $e->getMessage());
}
