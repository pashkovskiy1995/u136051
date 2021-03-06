<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/docs/pub/(?<hash>[0-9a-f]{32})/(?<action>[0-9a-zA-Z]+)/\\?#",
		"RULE" => "hash=\$1&action=\$2&",
		"ID" => "bitrix:disk.external.link",
		"PATH" => "/docs/pub/index.php",
	),
	array(
		"CONDITION" => "#^/disk/(?<action>[0-9a-zA-Z]+)/(?<fileId>[0-9]+)/\\?#",
		"RULE" => "action=\$1&fileId=\$2&",
		"ID" => "bitrix:disk.services",
		"PATH" => "/bitrix/services/disk/index.php",
	),
	array(
		"CONDITION" => "#^/mobile/disk/(?<hash>[0-9]+)/download#",
		"RULE" => "download=1&objectId=\$1",
		"ID" => "bitrix:mobile.disk.file.detail",
		"PATH" => "/mobile/disk/index.php",
	),
	array(
		"CONDITION" => "#^/tasks/getfile/(\\d+)/(\\d+)/([^/]+)#",
		"RULE" => "taskid=\$1&fileid=\$2&filename=\$3",
		"ID" => "bitrix:tasks_tools_getfile",
		"PATH" => "/tasks/getfile.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/mailtemplate/#",
		"RULE" => "",
		"ID" => "bitrix:crm.mail_template",
		"PATH" => "/crm/configs/mailtemplate/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/productprops/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.productprops",
		"PATH" => "/crm/configs/productprops/index.php",
	),
	array(
		"CONDITION" => "#^/bitrix/services/ymarket/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/bitrix/services/ymarket/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/locations/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.locations",
		"PATH" => "/crm/configs/locations/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/currency/#",
		"RULE" => "",
		"ID" => "bitrix:crm.currency",
		"PATH" => "/crm/configs/currency/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/measure/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.measure",
		"PATH" => "/crm/configs/measure/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/exch1c/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.exch1c",
		"PATH" => "/crm/configs/exch1c/index.php",
	),
	array(
		"CONDITION" => "#^/services/processes/#",
		"RULE" => "",
		"ID" => "bitrix:lists",
		"PATH" => "//services/processes/index.php",
	),
	array(
		"CONDITION" => "#^/crm/reports/report/#",
		"RULE" => "",
		"ID" => "bitrix:crm.report",
		"PATH" => "/crm/reports/report/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/fields/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.fields",
		"PATH" => "/crm/configs/fields/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/perms/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.perms",
		"PATH" => "/crm/configs/perms/index.php",
	),
	array(
		"CONDITION" => "#^/company/personal/#",
		"RULE" => "",
		"ID" => "bitrix:socialnetwork_user",
		"PATH" => "/company/personal.php",
	),
	array(
		"CONDITION" => "#^/services/meeting/#",
		"RULE" => "",
		"ID" => "bitrix:meetings",
		"PATH" => "//services/meeting/index.php",
	),
	array(
		"CONDITION" => "#^/company/gallery/#",
		"RULE" => "",
		"ID" => "bitrix:photogallery_user",
		"PATH" => "/company/gallery/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/tax/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.tax",
		"PATH" => "/crm/configs/tax/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/bp/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.bp",
		"PATH" => "/crm/configs/bp/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/ps/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.ps",
		"PATH" => "/crm/configs/ps/index.php",
	),
	array(
		"CONDITION" => "#^/services/lists/#",
		"RULE" => "",
		"ID" => "bitrix:lists",
		"PATH" => "/services/lists/index.php",
	),
	array(
		"CONDITION" => "#^/services/wiki/#",
		"RULE" => "",
		"ID" => "bitrix:wiki",
		"PATH" => "/services/wiki.php",
	),
	array(
		"CONDITION" => "#^/services/idea/#",
		"RULE" => "",
		"ID" => "bitrix:idea",
		"PATH" => "/services/idea/index.php",
	),
	array(
		"CONDITION" => "#^/about/gallery/#",
		"RULE" => "",
		"ID" => "bitrix:photogallery",
		"PATH" => "/about/gallery/index.php",
	),
	array(
		"CONDITION" => "#^/services/faq/#",
		"RULE" => "",
		"ID" => "bitrix:support.faq",
		"PATH" => "/services/faq/index.php",
	),
	array(
		"CONDITION" => "#^/mobile/webdav#",
		"RULE" => "",
		"ID" => "bitrix:mobile.webdav.file.list",
		"PATH" => "/mobile/webdav/index.php",
	),
	array(
		"CONDITION" => "#^/services/bp/#",
		"RULE" => "",
		"ID" => "bitrix:bizproc.wizards",
		"PATH" => "/services/bp/index.php",
	),
	array(
		"CONDITION" => "#^/crm/company/#",
		"RULE" => "",
		"ID" => "bitrix:crm.company",
		"PATH" => "/crm/company/index.php",
	),
	array(
		"CONDITION" => "#^/crm/product/#",
		"RULE" => "",
		"ID" => "bitrix:crm.product",
		"PATH" => "/crm/product/index.php",
	),
	array(
		"CONDITION" => "#^/docs/manage/#",
		"RULE" => "",
		"ID" => "bitrix:disk.common",
		"PATH" => "/docs/manage/index.php",
	),
	array(
		"CONDITION" => "#^/crm/invoice/#",
		"RULE" => "",
		"ID" => "bitrix:crm.invoice",
		"PATH" => "/crm/invoice/index.php",
	),
	array(
		"CONDITION" => "#^/crm/contact/#",
		"RULE" => "",
		"ID" => "bitrix:crm.contact",
		"PATH" => "/crm/contact/index.php",
	),
	array(
		"CONDITION" => "#^/\\.well-known#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/bitrix/groupdav.php",
	),
	array(
		"CONDITION" => "#^/docs/shared#",
		"RULE" => "",
		"ID" => "bitrix:disk.common",
		"PATH" => "/docs/shared/index.php",
	),
	array(
		"CONDITION" => "#^/workgroups/#",
		"RULE" => "",
		"ID" => "bitrix:socialnetwork_group",
		"PATH" => "/workgroups/index.php",
	),
	array(
		"CONDITION" => "#^/docs/sale/#",
		"RULE" => "",
		"ID" => "bitrix:disk.common",
		"PATH" => "/docs/sale/index.php",
	),
	array(
		"CONDITION" => "#^/crm/quote/#",
		"RULE" => "",
		"ID" => "bitrix:crm.quote",
		"PATH" => "/crm/quote/index.php",
	),
	array(
		"CONDITION" => "#^/crm/deal/#",
		"RULE" => "",
		"ID" => "bitrix:crm.deal",
		"PATH" => "/crm/deal/index.php",
	),
	array(
		"CONDITION" => "#^/crm/lead/#",
		"RULE" => "",
		"ID" => "bitrix:crm.lead",
		"PATH" => "/crm/lead/index.php",
	),
	array(
		"CONDITION" => "#^//docs/all#",
		"RULE" => "",
		"ID" => "bitrix:disk.aggregator",
		"PATH" => "/docs/index.php",
	),
	array(
		"CONDITION" => "#^/docs/pub/#",
		"RULE" => "",
		"ID" => "bitrix:disk.external.link",
		"PATH" => "/docs/pub/extlinks.php",
	),
);

?>