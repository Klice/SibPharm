<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


global $APPLICATION;

if (!function_exists("GetTreeRecursive")) //Include from main.map component
{
$obCache = new CPHPCache; 
$life_time = 0; 
//$life_time = 3600; 
$cache_id = "sect_list_menu_left7";
if($obCache->StartDataCache($life_time, $cache_id, "/left_menu")) {
	CModule::IncludeModule("iblock");
	$arFilter = Array('IBLOCK_CODE'=>"catalog", 'GLOBAL_ACTIVE'=>'Y',"ACTIVE"=>"Y","DEPTH_LEVEL"=>1);
	$db_list = CIBlockSection::GetList(Array("LEFT_MARGIN"=>"ASC"), $arFilter, true);
	while($ar_result = $db_list->GetNext())
	{
			$aMenuLinksExt[]=array(
				$ar_result["NAME"],
				$ar_result["SECTION_PAGE_URL"],
				array(
					"FROM_IBLOCK"=>1,
					"IS_PARENT" => "",
					"DEPTH_LEVEL" =>  $ar_result["DEPTH_LEVEL"]
				)
			);

	}
	$obCache->EndDataCache(array(
        "aMenuLinksExt"    => $aMenuLinksExt
    )); 
} else {
	extract($obCache->GetVars());
}

//echo "<pre>";print_r($aMenuLinksExt);echo "</pre>";
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);




}
?>