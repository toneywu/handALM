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

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$mod_strings = array(


	'LBL_RE'					=> '答覆:',

	'ERR_BAD_LOGIN_PASSWORD'=> '用戶名或者密碼錯誤',
	'ERR_BODY_TOO_LONG'		=> '電子郵件正文太長。請調整。',
	'ERR_INI_ZLIB'			=> '暫時無法關閉Zlib壓縮。“測試設置”可能失敗。',
	'ERR_MAILBOX_FAIL'		=> '不能檢索任何郵件箱。',
	'ERR_NO_IMAP'			=> '未發現IMAP類庫。請在使用收件箱前解決這個問題。',
	'ERR_NO_OPTS_SAVED'		=> '沒有最佳設置收件箱。請重新查看設置。',
	'ERR_TEST_MAILBOX'		=> '請檢查您的設置，再重試。',

	'LBL_APPLY_OPTIMUMS'	=> '提交最佳設置',
	'LBL_ASSIGN_TO_USER'	=> '指派給用戶',
	'LBL_AUTOREPLY_OPTIONS'	=> '自動回覆選項',
	'LBL_AUTOREPLY'			=> '自動回覆模板',
	'LBL_AUTOREPLY_HELP'	=> '選擇收到電子郵件時的自動回覆發件人。',
	'LBL_BASIC'				=> '基本設置',
	'LBL_CASE_MACRO'		=> '用戶反饋宏',
	'LBL_CASE_MACRO_DESC'	=> '設置宏，他可以解析和鏈接導入的電子郵件到用戶反饋。',
	'LBL_CASE_MACRO_DESC2'	=> '設置它為任何值，但是保留<b>"%1"</b>。',
	'LBL_CERT_DESC'			=> '強制驗證郵件伺服器的安全證書–如果是自我簽署，請不要使用',
	'LBL_CERT'				=> '證書驗證',
	'LBL_CLOSE_POPUP'		=> '關閉窗口',
	'LBL_CREATE_NEW_GROUP'	=> '--保存時新增分組郵箱--',
	'LBL_CREATE_TEMPLATE'	=> '新增',
	'LBL_SUBSCRIBE_FOLDERS'	=> '訂閱',
	'LBL_DEFAULT_FROM_ADDR'	=> '默認“發件人”地址:',
	'LBL_DEFAULT_FROM_NAME'	=> '默認“發件人”姓名:',
	'LBL_DELETE_SEEN'		=> '在導入後刪除已讀的電子郵件',
	'LBL_EDIT_TEMPLATE'		=> '編輯',
	'LBL_EMAIL_OPTIONS'		=> '電子郵件處理選項',
	'LBL_EMAIL_BOUNCE_OPTIONS' => '彈回郵件處理選項',
	'LBL_FILTER_DOMAIN_DESC'=> '不要發送自動回覆的電子郵件到這個域。',
	'LBL_ASSIGN_TO_GROUP_FOLDER_DESC'=> 'Select to automatically create email records in SuiteCRM for all incoming emails.',
	'LBL_POSSIBLE_ACTION_DESC'		=> '若要創建客戶反饋,必須選擇組文件夾',
	'LBL_FILTER_DOMAIN'		=> '沒有自動回覆的域',
	'LBL_FIND_OPTIMUM_KEY'	=> 'f',
	'LBL_FIND_OPTIMUM_MSG'	=> '<br>尋找最佳連接變數。',
	'LBL_FIND_OPTIMUM_TITLE'=> '尋找最佳配置',
	'LBL_FIND_SSL_WARN'		=> '<br>測試SSL可能會需要一段時間。請耐心等待。<br>',
	'LBL_FORCE_DESC'		=> '一些IMAP/POP3伺服器需要特殊的交換機。當連接失敗的時候，請檢查交換機(像/notls)',
	'LBL_FORCE'				=> '強制否定',
	'LBL_FOUND_MAILBOXES'	=> '發現下麵可使用的文件夾。<br>請選擇其中一個:',
	'LBL_FOUND_OPTIMUM_MSG'	=> '<br>已找到最優設置。請點擊下麵的按鈕以應用這些參數。',
	'LBL_FROM_ADDR'			=> '“發件人”地址',
    // as long as XTemplate doesn't support output escaping, transform
    // quotes to html-entities right here (bug #48913)
    'LBL_FROM_ADDR_DESC'    => "由於某些郵件伺服器的限制,這裡設置“發件人”地址可能不會顯示在電子郵件的“發件人”里,這種情況下顯示的是外發郵件伺服器里設置的郵件地址.",
	'LBL_FROM_NAME_ADDR'	=> '回覆姓名/電子郵件',
	'LBL_FROM_NAME'			=> '“發件人”姓名',
	'LBL_GROUP_QUEUE'		=> '指派給組',
    'LBL_HOME'              => '首頁',
	'LBL_LIST_MAILBOX_TYPE'	=> '使用收件箱',
	'LBL_LIST_NAME'			=> '名稱:',
	'LBL_LIST_GLOBAL_PERSONAL'			=> '組/個人',
	'LBL_LIST_SERVER_URL'	=> '郵件伺服器:',
	'LBL_LIST_STATUS'		=> '狀態:',
	'LBL_LOGIN'				=> '用戶名',
	'LBL_MAILBOX_DEFAULT'	=> '收件箱',
	'LBL_MAILBOX_SSL_DESC'	=> '連接時使用SSL。如果不能連接，請檢查您在安裝PHP的時候，配置項中是否包含了“--with-imap-ssl”。',
	'LBL_MAILBOX_SSL'		=> '使用SSL',
	'LBL_MAILBOX_TYPE'		=> '可能的動作',
	'LBL_DISTRIBUTION_METHOD' => '分發方法',
	'LBL_CREATE_CASE_REPLY_TEMPLATE' => '新建客戶反饋回覆模板',
	'LBL_CREATE_CASE_REPLY_TEMPLATE_HELP' => '選擇客戶反饋創建時的自動告知電子郵件的發件人。郵件中將包含客戶反饋號。只有當第一次收到收件人的郵件時才會創建這個郵件。',
	'LBL_MAILBOX'			=> '已監視的文件夾',
	'LBL_TRASH_FOLDER'		=> '垃圾郵件',
	'LBL_GET_TRASH_FOLDER'	=> '獲取垃圾郵件',
	'LBL_SENT_FOLDER'		=> '已發送郵件',
	'LBL_GET_SENT_FOLDER'	=> '獲取發送郵件',
	'LBL_SELECT'				=> '選擇',
	'LBL_MARK_READ_DESC'	=> '導入後在此郵件伺服器上標記信息已讀；不刪除。',
	'LBL_MARK_READ_NO'		=> '導入後刪除標記過的電子郵件',
	'LBL_MARK_READ_YES'		=> '導入後在伺服器上保留電子郵件',
	'LBL_MARK_READ'			=> '在伺服器上備份',
	'LBL_MAX_AUTO_REPLIES'	=> '自動響應的數量',
	'LBL_MAX_AUTO_REPLIES_DESC'	=> '設置自動響應發送一個唯一郵件地址的最大數值在24小時內.',
	'LBL_PERSONAL_MODULE_NAME' => '個人電子郵件帳號',
	'LBL_CREATE_CASE'      => '從電子郵件創建客戶反饋',
	'LBL_CREATE_CASE_HELP'  => 'Select to automatically create case records in SuiteCRM from incoming emails.',
	'LBL_MODULE_NAME'		=> '設置收件箱',
	'LBL_BOUNCE_MODULE_NAME' => '彈回電子郵件處理郵箱',
	'LBL_MODULE_TITLE'		=> '收件箱',
	'LBL_NAME'				=> '名稱',
    'LBL_NONE'              => '無',
	'LBL_NO_OPTIMUMS'		=> '未找到最優參數．請檢查您的設置，然後再試。',
	'LBL_ONLY_SINCE_DESC'	=> '當使用POP3時，PHP將不能過濾新信息或未讀信息。此標簽可以核對上次收件箱里的信息。如果您的郵件伺服器不支持IMAP，它將對此有很大改進。',
	'LBL_ONLY_SINCE_NO'		=> '不。檢查此郵件伺服器上的所有郵件。',
	'LBL_ONLY_SINCE_YES'	=> '是。',
	'LBL_ONLY_SINCE'		=> '只導入最後確認:',
	'LBL_OUTBOUND_SERVER'	=> '外部響應郵件服務',
	'LBL_PASSWORD_CHECK'	=> '密碼確認',
	'LBL_PASSWORD'			=> '密碼',
	'LBL_POP3_SUCCESS'		=> 'POP3測試連接成功。',
	'LBL_POPUP_FAILURE'		=> '測試連接失敗。錯誤顯示在下麵。',
	'LBL_POPUP_SUCCESS'		=> '測試連接成功。您的設置可以工作了。',
	'LBL_POPUP_TITLE'		=> '測試設置',
	'LBL_GETTING_FOLDERS_LIST' 		=> '獲取文件夾列表',
	'LBL_SELECT_SUBSCRIBED_FOLDERS' 		=> '選擇訂閱',
	'LBL_SELECT_TRASH_FOLDERS' 		=> '選擇垃圾郵件',
	'LBL_SELECT_SENT_FOLDERS' 		=> '選擇已發送郵件',
	'LBL_DELETED_FOLDERS_LIST' 		=> '以下目錄 %s 不存在或已從伺服器上刪除',
	'LBL_PORT'				=> '郵件伺服器埠',
	'LBL_QUEUE'				=> '郵件箱隊列',
	'LBL_REPLY_NAME_ADDR'	=> '回覆 名稱/郵件',
	'LBL_REPLY_TO_NAME'		=> '"回覆到" 名稱',
	'LBL_REPLY_TO_ADDR'		=> '"回覆到" 地址',
	'LBL_SAME_AS_ABOVE'		=> '使用從名稱/地址',
	'LBL_SAVE_RAW'			=> '保存原始資料',
	'LBL_SAVE_RAW_DESC_1'	=> '如果您想為每一封導入的電子郵件保留原始資料的話，請選擇“是”。',
	'LBL_SAVE_RAW_DESC_2'	=> '大的附件和錯誤的資料庫配置能夠引起錯誤。',
	'LBL_SERVER_OPTIONS'	=> '高級設置',
	'LBL_SERVER_TYPE'		=> '郵件伺服器協議',
	'LBL_SERVER_URL'		=> '郵件伺服器地址',
	'LBL_SSL_DESC'			=> '如有您的郵件伺服器支持安全埠連接，在導入電子郵件的時候，請啟用SLL連接。',
	'LBL_ASSIGN_TO_TEAM_DESC' => '所選團隊擁有此郵件帳號許可權. 如果選擇組文件夾,指派給該文件夾的團隊將覆蓋所選團隊.',
	'LBL_SSL'				=> '使用SSL',
	'LBL_STATUS'			=> '狀態',
	'LBL_SYSTEM_DEFAULT'	=> '系統默認',
	'LBL_TEST_BUTTON_KEY'	=> 't',
	'LBL_TEST_BUTTON_TITLE'	=> '測試[Alt+T]',
	'LBL_TEST_SETTINGS'		=> '測試設置',
	'LBL_TEST_SUCCESSFUL'	=> '連接完全成功。',
	'LBL_TEST_WAIT_MESSAGE'	=> '請稍後...',
	'LBL_TLS_DESC'			=> '連接郵件伺服器時使用傳輸層安全協議–如果您的郵件伺服器支持這此協議，請只使用這一個。',
	'LBL_TLS'				=> '使用TLS',
	'LBL_WARN_IMAP_TITLE'	=> '禁用收件箱',
	'LBL_WARN_IMAP'			=> '警告:',
	'LBL_WARN_NO_IMAP'		=> '收件箱功能<b>不能使用</b>如果在編譯PHP的時候未打開IMAPc-client類庫。請聯繫管理員來解決這個問題。',

	'LNK_CREATE_GROUP'		=> '新增組',
	'LNK_LIST_CREATE_NEW_GROUP'	 => '新建組郵件帳號',
	'LNK_LIST_CREATE_NEW_BOUNCE' => '新建彈回電子郵件處理帳號',
	'LNK_LIST_MAILBOXES'	=> '所有郵件箱',
	'LNK_LIST_QUEUES'		=> '所有隊列',
	'LNK_LIST_SCHEDULER'	=> '計劃任務',
	'LNK_LIST_TEST_IMPORT'	=> '測試郵件導入',
	'LNK_NEW_QUEUES'		=> '新增隊列',
	'LNK_SEED_QUEUES'		=> '團隊的記錄隊列',
	'LBL_GROUPFOLDER_ID'	=> '組文件夾編號',
	'LBL_ASSIGN_TO_GROUP_FOLDER' => '負責人組文件夾',
    'LBL_ALLOW_OUTBOUND_GROUP_USAGE' => '發送郵件時，允許用戶使用"發件人"的姓名和地址作為回覆地址',
    'LBL_ALLOW_OUTBOUND_GROUP_USAGE_DESC' => '如果選中該選擇，當有權訪問這個組郵件的用戶發郵件時，這個組郵件對應的"發件人"姓名和電子郵件地址將出現在發件人選項中。',
    'LBL_STATUS_ACTIVE'     => '啟用',
    'LBL_STATUS_INACTIVE'   => '停用',
    'LBL_IS_PERSONAL' => 'personal',
    'LBL_IS_GROUP' => ' 組 ',
    'LBL_ENABLE_AUTO_IMPORT' => '欄位導入電子郵件',
    'LBL_WARNING_CHANGING_AUTO_IMPORT' => '警告：你修改了自動導入設置，這將會導致生產大量數據。',
    'LBL_WARNING_CHANGING_AUTO_IMPORT_WITH_CREATE_CASE' => '警告：如果要欄位創建客戶反饋，必須設置成自動導入電子郵件。',
	'LBL_EDIT_LAYOUT' => '編輯佈局' /*for 508 compliance fix*/,
);
?>
