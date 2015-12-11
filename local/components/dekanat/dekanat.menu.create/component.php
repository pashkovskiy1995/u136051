<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
###Инициализация глобальных переменных Битрикс###
global $DB;
/**@global CUser $USER */
global $USER;
###
\Bitrix\Main\Loader::includeModule('dekanat.menu');


class menu
{

public $value;
public $access;


public function show()
{

$query = 'SELECT * FROM `dekanat_menu`';
$result = $DB->Query($query);


do
{

echo 'Название: <input type="text" value="' . $row['value'] . '">
      URL: <input type="text" value="' . $row['value'] . '">
      Доступ: <select>
	  <option>Для всех</option>
	  <option>Для авторизованных</option>
	  <option>Для гостей</option>
	  </select>';

}
while($row=$result->Fetch())

}

}

if($USER->IsAuthorized() == false){}