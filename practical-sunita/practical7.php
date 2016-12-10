<?php
	
	function add()
	{
		
		echo 2+3;
	
	}

	echo add();


		function add1($a,$b)
	{
		
		echo $a+$b;
	
	}

	echo "<br>";
	echo add1(2,6);

		function add2($a=5,$b=6)
	{
		
		echo $a+$b;
	
	}

	echo "<br>";
	echo add2();

	
	
		function add3($a,$b)
	{
		
		return $a+$b;
	
	}

	echo "<br>";
	$c = add3(33,22);
	echo $c;

	
	?>