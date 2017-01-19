<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.detail.php');
//require_once('include/utils/sugar_file_utils.php');


class HAA_SSOSetsViewDetail extends ViewDetail
{

	function Display(){
		
	   $modules=array(
			'HAA_SSOSets',
			'HAA_SSO_Login_Logs',
			);
		foreach($modules as $module){
			if(!is_file($GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js')){
				require_once'include/language/jsLanguage.php';
				jsLanguage::createModuleStringsCache($module,$GLOBALS['current_language']);
			}
			echo'<script type="text/javascript"src="'.$GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js?s='.$GLOBALS['js_version_key'].'&c='.$GLOBALS['sugar_config']['js_custom_version'].'&j='.$GLOBALS['sugar_config']['js_lang_version'].'"></script>';
		}
		echo '<script type="text/javascript" src="custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>';
        parent::Display();
		//在EditlView显示之前中进行初始化数据的加载 
        /*if(isset($this->bean->haa_valuesets_id_c) && ($this->bean->haa_valuesets_id_c)!=""){
            $haa_valuesets_id_c = $this->bean->haa_valuesets_id_c;
            $bean_set = BeanFactory::getBean('HAA_ValueSets',$haa_valuesets_id_c);
            $description = $bean_set->description;
        }
        echo '<input type="hidden" id="description0" name="description" value= ';
        if (isset ($description) && $description != "") { 
            echo $description;
        }
        echo '>';*/
	}
}
