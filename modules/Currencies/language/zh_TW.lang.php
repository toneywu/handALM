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
  'LBL_MODULE_NAME' => '貨幣',
  'LBL_LIST_FORM_TITLE' => '貨幣',
  'LBL_CURRENCY' => '貨幣',
  'LBL_ADD' => '增加',
  'LBL_MERGE' => '合併',
  'LBL_MERGE_TXT' => '請檢查您希望與選擇貨幣對應的貨幣，這將會刪除所有貨幣信息接著從選擇的貨幣重新指定。',
  'LBL_US_DOLLAR' => '美元',
  'LBL_DELETE' => '刪除',
  'LBL_LIST_SYMBOL' => '貨幣符號',
  'LBL_LIST_NAME' => '貨幣名稱',
  'LBL_LIST_ISO4217' => 'ISO4217編碼',
  'LBL_LIST_ISO4217_HELP' => '輸入3個字母的ISO 4217貨幣名稱代碼和貨幣符號。',
  'LBL_UPDATE' => '更新',
  'LBL_LIST_RATE' => '匯率',
  'LBL_LIST_RATE_HELP' => '歐元轉換匯率0.5表示 10 USD = 5 Euro。',
  'LBL_LIST_STATUS' => '狀態',
  'LNK_NEW_CONTACT' => '新增聯繫人',
  'LNK_NEW_ACCOUNT' => '新增客戶',
  'LNK_NEW_OPPORTUNITY' => '新增商業機會',
  'LNK_NEW_CASE' => '新增客戶反饋',
  'LNK_NEW_NOTE' => '新增備忘錄',
  'LNK_NEW_CALL' => '新增電話',
  'LNK_NEW_EMAIL' => '新增電子郵件',
  'LNK_NEW_MEETING' => '新增會議',
  'LNK_NEW_TASK' => '新增任務',
  'NTC_DELETE_CONFIRMATION' => '您確定要刪除這條記錄?建議您可以先停用這條記錄，否則所有的記錄在存取時都會轉換為美元。',
  'LBL_BELOW_MIN' => '轉換率必須大於0',
  'currency_status_dom' => 
  array (
    'Active' => '啟用',
    'Inactive' => '停用',
  ),
  'LBL_CREATED_BY' => '創建人',
	'LBL_EDIT_LAYOUT' => '編輯佈局' /*for 508 compliance fix*/,
);


?>