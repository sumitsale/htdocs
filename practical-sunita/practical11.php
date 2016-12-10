<?php

$array1=array();
$array2=array();

	for($i=1; $i<=100; $i++)
		{
			if($i%2==0)
			
			{
			//echo $i."<br>";
			array_push($array1, $i);
			}
		else
		{
		array_push($array2, $i);
		}
		}
		echo "<pre>";
		print_r($array1);
		print_r($array2);
		
				
		
?>