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

	$GLOBALS['EMAILER_PWD_URL']			= $data[EMAILER_PWD_URL];
	$GLOBALS['EMAILER_CONTACT_URL']		= $data[EMAILER_CONTACT_URL];
	$GLOBALS['EMAILER_CONTACTING_URL']	= $data[EMAILER_CONTACTING_URL];

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
	curl_setopt($ch, CURLOPT_TIMEOUT,20);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result	= curl_exec($ch);
	if($result === false){
		error_log("Curl cannot connect with remote host ".curl_error($ch)." URL :".$url);
		die("Request Timeout");
	}
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
  curl_setopt($ch, CURLOPT_TIMEOUT,20);
  //if(CurlHelper::checkHttpsURL($url)) { 
  //  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  //  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  //}

  // Send to remote and return data to caller.
  $result	= curl_exec($ch);
  if($result === false){
	 error_log("Curl cannot connect with remote host ".curl_error($ch)." URL :".$url);
	 die("Request Timeout");
  }
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

function content_genre($content_id){
   global $connection;
   $result=@query('select get_first_genre('.$content_id.') from dual',$connection);
   @list($genre)=@fetch_row($result);
   return $genre;
}

function content_language($content_id){
   global $connection;
   $result=@query('select get_first_language('.$content_id.') from dual',$connection);
   @list($language)=@fetch_row($result);
   return $language;
}

