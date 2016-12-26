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
        order by hgm.user_id_c desc,hgm.account_id_c desc";

        $privilige_result = $db->query($privilige_sql);
        $pre_user_id='-1';
        while ($privilige_row = $db->fetchByAssoc($privilige_result)) {
            if ($pre_user_id!='-1'&&$pre_user_id!=$privilige_row['user_id_c']){
                break;
            }
            if($privilige_row['sql_statement_for_listview']!=''){
                $listViewSQLStatement = empty($listViewSQLStatement)?$privilige_row['sql_statement_for_listview']:($listViewSQLStatement." AND ".$privilige_row['sql_statement_for_listview']);
            }
            $pre_user_id=$privilige_row['user_id_c'];
        }
    }

    $listViewSQLStatement=str_replace("&#039;", "'", $listViewSQLStatement);
    for ($i=0;$i<count($paraArray);$i++){
        $listViewSQLStatement=str_replace(":".($i+1), $paraArray[$i], $listViewSQLStatement);
    }

    return $listViewSQLStatement;
}

function checkPopupModule($effect_module,$privilige_id,$logic_type) {
   global $db;
   $result = false;
   $checksql = "SELECT
   count(*) cnt
   FROM
   hpr_group_popupmodules hpm,
   hpr_group_priviliges_hpr_group_popupmodules_c prp
   where hpm.id=prp.hpr_group_bc9bmodules_idb
   and prp.hpr_group_dcbfviliges_ida='" . $privilige_id . "'".
   "and hpm.logic_type='".$logic_type."'".
   "and hpm.popupmodule='".$effect_module."'";

   $checkresult = $db->query($checksql);

   while ($resultrow = $db->fetchByAssoc($checkresult)) {
       if ($resultrow['cnt']!='0'){
        $result=true;
    }
}
return $result;
}

function getPopupSQLStatement($popup_module,$current_module='',$user_id,$framework_id,$paraArray=array()) {
    global $db,$currentModule;
    if ($current_module==''){
        $current_module=$currentModule;
    }

    $popupSQLStatement = "";
    $beanUser = BeanFactory::getBean('Users',$user_id);
    if(isset($beanUser)) {
        $account_id_c = isset($beanUser->account_id_c)?$beanUser->account_id_c:'';
    }

    if ($current_module&&$account_id_c&&$framework_id){

        $privilige_sql = "SELECT
        IFNULL(hgm.user_id_c, '') user_id_c,
        hgp.popup_global_flag,
        hgp.sql_statement_for_popup,
        hgp.id privilige_id
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
        "and hgp.privilige_module='".$popup_module."'".
        "and (hgm.user_id_c='' or hgm.user_id_c='".$user_id."')
        order by hgm.user_id_c desc,hgm.account_id_c desc";

        $privilige_result = $db->query($privilige_sql);
        $pre_user_id='-1';
        while ($privilige_row = $db->fetchByAssoc($privilige_result)) {
            if ($pre_user_id!='-1'&&$pre_user_id!=$privilige_row['user_id_c']){
                break;
            }

            if($privilige_row['popup_global_flag']=='1'){
                $condition_flag=checkPopupModule($current_module,$privilige_row['privilige_id'],'Ruleout');
                if((!$condition_flag)&&$privilige_row['sql_statement_for_popup']!=''){
                    $popupSQLStatement = empty($popupSQLStatement)?$privilige_row['sql_statement_for_popup']:($popupSQLStatement." AND ".$privilige_row['sql_statement_for_popup']);
                }
            } 
            elseif($privilige_row['popup_global_flag']=='0'){
                $condition_flag=checkPopupModule($current_module,$privilige_row['privilige_id'],'Include');

                if($condition_flag&&$privilige_row['sql_statement_for_popup']!=''){
                    $popupSQLStatement = empty($popupSQLStatement)?$privilige_row['sql_statement_for_popup']:($popupSQLStatement." AND ".$privilige_row['sql_statement_for_popup']);
                }
            }
            $pre_user_id=$privilige_row['user_id_c'];
        }
    }

    $popupSQLStatement=str_replace("&#039;", "'", $popupSQLStatement);
    for ($i=0;$i<count($paraArray);$i++){
        $popupSQLStatement=str_replace(":".($i+1), $paraArray[$i], $popupSQLStatement);
    }

    return $popupSQLStatement;
}
?>