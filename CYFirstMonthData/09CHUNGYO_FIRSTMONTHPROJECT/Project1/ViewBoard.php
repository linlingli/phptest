<?php
session_start();

//確認選擇的文章為何(並判斷從哪個網頁轉來)
if(isset($_GET["Board"])){ //從Board.php進入此頁時
    $view_BoardTitle = base64_decode($_GET["Board"]);
    $_SESSION["page_Title"] = $view_BoardTitle;
}
else if(isset($_SESSION["view_BoardTitle"])){ //從留言頁回到此頁時
    $view_BoardTitle = $_SESSION["view_BoardTitle"];
}
else{
    $view_BoardTitle = $_SESSION["page_Title"]; //觀看不同頁面的留言時
}


//讀取相對應之資料表
$view_BoardType = $_SESSION["view_BoardType"]; // 將選擇的討論區存入此頁


include("OpenSQL.php");

$command_SelectBoard = "select * from Board where BoardType = '$view_BoardType' and BoardTitle = '$view_BoardTitle'";

$act_SelectBoard     = mysqli_query($connect_DB, $command_SelectBoard);
$row_BoardData       = mysqli_fetch_assoc($act_SelectBoard);

$view_WriterID       = $row_BoardData["BoardID"];
$view_WriterNickName = $row_BoardData["BoardNickName"];
$view_WriterDate     = $row_BoardData["BoardDate"];
$view_WriterType     = $row_BoardData["BoardType"];
$view_WriterTitle    = $row_BoardData["BoardTitle"];
$view_WriterContent  = $row_BoardData["BoardContent"];


//讀取留言資料
$view_MessageType      = $view_WriterType . $view_WriterID;

$command_SelectMessage = "select * from Board where BoardType = '$view_MessageType' order by BoardDate DESC";
$act_SelectMessage     = mysqli_query($connect_DB, $command_SelectMessage);


//將顯示的資料作分頁顯示
$data_Nums  = mysqli_num_rows($act_SelectMessage); //計算目前選擇了幾筆資料
$per_Data   = 20; //每頁顯示10筆資料
$total_Data = ceil($data_Nums / $per_Data); //共需要用幾頁來顯示

//選擇了第幾頁的資料
if (!isset($_GET["page_Num"])){ //假如$_GET["page_Num"]未設置
    $page_Num=1; //則在此設定起始頁數
} else {
    $page_Num = intval($_GET["page_Num"]); //確認頁數只能夠是數值資料
}
$Start_Nums = ($page_Num - 1) * $per_Data; //每一頁開始的資料序號

$command_ShowTable = "select * from Board where BoardType = '$view_MessageType' order by BoardDate DESC limit $Start_Nums, $per_Data";
$act_ShowTable     = mysqli_query($connect_DB, $command_ShowTable);
mysqli_close($connect_DB);  


?>

<!DOCTYPE html>
<html>
    <head>
        <?php require("HTML_Effect/Header.php"); ?>
    </head>
    <body>
        <?php require("HTML_Effect/Bootstrap.php"); ?>
<!--帖子內容-->
<table width="1000" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
        <td width="80" align="center" valign="baseline"><h3>標題：</h3></td>
        <td width="1000" align="center" valign="baseline" colspan="5"><h3><?php echo $view_WriterTitle?></h3></td>
    </tr>
    
    <tr>
        <td width="80" align="center" valign="baseline">發帖者：</td><td width="200" align="center"><?php echo $view_WriterNickName; ?></td>
        <td width="100" align="center" valign="baseline">帖子類型：</td><td width="300" align="center"><?php echo $view_WriterType; ?></td>
        <td width="100" align="center" valign="baseline">發帖時間：</td><td align="center"><?php echo $view_WriterDate; ?></td>
    </tr>
            
    <tr>
        <td colspan="6">內容：
        <br>
        <?php echo $view_WriterContent; ?>
        </td>
    </tr>
</table>

<!--將相對應之留言貼至此頁面-->
<table width="1000" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
        <td width="100" align="center">回覆者</td> <td width="500" align="center">回覆內容</td> <td width="100" align="center">回覆時間</td>
    </tr>
    
    <?php while($row_MessageData = mysqli_fetch_assoc($act_ShowTable)): ?>
        <tr>
            <td align="center"><?php echo $row_MessageData["BoardNickName"]; ?></td> <td><?php echo nl2br($row_MessageData["BoardContent"]); ?></td> <td align="center"><?php echo $row_MessageData["BoardDate"]; ?></td>
        </tr>
    <?php endwhile; ?>
    <tr>
        <form id="MessageBox" name="MessageBox" method="post" action="WriteMessage.php?Message=<?php echo urlencode(base64_encode($view_WriterTitle)); ?>">
            <td colspan="6" align="center">
                <input type="submit" name="btnWrite" value="我要回覆"/>    
            </td>
        </form>
    </tr>
</table>

<!--分頁顯示區塊-->
<div align="center">
   <?php echo "共 " . $data_Nums . " 筆 - 目前在第 " . $page_Num . " 頁 - 共 " . $total_Data . " 頁<br>";?>
   <a href="?page_Num=1">首頁</a> 
   第
    <?php for($i = 1; $i <= $total_Data; $i++): ?> 
        <a href="?page_Num=<?php echo $i; ?>"><?php echo $i?></a>
    <?php endfor; ?>
    頁
    <a href="?page_Num=<?php echo $total_Data; ?>">最末頁</a>
    <br><br>
</div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>