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
'LBL_NAME' => '任务计划名称',
'LBL_EXECUTE_TIME'			=> '执行时间',
'LBL_SCHEDULER_ID' 	=> '任务计划ID',
'LBL_STATUS' 	=> '状态',
'LBL_RESOLUTION' 	=> '结果',
'LBL_MESSAGE' 	=> '消息',
'LBL_DATA' 	=> '任务数据',
'LBL_REQUEUE' 	=> '失败重试',
'LBL_RETRY_COUNT' 	=> '重试次数',
'LBL_FAIL_COUNT' 	=> '失败次数',
'LBL_INTERVAL' 	=> '重试间隔',
'LBL_CLIENT' 	=> '所属客户端',
'LBL_PERCENT'	=> 'Percent complete',
// Errors
'ERR_CALL' 	=> "无法调用函数：%s",
'ERR_CURL' => "未安装CURL - 无法运行URL任务计划",
'ERR_FAILED' => "未知错误，请检查PHP日志和sugarcrm.log",
'ERR_PHP' => "%s [%d]: %s in %s on line %d",
'ERR_NOUSER' => "该任务计划未指定用户ID",
'ERR_NOSUCHUSER' => "未找到用户ID：%s",
'ERR_JOBTYPE' 	=> "未知的任务类型：%s",
'ERR_TIMEOUT' => "因超时失败",
'ERR_JOB_FAILED_VERBOSE' => '任务计划 %1$s (%2$s) 在后台（CRON）运行时失败',
);
