<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

/*********************************************************************************

 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$mod_strings = array (
  'LBL_MODULE_NAME' => '任务',
  'LBL_TASK' => '任务',
  'LBL_MODULE_TITLE' => '任务',
  'LBL_SEARCH_FORM_TITLE' => '查找任务',
  'LBL_LIST_FORM_TITLE' => '任务列表',
  'LBL_NEW_FORM_TITLE' => '新建任务',
  'LBL_NEW_FORM_SUBJECT' => '主题',
  'LBL_NEW_FORM_DUE_DATE' => '截止日期',
  'LBL_NEW_FORM_DUE_TIME' => '截止时间',
  'LBL_NEW_TIME_FORMAT' => '(24:00)',
  'LBL_LIST_CLOSE' => '关闭',
  'LBL_LIST_SUBJECT' => '主题',
  'LBL_LIST_CONTACT' => '联系人',
  'LBL_LIST_PRIORITY' => '优先级',
  'LBL_LIST_RELATED_TO' => '关联到',
  'LBL_LIST_DUE_DATE' => '截止日期',
  'LBL_LIST_DUE_TIME' => '截止时间',
  'LBL_SUBJECT' => '主题',
  'LBL_STATUS' => '状态',
  'LBL_DUE_DATE' => '截止日期',
  'LBL_DUE_TIME' => '截止时间',
  'LBL_PRIORITY' => '优先级',
  'LBL_COLON' => ':',
  'LBL_DUE_DATE_AND_TIME' => '截止日期&时间',
  'LBL_START_DATE_AND_TIME' => '开始日期&时间',
  'LBL_START_DATE' => '开始日期',
  'LBL_LIST_START_DATE' => '开始日期',
  'LBL_START_TIME' => '开始时间',
  'LBL_LIST_START_TIME' => '开始时间',
  'DATE_FORMAT' => '(年-月-日)',
  'LBL_NONE' => '无',
  'LBL_CONTACT' => '联系人',
  'LBL_EMAIL_ADDRESS' => '邮件地址',
  'LBL_PHONE' => '电话',
  'LBL_EMAIL' => '邮件地址',
  'LBL_DESCRIPTION_INFORMATION' => '说明信息',
  'LBL_DESCRIPTION' => '说明',
  'LBL_NAME' => '名称',
  'LBL_CONTACT_NAME' => '联系人姓名',
  'LBL_LIST_COMPLETE' => '完成',
  'LBL_LIST_STATUS' => '状态',
  'LBL_DATE_DUE_FLAG' => '非截止日期',
  'LBL_DATE_START_FLAG' => '非开始日期',
  'ERR_DELETE_RECORD' => '必须指定记录编号才能删除联系人。',
  'ERR_INVALID_HOUR' => '请输入0到24之间的小时数',
  'LBL_DEFAULT_PRIORITY' => '中',
  'LBL_LIST_MY_TASKS' => '我要完成的任务',
  'LNK_NEW_TASK' => '新建任务',
  'LNK_TASK_LIST' => '查看任务',
  'LNK_IMPORT_TASKS' => '导入任务',
  'LBL_CONTACT_FIRST_NAME'=>'联系人的名',
  'LBL_CONTACT_LAST_NAME'=>'联系人的姓',
  'LBL_LIST_ASSIGNED_TO_NAME' => '负责人',
  'LBL_ASSIGNED_TO_NAME'=>'负责人',
  'LBL_LIST_DATE_MODIFIED' => '修改日期',
  'LBL_CONTACT_ID' => '联系人ID',
  'LBL_PARENT_ID' => '上级ID',
  'LBL_CONTACT_PHONE' => '联系人电话',
  'LBL_PARENT_NAME' => '上级类型',
  'LBL_ACTIVITIES_REPORTS' => '活动报表',
  'LBL_TASK_INFORMATION' => '任务概述',
  'LBL_EDITLAYOUT' => '编辑布局' /*for 508 compliance fix*/,
  'LBL_HISTORY_SUBPANEL_TITLE' => '备忘录',
  //For export labels
  'LBL_DATE_DUE' => '截止日期',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => '负责人',
  'LBL_EXPORT_ASSIGNED_USER_ID' => '负责人ID',
  'LBL_EXPORT_MODIFIED_USER_ID' => '修改人ID',
  'LBL_EXPORT_CREATED_BY' => '创建人ID',
  'LBL_EXPORT_PARENT_TYPE' => '关联到模块',
  'LBL_EXPORT_PARENT_ID' => '关联ID',
  'LBL_RELATED_TO' => '关联到',
);


?>
