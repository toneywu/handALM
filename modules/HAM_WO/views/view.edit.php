<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.edit.php');

class HAM_WOViewEdit extends ViewEdit {

	function Display() {

		global $current_user, $mod_strings;
		global $db;

		//1、初始化Framework-Site信息
		//2、如果当前数据来源于SR（有参数sr_id）则从对应的SR上复制信息
		//3、判断是否来自合同的，如果来源于合同则显示合同字段信息
		//4、初始化工作单编号等字段


        //1、初始化Framework-Site信息
        require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_site_id = empty($this->bean->ham_maint_sites_id)?"":$this->bean->ham_maint_sites_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $this->ss->assign('MAINT_SITE',set_site_selector($current_site_id,$current_module,$current_action));

		//2、如果当前数据来源于SR（有参数sr_id）则从对应的SR上复制信息
		if (isset ($_GET['sr_id']) && $_GET['sr_id'] != "") {
			//如果有SR关联(由SR创建 WO时)
			$sr_id = $_GET['sr_id'];

			$bean_sr = BeanFactory :: getBean('HAM_SR', $sr_id);

			$this->bean->ham_maint_sites_id = $bean_sr->ham_maint_sites_id;
			$this->bean->site = $bean_sr->site;
			$this->bean->name = $bean_sr->name;
			$this->bean->description = $bean_sr->description;
			$this->bean->location_extra_desc = $bean_sr->location_extra_desc;
			$this->bean->ham_priority_id = $bean_sr->ham_priority_id;
			$this->bean->priority = $bean_sr->priority;
			$this->bean->contact_id = $bean_sr->contact_id;
			$this->bean->reporter = $bean_sr->reporter;
			$this->bean->account_id = $bean_sr->account_id;
			$this->bean->reporter_org = $bean_sr->reporter_org;
			$this->bean->reported_date = $bean_sr->reported_date;
			$this->bean->hat_asset_locations_id = $bean_sr->hat_asset_locations_id;
			$this->bean->location = $bean_sr->location;
			$this->bean->hat_assets_id = $bean_sr->hat_assets_id;
			$this->bean->asset = $bean_sr->asset_name;
			$this->bean->location_desc = $bean_sr->location_desc;
			$this->bean->asset_desc = $bean_sr->asset_desc;
			$this->bean->location_map_enabled = $bean_sr->location_map_enabled;
			$this->bean->map_type = $bean_sr->map_type;
			$this->bean->map_lat = $bean_sr->map_lat;
			$this->bean->map_lng = $bean_sr->map_lng;
			$this->bean->map_zoom = $bean_sr->map_zoom;
			$this->bean->map_enabled = $bean_sr->map_enabled;
			$this->bean->map_address = $bean_sr->map_address;

			$this->bean->source_type = "SR";
			$this->bean->source_id = $bean_sr->id;
			$this->bean->source_reference = $bean_sr->sr_number;

			$this->bean->date_target_start = date('Y-m-d H:i');
			$this->bean->date_target_finish = date('Y-m-d H:i');

			#$this->bean->date_target_finish =$this->bean->date_target_start;
		} else {
			//如果没有SR关联
			if ((isset ($this->bean->hat_asset_locations_id) == false || $this->bean->hat_asset_locations_id == "") && (isset ($_REQUEST['location_id']) && $_REQUEST['location_id'] != "") && (isset ($_REQUEST['hat_assets_id']) == false || $_REQUEST['hat_assets_id'] != "")) {
				//如果没有地点记录，并且传入了地点参数，并且没有资产参数时，从地点进行读取
				//如果有资产参数也同样跳过本段，从后续的资产数据中带出地点
				//

				echo "<H1>Location</h1>";
				$sel_current_location = "SELECT 
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
				                                                and hat_asset_locations.id ='" . $_REQUEST['location_id'] . "'";

				//echo($sel_current_asset);
				$resule_locations = $db->query($sel_current_location);

				while ($resule_asset = $db->fetchByAssoc($resule_locations)) {
					$this->bean->hat_asset_locations_id = $resule_asset['location_id'];
					$this->bean->location = $resule_asset['location_name'];
					$this->bean->location_title = $resule_asset['location_title'];
					$this->bean->site = $resule_asset['site_name'];
					$this->bean->ham_maint_sites_id = $resule_asset['site_id'];
				}
			} else
				if (isset ($this->bean->hat_asset_locations_id) && $this->bean->hat_asset_locations_id != "") {
					//否则查询数据库，读取地点说明
					$sel_current_location = "SELECT 
					                                        hat_asset_locations.location_title location_title
					                                    FROM
					                                        hat_asset_locations
					                                    WHERE
					                                        hat_asset_locations.id ='" . $this->bean->hat_asset_locations_id . "'";
					//echo($sel_current_location);
					$resule_locations = $db->query($sel_current_location);
					while ($resule_asset = $db->fetchByAssoc($resule_locations)) {
						$this->bean->location_title = $resule_asset['location_title'];
					}
				}
			if ((isset ($this->bean->hat_assets_id) == false || $this->bean->hat_assets_id == "") && (isset ($_REQUEST['hat_assets_id']) && $_REQUEST['hat_assets_id'] != "")) { //如果没有资产，并且有资产传传入，则加载资产

				$sel_current_asset = "SELECT
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
				                        and hat_assets.id = '" . $_REQUEST['hat_assets_id'] . "'";

				//echo($sel_current_asset);
				$resule_assets = $db->query($sel_current_asset);

				while ($resule_asset = $db->fetchByAssoc($resule_assets)) {
					$this->bean->hat_assets_id = $resule_asset['asset_id'];
					$this->bean->asset = $resule_asset['asset_name'];
					$this->bean->asset_desc = $resule_asset['asset_desc'];
					$this->bean->hat_asset_locations_id = $resule_asset['location_id'];
					$this->bean->location_title = $resule_asset['location_title'];
					$this->bean->location = $resule_asset['location_name'];
					$this->bean->location_desc = $resule_asset['location_desc'];
					$this->bean->site = $resule_asset['site_name'];
					$this->bean->ham_maint_sites_id = $resule_asset['site_id'];
					// $this->bean->location_map_enabled = $resule_asset['location_map_enabled'];
				}
			} else
				if (isset ($this->bean->hat_assets_id) && $this->bean->hat_assets_id != "") {
					$sel_current_asset = "SELECT
					                                        hat_assets.asset_desc
					                                    FROM
					                                        hat_assets
					                                    WHERE
					                                        hat_assets.deleted = 0
					                    and hat_assets.id = '" . $this->bean->hat_assets_id . "'";

					//echo($sel_current_asset);
					$resule_assets = $db->query($sel_current_asset);

					while ($resule_asset = $db->fetchByAssoc($resule_assets)) {
						$this->bean->asset_desc = $resule_asset['asset_desc'];
						// $this->bean->location_map_enabled = $resule_asset['location_map_enabled'];
					}
				}

			//完成显示资产明细

			//加载传入到JS中的变量
			echo "<script>";
			if (isset ($this->bean->source_type) && $this->bean->source_type == "SR") {
				echo 'var source_type="SR";';
			} else {
				echo 'var source_type="MANUAL";';
			}
			if (isset ($this->bean->asset_desc)) {
				echo 'var js_var_asset_desc="' . $this->bean->asset_desc . '";';
			}
			if (isset ($this->bean->location_title)) {
				echo 'var js_var_location_title="' . $this->bean->location_title . '";';
			}
			echo "</script>";
		}
		/**
		 * 3、判断是否来自合同的，如果来源于合同则显示合同字段信息
		 * modify by yuan.chen 2016-09-07
		 */
		if (isset ($_GET['contract_id']) && $_GET['contract_id'] != "") {
			$contract_id= $_GET['contract_id'];
			if(!empty($contract_id)){
				$this->bean->contract_id=$contract_id;
				$contract_bean = BeanFactory :: getBean('AOS_Contracts')->retrieve_by_string_fields(array (
									'id' => $contract_id
								));
				$this->bean->contract=$contract_bean->name;
				$this->bean->source_type='Contracts';
				//$this->bean->saveContracts(false);
			}
		}

		/**
		 * 4、初始化工作单编号等字段
		 * modify by toney.wu 2016-09-07
		 */

    	$wo_num_html="";
		if(empty($this->bean->wo_number)){
			//如果当前工作单号为空，则返回自动编号标签
			$wo_num_html=$mod_strings['LBL_AUTONUM'].'<input type="hidden" value="" id="wo_number" name="wo_number">';
		} else {
			$wo_num_html=$this->bean->wo_number.'<input type="hidden" value="'.$this->bean->wo_number.'" id="wo_number" name="wo_number">';
		}
		$this->ss->assign('WO_NUMBER',$wo_num_html);

		//初始化目标开始与结束日期
		if(empty($this->bean->id)){
			$this->bean->date_target_start = date('Y-m-d H:i:s');
			$this->bean->date_target_finish = date('Y-m-d H:i:s');
		}
		//如果是工单复制的情况如何
		if(isset ($_REQUEST['isDuplicate'])&&$_REQUEST['isDuplicate']=="true"){
			$this->bean->wo_status='DRAFT';	
			$wo_num_html=$mod_strings['LBL_AUTONUM'].'<input type="hidden" value="" id="wo_number" name="wo_number">';
			$this->ss->assign('WO_NUMBER',$wo_num_html);
		}
		//工单来源于 工序完成 和点击工单完成的按钮
		if(isset($_REQUEST['fromWoop'])&&$_REQUEST['fromWoop']=='Y'){
			$this->bean->wo_status='COMPLETED';	
			$last_woop_bean = BeanFactory::getBean("HAM_WOOP",$_REQUEST['last_woop_id']);
			$timeDate = new TimeDate();
			global $current_user;
			if(!empty($last_woop_bean->date_actual_finish)){
				$localDate = $timeDate->to_display_date_time($last_woop_bean->date_actual_finish, true, true, $current_user);
				$this->bean->date_actual_finish=$localDate;
			}else{
				$localDate = $timeDate->to_display_date_time(time(), true, true, $current_user);
				$this->bean->date_actual_finish=$localDate;
			}	
			if(empty($this->bean->date_actual_start)){
				$localDate = $timeDate->to_display_date_time($this->bean->date_entered, true, true, $current_user);
				$this->bean->date_actual_start=$localDate;
			}
		}


		parent :: Display();
	} //end function

} //end class