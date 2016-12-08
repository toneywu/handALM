<?php

//global $current_user;

global $db;

$sugarbean = new HAT_Asset_Trans_Batch();
$sugarbean->retrieve($_POST['record']);

if (!empty($_POST['assigned_user_id']) && ($focus->assigned_user_id != $_POST['assigned_user_id']) && ($_POST['assigned_user_id'] != $current_user->id)) {
    $check_notify = TRUE; //如果指定了负责人，并且与当前录入人不同，就通知对应的人员进行处理。
}
else {
    $check_notify = FALSE;
}

require_once('include/formbase.php');
     //add by yuan.chen  2016-12-07
     //需要事先判断 当前头状态是否从非已批准变为已批准 如果是的话 做后续erp资产调拨操作
    $current_header_id = $_POST['record'];
	$need_allocation="N";
	//如果是新增 但是状态直接是提交 那么也当成需要完成资产调拨 满足条件1
	if(empty($current_header_id)&&($_POST['asset_trans_status']=="SUBMITTED")){
		$need_allocation="Y";
	}else{
		//如果有值 则通过数据库来判断
		$check_sql =  'select hat_asset_trans_batch.asset_trans_status from hat_asset_trans_batch where hat_asset_trans_batch.deleted=0 and hat_asset_trans_batch.id="'.$current_header_id.'"';
		$check_result = $db->query($check_sql);
		while ($check_record = $db->fetchByAssoc($check_result)) {
			$db_status = $check_record['asset_trans_status'];
			if($db_status!="APPROVED"&&$_POST['asset_trans_status']=="APPROVED"){
				$need_allocation="Y";
			}
		}
	}


//end by yuan.chen


$return_id = save_header($sugarbean, $check_notify);//保存头
save_lines($_POST, $sugarbean, 'line_',$need_allocation);//保存行

//目前在审批后立即就结束，但未来可以支持2步确认。
//因此代码在此预留
if ($sugarbean->asset_trans_status=="APPROVED") {
    $sugarbean->asset_trans_status == "CLOSED";
    $sugarbean->save();//再调用一次，为了触发AfterSave,确认是否需要将头彻底关闭
}

handleRedirect($return_id, 'HAT_Asset_Trans_Batch');
die;
//****************** END: Jump Back *************************************************************//

//**************
//**** START: Save the header normally 写入头信息****
//**************//
function save_header($sugarbean, $check_notify) {


    if(!$sugarbean->ACLAccess('Save')){//确认访问权限
        ACLController::displayNoAccess(true);
        sugar_cleanup(true);
    }

    $GLOBALS['log']->debug("OK.Header is Saving...");

    $sugarbean = populateFromPost('', $sugarbean);//调用populateFromPost写入POST的数据
    $sugarbean->asset_trans_status =  check_hearder_status($sugarbean);
    $sugarbean->save($check_notify);
    $return_id = $sugarbean->id;

    $GLOBALS['log']->debug("OK.Saved HAT_Asset_Trans_Batch record with id of ".$return_id);
    echo("OK.Saved HAT_Asset_Trans_Batch record with id of ".$return_id);


    if (isset($_REQUEST['duplicateSave']) && $_REQUEST['duplicateSave'] === "true"){
        $base_header_id = $_REQUEST['relate_id'];//复制一个记录
    }
    else{
        $base_header_id = $sugarbean->id;
    }

    return $return_id;

}
//****************** END: Save the header normally******************//


function check_hearder_status($sugarbean) {
    if ($sugarbean->asset_trans_status == "SUBMITTED") {
        return "APPROVED"; //目前是直接返回值，未来可以在此处加工作流信息
    }
}


