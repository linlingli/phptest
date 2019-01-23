<?php
$link = @mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
$result = mysqli_query($link, "set names utf8");
mysqli_select_db($link, "class");
$commandText = "select * from students";
$result = mysqli_query($link, $commandText);

// $row = mysqli_fetch_assoc($result);
// echo $row['cName'] . "<hr>";
// echo "oh Yeah! <hr>" ;

//判定按鈕的作用
session_start();
if(isset($_GET["logout"]))
{
  unset($_SESSION["txtUserName"]);
  header("Location:index.php");
} //若按下登出按鈕，則將傳回首頁並顯示初始頁面
if(isset($_POST["btnHome"])) 
{
  unset($_SESSION["txtUserName"]);
  unset($_SESSION["txtPassword"]);
  header("Location:index.php");
  exit();
}// 按下"回首頁"時則跳回首頁
if(isset($_POST["btnOK"]))
{
  if($_POST["txtUserName"] == "" && $_POST["txtPassword"] == "")
  {
    $message = "請輸入您的帳號與密碼！";
  } 
  else if($_POST["txtUserName"] == "")
  {
    
    $sUserName = $_POST["txtUserName"];
    $message = "請輸入您的帳號！";
  }
  else if($_POST["txtPassword"] == "")
  {
    $sUserName = $_POST["txtUserName"];
    $message = "您的密碼輸入錯誤！";
  }
  else
  {
    $_SESSION["txtUserName"] = $_POST["txtUserName"];
    $_SESSION["txtPassword"] = $_txt["Password"];
    //header("Location:index.php");
  }
}
}//若有按下登入按鈕的話，則判定是否有登入成功
if(isset($_POST["btnReset"]))
{
  unset($_POST["txtUsetName"]);
  unset($_POST["txtPassword"]);
}
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Lab - Login</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="login.php">
  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 登入</font></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">帳號</td>
      <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" value = <?php echo $sUserName ?> ></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">密碼</td>
      <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC">
        <input type="submit" name="btnOK" id="btnOK" value="登入" />
        <input type="reset" name="btnReset" id="btnReset" value="重設" />
        <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
      </td>
    </tr>
  </table>
      <div align="center">
      <?php
        echo "<br>" . $message ;
      ?>
    </div>
</form>
</body>
</html>