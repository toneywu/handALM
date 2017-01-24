<?php
//save_lines保持事务行
function save_lines($post_data, $header, $key = '', $need_allocation){
    global $timedate;

    $line_count = isset($post_data[$key.'asset_id']) ? count($post_data[$key.'asset_id']) : 0; //判断记录的行数

    echo '<br/>.line_count = '.$line_count;
    echo '<br/>.$header.id = '.$header->id;

    for ($i = 0; $i < $line_count; ++$i) {

        echo "<br/>line ".$i." processed;";
        echo "<br/>asset_id=".$post_data[$key.'asset_id'][$i];
        echo "<br/>target_owning_org_id=".$post_data[$key.'target_owning_org_id'][$i];
        echo "<br/>target_location_id=".$post_data[$key.'target_location_id'][$i];

        if ($post_data[$key.'asset_id'][$i]!='') {
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
                echo '<br/>.$header.id = '.$header->id;
                //print_r($header);

                $trans_line->batch_id = $header->id;//父ID
                $trans_line->assigned_user_id = $header->assigned_user_id;

                if ($header->asset_trans_status=='TRANSACTED') {
                    //在新增或修改模式下，对机柜的分配进行处理
                    if (isset($trans_line->target_rack_position_data) && $trans_line->target_rack_position_data!="") {
                        save_rack_allocations($trans_line, $header);
                    }
                    save_asset_lines($trans_line);//保存行上的资产信息
                    //$trans_line->description = '$timedate->nowDB()='.$timedate->nowDB().' $timedate->now()='.$timedate->now();
                    //
                    if (empty($_GET['accutral_execution_date'])) {
                        $trans_line->acctual_complete_date = $timedate->nowDB();//将行上的事务处理时间标记为当时时间
                    } else {
                        $trans_line->acctual_complete_date = $_GET['accutral_execution_date'];
                    }

                    $trans_line->trans_status = 'CLOSED';//将当前行标记为结束
                } else {
                    $trans_line->trans_status = $header->asset_trans_status;//父状态
                }

            }
            //echo("\ntransLine Saved");
            $trans_line->save();//保存行信息
            $GLOBALS['log']->debug("OK.transLines are Saved");
        } else {
            //empty line jumped
        }
    }
}

//save_lines保持事务行
function save_lines_status($header, $key = ''){
    global $timedate, $db;
    $sql="SELECT hat.id, hat.trans_status FROM hat_asset_trans hat WHERE hat.deleted=0 AND hat.`batch_id`='".$header->id."'";
    $result=$db->query($sql);
    //读取出当前Header对应的所有行记录
    while ($row=$db->fetchByAssoc($result)) {
        $trans_line = new HAT_Asset_Trans();
        $trans_line -> retrieve($row['id']);

        if ($header->asset_trans_status=='TRANSACTED') {
            //在新增或修改模式下，对机柜的分配进行处理
            if (isset($trans_line->target_rack_position_data) && $trans_line->target_rack_position_data!="") {
                save_rack_allocations($trans_line, $header);
            }
            save_asset_lines($trans_line);//保存行上的资产信息

            if (empty($_GET['accutral_execution_date'])) {
                $trans_line->acctual_complete_date = $timedate->nowDB();//将行上的事务处理时间标记为当时时间
            } else {
                //进行比较后判断按什么日期进行操作
                $acctual_complete_date = $timedate->to_db_date_time($_GET['accutral_execution_date'],$_GET['accutral_execution_date']);
                //$trans_line->acctual_complete_date = $_GET['accutral_execution_date'];
                if (strtotime($acctual_complete_date)>strtotime($timedate->nowDB())) {
                    //如果是未来时间 ，则以当前时间代替
                    $trans_line->acctual_complete_date = $timedate->nowDB();//将行上的事务处理时间标记为当时时间
                } else {
                    $trans_line->acctual_complete_date = $_GET['accutral_execution_date'];
                }
            }
            $trans_line->trans_status='CLOSED';
        } else {
            $trans_line->trans_status = $header->asset_trans_status;//父状态
        }
        $trans_line->save();//保存行信息
        $GLOBALS['log']->debug("OK.transLines are Saved");
    }
}


