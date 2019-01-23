<?php

session_start();

//將會員資料讀入
$Member_MemberID       = $_SESSION["MemberID"];
$Member_MemberName     = $_SESSION["MemberName"];     
$Member_MemberPassword = $_SESSION["MemberPassword"]; 
$Member_MemberNickName = $_SESSION["MemberNickName"]; 
$Member_MemberEmail    = $_SESSION["MemberEmail"];
$Member_MemberSex      = $_SESSION["MemberSex"];      
$Member_MemberDate     = $_SESSION["MemberDate"];

//按下回首頁按鈕時
if(isset($_POST["btn_Home"])){
    header("Location:index.php");
}

?>

<html>
<head>
   <?php require("HTML_Effect/Header.php") ;?> 
</head>    
<body>
    <?php require("HTML_Effect/Bootstrap.php"); ?>

    <form id="MemberBox" name="MemberBox" method="post" action="ReviseMember.php">
  <table width="800" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員資料</font></td>
      
    <tr>
      <td width="100" align="center" valign="baseline" >會員暱稱：</td>
      <td valign="baseline"><?php echo $Member_MemberNickName; ?></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline" >會員帳號：</td>
      <td valign="baseline"><?php echo $Member_MemberName; ?></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline" >會員密碼：</td>
      <td valign="baseline"><?php echo $Member_MemberPassword; ?></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline" >會員信箱：</td>
      <td valign="baseline"><?php echo $Member_MemberEmail; ?></td>
    </tr>
    <tr>
         <td width="80" align="center" valign="baseline">會員性別：</td>
         <td width="80" align="" valign="baseline"><?php echo $Member_MemberSex; ?></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">會員生日：</td>
      <td valign="baseline"><?php echo $Member_MemberDate?></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC">
        <input type="submit" name="btn_Revise"   id="btn_Revise"   value="修改資料"/> 
        <input type="submit" name="btn_Home"     id="btn_Home"     value="回首頁"  />
        
      </td>
    </tr>
  </table>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>