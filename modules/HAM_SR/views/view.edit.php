<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAM_SRViewEdit extends ViewEdit
{

    function Display() {

        global $current_user,$mod_strings;
        global $db;
/*        echo "string";
        foreach ($current_user as $key => $value) {
            echo '</br>'.$key ." = ".$value;
        }*/

        //1、初始化Framework-Site信息
        require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_site_id = empty($this->bean->ham_maint_sites_id)?"":$this->bean->ham_maint_sites_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $this->ss->assign('MAINT_SITE',set_site_selector($current_site_id,$current_module,$current_action));



       if ((isset($this->bean->hat_asset_locationss_id)==false || $this->bean->hat_asset_locationss_id=="") && (isset($_REQUEST['location_id']) && $_REQUEST['location_id']!="")&& (isset($_REQUEST['hat_assets_id'])==false || $_REQUEST['hat_assets_id']!="")) { 
            //如果没有地点记录，并且传入了地点参数，并且没有资产参数时，从地点进行读取
            //如果有资产参数也同样跳过本段，从后续的资产数据中带出地点
             $sel_current_location ="SELECT 
                                        hat_asset_locations.id location_id,
                                        hat_asset_locations.name location_name,
                                        hat_asset_locations.location_title location_title,
                                        ham_maint_sites.id site_id,
                                        ham_maint_sites.name site_name
                                    FROM
                                        hat_asset_locations,
                                        ham_maint_sites
                                    WHERE
                                        ham_maint_sites.id = hat_asset_locations.ham_maint_sites_id
                                            AND ham_maint_sites.deleted = 0
                                            AND hat_asset_locations.deleted = 0
                                            and hat_asset_locations.id ='".$_REQUEST['location_id']."'";

            //echo($sel_current_asset);
            $resule_locations =  $db->query($sel_current_location);

            while ( $resule_asset = $db->fetchByAssoc($resule_locations) ) {
                $this->bean->hat_asset_locations_id = $resule_asset['location_id'];
                $this->bean->location = $resule_asset['location_name'];
                $this->bean->location_title = $resule_asset['location_title'];
                $this->bean->site = $resule_asset['site_name'];
                $this->bean->ham_maint_sites_id = $resule_asset['site_id'];
           }
       } else if (isset($this->bean->hat_asset_locations_id) && $this->bean->hat_asset_locations_id!="") {
            //否则查询数据库，读取地点说明
             $sel_current_location ="SELECT 
                                        hat_asset_locations.location_title location_title
                                    FROM
                                        hat_asset_locations
                                    WHERE
                                        hat_asset_locations.id ='".$this->bean->hat_asset_locations_id."'";
            //echo($sel_current_asset);
            $resule_locations =  $db->query($sel_current_location);

            while ( $resule_asset = $db->fetchByAssoc($resule_locations) ) {
                $this->bean->location_title = $resule_asset['location_title'];
            }
       }

       if ((isset($this->bean->hat_assets_id)==false || $this->bean->hat_assets_id=="") && (isset($_REQUEST['hat_assets_id']) && $_REQUEST['hat_assets_id']!="")) { //如果没有资产，并且有资产传传入，则加载资产
             $sel_current_asset ="SELECT
                                        hat_assets.id asset_id,
                                        hat_assets.name asset_name,
                                        hat_assets.asset_desc,
                                        hat_asset_locations.id location_id,
                                        hat_asset_locations.name location_name,
                                        hat_asset_locations.location_title location_title,
                                        hat_assets.location_desc,
                                        ham_maint_sites.id site_id,
                                        ham_maint_sites.name site_name
                                    FROM
                                        hat_assets
                                            LEFT JOIN
                                        (hat_asset_locations, hat_asset_locations_hat_assets_c, ham_maint_sites) ON (hat_assets.id = hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_assets_idb
                                            AND hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_asset_locations_ida = hat_asset_locations.id
                                            AND ham_maint_sites.id = hat_asset_locations.ham_maint_sites_id
                                            AND hat_asset_locations_hat_assets_c.deleted = 0
                                            AND ham_maint_sites.deleted = 0
                                            AND hat_asset_locations.deleted = 0)
                                    WHERE
                                        hat_assets.deleted = 0
                    and hat_assets.id = '".$_REQUEST['hat_assets_id']."'";

            //echo($sel_current_asset);
            $resule_assets =  $db->query($sel_current_asset);

            while ( $resule_asset = $db->fetchByAssoc($resule_assets) ) {
                $this->bean->hat_assets_id = $resule_asset['asset_id'];
                $this->bean->asset = $resule_asset['asset_name'];
                $this->bean->asset_desc = $resule_asset['asset_desc'];
                $this->bean->hat_asset_locations_id = $resule_asset['location_id'];
                $this->bean->location = $resule_asset['location_name'];
                $this->bean->location_title = $resule_asset['location_title'];
                $this->bean->location_desc = $resule_asset['location_desc'];
                $this->bean->site = $resule_asset['site_name'];
                $this->bean->ham_maint_sites_id = $resule_asset['site_id'];
               // $this->bean->location_map_enabled = $resule_asset['location_map_enabled'];
           }
       } else  if (isset($this->bean->hat_assets_id) && $this->bean->hat_assets_id!="") {
             $sel_current_asset ="SELECT
                                        hat_assets.asset_desc
                                    FROM
                                        hat_assets
                                    WHERE
                                        hat_assets.deleted = 0
                    and hat_assets.id = '".$this->bean->hat_assets_id."'";

            //echo($sel_current_asset);
            $resule_assets =  $db->query($sel_current_asset);

            while ( $resule_asset = $db->fetchByAssoc($resule_assets) ) {
                $this->bean->asset_desc = $resule_asset['asset_desc'];
               // $this->bean->location_map_enabled = $resule_asset['location_map_enabled'];
           }
       }

       if (isset($this->bean->created_by_name) == false || $this->bean->created_by_name=="") {
            $this->bean->created_by_name = $current_user->name;
       }


        if (isset($this->bean->reporter) == false || $this->bean->reporter=="") { //如果没有Report就加载默认的用户为，初始化资产报告人
            $sel_current_contact ="SELECT 
                    contacts.last_name contact_name,
                    contacts.id contact_id,
                    contacts.phone_work phone_work,
                    contacts.phone_mobile phone_mobile,
                    accounts.id account_id,
                    accounts.name account_name
                FROM
                    contacts,
                    contacts_users,accounts, accounts_contacts
                WHERE
                    contacts_users.deleted = 0
                        AND contacts.deleted = 0
                        and accounts.deleted = 0
                        and accounts_contacts.deleted=0
                        AND contacts.id = contacts_users.contact_id
                        and accounts_contacts.contact_id = contacts.id
                        and accounts_contacts.account_id = accounts.id
                        AND contacts_users.user_id = '".$current_user->id."'";
            $resule_contacts =  $db->query($sel_current_contact);

            while ( $resule_contact = $db->fetchByAssoc($resule_contacts) ) {
                //将当前用户默认到跟踪人信息
                $this->bean->owned_by = $resule_contact['contact_name'];
                $this->bean->owned_by_id = $resule_contact['contact_id'];
                //将当前用户默认到报告人信息
                $this->bean->reporter = $resule_contact['contact_name'];
                $this->bean->contact_id_c = $resule_contact['contact_id'];
                $this->bean->work_phone = $resule_contact['phone_work'];
                $this->bean->mobile = $resule_contact['phone_mobile'];
                $this->bean->reporter_org = $resule_contact['account_name'];
                $this->bean->account_id_c = $resule_contact['account_id'];
            }
           $this->bean->email = $current_user->email1;//用的是User的不是Contact，没有什么理由
        }

        //自动填写当前的记录创建人
        if (empty($this->bean->owned_by_id)) {
            $this->bean->owned_by = $current_user->linked_contact_c;
            $this->bean->owned_by_id = $current_user->contact_id_c;
            $this->bean->owned_org_id = $current_user->account_id_c;
            $this->bean->owned_org = $current_user->contact_organization_c;
        }
        if (isset($this->bean->sr_status) && $this->bean->sr_status!='CLOSED') {
            $this->bean->closed_by = $current_user->linked_contact_c;
            $this->bean->closed_by_id = $current_user->contact_id_c;
            $this->bean->closed_date = date('Y-m-d H:i');
        }


        if(empty($this->bean->id)){ //如果当前为新记录，则初始化字段
           //$this->bean->description = $this->bean->id;
           $this->bean->reported_date = date('Y-m-d H:i');
        }

        if (isset($this->bean->asset_desc)) {
            echo '<script>var js_var_asset_desc="'. $this->bean->asset_desc.'";</script>';
        }
        if (isset($this->bean->location_title)) {
            echo '<script>var js_var_location_title="'. $this->bean->location_title.'";</script>';
        }

		//从明细界面点击关闭SR后跳转到编辑界面后 改变SR的状态
		if(isset($_GET['button_change_status'])){
			$change_status=$_GET['button_change_status'];
			if($change_status=="COMPLETE"){
			$this->bean->sr_status='COMPLETE';
		  }
		}

        $sr_num_html="";
        if(empty($this->bean->sr_number)){
            //如果当前工作单号为空，则返回自动编号标签
            $sr_num_html=$mod_strings['LBL_AUTONUM'].'<input type="hidden" value="" id="sr_number" name="sr_number">';
        } else {
            $sr_num_html=$this->bean->sr_number.'<input type="hidden" value="'.$this->bean->sr_number.'" id="sr_number" name="sr_number">';
        }
        $this->ss->assign('SR_NUMBER',$sr_num_html);

        parent::Display();
    }
}
