<?php

class Controller {
    public function Model($Model){
        require_once "Models/$Model.php";
        return new $Model();
    }

    public function View($View, $Data = Array()){
        require_once "Views/$View.php";
    }

}

?>