function save_rack_elements_from_rack($allocation_id, $key, $focused_trans_line) {
//分配当前机柜分配，以及保存机柜上的设备信息

    global $timedate;

    if (empty($allocation_id) || $allocation_id==""){
        //如果没有记录，则需要创建新分配记录
        $RackAllocation = new HIT_Rack_Allocations();
        $RackAllocation = BeanFactory::getBean('HIT_Rack_Allocations');
        //创建一个新分配信息
    } elseif ($allocation_id!="") {
        $RackAllocation = BeanFactory::getBean('HIT_Rack_Allocations', $allocation_id);
    }

    //更新机柜分配表
    $Rack = BeanFactory::getBean('HIT_Racks') ->retrieve_by_string_fields(array('hit_racks.`hat_assets_id'=> $focused_trans_line->asset_id));
    $RackAllocation->hit_racks_id = $Rack->id;
    $RackAllocation->name = $key->asset_name;
    $RackAllocation->hat_assets_id = $key->asset_id;
    $RackAllocation->rack_pos_top = $key->rack_pos_top;
    $RackAllocation->height = $key->height;
    $RackAllocation->rack_pos_depth = $key->rack_pos_depth;
    $RackAllocation->sync_parent_enabled = true;
    $RackAllocation->placeholder = false;
    $RackAllocation->description = $header->name;
    $RackAllocation->using_org_id = $key->hat_assets_accounts_id;
    $RackAllocation->save();
    echo "<br>rack allocation saved";

    //创建后台的资产事务处理行
    $beanAssetOnRack = BeanFactory::getBean('HAT_Assets',$RackAllocation->hat_assets_id);
    if($beanAssetOnRack) {
        //以下创建资产事务处理行（为了在资产上看到处理过程，以及为了可逆还原）
        $subTrans_line = new HAT_Asset_Trans();
        $subTrans_line = BeanFactory::getBean('HAT_Asset_Trans');
        $subTrans_line->batch_id = $focused_trans_line->batch_id;
        $subTrans_line->asset_id = $RackAllocation->hat_assets_id;
        $subTrans_line->asset_id = $RackAllocation->hat_assets_id;
        $subTrans_line->trans_status = 'AUTO_TRANSACTED';
        $subTrans_line->acctual_complete_date = $timedate->now();//将行上的事务处理时间标记为当时时间

        $subTrans_line->name = "-".$focused_trans_line->name;
        $subTrans_line->description -> $focused_trans_line->description;
        //以下是记录资产目标状态
        $subTrans_line->target_using_org_id = $RackAllocation->using_org_id;
        $subTrans_line->target_using_person_id = $focused_trans_line->target_using_person_id;
        $subTrans_line->target_using_person_desc =$focused_trans_line->target_using_person_desc;
        $subTrans_line->target_parent_asset_id = $Rack->hat_assets_id;
        $subTrans_line->target_location_id = $focused_trans_line->target_location_id;
        $subTrans_line->target_asset_status = $focused_trans_line->target_asset_status;//机柜上资产的状态与当前事务处理行的创建一致。
        //以下是记录资产的当前状态
        $subTrans_line->current_using_org_id = $beanAssetOnRack->using_org_id;
        $subTrans_line->current_using_person_id = $beanAssetOnRack->using_person_id;
        $subTrans_line->current_using_person_desc =$beanAssetOnRack->using_person_desc;
        $subTrans_line->current_parent_asset_id = $beanAssetOnRack->parent_asset_id;
        $subTrans_line->current_location_id = $beanAssetOnRack->hat_asset_locations_hat_assetshat_asset_locations_ida;
        $subTrans_line->current_asset_status = $beanAssetOnRack->asset_status;//机柜上资产的状态与当前事务处理行的创建一致。

        $subTrans_line->save();
        save_asset_lines($subTrans_line);//基于新增的资产事务处理记录，变更资产状态
    }
}

