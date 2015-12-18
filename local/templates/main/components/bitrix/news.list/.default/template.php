<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<div class="social">
	<ul>
		<?foreach($arResult['ITEMS'] as $key => $arItem):?>
		<?if(empty($arItem)){
			continue;
		}?>
		<li><a href="<?=$arItem['PROPERTIES']['URL']['VALUE'];?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" width="26" height="27" alt="" class="vm"/></a></li>
		<?endforeach;?>
	</ul>
</div>