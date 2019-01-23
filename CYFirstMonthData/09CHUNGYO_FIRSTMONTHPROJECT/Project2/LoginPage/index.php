<!DOCTYPE html>
<html>
    <head>
        <?php require("HTML_Effect/Header.php"); ?>
    </head>
    <body>
        <?php include("HTML_Effect/Bootstrap.php"); ?>
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

        
        <script>
        $("#btn_Login").click(function () {
            var LoginData = {
                login_MemberName: $("#login_Name").val(),
                login_MemberPassword: $('#login_Password').val()
            };
            $.ajax({
                type: "post",
                url: "/Project2/WebAPI/LoginPage",
                //contentType: "application/json", //我們傳過去的值是什麼型態
                //data: JSON.stringify(productData), //丟過去的內容為何(將資料型態變為JSON型態)
                //dataType: "appliction/json", //希望對方送什麼資料型態給我
                data: LoginData
            }).then(function (data){
                var Back_Data    = JSON.parse(data);
                var Login_Result = Back_Data[0];     
                $("#login_Name").val(Back_Data[2]);
                alert(Login_Result);
                if(Login_Result == "登入成功！"){
                  window.location.replace("https://lab-leon1129.c9users.io/Project2/HomePage/");
                }
            });
        });
        </script>
        
        <script>
        $("#btn_Login").click(function(){
            alert("Hello! I am an alert box!!");
        })
    </script>
        
    <!--<script src="js/jquery.js"></script>-->
    <!--<script src="js/bootstrap.min.js"></script>-->
        
        
        
        
    </body>
</html>