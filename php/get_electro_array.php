<?php
date_default_timezone_set('Asia/Yekaterinburg'); 
$response = array(); 

// include db connect class

require_once __DIR__ . '/db_connect.php';
// connecting to db
$db = new DB_CONNECT();



$period=$_GET['dev_period'];
$dev_param=$_GET['dev_param'];

  
$contid = 105;
if ($dev_param == "T")
{
	if ($period == "day")
	{
	$result = mysql_query("SELECT date_format(elec_date,'%H:%i') as devf_date,elec_date,Uv, (T1+T2) as Tot FROM tmp_30 where ContID=".$contid." and (T1+T2) <> '0' and elec_date > (now()-interval 2 day)  GROUP BY ( UNIX_TIMESTAMP(elec_date)-UNIX_TIMESTAMP(now()-interval 2 day) ) DIV 1800 order by elec_date")  or die(mysql_error());
	
	}
	if ($period == "month")
	{ 
	$result = mysql_query("SELECT date_format(elec_date,'%d.%b') as devf_date,elec_date,Uv, (T1+T2) as Tot FROM tmp_30 where ContID=".$contid." and (T1+T2) <> '0' and elec_date > (now()-interval 30 day)  GROUP BY ( UNIX_TIMESTAMP(elec_date)-UNIX_TIMESTAMP(now()-interval 30 day) ) DIV 7200 order by elec_date")  or die(mysql_error());
	}
	if ($period == "week")
	{ 
	$result = mysql_query("SELECT date_format(elec_date,'%d.%b') as devf_date,elec_date,Uv, (T1+T2) as Tot FROM tmp_30 where ContID=".$contid." and (T1+T2) <> '0' and elec_date > (now()-interval 8 day)  GROUP BY ( UNIX_TIMESTAMP(elec_date)-UNIX_TIMESTAMP(now()-interval 8 day) ) DIV 3600 order by elec_date")  or die(mysql_error());
	}


}


if ($dev_param == "H")
{

	$result = mysql_query("select DISTINCT(LAST_DAY(elec_date)) as lastday, max(T1) as T1, max(T2) as T2 from tmp_30 GROUP BY date_format(elec_date, '%Y%m') order by lastday desc")  or die(mysql_error());

}


######################################################################################
 if (mysql_num_rows($result) > 0) {
    $response["sensors"] = array();
    $seconds=1; 
    $start=0;

    while ($row = mysql_fetch_array($result)) {
	$sensors = array();
        if ($dev_param == "T")
	{

    		if ( !isset($prevTot) & ($start == 0))  { 
		  $start = 1 ;
		  $prevTot=$row['Tot'];
		  $prevdate=$row['elec_date'];
		}
	
    		$seconds = strtotime($row['elec_date'])-strtotime($prevdate);

    		if ($seconds == 0)	{
			$seconds=300;
		}
    		$k=60*60/$seconds;
	  	$sensors["devf_date"] = $row["devf_date"];
		$sensors["elec_date"] = $row["elec_date"];
		$sensors["Uv"] = $row['Uv'];
		$sensors["Tot"] = $row['Tot']-$prevTot;
		$sensors["seconds"] = $seconds;
	
        	$prevTot=$row['Tot'];
        	$prevdate=$row['elec_date'];
		$start=1;
        }

           if ($dev_param == "H")
	{
           	$sensors["lastday"] = $row["lastday"];
		$sensors["T1"] = $row['T1'];
		$sensors["T2"] = $row['T2'];
	
	}

        array_push($response["sensors"], $sensors);
    }
    // success
    $response["success"] = 1;
    // echoing JSON response
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
} else {
    $response["success"] = 0;
    $response["message"] = "No products found";
    echo json_encode($response);
}







   
?>