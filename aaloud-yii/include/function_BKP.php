<?php
require("config.php");
function fetchstorefrontinfo($STORE_ID=''){
   //sendDataOverPost(
	$hostip	=	sprintf('%u', ip2long($_SERVER['REMOTE_ADDR']));
	$url	=	$GLOBALS['STORE_WEB_URL']."/store_details_api.php";
	$fields =   "hostip=".$hostip;
	if($STORE_ID){
		$fields =   "store_front_id=".$STORE_ID;
	}	
	$method =   "GET";
	$package=	sendDataOverPost($url,$fields,$method);
	$data   = unserialize($package);
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

	$GLOBALS['STORE_FRONT_NAME']		= $data[STORE_FRONT_NAME];
	$GLOBALS['STORE_COUNTRY_ID']		= $data[STORE_COUNTRY_ID];
	$GLOBALS['STORE_CURRENCY']			= $data[STORE_CURRENCY];
	$GLOBALS['STORE_LANGUAGE_ID']		= $data[STORE_LANGUAGE_ID];
	$GLOBALS['STORE_WEBSITE_URL']		= $data[STORE_WEBSITE_URL];
	$GLOBALS['STORE_WEBSITE_PATH']		= $data[STORE_WEBSITE_PATH];
	$GLOBALS['STORE_ADMIN_EMAIL']		= $data[STORE_ADMIN_EMAIL];
	$GLOBALS['STORE_TEMPLATE_FOLDER']	= $data[STORE_TEMPLATE_FOLDER];
	$GLOBALS['STORE_FRONT_ID']			= $data[STORE_FRONT_ID];
	$GLOBALS['STORE_WEBSITE_SECURE_URL']= $data[STORE_WEBSITE_SECURE_URL];
	$GLOBALS['MAX_DOWNLOAD_COUNT']		= $data[MAX_DOWNLOAD_COUNT];
	$GLOBALS['GLOBAL_CART']				= $data[GLOBAL_CART];
	$GLOBALS['STORE_PAYMENT_URL']		= $data[STORE_PAYMENT_URL];
	$GLOBALS['STORE_DELIVERY_URL']		= $data[STORE_DELIVERY_URL];
	$GLOBALS['MERCHANT_ID']				= $data[MERCHANT_ID];//"hungama123";
	$GLOBALS['MERCHANT_PASSWORD']		= $data[MERCHANT_PASSWORD];//"hungama123";
	$GLOBALS['STORE_PARENT_URL']		= $data[STORE_PARENT_URL];
	$_SESSION["STORE_ID"]				= $GLOBALS['STORE_FRONT_ID'];
	$url								= $GLOBALS['STORE_WEBSITE_URL'];
	$url_explode						= explode(".",$url);
	$url_explode_count					= count($url_explode);
	$url_val							= "";
	if($url_explode_count>2){
		$url_val						= ".".$url_explode[$url_explode_count-2].".".$url_explode[$url_explode_count-1];	
	}
	$GLOBALS['STORE_WEBSITE_ID']		= $url_val;		
}

function sendDataOverPost($url, $fields, $method) {
	$ch = curl_init();
	if (strtoupper($method) == 'POST'){   
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	}else{
		curl_setopt($ch, CURLOPT_URL, $url . '?' . $fields);   
	}
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT,3);
	$result	= curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
	curl_close($ch);
	return $result;
}

function sendXmlOverPost($url, $xml) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);

  // For xml, change the content-type.
  curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));

  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ask for results to be returned
  curl_setopt($ch, CURLOPT_TIMEOUT,3);
  //if(CurlHelper::checkHttpsURL($url)) { 
  //  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  //  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  //}

  // Send to remote and return data to caller.
  $result	= curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 

  curl_close($ch);

  return $result;
}

function check_unique($tblname,$fldname,$fldvalue){
	$SqlChk =   mysql_query("select ".$fldname." as fld_value from ".$tblname." where ".$fldname."='".$fldvalue."'") or die(mysql_error());
	$nrC    =   mysql_num_rows($SqlChk);
	if(!$nrC){
		return  true;
	}else{
		return  false;
	}
}

