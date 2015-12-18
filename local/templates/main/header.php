<? //if(!($USER->IsAuthorized())) Header("Location: localhost:8082/auth"); ?>
<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();?> <?IncludeTemplateLangFile(__FILE__);?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?=LANGUAGE_ID?>">
<head profile="http://gmpg.org/xfn/11">
<title><?$APPLICATION->ShowTitle();?></title>
<?$APPLICATION->ShowHead();?>


    <!-- Load Jquery -->
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.js", true);?>
    <!-- End Load -->
    <!-- for IE6 i'm sorry but there is too much wrong with it, needs warning at least, you can disable it by delething this load. -->
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.badBrowser.js", true);?>
    <!-- End Load -->

    <!-- ALL jQuery Tools. No jQuery library -->
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.tools.js", true);?>
    <!-- End Load -->

    <!-- Load Jquery Easing -->
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.easing.js", true);?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.css-transform.js", true);?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.css-rotate-scale.js", true);?>
    <!-- End Load -->

    <!-- Load Jquery Cycle and adiacent CSS File -->
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.cycle.js", true);?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/_include/css/jquery.cycle.css", true);?>
    <!-- End Load -->

    <!-- Load Cufon and Adiacent Font Files, and apply Cufon on used Styles -->
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/cufon.js", true);?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/Museo_400-Museo_italic_400.font.js", true);?>
    <!-- End Load -->

    <!-- Load Pretty Photo -->

    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.prettyPhoto.js", true);?>
    <script type="text/javascript">
        /* pretty photo responds on rel='prettyPhoto' */
        jQuery(document).ready(function() { $("a[rel^='prettyPhoto']").prettyPhoto();   });
    </script>
    <!-- End Load -->

    <!-- Load Superfish Drowpdown Menu, and run it -->
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.hoverInt.js", true);?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.bgiframe.js", true);?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/superfish.js", true);?>
    <!-- End Load -->

    <!-- Load Jquery Roundabout, and adiacent JS & CSS file -->
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.roundabout.js", true);?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.roundabout-shapes-1.1.js", true);?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/_include/css/jquery.roundabout.css", true);?>
    <!-- End Load -->

    <!-- Load SWFObject, used for video embedding -->
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/swfobject.js", true);?>
    <!-- End Load -->

    <!-- Load Quicksand -->
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/jquery.quicksand.js", true);?>
    <!-- End Load -->

    <!-- Load some small custom scripts -->
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/_include/js/custom.js", true);?>
    <!-- End Load -->

    <!-- Load PNG Fix older IE Versions -->
    <!--[if lt IE 7]>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."_include/js/pngfix.js", true);?>
    <script type="text/javascript">DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!-- End Load -->


</head>
<body>


<?$APPLICATION->ShowPanel();?>



<!-- HEADER -->
<div id="header">



<? if($page !== 'home') echo '<a href="//localhost:8082">'; /*$href = " onclick=\"location.href='http://localhost:8082'\";"; */?>
<div id="logo"<?=$href?>>
<img src="//localhost:8082/local/templates/main/images/logo.png">
<? if($page !== 'home') echo '</a>'; ?>
</div>

    <?if($USER->IsAdmin()) { ?>
        <div id="menu">
            <ul>
                <li><a href="">Добавить направление</a></li>
                <li><a href="">Добавить группу</a></li>
                <li><a href="">Добавить дисциплину</a></li>
                <li><a href="">Список студентов</a></li>
            </ul>
        </div>
        <?
    }
    else
    {
        $APPLICATION->IncludeComponent(
"dekanat:dekanat.menu.general",
"",
Array(
"COMPONENT_TEMPLATE" => ".default"
)
);?>
    <? } ?>

<? if($USER->IsAuthorized() == false) { ?>
<div id="button"><a href="//localhost:8082/login">Вход</a></div>
<div id="button"><a href="//localhost:8082/registration">Регистрация</a></div>
<? }else{ ?>
	<div id="button"><a href="//localhost:8082?logout=yes">Выход</a></div>
<? } ?>
</div>



<div id="main">
