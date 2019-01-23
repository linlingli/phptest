<!DOCTYPE html>
<html>
    <head>
           <meta charset="UTF-8">
            <title>休閒討論區-登入頁</title>
            <?php require("Views/Script_css.php") ?>
    </head>
    <body>
        <?php include("Views/Header.php"); ?>
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
                <input type="submit" name="btn_Login"    id="btn_Login"    value="登入"   />
                <input type="submit" name="btn_Register" id="btn_Register" value="註冊"   />
                <input type="submit" name="btn_Home"     id="btn_Home"     value="回首頁" />
              </td>
            </tr>
          </table>
        </form>
    </body>
</html>