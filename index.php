<?
$page = 'home';
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetPageProperty("title", htmlspecialcharsbx(COption::GetOptionString("main", "site_name", "Bitrix24")));
?><div id="title">
	<h1>Главная страница</h1>
</div>
<div class="text">
	 КП Деканат - корпоративный портал работающий в CMS 1С-Битрикс, который предназначен для учета студентов с помощью автоматизированной системы управления.
</div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:photo.section",
	"slider",
	Array(
		"COMPONENT_TEMPLATE" => "slider",
		"IBLOCK_TYPE" => "photos",
		"IBLOCK_ID" => "32",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array("",""),
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"FILTER_NAME" => "arrFilter",
		"FIELD_CODE" => array("ID","NAME","SORT","PREVIEW_PICTURE",""),
		"PROPERTY_CODE" => array("URL",""),
		"PAGE_ELEMENT_COUNT" => "20",
		"LINE_ELEMENT_COUNT" => "5",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"SET_LAST_MODIFIED" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Фотографии",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N"
	)
);?><br>
<div class="tmenu">
	 Последние новости
</div>
<div class="news" id="nborder">
	<div class="dnews">
		 28.11
	</div>
	<div class="tnews">
		 Вёрстка главной страницы.
	</div>
</div>
<div class="news">
	<div class="dnews">
		 27.11
	</div>
	<div class="tnews">
		 Создание слайдера факультетов.
	</div>
</div>
<div class="news">
	<div class="dnews">
		 27.11
	</div>
	<div class="tnews">
		 Разработка дизайна для КП Деканат.
	</div>
</div>
<div class="news">
	<div class="dnews">
		 27.11
	</div>
	<div class="tnews">
		 Первый запуск КП Деканат.
	</div>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>