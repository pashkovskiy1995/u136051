<?php
//use namespace MIET\KPI;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class KPIDepartmentTable extends Entity\DataManager {
    public static function getFilePath()
    {
        return __FILE__;
    }

    /*Название таблицы HL в БД*/
    public static function getTableName()
    {
        return 't_department_kpi';
    }

    /*Описание полей сущности (соответсвуют полям HL DepartmentKPI)*/
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('KPI_ENTITY_ID_FIELD'),
            ),
            /*Если поле является ссылкой - внешним ключом, то */
            'UF_KPI' => new Entity\ReferenceField(
                'UF_KPI',
                'Bitrix\Iblock\ElementTable',
                array('=this.UF_KPI' => 'ref.ID')
            ),
            'UF_VALUE' => array(
                'data_type' => 'float',
                'validation' => array(//Метод-валидатор значения
                    __CLASS__,//Имя класса метода-валидатора, в данном случае текущий класс
                    'validateValue' //Название метода-валидатора в данном классе
                ),
                'title' => Loc::getMessage('KPI_ENTITY_UF_VALUE_FIELD'),
            ),
            'UF_DEPARTMENT' => new Entity\ReferenceField(
                'UF_DEPARTMENT',
                'Bitrix\Iblock\SectionElementTable',
                array('=this.UF_DEPARTMENT' => 'ref.ID')
            ),
            'UF_CREATED_BY' => new Entity\ReferenceField(
                'UF_CREATED_BY',
                'Bitrix\Main\UserTable',
                array('=this.UF_CREATED_BY' => 'ref.ID')
            ),
            'UF_CREATED' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('KPI_ENTITY_UF_CREATED_FIELD'),
            ),
            'UF_CHANGED_BY' => new Entity\ReferenceField(
                'UF_CHANGED_BY',
                'Bitrix\Main\UserTable',
                array('=this.UF_CHANGED_BY' => 'ref.ID')
            ),
            'UF_CHANGED' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('KPI_ENTITY_UF_CHANGED_FIELD'),
            )
        );
    }

    public static function validateValue()
    {
        return array(
            new Entity\Validator\Range(0, null, false, array("MIN" => "Количество должно быть больше нуля")),
        );
    }
}
?>