function remove_rack_elements_from_rack($allocation_id, $focused_trans_line) {
    //清空机柜上的分配
    $beanRackAllocation = BeanFactory::getBean('HIT_Rack_Allocations', $allocation_id);
    echo "<br/>start to remove rack elements, allocation_id=".$allocation_id;

    if ($beanRackAllocation) {

        $AssetOnRackID=$beanRackAllocation->hat_assets_id;
            echo "<br/>got asset id from allocation:".$beanRackAllocation->hat_assets_id;

        $beanRackAllocation->deleted=1;
        $beanRackAllocation->save();
        //清空机柜上设备的信息
        $beanAssetOnRack = BeanFactory::getBean('HAT_Assets', $AssetOnRackID);
        if ($beanAssetOnRack) {
            $beanLocation = BeanFactory::getBean('HAT_Asset_Locations',$focused_trans_line->current_location_id);
            $beanSite = BeanFactory::getBean('HAM_Maint_Sites',$beanLocation->ham_maint_sites_id);
            //以上为了获取默认的资产地点
            $subTrans_line = new HAT_Asset_Trans();
            $subTrans_line = BeanFactory::getBean('HAT_Asset_Trans');
            $subTrans_line->batch_id = $focused_trans_line->batch_id;
            $subTrans_line->asset_id = $RackAllocation->hat_assets_id;
            $subTrans_line->asset_id = $RackAllocation->hat_assets_id;
            $subTrans_line->trans_status = 'AUTO_TRANSACTED';
            $subTrans_line->name = "-".$focused_trans_line->name;
            $subTrans_line->description -> $focused_trans_line->description;
            //以下是记录资产目标状态
            $subTrans_line->target_using_org_id = "";
            $subTrans_line->target_using_person_id = "";
            $subTrans_line->target_using_person_desc ="";
            $subTrans_line->target_parent_asset_id = "";
            $subTrans_line->target_location_id = $beanSite->deft_unassigned_location_id;
            $subTrans_line->target_asset_status = $focused_trans_line->target_asset_status;//机柜上资产的状态与当前事务处理行的创建一致。
            //以下是记录资产的当前状态
            $subTrans_line->current_using_org_id = $beanAssetOnRack->using_org_id;
            $subTrans_line->current_using_person_id = $beanAssetOnRack->using_person_id;
            $subTrans_line->current_using_person_desc =$beanAssetOnRack->using_person_desc;
            $subTrans_line->current_parent_asset_id = $beanAssetOnRack->parent_asset_id;
            $subTrans_line->current_location_id = $beanAssetOnRack->hat_asset_locations_hat_assetshat_asset_locations_ida;
            $subTrans_line->current_asset_status = $beanAssetOnRack->asset_status;//机柜上资产的状态与当前事务处理行的创建一致。

            $subTrans_line->save();
            save_asset_lines($subTrans_line);//基于新增的资产事务处理记录，变更资产状态
        }
    }
}


//********************************************************************
//*本函数在处理Trans_line时，如果当前行是新增或是修改则变化资产信息*
//********************************************************************//
function save_asset_lines($focus, $beanAsset=null){
        //if (empty($beanAsset)) {//如果参数没有传递过来则直接加载
        $beanAsset = BeanFactory::getBean('HAT_Assets', $focus->asset_id);
        //}
        if ($beanAsset) { // test if $bean was loaded successfully
            $beanAsset->owning_org_id = $focus->target_owning_org_id;
            $beanAsset->owning_person_id = $focus->target_owning_person_id;
            $beanAsset->owning_person_desc = $focus->target_owning_person_desc;
            $beanAsset->cost_center_id = $focus->target_cost_center_id;

            if(empty($focus->inactive_using) || $focus->inactive_using!= 1) {//正常保存使用信息
                $beanAsset->using_org_id = $focus->target_using_org_id;
                $beanAsset->using_person_id = $focus->target_using_person_id;
                $beanAsset->using_person_desc = $focus->target_using_person_desc;
            }else{//清空使用信息
                $beanAsset->using_org_id = "";
                $beanAsset->using_person_id = "";
                $beanAsset->using_person_desc = "";

                //如果当前资产为机柜，还需要进一步清空机柜的分配信息
                //这里是按CC的处理模式。所以机柜上的设备也全部清空
                if ($beanAsset->enable_it_rack == 1) {
                    echo ('Rack is going to be cleared, searing rack information.<br/>');
                    $beanRack = BeanFactory::getBean('HIT_Racks')->retrieve_by_string_fields(array('hit_racks.hat_assets_id'=>($beanAsset->id)));
                    echo ('Rack #'.$beanRack->name.' is going to be cleared<br/>');
                    $beanRackAllocations = BeanFactory::getBean('HIT_Rack_Allocations')->get_full_list(
                             '', "hit_rack_allocations.hit_racks_id = '".($beanRack->id)."'"
                             );
                    if($beanRackAllocations) {
                        foreach ($beanRackAllocations as $RackAllocation) {
                            remove_rack_elements_from_rack($RackAllocation->id, $focus);
                        }
                    }
                }
            }

            $beanAsset->hat_asset_locations_hat_assetshat_asset_locations_ida = $focus->target_location_id;
            $beanAsset->location_desc = $focus->target_location_desc;
            $beanAsset->attribute10 = $focus->target_asset_attribute10;
            $beanAsset->attribute11 = $focus->target_asset_attribute11;
            $beanAsset->attribute12 = $focus->target_asset_attribute12;
            $beanAsset->asset_status = $focus->target_asset_status;
            $beanAsset->parent_asset_id = $focus->target_parent_asset_id;

            $beanAsset->save();
            //以上为常规保存了所有的设备
        }
}