function save_lines($post_data, $parent, $key = '',$need_allocation){
    $line_count = isset($post_data[$key.'asset_id']) ? count($post_data[$key.'asset_id']) : 0; //判断记录的行数

    echo '<br/>.line_count = '.$line_count;
    echo '<br/>.$parent.id = '.$parent->id;

    for ($i = 0; $i < $line_count; ++$i) {
        echo "<br/>line ".$i." processed;";
        echo "<br/>asset_id=".$post_data[$key.'asset_id'][$i];
        echo "<br/>target_owning_org_id=".$post_data[$key.'target_owning_org_id'][$i];
        echo "<br/>target_location_id=".$post_data[$key.'target_location_id'][$i];
        
/*        echo "<pre>";
        print_r($post_data);*/

        if ($post_data[$key.'asset_id'][$i]!='' && $post_data[$key.'target_owning_org_id'][$i]!='' &&$post_data[$key.'target_location_id'][$i]!='') {
            //只保存Asset、Account、Location不为空的记录，否则直接到下一循环
            if($post_data[$key.'deleted'][$i] == 1){//删除行
                echo "<br/>----------->line deleted";
                $trans_line = new HAT_Asset_Trans();
                $trans_line -> retrieve($post_data[$key.'id'][$i]);
                $trans_line -> mark_deleted($post_data[$key.'id'][$i]);
            } else {//新增或修改行
                if($post_data[$key.'id'][$i] == ''){//新增行
                    echo "<br/>----------->line added";
                    $trans_line = new HAT_Asset_Trans();
                    $trans_line = BeanFactory::getBean('HAT_Asset_Trans');
                    //创建一个Bean对象，准备新增
                } else {//修改行
                    echo "<br/>----------->line updated";
                    $trans_line = new HAT_Asset_Trans();
                    $trans_line -> retrieve($post_data[$key.'id'][$i]);
                }
                //如果是新增或修改模式，继续以下代码完成对象字段的赋值
                foreach($trans_line->field_defs as $field_def) { //循环对所有要素
                    $trans_line->$field_def['name'] = $post_data[$key.$field_def['name']][$i];
                    echo "<br/>***".$field_def['name'].'='. $post_data[$key.$field_def['name']][$i];
                }
                $trans_line->batch_id = $parent->id;//父ID
                $trans_line->trans_status = $parent->asset_trans_status;//父状态 LogicHook BeforeSave可能会改写
                $trans_line->assigned_user_id = $parent->assigned_user_id;


                //在新增或修改模式下，对机柜的分配进行处理
                if (isset($trans_line->target_rack_position_data) && $trans_line->target_rack_position_data!="") {
                    echo "rack";
                    save_rack_allocations($trans_line, $parent);
                }



				//触发ERP资产调拨
				erp_asset_allocation($trans_line->asset_id,
									 $trans_line->target_owning_org_id,
									 $trans_line->target_location_id,
									 $trans_line->target_location_desc,
									 $need_allocation,
									 $trans_line->id,
									 $trans_line->target_owning_org,
									 $trans_line->target_location);

                //在新增或修改模式下，
                //可以进一步的对资产信息进行修改
                if ($parent->asset_trans_status=='APPROVED') {
                    //审批通过后直接更新资产信息
                    save_asset_lines($trans_line);
                    $beanRack = BeanFactory::getBean('HIT_Racks')->
                                            retrieve_by_string_fields(array('hat_assets_id'=>$post_data[$key.'asset_id'][$i])
                                                );
                    echo ("\nChecking Rack inofrmation: beanRack->enable_partial_allocation = ".$beanRack->enable_partial_allocation);
                    if(isset($beanRack) && $beanRack->enable_partial_allocation == false) {
                    //如果当前设备是IT机柜并且机柜非整U分配，则将机柜上的位置、使用组织与人员信息、或失效信息提供到机柜分配行上
                        echo "\nRack is not partial allocation, assets information should be set as parent Rack-Asset.";
                        save_rack_elements_from_rack($trans_line, $beanRack);
                    }


                }


            }
            //echo("\ntransLine Saved");
            $trans_line->save();
            $GLOBALS['log']->debug("OK.transLines are Saved");
        } else {
            //empty line jumped
        }

    }
}

