<?php
function populateLineCountInfo($type,$id){
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
	AND hct.id ='".$id."'
	AND hcl.deleted = 0
	AND hct.deleted = 0";

	$result_line=$db->query($sql_line);

	while($row_line=$db->fetchByAssoc($result_line)){
		$total_counting=$total_counting+1;
		$sql_count="SELECT
		count(*) actual_counting
		FROM
		hat_counting_lines_hat_counting_results_c hcl,
		hat_counting_results hcr
		WHERE
		hcl.hat_counting_lines_hat_counting_resultshat_counting_results_idb = hcr.id
		AND hcr.deleted = 0
		AND hcl.hat_counting_lines_hat_counting_resultshat_counting_lines_ida ='".$row_line['id']."'
		and hcl.deleted = 0";
		$result_count=$db->query($sql_count);
		$row_count=$db->fetchByAssoc($result_count);
		$actual_counting=$row_count["actual_counting"];
		/*hile($row_count=$db->fetchByAssoc($result_count)){
			$actual_counting=$actual_counting+1;
		}*/

		$sql_detail="SELECT
		hcr.*
		FROM
		hat_counting_lines_hat_counting_results_c hcl,
		hat_counting_results hcr
		WHERE
		hcl.hat_counting_lines_hat_counting_resultshat_counting_results_idb = hcr.id
		AND hcr.deleted = 0
		and hcl.deleted = 0
		AND hcl.hat_counting_lines_hat_counting_resultshat_counting_lines_ida ='".$row_line['id']."'
		ORDER BY
		hcr.cycle_number desc
		LIMIT 1";
		$result_detail=$db->query($sql_detail);

		while($row_detail=$db->fetchByAssoc($result_detail)){
			if($row_detail["counting_result"]=='Matched'){
				$matched_count=$matched_count+1;
			}
			if($row_detail["counting_result"]=='Different'){
				$different_count=$different_count+1;
			}
			if($row_detail["counting_result"]=='Overage'){
				$overage_count=$overage_count+1;
			}
			if($row_detail["counting_result"]=='Loss'){
				$loss_count=$loss_count+1;
			}
			if($row_detail["adjust_status"]=='Processed'){
				$processed_count=$processed_count+1;
			}
		}

	}
		if ($type =='edit'){
				echo "<script>
			$('#total_counting').val('".$total_counting."');
			$('#actual_counting').val('".$actual_counting."');
			$('#amt_actual_counting').val('".$matched_count."');
			$('#profit_counting').val('".$overage_count."');
			$('#loss_counting').val('".$loss_count."');
			$('#diff_counting').val('".$different_count."');
			$('#actual_adjust_count').val('".$processed_count."');
			</script>";
		}else if($type == 'detail'){
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