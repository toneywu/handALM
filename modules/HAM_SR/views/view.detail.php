<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.detail.php');

class HAM_SRViewDetail extends ViewDetail {

	function Display() {

		/*    if (isset($this->bean->ham_wo_name) &&$this->bean->ham_wo_name!="") {
		        //$this->ss->assign('HAM_WO_NAME', $this->bean->$ham_wo_name);
		    }*/
		if (isset ($this->bean->ham_wo_number) && $this->bean->ham_wo_number != "") { //将工作单号与说明合成到一个字段中显示
			$this->bean->ham_wo_name = "[" . $this->bean->ham_wo_number . "] " . $this->bean->ham_wo_name;
		} else {
			// if (is_null($this->bean->ham_wo_number) || $this->bean->ham_wo_name=="") {
			$this->bean->ham_wo_name = translate('LBL_SR_NOT_ASSIGED_TO_WO', 'HAM_SR');
			//}
		}
		

		parent :: Display();
		//ff 在DetailView显示之前中进行初始化数据的加载 
		if (isset ($this->bean->hat_event_type_id) && ($this->bean->hat_event_type_id) != "") {
			$event_type_id = $this->bean->hat_event_type_id;
			$bean_code = BeanFactory :: getBean('HAT_EventType', $event_type_id);
			$ff_id = $bean_code->haa_ff_id;

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAM_SR/js/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
				echo '<script> function call_ff() {
				    triger_setFF($("#haa_ff_id").val(),"HAM_SR","DetailView");
				    $("a.collapsed").click();

				}</script>';
				echo '<script>call_ff()</script>';
			}
		}
	}
}