function save_rack_elements_from_rack($focus, $beanRack) {
    //如果当前设备是IT机柜并且机柜整U分配
    //则将机柜上的位置、使用组织与人员信息、或失效信息提供到机柜分配行上
     $RackAllocations = BeanFactory::getBean('HIT_Rack_Allocations')->get_full_list(
             '', "hit_rack_allocations.hit_racks_id = '".$beanRack->id."'"
             );

    foreach ($RackAllocations as $record ) {
        //更新机柜上的分配信息
        $beanRackAllocations = BeanFactory::getBean('HIT_Rack_Allocations',$record->id);
        if(empty($focus->inactive_using) || $focus->inactive_using!= 1) {//正常保存使用信息
            //$beanRackAllocations->using_org_id = $focus->target_using_org;
        }else{//清空使用信息

        }
        $beanRackAllocations->save();

        //更新机柜上的分配的资产的具体属性
        if (!empty($record->hat_assets_id)) {
            $beanAsset = BeanFactory::getBean('HAT_Assets',$record->hat_assets_id);
            if(empty($focus->inactive_using) || $focus->inactive_using!= 1) {//正常保存使用信息
                $beanAsset->using_org_id = $focus->target_using_org_id;
                $beanAsset->using_person_id = $focus->target_using_person_id;
                $beanAsset->using_person_desc = $focus->target_using_person_desc;
                $beanAsset->parent_asset_id = $beanRack->hat_assets_id;
                $beanAsset->hat_asset_locations_hat_assetshat_asset_locations_ida = $focus->target_location_id;
                echo "<br/>Asset[".($beanAsset->name)."] located on Rack has been set according to the Rack information";
            }else{//清空使用信息
                $beanAsset->using_org_id = "";
                $beanAsset->using_person_id = "";
                $beanAsset->using_person_desc = "";
                $beanAsset->parent_asset_id ="";
                $beanAsset->hat_asset_locations_hat_assetshat_asset_locations_ida = "";

/*                $sql = "SELECT ham_maint_sites.id,
                  ham_maint_sites.deft_unassigned_location_id 
                FROM
                  ham_maint_sites,
                  hat_asset_locations 
                WHERE ham_maint_sites.id = hat_asset_locations.`ham_maint_sites_id` 
                  AND ham_maint_sites.`deleted`=0
                  AND hat_asset_locations.`deleted`=0
                  AND hat_asset_locations.id ='".$focus->target_location_id."'";

                echo $sql;*/
                $beanLocation = BeanFactory::getBean('HAT_Asset_Locations',$focus->target_location_id);
                $beanSite = BeanFactory::getBean('HAM_Maint_Sites',$beanLocation->ham_maint_sites_id);
                $beanAsset->hat_asset_locations_hat_assetshat_asset_locations_ida = $beanSite->deft_unassigned_location_id;

                echo "location=".$beanAsset->hat_asset_locations_hat_assetshat_asset_locations_ida;
                echo "<br/>Asset[".($beanAsset->name)."] located on Rack has been set removed.";
            }

            $beanAsset->asset_status = $focus->target_asset_status;
            $beanAsset->save();
        }
    }
}

function save_asset_lines($focus){
    //本函数在处理Trans_line时，如果当前行是新增或是修改则变化资产信息
//    $beanAsset = new HAT_Asset_Trans();

        //如果不出意外，应当由HAT_TransactionBatch/checkApprovalWorkflow.php先将头STATUS调整为APPROVED
        $beanAsset = BeanFactory::getBean('HAT_Assets', $focus->asset_id);
        if ($beanAsset) { // test if $bean was loaded successfully
            $beanAsset->owning_org_id = $focus->owning_org_id;
            $beanAsset->owning_person_id = $focus->target_owning_person_id;
            $beanAsset->owning_person_desc = $focus->target_owning_person_desc;

            if(empty($focus->inactive_using) || $focus->inactive_using!= 1) {//正常保存使用信息
                $beanAsset->using_org_id = $focus->target_using_org_id;
                $beanAsset->using_person_id = $focus->target_using_person_id;
                $beanAsset->using_person_desc = $focus->target_using_person_desc;
            }else{//清空使用信息
                $beanAsset->using_org_id = "";
                $beanAsset->using_person_id = "";
                $beanAsset->using_person_desc = "";
            }
            $beanAsset->hat_asset_locations_hat_assetshat_asset_locations_ida = $focus->target_location_id;
            $beanAsset->location_desc = $focus->target_location_desc;
            $beanAsset->asset_status = $focus->target_asset_status;
            $beanAsset->parent_asset_id = $focus->target_parent_asset_id;

            $beanAsset->save();
            //以上为常规保存了所有的设备

            $focus->trans_status == "CLOSED";
        }
}

