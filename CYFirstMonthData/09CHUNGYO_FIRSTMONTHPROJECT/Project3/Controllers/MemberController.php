<?php

class MemberController extends Controller{
    
//-------------------登入用--------------------//
    public function Login(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $this -> Login_OK();
        }
        else{
            $this -> View("Member/Login");
        }
    }
//---------------------------------------------//

    public function Register(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $this -> Register_OK();
        }
        else{
            $this -> View("Member/Register");
        }
        
    }


    public function Login_OK(){
        $login_Member = $this -> Model("Login_Result");

        if($login_Member -> Login_Pass()){
            $_SESSION["MemberNickName"] = $login_Member -> login_NickName;
            
            $this -> View("Home/Index");
        }
        else{
            $this -> View("Member/Login");
        }
    }
    
    public function Logout(){
        unset($_SESSION["MemberNickName"]);
        $this -> View("Home/Index");
    }
    
    public function Register_OK(){
        $login_Member = $this -> Model("Register_Result");
    }
    
}



?>