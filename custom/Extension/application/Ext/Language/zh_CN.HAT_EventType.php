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


$app_list_strings['moduleList']['HAT_EventType']='事件类型';
$app_list_strings['moduleListSingular']['HAT_EventType']='事件类型';

$app_list_strings['asset_trans_status']=array (
  'DRAFT' => '未提交',
  'SUBMITTED' => '提交',
  'APPROVED' => '已批准',
  'REJECTED' => '已拒绝',
  'CANCELED' => '取消',
  'CLOSED' => '结束',
  'TRANSACTED' => '已完成事务处理',
);

$app_list_strings['cux_event_type_option_list']=array (
  'LOCKED' => '禁止使用或修改此字段',
  'REQUIRED' => '必须修改',
  'OPTIONAL' => '任意，可按业务场景需要修改',
  'INVISIABLE' => '不可见',
);

$app_list_strings['cux_event_type_option2_list']=array (
  'LOCKED' => '禁止使用或修改此字段',
  'REQUIRED' => '必须修改',
  'OPTIONAL' => '任意，可按业务场景需要修改',
  'INVISIABLE' => '不可见',
  'EMPTY' => '清空',
);

$app_list_strings['hat_event_type_list']=array (
  'AT_MOVE' => '设备/资产事务处理',
  'NETWORK' => '网络资源事务处理',
  'SR' => '服务申请 SR',
  'WO' => '工作单 WO',
  'INV_IN' => '库存: 入库',
  'INV_OUT' => '库存: 出库',
  'INV_TRANSFER' => '库存: 库存转移',
  'INV_WO' => '库存: 向工单发料',
  'EVENT_MANAGER' => '事件管理',
  'INVOICE' => '发票',
  'REVENUE' => '收支计费项',
);


$app_list_strings['hat_asset_scope_list']=array (
  'ASSET' => '所有设备/资产',
  'IT' => 'IT设备',
  'RACK' => 'IT机柜',
);

$app_list_strings['hat_default_asset_list']=array (
  'NONE' => '无默认限制列表',
  'CURRENT_USING_ORG' => '当前使用组织',
  'WO_ASSET_TRANS' => '当前工单/已有的资产事务',
  'WO_IP_TRANS' => '当前工单/网络资源事务',
);