<?php
 
class SiteController extends Controller {

  /**
   * Declares class-based actions.
   */
  public $layout = '//layouts/main';
  
  // public $layout='//layouts/column1';
  public function actions() {
    return array(
        // captcha action renders the CAPTCHA image displayed on the contact page
        'captcha' => array(
            'class' => 'CCaptchaAction',
            'backColor' => 0xFFFFFF,
        ),
        // page action renders "static" pages stored under 'protected/views/site/pages'
        // They can be accessed via: index.php?r=site/page&view=FileName
        'page' => array(
            'class' => 'CViewAction',
        ),
    );
  }

  public function sendXmlOverPost($url, $xml) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ask for results to be returned
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    //if(CurlHelper::checkHttpsURL($url)) { 
    //  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    //}
    // Send to remote and return data to caller.
    $result = curl_exec($ch);
    if ($result === false) {
      error_log("Curl cannot connect with remote host " . curl_error($ch) . " URL :" . $url);
      die("Request Timeout");
    }
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $result;
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

  public function actionRegister() {



    $model = new Signup;

    $model1 = new UserProfile;
    $model2 = new TblUserArtist;
    $model3 = new userartisttracks;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);




    if (isset($_POST['firstname']) && $_POST['firstname'] != '') {
      $email = $_POST['email'];
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $mobile = $_POST['mobile'];
      $usertype = $_POST['usertype'];
      $age = $_POST['age'];
      $country = $_POST['country'];
      $gender = $_POST['gender'];
      $city = $_POST['city'];
      /*
        $model->first_name = $_POST['fname2'];
        $model->last_name = $_POST['lname2'];
        $model->age = $_POST['age2'];
        $model->gender = $_POST['gender2'];
        $model->city = $_POST['city2'];
        $model->email = $_POST['email2'];
        $model->mobile = $_POST['mobile2'];
        $model->country = $_POST['country2'];
        $model->type = $_POST['usertype2'];
        $usertype = $_POST['usertype2'];
        $age = $_POST['age2'];
        $gender = $_POST['gender2'];
        $city = $_POST['city2'];
        $country = $_POST['country2'];
       */
    }

    if (isset($_POST['fname3']) && $_POST['fname3'] != '') {
      $email = $_POST['email3'];
      $fname = $_POST['fname3'];
      $lname = $_POST['lname3'];
      $mobile = $_POST['mobile3'];
      $usertype = $_POST['usertype3'];
      $age = $_POST['age3'];
      $country = $_POST['country3'];
      $gender = $_POST['gender3'];
      $city = $_POST['city3'];


      /*
        $model->first_name = $_POST['fname3'];
        $model->last_name = $_POST['lname3'];
        $model->age = $_POST['age3'];
        $model->gender = $_POST['gender3'];
        $model->city = $_POST['city3'];
        $model->email = $_POST['email3'];
        $model->mobile = $_POST['mobile3'];
        $model->country = $_POST['country3'];
        $model->type = $_POST['usertype3'];
        $usertype = $_POST['usertype3'];
        $age = $_POST['age3'];
        $gender = $_POST['gender3'];
        $city = $_POST['city3'];
        $country = $_POST['country3'];
       */
    }



    $this->fetchstorefrontinfo(STORE_FRONT_ID);


    $url = $GLOBALS['STORE_WEBSITE_SECURE_URL'] . "/api/api_register.php";



    $coupon = "";
    $STORE_ID = STORE_FRONT_ID;
    $email = $email;
    $fname = $fname;
    $lname = $lname;
    $mobile = $mobile;

    $XPost = "<request>";
    $XPost .= "<user>";
    $XPost .= "<EmailID>" . $email . "</EmailID>";
    $XPost .= "<FirstName>" . $fname . "</FirstName>";
    $XPost .= "<LastName>" . $lname . "</LastName>";
    $XPost .= "<MSISDN>" . $mobile . "</MSISDN>";
    $XPost .= "<Coupon>" . $coupon . "</Coupon>";
    $XPost .= "<Refferer>artistaloud.com</Refferer>";
    $XPost .= "<StoreId>" . $STORE_ID . "</StoreId>";
    $XPost .= "</user>";
    $XPost .= "</request>";

    $responseData = $this->sendXmlOverPost($url, $XPost);



    list($response, $UserID, $user_password) = explode('|', $responseData);

//$result = $model->save(false);


