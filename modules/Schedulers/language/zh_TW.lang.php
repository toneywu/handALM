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
global $sugar_config;

$mod_strings = array(
// OOTB Scheduler Job Names:
    'LBL_OOTB_WORKFLOW' => '使工作流程任務進行',
    'LBL_OOTB_REPORTS' => '為計劃任務產生報表',
    'LBL_OOTB_IE' => '檢查收件箱',
    'LBL_OOTB_BOUNCE' => '每晚處理退回的電子郵件',
    'LBL_OOTB_CAMPAIGN' => '每晚批量運行電子郵件市場活動',
    'LBL_OOTB_PRUNE' => '每月1號精簡資料庫',
    'LBL_OOTB_TRACKER' => '砍掉第一個月的用戶歷史表',
    'LBL_OOTB_SUGARFEEDS' => 'Prune SuiteCRM Feed Tables',
    'LBL_OOTB_LUCENE_INDEX' => 'Perform Lucene Index',
    'LBL_OOTB_OPTIMISE_INDEX' => 'Optimise AOD Index',
    'LBL_UPDATE_TRACKER_SESSIONS' => '更新tracker_sessions表',
    'LBL_OOTB_SEND_EMAIL_REMINDERS' => '運行Email提醒通知',
    'LBL_OOTB_CLEANUP_QUEUE' => '清除計劃任務隊列',
    'LBL_OOTB_REMOVE_DOCUMENTS_FROM_FS' => 'Removal of documents from filesystem',

// List Labels
    'LBL_LIST_JOB_INTERVAL' => '間隔:',
    'LBL_LIST_LIST_ORDER' => '計劃任務:',
    'LBL_LIST_NAME' => '計劃任務:',
    'LBL_LIST_RANGE' => '範圍:',
    'LBL_LIST_REMOVE' => '移除:',
    'LBL_LIST_STATUS' => '狀態:',
    'LBL_LIST_TITLE' => '計劃任務列表:',
    'LBL_LIST_EXECUTE_TIME' => '執行時間:',
// human readable:
    'LBL_SUN' => '星期日',
    'LBL_MON' => '星期一',
    'LBL_TUE' => '星期二',
    'LBL_WED' => '星期三',
    'LBL_THU' => '星期四',
    'LBL_FRI' => '星期五',
    'LBL_SAT' => '星期六',
    'LBL_ALL' => '每天',
    'LBL_EVERY_DAY' => '每天',
    'LBL_AT_THE' => '在',
    'LBL_EVERY' => '每',
    'LBL_FROM' => '從',
    'LBL_ON_THE' => '於',
    'LBL_RANGE' => '到',
    'LBL_AT' => '在',
    'LBL_IN' => '在',
    'LBL_AND' => '和',
    'LBL_MINUTES' => '分鐘',
    'LBL_HOUR' => '小時',
    'LBL_HOUR_SING' => '小時',
    'LBL_MONTH' => '月',
    'LBL_OFTEN' => '頻繁。',
    'LBL_MIN_MARK' => '分鐘標示',


// crontabs
    'LBL_MINS' => '分鐘',
    'LBL_HOURS' => '小時',
    'LBL_DAY_OF_MONTH' => '日期',
    'LBL_MONTHS' => '月',
    'LBL_DAY_OF_WEEK' => '天',
    'LBL_CRONTAB_EXAMPLES' => '使用上述標準crontab符號。',
    'LBL_CRONTAB_SERVER_TIME_PRE' => 'Cron根據伺服器上的時區設置運行',
    'LBL_CRONTAB_SERVER_TIME_POST' => '. 請根據該時區設置設定相應的計劃任務的運行時間.',
// Labels
    'LBL_ALWAYS' => '始終',
    'LBL_CATCH_UP' => '錯過時執行',
    'LBL_CATCH_UP_WARNING' => '如果這個任務執行需要一些時間就取消選擇。',
    'LBL_DATE_TIME_END' => '結束日期和時間',
    'LBL_DATE_TIME_START' => '開始日期和時間',
    'LBL_INTERVAL' => '間隔',
    'LBL_JOB' => '任務',
    'LBL_JOB_URL' => '計劃任務URL',
    'LBL_LAST_RUN' => '最後執行時間',
    'LBL_MODULE_NAME' => 'SuiteCRM Scheduler',
    'LBL_MODULE_TITLE' => '計劃任務',
    'LBL_NAME' => '任務名稱',
    'LBL_NEVER' => '從不',
    'LBL_NEW_FORM_TITLE' => '新增計劃任務',
    'LBL_PERENNIAL' => '永久',
    'LBL_SEARCH_FORM_TITLE' => '查找計劃任務',
    'LBL_SCHEDULER' => '計劃任務:',
    'LBL_STATUS' => '狀態',
    'LBL_TIME_FROM' => '啟用從',
    'LBL_TIME_TO' => '啟用到',
    'LBL_WARN_CURL_TITLE' => 'CURL警告:',
    'LBL_WARN_CURL' => '警告:',
    'LBL_WARN_NO_CURL' => 'This system does not have the cURL libraries enabled/compiled into the PHP module (--with-curl=/path/to/curl_library).  Please contact your administrator to resolve this issue.  Without the cURL functionality, the Scheduler cannot thread its jobs.',
    'LBL_BASIC_OPTIONS' => '基本設置',
    'LBL_ADV_OPTIONS' => '高級選項',
    'LBL_TOGGLE_ADV' => '高級選項',
    'LBL_TOGGLE_BASIC' => '基本選項',
// Links
    'LNK_LIST_SCHEDULER' => '計劃任務',
    'LNK_NEW_SCHEDULER' => '新增計劃任務',
    'LNK_LIST_SCHEDULED' => '以安排的任務',
// Messages
    'SOCK_GREETING' => "\"\nThis is the interface for SuiteCRM Schedulers Service. \n[ Available daemon commands: start|restart|shutdown|status ]\nTo quit, type \"quit\".  To shutdown the service \"shutdown\".\n\"",
    'ERR_DELETE_RECORD' => '必須指定記錄編號才能刪除計劃任務。',
    'ERR_CRON_SYNTAX' => '非法Cron語法',
    'NTC_DELETE_CONFIRMATION' => '您確定要刪除這條記錄?',
    'NTC_STATUS' => '設置狀態為“停用”，計劃任務會從下拉列表中移除。',
    'NTC_LIST_ORDER' => '設置計劃任務的下拉框選項',
    'LBL_CRON_INSTRUCTIONS_WINDOWS' => '設置windows的任務計劃',
    'LBL_CRON_INSTRUCTIONS_LINUX' => '設置Crontab',
    'LBL_CRON_LINUX_DESC' => 'Note: In order to run SuiteCRM Schedulers, add the following line to the crontab file: ',
    'LBL_CRON_WINDOWS_DESC' => 'Note: In order to run the SuiteCRM schedulers, create a batch file to run using Windows Scheduled Tasks. The batch file should include the following commands: ',
    'LBL_NO_PHP_CLI' => 'If your host does not have the PHP binary available, you can use wget or curl to launch your Jobs.<br>for wget: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose ' . $sugar_config['site_url'] . '/cron.php > /dev/null 2>&1</b><br>for curl: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent ' . $sugar_config['site_url'] . '/cron.php > /dev/null 2>&1',
// Subpanels
    'LBL_JOBS_SUBPANEL_TITLE' => '任務日誌',
    'LBL_EXECUTE_TIME' => '執行時間',

//jobstrings
    'LBL_REFRESHJOBS' => '刷新任務',
    'LBL_POLLMONITOREDINBOXES' => '收取郵件',
    'LBL_PERFORMFULLFTSINDEX' => '全文檢索系統',

    'LBL_RUNMASSEMAILCAMPAIGN' => '批量發送市場活動郵件',
    'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => '收取退訂郵件',
    'LBL_PRUNEDATABASE' => '清理資料庫',
    'LBL_TRIMTRACKER' => '清除訪問記錄',
    'LBL_TRIMSUGARFEEDS' => 'Prune SuiteCRM Feed Tables',
    'LBL_SENDEMAILREMINDERS' => '開始Email提醒發送',
    'LBL_CLEANJOBQUEUE' => '清除計劃任務隊列',
    'LBL_REMOVEDOCUMENTSFROMFS' => 'Removal of documents from filesystem',

    'LBL_AODOPTIMISEINDEX' => '優化Advanced OpenDiscovery索引',
    'LBL_AODINDEXUNINDEXED' => '編列未索引文件',
    'LBL_POLLMONITOREDINBOXESAOP' => 'AOP監控投票箱',
    'LBL_AORRUNSCHEDULEDREPORTS' => '運行排定的報表',
    'LBL_PROCESSAOW_WORKFLOW' => '進行AOW工作流程',
);
?>
