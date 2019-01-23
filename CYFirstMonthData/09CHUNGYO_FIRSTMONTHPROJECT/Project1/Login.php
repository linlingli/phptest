<?php
session_start();
$login_Result = "";
//開啟資料庫
include("OpenSQL.php");

//按下我要發帖按鈕後
if(isset($_GET["YetLogin"])){
    $login_Result = "您還沒登入喔！請先登入再發帖或回覆唷";
}

//按下註冊按鈕後
if(isset($_POST["btn_Register"])){
    header("Location:Register.php");
}

//按下回首頁按鈕後
if(isset($_POST["btn_Home"])){
    header("Location:index.php");
}

//按下登出按鈕後
if(isset($_GET["Logout"])){
    unset($_SESSION["MemberName"]);
    unset($_SESSION["MemberNickName"]);
    header("Location:index.php");
}

//註冊完成後
if(isset($_GET["Register"])){
    $login_Result = "註冊成功囉！請再登入一次！";
}
    

//按下登入按鈕後
$command_SelectTable = "select * from MemberList";
$act_SelectTable     = mysqli_query($connect_DB, $command_SelectTable);
mysqli_close($connect_DB);

if(isset($_POST["btn_Login"])){
    $login_Name     = strip_tags($_POST["login_Name"]);
    $login_Password = strip_tags($_POST["login_Password"]);

    
    if($login_Name == "" || $login_Password == ""){
        $login_Result = "帳號與密碼欄均不可空白唷！！";
    }
    else{
        //確認輸入帳號是否已經註冊過
        while($row_MemberList = @mysqli_fetch_assoc($act_SelectTable)){
            if($login_Name == $row_MemberList["MemberName"]){
                $login_Test = "Yes";
                break;
            }
            else{
                continue;
            }
        }
        //確認密碼輸入正確與否
        if($login_Test == "Yes"){
            
            if($login_Password == $row_MemberList["MemberPassword"]){
                //登入成功
                $_SESSION["MemberName"]     = $_POST["login_Name"];
                $_SESSION["MemberPassword"] = $_POST["login_Password"];
                $_SESSION["MemberID"]       = $row_MemberList["MemberID"];
                $_SESSION["MemberNickName"] = $row_MemberList["MemberNickName"];
                $_SESSION["MemberEmail"]    = $row_MemberList["MemberEmail"];
                $_SESSION["MemberSex"]      = $row_MemberList["MemberSex"];
                $_SESSION["MemberDate"]     = $row_MemberList["MemberDate"];
                header("Location:index.php");
            }
            else{
                $login_Result = "您的密碼輸入錯誤唷！！";
            }
        }
        else{
            $login_Result = "此帳號尚未註冊唷！！";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require("HTML_Effect/Header.php"); ?>
    </head>
    <body>
        <?php require("HTML_Effect/Bootstrap.php"); ?>
        <form id="LoginBox" name="LoginBox" method="post" action="">
          <table width="300" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
            <tr>
              <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員登入</font></td>
            </tr>
            <tr>
              <td width="80" align="center" valign="baseline">會員帳號：</td>
              <td valign="baseline"><input type="text" name="login_Name" id="login_Name" value = <?php echo $login_Name ?> ></td>
            </tr>
            <tr>
              <td width="80" align="center" valign="baseline">會員密碼：</td>
              <td valign="baseline"><input type="password" name="login_Password" id="login_Password" /></td>
            </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="#CCCCCC">
                <input type="submit" name="btn_Login" id="btn_Login" value="送出資料"/>
              </td>
            </tr>
          </table>
              <div align="center">
              <?php
                echo "<br>" . $login_Result;
              ?>
            </div>
        </form>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
