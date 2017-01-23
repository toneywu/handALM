<?php
	$e_file_name = $_REQUEST["exec_file_name"];
	$e_func_name = $_REQUEST["exec_func_name"];

	$exec_file="modules/HAA_Import_Sets/exec_files/".$e_file_name;
	require_once($exec_file); 
	$e_func_name();
?>