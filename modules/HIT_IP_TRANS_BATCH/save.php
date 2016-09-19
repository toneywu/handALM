<?php
//TODO 目前还不能通过事务处理关联父资产，也不能由父资产联动的更新子资产
//global $current_user;

//****************** START: Save the header normally 写入头信息******************//
$sugarbean = new HIT_IP_TRANS_BATCH();
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

$GLOBALS['log']->infor("Header Saved");
$sugarbean->save($check_notify);
$return_id = $sugarbean->id;

$GLOBALS['log']->debug("Saved HAT_Asset_Trans_Batch record with id of ".$return_id);
//****************** END: Save the header normally******************//


if (isset($_REQUEST['duplicateSave']) && $_REQUEST['duplicateSave'] === "true"){
    $base_header_id = $_REQUEST['relate_id'];//复制一个记录
}
else{
    $base_header_id = $sugarbean->id;
}

$transLine = array();
/*
foreach($_POST as $key => $value){
    print_R($key."->".$value);
    echo "<br/>";
}
*/
save_lines($_POST,$sugarbean, 'line_');

$sugarbean->save();//再调用一次，为了触发AfterSave,确认是否需要将头彻底关闭

handleRedirect($return_id, 'HIT_IP_TRANS_BATCH');



//****************** END: Jump Back *************************************************************//

function save_lines($post_data, $parent, $key = ''){
    $line_count = isset($post_data[$key.'hit_ip_subnets_id']) ? count($post_data[$key.'hit_ip_subnets_id']) : 0; //判断记录的行数

    echo '<br/>.line_count = '.$line_count;
    echo '<br/>.$parent.id = '.$parent->id;
	
	echo var_dump($post_data);
    for ($i = 0; $i < $line_count; ++$i) {
        //echo "<br/>line ".$i." processed;";
        echo "<br/>hit_ip_subnets_id=".$post_data[$key.'hit_ip_subnets_id'][$i];
        echo "<br/>line_parent_ip=".$post_data[$key.'line_parent_ip'][$i];
        echo "<br/>hat_asset_locations_id=".$post_data[$key.'hat_asset_locations_id'][$i];
        echo 'id='.$post_data[$key.'id'][$i]."<br>";
        
        if ($post_data[$key.'hit_ip_subnets_id'][$i]!='') {
            //只保存Asset、Account、Location不为空的记录，否则直接到下一循环
            if($post_data[$key.'deleted'][$i] == 1){//删除行
                echo "<br/>----------->line deleted";
                $trans_line = new HIT_IP_TRANS();
                $trans_line -> retrieve($post_data[$key.'id'][$i]);
                echo 'delete_id = '.$post_data[$key.'id'][$i]."<br>";
                $trans_line -> mark_deleted($post_data[$key.'id'][$i]);
            } else {//新增或修改行
            
                if($post_data[$key.'id'][$i] == ''){//新增行
                    echo "<br/>----------->line added";
                     
                    $trans_line = new HIT_IP_TRANS();
                    $trans_line = BeanFactory::getBean('HIT_IP_TRANS');
                } else {//修改行
                    echo "<br/>----------->line updated";
                    $trans_line = new HIT_IP_TRANS();
                    $trans_line -> retrieve($post_data[$key.'id'][$i]);
                }

                foreach($trans_line->field_defs as $field_def) { //循环对所有要素
					//echo "value = ".$post_data[$key.'hit_ip_ida'][$i]."<br>";
					echo "field_name= ".$field_def['name']."--------------------value = ".$post_data[$key.$field_def['name']][$i]."<br>";
                    $trans_line->$field_def['name'] = $post_data[$key.$field_def['name']][$i];
                    //echo "<br/>".$field_def[name].'='. $post_data[$key.$field_def['name']][$i];
                }
                $trans_line->hit_ip_trans_batch_id = $parent->id;//父ID
                $trans_line->trans_status = $parent->asset_trans_status;//父状态 LogicHook BeforeSave可能会改写
				
            }
            //$trans_line->assigned_user_id = $parent->assigned_user_id;

            //echo("$parent->id=".$parent->id;);
            //echo("$parent->assigned_user_id".$parent->assigned_user_id;);

            $trans_line->save();
            $GLOBALS['log']->infor("transLine Saved");
        } else {
            //empty line jumped
        }

    }
}

?>