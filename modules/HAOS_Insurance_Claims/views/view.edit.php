<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.edit.php');

class HAOS_Insurance_ClaimsViewEdit extends ViewEdit
{
	function display()
	{
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
        if(isset($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c)!=""){
	     	$haa_codes_id_c = $this->bean->haa_codes_id_c;
	     	$bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id_c);
	     	$ff_id = $bean_business_type->haa_ff_id;
	   }
        $modules=array(
			'HAOS_Insurance_Claims_Lines',
			);
		foreach($modules as $module){
			if(!is_file($GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js')){
				require_once'include/language/jsLanguage.php';
				jsLanguage::createModuleStringsCache($module,$GLOBALS['current_language']);
			}
			echo'<script type="text/javascript"src="'.$GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js?s='.$GLOBALS['js_version_key'].'&c='.$GLOBALS['sugar_config']['js_custom_version'].'&j='.$GLOBALS['sugar_config']['js_lang_version'].'"></script>';
		}
		echo "<script type='text/javascript' src='custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'></script>";
		$event_id=$this->bean->hat_eventmaneger_id_c;
		$event=BeanFactory::getBean('HAT_EventManeger', $event_id);
		$this->bean->relate_event_number=$event->event_number;
		$this->bean->time=$event->event_date;
		$this->bean->location=$event->event_location;
		$this->bean->comment=$event->name;
		parent::display();
		$ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden '.(isset($ff_id)?'value='.$ff_id:'').'>';
	   	echo '<script>if($("#haa_ff_id").length==0) {  $("#EditView").append("'.$ff_id_field.'");}</script>';
	}
}