<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.detail.php');

class HAM_WOViewDetail extends ViewDetail {

	function Display() {

		parent :: Display(); 
		//ff 在DetailView显示之前中进行初始化数据的加载 
		if (isset ($this->bean->hat_event_type_id) && ($this->bean->hat_event_type_id) != "") {
			$event_type_id = $this->bean->hat_event_type_id;
			$bean_code = BeanFactory :: getBean('HAT_EventType', $event_type_id);
			$ff_id = $bean_code->haa_ff_id;

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAA_FF/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
				echo '<script> function call_ff() {
								    triger_setFF($("#haa_ff_id").val(),"HAM_WO","DetailView");
								    $(".expandLink").click();
								}</script>';
				echo '<script>call_ff()</script>';
			}
		}

	}

	

}