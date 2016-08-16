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






$mod_strings = array (
'LBL_EDIT_LAYOUT'=>'編輯佈局',
'LBL_EDIT_ROWS'=>'編輯行',
'LBL_EDIT_COLUMNS'=>'編輯列',
'LBL_EDIT_LABELS'=>'編輯標簽',
'LBL_EDIT_FIELDS'=>'編輯自定義欄位',
'LBL_ADD_FIELDS'=>'增加自定義欄位',
'LBL_DISPLAY_HTML'=>'顯示HTML源代碼',
'LBL_SELECT_FILE'=> '選擇文件',
'LBL_SAVE_LAYOUT'=> '保存佈局',
'LBL_SELECT_A_SUBPANEL' => '選擇一個子面板',
'LBL_SELECT_SUBPANEL' => '選擇字面板',
'LBL_MODULE_TITLE' => '工作室',
'LBL_TOOLBOX' => '工具箱',
'LBL_STAGING_AREA' => '規劃區(拖拉項目到這裡)',
'LBL_SUGAR_FIELDS_STAGE' => 'SuiteCRM Fields (click items to add to staging area)',
'LBL_SUGAR_BIN_STAGE' => 'SuiteCRM Bin (click items to add to staging area)',
'LBL_VIEW_SUGAR_FIELDS' => 'View SuiteCRM Fields',
'LBL_VIEW_SUGAR_BIN' => 'View SuiteCRM Bin',
'LBL_FAILED_TO_SAVE' => '保存失敗',
'LBL_CONFIRM_UNSAVE' => '任何改變將轉為未存狀態. 您確定您要繼續嗎?',
'LBL_PUBLISHING' => '公佈中...',
'LBL_PUBLISHED' => '已公佈',
'LBL_FAILED_PUBLISHED' => '公佈失敗',
'LBL_DROP_HERE' => '[拽到這裡]',

//CUSTOM FIELDS
'LBL_NAME'=>'名稱',
'LBL_LABEL'=>'標簽',
'LBL_MASS_UPDATE'=>'批量更新',
'LBL_AUDITED'=>'審計',
'LBL_CUSTOM_MODULE'=>'模塊',
'LBL_DEFAULT_VALUE'=>'默認值',
'LBL_REQUIRED'=>'必須',
'LBL_DATA_TYPE'=>'類型',


'LBL_HISTORY'=>'歷史記錄',

//WIZARDS
//STUDIO WIZARD
'LBL_SW_WELCOME'=>'<h2>歡迎來到工作室！</h2><br>今天想做些什麼呢?<br><b>請從下麵的選項中選擇。</b>',
'LBL_SW_EDIT_MODULE'=>'編輯模塊',
'LBL_SW_EDIT_DROPDOWNS'=>'編輯下拉框',
'LBL_SW_EDIT_TABS'=>'設置標簽',
'LBL_SW_RENAME_TABS'=>'重命名標簽',
'LBL_SW_EDIT_GROUPTABS'=>'設置組標簽',
'LBL_SW_EDIT_PORTAL'=>'編輯門戶網站',
'LBL_SW_EDIT_WORKFLOW'=>'編輯工作流程',
'LBL_SW_REPAIR_CUSTOMFIELDS'=>'修複自定義欄位',
'LBL_SW_MIGRATE_CUSTOMFIELDS'=>'移植自定義欄位',


//SELECT MODULE WIZARD
'LBL_SMW_WELCOME'=>'<h2>歡迎來到工作室！</h2><br><b>請選擇下麵的一個模塊。',

//SELECT MODULE ACTION
'LBL_SMA_WELCOME'=>'<h2>編輯模塊</h2>您要對那個模塊做什麼呢?<br><b>請選擇您要採取的行動。',
'LBL_SMA_EDIT_CUSTOMFIELDS'=>'編輯自定義欄位',
'LBL_SMA_EDIT_LAYOUT'=>'編輯佈局',
'LBL_SMA_EDIT_LABELS' =>'編輯標簽',

//Manager Backups History
'LBL_MB_PREVIEW'=>'預覽',
'LBL_MB_RESTORE'=>'恢復',
'LBL_MB_DELETE'=>'刪除',
'LBL_MB_COMPARE'=>'比較',
'LBL_MB_WELCOME'=> '<h2>歷史</h2><br>在歷史中，您可以查看以前公佈的文件修改。您可以比較和恢復以前的版本。如果您恢復了文件，它就會成為您的工作文件。在它被其他人看到以前，您必須公佈它。<br>您今天想做些什麼呢?<br><b>請從下麵的選項中選擇。</b>',

//EDIT DROP DOWNS
'LBL_ED_CREATE_DROPDOWN'=> '新增下拉框',
'LBL_ED_WELCOME'=>'<h2>編輯下拉框</h2><br><b>您既可以編輯一個存在的下拉框，也可以新增下拉框。',
'LBL_DROPDOWN_NAME' => '下拉列表名稱:',
'LBL_DROPDOWN_LANGUAGE' => '下拉列表語言:',
'LBL_TABGROUP_LANGUAGE' => '組標簽語言：',

//EDIT CUSTOM FIELDS
'LBL_EC_WELCOME'=>'<h2>編輯自定義欄位</h2><br><b>您可以編輯視圖，或者已存在的自定義欄位。新增自定義欄位，或者清除自定義欄位緩存。',
'LBL_EC_VIEW_CUSTOMFIELDS'=> '查看自定義欄位',
'LBL_EC_CREATE_CUSTOMFIELD'=>'新增自定義欄位',
'LBL_EC_CLEAR_CACHE'=>'清除緩存',

//SELECT MODULE
'LBL_SM_WELCOME'=> '<h2>歷史</h2><br><b>請選擇您要查看的文件。</b>',
//END WIZARDS

//DROP DOWN EDITOR
'LBL_DD_DISPALYVALUE'=>'顯示數值',
'LBL_DD_DATABASEVALUE'=>'資料庫數值',
'LBL_DD_ALL'=>'所有',

//BUTTONS
'LBL_BTN_SAVE'=>'保存',
'LBL_BTN_CANCEL'=>'取消',
'LBL_BTN_SAVEPUBLISH'=>'保存並且公佈',
'LBL_BTN_HISTORY'=>'歷史記錄',
'LBL_BTN_NEXT'=>'下一步',
'LBL_BTN_BACK'=>'上一步',
'LBL_BTN_ADDCOLS'=>'增加列',
'LBL_BTN_ADDROWS'=>'增加行',
'LBL_BTN_UNDO'=>'取消',
'LBL_BTN_REDO'=>'重做',
'LBL_BTN_ADDCUSTOMFIELD'=>'增加自定義欄位',
'LBL_BTN_TABINDEX'=>'編輯標簽順序',

//TABS
'LBL_TAB_SUBTABS'=>'子標簽',
'LBL_MODULES'=>'模塊',
//nsingh: begin bug#15095 fix
'LBL_MODULE_NAME' => '管理員',
'LBL_CONFIGURE_GROUP_TABS' => '配置組標簽',
 //end bug #15095 fix
'LBL_GROUP_TAB_WELCOME'=>'當用戶選擇使用組標簽而不是使用 我的帳戶>佈局選項 中的模塊標簽時，下列組標簽佈局將被使用。',
'LBL_RENAME_TAB_WELCOME'=>'點擊任何標簽在表下方顯示值更改標簽名稱',
'LBL_DELETE_MODULE'=>'&nbsp;刪除&nbsp;模塊',
'LBL_DISPLAY_OTHER_TAB_HELP' => '選擇顯示在導航欄上顯示"其他"標簽。預設情況下，"其他"內包含那些沒有被分配到指定組的所有模塊。',
'LBL_TAB_GROUP_LANGUAGE_HELP' => '為其他語言選項設置組標簽的標題。選擇一個語言選項，然後編輯標題，單擊保存並部署。',
'LBL_ADD_GROUP'=>'添加組',
'LBL_NEW_GROUP'=>'新建組',
'LBL_RENAME_TABS'=>'重命名標簽',
'LBL_DISPLAY_OTHER_TAB' => '顯示 \'其他\' 標簽',

//LIST VIEW EDITOR
'LBL_DEFAULT'=>'默認',
'LBL_ADDITIONAL'=>'附加的',
'LBL_AVAILABLE'=>'有效的',
'LBL_LISTVIEW_DESCRIPTION'=>'有三列顯示在下麵。默認列包含顯示在默認列表視圖中的欄位，附加列包含用戶可能用來新增自定義視圖的欄位，有效列包含的列可以讓管理員增加當前用戶沒有使用的默認列和附加列。',
'LBL_LISTVIEW_EDIT'=>'編輯列表視圖',

//ERRORS
'ERROR_ALREADY_EXISTS'=> '欄位已存在',
'ERROR_INVALID_KEY_VALUE'=> "錯誤: 無效的關鍵字值: [']",

//SUGAR PORTAL
'LBL_SW_SUGARPORTAL'=>'SuiteCRM Portal',
'LBL_SMP_WELCOME'=>'請從下麵列表中選擇一個您想要編輯的模塊',
'LBL_SP_WELCOME'=>'Welcome to Studio for SuiteCRM Portal. You can either choose to edit modules here or sync to a portal instance.<br> Please choose from the list below.',
'LBL_SP_SYNC'=>'門戶網站同步',
'LBL_SYNCP_WELCOME'=>'Please enter the url to the portal instance you wish to update then press the Go button.<br> This will bring up a prompt for your user name and password.<br> Please enter your SuiteCRM user name and password and press the Begin Sync button.',
'LBL_LISTVIEWP_DESCRIPTION'=>'下麵有兩個列:默認列包含要顯示的欄位，有效列包含那些沒有顯示，但是是可以被顯示的欄位。在兩列之間拖拽欄位。您也可以通過拖拽，重新排列列中的記錄。',
'LBL_SP_STYLESHEET'=>'上傳樣式',
'LBL_SP_UPLOADSTYLE'=>'點擊“瀏覽”按鈕，並選擇一個上傳的風格。<br>下一次您同步門戶網站，他會被同步到門戶網站中。',
'LBL_SP_UPLOADED'=> '已上傳',
'ERROR_SP_UPLOADED'=>'請確定您在上傳一個css樣式。',
'LBL_SP_PREVIEW'=>'您可以預覽您的樣式',

	'LBL_SAVE' => '保存' /*for 508 compliance fix*/,
	'LBL_UNDO' => '撤銷（Undo）' /*for 508 compliance fix*/,
	'LBL_REDO' => '重覆（Redo）' /*for 508 compliance fix*/,
	'LBL_INLINE' => '內聯' /*for 508 compliance fix*/,
	'LBL_DELETE' => '刪除' /*for 508 compliance fix*/,
	'LBL_ADD_FIELD' => '添加欄位' /*for 508 compliance fix*/,
	'LBL_MAXIMIZE' => '最大化' /*for 508 compliance fix*/,
	'LBL_MINIMIZE' => '最小化' /*for 508 compliance fix*/,
	'LBL_PUBLISH' => '發佈' /*for 508 compliance fix*/,
	'LBL_ADDROWS' => '添加行' /*for 508 compliance fix*/,
	'LBL_ADDFIELD' => '添加欄位' /*for 508 compliance fix*/,
	'LBL_EDIT' => '編輯' /*for 508 compliance fix*/,

'LBL_LANGUAGE_TOOLTIP' => '選擇要編輯的語言。',
'LBL_SINGULAR' => '單數標簽',
'LBL_PLURAL' => '複數標簽',
'LBL_RENAME_MOD_SAVE_HELP' => '點擊 <b>保存</b> 使改變生效。'

);
?>