    if ($response == 200) {

      $model1->USER_ID = $UserID;
      $model1->NICK_NAME = $_POST['profilename'];
//$_FILES['profileimage']['name']=='audio/mpeg'
      $model1->PROFILE_IMAGE = $_FILES['profileimage']['name'];
      if (!is_dir("images/profileimage")) {
        mkdir("images/profileimage", 0777);
      }

      if (!is_dir("images/profileimage/" . $UserID)) {
        mkdir("images/profileimage/" . $UserID, 0777);
      }


      if (isset($_FILES['profileimage']['name']) && $_FILES['profileimage']['name'] != "") {

        move_uploaded_file($_FILES['profileimage']['tmp_name'], "images/profileimage/" . $UserID . "/" . $_FILES['profileimage']['name']);
        //$model2->doc->saveAs('banner/'.$_FILES['User']['name']['image']);
      }
      $model1->ABOUT_YOU = $_POST['aboutme'];
      $model1->MUSIC_YOU_LIKE = $_POST['likemusic'];
      $model1->FAV_ARTIST = $_POST['favartist'];
      $model1->LAST_UPDATED = time();
      $result1 = $model1->save(false);


      $model2->USER_ID = $UserID;
      $model2->USER_TYPE = $usertype;
      $model2->BAND_NAME = $_POST['brand1'];
      $model2->GENRE = $_POST['genre1'];
      $model2->LANGUAGE = $_POST['language1'];
      $model2->BIO = $_POST['briefbio1'];
      $model2->INSPIRATION = $_POST['insp1'];
      $model2->USER_AGE = $_POST['age'];
      $model2->USER_GENDER = $gender;
      $model2->USER_CITY = $city;
      $model2->USER_COUNTRY = $country;
      $model2->LAST_UPDATED = time();
      $result2 = $model2->save(false);

      if ($usertype == "A") {


        /*



          $path			=	"uploads/tracks/";
          $known_audio_types	=   array("mp3","wma");
          $trackname	=mysql_escape_string(trim($_POST["track1"]));

          $bfile_name = 	$_FILES['song']['name'];
          $bfile 	   	= 	$_FILES['song']['tmp_name'];


          $ext =explode('.', $bfile_name);

          $ext = strtolower($ext[count($ext)-1]);
          $ptime = time();
          if(!in_array($ext, $known_audio_types)){
          $result_final = 1;
          }

          $imagefile	= $UserID."_".$ptime.".".$ext;

          if($result_final!=1)
          {

          $model3->USER_ID=$UserID;
          $model3->TRACK_NAME=$trackname;
          $model3->TRACK_FILE=$imagefile;
          $model3->TRACK_INDATE=$ptime;
          $model3->MODERATED_FILE_INDATE=$ptime;
          $model3->MODERATION_STATUS="M";

          $model3->save();

          if(isset($_FILES['song']['name']) &&  $_FILES['song']['name']!='')
          {
          copy($bfile, $path.$UserID."_".$ptime.".".$ext);
          }

          }
         */
      }
    }

    /*

      $file_path		= $_SERVER['SCRIPT_FILENAME'];
      $path			= explode("/",$file_path);
      $path_count		= count($path);
      $path[$path_count-1]="";
      $final_path		= implode("/",$path);



      if($usertype=="A"){
      $filename		= Yii::app()->basePath .'/../emailers/TEXT/for_successful_artist_registration.txt';
      $handle		= fopen($filename, "rb");
      $textbody		= fread($handle, filesize($filename));
      fclose($handle);

      $filename		= Yii::app()->basePath .'/../emailers/HTML/for_successful_artist_registration.html';
      $handle		= fopen($filename, "rb");
      $htmlbody		= fread($handle, filesize($filename));
      fclose($handle);
      $subject	=	"Congratulations! You have successfully registered as an Artist on Artistaloud.com";
      }else{
      $filename		= Yii::app()->basePath .'/../emailers/TEXT/for_successful_artist_registration.txt';
      $handle		= fopen($filename, "rb");
      $textbody		= fread($handle, filesize($filename));
      fclose($handle);

      $filename		= Yii::app()->basePath .'/../emailers/HTML/for_successful_artist_registration.html';
      $handle		= fopen($filename, "rb");
      $htmlbody		= fread($handle, filesize($filename));
      fclose($handle);
      $subject	=	"Congratulations! You have successfully registered as a listener on Artistaloud.com";
      }




      $textbody		= str_replace("<firstname>", $fname, $textbody);
      $textbody		= str_replace("<sitename>", substr($GLOBALS['STORE_WEBSITE_ID'], 1), $textbody);
      $textbody		= str_replace("<login>", $email, $textbody);
      $textbody		= str_replace("<password>", $user_password, $textbody);
      $textbody		= str_replace("<changepasswordurl>", $GLOBALS['EMAILER_PWD_URL'], $textbody);
      $textbody		= str_replace("<sitenameurl>", $GLOBALS['STORE_WEBSITE_URL'], $textbody);
      $textbody		= str_replace("<storeid>", $_SESSION["STORE_ID"], $textbody);
      $textbody		= str_replace("<contactusurl>", $GLOBALS['STORE_WEBSITE_URL']."/writetous.php", $textbody);

      $htmlbody		= str_replace("<firstname>", $fname, $htmlbody);
      $htmlbody		= str_replace("<sitename>", substr($GLOBALS['STORE_WEBSITE_ID'], 1), $htmlbody);
      $htmlbody		= str_replace("<login>", $email, $htmlbody);
      $htmlbody		= str_replace("<password>", $user_password, $htmlbody);
      $htmlbody		= str_replace("<changepasswordurl>", $GLOBALS['EMAILER_PWD_URL'], $htmlbody);
      $htmlbody		= str_replace("<sitenameurl>", $GLOBALS['STORE_WEBSITE_URL'], $htmlbody);
      $htmlbody		= str_replace("<storeid>", $_SESSION["STORE_ID"], $htmlbody);
      $htmlbody		= str_replace("<contactusurl>", $GLOBALS['STORE_WEBSITE_URL']."/writetous.php", $htmlbody);


      $to		=	$email;
      $fname	  = $fname;
      $sendmail_status = sendemail($to,$fname,$subject,$htmlbody,$textbody);

      print_r($sendmail_status);exit;
     */


    $sql = Yii::app()->db->createCommand()
            ->select('*')
            ->from('tbl_user_profile')
            ->where('USER_ID=:userid', array(':userid' => $UserID))
            ->queryAll();


    /*
      $sql1=Yii::app()->db->createCommand()
      ->select('*')
      ->from('signup')
      ->where('id=:id',array(':id'=>$UserID))
      ->queryAll();
     */


    $this->layout = 'column1';

