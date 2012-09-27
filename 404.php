<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");

if (strpos(php_sapi_name(),'cgi') !== false) 
    header('Status: 404 Not Found'); 
else 
    header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<img border="0" alt="Страница не найдена" src="<?=SITE_TEMPLATE_PATH?>/images/404.jpg">
<?
$APPLICATION->SetTitle("404 Not Found");

$APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
   "LEVEL"   =>   "3",
   "COL_NUM"   =>   "2",
   "SHOW_DESCRIPTION"   =>   "Y",
   "SET_TITLE"   =>   "Y",
   "CACHE_TIME"   =>   "3600"
   )
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>