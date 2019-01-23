<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
            $errorNum = $_GET["errNum"];
            //test $_GET
            // if(isset($_GET["errNum"])){
            //     echo $errorNum . ", Oh Yeah! <hr>";
            // }
            // else{
            //     echo $errorNum . ", Oh No! <hr>";
            // }
            echo "此程式於 i = " . $errorNum . " 時發生了錯誤！請檢察程式碼並修改錯誤。";
        ?>
    </body>
</html>

