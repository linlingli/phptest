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
    }
    
    static function showMsg($Msg){
        return $Msg;
    } // 與靜態變數相同，使用方法為類別名稱::靜態函式()
                                       // 靜態函式可在物件建構之前就使用。
}

echo Student::showMsg("**********學生成績登入開始**********<hr>");

$stdObj1 = new Student("Leon"); // (內部的值會在__contruct函式處定義)
$stdObj1 -> setData(1, "Leon", "Man", 90, 80, 100);
$stdObj1 -> showData();

$stdObj2 = new Student("Jing");
$stdObj2 -> setData(2, "Jing", "Woman", 100, 80, 90);
$stdObj2 -> showData();

$stdObj3 = new Student("Tamao");
$stdObj3 -> setData(3, "Tamao", "Woman", 80, 90, 100);
$stdObj3 -> showData();

echo Student::showMsg("**********學生成績登入結束**********<hr>");

?>