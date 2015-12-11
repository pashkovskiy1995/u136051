<?
/*����������� ��������� ����� ������*/
IncludeModuleLangFile(__FILE__);
/*�������� ������ � ��������� � ���������� ������ � �������
*��� ������ ������ ��������� � ID ������, ������ ����� ����� ������
������� � ������ ������ ���� �������������
*����� ������ ������ ���� ����������� ���������� ������ �������
������� CModule*/
Class miet_kpi extends CModule {
    /*������������ �������� ������� ������*/
    const MODULE_ID = "miet.kpi";
    var $MODULE_ID = "miet.kpi";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    /*����������� ������*/
    /*������������ ��� ���������� �����*/
    function __construct()
    {
        $arModuleVersion = array();
        include(__DIR__ . "/version.php");
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE =
            $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = GetMessage("miet.kpi_MODULE_NAME");
        $this->MODULE_DESCRIPTION =
            GetMessage("miet.kpi_MODULE_DESC");
        $this->PARTNER_NAME = GetMessage("miet.kpi_PARTNER_NAME");
        $this->PARTNER_URI = GetMessage("miet.kpi_PARTNER_URI");
    }

    /*����� ����������� ������� ������ � �� ������������*/
    function InstallEvents()
    {
        /* ������
        $em = \Bitrix\Main\EventManager::getInstance();
        $em->registerEventHandler('sale', 'OnBasketAdd',
       self::MODULE_ID, '\CompanyNamespace\Promotions\Connector',
       'OnBasketAdd');
        $em->registerEventHandler('sale', 'OnBasketUpdate',
       self::MODULE_ID, '\CompanyNamespace\Promotions\Connector',
       'OnBasketUpdate');
        */
        return true;
    }
    /*����� �������� ������� ������ � �� ������������*/
    function UnInstallEvents()
    {
        /* ������
        $em = \Bitrix\Main\EventManager::getInstance();
        $em->unRegisterEventHandler('sale', 'OnBasketAdd',
       self::MODULE_ID, '\CompanyNamespace\Promotions\Connector',
       'OnBasketAdd');
        $em->unRegisterEventHandler('sale', 'OnBasketUpdate',
       self::MODULE_ID, '\CompanyNamespace\Promotions\Connector',
       'OnBasketUpdate');
        */
        return true;
    }
    /*����� ��������� (����������� ������ � ���� ��������) ������
   ������*/
    function InstallFiles($arParams = array())
    {
        /*��������� ���������������� �������*/
        if (is_dir($p = $_SERVER["DOCUMENT_ROOT"] . "/local/modules/"
            . self::MODULE_ID . "/admin"))
        {
            if ($dir = opendir($p))
            {
                while (false !== $item = readdir($dir))
                {
                    if ($item == ".." || $item == "." || $item ==
                        "menu.php")
                    {
                        continue;
                    }
                    file_put_contents($file =
                        $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin/" . self::MODULE_ID . "_"
                        . $item, '<' . '? require($_SERVER["DOCUMENT_ROOT"]."/local/modules/'
                        . self::MODULE_ID . '/admin/' . $item . '");?' . '>');
                }
                closedir($dir);
            }
        }
        /*��������� ����� JS*/
        if (is_dir($p = $_SERVER["DOCUMENT_ROOT"] . "/local/modules/"
            . self::MODULE_ID . "/install/js"))
        {
            CheckDirPath($_SERVER["DOCUMENT_ROOT"] . "/bitrix/js/" .

self::MODULE_ID);
 CopyDirFiles($p, $_SERVER["DOCUMENT_ROOT"] .
     "/bitrix/js/" . self::MODULE_ID, true, true);
 }
        /*��������� ����� CSS*/
        if (is_dir($p = $_SERVER["DOCUMENT_ROOT"] . "/local/modules/"
            . self::MODULE_ID . "/install/themes"))
        {
            CopyDirFiles($p,
                $_SERVER["DOCUMENT_ROOT"]."/bitrix/themes", true, true);
        }
        /*��������� ����� � ������������ ������*/
        if (is_dir($p = $_SERVER['DOCUMENT_ROOT'] . '/local/modules/'
            . self::MODULE_ID . '/install/components'))
        {
            if ($dir = opendir($p))
            {
                while (false !== $item = readdir($dir))
                {
                    if ($item == '..' || $item == '.')
                    {
                        continue;
                    }
                    CopyDirFiles($p . '/' . $item,
                        $_SERVER['DOCUMENT_ROOT'] . '/bitrix/components/' . $item, $ReWrite =
                            true, $Recursive = true);
                }
                closedir($dir);
            }
        }
        return true;
    }
    /*����� �������� (�������� ������ �� ���� ��������) ������
   ������*/
    function UnInstallFiles()
    {
        /*��������� ���������������� �������*/
        if (is_dir($p = $_SERVER["DOCUMENT_ROOT"] . "/local/modules/"
            . self::MODULE_ID . "/admin"))
        {
            if ($dir = opendir($p))
            {
                while (false !== $item = readdir($dir))
                {
                    if ($item == ".." || $item == ".")
                    {
                        continue;
                    }
                    unlink($_SERVER["DOCUMENT_ROOT"] .
                        "/bitrix/admin/" . self::MODULE_ID . "_" . $item);
                }
                closedir($dir);
            }
        }
        /*������� ����� JS*/
        if (is_dir($p = $_SERVER["DOCUMENT_ROOT"] . "/bitrix/js/" .

self::MODULE_ID))
 {
     DeleteDirFilesEx($p);
 }
 /*������� ����� CSS*/

DeleteDirFiles($_SERVER["DOCUMENT_ROOT"]."/local/modules/".$this->MODULE_ID."/install/themes/.default/", $_SERVER["DOCUMENT_ROOT"]."/bitrix/themes/.default");
 /*������� ����� � ������������ ������*/
 if (is_dir($p = $_SERVER['DOCUMENT_ROOT'] . '/local/modules/'
     . self::MODULE_ID . '/install/components'))
 {
     if ($dir = opendir($p))
     {
         while (false !== $item = readdir($dir))
         {
             if ($item == '..' || $item == '.' || !is_dir($p0
                     = $p . '/' . $item))
             {
                 continue;
             }
             $dir0 = opendir($p0);
             while (false !== $item0 = readdir($dir0))
             {
                 if ($item0 == '..' || $item0 == '.')
                 {
                     continue;
                 }
                 DeleteDirFilesEx($_SERVER['DOCUMENT_ROOT'] .
                     '/bitrix/components/' . $item . '/' . $item0);
             }
             closedir($dir0);
         }
         closedir($dir);
     }
 }
 return true;
 }
    /*����������� ��� ������� ������ ������� �� �������� ������
   ����������������� �������, ������������ ������������� ������*/
    /*������������ ��� ���������� �����*/
    function DoInstall()
    {
        global $APPLICATION;
        $this->InstallFiles();
        $this->InstallDB();
        $this->InstallEvents();
        RegisterModule(self::MODULE_ID);
    }
    /*����� ����������� ��� ������� ������ ���������� �� ��������
   ������ ����������������� �������, ������������ ����������� ������*/
    /*������������ ��� ���������� �����*/
    function DoUninstall()
    {
        global $APPLICATION;
        UnRegisterModule(self::MODULE_ID);
        $this->UnInstallEvents();
        $this->UnInstallDB();
        $this->UnInstallFiles();
    }
    /*����� ������� ������ SQL, ������� �������� ������� �� ��������
   ������ � �� ��� ������ ������*/
    function InstallDB()
    {
        global $DB, $DBType;
        $DB->RunSQLBatch($_SERVER["DOCUMENT_ROOT"]."/local/modules/".self::MODULE_ID."/install/db/".strtolower($DBType)."/install.sql");
 return true;
 }
}
