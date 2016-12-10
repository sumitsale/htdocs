<?php
$temp = array();

		for($i=1; $i<=100; $i++)
		{
			$temp[$i-1]=$i;

		}
		
		echo "<pre>";
		//print_r($temp);
		
		echo array_sum($temp);
		
		echo "<br>";
		
		echo (100*(100+1)/2);
		
		echo "<br>";
		
		$temp=0;
		for($i=1; $i<=100; $i++)
		
	{
	
		$temp+=$i;
		
	
	
	}
	
	echo $temp;
		
		
?>