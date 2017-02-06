<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.detail.php');

class HAA_ListViewsViewDetail extends ViewDetail
{

	function Display(){
		
		$modules=array(
			'HAA_ListViews',
			'HAA_ListView_Columns',
			);
		foreach($modules as $module){
			if(!is_file($GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js')){
				require_once'include/language/jsLanguage.php';
				jsLanguage::createModuleStringsCache($module,$GLOBALS['current_language']);
			}
			echo'<script type="text/javascript"src="'.$GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js?s='.$GLOBALS['js_version_key'].'&c='.$GLOBALS['sugar_config']['js_custom_version'].'&j='.$GLOBALS['sugar_config']['js_lang_version'].'"></script>';
		}

        //获取行的column_name下拉框的初始化
		$t_name=$this->bean->data_source_view_name;
	    //$record=$this->bean->id;
		global $db;
		$sql = "SELECT c.COLUMN_NAME c_name
		FROM information_schema.COLUMNS c
		WHERE c.TABLE_NAME = '".$t_name."'";
		$result=$db->query($sql);
		$c_list="<option value=''> </option>";
		while($row=$db->fetchByAssoc($result)){
			if ($row['c_name'] != '') {
				$c_list .= " <option value='".$row['c_name']."'>".$row['c_name']."</option> ";
			}
		}

		echo '<input type="hidden" name="linecolumnhidden" id="linecolumnhidden" value="'.$c_list.'">';

		parent::Display();
		echo '<script type="text/javascript"src="modules/HAA_ListViews/js/HAA_ListViews_detailview.js"></script>';
		
	}
}
