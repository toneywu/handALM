<?php
/*	function get_counting_tasks($params){
		$args = func_get_arg();
		$batch_id = $args[0]['batch_id'];
		var_dump($args);
		//$batch_id = $params[1]['batch_id'];
		$return_array['select'] =" SELECT h.*";
		$return_array['from'] =" FROM hat_counting_tasks h";
		$return_array['where'] =" WHERE hat_counting_batchs.id = h.hat_asset_counting_batch_id and hat_counting_batchs.id='".$batch_id."'";
		$return_array['join'] =",hat_counting_batchs";
		$return_array['join_tables'] =" hat_counting_batchs.id = h.hat_asset_counting_batch_id";
		return $return_array;
	}*/

	function get_counting_tasks($params) {
    $args = func_get_args();
	$batch_id = $args[0]['batch_id'];

    $return_array['select'] = " SELECT hat_counting_tasks.*";
    $return_array['from'] = " FROM hat_counting_tasks";
    $return_array['where'] = " WHERE hat_counting_tasks.hat_counting_batchs_id_c=hat_counting_batchs.id and hat_counting_batchs.id='" . $batch_id . "'";//会自动加入deleted字段
    $return_array['join'] = ",hat_counting_batchs";
    $return_array['join_tables'] = "";
    //$_SESSION["HAT_Counting_Batchs_hat_counting_tasks_CELL_ORDER_BY"]="task_number";
    //var_dump($_SESSION);
    return $return_array;
}