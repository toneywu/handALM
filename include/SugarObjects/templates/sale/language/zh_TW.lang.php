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
  'LBL_MODULE_NAME' => '銷售',
  'LBL_MODULE_TITLE' => '銷售: 主頁',
  'LBL_SEARCH_FORM_TITLE' => '銷售查詢',
  'LBL_VIEW_FORM_TITLE' => '銷售查看',
  'LBL_LIST_FORM_TITLE' => '銷售列表',
  'LBL_SALE_NAME' => '銷售名稱:',
  'LBL_SALE' => '銷售:',
  'LBL_NAME' => '銷售名稱',
  'LBL_LIST_SALE_NAME' => '名稱',
  'LBL_LIST_ACCOUNT_NAME' => '帳戶名',
  'LBL_LIST_AMOUNT' => '數量',
  'LBL_LIST_DATE_CLOSED' => '結束',
  'LBL_LIST_SALE_STAGE' => '銷售階段',
  'LBL_ACCOUNT_ID'=>'帳戶 ID',
   'LBL_CURRENCY_ID'=>'貨幣 ID',
//DON'T CONVERT THESE THEY ARE MAPPINGS
  'db_sales_stage' => 'LBL_LIST_SALES_STAGE',
  'db_name' => 'LBL_NAME',
  'db_amount' => 'LBL_LIST_AMOUNT',
  'db_date_closed' => 'LBL_LIST_DATE_CLOSED',
//END DON'T CONVERT
  'UPDATE' => '銷售 - 貨幣 更新',
  'UPDATE_DOLLARAMOUNTS' => '更新美元數量',
  'UPDATE_VERIFY' => '驗證數量',
  'UPDATE_VERIFY_TXT' => '驗證銷售數量的值為有效的十進位數(僅包含數字0-9和小數點)',
  'UPDATE_FIX' => '修複數量',
  'UPDATE_FIX_TXT' => '根據此貨幣數量試著去新建一個有效的數量。任何被修改的數量都被保存在amount_backup資料庫欄位中。如果你運行到這裡發現了缺陷，不要在沒有從備份中恢復之前返回，因為這樣新的無效數據可能會覆蓋備份記錄。',
  'UPDATE_DOLLARAMOUNTS_TXT' => '為基於當前設置的匯率的銷售數量更新美元數量。這個值被用於計算圖形和列表視圖貨幣數量。',
  'UPDATE_CREATE_CURRENCY' => '創建新貨幣:',
  'UPDATE_VERIFY_FAIL' => '記錄驗證失敗:',
  'UPDATE_VERIFY_CURAMOUNT' => '貨幣數量:',
  'UPDATE_VERIFY_FIX' => '運行修複會給',
  'UPDATE_INCLUDE_CLOSE' => '包括關閉記錄',
  'UPDATE_VERIFY_NEWAMOUNT' => '新數量:',
  'UPDATE_VERIFY_NEWCURRENCY' => '新貨幣:',
  'UPDATE_DONE' => '已完成',
  'UPDATE_BUG_COUNT' => '已發現並準備修複的缺陷:',
  'UPDATE_BUGFOUND_COUNT' => '已發現的缺陷:',
  'UPDATE_COUNT' => '已更新的記錄:',
  'UPDATE_RESTORE_COUNT' => '記錄數量恢復:',
  'UPDATE_RESTORE' => '恢複數量',
  'UPDATE_RESTORE_TXT' => '從修複備份中恢複數量值。',
  'UPDATE_FAIL' => '不能更新 - ',
  'UPDATE_NULL_VALUE' => '數量為空值，請將其設為0 -',
  'UPDATE_MERGE' => '合併貨幣',
  'UPDATE_MERGE_TXT' => '合併多個貨幣為一個單一的貨幣。如果對同一貨幣有多個貨幣記錄，可以將它們合併為一個。這將同時合併其他模塊的貨幣記錄。',
  'LBL_ACCOUNT_NAME' => '帳戶名:',
  'LBL_AMOUNT' => '數量:',
  'LBL_AMOUNT_USDOLLAR' => '美元數:',
  'LBL_CURRENCY' => '貨幣:',
  'LBL_DATE_CLOSED' => '預期截至日期:',
  'LBL_TYPE' => '類型:',
  'LBL_CAMPAIGN' => '市場活動:',
  'LBL_LEADS_SUBPANEL_TITLE' => '潛在客戶',
  'LBL_PROJECTS_SUBPANEL_TITLE' => '項目管理',  
  'LBL_NEXT_STEP' => '下一步:',
  'LBL_LEAD_SOURCE' => '潛在客戶資源:',
  'LBL_SALES_STAGE' => '銷售階段:',
  'LBL_PROBABILITY' => '可能性(%):',
  'LBL_DESCRIPTION' => '描述:',
  'LBL_DUPLICATE' => '或為重覆銷售',
  'MSG_DUPLICATE' => '你要創建的銷售記錄可能和已有的記錄重覆。銷售記錄包含如下相似的名字。<br>點擊保存繼續創建這個新的銷售，或者點擊取消返回模塊並不保存本次銷售。',
  'LBL_NEW_FORM_TITLE' => '新建銷售',
  'LNK_NEW_SALE' => '創建銷售',
  'LNK_SALE_LIST' => '銷售',
  'ERR_DELETE_RECORD' => '必須為要刪除的銷售指定一個記錄號碼。',
  'LBL_TOP_SALES' => '我的首位開放銷售',
  'NTC_REMOVE_OPP_CONFIRMATION' => '你確定要從本銷售中移除此聯繫人嗎？',
	'SALE_REMOVE_PROJECT_CONFIRM' => '你確定要從本項目管理中移除此項銷售嗎？',
	'LBL_DEFAULT_SUBPANEL_TITLE' => '銷售',
	'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'活動',
	'LBL_HISTORY_SUBPANEL_TITLE'=>'歷史記錄',
    'LBL_RAW_AMOUNT'=>'原始數量',


    'LBL_CONTACTS_SUBPANEL_TITLE' => '聯繫人',
	'LBL_ASSIGNED_TO_NAME' => '分配給:',
	'LBL_LIST_ASSIGNED_TO_NAME' => '分配用戶姓名',
  'LBL_MY_CLOSED_SALES' => '我已結束的銷售',
  'LBL_TOTAL_SALES' => '銷售總匯',
  'LBL_CLOSED_WON_SALES' => '已結束的成功銷售',
  'LBL_ASSIGNED_TO_ID' =>'分配用戶編號',
  'LBL_CREATED_ID'=>'創建人編號',
  'LBL_MODIFIED_ID'=>'修改人編號',
  'LBL_MODIFIED_NAME'=>'修改人姓名',
  'LBL_SALE_INFORMATION'=>'銷售信息',
  'LBL_CURRENCY_NAME'=>'貨幣名稱',
  'LBL_CURRENCY_SYMBOL'=>'貨幣符號',
  'LBL_EDIT_BUTTON' => '編輯',
   'LBL_REMOVE' => '移除',


);

?>
