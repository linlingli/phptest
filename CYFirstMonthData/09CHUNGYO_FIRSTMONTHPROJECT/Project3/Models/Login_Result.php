<?php

class Login_Result{
    public $login_Name;
    public $login_Password;
    public $login_NickName;
    
    public function Login_Pass(){
        $result = true;
        
    	$login_MemberName     = $this -> login_Name     = $_POST ["login_Name"];
    	$login_MemberPassword = $this -> login_Password = $_POST ["login_Password"];
    	
    	$connect_DB   = @mysqli_connect("localhost","root","") or die(mysqli_connect_error());
        $setUtf8      = mysqli_query($connect_DB, "set names utf8");
        $use_DB       = mysqli_query($connect_DB, "use Subject");
        $Select_Data  = mysqli_query($connect_DB, "select * from MemberList where MemberName = '$login_MemberName' and MemberPassword = '$login_MemberPassword'");
        
        $row          = mysqli_fetch_assoc($Select_Data);
        
        $login_MemberNickName = $this -> login_NickName = $row["MemberNickName"]; 
        
        
        
        mysqli_close($connect_DB);
	
	    $Result = ($row) ? true : false;
	    
        return $Result;
    }
}


?>