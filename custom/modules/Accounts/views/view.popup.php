<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class AccountsViewPopup extends ViewPopup
{

    function Display() {


      global $mod_strings, $app_strings, $app_list_strings;
        global $db;
          if (empty($_REQUEST['haa_frameworks_id_c_advanced'])) {          //如果界面没有供出对应的值，此仅列出当前Session选定组织的Framework
            $haa_frameworks_id=$_SESSION["current_framework"];
            $_REQUEST['haa_frameworks_id_c_advanced']=$haa_frameworks_id;
          }

          if (isset($_GET['module_name']) && (/*$_GET['module_name'] =='HAT_Counting_Tasks' ||*/ $_GET['module_name'] =='HAT_Counting_Batchs')){

/*        if(($this->bean instanceOf SugarBean) && !$this->bean->ACLAccess('list')){
            ACLController::displayNoAccess();
            sugar_cleanup(true);
        }
*/
        //var_dump($_REQUEST['allnodes']);
      /*  if (isset($_REQUEST['allnodes']) &&($_REQUEST['allnodes']=='1'||$_REQUEST['allnodes']=='true')){
        echo "<script>var allnodes=true;</script>";
    }else {
        echo "<script>var allnodes=false;</script>";
    }*/
    echo "<script>var allnodes=true;</script>";
    /***************************************************************/
        /* 以下为自定义的界面
        /*****************************************************************/
        echo ('<script type="text/javascript" src="include/javascript/popup_helper.js"></script>');
        echo '<form id="popup_query_form" name="popup_query_form">';
        echo '<h3>'.$mod_strings['LBL_SEARCH_FORM_TITLE'].'</h3>';
        //'.$_REQUEST['basic_type_advanced'].'
        echo ('<div style="font-size:larger" id="PopupView" eventtype="AT_MOVE" eventtype_name="'.$mod_strings['LBL_MODULE_NAME'].'"></div>');
        //这个是放置树型控件的容器
        //var_dump($mod_strings);
        echo '<input type="text" name="eventtype_selected"  tabindex="0" id="eventtype_selected" size="" value="" title="" autocomplete="off">';
        echo '<input type="button" name="btn_submit" id="btn_submit" value="'.$app_strings['LBL_ID_FF_SELECT'].'" class="yui-ac-input" onclick="btn_submit_clicked()">';
        //以上是选择框

        echo '<input type="hidden" name="module" value="Accounts">';
        echo '<input type="hidden" name="action" value="Popup">';
        echo '<input type="hidden" name="request_data" >'; //所有的参数都存在在这里，参数会被自动填充

        echo '</form>';


        /***************************************************************/
        /* 以下为加载数据
        /*****************************************************************/
        $beanEventTypes = BeanFactory::getBean('Accounts')->get_full_list($order_by = "",$where = "accounts_cstm.org_type_c='INTERNAL' and accounts_cstm.is_asset_org_c =1 and accounts_cstm.haa_frameworks_id_c='".$_SESSION["current_framework"]."'");
            //var_dump($_SESSION["current_framework"]);
           // $txt_jason="";
          //  $txt_jason = '{name:"IP Addresses", open:true, isParent:true, pId:0, id:"ROOT"},';
            //$beanEventTypes = BeanFactory::getBean('HAT_EventType')->get_full_list('name',"hat_eventtype.basic_type = '".$_REQUEST['basic_type_advanced']."' AND hat_eventtype.haa_frameworks_id= '".$_SESSION["current_framework"]."'");
            //var_dump($app_list_strings);
        $txt_jason='{name:"'.$mod_strings['LBL_MODULE_NAME'].'", open:false, isParent:true,pId:0,id:"ROOT"},';
       
        if (isset($beanEventTypes)) {
            foreach ($beanEventTypes as $beanEventType) {
                $txt_jason.="{";
                foreach ($beanEventType->field_name_map as $key => $value) {
                        //echo $key."=".(gettype($value)).":"."<br/>";
                    if ($key == 'parent_id'){
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
            echo ('<script type="text/javascript" src="custom/modules/Accounts/js/Accounts_popupview.js"></script>');//
        }else{
            echo '<script src="custom/modules/Accounts/js/popup_view.js"></script>';
            if(!empty($_REQUEST["asset_using_org"])){
                echo '<script> var asset_using_org="'.$_REQUEST["asset_using_org"].'";</script>';
            }

            parent::Display();
        }

    }


    function process() {

        global $mod_strings, $app_strings, $app_list_strings;
        global $db;
        global $popupMeta;

        //$popupMeta["whereStatement"].='access_assets_id="'.$_REQUEST["access_assets_id_advanced"].'"';
        //if(isset($_REQUEST["access_assets_name_advanced"])&&!empty($_REQUEST["access_assets_name_advanced"])){
        //  $popupMeta["whereStatement"].='(access_assets_name="'.$_REQUEST["hat_asset_name_advanced"].'" or hat_asset_name="'.$_REQUEST["hat_asset_name_advanced"].'")';
        //}

        parent::process();
        //echo $popupMeta["whereStatement"];
        //echo "where".$popupMeta->_get_where_clause();
        //echo "REQUEST".var_dump($_SESSION);


        //echo  $_REQUEST["access_assets_name_advanced"];

        //echo var_dump(file_exists('modules/' . $this->module . '/Popup_picker.php'));
        //echo print_r($_SESSION);
        //echo print_r($_SESSION['Accounts2_QUERY']);
        //echo print_r($_REQUEST);
    }
}