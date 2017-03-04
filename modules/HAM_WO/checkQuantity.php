<?php 
	global $db;
	$wo_id =$_POST['wo_id'];
	$contract_id =$_POST['contract_id'];
	
    $sql="SELECT
				hatb.id batch_id,
				he.id event_id,
				he.processing_asset_status
			FROM
				hat_asset_trans_batch hatb,
				hat_eventtype he
			WHERE
				hatb.deleted = 0
			AND he.deleted = 0
			AND hatb.hat_eventtype_id = he.id
			AND hatb.source_wo_id = '".$wo_id."'
			ORDER BY
				hatb.date_entered
			LIMIT 0,1";
	
	$results = $db->query($sql);
	//echo($status_sql);
	$batch_id ="";
	$event_id ="";
	while ($result = $db->fetchByAssoc($results)) {
		$batch_id = $result['batch_id'];
		$event_id = $result['event_id'];
		$processing_asset_status = $result['processing_asset_status'];
		
	}

	if ($processing_asset_status == 'Idle') {
		echo "S";
		exit();
	}else{
		$should_check = "N";
		$wo_bean = BeanFactory :: getBean('HAM_WO')->retrieve_by_string_fields(array (
										    'id' => $wo_id));
		//如果不为绿装就不验证
		if ($wo_bean->contact_id != "") {
			echo "S";
		    exit();
		}
		$contract_bean = BeanFactory :: getBean('AOS_Contracts')->retrieve_by_string_fields(array (
										    'id' => $contract_id));
		//如果合同来源为集团不验证
		$code_bean = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
										    'id' => $contract_bean->haa_codes_id_c));
		if ($code_bean->name == '集团') {
			echo "S";
		    exit();
		}
        
        //合同上的数量
        $contract_qty = 0;
		$contract_line_beans = BeanFactory :: getBean("AOS_Products_Quotes")->get_full_list('', "aos_products_quotes.parent_id ='".$contract_id."'");
		foreach($contract_line_beans as $contract_line_bean){
			$product_bean = BeanFactory :: getBean('AOS_Products')->retrieve_by_string_fields(array (
										'id' => $contract_line_bean->product_id));
			if(!empty($product_bean)){
				if($product_bean->asset_criticality_c=="A"){
					$contract_qty=$contract_qty+$contract_line_bean->product_qty;
				}
			}
		}

		//事物处理单上的行的数量
		$current_display_quantity = 0;
		$trans_qty_sql="SELECT
						count(*) trans_qty
					FROM
						hat_asset_trans line
					INNER JOIN hat_asset_trans_batch batch ON (
						batch.id = line.batch_id
						AND batch.deleted = 0
					)
					INNER JOIN hit_racks hr ON (
						line.asset_id = hr.hat_assets_id
						AND hr.deleted = 0
					)
					INNER JOIN hat_assets ha ON (
						ha.id = hr.hat_assets_id
						AND ha.deleted = 0
					)
					WHERE
						hr.enable_partial_allocation != 1
					AND ha.enable_it_rack = 1
					AND line.deleted = 0
					AND line.inactive_using = 0
					AND batch.id ='".$batch_id."'";
		$trans_qty_result=$db->query($trans_qty_sql);
		while($trans_qty_row=$db->fetchByAssoc($trans_qty_result)){
			if ($trans_qty_row['trans_qty'] != "") {
				$current_display_quantity = $trans_qty_row['trans_qty'];
			}
		}

        //已分配的数量
		$asset_qty_sql="SELECT COUNT(*) asset_qty
									from hat_assets 
									WHERE hat_assets.deleted = 0
									AND attribute9 ='".$contract_id."'";
		$result=$db->query($asset_qty_sql);
		while($row=$db->fetchByAssoc($result)){
			if ($row['asset_qty'] != "") {
				$asset_qty = $row['asset_qty'];
			}
		}
		echo "asset_qty_sql:".$asset_qty_sql."<br/>";
			echo "已用数量:".$asset_qty."<br/>";
			echo "当前数量:".$current_display_quantity."<br/>";
			echo "合同数量:".$contract_qty."<br/>";
		if($current_display_quantity+$asset_qty>$contract_qty){
			/*echo "asset_qty_sql:".$asset_qty_sql."<br/>";
			echo "已用数量:".$asset_qty."<br/>";
			echo "当前数量:".$current_display_quantity."<br/>";
			echo "合同数量:".$contract_qty."<br/>";*/
			echo '当前工单分配的机柜数量，已经超过合同约定数量，请确认合同。';
		}else{
			echo "S";
		}
	}
?>