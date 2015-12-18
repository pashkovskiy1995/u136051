<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die
?>

<div id="menu">
<ul>
<?foreach ($arResult['ITEMS'] as $arItem): ?>
<li><a href="//<?=$arItem["UF_URL"];?>"><?=$arItem["UF_VALUE"];?></a></li>
<?endforeach;?>
</ul>
</div>
