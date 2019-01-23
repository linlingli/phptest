<?php

include("OpenSQL.php");
$register_Result = "";

//按下回首頁按鈕後
if(isset($_POST["btn_Home"])){
  header("Location:index.php");
}

//按下註冊按鈕後
if(isset($_POST["btn_Register"])){
  
  
  
  
  //將年月日合併為一個變數
  if($_POST["register_Year"] == "" || $_POST["register_Month"] == "" || $_POST["register_Day"] == ""){
      $register_Date = "";
  }
  else{
      $register_Date = $_POST["register_Year"] . $_POST["register_Month"] . $_POST["register_Day"];
  }
  $register_NickName = strip_tags($_POST["register_NickName"]);
  $register_Name     = strip_tags($_POST["register_Name"]);
  $register_Password = strip_tags($_POST["register_Password"]);
  $register_Email    = strip_tags($_POST["register_Email"]);
  $register_Sex      = $_POST["register_Sex"];
  
  if($register_NickName == "" || $register_Name == "" || $register_Password == "" || $register_Email =="" || $register_Sex == "" || $register_Date == ""){
    $register_Result = "所有欄位均不可空白唷！！";
  }
  else{
    
    if(RegisterTest($register_Name) != "Wrong"){
      if(RegisterTest($register_Password) != "Wrong"){
        if(RegisterEmailTest($register_Email) != "Wrong"){
          $command_SelectTable = "select * from MemberList";
          $act_SelectTable     = mysqli_query($connect_DB, $command_SelectTable);
    
          while($row_MemberList = @mysqli_fetch_assoc($act_SelectTable)){
    
            if($register_NickName == $row_MemberList["MemberNickName"]){
              $register_Result = "此暱稱已被註冊過囉！";
              $register_Success = 0;
              break;
            }
            elseif($register_Name == $row_MemberList["MemberName"]){
              $register_Result = "此帳號已被註冊過囉！";
              $register_Success = 0;
              break;
            }
            else{
              $register_Success = 1;
              continue;
            }
          }
          if($register_Success == 1){
              $command_InsertData = "insert into MemberList
                                    set
                                    MemberNickName = '$register_NickName',
                                    MemberName     = '$register_Name',
                                    MemberPassword = '$register_Password',
                                    MemberEmail    = '$register_Email',
                                    MemberSex      = '$register_Sex',
                                    MemberDate     = '$register_Date'
                                    ";
              $act_InsertDate  = mysqli_query($connect_DB, $command_InsertData);
              $register_Result = "註冊成功！";
              $md_code         = md5(1);
              mysqli_close($connect_DB);
              header("Location:Login.php?Register=$md5_code");
            }
        }
        else{
          $register_Result = "電子郵件格式輸入錯誤！";
        }
      }
      else{
        $register_Result = "密碼格式輸入錯誤！";
      }
    }
    else{
      $register_Result = "帳號格式輸入錯誤！";
    }

  }
}


function RegisterTest($Data){
  if(preg_match("/^([a-z0-9]+)([-._]*[a-z0-9]+)*$/i", $Data) && 6 <= strlen($Data) && strlen($Data) <= 15){
    return $Data;
  }
  else{
    $Data = "Wrong";
    return $Data;
  }
}

function RegisterEmailTest($Email){
  if(preg_match("/^\w+([-._]\w+)*@\w+([-._]\w+)*\.\w+([-._]\w+)*$/i", $Email)){
    return $Email;
  }
  else{
    $Email = "Wrong";
    return $Email;
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
        
<form id="RegisterBox" name="RegisterBox" method="post" action="">
  <table width="800" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員註冊</font></td>
      
    <tr>
      <td width="120" align="center" valign="baseline">暱稱：</td>
      <td valign="baseline">
        <input type = "text" name="register_NickName" id = "register_NickName" value = "<?php echo $register_NickName; ?>"/>
        (最多輸入12個字元，一個中文字是2個字元)
      </td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">註冊帳號：</td>
      <td valign="baseline">
        <input type = "text" name="register_Name" id = "register_Name" value = "<?php echo $register_Name ; ?>"/>
        (請輸入6~15個英文與數字，可使用 - . _ )
      </td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">註冊密碼：</td>
      <td valign="baseline">
        <input type = "text" name="register_Password" id = "register_Password" value="<?php echo $register_Password; ?>"/>
        (請輸入6~15個英文與數字)
      </td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline" >E-mail：</td>
      <td valign="baseline">
        <input type = "text" name="register_Email" id = "register_Email" value="<?php echo $register_Email; ?>"/>
        (xxxxxx@xxx.xxx.xxx)
      </td>
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
    <td>
    <select name="register_Year">
      <?php for($year = 1970; $year <= 2017; $year++): ?>
　      <option name ="register_Year" value="<?php echo $year; ?>"><?php echo $year?></option>
      <?php endfor; ?>
    </select>
    年
    <select name="register_Month">
      <?php for($month = 1; $month <= 12; $month++): ?>
        <?php if($month < 10): ?>
　        <option id="register_Month" value="0<?php echo $month; ?>"><?php echo $month?></option>
　      <?php else: ?>
　        <option id="register_Month" value="<?php echo $month; ?>"><?php echo $month?></option>
　      <?php endif;?>
      <?php endfor; ?>
    </select>
    月
    <select name="register_Day">
      <?php for($day = 1; $day <= 31; $day++): ?>
        <?php if($day < 10): ?>
　        <option name="register_Day" value="0<?php echo $day; ?>"><?php echo $day?></option>
　      <?php else: ?>
　        <option name="register_Day" value="<?php echo $day; ?>"><?php echo $day?></option>
　      <?php endif; ?>
      <?php endfor; ?>
    </select>
    日
    </td>
    
</select>
    
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

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>