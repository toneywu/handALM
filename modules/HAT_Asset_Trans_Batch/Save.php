<?php
//TODO 目前还不能通过事务处理关联父资产，也不能由父资产联动的更新子资产
//global $current_user;

if (!empty($_POST['assigned_user_id']) && ($focus->assigned_user_id != $_POST['assigned_user_id']) && ($_POST['assigned_user_id'] != $current_user->id)) {
    $check_notify = TRUE; //如果指定了负责人，并且与当前录入人不同，就通知对应的人员进行处理。
}
else {
    $check_notify = FALSE;
}

require_once('include/formbase.php');

$return_id = save_header($check_notify);//保存头
save_lines($_POST, $sugarbean, 'line_');//保存行

//$sugarbean->save();//再调用一次，为了触发AfterSave,确认是否需要将头彻底关闭
//handleRedirect($return_id, 'HAT_Asset_Trans_Batch');
die;

//****************** END: Jump Back *************************************************************//

//****************** START: Save the header normally 写入头信息******************//
function save_header($check_notify) {
    $sugarbean = new HAT_Asset_Trans_Batch();
    $sugarbean->retrieve($_POST['record']);

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


function save_lines($post_data, $parent, $key = ''){
    $line_count = isset($post_data[$key.'asset_id']) ? count($post_data[$key.'asset_id']) : 0; //判断记录的行数

    echo '<br/>.line_count = '.$line_count;
    echo '<br/>.$parent.id = '.$parent->id;

    for ($i = 0; $i < $line_count; ++$i) {
        echo "<br/>line ".$i." processed;";
        echo "<br/>asset_id=".$post_data[$key.'asset_id'][$i];
        //print_r($post_data);

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
                //如果是新增或修改模式，继续以下代码
                foreach($trans_line->field_defs as $field_def) { //循环对所有要素
                    $trans_line->$field_def['name'] = $post_data[$key.$field_def['name']][$i];
                    echo "<br/>***".$field_def['name'].'='. $post_data[$key.$field_def['name']][$i];
                }
                $trans_line->batch_id = $parent->id;//父ID
                $trans_line->trans_status = $parent->asset_trans_status;//父状态 LogicHook BeforeSave可能会改写
                $trans_line->assigned_user_id = $parent->assigned_user_id;

                //在新增或修改模式下，
                //可以进一步的对资产信息进行修改
                if ($parent->asset_trans_status=='APPROVED') {
                    save_asset_lines($trans_line);
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


function save_asset_lines($focus){
    //本函数在处理Trans_line时，如果当前行是新增或是修改则变化资产信息
//    $beanAsset = new HAT_Asset_Trans();

        //如果不出意外，应当由HAT_TransactionBatch/checkApprovalWorkflow.php先将头STATUS调整为APPROVED
        $beanAsset = BeanFactory::getBean('HAT_Assets', $focus->hat_assets_hat_asset_transhat_assets_ida);
        if ($beanAsset) { // test if $bean was loaded successfully
            $beanAsset->owning_org_id = $focus->owning_org_id;
            $beanAsset->owning_person_id = $focus->target_owning_person_id;
            $beanAsset->owning_person_desc = $focus->target_owning_person_desc;
            $beanAsset->using_org_id = $focus->target_using_org;
            $beanAsset->using_person_id = $focus->target_using_person_id;
            $beanAsset->using_person_desc = $focus->target_using_person_desc;
            $beanAsset->hat_asset_locations_hat_assetshat_asset_locations_ida = $focus->target_location_id;
            $beanAsset->location_desc = $focus->target_location_desc;
            $beanAsset->asset_status = $focus->target_asset_status;
            $beanAsset->save();
        }
}
?>