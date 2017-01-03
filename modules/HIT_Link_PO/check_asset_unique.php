<?php
	$error_msg = "S";
	$product_id = $_POST["product_id"];
	$asset_source_id = $_POST["asset_source_id"];
	$record = $_POST["record"];
	if(!empty($product_id)&&$record==""){
		$link_po_bean = BeanFactory :: getBean("HIT_Link_PO")->get_full_list('', "hit_link_po.product_id ='" . $product_id . "'");
		if(count($link_po_bean)>0){
			$error_msg="1";
		}
	}
	
	if(!empty($product_id)&&$record!=""){
		$link_po_bean = BeanFactory :: getBean("HIT_Link_PO")->get_full_list('', "hit_link_po.product_id ='" . $product_id . "' and hit_link_po.id!='".$record."'");
		if(count($link_po_bean)>0){
			$error_msg="1";
		}
	}
	
	if(!empty($asset_source_id)){
		$asset_source_bean = BeanFactory::getBean("HAT_Asset_Sources")->retrieve_by_string_fields(array("id"=>$asset_source_id));
		$need_by = $asset_source_bean->need_by;
		$current_date =date('Y-m-01', strtotime(date("Y-m-d")));
		$need_by_start = date('Y-m-01', strtotime($asset_source_bean->need_by));
		if(strtotime($need_by_start)<strtotime($current_date)){
			$error_msg='2';
		}
	}
	echo $error_msg;
?>