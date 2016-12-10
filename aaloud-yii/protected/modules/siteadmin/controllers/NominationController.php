<?php

class NominationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','addnomination','artist_nomination_ajax','dataFromThis','deleteData'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionDataFromThis() {
		
		if(isset($_POST['TblArtistNomination']['NOMINATION_FOR'])){
		$genere  = mysql_escape_string(trim($_POST['TblArtistNomination']['GENERE']));
		$nomination_for = mysql_escape_string(trim($_POST['TblArtistNomination']['NOMINATION_FOR']));
		//echo $genere ."<br/>". $nomination_for ;exit;
		//$data = TblArtistNomination::model()->findAll('NOMINATION_FOR=:NOMINATION_FOR' && 'GENERE=:GENERE', array(':NOMINATION_FOR' => $nomination_for ,':GENERE' => $genere));
		$result=Yii::app()->db->createCommand()
											->select('*')
											->from('tbl_artist_nomination')
											->where('GENERE=:genre and NOMINATION_FOR=:nominationfor',array(':genre'=>$genere,':nominationfor'=>$nomination_for))
											->queryAll();
										/*	$nominationId = Yii::app()->tbl_artist_nomination->NOMINATION_ID;
											$dataProvider = new CActiveDataProvider('tbl_artist_nomination',
																array(
																		'criteria'=>array(
											'condition'=>'result=:nominationId',
											'params'=>array(':nominationId'=>$nominationId),
										 ),
																		'pagination'=>array(
																							'pageSize'=>3,
																							),
																		));*/

												$res = $this->renderPartial('display', array(
											   		'result' => $result,
													));
											echo $res;
																					
											//echo "<pre>";
											//print_r($result);exit;
											
															
	
		}
		}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TblArtistNomination;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		
		$genrelist = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =1')
            ->order('g.GENRE_NAME asc')
            ->queryAll();
		
		
	
		if(isset($_POST['TblArtistNomination']))
		{
			$model->attributes=$_POST['TblArtistNomination'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->NOMINATION_ID));
		}

		$this->render('create',array(
			'model'=>$model,
			'genrelist'=>$genrelist,
		));
	}

	
	public function actionAddnomination()
	{
		
		$model=new TblArtistNomination;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		
		$genrelist = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =1')
            ->order('g.GENRE_NAME asc')
            ->queryAll();
		
		$G_result = Yii::app()->db->createCommand()
															->select('GENERE')
															->from('tbl_artist_genere_week')
															->queryAll();
		
		//echo "<pre>";
		//print_r($G_result);exit;
		
		
if(isset($_REQUEST['artistvote']) && $_REQUEST['artistvote']=='Save')
{
//	print_r($_POST);exit;
		
		$genere  = mysql_escape_string(trim($_POST['TblArtistNomination']['GENERE']));
				
		$nomination_for = mysql_escape_string(trim($_POST['TblArtistNomination']['NOMINATION_FOR']));
		//echo $genere,$nomination_for;exit;
		$totalValue	   = mysql_escape_string(trim($_REQUEST["count"]));
	
	 for($i=1; $i <= $totalValue;$i++){
	
		$contentId = $_REQUEST["contentId_".$i];
					
		if($contentId!='' && $contentId!=0)
		 {
		 	$model=new TblArtistNomination;
			 $model->GENERE=$genere;
			 $model->NOMINATION_FOR=$nomination_for;
			 $model->CONTENT_ID=$contentId;
			  
			 if($model->save())
			 {
			 Yii::app()->user->setFlash('success',"Nomination Added Successfully");
			}
		 } 
		}
	 }
	//echo"<pre>";print_r($_REQUEST);exit;
//}

// updated table tbl_artist_genere_week for selected genere for the week.
if(isset($_REQUEST['genere_week']) && $_REQUEST['genere_week']=='Update')
{
	
	$genereweek  = mysql_escape_string(trim($_REQUEST['GENERE']));
	//echo $genereweek;exit;
	//$qryUpdate = "update tbl_artist_genere_week set UPDATED_ON='".time()."',GENERE='".$genereweek."'";
	//$resUpdate = mysql_query($qryUpdate);
		
		$command=Yii::app()->db->createCommand()
								->update('tbl_artist_genere_week', 
										  array('GENERE'=>$genereweek,'UPDATED_ON'=>time()));	
												
		Yii::app()->user->setFlash('success',"Genre Updated Successfully");	
		$this->redirect(array('addnomination'));
			
	
}

	
		if(isset($_POST['TblArtistNomination']))
		{
			$model->attributes=$_POST['TblArtistNomination'];
			if($model->save())
				$this->redirect(array('addnomination'));
		}

		$this->render('addnomination',array(
			'model'=>$model,
			'genrelist'=>$genrelist,
			'G_result'=>$G_result,
		));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblArtistNomination']))
		{
			$model->attributes=$_POST['TblArtistNomination'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->NOMINATION_ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

		public function actionArtist_nomination_ajax()
	{
		
		/*$this->render('artist_nomination_ajax',array(
			'model'=>$model,
		));*/
		$res = $this->renderPartial('artist_nomination_ajax', array(
        'model'=>$model,
            ));
    echo $res;
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//print_r($_POST);exit;
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('addnomination'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	public function actionDeleteData()
	{
		$NOMINATION_ID='';
		$genere='';
		$nomination_for='';
	
		$NOMINATION_ID=$_POST['nominationId'];
		$genere=$_POST['curr_genere'];
		$nomination_for=$_POST['nominationfor'];
		$model=$this->loadModel($NOMINATION_ID);
		
		if(Yii::app()->request->isAjaxRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			 $model->delete();
		}
			 $result=Yii::app()->db->createCommand()
											->select('*')
											->from('tbl_artist_nomination')
											->where('GENERE=:genre and NOMINATION_FOR=:nominationfor',array(':genre'=>$genere,':nominationfor'=>$nomination_for))
											->queryAll();
											
											$res = $this->renderPartial('display', array(
											   		'result' => $result,
													));
											//echo $res;
				
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TblArtistNomination');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblArtistNomination('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblArtistNomination']))
			$model->attributes=$_GET['TblArtistNomination'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=TblArtistNomination::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-artist-nomination-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
