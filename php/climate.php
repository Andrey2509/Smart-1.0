<?php 
date_default_timezone_set('Asia/Yekaterinburg'); 

$response = array(); 


require_once __DIR__ . '/db_connect.php';
// connecting to db
$db = new DB_CONNECT();
$param=$_GET['input'];


if ($param == "climate")
{
$result=mysql_query("select s.temperature, s.key_label, s.graf,s.managable, s.key_title, max_date, t.dev_value from tmp_2 t inner join  (select contid, max(dev_date) as max_date from tmp_2  group by contid)a
  on a.contid = t.contid and a.max_date = t.dev_date   inner join temperature_set s  on t.contid=s.contid order by s.key_title") or die(mysql_error());
}


// check for empty result 
 if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["sensors"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
	$sensors = array();
	if ($param == "climate")
	{
	$sensors["temperature"] = $row["temperature"];
        $sensors["graf"] = $row["graf"];
	$sensors["managable"] = $row["managable"];
	$sensors["key_title"] = $row["key_title"];
	$sensors["key_label"] = $row["key_label"];
       	$sensors["dev_value"] = $row["dev_value"];
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
