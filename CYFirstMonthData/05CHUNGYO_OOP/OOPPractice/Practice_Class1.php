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

$stdObj1 -> int_Id      = 1;
$stdObj1 -> str_Name    = "Leon";
$stdObj1 -> str_Sex     = 'Male';
$stdObj1 -> int_Chinese = 90;
$stdObj1 -> int_English = 80;
$stdObj1 -> int_Math    = 100;

$stdObj1 -> showData();
?>