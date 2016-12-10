<?php

class hideartist
{

  
		public function __construct() 
		{
			// echo "hi";exit;
		}

		public function hideartist()
		{
				$hiddenartist = Yii::app()->db->createCommand()
						->select('*')
						->from('hideartist')
						 ->queryAll();
						 
						 // echo "<pre>";
						 // print_r($hiddenartist);
						 // echo $hiddenartist[0]['artistid'];
						 // exit;
						 
						  $artistid = '';

						for ($i = 0; $i < count($hiddenartist); $i++) {
						  $artistid .= $hiddenartist[$i]['artistid'] . ",";
						}
						 
							$artistid = substr($artistid, 0, -1);
							$array_artistid = '';
							$array_artistid = array();
							$array_artistid = explode(',', $artistid);
							
							
			return 	$array_artistid;		
		}
}

?>