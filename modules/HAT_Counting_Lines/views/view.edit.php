<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.Edit.php');

class HAT_Counting_LinesViewEdit extends ViewEdit
{
	function display()
	{	
		if($_REQUEST['hat_counting_tasks_id']){
			$bean_request=BeanFactory::getBean("HAT_Counting_Tasks",$_REQUEST['hat_counting_tasks_id']);
			$this->bean->counting_task=$bean_request->name ;
			$this->bean->hat_counting_tasks_id_c=$bean_request->id ;
			$this->bean->counting_person=$bean_request->counting_person ;
		}
		require_once('modules/HAA_Frameworks/orgSelector_class.php');
		$current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
		$current_module = $this->module;
		$current_action = $this->action;
		$beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
		/*if (isset($beanFramework)) {
			//$bean_framework_id = $_SESSION["current_framework"];
			$bean_framework_name = $beanFramework->name;
		}*/
		echo "<input id='line_framework' type='hidden' value='".$beanFramework->name."'/>";

		   $modules=array(
			'HAT_Counting_Results',
			'Documents',
			);	
		foreach($modules as $module){
			if(!is_file($GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js')){
				require_once'include/language/jsLanguage.php';
				jsLanguage::createModuleStringsCache($module,$GLOBALS['current_language']);
			}
			echo'<script type="text/javascript"src="'.$GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js?s='.$GLOBALS['js_version_key'].'&c='.$GLOBALS['sugar_config']['js_custom_version'].'&j='.$GLOBALS['sugar_config']['js_lang_version'].'"></script>';
		}
		parent::display();

		echo '<script>
		$(function(){
			$("#EditView").attr("enctype","multipart/form-data");
			$("#asset_desc").val("'.$this->bean->asset_desc.'");
			$("#asset_location").val("'.$this->bean->asset_location.'");
			$("#hat_asset_locations_id_c").val("'.$this->bean->hat_asset_locations_id_c.'");
			$("#oranization").val("'.$this->bean->oranization.'");
			$("#account_id_c").val("'.$this->bean->account_id_c.'");
			$("#asset_major").val("'.$this->bean->asset_major.'");
			$("#haa_codes_id_c").val("'.$this->bean->haa_codes_id_c.'");
			$("#asset_status_d").val("'.$this->bean->asset_status.'");
			$("#asset_status").val("'.$this->bean->asset_status.'");
		})
		</script>';
		
	}
}