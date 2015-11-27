<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();?> <?IncludeTemplateLangFile(__FILE__);?>

<? if(!($USER->IsAuthorized())) Header("Location: localhost:8082/auth"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?=LANGUAGE_ID?>">
<head profile="http://gmpg.org/xfn/11">
<title><?$APPLICATION->ShowTitle();?></title>
<?$APPLICATION->ShowHead();?>
</head>
<body>


<?$APPLICATION->ShowPanel();?>



<!-- HEADER -->
<div id="header">


<div id="logo">
<img src="//localhost:8082/local/templates/main/images/logo.png">
</div>


<div id="menu">
<li><a href="">Обучение</a></li>
<li><a href="">Учебный план</a></li>
<li><a href="">Техподдержка</a></li>
<li><a href="">Помощь</a></li>
</ul>
</div>


<div id="button"><a href="">Вход</a></div>
<div id="button"><a href="">Регистрация</a></div>
</div>
<!-- END -->





<!-- HEADER -->
<div id="main">

<div id="title">
<h1>Главная страница</h1>
</div>

<div class="text">
<span>КП Деканат - корпоративный портал работающий в CMS 1С-Битрикс, которы