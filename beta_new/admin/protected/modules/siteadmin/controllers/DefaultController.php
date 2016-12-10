<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	
	public function actionLogin()
		{
	
		$this->layout=false;

		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			Yii::app()->user->setReturnUrl('index');
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			
				$this->redirect(Yii::app()->user->returnUrl);
				//$this->redirect(RETURNURL);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	  }
	
	
	public function actionLogout() {
        Yii::app()->user->logout(false);
		
        $this->redirect(Yii::app()->getModule('siteadmin')->user->loginUrl);
    }
	
	public function actionPreview()
	{

	$this->render('preview');
	}
	
	public function actionffmpeg()
	{
	
	

	
	$path=$_SERVER['DOCUMENT_ROOT'];
	

	
	$path.=Yii::app()->baseUrl;

		$ffmpeg=$_SERVER['DOCUMENT_ROOT'].Yii::app()->baseUrl."/ffmpeg.exe";
		
		//echo $ffmpeg;exit;
		
		$video =  $path."/videos/1.flv";
		
		
	    $thumbnail = $path."/videothumbnail/33.jpg";
		
		//echo "<br>".$video;
		
		//echo "<br>".$thumbnail;
		
		//exec('ffmpeg -i '.$video.' -f flv -s 320x240 '.$thumbnail.'');

	// shell command [highly simplified, please don't run it plain on your script!]
	//shell_exec("ffmpeg -i $video -deinterlace -an -ss 1 -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $thumbnail 2>&1");
	
	echo $ffmpeg."<br>".$video."<br>".$thumbnail;
	
	
	//shell_exec("$ffmpeg -i $video -deinterlace -an -ss 1 -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $thumbnail");
	
exec("d:/xampp/htdocs/mobisur/ffmpeg.exe -i d:/xampp/htdocs/mobisur/videos/video.mp4 -ab 56 -ar 44100 -b 200 -r 15 -s 320x240 -f flv d:/xampp/htdocs/mobisur/convertedvideo/video_finale.flv");
	
	//shell_exec("$ffmpeg -y -i $video -c:v copy d:/xampp/htdocs/mobisur/convertedvideo/video_finale.m4v");
	
	shell_exec("$ffmpeg -i $video -an -ar 44100 -b 300k -s 320x240 -vcodec mpeg4 d:/xampp/htdocs/mobisur/convertedvideo/2.m4v");
	
	 $size = '320x240';
	$interval = 5;

	
	shell_exec("$ffmpeg -i $video -deinterlace -an -ss $interval -f mjpeg -t 1 -r 1 -y -s $size $thumbnail 2>&1");
	echo "<br>end";
	
	}
	
}