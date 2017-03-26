<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAM_WOViewList extends ViewList
{
  function Display() {
    global $app_list_strings;
    if (empty($_REQUEST['orderBy'])) {
      $_REQUEST['orderBy'] = 'date_entered';
      $_REQUEST['sortOrder'] = 'desc';
    }
    
	echo '<script src="cache/include/javascript/sugar_grp_yui_widgets.js"></script>';
	echo '<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />';
    $this->ss->assign('APP_LIST', $app_list_strings);

	echo '<script src="modules/HAM_WO/js/HAM_WO_listview.js"></script>';


	if(isset($_GET['error_message'])&&!empty($_GET['error_message'])){
		echo '<script>var return_msg="'.$_GET['error_message'].'"</script>';
		//echo '<script>alert('.$_GET['error_message'].');</script>';
	}
    parent::Display();
    /*global $db;
    var_dump($db->lastsql);*/
  }

  function processSearchForm(){
    parent::processSearchForm();
    //var_dump($_REQUEST);
    $haa_frameworks_id=$_SESSION["current_framework"];
    /*if ($_REQUEST['searchFormTab'] == 'advanced_search') {
       //
    }
    else{
      if ($this->where) {
          $this->where =" ham_wo.deleted=0 AND ham_wo.name LIKE '%".$_REQUEST['name_basic']."%'";
          if ($_REQUEST['account_basic']!='') {
            $this->where.=" AND jt2.name like'%".$_REQUEST['account_basic']."%'";
          }
          if ($_REQUEST['ham_act_id_rule_basic']!='') {
            $this->where.=" AND jt4.name like '".$_REQUEST['ham_act_id_rule_basic']."%'";
          }
          if ($_REQUEST['wo_status_basic'][0]!='') {
            $this->where.=" AND ( ham_wo.wo_status in ('".$_REQUEST['wo_status_basic'][0]."'))";
          }
          if ($_REQUEST['wo_number_basic']!='') {
            $this->where.=" AND ham_wo.wo_number like '".$_REQUEST['wo_number_basic']."%'";
          }
          if ($_REQUEST['location_basic']!='') {
            $this->where.=" AND jt3.name like '".$_REQUEST['location_basic']."%'";
          }
      }
      else{
        $this->where=" ham_wo.deleted =0 ";
      }
      
    }*/
    $account_name = $_REQUEST['account_basic'];
    if($account_name!=''){
      $where = $this->where;
      $account_name = str_replace(' ', '', $account_name,$count);
      //echo 'count1:'.$count;
      $this->where=str_replace($account_name,('%'.$account_name),$where,$count);
      //echo '========================count='.$count;
      //echo '+++++'.$where;
    }
    if ($this->where) { 
      $this->where.=" AND EXISTS (SELECT 1 FROM ham_maint_sites hms WHERE hms.id = ham_wo.ham_maint_sites_id AND hms.haa_frameworks_id ='".$haa_frameworks_id."')";
    }else{
      $this->where=" EXISTS (SELECT 1 FROM ham_maint_sites hms WHERE hms.id = ham_wo.ham_maint_sites_id AND hms.haa_frameworks_id ='".$haa_frameworks_id."')";
    }
    //add liu
    if ($_REQUEST['date_actual_finish1_basic'] != '') {
      //echo("date_actual_finish1_basic".$_REQUEST['date_actual_finish1_basic']);
      $this->where.= " AND date_format(ham_wo.date_actual_start,'%Y-%m-%d') = '".$_REQUEST['date_actual_finish1_basic']."'";
      echo "<script>$('#date_actual_finish1_basic').val('".$_REQUEST['date_actual_finish1_basic']."');</script>";
    }
    if ($_REQUEST['processing_date_basic'] != '') {
      //echo("date_actual_finish1_basic".$_REQUEST['date_actual_finish1_basic']);
      echo "<script>$('#processing_date_basic').val('".$_REQUEST['processing_date_basic']."');</script>";
      $this->where.= " AND ('".$_REQUEST['processing_date_basic']."' = (SELECT date_format(ham_woop.date_actual_finish,'%Y-%m-%d')
                                                  FROM ham_woop
                                                  WHERE ham_woop.ham_wo_id = ham_wo.id
                                                  AND ham_woop.woop_status = 'COMPLETED'
                                                  AND ham_woop.deleted = 0
                                                  ORDER BY
                                                    ham_woop.woop_number DESC
                                                  LIMIT 0,1) 
                OR (not EXISTS (SELECT date_format(ham_woop.date_actual_finish,'%Y-%m-%d')
                                                  FROM ham_woop
                                                  WHERE ham_woop.ham_wo_id = ham_wo.id
                                                  AND ham_woop.woop_status = 'COMPLETED'
                                                  AND ham_woop.deleted = 0
                                                  ORDER BY
                                                    ham_woop.woop_number DESC
                                                  LIMIT 0,1) 
                   AND date_format(ham_wo.date_modified,'%Y-%m-%d') = '".$_REQUEST['processing_date_basic']."')
               )";
    }
    //echo $this->where;
    //增加HPR权限控制逻辑
    require_once('modules/HPR_Group_Priviliges/checkListACL.php');
    global $current_user;
    $current_module = $this->module;
    $current_user_id =$current_user->id;
    $paraArray=array();
    $paraArray[]=$current_user_id;
    $aclSQLList=getListViewSQLStatement($current_module,$current_user_id,$haa_frameworks_id,$paraArray);
    $this->where.=empty($this->where)?(empty($aclSQLList)?"":$aclSQLList):(empty($aclSQLList)?"":'  AND '.$aclSQLList);
   //var_dump($this->where);
    //End HPR权限控制逻辑
  }
}
