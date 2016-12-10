<?php
	 session_start();
	 ini_set('display_errors', 1);
	include_once("../common/connection.php"); 
	class VendorModel{
		function getGeneralInfo(){
			$obj		=new Connection();
			session_start();
			$user_id= $_SESSION['user_id'];
			$query 		="SELECT * FROM vendor where user_id=$user_id and deleted=0 limit 1";
			$res=$obj->executeQuery($query);
			if(isset($res[0]))
			{
				return $res[0];
			}
			else{
				return false;
			}
					
		}
		function persistGeneralInfo($params){
		session_start();
		$params= json_encode($params,JSON_NUMERIC_CHECK);
		$params=json_decode($params,true);
		$params['user_id']= $_SESSION['user_id'];
		$insertString="";
		$updateString="";
		$columns="";
		$values="";
		foreach($params as $key => $value) {
				if($key!='vendor_id')
				{
					$columns.=$key.",";
					echo $key . gettype($value);
					if(gettype($value)=="string")
					{
						$values .="'".addslashes($value)."',";
						$updateString.=$key."="."'".addslashes(strtoupper($value))."',";	
					}else
					{
					   $values .=$value.",";
					   $updateString.=$key."=".addslashes(strtoupper($value)).",";	
					}	
				}
				
		}
		$columns = rtrim($columns, ",");
		$values = rtrim($values, ",");
		$updateString = rtrim($updateString, ",");
		try {	

					$obj = new Connection();
					if(!$params['vendor_id']){
							echo		$insertString.="INSERT INTO vendor (".$columns.") VALUES (".$values.")";
			            $res    = $obj->execute($insertString);              
              }else{
              		echo $query 	= "UPDATE vendor SET ".$updateString." WHERE user_id=".addslashes($params['user_id']);
               		$res    = $obj->execute($query);
                		return $res;
              }        
            
		   	}
			catch(PDOException $e){     
				return $params;
				echo 'SQL Server Error: ' . $e->getMessage();
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
			}
			
		}
		function getCompanyInfo(){
			session_start();
			$obj		=new Connection();
			$user_id= $_SESSION['user_id'];
			$companyInfoModel=array();
			$cmpCounter=0;
			$query="select vendor_certifications_id,company_certification_id,max(document_status) as document_status  
				from (

				SELECT vendor_certifications_id,company_certification_id,max(document_status) as document_status FROM vendor_company_certifications where vendor_id=( SELECT vendor_id FROM vendor WHERE user_id=".$user_id.") group by company_certification_id
				union
				SELECT 0 as vendor_certifications_id, certifications_id as company_certification_id, 0 as document_status  FROM mast_company_certification 
				    ) t  group by company_certification_id";
			$cmp_res=$obj->executeQuery($query);
			//var_dump($cmp_res);die;
			if(!empty($cmp_res))
			{
				foreach ($cmp_res as $row) {
					//$row['statutory_certifications']=$row['statutory_certifications']."asdfasdf";
					/*var_dump($row['statutory_certifications']);die;*/
						$cmpCounter++;
						$companyInfoModel['row'.$cmpCounter]=$row;	
				}
			}
			/*var_dump($companyInfoModel);die;*/
			//$this->persistCompanyInfo(json_decode(json_encode(array("companyInfoModel"=>$companyInfoModel))));
			//var_dump(json_encode($companyInfoModel));die;
		return array('companyInfoModel'=>$companyInfoModel);
					
		}
		function getStatutoryData(){
			session_start();
			$obj		=new Connection();
			$user_id= $_SESSION['user_id'];
			$statutoryDataModel=array();
			$stdCounter=0;
			$query 		="SELECT vendor_id,vendor_type FROM vendor WHERE user_id=".$user_id." limit 1";
			$ven_res=$obj->executeQuery($query);
			if(!empty($ven_res))
			{
				$vendor_id=$ven_res[0]['vendor_id'];
				$vendor_type=$ven_res[0]['vendor_type'];
				$query 		="select GROUP_CONCAT(statutory_data_id) as statutory_data_id FROM mast_statutory_data where find_in_set('".$vendor_type."',`vendor_type_id`) <> 0";
				$vend_res=$obj->executeQuery($query);
				if(!empty($vend_res[0]))
				{
					$statutory_data_id_array=$vend_res[0]['statutory_data_id'];
						$query 		="delete FROM vendor_statutory_data where vendor_id=".$vendor_id." and statutory_data_id not in (".$statutory_data_id_array.")";
						$del_res=$obj->execute($query);
				}
				$query 		="select vendor_statutory_data_id,statutory_data_id,document_status, statutory_data_value,statutory_data_name,regular_expression,min_length,max_length from ( SELECT vendor_statutory_data_id, vs.statutory_data_id, vs.document_status,vs.statutory_data_value, ms.statutory_data_name,ms.priority,ms.regular_expression,ms.min_length,ms.max_length FROM vendor_statutory_data vs left join mast_statutory_data ms on vs.statutory_data_id=ms.statutory_data_id where vendor_id=".$vendor_id." group by statutory_data_id union SELECT 0 as vendor_statutory_data_id, statutory_data_id, 0 as document_status ,'' as statutory_data_value, statutory_data_name,priority,regular_expression,min_length,max_length FROM mast_statutory_data where find_in_set('".$vendor_type."',`vendor_type_id`) <> 0 and deleted=0 ) t group by statutory_data_id order by priority";
				$std_res=$obj->executeQuery($query);
			}
			if(empty($std_res))
			{
					$vendor_type=1;
					$query 		="SELECT 0 as vendor_statutory_data_id, statutory_data_id, 0 as document_status ,'' as statutory_data_value, statutory_data_name,priority,regular_expression,min_length,max_length FROM mast_statutory_data where find_in_set('".$vendor_type."',`vendor_type_id`) <> 0 and deleted=0  group by statutory_data_id order by priority";
				    $std_res=$obj->executeQuery($query);
			}
					return array('statutoryDataModel'=>$std_res);
					
			
		}
		function persistStatutoryData($params){
			$obj		=new Connection();
			$params= json_encode($params,JSON_NUMERIC_CHECK);
			$params=json_decode($params,true);
			session_start();
			$user_id= $_SESSION['user_id'];
			$statutoryDataModel=isset($params['statutoryDataModel'])?$params['statutoryDataModel']:"";
			$query 		="SELECT vendor_id FROM vendor WHERE user_id=".$user_id ;
			$ven_res=$obj->executeQuery($query);
			$vendor_id=$ven_res[0]['vendor_id'];
			foreach($statutoryDataModel as $row) {
				$statutoryDataInsertString="";
				$statutoryDataUpdateString="";
				$statutoryDataColumns="";
				$statutoryDataColumnsValues="";
				$row['vendor_id']=(int)$vendor_id;
				$row['vendor_statutory_data_id']=isset($row['vendor_statutory_data_id'])?$row['vendor_statutory_data_id']:0;
					foreach($row as $key => $value) {
							if(in_array($key,  array('vendor_id','statutory_data_value','statutory_data_id')))
							{
								$statutoryDataColumns.=$key.",";
								if(gettype($value)=="string")
								{
									$statutoryDataColumnsValues .="'".addslashes(strtoupper($value))."',";
									$statutoryDataUpdateString.=$key."="."'".addslashes(strtoupper($value))."',";	
								}else
								{
									$statutoryDataColumnsValues .=strtoupper($value).",";
									$statutoryDataUpdateString.=$key."=".addslashes(strtoupper($value)).",";	
								}	
							}
							
						}
						
						$statutoryDataColumns = rtrim($statutoryDataColumns, ",");
						$statutoryDataColumnsValues = rtrim($statutoryDataColumnsValues, ",");
						$statutoryDataUpdateString = rtrim($statutoryDataUpdateString, ",");
						/*echo "<pre>";
			var_dump($statutoryDataUpdateString);*/
						try {	

							$obj = new Connection();
							if(!$row['vendor_statutory_data_id']){
								$statutoryDataInsertString.="INSERT INTO vendor_statutory_data (".$statutoryDataColumns.") VALUES (".$statutoryDataColumnsValues.")";
								$res    = $obj->execute($statutoryDataInsertString); 
							}else{
							$query 	= "UPDATE vendor_statutory_data SET ".$statutoryDataUpdateString." WHERE statutory_data_id=".addslashes($row['statutory_data_id'])." and vendor_id=".addslashes($row['vendor_id']);
								$res    = $obj->execute($query);
							}        

						}
						catch(PDOException $e){     
						return $query .'SQL Server Error: ' . $e->getMessage();
						header('HTTP/1.1 500 Internal Server Error'); 
						exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
						}
				}
				return $params;
				
		}
		function getManagementInfo(){
			session_start();
			$obj		=new Connection();
			$user_id= $_SESSION['user_id'];
			$managementKeyContactsModel=array();
			$managementRelationshipsModel=array();
			$managementVendorModel=array();
			$keyCounter=0;
			$relCounter=0;
			$query 		="SELECT * FROM vendor_management_key_contacts where vendor_id=( SELECT vendor_id FROM vendor WHERE user_id=".$user_id .") ";
			$key_res=$obj->executeQuery($query);

			if(!empty($key_res))
			{
				foreach ($key_res as $row) {
						$keyCounter++;
						$managementKeyContactsModel['row'.$keyCounter]=$row;	
				}
			}
			else{
				$key_res=array(1,2,3,4);
				foreach ($key_res as $row) {
						$managementKeyContactsModel['row'.$row]['name']="";
						$managementKeyContactsModel['row'.$row]['title']="";
						$managementKeyContactsModel['row'.$row]['landline']="";
						$managementKeyContactsModel['row'.$row]['mobile_number']="";
						$managementKeyContactsModel['row'.$row]['email']="";	
				}
			}
			$query 		="SELECT * FROM  vendor_management_related_entities where vendor_id=( SELECT vendor_id FROM vendor WHERE user_id=".$user_id .") ";
			$rel_res=$obj->executeQuery($query);
			if(!empty($rel_res))
			{
				foreach ($rel_res as $row) {
						$relCounter++;
						$managementRelationshipsModel['row'.$relCounter]=$row;	
				}
				
			}else
			{
					$rel_res=array(1,2,3,4);
					foreach ($rel_res as $row) {
							$managementRelationshipsModel['row'.$row]['relationship_id']="";
							$managementRelationshipsModel['row'.$row]['entity_name']="";
							$managementRelationshipsModel['row'.$row]['comman_person_name']="";
							$managementRelationshipsModel['row'.$row]['thermax_code']="";
					}
			}
			$query 		="SELECT vendor_id,relation_with_thermax,thermax_partner FROM vendor WHERE user_id=".$user_id." limit 1";
			$ven_res=$obj->executeQuery($query);
			if(isset($ven_res))
			{
				$managementVendorModel['vendor_id']=$ven_res[0]['vendor_id'];
				$managementVendorModel['relation_with_thermax']=$ven_res[0]['relation_with_thermax'];
				$managementVendorModel['thermax_partner']=$ven_res[0]['thermax_partner'];
			}
			return array('managementKeyContactsModel'=>$managementKeyContactsModel,'managementRelationshipsModel'=>$managementRelationshipsModel,'managementVendorModel'=>$managementVendorModel);

		}
		
		function persistManagementInfo($params){


			$params= json_encode($params,JSON_NUMERIC_CHECK);
			$params=json_decode($params,true);
			$managementKeyContactsModel=isset($params['managementKeyContactsModel'])?$params['managementKeyContactsModel']:"";
			$managementRelationshipsModel=isset($params['managementRelationshipsModel'])?$params['managementRelationshipsModel']:"";
			$managementVendorModel=isset($params['managementVendorModel'])?$params['managementVendorModel']:"";
				foreach($managementKeyContactsModel as $row) {
					$row['vendor_id']=isset($managementVendorModel['vendor_id'])?$managementVendorModel['vendor_id']:0;
					$keyContactsInsertString="";
					$keyContactsUpdateString="";
					$keyContactsColumns="";
					$keyContactsColumnsValues="";
					
					foreach($row as $key => $value) {

							$keyContactsColumns.=$key.",";
							if(gettype($value)=="string")
							{
								$keyContactsColumnsValues .="'".addslashes($value)."',";
								$keyContactsUpdateString.=$key."="."'".addslashes($value)."',";	
							}else
							{
								$keyContactsColumnsValues .=$value.",";
								$keyContactsUpdateString.=$key."=".addslashes($value).",";	
							}	

						}
						$keyContactsColumns = rtrim($keyContactsColumns, ",");
						$keyContactsColumnsValues = rtrim($keyContactsColumnsValues, ",");
						$keyContactsUpdateString = rtrim($keyContactsUpdateString, ",");
						try {	

							$obj = new Connection();
							if(!$row['vm_key_contact_id']){
								$keyContactsInsertString.="INSERT INTO vendor_management_key_contacts (".$keyContactsColumns.") VALUES (".$keyContactsColumnsValues.")";
									$res    = $obj->execute($keyContactsInsertString);              
							}else{
							$query 	= "UPDATE vendor_management_key_contacts SET ".$keyContactsUpdateString." WHERE vm_key_contact_id=".addslashes($row['vm_key_contact_id']);
								$res    = $obj->execute($query);
							}        

						}
						catch(PDOException $e){     
						return $keyContactsInsertString.'SQL Server Error: ' . $e->getMessage();
						header('HTTP/1.1 500 Internal Server Error'); 
						exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
						}

				}

				foreach($managementRelationshipsModel as $row) {
				$row['vendor_id']=isset($managementVendorModel['vendor_id'])?$managementVendorModel['vendor_id']:0;
				$relationshipsInsertString="";
			  	$relationshipsUpdateString="";
			  	$relationshipsColumns="";
			  	$relationshipsColumnsValues="";

				foreach($row as $key => $value) {

						$relationshipsColumns.=$key.",";
						if(gettype($value)=="string")
						{
							$relationshipsColumnsValues .="'".addslashes($value)."',";
							$relationshipsUpdateString.=$key."="."'".addslashes($value)."',";	
						}else
						{
							$relationshipsColumnsValues .=$value.",";
							$relationshipsUpdateString.=$key."=".addslashes($value).",";	
						}	

					}
					$relationshipsColumns = rtrim($relationshipsColumns, ",");
					$relationshipsColumnsValues = rtrim($relationshipsColumnsValues, ",");
					$relationshipsUpdateString = rtrim($relationshipsUpdateString, ",");
					try {	

						$obj = new Connection();
						if(!$row['related_entity_id']){
							$relationshipsInsertString.="INSERT INTO vendor_management_related_entities (".$relationshipsColumns.") VALUES (".$relationshipsColumnsValues.")";
								$res    = $obj->execute($relationshipsInsertString);              
						}else{
						$query 	= "UPDATE vendor_management_related_entities SET ".$relationshipsUpdateString." WHERE related_entity_id=".addslashes($row['related_entity_id']);
							$res    = $obj->execute($query);
						}        

					}
					catch(PDOException $e){     
					return $relationshipsInsertString.'SQL Server Error: ' . $e->getMessage();
					header('HTTP/1.1 500 Internal Server Error'); 
					exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
					}

				}
				if(isset($managementVendorModel)){
					try {	

								$vendorUpdateString="relation_with_thermax=".$managementVendorModel['relation_with_thermax'].",thermax_partner='".$managementVendorModel['thermax_partner']."'";
								/*echo $vendorUpdateString;*/
								$obj = new Connection();
								if($managementVendorModel['vendor_id']){
									$query 	= "UPDATE vendor SET ".$vendorUpdateString." WHERE vendor_id=".addslashes($managementVendorModel['vendor_id']);
									$res    = $obj->execute($query);              
								}        

						}
						catch(PDOException $e){     
						return $query.'SQL Server Error: ' . $e->getMessage();
						header('HTTP/1.1 500 Internal Server Error'); 
						exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
						}
				}
			
				return $res;	

		}

		function getBankDetails(){
			session_start();
			$obj		=new Connection();
			$user_id= $_SESSION['user_id'];
			$query 		="SELECT * FROM vendor_bank_details where vendor_id=( SELECT vendor_id FROM vendor WHERE user_id=".$user_id .") and deleted=0 limit 1";
			$res=$obj->executeQuery($query);
			if(isset($res[0]))
			{
				return $res[0];
			}
			else{
						$query 		="SELECT vendor_id FROM vendor WHERE user_id=".$user_id ." and deleted=0 limit 1";
						$res=$obj->executeQuery($query);
						if(isset($res[0]))
						{
							return $res[0];
						}else{
							return false;
						}
			}
					
		}
		function persistBankDetails($params){
		$params= json_encode($params,JSON_NUMERIC_CHECK);
		$params=json_decode($params,true);
		$insertString="";
		$updateString="";
		$columns="";
		$values="";
		foreach($params as $key => $value) {
				if($key!='bank_details_id')
				{
					$columns.=$key.",";
					if(gettype($value)=="string")
					{
						$values .="'".addslashes(strtoupper($value))."',";
						$updateString.=$key."="."'".addslashes($value)."',";	
					}else
					{
					   $values .=$value.",";
					   $updateString.=$key."=".addslashes(strtoupper($value)).",";	
					}	
				}
				
		}
		$columns = rtrim($columns, ",");
		$values = rtrim($values, ",");
		$updateString = rtrim($updateString, ",");
		try {	
					$obj = new Connection();
					if(!$params['bank_details_id']){
									$insertString.="INSERT INTO vendor_bank_details (".$columns.") VALUES (".$values.")";
			            $res    = $obj->execute($insertString);
			            return $res;              
              }else{
              		$query 	= "UPDATE vendor_bank_details SET ".$updateString." WHERE bank_details_id=".addslashes($params['bank_details_id']);
               		$res    = $obj->execute($query);
                		return $res;
              }        
            
		   	}
			catch(PDOException $e){     
				return $params;
				echo 'SQL Server Error: ' . $e->getMessage();
				header('HTTP/1.1 500 Internal Server Error'); 
				exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
			}
			
		}

		
		function persistCompanyInfo($params){
			session_start();
			$obj		=new Connection();
			$params= json_encode($params,JSON_NUMERIC_CHECK);
			$params=json_decode($params,true);
			$user_id= $_SESSION['user_id'];
			$companyInfoModel=isset($params['companyInfoModel'])?$params['companyInfoModel']:"";
			$query 		="SELECT vendor_id FROM vendor WHERE user_id=".$user_id ;
			$ven_res=$obj->executeQuery($query);
			$vendor_id=$ven_res[0]['vendor_id'];
			foreach($companyInfoModel as $row) {
				$companyInfoInsertString="";
				$companyInfoUpdateString="";
				$companyInfoColumns="";
				$companyInfoColumnsValues="";
				$row['vendor_id']=$vendor_id;
				$row['vendor_certifications_id']=isset($row['vendor_certifications_id'])?$row['vendor_certifications_id']:0;
					foreach($row as $key => $value) {
							$companyInfoColumns.=$key.",";
							if(gettype($value)=="string")
							{
								$companyInfoColumnsValues .="'".addslashes($value)."',";
								$companyInfoUpdateString.=$key."="."'".addslashes($value)."',";	
							}else
							{
								$companyInfoColumnsValues .=$value.",";
								$companyInfoUpdateString.=$key."=".addslashes($value).",";	
							}
						}
						
						$companyInfoColumns = rtrim($companyInfoColumns, ",");
						$companyInfoColumnsValues = rtrim($companyInfoColumnsValues, ",");
						$companyInfoUpdateString = rtrim($companyInfoUpdateString, ",");
						try {	

							$obj = new Connection();
							if(!$row['vendor_certifications_id']){
								$companyInfoInsertString.="INSERT INTO vendor_company_certifications (".$companyInfoColumns.") VALUES (".$companyInfoColumnsValues.")";
								$res    = $obj->execute($companyInfoInsertString); 
							}else{
							$query 	= "UPDATE vendor_company_certifications SET ".$companyInfoUpdateString." WHERE vendor_certifications_id=".addslashes($row['vendor_certifications_id']);
								$res    = $obj->execute($query);
							}        

						}
						catch(PDOException $e){     
						return 'SQL Server Error: ' . $e->getMessage();
						header('HTTP/1.1 500 Internal Server Error'); 
						exit("Something went wrong when we tried to get the contents. Please try again! Sorry for any inconvenience!" .$e);
						}
				}
				return $params;
				
		}
		function getPreviewData()
		{
			session_start();
			$generalInfoModel=array();
			$companyInfoModel=array();
			$managementKeyContactsModel=array();
			$managementRelationshipsModel=array();
			$statutoryDataModel=array();
			$bankDetailsModel=array();
			$obj		=new Connection();
			$user_id= $_SESSION['user_id'];
			/* General Info*/
			$ven_query 		="SELECT v.* ,et.name as entity_type,vt.vendor_type,vst.vendor_subtype FROM vendor v  left join mast_entity_type et on et.id=entity_type left join mast_vendor_type vt on vt.id=v.vendor_type left join mast_vendor_subtype vst on vst.id=v.vendor_sub_type where v.user_id=$user_id and v.deleted=0 limit 1";
			$ven_res=$obj->executeQuery($ven_query);

			/* Company Info*/
			$com_query 		="select mc.certification_name, vc.company_certification_id, CASE WHEN vc.document_status THEN 'YES' ELSE 'NO' END as document_status FROM vendor_company_certifications vc left join mast_company_certification mc on mc.certifications_id=vc.company_certification_id where vendor_id=( SELECT vendor_id FROM vendor WHERE user_id=".$user_id.") group by company_certification_id";
			$com_res=$obj->executeQuery($com_query);
			
			/* Management Info*/
			$man_query 	="SELECT vk.*,mk.key_contact FROM vendor_management_key_contacts vk left join mast_key_contact mk on vk.key_contact_id=mk.idmast_key_contact where name != '' and vendor_id=( SELECT vendor_id FROM vendor WHERE user_id=".$user_id .")";
			$man_res=$obj->executeQuery($man_query);
			
			/* Relatated Info*/
			
			$rel_query 	="SELECT vr.*,mr.name as relationship FROM vendor_management_related_entities vr left join mast_relationship mr on vr.relationship_id=mr.id where  entity_name!='' and vendor_id=( SELECT vendor_id FROM vendor WHERE user_id=".$user_id .")";
			$rel_res=$obj->executeQuery($rel_query);

			/* Statutory Info*/
			
			$sat_query 	="select document_status, statutory_data_value,ms.statutory_data_name  FROM vendor_statutory_data vs left join mast_statutory_data ms on vs.statutory_data_id=ms.statutory_data_id where vendor_id=( SELECT vendor_id FROM vendor WHERE user_id=".$user_id .") group by vs.statutory_data_id ";
			$sat_res=$obj->executeQuery($sat_query);
			

			/* Bank Info*/
			
			$ban_query 		="SELECT * FROM vendor_bank_details where vendor_id=( SELECT vendor_id FROM vendor WHERE user_id=".$user_id .") and deleted=0 limit 1";
			$ban_res=$obj->executeQuery($ban_query);
			
			if(!empty($ven_res[0]))
			{
				$generalInfoModel= $ven_res[0];
			}
			if(!empty($com_res))
			{
				$companyInfoModel= $com_res;
			}
			if(!empty($man_res))
			{
				$managementKeyContactsModel= $man_res;
			}
			if(!empty($rel_res))
			{
				$managementRelationshipsModel= $rel_res;
			}
			if(!empty($sat_res))
			{
				$statutoryDataModel= $sat_res;
			}
			if(!empty($ban_res))
			{
				$bankDetailsModel= $ban_res[0];
			}
			return  array('generalInfoModel' => $generalInfoModel,'companyInfoModel' => $companyInfoModel,'managementKeyContactsModel' => $managementKeyContactsModel,'managementRelationshipsModel' => $managementRelationshipsModel,'statutoryDataModel' => $statutoryDataModel,'bankDetailsModel' => $bankDetailsModel );
		}
		
}
	$model = new VendorModel;
//	$model->getPreviewData();
?>
