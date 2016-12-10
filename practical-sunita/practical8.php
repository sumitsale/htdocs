<?php

	$str = "sunita";
	
	for ($i=0;$i<=(strlen($str)-1); $i++)
	{

		echo $str[$i];
		echo "<br>";
	
	}	

	
		echo "<br>";
		echo "<br>";
		echo "<br>";
		
		for ($i=(strlen($str)-1);$i>=0;$i--)
	{

		echo $str[$i];
		echo "<br>";
	
	}	
	echo strrev($str);
	
	?>
