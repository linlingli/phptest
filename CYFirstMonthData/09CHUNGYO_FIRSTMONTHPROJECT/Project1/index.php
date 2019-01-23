<?php
session_start();

//用以顯示首頁是否已經有登入
$CustomerNickName = $_SESSION["MemberNickName"];


//開啟資料庫
include("OpenSQL.php");
mysqli_close($connect_DB);
?>


<html>
<head>
   <?php require("HTML_Effect/Header.php") ;?> 
</head>    
<body>
    <?php require("HTML_Effect/Bootstrap.php"); ?>

    <div class="jumbotron">
        <div class="container">
            <!--判定顯示的歡迎字樣為何-->
            <?php if(!isset($_SESSION["MemberNickName"])): ?>
                <h1 align="center">歡迎！訪客！</h1>
            <?php else: ?>
            <h1 align="center">歡迎！<?php echo "$CustomerNickName"?>！</h1>
            <?php endif; ?>
        </div>
    </div>

    <?php require("HTML_Effect/DiscussBoard.php"); ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>