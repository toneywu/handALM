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
        IFNULL(hgm.user_id_c, '') user_id_c,
        hgp.sql_statement_for_listview
        FROM
        hpr_groups hg,
        hpr_groups_hpr_group_members_c hgmc,
        hpr_group_members hgm
        LEFT JOIN hpr_group_priviliges hgp ON (
        hgp.hpr_group_members_id_c = hgm.id
        AND hgp.enabled_flag = 1
        AND hgp.deleted = 0
    )
    WHERE
    hgmc.hpr_groups_hpr_group_membershpr_groups_ida = hg.id
    AND hg.deleted = 0
    AND hgm.deleted = 0
    AND hg.enabled_flag = 1
    AND hgm.enabled_flag = 1
    AND hgmc.hpr_groups_hpr_group_membershpr_group_members_idb = hgm.id
    and hg.haa_frameworks_id_c='" . $framework_id . "'".
    "and hgm.account_id_c='".$account_id_c."'".
    "and hgp.privilige_module='".$current_module."'".
    "and (hgm.user_id_c='' or hgm.user_id_c='".$user_id."')
    order by hgm.user_id_c,hgm.account_id_c";

    $privilige_result = $db->query($privilige_sql);
    $pre_user_id='-1';
    while ($privilige_row = $db->fetchByAssoc($privilige_result)) {
        if ($pre_user_id!='-1'&&$pre_user_id!=$privilige_row['user_id_c']){
            break;
        }
        $listViewSQLStatement = empty($listViewSQLStatement)?$privilige_row['sql_statement_for_listview']:($listViewSQLStatement." AND ".$privilige_row['sql_statement_for_listview']);
        $pre_user_id=$privilige_row['user_id_c'];
    }
}

$listViewSQLStatement=str_replace("&#039;", "'", $listViewSQLStatement);
for ($i=0;$i<count($paraArray);$i++){
    $listViewSQLStatement=str_replace(":".($i+1), $paraArray[$i], $listViewSQLStatement);
}

return $listViewSQLStatement;
}
?>