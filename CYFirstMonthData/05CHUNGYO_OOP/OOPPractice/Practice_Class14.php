<?php
//雖然在父類別中已經有定義過computStandardWeight()，但若在子類別中重新定義此函式，函式內容將會被覆寫(以子類別為主)
//若要在子類別中顯示原本在父類別中的函式(已被覆寫過)，可使用parent::函式名稱
header("Content-Type:text/html; charset = utf-8");
require("Practice_Class11.php");

class AdultPeople extends People{
    public function computStandardWeight(){
        if($this -> int_Age <= 16){
            return parent::computStandardWeight();
        }
        else{
            if($this -> str_Sex == "男"){
                return round(($this -> int_Height -80) * 0.7);
            }
            else{
                return round(($this -> int_Height -70) * 0.6);
            }
        }
    }
}

$BabyObj = new AdultPeople();
$BabyObj -> setData("LittleLeon", "男", "15" , "82", "167");
echo $BabyObj -> str_Name . "的標準體重為：";
echo $BabyObj -> computStandardWeight();
echo "<hr>";

$ManObj = new AdultPeople();
$ManObj -> setData("Leon", "男", "27" , "82", "167");
echo $ManObj -> str_Name . "的標準體重為：";
echo $ManObj -> computStandardWeight();
echo "<hr>";

$WomanObj = new AdultPeople();
$WomanObj -> setData("Jing", "女", "27" , "82", "167");
echo $WomanObj -> str_Name . "的標準體重為：";
echo $WomanObj-> computStandardWeight();

?>