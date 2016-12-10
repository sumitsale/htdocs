<?php

class Artist_nomination_voteController extends Controller
{
	public function actionIndex()
	{
	$model=new TblArtistNominationVote;
	
	$genre = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =1')
            ->order('g.GENRE_NAME asc')
            ->queryAll();
	
		$this->render('index',
		array(
		'model'=>$model,
		'genre'=>$genre,
		));
	}
	
	public function actionSearch()
	{
	$genrename='';
	$model=new TblArtistNominationVote;
	
		$genre = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
			->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
			->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
			->where('c.CONTENT_TYPE_ID =1')
            ->order('g.GENRE_NAME asc')
            ->queryAll();
	
			if(isset($_POST['TblArtistNominationVote']))
			{
			$genrename=$_POST['TblArtistNominationVote']['GENERE'];

			}
			
			
			
			$this->render('search',
		array(
		'model'=>$model,
		'genre'=>$genre,
		'genrename'=>$genrename,
		));

	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}