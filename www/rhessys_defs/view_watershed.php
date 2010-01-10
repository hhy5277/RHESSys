<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$include_path = $path . "/rhessys_defs/include";
require "$include_path/smarty.php";
require_once "$include_path/login.php";
require_once "$include_path/util.php";
require "$include_path/session.php";

$land_use_query = "SELECT landuse_default_ID,filename FROM Watershed_Land_Uses";
$stratum_query = "SELECT stratum_default_ID,filename FROM Watershed_Strata";
$soil_query = "SELECT soil_default_ID,filename FROM Watershed_Soils";
$zone_query = "SELECT zone_default_ID,filename FROM Watershed_Zones";
$land_use_result = mysql_query($land_use_query);
$stratum_result = mysql_query($stratum_query);
$soil_result = mysql_query($soil_query);
$zone_result = mysql_query($zone_query);

$rows = mysql_num_rows($land_use_result);
for ($j = 0; $j < $rows; ++$j) {
	$land_uses[] = mysql_fetch_array($land_use_result);
}

$rows = mysql_num_rows($stratum_result);
for ($j = 0; $j < $rows; ++$j) {
	$strata[] = mysql_fetch_array($stratum_result);
}

$rows = mysql_num_rows($soil_result);
for ($j = 0; $j < $rows; ++$j) {
	$soils[] = mysql_fetch_array($soil_result);	
}

$rows = mysql_num_rows($zone_result);
for ($j = 0; $j < $rows; ++$j) {
	$zones[] = mysql_fetch_array($zone_result);
}

$smarty->assign("zones", $zones);
$smarty->assign("strata", $strata);
$smarty->assign("soils", $soils);
$smarty->assign("land_uses", $land_uses);
$smarty->display("$path/rhessys_defs/smarty/templates/view_watershed.tpl");
?>
