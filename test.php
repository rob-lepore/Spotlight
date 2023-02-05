<?php



require_once("bootstrap.php");
$templateParams["title"] = "Spotlight - Test";
$templateParams["header"] = "Prova";

$trackId = "0yLdNVWF3Srea0uzk55zFn";
require("fetchTrackData.php");

require("template/base.php")

?>