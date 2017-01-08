<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');


class HAT_Counting_LinesViewDetail extends ViewDetail  {
	
function display()
	{	
		
		if($this->bean->hat_counting_tasks_id_c){
			$bean_task=BeanFactory::getBean("HAT_Counting_Tasks",$this->bean->hat_counting_tasks_id_c);
			$this->bean->counting_person=$bean_task->counting_person ;
		}
		require_once('modules/HAA_Frameworks/orgSelector_class.php');
		$current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
		$current_module = $this->module;
		$current_action = $this->action;
		$beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);

		echo "<input id='line_framework' type='hidden' value='".$beanFramework->name."'/>";
		parent::display();
		
		echo '<script>
				$("#counting_person").val("'.$this->bean->counting_person.'");
				</script>';

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
		})
		</script>';
	echo '<input  id="loc_attr" value="" type="hidden">';
	echo '<input  id="org_attr"  type="hidden" value="">';
	echo '<input  id="major_attr"  type="hidden" value="">';
	echo '<input  id="category_attr"  type="hidden" value="">';
	echo '<input  id="user_attr" value="" type="hidden">';
	echo '<input  id="own_attr"  type="hidden" value="">';
		
	}



}
?>
