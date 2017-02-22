<?php
/************************************************/
//本文件有两个入口
//1、在HAT_Asset_Trans_Batch EditView保存后，被 HAT_Asset_Trans_Batch/Save.php 直接调用save_lines保存事务行
//2、在HAT_Asset_Trans_Batch DetailView保存后，被 HAT_Asset_Trans_Batch/saveStatusChange.php 直接调用save_lines_status
/************************************************/


/************************************************/
//save_lines保存事务行
//本函数被 HAT_Asset_Trans_Batch/Save.php 直接调用(是本文件的主入口1)
//Parameters
//post_date: 前端FORM提交的字段
//header: 头Bean对象
//key: 前端FORM提交字段名的前缀，比如"line_"
/************************************************/
function save_lines($post_data, $header, $key = ''){
    global $timedate;

    $line_count = isset($post_data[$key.'asset_id']) ? count($post_data[$key.'asset_id']) : 0; //判断记录的行数

    echo '<br/>.line_count = '.$line_count;
    echo '<br/>.$header.id = '.$header->id;

    //按行记录数进行循环，将每一行的记录进行保存（可能是增、删除、修改）
    for ($i = 0; $i < $line_count; ++$i) {

        //所有的输出只为了诊断，没有其它作用
        echo "<br/>line ".$i." processed;";
        echo "<br/>asset_id=".$post_data[$key.'asset_id'][$i];
        echo "<br/>target_owning_org_id=".$post_data[$key.'target_owning_org_id'][$i];
        echo "<br/>target_location_id=".$post_data[$key.'target_location_id'][$i];

        if ($post_data[$key.'asset_id'][$i]!='') {
            //只保存Asset_ID不为空的记录，否则直接到下一循环
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
                    //针对机柜，在Attribute上记录合同号
                    $trans_line = save_contract_on_rack_for_cc($trans_line);


                    //这是针对CC特殊的业务场景，规范的应当写了AfterSave中，但时间紧就不管了。

                    //在新增或修改模式下，对机柜的分配进行处理
                    if (isset($trans_line->target_rack_position_data) && $trans_line->target_rack_position_data!="") {
                        save_rack_allocations($trans_line, $header);
                    }
                    save_asset_lines($trans_line);//保存行上的资产信息
                    $trans_line->acctual_complete_date = getTransactionDate();
                    $trans_line->trans_status = 'CLOSED';//将当前行标记为结束
                } else {
                    $trans_line->trans_status = $header->asset_trans_status;//父状态
                }

            }
            //echo("\ntransLine Saved");line_asset_id
            //echo $trans_line;
            $trans_line->save();//保存行信息
            $GLOBALS['log']->debug("OK.transLines are Saved");
        } else {
            //empty line jumped
        }
    }
}


/*****************************************************
这是针对CC特殊的业务场景，规范的应当写了AfterSave LogicHook中，但时间紧就不管了。后续有时间再整理
*****************************************************/
function save_contract_on_rack_for_cc($trans_line) {//这是针对CC特殊的业务场景，规范的应当写了AfterSave中，但时间紧就不管了。
    global $db,$timedate;

    $sql="SELECT ha.id, ha.attribute9 attribute9 FROM hat_assets ha, hit_racks hr WHERE ha.id  = hr.`hat_assets_id` AND hr.deleted= 0 AND hr.enable_partial_allocation = 0 AND ha.id = '".$trans_line->asset_id."' AND ha.`enable_it_rack` = '1' AND ha.deleted = 0";
    $result=$db->query($sql);

    //如果有值说明当前为机柜，需要在机柜对应的Attribute11上进行处理
    while ($row=$db->fetchByAssoc($result)) {
        $trans_line->current_asset_attribute9 = $row['attribute9'];


        if (empty($trans_line -> target_using_org_id) || ($trans_line->inactive_using = 1 && $trans_line->date_end <= $timedate->nowDB())) {
            //如果当前使用组织为空，则将应当的Attribute11清空
            $trans_line->target_asset_attribute9 = '';
        } else {

            $sql2="SELECT 
                  hwl.`contract_id`
                FROM
                  ham_wo_lines hwl,
                  hat_asset_trans_batch hatb,
                  hat_asset_trans hat,
                  aos_products_cstm ap_cstm
                WHERE hat.`batch_id` = hatb.id 
                  AND hatb.`source_wo_id` = hwl.`ham_wo_id` 
                  AND ap_cstm.`id_c` = hwl.`product_id`
                  AND ap_cstm.`asset_criticality_c` = 'A'
                  AND hat.`asset_id` = '".$trans_line->asset_id."'
                  AND hwl.deleted= 0 
                LIMIT 0,1";

            $result2=$db->query($sql2);
            //读取出当前Header对应的所有行记录
            while ($row2=$db->fetchByAssoc($result2)) {

                $trans_line->target_asset_attribute9 = $row2['contract_id'];
            }
        } // end if
    }// end while
    //$trans_line->target_asset_attribute9 = 'test';
    return $trans_line;
}

