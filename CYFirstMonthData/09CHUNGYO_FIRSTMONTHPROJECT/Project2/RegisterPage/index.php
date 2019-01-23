<!DOCTYPE html>
<html>
    <head>
        <?php require("HTML_Effect/Header.php"); ?>
    </head>
    <body>
        <?php include("HTML_Effect/Bootstrap.php"); ?>
        
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

    <script>
        $("#btn_Register").click(function () {
            var RegisterData = {
                register_NickName: $("#register_NickName").val(),
                register_Name:     $("#register_Name").val(),
                register_Password: $("#register_Password").val(),
                register_Email:    $("#register_Email").val(),
                register_Sex:      $("#register_Sex").val(),
                register_Date:     $("#register_Year").val() + $("#register_Month").val() + $("#register_Day").val()
            };
            $.ajax({
                type: "post",
                url: "/Project2/WebAPI/RegisterData",
                data: RegisterData
            }).then(function (data){
              var Back_Data = JSON.parse(data);
              alert(Back_Data);
                if(Back_Data == "註冊成功！請再登入一次！"){
                  window.location.replace("https://lab-leon1129.c9users.io/Project2/LoginPage/");
                }
            });
        });
        </script>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
    </body>
</html>