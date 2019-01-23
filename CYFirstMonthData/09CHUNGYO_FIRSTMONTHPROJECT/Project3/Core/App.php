<?php

class App {
    
    public function __Construct(){
        $url = $this->parse_Url();
        
        $ControllerName = "{$url[0]}Controller";
        require_once "Controllers/$ControllerName.php";
        $Controller = new $ControllerName;
        $MethodName = isset($url[1]) ? $url[1] : "Index";
        
        unset($url[0]); 
        unset($url[1]);
        
        $Parameter = $url ? array_values($url) : Array();
        call_user_func_array(Array($Controller, $MethodName), $Parameter);
    }
        
    //將傳入的網址explodet成控制器名稱以及使用方法。
    public function parse_Url(){
        $url_Array = Array();
        if (isset($_GET["url"])){
            $url_Array = explode("/", rtrim($_GET["url"], "/"));
        };
        
        if (count($url_Array) < 2){
            $url_Array = Array("Home", "Index");
        }
        return $url_Array;
    }
    
}

?>
