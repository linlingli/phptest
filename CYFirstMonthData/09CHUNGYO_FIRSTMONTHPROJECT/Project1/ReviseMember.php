<?php

session_start();
$Member_MemberID       = $_SESSION["MemberID"];
$Member_MemberName     = $_SESSION["MemberName"];     
$Member_MemberPassword = $_SESSION["MemberPassword"]; 
$Member_MemberNickName = $_SESSION["MemberNickName"]; 
$Member_MemberEmail    = $_SESSION["MemberEmail"];
$Member_MemberSex      = $_SESSION["MemberSex"];      
$Member_MemberDate     = $_SESSION["MemberDate"];

$DateArr = explode("-", $Member_MemberDate);
$Year    = $DateArr[0];
$Month   = $DateArr[1];
$Day     = $DateArr[2];

$revise_Result = "";

//按下放棄修改按鈕時
if(isset($_POST["btn_ReviseQuit"])){
    header("Location:ViewMember.php");
}


//按下送出修改按鈕時
if(isset($_POST["btn_ReviseDone"])){
    
    $revise_NickName = $_POST["revise_NickName"];
    $revise_Name     = $_POST["revise_Name"];
    $revise_Password = $_POST["revise_Password"];
    $revise_Email    = $_POST["revise_Email"];
    $revise_Sex      = $_POST["revise_Sex"];
    $revise_Date     = $_POST["revise_Year"].$_POST["revise_Month"].$_POST["revise_Day"];

    
    if($revise_NickName == "" || $revise_Name == "" || $revise_Password == "" || $revise_Email == "" || $revise_Sex == "" || $revise_Date == ""){
        $revise_Result = "欄位均不可空白！！！";
    }
    else{
        include("OpenSQL.php");
        $command_UpdateData = "update MemberList 
                              set
                              MemberNickName = '$revise_NickName',
                              MemberName     = '$revise_Name',
                              MemberPassword = '$revise_Password',
                              MemberEmail    = '$revise_Email',
                              MemberSex      = '$revise_Sex',
                              MemberDate     = '$revise_Date'
                              where
                              MemberID = '$Member_MemberID'
                             ";
                             
        $act_UpdateData     = mysqli_query($connect_DB, $command_UpdateData);
        $command_SelectData = "select * from MemberList where MemberID = '$Member_MemberID'";
        $act_SelectData     = mysqli_query($connect_DB, $command_SelectData);
        $row_Data           = mysqli_fetch_assoc($act_SelectData);
        
        //將修改後的新資料存入SESSION中，用以顯示於其他頁面
        $_SESSION["MemberName"]     = $row_Data["MemberName"];     
        $_SESSION["MemberPassword"] = $row_Data["MemberPassword"]; 
        $_SESSION["MemberNickName"] = $row_Data["MemberNickName"]; 
        $_SESSION["MemberEmail"]    = $row_Data["MemberEmail"];
        $_SESSION["MemberSex"]      = $row_Data["MemberSex"]; 
        $_SESSION["MemberDate"]     = $row_Data["MemberDate"];
        
        header("Location:ViewMember.php");
    }
}

?>

<html>
<head>
   <?php require("HTML_Effect/Header.php") ;?> 
</head>    
<body>
    <?php require("HTML_Effect/Bootstrap.php"); ?>

    <form id="ReviseBox" name="ReviseBox" method="post" action="">
  <table width="800" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員資料</font></td>
      
    <tr>
      <td width="100" align="center" valign="baseline" >會員暱稱：</td>
      <td valign="baseline"><input type = "text" name="revise_NickName" id = "revise_NickName" value="<?php echo $Member_MemberNickName; ?>" /></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline" >會員帳號：</td>
      <td valign="baseline"><input type = "text" name="revise_Name" id = "revise_Name" value="<?php echo $Member_MemberName; ?>"/></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline" >會員密碼：</td>
      <td valign="baseline"><input type = "text" name="revise_Password" id = "revise_Password" value="<?php echo $Member_MemberPassword; ?>"/></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline" >會員信箱：</td>
      <td valign="baseline"><input type = "text" name="revise_Email" id = "revise_Email" value="<?php echo $Member_MemberEmail; ?>"/></td>
    </tr>
    <tr>
         <td width="80" align="center" valign="baseline">會員性別：</td>
         <td width="80" align="" valign="baseline"><input type = "text" name="revise_Sex" id = "revise_Sex" value="<?php echo $Member_MemberSex; ?>"/></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">會員生日：</td>
      <td valign="baseline">
          <input style=width:50px type = "text" name="revise_Year"  id = "revise_Year"  value="<?php echo $Year;?>" />年
          <input style=width:50px type = "text" name="revise_Month" id = "revise_Month" value="<?php echo $Month;?>"/>月
          <input style=width:50px type = "text" name="revise_Day"   id = "revise_Day"   value="<?php echo $Day;?>"  />日
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC">
        <input type="submit" name="btn_ReviseDone"   id="btn_ReviseDone"   value="送出修改"/> 
        <input type="submit" name="btn_ReviseQuit"   id="btn_ReviseQuit"   value="放棄修改"/>
        
      </td>
    </tr>
  </table>
  <div align="center">
      <?php echo $revise_Result; ?>
  </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>