<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAT_Linear_ElementsViewEdit extends ViewEdit
{

	function Display() {
        /*require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
        if (isset($beanFramework)) {
            $bean_framework_id = $_SESSION["current_framework"];
            $bean_framework_name = $beanFramework->name;
        }*/
        /*$this->ss->assign('PARENT_ASSET',$_GET['asset_id']);*/

        parent::Display();
        if(isset($_GET['asset_id'])&&$_GET['asset_id']!=''){
            $beanAsset = BeanFactory::getBean('HAT_Assets', $_GET['asset_id']);
            echo '<script> 
            $("#parent_asset").val("'.$beanAsset->name.'"); 
            $("#parent_asset_id").val("'.$_GET['asset_id'].'");
            </script>';
            echo '<script>  rewriteSave(); </script>';
        }
    }

}//end class