//*****************************************
//**** START: 保存机柜的分配信息     ****
//*****************************************//
function save_rack_allocations($focused_trans_line, $header) {
    //这里需要进行区分，如果当前的设备是IT设备是一种处理方式，如果当前资产是机柜则是另一种处理方式
    $beanAsset = BeanFactory::getBean('HAT_Assets', $focused_trans_line->asset_id);
    if ($beanAsset && $beanAsset->enable_it_ports == 1 && $beanAsset->enable_it_rack == 0) { // test if $bean was loaded successfully
        //如果当前为IT设备，则为当前IT设备进行分配。
        //注意：这种方式一般不再使用，留在这里是保持向后兼容性！！
        //这个IF分支可以考虑不再保留
        $RackAllocation = BeanFactory::getBean('HIT_Rack_Allocations') ->retrieve_by_string_fields(array('hit_rack_allocations.hat_assets_id'=> $focused_trans_line->asset_id));
        //基于当前设备（Asset_ID)进行查找，一个资产只能被分配到一个位置。
        //如果已经有位置了，则将当前位置进行更新，否则添加一个新的U位分配
        //
        echo (isset($RackAllocation)).":".$focused_trans_line->asset_id."###</br>";
        if (isset($RackAllocation)) {
            //如果有记录，则对当前数据进行更新（不需要做什么）
        }else{
            //如果没有记录，则需要创建新记录
            $RackAllocation = new HIT_Rack_Allocations();
            $RackAllocation = BeanFactory::getBean('HIT_Rack_Allocations');
            //创建一个新分配信息
        }

        $RackAllocationData = $focused_trans_line->target_rack_position_data;
        list($rack_id, $rack_pos_top, $height, $rack_pos_depth) = split('[|]', $RackAllocationData);

        $RackAllocation->hit_racks_id = $rack_id;
        $RackAllocation->name = $focused_trans_line->name;
        $RackAllocation->hat_assets_id = $focused_trans_line->asset_id;
        $RackAllocation->rack_pos_top = $rack_pos_top;
        $RackAllocation->height = $height;
        $RackAllocation->rack_pos_depth = $rack_pos_depth;
        $RackAllocation->sync_parent_enabled = true;
        $RackAllocation->placeholder = false;
        $RackAllocation->description = $header->name;
        $RackAllocation->save();
    }
    else if ($beanAsset && $beanAsset->enable_it_rack == 1) {
    //如果当前为机柜，则为当前机柜的所有分配进行更新。
    //这是目前的主要操作方式

        $RackAllocationData = ($focused_trans_line->target_rack_position_data);
        $RackAllocationData = str_replace("&quot;",'"',$RackAllocationData);
        $jsonData = json_decode($RackAllocationData);
        //例如：{"1":{"id":"","rack_pos_depth":"FM","rack_pos_top":"38","height":"2","asset_id":"","asset_status":"","asset_name":"占位","asset_desc":"","hat_assets_accounts_name":"","hat_assets_accounts_id":"","desc":"","inactive_using":"1"}}
        echo "<br>jasonData=";
        print_r($jsonData);

        if (isset($jsonData)) {
            foreach($jsonData as $key) {
                if ($key->id!="" && $key->inactive_using=='1') {
                    //如果机柜分配中的分配行有失效记录，则调用以下的函数，将机柜分配和设备信息进行清空
                    remove_rack_elements_from_rack($key->id, $focused_trans_line);
                } else {
                    save_rack_elements_from_rack($key->id, $key, $focused_trans_line);
                }//END IF非删除
            }//END FOR 循环下一行机柜信息
        }//end if
    }
}
?>