<?
require_once("ab-cms/class/main_class.php");
$ab = new cms_lib();
include("key.php");

$line_gazon1 = $ab->select_line("select key_pio from tmp_7 where key_label='gazon1'");
$key_gazon1 =$line_gazon1['key_pio'];
if ($key_gazon1 == 1)
{

	$result = $ab->select_line("select timestampdiff (second, ifnull ((select max(key_j_date) from tmp_8 where key_j_label=44),'2014-01-01'),sysdate()) as diff");
	$diff = $result['diff'];

	if ($diff > 3*60*60) 
	{
	key_sw("gazon1", 0);
	}
}

$line_gazon2 = $ab->select_line("select key_pio from tmp_7 where key_label='gazon2'");
$key_gazon2 =$line_gazon2['key_pio'];
if ($key_gazon2 == 1)
{

	$result = $ab->select_line("select timestampdiff (second, ifnull ((select max(key_j_date) from tmp_8 where key_j_label=45),'2014-01-01'),sysdate()) as diff");
	$diff = $result['diff'];
	if ($diff > 3*60*60) 
	{
	key_sw("gazon2", 0);
	}
}

$line_gazon3 = $ab->select_line("select key_pio from tmp_7 where key_label='gazon3'");
$key_gazon3 =$line_gazon3['key_pio'];
if ($key_gazon3 == 1)
{

	$result = $ab->select_line("select timestampdiff (second, ifnull ((select max(key_j_date) from tmp_8 where key_j_label=46),'2014-01-01'),sysdate()) as diff");
	$diff = $result['diff'];
	if ($diff > 3*60*60) 
	{
	key_sw("gazon3", 0);
	}
}


$real1=$ab->mod_read($ab->get_id("temp_in"), "#dev_value#", "tmpID DESC", 1);
$real2=$ab->mod_read($ab->get_id("temp_in_sf"), "#dev_value#", "tmpID DESC", 1);
$real3=$ab->mod_read($ab->get_id("temp_sport"), "#dev_value#", "tmpID DESC", 1);
$real4=$ab->mod_read($ab->get_id("temp_sauna"), "#dev_value#", "tmpID DESC", 1);

$num1 = $ab->query("select key_pio from tmp_7 where key_label='termo1'");
$stat1 =$num1[0]['key_pio'];
$num1 = $ab->query("select key_pio from tmp_7 where key_label='termo2'");
$stat2 =$num1[0]['key_pio'];
$num1 = $ab->query("select key_pio from tmp_7 where key_label='termo3'");
$stat3 =$num1[0]['key_pio'];
$num1 = $ab->query("select key_pio from tmp_7 where key_label='sauna'");
$stat4 =$num1[0]['key_pio'];


$num1 = $ab->query("select temperature from temperature_set where room=1");
$temp_1_floor =$num1[0]['temperature'];
$num1 = $ab->query("select temperature from temperature_set where room=2");
$temp_2_floor =$num1[0]['temperature'];
$num1 = $ab->query("select temperature from temperature_set where room=3");
$temp_sport_floor =$num1[0]['temperature'];
$num1 = $ab->query("select temperature from temperature_set where room=4");
$temp_sauna =$num1[0]['temperature'];

if ($real1 < $temp_1_floor  and $stat1 == 0)
{
key_sw("termo1", 1);
}
if ($real1 > $temp_1_floor  and $stat1 == 1)
{
key_sw("termo1", 0);
}
//////////////////////////////////////////
if ($real2 < $temp_2_floor  and $stat2 == 0)
{
key_sw("termo2", 1);
}

if ($real2 > $temp_2_floor  and $stat2 == 1)
{
key_sw("termo2", 0);
}
///////////////////////////////////////////
if ($real3 < $temp_sport_floor  and $stat3 == 0)
{
key_sw("termo3", 1);
}

if ($real3 > $temp_sport_floor  and $stat3 == 1)
{
key_sw("termo3", 0);
}
///////////////////////////////////////////
if ($real4 < $temp_sauna  and $stat4 == 0)
{
key_sw("sauna", 1);
}

if ($real4 > $temp_sauna  and $stat4 == 1)
{
key_sw("sauna", 0);
}


?>