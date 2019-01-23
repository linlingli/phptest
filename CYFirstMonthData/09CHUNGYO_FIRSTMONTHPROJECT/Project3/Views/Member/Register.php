<!DOCTYPE html>
<html>
    <head>
           <meta charset="UTF-8">
            <title>休閒討論區-註冊頁</title>
            <?php require("Views/Script_css.php") ?>
    </head>
    <body>
        <?php include("Views/Header.php"); ?>
        
<form id="RegisterBox" name="RegisterBox" method="post" action="">
  <table width="800" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員註冊</font></td>
      
    <tr>
      <td width="80" align="center" valign="baseline" value = "<?php echo $register_NickName; ?>">暱稱：</td>
      <td valign="baseline"><input type = "text" name="register_NickName" id = "register_NickName" /></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline" value = "<?php echo $register_Name ; ?>">註冊帳號：</td>
      <td valign="baseline"><input type = "text" name="register_Name" id = "register_Name" /></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline" value="<?php echo $register_Password; ?>">註冊密碼：</td>
      <td valign="baseline"><input type = "text" name="register_Password" id = "register_Password" /></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline" value="<?php echo $register_Email; ?>">E-mail：</td>
      <td valign="baseline"><input type = "text" name="register_Email" id = "register_Email" /></td>
    </tr>
    <tr>
         <td width="80" align="center" valign="baseline">性別：</td>
         <td width="80" align="" valign="baseline">
             男 <INPUT TYPE="RADIO" NAME="register_Sex" id="register_Sex" VALUE="男">
             女 <INPUT TYPE="RADIO" NAME="register_Sex" id="register_Sex" VALUE="女">
         </td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">出生日期：</td>
      <td valign="baseline">
        <input style=width:50px type = "text" name="register_Year"  id = "register_Year"  />年
        <input style=width:50px type = "text" name="register_Month" id = "register_Month" />月
        <input style=width:50px type = "text" name="register_Day"   id = "register_Day"   />日
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC">
        <input type="submit" name="btn_Register" id="btn_Register" value="送出資料"/> <!--主要是靠name來判定-->
        <input type="submit" name="btn_Home"     id="btn_Home"     value="回首頁"  />
        
      </td>
    </tr>
  </table>
      <div align="center">
      <?php
        echo $register_Result;
      ?>
    </div>
</form>

    <script src="/Project3/js/jquery.js"></script>
    <script src="/Project3/js/bootstrap.min.js"></script>
</body>
    </body>
</html>