//**************
//**** START: 保存机柜的分配信息****
//**************//
function save_rack_allocations($focus, $parent){
    //这里需要进行区分，如果当前的设备是IT设备是一种处理方式，如果当前资产是机柜则是另一种处理方式
    $beanAsset = BeanFactory::getBean('HAT_Assets', $focus->asset_id);


    if ($beanAsset && $beanAsset->enable_it_ports == 1 && $beanAsset->enable_it_rack == 0) { // test if $bean was loaded successfully
        //如果当前为IT设备，则为当前IT设备进行分配。
        $RackAllocation = BeanFactory::getBean('HIT_Rack_Allocations') ->retrieve_by_string_fields(array('hit_rack_allocations.hat_assets_id'=> $focus->asset_id));
        //基于当前设备（Asset_ID)进行查找，一个资产只能被分配到一个位置。
        //如果已经有位置了，则将当前位置进行更新，否则添加一个新的U位分配
        //
        echo (isset($RackAllocation)).":".$focus->asset_id."###</br>";
        if (isset($RackAllocation)) {
            //如果有记录，则对当前数据进行更新（不需要做什么）
        }else{
            //如果没有记录，则需要创建新记录
            $RackAllocation = new HIT_Rack_Allocations();
            $RackAllocation = BeanFactory::getBean('HIT_Rack_Allocations');
            //创建一个新分配信息
        }

        $RackAllocationData = $focus->target_rack_position_data;
        list($rack_id, $rack_pos_top, $height, $rack_pos_depth) = split('[|]', $RackAllocationData);

        $RackAllocation->hit_racks_id = $rack_id;
        $RackAllocation->name = $focus->name;
        $RackAllocation->hat_assets_id = $focus->asset_id;
        $RackAllocation->rack_pos_top = $rack_pos_top;
        $RackAllocation->height = $height;
        $RackAllocation->rack_pos_depth = $rack_pos_depth;
        $RackAllocation->sync_parent_enabled = true;
        $RackAllocation->placeholder = false;
        $RackAllocation->description = $parent->name;
        $RackAllocation->save();
    }
    else if ($beanAsset && $beanAsset->enable_it_rack == 1) {
    //如果当前为机柜，则为当前机柜的所有分配进行更新。

        $RackAllocationData = ($focus->target_rack_position_data);
        $RackAllocationData = str_replace("&quot;",'"',$RackAllocationData);
        $jsonData = json_decode($RackAllocationData);
        //例如：{"1":{"id":"","rack_pos_depth":"FM","rack_pos_top":"38","height":"2","asset_id":"","asset_status":"","asset_name":"占位","asset_desc":"","hat_assets_accounts_name":"","hat_assets_accounts_id":"","desc":"","inactive_using":"1"}}
        print_r($jsonData);

        foreach($jsonData as $key) {

            if ($key->id!="" && $key->inactive_using==1) {
                //删除记录
                $RackAllocation = BeanFactory::getBean('HIT_Rack_Allocations', $key->id);
                $RackAllocation->mark_deleted();
                $RackAllocation->save();
            } else {

                if (empty($key->id) || $key->id=="" || !isset($RackAllocation))  {
                    //如果没有记录，则需要创建新记录
                    $RackAllocation = new HIT_Rack_Allocations();
                    $RackAllocation = BeanFactory::getBean('HIT_Rack_Allocations');
                    //创建一个新分配信息
                }elseif ($key->id!="") {
                    $RackAllocation = BeanFactory::getBean('HIT_Rack_Allocations', $key->id);
                }

                $Rack = BeanFactory::getBean('HIT_Racks') ->retrieve_by_string_fields(array('hit_racks.`hat_assets_id'=> $focus->asset_id));

                $RackAllocation->hit_racks_id = $Rack->id;
                $RackAllocation->name = $key->asset_name;
                $RackAllocation->hat_assets_id = $key->asset_id;
                $RackAllocation->rack_pos_top = $key->rack_pos_top;
                $RackAllocation->height = $key->height;
                $RackAllocation->rack_pos_depth = $key->rack_pos_depth;
                $RackAllocation->sync_parent_enabled = true;
                $RackAllocation->placeholder = false;
                $RackAllocation->description = $parent->name;
                $RackAllocation->save();

                echo "\nrack saved";
            }//END IF非删除
        }//END FOR 循环下一行机柜信息
    }

}


function erp_asset_allocation($asset_id,
							  $target_owning_org_id,
							  $target_location_id,
							  $target_location_desc,
							  $need_allocation,
							  $line_id,
							  $target_owning_org,
							  $target_location){
	$asset_bean = BeanFactory::getBean("HAT_Assets",$asset_id);
	if($need_allocation=="Y"){//代表资产事物处理单的状态确实发生变化 只需判断下一步的条件是否满足
	
		if($asset_bean->fixed_asset_id){//是否对应ERP那边的资产编号
		  //判断是否发生变化  参数和DB里面的值进行判断
		    $check_line_sql =  'select hat_asset_trans.target_owning_org_id
			                          ,hat_asset_trans.target_location_id
									  ,hat_asset_trans.target_location_desc
                      			from hat_asset_trans 
								where hat_asset_trans.deleted=0 and hat_asset_trans.id="'.$current_header_id.'"';
			$check_result = $db->query($check_line_sql);
			while ($check_record = $db->fetchByAssoc($check_result)) {
				$db_target_owning_org_id=$check_record['target_owning_org_id'];
				$db_target_location_id  =$check_record['target_location_id'];
				$db_target_location_desc=$check_record['target_location_desc'];

			if($db_target_owning_org_id!=$target_owning_org_id||
			   $db_target_location_id!=$target_location_id||
			   ($db_target_location_desc!=$target_location_desc||$target_location_desc!=$asset_bean->attribute10)){
				//做资产调拨
			}
			}
		}
	}

}
?>