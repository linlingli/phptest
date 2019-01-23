<?php
$connect_DB = @mysqli_connect("localhost","root","") or die(mysqli_connect_error());
$setUtf8    = mysqli_query($connect_DB, "set names utf8");
$use_DB     = mysqli_query($connect_DB, "use Subject");
?>


