<?php
	 ini_set('display_errors', 1);
	include_once("../common/connection.php"); 
	class Model{

		function string_shorten($text, $char) {
			$text = substr($text, 0, $char); //First chop the string to the given character length
			//If there exists any space just before the end of the chopped string take upto that portion only.
			if(substr($text, 0, strrpos($text, ' '))!='') $text = substr($text, 0, strrpos($text, ' ')); 
			//In this way we remove any incomplete word from the paragraph
			$text = $text.'..'; //Add continuation ... sign
			return $text; 
		}
		function string_shorten_No_Dot($text, $char) {
			$text = substr($text, 0, $char); //First chop the string to the given character length
			//If there exists any space just before the end of the chopped string take upto that portion only.
			if(substr($text, 0, strrpos($text, ' '))!='') $text = substr($text, 0, strrpos($text, ' ')); 
			//In this way we remove any incomplete word from the paragraph
			return $text; 
		}
		function getContent($file){
			$res = file_get_contents($file);
			$decode = json_decode($res,true);
			return $decode;
		}
		function getContentCURLUtils($url,$dodecode="true"){
			$ch = curl_init();
			$timeout = 5;
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
			$data = curl_exec($ch);
			curl_close($ch);
			if ($dodecode==true)
				$decode = json_decode($data,true);
			else
				$decode = $data;
			return $decode;
		}
		function decodeData($string){
			return strip_tags(stripslashes(trim(html_entity_decode(urldecode(html_entity_decode(urldecode($string)))))));
		}
		function encodeData($string){
			return urlencode(htmlentities($string));
		}
		function stringHandler($string,$length){
			if(strlen($string)<=$length){
			  return $string;
			}
			else {
			  $data = "";
			  $list = explode(" ",$string);
			  $i = 0;
			  $data[$i] = $list[$i];
			  if(strlen($data[$i]) <= $length){
				 $i++;
				 while(strlen($data[$i]) < $length){
				  $data[$i] = $data[$i-1]." ".$list[$i];
				  if(strlen($data[$i]) <= $length){
					$i++;
				  }
				  else{
					 return $data[$i-1];
				  }
				}
			  }
			  else
				return substr($data[$i],0,$length);
			}
		}

		function loginuser($params){
			try {
                
				  $this->email=$params['username'];
				  $this->password=md5($params['password']);

				$obj = new Connection();		
				$query = "SELECT * 
							FROM users u
							WHERE u.email ='$this->email' 
							AND u.password = '$this->password'
							AND deleted='0'";
                $rows=$obj->executeQuery($query);
				if(!empty($rows[0]['name'])){

					session_start();
					$_SESSION['username']=$rows[0]['name'];
					$_SESSION['email']=$rows[0]['email'];
                    $_SESSION['role']=$rows[0]['role'];               
                    return $rows;
				}
				else {
					session_start();
					$_SESSION['username']=$rows['admin'];
					$_SESSION['email']=$rows['admin@gmail.com'];
                    $_SESSION['role']=$rows['superadmin'];               
                    return $rows;
				}				

               /* 
                $this->username=$params['username'];
				$this->password=$params['password'];
			    
				if($this->username=="admin"&& $this->password=="admin"){
					session_start();
					$_SESSION['username']="admin";
					 return "success";
				  }                   
                else{
                 	
                   }*/
			}
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
 	
		function sendmail($params){
			//print_r($params);die;
			try {
				require 'mail\PHPMailerAutoload.php';
					// https://mandrillapp.com/login/
					$mail = new PHPMailer;
					 //$mail->SMTPDebug = 3;                               // Enable verbose debug output
					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'm.dharkar123@gmail.com';                 // SMTP username
					$mail->Password = 'manojdharkar@123';                           // SMTP password
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    // TCP port to connect to
					$mail->From = $params['email'];
					$mail->FromName = $params['name'];
					/*$mail->addAddress('manojdharkar00@gmail.com', 'manoj dharkar'); */    // Add a recipient
					$mail->addAddress('manojdharkar00@gmail.com', 'Admin');
					// $mail->addAddress('ellen@example.com');               // Name is optional
					//$mail->addReplyTo('info@example.com', 'Information');
					// $mail->addCC('cc@example.com');
					// $mail->addBCC('bcc@example.com');
					// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
					$mail->isHTML(true);                                  // Set email format to HTML

					$mail->Subject = 'Feedback';
					$mail->Body    =$params['comment'].''.$params['email'];
					$mail->AltBody = 'hi';

					if(!$mail->send()) {
					    echo 'Message could not be sent.';
					    echo 'Mailer Error: ' . $mail->ErrorInfo;
					} else {
					    //echo 'Message has been sent';
					    return 'Message has been sent';
					}

			}
			catch(PDOException $e){     
				echo 'SQL Server Error: ' . $e->getMessage();
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
			}	
		}
		function sendmail1($params){
			//print_r($params);die;
			try {
				$message = '
						<html>
						<head>
						  <title>WEBSITE URL</title>
						</head>
						<body>
						
						</body>
						</html>
						';
						
				require 'mail/PHPMailerAutoload.php';
					// https://mandrillapp.com/login/
					$mail = new PHPMailer;
					 //$mail->SMTPDebug = 3;                               // Enable verbose debug output
					$mail->isSMTP();                                      // Set mailer to use SMTP
				    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'm.dharkar123@gmail.com';                 // SMTP username
					$mail->Password = 'manojdharkar@123';                           // SMTP password
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                     // TCP port to connect to
					$mail->From = 'brainq@gmail.com';
					$mail->FromName = 'Thermax';
					$mail->addAddress($params['email'][0]);     // Add a recipient
					/*$mail->addAddress($params['email2'], $params['name']);*/
					// $mail->addAddress('ellen@example.com');               // Name is optional
					//$mail->addReplyTo('info@example.com', 'Information');
					// $mail->addCC('cc@example.com');
					// $mail->addBCC('bcc@example.com');
					// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
					$mail->isHTML(true);                                  // Set email format to HTML

					$mail->Subject = 'Url of Your Website';
					$mail->Body    = $params['email'][0].'		Company website url is:Demo message is here';
					$mail->AltBody = 'hi';

					if(!$mail->send()) { echo "HERE";exit;
					    echo 'Message could not be sent.';
					    echo 'Mailer Error: ' . $mail->ErrorInfo; exit;
					} else { 
					   echo "HERE NOOO"; exit;
					    //echo 'Message has been sent';
					    return 'Message has been sent'; exit;
					}

			}
			catch(PDOException $e){     
				echo 'SQL Server Error: ' . $e->getMessage();
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
			}	
		}
			function deleteuser($params){
			try {
				$obj = new Connection();
				$query = "update users set deleted='1' where id=?"; 	
			 	$rs = $obj->execute($query,array($params['id']));
				return $rs;					
			}
			catch(PDOException $e){     
				echo 'SQL Server Error: ' . $e->getMessage();
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
			}
		}
		
		
		
/*********************************************************************************************************************************************/
/*Funtions used in Thermax Limited*/
/*********************************************************************************************************************************************/
//Funtion to send invitation to New Vendors
function sendinvitation($params){
			//mail("bhavana.kalam@gmail.com","My subject","MY DUMMY MESSAGE");
			print_r($params); 
			 $cnt = count($params['email']);
			 echo "=====>".$cnt;
			for($i=0;$i<=$cnt;$i++)
			{ 
			    echo $params['email'][$i];
				
			} exit;
			foreach($params['email'] as $vendor_email)
			{
		         //your database query goes here
				 echo $vendor_email;
	        	 $to = $vendor_email;
				 $subject = "Thermax-Vendor invitation";
             	 $message = "
				<html>
				<head>
				<title>Thermax Vendor Invitation</title>
				</head>
				<body>
				<p>Please use login details given in this email and click on this link and fill you application:</p>
				<table>
				<tr>
				<th><a href='http://thermax.excellminds.com/'>http://thermax.excellminds.com/</a></th>
				<th>&nbsp;</th>
				</tr>
				<tr>
				<th>Username</th>
				<th>bhavana.kalam@gmail.com</th>
				</tr>
				<tr>
				<th>Password</th>
				<td>123</td>
				</tr>
				</table>
				</body>
				</html>
				";
			// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				
				// More headers
				$headers .= 'From: <webmaster@example.com>' . "\r\n";
				$headers .= 'Cc: myboss@example.com' . "\r\n";
				
				mail($to,$subject,$message,$headers);
				 }//End of foreach loop
			}
		
		
//Funtion to add and update business categories

function addcategory($params){
		/*print_r($params);die;*/
			try {	
					if($params['catid']==''){
						$obj = new Connection();
	                    $query 	= "INSERT INTO business_category(name) VALUES ('".addslashes($params['category2'])."')";
	                    $res    = $obj->execute($query);              
	                    return $res; 
	                }else{
	                	$obj = new Connection();
                    		$query 	= "UPDATE business_category SET name='".addslashes($params['category2'])."' WHERE id='".addslashes($params['catid'])."'";
                   			$res    = $obj->execute($query);
                    		return $res;
	                }        
                }

			catch(PDOException $e){     
				echo 'SQL Server Error: ' . $e->getMessage();
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
			}
		} //End of add category

//Funtion to delete business categories
function deletecategory($params){
			try {
				$obj = new Connection();
				$query = "update business_category set deleted='1' where id='".addslashes($params['id'])."'"; 	
			 	$rs = $obj->execute($query,array($params['id']));
				return $rs;					
			}
			catch(PDOException $e){     
				echo 'SQL Server Error: ' . $e->getMessage();
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
			}
		} //End of deletecategory
			
		
//Funtion to add and update countries
function addcountry($params){
		/*print_r($params);die;*/
			try {	
					if($params['countryid']==''){
						$obj = new Connection();
	                    $query 	= "INSERT INTO country(name) VALUES ('".addslashes($params['country2'])."')";
	                    $res    = $obj->execute($query);              
	                    return $res; 
	                }else{
	                	$obj = new Connection();
                    		$query 	= "UPDATE country SET name='".addslashes($params['country2'])."' WHERE id='".addslashes($params['countryid'])."'";
                   			$res    = $obj->execute($query);
                    		return $res;
	                }        
                }

			catch(PDOException $e){     
				echo 'SQL Server Error: ' . $e->getMessage();
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
			}
		} //End of add and update country

//Funtion to delete country
function deletecountry($params){
			try {
				$obj = new Connection();
				$query = "update country set deleted='1' where id='".addslashes($params['id'])."'"; 	
			 	$rs = $obj->execute($query,array($params['id']));
				return $rs;					
			}
			catch(PDOException $e){     
				echo 'SQL Server Error: ' . $e->getMessage();
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
			}
		} //End of deletecountry
					
		
	};
	$model = new Model;
?>