<html>
<head>
   <meta charset="UTF-8">
    <title>休閒討論區-會員專區</title>
    <?php require("Views/Script_css.php") ?>
</head>    
<body>
    <?php include("Views/Header.php"); ?>

    <div class="jumbotron">
        <div class="container">
                <h1>這裡是會員專區 <?php echo $Data -> Name; ?></h1>
        </div>
    </div>

    <?php include("Views/DiscussBoard.php"); ?>

    <script src="/Project3/js/jquery.js"></script>
    <script src="/Project3/js/bootstrap.min.js"></script>
</body>
</html>