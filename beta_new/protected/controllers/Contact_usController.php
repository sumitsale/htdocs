<?php

class Contact_usController extends Controller
{

 public $layout = '//layouts/contact_us';
 public $detail = '';
 public $activemenu ="contactus";
 
	public function actionIndex($id="",$type="")
	{
	// echo $id;
	// echo $type;exit;
	
		$common_model  = New Common_model;
		
		if($id !='' && ($type !="suba-diving" || $type !="fishing" || $type !="Snorkelling"))
		{
		
		$result =$common_model->fetch_contact_us_detail_based_on_type($id,$type);
	
	
		if(count($result) == 0)
		{
			$this->redirect(Yii::app()->homeUrl);
		}
		
		}
		else{
		
			$result =array();
			$result[0]['name'] = $type;
		}
		// echo "<pre>";print_r($result);exit;
	
		$this->render('index',array(
		'result'=>$result,
		'type'=>$type
		));
	}
	
	public function actionSubmit()
	{
			$Enquiry  = New Enquiry;
			
			$Enquiry->type  		= $_POST['type'];
			$Enquiry->title  		= $_POST['title'];
			$Enquiry->telephone 	 = $_POST['telephone'];
			$Enquiry->no_of_room 		 = $_POST['no_of_room'];
			$Enquiry->name  		= $_POST['name'];
			$Enquiry->mobile  		= $_POST['mobile'];
			$Enquiry->last_name  		= $_POST['last_name'];
			$Enquiry->first_name		    = $_POST['first_name'];
			$Enquiry->estimate_budget		    = $_POST['estimated_budget'];
			$Enquiry->email_id		    = $_POST['email_id'];
			$Enquiry->comment_and_reference		    = $_POST['comments'];
			$Enquiry->chiled		    = $_POST['chiled'];
			$Enquiry->check_out		    = date("Y-m-d",strtotime($_POST['check_out']));
			$Enquiry->check_in		    = date("Y-m-d",strtotime($_POST['check_in']));
			$Enquiry->adult		    = $_POST['adult'];
			$Enquiry->address		    = $_POST['address'];
			$Enquiry->date_added		    = date("y-m-d H:i:s");
			$Enquiry->date_modified		    = date("y-m-d H:i:s");
			
			// $mail_content = file_get_contents(Yii::app()->getBaseUrl(true).'/emailer/emailer.php');
		
		
	$mail_content  = '<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body style="margin:0px; padding:0px;">
<table width="800" align="center" style="border-collapse:collapse; font-family:Arial, Helvetica, sans-serif; font-size:14px;">
	<tr>
  	<td style="margin:0px; padding:0px;">
    	<a href="javascript::void(0);">
      	<img src="{base_url}/emailer/images/mailer-1.png" width="100%">
      </a>
    </td>
  </tr>
  <tr>
  	<td style="margin:0px; padding:0px;">
    	<p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	Dear {title} {first_name}
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px;">
      	Thank you for visiting our website and enquiry for our services on your visit to {package_name}. 
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px;">
      	We had received you query and our team will prepare a best proposal on your query which will be forwarded to you as early as possible. We would be very grateful for your patients. 
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px;">
      	If you are not received the proposal or reply on your query within 24 hours (except on Govt. holiday), <br>
        please call us on +91 810 - 1221 - 000 / +91 9933 - 24 - 7373<br> or email us at <a href="mailto:info@mountainedge.in" style="color:blue; text-decoration:none">info@mountainedge.in</a> ;  <a href="mailto:enquiry.mountainedge@gmail.com" style="color:blue; text-decoration:none"> enquiry.mountainedge@gmail.com</a> <br>We always try to respond the query as immediate as possible.
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px;">
      	Enjoy exclusive deals for Andaman Islands on <a href="http://www.trip2andaman.com" target="_blank" style="color:blue; text-decoration:none">www.trip2andaman.com</a> or speak to our destination expert at above mentioned numbers.
      </p>
    </td>
  </tr>
  <tr>
  	<td style="margin:0px; padding:0px;">
    	<a href="javascript::void(0);">
      	<img src="{base_url}/emailer/images/mailer-2.png" width="100%">
      </a>
    </td>
  </tr>
  <tr>
  	<td style="margin:0px; padding:0px;">
    	<p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	As a precursor of our appreciation we would like to reward you for your patronage with an exclusive offers which make your holiday more joyful. 
      </p>
    </td>
  </tr>
  <tr>
  	<td style="margin:0px; padding:0px;">
    	<a href="javascript::void(0);">
      	<img src="{base_url}/emailer/images/mailer-3.png" width="100%">
      </a>
    </td>
  </tr>
  <tr>
  	<td style="margin:0px; padding:0px;">
    	<p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	We thank you once again for using our Online Booking Service and for choosing Jet Airways. 
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	For any clarifications please write to <a href="mailto:info@mountainedge.in" style="color:blue; text-decoration:none">info@mountainedge.in</a> 
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	Looking forward to having you on board!  
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	Sincerely<br>Team  
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	<span style="font-weight:bold">Mountain Edge Tours & Holidays Private Limited</span><br>
          1st Floor, Firdos Manzil, Near Clock Tower, Aberdeen Bazaar,<br>
          Port Blair – 744101, Andaman & Nicobar Islands<br>
          Tele : 03192 – 233725 / 232228  Fax : 03192 – 237200<br>
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	Reg. off : Opp. Rajasthan Manch, Shadipur, Port Blair – 744106,<br>
        Andaman & Nicobar Islands<br>
        Tel : 03192 – 234453  Fax : 03192 – 237200  
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	<span style="display:inline-block; width:65px;">Email       :</span> <a href="mailto:info@mountainedge.in" style="color:blue; text-decoration:none">info@mountainedge.in</a> ; <a href="mailto:mountainedgepb@gmail.com" style="color:blue; text-decoration:none">mountainedgepb@gmail.com</a><br>
				<span style="display:inline-block; width:65px;">website   :</span> <a href="http://www.trip2andaman.com" style="color:blue; text-decoration:none">www.trip2andaman.com </a> 
      </p>
    </td>
  </tr>
  <tr>
  	<td style="margin:0px; padding:0px;">
    	<p style="margin:0px; padding:0px;">
        ===================================================================================================
        <span style="display:block; font-weight:bold; margin-bottom:15px; margin-top:5px;">Legal Disclaimer</span>
        The information contained in this electronic message and any attachments to this message are intended for the exclusive use of the addressee(s) and may contain proprietary, confidential or privileged information. If you are not the intended recipient, you should not disseminate, distribute or copy this e-mail. Please notify the sender immediately and destroy all copies of this message and any attachments.
        <span style="display:block;margin-bottom:5px; font-weight:bold"></span>
        ===================================================================================================
      </p>
    </td>
  </tr>
</table>
</body>
</html>';
		
				
			$mail_content = str_replace('{title}',$Enquiry->title,$mail_content);	
			$mail_content = str_replace('{first_name}',$Enquiry->first_name,$mail_content);	
			$mail_content = str_replace('{package_name}',$Enquiry->name,$mail_content);	
			$mail_content = str_replace('{base_url}',Yii::app()->getBaseUrl(true),$mail_content);	
		$mail_content = trim(preg_replace('/\s+/', ' ', $mail_content));
			$uri = 'https://mandrillapp.com/api/1.0/messages/send.json';

$postString = '{
"key": "41MQlzZM9HW6UPlBjQbBdg",
"message": {
    "html": "' . str_replace('"','\\"',$mail_content) . '",
    "text": "' . str_replace('"','\\"',$mail_content) . '",
    "subject": "Enquiry Form",
    "from_email": "admin@trip2andaman.com",
    "from_name": "trip2andaman",
    "to": [
        {
            "email": "'.$Enquiry->email_id	.'",
            "name": "'.$Enquiry->first_name.'"
        }
    ],
    "headers": {

    },
    "track_opens": true,
    "track_clicks": true,
    "auto_text": true,
    "url_strip_qs": true,
    "preserve_recipients": true,

    "merge": true,
    "global_merge_vars": [

    ],
    "merge_vars": [

    ],
    "tags": [

    ],
    "google_analytics_domains": [

    ],
    "google_analytics_campaign": "...",
    "metadata": [

    ],
    "recipient_metadata": [

    ],
    "attachments": [

    ]
},
"async": false
}';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_URL, $uri);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout in seconds
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

$result = curl_exec($ch);

		
		
