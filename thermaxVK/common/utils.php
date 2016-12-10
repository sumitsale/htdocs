<?php
class Utils
{
    /**
        * Designed to execute any URL and return the response of the URL
        * @param        varchar         $file           URL to be executed
        * @return                                       Response of the URL
    */
    function getContent($file)
    {
        $res = file_get_contents($file);
        $decode = json_decode($res,true);
        return $decode;
    }

	/* gets the data from a URL */
	function getContentCURL($url,$dodecode="false")
	{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		//curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		//print_r($data);
		/*if ($dodecode==true)
			$decode = json_decode($data,true);
		else
			$decode = $data;
			
			print_r($decode);*/
		return $data;
	}

	
    /**
        * Designed to sort an array on the basis of key
        * @param        varchar         $a              Unsorted array
        * @param        varchar         $subkey         Key of an array on the basis of which array gets sort
        * @return                                       Sorted array
    */
    function arraySort($a,$subkey) 
    {
        foreach($a as $k=>$v) {
            $b[$k] = strtolower($this->decodeData($v[$subkey]));
        }
        asort($b);
        foreach($b as $key=>$val) {
            $c[] = $a[$key];
        }
        return $c;
    }

    /**
        * Designed to sort an array on the basis of key in descending order
        * @param        varchar         $a              Unsorted array
        * @param        varchar         $subkey         Key of an array on the basis of which array gets sort
        * @return                                       Sorted array in descending order
    */
    function arraySortDesc($a,$subkey) 
    {
        foreach($a as $k=>$v) {
            $b[$k] = strtolower($this->decodeData($v[$subkey]));
        }
        arsort($b);
        foreach($b as $key=>$val) {
            $c[] = $a[$key];
        }
        return $c;
    }

    /**
       * This function is used to decode a given string
       * @param         varchar         $string         String to be decoded
       * @return                                        Decoded string
    */
    function decodeData($string)
    {
        return strip_tags(stripslashes(trim(html_entity_decode(urldecode(html_entity_decode(urldecode($string)))))));
    }

    /**
       * This function is used to encode a given string
       * @param         varchar         $string         String to be encoded
       * @return                                        Encoded string
    */
    function encodeData($string)
    {
        return urlencode(htmlentities($string));
    }

    /**
       * This function is used to check null value
       * @param         varchar         $string         String to be checked
       * @return                                        Boolean (true-if not null/false-if null)
    */
    function nullCheck($string)
    {
        if($string == null || $string == '' || strlen($string)==0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    function checkImageExist($webfile)
    {
        $fp = @fopen($webfile, "r");
        if ($fp !== false)
        fclose($fp);
        return($fp);
    }
  
};
$utils = new Utils;
?>