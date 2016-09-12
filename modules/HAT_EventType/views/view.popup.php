<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HAT_EventTypeViewPopup extends ViewPopup
{


    function Display() {

 		global $mod_strings, $app_strings, $app_list_strings;
        global $db;

/*        if(($this->bean instanceOf SugarBean) && !$this->bean->ACLAccess('list')){
            ACLController::displayNoAccess();
            sugar_cleanup(true);
        }
*/
		/***************************************************************/
		/* 以下为自定义的界面 by toney.wu
		/*****************************************************************/

    	echo ('<script type="text/javascript" src="include/javascript/popup_helper.js"></script>');
    	echo ('<script type="text/javascript" src="modules/HAT_EventType/js/EventType_popupview.js"></script>');//

    	echo '<form id="popup_query_form" name="popup_query_form">';
        echo '<h3>'.$mod_strings['LBL_SEARCH_FORM_TITLE'].'</h3>';
    	echo ('<div style="font-size:larger" id="PopupView" eventtype="'.$_REQUEST['basic_type_advanced'].'" eventtype_name="'.$app_list_strings['hat_event_type_list'][$_REQUEST['basic_type_advanced']].'"></div>');
    	//这个是放置树型控件的容器
    	//另外这个容器有两个参数：用于存放ROOT结点的名称与类型(已经没有功能做用了，之前为是动态加载，目前已经是批量加载，所以没有什么用了)

    	echo '<input type="text" name="eventtype_selected"  tabindex="0" id="eventtype_selected" size="" value="" title="" autocomplete="off">';
    	echo '<input type="button" name="btn_eventtype" id=name="btn_eventtype" value="'.$app_strings['LBL_ID_FF_SELECT'].'" class="yui-ac-input" onclick="btn_eventtype_clicked()">';
    	//以上是选择框

		echo '<input type="hidden" name="module" value="HAT_EventType">';
 		echo '<input type="hidden" name="action" value="Popup">';
    	echo '<input type="hidden" name="request_data" >'; //所有的参数都存在在这里，参数会被自动填充

    	echo '</form>';


        /***************************************************************/
        /* 以下为加载数据 by toney.wu
        /*****************************************************************/

        $beanEventTypes = BeanFactory::getBean('HAT_EventType')->get_full_list('name',"hat_eventtype.basic_type = '".$_REQUEST['basic_type_advanced']."'");
 
         $txt_jason='{name:"'.$app_list_strings['hat_event_type_list'][$_REQUEST['basic_type_advanced']].'", open:true, isParent:true,pId:0,id:"ROOT"},';
            $beanEventTypes = BeanFactory::getBean('HAT_EventType')->get_full_list('name',"hat_eventtype.basic_type = '".$_REQUEST['basic_type_advanced']."'");

                    $txt_jason='{name:"'.$app_list_strings['hat_event_type_list'][$_REQUEST['basic_type_advanced']].'", open:true, isParent:true,pId:0,id:"ROOT"},';

                    if (isset($beanEventTypes)) {
                        foreach ($beanEventTypes as $beanEventType) {
                            $txt_jason.="{";
                            foreach ($beanEventType->field_name_map as $key => $value) {
                                //echo $key."=".(gettype($value)).":"."<br/>";
                                if ($key == 'parent_eventtype_id'){
                                    //Parent_eventtype_id需要特别处理
                                    $txt_jason .='pId:"'.(($beanEventType->parent_eventtype_id=="")?"ROOT":$beanEventType->parent_eventtype_id).'",';
                                }else {
                                    if (isset($beanEventType->$key)) {
                                        $txt_jason .=$key.':"'.$beanEventType->$key.'",';
                                    }
                                }
                            }
                            $txt_jason  = substr($txt_jason,0,strlen($txt_jason)-1);//去除最后一个,
                            $txt_jason.="},";
                        }
                    }


                    $txt_jason  = substr($txt_jason,0,strlen($txt_jason)-1);//去除最后一个,
                    $txt_jason .= "}";

                    $txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);
                    //$txt_jason='{"node":['.$txt_jason.']}';
                    $txt_jason='['.$txt_jason.']';
                    //echo($txt_jason);
                    echo('<script>var zNodes = '.$txt_jason.'</script>');

       //parent::Display();
    }
}
