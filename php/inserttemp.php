<?
date_default_timezone_set('Asia/Yekaterinburg');
require_once("../ab-cms/class/main_class.php");
$ab = new cms_lib();

$temperature=$_POST['temperature'];
$key_label=$_POST['key_label'];


$string = "UPDATE  temperature_set SET temperature=".$temperature." WHERE key_label='".$key_label."'";
$datelog = date('Y-m-d_H-i-s');
file_put_contents('/tmp/inserttemp.log', $datelog.":".$string."\n", FILE_APPEND);

$ab->execute ("UPDATE  temperature_set SET temperature=".$temperature." WHERE key_label='".$key_label."'");


?>