			if($Enquiry->save(false))
			{
				echo 1;
			}
			else
			{
				echo 2;
			}
			
			
			
	}
	
	public function actiontest()
	{
	// echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];exit;
	
	 // echo Yii::app()->getBaseUrl(true);exit;
	
	
	// $mail_content = file_get_contents(Yii::app()->getBaseUrl(true).'/emailer/emailer.php');
	

	$mail_content  = '<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body style="margin:0px; padding:0px;">
<table width="800" align="center" style="border-collapse:collapse; font-family:Arial, Helvetica, sans-serif; font-size:14px;">
	<tr>
  	<td style="margin:0px; padding:0px;">
    	<a href="javascript::void(0);">
      	<img src="{base_url}/emailer/images/mailer-1.png" width="100%">
      </a>
    </td>
  </tr>
  <tr>
  	<td style="margin:0px; padding:0px;">
    	<p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	Dear {title} {first_name}
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px;">
      	Thank you for visiting our website and enquiry for our services on your visit to {package_name}. 
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px;">
      	We had received you query and our team will prepare a best proposal on your query which will be forwarded to you as early as possible. We would be very grateful for your patients. 
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px;">
      	If you are not received the proposal or reply on your query within 24 hours (except on Govt. holiday), <br>
        please call us on +91 810 - 1221 - 000 / +91 9933 - 24 - 7373<br> or email us at <a href="mailto:info@mountainedge.in" style="color:blue; text-decoration:none">info@mountainedge.in</a> ;  <a href="mailto:enquiry.mountainedge@gmail.com" style="color:blue; text-decoration:none"> enquiry.mountainedge@gmail.com</a> <br>We always try to respond the query as immediate as possible.
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px;">
      	Enjoy exclusive deals for Andaman Islands on <a href="http://www.trip2andaman.com" target="_blank" style="color:blue; text-decoration:none">www.trip2andaman.com</a> or speak to our destination expert at above mentioned numbers.
      </p>
    </td>
  </tr>
  <tr>
  	<td style="margin:0px; padding:0px;">
    	<a href="javascript::void(0);">
      	<img src="{base_url}/emailer/images/mailer-2.png" width="100%">
      </a>
    </td>
  </tr>
  <tr>
  	<td style="margin:0px; padding:0px;">
    	<p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	As a precursor of our appreciation we would like to reward you for your patronage with an exclusive offers which make your holiday more joyful. 
      </p>
    </td>
  </tr>
  <tr>
  	<td style="margin:0px; padding:0px;">
    	<a href="javascript::void(0);">
      	<img src="{base_url}/emailer/images/mailer-3.png" width="100%">
      </a>
    </td>
  </tr>
  <tr>
  	<td style="margin:0px; padding:0px;">
    	<p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	We thank you once again for using our Online Booking Service and for choosing Jet Airways. 
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	For any clarifications please write to <a href="mailto:info@mountainedge.in" style="color:blue; text-decoration:none">info@mountainedge.in</a> 
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	Looking forward to having you on board!  
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	Sincerely<br>Team  
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	<span style="font-weight:bold">Mountain Edge Tours & Holidays Private Limited</span><br>
          1st Floor, Firdos Manzil, Near Clock Tower, Aberdeen Bazaar,<br>
          Port Blair – 744101, Andaman & Nicobar Islands<br>
          Tele : 03192 – 233725 / 232228  Fax : 03192 – 237200<br>
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	Reg. off : Opp. Rajasthan Manch, Shadipur, Port Blair – 744106,<br>
        Andaman & Nicobar Islands<br>
        Tel : 03192 – 234453  Fax : 03192 – 237200  
      </p>
      <p style="margin:0px; padding:0px; margin-bottom:15px; margin-top:15px;">
      	<span style="display:inline-block; width:65px;">Email       :</span> <a href="mailto:info@mountainedge.in" style="color:blue; text-decoration:none">info@mountainedge.in</a> ; <a href="mailto:mountainedgepb@gmail.com" style="color:blue; text-decoration:none">mountainedgepb@gmail.com</a><br>
				<span style="display:inline-block; width:65px;">website   :</span> <a href="http://www.trip2andaman.com" style="color:blue; text-decoration:none">www.trip2andaman.com </a> 
      </p>
    </td>
  </tr>
  <tr>
  	<td style="margin:0px; padding:0px;">
    	<p style="margin:0px; padding:0px;">
        ===================================================================================================
        <span style="display:block; font-weight:bold; margin-bottom:15px; margin-top:5px;">Legal Disclaimer</span>
        The information contained in this electronic message and any attachments to this message are intended for the exclusive use of the addressee(s) and may contain proprietary, confidential or privileged information. If you are not the intended recipient, you should not disseminate, distribute or copy this e-mail. Please notify the sender immediately and destroy all copies of this message and any attachments.
        <span style="display:block;margin-bottom:5px; font-weight:bold"></span>
        ===================================================================================================
      </p>
    </td>
  </tr>
</table>
</body>
</html>';
		
	$mail_content = str_replace('{title}','Mr.',$mail_content);	
	$mail_content = str_replace('{first_name}','Sumit',$mail_content);	
	$mail_content = str_replace('{package_name}','Dazzling Andaman',$mail_content);	
	$mail_content = str_replace('{base_url}',Yii::app()->getBaseUrl(true),$mail_content);	
	
			// echo $mail_content;exit;
			
			
			 $from = "admin@trip2andman.com"; // sender
			$subject = "Enquiry Form";
			$message = $mail_content;
			
			$headers = "From: " . strip_tags('admin@trip2andman.com') . "\r\n";
			// $headers .= "Reply-To: ". strip_tags('admin@trip2andman.com') . "\r\n";
			// $headers .= "CC: susan@example.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset: utf8\r\n";
						
			
			// if(mail("sumit.sale57@gmail.com",$subject,$message,$headers))
			// {
			// echo "Thank you for sending us feedback";
			// }
			// else
			// {
			// echo "cant send.";
			// }
			$mail_content = trim(preg_replace('/\s+/', ' ', $mail_content));
			$uri = 'https://mandrillapp.com/api/1.0/messages/send.json';

$postString = '{
"key": "41MQlzZM9HW6UPlBjQbBdg",
"message": {
    "html": "' . str_replace('"','\\"',$mail_content) . '",
    "text": "' . str_replace('"','\\"',$mail_content) . '",
    "subject": "Enquiry Form",
    "from_email": "admin@trip2andaman.com",
    "from_name": "trip2andaman",
    "to": [
        {
            "email": "sumit.sale57@gmail.com",
            "name": "Sumit"
        }
    ],
    "headers": {

    },
    "track_opens": true,
    "track_clicks": true,
    "auto_text": true,
    "url_strip_qs": true,
    "preserve_recipients": true,

    "merge": true,
    "global_merge_vars": [

    ],
    "merge_vars": [

    ],
    "tags": [

    ],
    "google_analytics_domains": [

    ],
    "google_analytics_campaign": "...",
    "metadata": [

    ],
    "recipient_metadata": [

    ],
    "attachments": [

    ]
},
"async": false
}';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $uri);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 400); //timeout in secondsa
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

$result = curl_exec($ch);

// echo $result;
			
			
			
			
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