<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAM_WOOPViewList extends ViewList
{
    function Display() {
        global $app_list_strings;
        $this->ss->assign('APP_LIST', $app_list_strings);
        parent::Display();

    }

    function processSearchForm(){
      global $current_user,$db;
      $user_id=$current_user->id;//当前用户id
      //$user_id='7e4135cb-b1e1-a3a1-47c7-56b88f7cc76a';
      $work_center_id="";
      $sql="SELECT
             hwr.work_center_id
            FROM
              users u 
            LEFT JOIN contacts_users cu
            ON u.id=cu.user_id
            LEFT JOIN ham_work_center_people hwp
            ON cu.contact_id=hwp.contact_id
            LEFT JOIN ham_work_center_res hwr
            ON hwp.work_center_res_id=hwr.id
            WHERE hwp.deleted=0
            AND hwr.deleted=0
            AND u.deleted=0
            AND u.id='".$user_id."'";
      $result=$db->query($sql);
      while ($row=$db->fetchByAssoc($result)) {
        $work_center_id=$row['work_center_id'];
      }
      $where_center=$_POST['my_work_center_basic']?(" AND ham_woop.ham_work_center_id='".$work_center_id."'"):"";
      $where_available_task=$_POST['available_task_basic']?(" AND woop_status in('APPROVED','INPRG','REWORK')"):"";
      parent::processSearchForm();
      $haa_frameworks_id=$_SESSION["current_framework"];
      if ($this->where) { 
        $this->where.=" AND EXISTS( SELECT 1 FROM ham_wo w,ham_maint_sites h WHERE w.id = ham_woop.ham_wo_id AND ham_woop.ham_wo_id = w.id AND w.ham_maint_sites_id = h.id AND h.haa_frameworks_id ='".$haa_frameworks_id."')".$where_center.$where_available_task;
      }else{
        $this->where=" EXISTS( SELECT 1 FROM ham_wo w,ham_maint_sites h WHERE w.id = ham_woop.ham_wo_id AND ham_woop.ham_wo_id = w.id AND w.ham_maint_sites_id = h.id AND h.haa_frameworks_id ='".$haa_frameworks_id."')".$where_center.$where_available_task;
      }
    }
}
