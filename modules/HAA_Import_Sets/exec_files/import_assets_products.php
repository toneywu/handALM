<?php
function validate_function(){
	global $db,$app_list_strings;
	$result = array(
		"return_status"=>0,
		"msg_data"=>"",
		);
	$import_set_bean = BeanFactory::getBean('HAA_Import_Sets',$_REQUEST["id"]);
	$import_datas = BeanFactory :: getBean("HAA_Import_Datas")->get_full_list('', "haa_import_datas.document_id_c ='" . $import_set_bean->document_id_c . "' and haa_import_datas.line_number > 0 and haa_import_datas.import_status!='SUCCESS'");
	if (isset($import_datas)) {
		foreach ($import_datas as $data_line) {
			$data_line->import_status='VALID';
			$data_line->error_message='';
			//以下是资产数据的验证
			//验证产品/资产组
			$cv1 = $data_line->column_value1;
			if(!empty($cv1)){
				$sqlcv1 = 'select id from aos_products where name = "'.$cv1.'" limit 1';
				$sqlcv1_result=$db->query($sqlcv1);
				$ccv1='';
				if($row1 = $db->fetchByAssoc($sqlcv1_result)){
					$ccv1 = $row1['id'];
				}
				if(empty($ccv1)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到产品/资产组;';
				}else{
					$data_line->convert_column_value1 = $ccv1;
				}
			}
			//验证资产类别
			$cv2 = $data_line->column_value2;
			if(!empty($cv2)){
				$sqlcv2 = 'select id from aos_product_categories where name = "'.$cv2.'" limit 1';
				$sqlcv2_result=$db->query($sqlcv2);
				$ccv2='';
				if($row2 = $db->fetchByAssoc($sqlcv2_result)){
					$ccv2 = $row2['id'];
				}
				if(empty($ccv2)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到资产类别;';
				}else{
					$data_line->convert_column_value2 = $ccv2;
				}
			}
			//验证流水号
			// 设备唯一性判断更新或新增
			if(!empty($data_line->column_value5)){
				$rarray = validate_asset_one($data_line->column_value5);
				if($rarray['count']!=1){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'根据流水号找不到资产，或存在多条资产;';
				}else{
					$data_line->convert_column_value5 = $rarray['id'];
				}
			}
			//验证所属组织
			$cv18 = $data_line->column_value18;
			if(!empty($cv18)){
				$sqlcv18 = 'select id from accounts where name = "'.$cv18.'" limit 1';
				$sqlcv18_result=$db->query($sqlcv18);
				$ccv18='';
				if($row18 = $db->fetchByAssoc($sqlcv18_result)){
					$ccv18 = $row18['id'];
				}
				if(empty($ccv18)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到所属组织;';
				}else{
					$data_line->convert_column_value18 = $ccv18;
				}
			}
			//验证使用组织
			$cv19 = $data_line->column_value19;
			if(!empty($cv19)){
				$sqlcv19 = 'select id from accounts where name = "'.$cv19.'" limit 1';
				$sqlcv19_result=$db->query($sqlcv19);
				$ccv19='';
				if($row19 = $db->fetchByAssoc($sqlcv19_result)){
					$ccv19 = $row19['id'];
				}
				if(empty($ccv19)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到使用组织;';
				}else{
					$data_line->convert_column_value19 = $ccv19;
				}
			}
			//资产来源
			if(!empty($data_line->column_value21)){
			foreach ($app_list_strings['hat_asset_source_type_list'] as $key => $value) {
				if($data_line->column_value21==$value)	{
					$data_line->convert_column_value21=$key;
				}
				//$result[$key]=$value;
			}
			if(empty($data_line->convert_column_value21)){
				$result['return_status'] = 1;
				$data_line->import_status = 'ERROR';
				$data_line->error_message = $data_line->error_message.'找不到对应的资产来源;';
			}}
			//资产状态
			if(!empty($data_line->column_value22)){
			foreach ($app_list_strings['hat_asset_status_list'] as $key => $value) {
				if($data_line->column_value22==$value)	{
					$data_line->convert_column_value22=$key;
				}
				//$result[$key]=$value;
			}
			if(empty($data_line->convert_column_value22)){
				$result['return_status'] = 1;
				$data_line->import_status = 'ERROR';
				$data_line->error_message = $data_line->error_message.'找不到对应的资产状态;';
			}}
			//验证成本中心
			$cv23 = $data_line->column_value23;
			if(!empty($cv23)){
				$sqlcv23 = 'select id from haa_codes where code_type="asset_main_cost_center" and name = "'.$cv23.'" limit 1';
				$sqlcv23_result=$db->query($sqlcv23);
				$ccv23='';
				if($row23 = $db->fetchByAssoc($sqlcv23_result)){
					$ccv23 = $row23['id'];
				}
				if(empty($ccv23)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到成本中心;';
				}else{
					$data_line->convert_column_value23 = $ccv23;
				}
			}
			//验证资产位置
			$cv24 = $data_line->column_value24;
			if(!empty($cv24)){
				$sqlcv24 = 'select id from hat_asset_locations where name = "'.$cv24.'" limit 1';
				$sqlcv24_result=$db->query($sqlcv24);
				$ccv24='';
				if($row24 = $db->fetchByAssoc($sqlcv24_result)){
					$ccv24 = $row24['id'];
				}
				if(empty($ccv24)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到资产位置;';
				}else{
					$data_line->convert_column_value24 = $ccv24;
				}
			}
			//验证采购订单
			$cv26 = $data_line->column_value26;
			if(!empty($cv26)){
				$sqlcv26 = 'select id from hat_asset_sources where name = "'.$cv26.'" limit 1';
				$sqlcv26_result=$db->query($sqlcv26);
				$ccv26='';
				if($row26 = $db->fetchByAssoc($sqlcv26_result)){
					$ccv26 = $row26['id'];
				}
				if(empty($ccv26)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到采购订单;';
				}else{
					$data_line->convert_column_value26 = $ccv26;
				}
			}
			//验证合同
			$cv27 = $data_line->column_value27;
			if(!empty($cv27)){
				$sqlcv27 = 'select id from aos_contracts where name = "'.$cv27.'" limit 1';
				$sqlcv27_result=$db->query($sqlcv27);
				$ccv27='';
				if($row27 = $db->fetchByAssoc($sqlcv27_result)){
					$ccv27 = $row27['id'];
				}
				if(empty($ccv27)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到对应的合同;';
				}else{
					$data_line->convert_column_value27 = $ccv27;
				}
			}

			//以下为机柜信息验证
			//验证机柜位置
			$cv28 = $data_line->column_value28;
			if(!empty($cv28)){
				$sqlcv28 = 'select id from hat_asset_locations where name = "'.$cv28.'" limit 1';
				$sqlcv28_result=$db->query($sqlcv28);
				$ccv28='';
				if($row28 = $db->fetchByAssoc($sqlcv28_result)){
					$ccv28 = $row28['id'];
				}
				if(empty($ccv28)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到机柜位置;';
				}else{
					$data_line->convert_column_value28 = $ccv28;
				}
			}
			//资产状态
			if(!empty($data_line->column_value29)){
			foreach ($app_list_strings['hat_asset_status_list'] as $key => $value) {
				if($data_line->column_value29==$value)	{
					$data_line->convert_column_value29=$key;
				}
				//$result[$key]=$value;
			}
			if(empty($data_line->convert_column_value29)){
				$result['return_status'] = 1;
				$data_line->import_status = 'ERROR';
				$data_line->error_message = $data_line->error_message.'找不到对应的资产状态;';
			}}

			//验证机柜名称
			if(!empty($data_line->column_value30)){
				$sqlcv30 = 'select id,count(id) rack_count from hit_racks where name = "'.$data_line->column_value30.'"';
				$sqlcv30_result=$db->query($sqlcv30);
				if($row30 = $db->fetchByAssoc($sqlcv30_result)){
					$ccv30_count = $row30['rack_count'];
					$ccv30 = $row30['id'];
				}
				if($ccv30_count>1){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'该机柜名称存在多个机柜;';
				}elseif ($ccv30_count==1) {
					$data_line->convert_column_value30=$ccv30;
				}
			}
			//编号规则
			if(!empty($data_line->column_value32)){
			foreach ($app_list_strings['hit_racks_numbering_list'] as $key => $value) {
				if($data_line->column_value32==$value)	{
					$data_line->convert_column_value32=$key;
				}
				//$result[$key]=$value;
			}
			if(empty($data_line->convert_column_value32)){
				$result['return_status'] = 1;
				$data_line->import_status = 'ERROR';
				$data_line->error_message = $data_line->error_message.'找不到对应的编号规则;';
			}}
			//机柜来源类型
			if(!empty($data_line->column_value40)){
			foreach ($app_list_strings['hat_asset_source_type_list'] as $key => $value) {
				if($data_line->column_value40==$value)	{
					$data_line->convert_column_value40=$key;
				}
				//$result[$key]=$value;
			}
			if(empty($data_line->convert_column_value40)){
				$result['return_status'] = 1;
				$data_line->import_status = 'ERROR';
				$data_line->error_message = $data_line->error_message.'找不到对应的来源类型;';
			}}
			//验证所属组织
			$cv41 = $data_line->column_value41;
			if(!empty($cv41)){
				$sqlcv41 = 'select id from accounts where name = "'.$cv41.'" limit 1';
				$sqlcv41_result=$db->query($sqlcv41);
				$ccv41='';
				if($row41 = $db->fetchByAssoc($sqlcv41_result)){
					$ccv41 = $row41['id'];
				}
				if(empty($ccv41)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到所属组织;';
				}else{
					$data_line->convert_column_value41 = $ccv41;
				}
			}
			//验证使用组织
			$cv42 = $data_line->column_value42;
			if(!empty($cv42)){
				$sqlcv42 = 'select id from accounts where name = "'.$cv42.'" limit 1';
				$sqlcv42_result=$db->query($sqlcv42);
				$ccv42='';
				if($row42 = $db->fetchByAssoc($sqlcv42_result)){
					$ccv42 = $row42['id'];
				}
				if(empty($ccv42)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到使用组织;';
				}else{
					$data_line->convert_column_value42 = $ccv42;
				}
			}
			//以下为上架信息验证
			/*if(!empty($data_line->column_value40)){
				$sqlcv40 = 'select id,count(id) asset_count from hat_assets where asset_number = "'.$data_line->column_value40.'"';
				$sqlcv40_result=$db->query($sqlcv40);
				if($row40 = $db->fetchByAssoc($sqlcv40_result)){
					$ccv40_count = $row40['asset_count'];
					$ccv40 = $row40['id'];
				}
				if($ccv40_count!=1){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'根据流水号找不到资产，或存在多条资产;';
				}else{
					$data_line->convert_column_value40 = $ccv40;
				}
			}*/

			$data_line->save();
		}
	}
	if($result['return_status']==1){
		$result['msg_data']='存在数据验证不合法';
	}
	echo json_encode($result);
}


