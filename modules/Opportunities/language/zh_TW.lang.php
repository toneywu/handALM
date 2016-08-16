<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2016 Salesagility Ltd.
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

$mod_strings = array(
    'LBL_MODULE_NAME' => '商業機會',
    'LBL_MODULE_TITLE' => '商業機會:首頁',
    'LBL_SEARCH_FORM_TITLE' => '查找商業機會',
    'LBL_VIEW_FORM_TITLE' => '商業機會視圖',
    'LBL_LIST_FORM_TITLE' => '商業機會列表',
    'LBL_OPPORTUNITY_NAME' => '商業機會名稱:',
    'LBL_OPPORTUNITY' => '商業機會:',
    'LBL_NAME' => '商業機會名稱',
    'LBL_INVITEE' => '聯繫人',
    'LBL_CURRENCIES' => '貨幣',
    'LBL_LIST_OPPORTUNITY_NAME' => '商業機會',
    'LBL_LIST_ACCOUNT_NAME' => '客戶名稱',
    'LBL_LIST_AMOUNT' => '金額',
    'LBL_LIST_AMOUNT_USDOLLAR' => '數量',
    'LBL_LIST_DATE_CLOSED' => '關閉',
    'LBL_LIST_SALES_STAGE' => '銷售階段',
    'LBL_ACCOUNT_ID' => '客戶編號',
    'LBL_CURRENCY_ID' => '貨幣編號',
    'LBL_CURRENCY_NAME' => '貨幣名稱',
    'LBL_CURRENCY_SYMBOL' => '貨幣符號',
//DON'T CONVERT THESE THEY ARE MAPPINGS
    'db_sales_stage' => 'LBL_LIST_SALES_STAGE',
    'db_name' => 'LBL_NAME',
    'db_amount' => 'LBL_LIST_AMOUNT',
    'db_date_closed' => 'LBL_LIST_DATE_CLOSED',
//END DON'T CONVERT
    'UPDATE' => '商業機會-貨幣更新',
    'UPDATE_DOLLARAMOUNTS' => '更新美元金額',
    'UPDATE_VERIFY' => '確認金額',
    'UPDATE_VERIFY_TXT' => '確認商業機會中的金額欄位都是數字與小數點的組合。',
    'UPDATE_FIX' => '修改金額',
    'UPDATE_FIX_TXT' => '嘗試從目前的金額新增正確的數字來修改任何錯誤的金額，原有的資料會備份到amount_backup欄位，如果您執行過程中發現任何錯誤，記得在重新執行前先將備份的數值還原，避免備份的數值也跟著出錯。',
    'UPDATE_DOLLARAMOUNTS_TXT' => '通過目前的匯率來更新商業機會的美元金額，這個數值用來計算圖片與貨幣金額瀏覽列表',
    'UPDATE_CREATE_CURRENCY' => '新增貨幣:',
    'UPDATE_VERIFY_FAIL' => '確認錯誤的記錄:',
    'UPDATE_VERIFY_CURAMOUNT' => '目前金額:',
    'UPDATE_VERIFY_FIX' => '執行修正將會變成',
    'UPDATE_INCLUDE_CLOSE' => '包含停用的記錄',
    'UPDATE_VERIFY_NEWAMOUNT' => '新的金額:',
    'UPDATE_VERIFY_NEWCURRENCY' => '新的貨幣:',
    'UPDATE_DONE' => '完成',
    'UPDATE_BUG_COUNT' => '發現缺陷並且嘗試解決:',
    'UPDATE_BUGFOUND_COUNT' => '發現缺陷:',
    'UPDATE_COUNT' => '記錄更新筆數:',
    'UPDATE_RESTORE_COUNT' => '記錄金額還原:',
    'UPDATE_RESTORE' => '還原金額',
    'UPDATE_RESTORE_TXT' => '通過修正期間新增的備份來還原金額數值。',
    'UPDATE_FAIL' => '無法更新-',
    'UPDATE_NULL_VALUE' => '沒有輸入金額的項目會設置為0-',
    'UPDATE_MERGE' => '合併貨幣',
    'UPDATE_MERGE_TXT' => '合併多種貨幣成為單一貨幣，如果您發現同樣的貨幣有多條記錄，您可以將他們合併。這將會合併所有模組的貨幣記錄。',
    'LBL_ACCOUNT_NAME' => '客戶名稱:',
    'LBL_AMOUNT' => '金額:',
    'LBL_AMOUNT_USDOLLAR' => '金額 USD:',
    'LBL_CURRENCY' => '貨幣:',
    'LBL_DATE_CLOSED' => '完成日期:',
    'LBL_TYPE' => '類型:',
    'LBL_CAMPAIGN' => '市場活動:',
    'LBL_NEXT_STEP' => '下個步驟:',
    'LBL_LEAD_SOURCE' => '潛在客戶來源:',
    'LBL_SALES_STAGE' => '銷售階段:',
    'LBL_PROBABILITY' => '成交概率(%):',
    'LBL_DESCRIPTION' => '說明:',
    'LBL_DUPLICATE' => '可能重覆的商業機會',
    'MSG_DUPLICATE' => '新增這條記錄可能造成重覆，您可以從下麵列表選擇或是點擊新增來繼續透過舊有記錄建立新商業機會',
    'LBL_NEW_FORM_TITLE' => '新增商業機會',
    'LNK_NEW_OPPORTUNITY' => '新增商業機會',
    'LNK_OPPORTUNITY_LIST' => '商業機會',
    'ERR_DELETE_RECORD' => '必須指定記錄編號才能刪除商業機會。',
    'LBL_TOP_OPPORTUNITIES' => '我的重要商業機會',
    'NTC_REMOVE_OPP_CONFIRMATION' => '您確定要從這個商業機會移除這個聯繫人?',
    'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => '您確定要從這個項目移除商業機會?',
    'LBL_DEFAULT_SUBPANEL_TITLE' => '商業機會',
    'LBL_ACTIVITIES_SUBPANEL_TITLE' => '活動',
    'LBL_HISTORY_SUBPANEL_TITLE' => '歷史記錄',
    'LBL_RAW_AMOUNT' => '毛數量',

    'LBL_LEADS_SUBPANEL_TITLE' => '潛在客戶',
    'LBL_CONTACTS_SUBPANEL_TITLE' => '聯繫人',
    'LBL_DOCUMENTS_SUBPANEL_TITLE' => '文檔',
    'LBL_PROJECTS_SUBPANEL_TITLE' => '項目',
    'LBL_ASSIGNED_TO_NAME' => '負責人用戶姓名:',
    'LBL_LIST_ASSIGNED_TO_NAME' => '負責人',
    'LBL_MY_CLOSED_OPPORTUNITIES' => '我的關閉的商業機會',
    'LBL_TOTAL_OPPORTUNITIES' => '商業機會總數',
    'LBL_CLOSED_WON_OPPORTUNITIES' => '已關閉的成功的商業機會',
    'LBL_ASSIGNED_TO_ID' => '分配用戶編號',
    'LBL_CREATED_ID' => '創建人編號',
    'LBL_MODIFIED_ID' => '修改人編號',
    'LBL_MODIFIED_NAME' => '修改人姓名',
    'LBL_CREATED_USER' => '創建人',
    'LBL_MODIFIED_USER' => '修改人',
    'LBL_CAMPAIGN_OPPORTUNITY' => '營銷活動',
    'LBL_PROJECT_SUBPANEL_TITLE' => '項目',
    'LABEL_PANEL_ASSIGNMENT' => '分配',
    'LNK_IMPORT_OPPORTUNITIES' => '導入商業機會',
    'LBL_EDITLAYOUT' => '編輯佈局' /*for 508 compliance fix*/,
    //For export labels
    'LBL_EXPORT_CAMPAIGN_ID' => '市場活動ID',
    'LBL_OPPORTUNITY_TYPE' => '商業機會類型',
    'LBL_EXPORT_ASSIGNED_USER_NAME' => '負責人姓名',
    'LBL_EXPORT_ASSIGNED_USER_ID' => '負責人ID',
    'LBL_EXPORT_MODIFIED_USER_ID' => '修改人ID',
    'LBL_EXPORT_CREATED_BY' => '創建人ID',
    'LBL_EXPORT_NAME' => '名稱',

    // SNIP
    'LBL_CONTACT_HISTORY_SUBPANEL_TITLE' => '相關聯繫人的Emails',
    'TWITTER_USER_C' => 'Twitter用戶',
);

?>
