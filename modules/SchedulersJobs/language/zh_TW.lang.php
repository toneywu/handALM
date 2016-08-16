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
'LBL_NAME' => '名稱',
'LBL_EXECUTE_TIME'			=> '執行時間',
'LBL_SCHEDULER_ID' 	=> '調度者',
'LBL_STATUS' 	=> '狀態',
'LBL_RESOLUTION' 	=> '結果',
'LBL_MESSAGE' 	=> '消息',
'LBL_DATA' 	=> '數據',
'LBL_REQUEUE' 	=> '失敗重試',
'LBL_RETRY_COUNT' 	=> '最大重試次數',
'LBL_FAIL_COUNT' 	=> '失敗次數',
'LBL_INTERVAL' 	=> '重試最小時間間隔',
'LBL_CLIENT' 	=> '所屬客戶端',
'LBL_PERCENT'	=> 'Percent complete',
// Errors
'ERR_CALL' 	=> "調用該函數失敗: %s",
'ERR_CURL' => "未安裝CURL - 無法允許URL計劃任務",
'ERR_FAILED' => "未知錯誤，請檢查PHP日誌和sugarcrm.log",
'ERR_PHP' => "%s [%d]: %s in %s on line %d",
'ERR_NOUSER' => "該計劃任務未指定用戶ID",
'ERR_NOSUCHUSER' => "找不到用戶ID： %s ",
'ERR_JOBTYPE' 	=> "未知的任務類型: %s",
'ERR_TIMEOUT' => "超時",
'ERR_JOB_FAILED_VERBOSE' => '計劃任務 %1$s (%2$s) 在後臺（CRON）運行時失敗。',
);
