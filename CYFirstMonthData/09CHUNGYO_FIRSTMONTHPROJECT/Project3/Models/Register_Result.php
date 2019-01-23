<?php

class Register_Result{
    
    public $register_NickName;
    public $register_Name;
    public $register_Password;
    public $register_Email;
    public $register_Sex;
    public $register_Date;
    
    public function Register_Pass(){
        $result = true;
        
    	$register_MemberNickName = $this -> register_NickName = $_POST ["register_NickName"];
    	$register_MemberName     = $this -> register_Name     = $_POST ["register_Name"];
    	$register_MemberPassword = $this -> register_Password = $_POST ["register_Password"];
    	$register_MemberEmail    = $this -> register_Email    = $_POST ["register_Email"];
    	$register_MemberSex      = $this -> register_Sex      = $_POST ["register_Sex"];
    	$register_MemberDate     = $this -> register_Date     = $_POST ["register_Date"];
    	
    	
    	
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


?>