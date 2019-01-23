<?php
// How to resume next when error occured?

$result = "";

for($i = 1; $i <= 9; $i++)
{
   foo($i);
}

echo $result;


function foo($i)
{
	try{
    	//echo $i . "<br>";
        global $result;
    
        if ($i == 4)
        {
        	$err = new Exception("An Error occured !!! ");
        	throw $err;
        }
        //$result .= "$i <br>";
        echo "This is the " . $i . " times to run. <br>";
    }
    catch(Exception $err){
	    echo "<hr>";
	    echo $err-> getMessage() . "It's something wrong when i = " . $i . ", please check your code. <hr>";
	}

}

?>
