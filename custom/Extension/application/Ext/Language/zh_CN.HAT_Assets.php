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


$app_list_strings['moduleList']['HAT_Assets'] = '资产';
$app_list_strings['moduleList']['HAT_Asset_Locations'] = '资产位置';
$app_list_strings['moduleList']['HAT_Asset_Trans'] = '资产事务处理行';
$app_list_strings['moduleList']['HAT_Asset_Trans_Batch'] = '资产事务处理单';


$app_list_strings['hat_asset_status_list']=array (
  ''=>'',
  'Ordered' => '购置未交付',
  'Received' => '已收货未启用',
  'InService' => '在用中',
  'Idle' => '空闲/可用',
  'Stocked' => '空闲/库存',
  'TempOut' => '外部',
  'OutOfService' => '已退役',
  'Discard' => '已处置/迁出',
);

$GLOBALS['app_list_strings']['hat_asset_source_type_list']=array (
  'PURCHASE' => '购置',
  'DONATE' => '捐赠获得',
  'BUILD' => '建造/开发',
  'COUNTING' => '盘盈',
  'INTERNAL' => '内部调配',
  'OTHER' => '其它',
  'LEASE' => '经营租赁',
  'BORROW' => '临时借入',
);

$GLOBALS['app_list_strings']['asset_criticality_list']=array (
  '' => '',
  'A' => 'A',
  'B' => 'B',
  'C' => 'C',
  'OTHER' => 'Other',
);


$app_list_strings['hat_map_marker_type_list']=array (
    'POINT' => '坐标点',
    'RECTANGLE' => '矩形区域',
    'CIRCLE' => '圆形区域',
    'POLYGON' => '多边形区域',
    'POLYLINE' => '线性',
);

$app_list_strings['hat_navigator_tree_type_list']=array (
    'TREE_LOCATON' => '功能位置树',
    'OWNING_ORG' => '设备/资产的所属组织',
    'USING_ORG' => '设备/资产的使用组织',
    'PRODUCT' => '产品分类及资产组',
    'CATEGORY' => '资产分类',
);