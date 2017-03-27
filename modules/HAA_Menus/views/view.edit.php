<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.edit.php');

class HAA_MenusViewEdit extends ViewEdit
{
	function display()
	{
		global $app_list_strings;
		$modules=array(
			'HAA_Menus_Lists',
			);
		foreach($modules as $module){
			if(!is_file($GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js')){
				require_once'include/language/jsLanguage.php';
				jsLanguage::createModuleStringsCache($module,$GLOBALS['current_language']);
			}
			echo'<script type="text/javascript"src="'.$GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js?s='.$GLOBALS['js_version_key'].'&c='.$GLOBALS['sugar_config']['js_custom_version'].'&j='.$GLOBALS['sugar_config']['js_lang_version'].'"></script>';
		}
		$options="<option value=''> </option>";
		$options.=get_select_options_with_id($app_list_strings['moduleList'], '');
		echo '<input type="hidden" id="hiddenlist" value="'.$options.'"/>';
		parent::display();
		//echo '<input type="hidden" id="frameworks_id" value="'.$_SESSION["current_framework"].'"/>';
		if ($this->bean->id=="") {
			echo '<script>
			$("#navigate_display_flag").attr("checked",true);
			$("#enabled_flag").attr("checked",true);
			</script>';
		}
		$this->displayLineItems();
	}

	function displayLineItems(){
		$focus=$this->bean;
		$html='
		<script src="include/javascript/select/bootstrap-select.js"></script>
		<script src="modules/HAA_Menus/line_items.js"></script>
		<script src="modules/HAT_Assets/js/editview_icon_picker.js"></script>';
		echo $html;
		$html="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>";
		echo "<script>replace_display_lines(" .json_encode($html).",'line_items_span');
			insertLineHeader('lineItems');
			</script>";
		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			$sql="SELECT
				haa_menus_lists.id,
				haa_menus_lists.menu_id,
				haa_menus_lists.`name` menu_name,
				haa_menus_lists.sort_order,
				haa_menus_lists.field_lable_zhs,
				haa_menus_lists.field_Lable_us,
				haa_menus_lists.func_module,
				haa_menus_lists.function_id,
				haa_functions.`name` function_name,
				haa_menus_lists.display_hsize,
				haa_menus_lists.func_icon,
				haa_menus_lists.enabled_flag,
				haa_menus_lists.description
			FROM
				haa_menus_lists
			LEFT JOIN haa_menus ON haa_menus_lists.menu_id = haa_menus.id
			LEFT JOIN haa_functions ON haa_menus_lists.function_id=haa_functions.id
			WHERE
			1=1
			AND haa_menus.deleted=0
			AND haa_menus_lists.deleted=0
			AND haa_menus.id='".$focus->id."'
			ORDER BY haa_menus_lists.sort_order ASC";
			$result=$focus->db->query($sql);
			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				echo "<script>insertLineData(" . $line_data . ");</script>";
			}
		}
		echo "<script>insertLineFootor('lineItems');</script>";
	}
}