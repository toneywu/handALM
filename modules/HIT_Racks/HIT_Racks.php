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
require_once('modules/HIT_Racks/HIT_Racks_sugar.php');
class HIT_Racks extends HIT_Racks_sugar {


	function get_list_view_data(){
	//refer to the task module as an example
	//or refer to the asset module as the first customzation module with this feature
		global $action, $currentModule, $focus, $current_module_strings, $app_list_strings, $timedate;

		$HIT_Racks_fields = $this->get_list_view_array();

 		//计算机柜占用率
         global $db;
         if (!empty($this->id) && !empty($this->height)) {
            $sel_rack_allocation = "SELECT
                                hit_rack_allocations.height
                            FROM
                                hit_rack_allocations
                            WHERE
                                hit_rack_allocations.deleted =0
                                AND hit_rack_allocations.hit_racks_id ='".$this->id."'";
            $bean_rack_allocation =  $db-> query($sel_rack_allocation);
            $occupation_cnt=0;
            while ( $d_bean_rack_allocation= $db->fetchByAssoc($bean_rack_allocation) ) {
                   $occupation_cnt += $d_bean_rack_allocation['height'];
            }

         $HIT_Racks_fields['OCCUPATION'] = round($occupation_cnt/($this->height)*100)."% <div id='occupation_bar' style='border:#ccc 1px solid; height:1em; width:5em;display:inline-flex'><div id='occupation_bar_filled' style='background-color:#999; height:0.8em; width:".round($occupation_cnt/($this->height)*10/2,1)."em; display:block'></div> </div>"   ;
		}



        //读取资产相关的字段
        if(!empty($this->hat_assets_id)) {
            $bean_asset = BeanFactory::getBean('HAT_Assets',$this->hat_assets_id);
            $HIT_Racks_fields['STATUS'] = "<span class='color_tag color_asset_status_".$bean_asset->asset_status."'>".$app_list_strings['asset_status_list'][$bean_asset->asset_status]."</span>";
            $HIT_Racks_fields['HAT_ASSETS_ACCOUNTS_ID'] = $bean_asset->hat_assets_accountsaccounts_ida;
            $HIT_Racks_fields['HAT_ASSETS_ACCOUNTS_NAME']= $bean_asset->hat_assets_accounts_name;
            $HIT_Racks_fields['HAT_ASSET_LOCATIONS_ID'] = $bean_asset->hat_asset_locations_hat_assetshat_asset_locations_ida;
            $HIT_Racks_fields['HAT_ASSET_LOCATIONS'] = $bean_asset->hat_asset_locations_hat_assets_name;
        }
		return $HIT_Racks_fields;
	}


	function __construct(){
		parent::__construct();
	}
	
}
?>