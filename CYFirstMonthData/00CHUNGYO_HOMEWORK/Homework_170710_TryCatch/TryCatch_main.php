<?php

// How to resume next when error occured?

$result = "";

for($i = 1; $i <= 9; $i++)
{
   try{
   foo($i);
   }
   catch(Exception $err){
	    echo "<hr>";
	    echo $err-> getMessage() . "It's something wrong when i = " . $i . ", please check your code. <hr>";
   }
}

echo $result;


function foo($i)
{
	//echo $i . "<br>";
    global $result;

    if ($i == 4)
    {
    	$err = new Exception("An Error occured !!! ");
    	throw $err;
    }
    echo "This is the " . $i . " times to run. <br>";
    //$result .= "$i <br>";
}
?>
