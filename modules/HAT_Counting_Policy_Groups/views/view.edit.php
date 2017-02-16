<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.edit.php');

class HAT_Counting_Policy_GroupsViewEdit extends ViewEdit
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
		echo "<input id='task_templates_id' type='hidden' value='".$beanFramework->hat_counting_task_templates_id_c."'/>";
		echo "<input id='task_templates_name' type='hidden' value='".$beanFramework->task_templates."'/>";
		$modules=array(
			'HAT_Counting_Policies',
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
	$html .= '<script src="modules/HAT_Counting_Policy_Groups/line_items.js"></script>';
	echo $html;
	$html .="<table border='0' cellspacing='4' id='lineItems_policy' class='listviewtable'></table>";
	echo "<script>replace_display_lines(" .json_encode($html).",'line_items_span'".");</script>";
	echo '
	<input type="hidden" name="splittypeidden" id="splittypeidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_split_type'], '').'">';


	echo '<script>insertLineHeader(\'lineItems_policy\');</script>';
		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT
            hcp.id,
            hcp.name,
            hcp.data_populate_sql,
            hcp.description,
            hcp.split_type,
            hcp.enabled_flag,
            hcp.hat_counting_policy_groups_id_c,
            hcpg.name group_name,
            hcp.hat_counting_task_templates_id_c,
            hctt.name template_name,
            hcp.additional_logic
            FROM
            hat_counting_policies hcp,
            hat_counting_policy_groups hcpg,
            hat_counting_policy_groups_hat_counting_policies_c h,
            hat_counting_task_templates hctt
            WHERE
            hcp.id = h.hat_counti9da1olicies_idb
            and hcpg.id = h.hat_counti1658_groups_ida
            and hctt.id=hcp.hat_counting_task_templates_id_c
            AND hcp.deleted = 0
            AND h.deleted = 0
            AND h.hat_counti1658_groups_ida ='".$focus->id."'";
			$result=$focus->db->query($sql);
			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				echo "<script>insertLineData(" . $line_data . ");</script>";
			}
		}

		echo "<script>insertLineFootor('lineItems_policy');</script>";

	}

}