//Insert Data
function insert($tblname,$tbl_data){
        while( $element = each( $tbl_data ) )
        {
            if($field_name==""){
                $field_name=$element[ 'key' ];
            }elseif($field_name!=""){
                $field_name=$field_name.",".$element[ 'key' ];
            }
            if($field_value==""){
                $field_value="'".$element[ 'value' ]."'";
            }elseif($field_value!=""){
                $field_value=$field_value.","."'".$element[ 'value' ]."'";
            }
        }
        mysql_query("Insert into ".$tblname." (".$field_name.")values(".$field_value.")")or die(mysql_error());
        return mysql_insert_id();
}

//Update Data
function update($tblname,$tbl_data,$id,$field){
        while( $element = each( $tbl_data ) )
        {
            if($field_name==""){
                $field_name=$element[ 'key' ]."="."'".$element[ 'value' ]."'";
            }elseif($field_name!=""){
                $field_name=$field_name.",".$element[ 'key' ]."="."'".$element[ 'value' ]."'";
            }
        }
        mysql_query("update ".$tblname."  set ".$field_name." where $field='$id'")or die(mysql_error());
        return True;
}

//Delete Data
function delete($tblname,$id,$field){
    mysql_query("delete from ".$tblname." where ".$field."='".$id."'")or die(mysql_error());
    return True;
}

function getDateFormat($time_stamp){
        return date("M d, Y H:i",$time_stamp);
}

function isValidEmail($email){
	return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}

function dropdown_country($selectedvalue){
    $query = "select * from tbl_country_master order by COUNTRY_NAME";
    $result = mysql_query($query);
    $rows = mysql_num_rows($result);
    for($i=0;$i<$rows;$i++){
        $row=mysql_fetch_array($result);
        if($selectedvalue == $row["COUNTRY_ID"])
            echo "<option value='".$row["COUNTRY_ID"]."' selected>".$row["COUNTRY_NAME"]."</option>";
        else
            echo "<option value='".$row["COUNTRY_ID"]."'>".$row["COUNTRY_NAME"]."</option>";
   }
}

function artist_image($artist_id,$typeid,$subtypeid){
   global $connection;
   $result=@query('select fn_get_artist_file('.$artist_id.','.$typeid.','.$subtypeid.') from dual',$connection);
   @list($file_path)=@fetch_row($result);
   return $file_path;
}

function artist_list(){
    $artist_list = "";
    $query = "select Artist_Id from tbl_aa_artist Where Artist_Status = 'P' order by Artist_Name";
    $result = mysql_query($query);
    $rows = mysql_num_rows($result);
    for($i=0;$i<$rows;$i++){
        $row=mysql_fetch_array($result);
        if(!$artist_list){
            $artist_list =  $row["Artist_Id"];
        }else{
            $artist_list .=  ",".$row["Artist_Id"];
        }
    }
    return $artist_list;
}

function writeCookie(){
	$useragent   = $_SERVER['HTTP_USER_AGENT'];
	$userip	     = $_SERVER['REMOTE_ADDR'];
	//$encrypt_key = md5($useragent.$userip);
	$encrypt_key = "48d9d2bbfdb0d128464d3d7ecfa626b4";
	$cipher		 = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
	$iv_size	 = mcrypt_enc_get_iv_size($cipher);
	$iv			 = '1234567890123456';
	$cleartext	 = "";	

	// loop through the session array with foreach
	foreach($_SESSION as $key=>$value){
		// and print out the values
		if(!$cleartext){
			$cleartext=$key.":::".$value;
		}else{
			$cleartext .= "|".$key.":::".$value;
		}
	}
	if(mcrypt_generic_init($cipher, $encrypt_key, $iv) != -1){
	// PHP pads with NULL bytes if $cleartext is not a multiple of the block size..
	$cipherText = mcrypt_generic($cipher,$cleartext);
	mcrypt_generic_deinit($cipher);
	// Display the result in hex.
	//$encrypted_value = base64_encode($cipherText);

	$cipherText	=	trim(chop(base64_encode($cipherText)));
	//printf("256-bit encrypted result:\n%s\n\n",$cipherText);
	//echo "<br><br>";
	//echo $cipherText;
	/* Terminate decryption handle and close module */
	}
	return $cipherText;
}

