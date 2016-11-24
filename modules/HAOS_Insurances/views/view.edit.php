<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.edit.php');

class HAOS_InsurancesViewEdit extends ViewEdit
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
	    if(isset($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c)!=""){
	     	$haa_codes_id_c = $this->bean->haa_codes_id_c;
	     	$bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id_c);
	     	$ff_id = $bean_business_type->haa_ff_id;
	   }
	   $modules=array(
			'Documents',
			'HAOS_Insurances',
			);
		foreach($modules as $module){
			if(!is_file($GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js')){
				require_once'include/language/jsLanguage.php';
				jsLanguage::createModuleStringsCache($module,$GLOBALS['current_language']);
			}
			echo'<script type="text/javascript"src="'.$GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js?s='.$GLOBALS['js_version_key'].'&c='.$GLOBALS['sugar_config']['js_custom_version'].'&j='.$GLOBALS['sugar_config']['js_lang_version'].'"></script>';
		}
        parent::Display();
        $ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden '.(isset($ff_id)?'value='.$ff_id:'').'>';
	   	echo '<script>if($("#haa_ff_id").length==0) {  $("#EditView").append("'.$ff_id_field.'");}</script>';
	   	if(isset($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c)!=""){
	    	echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
	   	} else {
	    	echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
	   	}
		
		echo '<script>$("#EditView").attr("enctype","multipart/form-data");</script>';
	}
}
