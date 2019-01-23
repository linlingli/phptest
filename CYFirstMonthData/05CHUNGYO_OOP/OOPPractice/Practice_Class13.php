<?php
header("Content-Type:text/html; charset = utf-8");
require("Practice_Class11.php");

class AdultComput extends People{
    //成年人標準體重：標準體重 = (身高-80)*0.7;
    public function computAdultWeight(){
        return round(($this -> int_Height -80) *0.7);
    }
}

$AdultObj = new AdultComput();
$AdultObj -> setData("Leon", "Man", "27", "82", "167");
echo $AdultObj -> str_Name . "的標準體重為：";
echo $AdultObj -> computAdultWeight();
?>