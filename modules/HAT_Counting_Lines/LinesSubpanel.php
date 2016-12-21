<?php

	function get_counting_lines($params) {
    $args = func_get_args();
	$task_id = $args[0]['task_id'];

    $return_array['select'] = " SELECT hat_counting_lines.*";
    $return_array['from'] = " FROM hat_counting_lines";
    $return_array['where'] = " WHERE hat_counting_lines.hat_counting_tasks_id_c=hat_counting_tasks.id and hat_counting_tasks.id='" . $task_id . "'";//会自动加入deleted字段
    $return_array['join'] = ",hat_counting_tasks";
    $return_array['join_tables'] = "";
    return $return_array;
}