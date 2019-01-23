<?php

class MemberController extends Controller {
    
    function Login() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $this -> post_Login();
        }
        else{
            $this -> view("Member/Login");
        }
    }
    function post_Login(){
        $user = $this -> model("User");
        
        print_r($user);
        echo "<hr>";
        
        if($user -> isLoginPass()){
            $_SESSION["userId"] = $user ->userId;
            // if(isset($_SESSION["userId"])){
            //     echo "OK";
            // }
            // else{
            //     echo "Not OK";
            // }
            header("Location:/Lab_Login_MVC/Home/Index");
        }
        else{
            $this -> view("Member/Login", $user);
        }
        
    }
    function Logout(){
        unset($_SESSION["userId"]);
        header("Location:/Lab_Login_MVC/Home/Index");
    }
}

?>
