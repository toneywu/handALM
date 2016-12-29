<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.Edit.php');
require_once('modules/HAT_Counting_Tasks/populateLineCountInfo.php');
class HAT_Counting_TasksViewEdit extends ViewEdit
{
	/*function HAT_Counting_TasksViewEdit(){
		parent::ViewEdit();
	}*/
	
	function display()
	{	
		$this->populateBatchInfo();
		
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
		parent::display();
		populateLineCountInfo("edit",$this->bean->id);
			echo "<script>
			$('#task_number').val('".$this->bean->task_number."');
			$('#planed_start_date').val('".$this->bean->planed_start_date."');
			$('#planed_complete_date').val('".$this->bean->planed_complete_date."');
			$('#snapshot_date').val('".$this->bean->snapshot_date."');
			</script>";

	echo '<input  id="location_attr" value="" type="hidden">';
	echo '<input  id="oranization_attr"  type="hidden" value="">';
	echo '<input  id="major_attr"  type="hidden" value="">';
	echo '<input  id="category_attr"  type="hidden" value="">';

}

function populateBatchInfo(){

	if($_REQUEST['hat_counting_batchs_id']){
		$bean_request=BeanFactory::getBean("HAT_Counting_Batchs",$_REQUEST['hat_counting_batchs_id']);

		$this->bean->name=$bean_request->name ;
		$this->bean->hat_counting_batchs_id_c=$bean_request->id ;
		$this->bean->counting_batch_name=$bean_request->name ;
		$this->bean->task_number=$bean_request->batch_number ;
		$this->bean->planed_start_date=$bean_request->planed_start_date ;
		$this->bean->planed_complete_date=$bean_request->planed_complete_date ;
		$this->bean->snapshot_date=$bean_request->snapshot_date ;
		$this->bean->objects_type=$bean_request->objects_type ;
		$this->bean->counting_by_location=$bean_request->counting_by_location ;
		$this->bean->counting_mode=$bean_request->counting_mode ;
		$this->bean->counting_scene=$bean_request->counting_scene ;
	}
}

}