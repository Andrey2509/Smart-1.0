<?php 
date_default_timezone_set('Asia/Yekaterinburg'); 

$response = array(); 

// include db connect class

require_once __DIR__ . '/db_connect.php';
// connecting to db
$db = new DB_CONNECT();

$param=$_GET['input'];
$period=$_GET['period'];

if ($period == "day") {$perday=1;}
if ($period == "week") {$perday=7;}
if ($period == "month") {$perday=30;}

$string=$param." ".$period."\n";
$datelog = date('Y-m-d_H-i-s');
file_put_contents('/tmp/inserttemp.log', $datelog.":".$string."\n", FILE_APPEND);

if ( $param == "keys_hist_switches" )
{


$result = mysql_query("SELECT a.key_j_date, b.key_title, a.key_i_pio FROM tmp_8 a, tmp_7 b 
WHERE a.ContID=24 AND b.ContID=23 AND a.key_j_label=b.tmpID AND b.key_type='key' AND a.key_j_date > DATE_ADD(now(),interval -".$perday." day)
ORDER BY a.key_j_date DESC") or die(mysql_error());
}
if ( $param == "keys_hist_sensors" )
{

$result = mysql_query("SELECT a.key_j_date, b.key_title, a.key_i_pio FROM tmp_8 a, tmp_7 b 
WHERE a.ContID=24 AND b.ContID=23 AND a.key_j_label=b.tmpID AND b.key_type='auto' AND a.key_j_date > DATE_ADD(now(),interval -".$perday." day)
ORDER BY a.key_j_date DESC") or die(mysql_error());
}


if ( $param == "images" )
{
$result = mysql_query("SELECT a.camera_date,a.img,a.babyimg, b.name as camera_name, c.name as pir_name FROM termo.tmp_26 a inner join camera_set b on a.camera_id = b.id
inner join pir_set c on a.pir_id = c.id where  a.camera_date> DATE_ADD(now(),interval -".$perday." day) order by a.camera_date desc") or die(mysql_error());
}


// check for empty result 
 if (mysql_num_rows($result) > 0) {
    $response["sensors"] = array();
    
    while ($row = mysql_fetch_array($result)) {
	$sensors = array();
	if ($param == "keys_hist_switches")
	{
	$sensors["key_j_date"] = $row["key_j_date"];
	$sensors["key_title"] = $row["key_title"];
	$sensors["key_i_pio"] = $row["key_i_pio"];
	}
	if ($param == "keys_hist_sensors") {
	$sensors["key_j_date"] = $row["key_j_date"];
	$sensors["key_title"] = $row["key_title"];
	$sensors["key_i_pio"] = $row["key_i_pio"];
	}
	if ($param == "images") {
	$sensors["camera_date"] = $row["camera_date"];
	$sensors["img"] = $row["img"];
	$sensors["babyimg"] = $row["babyimg"];
        $sensors["camera_name"] = $row["camera_name"];
	$sensors["pir_name"] = $row["pir_name"];
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
	echo "Not_found";

}
?>
