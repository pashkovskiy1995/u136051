<?php
namespace DEKANAT\STUDENTS;
use Bitrix\Main\Application;
use Bitrix\Main\Entity;
use Bitrix\Main\Entity\Event;
use Bitrix\Main\Localization\Loc;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\UserTable;
Loc::loadMessages(__FILE__);





class StudentsTable extends Entity\DataManager {
    public static function getFilePath()
    {
        return __FILE__;
    }

    public static function getTableName()
    {
        return 'dekanat_students';
    }

    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true
            ),
            'UF_USID' => array(
                'data_type' => 'integer',
				'required' => true
            ),
            'UF_WAY' => array(
                'data_type' => 'integer',
				'required' => true
            ),
            'UF_GROUP' => array(
                'data_type' => 'integer',
				'required' => true
            ),
            'UF_STATUS' => array(
                'data_type' => 'integer'
            )
 );
 }
}







class WaysTable extends Entity\DataManager {
    public static function getFilePath()
    {
        return __FILE__;
    }
    /*Название таблицы HL в БД*/
    public static function getTableName()
    {
        return 'dekanat_ways';
    }
    /*Описание полей сущности (соответсвуют полям HL EmployeeKPI)*/
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true
            ),
            'UF_NAME' => array(
                'data_type' => 'string',
				'required' => true
            )
 );
 }
}







class GroupsTable extends Entity\DataManager {
    public static function getFilePath()
    {
        return __FILE__;
    }

    public static function getTableName()
    {
        return 'dekanat_groups';
    }

    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true
            ),
            'UF_WAYID' => array(
                'data_type' => 'integer',
				'required' => true
            ),
            'UF_NAME' => array(
                'data_type' => 'integer',
				'required' => true
            )
 );
 }
}
/*

class ConferenceUsersTable extends Entity\DataManager{
    public static function getFilePath()
    {
        return __FILE__;
    }

    public static function getTableName()
    {
        return 'conference_users';
    }
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true
            ),
            'UF_USID' => array(
                'data_type' => 'integer',
                'required' => true
            ),
            'UF_CONFID' => array(
                'data_type' => 'integer',
                'required' => true
             ),
            'UF_RANG' => array(
                'data_type' => 'integer'
             ),
            'UF_WORK' => array(
                'data_type' => 'string'
             ),
            'UF_STATUS' => array(
                'data_type' => 'integer'
             ),
            'UF_THESIS' => array(
                'data_type' => 'string'
             ),
			'UF_THESIS_FILE' => array(
                'data_type' => 'string'
             ),
 //Описываем все связи с другими таблицами (внешние ключи)
 new Entity\ReferenceField(
     'UF_CONFID',
     'Bitrix\Iblock\ElementTable',
     array('=this.UF_CONFID' => 'ref.ID')
 ),
 new Entity\ReferenceField(
     'UF_USID',
     'Bitrix\Main\UserTable',
     array('=this.UF_USID' => 'ref.ID')
 )
 );
 }
}
*/


/*
class ConferenceMessagesTable extends Entity\DataManager{
    public static function getFilePath()
    {
        return __FILE__;
    }

    public static function getTableName()
    {
        return 'conference_messages';
    }
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true
            ),
            'UF_USID' => array(
                'data_type' => 'integer',
                'required' => true
            ),
            'UF_CONFID' => array(
                'data_type' => 'integer',
                'required' => true
             ),
			'UF_STATUS' => array(
                'data_type' => 'integer'
             ),
 //Описываем все связи с другими таблицами (внешние ключи)
 new Entity\ReferenceField(
     'UF_CONFID',
     'Bitrix\Iblock\ElementTable',
     array('=this.UF_CONFID' => 'ref.ID')
 ),
 new Entity\ReferenceField(
     'UF_USID',
     'Bitrix\Main\UserTable',
     array('=this.UF_USID' => 'ref.ID')
 )
 );
 }
}

*/





class USERSDekanat
{

    public static function NewStudents($id, $way, $group)
	{

        $arValue = array(
           'UF_USID' => $id,
           'UF_WAY' => $way,
           'UF_GROUP' => $group,
		   'UF_STATUS' => '1'
        ); 
		
        return StudentsTable::add($arValue);
    }


    public static function NewWay($name)
	{

        $arValue = array(
           'UF_NAME' => $name
        ); 
		
        return WayTable::add($arValue);
    }	
	

    public static function NewGroup($way, $name)
	{

        $arValue = array(
           'UF_WAYID' => $way,
           'UF_NAME' => $way
        ); 
		
        return GroupTable::add($arValue);
    }	

