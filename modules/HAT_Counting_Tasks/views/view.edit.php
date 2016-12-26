<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.Edit.php');

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
		$this->populateLineCountInfo();
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

function populateLineCountInfo(){
	global $db;
	$total_counting=0;$actual_counting=0;$matched_count=0;
	$overage_count=0;$processed_count=0;$different_count=0;
	$loss_count=0;

	$sql_line="SELECT
	hcl.*
	FROM
	hat_counting_tasks hct,
	hat_counting_lines hcl
	WHERE
	hct.id = hcl.hat_counting_tasks_id_c
	AND hct.id ='".$this->bean->id."'
	AND hcl.deleted = 0
	AND hct.deleted = 0";

	$result_line=$db->query($sql_line);

	while($row_line=$db->fetchByAssoc($result_line)){
		$total_counting=$total_counting+1;
		$sql_detail="SELECT
		hcr.*
		FROM
		hat_counting_lines_hat_counting_results_c hcl,
		hat_counting_results hcr
		WHERE
		hcl.hat_counting_lines_hat_counting_resultshat_counting_results_idb = hcr.id
		AND hcr.deleted = 0
		AND hcl.hat_counting_lines_hat_counting_resultshat_counting_lines_ida ='".$row_line['id']."'
		ORDER BY
		hcr.cycle_number desc
		LIMIT 1";
		$result_detail=$db->query($sql_detail);

		while($row_detail=$db->fetchByAssoc($result_detail)){
			$actual_counting=$actual_counting+1;
			if($row_detail["counting_result"]='Matched'){
				$matched_count=$matched_count+1;
			}
			if($row_detail["counting_result"]='Different'){
				$different_count=$different_count+1;
			}
			if($row_detail["counting_result"]='Overage'){
				$overage_count=$overage_count+1;
			}
			if($row_detail["counting_result"]='Loss'){
				$loss_count=$loss_count+1;
			}
			if($row_detail["adjust_status"]='Processed'){
				$processed_count=$processed_count+1;
			}
		}
	}
	//var_dump($total_counting);
	echo "<script>
			$('#total_counting').html('".$total_counting."');
			$('#actual_counting').html('".$actual_counting."');
			$('#amt_actual_counting').html('".$matched_count."');
			$('#profit_counting').html('".$overage_count."');
			$('#loss_counting').html('".$loss_count."');
			$('#diff_counting').html('".$different_count."');
			$('#actual_adjust_count').html('".$processed_count."');
			</script>";

	}

}