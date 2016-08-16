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
  'LBL_MODULE_NAME' => '活動',
  'LBL_MODULE_TITLE' => '活動:首頁',
  'LBL_SEARCH_FORM_TITLE' => '活動查找',
  'LBL_LIST_FORM_TITLE' => '活動列表',
  'LBL_LIST_SUBJECT' => '主題',
  'LBL_LIST_CONTACT' => '聯繫人',
  'LBL_LIST_RELATED_TO' => '相關',
  'LBL_LIST_DATE' => '日期',
  'LBL_LIST_TIME' => '開始時間',
  'LBL_LIST_CLOSE' => '關閉',
  'LBL_SUBJECT' => '主題:',
  'LBL_STATUS' => '狀態:',
  'LBL_LOCATION' => '地點:',
  'LBL_DATE_TIME' => '開始日期和時間:',
  'LBL_DATE' => '開始日期:',
  'LBL_TIME' => '開始時間:',
  'LBL_DURATION' => '活動時間:',
  'LBL_DURATION_MINUTES' => '持續時間:',
  'LBL_HOURS_MINS' => '(時/分)',
  'LBL_CONTACT_NAME' => '聯繫人姓名:',
  'LBL_MEETING' => '會議:',
  'LBL_DESCRIPTION_INFORMATION' => '說明信息',
  'LBL_DESCRIPTION' => '說明:',
  'LBL_COLON' => ':',
  'LNK_NEW_CALL' => '安排電話',
  'LNK_NEW_MEETING' => '安排會議',
  'LNK_NEW_TASK' => '新增任務',
  'LNK_NEW_NOTE' => '新增備忘錄',
  'LNK_NEW_EMAIL' => '新增存檔電子郵件',
  'LNK_CALL_LIST' => '電話',
  'LNK_MEETING_LIST' => '會議',
  'LNK_TASK_LIST' => '任務',
  'LNK_NOTE_LIST' => '備忘錄',
  'LNK_EMAIL_LIST' => '電子郵件',
  'LBL_DELETE_ACTIVITY' => 'Are you sure you want to delete this activity?',
  'ERR_DELETE_RECORD' => '必須指定記錄編號才能刪除客戶。',
  'NTC_REMOVE_INVITEE' => '您確定要從會議中刪除這個受邀者?',
  'LBL_INVITEE' => '受邀者',
  'LBL_LIST_DIRECTION' => '方向',
  'LBL_DIRECTION' => '方向',
  'LNK_NEW_APPOINTMENT' => '新會議',
  'LNK_VIEW_CALENDAR' => '今天',
  'LBL_OPEN_ACTIVITIES' => '在做的活動',
  'LBL_HISTORY' => '歷史記錄',
  'LBL_UPCOMING' => '最近安排',
  'LBL_TODAY' => '通過',
  'LBL_NEW_TASK_BUTTON_TITLE' => '新增任務[Alt+N]',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_NEW_TASK_BUTTON_LABEL' => '新增任務',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => '安排會議[Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => '安排會議',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => '安排電話[Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => '安排電話',
  'LBL_NEW_NOTE_BUTTON_TITLE' => '新增備忘錄[Alt+T]',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_NEW_NOTE_BUTTON_LABEL' => '新增備忘錄',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => '存檔電子郵件[Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => '存檔電子郵件',
  'LBL_LIST_STATUS' => '狀態',
  'LBL_LIST_DUE_DATE' => '完成日期',
  'LBL_LIST_LAST_MODIFIED' => '最新修改',
  'NTC_NONE_SCHEDULED' => '未安排。',
  'appointment_filter_dom' => array(
  	 'today' => '今天'
  	,'tomorrow' => '明天'
  	,'this Saturday' => '本周'
  	,'next Saturday' => '下周'
  	,'last this_month' => '本月'
  	,'last next_month' => '下月'
),
  'LNK_IMPORT_CALLS'=>'導入電話',
  'LNK_IMPORT_MEETINGS'=>'導入會議',
  'LNK_IMPORT_TASKS'=>'導入任務',
  'LNK_IMPORT_NOTES'=>'導入備忘錄',
  'NTC_NONE'=>'無',
  'LBL_ACCEPT_THIS'=>'接受?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => '在做的活動',
  'LBL_LIST_ASSIGNED_TO_NAME' => '負責人',

	'LBL_ACCEPT' => '接受' /*for 508 compliance fix*/,
);


?>