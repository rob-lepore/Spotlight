<?php
require_once("db/database.php");
require_once("utils/functions.php");
sec_session_start();
$dbh = new DatabaseHelper("localhost", "root", "", "spotlight", 3307);
define("UPLOAD_DIR", "./upload/")
?>
