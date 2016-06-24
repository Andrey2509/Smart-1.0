<?php 
date_default_timezone_set('Asia/Yekaterinburg'); 

$response = array(); 

// include db connect class

require_once __DIR__ . '/db_connect.php';
// connecting to db
$db = new DB_CONNECT();
$param=$_GET['input'];

if ($param == "input")
{
$result = mysql_query("SELECT T1,T2,Uv,Ia from tmp_30 where contid=105 ORDER BY tmpID DESC LIMIT 1") or die(mysql_error());
}

 if (mysql_num_rows($result) > 0) {
    $response["sensors"] = array();
    
    while ($row = mysql_fetch_array($result)) {
	$sensors = array();
        if ($param == "input")
	{
	$sensors["T1"] = $row["T1"];
        $sensors["T2"] = $row["T2"];
	$sensors["Uv"] = $row["Uv"];
	$sensors["Ia"] = $row["Ia"];
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
