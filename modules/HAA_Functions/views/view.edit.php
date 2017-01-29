<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.edit.php');

class HAA_FunctionsViewEdit extends ViewEdit
{

	function Display(){
		/*require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
        if (isset($beanFramework)) {
            $bean_framework_id = $_SESSION["current_framework"];
            $bean_framework_name = $beanFramework->name;
        }
        $this->ss->assign('FRAMEWORK',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id_c'));

        $modules=array(
            'HAA_Functions_lines',
            );
        foreach($modules as $module){
            if(!is_file($GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js')){
                require_once'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module,$GLOBALS['current_language']);
            }
            echo'<script type="text/javascript"src="'.$GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js?s='.$GLOBALS['js_version_key'].'&c='.$GLOBALS['sugar_config']['js_custom_version'].'&j='.$GLOBALS['sugar_config']['js_lang_version'].'"></script>';
        }*/
        echo '<link rel="stylesheet" href="custom/resources/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>
<link rel="stylesheet" href="custom/resources/bootstrap-iconpicker/icon-fonts/icomoon/css/style.css"/>';
        echo '<script src="modules/HAA_Functions/js/editview_icon_picker.js"></script>';
        parent::Display();
        
        echo '<script>console.log($("#func_icon"));icon_edit_init($("#func_icon"));</script>';
    }

    /*function displayLineItems(){
        $focus=$this->bean;
        $html = '';
        $html.='<script src="modules/HAA_Functions/js/line_items.js"></script>';
        echo $html;
        $html="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>";
        echo "<script>replace_display_lines(" .json_encode($html).",'line_items_span');</script>";
        echo '<script>insertLineHeader("lineItems");</script>';
        if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
            $sql="SELECT
                haa_functions_lines.id,
                users.user_name,
                user_name_id,
                user_group_id,
                accounts.name user_group,
                enable_flag
            FROM
                haa_functions_lines
            LEFT JOIN accounts ON haa_functions_lines.user_group_id=accounts.id
            LEFT JOIN users ON user_name_id = users.id
            LEFT JOIN haa_functions_haa_functions_lines_c ON haa_functions_haa_functions_lineshaa_functions_lines_idb = haa_functions_lines.id
            WHERE 1=1
            AND haa_functions_lines.deleted=0
            AND haa_functions_haa_functions_lines_c.haa_functions_haa_functions_lineshaa_functions_ida='".$focus->id."'";
            $result=$focus->db->query($sql);
            while($row=$focus->db->fetchByAssoc($result)){
                $line_data=json_encode($row);
                echo "<script>insertLineData(" . $line_data . ");</script>";
            }
        }

        echo "<script>insertLineFootor('lineItems');</script>";
    }*/
}