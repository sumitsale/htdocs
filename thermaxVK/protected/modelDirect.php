<?php
	include_once("common/connection.php"); 
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

		// Nitin Codes
		function getNewApplications($empid){
			try {
				$obj = new Connection();		
				//$query = "SELECT v.*,et.name,vt.vendor_type,vst.vendor_subtype FROM vendor v left join mast_entity_type et on et.id=entity_type left join mast_vendor_type vt on vt.id=v.vendor_type left join mast_vendor_subtype vst on vst.id=v.vendor_sub_type";
				//$rows=$obj->executeQuery($query);
				
				$query = "SELECT v.*,et.name,vt.vendor_type,vst.vendor_subtype FROM vendor v left join mast_entity_type et on et.id=entity_type left join mast_vendor_type vt on vt.id=v.vendor_type left join mast_vendor_subtype vst on vst.id=v.vendor_sub_type inner join vendor_users_invitation  vui on vui.vendoruseridref=v.user_id and invitationemployeeid=:employeeid";
				$rows=$obj->executeQuery($query,array(':employeeid' => $empid));
				
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}

		function getApprovalApplications($empid){
			try {
				$obj = new Connection();		
				
				$query = "SELECT v.*,vaa.*,et.name,vt.vendor_type,vst.vendor_subtype FROM vendor v left join mast_entity_type et on et.id=entity_type left join mast_vendor_type vt on vt.id=v.vendor_type left join mast_vendor_subtype vst on vst.id=v.vendor_sub_type inner join vendor_application_approval vaa on vaa.vendor_id_app=v.vendor_id and approver_id=:employeeid";
				$rows=$obj->executeQuery($query,array(':employeeid' => $empid));
				
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
		function getMyApplications($userId){
			try {
				$obj = new Connection();		
				$query = "SELECT v.*,et.name,vt.vendor_type,vst.vendor_subtype FROM vendor v left join mast_entity_type et on et.id=entity_type left join mast_vendor_type vt on vt.id=v.vendor_type left join mast_vendor_subtype vst on vst.id=v.vendor_sub_type where user_id=:userId";
				$rows=$obj->executeQuery($query,array(':userId' => $userId));
				
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
		function getVendorDetails($vendorId){
				//echo $vendorId;
			try {
				$obj = new Connection();	
				$data 	= array('count'=>'','generalInformation'=>'','companyInformation'=>'' , 'managementInformation'=> '',  'relatedEntitiesInformation'=> '','statutoryInformation'=>'','bankInformation'=>'');	
				
				$query="";$rows="";
				$query = "SELECT count(*) cnt FROM vendor v WHERE vendor_id = :vendorId";
				$rows=$obj->executeQuery($query,array(':vendorId' => $vendorId));
				
				$data['count'] 	= $rows[0]['cnt'];
				
				$query="";$rows="";
				$query = "SELECT v.*,et.name,vt.vendor_type,vst.vendor_subtype FROM vendor v left join mast_entity_type et on et.id=entity_type left join mast_vendor_type vt on vt.id=v.vendor_type left join mast_vendor_subtype vst on vst.id=v.vendor_sub_type WHERE vendor_id = :vendorId";
				$rows=$obj->executeQuery($query,array(':vendorId' => $vendorId));
				$data['generalInformation'] 	= $rows;
				
				$query="";$rows="";
				$query = "SELECT vcc.*,mcc.certification_name FROM vendor_company_certifications vcc join mast_company_certification mcc on mcc.certifications_id=vcc.company_certification_id WHERE vendor_id = :vendorId order by mcc.certifications_id";
				$rows=$obj->executeQuery($query,array(':vendorId' => $vendorId));
				$data['companyInformation'] 	= $rows;
				
				$query="";$rows="";
				$query = "SELECT vmkc.*,mkc.key_contact FROM vendor_management_key_contacts vmkc join mast_key_contact mkc on mkc.idmast_key_contact=vmkc.key_contact_id WHERE vendor_id = :vendorId";
				$rows=$obj->executeQuery($query,array(':vendorId' => $vendorId));
				$data['managementInformation'] 	= $rows;
				
				$query="";$rows="";
				$query = "SELECT vmre.*,mr.name FROM vendor_management_related_entities vmre join mast_relationship mr on mr.id=vmre.relationship_id WHERE vendor_id = :vendorId;";
				$rows=$obj->executeQuery($query,array(':vendorId' => $vendorId));
				$data['relatedEntitiesInformation'] 	= $rows;
				
				$query="";$rows="";
				$query = "SELECT vsd.*,msd.statutory_data_name FROM vendor_statutory_data vsd join mast_statutory_data msd on msd.statutory_data_id=vsd.statutory_data_id WHERE vendor_id = :vendorId";
				$rows=$obj->executeQuery($query,array(':vendorId' => $vendorId));
				$data['statutoryInformation'] 	= $rows;
				
				$query="";$rows="";
				$query = "SELECT * FROM vendor_bank_details WHERE vendor_id = :vendorId";
				$rows=$obj->executeQuery($query,array(':vendorId' => $vendorId));
				$data['bankInformation'] 	= $rows;
				
				return $data;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!" .$e);
			}
		}
		
		function getInvitedVendors($empid){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM vendor_users vu join vendor_users_invitation vui on vu.vendoruserid=vui.vendoruseridref where invitationemployeeid=:employeeid and role='Vendor' order by vendoruserid";
				$rows=$obj->executeQuery($query,array(':employeeid' => $empid));
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}

		function getApplicationComments($vendorid){
			try {
				$obj = new Connection();		
				$query = "SELECT vac.*,concat(emp_first_name,emp_last_name,' ') empname FROM vendor_applicationcomments vac left outer join mast_emp on commentsby=idmast_emp where vendorid_comments=:vendorid order by idvendor_applicationcomments desc ";
				$rows=$obj->executeQuery($query,array(':vendorid' => $vendorid));
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
		function getMyApplicationComments($vendorid){
			try {
				$obj = new Connection();		
				$query = "SELECT vac.* FROM vendor_applicationcomments vac where vendorid_comments=:vendorid and commentsflg=1 order by idvendor_applicationcomments desc limit 1";
				$rows=$obj->executeQuery($query,array(':vendorid' => $vendorid));
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
		function getDivision(){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM mast_division where deleted=0 order by divname";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}

		function getCertificates(){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM mast_company_certification where deleted=0 order by certifications_id";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
		function getDepartment(){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM mast_departments where deleted=0 order by name";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}

		function getTDSType(){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM mast_tds_type  where deleted=0 order by tds_type";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
		function getBusinessCategory(){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM mast_business_category  where deleted=0 order by name";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
		function getCurrency(){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM mast_currency  where deleted=0 order by currency_type";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}

		function getDeliveryTerms(){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM mast_delivery_terms  where deleted=0 order by term_name ";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}

		function getVED(){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM mast_ved  where deleted=0 order by ved_type ";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
		function getSuppStatus(){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM mast_suppstatus  where deleted=0 order by suppstatus_type ";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
		function getItemsList(){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM mast_supplier_items  where deleted=0 order by item_name";
				$rows=$obj->executeQuery($query);
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}

		function getPSectionDetails($vendorid){
			try {
				$obj = new Connection();		
				$query = "SELECT * FROM vendor_psecction where vendor_psecctionvid=:vendor_psecctionvid";
				$rows=$obj->executeQuery($query,array(':vendor_psecctionvid'=>$vendorid));
				return $rows;				
			}	
			catch(PDOException $e){
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
			}
		}
		
		//Manohar Functions
		function getvendorDetails1($params){

			$obj		=new Connection();
			$query 		="SELECT * FROM vendor WHERE company_id='".$params."'";
			$res=$obj->executeQuery($query);
			return $res;
		}
		function getVendorList(){
			$obj		=new Connection();
			$query 		="SELECT * FROM vendor WHERE 1";
			$res=$obj->executeQuery($query);
			return $res;
		}
		function getuserdetails(){
			$obj		=new Connection();
			$query 		="SELECT * FROM vendor_users WHERE role not IN('superadmin') and deleted='0'";
			$res=$obj->executeQuery($query);
			return $res;
		}
		function getUserInfo($params){
			$obj		=new Connection();
			$query 		="SELECT * FROM vendor_users WHERE id='".$params."' and deleted='0'";
			$res=$obj->executeQuery($query);
			return $res[0];
		}
 	};
	$model = new Model;
?>
