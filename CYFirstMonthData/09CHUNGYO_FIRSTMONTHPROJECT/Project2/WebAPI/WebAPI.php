<?php
//定義此頁使用utf8編碼
header("Content-Type:text/html; charset = utf-8");

//讀取傳入此區的方法以及網址
$recieve_Method = $_SERVER['REQUEST_METHOD'];
$url_Home       = explode("/", rtrim($_GET["url"], "/") );

session_start();
require("OpenSQL.php");
$command_SelectMemberList = "select * from MemberList";
$command_SelectBoard      = "select * from Board";


$login_Result = "";
switch($recieve_Method." ".$url_Home[0]){
    // 跳轉業面用
    case "GET LoginPage":
        header("Location:/Project2/LoginPage");
        break;
    case "GET RegisterPage":
        header("Location:/Project2/RegisterPage");
        break;
    
    //登入用 
    case "POST LoginData":
        parse_str(file_get_contents('php://input'), $LoginData);
        $login_MemberName     = $LoginData["login_MemberName"];
        $login_MemberPassword = $LoginData["login_MemberPassword"];
        
        if($login_MemberName == "" || $login_MemberPassword == ""){
            $login_Result = "欄位均不可空白！";
        }
        
        $command_SelectMemberList = "select * from MemberList where MemberName = '$login_MemberName'";
        $act_SelectMemberList     = mysqli_query($connect_DB, $command_SelectMemberList);
        $row_SelectMemberList     = mysqli_fetch_assoc($act_SelectMemberList);
        if(isset($row_SelectMemberList)){
            if($login_MemberPassword == $row_SelectMemberList["MemberPassword"]){
                $login_Result = "登入成功！";
                
                $Customer_NickName = $row_SelectMemberList["MemberNickName"];
                $Customer_Name     = $row_SelectMemberList["MemberName"];
            }
            else{
                $login_Result = "您的密碼輸入錯誤！";
            }
        }
        else{
            $login_Result = "此帳號尚未註冊！";
        }
        $arr_LoginData = array( $login_Result, $Customer_NickName, $login_MemberName, $login_MemberPassword);
        echo json_encode($arr_LoginData);
        break;
    
    //註冊用
    case "POST RegisterData":
        parse_str(file_get_contents('php://input'), $RegisterData);
        

        $register_NickName = $RegisterData["register_NickName"];
        $register_Name     = $RegisterData["register_Name"];
        $register_Password = $RegisterData["register_Password"];
        $register_Email    = $RegisterData["register_Email"];
        $register_Sex      = $RegisterData["register_Sex"];
        $register_Date     = $RegisterData["register_Date"];
        
        $command_RegisterTest  = "select * from MemberList";
        $act_RegisterTest     = mysqli_query($connect_DB, $command_RegisterTest);
        
        while($row_MemberList = @mysqli_fetch_assoc($act_RegisterTest)){

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
          $register_Result = "註冊成功！請再登入一次！";
          mysqli_close($connect_DB);
        }
        
        $arr_RegisterData = array($register_Result);
        echo json_encode($arr_RegisterData);
 
        break;
    default:
        echo "No command!";
}
            
?>