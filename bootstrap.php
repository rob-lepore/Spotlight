<?php
session_start();
require_once("db/database.php");
require_once("utils/functions.php");
$dbh = new DatabaseHelper("localhost", "root", "", "spotlight", 3307);
define("UPLOAD_DIR", "./upload/")
?>