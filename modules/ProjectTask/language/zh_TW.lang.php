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
	'LBL_MODULE_NAME' => '項目任務',
	'LBL_MODULE_TITLE' => '項目任務:首頁',
	'LBL_SEARCH_FORM_TITLE' => '查找項目任務',
	'LBL_LIST_FORM_TITLE'=> '項目任務列表',
    'LBL_EDIT_TASK_IN_GRID_TITLE'=> '在方格中編輯任務',    
	
	'LBL_ID' => '編號:',
    'LBL_PROJECT_TASK_ID' => '項目任務編號:',
    'LBL_PROJECT_ID' => '項目編號:',
	'LBL_DATE_ENTERED' => '輸入日期:',
	'LBL_DATE_MODIFIED' => '修改日期:',
	'LBL_ASSIGNED_USER_ID' => '負責人:',
	'LBL_MODIFIED_USER_ID' => '修改人編號:',
	'LBL_CREATED_BY' => '創建人:',
	'LBL_TEAM_ID' => '團隊:',
	'LBL_NAME' => '名稱:',
	'LBL_STATUS' => '狀態:',
	'LBL_DATE_DUE' => '完成日期:',
	'LBL_TIME_DUE' => '完成時間:',
    'LBL_RESOURCE' => '資源:',
    'LBL_PREDECESSORS' => '前任:',
	'LBL_DATE_START' => '開始日期:',
    'LBL_DATE_FINISH' => '完成日期:',    
	'LBL_TIME_START' => '開始時間:',
    'LBL_TIME_FINISH' => '完成時間:',
    'LBL_DURATION' => '期間:',
    'LBL_DURATION_UNIT' => '期間單元:',
    'LBL_ACTUAL_DURATION' => '實際期間:',
	'LBL_PARENT_ID' => '項目:',
    'LBL_PARENT_TASK_ID' => '父任務編號:',    
    'LBL_PERCENT_COMPLETE' => '父任務完成 (%):',
	'LBL_PRIORITY' => '優先順序:',
	'LBL_DESCRIPTION' => '備忘錄:',
	'LBL_ORDER_NUMBER' => '排序:',
	'LBL_TASK_NUMBER' => '任務編號:',
    'LBL_TASK_ID' => '任務編號:',
	'LBL_DEPENDS_ON_ID' => '依賴的任務:',
	'LBL_MILESTONE_FLAG' => '里程碑:',
	'LBL_ESTIMATED_EFFORT' => '估計時間(小時):',
	'LBL_ACTUAL_EFFORT' => '實際時間(小時):',
	'LBL_UTILIZATION' => '使用率(%):',
	'LBL_DELETED' => '已刪除:',

	'LBL_LIST_ORDER_NUMBER' => '排序',
	'LBL_LIST_NAME' => '名稱',
    'LBL_LIST_DAYS' => '天數',
	'LBL_LIST_PARENT_NAME' => '項目',
	'LBL_LIST_PERCENT_COMPLETE' => '進度(%)',
	'LBL_LIST_STATUS' => '狀態',
    'LBL_LIST_DURATION' => '期間',
    'LBL_LIST_ACTUAL_DURATION' => '實際期間',
	'LBL_LIST_ASSIGNED_USER_ID' => '負責人',
	'LBL_LIST_DATE_DUE' => '截止日期',
	'LBL_LIST_DATE_START' => '開始日期',
    'LBL_LIST_DATE_FINISH' => '完成日期',    
	'LBL_LIST_PRIORITY' => '優先順序',
	'LBL_LIST_CLOSE' => '關閉',
	'LBL_PROJECT_NAME' => '項目名稱',

	'LNK_NEW_PROJECT'	=> '新增項目',
	'LNK_PROJECT_LIST'	=> '項目列表',
	'LNK_NEW_PROJECT_TASK'	=> '新增項目任務',
	'LNK_PROJECT_TASK_LIST'	=> '項目任務',
	
	'LBL_LIST_MY_PROJECT_TASKS' => '我的項目任務',
	'LBL_DEFAULT_SUBPANEL_TITLE' => '項目任務',
	'LBL_NEW_FORM_TITLE' => '新增項目任務',

	'LBL_ACTIVITIES_TITLE'=>'活動',
	'LBL_HISTORY_TITLE'=>'歷史記錄',
	'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'活動',
	'LBL_HISTORY_SUBPANEL_TITLE'=>'歷史記錄', 
	'DATE_JS_ERROR' => '請輸入相應的時間的日期',

    'LBL_ASSIGNED_USER_NAME' => '負責人',
    'LBL_PARENT_NAME' => '項目名稱',
    'LBL_LIST_PROJECT_NAME' => '項目管理',
	'LBL_EDITLAYOUT' => '編輯佈局' /*for 508 compliance fix*/,
    'LBL_PANEL_TIMELINE' => 'Timeline',
	
	'LBL_SUBTASK' => 'Sub-Task',
	'LBL_LAG' => '延遲',
	'LBL_DAYS' => '天',
	'LBL_HOURS' => '小時',
	'LBL_RELATIONSHIP_TYPE' => '關係類型',
);

?>