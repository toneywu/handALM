<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HIT_RACKSViewDetail extends ViewDetail
{

    function Display() {

        global $current_user;
        global $db,$app_list_strings,$mod_strings;

        //读取资产相关的字段
        if (isset($this->bean->hat_assets_id)) {
          //如果当前数据有ID号，也就是说当前是在编辑修改模式，而不是新增模式下
            $asset = BeanFactory::getBean('HAT_Assets',$this->bean->hat_assets_id); //更新已有资产信息

            $this->bean->asset_number = $asset->asset_number;
            $this->bean->asset_location_id = $asset->hat_asset_locations_hat_assetshat_asset_locations_ida;
            $this->bean->asset_location = $asset->hat_asset_locations_hat_assets_name;

            $this->bean->aos_products_id = $asset->aos_products_id ;
            $this->bean->asset_group = $asset->asset_group ;

            $this->bean->supplier_org_id = $asset->supplier_org_id;
            $this->bean->supplier_org = (empty($asset->supplier_desc))?$asset->supplier_org:$asset->supplier_desc;
            $this->bean->asset_source_id = $asset->asset_source_id ;
            $this->bean->supplier_desc = $asset->supplier_desc;
            $this->bean->asset_source_type = $asset->asset_source_type;
            $this->bean->asset_source_ref= $asset->asset_source_ref;
            $this->bean->asset_status = $asset->asset_status;
            //$this->bean->asset_status = "<span class='color_tag color_asset_status_".$asset->asset_status."'>".$app_list_strings['asset_status_list'][$asset->asset_status]."</span>";
            $this->bean->using_org_id = $asset->using_org_id;
            $this->bean->owning_org_id = $asset->owning_org_id;
            $this->bean->using_person_id = $asset->using_person_id ;
            $this->bean->owning_person_id = $asset->owning_person_id ;
            $this->bean->using_person_desc = $asset->using_person_desc;
            $this->bean->owning_person_desc= $asset->owning_person_desc;
            $this->bean->using_org = $asset->using_org;
            $this->bean->owning_org= $asset->owning_org;
            $this->bean->start_date = $asset->start_date ;

        //画出机柜图
            $position_html = "";
            $total_hight= $this->bean->height;

            $position_html .="<table class='rack_frame' style='width:450px'>";
            $position_html_header = "<tr><th id='position_label_title' class='rack_title' style='width:10%'>RU</th><th id='position_f_title' class='rack_title' style='width:35%'>".$mod_strings['LBL_RACK_POS_F']."</th><th id='position_m_title' class='rack_title' style='width:35%'>".$mod_strings['LBL_RACK_POS_M']."</th><th id='position_b_title' class='rack_title'style='width:20%'>".$mod_strings['LBL_RACK_POS_B']."</th></tr>";
            $position_html .= $position_html_header;
            //画出机架框
            if ($this->bean->numbering_rule =="TOP" ) {
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
            global $db;
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
                                      AND hit_rack_allocations.hit_racks_id = '".$this->bean->id."'";

            $bean_rack_allocation =  $db-> query($sel_rack_allocation);
            //echo $sel_rack_allocation;
                /*var  varServer = {"server":[
                        {   asset:"IT-SRV-SRV-001",
                            asset_desc:"流媒体服务器.联想.RD440",
                            asset_status:"InService",
                            height:3,
                            rack_pos_top:30,
                            rack_pos_depth:"FM",
                            hat_assets_accounts_name:"玄武中学",
                        }],"numbering_rule":"BOTTOM"}
                };
                */
            $position_html.='<div id="js_jason" style="display:none">';
            $position_html.='{"server":[';
            $occupation_cnt=0;
            while ( $d_bean_rack_allocation= $db->fetchByAssoc($bean_rack_allocation) ) {
                   $position_html.='{"asset_id":"'.$d_bean_rack_allocation['asset_id'].'",';
                   $position_html.='"asset_name":"'.$d_bean_rack_allocation['asset_name'].'",';
                   $position_html.='"asset_desc":"'.$d_bean_rack_allocation['asset_desc'].'",';
                   $position_html.='"asset_status":"'.$d_bean_rack_allocation['asset_status'].'",';
                   $position_html.='"height":"'.$d_bean_rack_allocation['height'].'",';
                   $position_html.='"rack_pos_top":"'.$d_bean_rack_allocation['rack_pos_top'].'",';
                   $position_html.='"rack_pos_depth":"'.$d_bean_rack_allocation['rack_pos_depth'].'",';
                   $position_html.='"hat_assets_accounts_name":"'.$d_bean_rack_allocation['account_name'].'"';
                   $position_html.='},';
                   $occupation_cnt += $d_bean_rack_allocation['height'];
            }
            if($occupation_cnt>0) {
                $position_html=substr($position_html,0,-1); //不为空时才需要-1位,。为空时不需要
            }
            $position_html.='],"numbering_rule":"'.$this->bean->numbering_rule.'"';
            $position_html.='}';
            $position_html.='</div>';
            //$position_html.='<script src="modules/HIT_Racks/js/detialview.js?v=ehf-FkQ5ENVuqzsrdphKxQ"></script>';

                 //   $position_html .= "<div class='rack_server' id='rack_server_1'>IT-SRV-SRV-001  流媒体服务器.联想.RD440 玄武中学</div>";
            $this->bean-> position_display_area = $position_html;
        }

         $this->bean-> occupation = round($occupation_cnt/($this->bean-> height)*100)."% <div id='occupation_bar' style='border:#ccc 1px solid; height:1em; width:10em;display:inline-block'><div id='occupation_bar_filled' style='background-color:#999; height:0.8em; width:".round($occupation_cnt/($this->bean-> height)*10,1)."em; display:block'></div> </div>"   ;

        parent::Display();
    }


}
