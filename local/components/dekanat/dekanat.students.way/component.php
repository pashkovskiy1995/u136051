<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $USER;

\Bitrix\Main\Loader::includeModule('dekanat.students');

use DEKANAT\STUDENTS;

if(!$USER->IsAdmin())
{
    echo 'Вы не обладаете правами администратора!';
	require($_SERVER["DOCUMENT_ROOT"]."/local/templates/main/footer.php");
    exit;
}


$name = mysql_real_escape_string($_POST["name"])


$arResult['ITEMS'] = DEKANAT\STUDENTS::NewWay($name);


if ($_REQUEST['save'])
{

    if($arResult['ITEMS']) $arResult['OK'] = 'Новое направление создано!';
    else $arResult['ERROR'] = 'Ошибка при создании!';

}


$this ->IncludeComponentTemplate();
?>