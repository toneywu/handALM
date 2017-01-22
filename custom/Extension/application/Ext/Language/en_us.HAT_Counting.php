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


$app_list_strings['moduleList']['HAT_Counting_Batchs'] = 'Counting';
$app_list_strings['moduleList']['HAT_Counting_Batch_Rules'] = '盘点批规则';
$app_list_strings['moduleList']['HAT_Counting_Lines'] = 'Counting Lines';
$app_list_strings['moduleList']['HAT_Counting_Results'] = '盘点结果';
$app_list_strings['moduleList']['HAT_Counting_Rules'] = '盘点规则';
$app_list_strings['moduleList']['HAT_Counting_Rule_Dtls'] = '盘点规则明细';
$app_list_strings['moduleList']['HAT_Counting_Tasks'] = '盘点任务';
$app_list_strings['hat_counting_status_list']=array (
  'New' => '未开始',
  'Counting' => '盘点中',
  'Counted' => '已盘点',
  );
$app_list_strings['hat_counting_mode_list']=array (
  'SCAN' => '扫码群盘',
  'MANUAL' => '手动粗盘',
  'RECHECK' => '单个详盘',
  );
$app_list_strings['hat_counting_scene_list']=array (
  'Year' => '年度盘点',
  'Temp' => '临时盘点',
  );
$app_list_strings['hat_counting_task_status_list']=array (
  'New' => '未开始',
  'Counting' => '进行中',
  'Counted' => '已结束',
  );
$app_list_strings['hat_counting_adjust_method_list']=array (
  ''=>' ',
  'Retire' => '资产报废',
  'attrAdjust' => '资产属性变更',
  'Add' => '资产新增',
  );
$app_list_strings['hat_counting_adjust_status_list']=array (
  'Init' => '未处理',
  'Adjusting' => '差异调整中',
  'Processed' => '已调整',
  );
$app_list_strings['hat_counting_line_result_list']=array (
 ''=>' ',
 'Matched' => '帐实相符',
 'Different' => '盘点差异',
 'OverRage'=>'盘盈',
 'Loss'=>'盘亏'
 );
$app_list_strings['hat_counting_adjust_posted']=array (
  'N' => '否',
  'P' => '部分',
  'Y'=>'是',
  );
$app_list_strings['hat_counting_line_status_list']=array (
  'New' => '未开始',
  'Counting' => '进行中',
  'Counted' => '已结束',
  );
$app_list_strings['hat_counting_object_type_list']=array (
  'ASSETS' => '实物资产',
  'EQM' => '生产设备设施',
  'ADMIN' => '行政资产',
  'GENERAL' => '通用物资',
  'PRODUCT' => '生产物资',
  );

$app_list_strings['hat_counting_split_type']=array (
  'LOGIC' => '逻辑拆分',
  'CUSTOM' => '自定义',
  );

$app_list_strings['hat_counting_field_type']=array (
  'VARCHAR' => '字符',
  'NUMBER' => '数字',
  'DATE' => '日期',
  'LOV' => '值列表',
  'LIST' => '下拉框',
  'CHECKBOX' => '复选框',
  );

$app_list_strings['hat_counting_table_name']=array (
  'INV_TASKS' => '任务',
  'INV_TASK_DETAILS' => '清单',
  'INV_DETAIL_RESULTS' => '结果',
  );

$app_list_strings['hat_counting_column_name']=array (
  'attribute1' => 'Attribute1',
  'attribute2' => 'Attribute2',
  'attribute3' => 'Attribute3',
  'attribute4' => 'Attribute4',
  'attribute5' => 'Attribute5',
  'attribute6' => 'Attribute6',
  'attribute7' => 'Attribute7',
  'attribute8' => 'Attribute8',
  'attribute9' => 'Attribute9',
  'attribute10' => 'Attribute10',
  'attribute11' => 'Attribute11',
  'attribute12' => 'Attribute12',
  'attribute13' => 'Attribute13',
  'attribute14' => 'Attribute14',
  'attribute15' => 'Attribute15',
  'diff_flag1' => 'diffFlag1',
  'diff_flag2' => 'diffFlag2',
  'diff_flag3' => 'diffFlag3',
  'diff_flag4' => 'diffFlag4',
  'diff_flag5' => 'diffFlag5',
  'diff_flag6' => 'diffFlag6',
  'diff_flag7' => 'diffFlag7',
  'diff_flag8' => 'diffFlag8',
  'diff_flag9' => 'diffFlag9',
  'diff_flag10' => 'diffFlag10',
  'diff_flag11' => 'diffFlag11',
  'diff_flag12' => 'diffFlag12',
  'diff_flag13' => 'diffFlag13',
  'diff_flag14' => 'diffFlag14',
  'diff_flag15' => 'diffFlag15',
  );

