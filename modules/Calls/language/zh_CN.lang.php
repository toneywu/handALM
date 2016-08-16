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
    'LBL_BLANK' => ' ',
    'LBL_MODULE_NAME' => '电话',
    'LBL_MODULE_TITLE' => '电话',
    'LBL_SEARCH_FORM_TITLE' => '查找电话',
    'LBL_LIST_FORM_TITLE' => '电话列表',
    'LBL_NEW_FORM_TITLE' => '安排电话',
    'LBL_LIST_CLOSE' => '关闭',
    'LBL_LIST_SUBJECT' => '主题',
    'LBL_LIST_CONTACT' => '联系人',
    'LBL_LIST_RELATED_TO' => '相关',
    'LBL_LIST_RELATED_TO_ID' => '关联到编号',
    'LBL_LIST_DATE' => '开始日期',
    'LBL_LIST_TIME' => '开始时间',
    'LBL_LIST_DURATION' => '期间',
    'LBL_LIST_DIRECTION' => '方向',
    'LBL_SUBJECT' => '主题:',
    'LBL_REMINDER' => '提醒:',
    'LBL_CONTACT_NAME' => '联系人:',
    'LBL_DESCRIPTION_INFORMATION' => '说明信息',
    'LBL_DESCRIPTION' => '说明:',
    'LBL_STATUS' => '状态:',
    'LBL_DIRECTION' => '方向:',
    'LBL_DATE' => '开始日期:',
    'LBL_DURATION' => '活动时间:',
    'LBL_DURATION_HOURS' => '期间(小时):',
    'LBL_DURATION_MINUTES' => '期间(分钟):',
    'LBL_HOURS_MINUTES' => '(时/分)',
    'LBL_CALL' => '电话:',
    'LBL_DATE_TIME' => '开始日期和时间:',
    'LBL_TIME' => '开始时间:',
    'LBL_HOURS_ABBREV' => '小时',
    'LBL_MINSS_ABBREV' => '分钟',
    'LBL_COLON' => ':',
    'LNK_NEW_CALL' => '安排电话',
    'LNK_NEW_MEETING' => '安排会议',
    'LNK_CALL_LIST' => '电话',
    'LNK_IMPORT_CALLS' => '导入电话',
    'ERR_DELETE_RECORD' => '必须指定记录编号才能删除客户。',
    'NTC_REMOVE_INVITEE' => '您确定要删除这个电话邀请吗?',
    'LBL_INVITEE' => '受邀者',
    'LBL_RELATED_TO' => '相关:',
    'LNK_NEW_APPOINTMENT' => '新增约会',
    'LBL_SCHEDULING_FORM_TITLE' => '日程安排',
    'LBL_ADD_INVITEE' => '增加受邀者',
    'LBL_NAME' => '名称',
    'LBL_FIRST_NAME' => '名',
    'LBL_LAST_NAME' => '姓',
    'LBL_EMAIL' => '电子邮件',
    'LBL_PHONE' => '电话',
    'LBL_REMINDER_POPUP' => '弹出',
    'LBL_REMINDER_EMAIL' => '电子邮件',
    'LBL_REMINDER_EMAIL_ALL_INVITEES' => '发邮件给所有受邀者',
    'LBL_EMAIL_REMINDER' => 'Email提醒',
    'LBL_EMAIL_REMINDER_TIME' => 'Email提醒时间',
    'LBL_SEND_BUTTON_TITLE' => '发送邀请函[Alt+I]',
    'LBL_SEND_BUTTON_KEY' => 'I',
    'LBL_SEND_BUTTON_LABEL' => '发送邀请函',
    'LBL_DATE_END' => '完成日期',
    'LBL_TIME_END' => '完成时间',
    'LBL_REMINDER_TIME' => '提醒时间',
    'LBL_EMAIL_REMINDER_SENT' => 'Email提醒已发送',
    'LBL_SEARCH_BUTTON' => '查找',
    'LBL_ACTIVITIES_REPORTS' => '活动报表',
    'LBL_ADD_BUTTON' => '增加',
    'LBL_DEFAULT_SUBPANEL_TITLE' => '电话',
    'LBL_LOG_CALL' => '电话记录',
    'LNK_SELECT_ACCOUNT' => '选择客户',
    'LNK_NEW_ACCOUNT' => '新增客户',
    'LNK_NEW_OPPORTUNITY' => '新增商业机会',
    'LBL_DEL' => '删除',
    'LBL_LEADS_SUBPANEL_TITLE' => '潜在客户',
    'LBL_CONTACTS_SUBPANEL_TITLE' => '联系人',
    'LBL_USERS_SUBPANEL_TITLE' => '用户',
    'LBL_OUTLOOK_ID' => 'Outlook编号',
    'LBL_MEMBER_OF' => '上级单位',
    'LBL_HISTORY_SUBPANEL_TITLE' => '备忘录',
    'LBL_LIST_ASSIGNED_TO_NAME' => '负责人',
    'LBL_LIST_MY_CALLS' => '我的电话',
    'LBL_SELECT_FROM_DROPDOWN' => '请先从下拉列表中选取一个相关的记录。',
    'LBL_ASSIGNED_TO_NAME' => '负责人',
    'LBL_ASSIGNED_TO_ID' => '负责用户',
    'NOTICE_DURATION_TIME' => '持续时间必须大于0',
    'LBL_CALL_INFORMATION' => '电话概览',
    'LBL_REMOVE' => '删除',
    'LBL_ACCEPT_STATUS' => '接受状态',
    'LBL_ACCEPT_LINK' => '接受链接',
    //For export labels
    'LBL_PARENT_ID' => '父记录ID',
    'LBL_EXPORT_MODIFIED_USER_ID' => '修改人ID',
    'LBL_EXPORT_CREATED_BY' => '创建人ID',
    'LBL_EXPORT_ASSIGNED_USER_ID' => '负责人ID',
    'LBL_EXPORT_DATE_START' => '开始日期和时间',
    'LBL_EXPORT_PARENT_TYPE' => '关联到模块',
    'LBL_EXPORT_REMINDER_TIME' => '提醒时间（分钟）',

    // create invitee functionallity
    'LBL_CREATE_INVITEE' => '创建被邀请人',
    'LBL_CREATE_CONTACT' => '作为联系人',
    'LBL_CREATE_LEAD' => '作为潜在客户',
    'LBL_CREATE_AND_ADD' => '创建并添加',
    'LBL_CANCEL_CREATE_INVITEE' => '取消',
    'LBL_EMPTY_SEARCH_RESULT' => '对不起，没找到记录。请创建一个被邀请人。',
    'LBL_NO_ACCESS' => '您没有权限创建模块 $module',

    'LBL_REPEAT_TYPE' => '重复',
    'LBL_REPEAT_INTERVAL' => '每',
    'LBL_REPEAT_DOW' => '重复Dow',
    'LBL_REPEAT_UNTIL' => '重复直到',
    'LBL_REPEAT_COUNT' => '重复次数',
    'LBL_REPEAT_PARENT_ID' => '重复父记录ID',
    'LBL_RECURRING_SOURCE' => '周期重复源',

    'LBL_SYNCED_RECURRING_MSG' => '此通话起源于另一个系统，并同步到 SuiteCRM。要要进行更改，请转到其他系统中的通话。在其他系统中所做的更改可以同步到此记录。',

    // for reminders
    'LBL_REMINDERS' => '显示提醒?',
    'LBL_REMINDERS_ACTIONS' => 'Actions:',
    'LBL_REMINDERS_POPUP' => '弹出',
    'LBL_REMINDERS_EMAIL' => 'Email invitees',
    'LBL_REMINDERS_WHEN' => 'When:',
    'LBL_REMINDERS_REMOVE_REMINDER' => 'Remove reminder',
    'LBL_REMINDERS_ADD_ALL_INVITEES' => 'Add All Invitees',
    'LBL_REMINDERS_ADD_REMINDER' => 'Add reminder',

    'LBL_RESCHEDULE' => '重新调度',
    'LBL_RESCHEDULE_COUNT' => '试呼',
    'LBL_RESCHEDULE_DATE' => '日期',
    'LBL_RESCHEDULE_REASON' => '原因',
    'LBL_RESCHEDULE_ERROR1' => '请选择有效的日期',
    'LBL_RESCHEDULE_ERROR2' => '请选择一个理由',
    'LBL_RESCHEDULE_PANEL' => '重新调度',
    'LBL_RESCHEDULE_HISTORY' => 'Call Attempt History'

);


?>
