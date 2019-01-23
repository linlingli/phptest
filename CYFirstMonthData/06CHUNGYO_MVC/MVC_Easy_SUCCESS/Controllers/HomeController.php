<?php

class HomeController extends Controller{
     public function Index(){
        echo "home page of HomeController";
    }
    
     public function Hello($Name){
        //echo "Hello! $Name";
        $User = $this -> Model("User");
        $User -> Name = $Name;
        
        print_r($User);
        
        $this -> View("Home/Hello", $User);
        //echo "Hello! " . $User -> Name;
    }
}
?>