    if ($sql1[0]['type'] == L) {
      $this->render('indexprofile', array(
          'sql' => $sql,
          'sql1' => $sql1,
      ));
    } else {
      $this->render('listner', array(
          'sql' => $sql,
      ));
    }
  }

  public function actionSignup() {
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 'On');

    $model = new Users;
    $model1 = new UserProfile;
    $model2 = new TblUserArtist;

    $this->fetchstorefrontinfo(Yii::app()->params['STORE_FRONT_ID']);

    $url = $GLOBALS['STORE_WEBSITE_SECURE_URL'] . "/api/api_register.php";

    $coupon = "";
    $STORE_ID = Yii::app()->params['STORE_FRONT_ID']; // find this value in config
    $mobile = $_POST['mobile'];
    $country = $_POST['country'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $email = $_POST['email'];

    $XPost = "<request>";
    $XPost .= "<user>";
    $XPost .= "<EmailID>" . $email . "</EmailID>";
    $XPost .= "<FirstName>" . $fname . "</FirstName>";
    $XPost .= "<LastName>" . $lname . "</LastName>";
    $XPost .= "<MSISDN>" . $mobile . "</MSISDN>";
    $XPost .= "<Coupon>" . $coupon . "</Coupon>";
    $XPost .= "<Refferer>artistaloud.com</Refferer>";
    $XPost .= "<StoreId>" . $STORE_ID . "</StoreId>";
    $XPost .= "</user>";
    $XPost .= "</request>";

    $responseData = $this->sendXmlOverPost($url, $XPost);

    list($response, $UserID, $user_password) = explode('|', $responseData);

    if ($response == 200) {
      $model->A_USER_ID = $UserID;
      $model->A_FIRST_NAME = $_POST['firstname'];
      $model->A_LAST_NAME = $_POST['lastname'];
      $model->A_CITY = $_POST['city'];
      $model->A_EMAIL_ID = $_POST['email'];
      $model->A_MOBILE_NO = $_POST['mobile'];
      $model->A_INDATE = time();
      $result = $model->save(false);

      $model1->USER_ID = $UserID;
      $model1->NICK_NAME = $_POST['profilename'];
      $model1->PROFILE_IMAGE = $_FILES['profileimage']['name'];
      $model1->ABOUT_YOU = $_POST['aboutme'];
      $model1->MUSIC_YOU_LIKE = $_POST['likemusic'];
      $model1->FAV_ARTIST = $_POST['favartist'];
      $model1->LAST_UPDATED = time();

      if (isset($_FILES['profileimage']['name']) && $_FILES['profileimage']['name'] != "") {
        $model1->PROFILE_IMAGE = $_FILES['profileimage']['name'];
        if (!is_dir("images/profileimage")) {
          mkdir("images/profileimage", 0777);
        }
        if (!is_dir("images/profileimage/" . $UserID)) {
          mkdir("images/profileimage/" . $UserID, 0777);
        }
        move_uploaded_file($_FILES['profileimage']['tmp_name'], "images/profileimage/" . $UserID . "/" . $_FILES['profileimage']['name']);
      }
      $result1 = $model1->save(false);

      $model2->USER_ID = $UserID;
      $model2->USER_TYPE = $_POST['usertype'];
      $usertype = $_POST['usertype'];
      $model2->BAND_NAME = (isset($_POST['band'])) ? $_POST['band'] : "";
      $model2->GENRE = (isset($_POST['genre'])) ? $_POST['genre'] : "";
      $model2->BIO = (isset($_POST['bio'])) ? $_POST['bio'] : "";
      $model2->INSPIRATION = (isset($_POST['insp'])) ? $_POST['insp'] : "";
      $model2->USER_AGE = (isset($_POST['age'])) ? $_POST['age'] : "";
      $model2->USER_GENDER = (isset($_POST['gender'])) ? $_POST['gender'] : "";
      $model2->USER_CITY = (isset($_POST['city'])) ? $_POST['city'] : "";
      $model2->USER_COUNTRY = (isset($_POST['country'])) ? $_POST['country'] : "";
      $model2->LAST_UPDATED = time();
      $result2 = $model2->save(false);

      // saving the track fileuploaded track file
      if ($_POST['usertype'] == "A") {
        $trackModel = new userartisttracks;

        if ($UserID != 0) {
          $trackPath = "uploads/tracks/";

          $trackname = mysql_escape_string(trim($_POST['track']));
          $bfile_name = CUploadedFile::getInstanceByName('song');
          $ext = explode('.', $bfile_name);
          $ext = strtolower($ext[count($ext) - 1]);
          $ptime = time();

          $imagefile = $UserID . "_" . $ptime . "." . $ext;
          $trackModel->USER_ID = $UserID;
          $trackModel->TRACK_NAME = $trackname;
          $trackModel->TRACK_INDATE = $ptime;
          $trackModel->MODERATION_STATUS = "M";
          $trackModel->MODERATION_COMMENT = '';
          $trackModel->LAST_UPDATED = $ptime;

          $trackModel->MODERATED_FILE_INDATE = $ptime;

          $trackModel->TRACK_FILE = CUploadedFile::getInstanceByName('song');
          if ($trackModel->save()) {
            $trackModel->TRACK_FILE->saveAs($trackPath . $imagefile);
          }

          $id = $trackModel->primaryKey;
          $trackModel->MODERATED_TRACK_FILE = $id . "_" . $ptime . "." . $ext;

          if ($trackModel->save()) {
		  
		  $command=Yii::app()->db->createCommand()
							->update('tbl_user_artist_tracks', array(
							'TRACK_FILE'=>$imagefile,
							 ), 'USER_TRACK_ID=:id', array(':id'=>$id));
            
          }
        }
      }

      if ($usertype == "A") {
        $filename = Yii::app()->basePath . "/../emailers/" . Yii::app()->params['STORE_FRONT_ID'] . "/TEXT/for_successful_artist_registration.txt";
        $handle = fopen($filename, "rb");
        $textbody = fread($handle, filesize($filename));
        fclose($handle);

        $filename = Yii::app()->basePath . "/../emailers/" . Yii::app()->params['STORE_FRONT_ID'] . "/HTML/for_successful_artist_registration.html";
        $handle = fopen($filename, "rb");
        $htmlbody = fread($handle, filesize($filename));
        fclose($handle);
        $subject = "Congratulations! You have successfully registered as an Artist on Artistaloud.com";
      } else {
        $filename = Yii::app()->basePath . "/../emailers/" . Yii::app()->params['STORE_FRONT_ID'] . "/TEXT/for_successful_listener_registration.txt";
        $handle = fopen($filename, "rb");
        $textbody = fread($handle, filesize($filename));
        fclose($handle);

        $filename = Yii::app()->basePath . "/../emailers/" . Yii::app()->params['STORE_FRONT_ID'] . "/HTML/for_successful_listener_registration.html";
        $handle = fopen($filename, "rb");
        $htmlbody = fread($handle, filesize($filename));
        fclose($handle);
        $subject = "Congratulations! You have successfully registered as a listener on Artistaloud.com";
      }

      $textbody = str_replace("<firstname>", $fname, $textbody);
      $textbody = str_replace("<sitename>", substr($GLOBALS['STORE_WEBSITE_ID'], 1), $textbody);
      $textbody = str_replace("<login>", $email, $textbody);
      $textbody = str_replace("<password>", $user_password, $textbody);
      $textbody = str_replace("<changepasswordurl>", $GLOBALS['EMAILER_PWD_URL'], $textbody);
      $textbody = str_replace("<sitenameurl>", $GLOBALS['STORE_WEBSITE_URL'], $textbody);
      $textbody = str_replace("<storeid>", Yii::app()->params['STORE_FRONT_ID'], $textbody);
      $textbody = str_replace("<contactusurl>", $GLOBALS['STORE_WEBSITE_URL'] . "/writetous.php", $textbody);

      $htmlbody = str_replace("<firstname>", $fname, $htmlbody);
      $htmlbody = str_replace("<sitename>", substr($GLOBALS['STORE_WEBSITE_ID'], 1), $htmlbody);
      $htmlbody = str_replace("<login>", $email, $htmlbody);
      $htmlbody = str_replace("<password>", $user_password, $htmlbody);
      $htmlbody = str_replace("<changepasswordurl>", $GLOBALS['EMAILER_PWD_URL'], $htmlbody);
      $htmlbody = str_replace("<sitenameurl>", $GLOBALS['STORE_WEBSITE_URL'], $htmlbody);
      $htmlbody = str_replace("<storeid>", Yii::app()->params['STORE_FRONT_ID'], $htmlbody);
      $htmlbody = str_replace("<contactusurl>", $GLOBALS['STORE_WEBSITE_URL'] . "/writetous.php", $htmlbody);

      Yii::import('application.extensions.phpmailer.JPhpMailer');
      $mail = new JPhpMailer;
      $mail->IsSMTP();
      $mail->Host = "smtpout.hungama.com";
      $mail->SMTPAuth = true;
      $mail->Port = 587;
      $mail->Username = "csout@hungama.com";  // GMAIL username
      $mail->Password = "J4cMqt5d";  // GMAIL password
      //$mail->From       = "noreply@hungama.com";
      $mail->SetFrom("noreply@hungama.com", 'No Reply @ ArtistAloud Admin');
      $mail->Subject = $subject;
      $mail->AltBody = $textbody;
      $mail->MsgHTML($htmlbody);
      $mail->AddAddress($email, $fname);
      $mail->Send();

      echo "200";
    } elseif ($response == '449') {
      echo "Email ID Already in Use.";
    } elseif ($response == '452') {
      echo "Mobile Number Already in Use.";
    } elseif ($response == '453') {
      echo "Invalid Coupon Number used..";
    } else {
      echo "Please fill complete form.";
    }
  }

  /**
   * This is the default 'index' action that is invoked
   * when an action is not explicitly requested by users.
   */
  public function actionIndex() {
    //$model=new ArtistaloudBlog;
    //$model1=new Artist;
    //$session=new CHttpSession;
    //$session->open();
    //print_r($session);
    echo session_id();
    $this->location = 1;

    //means cookie is not found set it using Javascript

    $cs = Yii::app()->getClientScript();
    $cs->registerScript(
            'resolution-detector', '
			writeCookie();
			function writeCookie() 
			{
				 var today = new Date();
				 var the_cookie_date = 0;
				 var the_cookie = "users_resolution="+ screen.width;
				 var the_cookie = the_cookie;
				 document.cookie=the_cookie;
			}
		  ', CClientScript::POS_BEGIN
    );

    $screen_res = (isset($_COOKIE["users_resolution"])) ? $_COOKIE["users_resolution"] : "";

    $blog = Yii::app()->db->createCommand()
            ->select('*')
            ->from('artistaloud_blog')
            ->where('blog_status!=:status', array(':status' => 'DL'))
            ->order('date desc')
            ->queryAll(); 

    $artist = Yii::app()->db->createCommand()
            ->select('*')
            ->from('artist a')
            ->join('music_track_master m', 'a.id=m.artist_id')
            ->join('genres g', 'a.id=g.artist_id')
            ->join('languages lg', 'a.id=lg.artist_id')
            ->order('a.created_date desc')
            ->queryAll();


    $events = Yii::app()->db->createCommand()
            ->select('*')
            ->from('upc_events')
            ->where('event_status!=:id', array(':id' => 'DL'))
            ->order('event_date desc')
            ->queryAll();


    $news = Yii::app()->db->createCommand()
            ->select('*')
            ->from('tbl_aa_press')
            ->where('Press_News_Status=:id', array(':id' => 'P'))
            ->order('Press_News_Date desc')
            ->queryAll();

    //print_r($news);exit;

    /*
      $eventxml =  simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/'."events.xml");
      $newsxml =  simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/'."news.xml");
      $blogsxml =  simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/'."blogs.xml");
      $topsongxml =  simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/'."top-10-songs.xml");
     */
    $newthisweekxml = simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/' . "newthisweek.xml");

    //echo "<pre>";
    //echo json_encode($topSongArr);exit;
    //print_r($newthisweekxml);exit;

    $newreleasesxml = simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/' . "newreleases.xml");

    /*
      $topSongArr = array();
      foreach($topsongxml->songs as $key => $song){
      array_push($topSongArr, $song);
      } */
    //echo "<pre>";
    //echo json_encode($topSongArr);exit;
    //print_r($eventxml);exit;


    if (isset($_COOKIE["users_resolution"]))
      $res = $_COOKIE["users_resolution"];
    else
      $res = 0;

    if ($res > 1600) {
      $this->render('block-fluid', array(
          //'model'=>$model,
          'blog' => $blog,
          'artist' => $artist,
          'events' => $events,
          'news' => $news,
          'newthisweekxml' => $newthisweekxml,
          'newreleasesxml' => $newreleasesxml,
      ));
    } else {
      $this->render('index', array(
          //'model'=>$model,
          'blog' => $blog,
          'artist' => $artist,
          'events' => $events,
          'news' => $news,
          'newthisweekxml' => $newthisweekxml,
          'newreleasesxml' => $newreleasesxml,
      ));
    }



    /*

      $this->render('index',array(
      //'model'=>$model,
      'blog'=>$blog,
      'artist'=>$artist,
      'events'=>$events,
      'news'=>$news,
      ));
     */
  }

  /**
   * This is the action to handle external exceptions.
   */
  public function actionError() {
    if ($error = Yii::app()->errorHandler->error) {

      if (Yii::app()->request->isAjaxRequest)
        echo $error['message'];
      else
	  
	  $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	  // echo $url;exit;
	  
	  $sql=Yii::app()->db->createCommand()
              ->select('*')
              ->from('tbl_artist_url_mapping')
              ->where('new_url=:new_url ', array(':new_url' =>$url))
              ->queryRow();
	  
		// echo "<pre>";
		// print_r($sql);exit;
		
		if(isset($sql['new_url']) && $sql['new_url']==$url)
		{	
		
		$newurl=$sql['old_url'];
		
		//echo $newurl;exit;
		
		 header("Location: $newurl");
			
		}
		else
		{
			$this->render('error', $error);
		}
	}
  }

  /**
   * Displays the contact page
   */
  public function actionContact() {
    $model = new ContactForm;
    if (isset($_POST['ContactForm'])) {
      $model->attributes = $_POST['ContactForm'];
      if ($model->validate()) {
        $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
        mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
        Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
        $this->refresh();
      }
    }
    $this->render('contact', array('model' => $model));
  }

  /**
   * Displays the login page
   */
  public function actionLogin() {
    $this->layout = 'column1';

    $model = new LoginForm;

    // if it is ajax validation request
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }

    // collect user input data
    if (isset($_POST['LoginForm'])) {
      $model->attributes = $_POST['LoginForm'];
      // validate user input and redirect to the previous page if valid
      if ($model->validate() && $model->login()) {
        Yii::app()->user->setFlash('success', "Loged in successfully!");
        $this->redirect('index');
        //$this->redirect(RETURNURL);
      }
    }
    // display the login form
    $this->render('login', array('model' => $model));
  }

  /**
   * Logs out the current user and redirect to homepage.
   */
  public function actionLogout() {
    
	Yii::app()->user->logout();

    session_start();

    $cookie = session_id();

    $command = Yii::app()->db->createCommand()
            ->delete('tbl_cart', 'COOKIE_ID=:id', array(':id' => $cookie));

    Yii::app()->session["H_USERID"] = "";
    Yii::app()->session["H_USER_NAME"] = "";
    Yii::app()->session["H_FULL_NAME"] = "";
    Yii::app()->session["H_NICK_NAME"] = "";
    Yii::app()->session["H_USER_TYPE"] = "";
    Yii::app()->session["H_META_ID"] = "";

    //session_unregister('H_USERID');
    // session_unregister('H_USER_NAME');
    //session_unregister('H_FULL_NAME');
    //session_unregister('H_NICK_NAME');
    //session_unregister('H_USER_TYPE');
    //session_unregister('H_META_ID');

    session_destroy();
    $this->redirect(Yii::app()->homeUrl);
  }

  /**
   * For add to cart
   */
  public function actionAddToCart() {
    $session = new CHttpSession;
    $session->open();
    //echo Yii::app()->session['H_USERID'];
    //echo session_id();
    //exit;
    $content_type_id = mysql_escape_string(trim($_POST["content_type_id"]));
    $content_id = mysql_escape_string(trim($_POST["content_id"]));
    $content_title = mysql_escape_string(trim($_POST["content_title"]));
    $cookie = session_id();
    $add_to_cart = "";

    $rsCart = Yii::app()->db->createCommand()
            ->select('count(*) as ItemCount')
            ->from('tbl_cart')
            ->where('STATUS=:status and COOKIE_ID=:cookie_id', array(':status' => 1, ':cookie_id' => $cookie))
            ->queryAll();

    if (!$rsCart[0]['ItemCount']) {
      $ItemCount = 0;
    } else {
      $ItemCount = $rsCart[0]['ItemCount'];
    }
    $cartItem = $ItemCount;

    $user_plan = Yii::app()->session['H_USER_PLAN']; //$_SESSION["H_USER_PLAN"];
    $user_id = Yii::app()->session['H_USERID'];
    $store_front_id = STORE_FRONT_ID;
    if (!$user_plan) {
      Yii::app()->session['H_USER_PLAN'] = 3;
    }
    $duplicate_flag = 0;
    if (is_numeric($content_id)) {

      $nrL = Yii::app()->db->createCommand()
              ->select('*')
              ->from('tbl_cart')
              ->where('CONTENT_ID=:contentid and CONTENT_TYPE_ID=:contenttypeid and COOKIE_ID=:cookieid', array(':contentid' => $content_id, ':contenttypeid' => $content_type_id, ':cookieid' => $cookie))
              ->order('CART_ID desc')
              ->queryAll();

      if (count($nrL) == 0) {
        $today = time();
        $model = new tblcart;

        $model->USER_ID = $user_id;
        $model->CONTENT_ID = $content_id;
        $model->CONTENT_TYPE_ID = $content_type_id;
        $model->CONTENT_TITLE = $content_title;
        $model->COOKIE_ID = $cookie;
        $model->QUANTITY = "1";
        $model->STATUS = "1";
        $model->STORE_FRONT_ID = $store_front_id;
        $model->ADDED_ON = $today;

        $model->save();
      } else {
        $duplicate_flag = 1;
      }
      $rsCart = Yii::app()->db->createCommand()
              ->select('count(*) as ItemCount ')
              ->from('tbl_cart')
              ->where('STATUS=:status and COOKIE_ID=:cookieid', array(':status' => 1, ':cookieid' => $cookie))
              ->queryAll();

      $cartItem = $rsCart[0]['ItemCount'];
    }
    $add_to_cart = "1" . "::" . $cartItem . "::" . $duplicate_flag . "::";
    echo trim($add_to_cart);
  }

  /**
   * For prepare cart array and send it to secure 
   */
  public function actionCartArray() {
    $session = new CHttpSession;
    $session->open();
    //$cookie          =   session_id();

    $STORE_FRONT_ID = mysql_escape_string(trim($_REQUEST['STORE_FRONT_ID']));
    $COOKIE_ID = mysql_escape_string(trim($_REQUEST['COOKIE_ID']));

    if ($STORE_FRONT_ID && $COOKIE_ID) {
      $rsCart = Yii::app()->db->createCommand()
              ->select('CART_ID,CONTENT_ID,CONTENT_TYPE_ID,CONTENT_TITLE,COOKIE_ID,QUANTITY,STATUS,ADDED_ON')
              ->from('tbl_cart')
              ->where('STORE_FRONT_ID=:store_front_id and COOKIE_ID=:cookie_id', array(':store_front_id' => $STORE_FRONT_ID, ':cookie_id' => $COOKIE_ID))
              ->order('ADDED_ON desc')
              ->queryAll();

      $arr = array();
      for ($i = 0; $i < count($rsCart); $i++) {
        $arr[$i]['CART_ID'] = $rsCart[$i]['CART_ID'];
        $arr[$i]['CONTENT_ID'] = $rsCart[$i]['CONTENT_ID'];
        $arr[$i]['CONTENT_TYPE_ID'] = $rsCart[$i]['CONTENT_TYPE_ID'];
        $arr[$i]['CONTENT_TITLE'] = $rsCart[$i]['CONTENT_TITLE'];
        $arr[$i]['COOKIE_ID'] = $rsCart[$i]['COOKIE_ID'];
        $arr[$i]['QUANTITY'] = $rsCart[$i]['QUANTITY'];
        $arr[$i]['STATUS'] = $rsCart[$i]['STATUS'];
        $arr[$i]['ADDED_ON'] = $rsCart[$i]['ADDED_ON'];
      }
      echo serialize($arr);
    }
  }

  public function actionCartCount() {
    $store_cookie = mysql_escape_string(trim($_REQUEST['store_cookie']));
    if ($store_cookie) {
      $rsCart = Yii::app()->db->createCommand()
              ->select('count(*) as ItemCount')
              ->from('tbl_cart')
              ->where('STATUS=:status and COOKIE_ID=:cookie_id', array(':status' => 1, ':cookie_id' => $store_cookie))
              ->queryAll();
      $cartcount = $rsCart[0]['ItemCount'];
      echo $cartcount;
    }
  }

  public function actionCartEmpty() {
    $user_id = isset($_REQUEST['USER_ID']) ? trim($_REQUEST['USER_ID']) : '';
    $cart_id = isset($_REQUEST['CART_ID']) ? trim($_REQUEST['CART_ID']) : '';
    $cookie_id = isset($_REQUEST['COOKIE_ID']) ? trim($_REQUEST['COOKIE_ID']) : '';

    if ($cart_id != "" && $cookie_id != "") {
      $sql = Yii::app()->db->createCommand()
              ->delete('tbl_cart', 'CART_ID=:cart_id and COOKIE_ID=:cookies_id', array(':cart_id' => $cart_id, ':cookies_id' => $cookie_id));
    } else {
      $sql = Yii::app()->db->createCommand()
              ->delete('tbl_cart', 'USER_ID=:user_id', array(':user_id' => $user_id));
    }
  }

  public function actionSubmitsecure() {
    $this->layout = false;


    $session = new CHttpSession;
    $session->open();
    //$this->layout='column1';		
    $checkout = $this->writeCookie();
    $store = STORE_FRONT_ID;
    $store_sessionid = Yii::app()->session['H_STORE_SESSIONID'];

    $this->render('submitsecure', array(
        'checkout' => $checkout,
        'H_STORE_SESSIONID' => $store_sessionid,
        'STORE' => $store,
    ));
  }

  public function writeCookie() {
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $userip = $_SERVER['REMOTE_ADDR'];
    //$encrypt_key = md5($useragent.$userip);
    $encrypt_key = "48d9d2bbfdb0d128464d3d7ecfa626b4";
    $cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
    $iv_size = mcrypt_enc_get_iv_size($cipher);
    $iv = '1234567890123456';
    $cleartext = "";

    // loop through the session array with foreach
    foreach ($_SESSION as $key => $value) {
      // and print out the values
      if (!$cleartext) {
        $cleartext = $key . ":::" . $value;
      } else {
        $cleartext .= "|" . $key . ":::" . $value;
      }
    }
    if (mcrypt_generic_init($cipher, $encrypt_key, $iv) != -1) {
      // PHP pads with NULL bytes if $cleartext is not a multiple of the block size..
      $cipherText = mcrypt_generic($cipher, $cleartext);
      mcrypt_generic_deinit($cipher);
      // Display the result in hex.
      //$encrypted_value = base64_encode($cipherText);

      $cipherText = trim(chop(base64_encode($cipherText)));
      //printf("256-bit encrypted result:\n%s\n\n",$cipherText);
      //echo "<br><br>";
      //echo $cipherText;
      /* Terminate decryption handle and close module */
    }
    return $cipherText;
  }

  /* Footer Section Begins */

  public function actionConditions() {
    $this->locationtop = 51;
    $this->locationright = 50;

    $this->layout = 'column1';
    $this->render('conditions');
  }

  public function actionPrivacy() {
    $this->locationtop = 53;
    $this->locationright = 52;

    $this->layout = 'column1';
    $this->render('privacy');
  }

  public function actionAboutus() {
    $this->locationtop = 23;
    $this->locationright = 24;

    $this->layout = 'column1';
    $this->render('aboutus');
  }

  public function actionFeedback() {
    $this->locationtop = 49;
    $this->locationright = 48;

    $this->layout = 'column1';
    $this->render('feedback');
  }

  public function actionDisclaimer() {
    $this->locationtop = 57;
    $this->locationright = 56;

    $this->layout = 'column1';
    $this->render('disclaimer');
  }

  public function actionPartners() {
    $this->locationtop = 55;
    $this->locationright = 54;

    $this->layout = 'column1';
    $this->render('partners');
  }

  public function actionGetSongInfo() {
    if (isset($_POST)) {
      $fileId = $_POST['file_id'];
      $artistId = $_POST['artist_id'];
      $contentId = $_POST['content_id'];

      if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $artistId . ".xml")) {
        $artistXml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $artistId . ".xml");
      }
      if (file_exists(Yii::app()->basePath . '/../xml/content/songs/' . "song-" . $contentId . ".xml")) {
        $songXml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/songs/' . "song-" . $contentId . ".xml");
      }
      $songInfo = array(
          'artistId' => $artistId,
          'contentId' => $contentId,
          'fileId' => $fileId,
          'artistName' => (string) $artistXml->artistName,
          'artistImage' => (string) $artistXml->images80->image80,
          'songName' => (string) $songXml->songName,
          //'songReview' => (string) $songXml->songdetail->songDescription,
          'songReview' => "",
      );
      echo json_encode($songInfo);
    } else
      throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
  }

  public function actionChagepassword() {
    $this->fetchstorefrontinfo(Yii::app()->params['STORE_FRONT_ID']);

    $UserID = Yii::app()->session['H_USERID'];
    $USER_NAME = Yii::app()->session['H_USER_NAME'];
    $currentPWD = mysql_escape_string(trim($_POST["password"]));
    $newPWD = mysql_escape_string(trim($_POST["newpassword"]));
    $confirmPWD = mysql_escape_string(trim($_POST["confirmpassword"]));
    /*
      echo $UserID."|";
      echo $USER_NAME."|";
      echo $currentPWD."|";
      echo $newPWD."|";
      echo $confirmPWD."|";exit;
     */


    $xml = '';
    $url = $GLOBALS['STORE_WEBSITE_SECURE_URL'] . "/api/api_change_pwd.php";

    if ($currentPWD != "" && $newPWD != "" && $confirmPWD != "") {
      if ($newPWD == $confirmPWD) {
        //create XML
        $xml = '<?xml version="1.0" encoding="utf-8" ?>';
        $xml .= '<request>';
        $xml .= '<user>';
        $xml .= '<ID>' . $UserID . '</ID>';
        $xml .= '<EmailID>' . $USER_NAME . '</EmailID>';
        $xml .= '<OldPWD>' . $currentPWD . '</OldPWD>';
        $xml .= '<NewPWD>' . $newPWD . '</NewPWD>';
        $xml .= '</user>';
        $xml .= '</request>';
      }

      $result = $this->sendXmlOverPost($url, $xml);
      $arrResult = explode("|", $result);

      echo $arrResult[0];
    }
  }

  public function actionSendmail() {

    /*
      Yii::import('application.extensions.phpmailer.JPhpMailer');
      $mail = new JPhpMailer;
      $mail->SetFrom(Yii::app()->params['adminEmail'], 'yourname');
      $mail->Subject = 'PHPMailer Test Subject via smtp, basic with authentication';
      $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
      $mail->MsgHTML('<h1>JUST A TEST!</h1>');
      $mail->AddAddress('sumit.sale@fortune4technologies.com', 'John Doe');
      $mail->Send();
     */


    $usertype = 'A';
    $email = 'jagdish@fortune4technologies.com';
    $user_password = 'sdasdj';

    if ($usertype == "A") {
      $filename = Yii::app()->basePath . "/../emailers/" . Yii::app()->params['STORE_FRONT_ID'] . "/TEXT/for_successful_user_registration.txt";
      $handle = fopen($filename, "rb");
      $textbody = fread($handle, filesize($filename));
      fclose($handle);

      $filename = Yii::app()->basePath . "/../emailers/" . Yii::app()->params['STORE_FRONT_ID'] . "/HTML/for_successful_user_registration.html";
      $handle = fopen($filename, "rb");
      $htmlbody = fread($handle, filesize($filename));
      fclose($handle);
      $subject = "Congratulations! You have successfully registered as an Artist on Artistaloud.com";
    } else {
      $filename = Yii::app()->basePath . "/../emailers/" . Yii::app()->params['STORE_FRONT_ID'] . "/TEXT/for_successful_user_registration.txt";
      $handle = fopen($filename, "rb");
      $textbody = fread($handle, filesize($filename));
      fclose($handle);

      $filename = Yii::app()->basePath . "/../emailers/" . Yii::app()->params['STORE_FRONT_ID'] . "/HTML/for_successful_user_registration.html";
      $handle = fopen($filename, "rb");
      $htmlbody = fread($handle, filesize($filename));
      fclose($handle);
      $subject = "Congratulations! You have successfully registered as a listener on Artistaloud.com";
    }

    $textbody = str_replace("<firstname>", $fname, $textbody);
    $textbody = str_replace("<sitename>", substr($GLOBALS['STORE_WEBSITE_ID'], 1), $textbody);
    $textbody = str_replace("<login>", $email, $textbody);
    $textbody = str_replace("<password>", $user_password, $textbody);
    $textbody = str_replace("<changepasswordurl>", $GLOBALS['EMAILER_PWD_URL'], $textbody);
    $textbody = str_replace("<sitenameurl>", $GLOBALS['STORE_WEBSITE_URL'], $textbody);
    $textbody = str_replace("<storeid>", Yii::app()->params['STORE_FRONT_ID'], $textbody);
    $textbody = str_replace("<contactusurl>", $GLOBALS['STORE_WEBSITE_URL'] . "/feedback", $textbody);

    $htmlbody = str_replace("<firstname>", $fname, $htmlbody);
    $htmlbody = str_replace("<sitename>", substr($GLOBALS['STORE_WEBSITE_ID'], 1), $htmlbody);
    $htmlbody = str_replace("<login>", $email, $htmlbody);
    $htmlbody = str_replace("<password>", $user_password, $htmlbody);
    $htmlbody = str_replace("<changepasswordurl>", $GLOBALS['EMAILER_PWD_URL'], $htmlbody);
    $htmlbody = str_replace("<sitenameurl>", $GLOBALS['STORE_WEBSITE_URL'], $htmlbody);
    $htmlbody = str_replace("<storeid>", Yii::app()->params['STORE_FRONT_ID'], $htmlbody);
    $htmlbody = str_replace("<contactusurl>", $GLOBALS['STORE_WEBSITE_URL'] . "/feedback", $htmlbody);

    Yii::import('application.extensions.phpmailer.JPhpMailer');
    $mail = new JPhpMailer;
    $mail->IsSMTP();
    $mail->Host = "smtpout.hungama.com";
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = "csout@hungama.com";  // GMAIL username
    $mail->Password = "J4cMqt5d";  // GMAIL password
    $mail->From = "noreply@hungama.com";
    $mail->SetFrom(Yii::app()->params['adminEmail'], 'ArtistAloud Admin');
    $mail->Subject = $subject;
    $mail->AltBody = $textbody;
    $mail->MsgHTML($htmlbody);
    $mail->AddAddress($email, $fname);
    $mail->Send();



    echo "hi";
    exit;
  }

  public function actionMusicDaySendMail() {

    if ($_POST) {
      $textbody = "Following email address has been registered for Music day: " . $_POST['emailId'];
      $htmlbody = "Following email address has been registered for Music day: " . $_POST['emailId'];

      Yii::import('application.extensions.phpmailer.JPhpMailer');
      $mail = new JPhpMailer;
      $mail->IsSMTP();
      $mail->Host = "smtpout.hungama.com";
      $mail->SMTPAuth = true;
      $mail->Port = 587;
      $mail->Username = "csout@hungama.com";  // GMAIL username
      $mail->Password = "J4cMqt5d";  // GMAIL password
      $mail->From = "noreply@hungama.com";
      $mail->SetFrom(Yii::app()->params['adminEmail'], 'ArtistAloud Admin');
      $mail->Subject = "Music Day Contest Entry";
      $mail->AltBody = $textbody;
      $mail->MsgHTML($htmlbody);
      $mail->AddAddress("artistaloud@gmail.com", "Artist Aloud");
      if($mail->Send()){
        echo "PASS";
      }else{
        echo 'FAIL';
      }
    } else {
      echo "wrong page";
    }
  }

}