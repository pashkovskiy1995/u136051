<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die
?>

<?if ($arResult['OK']):?>
    <? ShowMessage(
        array
        (
            'TYPE' => 'OK',
            'MESSAGE' => $arResult['OK']
        )
    );
    ?>
<?endif;?>
<?if ($arResult['ERROR']):?>
    <? ShowMessage(
        array
        (
            'TYPE' => 'ERROR',
            'MESSAGE' => $arResult['ERROR']
        )
    );
    ?>
<?endif; ?>
<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
<table style="border-width:0px;border-spacing:10px;">
<tr>
<td>Название:</td>
<td><input type="text" name="name"></td>
</tr>
<tr>
<td>
<input type="submit" name="save" value="Сохранить">
<input type="reset" value="Очистить">
</td>
</tr>
</table>
</form>
</body>
</html>