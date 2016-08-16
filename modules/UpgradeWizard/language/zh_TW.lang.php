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

 * Description:
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 * *******************************************************************************/

$mod_strings = array(
	'DESC_MODULES_INSTALLED'					=> '以下模塊已安裝:',
	'DESC_MODULES_QUEUED'						=> '未安裝的更新補丁:',

	'ERR_UW_CANNOT_DETERMINE_GROUP'				=> '不能確定群組',
	'ERR_UW_CANNOT_DETERMINE_USER'				=> '不能確定所有者',
	'ERR_UW_CONFIG_WRITE'						=> '錯誤在config，php文件中更新新版本信息。',
	'ERR_UW_CONFIG'								=> '請確認config.php文件可寫，並寫刷新當前頁。',
	'ERR_UW_DIR_NOT_WRITABLE'					=> '目錄不可寫',
	'ERR_UW_FILE_NOT_COPIED'					=> '文件未複製',
	'ERR_UW_FILE_NOT_DELETED'					=> '問題移除程序包',
	'ERR_UW_FILE_NOT_READABLE'					=> '文件不可讀。',
	'ERR_UW_FILE_NOT_WRITABLE'					=> '文件不可移動或者寫到',
	'ERR_UW_FLAVOR_2'							=> '升級版本:',
	'ERR_UW_FLAVOR'								=> 'SuiteCRM系統版本:',
	'ERR_UW_LOG_FILE_UNWRITABLE'				=> './upradeWizard.log文件不可創建/寫入。請修複SugarCRM路徑的許可權。',
	'ERR_UW_MBSTRING_FUNC_OVERLOAD'				=> 'mbstring.func_overload設置了大於1的值。請在php.ini文件中更改這個變數的值，並且重新啟動網路伺服器。',
	'ERR_UW_MYSQL_VERSION'						=> 'SuiteCRM需要MySQL版本為4.1.2或者更高。發現:',
	'ERR_UW_OCI8_VERSION'				        => '你安裝的Oracle版本不被SuiteCRM支援。請在相容性列表中查詢支援的Oracle版本。目前版本:',
	'ERR_UW_NO_FILE_UPLOADED'					=> '請指定一個文件，並重試！',
	'ERR_UW_NO_FILES'							=> '發現了一個錯誤，沒有要檢查的文件。',
	'ERR_UW_NO_MANIFEST'						=> '壓縮文件缺少manifest.php文件。不能繼續。',
	'ERR_UW_NO_VIEW'							=> '指定的視圖無效。',
	'ERR_UW_NO_VIEW2'							=> '視圖沒有定義。請到管理員首頁瀏覽該頁。',
	'ERR_UW_NOT_VALID_UPLOAD'					=> '無效上傳。',
	'ERR_UW_NO_CREATE_TMP_DIR'					=> '不能創建臨時目錄。檢查文件許可權。',
	'ERR_UW_ONLY_PATCHES'						=> '在該頁，您只可以上傳補丁。',
	'ERR_UW_PREFLIGHT_ERRORS'					=> '在準備前檢查中發現錯誤',
	'ERR_UW_UPLOAD_ERR'							=> '上傳文件出錯。請重試！<br>\n',
	'ERR_UW_VERSION'							=> 'SuiteCRM系統版本:',
	'ERR_UW_WRONG_TYPE'							=> '這個頁面不能運行',
	'LBL_BUTTON_BACK'							=> '上一步',
	'LBL_BUTTON_CANCEL'							=> '取消',
	'LBL_BUTTON_DELETE'							=> '刪除程序包',
	'LBL_BUTTON_DONE'							=> '完成',
	'LBL_BUTTON_EXIT'							=> '導入完成',
	'LBL_BUTTON_INSTALL'						=> '升級前準備',
	'LBL_BUTTON_NEXT'							=> '下一步',
	'LBL_BUTTON_RECHECK'						=> '重新檢查',
	'LBL_BUTTON_RESTART'						=> '重新開始',

	'LBL_UPLOAD_UPGRADE'						=> '上傳更新:',
	'LBL_UPLOAD_FILE_NOT_FOUND'					=> '未找到上傳文件',
	'LBL_UW_BACKUP_FILES_EXIST_TITLE'			=> '文件備份',
	'LBL_UW_BACKUP_FILES_EXIST'					=> '備份這次升級文件到',
	'LBL_UW_BACKUP'								=> '文件備份',
	'LBL_UW_CANCEL_DESC'						=> '取消升級嚮導。所有臨時文件和上傳的zip文件被刪除。<br><br>點擊“下一步”重新開始升級嚮導。',
	'LBL_UW_CHARSET_SCHEMA_CHANGE'				=> '字元集結構改變',
	'LBL_UW_CHECK_ALL'							=> '全選',
	'LBL_UW_CHECKLIST'							=> '升級步驟',
	'LBL_UW_COMMIT_ADD_TASK_DESC_1'				=> "覆蓋的文件的備份在以下目錄中： \n",
	'LBL_UW_COMMIT_ADD_TASK_DESC_2'				=> "手動合併以下文件：\n",
	'LBL_UW_COMMIT_ADD_TASK_NAME'				=> '升級進程:手工合併文件',
	'LBL_UW_COMMIT_ADD_TASK_OVERVIEW'			=> '請使用您最熟悉的方法來合併這些文件。在這些完成後，SugarCRM安裝才處於確定的狀態，更新完成。',
	'LBL_UW_COMPLETE'							=> '完成',
	'LBL_UW_CONTINUE_CONFIRMATION'              => '此新版本SuiteCRM有新的授權協議。請問您是否要繼續?',
	'LBL_UW_COMPLIANCE_ALL_OK'					=> '所有系統設置都滿足需要',
	'LBL_UW_COMPLIANCE_CALLTIME'				=> 'PHP Setting: Call Time Pass By Reference',
	'LBL_UW_COMPLIANCE_CURL'					=> 'CURL模塊',
	'LBL_UW_COMPLIANCE_IMAP'					=> 'IMAP模塊',
	'LBL_UW_COMPLIANCE_MBSTRING'				=> 'MBStrings模塊',
	'LBL_UW_COMPLIANCE_MBSTRING_FUNC_OVERLOAD'	=> 'MBStrings mbstring.func_overload Parameter',
	'LBL_UW_COMPLIANCE_MEMORY'					=> 'PHP設置:安全模式',
    'LBL_UW_COMPLIANCE_STREAM'                  => 'PHP Setting: Stream',
	'LBL_UW_COMPLIANCE_MSSQL_MAGIC_QUOTES'		=> 'MS SQL Server & PHP Magic Quotes GPC',
	'LBL_UW_COMPLIANCE_MYSQL'					=> '最低MySQL版本',
    'LBL_UW_COMPLIANCE_DB'                      => '最低資料庫版本',
	'LBL_UW_COMPLIANCE_PHP_INI'					=> 'php.ini位置',
	'LBL_UW_COMPLIANCE_PHP_VERSION'				=> '最低PHP版本',
	'LBL_UW_COMPLIANCE_SAFEMODE'				=> 'PHP設置:安全模式',
	'LBL_UW_COMPLIANCE_TITLE'					=> '伺服器設置檢查',
	'LBL_UW_COMPLIANCE_TITLE2'					=> '檢查到的設置',
	'LBL_UW_COMPLIANCE_XML'						=> 'XML解析',
	'LBL_UW_COMPLIANCE_ZIPARCHIVE'				=> 'Zip支援',
	'LBL_UW_COMPLIANCE_PCRE_VERSION'			=> 'PCRE版本',

	'LBL_UW_COPIED_FILES_TITLE'					=> '成功複製文件',
	'LBL_UW_CUSTOM_TABLE_SCHEMA_CHANGE'			=> '自定義表結構改變',

	'LBL_UW_DB_CHOICE1'							=> '用升級嚮導運行SQL',
	'LBL_UW_DB_CHOICE2'							=> '手動運行SQL語句',
	'LBL_UW_DB_INSERT_FAILED'					=> '插入失敗 - 比較結果的不同',
	'LBL_UW_DB_ISSUES_PERMS'					=> '資料庫許可權',
	'LBL_UW_DB_ISSUES'							=> '資料庫問題',
	'LBL_UW_DB_METHOD'							=> '資料庫更新方法',
	'LBL_UW_DB_NO_ADD_COLUMN'					=> '修改表 [table] 添加列 [column]',
	'LBL_UW_DB_NO_CHANGE_COLUMN'				=> '修改表 [table] 改變列 [column]',
	'LBL_UW_DB_NO_CREATE'						=> '創建表 [table]',
	'LBL_UW_DB_NO_DELETE'						=> '刪除窗口 [table]',
	'LBL_UW_DB_NO_DROP_COLUMN'					=> '刪除表 [table] 刪除列 [column]',
	'LBL_UW_DB_NO_DROP_TABLE'					=> '刪除表 [table]',
	'LBL_UW_DB_NO_ERRORS'						=> '所有許可權有效',
	'LBL_UW_DB_NO_INSERT'						=> '插入表 [table]',
	'LBL_UW_DB_NO_SELECT'						=> '選擇 [x] 從 [table]',
	'LBL_UW_DB_NO_UPDATE'						=> '更新 [table]',
	'LBL_UW_DB_PERMS'							=> '必要許可權',

	'LBL_UW_DESC_MODULES_INSTALLED'				=> '已安裝的更新補丁:',
	'LBL_UW_END_DESC'							=> '恭喜，您的系統現在已經完成升級。',
	'LBL_UW_END_DESC2'							=> '如果你選擇了手動運行任何步驟，如手動合併文件，手動運行SQL語句，請執行以下步驟。這些步驟完成之前，系統處於不穩定狀態。',
	'LBL_UW_END_LOGOUT_PRE'						=> '升級已完成。',
	'LBL_UW_END_LOGOUT_PRE2'					=> '點完成以離開升級導引。',
	'LBL_UW_END_LOGOUT'							=> '如果您計劃以後升級，請註銷當前賬戶。',
	'LBL_UW_END_LOGOUT2'						=> '登出',
	'LBL_UW_REPAIR_INDEX'						=> 'For database performance improvements, please run the <a href="index.php?module=Administration&action=RepairIndex" target="_blank">Repair Index</a> script.',

	'LBL_UW_FILE_DELETED'						=> " 已經被刪除.<br>",
	'LBL_UW_FILE_GROUP'							=> '組',
	'LBL_UW_FILE_ISSUES_PERMS'					=> '文件許可權',
	'LBL_UW_FILE_ISSUES'						=> '文件問題',
	'LBL_UW_FILE_NEEDS_DIFF'					=> '文件需要手工區分',
	'LBL_UW_FILE_NO_ERRORS'						=> '<b>所有文件可寫</b>',
	'LBL_UW_FILE_OWNER'							=> '負責人',
	'LBL_UW_FILE_PERMS'							=> '許可權',
	'LBL_UW_FILE_UPLOADED'						=> '已被上傳',
	'LBL_UW_FILE'								=> '文件名',
	'LBL_UW_FILES_QUEUED'						=> '下列更新已安裝:',
	'LBL_UW_FILES_REMOVED'						=> "下列文件將被從系統中刪除:<br>\n",
	'LBL_UW_NEXT_TO_UPLOAD'						=> "<b>Click Next to upload upgrade packages.</b>",
	'LBL_UW_FROZEN'								=> '在繼續之前，必須完成必要步驟。',
	'LBL_UW_HIDE_DETAILS'						=> '隱藏細節',
	'LBL_UW_IN_PROGRESS'						=> '處理中',
	'LBL_UW_INCLUDING'							=> '包括',
	'LBL_UW_INCOMPLETE'							=> '未完成',
	'LBL_UW_INSTALL'							=> '文件安裝',
	'LBL_UW_MANUAL_MERGE'						=> '文件合併',
	'LBL_UW_MODULE_READY_UNINSTALL'				=> "模塊將準備被卸載.  點擊 \"Commit\" 來開始安裝.<br>\n",
	'LBL_UW_MODULE_READY'						=> "模塊準備被安裝.  點擊 \"Commit\" 來開始安裝.",
	'LBL_UW_NO_INSTALLED_UPGRADES'				=> '沒有檢測到升級記錄。',
	'LBL_UW_NONE'								=> '無',
	'LBL_UW_NOT_AVAILABLE'						=> '無效',
	'LBL_UW_OVERWRITE_DESC'						=> "所有改變的文件將被重寫, 包括任何客戶化編碼和您對模板做的改變. 您確定您要開始嗎?",
	'LBL_UW_OVERWRITE_FILES_CHOICE1'			=> '覆蓋所有文件',
	'LBL_UW_OVERWRITE_FILES_CHOICE2'			=> '手動合併 - 保存所有文件',
	'LBL_UW_OVERWRITE_FILES'					=> '合併方法',
	'LBL_UW_PATCH_READY'						=> '執行路徑已經準備好。點擊下麵的“提交”按鈕完成升級過程。',
	'LBL_UW_PATCH_READY2'						=> '<h2>註意: 發現自定義佈局</h2><br />在下列文件中發現對於Sugar默認佈局的修改. 與即將安裝的補丁包中的文件衝突.對於 <u>此類文件</u> 您可以:<br><ul><li>[<b>Default</b>] 留空選擇框,忽略補丁包中的文件保留您的修改.</li>or<li>勾選選擇框, 重新在工作室中應用您的佈局.</li></ul>',

	'LBL_UW_PREFLIGHT_ADD_TASK'					=> '為手工合併新增任務記錄?',
	'LBL_UW_PREFLIGHT_COMPLETE'					=> '準備前檢查',
	'LBL_UW_PREFLIGHT_DIFF'						=> '區別',
	'LBL_UW_PREFLIGHT_EMAIL_REMINDER'			=> '為手工合併發送電子郵件提醒?',
	'LBL_UW_PREFLIGHT_FILES_DESC'				=> '下列文件已被修改。沒有選中的文件需要手工合併。<i>任何檢測到的佈局更改都會自動取消選中；選中任何會被覆蓋的文件。',
	'LBL_UW_PREFLIGHT_NO_DIFFS'					=> '不需要手工合併文件。',
	'LBL_UW_PREFLIGHT_NOT_NEEDED'				=> '不需要。',
	'LBL_UW_PREFLIGHT_PRESERVE_FILES'			=> '自動保護文件:',
	'LBL_UW_PREFLIGHT_TESTS_PASSED'				=> '通過所有準備前測試。點擊“下一步”來提交這些更改。',
	'LBL_UW_PREFLIGHT_TESTS_PASSED2'			=> 'Click Next to copy the upgraded files to the system.',
	'LBL_UW_PREFLIGHT_TESTS_PASSED3'			=> '<b>Note: </b> The rest of the upgrade process is mandatory, and clicking Next will require you to complete the process. If you do not wish to proceed, click the Cancel button.',
	'LBL_UW_PREFLIGHT_TOGGLE_ALL'				=> '綁定所有文件',

	'LBL_UW_REBUILD_TITLE'						=> '重建結果',
	'LBL_UW_SCHEMA_CHANGE'						=> '結構更改',

	'LBL_UW_SHOW_COMPLIANCE'					=> '顯示檢測到的設置',
	'LBL_UW_SHOW_DB_PERMS'						=> '現實缺少的資料庫許可權',
	'LBL_UW_SHOW_DETAILS'						=> '顯示細節',
	'LBL_UW_SHOW_DIFFS'							=> '顯示需要手工合併的文件',
	'LBL_UW_SHOW_NW_FILES'						=> '顯示錯誤許可權的文件',
	'LBL_UW_SHOW_SCHEMA'						=> '顯示結構更改腳本',
	'LBL_UW_SHOW_SQL_ERRORS'					=> '顯示錯誤的查詢',
	'LBL_UW_SHOW'								=> '顯示',

	'LBL_UW_SKIPPED_FILES_TITLE'				=> '忽略的文件',
	'LBL_UW_SKIPPING_FILE_OVERWRITE'			=> '忽略文件覆蓋 – 手工合併選擇的。',
	'LBL_UW_SQL_RUN'							=> '當手工運行SQL時檢查',
	'LBL_UW_START_DESC'							=> '歡迎來到SugarCRM更新嚮導。這個嚮導是為管理員更新SugarCRM實例而設計的。請仔細查看說明。',
	'LBL_UW_START_DESC2'						=> '我們強烈推薦您先在生產環境的副本環境中測試升級步驟。請在升級前備份資料庫和所有的系統文件（SugarCRM根目錄下的所有文件）。',
	'LBL_UW_START_DESC3'						=> 'Click Next to perform a check on your system to make sure that the system is ready for the upgrade. The check includes file permissions, database privileges and server settings.',
	'LBL_UW_START_UPGRADED_UW_DESC'				=> '新升級嚮導會繼續更新過程。請繼續您的更新。',
	'LBL_UW_START_UPGRADED_UW_TITLE'			=> '歡迎來到新升級嚮導',

	'LBL_UW_SYSTEM_CHECK_CHECKING'				=> '檢查中，請稍候。大約耗時30秒。',
	'LBL_UW_SYSTEM_CHECK_FILE_CHECK_START'		=> '發現所有要檢查的相關文件。',
	'LBL_UW_SYSTEM_CHECK_FILES'					=> '文件',
	'LBL_UW_SYSTEM_CHECK_FOUND'					=> '發現',

	'LBL_UW_TITLE_CANCEL'						=> '取消',
	'LBL_UW_TITLE_COMMIT'						=> '提交升級',
	'LBL_UW_TITLE_END'							=> '彙報',
	'LBL_UW_TITLE_PREFLIGHT'					=> '準備前檢查',
	'LBL_UW_TITLE_START'						=> '開始',
	'LBL_UW_TITLE_SYSTEM_CHECK'					=> '系統檢查',
	'LBL_UW_TITLE_UPLOAD'						=> '上傳升級',
	'LBL_UW_TITLE'								=> '更新嚮導',
	'LBL_UW_UNINSTALL'							=> '刪除',
	//500 upgrade labels
	'LBL_UW_ACCEPT_THE_LICENSE' 				=> '接收許可',
	'LBL_UW_CONVERT_THE_LICENSE' 				=> '轉換許可',
	'LBL_UW_CUSTOMIZED_OR_UPGRADED_MODULES'     => '升級/客戶化訂製模塊',
	'LBL_UW_FOLLOWING_MODULES_CUSTOMIZED'       => '下列模塊被定義為客戶化和防護',
	'LBL_UW_FOLLOWING_MODULES_UPGRADED'         => '下列模塊被定義為工作室-客戶化並已經被升級',

	'LBL_UW_SUGAR_COMMUNITY_EDITION_LICENSE'    => 'Sugar 社區版5.0遵循GNU General Public License Version 3. 升級後將轉換成如下許可證.',


	'LBL_START_UPGRADE_IN_PROGRESS'             => '開始在過程中',
	'LBL_SYSTEM_CHECKS_IN_PROGRESS'             => '系統檢查在過程中',
	'LBL_LICENSE_CHECK_IN_PROGRESS'             => '許可檢查在過程中',
	'LBL_PREFLIGHT_CHECK_IN_PROGRESS'           => '準備前檢查在過程中',
    'LBL_PREFLIGHT_FILE_COPYING_PROGRESS'       => 'File Copying in Progress',
	'LBL_COMMIT_UPGRADE_IN_PROGRESS'            => '升級在過程中',
    'LBL_UW_COMMIT_DESC'						=> 'Click Next to run additional upgrade scripts.',
	'LBL_UPGRADE_SCRIPTS_IN_PROGRESS'			=> 'Upgrade Scripts in Progress',
	'LBL_UPGRADE_SUMMARY_IN_PROGRESS'			=> '升級總和在過程中',
	'LBL_UPGRADE_IN_PROGRESS'                   => '在過程中     ',
	'LBL_UPGRADE_TIME_ELAPSED'                  => '過去的時間',
	'LBL_UPGRADE_CANCEL_IN_PROGRESS'			=> '升級取消和清除在過程中',
    'LBL_UPGRADE_TAKES_TIME_HAVE_PATIENCE'      => '升級可能花費一些時間',
    'LBL_UPLOADE_UPGRADE_IN_PROGRESS'           => '上載查找在過程中',
	'LBL_UPLOADING_UPGRADE_PACKAGE'      		=> '上載升級文件包... ',
    'LBL_UW_DORP_THE_OLD_SCHMEA' 				=> '您希望SugarCRM刪除4.5.1不推薦的表結構嗎？',
	'LBL_UW_DROP_SCHEMA_UPGRADE_WIZARD'			=> '升級嚮導刪除了4.5.1不推薦的表結構。',
	'LBL_UW_DROP_SCHEMA_MANUAL'					=> '人工刪除模塊發佈升級',
	'LBL_UW_DROP_SCHEMA_METHOD'					=> '舊模式刪除方法',
	'LBL_UW_SHOW_OLD_SCHEMA_TO_DROP'			=> '顯示舊模式以便可以刪除',
	'LBL_UW_SKIPPED_QUERIES_ALREADY_EXIST'      => '跳過查詢語句',
	'LBL_INCOMPATIBLE_PHP_VERSION'              => '需要Php5或以上版本.',
	'ERR_CHECKSYS_PHP_INVALID_VER'      => '安裝了無效的PHP版本:(版本',
	'LBL_BACKWARD_COMPATIBILITY_ON' 			=> 'Php向後兼容模式已打開. 如果想關閉請將zend.ze1_compatibility_mode設置成off.',
	//including some strings from moduleinstall that are used in Upgrade
	'LBL_ML_ACTION' => '動作',
    'LBL_ML_CANCEL'             => '取消',
    'LBL_ML_COMMIT'=>'執行',
    'LBL_ML_DESCRIPTION' => '描述',
    'LBL_ML_INSTALLED' => '安裝日期',
    'LBL_ML_NAME' => '名稱',
    'LBL_ML_PUBLISHED' => '發佈日期',
    'LBL_ML_TYPE' => '類型',
    'LBL_ML_UNINSTALLABLE' => '可刪除',
    'LBL_ML_VERSION' => '版本',
	'LBL_ML_INSTALL'=>'安裝',
	//adding the string used in tracker. copying from homepage
	'LBL_HOME_PAGE_4_NAME' => '記錄',
	'LBL_CURRENT_PHP_VERSION' => '(您當前的PHP版本是 ',
	'LBL_RECOMMENDED_PHP_VERSION' => '. 推薦的版本是 5.2.1 及以上版本)',
	'LBL_MODULE_NAME' => '升級嚮導',
	'LBL_UPLOAD_SUCCESS' => 'Upgrade package successfully uploaded. Click Next to perform a final check.',
	'LBL_UW_TITLE_LAYOUTS' => 'Confirm Layouts',
	'LBL_LAYOUT_MODULE_TITLE' => '版面佈局',
	'LBL_LAYOUT_MERGE_DESC' => 'There are new fields available which have been added as part of this upgrade and can be automatically appended to your existing module layouts.  To learn more about the new fields, please refer to the Release Notes for the version to which you are upgrading.<br><br>If you do not wish to append the new fields, please uncheck the module, and your custom layouts will remain unchanged. The fields will be available in Studio after the upgrade. <br><br>',
	'LBL_LAYOUT_MERGE_TITLE' => 'Click Next to confirm changes and to finish the upgrade.',
	'LBL_LAYOUT_MERGE_TITLE2' => 'Click Next to complete the upgrade.',
	'LBL_UW_CONFIRM_LAYOUTS' => 'Confirm Layouts',
    'LBL_UW_CONFIRM_LAYOUT_RESULTS' => 'Confirm Layout Results',
    'LBL_UW_CONFIRM_LAYOUT_RESULTS_DESC' => 'The following layouts were merged successfully:',
	'LBL_SELECT_FILE' => 'Select File:',
    'ERROR_VERSION_INCOMPATIBLE' => '上傳的文件和當前版本的Sugar Suite不兼容:',
    'ERROR_FLAVOR_INCOMPATIBLE'  => 'The uploaded file is not compatible with this flavor (Community Edition, Professional, or Enterprise) of SuiteCRM: ',
	'LBL_LANGPACKS' => '語言包' /*for 508 compliance fix*/,
	'LBL_MODULELOADER' => '模塊載入器' /*for 508 compliance fix*/,
	'LBL_PATCHUPGRADES' => '升級補丁' /*for 508 compliance fix*/,
	'LBL_THEMES' => '主題設置' /*for 508 compliance fix*/,
	'LBL_WORKFLOW' => '工作流程' /*for 508 compliance fix*/,
	'LBL_UPGRADE' => '更新' /*for 508 compliance fix*/,
	'LBL_PROCESSING' => '處理中' /*for 508 compliance fix*/,

	'ERR_UW_PHP_FILE_ERRORS'					=> array(
													1 => '上傳文件大小超出了php.ini文件中變數upload_max_filesize指定的值。',
													2 => '上傳文件大小超出了HTML表單中變數MAX_FILE_SIZE指定的值。',
													3 => '只上傳了部分文件。',
													4 => '沒有上傳文件。',
													5 => '未知錯誤。',
													6 => '缺少臨時文件夾。',
													7 => '寫入磁碟文件錯誤。',
													8 => '由於擴展，文件未能上傳。',
),
);
