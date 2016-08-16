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

    'LBL_MODULE_NAME' => '日历',
    'LBL_MODULE_TITLE' => '日历',
    'LNK_NEW_CALL' => '新建电话',
    'LNK_NEW_MEETING' => '新建会议',
    'LNK_NEW_APPOINTMENT' => '新建约会',
    'LNK_NEW_TASK' => '新建任务',
    'LNK_CALL_LIST' => '电话',
    'LNK_MEETING_LIST' => '会议',
    'LNK_TASK_LIST' => '任务',
    'LNK_VIEW_CALENDAR' => '查看日历',
    'LNK_IMPORT_CALLS' => '导入电话',
    'LNK_IMPORT_MEETINGS' => '导入会议',
    'LNK_IMPORT_TASKS' => '导入任务',
    'LBL_MONTH' => '月',
    'LBL_DAY' => '日',
    'LBL_YEAR' => '年',
    'LBL_WEEK' => '周',
    'LBL_PREVIOUS_MONTH' => '上一月',
    'LBL_PREVIOUS_DAY' => '前一天',
    'LBL_PREVIOUS_YEAR' => '上一年',
    'LBL_PREVIOUS_WEEK' => '上一周',
    'LBL_NEXT_MONTH' => '下一月',
    'LBL_NEXT_DAY' => '后一天',
    'LBL_NEXT_YEAR' => '下一年',
    'LBL_NEXT_WEEK' => '下一周',
    'LBL_AM' => '上午',
    'LBL_PM' => '下午',
    'LBL_SCHEDULED' => '已安排',
    'LBL_BUSY' => '忙碌',
    'LBL_CONFLICT' => '冲突',
    'LBL_USER_CALENDARS' => '日程安排',
    'LBL_SHARED' => '已共享的日历',
    'LBL_PREVIOUS_SHARED' => '上页',
    'LBL_NEXT_SHARED' => '下页',
    'LBL_SHARED_CAL_TITLE' => '查看已共享的日历',
    'LBL_USERS' => '用户',
    'LBL_REFRESH' => '刷新',
    'LBL_EDIT_USERLIST' => '查看其他用户日历',
    'LBL_SELECT_USERS' => '选择要显示日历的用户',
    'LBL_FILTER_BY_TEAM' => '通过团队过滤用户列表',
    'LBL_ASSIGNED_TO_NAME' => '负责人',
    'LBL_DATE' => '开始日期和时间',
    'LBL_CREATE_MEETING' => '新建会议',
    'LBL_CREATE_CALL' => '新建电话',
    'LBL_HOURS_ABBREV' => 'h',
    'LBL_MINS_ABBREV' => 'm',


    'LBL_YES' => '是',
    'LBL_NO' => '否',
    'LBL_SETTINGS' => '设置',
    'LBL_CREATE_NEW_RECORD' => '新建',
    'LBL_LOADING' => '加载中……',
    'LBL_SAVING' => '保存中……',
    'LBL_SENDING_INVITES' => '发送邀请中……',
    'LBL_CONFIRM_REMOVE' => '你确定要删除纪录吗？',
    'LBL_CONFIRM_REMOVE_ALL_RECURRING' => '你确定要删除所有纪录吗？',
    'LBL_EDIT_RECORD' => '编辑',
    'LBL_ERROR_SAVING' => '保存时出错',
    'LBL_ERROR_LOADING' => '加载时出错',
    'LBL_GOTO_DATE' => '跳转到日期',
    'NOTICE_DURATION_TIME' => '持续时间必须大于0',
    'LBL_STYLE_BASIC' => '基本',
    'LBL_STYLE_ADVANCED' => '高级',

    'LBL_INFO_TITLE' => '其他详细信息',
    'LBL_INFO_DESC' => '说明',
    'LBL_INFO_START_DT' => '开始时间',
    'LBL_INFO_DUE_DT' => '到期时间',
    'LBL_INFO_DURATION' => '持续时间',
    'LBL_INFO_NAME' => '主题',
    'LBL_INFO_RELATED_TO' => '关联到',

    'LBL_NO_USER' => '没有匹配的字段：负责人',
    'LBL_SUBJECT' => '主题',
    'LBL_DURATION' => '持续时间',
    'LBL_STATUS' => '状态',
    'LBL_DATE_TIME' => '日期和时间',


    'LBL_SETTINGS_TITLE' => '设置',
    'LBL_SETTINGS_DISPLAY_TIMESLOTS' => '在日、周视图上显示时间段',
    'LBL_SETTINGS_TIME_STARTS' => '开始时间',
    'LBL_SETTINGS_TIME_ENDS' => '结束时间',
    'LBL_SETTINGS_CALLS_SHOW' => '显示电话',
    'LBL_SETTINGS_TASKS_SHOW' => '显示任务',
    'LBL_SETTINGS_COMPLETED_SHOW' => '显示已完成的',

    'LBL_SAVE_BUTTON' => '保存',
    'LBL_DELETE_BUTTON' => '删除',
    'LBL_APPLY_BUTTON' => '应用',
    'LBL_SEND_INVITES' => '保存并发送邀请',
    'LBL_CANCEL_BUTTON' => '取消',
    'LBL_CLOSE_BUTTON' => '关闭',

    'LBL_GENERAL_TAB' => '详细',
    'LBL_PARTICIPANTS_TAB' => '受邀者',
    'LBL_REPEAT_TAB' => '周期重复',

    'LBL_REPEAT_TYPE' => '重复',
    'LBL_REPEAT_INTERVAL' => '每',
    'LBL_REPEAT_END' => '结束',
    'LBL_REPEAT_END_AFTER' => '在之后',
    'LBL_REPEAT_OCCURRENCES' => '重复次数',
    'LBL_REPEAT_END_BY' => '到',
    'LBL_REPEAT_DOW' => '在',
    'LBL_REPEAT_UNTIL' => '重复直到',
    'LBL_REPEAT_COUNT' => '重复次数',
    'LBL_REPEAT_LIMIT_ERROR' => '你的设置将创建 $limit 个会议。',

    'LBL_EDIT_ALL_RECURRENCES' => '编辑所有周期重复纪录',
    'LBL_REMOVE_ALL_RECURRENCES' => '删除所有周期重复纪录',

    'LBL_DATE_END_ERROR' => '结束日期在开始日期之前',
    'ERR_YEAR_BETWEEN' => '对不起，日程安排无法处理您要求的年份<br>年份必须在1970-2037之间',
    'ERR_NEIGHBOR_DATE' => 'get_neighbor_date_str: 没有定义这个视图',
    'LBL_NO_ITEMS_MOBILE' => '本周没有任何日程安排。',
    'LBL_SECURITYGROUPS' => 'Filter user list by Security Group',

    'LBL_ADD_ITEM' => 'Add Item',
    'LBL_ADD_MEETING' => 'Add Meeting',
    'LBL_ADD_TASK' => 'Add Task',
    'LBL_ADD_CALL' => 'Add Call',

);

$mod_list_strings = array(
    'dom_cal_weekdays' =>
        array(
            "星期日",
            "星期一",
            "星期二",
            "星期三",
            "星期四",
            "星期五",
            "星期六",
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
            "一月",
            "二月",
            "三月",
            "四月",
            "(GMT+5)叶卡特琳堡",
            "六月",
            "七月",
            "八月",
            "九月",
            "十月",
            "十一月",
            "十二月",
        ),
    'dom_cal_month_long' =>
        array(
            "",
            "一月",
            "二月",
            "高 Boost",
            "(GMT+4)喀布尔",
            "(GMT+5)叶卡特琳堡",
            "(GMT+6)阿斯塔纳",
            "(GMT+7)曼谷",
            "(GMT+8)珀斯",
            "(GMT+9)汉城",
            "(GMT+10)布里斯班",
            "(GMT+11)索罗门群岛",
            "(GMT+12)奥克兰",
        ),
);
?>
