<?php 
date_default_timezone_set('Asia/Yekaterinburg'); 
/*
 * Following code will list all the products
 */ // array for JSON response 

$response = array(); 

// include db connect class

require_once __DIR__ . '/db_connect.php';
// connecting to db
$db = new DB_CONNECT();
$param=$_GET['input'];

if ($param == "input")
{
$result=mysql_query("select key_title, key_pio, key_label from tmp_7 where key_type='auto'") or die(mysql_error()); 
}

if ($param == "keys")
{
$result=mysql_query("select key_title, key_pio, key_label from tmp_7 where key_type<>'auto'") or die(mysql_error());
}




 if (mysql_num_rows($result) > 0) {
    $response["sensors"] = array();
    while ($row = mysql_fetch_array($result)) {
	$sensors = array();
	
	if (($param == "keys")||($param == "input")) {
        $sensors["key_title"] = $row["key_title"];
        $sensors["key_pio"] = $row["key_pio"];
        $sensors["key_label"] = $row["key_label"];
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
