<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.edit.php');

class HAA_ValueSetsViewEdit extends ViewEdit
{

	function Display(){
		require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
        if (isset($beanFramework)) {
            $bean_framework_id = $_SESSION["current_framework"];
            $bean_framework_name = $beanFramework->name;
        }
        $this->ss->assign('FRAMEWORK_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id_c'));
        //*********************处理FF界面 START********************
	   $modules=array(
			'HAA_ValueSets',
			'HAA_Values',
			);
		foreach($modules as $module){
			if(!is_file($GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js')){
				require_once'include/language/jsLanguage.php';
				jsLanguage::createModuleStringsCache($module,$GLOBALS['current_language']);
			}
			echo'<script type="text/javascript"src="'.$GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js?s='.$GLOBALS['js_version_key'].'&c='.$GLOBALS['sugar_config']['js_custom_version'].'&j='.$GLOBALS['sugar_config']['js_lang_version'].'"></script>';
		}
        parent::Display();
        //在EditlView显示之前中进行初始化数据的加载 
        if(isset($this->bean->haa_valuesets_id_c) && ($this->bean->haa_valuesets_id_c)!=""){
            $haa_valuesets_id_c = $this->bean->haa_valuesets_id_c;
            $bean_set = BeanFactory::getBean('HAA_ValueSets',$haa_valuesets_id_c);
            $description = $bean_set->description;
        }
        echo '<input type="hidden" id="description0" name="description" value= ';
        if (isset ($description) && $description != "") {
            
            echo $description;
            
        }
        echo '>';

	}
}
