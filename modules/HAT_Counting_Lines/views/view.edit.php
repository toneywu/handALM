<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.Edit.php');

class HAT_Counting_LinesViewEdit extends ViewEdit
{
	function display()
	{	
		echo '<input  id="loc_attr" value="" type="hidden">';
		echo '<input  id="org_attr"  type="hidden" value="">';
		echo '<input  id="major_attr"  type="hidden" value="">';
		echo '<input  id="category_attr"  type="hidden" value="">';
		echo '<input  id="user_attr" value="" type="hidden">';
		echo '<input  id="own_attr"  type="hidden" value="">';
		echo '<input  id="task_template_attr"  type="hidden" value="">';
		if($_REQUEST['hat_counting_tasks_id']){
			$bean_request=BeanFactory::getBean("HAT_Counting_Tasks",$_REQUEST['hat_counting_tasks_id']);
			$this->bean->counting_task=$bean_request->name ;
			$this->bean->hat_counting_tasks_id_c=$bean_request->id ;
			$this->bean->counting_person=$bean_request->counting_person ;
			
		}
		if($this->bean->hat_counting_tasks_id_c){
			$this->getTaskinfo($this->bean->hat_counting_tasks_id_c);
			$bean_task=BeanFactory::getBean("HAT_Counting_Tasks",$this->bean->hat_counting_tasks_id_c);
			$this->bean->counting_person=$bean_task->counting_person ;
			echo "<script>
				$('#task_template_attr').val('".$bean_task->hat_counting_task_templates_id_c."');
				</script>";
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
		$("#counting_person").val("'.$this->bean->counting_person.'");
	</script>';
	$this->displayLineItems();
	$this->displayLineItems_doc();
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
		$("#user_person").val("'.$this->bean->user_person.'");
		$("#user_contacts_id_c").val("'.$this->bean->user_contacts_id_c.'");
		$("#own_person").val("'.$this->bean->own_person.'");
		$("#own_contacts_id_c").val("'.$this->bean->own_contacts_id_c.'");
		$("#fixed_asset").val("'.$this->bean->fixed_asset.'");
		$("#fixed_asset_id").val("'.$this->bean->fixed_asset_id.'");
	})
</script>';



}

