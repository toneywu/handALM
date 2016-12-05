<?php
/*
 * Created on 2016-10-21
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
if(isset($_REQUEST["segmentName"])){
	$segmentName=$_REQUEST["segmentName"];
	$id = $_REQUEST['record'];
	if(!empty($id)){
		$hit_ip_beans = BeanFactory::getBean('HIT_IP')->get_full_list('name',"hit_ip.name='".$segmentName."' and hit_ip.id!='".$id."'");
	}else{
		$hit_ip_beans = BeanFactory::getBean('HIT_IP')->get_full_list('name',"hit_ip.name='".$segmentName."'");
	}
	if(count($hit_ip_beans)>0){
		echo "Y";
	}else{
		echo "N";
	}
}else{
	echo "N";
}
?>
