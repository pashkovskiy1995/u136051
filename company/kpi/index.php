
<title>KPI</title>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>
<?$APPLICATION->IncludeComponent(
	"miet:kpi.employee.detail",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"USER_ID" => $_REQUEST["USER_ID"],
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"SET_STATUS_404" => "N"
	)
);?>