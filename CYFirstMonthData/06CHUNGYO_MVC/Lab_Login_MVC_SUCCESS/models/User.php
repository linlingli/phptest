<?php

class User{
    public $userId;
    public $password;
    
    public function isLoginPass(){
        $result = true;
        
        $userId = $this->userId = $_POST ["txtID"];
    	$password = $this->password = $_POST ["txtPassword"];
    	$userPassword = $this->md5Password = md5 ( $this->password );
        
        
        $connect_DB   = @mysqli_connect("localhost","root","") or die(mysqli_connect_error());
        $setUtf8      = mysqli_query($connect_DB, "set names utf8");
        $use_DB       = mysqli_query($connect_DB, "use securityLab");
        $Select_Table = mysqli_query($connect_DB, "select * from member where id = '$userId' and password = '$userPassword'");
        
        $row          = mysqli_fetch_assoc($Select_Table);
        
        mysqli_close($connect_DB);
	
	    $result = ($row) ? true : false;
        return $result;
    }
}


?>