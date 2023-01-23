<?php
session_start();
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "spotlight", 3306);
define("UPLOAD_DIR", "./upload/")
?>