function displayLineItems(){
	global $sugar_config, $locale, $app_list_strings, $mod_strings;
	$focus=$this->bean;

	$html = '';
	$html .= '<script src="modules/HAT_Counting_Lines/line_items.js"></script>';
	echo $html;
	$html .="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>";
	echo "<script>replace_display_lines(" .json_encode($html).",'line_items_span'".");</script>";
	echo '
	<input type="hidden" name="resactastidden" id="resactastidden" value="'.get_select_options_with_id($app_list_strings['hat_asset_status_list'], '').'"> 
	<input type="hidden" name="rescountresidden" id="rescountresidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_line_result_list'], '').'">
	<input type="hidden" name="resadjmetidden" id="resadjmetidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_adjust_method_list'], '').'">;
	<input type="hidden" name="resadjstaidden" id="resadjstaidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_adjust_status_list'], '').'">';


	echo '<script>insertLineHeader(\'lineItems\');</script>';
		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT
			hcr.account_id_c,
			a.`name` account_name,
			hcr.actual_asset_status,
			hcr.actual_quantity,
			hcr.hat_asset_locations_id_c,
			hal.`name` location_name,
			hcr.qty_diff_flag,
			hcr.loct_diff_flag,
			hcr.org_diff_flag,
			hcr.status_diff_flag,
			hcr.counting_result,
			hcr.adjust_method,
			hcr.adjust_needed,
			hcr.adjust_status,
			hcr.id,
			hcr.cycle_number,
			hcr.haa_codes_id_c,
			hc.`name` code_name,
			hcr.major_diff_flag,
			cc1.chinese_name_c user_name,
			hcr.user_contacts_id_c,
			cc2.chinese_name_c own_name,
			hcr.own_contacts_id_c,
			hcr.user_diff_flag,
			hcr.own_diff_flag
			FROM
			hat_counting_lines_hat_counting_results_c hcl,
			hat_counting_results hcr
			LEFT JOIN hat_asset_locations hal ON hal.id = hcr.hat_asset_locations_id_c
			LEFT JOIN accounts a ON hcr.account_id_c = a.id
			LEFT JOIN haa_codes hc ON hc.id = hcr.haa_codes_id_c
			LEFT JOIN contacts c1 ON c1.id = hcr.user_contacts_id_c
			LEFT JOIN contacts_cstm cc1 ON cc1.id_c = c1.id
			LEFT JOIN contacts c2 ON c2.id = hcr.own_contacts_id_c
			LEFT JOIN contacts_cstm cc2 ON cc2.id_c = c2.id
			WHERE
			hcr.id = hcl.hat_counting_lines_hat_counting_resultshat_counting_results_idb
			AND hcr.deleted = 0
			AND hcl.deleted = 0
			and hcl.hat_counting_lines_hat_counting_resultshat_counting_lines_ida ='".$focus->id."'";
			$result=$focus->db->query($sql);
			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				echo "<script>insertLineData(" . $line_data . ");</script>";
			}
		}

		echo "<script>insertLineFootor('lineItems');</script>";

	}

	function displayLineItems_doc(){
		global $sugar_config, $locale, $app_list_strings, $mod_strings;
		$focus=$this->bean;
		echo '<script type="text/javascript" src="custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>';
		echo '<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">';
		$html = '';
		$html .= '<script src="modules/HAT_Counting_Lines/line_doc_items.js"></script>';
		echo $html;
		$html .="<table border='0' cellspacing='4' width='100%' id='linedocItems' class='listviewtable' style='table-layout: fixed;'></table>";
		echo "<script>replace_display_lines_doc(" .json_encode($html).",'line_doc_items_span'".");</script>";
		echo '
		<input type="hidden"name="documentstatus"id="documentstatus"value="'.get_select_options_with_id($app_list_strings['document_status_dom'],'').'">
		<input type="hidden"name="documentcategory"id="documentcategory"value="'.get_select_options_with_id($app_list_strings['document_category_dom'],'').'">';
		
		echo '<script>doc_insertLineHeader(\'linedocItems\');</script>';
		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT
			doc.id,
			hid.hat_counting_lines_documentshat_counting_lines_ida hat_counting_lines_id,
			doc.document_name,
			dr.filename file_name,
			doc.category_id,
			doc.status_id,
			doc.active_date,
			dr.revision,
			doc.description
			FROM
			documents doc,
			hat_counting_lines_documents_c hid,
			document_revisions dr
			WHERE
			doc.id = hid.hat_counting_lines_documentsdocuments_idb
			AND doc.deleted = 0
			AND hid.deleted = 0
			AND doc.document_revision_id = dr.id
			AND hid.hat_counting_lines_documentshat_counting_lines_ida='".$focus->id."'";
			$result=$focus->db->query($sql);
			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				echo "<script>doc_insertLineData(" . $line_data . ");</script>";
			}
		}

		echo "<script>doc_insertLineFootor('linedocItems');</script>";

	}

	function getTaskinfo($id){
		$focus=$this->bean;
		$sql = "SELECT
		t.account_id_c,
		t.aos_product_categories_id_c,
		t.hat_asset_locations_id_c,
		t.haa_codes_id_c,
		t.user_contacts_id_c,
		t.own_contacts_id_c,
		t.hat_counting_task_templates_id_c
		FROM
		hat_counting_tasks t
		WHERE
		t.id ='".$id."'";
		$result=$focus->db->query($sql);
		$row=$focus->db->fetchByAssoc($result);
		echo '<script>
	$(function(){
		$("#loc_attr").val("'.$row["hat_asset_locations_id_c"].'");
		$("#org_attr").val("'.$row["account_id_c"].'");
		$("#major_attr").val("'.$row["haa_codes_id_c"].'");
		$("#category_attr").val("'.$row["aos_product_categories_id_c"].'");
		$("#user_attr").val("'.$row["user_contacts_id_c"].'");
		$("#own_attr").val("'.$row["own_contacts_id_c"].'");
		$("#task_template_attr").val("'.$row["hat_counting_task_templates_id_c"].'");
	})
</script>';
		
	}

}