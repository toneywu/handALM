<?php

//****************** START: Save the header normally 写入头信息******************//
$sugarbean = new HMM_Trans_Batch();
$sugarbean->retrieve($_POST['record']);

if(!$sugarbean->ACLAccess('Save')){//确认访问权限
    ACLController::displayNoAccess(true);
    sugar_cleanup(true);
}

if (!empty($_POST['assigned_user_id']) && ($focus->assigned_user_id != $_POST['assigned_user_id']) && ($_POST['assigned_user_id'] != $current_user->id)) {
    $check_notify = TRUE; //如果指定了负责人，并且与当前录入人不同，就通知对应的人员进行处理。
}
else {
    $check_notify = FALSE;
}


require_once('include/formbase.php');
$sugarbean = populateFromPost('', $sugarbean);//调用populateFromPost写入POST的数据


		//在保存之前通过getNumbering生成WO编号
		// 用于产生自动编号
		if ($this->name==''||$this->name=='TBD') {
			$bean_site = BeanFactory::getBean('HAM_Maint_Sites',$this->ham_maint_sites_id);
			$bean_numbering = BeanFactory::getBean('HAA_Numbering_Rule',$bean_site->hmm_trans_batch_haa_numbering_rule_id);


			if (!empty($bean_numbering)) {
			    //取得当前的编号
                //注意这里直接写到sugarbean里,不是$this
				$sugarbean->name=$bean_numbering->nextval;
			    //预生成下一个编号，并保存在$bean_numbering中
				$current_number    =    $bean_numbering->current_number +1;
				$current_numberstr = "".$current_number;
				$padding_str ="";
				for($i=0; $i<$bean_numbering->min_num_strlength; $i++) {
					$padding_str =  $padding_str+ "0";
				}

				$padding_str = substr($padding_str,0, strlen($padding_str) - strlen($current_numberstr)) + $current_numberstr;
				$nextval_str = $bean_numbering->perfix.$padding_str;
				$bean_numbering->current_number = $current_number;
				$bean_numbering->nextval = $nextval_str;
				$bean_numbering->save();

                $GLOBALS['log']->debug("new number=".$this->name);

			}
		}

$GLOBALS['log']->debug("Header Saved");
$sugarbean->save($check_notify);
$return_id = $sugarbean->id;

$GLOBALS['log']->debug("Saved HMM_Trans_Batch record with id of ".$return_id);
//****************** END: Save the header normally******************//

$transLine = array();
/*
foreach($_POST as $key => $value){
    print_R($key."->".$value);
    echo "<br/>";
}
*/
save_lines($_POST,$sugarbean, 'line_');

handleRedirect($return_id, 'HMM_Trans_Batch');




function save_lines($post_data, $parent, $key = ''){
    $line_count = isset($post_data[$key.'item_id']) ? count($post_data[$key.'item_id']) : 0; //判断记录的行数

    for ($i = 0; $i < $line_count; ++$i) {
        //echo "<br/>line ".$i." processed;";
        //echo "<br/>hat_assets_hat_asset_transhat_assets_ida=".$post_data[$key.'hat_assets_hat_asset_transhat_assets_ida'][$i];
        //echo "<br/>account_id_c=".$post_data[$key.'account_id_c'][$i];
        //echo "<br/>hat_asset_locations_id_c=".$post_data[$key.'hat_asset_locations_id_c'][$i];

    	if ($post_data[$key.'item_id'][$i]!='' && $post_data[$key.'primary_qty'][$i]!='') {
            //只保存物料、数量不为空时继续，否则直接到下一循环
            //TODO：这里信赖之前的JS处理结果，在服务器层没有做进一步的校验.理论上需要再去检验是否双单位填写正确，以及是否货位相关字段正确
            //
            if($post_data[$key.'deleted'][$i] == 1){//删除行
               // echo "<br/>----------->line deleted";
            	$trans_line = new HMM_Trans_Lines();
            	$trans_line -> retrieve($post_data[$key.'id'][$i]);
            	$trans_line -> mark_deleted($post_data[$key.'id'][$i]);
            } else {//新增或修改行
                if($post_data[$key.'id'][$i] == ''){//新增行
                    //echo "<br/>----------->line added";
                	$trans_line = new HMM_Trans_Lines();
                	$trans_line = BeanFactory::getBean('HMM_Trans_Lines');
                } else {//修改行
                    //echo "<br/>----------->line updated";
                	$trans_line = new HMM_Trans_Lines();
                	$trans_line -> retrieve($post_data[$key.'id'][$i]);
                }

                foreach($trans_line->field_defs as $field_def) { //循环对所有要素
                	$trans_line->$field_def['name'] = $post_data[$key.$field_def['name']][$i];
                }
                $trans_line->trans_batch_id = $parent->id;//父ID
                $trans_line->ham_maint_sites_id = $parent->ham_maint_sites_id;
                $trans_line->hat_event_type_id = $parent->hat_event_type_id;
                $trans_line->trans_date = $parent->trans_date;
                $trans_line->trans_basic_type = $parent->trans_basic_type;

                //不需要状态控制
            }

            $trans_line->save();
            $GLOBALS['log']->debug("transLine Saved");
        } else {
            //empty line jumped
        }

    }
}
?>