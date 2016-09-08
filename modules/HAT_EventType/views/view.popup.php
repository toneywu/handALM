<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HAT_EventTypeViewPopup extends ViewPopup
{


    function Display() {

 		global $mod_strings, $app_strings, $app_list_strings;

    	echo ('<script type="text/javascript" src="include/javascript/popup_helper.js"></script>');
    	echo ('<script type="text/javascript" src="modules/HAT_EventType/js/EventType_popupview.js"></script>');//

    	

    	echo ('<div id="PopupView" eventtype="'.$_REQUEST['basic_type_advanced'].'" eventtype_name="'.$app_list_strings['cux_event_type_list'][$_REQUEST['basic_type_advanced']].'"></div>');

    	/*echo ('<a href="javascript:void(0)" onclick="send_back(\'HAT_EventType\',\'4d76e355-edb1-2073-fb0b-57d109e3d5bf\');">快捷处理.参观</a>');
*/

	//var associated_row_data = associated_javascript_data[id];


/*       parent::Display();
        echo'<script>$("#basic_type_advanced").closest("td").hide()</script>';
        echo'<script>$("#basic_type_advanced").closest("td").prev("td").hide()</script>';
 */   }
}
