<?php
public function actionMisc()
	{
	$model=new TblAaMisc;
	
	
			if(isset($_POST['TblAaMisc']))
			{
			
			print_r($_POST);exit;
			
			$miscid=$_POST['TblAaMisc']['miscid'];
			
			//echo $contentid;
			
			$last=time();
			
			//echo $last;
			
			//echo $id;exit;
			
					
			/*
		$command=Yii::app()->db->createCommand()
		   		->update('tbl_aa_pow', 
		   		          array('CONTENT_ID'=>$contentid,'LAST_UPDATE'=>time()),
        				'POW_ID=:id', array(':id'=>$id));					
	        */	
		
		$command=Yii::app()->db->createCommand()
		   		->update('tbl_aa_misc', 
		   		          array('EXCLUSIVE_NEWS'=>$excluid,'FEATURED_ARTIST'=>$fartistid,'LAST_UPDATE'=>time()),
        				  'MISC_ID=:id', array(':id'=>$id));				
			
			}
				
		$query="select * from tbl_aa_misc order by MISC_ID Limit 1";	
	
							$connection = Yii::app()->db;
							$command = $connection->createCommand($sql);
							$misc_query = $command->queryAll();
							
							//print_r($misc_query);exit;
		
		$sql="select Press_id,Press_News_Title from tbl_aa_press Where Press_News_Status in ('P','H') and Press_News_Type='E' order by Press_LastUpdate desc";	
	
							$connection = Yii::app()->db;
							$command = $connection->createCommand($sql);
							$exclusive = $command->queryAll();	
							
							
							//print_r($exclusive);exit;
		$sql1="select Artist_Id,Artist_Name from tbl_aa_artist Where Artist_Status in ('P','H') order by Artist_Name";	
	
							$connection = Yii::app()->db;
							$command = $connection->createCommand($sql1);
							$fartist = $command->queryAll();
	
	
	
		$this->render('updatepow',array(
			'model'=>$model,
			'misc_query'=>$misc_query,
			'exclusive'=>$exclusive,
			'fartist'=>$fartist,
		));
	
	
	}