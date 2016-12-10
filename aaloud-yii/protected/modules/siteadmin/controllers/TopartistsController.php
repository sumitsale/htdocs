<?php

class TopartistsController extends Controller {
  /**
   * In below function, the parameter id would be such as 1,2 or 3
   */
  public function accessRules() {
    return array(
        array('allow', // allow authenticated user to perform 'create' and 'update' actions
            'actions' => array('index', 'AutocompleteTest'),
            'users' => array('@'),
        ),
    );
  }

  public function actionIndex() {

    $model = new Topartists;
    $model1 = new TblArtists;

    $result = Yii::app()->db->createCommand()
            ->select('*')
            ->from('topartists')
            ->order('priority asc,indate desc')
            ->queryAll();
				
    $con_arr = array();
    if (isset($result) && $result != '') {
      $j = 1;
      foreach ($result as $each) {
        $id = $each['artist_id'];
        $model1 = $this->loadModel($id);
        $model1->priority = $j;
        $con_arr[] = $each['artist_id'];
        $model1->save();
        $j = $j + 1;
      }
    }

    $artistlist = new CActiveDataProvider('Topartists',
                    array(
                        'criteria' => array(
                        ),
                        'sort' => array(
                            'defaultOrder' => 'priority ASC,indate DESC',
                        ),
            ));

    $page_size = 100;

    $criteria = new CDbCriteria();

    $item_count = count($result);

    $pages = new CPagination($item_count);
    $pages->setPageSize($page_size);
    $pages->applyLimit($criteria);

    $end = ($pages->offset + $pages->limit <= $item_count ? $pages->offset + $pages->limit : $item_count);

    $sample = range($pages->offset + 1, $end);

    if (isset($_POST['Topartists']['artist_id']) && $_POST['Topartists']['artist_id'] != '') {
      $model->artist_id = $_POST['Topartists']['artist_id'];
      if (in_array($model->artist_id, $con_arr)) {
        Yii::app()->user->setFlash('success', "Artist is already exist !");
        $this->refresh();
      }
      if (!in_array($model->artist_id, $con_arr)) {
        $model->artist_name = $_POST['TblArtists']['artist_name'];
        $model->priority = $_POST['Topartists']['artist_id'];
        $model->indate = time();
        $model->save(false);
        Yii::app()->user->setFlash('success', "Artist Added Successfully !");
        $this->refresh();
      }
    }

    $this->render('index', array('model' => $model,
        'model1' => $model1,
        'result' => $result,
        'artistlist' => $artistlist,
        'item_count' => $item_count,
        'page_size' => $page_size,
        'pages' => $pages,
        'sample' => $sample));
  }

  public function actionAutocompleteTest() {
    $res = array();
    $model1 = new ContentDetails;
    if (isset($_GET['term'])) {
      //$qtxt ="SELECT student_name FROM student_master WHERE student_name LIKE :student_name";
      //$command =Yii::app()->db->createCommand($qtxt);	
      $command = Yii::app()->db2->createCommand()
              ->select('ta.ARTIST_ID,ta.ARTIST_NAME')
              ->from('TBL_ARTISTS ta')
			  ->join('TBL_ARTIST_ROLE_MAP tarm','ta.ARTIST_ID=tarm.ARTIST_ID')
              ->where('tarm.ARTIST_ROLE_ID=31 and ARTIST_NAME LIKE :ARTIST_NAME ', array(':ARTIST_NAME' => $_GET['term'] . '%'));

      $res = $command->queryAll();
    }

    //echo CJSON::encode($res);

    $arr = array();
    for ($i = 0; $i < count($res); $i++) {
      $arr[] = array(
          'label' => $res[$i]['ARTIST_NAME'], // label for dropdown list    
          'value' => $res[$i]['ARTIST_NAME'],
          'id' => $res[$i]['ARTIST_ID']            // return value from autocomplete
      );
    }


    echo CJSON::encode($arr);
    Yii::app()->end();
  }

