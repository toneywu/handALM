<?php
	$e_file_name = $_REQUEST["exec_file_name"];
	$e_func_name = $_REQUEST["exec_func_name"];

	$instance_code='';
	$import_set=BeanFactory::getBean('HAA_Import_Sets',$_REQUEST["id"]);
	if($import_set){
		$bean_framework=BeanFactory::getBean('HAA_Frameworks',$import_set->haa_frameworks_id_c);
		if($bean_framework){
			$instance_code=$bean_framework->code;
		}
	}

	if ($instance_code!=''){
		$exec_file="modules/HAA_Import_Sets/exec_files/". $instance_code ."/".$e_file_name;
	}

	if(!file_exists($exec_file)){
		$exec_file="modules/HAA_Import_Sets/exec_files/".$e_file_name;
	}
	if(file_exists($exec_file)){
		require_once($exec_file); 
	}
	else{
		die('未找到定义的报表程序文件，请联系运维人员，确定报表文件的部署路径是否准确。'); 
	}
	$e_func_name();
?>