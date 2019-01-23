<?php
session_start();

//判定是否尚未登入
if(!isset($_SESSION["MemberNickName"])){
    $md5_code = md5(1);
    header("Location:Login.php?YetLogin=$md5_code");
}

//將帖子內容show在留言頁面
if(isset($_GET["Message"])){
 $view_BoardTitle = base64_decode($_GET["Message"]);   
}
$view_BoardType      = $_SESSION["view_BoardType"];
$CustomerNickName    = $_SESSION["MemberNickName"];

//開啟相對應的資料表
require("OpenSQL.php");
$command_SelectBoard = "select * from Board where BoardType = '$view_BoardType' and BoardTitle = '$view_BoardTitle'";
$act_SelectBoard     = mysqli_query($connect_DB, $command_SelectBoard);
$row_BoardData       = mysqli_fetch_assoc($act_SelectBoard);

$view_WriterID       = $row_BoardData["BoardID"];
$view_WriterNickName = $row_BoardData["BoardNickName"];
$view_WriterDate     = $row_BoardData["BoardDate"];
$view_WriterType     = $row_BoardData["BoardType"];
$view_WriterTitle    = $row_BoardData["BoardTitle"];
$view_WriterContent  = $row_BoardData["BoardContent"];

//判定回覆內容
$leave_Result = "";
if(isset($_POST["btn_LeaveMessage"])){
    
    date_default_timezone_set("Asia/Shanghai");
    $leave_Date     = date("Y-m-d, H:i:s");
    $leave_Type     = $view_WriterType . $view_WriterID;
    $leave_Content  = $_POST["leave_Content"];
    $leave_NickName = $CustomerNickName;
    
    if($leave_NickName == "" || $leave_Content == ""){
        $leave_Result = "欄位均不可空白唷！";
    }
    $command_InsertData = "insert into Board
                           set
                           BoardNickName = '$leave_NickName',
                           BoardDate     = '$leave_Date',
                           BoardType     = '$leave_Type',
                           BoardContent  = '$leave_Content'
                          ";
    $act_InsertData     = mysqli_query($connect_DB, $command_InsertData);
    
    $_SESSION["view_BoardTitle"] = $view_BoardTitle;
    mysqli_close($connect_DB);
    header("Location:ViewBoard.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <?php require("HTML_Effect/Header.php"); ?>
    </head>
    <body>
        <?php require("HTML_Effect/Bootstrap.php"); ?>
        
<!--欲回覆的帖子-->
<table width="1000" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
        <td width="80" align="center" valign="baseline"><h3>標題：</h3></td>
        <td width="1000" align="center" valign="baseline" colspan="5"><h3><?php echo $view_WriterTitle?></h3></td>
    </tr>
    
    <tr>
        <td width="80" align="center" valign="baseline">發帖者：</td><td width="200" align="center"><?php echo $view_WriterNickName; ?></td>
        <td width="100" align="center" valign="baseline">帖子類型：</td><td width="300" align="center"><?php echo $view_WriterType; ?></td>
        <td width="100" align="center" valign="baseline">發帖時間：</td><td align="center"><?php echo $view_WriterDate; ?></td>
    </tr>
            
    <tr>
        <td colspan="6">內容：
        <br>
            <?php echo $view_WriterContent; ?>
        </td>
    </tr>
</table>

<!--回覆的區域-->
<form id="LeaveMessageBox" name="LeaveMessageBox" method="post" action="">
        <table width="1000" border="2" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
            <tr>
                <td>
                  暱稱：<?php echo $CustomerNickName; ?>
                <td>
            </tr>
            <tr>
                <td>
                
                  內容：
                  <br>
                  <TEXTAREA name="leave_Content" cols="139" rows="10"></TEXTAREA>
                  <!--<input type="text" size="100" maxlength="1000" name="Message" id = "Message" wid/>-->
                  <br><br>
                  <input type="submit" name="btn_LeaveMessage" id="btn_LeaveMessage" value="送出回覆" />
                </td>
            </tr>
        </table>
        </form>
        <div>
            <?php echo $leave_Result; ?>
        </div>
    

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