  public function actionDelete() {
    $model = new Topsongs;

    $artist_id = $_POST['id'];
	

    $command = Yii::app()->db->createCommand()
            ->delete('topartists', 'artist_id=:id', array(':id' => $artist_id));

    if ($command) {
      Yii::app()->user->setFlash('success', "Deleted Successfully");
    }
    $this->redirect('index');
  }

  public function loadModel($id) {
    $model = Topartists::model()->findByPk($id);
    if ($model === null)
      throw new CHttpException(404, 'The requested page does not exist.');
    return $model;
  }

  public function actionPriority() {

    $id = $_GET['id'];

    if (isset($_GET['id']) && $_GET['id'] != '') {
      if ($_GET['priority'] == 0) {
        $priority = '1';
      } else {
        $priority = $_GET['priority'];
      }
      $model = $this->loadModel($id);
      $model->indate = time();
      $model->priority = $priority;
      $model->save();
      if (isset($_GET['ppriority']) && $_GET['ppriority'] == 'down') {

        $model1 = Topartists::model()->find('artist_id!=:PLAYERID AND priority=:PRIORITY', array(':PLAYERID' => $id, ':PRIORITY' => $priority));
        //print_r($model);exit;
        if (count($model1) != 0) {
          $priority = $priority - 1;
          $model1->indate = time();
          $model1->priority = $priority;
          $model1->save();
        }
      }
      //echo $priority;

      $this->redirect('index');
    }
  }
			public function actionSort()
	{
	
			$mixedId = $_POST['dir'];
			$arr = explode('-',$mixedId);
			$dir = $arr[0];  //direction example up & down
			$artistId = $arr[1];		//id of the artist
			$id = $artistId;
			$priority = $arr[2];
			////
	
	    if (isset($artistId) && $artistId != '') 
			{
					if ($priority == 0) 
					{
								$priority = '1';
					} 
					else 
					{
								$priority = $priority;
					}
					$model = $this->loadModel($id);
					$model->indate = time();
					$model->priority = $priority;
					$model->save();
					if (isset($dir) && $dir == 'down') 
					{

							$model1 = Topartists::model()->find('artist_id!=:PLAYERID AND priority=:PRIORITY', array(':PLAYERID' => $id, ':PRIORITY' => $priority));
							
							if (count($model1) != 0) 
							{
									$priority = $priority - 1;
									$model1->indate = time();
									$model1->priority = $priority;
									$model1->save();
							}
					}

			}
	
	
			/////
    $model = new Topartists;
    $model1 = new TblArtists;

    $result = Yii::app()->db->createCommand()
            ->select('*')
            ->from('topartists')
            ->order('priority asc,indate desc')
            ->queryAll();
				
    $con_arr = array();
    if (isset($result) && $result != '') {
      $j = 1;
      foreach ($result as $each) {
        $id = $each['artist_id'];
        $model1 = $this->loadModel($id);
        $model1->priority = $j;
        $con_arr[] = $each['artist_id'];
        $model1->save();
        $j = $j + 1;
      }
    }

    $artistlist = new CActiveDataProvider('Topartists',
                    array(
                        'criteria' => array(
                        ),
                        'sort' => array(
                            'defaultOrder' => 'priority ASC,indate DESC',
                        ),
            ));

    $page_size = 100;

    $criteria = new CDbCriteria();

    $item_count = count($result);

    $pages = new CPagination($item_count);
    $pages->setPageSize($page_size);
    $pages->applyLimit($criteria);

    $end = ($pages->offset + $pages->limit <= $item_count ? $pages->offset + $pages->limit : $item_count);

    $sample = range($pages->offset + 1, $end);

		  $xxx = $this->renderPartial('dynamic', array('model' => $model,
        'result' => $result,
        'artistlist' => $artistlist,
        'item_count' => $item_count,
        'page_size' => $page_size,
        'pages' => $pages,
        'sample' => $sample));
									echo $xxx;
				
				
	}
	
}

?>