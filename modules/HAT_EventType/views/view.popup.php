<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HAT_EventTypeViewPopup extends ViewPopup
{


    function Display() {

 		global $mod_strings, $app_strings, $app_list_strings;
/*
    	echo ('<script type="text/javascript" src="include/javascript/popup_helper.js"></script>');
    	echo ('<script type="text/javascript" src="modules/HAT_EventType/js/EventType_popupview.js"></script>');//

    	echo '<form id="popup_query_form" name="popup_query_form">';
    	echo ('<div style="font-size:larger" id="PopupView" eventtype="'.$_REQUEST['basic_type_advanced'].'" eventtype_name="'.$app_list_strings['cux_event_type_list'][$_REQUEST['basic_type_advanced']].'"></div>');
    	echo '<input type="text" name="eventtype_selected"  tabindex="0" id="eventtype_selected" size="" value="" title="" autocomplete="off">';
    	echo '<input type="button" name="btn_eventtype" id=name="btn_eventtype" value="'.$app_strings['LBL_ID_FF_SELECT'].'" class="yui-ac-input" onclick="btn_eventtype_clicked()">';
		echo '<input type="hidden" name="module" value="HAT_EventType">';
 		echo '<input type="hidden" name="action" value="Popup">';
    	echo '<input type="hidden" name="request_data" value="{&quot;call_back_function&quot;:&quot;set_return&quot;,&quot;form_name&quot;:&quot;EditView&quot;,&quot;field_to_name_array&quot;:{&quot;id&quot;:&quot;hat_event_type_id&quot;,&quot;name&quot;:&quot;event_type&quot;}}">';

    	echo '</form>';*/

//localhost/handALM/index.php?module=HAT_EventType&action=Popup&query=true&basic_type_advanced=SR&mode=single&create=true&field_to_name[]=name

//http://localhost/handALM/index.php?module=Contacts&action=Popup&query=true&account_name_advanced=&mode=single&create=true&field_to_name[]=name&field_to_name[]=account_name&field_to_name[]=account_id&field_to_name[]=phone_work&field_to_name[]=phone_mobile&field_to_name[]=email1
//{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"name":"reporter","id":"contact_id","account_name":"reporter_org","account_id":"account_id","phone_work":"work_phone","phone_mobile":"mobile","email1":"email"}}


       parent::Display();
    }
}
