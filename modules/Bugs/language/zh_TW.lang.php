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
  'LBL_MODULE_NAME' => '缺陷追蹤',
  'LBL_MODULE_TITLE' => '缺陷追蹤:首頁',
  'LBL_MODULE_ID' => '缺陷',
  'LBL_SEARCH_FORM_TITLE' => '查找缺陷',
  'LBL_LIST_FORM_TITLE' => '缺陷列表',
  'LBL_NEW_FORM_TITLE' => '新增缺陷',
  'LBL_CONTACT_BUG_TITLE' => '聯繫人-缺陷:',
  'LBL_SUBJECT' => '主題:',
  'LBL_BUG' => '缺陷:',
  'LBL_BUG_NUMBER' => '編號:',
  'LBL_NUMBER' => '編號:',
  'LBL_STATUS' => '狀態:',
  'LBL_PRIORITY' => '優先順序:',
  'LBL_DESCRIPTION' => '說明:',
  'LBL_CONTACT_NAME' => '聯繫人姓名:',
  'LBL_BUG_SUBJECT' => '缺陷主題:',
  'LBL_CONTACT_ROLE' => '角色:',
  'LBL_LIST_NUMBER' => '編號',
  'LBL_LIST_SUBJECT' => '主題',
  'LBL_LIST_STATUS' => '狀態',
  'LBL_LIST_PRIORITY' => '優先順序',
  'LBL_LIST_RELEASE' => '版本',
  'LBL_LIST_RESOLUTION' => '分析',
  'LBL_LIST_LAST_MODIFIED' => '最新修改',
  'LBL_INVITEE' => '聯繫人',
  'LBL_TYPE' => '類型:',
  'LBL_LIST_TYPE' => '類型',
  'LBL_RESOLUTION' => '分析:',
  'LBL_RELEASE' => '版本:',
  'LNK_NEW_BUG' => '彙報缺陷',
  'LNK_BUG_LIST' => '缺陷',
  'NTC_REMOVE_INVITEE' => '您確定要從這個缺陷中移除這個聯繫人?',
  'NTC_REMOVE_ACCOUNT_CONFIRMATION' => '您確定要從這個客戶中移除這個缺陷?',
  'ERR_DELETE_RECORD' => '必須指定記錄編號才能刪除缺陷。',
  'LBL_LIST_MY_BUGS' => '指派給我的缺陷',
  'LNK_IMPORT_BUGS' => '導入缺陷',
  'LBL_FOUND_IN_RELEASE' => '發現缺陷的版本:',
  'LBL_FIXED_IN_RELEASE' => '將被修正的版本:',
  'LBL_LIST_FIXED_IN_RELEASE' => '將被修正的版本',
  'LBL_WORK_LOG' => '工作記錄',
  'LBL_SOURCE' => '來源:',
  'LBL_PRODUCT_CATEGORY' => '類別:',

  'LBL_CREATED_BY' => '創建人:',
  'LBL_DATE_CREATED' => '創建日期:',
  'LBL_MODIFIED_BY' => '最後更新者:',
  'LBL_DATE_LAST_MODIFIED' => '更新日期:',

  'LBL_LIST_EMAIL_ADDRESS' => '電子郵件',
  'LBL_LIST_CONTACT_NAME' => '聯繫人姓名',
  'LBL_LIST_ACCOUNT_NAME' => '客戶名稱',
  'LBL_LIST_PHONE' => '電話',
  'NTC_DELETE_CONFIRMATION' => '您確定要從這個缺陷中移除這個聯繫人?',

  'LBL_DEFAULT_SUBPANEL_TITLE' => '缺陷追蹤',
  'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'活動',
  'LBL_HISTORY_SUBPANEL_TITLE'=>'歷史記錄',
  'LBL_CONTACTS_SUBPANEL_TITLE' => '聯繫人',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => '客戶',
  'LBL_CASES_SUBPANEL_TITLE' => '客戶反饋',
  'LBL_PROJECTS_SUBPANEL_TITLE' => '工程',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => '文檔',
  'LBL_SYSTEM_ID' => '系統編號',
  'LBL_LIST_ASSIGNED_TO_NAME' => '負責人',
	'LBL_ASSIGNED_TO_NAME' => '負責人姓名',

	'LBL_BUG_INFORMATION' => '缺陷概覽',

    //For export labels
	'LBL_FOUND_IN_RELEASE_NAME' => '發現缺陷的版本',
    'LBL_PORTAL_VIEWABLE' => 'Portal Viewable',
    'LBL_EXPORT_ASSIGNED_USER_NAME' => '負責人姓名',
    'LBL_EXPORT_ASSIGNED_USER_ID' => '負責人ID',
    'LBL_EXPORT_FIXED_IN_RELEASE_NAMR' => '修複缺陷的版本',
    'LBL_EXPORT_MODIFIED_USER_ID' => '修改人ID',
    'LBL_EXPORT_CREATED_BY' => '創建人ID',


  );
?>