	/*
	public static function ShowConference($conference)
    {   
        $conference = intval($conference);
		$filter = array('ID' => $conference, '>UF_DATE' => \Bitrix\Main\Type\DateTime::createFromUserTime(date("d.m.Y") . ' 00:00:00'));
		
        $req = ConferenceTable::getList(array(
            'select' => array(
                'ID', 'UF_TOPIC', 'UF_PLACE', 'UF_DATE'
            ),
            'filter' => $filter
        ));
		
		if($res = $req->Fetch())
		{
		$res[] = $req;

		$ob[0]["ID"] = $res["ID"];
		$ob[0]["UF_TOPIC"] = $res["UF_TOPIC"];
		$ob[0]["UF_PLACE"] = $res["UF_PLACE"];
		$ob[0]["UF_DATE"] = $res["UF_DATE"];
		return $ob;
		}
		else return false;
    }
	
	public static function IdConference($user_id, $conf_id)
    {   
        $user_id = intval($user_id);
		$filter = array('UF_USID' => $user_id, 'UF_CONFID' => $conf_id);
		
        $req = ConferenceUsersTable::getList(array(
            'select' => array(
                'ID'
            ),
            'filter' => $filter
        ));
		
		if($res = $req->Fetch())
		{
		$res[] = $req;
		return true;
		}
		else return false;
    }
	
	public static function MessageToConference($user, $admin)
	{
	   if($admin == 'no') $req = ConferenceMessagesTable::getList(array('select' => array('ID', 'UF_USID', 'UF_CONFID', 'UF_STATUS'), 'filter' => array('UF_USID' => $user, 'UF_STATUS' => '1')));
       else  $req = ConferenceMessagesTable::getList(array('select' => array('ID', 'UF_USID', 'UF_CONFID', 'UF_STATUS'), 'filter' => array('UF_STATUS' => '')));

	   if($res = $req->fetch())
	   {
	   $res[] = $req;
	   return $res;
	   }
	   else return false;	
	}
	
	public static function ThetisToConferences()
    {   

		$req = ConferenceUsersTable::getList(array('select' => array('ID', 'UF_USID', 'UF_CONFID', 'UF_WORK', 'UF_THESIS', 'UF_THESIS_FILE'),'filter' => array('!UF_THESIS' => '', '!UF_THESIS_FILE' => '', '!UF_STATUS' => '')));		
		
		$i=0;
		while($res = $req->fetch())
        {
		$res[] = $req;
		
		
		$ob[$i]["ID"] = $res["ID"];
		$ob[$i]["CONFID"] = $res["UF_CONFID"];
		$ob[$i]["WORK"] = $res["UF_WORK"];
		$ob[$i]["THESIS"] = $res["UF_THESIS"];	
		$ob[$i]["THESIS_FILE"] = $res["UF_THESIS_FILE"];	
		
		
		
		$us = UserTable::getList(array(
            'select' => array(
                'ID', 'NAME', 'LAST_NAME'
            ),
            'filter' => array('ID' => $res["UF_USID"])
        ));	
		
		
		if($uss = $us->fetch())
        {
		$uss[] = $us;
		
		
		$ob[$i]["NAME"] = $uss["NAME"];
		$ob[$i]["LAST_NAME"] = $uss["LAST_NAME"];
		
		
		$conf =ConferenceTable::getList(array(
            'select' => array(
                'ID', 'UF_TOPIC'
            ),
            'filter' => array('ID' => $res["UF_CONFID"])
        ));
		
		if($conference = $conf->fetch())
		{
		$conference[] = $conf;
		$ob[$i]["TOPIC"] = $conference["UF_TOPIC"];
			
		}
		}
		
		$i++;
		}
		

	return $ob;
    }


	public static function ShowMessages()
    {   
		
        $req = ConferenceMessagesTable::getList(array('select' => array('ID', 'UF_USID', 'UF_CONFID'), 'filter' => array('UF_STATUS' => '')));

		
	    //$filter = array('UF_USID' => $user, 'UF_CONFID' => $conference);
		
		$i=0;
		while($res = $req->Fetch())
		{
		$res[] = $req;

		$ob[$i]["ID"] = $res["ID"];
		
		
        $row = ConferenceTable::getList(array(
            'select' => array(
                'ID', 'UF_TOPIC'
            ),
            'filter' => array('ID' => $res["UF_CONFID"])
        ));		
		
		if($rez = $row->fetch())
		{
		$rez[] = $row;
		
		$ob[$i]["UF_TOPIC"] = $rez["UF_TOPIC"];
		
		$uss = UserTable::getList(array(
            'select' => array(
                'ID', 'NAME', 'LAST_NAME'
            ),
            'filter' => array('ID' => $res["UF_USID"])
        ));		
		
		if($user = $uss->fetch())
        {
		$user[] = $uss;
		
		$ob[$i]["USID"] = $user["ID"];
		$ob[$i]["NAME"] = $user["NAME"];
		$ob[$i]["LAST_NAME"] = $user["LAST_NAME"];
		
		}
		
		}
		$i++;
		}
	return $ob;
    }
	
	
	public static function ViewConference($conf_id)
    {   
		
		$conf_id = intval($conf_id);
        $req = ConferenceTable::getList(array('select' => array('ID', 'UF_TOPIC', 'UF_DATE', 'UF_PLACE'), 'filter' => array('ID' => $conf_id)));

		
		if($res = $req->Fetch())
		{
		$res[] = $req;
        
		$ob[0]["ID"] = $res["ID"];
		$ob[0]["TOPIC"] = $res["UF_TOPIC"];
		$ob[0]["DATE"] = $res["UF_DATE"];
		$ob[0]["PLACE"] = $res["UF_PLACE"];
		
		return $ob;
		}
		
	}
	
	
	public static function ViewUsersConference($conf_id, $rang)
	{
		$rang = intval($rang);
        $uss = ConferenceUsersTable::getList(array(
            'select' => array(
                'ID', 'UF_USID', 'UF_RANG', 'UF_WORK', 'UF_THESIS', 'UF_THESIS_FILE'
            ),
            'filter' => array('UF_CONFID' => $conf_id, 'UF_RANG' => $rang, 'UF_STATUS' => '1')
        ));		
		
		$i=0;
		while($user = $uss->fetch())
		{
		$user[] = $uss;
		
		$us[$i]["WORK"] = $user["UF_WORK"];
		
		if($rang == 2)
		{
			$us[$i]["THESIS"] = $user["UF_THESIS"];
			$us[$i]["THESIS_FILE"] = $user["UF_THESIS_FILE"];
		}
		
		
		$only_uss = UserTable::getList(array(
            'select' => array(
                'ID', 'NAME', 'LAST_NAME'
            ),
            'filter' => array('ID' => $user["UF_USID"])
        ));		
		
		if($user = $only_uss->fetch())
        {
		$user[] = $only_uss;
		
		$us[$i]["NAME"] = $user["NAME"];
		$us[$i]["LAST_NAME"] = $user["LAST_NAME"];		
		}
		
		$i++;
		}
	return $us;
    }	
	
    //Компонент conference.menu.edit | Обновление данных
	public static function UpdateConference($id)
    {

        $req = ConferenceMessagesTable::getList(array('select' => array('ID', 'UF_USID', 'UF_CONFID'), 'filter' => array('ID' => $id)));
		
		if($row = $req->fetch())
		{
		$row[] = $req;
		
		$res = array('0' => array('UF_STATUS' => '1'));
		 
		$ob = ConferenceMessagesTable::update($row["ID"], $res[0]);
		
		$ret = ConferenceUsersTable::getList(array('select' => array('ID', 'UF_STATUS'), 'filter' => array('UF_USID' => $row["UF_USID"], 'UF_CONFID' => $row["UF_CONFID"])));
		
		if($rem = $ret->fetch())
		{
		$rem[] = $ret;
		

		$rel = array('0' => array(
		   'UF_STATUS' => '1'));
		 
		$ob2 = ConferenceUsersTable::update($rem["ID"], $rel[0]);
		
		}
		}
		
    }
	

	public static function DeleteUserConference($id, $user_id)
    {

    $req = ConferenceMessagesTable::getList(array('select' => array('ID', 'UF_USID', 'UF_CONFID'), 'filter' => array('ID' => $id, 'UF_USID' => $user_id)));
		
		if($row = $req->Fetch())
		{
		$row[] = $req;


		$ob = ConferenceMessagesTable::delete($row["ID"]);
		$ret = ConferenceUsersTable::getList(array('select' => array('ID', 'UF_STATUS'), 'filter' => array('UF_USID' => $row["UF_USID"], 'UF_CONFID' => $row["UF_CONFID"])));
		
		/*
		$res = array('0' => array(
		   'ID' => $row["ID"],
		   'UF_VALUE' => $row["UF_VALUE"],
		   'UF_ACCESS' => $row["UF_ACCESS"],
		   'UF_URL' => $row["UF_URl"]));
		*/
		
		/*
		if($res = $ret->fetch())
		{


		$ob2 = ConferenceUsersTable::delete($res["ID"]);
		return $ob;
		}
		}
		else return false;
    }
	
	public static function CloseUserConference($user_id)
    {

    $req = ConferenceMessagesTable::getList(array('select' => array('ID', 'UF_USID', 'UF_CONFID'), 'filter' => array('UF_USID' => $user_id)));
		
		if($row = $req->Fetch())
		{
		$row[] = $req;
		$ob = ConferenceMessagesTable::delete($row["ID"]);
		return $ob;
		}
		else return false;
    }
*/	
}