//Item Cart Count
function cartcount($cookie){
     $sql_add = " and COOKIE_ID='".$cookie."'";
     $sqlCart=mysql_query("select count(*) as ItemCount from TBL_CART where STATUS=1 ".$sql_add)or die(mysql_error());
      $rsCart=mysql_fetch_array($sqlCart);
      if(!$rsCart["ItemCount"]){
           $ItemCount=0;
      }else{
           $ItemCount= $rsCart["ItemCount"];
      }
      return $ItemCount;
}

function formatXmlString($xml)
{
	  // add marker linefeeds to aid the pretty-tokeniser (adds a linefeed between all tag-end boundaries)
  $xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);
  
  // now indent the tags
  $token      = strtok($xml, "\n");
  $result     = ''; // holds formatted version as it is built
  $pad        = 0; // initial indent
  $matches    = array(); // returns from preg_matches()
  
  // scan each line and adjust indent based on opening/closing tags
  while ($token !== false) : 
  
	// test for the various tag states
	
	// 1. open and closing tags on same line - no change
	if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) : 
	  $indent=0;
	// 2. closing tag - outdent now
	elseif (preg_match('/^<\/\w/', $token, $matches)) :
	  $pad--;
	// 3. opening tag - don't pad this one, only subsequent tags
	elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) :
	  $indent=1;
	// 4. no indentation needed
	else :
	  $indent = 0; 
	endif;
	
	// pad the line with the required number of leading spaces
	$line    = str_pad($token, strlen($token)+$pad, ' ', STR_PAD_LEFT);
	$result .= $line . "\n"; // add to the cumulative result, with linefeed
	$token   = strtok("\n"); // get the next token
	$pad    += $indent; // update the pad size for subsequent lines    
  endwhile; 
  
  return $result;
} //end function formatXmlString()

function likeCount($contentid){
	$like_html = "";
    $query = "select Count(L_ID) as LikeCount from tbl_aa_liked Where CONTENT_ID = '$contentid'";
    $result = mysql_query($query);
    $rows = mysql_num_rows($result);
    if($rows){
		$row=mysql_fetch_array($result);
		$likecount = $row['LikeCount'];
    }else{
		$likecount = 0;
	}
	$like_html = '<img src="images/heart1.gif" width="10" height="9" alt="" border="0" class="vertmid" /> '.$likecount;
	return $like_html;
}

//Add to Cart
function addtocart($content,$contenttype,$userid,$cookie,$qty){	
      $store_front_id = $_SESSION["STORE_ID"];
	  $content_title  = getContentTitle($content,$contenttype); 		
      $sql_add = " and COOKIE_ID='".$cookie."'";
      $sqlCart=mysql_query("select * from TBL_CART where CONTENT_ID='".$content."' and CONTENT_TYPE_ID='".$contenttype."'  ".$sql_add) or die(mysql_error());
      $nrL  =   mysql_num_rows($sqlCart);
      if(!$nrL){
          $today      =  time();
          $user_cart=array(
                'USER_ID'=>"$userid",
                'CONTENT_ID'=>"$content",
                'CONTENT_TYPE_ID'=>"$contenttype",
				'CONTENT_TITLE'=>"$content_title",
                'COOKIE_ID'=>"$cookie",
                'QUANTITY'=>"$qty",
                'STATUS'=>"1",
                'STORE_FRONT_ID'=>"$store_front_id",
                'ADDED_ON'=>"$today"
          );
          $cart=insert('TBL_CART',$user_cart);
      }
      $sqlCart=mysql_query("select count(*) as ItemCount from TBL_CART where STATUS=1 ".$sql_add)or die(mysql_error());
      $rsCart=mysql_fetch_array($sqlCart);
      if(!$rsCart["ItemCount"]){
           $ItemCount=0;
      }else{
           $ItemCount= $rsCart["ItemCount"];
      }

      return $ItemCount."::".$nrL;
}

//Get Content Title
function getContentTitle($cont_id,$cttype){
	global $connection;
	if($cttype!=3){
		$result=query('select a.content_display_title from tbl_contents a where a.content_id='.$cont_id,$connection);
	}else{
		$result=query('select distinct get_artist_names(\''.$cont_id.'\') as content_display_title from dual',$connection);
	}	
    list($content_display_title)=fetch_row($result);
	$content_display_title = mysql_escape_string(trim($content_display_title));
	return $content_display_title;
}
?>