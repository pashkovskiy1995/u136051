<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Добавить новый пункт в главное меню");
?><div id="title">
	<h1>Добавить новый пункт в главное меню</h1>
</div>
<?$APPLICATION->IncludeComponent(
	"dekanat:dekanat.menu.create",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>