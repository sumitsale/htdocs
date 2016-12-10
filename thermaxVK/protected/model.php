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

		function loginuser($params,$action){
			try {                
				$this->email=$params['username'];
				$this->password=md5($params['password']);
				// this is to be using LDAP
				$obj = new Connection();		
				//$query = "SELECT * FROM mast_employee u WHERE u.employee_email ='$this->email'";
				$query = "SELECT u.*,divname employee_div, name employee_dept FROM mast_emp u join mast_division d on u.emp_div=d.divid join mast_departments dp on u.emp_dep=dp.id WHERE u.employee_email='$this->email'";
				
				$rows=$obj->executeQuery($query);
				if(!empty($rows[0]['emp_first_name'])){
					session_start();
					$_SESSION['empid']=$rows[0]['idmast_emp'];
					$_SESSION['username']=$rows[0]['emp_first_name'];
					$_SESSION['email']=$rows[0]['employee_email'];
					$_SESSION['dept']=$rows[0]['emp_dep'];
					$_SESSION['div']=$rows[0]['emp_div'];
					
					$query = "SELECT * from mast_employee_approver where employee_aid='".$rows[0]['idmast_emp']."' and division='".$rows[0]['employee_div']."'";
					$qrows=$obj->executeQuery($query);
					
					if (!empty($qrows[0]['approvertype']))
						$_SESSION['role']='Approver'; 
					else
						$_SESSION['role']='Initiator'; 
                    
					return $rows;
				}
				/*else {
					session_start();
					$_SESSION['username']=$rows['admin'];
					$_SESSION['email']=$rows['admin@gmail.com'];
                    $_SESSION['role']=$rows['superadmin'];               
                    return $rows;
				}*/
			}
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}		
		
		function vloginuser($params,$action){
			try {
				//print_r($params); 
                if($action=="loginuser"){
					$this->email=$params['username'];
					$this->password=md5($params['password']);
				}else{
					$this->email=$params['vusername'];
					$this->password=md5($params['vpassword']);
				}
				
				$obj = new Connection();		
				$query = "SELECT * FROM vendor_users u WHERE u.email ='$this->email' AND u.password = '$this->password' AND deleted='0'";
                $rows=$obj->executeQuery($query);
				if(!empty($rows[0]['name'])){
					session_start();
					$_SESSION['user_id']=$rows[0]['vendoruserid'];
					$_SESSION['username']=$rows[0]['name'];
					$_SESSION['email']=$rows[0]['email'];
                    $_SESSION['role']=$rows[0]['role'];   
					$_SESSION['isNew']=$rows[0]['isNew']; 
					//$_SESSION['isPassChanged']=$rows[0]['is_password_changed']; 					
                    return $rows;
				}
				else {
					session_start();
					$_SESSION['username']=$rows['admin'];
					$_SESSION['email']=$rows['admin@gmail.com'];
                    $_SESSION['role']=$rows['superadmin']; 
					$_SESSION['isNew']=$rows[0]['isNew'];
					//$_SESSION['isPassChanged']=$rows[0]['is_password_changed']; 					
                    return $rows;
				}				
			}
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
 	
		function sendmail($name,$email,$password){
			try {
				require 'mail\PHPMailerAutoload.php';
					// https://mandrillapp.com/login/
					$mail = new PHPMailer;
					 //$mail->SMTPDebug = 3;                               // Enable verbose debug output
					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'kuchnaisabkuch@gmail.com';                 // SMTP username
					$mail->Password = 'gsincerely24';                           // SMTP password
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    // TCP port to connect to
					$mail->From = "kuchnaisabkuch@gmail.com";
					$mail->FromName = "Thermax Pvt Ltd";
					/*$mail->addAddress('manojdharkar00@gmail.com', 'manoj dharkar'); */    // Add a recipient
					$mail->addAddress($email);
					// $mail->addAddress('ellen@example.com');               // Name is optional
					//$mail->addReplyTo('info@example.com', 'Information');
					// $mail->addCC('cc@example.com');
					// $mail->addBCC('bcc@example.com');
					// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
					$mail->isHTML(true);                                  // Set email format to HTML

					$mail->Subject = 'Invitation - Thermax';
					$mail->Body    ="This is the body";
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
		
		function deleteuser($params){
			try {
				$obj = new Connection();
				$query = "update vendor_users set deleted='1' where vendoruserid=?"; 	
			 	$rs = $obj->execute($query,array($params['vendoruserid']));
				return $rs;					
			}
			catch(PDOException $e){     
				echo 'SQL Server Error: ' . $e->getMessage();
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
			}
		}
		
		function sendinvitationmailtouser($name,$email,$password){
			//$email= $record['email'];
			require 'PHPMailerAutoload.php';
			$name= $name;						
			$mail = new PHPMailer;
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'bh-30.webhostbox.net';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'admin@eventgroupmumbai.com';                 // SMTP username
			$mail->Password = 'event@123$';                           // SMTP password
			$mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			$mail->From = 'suresh_nitin@hotmail.com';
			$mail->FromName = 'Thermax';
			$mail->addAddress($email, '');     // Add a recipient
			//$mail->addAddress("suresh_nitin@hotmail.com", '');  
			//$mail->addReplyTo('admin@eventgroupmumbai.com', 'JCL Admin');
			//$mail->addCC('admin@eventgroupmumbai.com');
			//$mail->addBCC('suresh_nitin@hotmail.com');
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = "Invitation - Thermax";
			$mail->Body    = "Hello ".$name.",<br><br>".$message." <br><br>Warm Regards,<br>Event Group";
			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			}
		}
		
		
		function sendinvitation($name,$email,$password){
			$vendor_name = $name;
			$vendor_email = $email;
			$to = $vendor_email;
			$subject = "Invitation - Thermax Ltd";
			$message = "";
			$message = "
			<html>
			<head>
			<title>Thermax - Invitation Mail</title>
			</head>
			<body>
			<p>Hello ".$vendor_name.", 
			<p>Please use login details given in this email and click on this link and fill your application:</p>
			<table>
			<tr>
			<th><a href='http://thermax.vendorkonnect.com/'>http://thermax.vendorkonnect.com/</a></th><br>
			<th>&nbsp;</th>
			</tr>
			<tr>
			<th>Username</th>
			<th>".$vendor_email."</th>
			</tr>
			<tr>
			<th>Password</th>
			<td>".$password."</td>
			</tr>
			</table>
			</body>
			</html>
			";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$headers .= 'From: Thermax Ltd.<webmaster@example.com>' . "\r\n";
			//$headers .= 'Cc: myboss@example.com' . "\r\n";
			$res = mail($to,$subject,$message,$headers);
			return $res;
		}
		
		// Nitin Codes
		function getNewApplications(){
			try {
				$obj = new Connection();		
				$query = "SELECT v.*,et.name,vt.vendor_type,vst.vendor_subtype FROM vendor v left join mast_entity_type et on et.id=entity_type left join mast_vendor_type vt on vt.id=v.vendor_type left join mast_vendor_subtype vst on vst.id=v.vendor_sub_type";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
		function searchVendorDetails($phrase){
			try {
				$obj = new Connection();		
				$query = "SELECT vendor_name as value, vendor_id as id FROM vendor where vendor_name like '%".$phrase."%'";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}			
		}
		
		function searchBankDetails($phrase){
			try {
				$obj = new Connection();		
				$query = "SELECT bank_ifsc as value, idmast_bank as id FROM mast_bank where bank_ifsc like '%".$phrase."%'";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}			
		}
		
		function getVendorDetails($param){
			try {
				$obj = new Connection();		
				//$query = "SELECT vendor_name,email,vsd.statutory_data_value as name FROM vendor v, vendor_users u,vendor_statutory_data vsd where u.vendoruserid=v.user_id and v.vendor_id=vsd.vendor_id and statutory_data_id=1 and (v.vendor_id='".$param['vid']."' or v.vendor_name like '%".$param['vid']."%')";
				$query = "SELECT vendor_name,email FROM vendor v, vendor_users u where u.vendoruserid=v.user_id and (v.vendor_id='".$param['vid']."' or v.vendor_name like '%".$param['vid']."%' or v.baancode='".$param['vid']."' or v.oraclecode='".$param['vid']."')";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}			
		}

		function getBankDetailsIFSC($param){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM mast_bank where idmast_bank = '".$param['vid']."' or bank_ifsc='".$param['vid']."'";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}			
		}
		
		function sendInvitationMail($param){
			try {
				$obj = new Connection();	
				session_start();
				$str = "";
				$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
				$length=6;
				$max = count($characters) - 1;
				for ($i = 0; $i < $length; $i++) {
					$rand = mt_rand(0, $max);
					$str .= $characters[$rand];
				}
				
				$actualpass=$str;
				$actualpass="123";
				$password=md5($actualpass);
				$query = "insert into vendor_users(name,email,password,actualpass,role,isNew,is_password_changed,date) values(:vname, :vemail, :password,:actualpass,:role,:isnew,:ispasswordchange,:date)";
				$lastid=$obj->execute($query,array(':vname' => $param['vendor_name'],':vemail' => $param['vendor_email'],':password' => $password,':actualpass' => $actualpass,':role' => 'Vendor',':isnew' => 'Y',':ispasswordchange' => 'N',':date' => date('d-M-Y')),true);
				
				$query = "insert into vendor_users_invitation(invitationemployeeid,vendoruseridref,invitationdeptid,invitationdivid,status) values(:empid, :vendorref,:deptid,:divid,'Sent')";
				$rows=$obj->execute($query,array(':empid' => $_SESSION['empid'],':vendorref' => $lastid,':deptid'=>$_SESSION['dept'],':divid'=>$_SESSION['div']));
				//$this->sendinvitation($param['vendor_name'],$param['vendor_email'],$actualpass);
			//	$this->sendinvitationmailtouser($param['vendor_name'],$param['vendor_email'],$actualpass);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
		function checkPassword($param){
			try {
				$obj = new Connection();
				session_start();
				$query = "select * from vendor_users where email=:email and actualPass=:password";
				$rows=$obj->executeQuery($query,array(':email'=>$_SESSION['email'],':password'=>$param['oldpassword']));
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}			
		}
		
		function getApprover($param){
			try {
				$obj = new Connection();
				session_start();
				//$query = "select * from mast_employee where employee_isapprover=1 and employee_dept=:dept";
				$query="SELECT *,concat(emp_first_name,emp_last_name,' ') empname FROM mast_employee_approver join mast_emp on employee_aid=idmast_emp where division=:dept";
				$rows=$obj->executeQuery($query,array(':dept'=>$param['cbodept']));
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}			
		}
		
		function changePassword($param){
			try {
				$obj = new Connection();
				session_start();
				$md5pass=md5($param['newpassword']);
				$query = "update vendor_users set actualpass=:actualpass,password=:password,is_password_changed='Y' where email=:email";
				$rows=$obj->execute($query,array(':actualpass'=>$param['newpassword'],':password'=>$md5pass,':email'=>$_SESSION['email']));
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}			
		}
		
		function saveApplicationComment($param){
			try {
				$obj = new Connection();
				session_start();
				$section=$param['section'];
				$vid=$param['txthidden_'.$section];
				$commentsby=$_SESSION['empid'];
				$comment=$param['txtcomment_'.$section];		
				$commentsflg=$param['commentsflg'];
				
				$query = "INSERT INTO vendor_applicationcomments (date, vendorid_comments, commentsby, comments, commentssection,commentsflg) VALUES (:date, :vendorid, :commentby, :comment, :section,:commentsflg)";
				$rows=$obj->execute($query,array(':date'=>date('d-M-Y'),':vendorid'=>$vid,':commentby'=>$commentsby,':comment'=>$comment,':section'=>$section,':commentsflg'=>$commentsflg));
				
				if($commentsflg==1){
					$query = "update vendor set app_status='VendorPending' where vendor_id=:vendorid";
					$rows=$obj->execute($query,array(':vendorid'=>$vid));
				}
				
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}			
		}
		
		function apprejApplication($param){
			try {
				$obj = new Connection();
				session_start();
				$section=$param['section'];
				$vid=$param['txthiddenapp'];
				$commentsby=$_SESSION['empid'];
				$comment=$param['txtcommentapp'];		
				$commentsflg=$param['commentsflg'];
				
				$query = "INSERT INTO vendor_applicationcomments (date, vendorid_comments, commentsby, comments, commentssection,commentsflg) VALUES (:date, :vendorid, :commentby, :comment, :section,:commentsflg)";
				$rows=$obj->execute($query,array(':date'=>date('d-M-Y'),':vendorid'=>$vid,':commentby'=>$commentsby,':comment'=>$comment,':section'=>$section,':commentsflg'=>$commentsflg));
				
				if($commentsflg==1){
					$query = "update vendor set app_status='VendorPending' where vendor_id=:vendorid";
					$rows=$obj->execute($query,array(':vendorid'=>$vid));
				}
				if($section=="Approve"){
					$query = "update vendor set app_status='Accepted' where vendor_id=:vendorid";
					$rows=$obj->execute($query,array(':vendorid'=>$vid));
					
					$query="update vendor_application_approval set approver_status='Approved' where approver_id='".$commentsby."' and vendor_id_app='".$vid."'";
					$rows=$obj->execute($query);
				}else{
					$query="update vendor_application_approval set approver_status='Rejected' where approver_id='".$commentsby."' and vendor_id_app='".$vid."'";
					$rows=$obj->execute($query,array(':vendorid'=>$vid));
					
					$query="insert into vendor_application_approval(vendor_id_app,date,approver_id,approver_status) values('".$vendor_psecctionvid."','".date('d-M-Y')."','".$res[0]['employee_aid']."','Pending')";
					$rows=$obj->execute($query);
				}
				
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}			
		}
		
		function saveApplicationPSection($param){
			try {
				$obj = new Connection();
				session_start();
				$vendor_psecctiondiv=$param['cbodivision'];
				$vendor_psecctionvid=$param['txthidden_psection'];
				$vendor_psecctionempid=$_SESSION['empid'];
				$vendor_psecctiontdstype=$param['cbotdstype'];
				$vendor_psecctionbuscat=$param['cbobuscat'];
				$vendor_psecctioncurr=$param['cbocurrency'];
				$vendor_psecctiondterms=$param['cbodelterm'];
				$vendor_psecctiontpurchase=$param['rdpurchase'];
				$vendor_psecctionscat=$param['rdsupcat'];
				$vendor_psecctionved=$param['cbovedCat'];
				$vendor_psecctionsstatus=$param['cbosuppstatus'];
				$vendor_psecctionsitem=$param['cboitemlists'];
				
				$query = "SELECT * FROM vendor_psecction where vendor_psecctionvid=:vendor_psecctionvid";
				$rows=$obj->executeQuery($query,array(':vendor_psecctionvid'=>$vendor_psecctionvid));
				if($rows[0]['vendor_psecctionvid']!=''){
					$query = "update vendor_psecction set vendor_psecctiondate=:vendor_psecctiondate, vendor_psecctionempid=:vendor_psecctionempid, vendor_psecctiondiv=:vendor_psecctiondiv, vendor_psecctiontdstype=:vendor_psecctiontdstype, vendor_psecctionbuscat=:vendor_psecctionbuscat, vendor_psecctioncurr=:vendor_psecctioncurr, vendor_psecctiondterms=:vendor_psecctiondterms, vendor_psecctiontpurchase=:vendor_psecctiontpurchase, vendor_psecctionscat=:vendor_psecctionscat, vendor_psecctionved=:vendor_psecctionved, vendor_psecctionsstatus=:vendor_psecctionsstatus, vendor_psecctionsitem=:vendor_psecctionsitem where vendor_psecctionvid=:vendor_psecctionvid";
					$rows=$obj->execute($query,array(':vendor_psecctiondate'=>date('d-M-Y'),':vendor_psecctionempid'=>$vendor_psecctionempid,':vendor_psecctiondiv'=>$vendor_psecctiondiv,':vendor_psecctiontdstype'=>$vendor_psecctiontdstype,':vendor_psecctionbuscat'=>$vendor_psecctionbuscat, ':vendor_psecctioncurr'=>$vendor_psecctioncurr,':vendor_psecctiondterms'=>$vendor_psecctiondterms,':vendor_psecctiontpurchase'=>$vendor_psecctiontpurchase,':vendor_psecctionscat'=>$vendor_psecctionscat, ':vendor_psecctionved'=>$vendor_psecctionved,':vendor_psecctionsstatus'=>$vendor_psecctionsstatus,':vendor_psecctionsitem'=>$vendor_psecctionsitem,':vendor_psecctionvid'=>$vendor_psecctionvid));
				}
				else{
					$query = "INSERT INTO vendor_psecction (vendor_psecctiondate, vendor_psecctionvid, vendor_psecctiondiv, vendor_psecctiontdstype, vendor_psecctionbuscat, vendor_psecctioncurr, vendor_psecctiondterms, vendor_psecctiontpurchase, vendor_psecctionscat, vendor_psecctionved, vendor_psecctionsstatus, vendor_psecctionsitem, vendor_psecctionempid) VALUES (:vendor_psecctiondate, :vendor_psecctionvid, :vendor_psecctiondiv, :vendor_psecctiontdstype, :vendor_psecctionbuscat, :vendor_psecctioncurr, :vendor_psecctiondterms, :vendor_psecctiontpurchase, :vendor_psecctionscat, :vendor_psecctionved, :vendor_psecctionsstatus, :vendor_psecctionsitem, :vendor_psecctionempid)";
					$rows=$obj->execute($query,array(':vendor_psecctiondate'=>date('d-M-Y'),':vendor_psecctionempid'=>$vendor_psecctionempid,':vendor_psecctiondiv'=>$vendor_psecctiondiv,':vendor_psecctiontdstype'=>$vendor_psecctiontdstype,':vendor_psecctionbuscat'=>$vendor_psecctionbuscat, ':vendor_psecctioncurr'=>$vendor_psecctioncurr,':vendor_psecctiondterms'=>$vendor_psecctiondterms,':vendor_psecctiontpurchase'=>$vendor_psecctiontpurchase,':vendor_psecctionscat'=>$vendor_psecctionscat, ':vendor_psecctionved'=>$vendor_psecctionved,':vendor_psecctionsstatus'=>$vendor_psecctionsstatus,':vendor_psecctionsitem'=>$vendor_psecctionsitem,':vendor_psecctionvid'=>$vendor_psecctionvid));
				}
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}			
		}
		
		function initiateAppProc($param){
			try {
				$obj = new Connection();
				session_start();
				$vendor_psecctiondiv=$param['cbodivision'];
				$vendor_psecctionvid=$param['txthidden_psection'];
				$vendor_psecctionempid=$_SESSION['empid'];
				
				$query = "select * from  mast_employee_approver mea where division=".$vendor_psecctiondiv." and employee_aid not in (select approver_id from vendor_application_approval where vendor_id_app=".$vendor_psecctionvid." ) order by approverorder limit 1";
				$res=$obj->executeQuery($query);
				
				if($res[0]['employee_aid']!=''){
					$query="insert into vendor_application_approval(vendor_id_app,date,approver_id,approver_status) values('".$vendor_psecctionvid."','".date('d-M-Y')."','".$res[0]['employee_aid']."','Pending')";
					$rows=$obj->execute($query);
					
					$section='Application Approval';
					$commentsby='';
					$comment="Submitted for Approval.";		
					$commentsflg='0';					
					$query = "INSERT INTO vendor_applicationcomments (date, vendorid_comments, commentsby, comments, commentssection,commentsflg) VALUES (:date, :vendorid, :commentby, :comment, :section,:commentsflg)";
					$rows=$obj->execute($query,array(':date'=>date('d-M-Y'),':vendorid'=>$vendor_psecctionvid,':commentby'=>$vendor_psecctionempid,':comment'=>$comment,':section'=>$section,':commentsflg'=>$commentsflg));
					
					$query = "update vendor set app_status='ApproverPending' where vendor_id=".$vendor_psecctionvid;
					$rows=$obj->execute($query);
				}
				
				
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!".$e);
			}
		
		}
		
		// Manohar Functions:
		function getVendorTypes(){
			$obj		=new Connection();
			$query 		="SELECT * FROM mast_vendor_type where deleted=0";
			$res=$obj->executeQuery($query);
			return $res;
		}
		function getVendorSubTypes(){
			$obj		=new Connection();
			$query 		="SELECT * FROM mast_vendor_subtype where deleted=0";
			$res=$obj->executeQuery($query);
			return $res;
		}
		function getEntityTypes(){
			$obj		=new Connection();
			$query 		="SELECT * FROM mast_entity_type where deleted=0";
			$res=$obj->executeQuery($query);
			return $res;
		}
		function getKeyContacts(){
			$obj		=new Connection();
			$query 		="SELECT * FROM mast_key_contact";
			$res=$obj->executeQuery($query);
			return $res;
		}
		function getRelationships(){
			$obj		=new Connection();
			$query 		="SELECT * FROM mast_relationship";
			$res=$obj->executeQuery($query);
			return $res;
		}
		function getCountries(){
			$obj		=new Connection();
			$query 		="SELECT * FROM mast_country";
			$res=$obj->executeQuery($query);
			return $res;
		}
		function getStates(){
			$obj		=new Connection();
			$query 		="SELECT * FROM mast_state";
			$res=$obj->executeQuery($query);
			$states=array();
			foreach ($res as $key => $value) {
				$states[$key]['name']=utf8_encode($value['name']);
			
			}
			return $states;
		}
		function savesubmitform(){
			try {
				$obj = new Connection();
				session_start();
				$query = "update vendor set app_status='Submitted' where user_id=".$_SESSION['user_id'];
				$rows=$obj->execute($query);
				
				$query = "SELECT vendor_id FROM vendor where user_id=".$_SESSION['user_id'];
				$rows=$obj->executeQuery($query);
				
				$vid=$rows[0]['vendor_id'];
				
				$section='Vendor Provided';
				$commentsby='';
				$comment="Details provided as requested.";		
				$commentsflg='0';
				
				$query = "INSERT INTO vendor_applicationcomments (date, vendorid_comments, commentsby, comments, commentssection,commentsflg) VALUES (:date, :vendorid, :commentby, :comment, :section,:commentsflg)";
				$rows=$obj->execute($query,array(':date'=>date('d-M-Y'),':vendorid'=>$vid,':commentby'=>$commentsby,':comment'=>$comment,':section'=>$section,':commentsflg'=>$commentsflg));			
				
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}	
		}
		function uploadCodeOfConduct(){
			try {
				$data = array();
				if(!empty($_FILES))
				{  
				    $error = false;
				    $files = array();

				    $uploaddir = getcwd()."\..\uploads\/";
				    foreach($_FILES as $file)
				    {
				        if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
				        {
				            $files[] = $uploaddir .$file['name'];
				               $obj = new Connection();
								session_start();
								$query = "update  vendor_users set code_of_conduct_doc='".$file['name']."' where vendoruserid=".$_SESSION['user_id'];
								$rows=$obj->execute($query);
								
				        }
				        else
				        {
				            $error = true;
				        }
				    }
				   return true;
				}
				else
				{
				    return false;
				}

			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}	
		}
	};
	$model = new Model;
?>
