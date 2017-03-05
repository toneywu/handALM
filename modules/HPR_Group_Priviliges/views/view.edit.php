<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.edit.php');

class HPR_Group_PriviligesViewEdit extends ViewEdit
{
	function display(){
		global $app_list_strings;
		$modules=array(
			'HPR_Group_PopupModules',
			'HPR_Group_Columns',
			);
		foreach($modules as $module){
			if(!is_file($GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js')){
				require_once'include/language/jsLanguage.php';
				jsLanguage::createModuleStringsCache($module,$GLOBALS['current_language']);
			}
			echo'<script type="text/javascript"src="'.$GLOBALS['sugar_config']['cache_dir'].'jsLanguage/'.$module.'/'.$GLOBALS['current_language'].'.js?s='.$GLOBALS['js_version_key'].'&c='.$GLOBALS['sugar_config']['js_custom_version'].'&j='.$GLOBALS['sugar_config']['js_lang_version'].'"></script>';
		}//获取行的语言文件
		parent::display();
		echo '<input type="hidden" id="vathidden" value="'.get_select_options_with_id($app_list_strings['moduleList'], '').'">
			<input type="hidden" id="logichidden" value="'.get_select_options_with_id($app_list_strings['hpr_group_logic_list'], '').'" />';

		/*if(isset($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c)!=""){
			$haa_codes_id_c = $this->bean->haa_codes_id_c;
			$bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id_c);
			$ff_id = $bean_business_type->haa_ff_id;
		}
		$ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden '.(isset($ff_id)?'value='.$ff_id:'').'>';
		echo '<script>if($("#haa_ff_id").length==0) {  $("#EditView").append("'.$ff_id_field.'");}</script>';*/
	   			//*********************处理FF界面 END********************
		$this->displayLineItems();
		$this->displayLineItems_c();
		echo '<script>document.getElementById("privilige_module").addEventListener("change", showModuleFields, false);</script>';
	}

	function displayLineItems(){
		$focus=$this->bean;
		$html = '';
		$html.='<script src="modules/HPR_Group_PopupModules/js/Line_Items.js"></script>';
		echo $html;
		$html.="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>";
		echo "<script>replace_display_lines(" .json_encode($html).",'line_items_span'".");</script>";
		echo '<script>insertLineHeader(\'lineItems\');</script>';
		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			$sql="
				SELECT
				hgl.id,
				hgl.logic_type,
				hgl.popupmodule,
				hgl.additional_clause
			FROM
				hpr_group_priviliges hgp,
				hpr_group_popupmodules hgl,
				hpr_group_priviliges_hpr_group_popupmodules_c hgc
			WHERE hgp.deleted = 0
			AND hgl.deleted = 0
			and hgc.deleted=0
			AND hgl.id = hgc.hpr_group_bc9bmodules_idb
			AND hgp.id = hgc.hpr_group_dcbfviliges_ida
			AND hgc.hpr_group_dcbfviliges_ida='".$focus->id."'";
			$result=$focus->db->query($sql);
			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				echo "<script>insertLineData(" . $line_data . ");</script>";
			}
		}
		echo "<script>insertLineFootor('lineItems');</script>";
	}

	function displayLineItems_c(){
		$focus=$this->bean;
		$html = '';
		$html.='<script src="modules/HPR_Group_Columns/js/line_items1.js"></script>';
		echo $html;
		$html.="<table border='0' cellspacing='4' width='100%' id='lineItems2' class='listviewtable' style='table-layout: fixed;'></table>";
		echo "<script>replace_display_lines_c(" .json_encode($html).",'line_items_span2'".");</script>";
		echo '<script>insertLineHeader_c(\'lineItems2\');</script>';
		if(isset($focus->id)&&$focus->id != ''){
            //
            	echo "<script>showModuleFields();</script>";
		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			$sql="
				SELECT
            hgc.id line_id,
            hgg.hpr_group_columns_hpr_group_priviligeshpr_group_priviliges_ida header_id,
            hgc.sort_number,
            hgc.hpr_column_name,
            hgc.edit_enable_flag,
            hgc.hide_enable_flag,
            hgc.description
            FROM
            hpr_group_priviliges hgp,
            hpr_group_columns_hpr_group_priviliges_c hgg,
            hpr_group_columns hgc
            WHERE
            1 = 1
            AND hgp.id = hgg.hpr_group_columns_hpr_group_priviligeshpr_group_priviliges_ida
            and hgc.id=hgg.hpr_group_columns_hpr_group_priviligeshpr_group_columns_idb
            and hgg.deleted=0
            AND hgc.deleted = 0
            AND hgp.deleted = 0
            and hgp.id ='".$focus->id."'"."order by hgc.sort_number";
			$result=$focus->db->query($sql);
			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				echo "<script>insertLineData_c(" . $line_data . ");</script>";
			}
		}
		echo "<script>insertLineFootor_c('lineItems2');</script>";
		echo "<script>document.getElementById('btnaddNewLine_c').disabled = '';</script>";
	}else{
		echo "<script>insertLineFootor_c('lineItems2');</script>";
		echo "<script>document.getElementById('btnaddNewLine_c').disabled = 'disabled';</script>"; 
	}

            
}
}