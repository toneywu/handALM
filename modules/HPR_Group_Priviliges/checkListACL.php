<?php
//根据用户匹配权限策略
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

function getListViewSQLStatement($current_module,$user_id,$framework_id,$paraArray=array()) {
    global $db,$currentModule;
    if ($current_module==''){
        $current_module=$currentModule;
    }
    $listViewSQLStatement = "";
    $beanUser = BeanFactory::getBean('Users',$user_id);

    if(isset($beanUser)) {
        $account_id_c = isset($beanUser->account_id_c)?$beanUser->account_id_c:'';
    }

    if ($current_module&&$account_id_c&&$framework_id){

        $privilige_sql = "SELECT
        hgp.sql_statement_for_listview
        FROM
        hpr_groups hg,
        hpr_groups_hpr_group_members_c hgmc,
        hpr_group_members hgm,
        hpr_groups_hpr_group_priviliges_c hgpc,
        hpr_group_priviliges hgp
        WHERE
        hgmc.hpr_groups_hpr_group_membershpr_groups_ida = hg.id
        and hg.deleted=0
        and hgm.deleted=0
        and hgp.deleted=0
        and hg.enabled_flag=1
        and hgm.enabled_flag=1
        and hgp.enabled_flag=1
        AND hgmc.hpr_groups_hpr_group_membershpr_group_members_idb = hgm.id
        AND hgpc.hpr_groups_hpr_group_priviligeshpr_groups_ida = hg.id
        AND hgpc.hpr_groups_hpr_group_priviligeshpr_group_priviliges_idb = hgp.id
        AND hgp.hpr_group_members_id_c = hgm.id
        and hg.haa_frameworks_id_c='" . $framework_id . "'".
        "and hgm.account_id_c='".$account_id_c."'".
        "and hgp.privilige_module='".$current_module."'".
        "and (hgm.user_id_c='' or hgm.user_id_c='".$user_id."')";

        $privilige_result = $db->query($privilige_sql);

        while ($privilige_row = $db->fetchByAssoc($privilige_result)) {


            $listViewSQLStatement = empty($listViewSQLStatement)?$privilige_row['sql_statement_for_listview']:($listViewSQLStatement." AND ".$privilige_row['sql_statement_for_listview']);
        }
    }

    $listViewSQLStatement=str_replace("&#039;", "'", $listViewSQLStatement);
    for ($i=0;$i<count($paraArray);$i++){
        $listViewSQLStatement=str_replace(":".($i+1), $paraArray[$i], $listViewSQLStatement);
    }
    return $listViewSQLStatement;
}
?>