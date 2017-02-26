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
    'LBL_MODULE_NAME' => '項目管理',
    'LBL_MODULE_TITLE' => '項目管理: 主頁',
    'LBL_SEARCH_FORM_TITLE' => '項目查詢',
    'LBL_LIST_FORM_TITLE' => '項目列表',
    'LBL_HISTORY_TITLE' => '歷史',

    'LBL_ID' => '編號:',
    'LBL_DATE_ENTERED' => '輸入日期:',
    'LBL_DATE_MODIFIED' => '修改日期:',
    'LBL_ASSIGNED_USER_ID' => '負責人:',
    'LBL_ASSIGNED_USER_NAME' => '負責人:',
    'LBL_MODIFIED_USER_ID' => '修改人編號:',
    'LBL_CREATED_BY' => '創建人:',
    'LBL_TEAM_ID' => '團隊:',
    'LBL_NAME' => '名稱:',
    'LBL_PDF_PROJECT_NAME' => '項目名稱:',
    'LBL_DESCRIPTION' => '描述:',
    'LBL_DELETED' => '已刪除:',
    'LBL_DATE' => '日期:',
    'LBL_DATE_START' => '開始日期:',
    'LBL_DATE_END' => '結束日期:',
    'LBL_PRIORITY' => '優先順序:',
    'LBL_STATUS' => '狀態:',
    'LBL_MY_PROJECTS' => '我的項目管理',
    'LBL_MY_PROJECT_TASKS' => '我的項目管理任務',

    'LBL_TOTAL_ESTIMATED_EFFORT' => '估算總時間 (小時):',
    'LBL_TOTAL_ACTUAL_EFFORT' => '實際總時間 (小時):',

    'LBL_LIST_NAME' => '名稱',
    'LBL_LIST_DAYS' => '天數',
    'LBL_LIST_ASSIGNED_USER_ID' => '分配人',
    'LBL_LIST_TOTAL_ESTIMATED_EFFORT' => '估算總時間 (小時)',
    'LBL_LIST_TOTAL_ACTUAL_EFFORT' => '估算總時間 (小時)',
    'LBL_LIST_UPCOMING_TASKS' => '即將到來的任務 (1周)',
    'LBL_LIST_OVERDUE_TASKS' => '過期任務',
    'LBL_LIST_OPEN_CASES' => '未解決的客戶反饋',
    'LBL_LIST_END_DATE' => '結束日期',
    'LBL_LIST_TEAM_ID' => '團隊',


    'LBL_PROJECT_SUBPANEL_TITLE' => '項目管理',
    'LBL_PROJECT_TASK_SUBPANEL_TITLE' => '項目管理任務',
    'LBL_CONTACT_SUBPANEL_TITLE' => '聯繫人',
    'LBL_ACCOUNT_SUBPANEL_TITLE' => '客戶檔案',
    'LBL_OPPORTUNITY_SUBPANEL_TITLE' => '商業機會',
    'LBL_QUOTE_SUBPANEL_TITLE' => '報價',

    // quick create label
    'LBL_NEW_FORM_TITLE' => '新建項目',

    'CONTACT_REMOVE_PROJECT_CONFIRM' => '您確定將要刪除這個聯繫人在您的工程中嗎？',

    'LNK_NEW_PROJECT' => '創建項目',
    'LNK_PROJECT_LIST' => '項目列表',
    'LNK_NEW_PROJECT_TASK' => '創建項目任務',
    'LNK_PROJECT_TASK_LIST' => '項目任務',

    'LBL_DEFAULT_SUBPANEL_TITLE' => '項目',
    'LBL_ACTIVITIES_TITLE' => '活動',
    'LBL_ACTIVITIES_SUBPANEL_TITLE' => '活動',
    'LBL_HISTORY_SUBPANEL_TITLE' => '歷史',
    'LBL_QUICK_NEW_PROJECT' => '新建項目',

    'LBL_PROJECT_TASKS_SUBPANEL_TITLE' => '項目任務',
    'LBL_CONTACTS_SUBPANEL_TITLE' => '聯繫人檔案',
    'LBL_ACCOUNTS_SUBPANEL_TITLE' => '客戶檔案',
    'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => '商業機會',
    'LBL_CASES_SUBPANEL_TITLE' => '客戶反饋信息',
    'LBL_BUGS_SUBPANEL_TITLE' => '缺陷',
    'LBL_PRODUCTS_SUBPANEL_TITLE' => '產品',


    'LBL_TASK_ID' => '編號',
    'LBL_TASK_NAME' => '任務名稱',
    'LBL_DURATION' => '期間',
    'LBL_ACTUAL_DURATION' => '實際期間',
    'LBL_START' => '開始',
    'LBL_FINISH' => '結束',
    'LBL_PREDECESSORS' => '前任',
    'LBL_PERCENT_COMPLETE' => '% 完成',
    'LBL_MORE' => '多...',

    'LBL_PERCENT_BUSY' => '% 忙',
    'LBL_TASK_ID_WIDGET' => '編號',
    'LBL_TASK_NAME_WIDGET' => '描述',
    'LBL_DURATION_WIDGET' => '期間',
    'LBL_START_WIDGET' => '開始日期',
    'LBL_FINISH_WIDGET' => '結束日期',
    'LBL_PREDECESSORS_WIDGET' => '前任_',
    'LBL_PERCENT_COMPLETE_WIDGET' => '比例_完成',
    'LBL_EDIT_PROJECT_TASKS_TITLE' => '編輯項目任務',

    'LBL_OPPORTUNITIES' => '商業機會',
    'LBL_LAST_WEEK' => '上周',
    'LBL_NEXT_WEEK' => '下周',
    'LBL_PROJECTRESOURCES_SUBPANEL_TITLE' => '資源',
    'LBL_PROJECTTASK_SUBPANEL_TITLE' => '項目任務',
    'LBL_HOLIDAYS_SUBPANEL_TITLE' => '項目假期',
    'LBL_PROJECT_INFORMATION' => '項目概覽',
    'LBL_EDITLAYOUT' => '編輯佈局' /*for 508 compliance fix*/,
    'LBL_INSERTROWS' => '插入紀錄' /*for 508 compliance fix*/,

    'LBL_PROJECT_TASKS_SUBPANEL_TITLE' => '項目任務',
    'LBL_VIEW_GANTT_TITLE' => '甘特圖',
    'LBL_VIEW_GANTT_DURATION' => '持續時間',
    'LBL_ASSIGNED_USER_NAME' => '負責人:',
    'LBL_ASSIGNED_USER_ID' => '負責人:',
    'LBL_TASK_TITLE' => '編輯任務',
    'LBL_PREDECESSOR_TITLE' => '編輯前任',
    'LBL_START_DATE_TITLE' => '選擇開始日期',
    'LBL_END_DATE_TITLE' => '選擇結束日期',
    'LBL_DURATION_TITLE' => '編輯期間',
    'LBL_PERCENTAGE_COMPLETE_TITLE' => '編輯%完成',
    'LBL_ACTUAL_DURATION_TITLE' => '編輯實際期間',
    'LBL_DESCRIPTION' => '描述:',
    'LBL_LAG' => '延遲',
    'LBL_DAYS' => '天',
    'LBL_HOURS' => '小時',
    'LBL_MONTHS' => '月',
    'LBL_SUBTASK' => '任務',
    'LBL_MILESTONE_FLAG' => '里程碑',
    'LBL_ADD_NEW_TASK' => '新增任務',
    'LBL_DELETE_TASK' => '刪除任務',
    'LBL_EDIT_TASK_PROPERTIES' => '編輯任務內容。',
    'LBL_PARENT_TASK_ID' => '父任務編號',
    'LBL_PERCENT_COMPLETE' => '% 完成',
    'LBL_RESOURCE_CHART' => '資源圖表',
    'LBL_RESOURCE_CHART_START' => '開始日期:',
    'LBL_RESOURCE_CHART_END' => '結束日期:',
    'LBL_RESOURCES' => '選擇資源:',
    'LBL_RELATIONSHIP_TYPE' => '關聯類型',
    'LBL_TASK_NAME' => '任務名稱',
    'LBL_PREDECESSORS' => '前任',
    'LBL_ASSIGNED_TO' => '負責人',
    'LBL_AM_PROJECTTEMPLATES_PROJECT_1_FROM_AM_PROJECTTEMPLATES_TITLE' => '專案模板',
    'LBL_STATUS' => '狀態:',
    'LBL_LIST_ASSIGNED_USER_ID' => '分配人',
    'LBL_AM_PROJECTHOLIDAYS_PROJECT_FROM_AM_PROJECTHOLIDAYS_TITLE' => '專案假期',
    'LBL_TOOLTIP_PROJECT_NAME' => '項目管理',
    'LBL_TOOLTIP_TASK_NAME' => '任務名稱',
    'LBL_TOOLTIP_TITLE' => '本日任務',
    'LBL_TOOLTIP_TASK_DURATION' => '持續時間',
    'LBL_PROJECT_TITLE_HOVER' => '專案細節詳情',
    'LBL_RESOURCE_TYPE_TITLE_USER' => '資源是用戶',
    'LBL_RESOURCE_TYPE_TITLE_CONTACT' => '資源是聯絡人',
    'LBL_RESOURCE_CHART_PREVIOUS_MONTH' => '上月',
    'LBL_RESOURCE_CHART_NEXT_MONTH' => '下個月',
    'LBL_RESOURCE_CHART_WEEK' => '周',
    'LBL_RESOURCE_CHART_DAY' => '日',
    'LBL_RESOURCE_CHART_WARNING' => '此專案未被分配任何資源。',
    'LBL_PROJECT_DELETE_MSG' => '您確定要刪除此專案及相關任務嗎?',
    'LBL_LIST_MY_PROJECT' => '我的項目管理',
    'LBL_LIST_ASSIGNED_USER' => '負責人',
    'LBL_UNASSIGNED' => '未分配',
    'LBL_PROJECT_USERS_1_FROM_USERS_TITLE' => '資源',
);
?>