function import_function(){
	global $db;
	$result = array(
		"return_status"=>0,
		"msg_data"=>"",
		);
	$import_set_bean = BeanFactory::getBean('HAA_Import_Sets',$_REQUEST["id"]);
	$import_datas = BeanFactory::getBean("HAA_Import_Datas")->get_full_list('', "haa_import_datas.document_id_c ='" . $import_set_bean->document_id_c . "' and haa_import_datas.line_number > 0 and haa_import_datas.import_status='VALID'");
	if (isset($import_datas)) {
		foreach ($import_datas as $data_line) {
			$data_line->import_status='SUCCESS';
			$data_line->error_message='';
			$data_line->save();
			$flag = getSaveFlag($data_line);
			//数据1到27 为非机柜资产设备信息
			if(substr($flag,0,1)=='1'){
				if(!empty($data_line->column_value5)){
					/*$asset_bean = BeanFactory::getBean('HAT_Assets')->get_full_list('', "hat_assets.asset_number ='" . $data_line->column_value5 . "'");
					if (isset($asset_list)) 
					foreach ($asset_list as $asset_obj) {
						$asset_bean = $asset_obj;
					}*/
					if(!empty($data_line->convert_column_value5)){
						$asset_bean = BeanFactory::getBean('HAT_Assets',$data_line->convert_column_value5);
					}else{
						$asset_bean = BeanFactory::newBean('HAT_Assets');
					}
				}else{
					$asset_bean = BeanFactory::newBean('HAT_Assets');
				}
				$asset_bean->haa_frameworks_id = $import_set_bean->haa_frameworks_id_c;
				$asset_bean->enable_it_ports = 1;
				$asset_bean->enable_fa = 1;
				$asset_bean->aos_products_id = $data_line->convert_column_value1;
				$asset_bean->aos_product_categories_id = $data_line->convert_column_value2;
				$asset_bean->name = $data_line->column_value3;
				$asset_bean->serial_number = $data_line->column_value4;
				$asset_bean->asset_number = $data_line->column_value5;
				$asset_bean->asset_name = $data_line->column_value6;
				$asset_bean->brand = $data_line->column_value7;
				$asset_bean->model = $data_line->column_value8;
				$asset_bean->attribute1 = $data_line->column_value9;
				$asset_bean->attribute2 = $data_line->column_value10;
				$asset_bean->attribute3 = $data_line->column_value11;
				$asset_bean->attribute4 = $data_line->column_value12;
				$asset_bean->attribute5 = $data_line->column_value13;
				$asset_bean->attribute6 = $data_line->column_value14;
				$asset_bean->attribute7 = $data_line->column_value15;
				$asset_bean->attribute8 = $data_line->column_value16;
				$asset_bean->attribute10 = $data_line->column_value17;
				$asset_bean->owning_org_id = $data_line->convert_column_value18;
				$asset_bean->using_org_id = $data_line->convert_column_value19;
				$asset_bean->owning_details = $data_line->column_value20;
				$asset_bean->asset_source_type = $data_line->convert_column_value21;
				$asset_bean->asset_status = $data_line->convert_column_value22;
				$asset_bean->cost_center_id = $data_line->convert_column_value23;
				$asset_bean->hat_asset_locations_hat_assetshat_asset_locations_ida = $data_line->convert_column_value24;
				$asset_bean->start_date = $data_line->column_value25;
				$asset_bean->asset_source_id = $data_line->convert_column_value26;
				if(!empty($data_line->convert_column_value26)){
					$asset_source_bean = BeanFactory::getBean('HAT_Asset_Sources',$data_line->convert_column_value26);
					$asset_bean->supplier_desc = $asset_source_bean->supplier_desc;
					$asset_bean->supplier_org = $asset_source_bean->supplier_org;
					$asset_bean->supplier_org_id = $asset_source_bean->supplier_org_id;
					$asset_bean->cost_center_id = $asset_source_bean->cost_center;
				}
				$asset_bean->attribute9 = $data_line->convert_column_value27;
				$asset_bean->save();
				$result['asset_id'].=$asset_bean->id.';';
			}
			//数据28到42 为机柜信息
			if(substr($flag,1,1)=='1'){
				if(!empty($data_line->column_value30)){
					/*$rack_list = BeanFactory::getBean('HIT_Racks')->get_full_list('', "hit_racks.name ='" . $data_line->column_value29 . "'");
					if (isset($rack_list)) 
					foreach ($rack_list as $rack_obj) {
						$rack_bean = $rack_obj;
					}*/
					if(!empty($data_line->convert_column_value30)){
						$rack_bean = BeanFactory::getBean('HIT_Racks',$data_line->convert_column_value30);
					}else{
						$rack_bean = BeanFactory::newBean('HIT_Racks');
					}
				}else{
					$rack_bean = BeanFactory::newBean('HIT_Racks');
				}
				$rack_bean->haa_frameworks_id = $import_set_bean->haa_frameworks_id_c;
				$rack_bean->asset_location_id = $data_line->convert_column_value28;
				$rack_bean->asset_status = $data_line->convert_column_value29;
				$rack_bean->name = $data_line->column_value30;
				$rack_bean->asset_number = $rack_bean->name;
				$rack_bean->height = $data_line->column_value31;
				$rack_bean->numbering_rule = $data_line->convert_column_value32;
				$rack_bean->enable_partial_allocation = $data_line->column_value33;
				$rack_bean->dimension_external = $data_line->column_value34;
				$rack_bean->dimension_internal = $data_line->column_value35;
				$rack_bean->rated_current = $data_line->column_value36;
				$rack_bean->standard_power = $data_line->column_value37;
				$rack_bean->stock_number = $data_line->column_value38;
				$rack_bean->using_target = $data_line->column_value39;
				$rack_bean->asset_source_type = $data_line->convert_column_value40;
				$rack_bean->owning_org_id = $data_line->convert_column_value41;
				$rack_bean->using_org_id = $data_line->convert_column_value42;

				$sqlproduct = 'select id from aos_products where name ="机柜" limit 1';
				$sqlproduct_result=$db->query($sqlproduct);
				$product_id='';
				if($row = $db->fetchByAssoc($sqlproduct_result)){
					$product_id = $row['id'];
				}
				$rack_bean->aos_products_id = $product_id;
				$rack_bean->save();
			}
			//数据43到44 为机柜上架信息
			if(substr($flag,2,1)=='1'){
				$allosql='select id ,count(id) id_count from hit_rack_allocations where rack_pos_top = "'.$data_line->column_value43.'" and height="'.$data_line->column_value44.'" and hit_racks_id="'.$rack_bean->id.'" and placeholder=0 and deleted=0';
				$alloresult=$db->query($allosql);
				if($rowallo = $db->fetchByAssoc($alloresult)){
					if($rowallo['id_count']>0){
						$rack_alloc_bean = BeanFactory::getBean('HIT_Rack_Allocations',$rowallo['id']);
					}else{
						$rack_alloc_bean = BeanFactory::newBean('HIT_Rack_Allocations');
					}
				}else{
					$rack_alloc_bean = BeanFactory::newBean('HIT_Rack_Allocations');
				}
				$rack_alloc_bean->name = $asset_bean->asset_number;
				$rack_alloc_bean->rack_pos_top = $data_line->column_value43;
				$rack_alloc_bean->height = $data_line->column_value44;
				$rack_alloc_bean->hit_racks_id=$rack_bean->id;
				$rack_alloc_bean->hat_assets_id=$asset_bean->id;
				$rack_alloc_bean->rack_pos_depth='FMB';
				$rack_alloc_bean->placeholder=0;
				$rack_alloc_bean->save();
			}
		}
	}
	else{
		$result['return_status']=1;
		$result['msg_data']='不存在有效的导入数据';
	}
	echo json_encode($result);
}

