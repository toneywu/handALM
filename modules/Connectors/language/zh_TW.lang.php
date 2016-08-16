<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
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


$mod_strings = array(

    'LBL_ADD_MODULE' => '添加',
    'LBL_ADDRCITY' => '城市',
    'LBL_ADDRCOUNTRY' => '國家',
    'LBL_ADDRCOUNTRY_ID' => '國家Id',
    'LBL_ADDRSTATEPROV' => '洲/省',
    'LBL_ADMINISTRATION' => '連接器管理員',
    'LBL_ADMINISTRATION_MAIN' => '連接器配置',
    'LBL_AVAILABLE' => '可用',
    'LBL_BACK' => '< 上一步',
    'LBL_COMPANY_ID' => '公司 Id',
    'LBL_CONFIRM_CONTINUE_SAVE' => '某些必填欄位為空。仍舊保存?',
    'LBL_CONNECTOR' => '連接器',
    'LBL_CONNECTOR_FIELDS' => '連接器欄位',
    'LBL_DATA' => '數據',
    'LBL_DEFAULT' => '預設',
    'LBL_DELETE_MAPPING_ENTRY' => '你確定要刪除這個入口嗎？',
    'LBL_DISABLED' => '禁用',
    'LBL_DUNS' => 'DUNS',
    'LBL_EMPTY_BEANS' => '未找到符合查詢條件的記錄。',
    'LBL_ENABLED' => '啟用',
    'LBL_EXTERNAL' => '允許用戶通過該連接器創建外部帳號.',
    'LBL_EXTERNAL_SET_PROPERTIES' => ' In order to use this connector, the properties should also be set in the Set Connector Properties settings page.',
    'LBL_FINSALES' => 'Finsales',
    'LBL_MARKET_CAP' => '市值',
    'LBL_MERGE' => '合併',
    'LBL_MODIFY_DISPLAY_TITLE' => '啟用連接器',
    'LBL_MODIFY_DISPLAY_DESC' => '為每個連接器選擇啟用模塊',
    'LBL_MODIFY_DISPLAY_PAGE_TITLE' => '連接器配置：啟用連接器',
    'LBL_MODULE_FIELDS' => '模塊欄位',
    'LBL_MODIFY_MAPPING_TITLE' => '映射連接器欄位',
    'LBL_MODIFY_MAPPING_DESC' => '映射連接器欄位到模塊列表，以此來決定哪個連接器數據能夠被察看且被合併到模塊記錄中。',
    'LBL_MODIFY_MAPPING_PAGE_TITLE' => '連接器設置：映射連接器欄位',
    'LBL_MODIFY_PROPERTIES_TITLE' => '設置連接器屬性',
    'LBL_MODIFY_PROPERTIES_DESC' => '為每個連接器設置屬性，包括URLs 和 API 關鍵字.',
    'LBL_MODIFY_PROPERTIES_PAGE_TITLE' => '連接器設置：設置連接器屬性',
    'LBL_MODIFY_SEARCH_TITLE' => '管理連接器查詢',
    'LBL_MODIFY_SEARCH' => '查詢',
    'LBL_MODIFY_SEARCH_DESC' => '為每個模塊選擇為數據查詢所使用的連接器欄位。',
    'LBL_MODIFY_SEARCH_PAGE_TITLE' => '連接器配置：管理連接器查詢',
    'LBL_MODULE_NAME' => '連接器',
    'LBL_NO_PROPERTIES' => '這個連接器沒有配置屬性。',
    'LBL_PARENT_DUNS' => '父商業實體標識符（DUNS）',
    'LBL_PREVIOUS' => '< 上一步',
    'LBL_QUOTE' => '引用',
    'LBL_RECNAME' => '公司名',
    'LBL_RESET_TO_DEFAULT' => '恢復到預設設置',
    'LBL_RESET_TO_DEFAULT_CONFIRM' => '你確定要恢復到預設設置嗎？',
    'LBL_RESET_BUTTON_TITLE' => '重置 [Alt+R]',
    'LBL_RESULT_LIST' => '數據列表',
    'LBL_RUN_WIZARD' => '運行嚮導',
    'LBL_SAVE' => '保存',
    'LBL_SEARCHING_BUTTON_LABEL' => '查找中...',
    'LBL_SHOW_IN_LISTVIEW' => '在合併記錄的列表示圖中顯示',
    'LBL_SMART_COPY' => '智能拷貝',
    'LBL_SUMMARY' => '摘要',
    'LBL_STEP1' => '查找，察看數據',
    'LBL_STEP2' => '合併記錄與',
    'LBL_TEST_SOURCE' => '測試連接器',
    'LBL_TEST_SOURCE_FAILED' => '測試失敗',
    'LBL_TEST_SOURCE_RUNNING' => '執行測試中...',
    'LBL_TEST_SOURCE_SUCCESS' => '測試成功',
    'LBL_TITLE' => '數據合併',
    'LBL_ULTIMATE_PARENT_DUNS' => '最終父商業實體標識符（DUNS）',

    'ERROR_RECORD_NOT_SELECTED' => '錯誤：在執行之前，請從列表中選擇一條記錄。',
    'ERROR_EMPTY_WRAPPER' => '錯誤：不能為資源獲取包裝器實例 [{$source_id}]',
    'ERROR_EMPTY_SOURCE_ID' => '錯誤：源ID沒有指定或為空值。',
    'ERROR_EMPTY_RECORD_ID' => '錯誤：記錄ID沒有指定或為空值。',
    'ERROR_NO_ADDITIONAL_DETAIL' => '錯誤：沒有為記錄找到額外的詳細信息。',
    'ERROR_NO_SEARCHDEFS_DEFINED' => '這個連接器沒有模塊被啟用。請在啟用連接器頁面為這個連接器選擇一個模塊。',
    'ERROR_NO_SEARCHDEFS_MAPPED' => '錯誤：所有的連接器都沒有定義搜索欄位。',
    'ERROR_NO_SOURCEDEFS_FILE' => '錯誤：找不到sourcedefs.php 文件。',
    'ERROR_NO_SOURCEDEFS_SPECIFIED' => '錯誤：沒有指定獲取數據的來源。',
    'ERROR_NO_CONNECTOR_DISPLAY_CONFIG_FILE' => '錯誤：沒有和這個模塊映射好的連接器。',
    'ERROR_NO_SEARCHDEFS_MAPPING' => '錯誤：沒有為這個模塊和連接器所定義的查詢欄位。請聯繫系統管理員。',
    'ERROR_NO_FIELDS_MAPPED' => '錯誤： 你必須為每個模塊入口提供一個從連接器欄位到模塊欄位的映射。',
    'ERROR_NO_DISPLAYABLE_MAPPED_FIELDS' => '錯誤：在結果中沒有映射好的模塊欄位以供顯示。請聯繫系統管理員。',
    'LBL_TWITTER_USER' => 'Twitter用戶',
    'LBL_FACEBOOK_USER' => 'Facebook用戶',
    'LBL_INFO_INLINE' => '信息' /*for 508 compliance fix*/,
    'LBL_CLOSE' => '結束' /*for 508 compliance fix*/,

);

?>