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
    'LBL_OOTB_WORKFLOW' => '执行工作流任务计划',
    'LBL_OOTB_REPORTS' => '运行生成任务计划报表',
    'LBL_OOTB_IE' => '检查收件箱',
    'LBL_OOTB_BOUNCE' => '每晚运行处理退回的市场活动邮件',
    'LBL_OOTB_CAMPAIGN' => '每晚运行市场活动批量邮件',
    'LBL_OOTB_PRUNE' => '每月1号精简数据库',
    'LBL_OOTB_TRACKER' => '精简Tracker表',
    'LBL_OOTB_SUGARFEEDS' => '修剪 SuiteCRM Feed 数据库表',
    'LBL_OOTB_LUCENE_INDEX' => 'Perform Lucene Index',
    'LBL_OOTB_OPTIMISE_INDEX' => 'Optimise AOD Index',
    'LBL_UPDATE_TRACKER_SESSIONS' => '更新 tracker_sessions表',
    'LBL_OOTB_SEND_EMAIL_REMINDERS' => '运行邮件提醒通知',
    'LBL_OOTB_CLEANUP_QUEUE' => '清理任务队列',
    'LBL_OOTB_REMOVE_DOCUMENTS_FROM_FS' => '从文件系统中删除文件',

// List Labels
    'LBL_LIST_JOB_INTERVAL' => '间隔',
    'LBL_LIST_LIST_ORDER' => '任务计划',
    'LBL_LIST_NAME' => '任务计划名称',
    'LBL_LIST_RANGE' => '范围',
    'LBL_LIST_REMOVE' => '移除',
    'LBL_LIST_STATUS' => '状态',
    'LBL_LIST_TITLE' => '任务计划',
    'LBL_LIST_EXECUTE_TIME' => '执行时间',
// human readable:
    'LBL_SUN' => '星期日',
    'LBL_MON' => '星期一',
    'LBL_TUE' => '星期二',
    'LBL_WED' => '星期三',
    'LBL_THU' => '星期四',
    'LBL_FRI' => '星期五',
    'LBL_SAT' => '星期六',
    'LBL_ALL' => '全选',
    'LBL_EVERY_DAY' => '每天',
    'LBL_AT_THE' => '在',
    'LBL_EVERY' => '每',
    'LBL_FROM' => '从',
    'LBL_ON_THE' => '于',
    'LBL_RANGE' => '到',
    'LBL_AT' => '在',
    'LBL_IN' => '在',
    'LBL_AND' => '和',
    'LBL_MINUTES' => '分钟',
    'LBL_HOUR' => '小时',
    'LBL_HOUR_SING' => '小时',
    'LBL_MONTH' => '月份',
    'LBL_OFTEN' => '每分钟',
    'LBL_MIN_MARK' => '分钟标示',


// crontabs
    'LBL_MINS' => '分',
    'LBL_HOURS' => '时',
    'LBL_DAY_OF_MONTH' => '日',
    'LBL_MONTHS' => '月',
    'LBL_DAY_OF_WEEK' => '星期',
    'LBL_CRONTAB_EXAMPLES' => '上述使用标准的crontab符号',
    'LBL_CRONTAB_SERVER_TIME_PRE' => '任务计划是基于服务器所在的时区(',
    'LBL_CRONTAB_SERVER_TIME_POST' => ')运行。 请相应地指定任务计划的执行时间。',
// Labels
    'LBL_ALWAYS' => '始终',
    'LBL_CATCH_UP' => '错过时执行',
    'LBL_CATCH_UP_WARNING' => '如果这个任务执行时需要一段时间才能完成就取消选择。',
    'LBL_DATE_TIME_END' => '结束日期和时间',
    'LBL_DATE_TIME_START' => '开始日期和时间',
    'LBL_INTERVAL' => '间隔',
    'LBL_JOB' => '任务',
    'LBL_JOB_URL' => '任务 URL',
    'LBL_LAST_RUN' => '最后执行时间',
    'LBL_MODULE_NAME' => 'SuiteCRM Scheduler',
    'LBL_MODULE_TITLE' => '任务计划',
    'LBL_NAME' => '名称',
    'LBL_NEVER' => '从不',
    'LBL_NEW_FORM_TITLE' => '新建任务计划',
    'LBL_PERENNIAL' => '永久',
    'LBL_SEARCH_FORM_TITLE' => '查找任务计划',
    'LBL_SCHEDULER' => '任务计划',
    'LBL_STATUS' => '状态',
    'LBL_TIME_FROM' => '从',
    'LBL_TIME_TO' => '到',
    'LBL_WARN_CURL_TITLE' => 'cURL警告',
    'LBL_WARN_CURL' => '警告',
    'LBL_WARN_NO_CURL' => '系统的PHP环境未启用cURL库或编译时未启用cURL库(--with-curl=/path/to/curl_library)。请联系管理员解决这个问题。否则任务计划将不能正常运行。',
    'LBL_BASIC_OPTIONS' => '基本选项',
    'LBL_ADV_OPTIONS' => '高级选项',
    'LBL_TOGGLE_ADV' => '显示高级选项',
    'LBL_TOGGLE_BASIC' => '显示基本选项',