function validate_asset_one($asset_number){
	global $db;
	$sql = 'select id,count(id) asset_count from hat_assets where asset_number = "'.$asset_number.'"';
	$result=$db->query($sql);
	$return_arr=array(
		'id'=>'',
		'count'=>'');
	if($row= $db->fetchByAssoc($result)){
		$return_arr['count'] = $row['asset_count'];
		$return_arr['id'] = $row['id'];
	}
	return $return_arr;
}
function validate_rack_one(){

}
function getSaveFlag($data_line){
	$flag = '';
	if(empty($data_line->column_value1)&&empty($data_line->column_value2)&&empty($data_line->column_value3)&&empty($data_line->column_value4)&&empty($data_line->column_value5)&&empty($data_line->column_value6)&&empty($data_line->column_value7)&&empty($data_line->column_value8)&&empty($data_line->column_value9)&&empty($data_line->column_value10)&&empty($data_line->column_value11)&&empty($data_line->column_value12)&&empty($data_line->column_value13)&&empty($data_line->column_value14)&&empty($data_line->column_value15)&&empty($data_line->column_value16)&&empty($data_line->column_value17)&&empty($data_line->column_value18)&&empty($data_line->column_value19)&&empty($data_line->column_value20)&&empty($data_line->column_value21)&&empty($data_line->column_value22)&&empty($data_line->column_value23)&&empty($data_line->column_value24)&&empty($data_line->column_value25)&&empty($data_line->column_value26)&&empty($data_line->column_value27)){
		$flag.='0';
	}else{
		$flag.='1';
	}
	if(empty($data_line->column_value28)&&empty($data_line->column_value29)&&empty($data_line->column_value30)&&empty($data_line->column_value31)&&empty($data_line->column_value32)&&empty($data_line->column_value33)&&empty($data_line->column_value34)&&empty($data_line->column_value35)&&empty($data_line->column_value36)&&empty($data_line->column_value37)&&empty($data_line->column_value38)&&empty($data_line->column_value39)&&empty($data_line->column_value40)&&empty($data_line->column_value41)&&empty($data_line->column_value42)){
		$flag.='0';
	}else{
		$flag.='1';
	}
	if(empty($data_line->column_value43)&&empty($data_line->column_value44)){
		$flag.='0';
	}else{
		$flag.='1';
	}

	return $flag;
}

?>