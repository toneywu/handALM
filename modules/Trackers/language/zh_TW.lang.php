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
		  //Labels for methods in the TrackerReporter.php file that are shown in TrackerDashlet
		  'ShowActiveUsers'      => '在線用戶',
		  'ShowLastModifiedRecords' => '前10條修改記錄',
		  'ShowTopUser' => '最多用戶',
		  'ShowMyModuleUsage' => '我的模塊使用情況',
		  'ShowMyWeeklyActivities' => '我每周的活動',
		  'ShowTop3ModulesUsed' => '使用最多的3個模塊',
		  'ShowLoggedInUserCount' => '在線用戶數',
		  'ShowMyCumulativeLoggedInTime' => '我的在線總時間 (本周)',
		  'ShowUsersCumulativeLoggedInTime' => '所有用戶在線總時間 (本周)',
		  
		  //Column header mapping
		  'action' => '行為',
		  'active_users' => '在線用戶數',
		  'date_modified' => '修改日期',
		  'different_modules_accessed' => '訪問模塊數',
		  'first_name' => '名',
		  'item_id' => '編號',
		  'item_summary' => '姓名',
		  'last_action' => '上次行為發生時間',
		  'last_name' => '姓',
		  'module_name' => '模塊名',
		  'records_modified' => '修改記錄總數',
		  'top_module' => '訪問最多的模塊',
		  'total_count' => '頁面瀏覽總數',
		  'total_login_time' => '時間 (時:分:秒)',
		  'user_name' => '用戶名',
		  'users' => '用戶',
		  
		  //Administration related labels
		  'LBL_ENABLE' => '開啟',
		  'LBL_MODULE_NAME_TITLE' => '訪問記錄',
		  'LBL_MODULE_NAME' => '訪問記錄',
		  'LBL_TRACKER_SETTINGS' => '訪問記錄設置',
		  'LBL_TRACKER_QUERIES_DESC' => '開啟dump_slow_queries後，當查詢時間大於slow_query_time_msec的值時，系統記錄SQL語句',
		  'LBL_TRACKER_QUERIES_HELP' => '當"記錄顯示查詢"開啟，並且SQL語句執行時間大於"顯示查詢的開始時間"，此SQL語句將會被記錄',
		  'LBL_TRACKER_PERF_DESC' => '記錄系統效率數據 (資料庫、文件、與內存的使用情況)',
		  'LBL_TRACKER_PERF_HELP' => '記錄資料庫交互，文件存取和內存使用',
		  'LBL_TRACKER_SESSIONS_DESC' => '記錄用登陸信息',
		  'LBL_TRACKER_SESSIONS_HELP' => '記錄活動用戶和用戶的會話信息',
		  'LBL_TRACKER_DESC' => '記錄用戶的行為',
		  'LBL_TRACKER_HELP' => '記錄用戶所瀏覽的頁面(模塊和記錄)以及記錄的存儲',
		  'LBL_TRACKER_PRUNE_INTERVAL' => '當運行計劃任務刪除記錄數據時，數據所保存的天數',
		  'LBL_TRACKER_PRUNE_RANGE' => '天數',
);
?>