function getTransactionDate() {
    global $timedate, $transacton_date;
    if (empty($transacton_date)) {
        //如果当前处理时间还没有衩判断过
        if (empty($_GET['accutral_execution_date'])) {
            //大多数情况下是没有指定日期的，那就记录为实时的时间
            $transacton_date = $timedate->nowDB();//将行上的事务处理时间标记为当时时间
        } else {
            //如果指定了日期那就需按指定日期进行记录，但如果指定了未来时间，仍然记录的是当前时间。也就是用户只能指定过去或是现在。
            //进行比较后判断按什么日期进行操作
            $transacton_date = $timedate->to_db_date_time($_GET['accutral_execution_date'],$_GET['accutral_execution_date']);
            if (strtotime($transacton_date)>strtotime($timedate->nowDB())) {
                //如果是未来时间 ，则以当前时间代替
                $transacton_date = $timedate->nowDB();//将行上的事务处理时间标记为当时时间
            } else {
                $transacton_date= $_GET['accutral_execution_date'];
            }
        }
    }
    return $transacton_date;
}
/************************************************/
//save_lines_status保存事务行
//本函数被 HAT_Asset_Trans_Batch/saveStatusChange.php 直接调用(是本文件的主入口2)
//本函数是用户在DetailView界面进行状态变更后被触发的，这种情况下没有FormPosted信息，只是因为头状态变化触发了行上的一系统调整。
//Parameters
//header: 头Bean对象
//key: 前端FORM提交字段名的前缀，比如"line_"
/************************************************/
function save_lines_status($header, $key = ''){
    global $timedate, $db;
    $sql="SELECT hat.id, hat.trans_status FROM hat_asset_trans hat WHERE hat.deleted=0 AND hat.`batch_id`='".$header->id."'";
    $result=$db->query($sql);
    //读取出当前Header对应的所有行记录
    while ($row=$db->fetchByAssoc($result)) {
        $trans_line = new HAT_Asset_Trans();
        $trans_line -> retrieve($row['id']);

        if ($header->asset_trans_status=='TRANSACTED') {
            //header状态=transacted之后，才对行进行进一步的处理。
            //Header有2种情况下可以处于TRANSACTED，第一种情况是EventType设定为一步到位，则在Header Save时，只要提交就会进行审批，再自动进入TRANSACTED状态；第二种情况是EventType要求分步处理，则Header在Approved之后会保持不动，需要用户在界面中将此单据Header变为TRANSACTED状态
            //在新增或修改模式下，对机柜的分配进行处理
            if (isset($trans_line->target_rack_position_data) && $trans_line->target_rack_position_data!="") {
                save_rack_allocations($trans_line, $header);
            }
            save_asset_lines($trans_line);//保存行上的资产信息（对资产信息进行修改）

            //获取当前的事务处理日期（可能是指定日期，也可能是默认当前日期）
            $trans_line->acctual_complete_date = getTransactionDate();
            //将当前行状态标记为结束
            $trans_line->trans_status='CLOSED';
        } else {
            //如果当前头状态不是TRANSACTED，则不对事务处理行进行具体的调整，只是将行状态与头状态保持一致
            $trans_line->trans_status = $header->asset_trans_status;//父状态
        }
        $trans_line->save();//保存行信息
        $GLOBALS['log']->debug("OK.transLines are Saved");
    }
}



