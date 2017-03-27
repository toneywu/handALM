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


$app_list_strings['moduleList']['HAT_Assets'] = 'Assets';
$app_list_strings['moduleList']['HAT_Asset_Locations'] = 'Asset Locations';
$app_list_strings['moduleList']['HAT_Asset_Trans'] = 'Asset Transactions';
$app_list_strings['moduleList']['HAT_Asset_Trans_Batch'] = 'Asset Transaction Batch';

$app_list_strings['hat_asset_status_list']=array (
  ''=>'',
  'Ordered' => 'Ordered',
  'Received' => 'Not Ready',
  'Stocked' => 'Stocked',
  'Idle' => 'Idle/Ready',
  'PreAssigned' => 'PreAssigned',
  'InService' => 'Operating',
  'TempOut' => 'Outside',
  'OutOfService' => 'Decom.',
  'Discard' => 'Decom. & Removed',
);

$app_list_strings['hat_asset_source_type_list']=array (  
    'PURCHASE' => 'Purchase Contract/Order',
    'DONATE' => 'Donated',
    'BUILD' => 'Built',
    'COUNTING' => 'Counting Profit',
    'INTERNAL' => 'Internal Transfer',
    'OTHER' => 'Other',
    'LEASE' => 'Leased',
    'BORROW' => 'Borrowed',
);
$app_list_strings['hat_asset_type_list']=array (
  ''=>'',
  'IT_PORT' => 'IT可联网设备',
  'RACK_ALL' => '机柜（全部）',
  'RACK_NOT_ENABLE_PARTIAL' => '机柜（整柜）',
  'RACK_ENABLE_PARTIAL' => '机柜（散U）',
);

$app_list_strings['asset_criticality_list']=array (
  '' => '',
  'A' => 'A',
  'B' => 'B',
  'C' => 'C',
  'OTHER' => 'Other',
);


$app_list_strings['hat_map_marker_type_list']=array (
    'POINT' => 'point',
    'CIRCLE' => 'circle area',
    'POLYGON' => 'polygon area',
    'POLYLINE' => 'polyline area',
    'RECTANGLE' => 'rectangle area',
);

$app_list_strings['hat_navigator_tree_type_list']=array (
    'TREE_LOCATON' => 'Functional Location',
    'OWNING_ORG' => 'Owining Orgnaization',
    'USING_ORG' => 'Using Orgnaization',
    'PRODUCT' => 'Category and Asset Group',
    'CATEGORY' => 'Asset Category',
);