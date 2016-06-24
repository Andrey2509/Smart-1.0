<?php 
date_default_timezone_set('Asia/Yekaterinburg'); 

$response = array(); 

// include db connect class

require_once __DIR__ . '/db_connect.php';
// connecting to db
$db = new DB_CONNECT();
// get all products from products table
$param=$_GET['input'];


if ($param == "cameras")
{
$result=mysql_query("SELECT id,name,localpath,inetpath,imgpath_big  FROM camera_set order by id") or die(mysql_error());


}



// check for empty result 
 if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["sensors"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
	$sensors = array();
	if ($param == "cameras") {
        $sensors["name"] = $row["name"];
	$sensors["imgpath_big"] = $row["imgpath_big"];
	$sensors["inetpath"] = $row["inetpath"];
	$sensors["localpath"] = $row["localpath"];

            if ($row["id"] == 1)
		{
                 $time  = time() + 3600; # = TIMESTAMP
		 $hash = md5("passwordcamera1/stream".$time, true);
		 $hash = strtr( base64_encode($hash), array( '+' => '-', '-' => '_', '=' => '' ));
                 $sensors["time"] = $time;
                 $sensors["hash"] = $hash;
		}

             if ($row["id"] == 2)
		{
                 $time  = time() + 3600; # = TIMESTAMP
		 $hash = md5("passwordcamera2/stream".$time, true);
		 $hash = strtr( base64_encode($hash), array( '+' => '-', '-' => '_', '=' => '' ));
                 $sensors["time"] = $time;
                 $sensors["hash"] = $hash;
		}
	     if ($row["id"] == 3)
		{
                 $time  = time() + 3600; # = TIMESTAMP
		 $hash = md5("passwordcamera3/stream".$time, true);
		 $hash = strtr( base64_encode($hash), array( '+' => '-', '-' => '_', '=' => '' ));
                 $sensors["time"] = $time;
                 $sensors["hash"] = $hash;
		}

	}

        array_push($response["sensors"], $sensors);
    }
    // success
    $response["success"] = 1;
    // echoing JSON response
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
    echo json_encode($response);
}
?>
