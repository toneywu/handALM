<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAA_Menu_GroupsViewEdit extends ViewEdit {

    function display(){
        require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
        if (isset($beanFramework)) {
            $bean_framework_id = $_SESSION["current_framework"];
            $bean_framework_name = $beanFramework->name;
        }
        $this->ss->assign('FRAMEWORKS_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id_c'));

        $modules=array(
            'HAA_Menu_Group_Lists',
            );
        foreach($modules as $module){
            if(!is_file($GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js')){
                require_once'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module,$GLOBALS['current_language']);
            }
            echo'<script type="text/javascript"src="'.$GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js?s='.$GLOBALS['js_version_key'].'&c='.$GLOBALS['sugar_config']['js_custom_version'].'&j='.$GLOBALS['sugar_config']['js_lang_version'].'"></script>';
        }
        parent::display();
        $this->displayLineItems();
        
    }

    function displayLineItems(){
        $focus=$this->bean;
        $html='<script src="modules/HAA_Menu_Groups/js/line_items.js"></script>';
        echo $html;
        $html.='<table border="0" id="lineItems_menus" class="listviewtab" width="100%"></table>';
        echo '<script>replace_display_lines('.json_encode($html).',"line_items_span");</script>';
        echo '<script>insertLineHeader("lineItems_menus");</script>';
        if ($focus->id) {
            $sql="SELECT
                haa_menu_group_lists.id,
                haa_menu_group_lists.haa_menu_groups_id_c,
                haa_menu_groups. NAME menu_group_name,
                haa_menu_group_lists.haa_menus_id_c,
                haa_menus. NAME menu_name,
                haa_menu_group_lists.sort_order,
                haa_menu_group_lists.enabled_flag,
                haa_menu_group_lists.description
            FROM
                haa_menu_group_lists
            LEFT JOIN haa_menu_groups ON haa_menu_groups.id = haa_menu_group_lists.haa_menu_groups_id_c
            LEFT JOIN haa_menus ON haa_menu_group_lists.haa_menus_id_c=haa_menus.id
            WHERE
                haa_menu_groups.deleted = 0
            AND haa_menu_group_lists.deleted = 0
            AND haa_menu_groups.id='".$focus->id."'";
            $result=$focus->db->query($sql);
            while ($row=$focus->db->fetchByAssoc($result)) {
                $line_data=json_encode($row);
                echo '<script>insertLineData('.$line_data.')</script>';
            }
        }
        echo '<script>insertLineFooter("lineItems_menus")</script>';
    }
}
?>
