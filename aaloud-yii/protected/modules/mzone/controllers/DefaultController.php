<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->layout=false;
		
		$genre=Yii::app()->db2->createCommand()
						->select('*')
						->from('TBL_GENRES')
						->queryAll();
		
		$lang = Yii::app()->db2->createCommand()
					 ->select('*')
					 ->from('TBL_LANGUAGES')
					 ->queryAll();
					 
		$topsongxml = simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/' . "top-10-songs.xml");			 
						//echo "<pre>";
					//print_r($topsongxml);exit;
		
		$this->render('index',array(
									'genre'=>$genre,
									'lang'=>$lang,
									'topsongxml'=>$topsongxml,
												));
				
	}

}

?>