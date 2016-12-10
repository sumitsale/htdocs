<?php

class generatexmlfile
{

  
public function __construct() 
{
}

function createValidXMLfromArray($array,$node,$child)
    {
	
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';

        $xmlArray = $this->array2Xml($array,$node,$child);

        $xml .= "<$node>".$xmlArray."</$node>";
 

        return $xml;
    }
	
      function save($path,$content)
   {

			$ourFileName = $path;
			$ourFileHandle = fopen($ourFileName, 'w');
			fwrite($ourFileHandle,$content);
			
			fclose($ourFileHandle);

   //$this->DOMObject->save($path);
 		
   }
   
   
   

 function array2Xml($array,$node,$child)
    {
			$xml = '';
		
        if(is_array($array))
        {
            foreach($array as $key=>$value)
            {
						if(is_numeric($key))
						{
						$key = $child;
						}
                $xml .= "<$key>";

                if(is_array($value))
                {
                    $xml .= $this->array2Xml($value,$node,$child);
                }
                else {
                    $xml .= $value;
                }
                $xml .= "</$key>\n";
            }

            return $xml;
        }
        else
        {
            throw new Exception("in valid");
        }
    }
   

   
}

 

?>