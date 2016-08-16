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
  'LBL_MODULE_NAME' => '任務',
  'LBL_TASK' => '任務:',
  'LBL_MODULE_TITLE' => '任務:首頁',
  'LBL_SEARCH_FORM_TITLE' => '查找任務',
  'LBL_LIST_FORM_TITLE' => '任務列表',
  'LBL_NEW_FORM_TITLE' => '新增任務',
  'LBL_NEW_FORM_SUBJECT' => '主題:',
  'LBL_NEW_FORM_DUE_DATE' => '完成日期:',
  'LBL_NEW_FORM_DUE_TIME' => '開始時間:',
  'LBL_NEW_TIME_FORMAT' => '(24:00)',
  'LBL_LIST_CLOSE' => '關閉',
  'LBL_LIST_SUBJECT' => '主題',
  'LBL_LIST_CONTACT' => '聯繫人',
  'LBL_LIST_PRIORITY' => '優先順序',
  'LBL_LIST_RELATED_TO' => '相關',
  'LBL_LIST_DUE_DATE' => '完成日期',
  'LBL_LIST_DUE_TIME' => '完成時間',
  'LBL_SUBJECT' => '主題:',
  'LBL_STATUS' => '狀態:',
  'LBL_DUE_DATE' => '完成日期:',
  'LBL_DUE_TIME' => '開始時間:',
  'LBL_PRIORITY' => '優先順序:',
  'LBL_COLON' => ':',
  'LBL_DUE_DATE_AND_TIME' => '完成日期和時間:',
  'LBL_START_DATE_AND_TIME' => '開始日期和時間:',
  'LBL_START_DATE' => '開始日期:',
  'LBL_LIST_START_DATE' => '開始日期',
  'LBL_START_TIME' => '開始時間:',
  'LBL_LIST_START_TIME' => '開始時間',
  'DATE_FORMAT' => '(年-月-日)',
  'LBL_NONE' => '無',
  'LBL_CONTACT' => '聯繫人:',
  'LBL_EMAIL_ADDRESS' => '郵件地址:',
  'LBL_PHONE' => '電話:',
  'LBL_EMAIL' => '電子郵件:',
  'LBL_DESCRIPTION_INFORMATION' => '說明信息',
  'LBL_DESCRIPTION' => '說明:',
  'LBL_NAME' => '名稱:',
  'LBL_CONTACT_NAME' => '聯繫人姓名:',
  'LBL_LIST_COMPLETE' => '完成:',
  'LBL_LIST_STATUS' => '狀態',
  'LBL_DATE_DUE_FLAG' => '未完成日期',
  'LBL_DATE_START_FLAG' => '未開始日期',
  'ERR_DELETE_RECORD' => '必須指定記錄編號才能刪除客戶。',
  'ERR_INVALID_HOUR' => '請輸入0到24之間的小時數',
  'LBL_DEFAULT_PRIORITY' => '中',
  'LBL_LIST_MY_TASKS' => '我要完成的任務',
  'LNK_NEW_TASK' => '新增任務',
  'LNK_TASK_LIST' => '任務',
  'LNK_IMPORT_TASKS' => '導入任務',
  'LBL_CONTACT_FIRST_NAME'=>'聯繫人的名:',
  'LBL_CONTACT_LAST_NAME'=>'聯繫人的姓:',
  'LBL_LIST_ASSIGNED_TO_NAME' => '負責人',
  'LBL_ASSIGNED_TO_NAME'=>'負責人:',
  'LBL_LIST_DATE_MODIFIED' => '修改日期',
  'LBL_CONTACT_ID' => '聯繫人ID:',
  'LBL_PARENT_ID' => '上級ID:',
  'LBL_CONTACT_PHONE' => '聯繫電話:',
  'LBL_PARENT_NAME' => '上級類型:',
  'LBL_ACTIVITIES_REPORTS' => '活動報表',
  'LBL_TASK_INFORMATION' => '任務信息',
  'LBL_EDITLAYOUT' => '編輯佈局' /*for 508 compliance fix*/,
  'LBL_HISTORY_SUBPANEL_TITLE' => '備忘錄',
  //For export labels
  'LBL_DATE_DUE' => '到期日期',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => '負責人姓名',
  'LBL_EXPORT_ASSIGNED_USER_ID' => '負責人ID',
  'LBL_EXPORT_MODIFIED_USER_ID' => '修改人ID',
  'LBL_EXPORT_CREATED_BY' => '創建人ID',
  'LBL_EXPORT_PARENT_TYPE' => '關聯到模塊',
  'LBL_EXPORT_PARENT_ID' => '關聯ID',
  'LBL_RELATED_TO' => 'Related to:',
);


?>
