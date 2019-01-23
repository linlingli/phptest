<?php
session_start();
$write_Result = "";
$write_NickName = $_SESSION["MemberNickName"];

//按下我要發帖的按鈕時，判定是否已經先登入
if(isset($_GET["NotLogin"])){
    if($write_NickName == ""){
        header("Location:Login.php?YetLogin=1");    
    }
    else{
        $write_Type = base64_decode($_GET["NotLogin"]);
    }
}

//按下發出新帖按鈕時
if(isset($_POST["btnWrite"])){

    date_default_timezone_set("Asia/Shanghai");
    $write_Date    = date("Y-m-d, H:i:s");
    $write_Title   = strip_tags($_POST["write_Title"]);
    $write_Content = strip_tags($_POST["write_Content"]);
    
    //確認是否有輸入資料
    if($write_Type == "" || $write_Title == "" || $write_Content == ""){
        $write_Result ="欄位均不可空白！！";
    }
    else{
        //開啟相對應之資料表
        require("OpenSQL.php");
        $command_SelectBoard = "select * from Board";
        $act_SelectBoard     = mysqli_query($connect_DB, $command_SelectBoard);
        
        while($row_Board = mysqli_fetch_assoc($act_SelectBoard)){
            if($write_Title == $row_Board["BoardTitle"]){
                $write_Result  = "已有相同標題的文章存在囉！";
                $write_Success = 0; 
                break;
            }
            else{
                $write_Success = 1;
                continue;
            }
        }
        if($write_Success == 1){
            $command_InsertData = "insert into Board
                                   set
                                   BoardNickName = '$write_NickName',
                                   BoardDate     = '$write_Date',
                                   BoardType     = '$write_Type',
                                   BoardTitle    = '$write_Title',
                                   BoardContent  = '$write_Content'
                                   ";
            $act_InsertDate     = mysqli_query($connect_DB, $command_InsertData);
            
            //設定BoradType值
            $_SESSION["write_Type"] = $write_Type;
            mysqli_close($connect_DB);
            header("Location:Board.php");
            
        }
    }
}

?>
<html>
    <head>
        <?php require("HTML_Effect/Header.php"); ?>
    </head>
    <body>
        <?php require("HTML_Effect/Bootstrap.php"); ?>
        <form id="WriteBox" name="WriteBox" method="post" action="">
          <table width="300" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
            <tr>
                <td width="100" align="" valign="baseline">帖子類別：</td>
                <td width="80" align="" valign="baseline"><?php echo $write_Type?></td>
            </tr>
            <tr>
                <td>標題：</td>
                <td><input type="text" name="write_Title" id="write_Title" value="<?php echo $write_Title; ?>"></td>
            </tr>
            <tr>
                <td colspan="2">內容：
                <br>
                <TEXTAREA name="write_Content" cols="155" rows="20" value=""></TEXTAREA>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btnWrite" value="發出新帖"/>    
                </td>
            </tr>
        </table>
              <div align="center">
              <?php
                echo "<br>" . $write_Result;
              ?>
            </div>
        </form>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
