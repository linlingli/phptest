<?php
header("Content-Type:text/html; charset = utf-8");
require("Practice_Class11.php");
$obj = new People();
$obj -> setData("Leon", "Man", "27", "82", "167");

echo $obj -> str_Name . "的標準體重為：";
echo $obj -> computStandardWeight();
?>