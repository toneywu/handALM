<?php

function getServerChart($RackBean, $mode) {
/* $mode="ALL" 显示全部;
   $mode="RackFrame" 显示框架，不返回服务器分配信息。
   $mode="Servers" 显示服务器分配信息，不显示框架*/

  global $mod_strings, $db;
  $position_html = "";

  $total_hight = $RackBean->height;
  $numbering_rule = $RackBean->numbering_rule;

  $position_html .="<table id='rack_frame' class='rack_frame' style='width:450px'>";
  $position_html_header = "<tr><th id='position_label_title' class='rack_title' style='width:10%'>RU</th><th id='position_f_title' class='rack_title' style='width:35%'>".translate('LBL_RACK_POS_F','HIT_Racks')."</th><th id='position_m_title' class='rack_title' style='width:35%'>".translate('LBL_RACK_POS_M','HIT_Racks')."</th><th id='position_b_title' class='rack_title'style='width:20%'>".translate('LBL_RACK_POS_B','HIT_Racks')."</th></tr>";
  $position_html .= $position_html_header;
  //画出机架框
  if ($numbering_rule =="TOP" ) {
      for ($x=1; $x<=$total_hight; $x++) {
          $position_html .= "<tr><td id='position_label_".$x."' class='rack_label'>".$x."</td><td id='position_F_".$x."'  class='rack_td'></td><td id='position_M_".$x."'  class='rack_td'></td><td id='position_B_".$x."'  class='rack_td'></td></tr>";
      }
  } else {
      for ($x=$total_hight; $x>0; $x--) {
          $position_html .= "<tr><td id='position_label_".$x."' class='rack_label'>".$x."</td><td id='position_F_".$x."'  class='rack_td'></td><td id='position_M_".$x."'  class='rack_td'></td><td id='position_B_".$x."'  class='rack_td'></td></tr>";
      }
  }
  $position_html .= $position_html_header;
  $position_html .="</table>";

  //画出服务器
  $sel_rack_allocation = "SELECT 
                            hat_assets.id asset_id,
                            hat_assets.name asset_name,
                            hat_assets.asset_desc asset_desc,
                            hat_assets.asset_status,
                            contacts.id contact_id,
                            contacts.last_name contact_name,
                            accounts.id account_id,   
                            accounts.name account_name,
                            hit_rack_allocations.rack_pos_depth,
                            hit_rack_allocations.rack_pos_top,
                            hit_rack_allocations.height 
                          FROM
                            hit_rack_allocations
                            LEFT JOIN hat_assets 
                              ON (
                                hit_rack_allocations.hat_assets_id = hat_assets.id 
                                AND hat_assets.deleted = 0
                              )
                            LEFT JOIN (hat_assets_accounts_c, accounts) 
                              ON (
                                hat_assets_accounts_c.hat_assets_accountshat_assets_idb = hat_assets.id 
                                AND hat_assets_accounts_c.hat_assets_accountsaccounts_ida = accounts.id 
                                AND hat_assets_accounts_c.deleted = 0 
                                AND accounts.deleted = 0
                              ) 
                            LEFT JOIN (hat_assets_contacts_c, contacts) 
                              ON (
                                hat_assets_contacts_c.hat_assets_contactshat_assets_idb = hat_assets.id 
                                AND hat_assets_contacts_c.hat_assets_contactscontacts_ida = contacts.id 
                                AND hat_assets_contacts_c.deleted = 0 
                                AND contacts.deleted = 0
                              ) 
                          WHERE hit_rack_allocations.deleted = 0 
                            AND hit_rack_allocations.hit_racks_id = '".$RackBean->id."'";

  $bean_rack_allocation =  $db-> query($sel_rack_allocation);

  //$allocation_html ="<script>";
  //$allocation_html.="var rack_server_js_jason = {\"server\":[";
  $occupation_cnt =0;
  $allocation_html =  "\"server\":[";
  while ( $d_bean_rack_allocation= $db->fetchByAssoc($bean_rack_allocation) ) {
         $allocation_html.="{\"asset_id\":\"".$d_bean_rack_allocation['asset_id']."\",";
         $allocation_html.="\"asset_name\":\"".$d_bean_rack_allocation['asset_name']."\",";
         $allocation_html.="\"asset_desc\":\"".$d_bean_rack_allocation['asset_desc']."\",";
         $allocation_html.="\"asset_status\":\"".$d_bean_rack_allocation['asset_status']."\",";
         $allocation_html.="\"height\":\"".$d_bean_rack_allocation['height']."\",";
         $allocation_html.="\"rack_pos_top\":\"".$d_bean_rack_allocation['rack_pos_top']."\",";
         $allocation_html.="\"rack_pos_depth\":\"".$d_bean_rack_allocation['rack_pos_depth']."\",";
         $allocation_html.="\"hat_assets_accounts_name\":\"".$d_bean_rack_allocation['account_name']."\"";
         $allocation_html.="},";
         $occupation_cnt += $d_bean_rack_allocation['height'];
  }
  if($occupation_cnt>0) {
      $allocation_html=substr($allocation_html,0,-1); //不为空时才需要-1位,。为空时不需要
  }
  $allocation_html.="],\"numbering_rule\":\"".$numbering_rule."\"";
  $allocation_html.='';
  //$allocation_html.='</script>';

  if ($mode=="All") {
    $position_html = $position_html + $allocation_html;
  } else if ($mode == "RackFrame") {
    $position_html =  $position_html;
  } else {
    $position_html = $allocation_html;
  }

  return $position_html;
}

function getOccupationCnt($RackBean) {
      //计算机柜占用率
     global $db;
     if (!empty($RackBean->id) && !empty($RackBean->height)) {
        $sel_rack_allocation = "SELECT
                            hit_rack_allocations.height
                        FROM
                            hit_rack_allocations
                        WHERE
                            hit_rack_allocations.deleted =0
                            AND hit_rack_allocations.hit_racks_id ='".$RackBean->id."'";
        $bean_rack_allocation =  $db-> query($sel_rack_allocation);
        $occupation_cnt=0;
        while ( $d_bean_rack_allocation= $db->fetchByAssoc($bean_rack_allocation) ) {
               $occupation_cnt += $d_bean_rack_allocation['height'];
        }

        return "<span style='white-space:nowrap;'>".round($occupation_cnt/($RackBean->height)*100)."% <span id='occupation_bar' style='border:#ccc 1px solid; height:1em; width:5em;display:inline-flex'><span id='occupation_bar_filled' style='background-color:#999; height:0.8em; width:".round($occupation_cnt/($RackBean->height)*10/2,1)."em; display:block'></span></span></span>";
      }
}
?>