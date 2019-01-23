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

    private $total_scores; //只能在定義的該類別中使用。
    private $average_scores;
    
    const title = "學生資料"; //類別常數定義：const
                              //使用方法為 類別名稱::類別常數，若在自己類別內使用的話，亦可用 self::類別常數
                              //不需要等物件生成即可使用。
    private function totalScores(){
        return $this -> int_Chinese + $this -> int_English + $this -> int_Maths;
    }
    private function averageScores(){
        return round($this -> total_scores / 3);
    }
    
    public function setData($Id, $Name, $Sex, $Chinese, $English, $Math){
        $this -> int_Id         = $Id;
        $this -> str_Name       = $Name;
        $this -> str_Sex        = $Sex;
        $this -> int_Chinese    = $Chinese;
        $this -> int_English    = $English;
        $this -> int_Math       = $Math;
        $this -> total_scores   = $this -> totalScores();
        $this -> average_scores = $this -> averageScores();
    }
    
    public function showData(){
        echo "座號："     . $this -> int_Id         . "<hr>"; // $this 代表物件本身。
        echo "姓名："     . $this -> str_Name       . "<hr>";
        echo "性別："     . $this -> str_Sex        . "<hr>";
        echo "國文成績：" . $this -> int_Chinese    . "<hr>";
        echo "英文成績：" . $this -> int_English    . "<hr>";
        echo "數學成績：" . $this -> int_Math       . "<hr>";
        echo "總分："     . $this -> total_scores   . "<hr>";
        echo "平均分數：" . $this -> average_scores . "<hr>";
        echo "*****" .self::title . "結束*****<hr>";
    }
    
}

echo "*****".Student::title."開始*****<hr>";

$stdObj1 = new Student("Leon"); // (內部的值會在__contruct函式處定義)
$stdObj1 -> setData(1, "Leon", "Man", 90, 80, 100);
$stdObj1 -> showData();

$stdObj2 = new Student("Jing");
$stdObj2 -> setData(2, "Jing", "Woman", 100, 80, 90);
$stdObj2 -> showData();

$stdObj3 = new Student("Tamao");
$stdObj3 -> setData(3, "Tamao", "Woman", 80, 90, 100);
$stdObj3 -> showData();


?>