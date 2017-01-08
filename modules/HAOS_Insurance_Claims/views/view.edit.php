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
		$event_id=$this->bean->hat_incidents_id_c;
		$event=BeanFactory::getBean('HAT_Incidents', $event_id);
		$this->bean->relate_event_number=$event->event_number;
		//$this->bean->time=$event->event_date;
		//$this->bean->location=$event->event_location;
		//$this->bean->comment=$event->name;
		parent::display();
		if(isset($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c)!=""){
			$haa_codes_id_c = $this->bean->haa_codes_id_c;
			$bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id_c);
			$ff_id = $bean_business_type->haa_ff_id;
		}
		$ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden '.(isset($ff_id)?'value='.$ff_id:'').'>';
		echo '<script>if($("#haa_ff_id").length==0) {  $("#EditView").append("'.$ff_id_field.'");}</script>';
	   			//*********************处理FF界面 END********************
		//Add by zengchen 20161216
		echo '<input id="line_parent_id" type="hidden" value="">';
		echo '<input id="line_parent_type" type="hidden" value="">';
		//End add 20161216
		$this->displayLineItems();
	}

	function displayLineItems(){
		$focus=$this->bean;

		$html = '';
		$html.='<script src="modules/HAOS_Insurance_Claims/line_items.js"></script>';
		echo $html;
		$html.="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>";
		echo "<script>replace_display_lines(" .json_encode($html).",'line_items_span'".");</script>";
		echo '<script>insertLineHeader(\'lineItems\');</script>';
		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			$sql="SELECT
			hicl.id,
			hi.name relate_insurance_number,
			hc.name insurance_type,
			hi.parent_type,
			hi.parent_id,
			hicl.haos_insurances_id_c, 
			hicl.claim_amount,
			hicl.other_side_amount,
			hicl.gap_amount,
			hicl.actual_amount,
			hicl.other_side_act_amt,
			hicl.document_ready_flag,
			hicl.document_deliver_date,
			hicl.premium_payment_date,
			hicl.gap_payment_date,
			hicl.accident_experience,
			hicl.additional_comments   
			FROM
			haos_insurance_claims_haos_insurance_claims_lines_c hhc,
			haos_insurance_claims_lines hicl,
			haos_insurances hi,
			haa_codes hc
			WHERE hicl.deleted=0
			AND hicl.haos_insurances_id_c=hi.id
			AND hhc.haos_insurf06es_lines_idb = hicl.id
			AND hi.haa_codes_id_c=hc.id
			AND hhc.haos_insurefcc_claims_ida='".$focus->id."'";//Add by zengchen 增加对象字段 parent_name parent_id 20161216
			$result=$focus->db->query($sql);
			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				echo "<script>insertLineData(" . $line_data . ");</script>";
			}
		}

		echo "<script>insertLineFootor('lineItems');</script>";

	}
}