<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
</html>
<?php
class Student{
    var $int_Id;
    var $str_Name;
    var $str_Sex;
    var $int_Chinese;
    var $int_English;
    var $int_Maths;
    
    function setData($Id, $Name, $Sex, $Chinese, $English, $Math){
        $this -> int_Id      = $Id;
        $this -> str_Name    = $Name;
        $this -> str_Sex     = $Sex;
        $this -> int_Chinese = $Chinese;
        $this -> int_English = $English;
        $this -> int_Math    = $Math;
    }
    
    function showData(){
        echo "座號："     . $this -> int_Id      . "<hr>"; // $this 代表物件本身。
        echo "姓名："     . $this -> str_Name    . "<hr>";
        echo "性別："     . $this -> str_Sex     . "<hr>";
        echo "國文成績：" . $this -> int_Chinese . "<hr>";
        echo "英文成績：" . $this -> int_English . "<hr>";
        echo "數學成績：" . $this -> int_Math    . "<hr>";
    }
}

$stdObj1 = new Student();
$stdObj1 -> setData(1, "Leon", "Man", 90, 80, 100);
$stdObj1 -> showData();

$stdObj2 = new Student();
$stdObj2 -> setData(2, "Jing", "Woman", 100, 80, 90);
$stdObj2 -> showData();
?>