/***********************************************/
//分配当前机柜分配，以及保存机柜上的设备信息
//本函数被 save_rack_allocations 的Foreach循环中调用
/***********************************************/
//本函数主要逻辑如下
//1、创建或修改对应的RackAllocation记录
//2、创建Auto_Transacted行记录（一次性创建，不存在修改）
//3、基于上一步骤中的TRANSACTED记录，通过save_asset_lines修改资产记录
/***********************************************/
function save_rack_elements_from_rack($allocation_id, $key, $focused_trans_line) {

    $tran_line_id = create_guid();

    if (isset($allocation_id) && $allocation_id!="") {
        //如果有Allocation_ID，将之前的Allocation记录失效，再后续建立新记录
        $RackAllocationOld = BeanFactory::getBean('HIT_Rack_Allocations', $allocation_id);
        $RackAllocationOld->date_end = getTransactionDate();
        $RackAllocationOld->del_by_hat_asset_trans_id = $tran_line_id;//在之前已经生成了事务处理行的ID，记录下是哪次失效的，以便于回流
        $RackAllocationOld->deleted=1;
        $RackAllocationOld->save();
    } //如果没有Allocation_ID，将不需要删除之前的，直接对新的记录进行创建
    //创建新分配记录
    $RackAllocation = new HIT_Rack_Allocations();
    $RackAllocation = BeanFactory::getBean('HIT_Rack_Allocations');

    //更新机柜分配表
    $Rack = BeanFactory::getBean('HIT_Racks') ->retrieve_by_string_fields(array('hit_racks.`hat_assets_id'=> $focused_trans_line->asset_id));
    //加载机柜信息（主要为了通过资产ID，获取到机柜的ID）

    $RackAllocation->hit_racks_id = $Rack->id;
    $RackAllocation->name = $key->asset_name;
    $RackAllocation->hat_assets_id = $key->asset_id;
    $RackAllocation->rack_pos_top = $key->rack_pos_top;
    $RackAllocation->height = $key->height;
    $RackAllocation->rack_pos_depth = $key->rack_pos_depth;
    $RackAllocation->sync_parent_enabled = true;
    if (empty($key->asset_id)) {
        $RackAllocation->placeholder = true;
    } else {
        $RackAllocation->placeholder = false;
    }
    $RackAllocation->description = $header->name;
    $RackAllocation->using_org_id = $key->hat_assets_accounts_id;
    $RackAllocation->date_start = getTransactionDate();//获取事务处理行上的执行日期（可能是默认当前，也可能是人工指定的日期）
    $RackAllocation->save();
    //通过测试发现，系统调用了HIT_Rack_Allocations\HIT_Rack_Allocations.php中的Save函数
    //因此还执行了函数中对Assets及Rack的变更
    echo "<br>rack allocation saved";


    //创建后台的资产事务处理行
    $beanAssetOnRack = BeanFactory::getBean('HAT_Assets',$RackAllocation->hat_assets_id);
    if($beanAssetOnRack) {
        //以下创建资产事务处理行（为了在资产上看到处理过程，以及为了可逆还原）
        $subTrans_line = new HAT_Asset_Trans();
        $subTrans_line = BeanFactory::getBean('HAT_Asset_Trans');
        $subTrans_line->new_with_id = true;
        $subTrans_line->id = $tran_line_id;
        //用之前定义的ID进行保存
        $subTrans_line->batch_id = $focused_trans_line->batch_id;
        $subTrans_line->asset_id = $RackAllocation->hat_assets_id;
        $subTrans_line->trans_status = 'AUTO_TRANSACTED';
        $subTrans_line->acctual_complete_date = getTransactionDate();

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
        $subTrans_line->current_asset_status = $beanAssetOnRack->asset_status;

        $subTrans_line->save();

        //echo "call save_asset_lines from save_rack_elements_from_rack";
        save_asset_lines($subTrans_line, $beanAssetOnRack);//基于新增的资产事务处理记录，变更资产状态
    }
}

