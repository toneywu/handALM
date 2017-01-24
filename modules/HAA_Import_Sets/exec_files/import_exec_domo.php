<?php
function v_function(){
	$result = array(
		"return_status"=>0,
		"msg_data"=>"",
		);
	echo json_encode($result);
}

function i_function(){
	$result = array(
		"return_status"=>1,
		"msg_data"=>"不合法",
		);
	echo json_encode($result);
}

?>