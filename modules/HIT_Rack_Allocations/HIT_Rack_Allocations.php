<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/HIT_Rack_Allocations/HIT_Rack_Allocations_sugar.php');
class HIT_Rack_Allocations extends HIT_Rack_Allocations_sugar {
	
	function get_list_view_data(){
	//refer to the task module as an example
	//or refer to the asset module as the first customzation module with this feature
	//global $action, $currentModule, $focus, $current_module_strings, $app_list_strings, $timedate;
	
	global $app_list_strings;
		$asset_fields = $this->get_list_view_array();

		if (!empty($this->asset_status))
			$asset_fields['ASSET_STATUS'] = "<span class='color_tag color_asset_status_{$this->asset_status}'>".$app_list_strings['asset_status_list'][$this->asset_status]."</span>";


		global $db;
	    if(!empty($this->hat_assets_id)) {
	        $sel_account = "SELECT 
							    accounts.name, accounts.id
							FROM
							    accounts,
							    hat_assets_accounts_c
							WHERE
							    accounts.id = hat_assets_accounts_c.hat_assets_accountsaccounts_ida
							        AND accounts.deleted = 0
							        AND hat_assets_accounts_c.deleted = 0
							        AND hat_assets_accounts_c.hat_assets_accountshat_assets_idb ='".$this->hat_assets_id."'";

	        $bean_account =  $db-> query($sel_account);
	        while ( $d_bean_account = $db->fetchByAssoc($bean_account) ) {
	                $asset_fields['HAT_ASSETS_ACCOUNTS'] = $d_bean_account['name'];
	                $asset_fields['HAT_ASSETS_ACCOUNTS_ID'] = $d_bean_account['id'];
	        }
	    }

		return $asset_fields;
	}


	function save($check_notify=false){
		//如果启用了同步更新父资产，则自动同步父资产
		//注意：这种方式直接更新了资产数据，没有资产事务处理记录。

    	if ($this->sync_parent_enabled==1) {
    		$bean_asset = BeanFactory::getBean('HAT_Assets',$this->hat_assets_id);
    		$bean_rack  = BeanFactory::getBean('HIT_Racks',$this->hit_racks_id);
			$bean_asset ->parent_asset_id = $bean_rack->hat_assets_id;
			$bean_asset->save();
	    }

		parent::save($check_notify); //保存主体

	}

	function __construct(){
		parent::__construct();
	}
	
}
?>