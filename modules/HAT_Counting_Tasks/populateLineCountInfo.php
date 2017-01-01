<?php


class CountInfo 
{
	function populateLineCountInfo($id){
		global $db;
		$cycle_number;
		$count = array(
			'total_counting'=>0,
			'actual_counting'=>0,
			'un_actual_counting'=>0,
			'matched_count' =>0,
			'overage_count' =>0,
			'processed_count' =>0,
			'different_count' =>0,
			'loss_count' =>0,
			);
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
			$count['total_counting']=$count['total_counting']+1;
			$sql="SELECT
			hcr.cycle_number
			FROM
			hat_counting_lines_hat_counting_results_c hcl,
			hat_counting_results hcr
			WHERE
			hcl.hat_counting_lines_hat_counting_resultshat_counting_results_idb = hcr.id
			AND hcr.deleted = 0
			AND hcl.hat_counting_lines_hat_counting_resultshat_counting_lines_ida ='".$row_line['id']."'
			and hcl.deleted = 0
			ORDER BY
			hcr.cycle_number desc
			LIMIT 1";
			$result=$db->query($sql);
			$row=$db->fetchByAssoc($result);
			$cycle_number=$row["cycle_number"];

			$sql_count="SELECT
			count(*) actual_counting
			FROM
			hat_counting_lines_hat_counting_results_c hcl,
			hat_counting_results hcr
			WHERE
			hcl.hat_counting_lines_hat_counting_resultshat_counting_results_idb = hcr.id
			AND hcr.deleted = 0
			and hcr.cycle_number = '".$cycle_number."'
			and hcr.counting_result <>''
			AND hcl.hat_counting_lines_hat_counting_resultshat_counting_lines_ida ='".$row_line['id']."'
			and hcl.deleted = 0";
			$result_count=$db->query($sql_count);
			$row_count=$db->fetchByAssoc($result_count);
			if($row_count["actual_counting"]!=0){
				$count['actual_counting']=$count['actual_counting']+1;
			}
			$sql_ucount="SELECT
			count(*) un_actual_counting
			FROM
			hat_counting_lines_hat_counting_results_c hcl,
			hat_counting_results hcr
			WHERE
			hcl.hat_counting_lines_hat_counting_resultshat_counting_results_idb = hcr.id
			AND hcr.deleted = 0
			AND hcl.hat_counting_lines_hat_counting_resultshat_counting_lines_ida ='".$row_line['id']."'
			and hcl.deleted = 0";
			$result_ucount=$db->query($sql_ucount);
			$row_ucount=$db->fetchByAssoc($result_ucount);
			if($row_ucount["un_actual_counting"]!=0){
				$count['un_actual_counting']=$count['un_actual_counting']+1;
			}

			$sql_detail="SELECT
			hcr.*
			FROM
			hat_counting_lines_hat_counting_results_c hcl,
			hat_counting_results hcr
			WHERE
			hcl.hat_counting_lines_hat_counting_resultshat_counting_results_idb = hcr.id
			AND hcr.deleted = 0
			and hcl.deleted = 0
			and hcr.cycle_number = '".$cycle_number."'
			AND hcl.hat_counting_lines_hat_counting_resultshat_counting_lines_ida ='".$row_line['id']."'";
			$result_detail=$db->query($sql_detail);

			while($row_detail=$db->fetchByAssoc($result_detail)){
				if($row_detail["counting_result"]=='Matched'){
					$count['matched_count']=$count['matched_count']+1;
				}
				if($row_detail["counting_result"]=='Different'){
					$count['different_count']=$count['different_count']+1;
				}
				if($row_detail["counting_result"]=='Overage'){
					$count['overage_count']=$count['overage_count']+1;
				}
				if($row_detail["counting_result"]=='Loss'){
					$count['loss_count']=$count['loss_count']+1;
				}
				if($row_detail["adjust_status"]=='Processed'){
					$count['processed_count']=$count['processed_count']+1;
				}
				if($row_detail["counting_result"]==''){
					$count['un_actual_counting']=$count['un_actual_counting']+1;
				}
			}

		}
		return $count;
	}
}