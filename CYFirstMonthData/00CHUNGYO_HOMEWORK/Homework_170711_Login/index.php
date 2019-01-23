<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
session_start();
if(isset($_SESSION["txtUserName"]))
{
  $userName = $_SESSION["txtUserName"];
}
else
{
  $userName = "訪客";
}
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lab - index</title>
</head>
<body>

<table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
  <tr>
    <td align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 首頁</font></td>
  </tr>
  <?php if($userName == "訪客") : ?>
    <td align="center" valign="baseline"><a href="login.php">登入</a> | <a href="login.php">會員專用頁</a></td>
  <?php else: ?>
      <td align="center" valign="baseline"><a href="login.php?logout=1">登出</a> | <a href="secret.php">會員專用頁</a></td>
  <?php endif; ?>
  </tr>

  <tr>
    <td align="center" bgcolor="#CCCCCC">&nbsp;<?php echo "哈囉，" . $userName . "！歡迎"?></td>
  </tr>
</table>


</body>
</html>