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
    static public $countNum=0; //靜態變數設定：static
                               //欲使用靜態變數時，要加上類別(物件)名稱::$靜態變數，且無法使用$this來存取
                               //靜態變數類似全域變數，由此類別建造出來的物件均可使用。
    
    private $total_scores; //只能在定義的該類別中使用。
    private $average_scores;
    
    private function totalScores(){
        return $this -> int_Chinese + $this -> int_English + $this -> int_Maths;
    }
    private function averageScores(){
        return round($this -> total_scores / 3);
    }
    
    
    public function __construct($stdName){
        echo "********".$stdName."同學成績登入開始*********<hr>";
        Student::$countNum++;
    }
    
    public function __destruct(){
        echo "********同學成績登入結束*********<hr>";
        Student::$countNum--;
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
}

$stdObj1 = new Student("Leon"); // (內部的值會在__contruct函式處定義)
$stdObj1 -> setData(1, "Leon", "Man", 90, 80, 100);
$stdObj1 -> showData();
$stdObj1 = NULL; //當不再使用此物件時加入，並且可以呼叫 __destruct()，而__desstruct()中的()內不可以寫值

$stdObj2 = new Student("Jing");
$stdObj2 -> setData(2, "Jing", "Woman", 100, 80, 90);
$stdObj2 -> showData();

$stdObj3 = new Student("Tamao");
$stdObj3 -> setData(3, "Tamao", "Woman", 80, 90, 100);
$stdObj3 -> showData();

echo "目前學生的物件有 " . Student::$countNum . " 個";
?>