// Links
    'LNK_LIST_SCHEDULER' => '查看任务计划',
    'LNK_NEW_SCHEDULER' => '新建任务计划',
    'LNK_LIST_SCHEDULED' => '任务计划列表',
// Messages
    'SOCK_GREETING' => "\"\nThis is the interface for SuiteCRM Schedulers Service. \n[ Available daemon commands: start|restart|shutdown|status ]\nTo quit, type \"quit\".  To shutdown the service \"shutdown\".\n\"",
    'ERR_DELETE_RECORD' => '必须指定记录编号才能删除任务计划。',
    'ERR_CRON_SYNTAX' => 'Cron语法错误',
    'NTC_DELETE_CONFIRMATION' => '您确定要删除这条记录?',
    'NTC_STATUS' => '设置状态为“停用”，任务计划会从下拉列表中移除。',
    'NTC_LIST_ORDER' => '设置排序该任务计划会出现在任务计划的下拉列表中。',
    'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Windows 任务计划设置 ',
    'LBL_CRON_INSTRUCTIONS_LINUX' => 'Linux Crontab 设置',
    'LBL_CRON_LINUX_DESC' => 'Note: In order to run SuiteCRM Schedulers, add the following line to the crontab file: ',
    'LBL_CRON_WINDOWS_DESC' => 'Note: In order to run the SuiteCRM schedulers, create a batch file to run using Windows Scheduled Tasks. The batch file should include the following commands: ',
    'LBL_NO_PHP_CLI' => 'If your host does not have the PHP binary available, you can use wget or curl to launch your Jobs.<br>for wget: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose ' . $sugar_config['site_url'] . '/cron.php > /dev/null 2>&1</b><br>for curl: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent ' . $sugar_config['site_url'] . '/cron.php > /dev/null 2>&1',
// Subpanels
    'LBL_JOBS_SUBPANEL_TITLE' => '任务日志',
    'LBL_EXECUTE_TIME' => '执行时间',

//jobstrings
    'LBL_REFRESHJOBS' => '刷新任务',
    'LBL_POLLMONITOREDINBOXES' => '检查收件箱',
    'LBL_PERFORMFULLFTSINDEX' => '全文搜索索引系统',

    'LBL_RUNMASSEMAILCAMPAIGN' => '每晚运行市场活动批量邮件',
    'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => '每晚运行处理退回的市场活动邮件',
    'LBL_PRUNEDATABASE' => '每月1号精简数据库',
    'LBL_TRIMTRACKER' => '精简Tracker表',
    'LBL_TRIMSUGARFEEDS' => '修剪 SuiteCRM Feed 数据库表',
    'LBL_SENDEMAILREMINDERS' => '运行邮件提醒通知',
    'LBL_CLEANJOBQUEUE' => '清理任务队列',
    'LBL_REMOVEDOCUMENTSFROMFS' => '从文件系统中删除文件',

    'LBL_AODOPTIMISEINDEX' => 'Optimise Advanced OpenDiscovery Index',
    'LBL_AODINDEXUNINDEXED' => 'Index unindexed documents',
    'LBL_POLLMONITOREDINBOXESAOP' => 'AOP Poll Monitored Inboxes',
    'LBL_AORRUNSCHEDULEDREPORTS' => '运行预定报表',
    'LBL_PROCESSAOW_WORKFLOW' => 'Process AOW Workflow',
);
?>
