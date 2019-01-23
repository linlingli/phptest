<?php

class HomeController extends Controller{
    
    public function Index(){
        $this -> View("Home/Index");
    }
    
    public function MemberPage($Name){
        $this -> View("Home/MemberPage", $Name);
    }
    
    // public function RegisterPage()
    
}

?>