<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.edit.php');

class HAA_ListViewsViewEdit extends ViewEdit
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
      	require_once('modules/HAA_ListViews/set_list.php');
        
        //var_dump($list);
        echo '<script>$("#data_source_view_name").replaceWith("'.$list.'");</script>';
	}
}