//*****************************************
//失效当前机柜分配，以及保存机柜上的设备信息
//本函数被 save_rack_allocations 的Foreach循环中调用
//*****************************************//
function remove_rack_elements_from_rack($allocation_id, $focused_trans_line) {

    $tran_line_id = create_guid();

    //清空机柜上的分配
    $beanRackAllocation = BeanFactory::getBean('HIT_Rack_Allocations', $allocation_id);
    //echo "<br/>start to remove rack elements, allocation_id=".$allocation_id;

    if ($beanRackAllocation) {

        $AssetOnRackID=$beanRackAllocation->hat_assets_id;

        $beanRackAllocation->del_by_hat_asset_trans_id = $tran_line_id;//在之前已经生成了事务处理行的ID，记录下是哪次失效的，以便于回流
        $beanRackAllocation->date_end = getTransactionDate();//记录下失效的时间
        $beanRackAllocation->deleted=1;
        $beanRackAllocation->save();

        //分配记录删除后，继续将对应的机柜上的设备/资产信息进行调整
        $beanAssetOnRack = BeanFactory::getBean('HAT_Assets', $AssetOnRackID);
        //读取出当前资产的Bean，用于将资产变更前的情况记录到自动创建的事务处理行中的Current记录中

        if ($beanAssetOnRack) {
            $beanLocation = BeanFactory::getBean('HAT_Asset_Locations',$focused_trans_line->current_location_id);
            $beanSite = BeanFactory::getBean('HAM_Maint_Sites',$beanLocation->ham_maint_sites_id);
            //以上2个Bean是为了获取默认的资产地点（每次都判断，效率有点低？）

            //一般情况下，事务处理行只有机柜行信息，没有机柜上的设备行。以下为每个设备创建出一行Auto_Transacted状态的事务处理行记录
            //通过这种自动创建的事务处理行记录，资产的每次变化都可以可追溯的进行记录
            $subTrans_line = new HAT_Asset_Trans();
            $subTrans_line = BeanFactory::getBean('HAT_Asset_Trans');
            $subTrans_line->new_with_id = true;
            $subTrans_line->id = $tran_line_id;
             //用之前定义的ID进行保存
            $subTrans_line->batch_id = $focused_trans_line->batch_id;
            $subTrans_line->asset_id = $AssetOnRackID;//之前的Bean已经删除，所以只能从变更上调用
            $subTrans_line->trans_status = 'AUTO_TRANSACTED';
            $subTrans_line->acctual_complete_date = getTransactionDate();
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

            //echo "call save_asset_lines from remove_rack_elements_from_rack";
            save_asset_lines($subTrans_line, $beanAssetOnRack);//基于新增的资产事务处理记录，变更资产状态
        }
    }
}


//********************************************************************
//*本函数在处理Trans_line时，如果当前行是新增或是修改则变化资产信息*
//在此下场景下会调用本函数
//save_lines：保存事务处理行时，如果当前行状态为TRANSACTED，则对应当行上的设备信息进行变更
//save_rack_elements_from_rack：保存机柜信息时，自动创建出一个针对设备的事务处理行后，对事务处理行对应的设备信息进行变更
//remove_rack_elements_from_rack：自动创建出一个针对设备的事务处理行后，对事务处理行对应的设备信息进行变更
//********************************************************************//
function save_asset_lines($focus, $beanAsset=null){
    //echo "<br>save_asset_lines is called for ".$beanAsset->asset_id."[".$beanAsset->name."]"."</br>";
        //如果参数没有传递过来则直接加载
        if (empty($beanAsset)) {
            $beanAsset = BeanFactory::getBean('HAT_Assets', $focus->asset_id);
        }

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

            if ( empty($beanAsset->id)) {
                echo "alert('--------------------------------------------');";
                echo "alert('++++++++++++++++++++++++++++++++++++++++++++');";
                echo  "alert('".$beanAsset->id."');";
            }else{
                $beanAsset->save();
                //以上为常规保存了所有的设备
            }
        }
}

//*****************************************
//**** START: 保存机柜的分配信息     ****
//本函数被save_lines调用
//*****************************************//
function save_rack_allocations($focused_trans_line, $header) {
    //这里需要进行区分，如果当前的设备是IT设备是一种处理方式，如果当前资产是机柜则是另一种处理方式


    $beanAsset = BeanFactory::getBean('HAT_Assets', $focused_trans_line->asset_id);
    if ($beanAsset && $beanAsset->enable_it_ports == 1 && $beanAsset->enable_it_rack == 0) { // test if $bean was loaded successfully
        //如果当前为IT设备，则为当前IT设备进行分配。
        //注意：这种方式一般不再使用，留在这里是保持向上兼容性！！！！
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
                //针对机柜上的每一行分配进行循环
                if ($key->id!="" && $key->inactive_using=='1') {
                    //如果机柜分配中的分配行有失效记录，则调用以下的函数，将机柜分配和设备信息进行清空
                    remove_rack_elements_from_rack($key->id, $focused_trans_line);
                } else {
                    //如果机柜分配中的分配行是正常的，则调用以下函数，记录分配的信息
                    //其中key->id是指分配行的HIT_Rack_Allocations.ID，可能为空
                    save_rack_elements_from_rack($key->id, $key, $focused_trans_line);
                }//END IF非删除
            }//END FOR 循环下一行机柜信息
        }//end if
    }
}
?>