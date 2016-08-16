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
	'LBL_SEND_DATE_TIME'						=> '發送日期',
	'LBL_IN_QUEUE'								=> '在隊列中?',
	'LBL_IN_QUEUE_DATE'							=> '排隊日期',

	'ERR_INT_ONLY_EMAIL_PER_RUN'				=> '每一批發送過的電子郵件數量只可以是整數',

	'LBL_ATTACHMENT_AUDIT'						=> '被髮送。它未重覆占用當前機器的磁碟。',
	'LBL_CONFIGURE_SETTINGS'					=> '配置',
	'LBL_CUSTOM_LOCATION'						=> '已定義用戶',
	'LBL_DEFAULT_LOCATION'						=> '默認',
	
	'LBL_DISCLOSURE_TITLE'						=> '附錄對每封郵件顯示的消息',
	'LBL_DISCLOSURE_TEXT_TITLE'					=> '顯示的內容',
	'LBL_DISCLOSURE_TEXT_SAMPLE'				=> '註意: 這封郵件消息是為唯一的受件人用戶並可能含有機密或保密信息. 任何未授權的檢查, 使用, 泄露, 或者分配都是被禁止的. 如果您沒有打算接受, 請銷毀原始信息的所有副本並通告發送者以便我們的地址記錄能夠被改正。謝謝.',
	
	'LBL_EMAIL_DEFAULT_CHARSET'					=> '用這種字元集撰寫電子郵件',
	'LBL_EMAIL_DEFAULT_EDITOR'					=> '用這種客戶端撰寫電子郵件',
	'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS'		=> '刪除電子郵件的同時也刪除相關的備忘錄和附件',
	'LBL_EMAIL_GMAIL_DEFAULTS'					=> '添入Gmail的默認',
	'LBL_EMAIL_PER_RUN_REQ'						=> '每一批發送電子郵件的數量:',
	'LBL_EMAIL_SMTP_SSL'						=> '使SMTP在SSL之上有效',
	'LBL_EMAIL_USER_TITLE'						=> '用戶默認電子郵件',
	'LBL_EMAIL_OUTBOUND_CONFIGURATION'			=> '外發電子郵件配置',
	'LBL_EMAILS_PER_RUN'						=> '每一批發送電子郵件的數量:',
	'LBL_ID'									=> '編號',
	'LBL_LIST_CAMPAIGN'							=> '市場活動',
	'LBL_LIST_FORM_PROCESSED_TITLE'				=> '已處理的',
	'LBL_LIST_FORM_TITLE'						=> '隊列',
	'LBL_LIST_FROM_EMAIL'						=> '發件人電子郵件',
	'LBL_LIST_FROM_NAME'						=> '發件人姓名',
	'LBL_LIST_IN_QUEUE'							=> '處理中',
	'LBL_LIST_MESSAGE_NAME'						=> '營銷信息',
	'LBL_LIST_RECIPIENT_EMAIL'					=> '收件人電子郵件',
	'LBL_LIST_RECIPIENT_NAME'					=> '收件人姓名',
	'LBL_LIST_SEND_ATTEMPTS'					=> '試圖發送',
	'LBL_LIST_SEND_DATE_TIME'					=> '發送於',
	'LBL_LIST_USER_NAME'						=> '用戶名',
	'LBL_LOCATION_ONLY'							=> '地點',
	'LBL_LOCATION_TRACK'						=> '市場活動追蹤文件的位置(像campaign_tracker.php)',
    'LBL_CAMP_MESSAGE_COPY'                     => '保留市場活動信息的備份:',
    'LBL_CAMP_MESSAGE_COPY_DESC'                     => '您是否希望存儲在所有市場活動中發送的每一封電子郵件的消息副本?我們建議且系統默認不會這樣做.選擇否僅存儲發送的模板和創建消息所需的變數.',
	'LBL_MAIL_SENDTYPE'							=> '郵件傳送代理:',
	'LBL_MAIL_SMTPAUTH_REQ'						=> '使用SMTP認證?',
	'LBL_MAIL_SMTPPASS'							=> 'SMTP密碼:',
	'LBL_MAIL_SMTPPORT'							=> 'SMTP埠:',
	'LBL_MAIL_SMTPSERVER'						=> 'SMTP伺服器地址:',
	'LBL_MAIL_SMTPUSER'							=> 'SMTP用戶名:',
	'LBL_CHOOSE_EMAIL_PROVIDER'        => '選擇電子郵件提供商：',
	'LBL_YAHOOMAIL_SMTPPASS'					=> 'Yahoo! Mail 密碼:',
	'LBL_YAHOOMAIL_SMTPUSER'					=> 'Yahoo! Mail:',
	'LBL_GMAIL_SMTPPASS'					=> 'Gmail密碼:',
	'LBL_GMAIL_SMTPUSER'					=> 'Gmail地址:',
	'LBL_EXCHANGE_SMTPPASS'					=> 'Exchange密碼:',
	'LBL_EXCHANGE_SMTPUSER'					=> 'Exchange用戶名:',
	'LBL_EXCHANGE_SMTPPORT'					=> 'Exchange伺服器埠:',
	'LBL_EXCHANGE_SMTPSERVER'				=> 'Exchange伺服器:',
	'LBL_EMAIL_LINK_TYPE'				=> '電子郵件客戶端',
    'LBL_EMAIL_LINK_TYPE_HELP'			=> '<b>SuiteCRM Mail Client:</b> Send emails using the email client in the SuiteCRM application.<br><b>External Mail Client:</b> Send email using an email client outside of the SuiteCRM application, such as Microsoft Outlook.',
	'LBL_MARKETING_ID'							=> '營銷編號',
    'LBL_MODULE_ID'                             => '郵遞員',
	'LBL_MODULE_NAME'							=> '電子郵件設置',
	'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS'    => '配置市場的電子郵件設置',
	'LBL_MODULE_TITLE'							=> '發件箱電子郵件隊列管理',
	'LBL_NOTIFICATION_ON_DESC' 					=> '當有記錄被指派的時候，發送通知郵件。',
	'LBL_NOTIFY_FROMADDRESS' 					=> '“發件人”地址:',
	'LBL_NOTIFY_FROMNAME' 						=> '“發件人”姓名:',
	'LBL_NOTIFY_ON'								=> '打開通知郵件?',
	'LBL_NOTIFY_SEND_BY_DEFAULT'				=> '為新用戶發送默認通知郵件?',
	'LBL_NOTIFY_TITLE'							=> '電子郵件通知選項',
	'LBL_OLD_ID'								=> '舊編號',
	'LBL_OUTBOUND_EMAIL_TITLE'					=> '發件箱電子郵件選項',
	'LBL_RELATED_ID'							=> '相關編號',
	'LBL_RELATED_TYPE'							=> '相關類型',
	'LBL_SAVE_OUTBOUND_RAW'						=> '保存發件箱中的原始電子郵件。',
	'LBL_SEARCH_FORM_PROCESSED_TITLE'			=> '查找已處理的',
	'LBL_SEARCH_FORM_TITLE'						=> '查找隊列',
	'LBL_VIEW_PROCESSED_EMAILS'					=> '查看已處理的電子郵件',
	'LBL_VIEW_QUEUED_EMAILS'					=> '查看隊列電子郵件',
	'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE'	=> 'config.php中變數site_url的值',
	'TXT_REMOVE_ME_ALT'							=> '要把自己從這個郵件列表中移除，請去',
	'TXT_REMOVE_ME_CLICK'						=> '點擊這兒',
	'TXT_REMOVE_ME'								=> '把自己從電子郵件列表中移除',
	'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER'		=> '給負責人的電子郵件地址發送通知?',

	'LBL_SECURITY_TITLE'						=> '電子郵件安全設置',
	'LBL_SECURITY_DESC'							=> '不允許進入收件箱，或者不允許顯示電子郵件模塊。',
	'LBL_SECURITY_APPLET'						=> '小應用程序標簽',
	'LBL_SECURITY_BASE'							=> '基本標簽',
	'LBL_SECURITY_EMBED'						=> '嵌入標簽',
	'LBL_SECURITY_FORM'							=> '表單標簽',
	'LBL_SECURITY_FRAME'						=> '結構標簽',
	'LBL_SECURITY_FRAMESET'						=> '框架標簽',
	'LBL_SECURITY_IFRAME'						=> 'Iframe標簽',
	'LBL_SECURITY_IMPORT'						=> '導入標簽',
	'LBL_SECURITY_LAYER'						=> '層次標簽',
	'LBL_SECURITY_LINK'							=> '鏈接標簽',
	'LBL_SECURITY_OBJECT'						=> '對象標簽',
	'LBL_SECURITY_OUTLOOK_DEFAULTS'				=> '選擇Outlook默認最低安全防範(錯誤在正確的一邊顯示)。',
	'LBL_SECURITY_SCRIPT'						=> '腳本標簽',
	'LBL_SECURITY_STYLE'						=> '風格標簽',
	'LBL_SECURITY_TOGGLE_ALL'					=> '選中所有的選項',
	'LBL_SECURITY_XMP'							=> 'Xmp標簽',
    'LBL_YES'                                   => '是',
    'LBL_NO'                                    => '否',
    'LBL_PREPEND_TEST'                          => '[測試]:',
	'LBL_SEND_ATTEMPTS'							=> '嘗試發送',
	'LBL_OUTGOING_SECTION_HELP'                 => '配置預設的外發電子郵件伺服器，用來發送提醒、工作流告警等。',
    'LBL_ALLOW_DEFAULT_SELECTION'               => '允許用戶使用該郵件帳戶外發電子郵件：',
    'LBL_ALLOW_DEFAULT_SELECTION_HELP'          => '如果選擇該選項，所有的用戶都能通過這個外發電子郵件帳戶發送電子郵件<br> 該電子郵件被髮送提醒和工作流告警等。<br>如果不選擇該選項，用戶也能通過配置自己的外發電子郵件伺服器來發送這些信息。',
    'LBL_FROM_ADDRESS_HELP'                     => '當選中時，指定的用戶姓名和電子郵件地址將出現在電子郵件的發件人選項中。該需要SMTP伺服器支持。',
	'LBL_GMAIL_LOGO' => 'Gmail' /*for 508 compliance fix*/,
	'LBL_YAHOO_MAIL_LOGO' => 'Yahoo Mail' /*for 508 compliance fix*/,
	'LBL_EXCHANGE_LOGO' => 'Exchange' /*for 508 compliance fix*/,
	'LBL_HELP' => '幫助' /*for 508 compliance fix*/,
);

?>