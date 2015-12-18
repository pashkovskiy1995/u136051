<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>New:&nbsp;<?$APPLICATION->IncludeComponent(
	"conference:conference.general.show",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"SHOW" => "0"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>