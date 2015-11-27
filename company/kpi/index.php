
<title>KPI</title>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>
<title>KPI</title>


<?$APPLICATION->IncludeComponent(
	"miet:kpi.employee.detail",
	"",
	Array(
	)
);?>