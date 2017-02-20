<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.detail.php');
require_once('modules/HAT_Counting_Tasks/populateLineCountInfo.php');

class HAT_Counting_BatchsViewDetail extends ViewDetail
{
	function display()
	{
		global $db;
		$snapshot_date;
		if($this->bean->id!=''){
			$sql="SELECT 
			hcb.snapshot_date
			FROM hat_counting_batchs hcb
			where hcb.id='".$this->bean->id."'";
			$result=$this->bean->db->query($sql);
			$row=$this->bean->db->fetchByAssoc($result);
			$snapshot_date=$row["snapshot_date"];
		}
	
		/*require_once('modules/HAT_Counting_Batchs/auto_create_task.php');

		$param=array(
			'current_framework' => '450e732f-63e9-8cb9-0b12-57ad79663c1d',
			'batch_id' => 'd9868a35-621d-6549-7774-588de8e86cb5',
			);
		$auto_create_task = new Auto_Create_Task();
		$return_msg=$auto_create_task->hat_counting($param);*/
		
		parent::display();
	/*	require_once('modules\HAA_Interfaces\iface_files\ZZM\EBS\zzmImportEmployee.php');
		$testEmployee= new zzmImportEmployee();
		$paramsArray=array(
			0 => '3abec48e-f3fa-11e6-a4f4-00163e000299',
			);
		$return_test=$testEmployee->importMain($paramsArray);

		var_dump($return_test['return_status'].'-------'.$return_test['msg_data']);*/
		
		echo '<script>
		$("#snapshot_date").val("'.$snapshot_date.'");
	</script>';

	echo '<script>
	$(function(){
		$("#list_subpanel_hat_counting_tasks").find(".list>tbody").children().each(function(){
			var tds=$(this).children();
			var url=tds.eq(2).find("a").attr("href");
			var courd=decodeURIComponent(url).split(/=/)[5];
				$.ajax({
					url:"?module=HAT_Counting_Batchs&action=getCountingResult&to_pdf=true",
					data:"&id="+courd,
					type:"POST",
					async:false,
					success:function(data){
						data=JSON.parse(data);
						tds.eq(4).html(data["total_counting"]);
						tds.eq(5).html(data["actual_counting"]);
						tds.eq(6).html(data["un_actual_counting"]);
						tds.eq(7).html(data["matched_count"]);
						tds.eq(8).html(data["different_count"]);
						tds.eq(9).html(data["overage_count"]);
						tds.eq(10).html(data["loss_count"]);
						tds.eq(11).html(data["processed_count"]);
					}
				});
		});
	});
</script>';

}
}