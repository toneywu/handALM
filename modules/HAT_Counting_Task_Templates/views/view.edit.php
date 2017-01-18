<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.edit.php');

class HAT_Counting_Task_TemplatesViewEdit extends ViewEdit
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
		
		$modules=array(
			'HAT_Counting_Template_Details',
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
	global $sugar_config, $locale, $app_list_strings, $mod_strings;
	$focus=$this->bean;
	$html = '';
	$html .= '<script src="modules/HAT_Counting_Task_Templates/line_items.js"></script>';
	echo $html;
	$html .="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>";
	echo "<script>replace_display_lines(" .json_encode($html).",'line_items_span'".");</script>";
	echo '
	<input type="hidden" name="tablenamedden" id="tablenamedden" value="'.get_select_options_with_id($app_list_strings['hat_counting_table_name'], '').'">
	<input type="hidden" name="columnnamedden" id="columnnamedden" value="'.get_select_options_with_id($app_list_strings['hat_counting_column_name'], '').'">
	<input type="hidden" name="fieldtypedden" id="fieldtypedden" value="'.get_select_options_with_id($app_list_strings['hat_counting_field_type'], '').'">
	<input type="hidden" name="listtypedden" id="listtypedden" value="'.get_select_options_with_id($app_list_strings['moduleList'], '').'">';


	echo '<script>insertLineHeader(\'lineItems\');</script>';
		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT
            hctd.id,
            hctd.hat_counting_task_templates_id_c,
            hctt.`name` template_name,
            hctd.sort_order,
            hctd.field_lable,
            hctd.table_name,
            hctd.column_name,
            hctd.field_type,
            hctd.relate_module,
            hctd.module_filter,
            hctd.list_name,
            hctd.required_flag,
            hctd.can_edit_flag,
            hctd.lookup_type,
            hctd.enabled_flag,
            hctd.description
            FROM
            hat_counting_task_templates_hat_counting_template_details_c h,
            hat_counting_template_details hctd,
            hat_counting_task_templates hctt
            WHERE
            1 = 1
            AND hctd.id = h.hat_countib27cdetails_idb
            AND hctt.id = h.hat_countid917mplates_ida
            AND hctt.deleted = 0
            AND hctd.deleted = 0
            AND h.deleted = 0
            AND hctt.id ='".$focus->id."'";
			$result=$focus->db->query($sql);
			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				echo "<script>insertLineData(" . $line_data . ");</script>";
			}
		}

		echo "<script>insertLineFootor('lineItems');</script>";

	}

}