function artist_gallery($content_id,$content_subtype_id=112,$content_type_id=1){
   global $connection;
   $result=@query("select f.file_path from tbl_files f, tbl_content_files cf where cf.file_id = f.file_id and cf.content_sub_type_id = '".$content_subtype_id."' and cf.content_type_id='".$content_type_id."' and cf.content_id =".$content_id,$connection);
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

function paisavasool_list(){
    $artist_list = "";
    $query = "select ARTIST_ID from tbl_paisa_vasool";
    $result = mysql_query($query);
    $rows = mysql_num_rows($result);
    for($i=0;$i<$rows;$i++){
        $row=mysql_fetch_array($result);
        if(!$artist_list){
            $artist_list =  $row["ARTIST_ID"];
        }else{
            $artist_list .=  ",".$row["ARTIST_ID"];
        }
    }
    return $artist_list;
}

function newrelease_list(){
    $artist_list = "";
    $query = "select ARTIST_ID from tbl_wap_newreleases";
    $result = mysql_query($query);
    $rows = mysql_num_rows($result);
    for($i=0;$i<$rows;$i++){
        $row=mysql_fetch_array($result);
        if(!$artist_list){
            $artist_list =  $row["ARTIST_ID"];
        }else{
            $artist_list .=  ",".$row["ARTIST_ID"];
        }
    }
    return $artist_list;
}

function firstones_list(){
    $artist_list = "";
    $query = "select ARTIST_ID from tbl_first_ones";
    $result = mysql_query($query);
    $rows = mysql_num_rows($result);
    for($i=0;$i<$rows;$i++){
        $row=mysql_fetch_array($result);
        if(!$artist_list){
            $artist_list =  $row["ARTIST_ID"];
        }else{
            $artist_list .=  ",".$row["ARTIST_ID"];
        }
    }
    return $artist_list;
}

function featured_artist_list($contenttype){
    $artist_list = "";
    $query = "select Artist_Id from tbl_aa_featured Where CONTENT_TYPE_ID='".$contenttype."'";
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

//Get Pop Up Version 1 for Audio
function getPopUpAudio_v1($val1,$val2,$val3,$val4){
$AudioPopup='';
$AudioPopup = '<div class="popup" style="display:none;" >
	<div class="fl"><img src="images/left.png" width="6" height="37" alt="" /></div>
	<div class="tooltip1" id="tooltip">
		<style type="text/css">
			.optshow_'.$val1.'_1{background:#000;position:absolute;z-index:10001}
			.optshow_'.$val1.'_2{background:#000;position:absolute;z-index:1000}
		</style>
		<script language="Javascript" type="text/javascript">
		$(document).ready(function(){
			$("a[rel^=\'prettyPopin'.$val3.'\']:eq(0)").prettyPopin({followScroll:false});
			$("a[rel^=\'prettyPopin'.$val3.'\']:eq(1)").prettyPopin({});
		});
		</script>
		<div class="optshow_'.$val1.'_2" id="like'.$val3.'" style="width:195px;height:19px" onMouseOut="changeClass(\'options'.$val3.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">
			<img src="images/like_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /> <span id="likemsg'.$val3.'" class="w_fff"></span>
		</div>

		<div class="optshow_'.$val1.'_2" id="cart'.$val3.'" style="width:195px;height:20px;" onMouseOut="changeClass(\'options'.$val3.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">
			<img src="images/cart_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /> <span id="cartmsg'.$val3.'" class="w_fff">item added to cart</span>
		</div>

		<div class="optshow_'.$val1.'_1" id="options'.$val3.'">
			<table border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left">
				<div style="margin-left:0px">
				<a href="javascript:void(0);" class="g_11"><img src="images/info_icon.jpg" width="16" height="15" alt="" border="0" class="vertmid" /></a>
				<a href="trackinfo.php?content_id='.$val1.'" class="fnt9 w_fff mr5" rel="prettyPopin'.$val3.'">Info</a>
				<a href="javascript:void(0);"><img src="images/like_icon.gif" width="14" height="14" alt="" border="0" class="vertmid" /></a>
				<a href="javascript:void(0);" class="fnt9 w_fff mr5" onclick="addtolike(\''.$val1.'\',\''.$val2.'\',\''.$val3.'\',\''.$val4.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'options'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">Like</a>
				<a href="javascript:void(0);"><img src="images/plus_icon.gif" width="13" height="13" alt="" border="0" class="vertmid" /></a>
				<a href="playlist.php?content_id='.$val1.'" class="fnt9 w_fff" rel="prettyPopin'.$val3.'">Save</a> &nbsp;
				<a href="javascript:void(0);"><img src="images/cart_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /></a>
				<a href="javascript:void(0);" class="fnt9 w_fff" onclick="addtocart(\''.$val1.'\',\''.$val2.'\',\''.$val3.'\',\'cart'.$val3.'\',\'like'.$val3.'\',\'options'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">Buy</a>
				</div></td>
			  </tr>
			</table>
		</div>
	</div>
	<div class="fl"><img src="images/right.png" width="6" height="37" alt="" /></div>
	<br class="cl" />
	
</div>';
echo $AudioPopup;
}

//Get Pop Up Version 2 for Audio
function getPopUpAudio_v2($val1,$val2,$val3,$val4){
$AudioPopup='';
$AudioPopup = '<div class="popup" style="display:none;" >
	<div class="fl"><img src="images/left.png" width="6" height="37" alt="" /></div>
	<div class="tooltip" id="tooltip" style="width:140px; padding-left:50px">
		<style type="text/css">
			.optshow_'.$val1.'_1{background:#000;position:absolute;z-index:10001}
			.optshow_'.$val1.'_2{background:#000;position:absolute;z-index:1000}
		</style>
		<script language="Javascript" type="text/javascript">
		$(document).ready(function(){
			$("a[rel^=\'prettyPopin'.$val3.'\']:eq(0)").prettyPopin({followScroll:false});
			$("a[rel^=\'prettyPopin'.$val3.'\']:eq(1)").prettyPopin({});
		});
		</script>
		<div class="optshow_'.$val1.'_2" id="like'.$val3.'" style="width:180px;height:19px; margin-left:-40px" onMouseOut="changeClass(\'options'.$val3.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">
			<img src="images/like_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /> <span id="likemsg'.$val3.'" class="w_fff"></span>
		</div>

		<div class="optshow_'.$val1.'_2" id="cart'.$val3.'" style="width:180px;height:20px; margin-left:-40px" onMouseOut="changeClass(\'options'.$val3.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">
			<img src="images/cart_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /> <span id="cartmsg'.$val3.'" class="w_fff">item added to cart</span>
		</div>

		<div class="optshow_'.$val1.'_1" id="options'.$val3.'" style="width:170px; margin-left:-40px; padding-left:20px">
			<table border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left">
				<div style="margin-left:0px">
				<a href="javascript:void(0);" class="g_11"><img src="images/info_icon.jpg" width="16" height="15" alt="" border="0" class="vertmid" /></a>
				<a href="trackinfo.php?content_id='.$val1.'" class="fnt9 w_fff" rel="prettyPopin'.$val3.'">Info</a>
				<a href="javascript:void(0);"><img src="images/like_icon.gif" width="14" height="14" alt="" border="0" class="vertmid" /></a>
				<a href="javascript:void(0);" class="fnt9 w_fff" onclick="addtolike(\''.$val1.'\',\''.$val2.'\',\''.$val3.'\',\''.$val4.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'options'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">Like</a> &nbsp;
				<a href="javascript:void(0);"><img src="images/cart_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /></a>
				<a href="javascript:void(0);" class="fnt9 w_fff" onclick="addtocart(\''.$val1.'\',\''.$val2.'\',\''.$val3.'\',\'cart'.$val3.'\',\'like'.$val3.'\',\'options'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">Buy</a>
				</div></td>
			  </tr>
			</table>
		</div>
	</div>
	<div class="fl"><img src="images/right.png" width="6" height="37" alt="" /></div>
	<br class="cl" />
	
</div>';
echo $AudioPopup;
}

//Get Pop Up Version 1 for Audio
function getPopUpAudio_v3($val1,$val2,$val3,$val4){
$AudioPopup='';
$AudioPopup = '<div class="popup" style="display:none;" >
	<div class="fl"><img src="images/left.png" width="6" height="37" alt="" /></div>
	<div class="tooltip" id="tooltip" style="width:180px; padding-left:50px">
		<style type="text/css">
			.optshow_'.$val1.'_1{background:#000;position:absolute;z-index:10001}
			.optshow_'.$val1.'_2{background:#000;position:absolute;z-index:1000}
		</style>
		<script language="Javascript" type="text/javascript">
		$(document).ready(function(){
			$("a[rel^=\'prettyPopin'.$val3.'\']:eq(0)").prettyPopin({followScroll:false});
			$("a[rel^=\'prettyPopin'.$val3.'\']:eq(1)").prettyPopin({});
		});
		</script>
		<div class="optshow_'.$val1.'_2" id="like'.$val3.'" style="width:180px;height:19px; margin-left:-10px" onMouseOut="changeClass(\'options'.$val3.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">
			<img src="images/like_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /> <span id="likemsg'.$val3.'" class="w_fff"></span>
		</div>

		<div class="optshow_'.$val1.'_2" id="cart'.$val3.'" style="width:180px;height:20px; margin-left:-10px" onMouseOut="changeClass(\'options'.$val3.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">
			<img src="images/cart_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /> <span id="cartmsg'.$val3.'" class="w_fff">item added to cart</span>
		</div>

		<div class="optshow_'.$val1.'_1" id="options'.$val3.'" style="width:200px; margin-left:-10px">
			<table border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left">
				<div style="margin-left:0px">
				<a href="javascript:void(0);" class="g_11"><img src="images/info_icon.jpg" width="16" height="15" alt="" border="0" class="vertmid" /></a>
				<a href="trackinfo.php?content_id='.$val1.'" class="fnt9 w_fff" rel="prettyPopin'.$val3.'">Info</a>
				<a href="javascript:void(0);"><img src="images/plus_icon.gif" width="13" height="13" alt="" border="0" class="vertmid" /></a>
				<a href="playlist.php?content_id='.$val1.'" class="fnt9 w_fff" rel="prettyPopin'.$val3.'">Save</a> &nbsp;
				<a href="javascript:void(0);"><img src="images/cart_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /></a>
				<a href="javascript:void(0);" class="fnt9 w_fff" onclick="addtocart(\''.$val1.'\',\''.$val2.'\',\''.$val3.'\',\'cart'.$val3.'\',\'like'.$val3.'\',\'options'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">Buy</a>
				</div></td>
			  </tr>
			</table>
		</div>
	</div>
	<div class="fl"><img src="images/right.png" width="6" height="37" alt="" /></div>
	<br class="cl" />
	
</div>';
echo $AudioPopup;
}

//Get Pop Up Version 1 for Audio
function getPopUpAudio_v4($val1,$val2,$val3,$val4){
$AudioPopup='';
$AudioPopup = '<div class="popup" style="display:none;" >
	<div class="fl"><img src="images/left.png" width="6" height="37" alt="" /></div>
	<div class="tooltip" id="tooltip">
		<style type="text/css">
			.optshow_'.$val1.'_3{background:#000;position:absolute;z-index:10001}
			.optshow_'.$val1.'_4{background:#000;position:absolute;z-index:1000}
		</style>
		<script language="Javascript" type="text/javascript">
		$(document).ready(function(){
			$("a[rel^=\'prettyPopin'.$val3.'\']:eq(0)").prettyPopin({followScroll:false});
			$("a[rel^=\'prettyPopin'.$val3.'\']:eq(1)").prettyPopin({});
		});
		</script>
		<div class="optshow_'.$val1.'_4" id="like'.$val3.'" style="width:240px;height:19px" onMouseOut="changeClass(\'options'.$val3.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'optshow_'.$val1.'_3\',\'optshow_'.$val1.'_4\',\'optshow_'.$val1.'_4\');">
			<img src="images/like_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /> <span id="likemsg'.$val3.'" class="w_fff"></span>
		</div>

		<div class="optshow_'.$val1.'_4" id="cart'.$val3.'" style="width:240px;height:20px;" onMouseOut="changeClass(\'options'.$val3.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'optshow_'.$val1.'_3\',\'optshow_'.$val1.'_4\',\'optshow_'.$val1.'_4\');">
			<img src="images/cart_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /> <span id="cartmsg'.$val3.'" class="w_fff">item added to cart</span>
		</div>

		<div class="optshow_'.$val1.'_3" id="options'.$val3.'">
			<table border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left">
				<div style="margin-left:0px">
				<a href="javascript:void(0);" class="g_11"><img src="images/info_icon.jpg" width="16" height="15" alt="" border="0" class="vertmid" /></a>
				<a href="trackinfo.php?content_id='.$val1.'" class="fnt9 w_fff" rel="prettyPopin'.$val3.'">Info</a>
				<a href="javascript:void(0);"><img src="images/like_icon.gif" width="14" height="14" alt="" border="0" class="vertmid" /></a>
				<a href="javascript:void(0);" class="fnt9 w_fff" onclick="addtolike(\''.$val1.'\',\''.$val2.'\',\''.$val3.'\',\''.$val4.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'options'.$val3.'\',\'optshow_'.$val1.'_3\',\'optshow_'.$val1.'_4\',\'optshow_'.$val1.'_4\');">Like</a>
				<a href="javascript:void(0);"><img src="images/plus_icon.gif" width="13" height="13" alt="" border="0" class="vertmid" /></a>
				<a href="playlist.php?content_id='.$val1.'" class="fnt9 w_fff" rel="prettyPopin'.$val3.'">Save</a> &nbsp;
				<a href="javascript:void(0);"><img src="images/cart_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /></a>
				<a href="javascript:void(0);" class="fnt9 w_fff" onclick="addtocart(\''.$val1.'\',\''.$val2.'\',\''.$val3.'\',\'cart'.$val3.'\',\'like'.$val3.'\',\'options'.$val3.'\',\'optshow_'.$val1.'_3\',\'optshow_'.$val1.'_4\',\'optshow_'.$val1.'_4\');">Buy</a>
				</div></td>
			  </tr>
			</table>
		</div>
	</div>
	<div class="fl"><img src="images/right.png" width="6" height="37" alt="" /></div>
	<br class="cl" />
	
</div>';
echo $AudioPopup;
}

//Get Pop Up Version 1 for Audio
function getPopUpAudio_v5($val1,$val2,$val3,$val4){
$AudioPopup='';
$AudioPopup = '<div class="popup" style="display:none;" >
	<div class="fl"><img src="images/left.png" width="6" height="37" alt="" /></div>
	<div class="tooltip" id="tooltip" style="width:180px; padding-left:50px">
		<style type="text/css">
			.optshow_'.$val1.'_1{background:#000;position:absolute;z-index:10001}
			.optshow_'.$val1.'_2{background:#000;position:absolute;z-index:1000}
		</style>
		<script language="Javascript" type="text/javascript">
		$(document).ready(function(){
			$("a[rel^=\'prettyPopin'.$val3.'\']:eq(0)").prettyPopin({followScroll:false});
			$("a[rel^=\'prettyPopin'.$val3.'\']:eq(1)").prettyPopin({});
		});
		</script>
		<div class="optshow_'.$val1.'_2" id="like'.$val3.'" style="width:180px;height:19px; margin-left:-10px" onMouseOut="changeClass(\'options'.$val3.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">
			<img src="images/like_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /> <span id="likemsg'.$val3.'" class="w_fff"></span>
		</div>

		<div class="optshow_'.$val1.'_2" id="cart'.$val3.'" style="width:180px;height:20px; margin-left:-10px" onMouseOut="changeClass(\'options'.$val3.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">
			<img src="images/cart_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /> <span id="cartmsg'.$val3.'" class="w_fff">item added to cart</span>
		</div>

		<div class="optshow_'.$val1.'_1" id="options'.$val3.'" style="width:200px; margin-left:-10px">
			<table border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left">
				<div style="margin-left:0px">
				<a href="javascript:void(0);" class="g_11"><img src="images/info_icon.jpg" width="16" height="15" alt="" border="0" class="vertmid" /></a>
				<a href="trackinfo.php?content_id='.$val1.'" class="fnt9 w_fff" rel="prettyPopin'.$val3.'">Info</a>
				<a href="javascript:void(0);"><img src="images/like_icon.gif" width="14" height="14" alt="" border="0" class="vertmid" /></a>
				<a href="javascript:void(0);" class="fnt9 w_fff" onclick="addtolike(\''.$val1.'\',\''.$val2.'\',\''.$val3.'\',\''.$val4.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'options'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">Like</a>
				<a href="javascript:void(0);"><img src="images/plus_icon.gif" width="13" height="13" alt="" border="0" class="vertmid" /></a>
				<a href="purchasedplaylist.php?content_id='.$val1.'" class="fnt9 w_fff" rel="prettyPopin'.$val3.'">Save</a> &nbsp;
				</div></td>
			  </tr>
			</table>
		</div>
	</div>
	<div class="fl"><img src="images/right.png" width="6" height="37" alt="" /></div>
	<br class="cl" />
	
</div>';
echo $AudioPopup;
}

//Get Pop Up Version 1 for Audio
function getPopUpAudio_v6($val1,$val2,$val3,$val4,$val5,$val6){
$AudioPopup='';
$redirect=$GLOBALS['STORE_WEBSITE_URL'].urlencode('/my_purchase.php?order_id='.$val5);
$AudioPopup = '<div class="popup" style="display:none;" >
	<div class="fl"><img src="images/left.png" width="6" height="37" alt="" /></div>
	<div class="tooltip" id="tooltip" style="width:80px">
		<style type="text/css">
			.optshow_'.$val1.'_1{background:#000;position:absolute;z-index:10001}
			.optshow_'.$val1.'_2{background:#000;position:absolute;z-index:1000}
		</style>
		<div class="optshow_'.$val1.'_1" id="options'.$val3.'">
			<table border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left">
				<div style="margin-left:0px">
				<img src="images/plus_icon.gif" width="13" height="13" alt="" border="0" class="vertmid" /> <a href="'.$GLOBALS['STORE_WEBSITE_SECURE_URL'].'/cd_service.php?order_id='.$val5.'&redirect='.$redirect.'&content_id='.$val1.'&plan_id='.$val6.'&content_type_id=1&store_id='.$GLOBALS['STORE_FRONT_ID'].'" class="fnt9 w_fff">Download</a> &nbsp;
				<!--<a href="javascript:void(0);"><img src="images/plus_icon.gif" width="13" height="13" alt="" border="0" class="vertmid" /></a>
				<a href="purchasedplaylist.php?content_id='.$val1.'" class="fnt9 w_fff" rel="prettyPopin'.$val3.'">Save</a> &nbsp;-->
				</div></td>
			  </tr>
			</table>
		</div>
	</div>
	<div class="fl"><img src="images/right.png" width="6" height="37" alt="" /></div>
	<br class="cl" />
	
</div>';
echo $AudioPopup;
}

//Get Pop Up Version 2 for Audio
function getPopUpWallpaper_v1($val1,$val2,$val3,$val4){
$AudioPopup='';
$AudioPopup = '<div class="popup" style="display:none;" >
	<div class="fl"><img src="images/left.png" width="6" height="37" alt="" /></div>
	<div class="tooltip1" id="tooltip" style="width:170px; padding-left:40px; padding-right:0px">
		<style type="text/css">
			.optshow_'.$val1.'_1{background:#000;position:absolute;z-index:10001}
			.optshow_'.$val1.'_2{background:#000;position:absolute;z-index:1000}
		</style>
		<script language="Javascript" type="text/javascript">
		$(document).ready(function(){
			$("a[rel^=\'prettyPopin'.$val3.'\']:eq(0)").prettyPopin({followScroll:false});
			$("a[rel^=\'prettyPopin'.$val3.'\']:eq(1)").prettyPopin({});
		});
		</script>
		<div class="optshow_'.$val1.'_2" id="like'.$val3.'" style="width:195px;height:20px; margin-left:-27px" onMouseOut="changeClass(\'options'.$val3.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">
			<img src="images/like_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /> <span id="likemsg'.$val3.'" class="w_fff"></span>
		</div>

		<div class="optshow_'.$val1.'_2" id="cart'.$val3.'" style="width:195px;height:20px; margin-left:-27px" onMouseOut="changeClass(\'options'.$val3.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">
			<img src="images/cart_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /> <span id="cartmsg'.$val3.'" class="w_fff">item added to cart</span>
		</div>
		
		<div class="optshow_'.$val1.'_1" id="options'.$val3.'" style="width:150px; padding-left:40px; margin-left:-27px">
			<table border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left">
				<div style="margin-left:0px">
				<a href="javascript:void(0);"><img src="images/like_icon.gif" width="14" height="14" alt="" border="0" class="vertmid" /></a>
				<a href="javascript:void(0);" class="fnt9 w_fff" onclick="addtolike(\''.$val1.'\',\''.$val2.'\',\''.$val3.'\',\''.$val4.'\',\'like'.$val3.'\',\'cart'.$val3.'\',\'options'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">Like</a> &nbsp;
				<a href="javascript:void(0);"><img src="images/cart_icon.gif" width="18" height="13" alt="" border="0" class="vertmid" /></a>
				<a href="javascript:void(0);" class="fnt9 w_fff" onclick="addtocart(\''.$val1.'\',\''.$val2.'\',\''.$val3.'\',\'cart'.$val3.'\',\'like'.$val3.'\',\'options'.$val3.'\',\'optshow_'.$val1.'_1\',\'optshow_'.$val1.'_2\',\'optshow_'.$val1.'_2\');">Buy</a>
				</div></td>
			  </tr>
			</table>
		</div>
	</div>
	<div class="fl"><img src="images/right.png" width="6" height="37" alt="" /></div>
	<br class="cl" />
	
</div>';
echo $AudioPopup;
}

function removeChar($str){
	$chars = array('/','\\',':','*','?','"','<','>','|','%');
	$str = str_replace($chars, "_", $str);
	return $str;
}

function sendemail($useremail,$userfullname,$subject,$htmlbody,$textbody){
	$script_url 		= $_SERVER["SCRIPT_NAME"]; 
	$script_path		= $_SERVER["SCRIPT_FILENAME"];
	$script_realpath	= str_replace($script_url,"",$script_path);

	require_once($script_realpath."/phpmailer/class.phpmailer.php");
	require_once($script_realpath."/phpmailer/class.smtp.php");
	require_once($script_realpath."/phpmailer/class.pop3.php");

	$mail=new PHPMailer();

	$mail->IsSMTP();
	//$mail->SMTPAuth   = true;                  // enable SMTP authentication
	//$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	//$mail->Host       = "smtp.hungama.com,smtpout.hungama.com";
	//$mail->Host     = "203.199.134.145";
	$mail->Host   		= "smtpout.hungama.com";
	$mail->SMTPAuth   = true;

	$mail->Port       = 587;

	$mail->Username   = "csout@hungama.com";  // GMAIL username
	$mail->Password   = "J4cMqt5d";  // GMAIL password

	$mail->From       = "noreply@hungama.com";
	$mail->FromName   = substr($GLOBALS['STORE_WEBSITE_ID'], 1)." Support";
	$mail->Subject    = $subject;
	$mail->Body       = $htmlbody;                      //HTML Body
	$mail->AltBody    = $textbody; //Text Body

	$mail->WordWrap   = 50; // set word wrap

	$mail->AddAddress($useremail,$userfullname);
	//$mail->AddReplyTo("replyto@yourdomain.com","Webmaster");
	//$mail->AddAttachment("/path/to/file.zip");             // attachment
	//$mail->AddAttachment("/path/to/image.jpg", "new.jpg"); // attachment

	$mail->IsHTML(true); // send as HTML 10.0.0.16
	if(!$mail->Send()) {
	  //$mailpop = new POP3();
		  //$mailpop->Authorise('10.0.0.16', 110, 30, 'no-reply', 'vir123', 1);
	  //if(!$mail->Send()) {
		  return 0;
	  //}else{
	//    return 1;
	  //}
	} else {
	  return 1;
	}
}
function getAppsFilePath($content_id,$content_type_id,$content_sub_type_id){
    global $connection;
    $result=@query("select f.file_path from tbl_content_files cf, tbl_files f where cf.content_id  = ".$content_id." and cf.content_type_id = ".$content_type_id." and cf.content_sub_type_id =".$content_sub_type_id." and cf.file_id = f.file_id",$connection);
    @list($file_path)=@fetch_row($result);
    return $file_path;
}

function getBestDataForRightMenu($genere,$nominationfor,$aa_artist_list){
   $qry = "select CONTENT_ID,count(CONTENT_ID) AS total from tbl_artist_nomination_vote
where GENERE='".$genere."' and NOMINATION_FOR='".$nominationfor."' GROUP BY CONTENT_ID ORDER BY total DESC LIMIT 5";
	$rsqry = mysql_query($qry);
	$num_rows = mysql_num_rows($rsqry);
	$ArrData = array();
	if($num_rows > 0)
	{
		$i=0;
		while(@list($content_id,$totalCount)= mysql_fetch_row($rsqry)){
			$contentID = $content_id;
			 global $connection;
			$result=@query('select c.content_id,c.content_display_title,a.artist_id,a.artist_name
								from tbl_contents c,
									 tbl_cnt_art_role_map carm,
									 tbl_artist_role_map arm,
									 tbl_artists a
								where c.content_id ='.$contentID.'
								and   c.content_id=carm.content_id
								and   carm.artist_role_map_id=arm.artist_role_map_id
								and   arm.artist_role_id=29
								and   arm.artist_id=a.artist_id
								and a.artist_id in ('.$aa_artist_list.')',$connection);
			@list($content_id,$content_display_title,$artist_id,$artist_name)=@fetch_row($result);
			if($nominationfor=='BS'){
				$ArrData[] = $content_display_title;
			}else{
				$ArrData[$i] = $artist_name;
			}
			 $i++;
						
		}
		return $ArrData;
	}
	else
	{
		return ;
	}	
}
?>