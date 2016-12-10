<?php
//PutEnv("LD_LIBRARY_PATH=/usr/lib/oracle/11.1/client64/lib");
//PutEnv("TNS_ADMIN=/home");
//echo 'getenv '.getenv("LD_LIBRARY_PATH");

#Function to connect to the hungama database (make a connection) starts:
function db_connect()
    {
      //global $ORACLE_HOME;
      //global $ORACLE_SID;
      global $ORADBUSER;
      global $ORADBPASS;
	  global $ORADBTNS;	

    //putenv("ORACLE_SID=MYDB");
    //$username = $DBUSER;
    //$passwd = $DBPASS;
    //$db="";
   	 //$connection = OCILogon($ORADBUSER,$ORADBPASS,'local48');
   	 $connection = OCILogon($ORADBUSER,$ORADBPASS,$ORADBTNS,'UTF8');
      return $connection;
    }
#Function to connect to the hungama database (make a connection) ends:

function db_new_connect()
    {
      //global $ORACLE_HOME;
      //global $ORACLE_SID;
      global $ORADBUSER;
      global $ORADBPASS;
	  global $ORADBTNS;	

    //putenv("ORACLE_SID=MYDB");
    //$username = $DBUSER;
    //$passwd = $DBPASS;
    //$db="";
    // $connection = oci_new_connect($ORADBUSER,$ORADBPASS,'local48');
     $connection = oci_connect($ORADBUSER,$ORADBPASS,$ORADBTNS, 'UTF8');
      return $connection;
    }


#Function to parse through a query starts:
function query($query,$connection)
    {
        $result = ociparse($connection, $query);
        if (!$result)
        {
            echo "Parse error in query $query<br> Connection is $connection<br>";
            exit;
        }
        $exec = ociexecute($result,OCI_COMMIT_ON_SUCCESS);
        if (!$exec)
        {
            echo "Execution error in query :<BR>  $query<br> Connection is $connection<br>";
            exit;
        }
        return $result;
    }
#Function to parse through a query ends:

#Function to update/delete/add a record without commiting starts:
function query_nocommit($query,$connection)
    {
        $result = ociparse($connection, $query);
        if (!$result)
        {
            echo "Parse error in query $query<br> Connection is $connection<br>";
            exit;
        }
        $exec = ociexecute($result,OCI_DEFAULT);
        if (!$exec)
        {
            echo "Execution error in query :<BR> $query<br> Connection is $connection<br>";
            exit;
        }
        return $result;
    }
#Function to update/delete/add a record without commiting ends:


#Function to update/delete/add a record without commit starts:
function commit($connection)
    {
        $comm = OCICommit($connection);
        return $comm;
    }
#Function to update/delete/add a record without commit ends:


#Function to rollback a query starts:
function rollback($connection)
    {
        $roll = OCIRollback($connection);
        return $roll;
    }
#Function to rollback a query starts:


#Function to fetch each row after executing query starts:
function fetch_row($result)
    {
        ociFetchInto($result, $num, OCI_NUM+OCI_RETURN_NULLS);
        return $num;
    }
#Function to fetch each row after executing query ends:

#Function to fetch records in an array after executing query starts:
function fetch_array($result)
    {
        ociFetchInto($result, $somearray, OCI_ASSOC+OCI_RETURN_NULLS);
        return $somearray;
    }
#Function to fetch records in an array after executing query ends:


#Function to fetch number of records executing query starts:
function num_rows($result)
    {
     /*
        Note .. One has to do a "$result = query($query,$connection)"
        immediately after executing this function
        becoz this function does not just fetchthe no of rows
        It fetches all the rows as well in the array called $somearray
    */
        $numrows = OCIFetchStatement($result,$somearr);
        return $numrows;
    }
#Function to fetch number of records executing query ends:

#Function to disconnect a database connection starts:
function db_disconnect($myconnection)
    {
        OCILogoff($myconnection);
        return 1;
    }
#Function to disconnect a database connection ends:

function usercheck()
{
/*
    global $HTTP_REFERER;

    if(!$HTTP_REFERER)
    {
        Header("Location: http://www.myenjoyzone.com");
    }
    elseif($HTTP_REFERER)
    {
        $filebits=explode("/", $HTTP_REFERER);
        if($filebits[2] != "www.myenjoyzone.com")
        {
            Header("Location: http://www.myenjoyzone.com");
        }
    }
*/
}

?>
