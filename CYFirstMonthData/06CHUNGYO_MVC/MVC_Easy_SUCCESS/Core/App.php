<?php

//當程式建構的時候，判定是否有輸入方法，若有，則輸出
class App{
    public function __Construct(){
        $url = $this -> parse_Url();
        $ControllerName = "$url[0]Controller";
        // if (!file_exists("Controllers/$ControllerName.php")){
        //   return; 
        // }
            
        require_once "Controllers/$ControllerName.php";
        
        $Controller = new $ControllerName; // new一個HomeController物件(位置)
        
        $MethodName = isset($url[1]) ? $url[1] : "Index";
        // if(!method_exists($Controller, $MethodName)){
        //     return;
        // }

        unset($url[0]);
        unset($url[1]);

        $Parameter = $url ? array_values($url) : Array();
        call_user_func_array(Array($Controller, $MethodName), $Parameter);

    }
    public function parse_Url(){
        if(isset($_GET["url"])){
            $url_Explode = explode("/", rtrim($_GET["url"], "/") );
            return $url_Explode;
        }
    }
}

?>