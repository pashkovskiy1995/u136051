﻿<?php
namespace MIET\KPI;

use Bitrix\Main\Application;
use Bitrix\Main\Entity;
use Bitrix\Main\Entity\Event;
use Bitrix\Main\Localization\Loc;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\UserTable;

Loc::loadMessages(__FILE__);

class KPIManager {
    const IBLOCK_CODE_KPI = 'kpi';
    const IBLOCK_CODE_DEPARTMENTS = 'departments';
    const IBLOCK_CODE_EMPLOYEES = 'employees';

    public static function GetKPI(
        $arOrder = array('SORT' => 'ASC'),
        $arFilter = array(),
        $arGroupBy = false,
        $arNavStartParams = false,
        $arSelectFields = array('ID', 'NAME')
    ) {
        $elements = array();

        //Получаем ID инфоблока KPI по его символьному коду
        $rsIblock = \CIBlock::GetList(
            array(),
            array('CODE' => self::IBLOCK_CODE_KPI, 'SITE_ID' => SITE_ID)
        );
        $arIblock = $rsIblock->GetNext();
        $arFilter['IBLOCK_ID'] = $arIblock['ID'];

        $rsElements = \CIBlockElement::GetList(
            $arOrder, //массив полей сортировки элементов и её направления
            $arFilter, //массив полей фильтра элементов и их значений
            $arGroupBy, //массив полей для группировки элементов
            $arNavStartParams, //параметры для постраничной навигации и ограничения количества выводимых элементов
            $arSelectFields //массив возвращаемых полей элементов
        );
        while($arElements = $rsElements->Fetch()) {
            //Получение информации о файле с регламентом расчета показателя: ссылка на файл на сервере, название файла и т.д.
            foreach($arElements['PROPERTY_REGULATIONS_VALUE'] as $key => $idFileRegulation) {
                $arElements['PROPERTY_REGULATIONS_VALUE'][$key] = \CFile::GetFileArray($idFileRegulation);
            }

            $elements[] = $arElements;
        }

        return $elements;
    }

    public static function GetKPIEmployee($idEmployee)
    {
        if (!$idEmployee) {
            return array();
        }
        //Получаем список всех подразделений сотрудника
        $arDepartmentsUser = UserTable::getList(array(
            'select' => array(
                'UF_DEPARTMENT'
            ),
            'filter' => array(
                'ID' => $idEmployee
            )
        ))->fetch();
    }
    public static function GetKPIEmployee($idEmployee) {
        if(!$idEmployee) {
            return array();
        }
        //Получаем список всех подразделений сотрудника
        $arDepartmentsUser = UserTable::getList(array(
            'select' => array(
                'UF_DEPARTMENT'
            ),
            'filter' => array(
                'ID' => $idEmployee
            )
        ))->fetch();

        //Получаем список всех KPI данных подразделений
        return self::GetKPI(
            array('NAME' => 'asc'),
            array('PROPERTY_DEPARTMENT.ID' => $arDepartmentsUser),
            false,
            false,
            array('ID', 'NAME', 'PROPERTY_INDICATOR_TYPE', 'PROPERTY_WEIGHT', 'PROPERTY_REGULATIONS')
        );
    }
    public static function GetKPIEmployeeValue($idKPI, $idEmployee, $period)
    {
        if(!$idKPI && !$idEmployee && !$period) {
            return array();
        }
        $arEmployeesUser = GetKPIEmployeeValue::getList(array(
            'select' => array('ID', 'UF_VALUE'),
            'filter' => array('UF_KPI' => $idKPI, 'UF_EMPLOYEE' => $idEmployee, 'UF_PERIOD' => $period)
        ))->fetch();

        return $arEmployeesUser;
    }
}

?>