<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
        // How to resume next when error occured?
        
        $result = "";
        
        for($i = 1; $i <= 9; $i++)
        {
           foo($i);
        }
        
        //echo "這是第 " . $result . " 次執行程式";
        
        
        function foo($i)
        {
        	try{
            	//echo $i . "<br>";
                global $result;
            
                if ($i == 4)
                {
                	$err = new Exception("發生錯誤");
                	throw $err;
                }
                $result .= "$i <br>";
                echo "這是第 " . $i . " 次執行程式 <br>";
            }
            catch(Exception $err){
                echo "<hr>";
        	    echo $err-> getMessage() . "：";
        	    echo "<a href=\"error.php?errNum=$i \">閱讀詳細</a>" . "<hr>";
        	}
        }
        ?>        
    </body>
</html>
