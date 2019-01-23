<?php

class HomeController extends Controller{
    public function Index(){
        $this -> view("Home/Index");
    }
    public function member(){
        
        if(isset($_SESSION["userId"])){
            $this -> view("Home/member");
        }
        else{
            header("Location:/Lab_Login_MVC/Home/Index");
        }
    }  
}

?>