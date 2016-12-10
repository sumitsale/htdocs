<?php

$array1=array();
$array2=array();

	for($i=1; $i<=100; $i++)
		{
			if($i%5==0 && $i%7==0)
			
			{
			//echo $i."<br>";
			array_push($array1, $i);
			}
		
		}
		echo "<pre>";
		print_r($array1);
		
		
				
		
?>