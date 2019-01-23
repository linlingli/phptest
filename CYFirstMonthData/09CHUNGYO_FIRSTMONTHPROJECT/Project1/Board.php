<?php
session_start();

//判定是否有登入
if(isset($_SESSION["MemberNickName"])){
    $CustomerNickName = $_SESSION["MemberNickName"];
}
else{
    $CustomerNickName = "訪客";
}

//判定點進來的討論版是何區
if(isset($_GET["Type"])){
    $board_BoardType = base64_decode($_GET["Type"]); //從上排的超連結傳至此處時
    $_SESSION["page_Type"] = $board_BoardType;
}
else if(isset($_GET["page_Num"])){
    $board_BoardType = $_SESSION["page_Type"]; //選擇觀看第幾頁時
}
else{
    $board_BoardType = $_SESSION["write_Type"]; //發帖完之後傳回時
}


//echo $_SESSION["write_Type"]."<hr>".$board_BoardType."<hr>".$_SESSION["page_Type"];

$_SESSION["view_BoardType"]  = $board_BoardType; //將目前為哪個討論區儲存至SESSION

//開啟資料庫並且顯示相對應類型之帖子
require("OpenSQL.php");

$command_SelectTable = "select * from Board where BoardType ='$board_BoardType' order by BoardID DESC";
$act_SelectTable     = mysqli_query($connect_DB, $command_SelectTable);



//將顯示的資料作分頁顯示
$data_Nums  = mysqli_num_rows($act_SelectTable); 
$per_Data   = 10; 
$total_Data = ceil($data_Nums / $per_Data); 

//選擇了第幾頁的資料
if (!isset($_GET["page_Num"])){ 
    $page_Num = 1; 
} else {
    $page_Num = intval($_GET["page_Num"]); 
}

$Start_Nums = ($page_Num - 1) * $per_Data; 

$command_ShowTable = "select * from Board where BoardType ='$board_BoardType' order by BoardID DESC limit $Start_Nums, $per_Data";
$act_ShowTable     = mysqli_query($connect_DB, $command_ShowTable);
mysqli_close($connect_DB);    

?>
<html>
    <head>
        <?php require("HTML_Effect/Header.php")?>
    </head>
    <body>
        <?php include("HTML_Effect/Bootstrap.php");?>
<!--大圖片區-->
        <div class="jumbotron">
            <div class="container">
                <h1>歡迎進入<?php echo $board_BoardType; ?>討論區！<?php echo "$CustomerNickName" ?></h1>
            </div>
            <div align="center">
            <form id="WriteButten" name="WriteButten" method="post" action="WriteBoard.php?NotLogin=<?php echo urlencode(base64_encode($board_BoardType)); ?>">
                <input type="submit" name="btnWantWrite" value="我要發帖"/>
            </form>    
            </div>
        </div>
<!------固定顯示的帖子格------->
<table width="800" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">    
    <tr>
        <td width="100" align="center">
           筆數 
        </td>
        <td width="540" align="center">
            帖子標題
        </td>
        <td align="center">
            發帖時間
        </td>
    </tr>
</table>

<!--將所有相對應之帖子讀取至此-->
    <?php $i = 1;?>
    <?php while($row_Board = mysqli_fetch_assoc($act_ShowTable)) : ?>
<table width="800" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    
    <tr>
        <td width="100" align="center">
           第 <?php echo $i;?> 筆 
        </td>
        <td width="540">
            <a href="ViewBoard.php?Board=<?php echo urlencode(base64_encode($row_Board["BoardTitle"])); ?>"><?php echo $row_Board["BoardTitle"];?></a>
        </td>
        <td>
            <?php echo $row_Board["BoardDate"];?>
        </td>
    </tr>
</table>
<?php $i++;?>
<?php endwhile ; ?>

<!--分頁顯示區塊-->
<div align="center">
   <?php echo "共 " . $data_Nums . " 筆 - 目前在第 " . $page_Num . " 頁 - 共 " . $total_Data . " 頁<br>";?>
   <a href="?page_Num=1">首頁</a> 
   第
    <?php for($i = 1; $i <= $total_Data; $i++): ?>
        <a href="Board.php?page_Num=<?php echo $i; ?>"><?php echo $i?></a>
    <?php endfor; ?>
    頁
    <a href="?page_Num=<?php echo $total_Data; ?>">最末頁</a>
    <br><br>
</div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>