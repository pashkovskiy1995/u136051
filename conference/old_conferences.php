<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>Old:&nbsp;<?$APPLICATION->IncludeComponent(
	"conference:conference.general.show",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"SHOW" => "1"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>