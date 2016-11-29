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
        global $db;

		$HIT_Racks_fields = $this->get_list_view_array();
        require_once('modules/HIT_Racks/ServerChart.php');
        $HIT_Racks_fields['OCCUPATION'] = getOccupationCnt($this);


        $sql_string ="SELECT
                          hat_assets.`using_org_id` using_org_id,
                          accounts.name using_org_name,
                          hat_asset_locations.`name` location_name,
                          hat_asset_locations.`id` location_id,
                          hat_assets.asset_status,
                          hat_assets.owning_org_id
                        FROM
                          hit_racks, hat_assets
                          LEFT JOIN (
                              hat_asset_locations_hat_assets_c,
                              hat_asset_locations
                            )
                            ON (
                              hat_asset_locations_hat_assets_c.`hat_asset_locations_hat_assetshat_assets_idb` = hat_assets.id
                              AND hat_asset_locations_hat_assets_c.`hat_asset_locations_hat_assetshat_asset_locations_ida` = hat_asset_locations.`id`
                              AND hat_asset_locations.`deleted` = 0
                            )
                          LEFT JOIN accounts
                            ON accounts.id = hat_assets.`using_org_id`
                          WHERE hit_racks.`hat_assets_id` = hat_assets.id
                            AND hit_racks.id='".$this->id."'";


        $get_sql_results =  $db-> query($sql_string);//加载所有
        while ( $sql_result = $db->fetchByAssoc($get_sql_results) ) {
                $HIT_Racks_fields['HAT_ASSET_LOCATIONS_ID'] = $sql_result['location_id'];
                $HIT_Racks_fields['HAT_ASSET_LOCATIONS'] = $sql_result['location_name'];
                $HIT_Racks_fields['HAT_ASSET_USING_ORG'] = $sql_result['using_org_name'];
                $HIT_Racks_fields['HAT_ASSET_USING_ORG_ID'] = $sql_result['using_org_id'];
                $HIT_Racks_fields['STATUS'] = "<span class='color_tag color_asset_status_".$sql_result['asset_status']."'>".$app_list_strings['hat_asset_status_list'][$sql_result['asset_status']]."</span>";

            if($sql_result['using_org_id'] && ($sql_result['using_org_id'] ==$sql_result['owning_org_id'] ))
                $HIT_Racks_fields['HAT_ASSET_OWNING_ORG_USING'] =  translate('LBL_SEARCH_DROPDOWN_YES','app_list_strings');

        }

		return $HIT_Racks_fields;
	}

    function save($check_notify = false) {
        //在保存之前，先创建一个资产
        if (empty($this->hat_assets_id)) {
            $asset = BeanFactory::getBean('HAT_Assets'); //新增资产
            $asset->id = create_guid();
            $asset->new_with_id = true;
        } else {
            $asset = BeanFactory::getBean('HAT_Assets',$this->hat_assets_id); //更新已有资产信息
        }

        $asset->haa_frameworks_id = $this->haa_frameworks_id;
        $asset->name = $this->asset_number;//asset_tag
        $asset->asset_number = $this->asset_number;//asset_number
        $asset->asset_desc = $this->name;
        $asset->aos_products_id = $this->aos_products_id;

        $asset->hat_asset_locations_hat_assetshat_asset_locations_ida = $this->asset_location_id;

        $asset->supplier_org_id = $this->supplier_org_id;
        $asset->supplier_desc = $this->supplier_desc;
        $asset->asset_source_type = $this->asset_source_type;
        $asset->asset_source_id = $this->asset_source_id;
        $asset->asset_source_ref = $this->asset_source_ref;
        $asset->asset_status = $this->asset_status;
        $asset->using_org_id = $this->using_org_id;
        $asset->owning_org_id = $this->owning_org_id;
        $asset->owning_person_desc = $this->owning_person_desc;
        $asset->owning_person_id = $this->owning_person_id;
        $asset->using_person_desc = $this->using_person_desc;
        $asset->using_person_id = $this->using_person_id;
        $asset->enable_it_rack = true;
        $asset->maintainable = true;
        $asset->start_date = $this->start_date;
        $asset->received_date = $this->received_date;
        $asset->dismiss_date = $this->dismiss_date;

        if (isset($asset->aos_products_id)) {
            //以下数据更新只进行一次，如果保存后确定了资产组关系后，就不再更新。
            //也就是说用户可以在资产上更新这些字段，而需要永远与资产组保持一致
            $asset_group = BeanFactory::getBean('AOS_Products',$asset->aos_products_id); //将分类等值直接从Product上进行复制
            $asset->asset_name = $asset_group->name;
            $asset->asset_icon = $asset_group->icon_c;
            $asset->aos_product_categories_id = $asset_group->aos_product_category_id;//产品分类
            $asset->enable_fa = $asset_group->enable_fa_c;//FA标志
            $asset->asset_criticality = $asset_group->asset_criticality_c;//重要性
        }

        $asset->save();

        //将当前的机柜对应到新创建的设备资产上
        $this->hat_assets_id = $asset->id;

        parent :: save($check_notify); //保存RACK
    }

	function __construct(){
		parent::__construct();
	}

}
?>