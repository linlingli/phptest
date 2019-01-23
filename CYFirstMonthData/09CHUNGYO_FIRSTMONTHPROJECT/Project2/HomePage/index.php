<html>
<head>
   <?php require("HTML_Effect/Header.php") ;?> 
</head>    
<body>
    <?php include("HTML_Effect/Bootstrap.php"); ?>

    <div class="jumbotron">
        <div class="container">
            <?php if(!isset($_SESSION["MemberNickName"])): ?>
                <h1 id="HomeTitle" >歡迎！訪客！</h1>
            <?php else: ?>
            <h1>歡迎！<?php echo "$CustomerNickName"?>！</h1>
            <?php endif; ?>
        </div>
    </div>

    <?php include("HTML_Effect/DiscussBoard.php"); ?>
    
    
    <input type="submit" name="test" id="test" value="test"/>
    
    <script>
        $("#test").click(function(){
            alert("Hello! I am an alert box!!");
        })
    </script>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>