<?php

$sugarbean = new HIT_IP();
$sugarbean->retrieve($_POST['record']);

if(!$sugarbean->ACLAccess('Save')){//确认访问权限
    ACLController::displayNoAccess(true);
    sugar_cleanup(true);
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

handleRedirect($return_id, 'HIT_IP');




	function save_lines($post_data, $parent, $key = ''){
	    $line_count = isset($post_data[$key.'name']) ? count($post_data[$key.'name']) : 0; //判断记录的行数

	    echo '<br/>.line_count = '.$line_count;
	    echo '<br/>.$parent.id = '.$parent->id;

	    for ($i = 0; $i < $line_count; ++$i) {
	        //echo "<br/>line ".$i." processed;";

	        if ($post_data[$key.'name'][$i]!='') {
	            //只保存名称不为空的计划，否则直接到下一循环
	            if($post_data[$key.'deleted'][$i] == 1){//删除行
	                echo "<br/>----------->line deleted";
	                $ip_subnet_line = new HIT_IP_Subnets();
	                $ip_subnet_line -> retrieve($post_data[$key.'id'][$i]);
	                $ip_subnet_line -> mark_deleted($post_data[$key.'id'][$i]);
	            } else {//新增或修改行
	                if($post_data[$key.'id'][$i] == ''){//新增行
	                    echo "<br/>----------->line added";
	                    $ip_subnet_line = new HIT_IP_Subnets();
	                    $ip_subnet_line = BeanFactory::getBean('HIT_IP_Subnets');
	                } else {//修改行
	                    echo "<br/>----------->line updated";
	                    $ip_subnet_line = new HIT_IP_Subnets();
	                    $ip_subnet_line -> retrieve($post_data[$key.'id'][$i]);
	                }


	                foreach($ip_subnet_line->field_defs as $field_def) { //循环对所有要素
	                    $ip_subnet_line->$field_def['name'] = $post_data[$key.$field_def['name']][$i];
	                    echo "<br/>".$field_def[name].'='. $post_data[$key.$field_def['name']][$i];
						 $ip_subnet_line->hit_vlan_id = $post_data[$key.'vlan_id'][$i];
						 $ip_subnet_line->ip_type = $post_data[$key.'ip_type_val'][$i];
	                }
					if($ip_subnet_line->ip_type=="1"){
						$ip_subnet_line->name=$ip_subnet_line->ip_subnet;
					}
	                $ip_subnet_line->parent_hit_ip_id = $parent->id;//父ID
					//die();
	            }


	            $ip_subnet_line->save();
	            $GLOBALS['log']->infor("transLine Saved");
	        } else {
	            //empty line jumped
	        }

	    }
	}


