<?php 
	//global $db;
	$source_wo_id =$_POST['source_wo_id'];
	
    
	if (empty($source_wo_id)) {
		echo "S";
		exit();
	}else{
		$should_check = "N";
		$wo_lines = BeanFactory::getBean('HAM_WO_Lines')->get_full_list('name',"ham_wo_lines.ham_wo_id is not null and ham_wo_lines.ham_wo_id!='' and ham_wo_lines.ham_wo_id='".$source_wo_id."'");
		if(count($wo_lines)==0){
			echo "S";
			exit();
		}
		foreach($wo_lines as $wo_line){
			$ham_line_product = BeanFactory :: getBean('AOS_Products')->retrieve_by_string_fields(array (
				'id' => $wo_line->product_id));

			if (!empty($ham_line_product)&&$ham_line_product->asset_criticality_c=="B") {
				$should_check = "Y";
			}
		}
		if ($should_check == "Y") {
            //只要资产事物处理行存在散U的机柜,就返回S
            //没有行也返回S
			$assets_line_array = $_POST['line_asset_id'];
			if (count($assets_line_array)== 0) {
				echo "S";
			    exit();
			}
			foreach($assets_line_array as $key =>$value){
				$assets_bean =  BeanFactory :: getBean('HAT_Assets',$value);
				//$assets_line_id[$i]=$value;
				if (!empty($assets_bean)){
					$racks_beans = BeanFactory :: getBean("HIT_Racks")->get_full_list('', "hit_racks.hat_assets_id ='" . $assets_bean->id . "'");
					$racks_bean=$racks_beans[0];

					if($racks_bean->enable_partial_allocation=="1"){
						echo "S";
						exit();
					}
				}
				//$i =$i +1;
			}
		}else{
			echo "S";
			exit();
		}
		echo "您的工单需求中包括零散分配的机柜，请检查选择的机柜是否符合要求。";
		exit();
	}
?>