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


$mod_strings = array(

    'LBL_MODULE_NAME' => '日程安排',
    'LBL_MODULE_TITLE' => '日程安排',
    'LNK_NEW_CALL' => '安排電話',
    'LNK_NEW_MEETING' => '安排會議',
    'LNK_NEW_APPOINTMENT' => '新增約會',
    'LNK_NEW_TASK' => '新增任務',
    'LNK_CALL_LIST' => '電話',
    'LNK_MEETING_LIST' => '會議',
    'LNK_TASK_LIST' => '任務',
    'LNK_VIEW_CALENDAR' => '今天',
    'LNK_IMPORT_CALLS' => '導入電話',
    'LNK_IMPORT_MEETINGS' => '導入會議',
    'LNK_IMPORT_TASKS' => '導入任務',
    'LBL_MONTH' => '月',
    'LBL_DAY' => '日',
    'LBL_YEAR' => '年',
    'LBL_WEEK' => '周',
    'LBL_PREVIOUS_MONTH' => '上月',
    'LBL_PREVIOUS_DAY' => '昨天',
    'LBL_PREVIOUS_YEAR' => '去年',
    'LBL_PREVIOUS_WEEK' => '上周',
    'LBL_NEXT_MONTH' => '下月',
    'LBL_NEXT_DAY' => '明天',
    'LBL_NEXT_YEAR' => '明年',
    'LBL_NEXT_WEEK' => '下周',
    'LBL_AM' => '上午',
    'LBL_PM' => '下午',
    'LBL_SCHEDULED' => '已安排',
    'LBL_BUSY' => '忙碌',
    'LBL_CONFLICT' => '衝突',
    'LBL_USER_CALENDARS' => '用戶日程表',
    'LBL_SHARED' => '共享',
    'LBL_PREVIOUS_SHARED' => '上頁',
    'LBL_NEXT_SHARED' => '下一步',
    'LBL_SHARED_CAL_TITLE' => '共享日程安排',
    'LBL_USERS' => '用戶',
    'LBL_REFRESH' => '更新',
    'LBL_EDIT_USERLIST' => '用戶列表',
    'LBL_SELECT_USERS' => '請選擇共享用戶',
    'LBL_FILTER_BY_TEAM' => '通過團隊過濾用戶列表:',
    'LBL_ASSIGNED_TO_NAME' => '負責人',
    'LBL_DATE' => '開始日期和時間',
    'LBL_CREATE_MEETING' => '安排會議',
    'LBL_CREATE_CALL' => '安排電話',
    'LBL_HOURS_ABBREV' => 'h',
    'LBL_MINS_ABBREV' => 'm',


    'LBL_YES' => '是',
    'LBL_NO' => '否',
    'LBL_SETTINGS' => '設置',
    'LBL_CREATE_NEW_RECORD' => '創建活動',
    'LBL_LOADING' => 'Loading ......',
    'LBL_SAVING' => '保存 ......',
    'LBL_SENDING_INVITES' => '保存併發送邀請 .....',
    'LBL_CONFIRM_REMOVE' => '你確定要刪除紀錄嗎？',
    'LBL_CONFIRM_REMOVE_ALL_RECURRING' => '你確定要刪除所有紀錄嗎？',
    'LBL_EDIT_RECORD' => '編輯活動',
    'LBL_ERROR_SAVING' => '保存時出錯',
    'LBL_ERROR_LOADING' => 'Error while loading',
    'LBL_GOTO_DATE' => '跳轉到日期',
    'NOTICE_DURATION_TIME' => '持續時間必須大於0',
    'LBL_STYLE_BASIC' => '基礎',
    'LBL_STYLE_ADVANCED' => '高級',

    'LBL_INFO_TITLE' => '其他詳細信息',
    'LBL_INFO_DESC' => '描述',
    'LBL_INFO_START_DT' => '開始時間',
    'LBL_INFO_DUE_DT' => '到期時間',
    'LBL_INFO_DURATION' => '持續時間',
    'LBL_INFO_NAME' => '主題',
    'LBL_INFO_RELATED_TO' => '關聯到',

    'LBL_NO_USER' => '找不到負責人',
    'LBL_SUBJECT' => '主題',
    'LBL_DURATION' => '持續時間',
    'LBL_STATUS' => '狀態',
    'LBL_DATE_TIME' => '日期和時間',


    'LBL_SETTINGS_TITLE' => '設置',
    'LBL_SETTINGS_DISPLAY_TIMESLOTS' => '在日、周視圖上顯示時間段:',
    'LBL_SETTINGS_TIME_STARTS' => '開始時間:',
    'LBL_SETTINGS_TIME_ENDS' => '結束時間:',
    'LBL_SETTINGS_CALLS_SHOW' => '顯示電話:',
    'LBL_SETTINGS_TASKS_SHOW' => '顯示任務:',
    'LBL_SETTINGS_COMPLETED_SHOW' => 'Show Completed Meetings, Calls and Tasks:',

    'LBL_SAVE_BUTTON' => '保存',
    'LBL_DELETE_BUTTON' => '刪除',
    'LBL_APPLY_BUTTON' => '應用',
    'LBL_SEND_INVITES' => '保存併發送邀請',
    'LBL_CANCEL_BUTTON' => '取消',
    'LBL_CLOSE_BUTTON' => '關閉',

    'LBL_GENERAL_TAB' => '詳細',
    'LBL_PARTICIPANTS_TAB' => '被邀請人',
    'LBL_REPEAT_TAB' => '周期重覆',

    'LBL_REPEAT_TYPE' => '重覆',
    'LBL_REPEAT_INTERVAL' => '每',
    'LBL_REPEAT_END' => '結束',
    'LBL_REPEAT_END_AFTER' => '在之後',
    'LBL_REPEAT_OCCURRENCES' => '重覆次數',
    'LBL_REPEAT_END_BY' => '到',
    'LBL_REPEAT_DOW' => '在',
    'LBL_REPEAT_UNTIL' => '重覆直到',
    'LBL_REPEAT_COUNT' => '重覆次數',
    'LBL_REPEAT_LIMIT_ERROR' => '你的設置將創建 $limit 個會議。',

    'LBL_EDIT_ALL_RECURRENCES' => '編輯所有周期重覆紀錄',
    'LBL_REMOVE_ALL_RECURRENCES' => '刪除所有周期重覆紀錄',

    'LBL_DATE_END_ERROR' => '結束日期在開始日期之前',
    'ERR_YEAR_BETWEEN' => 'Sorry, calendar cannot handle the year you requested<br>Year must be between 1970 and 2037',
    'ERR_NEIGHBOR_DATE' => 'get_neighbor_date_str: not defined for this view',
    'LBL_NO_ITEMS_MOBILE' => 'Your calendar is clear for the week.',
    'LBL_SECURITYGROUPS' => '以安全群組過濾用戶列表',

    'LBL_ADD_ITEM' => 'Add Item',
    'LBL_ADD_MEETING' => 'Add Meeting',
    'LBL_ADD_TASK' => 'Add Task',
    'LBL_ADD_CALL' => 'Add Call',

);

$mod_list_strings = array(
    'dom_cal_weekdays' =>
        array(
            "晴",
            "Mon",
            "Tue",
            "Wed",
            "Thu",
            "Fri",
            "Sat",
        ),
    'dom_cal_weekdays_long' =>
        array(
            "星期日",
            "星期一",
            "星期二",
            "星期三",
            "星期四",
            "星期五",
            "星期六",
        ),
    'dom_cal_month' =>
        array(
            "",
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "(GMT+5)葉卡特琳堡",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ),
    'dom_cal_month_long' =>
        array(
            "",
            "January",
            "February",
            "高 Boost",
            "(GMT+4)喀布爾",
            "(GMT+5)葉卡特琳堡",
            "(GMT+6)阿斯塔納",
            "(GMT+7)曼谷",
            "(GMT+8)珀斯",
            "(GMT+9)漢城",
            "(GMT+10)布裡斯班",
            "(GMT+11)索羅門群島",
            "(GMT+12)奧克蘭",
        ),
);
?>
