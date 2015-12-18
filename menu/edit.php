<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><div id="title">
	<h1>Изменение главного меню</h1>
</div>
<?$APPLICATION->IncludeComponent(
	"dekanat:dekanat.menu.edit",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>