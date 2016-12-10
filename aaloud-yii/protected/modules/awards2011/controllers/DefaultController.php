<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->layout=false;
		
$user='';
$user_profile='';
$loginUrl='';
$logoutUrl='';
$facebook='';
		
		/*
		Yii::import('application.vendors.*');
		require_once('facebookSdk/facebook.php');

		$facebook = new Facebook(array(
		  'appId'  => Yii::app()->params['appId'],
		  'secret' => Yii::app()->params['secret'] 
		));
		*/
			
				$genreoftheweek=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_artist_genere_week')
								->queryAll();
								
				$bestsong=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_artist_nomination')
								->where("GENERE=:genre and NOMINATION_FOR=:nominationfor and CONTENT_ID != ''",array(':genre'=>$genreoftheweek[0]['GENERE'],':nominationfor'=>'BS'))
								->queryAll();
								
											
				$bestmale=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_artist_nomination')
								->where("GENERE=:genre and NOMINATION_FOR=:nominationfor and CONTENT_ID != ''",array(':genre'=>$genreoftheweek[0]['GENERE'],':nominationfor'=>'BM'))
								->queryAll();
								//echo "<pre>";
								//print_r($bestmale);exit;
											
				$bestfemale=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_artist_nomination')
								->where("GENERE=:genre and NOMINATION_FOR=:nominationfor and CONTENT_ID != ''",array(':genre'=>$genreoftheweek[0]['GENERE'],':nominationfor'=>'BF'))
								->queryAll();


				$bestgenre=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_artist_nomination')
								->where("GENERE=:genre and NOMINATION_FOR=:nominationfor and CONTENT_ID != ''",array(':genre'=>$genreoftheweek[0]['GENERE'],':nominationfor'=>'BGNR'))
								->queryAll();											
											
											
				$bestgroup=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_artist_nomination')
								->where("GENERE=:genre and NOMINATION_FOR=:nominationfor and CONTENT_ID != ''",array(':genre'=>$genreoftheweek[0]['GENERE'],':nominationfor'=>'BG'))
								->queryAll();
											
										
												
												
				$mostvotedsong=Yii::app()->db->createCommand()
								->select('CONTENT_ID,count(CONTENT_ID) AS total')
								->from(' tbl_artist_nomination_vote')
								->where('GENERE=:genre and NOMINATION_FOR=:nominationfor',array(':genre'=>$genreoftheweek[0]['GENERE'],':nominationfor'=>'BS'))
								->group('CONTENT_ID')
								->order('total DESC')
								->limit('5')
								->queryAll();
								
				$mostvotedmale=Yii::app()->db->createCommand()
								->select('CONTENT_ID,count(CONTENT_ID) AS total')
								->from(' tbl_artist_nomination_vote')
								->where('GENERE=:genre and NOMINATION_FOR=:nominationfor',array(':genre'=>$genreoftheweek[0]['GENERE'],':nominationfor'=>'BM'))
								->group('CONTENT_ID')
								->order('total DESC')
								->limit('5')
								->queryAll();
								
				$mostvotedfemale=Yii::app()->db->createCommand()
								->select('CONTENT_ID,count(CONTENT_ID) AS total')
								->from(' tbl_artist_nomination_vote')
								->where('GENERE=:genre and NOMINATION_FOR=:nominationfor',array(':genre'=>$genreoftheweek[0]['GENERE'],':nominationfor'=>'BF'))
								->group('CONTENT_ID')
								->order('total DESC')
								->limit('5')
								->queryAll();
								
				$mostvotedgroup=Yii::app()->db->createCommand()
								->select('CONTENT_ID,count(CONTENT_ID) AS total')
								->from(' tbl_artist_nomination_vote')
								->where('GENERE=:genre and NOMINATION_FOR=:nominationfor',array(':genre'=>$genreoftheweek[0]['GENERE'],':nominationfor'=>'BG'))
								->group('CONTENT_ID')
								->order('total DESC')
								->limit('5')
								->queryAll();
				
			
			
			/*
			// See if there is a user from a cookie
			$user = $facebook->getUser();

			if ($user) {
				try {
				// Proceed knowing you have a logged in user who's authenticated.
				$user_profile = $facebook->api('/me');
				} catch (FacebookApiException $e) {
				//echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
				$user = null;
				}
			}
			
			if((Yii::app()->session['H_LOGINFROM']=='F') && !(isset($user)))
			{
			 session_start();

  
				Yii::app()->session['H_LOGINFROM'] = "";
				Yii::app()->session['H_USERID'] = "";
				Yii::app()->session['H_FULL_NAME'] = "";
				

			session_destroy();
			}
	
			if ($user) {
				try {		
					$user_profile = $facebook->api('/me');
						
					
						
					$session = new CHttpSession;
					$session->open(); 
							
					Yii::app()->session['H_LOGINFROM'] = "F";
					Yii::app()->session['H_USERID']= $user_profile['id'];
					Yii::app()->session['H_FULL_NAME'] =$user_profile['first_name'];
					
					// Proceed knowing you have a logged in user who's authenticated.
			
					$model=new TblArtistNominationVoteFb;
					
					$myfbid = $user_profile['id'];
					
					
					$userexist = TblArtistNominationVoteFb::model()->find("FB_USER_ID = '$myfbid'");
					
					if($userexist['FB_USER_ID'] != $myfbid)
					{
						//$model->FB_USER_ID =$user_profile['id'];
						//$model->FB_FNAME  =$user_profile['first_name'];
						//$model->FB_LNAME =$user_profile['last_name'];
						//$model->FB_EMAIL  =$user_profile['email'];
		
						$command=Yii::app()->db->createCommand()
						->insert('tbl_artist_nomination_vote_fb', array(
								'FB_USER_ID'=>$user_profile['id'],
								'FB_FNAME'=>$user_profile['first_name'],
								'FB_LNAME'=>$user_profile['last_name'],
								'FB_EMAIL'=>$user_profile['email'],
							));
		//echo "<pre>";
		//print_r($model->attributes);exit;
		
						$model->save();
					}
				} catch (FacebookApiException $e) {
					echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
					$user = null;
				}
			}
			
			
			*/
			/*
			if(isset($user) && (Yii::app()->session['H_LOGINFROM']=='F') )
			{
			 session_start();

  
				Yii::app()->session['H_LOGINFROM'] = "";
				Yii::app()->session['H_USERID'] = "";
				Yii::app()->session['H_FULL_NAME'] = "";
				

			session_destroy();
			}*/
			/*
			// Login or logout url will be needed depending on current user state.
			$logoutUrl='';
			$loginUrl='';
			if ($user) {
				$logoutUrl = $facebook->getLogoutUrl();
			} else {
				$loginUrl = $facebook->getLoginUrl();
			}
	*/
		$model=new TblArtistNominationVoteFb;
		//echo "<pre>";
		//print_r($myuid);exit;
		$this->render('index' ,array(
			'bestsong'=>$bestsong,
			'bestmale'=>$bestmale,
			'bestfemale'=>$bestfemale,
			'bestgenre'=>$bestgenre,
			'bestgroup'=>$bestgroup,
			'genreoftheweek'=>$genreoftheweek,
			'mostvotedsong'=>$mostvotedsong,
			'mostvotedmale'=>$mostvotedmale,
			'mostvotedfemale'=>$mostvotedfemale,
			'mostvotedgroup'=>$mostvotedgroup,
			'user'=>$user,
			'user_profile'=>$user_profile,
			'loginUrl'=>$loginUrl,
			'logoutUrl'=>$logoutUrl,
			'facebook' => $facebook
			));
	}
	
	public function actionJsFacebook()
	{
		$this->layout=false;
		Yii::import('application.vendors.*');
		require_once('facebookSdk/facebook.php');

		$facebook = new Facebook(array(
		  'appId'  => Yii::app()->params['appId'],
		  'secret' => Yii::app()->params['secret'] 
		));
		
		$this->render('jsfacebook', array('facebook' => $facebook));
	}
	
	public function actionFbLogin()
	{
			/*$user_profile="";
			$model=new TblArtistNominationVoteFb;
			
						//print_r($model);exit;
			
				$facebook = new Facebook(array(
					'appId'  => '379633055382921',
					'secret' => '4f901cb7c2415e528ac33dda9980402c',
					'cookie' => true,
				));

				// Get User ID
				$user = $facebook->getUser();
				
				if ($user) {
						try {
							// Proceed knowing you have a logged in user who's authenticated.
							$user_profile = $facebook->api('/me');
						} catch (FacebookApiException $e) {
							error_log($e);
							$user = null;
						}
					}

				if ($user) {
					$logoutUrl = $facebook->getLogoutUrl();
				} else {
					$loginUrl = $facebook->getLoginUrl();
				}
				
				//print_r($user_profile);exit;
				if($user_profile){ 
					$fb_userid	= $user;	
					if($fb_userid){
					
						session_start();
						
						$today      =  time();
						$email		= $me['email'];
						$fname		= mysql_escape_string(trim($me['first_name']));
						$lname		= mysql_escape_string(trim($me['last_name']));
						Yii::app()->session['H_LOGINFROM']   =	"F";
						
						 $nrQ = Yii::app()->db->createCommand()
                ->select('FB_USER_ID')
                ->from('tbl_artist_nomination_vote_fb')
                ->where('FB_USER_ID=:fb_id',array(':fb_id'=>$fb_userid))
                ->queryAll();
						
						//echo "<pre>";
						//print_r($nrQ);exit;
						
						
						if($nrQ===0){
						
						 $model->FB_USER_ID=$fb_userid;
						 $model->FB_EMAIL=$email;
						 $model->FB_FNAME=$fname;
						 $model->FB_LNAME=$lname;
							
						 if($model->save())
						 {
						 Yii::app()->user->setFlash('success',"Nomination Added Successfully");
						 $this->redirect(array('index'));
						}
						
						}				 

					}
				} 
				else {
				echo "Not logged in from Face Book.";
				}*/
				
				$model=new TblArtistNominationVoteFb;
				$facebook = Yii :: app()->params['facebook'];
			
				$myuid = $facebook->api('/me');
				echo"<pre>";
        print_r($myuid);exit;
				$myfbid = $myuid['id'];
				$userexist = User::model()->find("fb_id = '$myfbid'");
				//$userexist = User::model()->count("fb_id = '$myfbid' ");
				//$model_user->attributes=$myuid;
				
				if($userexist['fb_id'] != $myfbid)
				{
					$model->fb_id = $myuid['id'];
					$model->first_name = $myuid['first_name'];
					$model->last_name = $myuid['last_name'];
					$model->email = $myuid['email'];
					$model->added_date = date("Y-m-d h:m:s");
					//$model_user->mobile_no = $myuid['last_name'];
					$model->save();
				}
		
		$this->render('index',array('userexist'=>$myuid));
			
	
	}
	
	
	public function actionVote()
	{

		
	
		$contentid='';
		$nominationfor='';
		$currentgenre='';
		$facebookid='';
		
		if(isset($_POST['contentId']))
		{
		$contentid=$_POST['contentId'];
		}
				if(isset($_POST['nominationfor']))
			{
			$nominationfor=$_POST['nominationfor'];
			}
					if(isset($_POST['curr_genere']))
				{
				$currentgenre=$_POST['curr_genere'];
				}
						if(isset($_POST['ip_address']))
					{
					$facebookid=$_POST['ip_address'];
					}
					
					
					$sql=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_artist_nomination_vote')
								->where('CONTENT_ID=:contid and GENERE=:genre and NOMINATION_FOR=:nomi and IP_ADDRESS=:ipadd',array(':contid'=>$contentid,':genre'=>$currentgenre,':nomi'=>$nominationfor,':ipadd'=>$facebookid))
								->queryAll();	
								
								if(count($sql)>0)
								{
								echo "you have already voted for this song";
								}
								else
								{
								$model=new TblArtistNominationVote;
								
								$model->CONTENT_ID=$contentid;
								$model->GENERE=$currentgenre;
								$model->NOMINATION_FOR=$nominationfor;
								$model->IP_ADDRESS=$facebookid;
								
								if(strtoupper(Yii::app()->session['H_LOGINFROM'])=="A")
								{
								$model->LOGIN_FROM='A';
								}
								if(strtoupper(Yii::app()->session['H_LOGINFROM'])=="F")
								{
								$model->LOGIN_FROM='F';
								}
								
								$model->INDATE=date("Y-m-d H:i:s",time());
								
								if($model->save())
								{
								
								$songname=Yii::app()->db2->createCommand()
													->select('*')
													->from('TBL_CONTENT_DETAILS')
													->where('CONTENT_ID=:CONTENT_ID',array(':CONTENT_ID'=>$contentid))
													->queryAll();
													
								$artistid=Yii::app()->db2->createCommand()
														->select('arm.ARTIST_ID')
														->from('TBL_CNT_ART_ROLE_MAP carm')
														->join('TBL_ARTIST_ROLE_MAP arm','carm.ARTIST_ROLE_MAP_ID=arm.ARTIST_ROLE_MAP_ID')
														->where('arm.ARTIST_ROLE_ID=31 and CONTENT_ID=:contentid',array(':contentid'=>$contentid))
														->queryAll();
														
														if(isset($artistid[0]['ARTIST_ID']))
														{
														$artistname=Yii::app()->db2->createCommand()
																->select('*')
																->from('TBL_ARTISTS')
																->where('ARTIST_ID=:artistid',array(':artistid'=>$artistid[0]['ARTIST_ID']))
																->queryAll();
														}						
													
												
													if($nominationfor!='BS')
													{
															if(isset($artistname[0]['ARTIST_NAME']))
															{
															echo "You have voted for ".$artistname[0]['ARTIST_NAME']." successfully";
															}
															else
															{
															echo "You have voted for this artist successfully";
															}
													}
													else
													{
															if(isset($songname[0]['CONTENT_TITLE']))
															{
															echo "You have voted for ".$songname[0]['CONTENT_TITLE']." successfully";
															}
															else
															{
															echo "You have voted for this song successfully";
															}
													}
								
								}
								
								
								}
					
		
	}
	
		
		
	
	public function actionUserlogin() {

    //$session=new CHttpSession;
    //$session->open();


    $STORE_ID = Yii::app()->params['STORE_FRONT_ID'];
    $email = mysql_escape_string(strip_tags(trim($_POST["email"])));
    $user_pass = mysql_escape_string(trim($_POST["password"]));
    $user_pass_e = 0;

    if ($email) {
      $this->fetchstorefrontinfo($STORE_ID);
      $url = $GLOBALS['STORE_WEBSITE_SECURE_URL'] . "/api/api_login.php";
      $fields = "storefrontid=" . $STORE_ID . "&email=" . $email . "&user_pass=" . $user_pass . "&user_pass_e=" . $user_pass_e;
      $method = "POST";

      $login_verify = $this->sendDataOverPost($url, $fields, $method);
      if ($login_verify != "No") {
        $session = new CHttpSession;
        $session->open();
        $split_cipher = explode("|", $login_verify);

        Yii::app()->session['H_USERID'] = $split_cipher[1];
        Yii::app()->session['H_USER_NAME'] = $split_cipher[2];
        Yii::app()->session['H_FULL_NAME'] = $split_cipher[3];
        Yii::app()->session['H_SESSIONID'] = $split_cipher[4];
        Yii::app()->session['H_USER_PLAN'] = $split_cipher[5];
        Yii::app()->session['H_STORE_SESSIONID'] = session_id();
		Yii::app()->session['H_LOGINFROM'] = "A";
        if ($split_cipher[5] == 1) {
          Yii::app()->session['H_USER_PLAN'] = 3;
        }

        $usr_query = Yii::app()->db->createCommand()
                ->select('*')
                ->from('tbl_user_profile a')
                ->join('tbl_user_artist m', 'a.USER_ID=m.USER_ID AND a.USER_ID=' . $split_cipher[1])
                ->queryAll();

        $usr_nr = count($usr_query);
        if ($usr_nr) {
          Yii::app()->session['H_NICK_NAME'] = $usr_query[0]['NICK_NAME'];
          Yii::app()->session['H_NICK_NAME'] = $usr_query[0]['USER_TYPE'];
          Yii::app()->session["H_META_ID"] = $usr_query[0]['META_ARTIST_ID'];
        } else {
          Yii::app()->session["H_NICK_NAME"] = "";
          Yii::app()->session["H_USER_TYPE"] = "L";
          Yii::app()->session["H_META_ID"] = "";
        }
        //echo Yii::app()->session["H_FULL_NAME"] . "::" . Yii::app()->session["H_USER_TYPE"] . "::" . Yii::app()->session["H_META_ID"];
        echo "200";
      } else {
        echo "No";
      }
    } else {
      echo "No";
    }
  }
  
  
  
  
  
  public function fetchstorefrontinfo($STORE_ID = '') {
    $hostip = sprintf('%u', ip2long($_SERVER['REMOTE_ADDR']));
    $url = Yii::app()->params['STORE_WEBSITE_SECURE_URL'] . "/store_details_api.php";
    $fields = "hostip=" . $hostip;
    if ($STORE_ID) {
      $fields = "store_front_id=" . $STORE_ID;
    }
    $method = "GET";
    $package = $this->sendDataOverPost($url, $fields, $method);
    $data = unserialize($package);

    global $STORE_FRONT_NAME;
    global $STORE_COUNTRY_ID;
    global $STORE_CURRENCY;
    global $STORE_LANGUAGE_ID;
    global $STORE_WEBSITE_URL;
    global $STORE_WEBSITE_PATH;
    global $STORE_ADMIN_EMAIL;
    global $STORE_TEMPLATE_FOLDER;
    global $STORE_FRONT_ID;
    global $STORE_WEBSITE_SECURE_URL;
    global $MAX_DOWNLOAD_COUNT;
    global $GLOBAL_CART;
    global $STORE_PAYMENT_URL;
    global $STORE_DELIVERY_URL;
    global $MERCHANT_ID;
    global $MERCHANT_PASSWORD;
    global $STORE_PARENT_URL;

    $GLOBALS['STORE_FRONT_NAME'] = $data['STORE_FRONT_NAME'];
    $GLOBALS['STORE_COUNTRY_ID'] = $data['STORE_COUNTRY_ID'];
    $GLOBALS['STORE_CURRENCY'] = $data['STORE_CURRENCY'];
    $GLOBALS['STORE_LANGUAGE_ID'] = $data['STORE_LANGUAGE_ID'];
    $GLOBALS['STORE_WEBSITE_URL'] = $data['STORE_WEBSITE_URL'];
    $GLOBALS['STORE_WEBSITE_PATH'] = $data['STORE_WEBSITE_PATH'];
    $GLOBALS['STORE_ADMIN_EMAIL'] = $data['STORE_ADMIN_EMAIL'];
    $GLOBALS['STORE_TEMPLATE_FOLDER'] = $data['STORE_TEMPLATE_FOLDER'];
    $GLOBALS['STORE_FRONT_ID'] = $data['STORE_FRONT_ID'];
    $GLOBALS['STORE_WEBSITE_SECURE_URL'] = $data['STORE_WEBSITE_SECURE_URL'];
    $GLOBALS['MAX_DOWNLOAD_COUNT'] = $data['MAX_DOWNLOAD_COUNT'];
    $GLOBALS['GLOBAL_CART'] = $data['GLOBAL_CART'];
    $GLOBALS['STORE_PAYMENT_URL'] = $data['STORE_PAYMENT_URL'];
    $GLOBALS['STORE_DELIVERY_URL'] = $data['STORE_DELIVERY_URL'];
    $GLOBALS['MERCHANT_ID'] = $data['MERCHANT_ID']; //"hungama123";
    $GLOBALS['MERCHANT_PASSWORD'] = $data['MERCHANT_PASSWORD']; //"hungama123";
    $GLOBALS['STORE_PARENT_URL'] = $data['STORE_PARENT_URL'];

    $GLOBALS['EMAILER_PWD_URL'] = $data['EMAILER_PWD_URL'];
    $GLOBALS['EMAILER_CONTACT_URL'] = $data['EMAILER_CONTACT_URL'];
    $GLOBALS['EMAILER_CONTACTING_URL'] = $data['EMAILER_CONTACTING_URL'];

    //echo $GLOBALS['STORE_WEBSITE_SECURE_URL'];exit;


    $_SESSION["STORE_ID"] = $GLOBALS['STORE_FRONT_ID'];
    $url = $GLOBALS['STORE_WEBSITE_URL'];
    $url_explode = explode(".", $url);
    $url_explode_count = count($url_explode);
    $url_val = "";
    if ($url_explode_count > 2) {
      $url_val = "." . $url_explode[$url_explode_count - 2] . "." . $url_explode[$url_explode_count - 1];
    }
    $GLOBALS['STORE_WEBSITE_ID'] = $url_val;
  }
  
  
  
  
  
  
   public function sendDataOverPost($url, $fields, $method) {
    $ch = curl_init();
    if (strtoupper($method) == 'POST') {
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    } else {
      curl_setopt($ch, CURLOPT_URL, $url . '?' . $fields);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    if ($result === false) {
      error_log("Curl cannot connect with remote host " . curl_error($ch) . " URL :" . $url);
      die("Request Timeout");
    }
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $result;
  }
  
  
    public function actionUserForgotPass() {
    $STORE_ID = Yii::app()->params['STORE_FRONT_ID'];
    $email = mysql_escape_string(strip_tags(trim($_POST["email"])));

    if ($email) {
      $this->fetchstorefrontinfo($STORE_ID);
      $url = $GLOBALS['STORE_WEBSITE_SECURE_URL'] . "/forgotlogin.php";
      $fields = "store=" . $STORE_ID . "&email=" . $email;
      $method = "GET";

      $fPass_verify = $this->sendDataOverPost($url, $fields, $method);
      if ($fPass_verify == "Yes") {
        echo "200";
      } else {
        echo "No";
      }
    } else {
      echo "No";
    }
  }
	
	
	  public function actionLogout() {
    Yii::app()->user->logout();

    session_start();

    /*$cookie = session_id();

    $command = Yii::app()->db->createCommand()
            ->delete('tbl_cart', 'COOKIE_ID=:id', array(':id' => $cookie));*/

        Yii::app()->session['H_USER_NAME'] = "";
        Yii::app()->session['H_FULL_NAME'] = "";
        Yii::app()->session['H_SESSIONID'] = "";
        Yii::app()->session['H_USER_PLAN'] = "";

    session_destroy();
    //$this->redirect(Yii::app()->homeUrl);
  }
}