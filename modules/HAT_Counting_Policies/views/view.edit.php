<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.edit.php');

class HAT_Counting_PoliciesViewEdit extends ViewEdit
{
	function display()
	{
		$modules=array(
			'HAT_Counting_Policy_Lines',
			);	
		foreach($modules as $module){
			if(!is_file($GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js')){
				require_once'include/language/jsLanguage.php';
				jsLanguage::createModuleStringsCache($module,$GLOBALS['current_language']);
			}
			echo'<script type="text/javascript"src="'.$GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js?s='.$GLOBALS['js_version_key'].'&c='.$GLOBALS['sugar_config']['js_custom_version'].'&j='.$GLOBALS['sugar_config']['js_lang_version'].'"></script>';
		}
		parent::display();
		if($this->bean->split_type!='CUSTOM'){
		echo '<script>
      			$("#detailpanel_2").hide();
			</script>';
		}
		$this->displayLineItems();
	}

	function displayLineItems(){
		global $sugar_config, $locale, $app_list_strings, $mod_strings;
		$focus=$this->bean;

		$html = '';
		$html .= '<script src="modules/HAT_Counting_Policies/line_items.js"></script>';
		echo $html;
		$html .="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>";
		echo "<script>replace_display_lines(" .json_encode($html).",'line_items_span'".");</script>";
		/*echo '
		<input type="hidden" name="splittypeidden" id="splittypeidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_split_type'], '').'">';*/

		echo '<script>insertLineHeader(\'lineItems\');</script>';
		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT
			hcp.id,
			hcp.name,
			hcp.description,
			hcp.enabled_flag,
			hcp.group_clause,
			hcp.hat_counting_policies_id_c,
			hcp.seq,
			hcps.name policy_name
			FROM
			hat_counting_policy_lines hcp,
			hat_counting_policies hcps,
			hat_counting_policies_hat_counting_policy_lines_c h
			WHERE
			hcp.id = h.hat_countifea6y_lines_idb
			and hcps.id = h.hat_counti5649olicies_ida
			AND hcp.deleted = 0
			AND h.deleted = 0
			AND h.hat_counti5649olicies_ida ='".$focus->id."'";
			$result=$focus->db->query($sql);
			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				echo "<script>insertLineData(" . $line_data . ");</script>";
			}
		}

		echo "<script>insertLineFootor('lineItems');</script>";

	}

}
