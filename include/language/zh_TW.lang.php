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

//the left value is the key stored in the db and the right value is ie display value
//to translate, only modify the right value in each key/value pair
$app_list_strings = array (
//e.g. auf Deutsch 'Contacts'=>'Contakten',
  'language_pack_name' => '中國傳統 Chinese (Traditional) -zh_TW',
  'moduleList' =>
  array (
    'Home' => '首頁',
    'Contacts' => '聯繫人檔案',
    'Accounts' => '客戶',
    'Opportunities' => '商業機會',
    'Cases' => '客戶反饋',
    'Notes' => '備忘錄',
    'Calls' => '電話',
    'Emails' => '電子郵件',
    'Meetings' => '會議',
    'Tasks' => '任務',
    'Calendar' => '日程安排',
    'Leads' => '潛在客戶',
    'Currencies' => '貨幣',
    'Activities' => '活動',
    'Bugs' => '缺陷追蹤',
    'Feeds' => 'RSS',
    'iFrames'=>'我的網站',
    'TimePeriods'=>'時段',
    'TaxRates'=>'稅率',
    'ContractTypes' => '合同類型',
    'Schedulers'=>'計劃任務',
    'Project'=>'項目',
    'ProjectTask'=>'項目任務',
    'Campaigns'=>'市場活動',
    'CampaignLog'=>'市場活動日誌',
    'Documents'=>'文檔',
    'DocumentRevisions'=>'文檔版本',
    'Connectors'=>'連接器',
    'Roles'=>'角色',
    'Notifications'=>'提醒',
    'Sync'=>'同步',
    'Users' => '用戶',
    'Employees' => '員工',
    'Administration' => '管理員',
    'ACLRoles' => '訪問控制角色',
    'InboundEmail' => '接收郵件（IB）',
    'Releases' => '版本',
    'Prospects' => '目標',
    'Queues' => '隊列',
    'EmailMarketing' => '電子郵件營銷',
    'EmailTemplates' => '電子郵件模版',
    'SNIP' => "Email歸檔",
    'ProspectLists' => '目標列表',
    'SavedSearch' => '已保存的查詢結果',
    'UpgradeWizard' => '升級嚮導',
    'Trackers' => '追蹤',
    'TrackerPerfs' => '性能追蹤',
    'TrackerSessions' => 'Session追蹤',
    'TrackerQueries' => '查詢追蹤',
    'FAQ' => '常見問題',
    'Newsletters' => '列表',
    'SugarFeed'=>'SuiteCRM Feed',
    'KBDocuments' => '基礎知識',
  'SugarFavorites'=>'SuiteCRM Favorites',

    'OAuthKeys' => 'OAuth 消費者密鑰',
    'OAuthTokens' => 'OAuth 令牌（Tokens）',
  ),

  'moduleListSingular' =>
  array (
    'Home' => '首頁',
    'Dashboard' => '統計圖',
    'Contacts' => '聯繫人檔案',
    'Accounts' => '客戶',
    'Opportunities' => '商業機會',
    'Cases' => '客戶反饋',
    'Notes' => '備忘錄',
    'Calls' => '電話',
    'Emails' => '電子郵件',
    'Meetings' => '會議',
    'Tasks' => '任務',
    'Calendar' => '日程安排',
    'Leads' => '潛在客戶',
    'Activities' => '活動',
    'Bugs' => '缺陷追蹤',
    'KBDocuments' => '知識庫',
    'Feeds' => 'RSS',
    'iFrames'=>'我的網站',
    'TimePeriods'=>'時段',
    'Project'=>'項目管理',
    'ProjectTask'=>'項目任務',
    'Prospects' => '目標',
    'Campaigns'=>'市場活動',
    'Documents'=>'文檔',
    'SugarFollowing'=>'SuiteCRM Following',
    'Sync'=>'同步',
    'Users' => '用戶',
  'SugarFavorites'=>'SuiteCRM Favorites'

        ),

  'checkbox_dom'=> array(
    ''=>'',
    '1'=>'Yes',
    '2'=>'中 Boost',
  ),

  //e.g. en franï¿½ais 'Analyst'=>'Analyste',
  'account_type_dom' =>
  array (
    '' => '',
    'Analyst' => '分析者',
    'Competitor' => '競爭者',
    'Customer' => '客戶',
    'Integrator' => '整合者',
    'Investor' => '投資者',
    'Partner' => '合作者',
    'Press' => '出版商',
    'Prospect' => '銷售前景',
    'Reseller' => '批發商',
    'Other' => '其它',
  ),
  //e.g. en espaï¿½ol 'Apparel'=>'Ropa',
  'industry_dom' =>
  array (
    '' => '',
    'Apparel' => '服裝',
    'Banking' => '銀行',
    'Biotechnology' => '生物技術',
    'Chemicals' => '化學化工',
    'Communications' => '通訊',
    'Construction' => '建築',
    'Consulting' => '咨詢',
    'Education' => '教育',
    'Electronics' => '電子',
    'Energy' => '能源',
    'Engineering' => '工程設計',
    'Entertainment' => '文化',
    'Environmental' => '環境保護',
    'Finance' => '金融',
    'Government' => '政府機構',
    'Healthcare' => '衛生保健',
    'Hospitality' => '醫療機構',
    'Insurance' => '保險',
    'Machinery' => '機械',
    'Manufacturing' => '生產企業',
    'Media' => '醫院',
    'Not For Profit' => '非盈利機構',
    'Recreation' => '娛樂',
    'Retail' => '零售',
    'Shipping' => '海運',
    'Technology' => '技術',
    'Telecommunications' => '電信',
    'Transportation' => '運輸',
    'Utilities' => '公用事業',
    'Other' => '其它',
  ),
  'lead_source_default_key' => 'Self Generated',
  'lead_source_dom' =>
  array (
    '' => '',
    'Cold Call' => '意外來訪',
    'Existing Customer' => '現有客戶',
    'Self Generated' => '自產',
    'Employee' => '員工',
    'Partner' => '合作者',
    'Public Relations' => '公共關係',
    'Direct Mail' => '直郵',
    'Conference' => '會議',
    'Trade Show' => '展覽',
    'Web Site' => '網站',
    'Word of mouth' => '他人介紹',
    'Email' => '電子郵件',
    'Campaign'=>'市場活動',
    'Other' => '其它',
  ),
  'opportunity_type_dom' =>
  array (
    '' => '',
    'Existing Business' => '已有生意',
    'New Business' => '新生意',
  ),
  'roi_type_dom' =>
    array (
    'Revenue' => '收入',
    'Investment'=>'投資',
    'Expected_Revenue'=>'期望收入',
    'Budget'=>'預算',

  ),
  //Note:  do not translate opportunity_relationship_type_default_key
//       it is the key for the default opportunity_relationship_type_dom value
  'opportunity_relationship_type_default_key' => 'Primary Decision Maker',
  'opportunity_relationship_type_dom' =>
  array (
    '' => '',
    'Primary Decision Maker' => '主要決策人',
    'Business Decision Maker' => '商業決策者',
    'Business Evaluator' => '商業評估者',
    'Technical Decision Maker' => '技術決策者',
    'Technical Evaluator' => '技術評估人',
    'Executive Sponsor' => '主管助理',
    'Influencer' => '影響者',
    'Other' => '其它',
  ),
  //Note:  do not translate case_relationship_type_default_key
//       it is the key for the default case_relationship_type_dom value
  'case_relationship_type_default_key' => 'Primary Contact',
  'case_relationship_type_dom' =>
  array (
    '' => '',
    'Primary Contact' => '主要聯繫人',
    'Alternate Contact' => '其他聯繫人',
  ),
  'payment_terms' =>
  array (
    '' => '',
    'Net 15' => '貨到15天付款',
    'Net 30' => '貨到30天付款',
  ),
  'sales_stage_default_key' => 'Prospecting',
  'fts_type' => array (
      '' => '',
      'Elastic' => 'elasticsearch'
  ),
  'sales_stage_dom' =>
  array (
    'Prospecting' => '銷售前景',
    'Qualification' => '資格合格',
    'Needs Analysis' => '需要分析',
    'Value Proposition' => '價值陳述',
    'Id. Decision Makers' => '辨識決策者',
    'Perception Analysis' => '感覺分析',
    'Proposal/Price Quote' => '建議/出價',
    'Negotiation/Review' => '談判/回顧',
    'Closed Won' => '談成結束',
    'Closed Lost' => '丟單結束',
  ),
  'in_total_group_stages' => array (
    'Draft' => '草稿',
    'Negotiation' => '談判',
    'Delivered' => '已交付',
    'On Hold' => '等待',
    'Confirmed' => '已確認',
    'Closed Accepted' => '談成結束',
    'Closed Lost' => '丟單結束',
    'Closed Dead' => '未成結束',
  ),
  'sales_probability_dom' => // keys must be the same as sales_stage_dom
  array (
    'Prospecting' => '10',
    'Qualification' => '20',
    'Needs Analysis' => '25',
    'Value Proposition' => '30',
    'Id. Decision Makers' => '40',
    'Perception Analysis' => '50',
    'Proposal/Price Quote' => '65',
    'Negotiation/Review' => '80',
    'Closed Won' => '100',
    'Closed Lost' => '0',
  ),
  'activity_dom' =>
  array (
    'Call' => '電話',
    'Meeting' => '會議',
    'Task' => '任務',
    'Email' => '電子郵件',
    'Note' => '備忘錄',
  ),
  'salutation_dom' =>
      array (
        '' => '',
        'Mr.' => '先生',
        'Ms.' => '小姐',
        'Mrs.' => '女士',
        'Dr.' => '博士',
        'Prof.' => '教授',
      ),
  //time is in seconds; the greater the time the longer it takes;
  'reminder_max_time' => 90000,
  'reminder_time_options' => array( 60=> '1 minute prior',
                                  300=> '5 minutes prior',
                                  600=> '10 minutes prior',
                                  900=> '15 minutes prior',
                                  1800=> '30 minutes prior',
                                  3600=> '1 hour prior',
                                  7200 => '2 hours prior',
                                  10800 => '3 hours prior',
                                  18000 => '5 hours prior',
                                  86400 => '1 day prior',
                                 ),

  'task_priority_default' => '中',
  'task_priority_dom' =>
  array (
    'High' => '高',
    'Medium' => '中',
    'Low' => '低',
  ),
  'task_status_default' => '未開始',
  'task_status_dom' =>
  array (
    'Not Started' => '未開始',
    'In Progress' => '處理中',
    'Completed' => '完成',
    'Pending Input' => '等待輸入',
    'Deferred' => '延期',
  ),
  'meeting_status_default' => 'Planned',
  'meeting_status_dom' =>
  array (
    'Planned' => '已計劃',
    'Held' => '完成',
    'Not Held' => '未開始',
  ),
  'extapi_meeting_password' =>
  array (
      'WebEx' => 'WebEx',
  ),
  'meeting_type_dom' =>
   array (
      'Other' => '其它',
      'Sugar' => 'SuiteCRM',
   ),
  'call_status_default' => 'Planned',
  'call_status_dom' =>
  array (
    'Planned' => '已計劃',
    'Held' => '完成',
    'Not Held' => '未開始',
  ),
  'call_direction_default' => 'Outbound',
  'call_direction_dom' =>
  array (
    'Inbound' => '打入',
    'Outbound' => '打出',
  ),
  'lead_status_dom' =>
  array (
    '' => '',
    'New' => '新增',
    'Assigned' => '已分配',
    'In Process' => '處理中',
    'Converted' => '已轉換',
    'Recycled' => '已重覆',
    'Dead' => '終止',
  ),
   'gender_list' =>
  array (
    'male' => '男性',
    'female' => '女性',
  ),
  //Note:  do not translate case_status_default_key
//       it is the key for the default case_status_dom value
  'case_status_default_key' => '新增',
  'case_status_dom' =>
  array (
    'New' => '新增',
    'Assigned' => '已分配',
    'Closed' => '結束',
    'Pending Input' => '等待輸入',
    'Rejected' => '拒絕',
    'Duplicate' => '重覆',
  ),
  'case_priority_default_key' => 'P2',
  'case_priority_dom' =>
  array (
    'P1' => '高',
    'P2' => '中',
    'P3' => '低',
  ),
  'user_type_dom' =>
  array (
    'RegularUser' => '普通用戶',
    'Administrator' => '管理員',
  ),
  'user_status_dom' =>
  array (
    'Active' => '啟用',
    'Inactive' => '停用',
  ),
  'employee_status_dom' =>
  array (
    'Active' => '啟用',
    'Terminated' => '終止',
    'Leave of Absence' => '離職',
  ),
  'messenger_type_dom' =>
  array (
    '' => '',
    'MSN' => 'MSN',
    'Yahoo!' => 'Yahoo!',
    'AOL' => 'AOL',
  ),
    'project_task_priority_options' => array (
        'High' => '高',
        'Medium' => '中',
        'Low' => '低',
    ),
    'project_task_priority_default' => '中',

    'project_task_status_options' => array (
        'Not Started' => '未開始',
        'In Progress' => '處理中',
        'Completed' => '完成',
        'Pending Input' => '等待輸入',
        'Deferred' => '延期',
    ),
    'project_task_utilization_options' => array (
        '0' => '禁用',
        '25' => '25',
        '50' => '50',
        '75' => '75',
        '100' => '100',
    ),

    'project_status_dom' => array (
        'Draft' => '草稿',
        'In Review' => '審查中',
        'Underway' => 'Underway',
        'On_Hold' => '等待',
        'Completed' => '完成',
    ),
    'project_status_default' => '草稿',

    'project_duration_units_dom' => array (
        'Days' => '天',
        'Hours' => '小時',
    ),

    'project_priority_options' => array (
        'High' => '高',
        'Medium' => '中',
        'Low' => '低',
    ),
    'project_priority_default' => '中',
  //Note:  do not translate record_type_default_key
//       it is the key for the default record_type_module value
  'record_type_default_key' => '帳戶名稱',
  'record_type_display' =>
  array (
    '' => '',
    'Accounts' => '客戶',
    'Opportunities' => '商業機會',
    'Cases' => '客戶反饋',
    'Leads' => '潛在客戶',
    'Contacts' => '聯繫人檔案', // cn (11/22/2005) added to support Emails


    'Bugs' => '缺陷追蹤',
    'Project' => '項目管理',

    'Prospects' => '目標',
    'ProjectTask' => '項目任務',


    'Tasks' => '任務',

  ),

  'record_type_display_notes' =>
  array (
    'Accounts' => '客戶',
    'Contacts' => '聯繫人檔案',
    'Opportunities' => '商業機會',
    'Tasks' => '任務',
    'Emails' => '電子郵件',

    'Bugs' => '缺陷追蹤',
    'Project' => '項目管理',
    'ProjectTask' => '項目任務',
    'Prospects' => '目標',
    'Cases' => '客戶反饋',
    'Leads' => '潛在客戶',

    'Meetings' => '會議',
    'Calls' => '電話',
  ),

  'parent_type_display' =>
  array (
    'Accounts' => '客戶',
    'Contacts' => '聯繫人檔案',
    'Tasks' => '任務',
    'Opportunities' => '商業機會',



    'Bugs' => '缺陷追蹤',
    'Cases' => '客戶反饋',
    'Leads' => '潛在客戶',

    'Project' => '項目管理',
    'ProjectTask' => '項目任務',

    'Prospects' => '目標',

  ),

  'issue_priority_default_key' => '中',
  'issue_priority_dom' =>
  array (
    'Urgent' => '緊急',
    'High' => '高',
    'Medium' => '中',
    'Low' => '低',
  ),
  'issue_resolution_default_key' => '',
  'issue_resolution_dom' =>
  array (
    '' => '',
    'Accepted' => '已接受',
    'Duplicate' => '重覆',
    'Closed' => '結束',
    'Out of Date' => '過期',
    'Invalid' => '無效',
  ),

  'issue_status_default_key' => '新增',
  'issue_status_dom' =>
  array (
    'New' => '新增',
    'Assigned' => '已分配',
    'Closed' => '結束',
    'Pending' => '未決定',
    'Rejected' => '拒絕',
  ),

  'bug_priority_default_key' => '中',
  'bug_priority_dom' =>
  array (
    'Urgent' => '緊急',
    'High' => '高',
    'Medium' => '中',
    'Low' => '低',
  ),
   'bug_resolution_default_key' => '',
  'bug_resolution_dom' =>
  array (
    '' => '',
    'Accepted' => '已接受',
    'Duplicate' => '重覆',
    'Fixed' => '固定價格',
    'Out of Date' => '過期',
    'Invalid' => '無效',
    'Later' => '以後',
  ),
  'bug_status_default_key' => '新增',
  'bug_status_dom' =>
  array (
    'New' => '新增',
    'Assigned' => '已分配',
    'Closed' => '結束',
    'Pending' => '未決定',
    'Rejected' => '拒絕',
  ),
   'bug_type_default_key' => '缺陷追蹤',
  'bug_type_dom' =>
  array (
    'Defect' => '缺陷',
    'Feature' => '特性',
  ),
 'case_type_dom' =>
  array (
    'Administration' => '管理員',
    'Product' => '產品',
    'User' => '用戶',
  ),

  'source_default_key' => '',
  'source_dom' =>
  array (
    '' => '',
    'Internal' => '內部',
    'Forum' => '論壇',
    'Web' => '網路',
    'InboundEmail' => '接收郵件（IB）'
  ),

  'product_category_default_key' => '',
  'product_category_dom' =>
  array (
    '' => '',
    'Accounts' => '客戶',
    'Activities' => '活動',
    'Bugs' => '缺陷追蹤',
    'Calendar' => '日程安排',
    'Calls' => '電話',
    'Campaigns' => '市場活動',
    'Cases' => '客戶反饋',
    'Contacts' => '聯繫人檔案',
    'Currencies' => '貨幣',
  'Dashboard' => '統計圖',
  'Documents' => '文檔',
    'Emails' => '電子郵件',
    'Feeds' => 'Feeds',
    'Forecasts' => '銷售預測',
    'Help' => '幫助',
    'Home' => '首頁',
  'Leads' => '潛在客戶',
  'Meetings' => '會議',
    'Notes' => '備忘錄',
    'Opportunities' => '商業機會',
    'Outlook Plugin' => 'Outlook插件',
    'Projects' => '項目',
    'Quotes' => '報價',
    'Releases' => '版本',
    'RSS' => 'RSS',
    'Studio' => '工作室',
    'Upgrade' => '更新',
    'Users' => '用戶',
  ),
  /*Added entries 'Queued' and 'Sending' for 4.0 release..*/
  'campaign_status_dom' =>
  array (
        '' => '',
        'Planning' => '計劃中',
        'Active' => '啟用',
        'Inactive' => '停用',
        'Complete' => '完成',
        'In Queue' => '隊列中',
        'Sending'=> '發送中',
  ),
  'campaign_type_dom' =>
  array (
        '' => '',
        'Telesales' => '電話行銷',
        'Mail' => '郵件',
        'Email' => '電子郵件',
        'Print' => '列印',
        'Web' => '網路',
        'Radio' => '廣播',
        'Television' => '電視',
        'NewsLetter' => '簡訊',
        ),

  'newsletter_frequency_dom' =>
  array (
        '' => '',
        'Weekly' => '周',
        'Monthly' => '月',
        'Quarterly' => '每季度',
        'Annually' => '每年',
        ),

  'notifymail_sendtype' =>
  array (
    'SMTP' => 'SMTP',
  ),
      'dom_cal_month_long'=>array(
                '0'=>"",
                '1'=>"January",
                '2'=>"February",
                '3'=>"高 Boost",
                '4'=>"(GMT+4)喀布爾",
                '5'=>"(GMT+5)葉卡特琳堡",
                '6'=>"(GMT+6)阿斯塔納",
                '7'=>"(GMT+7)曼谷",
                '8'=>"(GMT+8)珀斯",
                '9'=>"(GMT+9)漢城",
                '10'=>"(GMT+10)布裡斯班",
                '11'=>"(GMT+11)索羅門群島",
                '12'=>"(GMT+12)奧克蘭",
                ),
        'dom_cal_month_short'=>array(
                '0'=>"",
                '1'=>"Jan",
                '2'=>"Feb",
                '3'=>"Mar",
                '4'=>"Apr",
                '5'=>"(GMT+5)葉卡特琳堡",
                '6'=>"Jun",
                '7'=>"Jul",
                '8'=>"Aug",
                '9'=>"Sep",
                '10'=>"Oct",
                '11'=>"Nov",
                '12'=>"Dec",
                ),
        'dom_cal_day_long'=>array(
                '0'=>"",
                '1'=>"星期日",
                '2'=>"星期一",
                '3'=>"星期二",
                '4'=>"星期三",
                '5'=>"星期四",
                '6'=>"星期五",
                '7'=>"星期六",
                ),
        'dom_cal_day_short'=>array(
                '0'=>"",
                '1'=>"晴",
                '2'=>"Mon",
                '3'=>"Tue",
                '4'=>"Wed",
                '5'=>"Thu",
                '6'=>"Fri",
                '7'=>"Sat",
        ),
    'dom_meridiem_lowercase'=>array(
                'am'=>"上午",
                'pm'=>"下午"
        ),
    'dom_meridiem_uppercase'=>array(
                 'AM'=>'上午',
                 'PM'=>'下午'
        ),

    'dom_report_types'=>array(
                'tabular'=>'行與列',
                'summary'=>'合計',
                'detailed_summary'=>'細節合計',
                'Matrix' => '報表',
        ),


    'dom_email_types'=> array(
        'out'       => '已發送',
        'archived'  => '已存檔',
        'draft'     => '草稿',
        'inbound'   => '打入',
        'campaign'  => '市場活動'
    ),
    'dom_email_status' => array (
        'archived'  => '已存檔',
        'closed'    => '結束',
        'draft'     => '草稿',
        'read'      => '已閱讀',
        'replied'   => '已回覆',
        'sent'      => '已發送',
        'send_error'=> '發送錯誤',
        'unread'    => '未閱讀',
    ),
    'dom_email_archived_status' => array (
        'archived'  => '已存檔',
    ),

    'dom_email_server_type' => array(   ''          => '無',
                                        'imap'      => 'IMAP',
    ),
    'dom_mailbox_type'      => array(/*''           => '--None Specified--',*/
                                     'pick'     => '新增[任何]',
                                     'createcase'  => '新建客戶反饋',
                                     'bounce'   => '處理退信',
    ),
    'dom_email_distribution'=> array(''             => '無',
                                     'direct'       => '直接指派',
                                     'roundRobin'   => '循環',
                                     'leastBusy'    => '最少忙碌',
    ),
    'dom_email_distribution_for_auto_create'=> array('roundRobin'   => '循環',
                                                     'leastBusy'    => '最少忙碌',
    ),
    'dom_email_errors'      => array(1 => 'Only select one user when Direct Assigning items.',
                                     2 => 'You must assign Only Checked Items when Direct Assigning items.',
    ),
    'dom_email_bool'        => array('bool_true' => '是',
                                     'bool_false' => '否',
    ),
    'dom_int_bool'          => array(1 => '是',
                                     0 => '否',
    ),
    'dom_switch_bool'       => array ('on' => '是',
                                        'off' => '否',
                                        '' => '無', ),

    'dom_email_link_type'   => array(   'sugar'     => 'SuiteCRM Email Client',
                                        'mailto'    => '外部郵件客戶端'),


    'dom_email_editor_option'=> array(  ''          => '無',
                                        'html'      => 'HTML電子郵件',
                                        'plain'     => '純文本電子郵件'),

    'schedulers_times_dom'  => array(   'not run'       => '超時, 沒有被執行',
                                        'ready'         => '就緒',
                                        'in progress'   => '處理中',
                                        'failed'        => '失敗',
                                        'completed'     => '完成',
                                        'no curl'       => '未運行:沒有可利用的cURL',
    ),

    'scheduler_status_dom' =>
        array (
        'Active' => '啟用',
        'Inactive' => '停用',
        ),

    'scheduler_period_dom' =>
        array (
        'min' => '分鐘',
        'hour' => '小時',
        ),
    'forecast_schedule_status_dom' =>
    array (
    'Active' => '啟用',
    'Inactive' => '停用',
  ),
    'forecast_type_dom' =>
    array (
    'Direct' => '直接',
    'Rollup' => '上滾',
  ),
    'document_category_dom' =>
    array (
    '' => '',
    'Marketing' => '市場',
    'Knowledege Base' => '基礎知識',
    'Sales' => '銷售',
  ),

    'document_subcategory_dom' =>
    array (
    '' => '',
    'Marketing Collateral' => '市場營銷',
    'Product Brochures' => '產品手冊',
    'FAQ' => '常見問題',
  ),

    'document_status_dom' =>
    array (
    'Active' => '啟用',
    'Draft' => '草稿',
    'FAQ' => '常見問題',
    'Expired' => '有效期',
    'Under Review' => '審查中',
    'Pending' => '未決定',
  ),
  'document_template_type_dom' =>
  array(
    ''=>'',
    'mailmerge'=>'郵件合併',
    'eula'=>'最終用戶許可協議',
    'nda'=>'保密協議',
    'license'=>'許可證協議',
  ),
    'dom_meeting_accept_options' =>
    array (
    'accept' => '接受',
    'decline' => '拒絕',
    'tentative' => '擱置',
  ),
    'dom_meeting_accept_status' =>
    array (
    'accept' => '已接受',
    'decline' => '已拒絕',
    'tentative' => '擱置',
    'none'      => '無',
  ),
    'duration_intervals' => array('0'=>'00',
                                    '15'=>'15',
                                    '30'=>'30',
                                    '45'=>'45',
  ),
    'repeat_type_dom' => array(
    	'' => '無',
    	'Daily'	=> '日',
	'Weekly' => '周',
	'Monthly' => '月',
	'Yearly' => '年',
    ),

    'repeat_intervals' => array(
        '' => '',
        'Daily' => 'day(s)',
        'Weekly' => 'week(s)',
        'Monthly' => 'month(s)',
        'Yearly' => 'year(s)',
    ),

    'duration_dom' => array(
    	'' => '無',
    	'900' => '15分鐘',
	'1800' => '30分鐘',
	'2700' => '45分鐘',
	'3600' => '1小時',
	'5400' => '1.5小時',
	'7200' => '2小時',
	'10800' => '3小時',
	'21600' => '6小時',
	'86400' => '1天',
	'172800' => '2天',
	'259200' => '3天',
	'604800' => '1周',
    ),

// deferred
/*// QUEUES MODULE DOMs
'queue_type_dom' => array(
    'Users' => 'Users',
    'Mailbox' => 'Mailbox',
),
*/
//prospect list type dom
  'prospect_list_type_dom' =>
  array (
    'default' => '默認',
    'seed' => '種子',
    'exempt_domain' => '阻止列表 – 根據域',
    'exempt_address' => '阻止列表 – 根據電子郵件地址',
    'exempt' => '阻止列表 – 根據編號',
    'test' => '測試',
  ),

  'email_settings_num_dom' =>
  array(
        '10'    => '10',
        '20'    => '20',
        '50'    => '50'
    ),
  'email_marketing_status_dom' =>
  array (
    '' => '',
    'active'=>'啟用',
    'inactive'=>'停用'
  ),

  'campainglog_activity_type_dom' =>
  array (
    ''=>'',
    'targeted' => '嘗試發送/發送消息',
    'send error'=>'退信，其它',
    'invalid email'=>'退信，無效的郵箱',
    'link'=>'點擊鏈接',
    'viewed'=>'已查看的信息',
    'removed'=>'可退出的郵件',
    'lead'=>'現有銷售潛在客戶',
    'contact'=>'新增聯繫人',
    'blocked'=>'禁止的郵件地址或域',
  ),

  'campainglog_target_type_dom' =>
  array (
    'Contacts' => '聯繫人檔案',
    'Users'=>'用戶',
    'Prospects'=>'目標',
    'Leads'=>'潛在客戶',
    'Accounts'=>'客戶',
  ),
  'merge_operators_dom' => array (
    'like'=>'包括',
    'exact'=>'精確地',
    'start'=>'開始於',
  ),

  'custom_fields_importable_dom' => array (
    'true'=>'是',
    'false'=>'否',
    'required'=>'必要',
  ),

    'Elastic_boost_options' => array (
        '0' =>'禁止',
        '1'=>'Low Boost',
        '2'=>'Medium Boost',
        '3'=>'High Boost',
    ),

  'custom_fields_merge_dup_dom'=> array (
        0=>'禁止',
        1=>'啟用',
  ),

  'navigation_paradigms' => array(
        'm'=>'模塊',
        'gm'=>'分組模塊',
  ),


    'projects_priority_options' => array (
        'high'      => '高',
        'medium'    => '中',
        'low'       => '低',
    ),

    'projects_status_options' => array (
        'notstarted'    => '未開始',
        'inprogress'    => '處理中',
        'completed'     => '完成',
    ),
    // strings to pass to Flash charts
    'chart_strings' => array (
        'expandlegend'      => '打開圖例',
        'collapselegend'    => '關閉圖例',
        'clickfordrilldown' => '單擊獲取更多信息',
        'drilldownoptions'  => '獲取何種信息',
        'detailview'        => '更多細節...',
        'piechart'          => '餅狀圖表',
        'groupchart'        => '圖表組',
        'stackedchart'      => '圖表棧',
        'barchart'      => '柱狀圖表',
        'horizontalbarchart'   => '水平柱狀圖表',
        'linechart'         => '線狀圖表',
        'noData'            => '無效數據',
        'print'       => '列印',
        'pieWedgeName'      => '段',
    ),
    'release_status_dom' =>
    array (
        'Active' => '啟用',
        'Inactive' => '停用',
    ),
    'email_settings_for_ssl' =>
    array (
        '0' => '',
        '1' => 'SSL',
        '2' => 'TLS',
    ),
    'import_enclosure_options' =>
    array (
        '\'' => '單引號 (\')',
        '"' => '雙引號 (")',
        '' => '無',
        'other' => '其它:',
    ),
    'import_delimeter_options' =>
    array (
        ',' => ',',
        ';' => ';',
        '\t' => '\t',
        '.' => '.',
        ':' => ':',
        '|' => '|',
        'other' => '其它:',
    ),
    'link_target_dom' =>
    array (
        '_blank' => '新窗口',
        '_self' => '當前窗口',
    ),
    'dashlet_auto_refresh_options' =>
    array (
        '-1'  => '(GMT-1)亞述爾群島',
        '30'  => 'Every 30 seconds',
        '60'  => '每1分鐘',
        '180'   => '每3分鐘',
        '300'   => '每5分鐘',
        '600'   => '每10分鐘',
    ),
  'dashlet_auto_refresh_options_admin' =>
    array (
        '-1'  => '從不',
        '30'  => 'Every 30 seconds',
        '60'  => '每1分鐘',
        '180'   => '每3分鐘',
        '300'   => '每5分鐘',
        '600'   => '每10分鐘',
    ),
  'date_range_search_dom' =>
  array(
    '=' => '等於',
    'not_equal' => '不等於',
    'greater_than' => '以後',
    'less_than' => '以前',
    'last_7_days' => '過去7天',
    'next_7_days' => '未來7天',
    'last_30_days' => '過去30天',
    'next_30_days' => '未來30天',
    'last_month' => '上個月',
    'this_month' => '這個月',
    'next_month' => '下個月',
    'last_year' => '去年',
    'this_year' => '今年',
    'next_year' => '明年',
    'between' => '在該範圍內',
  ),
  'numeric_range_search_dom' =>
  array(
    '=' => '等於',
    'not_equal' => 'Does Not Equal',
    'greater_than' => '大於',
    'greater_than_equals' => '大於等於',
    'less_than' => '小於',
    'less_than_equals' => '小於等於',
    'between' => '在該範圍內',
  ),
  'lead_conv_activity_opt' =>
  array(
        'copy' => '拷貝',
        'move' => '移動',
        'donothing' => '什麼都不做',
  ),
);

$app_strings = array (
  'LBL_TOUR_NEXT' => '下頁',
  'LBL_TOUR_SKIP' => '跳過',
  'LBL_TOUR_BACK' => '上一步',
  'LBL_TOUR_CLOSE' => '關閉',
  'LBL_TOUR_TAKE_TOUR' => 'Take the tour',
  'LBL_MY_AREA_LINKS' => '我的鏈接: ' /*for 508 compliance fix*/,
  'LBL_GETTINGAIR' => '獲得Air' /*for 508 compliance fix*/,
  'LBL_WELCOMEBAR' => '歡迎' /*for 508 compliance fix*/,
  'LBL_ADVANCEDSEARCH' => '高級搜索' /*for 508 compliance fix*/,
  'LBL_MOREDETAIL' => '詳細信息' /*for 508 compliance fix*/,
  'LBL_EDIT_INLINE' => '內聯編輯' /*for 508 compliance fix*/,
  'LBL_VIEW_INLINE' => '查看' /*for 508 compliance fix*/,
  'LBL_BASIC_SEARCH' => '搜索' /*for 508 compliance fix*/,
  'LBL_PROJECT_MINUS' => '移除' /*for 508 compliance fix*/,
  'LBL_PROJECT_PLUS' => '添加' /*for 508 compliance fix*/,
  'LBL_Blank' => ' ' /*for 508 compliance fix*/,
  'LBL_ICON_COLUMN_1' => '1 列' /*for 508 compliance fix*/,
  'LBL_ICON_COLUMN_2' => '2 列' /*for 508 compliance fix*/,
  'LBL_ICON_COLUMN_3' => '3 列' /*for 508 compliance fix*/,
  'LBL_ADVANCED_SEARCH' => '高級搜索' /*for 508 compliance fix*/,
  'LBL_ID_FF_ADD' => '添加' /*for 508 compliance fix*/,
  'LBL_HIDE_SHOW' => '隱藏/顯示' /*for 508 compliance fix*/,
  'LBL_DELETE_INLINE' => '刪除' /*for 508 compliance fix*/,
  'LBL_PLUS_INLINE' => '添加' /*for 508 compliance fix*/,
  'LBL_ID_FF_CLEAR' => '清除' /*for 508 compliance fix*/,
  'LBL_ID_FF_VCARD' => 'vCard' /*for 508 compliance fix*/,
  'LBL_ID_FF_REMOVE' => '移除' /*for 508 compliance fix*/,
  'LBL_ADD' => '添加' /*for 508 compliance fix*/,
  'LBL_COMPANY_LOGO' => '公司徽標' /*for 508 compliance fix*/,
  'LBL_JS_CALENDAR' => '日曆' /*for 508 compliance fix*/,
    'LBL_ADVANCED' => '高級',
    'LBL_BASIC' => '基礎',
    'LBL_MODULE_FILTER' => '過濾條件',
    'LBL_CONNECTORS_POPUPS'=>'連接器彈出窗口',
    'LBL_CLOSEINLINE'=>'關閉',
    'LBL_EDITINLINE'=>'編輯',
    'LBL_VIEWINLINE'=>'查看',
    'LBL_INFOINLINE'=>'信息',
    'LBL_POWERED_BY_SUGARCRM' => 'Powered by SugarCRM',
    'LBL_PRINT' => '列印',
    'LBL_HELP' => '幫助',
    'LBL_ID_FF_SELECT' => '選擇',
    'DEFAULT'                              => '基本',
    'LBL_SORT'                              => '排序',
    'LBL_OUTBOUND_EMAIL_ADD_SERVER'         => '添加伺服器...',
    'LBL_EMAIL_SMTP_SSL_OR_TLS'         => '以SSL或TLS啟用SMTP',
    'LBL_NO_ACTION'                         => '沒有找到對應action名。',
    'LBL_NO_DATA'                           => '無數據',
    'LBL_ROUTING_ADD_RULE'                  => '添加規則',
    'LBL_ROUTING_ALL'                       => '全部',
    'LBL_ROUTING_ANY'                       => '任何',
    'LBL_ROUTING_BREAK'                     => '-',
    'LBL_ROUTING_BUTTON_CANCEL'             => '取消',
    'LBL_ROUTING_BUTTON_SAVE'               => '保存規則',

    'LBL_ROUTING_ACTIONS_COPY_MAIL'         => '複製郵件',
    'LBL_ROUTING_ACTIONS_DELETE_BEAN'       => 'Delete SuiteCRM Object',
    'LBL_ROUTING_ACTIONS_DELETE_FILE'       => '刪除文件',
    'LBL_ROUTING_ACTIONS_DELETE_MAIL'       => '刪除郵件',
    'LBL_ROUTING_ACTIONS_FORWARD'           => '轉交郵件',
    'LBL_ROUTING_ACTIONS_MARK_FLAGGED'      => '標誌郵件',
    'LBL_ROUTING_ACTIONS_MARK_READ'         => '標註郵件',
    'LBL_ROUTING_ACTIONS_MARK_UNREAD'       => '標註未讀',
    'LBL_ROUTING_ACTIONS_MOVE_MAIL'         => '移動郵件',
    'LBL_ROUTING_ACTIONS_PEFORM'            => '執行接下來的動作',
    'LBL_ROUTING_ACTIONS_REPLY'             => '回覆郵件',

    'LBL_ROUTING_CHECK_RULE'                => '一個錯誤被防護:\n',
    'LBL_ROUTING_CHECK_RULE_DESC'           => '請驗證所有被標註的欄位.',
    'LBL_ROUTING_CONFIRM_DELETE'            => '您確定您要刪除這條規則麽?\n這不能被重做.',

    'LBL_ROUTING_FLAGGED'                   => '標識設置',
    'LBL_ROUTING_FORM_DESC'                 => '保存的規則被立即激活.',
    'LBL_ROUTING_FW'                        => '轉發: ',
    'LBL_ROUTING_LIST_TITLE'                => '規則',
    'LBL_ROUTING_MATCH'                     => '如果',
    'LBL_ROUTING_MATCH_2'                   => '以下條件被遇到:',
    'LBL_NOTIFICATIONS'                     => '提醒',
    'LBL_ROUTING_MATCH_CC_ADDR'             => '抄送',
    'LBL_ROUTING_MATCH_DESCRIPTION'         => '主要內容',
    'LBL_ROUTING_MATCH_FROM_ADDR'           => '來自',
    'LBL_ROUTING_MATCH_NAME'                => '主題',
    'LBL_ROUTING_MATCH_PRIORITY_HIGH'       => '高優先順序',
    'LBL_ROUTING_MATCH_PRIORITY_NORMAL'     => '中優先順序 ',
    'LBL_ROUTING_MATCH_PRIORITY_LOW'        => '低優先順序',
    'LBL_ROUTING_MATCH_TO_ADDR'             => '到',
    'LBL_ROUTING_MATCH_TYPE_MATCH'          => '包含',
    'LBL_ROUTING_MATCH_TYPE_NOT_MATCH'      => '不包含',

    'LBL_ROUTING_NAME'                      => '規則名稱',
    'LBL_ROUTING_NEW_NAME'                  => '新規則',
    'LBL_ROUTING_ONE_MOMENT'                => '請稍等...',
    'LBL_ROUTING_ORIGINAL_MESSAGE_FOLLOWS'  => '原始信息跟隨.',
    'LBL_ROUTING_RE'                        => '回覆: ',
    'LBL_ROUTING_SAVING_RULE'               => '保存規則',
    'LBL_ROUTING_SUB_DESC'                  => '檢查的規則是有效的. 點擊名稱來編輯.',
    'LBL_ROUTING_TO'                        => '到',
    'LBL_ROUTING_TO_ADDRESS'                => '到地址',
    'LBL_ROUTING_WITH_TEMPLATE'             => '與模板',
  'NTC_OVERWRITE_ADDRESS_PHONE_CONFIRM' => '當前表單中的電話和地址欄位不為空，覆蓋選中客戶的電話和地址信息，請點擊"OK".保持原值，請點擊"取消".',
  'LBL_DROP_HERE' => '[拖放到這裡]',
    'LBL_EMAIL_ACCOUNTS_EDIT'               => '編輯',
    'LBL_EMAIL_ACCOUNTS_GMAIL_DEFAULTS'     => '設置郵件預設值',
    'LBL_EMAIL_ACCOUNTS_NAME'               => '名稱',
    'LBL_EMAIL_ACCOUNTS_OUTBOUND'           => '外部郵件伺服器',
    'LBL_EMAIL_ACCOUNTS_SENDTYPE'           => '郵件轉交代理',
    'LBL_EMAIL_ACCOUNTS_SMTPAUTH_REQ'       => '使用SMTP認證?',
    'LBL_EMAIL_ACCOUNTS_SMTPPASS'           => 'SMTP密碼',
    'LBL_EMAIL_ACCOUNTS_SMTPPORT'           => 'SMTP埠',
    'LBL_EMAIL_ACCOUNTS_SMTPSERVER'         => 'SMTP伺服器',
    'LBL_EMAIL_ACCOUNTS_SMTPSSL'            => '連接時使用SSL',
    'LBL_EMAIL_ACCOUNTS_SMTPUSER'           => 'SMTP用戶名',
    'LBL_EMAIL_ACCOUNTS_SMTPDEFAULT'        => '預設',
    'LBL_EMAIL_WARNING_MISSING_USER_CREDS'  => '警告：沒有發信電子郵件帳號的用戶名和密碼。',
    'LBL_EMAIL_ACCOUNTS_SMTPUSER_REQD'      => '必須輸入 SMTP 用戶名',
    'LBL_EMAIL_ACCOUNTS_SMTPPASS_REQD'      => '必須輸入 SMTP 密碼',
    'LBL_EMAIL_ACCOUNTS_TITLE'              => '郵件帳戶管理',
    'LBL_EMAIL_POP3_REMOVE_MESSAGE'     => '從下個版本開始, 我們將不再支持POP3協議, 我們只支持IMAP協議.',
  'LBL_EMAIL_ACCOUNTS_SUBTITLE'           => '設置接收的電子郵件帳號。',
  'LBL_EMAIL_ACCOUNTS_OUTBOUND_SUBTITLE'  => '提供SMTP伺服器相關設置。',
    'LBL_EMAIL_ADD'                         => '添加地址',

    'LBL_EMAIL_ADDRESS_BOOK_ADD'            => '添加',
    'LBL_EMAIL_ADDRESS_BOOK_CLEAR'          => '清除',
    'LBL_EMAIL_ADDRESS_BOOK_ADD_TO'         => 'To:',
    'LBL_EMAIL_ADDRESS_BOOK_ADD_CC'         => 'Cc:',
    'LBL_EMAIL_ADDRESS_BOOK_ADD_BCC'        => 'Bcc:',
    'LBL_EMAIL_ADDRESS_BOOK_ADRRESS_TYPE'   => 'To/Cc/Bcc',
    'LBL_EMAIL_ADDRESS_BOOK_ADD_LIST'       => '新建列表',
    'LBL_EMAIL_ADDRESS_BOOK_EMAIL_ADDR'     => '郵件地址',
    'LBL_EMAIL_ADDRESS_BOOK_ERR_NOT_CONTACT'=> '現在只有編輯聯繫人是被支持的.',
    'LBL_EMAIL_ADDRESS_BOOK_FILTER'         => '過濾器',
    'LBL_EMAIL_ADDRESS_BOOK_FIRST_NAME'     => '名字',
    'LBL_EMAIL_ADDRESS_BOOK_LAST_NAME'      => '姓',
    'LBL_EMAIL_ADDRESS_BOOK_MY_CONTACTS'    => '我的聯繫人',
    'LBL_EMAIL_ADDRESS_BOOK_MY_LISTS'       => '我的郵件列表',
    'LBL_EMAIL_ADDRESS_BOOK_NAME'           => '名稱',
    'LBL_EMAIL_ADDRESS_BOOK_NOT_FOUND'      => '無地址被髮現',
    'LBL_EMAIL_ADDRESS_BOOK_SAVE_AND_ADD'   => '保存 & 添加到地址薄',
    'LBL_EMAIL_ADDRESS_BOOK_SEARCH'         => '查找',
    'LBL_EMAIL_ADDRESS_BOOK_SELECT_TITLE'   => '選擇地址薄入口',
    'LBL_EMAIL_ADDRESS_BOOK_TITLE'          => '地址薄',
    'LBL_EMAIL_REPORTS_TITLE'               => '報表',
    'LBL_EMAIL_ADDRESS_BOOK_TITLE_ICON'     => SugarThemeRegistry::current()->getImage('icon_email_addressbook', "", null, null, ".gif", 'Address Book').' Address Book',
    'LBL_EMAIL_ADDRESS_BOOK_TITLE_ICON_SHORT'     => SugarThemeRegistry::current()->getImage('icon_email_addressbook', 'align=absmiddle border=0', 14, 14, ".gif", ''),
    'LBL_EMAIL_REMOVE_SMTP_WARNING'         => '警告! 你要刪除的電子郵件外發帳號已經與一個電子郵件接收帳號綁定。你是否確信要刪除這個帳號？',
    'LBL_EMAIL_ADDRESSES'                   => '郵件地址',
    'LBL_EMAIL_ADDRESS_PRIMARY'             => '郵件地址',
    'LBL_EMAIL_ADDRESSES_TITLE'             => '郵件地址',
    'LBL_EMAIL_ARCHIVE_TO_SUGAR'            => 'Import to SuiteCRM',
    'LBL_EMAIL_ASSIGNMENT'                  => '分配',
    'LBL_EMAIL_ATTACH_FILE_TO_EMAIL'        => '添加郵件附件到郵件中',
    'LBL_EMAIL_ATTACHMENT'                  => '附件',
    'LBL_EMAIL_ATTACHMENTS'                 => '附件文件',
    'LBL_EMAIL_ATTACHMENTS2'                => 'From SuiteCRM Documents',
    'LBL_EMAIL_ATTACHMENTS3'                => '模板附件',
    'LBL_EMAIL_ATTACHMENTS_FILE'            => '文件',
    'LBL_EMAIL_ATTACHMENTS_DOCUMENT'        => '文檔',
    'LBL_EMAIL_ATTACHMENTS_EMBEDED'         => '插入郵件',
    'LBL_EMAIL_BCC'                         => '密送',
    'LBL_EMAIL_CANCEL'                      => '取消',
    'LBL_EMAIL_CC'                          => '抄送',
    'LBL_EMAIL_CHARSET'                     => '字元集設置',
    'LBL_EMAIL_CHECK'                       => '接收郵件',
    'LBL_EMAIL_CHECKING_NEW'                => '為新郵件標記',
    'LBL_EMAIL_CHECKING_DESC'               => '為新郵件標記. <br><br>如果這是為郵件帳戶做第一次標記, 它將花費一些時間.',
    'LBL_EMAIL_CLOSE'                       => '關閉',
    'LBL_EMAIL_COFFEE_BREAK'                => '為新郵件標記. <br><br>大郵件帳戶可能花費更多一些時間.',
    'LBL_EMAIL_COMMON'                      => '普通',

    'LBL_EMAIL_COMPOSE'                     => '撰寫郵件',
    'LBL_EMAIL_COMPOSE_ERR_NO_RECIPIENTS'   => '請為郵件輸入接受人.',
    'LBL_EMAIL_COMPOSE_LINK_TO'             => '關聯人',
    'LBL_EMAIL_COMPOSE_NO_BODY'             => '郵件內容為空.  無論如何都發送嗎?',
    'LBL_EMAIL_COMPOSE_NO_SUBJECT'          => '這個郵件沒有主題.  無論如何都發送嗎?',
    'LBL_EMAIL_COMPOSE_NO_SUBJECT_LITERAL'  => '(無主題)',
    'LBL_EMAIL_COMPOSE_READ'                => '讀 & 排列郵件',
    'LBL_EMAIL_COMPOSE_SEND_FROM'           => '從郵件帳戶中發送',
    'LBL_EMAIL_COMPOSE_OPTIONS'             => '選項',
    'LBL_EMAIL_COMPOSE_INVALID_ADDRESS'     => '請輸入有效的郵件地址在到, 抄送和密送位置',

    'LBL_EMAIL_CONFIRM_CLOSE'               => '放棄這封郵件嗎?',
    'LBL_EMAIL_CONFIRM_DELETE'              => '要從您的地址薄中移除這些輸入嗎?',
    'LBL_EMAIL_CONFIRM_DELETE_SIGNATURE'    => '確認刪除此簽名?',

    'LBL_EMAIL_CREATE_NEW'                  => '--保存後創建--',
    'LBL_EMAIL_MULT_GROUP_FOLDER_ACCOUNTS'  => '多用戶',
    'LBL_EMAIL_MULT_GROUP_FOLDER_ACCOUNTS_EMPTY' => '空',
    'LBL_EMAIL_DATE_SENT_BY_SENDER'         => '接收時間',
  'LBL_EMAIL_DATE_RECEIVED'               => '發送時間',
    'LBL_EMAIL_ASSIGNED_TO_USER'            => '分配給用戶',
    'LBL_EMAIL_DATE_TODAY'                  => '今天',
    'LBL_EMAIL_DATE_YESTERDAY'              => '昨天',
    'LBL_EMAIL_DD_TEXT'                     => '選擇的郵件.',
    'LBL_EMAIL_DEFAULTS'                    => '預設',
    'LBL_EMAIL_DELETE'                      => '刪除',
    'LBL_EMAIL_DELETE_CONFIRM'              => '刪除選擇的信息嗎?',
    'LBL_EMAIL_DELETE_SUCCESS'              => '郵件刪除成功.',
    'LBL_EMAIL_DELETING_MESSAGE'            => '刪除信息中',
    'LBL_EMAIL_DETAILS'                     => '詳細',
    'LBL_EMAIL_DISPLAY_MSG'                 => '顯示郵件 {0} - {1} 之 {2}',
    'LBL_EMAIL_ADDR_DISPLAY_MSG'            => '顯示郵件地址(es) {0} - {1} 之 {2}',

    'LBL_EMAIL_EDIT_CONTACT'                => '編輯聯繫人',
    'LBL_EMAIL_EDIT_CONTACT_WARN'           => '當與聯繫人工作時只有主要地址被使用.',
    'LBL_EMAIL_EDIT_MAILING_LIST'           => '編輯郵件列表',

    'LBL_EMAIL_EMPTYING_TRASH'              => '清空垃圾箱',
    'LBL_EMAIL_DELETING_OUTBOUND'           => '刪除發件伺服器',
    'LBL_EMAIL_CLEARING_CACHE_FILES'        => '清除緩存文件',
    'LBL_EMAIL_EMPTY_MSG'                   => '無郵件顯示.',
    'LBL_EMAIL_EMPTY_ADDR_MSG'              => '無郵件地址顯示.',

    'LBL_EMAIL_ERROR_ADD_GROUP_FOLDER'      => 'Folder name must be unique and not empty. Please try again.',
    'LBL_EMAIL_ERROR_DELETE_GROUP_FOLDER'   => '不能刪除文件夾. 文件夾和它的子文件夾都與一個郵箱相關聯.',
    'LBL_EMAIL_ERROR_CANNOT_FIND_NODE'      => '從上下文不能確定文件夾的用意,重試.',
    'LBL_EMAIL_ERROR_CHECK_IE_SETTINGS'     => '請查看您的設置.',
    'LBL_EMAIL_ERROR_CONTACT_NAME'          => '請確定您輸入了一個姓.',
    'LBL_EMAIL_ERROR_DESC'                  => '發現錯誤: ',
    'LBL_EMAIL_DELETE_ERROR_DESC'           => '您沒有足夠的訪問許可權，請聯繫管理員.',
    'LBL_EMAIL_ERROR_DUPE_FOLDER_NAME'      => 'SuiteCRM Folder names must be unique.',
    'LBL_EMAIL_ERROR_EMPTY'                 => '請輸入一些查找標準.',
    'LBL_EMAIL_ERROR_GENERAL_TITLE'         => '一個錯誤已經發生',
    'LBL_EMAIL_ERROR_LIST_NAME'             => '一封名稱已經存在的電子郵件',
    'LBL_EMAIL_ERROR_MESSAGE_DELETED'       => '消息從伺服器上移除',
    'LBL_EMAIL_ERROR_IMAP_MESSAGE_DELETED'  => '消息不是被從伺服器上刪除就是轉移到一個不同的文件夾中',
    'LBL_EMAIL_ERROR_MAILSERVERCONNECTION'  => '連接郵件伺服器失敗. 請聯繫您的管理員',
    'LBL_EMAIL_ERROR_MOVE'                  => '在伺服器和郵件帳戶中移動郵件目前還不被支持.',
    'LBL_EMAIL_ERROR_MOVE_TITLE'            => '移動錯誤',
    'LBL_EMAIL_ERROR_NAME'                  => '名稱是被需要的.',
    'LBL_EMAIL_ERROR_FROM_ADDRESS'          => '來源地址是需要的.',
    'LBL_EMAIL_ERROR_NO_FILE'               => '請提供一個文件.',
    'LBL_EMAIL_ERROR_NO_IMAP_FOLDER_RENAME' => 'IMAP文件夾重命名這次不被支持.',
    'LBL_EMAIL_ERROR_SERVER'                => '一個郵件伺服器地址是需要的.',
    'LBL_EMAIL_ERROR_SAVE_ACCOUNT'          => '郵件帳戶可能未被保存.',
    'LBL_EMAIL_ERROR_TIMEOUT'               => '一個錯誤發生在與郵件伺服器通信時.',
    'LBL_EMAIL_ERROR_USER'                  => '一個登陸名稱被需要.',
    'LBL_EMAIL_ERROR_PASSWORD'              => '一個密碼被需要.',
    'LBL_EMAIL_ERROR_PORT'                  => '一個郵件服務埠被需要.',
    'LBL_EMAIL_ERROR_PROTOCOL'              => '一個服務協議被需要.',
    'LBL_EMAIL_ERROR_MONITORED_FOLDER'      => '需要設定被監督的文件夾.',
    'LBL_EMAIL_ERROR_TRASH_FOLDER'          => '需要設定垃圾文件夾.',
    'LBL_EMAIL_ERROR_VIEW_RAW_SOURCE'       => '這個信息是無效的',
    'LBL_EMAIL_ERROR_NO_OUTBOUND'           => '沒有指定發送電子郵件帳號',
    'LBL_EMAIL_FOLDERS'                     => SugarThemeRegistry::current()->getImage('icon_email_folder', 'align=absmiddle border=0', null, null, ".gif", '').'Folders',
    'LBL_EMAIL_FOLDERS_SHORT'               => SugarThemeRegistry::current()->getImage('icon_email_folder', 'align=absmiddle border=0', null, null, ".gif", ''),
    'LBL_EMAIL_FOLDERS_ACTIONS'             => '移動到',
    'LBL_EMAIL_FOLDERS_ADD'                 => '添加',
    'LBL_EMAIL_FOLDERS_ADD_DIALOG_TITLE'    => '添加新文件夾',
    'LBL_EMAIL_FOLDERS_RENAME_DIALOG_TITLE' => '重命名文件夾',
    'LBL_EMAIL_FOLDERS_ADD_NEW_FOLDER'      => '添加新文件夾組',
    'LBL_EMAIL_FOLDERS_ADD_THIS_TO'         => '添加這個文件夾到',
    'LBL_EMAIL_FOLDERS_CHANGE_HOME'         => '這個文件夾不能被改變',
    'LBL_EMAIL_FOLDERS_DELETE_CONFIRM'      => '您確定您要刪除這個文件夾嗎?\n這個過程不能被回滾.\n文件夾刪除將關聯到所有包含的文件夾.',
    'LBL_EMAIL_FOLDERS_NEW_FOLDER'          => '新建文件夾',
    'LBL_EMAIL_FOLDERS_NO_VALID_NODE'       => '請選擇一個文件夾在執行這個動作前.',
    'LBL_EMAIL_FOLDERS_TITLE'               => 'Sugar文件夾管理',
    'LBL_EMAIL_FOLDERS_USING_GROUP_USER'    => '使用組',

    'LBL_EMAIL_FORWARD'                     => '轉發',
    'LBL_EMAIL_DELIMITER'                   => '::;::',
    'LBL_EMAIL_DOWNLOAD_STATUS'             => '下載 [[count]] / [[total]] 郵件',
    'LBL_EMAIL_FOUND'                       => '發現',
    'LBL_EMAIL_FROM'                        => '從',
    'LBL_EMAIL_GROUP'                       => '組',
    'LBL_EMAIL_UPPER_CASE_GROUP'            => '組',
    'LBL_EMAIL_HOME_FOLDER'                 => '主頁',
    'LBL_EMAIL_HTML_RTF'                    => '發送HTML',
    'LBL_EMAIL_IE_DELETE'                   => '刪除郵件帳戶',
    'LBL_EMAIL_IE_DELETE_SIGNATURE'         => '刪除簽名',
    'LBL_EMAIL_IE_DELETE_CONFIRM'           => '您確定您要刪除這個郵件帳戶嗎?',
    'LBL_EMAIL_IE_DELETE_SUCCESSFUL'        => '刪除成功.',
    'LBL_EMAIL_IE_SAVE'                     => '保存郵件帳戶信息',
    'LBL_EMAIL_IMPORTING_EMAIL'             => '導入郵件',
    'LBL_EMAIL_IMPORT_EMAIL'                => 'Import to SuiteCRM',
    'LBL_EMAIL_IMPORT_SETTINGS'                => '導入設置',
    'LBL_EMAIL_INVALID'                     => '無效',
    'LBL_EMAIL_LOADING'                     => '載入...',
    'LBL_EMAIL_MARK'                        => '標記',
    'LBL_EMAIL_MARK_FLAGGED'                => '作為標誌',
    'LBL_EMAIL_MARK_READ'                   => '作為已讀',
    'LBL_EMAIL_MARK_UNFLAGGED'              => '作為無標誌',
    'LBL_EMAIL_MARK_UNREAD'                 => '作為未讀',
    'LBL_EMAIL_ASSIGN_TO'                   => '分配給',

    'LBL_EMAIL_MENU_ADD_FOLDER'             => '創建文件夾',
    'LBL_EMAIL_MENU_COMPOSE'                => '排版',
    'LBL_EMAIL_MENU_DELETE_FOLDER'          => '刪除文件夾',
    'LBL_EMAIL_MENU_EDIT'                   => '編輯',
    'LBL_EMAIL_MENU_EMPTY_TRASH'            => '清空垃圾箱',
    'LBL_EMAIL_MENU_SYNCHRONIZE'            => '同步',
    'LBL_EMAIL_MENU_CLEAR_CACHE'            => '清除緩存文件',
    'LBL_EMAIL_MENU_REMOVE'                 => '刪除',
    'LBL_EMAIL_MENU_RENAME'                 => '重命名',
    'LBL_EMAIL_MENU_RENAME_FOLDER'          => '重命名文件夾',
    'LBL_EMAIL_MENU_RENAMING_FOLDER'        => '重命名文件夾',
    'LBL_EMAIL_MENU_MAKE_SELECTION'         => '請做一個選擇在做此操作之前.',

    'LBL_EMAIL_MENU_HELP_ADD_FOLDER'        => 'Create a Folder (remote or in SuiteCRM)',
    'LBL_EMAIL_MENU_HELP_ARCHIVE'           => 'Archive these email(s) to SuiteCRM',
    'LBL_EMAIL_MENU_HELP_COMPOSE_TO_LIST'   => '郵件選擇郵件列表',
    'LBL_EMAIL_MENU_HELP_CONTACT_COMPOSE'   => '發郵件給這個聯繫人',
    'LBL_EMAIL_MENU_HELP_CONTACT_REMOVE'    => '移除一個聯繫人',
    'LBL_EMAIL_MENU_HELP_DELETE'            => '刪除這些郵件',
    'LBL_EMAIL_MENU_HELP_DELETE_FOLDER'     => 'Delete a Folder (remote or in SuiteCRM)',
    'LBL_EMAIL_MENU_HELP_EDIT_CONTACT'      => '編輯一個聯繫人',
    'LBL_EMAIL_MENU_HELP_EDIT_LIST'         => '編輯一個郵件列表',
    'LBL_EMAIL_MENU_HELP_EMPTY_TRASH'       => '為您郵件莊戶清空所有破損的文件夾',
    'LBL_EMAIL_MENU_HELP_MARK_FLAGGED'      => '標記這些郵件為標誌的',
    'LBL_EMAIL_MENU_HELP_MARK_READ'         => '標記這些郵件已讀',
    'LBL_EMAIL_MENU_HELP_MARK_UNFLAGGED'    => '標記這些郵件未標誌',
    'LBL_EMAIL_MENU_HELP_MARK_UNREAD'       => '標記這寫郵件未讀',
    'LBL_EMAIL_MENU_HELP_REMOVE_LIST'       => '刪除郵件列表',
    'LBL_EMAIL_MENU_HELP_RENAME_FOLDER'     => 'Rename a Folder (remote or in SuiteCRM)',
    'LBL_EMAIL_MENU_HELP_REPLY'             => '回覆這些郵件',
    'LBL_EMAIL_MENU_HELP_REPLY_ALL'         => '回覆給所有這些郵件的接受者',

    'LBL_EMAIL_MESSAGES'                    => '消息',

    'LBL_EMAIL_ML_NAME'                     => '列表名稱',
    'LBL_EMAIL_ML_ADDRESSES_1'              => '選擇列表地址',
    'LBL_EMAIL_ML_ADDRESSES_2'              => '有效列表地址',

    'LBL_EMAIL_MULTISELECT'                 => '<b>Ctrl-點擊</b> 選擇多個<br />(Mac用戶使用 <b>CMD-點擊</b>)',

    'LBL_EMAIL_NO'                          => '不',
    'LBL_EMAIL_NOT_SENT'                    => '系統不能處理你的請求。請聯繫系統管理員。',

    'LBL_EMAIL_OK'                          => '確定',
    'LBL_EMAIL_ONE_MOMENT'                  => '請等一會...',
    'LBL_EMAIL_OPEN_ALL'                    => '打開多行消息',
    'LBL_EMAIL_OPTIONS'                     => '選項',
    'LBL_EMAIL_QUICK_COMPOSE'       => '快速編寫電子郵件',
    'LBL_EMAIL_OPT_OUT'                     => '選出',
    'LBL_EMAIL_OPT_OUT_AND_INVALID'         => '選出,無效',
    'LBL_EMAIL_PAGE_AFTER'                  => '的{0}',
    'LBL_EMAIL_PAGE_BEFORE'                 => '頁',
    'LBL_EMAIL_PERFORMING_TASK'             => '完成任務',
    'LBL_EMAIL_PRIMARY'                     => '主要',
    'LBL_EMAIL_PRINT'                       => '列印',

    'LBL_EMAIL_QC_BUGS'                     => '缺陷',
    'LBL_EMAIL_QC_CASES'                    => '客戶反饋信息',
    'LBL_EMAIL_QC_LEADS'                    => '潛在客戶',
    'LBL_EMAIL_QC_CONTACTS'                 => '聯繫人',
    'LBL_EMAIL_QC_TASKS'                    => '任務',
    'LBL_EMAIL_QC_OPPORTUNITIES'            => '商業機會',
    'LBL_EMAIL_QUICK_CREATE'                => '快速創建',

    'LBL_EMAIL_REBUILDING_FOLDERS'          => '重建文件夾',
    'LBL_EMAIL_RELATE_TO'                   => '相關',
    'LBL_EMAIL_VIEW_RELATIONSHIPS'          => '查看關係',
    'LBL_EMAIL_RECORD'                => '郵件記錄',
    'LBL_EMAIL_REMOVE'                      => '移除',
    'LBL_EMAIL_REPLY'                       => '回覆',
    'LBL_EMAIL_REPLY_ALL'                   => '全部回覆',
    'LBL_EMAIL_REPLY_TO'                    => '回覆',
    'LBL_EMAIL_RETRIEVING_LIST'             => '查詢郵件列表',
    'LBL_EMAIL_RETRIEVING_MESSAGE'          => '查詢消息',
    'LBL_EMAIL_RETRIEVING_RECORD'           => '查詢郵件記錄',
    'LBL_EMAIL_SELECT_ONE_RECORD'           => '請選擇一條郵件記錄',
    'LBL_EMAIL_RETURN_TO_VIEW'              => '返回到前一個模塊',
    'LBL_EMAIL_REVERT'                      => '查詢',
    'LBL_EMAIL_RELATE_EMAIL'                => '相關郵件',

    'LBL_EMAIL_RULES_TITLE'                 => '規則管理',

    'LBL_EMAIL_SAVE'                        => '保存',
    'LBL_EMAIL_SAVE_AND_REPLY'              => '保存 & 回覆',
    'LBL_EMAIL_SAVE_DRAFT'                  => '保存草稿',

    'LBL_EMAIL_SEARCHING'                   => '引導查找',
    'LBL_EMAIL_SEARCH'                      => SugarThemeRegistry::current()->getImage('Search', 'align=absmiddle border=0', null, null, ".gif", ''),
    'LBL_EMAIL_SEARCH_SHORT'                => SugarThemeRegistry::current()->getImage('Search', 'align=absmiddle border=0', null, null, ".gif", ''),
    'LBL_EMAIL_SEARCH_ADVANCED'             => '高級搜索',
    'LBL_EMAIL_SEARCH_DATE_FROM'            => '開始日期',
    'LBL_EMAIL_SEARCH_DATE_UNTIL'           => '結束日期',
    'LBL_EMAIL_SEARCH_FULL_TEXT'            => '文章內容',
    'LBL_EMAIL_SEARCH_NO_RESULTS'           => '無結果匹配您的查找規則.',
    'LBL_EMAIL_SEARCH_RESULTS_TITLE'        => '查找結果',
    'LBL_EMAIL_SEARCH_TITLE'                => '簡單查找',
    'LBL_EMAIL_SEARCH__FROM_ACCOUNTS'       => '查找郵件帳戶',

    'LBL_EMAIL_SELECT'                      => '選擇',

    'LBL_EMAIL_SEND'                        => '發送',
    'LBL_EMAIL_SENDING_EMAIL'               => '發送郵件',

    'LBL_EMAIL_SETTINGS'                    => '設置',
    'LBL_EMAIL_SETTINGS_2_ROWS'             => '2行',
    'LBL_EMAIL_SETTINGS_3_COLS'             => '3列',
    'LBL_EMAIL_SETTINGS_LAYOUT'             => '版面佈局風格',
    'LBL_EMAIL_SETTINGS_ACCOUNTS'           => '郵件帳戶',
    'LBL_EMAIL_SETTINGS_ADD_ACCOUNT'        => '清除窗口',
    'LBL_EMAIL_SETTINGS_AUTO_IMPORT'        => '在視圖上導入郵件',
    'LBL_EMAIL_SETTINGS_CHECK_INTERVAL'     => '查找新郵件',
    'LBL_EMAIL_SETTINGS_COMPOSE_INLINE'     => '使用前一個面板',
    'LBL_EMAIL_SETTINGS_COMPOSE_POPUP'      => '使用彈出窗口',
    'LBL_EMAIL_SETTINGS_DISPLAY_NUM'        => '每頁郵件數量',
    'LBL_EMAIL_SETTINGS_EDIT_ACCOUNT'       => '編輯郵件帳戶',
    'LBL_EMAIL_SETTINGS_FOLDERS'            => '文件夾',
    'LBL_EMAIL_SETTINGS_FROM_ADDR'          => '來源地址',
    'LBL_EMAIL_SETTINGS_FROM_TO_EMAIL_ADDR' => '提醒測試電子郵件地址：',
    'LBL_EMAIL_SETTINGS_TO_EMAIL_ADDR'      => '收件人電子郵件地址',
    'LBL_EMAIL_SETTINGS_FROM_NAME'          => '來源名稱',
    'LBL_EMAIL_SETTINGS_REPLY_TO_ADDR'      =>'回覆電子郵件地址',
    'LBL_EMAIL_SETTINGS_FULL_SCREEN'        => '全屏幕',
    'LBL_EMAIL_SETTINGS_FULL_SYNC'          => '同步所有郵件帳戶',
    'LBL_EMAIL_TEST_NOTIFICATION_SENT'      => '已經通過這個外發電子郵件伺服器發送了一封測試電子郵件。請檢查受否收到。',
    'LBL_EMAIL_SETTINGS_FULL_SYNC_DESC'     => '執行本動作將同步郵件帳戶和它們的內容.',
    'LBL_EMAIL_SETTINGS_FULL_SYNC_WARN'     => '執行一個全同步嗎?\n大郵件帳戶可能會花費幾分鐘.',
    'LBL_EMAIL_SUBSCRIPTION_FOLDER_HELP'    => '按Shift鍵或Ctrl鍵來選在多個文件夾.',
    'LBL_EMAIL_SETTINGS_GENERAL'            => '全部',
    'LBL_EMAIL_SETTINGS_GROUP_FOLDERS'      => '有效組文件夾',
    'LBL_EMAIL_SETTINGS_GROUP_FOLDERS_CREATE'   => '創建組文件夾',
    'LBL_EMAIL_SETTINGS_GROUP_FOLDERS_Save' => '保存組文件夾',
    'LBL_EMAIL_SETTINGS_RETRIEVING_GROUP'   => '恢復組文件夾',

    'LBL_EMAIL_SETTINGS_GROUP_FOLDERS_EDIT' => '編輯組文件夾',

    'LBL_EMAIL_SETTINGS_NAME'               => '名稱',
    'LBL_EMAIL_SETTINGS_REQUIRE_REFRESH'    => '這些設置將需要頁面刷新被激活.',
    'LBL_EMAIL_SETTINGS_RETRIEVING_ACCOUNT' => '恢復郵件帳戶',
    'LBL_EMAIL_SETTINGS_RULES'              => '規則',
    'LBL_EMAIL_SETTINGS_SAVED'              => '設置已經保存.\n\n您必須重新載入頁面使新設置有效.',
    'LBL_EMAIL_SETTINGS_SEND_EMAIL_AS'      => '象平時的文本發送郵件',
    'LBL_EMAIL_SETTINGS_SHOW_IN_FOLDERS'    => '激活郵件帳戶',
    'LBL_EMAIL_SETTINGS_SHOW_NUM_IN_LIST'   => '每頁郵件數量',
    'LBL_EMAIL_SETTINGS_TAB_POS'            => '在底部放入標簽',
    'LBL_EMAIL_SETTINGS_TITLE_LAYOUT'       => '可視設置',
    'LBL_EMAIL_SETTINGS_TITLE_PREFERENCES'  => '偏好',
    'LBL_EMAIL_SETTINGS_TOGGLE_ADV'         => '顯示高級',
    'LBL_EMAIL_SETTINGS_USER_FOLDERS'       => '有效用戶文件夾',
    'LBL_EMAIL_ERROR_PREPEND'               => '電子郵件發送出錯：',
  'LBL_EMAIL_INVALID_PERSONAL_OUTBOUND' => '你選擇的外發電子郵件帳戶無效。請檢查配置，或嘗試一下其他帳戶。',
  'LBL_EMAIL_INVALID_SYSTEM_OUTBOUND' => '您的電子郵件帳戶還沒有配置外發電子郵件伺服器。請為這個帳戶選擇或新加一個外發電子郵件伺服器。',
    'LBL_EMAIL_SHOW_READ'                   => '顯示所有',
    'LBL_EMAIL_SHOW_UNREAD_ONLY'            => '只顯示未讀',
    'LBL_EMAIL_SIGNATURES'                  => '簽名',
    'LBL_EMAIL_SIGNATURE_CREATE'            => '創建簽名',
    'LBL_EMAIL_SIGNATURE_NAME'              => '簽名名稱',
    'LBL_EMAIL_SIGNATURE_TEXT'              => '簽名內容',
  'LBL_SMTPTYPE_GMAIL'                    => 'Gmail',
  'LBL_SMTPTYPE_YAHOO'                    => 'Yahoo! Mail',
  'LBL_SMTPTYPE_EXCHANGE'                 => 'Microsoft Exchange',
    'LBL_SMTPTYPE_OTHER'                  => '其它',
    'LBL_EMAIL_SPACER_MAIL_SERVER'          => '[ 遠程文件夾 ]',
    'LBL_EMAIL_SPACER_LOCAL_FOLDER'         => '[ SuiteCRM Folders ]',
    'LBL_EMAIL_SUBJECT'                     => '主題',
    'LBL_EMAIL_SUCCESS'                     => '成功',
    'LBL_EMAIL_SUGAR_FOLDER'                => 'SuiteCRM Folder',
    'LBL_EMAIL_TEMPLATE_EDIT_PLAIN_TEXT'    => '電子郵件模板的純文本為空',
    'LBL_EMAIL_TEMPLATES'                   => '模板',
    'LBL_EMAIL_TEXT_FIRST'                  => '首頁',
    'LBL_EMAIL_TEXT_PREV'                   => '前一頁',
    'LBL_EMAIL_TEXT_NEXT'                   => '下一頁',
    'LBL_EMAIL_TEXT_LAST'                   => '最後一頁',
    'LBL_EMAIL_TEXT_REFRESH'                => '刷新',
    'LBL_EMAIL_TO'                          => '到',
    'LBL_EMAIL_TOGGLE_LIST'                 => '切換郵件列表',
    'LBL_EMAIL_VIEW'                        => '視圖',
    'LBL_EMAIL_VIEWS'                       => '視圖',
    'LBL_EMAIL_VIEW_HEADERS'                => '查看頭',
    'LBL_EMAIL_VIEW_PRINTABLE'              => '列印版',
    'LBL_EMAIL_VIEW_RAW'                    => '顯示原始郵件',
    'LBL_EMAIL_VIEW_UNSUPPORTED'            => '當使用POP3協議這項功能不被支持.',
    'LBL_DEFAULT_LINK_TEXT'                 => '預設連文本.',
    'LBL_EMAIL_YES'                         => '是的',
    'LBL_EMAIL_TEST_OUTBOUND_SETTINGS'      => '發送測試電子郵件',
    'LBL_EMAIL_TEST_OUTBOUND_SETTINGS_SENT' => '測試電子郵件已發送',
    'LBL_EMAIL_MESSAGE_NO'                  => '消息',
    'LBL_EMAIL_IMPORT_SUCCESS'              => '導入成功',
    'LBL_EMAIL_IMPORT_FAIL'                 => '導入失敗，該消息已導入或已從伺服器刪除',

    'LBL_LINK_NONE'=> '無',
    'LBL_LINK_ALL'=> '全部',
    'LBL_LINK_RECORDS'=> '記錄',
    'LBL_LINK_SELECT'=> '選擇',
    'LBL_LINK_ACTIONS'=> '行動',
    'LBL_LINK_MORE'=> '更多',
    'LBL_CLOSE_ACTIVITY_HEADER' => "確定",
    'LBL_CLOSE_ACTIVITY_CONFIRM' => "您確定要關閉 #module# 嗎？",
    'LBL_CLOSE_ACTIVITY_REMEMBER' => "以後不要再顯示這條信息: &nbsp;",
    'LBL_INVALID_FILE_EXTENSION' => '文件擴展名無效',


    'ERR_AJAX_LOAD'     => '發生錯誤:',
    'ERR_AJAX_LOAD_FAILURE'     => '處理過程中出現錯誤，請稍候重試。',
    'ERR_AJAX_LOAD_FOOTER' => '如果這個錯誤一直出現，請聯繫管理員禁用這個模塊的Ajax特性',
    'ERR_CREATING_FIELDS' => '填寫附加細節欄位錯誤:',
    'ERR_CREATING_TABLE' => '新增表錯誤:',
    'ERR_DECIMAL_SEP_EQ_THOUSANDS_SEP'  => "小數分隔符和千分符不能相同。\n\n請更改它們的值。",
    'ERR_DELETE_RECORD' => '必須指定記錄編號才能刪除客戶。',
    'ERR_EXPORT_DISABLED' => '禁止導出。',
    'ERR_EXPORT_TYPE' => '錯誤導出',
    'ERR_INVALID_AMOUNT' => '請輸入有效金額:',
    'ERR_INVALID_DATE_FORMAT' => '日期格式必須是:',
    'ERR_INVALID_DATE' => '請輸入有效日期。',
    'ERR_INVALID_DAY' => '請輸入有效天數。',
    'ERR_INVALID_EMAIL_ADDRESS' => '不是有效的電子郵件地址。',
    'ERR_INVALID_FILE_REFERENCE' => '無效文件引用',
    'ERR_INVALID_HOUR' => '請輸入有效小時。',
    'ERR_INVALID_MONTH' => '請輸入有效月份。',
    'ERR_INVALID_TIME' => '請輸入有效時間。',
    'ERR_INVALID_YEAR' => '請輸入有4位數。',
    'ERR_NEED_ACTIVE_SESSION' => '需要一個可用的會話來導出內容。',
    'ERR_NO_HEADER_ID' => '此功能在本主題中無效.',
    'ERR_NOT_ADMIN' => "沒有管理許可權。",
    'ERR_MISSING_REQUIRED_FIELDS' => '缺少必填欄位:',
    'ERR_INVALID_REQUIRED_FIELDS' => '無效的必填欄位:',
    'ERR_INVALID_VALUE' => '無效值:',
    'ERR_NO_SUCH_FILE' =>'文件在系統中不存在',
    'ERR_NO_SINGLE_QUOTE' => '不可以使用單引號',
    'ERR_NOTHING_SELECTED' =>'繼續之前請選擇。',
    'ERR_OPPORTUNITY_NAME_DUPE' => '商業機會名稱已存在，請輸入另一個名稱。',
    'ERR_OPPORTUNITY_NAME_MISSING' => '商業機會名稱不能為空。請輸入以下的商業機會名稱。',
    'ERR_POTENTIAL_SEGFAULT' => 'A potential Apache segmentation fault was detected.  Please notify your system administrator to confirm this problem and have her/him report it to SuiteCRM.',
    'ERR_SELF_REPORTING' => '用戶不可以給自己彙報。',
    'ERR_SINGLE_QUOTE'  => '這個欄位不支持使用單引號。請改變欄位值。',
    'ERR_SQS_NO_MATCH_FIELD' => '沒有匹配欄位:',
    'ERR_SQS_NO_MATCH' =>'沒有匹配',
    'ERR_ADDRESS_KEY_NOT_SPECIFIED' => '請聲明 \'關鍵值\' 索引在顯示參數屬性中為元數據定義',
    'ERR_EXISTING_PORTAL_USERNAME'=>'錯誤: 門戶名稱是意匠分配給另外聯繫人.',
    'ERR_COMPATIBLE_PRECISION_VALUE' => '數值與精度不匹配',
    'ERR_EXTERNAL_API_SAVE_FAIL' => '保存外部帳號是出錯.',
    'ERR_EXTERNAL_API_UPLOAD_FAIL' => '上傳時出錯,請確保上傳的不是空文件.',
    'ERR_NO_DB' => 'Could not connect to the database. Please refer to SuiteCRM error log file for details.',
    'ERR_DB_FAIL' => 'Database failure. Please refer to SuiteCRM error log file for details.',
    'ERR_EXTERNAL_API_403' => '不支持的文件類型.',
    'ERR_EXTERNAL_API_NO_OAUTH_TOKEN' => 'OAuth Access Token is missing.',
    'ERR_DB_VERSION' => 'SuiteCRM {0} files may only be used with a SuiteCRM {1} database.',


    'LBL_ACCOUNT'=>'客戶',
    'LBL_OLD_ACCOUNT_LINK'=>'舊賬號',
    'LBL_ACCOUNTS'=>'客戶',
    'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'活動',
    'LBL_ACCUMULATED_HISTORY_BUTTON_KEY' => 'H',
    'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => '查看摘要',
    'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => '查看摘要[Alt+H]',
    'LBL_ADD_BUTTON_KEY' => 'A',
    'LBL_ADD_BUTTON_TITLE' => '新增[Alt+A]',
    'LBL_ADD_BUTTON' => '增加',
    'LBL_ADD_DOCUMENT' => '增加文檔',
    'LBL_REPLACE_BUTTON' => '替代',
    'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY' => 'L',
    'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => '增加到目標列表',
    'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => '增加到目標列表',
    'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => '關閉',
    'LBL_ADDITIONAL_DETAILS_CLOSE' => '關閉',
    'LBL_ADDITIONAL_DETAILS' => '其它細節',
    'LBL_ADMIN' => '系統管理',
    'LBL_ALT_HOT_KEY' => '',
    'LBL_ARCHIVE' => '存檔',
    'LBL_ASSIGNED_TO_USER'=>'負責人:',
    'LBL_ASSIGNED_TO' => '負責人:',
    'LBL_BACK' => '上一步',
    'LBL_BILL_TO_ACCOUNT'=>'付款客戶',
    'LBL_BILL_TO_CONTACT'=>'付款聯繫人',
    'LBL_BILLING_ADDRESS'=>'帳單地址',
    'LBL_QUICK_CREATE_TITLE' => '快速創建',
    'LBL_BROWSER_TITLE' => 'SuiteCRM - Open Source CRM',
    'LBL_BUGS'=>'缺陷追蹤',
    'LBL_BY' => '被',
    'LBL_CALLS'=>'電話',
    'LBL_CALL'=>'電話',
    'LBL_CAMPAIGNS_SEND_QUEUED' => '發送隊列中的市場活動郵件',
    'LBL_SUBMIT_BUTTON_LABEL' => '提交',
    'LBL_CASE'=>'用戶反饋',
    'LBL_CASES'=>'客戶反饋',
    'LBL_CHANGE_BUTTON_KEY' => 'G',
    'LBL_CHANGE_PASSWORD' => '修改密碼',
    'LBL_CHANGE_BUTTON_LABEL' => '更改',
    'LBL_CHANGE_BUTTON_TITLE' => '更改[Alt+G]',
    'LBL_CHARSET' => 'UTF-8',
    'LBL_CHECKALL' => '全選',
    'LBL_CITY' => '城市',
    'LBL_CLEAR_BUTTON_KEY' => 'C',
    'LBL_CLEAR_BUTTON_LABEL' => '清除',
    'LBL_CLEAR_BUTTON_TITLE' => '清除[Alt+C]',
    'LBL_CLEARALL' => '全部清除',
    'LBL_CLOSE_BUTTON_TITLE' =>'關閉',
    'LBL_CLOSE_BUTTON_KEY'=>'C',
    'LBL_CLOSE_WINDOW'=>'關閉窗口',
    'LBL_CLOSEALL_BUTTON_KEY' => 'C',
    'LBL_CLOSEALL_BUTTON_LABEL' => '全部關閉',
    'LBL_CLOSEALL_BUTTON_TITLE' => '全部關閉[Alt+I]',
    'LBL_CLOSE_AND_CREATE_BUTTON_LABEL' => '關閉並且新增',
    'LBL_CLOSE_AND_CREATE_BUTTON_TITLE' => '關閉並且新增[Alt+C]',
    'LBL_CLOSE_AND_CREATE_BUTTON_KEY' => 'C',
    'LBL_OPEN_ITEMS' => '打開的項目:',
    'LBL_COMPOSE_EMAIL_BUTTON_KEY' => 'L',
    'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => '撰寫電子郵件',
    'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => '撰寫電子郵件[Alt+L]',
    'LBL_SEARCH_DROPDOWN_YES'=>'是',
    'LBL_SEARCH_DROPDOWN_NO'=>'否',
    'LBL_CONTACT_LIST' => '聯繫人列表',
    'LBL_CONTACT'=>'聯繫人',
    'LBL_CONTACTS'=>'聯繫人檔案',
    'LBL_CONTRACTS'=>'合同',
    'LBL_COUNTRY' => '國家:',
    'LBL_CREATE_BUTTON_LABEL' => '新增',
    'LBL_CREATED_BY_USER'=>'創建人',
    'LBL_CREATED_USER'=>'創建者',
    'LBL_CREATED_ID' => '創建人編號',
    'LBL_CREATED' => '創建人',
    'LBL_CURRENT_USER_FILTER' => '只顯示我的記錄:',
    'LBL_CURRENCY'=>'貨幣:',
    'LBL_DOCUMENTS'=>'文檔',
    'LBL_DATE_ENTERED' => '創建日期:',
    'LBL_DATE_MODIFIED' => '最後修改:',
    'LBL_EDIT_BUTTON' => '編輯',
    'LBL_DUPLICATE_BUTTON' => '複製',
    'LBL_DELETE_BUTTON' => '刪除',
    'LBL_DELETE' => '刪除',
    'LBL_DELETED'=>'已刪除',
    'LBL_DIRECT_REPORTS'=>'直接報告人',
    'LBL_DONE_BUTTON_KEY' => 'X',
    'LBL_DONE_BUTTON_LABEL' => '完成',
    'LBL_DONE_BUTTON_TITLE' => '完成[Alt+X]',
    'LBL_DST_NEEDS_FIXIN' => '應用程序需要設置夏令時時間。請轉到管理員控制臺下的<a href="index.php?module=Administration&action=DstFix">修複</a>鏈接，設置夏令時時間。',
    'LBL_EDIT_AS_NEW_BUTTON_LABEL' => '編輯時新建',
    'LBL_EDIT_AS_NEW_BUTTON_TITLE' => '編輯時新建',
    'LBL_FAVORITES' => '收藏夾',
    'LBL_FILTER_MENU_BY' => '菜單過濾',
    'LBL_VCARD' => 'vCard',
    'LBL_EMPTY_VCARD' => '請選擇一個vCard文件',
    'LBL_EMPTY_REQUIRED_VCARD' => 'vCard does not have all the required fields for this module. Please refer to suitecrm.log for details.',
    'LBL_VCARD_ERROR_FILESIZE' => 'The uploaded file exceeds the 30000 bytes size limit which was specified in the HTML form.',
    'LBL_VCARD_ERROR_DEFAULT' => 'There was an error uploading the vCard file. Please refer to sugarcrm.log for details.',
    'LBL_IMPORT_VCARD' => '導入vCard:',
    'LBL_IMPORT_VCARD_BUTTON_KEY' => 'I',
    'LBL_IMPORT_VCARD_BUTTON_LABEL' => '導入vCard',
    'LBL_IMPORT_VCARD_BUTTON_TITLE' => '導入vCard [Alt+I]',
    'LBL_VIEW_BUTTON_KEY' => 'V',
    'LBL_VIEW_BUTTON_LABEL' => '查看',
    'LBL_VIEW_BUTTON_TITLE' => '查看[Alt+V]',
    'LBL_VIEW_BUTTON' => '查看',
    'LBL_EMAIL_PDF_BUTTON_KEY' => 'M',
    'LBL_EMAIL_PDF_BUTTON_LABEL' => '以PDF格式發送電子郵件',
    'LBL_EMAIL_PDF_BUTTON_TITLE' => '以PDF格式發送電子郵件[Alt+M]',
    'LBL_EMAILS'=>'電子郵件',
    'LBL_EMPLOYEES' => '員工',
    'LBL_ENTER_DATE' => '輸入日期',
    'LBL_EXPORT_ALL' => '全部導出',
    'LBL_EXPORT' => '導出',
    'LBL_FAVORITES_FILTER' => '我的收藏:',
    'LBL_GO_BUTTON_LABEL' => '執行',
    'LBL_GS_HELP' => '該模塊中的這些欄位用於上面顯示的搜索，符合搜索添加的文字將高亮顯示。',
    'LBL_HIDE'=>'隱藏',
    'LBL_ID'=>'編號',
    'LBL_IMPORT' => '導入',
    'LBL_IMPORT_STARTED' => '已開始導入:',
    'LBL_MISSING_CUSTOM_DELIMITER' => '必須指定一個字定義的分隔符。',
    'LBL_LAST_VIEWED' => '最近查看',
    'LBL_SHOW_LESS' => '顯示精簡',
    'LBL_SHOW_MORE' => '顯示更多',
    'LBL_TODAYS_ACTIVITIES' => '今日市場活動',
    'LBL_LEADS'=>'潛在客戶',
    'LBL_LESS' => '少於',
    'LBL_CAMPAIGN' => '市場活動:',
    'LBL_CAMPAIGNS' => '市場活動',
    'LBL_CAMPAIGNLOG' => '市場活動日誌',
    'LBL_CAMPAIGN_CONTACT'=>'市場活動',
    'LBL_CAMPAIGN_ID'=>'市場活動編號',
    'LBL_SITEMAP'=>'站點地圖',
    'LBL_THEME'=>'主題:',
    'LBL_THEME_PICKER'=>'頁面樣式',
    'LBL_THEME_PICKER_IE6COMPAT_CHECK' => '警告：所選主題不支持IE6。點擊確定應用所選主題，或者點擊取消選擇其他主題。',
    'LBL_FOUND_IN_RELEASE'=>'在發佈版本中存在',
    'LBL_FIXED_IN_RELEASE'=>'在發佈版本中已修改',
    'LBL_LIST_ACCOUNT_NAME' => '客戶名稱',
    'LBL_LIST_ASSIGNED_USER' => '用戶',
    'LBL_LIST_CONTACT_NAME' => '聯繫人姓名',
    'LBL_LIST_CONTACT_ROLE' => '聯繫人角色',
    'LBL_LIST_DATE_ENTERED'=>'創建日期',
    'LBL_LIST_EMAIL' => '電子郵件',
    'LBL_LIST_NAME' => '名稱',
    'LBL_LIST_OF' => '的',
    'LBL_LIST_PHONE' => '電話',
    'LBL_LIST_RELATED_TO' => '相關',
    'LBL_LIST_USER_NAME' => '用戶名',
    'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => '您確定您要更新整個列表?',
    'LBL_LISTVIEW_NO_SELECTED' => '請選擇至少1條記錄進行操作。',
    'LBL_LISTVIEW_TWO_REQUIRED' => '請選擇至少2條記錄進行操作。',
    'LBL_LISTVIEW_LESS_THAN_TEN_SELECT' => '請選擇10條以下的記錄來執行操作.',
    'LBL_LISTVIEW_ALL' => '全部',
    'LBL_LISTVIEW_NONE' => '無',
    'LBL_LISTVIEW_OPTION_CURRENT' => '當前頁',
    'LBL_LISTVIEW_OPTION_ENTIRE' => '整個列表',
    'LBL_LISTVIEW_OPTION_SELECTED' => '已選擇的記錄',
    'LBL_LISTVIEW_SELECTED_OBJECTS' => '已選擇',

    'LBL_LOCALE_NAME_EXAMPLE_FIRST' => '大衛',
    'LBL_LOCALE_NAME_EXAMPLE_LAST' => '李文斯頓',
    'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => '博士',
    'LBL_LOCALE_NAME_EXAMPLE_TITLE' => 'Code Monkey Extraordinaire',
    'LBL_LOGIN_TO_ACCESS' => '請登錄以訪問這個區域.',
    'LBL_LOGOUT' => '註銷',
    'LBL_PROFILE' => '帳號',
    'LBL_MAILMERGE_KEY' => 'M',
    'LBL_MAILMERGE' => '郵件合併',
    'LBL_MASS_UPDATE' => '批量更新',
    'LBL_NO_MASS_UPDATE_FIELDS_AVAILABLE' => '沒有支持批量操作的欄位',
    'LBL_OPT_OUT_FLAG_PRIMARY' => '主郵箱添加剔除標記',
    'LBL_MEETINGS'=>'會議',
    'LBL_MEETING'=>'會議',
    'LBL_MEETING_GO_BACK'=>'返回會議',
    'LBL_MEMBERS'=>'成員',
    'LBL_MEMBER_OF'=>'屬於',
    'LBL_MODIFIED_BY_USER'=>'修改人',
    'LBL_MODIFIED_USER'=>'修改用戶',
    'LBL_MODIFIED' => '修改人',
    'LBL_MODIFIED_NAME'=>'修改者',
    'LBL_MODIFIED_ID'=>'修改人編號',
    'LBL_MORE' => '更多',
    'LBL_MY_ACCOUNT' => '我的帳戶',
    'LBL_NAME' => '名稱',
    'LBL_NEW_BUTTON_KEY' => 'N',
    'LBL_NEW_BUTTON_LABEL' => '新增',
    'LBL_NEW_BUTTON_TITLE' => '新增[Alt+N]',
    'LBL_NEXT_BUTTON_LABEL' => '下一步',
    'LBL_NONE' => '--無--',
    'LBL_NOTES'=>'備忘錄',
    'LBL_OPENALL_BUTTON_KEY' => 'O',
    'LBL_OPENALL_BUTTON_LABEL' => '全部開放',
    'LBL_OPENALL_BUTTON_TITLE' => '全部開放[Alt+O]',
    'LBL_OPENTO_BUTTON_KEY' => 'T',
    'LBL_OPENTO_BUTTON_LABEL' => '開放到:',
    'LBL_OPENTO_BUTTON_TITLE' => '開放到:[Alt+T]',
    'LBL_OPPORTUNITIES'=>'商業機會',
    'LBL_OPPORTUNITY_NAME' => '商業機會名稱',
    'LBL_OPPORTUNITY'=>'商業機會',
    'LBL_OR' => '或者',
    'LBL_LOWER_OR' => '或',
    'LBL_PANEL_OVERVIEW' => '客戶信息',
    'LBL_PANEL_ASSIGNMENT' => '其它',
    'LBL_PANEL_ADVANCED' => '更多信息',
    'LBL_PARENT_TYPE' => '父類型',
    'LBL_PERCENTAGE_SYMBOL' => '%',
    'LBL_PHASE' => '階段',
    'LBL_POSTAL_CODE' => '郵政編碼:',
    'LBL_PRIMARY_ADDRESS_CITY' => '主要地址城市:',
    'LBL_PRIMARY_ADDRESS_COUNTRY' => '主要地址國家:',
    'LBL_PRIMARY_ADDRESS_POSTALCODE' => '主要地址郵政編碼:',
    'LBL_PRIMARY_ADDRESS_STATE' => '主要地址洲:',
    'LBL_PRIMARY_ADDRESS_STREET_2' => '主要地址街道 2:',
    'LBL_PRIMARY_ADDRESS_STREET_3' => '主要地址街道 3:',
    'LBL_PRIMARY_ADDRESS_STREET' => '主要地址街道:',
    'LBL_PRIMARY_ADDRESS' => '主要地址:',

	'LBL_BILLING_STREET'=> '街道:',
	'LBL_SHIPPING_STREET'=> '街道:',

    'LBL_PROSPECTS'=>'Prospects',
    'LBL_PRODUCT_BUNDLES'=>'產品包',
    'LBL_PRODUCTS'=>'產品',
    'LBL_PROJECT_TASKS'=>'項目任務',
    'LBL_PROJECTS'=>'項目',
    'LBL_QUOTE_TO_OPPORTUNITY_KEY' => 'O',
    'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => '根據報價創建商業機會',
    'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => '根據報價創建商業機會[Alt+O]',
    'LBL_QUOTES_SHIP_TO'=>'運往',
    'LBL_QUOTES'=>'報價',

    'LBL_RELATED' => '關聯',
    'LBL_RELATED_INFORMATION' => '相關信息',
    'LBL_RELATED_RECORDS' => '相關記錄',
    'LBL_REMOVE' => '移除',
    'LBL_REPORTS_TO' => '報告給',
    'LBL_REQUIRED_SYMBOL' => '*',
    'LBL_REQUIRED_TITLE' => '必填欄位提示',
    'LBL_EMAIL_DONE_BUTTON_LABEL' => '完成',
    'LBL_SAVE_AS_BUTTON_KEY' => 'A',
    'LBL_SAVE_AS_BUTTON_LABEL' => '另存為',
    'LBL_SAVE_AS_BUTTON_TITLE' => '另存為',
    'LBL_FULL_FORM_BUTTON_KEY' => 'F',
    'LBL_FULL_FORM_BUTTON_LABEL' => '完全式',
    'LBL_FULL_FORM_BUTTON_TITLE' => '完全式',
    'LBL_SAVE_NEW_BUTTON_KEY' => 'V',
    'LBL_SAVE_NEW_BUTTON_LABEL' => '保存並且新增',
    'LBL_SAVE_NEW_BUTTON_TITLE' => '保存並且新增[Alt+V]',
    'LBL_SAVE_OBJECT' => '保存 {0}',
    'LBL_SEARCH_BUTTON_KEY' => 'C',
    'LBL_SEARCH_BUTTON_LABEL' => '查找',
    'LBL_SEARCH_BUTTON_TITLE' => '查找[Alt+Q]',
    'LBL_SEARCH' => '查找',
    'LBL_SEARCH_TIPS' => "單擊搜索按鈕或按回車鍵，進行精確匹配。",
    'LBL_SEARCH_TIPS_2' => "單擊搜索按鈕或按回車鍵，進行精確匹配",
    'LBL_SEARCH_MORE' => '更多',
    'LBL_SEE_ALL' => '查看所有',
    'LBL_UPLOAD_IMAGE_FILE_INVALID' => '文件格式無效，只能上傳圖片文件。',
    'LBL_SELECT_BUTTON_KEY' => 'T',
    'LBL_SELECT_BUTTON_LABEL' => '選擇',
    'LBL_SELECT_BUTTON_TITLE' => '選擇[Alt+T]',
    'LBL_SELECT_TEAMS_KEY' => 'Z',
    'LBL_SELECT_TEAMS_LABEL' => '添加團隊',
    'LBL_SELECT_TEAMS_TITLE' => '添加團隊[Alt+Z]',
    'LBL_BROWSE_DOCUMENTS_BUTTON_KEY' => 'B',
    'LBL_BROWSE_DOCUMENTS_BUTTON_LABEL' => '瀏覽文檔',
    'LBL_BROWSE_DOCUMENTS_BUTTON_TITLE' => '瀏覽文檔 [Alt+B]',
    'LBL_SELECT_CONTACT_BUTTON_KEY' => 'T',
    'LBL_SELECT_CONTACT_BUTTON_LABEL' => '選擇聯繫人',
    'LBL_SELECT_CONTACT_BUTTON_TITLE' => '選擇聯繫人[Alt+T]',
    'LBL_GRID_SELECTED_FILE' => '選擇的文件',
    'LBL_GRID_SELECTED_FILES' => '已選擇的文件',
    'LBL_SELECT_REPORTS_BUTTON_LABEL' => '從報表中選擇',
    'LBL_SELECT_REPORTS_BUTTON_TITLE' => '選擇報表',
    'LBL_SELECT_USER_BUTTON_KEY' => 'U',
    'LBL_SELECT_USER_BUTTON_LABEL' => '選擇用戶',
    'LBL_SELECT_USER_BUTTON_TITLE' => '選擇用戶[Alt+U]',
    // Clear buttons take up too many keys, lets default the relate and collection ones to be empty
    'LBL_ACCESSKEY_CLEAR_RELATE_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_RELATE_TITLE' => '清除選擇',
    'LBL_ACCESSKEY_CLEAR_RELATE_LABEL' => '清除選擇',
    'LBL_ACCESSKEY_CLEAR_COLLECTION_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_COLLECTION_TITLE' => '清除選擇',
    'LBL_ACCESSKEY_CLEAR_COLLECTION_LABEL' => '清除選擇',
    'LBL_ACCESSKEY_SELECT_FILE_KEY' => 'F',
    'LBL_ACCESSKEY_SELECT_FILE_TITLE' => '選擇文件',
    'LBL_ACCESSKEY_SELECT_FILE_LABEL' => '選擇文件',
    'LBL_ACCESSKEY_CLEAR_FILE_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_FILE_TITLE' => '清除文件',
    'LBL_ACCESSKEY_CLEAR_FILE_LABEL' => '清除文件',


    'LBL_ACCESSKEY_SELECT_USERS_KEY' => 'U',
    'LBL_ACCESSKEY_SELECT_USERS_TITLE' => '選擇用戶',
    'LBL_ACCESSKEY_SELECT_USERS_LABEL' => '選擇用戶',
    'LBL_ACCESSKEY_CLEAR_USERS_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_USERS_TITLE' => '清除用戶',
    'LBL_ACCESSKEY_CLEAR_USERS_LABEL' => '清除用戶',
    'LBL_ACCESSKEY_SELECT_ACCOUNTS_KEY' => 'A',
    'LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE' => '選擇客戶',
    'LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL' => '選擇客戶',
    'LBL_ACCESSKEY_CLEAR_ACCOUNTS_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE' => '清除客戶',
    'LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL' => '清除客戶',
    'LBL_ACCESSKEY_SELECT_CAMPAIGNS_KEY' => 'M',
    'LBL_ACCESSKEY_SELECT_CAMPAIGNS_TITLE' => '選擇市場活動',
    'LBL_ACCESSKEY_SELECT_CAMPAIGNS_LABEL' => '選擇市場活動',
    'LBL_ACCESSKEY_CLEAR_CAMPAIGNS_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_CAMPAIGNS_TITLE' => '清除市場活動',
    'LBL_ACCESSKEY_CLEAR_CAMPAIGNS_LABEL' => '清除市場活動',
    'LBL_ACCESSKEY_SELECT_CONTACTS_KEY' => 'C',
    'LBL_ACCESSKEY_SELECT_CONTACTS_TITLE' => '選擇聯繫人',
    'LBL_ACCESSKEY_SELECT_CONTACTS_LABEL' => '選擇聯繫人',
    'LBL_ACCESSKEY_CLEAR_CONTACTS_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE' => '清除聯繫人',
    'LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL' => '清除聯繫人',
    'LBL_ACCESSKEY_SELECT_TEAMSET_KEY' => 'Z',
    'LBL_ACCESSKEY_SELECT_TEAMSET_TITLE' => '選擇團隊',
    'LBL_ACCESSKEY_SELECT_TEAMSET_LABEL' => '選擇團隊',
    'LBL_ACCESSKEY_CLEAR_TEAMS_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_TEAMS_TITLE' => '清除團隊',
    'LBL_ACCESSKEY_CLEAR_TEAMS_LABEL' => '清除團隊',
    'LBL_SERVER_RESPONSE_RESOURCES' => '創建這個頁面的資源(查詢，文件)',
    'LBL_SERVER_RESPONSE_TIME_SECONDS' => '秒。',
    'LBL_SERVER_RESPONSE_TIME' => '伺服器響應時間:',
    'LBL_SERVER_MEMORY_BYTES' => '位元組',
    'LBL_SERVER_MEMORY_USAGE' => '伺服器內存使用: {0} ({1})',
    'LBL_SERVER_MEMORY_LOG_MESSAGE' => '使用: - 模塊: {0} - 行動: {1}',
    'LBL_SERVER_PEAK_MEMORY_USAGE' => '伺服器峰值內存使用: {0} ({1})',
    'LBL_SHIP_TO_ACCOUNT'=>'收貨客戶',
    'LBL_SHIP_TO_CONTACT'=>'收貨聯繫人',
    'LBL_SHIPPING_ADDRESS'=>'裝運地址',
    'LBL_SHORTCUTS' => '快捷方式',
    'LBL_SHOW'=>'顯示',
    'LBL_SQS_INDICATOR' => '',
    'LBL_STATE' => '洲:',
    'LBL_STATUS_UPDATED'=>'對於這個事件，您的狀態已更新！',
    'LBL_STATUS'=>'狀態:',
    'LBL_STREET'=>'街道',
    'LBL_SUBJECT' => '主題',

    'LBL_INBOUNDEMAIL_ID' => '接收電子郵件ID',

    /* The following version of LBL_SUGAR_COPYRIGHT is intended for Sugar Open Source only. */

    'LBL_SUGAR_COPYRIGHT' => '&copy; 2004-2009 <a href="http://www.sugarcrm.com" target="_blank" class="copyRightLink">SugarCRM Inc.</a> 保留所有權利.',



    // The following version of LBL_SUGAR_COPYRIGHT is for Professional and Enterprise editions.

    'LBL_SUGAR_COPYRIGHT_SUB' => '&copy; 2004-2011 <a href="http://www.sugarcrm.com" target="_blank" class="copyRightLink">SugarCRM Inc.</a> All Rights Reserved.<br />SugarCRM is a trademark of SugarCRM, Inc. All other company and product names may be trademarks of the respective companies with which they are associated.',


    'LBL_SYNC' => '同步',
    'LBL_TABGROUP_ALL' => '所有',
    'LBL_TABGROUP_ACTIVITIES' => '活動',
    'LBL_TABGROUP_COLLABORATION' => '協作',
    'LBL_TABGROUP_HOME' => '首頁',
    'LBL_TABGROUP_MARKETING' => '市場',
    'LBL_TABGROUP_MY_PORTALS' => '我的網站',
    'LBL_TABGROUP_OTHER' => '其它',
    'LBL_TABGROUP_REPORTS' => '報表',
    'LBL_TABGROUP_SALES' => '銷售',
    'LBL_TABGROUP_SUPPORT' => '服務',
    'LBL_TABGROUP_TOOLS' => '工具',
    'LBL_TASKS'=>'任務',
    'LBL_TEAMS_LINK'=>'團隊',
    'LBL_THEME_COLOR'=>'顏色',
    'LBL_THEME_FONT'=>'字體',
    'LBL_THOUSANDS_SYMBOL' => 'K',
    'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
    'LBL_TRACK_EMAIL_BUTTON_LABEL' => '存檔電子郵件',
    'LBL_TRACK_EMAIL_BUTTON_TITLE' => '存檔電子郵件[Alt+K]',
    'LBL_UNAUTH_ADMIN' => '沒有管理許可權',
    'LBL_UNDELETE_BUTTON_LABEL' => '不刪除',
    'LBL_UNDELETE_BUTTON_TITLE' => '不刪除',
    'LBL_UNDELETE_BUTTON' => '不刪除',
    'LBL_UNDELETE' => '不刪除',
    'LBL_UNSYNC' => '不同步',
    'LBL_UPDATE' => '更新',
    'LBL_USER_LIST' => '用戶列表',
    'LBL_USERS_SYNC'=>'用戶同步',
    'LBL_USERS'=>'用戶',
    'LBL_VERIFY_EMAIL_ADDRESS'=>'查看是否存在新郵件...',
    'LBL_VERIFY_PORTAL_NAME'=>'查看存在的門戶名稱...',
    'LBL_VIEW_IMAGE' => '查看',
    'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
    'LBL_VIEW_PDF_BUTTON_LABEL' => '以PDF格式列印',
    'LBL_VIEW_PDF_BUTTON_TITLE' => '以PDF格式列印[Alt+P]',


    'LNK_ABOUT' => '關於',
    'LNK_ADVANCED_SEARCH' => '高級查找',
    'LNK_BASIC_SEARCH' => '基本查找',
    'LNK_SEARCH_FTS_VIEW_ALL' => '查看所有結果',
    'LNK_SEARCH_NONFTS_VIEW_ALL' => '顯示所有',
    'LNK_CLOSE' => '關閉',
    'LBL_MODIFY_CURRENT_SEARCH'=> '修改當前查詢',
    'LNK_SAVED_VIEWS' => '保存查找和佈局',
    'LNK_DELETE_ALL' => '刪除所有記錄',
    'LNK_DELETE' => '刪除',
    'LNK_EDIT' => '編輯',
    'LNK_GET_LATEST'=>'獲取最新的',
    'LNK_GET_LATEST_TOOLTIP'=>'用最新版本替換',
    'LNK_HELP' => '幫助',
    'LNK_CREATE' => '創建',
    'LNK_LIST_END' => '末頁',
    'LNK_LIST_NEXT' => '下頁',
    'LNK_LIST_PREVIOUS' => '上頁',
    'LNK_LIST_RETURN' => '返回列表',
    'LNK_LIST_START' => '首頁',
    'LNK_LOAD_SIGNED'=>'簽署',
    'LNK_LOAD_SIGNED_TOOLTIP'=>'用簽署文件代替',
    'LNK_PRINT' => '列印',
    'LNK_BACKTOTOP' => '返回頂端',
    'LNK_REMOVE' => '移除',
    'LNK_RESUME' => '重試',
    'LNK_VIEW_CHANGE_LOG' => '查看更改日誌',


    'NTC_CLICK_BACK' => '請按瀏覽器的“返回”按鈕返回，並糾正錯誤。',
    'NTC_DATE_FORMAT' => '(yyyy-mm-dd)',
    'NTC_DATE_TIME_FORMAT' => '(yyyy-mm-dd 24:00)',
    'NTC_DELETE_CONFIRMATION_MULTIPLE' => '確定要刪除所選擇的記錄嗎?',
    'NTC_TEMPLATE_IS_USED' => '這個模板至少被1個營銷活動所使用。你確定要刪除它嗎？',
    'NTC_TEMPLATES_IS_USED' => '下列模板在營銷活動中被使用。你確定要刪除它們嗎？\n',
    'NTC_DELETE_CONFIRMATION' => '您確定要刪除這條記錄?',
    'NTC_DELETE_CONFIRMATION_NUM' => '您確定要刪除 ',
    'NTC_UPDATE_CONFIRMATION_NUM' => '您確定要更新 ',
    'NTC_DELETE_SELECTED_RECORDS' =>' 選擇記錄?',
    'NTC_LOGIN_MESSAGE' => '請輸入用戶名和密碼。',
    'NTC_NO_ITEMS_DISPLAY' => '無',
    'NTC_REMOVE_CONFIRMATION' => '您確定要移除這個關係嗎?',
    'NTC_REQUIRED' => '表示必填欄位',
    'NTC_TIME_FORMAT' => '(24:00)',
    'NTC_WELCOME' => '歡迎',
    'NTC_YEAR_FORMAT' => '(yyyy)',
    'LOGIN_LOGO_ERROR'=> 'Please replace the SuiteCRM logos.',
    'WARN_ONLY_ADMINS'=> "只有管理員才可以登錄。",
    'WARN_UNSAVED_CHANGES'=> "當前記錄已修改，離開當前界面，修改數據將丟失。您確定要離開當前界面嗎？",
    'ERROR_NO_RECORD' => '檢索記錄出錯。這條記錄可能已被刪除，或者您可能沒有許可權查看它。',
    'WARN_BROWSER_VERSION_WARNING' => "<b>Warning:</b> Your browser version is no longer supported or you are using an unsupported browser.<p></p>The following browser versions are recommended:<p></p><ul><li>Internet Explorer 10 (compatibility view not supported)<li>Firefox 32.0<li>Safari 5.1<li>Chrome 37</ul>",
    'WARN_BROWSER_IE_COMPATIBILITY_MODE_WARNING' => "<b>Warning:</b> Your browser is in IE compatibility view which is not supported.",
    'ERROR_TYPE_NOT_VALID' => '錯誤. 無效的類型.',
    'ERROR_NO_BEAN' => 'Failed to get bean.', 
    'LBL_DUP_MERGE'=>'查找重覆記錄',
    'LBL_MANAGE_SUBSCRIPTIONS'=>'管理訂閱',
    'LBL_MANAGE_SUBSCRIPTIONS_FOR'=>'管理訂閱為',
    'LBL_SUBSCRIBE'=>'訂閱',
    'LBL_UNSUBSCRIBE'=>'不訂閱',
    // Ajax status strings
    'LBL_LOADING' => '載入中...',
    'LBL_SEARCHING' => '查找...',
    'LBL_SAVING_LAYOUT' => '佈局保存中...',
    'LBL_SAVED_LAYOUT' => '佈局已被保存。',
    'LBL_SAVED' => '已保存',
    'LBL_SAVING' => '保存中',
    'LBL_FAILED' => '失敗！',
    'LBL_DISPLAY_COLUMNS' => '顯示列',
    'LBL_HIDE_COLUMNS' => '隱藏列',
    'LBL_SEARCH_CRITERIA' => '查找標準',
    'LBL_SAVED_VIEWS' => '已保存的視圖',
    'LBL_PROCESSING_REQUEST'=>'處理中...',
    'LBL_REQUEST_PROCESSED'=>'完成',
    'LBL_AJAX_FAILURE' => 'Ajax調用失敗',
    'LBL_MERGE_DUPLICATES'  => '合併重覆',
    'LBL_SAVED_SEARCH_SHORTCUT' => '已保存的查詢結果',
    'LBL_SEARCH_POPULATE_ONLY'=> '用上面的查找表單進行查找',
    'LBL_DETAILVIEW'=>'詳情視圖',
    'LBL_LISTVIEW'=>'列表視圖',
    'LBL_EDITVIEW'=>'編輯視圖',
    'LBL_SEARCHFORM'=>'查找表單',
    'LBL_SAVED_SEARCH_ERROR' => '請為這個視圖提供一個名稱。',
    'LBL_DISPLAY_LOG' => '顯示日誌',
    'ERROR_JS_ALERT_SYSTEM_CLASS' => '系統',
    'ERROR_JS_ALERT_TIMEOUT_TITLE' => '會話過期',
    'ERROR_JS_ALERT_TIMEOUT_MSG_1' => '您的會話將在2分鐘後過期。請保存您的工作。',
    'ERROR_JS_ALERT_TIMEOUT_MSG_2' =>'您的會話已經過期。',
    'MSG_JS_ALERT_MTG_REMINDER_AGENDA' => "\n議題:",
    'MSG_JS_ALERT_MTG_REMINDER_MEETING' => '會議',
    'MSG_JS_ALERT_MTG_REMINDER_CALL' => '電話',
    'MSG_JS_ALERT_MTG_REMINDER_TIME' => '時間:',
    'MSG_JS_ALERT_MTG_REMINDER_LOC' => '地點:',
    'MSG_JS_ALERT_MTG_REMINDER_DESC' => '說明:',
    'MSG_JS_ALERT_MTG_REMINDER_STATUS' => '狀態:',
    'MSG_JS_ALERT_MTG_REMINDER_RELATED_TO' => 'Related To: ',
    'MSG_JS_ALERT_MTG_REMINDER_CALL_MSG' => "
	點擊確定查看呼叫,或者點擊取消放棄查看.",
  	'MSG_JS_ALERT_MTG_REMINDER_MEETING_MSG' => "
	點擊確定查看會議,或者點擊取消放棄查看.",
	'MSG_JS_ALERT_MTG_REMINDER_NO_EVENT_NAME' => 'Event',
	'MSG_JS_ALERT_MTG_REMINDER_NO_DESCRIPTION' => 'Event isn\'t set.',
	'MSG_JS_ALERT_MTG_REMINDER_NO_LOCATION' => 'Location isn\'t set.',
	'MSG_JS_ALERT_MTG_REMINDER_NO_START_DATE' => 'Start date isn\'t defined.',
 	'MSG_LIST_VIEW_NO_RESULTS_BASIC' => "找不到任何結果。",
	'MSG_LIST_VIEW_NO_RESULTS' => "找不到任何結果： <item1>",
 	'MSG_LIST_VIEW_NO_RESULTS_SUBMSG' => "創建 <item1> 作為一個新的 <item2>",
	'MSG_EMPTY_LIST_VIEW_NO_RESULTS' => "你現在還沒有保存任何記錄。 現在保存 <item2> 或 <item3> 。",
	'MSG_EMPTY_LIST_VIEW_NO_RESULTS_SUBMSG' =>	"<item4> 瞭解更多的模塊 <item1> 的信息. 使用主導航上的用戶下拉菜單獲取幫助。",

    'LBL_CLICK_HERE' => "點擊這裡",
    // contextMenu strings
    'LBL_ADD_TO_FAVORITES' => '增加到我的收藏夾',
    'LBL_MARK_AS_FAVORITES' => '標記為收藏',
    'LBL_CREATE_CONTACT' => '新增聯繫人',
    'LBL_CREATE_CASE' => '新增客戶反饋',
    'LBL_CREATE_NOTE' => '新增備忘錄',
    'LBL_CREATE_OPPORTUNITY' => '新增商業機會',
    'LBL_SCHEDULE_CALL' => '安排電話',
    'LBL_SCHEDULE_MEETING' => '安排會議',
    'LBL_CREATE_TASK' => '新增任務',
    'LBL_REMOVE_FROM_FAVORITES' => '從我的收藏夾中移除',
    //web to lead
    'LBL_GENERATE_WEB_TO_LEAD_FORM' => '產生表單',
    'LBL_SAVE_WEB_TO_LEAD_FORM' =>'保存潛在用戶表單的網頁',

    'LBL_PLEASE_SELECT' => '請選擇',
    'LBL_REDIRECT_URL'=>'轉載網址',
    'LBL_RELATED_CAMPAIGN' =>'相關的市場活動',
    'LBL_ADD_ALL_LEAD_FIELDS' => '增加所有的欄位',
    'LBL_REMOVE_ALL_LEAD_FIELDS' => '移除所有的欄位',
    'LBL_ONLY_IMAGE_ATTACHMENT' => '只有圖片類型的附件才可以被嵌入',
    'LBL_TRAINING' => '培訓',
    'ERR_DATABASE_CONN_DROPPED'=>'執行查詢出現錯誤。很可能是資料庫未被連接上。請刷新當前頁，您可能需要重新啟動網路服務。',
    'ERR_MSSQL_DB_CONTEXT' =>'修改資料庫文本',
  'ERR_MSSQL_WARNING' =>'警告:',

    //Meta-Data framework
    'ERR_MISSING_VARDEF_NAME' => '警告: 欄位 [[field]] 不能有一個映射入口在 [moduleDir] vardefs.php 文件',
    'ERR_CANNOT_CREATE_METADATA_FILE' => '錯誤: 文件 [[file]] 丟失. 不能創建因為沒有對應的 HTML 文件可以找到.',
  'ERR_CANNOT_FIND_MODULE' => '錯誤: Module [module] 不存在.',
  'LBL_ALT_ADDRESS' => '其他地址:',
    'ERR_SMARTY_UNEQUAL_RELATED_FIELD_PARAMETERS' => '錯誤: 有一些不相等若乾論據關於 \'key\' 和 \'copy\' 元素在顯示參數的數組中.',
    'ERR_SMARTY_MISSING_DISPLAY_PARAMS' => '在顯示參數數組丟失索引關於: ',

    /* MySugar Framework (for Home and Dashboard) */
    'LBL_DASHLET_CONFIGURE_GENERAL' => '整體',
    'LBL_DASHLET_CONFIGURE_FILTERS' => '過濾器',
    'LBL_DASHLET_CONFIGURE_MY_ITEMS_ONLY' => '僅我的條目',
    'LBL_DASHLET_CONFIGURE_TITLE' => '標題',
    'LBL_DASHLET_CONFIGURE_DISPLAY_ROWS' => '顯示行',

    // MySugar status strings
    'LBL_CREATING_NEW_PAGE' => '創建新頁 ...',
    'LBL_NEW_PAGE_FEEDBACK' => 'You have created a new page. You may add new content with the Add Dashlets menu option.',
    'LBL_DELETE_PAGE_CONFIRM' => '您確定您要刪除本頁嗎?',
    'LBL_SAVING_PAGE_TITLE' => '保存頁標題 ...',
    'LBL_RETRIEVING_PAGE' => '恢復頁面 ...',
    'LBL_MAX_DASHLETS_REACHED' => 'You have reached the maximum number of SuiteCRM Dashlets your adminstrator has set. Please remove a SuiteCRM Dashlet to add more.',
    'LBL_ADDING_DASHLET' => 'Adding SuiteCRM Dashlet ...',
    'LBL_ADDED_DASHLET' => 'SuiteCRM Dashlet Added',
    'LBL_REMOVE_DASHLET_CONFIRM' => 'Are you sure you want to remove this SuiteCRM Dashlet?',
    'LBL_REMOVING_DASHLET' => 'Removing SuiteCRM Dashlet ...',
    'LBL_REMOVED_DASHLET' => 'SuiteCRM Dashlet Removed',

    // MySugar Menu Options
    'LBL_ADD_PAGE' => '添加頁',
    'LBL_DELETE_PAGE' => '刪除頁',
    'LBL_CHANGE_LAYOUT' => '改變佈局',
    'LBL_RENAME_PAGE' => '重命名佈局',

    'LBL_LOADING_PAGE' => '載入頁面, 請等待...',

    'LBL_RELOAD_PAGE' => 'Please <a href="javascript: window.location.reload()">reload the window</a> to use this SuiteCRM Dashlet.',
    'LBL_ADD_DASHLETS' => '添加新增欄',
    'LBL_CLOSE_DASHLETS' => '關閉',
    'LBL_OPTIONS' => '選項',
    'LBL_NUMBER_OF_COLUMNS' => '點擊一個圖表來選擇列的編號',
    'LBL_1_COLUMN' => '1 列',
    'LBL_2_COLUMN' => '2 列',
    'LBL_3_COLUMN' => '3 列',
    'LBL_PAGE_NAME' => '頁名稱',

    'LBL_SEARCH_RESULTS' => '查找結果',
    'LBL_SEARCH_MODULES' => '模塊',
    'LBL_SEARCH_CHARTS' => '圖表',
    'LBL_SEARCH_REPORT_CHARTS' => '報表圖表',
    'LBL_SEARCH_TOOLS' => '工具',
    'LBL_SEARCH_HELP_TITLE' => '多項選擇和保存查找條件',
    'LBL_SEARCH_HELP_CLOSE_TOOLTIP' => '關閉',
    'LBL_SEARCH_RESULTS_FOUND' => '搜索結果',
    'LBL_SEARCH_RESULTS_TIME' => 'ms.',
    'ERR_BLANK_PAGE_NAME' => '請輸入一個頁名稱.',
    /* End MySugar Framework strings */

    'LBL_NO_IMAGE' => '無圖象',

    'LBL_MODULE' => '模塊',

    //adding a label for address copy from left
    'LBL_COPY_ADDRESS_FROM_LEFT' => '從左側複製地址:',
    'LBL_SAVE_AND_CONTINUE' => '保存並繼續',

    'LBL_SEARCH_HELP_TEXT' => '<p><br /><strong>多項選擇控制</strong></p><ul><li>點擊一個值選擇一個屬性.</li><li>Ctrl-點擊&nbsp;來&nbsp;選擇多個. Mac用戶使用 CMD-點擊.</li><li>在兩個屬性中來選擇所有值,&nbsp; 點擊第一個值&nbsp;之後shift-點擊最後一個值.</li></ul><p><strong>高級查找 & 佈局選項</strong><br><br>使用 <b>保存查找 & 佈局</b> 選項, 您可以保存一組查找參數和/或一個客戶化列表顯示界面為了快速獲得將來想要得到的查找結果. 您能保存一個不受限數目的客戶化查找和佈局. 所有保存的查找以名稱的形式出現在保存的查找列表中, 與上次載入保存的查找出現在列表頂部.<br><br>客戶化訂製列表顯示佈局, 使用隱藏列框來選擇哪個欄位顯示在查找結果中. 例如, 您可以顯示或隱藏細節如記錄名稱和負責用戶,負責團隊在查找結果中. 添加一列來顯示列, 在隱藏列表中選擇欄位並使用左邊箭頭符號來移動它顯示的列表. 從列表顯示中移動一列, 從顯示的列表中選擇它並用右箭頭符號移動它到隱藏列中.<br><br>如果您保存佈局設置, 您將能夠載入它們在任何時間來顯示查找結果在客戶佈局中.<br><br>保存和更新一個查找和/或佈局:<ol><li>輸入一個名稱為查找結果在 <b>保存這個查找為</b> 欄位並點擊 <b>保存</b>.當前名稱顯示在保存的查找列表鄰近<b>清除</b> 按鈕.</li><li>查看保存查找, 選擇它從保存的查找列表中. 查找結果顯示在列表顯示中.</li><li>更新保存的查找屬性, 在列表中選擇保存的查找, 輸入新查找規則
      和/或佈局懸想在高級查找區域, 並點擊 <b>更新</b> 鄰近 <b>修改當前查找</b>.</li><li>刪除一個保存的查找, 選擇它在保存的查找列表中, 點擊 <b>刪除</b> 鄰近於 <b>修改當前查找</b>, 並之後點擊 <b>確定</b> 來確認刪除.</li></ol>' ,

    //resource management
    'ERR_QUERY_LIMIT' => 'Error:達到 $module module 查詢上限 $limit.',
    'ERROR_NOTIFY_OVERRIDE' => '錯誤: ResourceObserver->notify() 需要被重寫.',

    //tracker labels
    'ERR_MONITOR_FILE_MISSING' => '錯誤: 無法創建監視器，因為metedata文件為空或者不存在',
    'ERR_MONITOR_NOT_CONFIGURED' => '錯誤: 不存在為被請求的名字配置的監視器',
    'ERR_UNDEFINED_METRIC' => '錯誤: 不能為未定義量設置值',
    'ERR_STORE_FILE_MISSING' => '錯誤: 不能找到實現存儲的文件',

    'LBL_MONITOR_ID' => '監視器編號',
    'LBL_USER_ID' => '用戶編號',
    'LBL_MODULE_NAME' => '模塊名稱',
    'LBL_ITEM_ID' => '項目編號',
    'LBL_ITEM_SUMMARY' => '項目彙總',
    'LBL_ACTION' => '操作',
    'LBL_SESSION_ID' => 'Session編號',
    'LBL_BREADCRUMBSTACK_CREATED' => 'BreadCrumbStack created for user id {0}',
    'LBL_VISIBLE' => '記錄可見',
    'LBL_DATE_LAST_ACTION' => '上次操作日期',





    //jc:#12287 - For javascript validation messages
    'MSG_IS_NOT_BEFORE' => '必須早於',
  'MSG_IS_MORE_THAN' => '大於',
  'MSG_IS_LESS_THAN' => '小於',
  'MSG_SHOULD_BE' => '應該是',
  'MSG_OR_GREATER' => '或者大於',

    'LBL_PORTAL_WELCOME_TITLE' => 'Welcome to SuiteCRM Portal',
    'LBL_PORTAL_WELCOME_INFO' => 'SuiteCRM Portal is a framework which provides real-time view of cases, bugs & newsletters etc to customers. This is an external facing interface to SuiteCRM that can be deployed within any website.',
    'LBL_LIST' => '列表',
    'LBL_CREATE_BUG' => '創建缺陷追蹤',
    'LBL_NO_RECORDS_FOUND' => '- 0 條記錄被找到 -',

    'DATA_TYPE_DUE' => '到期:',
    'DATA_TYPE_START' => '開始:',
    'DATA_TYPE_SENT' => '已發送:',
    'DATA_TYPE_MODIFIED' => '已修改:',


    //jchi at 608/06/2008 10913am china time for the bug 12253.
    'LBL_REPORT_NEWREPORT_COLUMNS_TAB_COUNT' => '合計',
    //jchi #19433
    'LBL_OBJECT_IMAGE' => '圖形',
    //jchi #12300
    'LBL_MASSUPDATE_DATE' => '請選擇日期',

    'LBL_VALIDATE_RANGE' => '不在有效範圍之內',
    'LBL_CHOOSE_START_AND_END_DATES' => 'Please choose both a starting and ending date range',
    'LBL_CHOOSE_START_AND_END_ENTRIES' => 'Please choose both starting and ending range entries',

    //jchi #  20776
    'LBL_DROPDOWN_LIST_ALL' => '所有',

    'LBL_OPERATOR_IN_TEXT' => '屬於:',
    'LBL_OPERATOR_NOT_IN_TEXT' => '不屬於:',


  //Connector
    'ERR_CONNECTOR_FILL_BEANS_SIZE_MISMATCH' => '錯誤: Bean參數的數組個數和結果數組的個數不相符。',
  'ERR_MISSING_MAPPING_ENTRY_FORM_MODULE' => '錯誤：模塊映射入口不存在。',
  'ERROR_UNABLE_TO_RETRIEVE_DATA' => '錯誤：連接器不能獲得數據。',
  'LBL_MERGE_CONNECTORS' => '獲取數據',
  'LBL_MERGE_CONNECTORS_BUTTON_KEY' => '[D]',
  'LBL_REMOVE_MODULE_ENTRY' => '你確定要對這個模塊停用連接器嗎？',

    // fastcgi checks
    'LBL_FASTCGI_LOGGING'      => 'For optimal experience using IIS/FastCGI sapi, set fastcgi.logging to 0 in your php.ini file.',

    //cma
    'LBL_MASSUPDATE_DELETE_GLOBAL_TEAM'=> '對不起，你不能刪除全局團隊. 異常退出。',
    'LBL_MASSUPDATE_DELETE_USER_EXISTS'=>'這個私有組 [{0}] 不能被刪除, 除非用戶 [{1}] 也被刪除.',

    //martin #25548
    'LBL_NO_FLASH_PLAYER' => '請先安裝或者打開已經安裝的Flash. <a href="http://www.adobe.com/go/getflashplayer/">點擊獲得最新的Flash播放器</a>.',
  //Collection Field
  'LBL_COLLECTION_NAME' => '名稱',
  'LBL_COLLECTION_PRIMARY' => '主要團隊',
  'ERROR_MISSING_COLLECTION_SELECTION' => '必填欄位',
    'LBL_COLLECTION_EXACT' => '確切團隊',

    //MB -Fixed Bug #32812 -Max
    'LBL_ASSIGNED_TO_NAME' => '指派給',
    'LBL_DESCRIPTION' => '描述',

  'LBL_YESTERDAY'=> '昨天',
  'LBL_TODAY'=>'今天',
  'LBL_TOMORROW'=>'明天',
  'LBL_NEXT_WEEK'=> '下一周',
  'LBL_NEXT_MONDAY'=>'下周一',
  'LBL_NEXT_FRIDAY'=>'下周五',
  'LBL_TWO_WEEKS'=> '兩周',
  'LBL_NEXT_MONTH'=> '下個月',
  'LBL_FIRST_DAY_OF_NEXT_MONTH'=> '下個月第一天',
  'LBL_THREE_MONTHS'=> '三個月',
  'LBL_SIXMONTHS'=> '兩個月',
  'LBL_NEXT_YEAR'=> '明年',
    'LBL_FILTERED' => '過濾掉',

    //Datetimecombo fields
    'LBL_HOURS' => '小時',
    'LBL_MINUTES' => '分鐘',
    'LBL_MERIDIEM' => '正午',
    'LBL_DATE' => '日期',
    'LBL_DASHLET_CONFIGURE_AUTOREFRESH' => '自動刷新',

    'LBL_DURATION_DAY' => '天',
    'LBL_DURATION_HOUR' => '小時',
    'LBL_DURATION_MINUTE' => '分鐘',
    'LBL_DURATION_DAYS' => '天',
    'LBL_DURATION_HOURS' => '小時',
    'LBL_DURATION_MINUTES' => '分鐘',

    //Calendar widget labels
    'LBL_CHOOSE_MONTH' => '選擇月份',
    'LBL_ENTER_YEAR' => '輸入年',
    'LBL_ENTER_VALID_YEAR' => '請輸入一個有效的年份',

    //SugarFieldPhone labels
    'LBL_INVALID_USA_PHONE_FORMAT' => 'Please enter a numeric U.S. phone number, including area code.',

    //File write error label
    'ERR_FILE_WRITE' => '錯誤: 無法寫入文件 {0}. 請檢查伺服器配置.',
  'ERR_FILE_NOT_FOUND' => '錯誤: 無法載入文件 {0}. 請檢查伺服器配置.',

    'LBL_AND' => '和',
    'LBL_BEFORE' => '之前',

    // File fields
    'LBL_UPLOAD_FROM_COMPUTER' => '從您的電腦上傳',
    'LBL_SEARCH_EXTERNAL_API' => '文件在外部源',
    'LBL_EXTERNAL_SECURITY_LEVEL' => '安全',
    'LBL_SHARE_PRIVATE' => '私有',
    'LBL_SHARE_COMPANY' => '公司',
    'LBL_SHARE_LINKABLE' => '可連接',
    'LBL_SHARE_PUBLIC' => '公共',


    // Web Services REST RSS
    'LBL_RSS_FEED' => 'RSS Feed',
    'LBL_RSS_RECORDS_FOUND' => '記錄被找到',
    'ERR_RSS_INVALID_INPUT' => 'RSS is not a valid input_type',
    'ERR_RSS_INVALID_RESPONSE' => 'RSS is not a valid response_type for this method',

    //External API Error Messages
    'ERR_GOOGLE_API_415' => 'Google Docs does not support the file format you provided.',

    'LBL_EMPTY' => '空',
    'LBL_IS_EMPTY' => '空',
    'LBL_IS_NOT_EMPTY' => '非空',
    //IMPORT SAMPLE TEXT
    'LBL_IMPORT_SAMPLE_FILE_TEXT' => '
"This is a sample import file which provides an example of the expected contents of a file that is ready for import."
"The file is a comma-delimited .csv file, using double-quotes as the field qualifier."

"The header row is the top-most row in the file and contains the field labels as you would see them in the application."
"These labels are used for mapping the data in the file to the fields in the application."

"Notes: The database names could also be used in the header row. This is useful when you are using phpMyAdmin or another database tool to provide an exported list of data to import."
"The column order is not critical as the import process matches the data to the appropriate fields based on the header row."


"To use this file as a template, do the following:"
"1. Remove the sample rows of data"
"2. Remove the help text that you are reading right now"
"3. Input your own data into the appropriate rows and columns"
"4. Save the file to a known location on your system"
"5. Click on the Import option from the Actions menu in the application and choose the file to upload"
   ',
    //define labels to be used for overriding local values during import/export
    'LBL_EXPORT_ASSIGNED_USER_ID' => '負責人ID',
    'LBL_EXPORT_ASSIGNED_USER_NAME' => '負責人姓名',
    'LBL_EXPORT_REPORTS_TO_ID' => '彙報人ID',
    'LBL_EXPORT_FULL_NAME' => '全名',
    'LBL_EXPORT_TEAM_ID' => '組ID',
    'LBL_EXPORT_TEAM_NAME' => '組名稱',
    'LBL_EXPORT_TEAM_SET_ID' => '組集合ID',

    'LBL_QUICKEDIT_NODEFS_NAVIGATION'=> '導航... ',

    'LBL_PENDING_NOTIFICATIONS' => '通知',
    'LBL_NOTIFICATIONS_NONE' => 'No Current Notifications',
    'LBL_ALT_ADD_TEAM_ROW' => '添加新行',
    'LBL_ALT_REMOVE_TEAM_ROW' => '刪除組',
    'LBL_ALT_SPOT_SEARCH' => '熱點搜索',
    'LBL_ALT_SORT_DESC' => '降序',
    'LBL_ALT_SORT_ASC' => '升序',
    'LBL_ALT_SORT' => '排序',
    'LBL_ALT_SHOW_OPTIONS' => '顯示選項',
    'LBL_ALT_HIDE_OPTIONS' => '隱藏選項',
    'LBL_ALT_MOVE_COLUMN_LEFT' => '把選中的記錄移動到左側列表',
    'LBL_ALT_MOVE_COLUMN_RIGHT' => '把選中的記錄移動到右側列表',
    'LBL_ALT_MOVE_COLUMN_UP' =>'把選中的記錄靠前顯示',
    'LBL_ALT_MOVE_COLUMN_DOWN' => '把選中的記錄靠後顯示',
    'LBL_ALT_INFO' => '信息',
	'MSG_DUPLICATE' => '將要創建的記錄 {0} ，可能跟已有記錄 {0} 重覆。記錄 {1} 含有相同的名字，如下所示。<br>點擊創建 {1} 來創建一個新的 {0}, 或者從下麵列表選擇一個已存在的 {0} 。',
    'MSG_SHOW_DUPLICATES' => '將要創建的記錄 {0} ，可能跟已有記錄 {0} 重覆。 {1} 含有相同的名字，如下所示。 點擊保存將創建一個新的 {0} ，或者點擊取消返回模塊{0}，不創建新紀錄。',
    'LBL_EMAIL_TITLE' => 'Email地址',
    'LBL_EMAIL_OPT_TITLE' => '選出Email地址',
    'LBL_EMAIL_INV_TITLE' => '無效的Email地址',
    'LBL_EMAIL_PRIM_TITLE' => '主Email地址',
    'LBL_SELECT_ALL_TITLE' => '全選',
    'LBL_SELECT_THIS_ROW_TITLE' => '選擇該行',
    'LBL_TEAM_SELECTED_TITLE' => '選中組 ',
    'LBL_TEAM_SELECT_AS_PRIM_TITLE' => '選擇主組',

    //for upload errors
    'UPLOAD_ERROR_TEXT'          => '錯誤: 上傳時發生錯誤。 錯誤編號{0} - {1}',
    'UPLOAD_ERROR_TEXT_SIZEINFO' => '錯誤: 上傳時發生錯誤。 錯誤編號{0} - {1}. 最大上傳大小： {2} ',
    'UPLOAD_ERROR_HOME_TEXT'     => '錯誤: 上傳時發生錯誤，請聯繫管理員解決。',
    'UPLOAD_MAXIMUM_EXCEEDED'    => '上傳大小 ({0} bytes) 超出了最大限制: {1} bytes',
    'UPLOAD_REQUEST_ERROR'    => 'An error has occured. Please refresh your page and try again.',


    //508 used Access Keys
    'LBL_EDIT_BUTTON_KEY' => 'E',
    'LBL_EDIT_BUTTON_LABEL' => '編輯',
    'LBL_EDIT_BUTTON_TITLE' => '編輯[Alt+E]',
    'LBL_DUPLICATE_BUTTON_KEY' => 'U',
    'LBL_DUPLICATE_BUTTON_LABEL' => '複製',
    'LBL_DUPLICATE_BUTTON_TITLE' => '複製[Alt+U]',
    'LBL_DELETE_BUTTON_KEY' => 'D',
    'LBL_DELETE_BUTTON_LABEL' => '刪除',
    'LBL_DELETE_BUTTON_TITLE' => '刪除[Alt+D]',
    'LBL_SAVE_BUTTON_KEY' => 'S',
    'LBL_SAVE_BUTTON_LABEL' => '保存',
    'LBL_SAVE_BUTTON_TITLE' => '保存[Alt+S]',
    'LBL_CANCEL_BUTTON_KEY' => 'X',
    'LBL_CANCEL_BUTTON_LABEL' => '取消',
    'LBL_CANCEL_BUTTON_TITLE' => '取消[Alt+X]',
    'LBL_FIRST_INPUT_EDIT_VIEW_KEY' => '7',
    'LBL_ADV_SEARCH_LNK_KEY' => '8',
    'LBL_FIRST_INPUT_SEARCH_KEY' => '9',
    'LBL_GLOBAL_SEARCH_LNK_KEY' => '0',
    'LBL_KEYBOARD_SHORTCUTS_HELP_TITLE' => '鍵盤快捷鍵',
    'LBL_KEYBOARD_SHORTCUTS_HELP' => '<p><strong>表單功能 - Alt+</strong><br/> I = 編輯<b>I</b> (詳細視圖)<br/> U = 複製<b>U</b> (詳細視圖)<br/> D = 刪除<b>D</b> (詳細視圖)<br/> A = 保存<b>A</b> (編輯視圖)<br/> L = 取消<b>L</b> (編輯視圖) <br/><br/></p><p><strong>搜索和導航  - Alt+</strong><br/> 7 = 編輯表單上的第一個欄位<br/> 8 = 高級搜索鏈接<br/> 9 = 搜索表單上的第一個欄位<br/> 0 = 全局搜索<br></p>' ,

    'ERR_CONNECTOR_NOT_ARRAY' => '連接器中的 {0} 配置不正確，無法使用。',
    'ERR_SUHOSIN' => 'Upload stream is blocked by Suhosin, please add &quot;upload&quot; to suhosin.executor.include.whitelist (See suitecrm.log for more information)',
    'ERR_BAD_RESPONSE_FROM_SERVER' => 'Bad response from the server',
    'LBL_ACCOUNT_PRODUCT_QUOTE_LINK' => '引用',
    'LBL_ACCOUNT_PRODUCT_SALE_PRICE' => 'Sale Price',
    'LBL_EMAIL_CHECK_INTERVAL_DOM'          => array(
        '-1' => '手動',
        '5' => '每5分鐘',
        '15' => 'Every 15 minutes',
        '30' => 'Every 30 minutes',
        '60' => 'Every hour',
    ),

    'ERR_A_REMINDER_IS_EMPTY_OR_INCORRECT' => 'A reminder is empty or incorrect.',
    'ERR_REMINDER_IS_NOT_SET_POPUP_OR_EMAIL' => 'Reminder is not set for either a popup or email.',
    'ERR_NO_INVITEES_FOR_REMINDER' => 'No invitees for reminder.'

    );

$app_list_strings['moduleList']['Library'] = '圖書館';
$app_list_strings['library_type'] = array('Books'=>'書籍', 'Music'=>'音樂', 'DVD'=>'DVD', 'Magazines'=>'雜誌');
$app_list_strings['moduleList']['EmailAddresses'] = '郵件地址';
$app_list_strings['project_priority_default'] = '中';
$app_list_strings['project_priority_options'] = array (
    'High' => '高',
    'Medium' => '中',
    'Low' => '低',
);

$app_list_strings['kbdocument_status_dom'] = array (
    'Draft' => '草稿',
    'Expired' => '有效期',
    'In Review' => '審查中',
    'Published' => '發佈',
  );

   $app_list_strings['kbadmin_actions_dom'] =
    array (
    ''          => '無',
    'Create New Tag' => '創建新標簽',
    'Delete Tag'=>'刪除標簽',
    'Rename Tag'=>'重命名標簽',
    'Move Selected Articles'=>'移動選擇的文章',
    'Apply Tags On Articles'=>'為文章應用標簽',
    'Delete Selected Articles'=>'刪除選擇的文章',
  );


  $app_list_strings['kbdocument_attachment_option_dom'] =
    array(
        ''=>'',
        'some' => '有附件',
        'none' => '無',
        'mime' => '說明Mime類型',
        'name' => '說明姓名',
    );

  $app_list_strings['moduleList']['KBDocuments'] = '基礎知識';
  $app_strings['LBL_CREATE_KB_DOCUMENT'] = 'Create Article';
  $app_list_strings['kbdocument_viewing_frequency_dom'] =
  array(
    ''=>'',
    'Top_5'  => '前 5',
    'Top_10' => '前 10',
    'Top_20' => '前 20',
    'Bot_5'  => '後 5',
    'Bot_10' => '後 10',
    'Bot_20' => '後 20',
  );

   $app_list_strings['kbdocument_canned_search'] =
    array(
        'all'=>'所有相關的',
        'added' => '加上前30天',
        'pending' => '等待中',
        'updated' =>'更新前30天',
        'faqs' => 'FAQs',
    );
    $app_list_strings['kbdocument_date_filter_options'] =
        array(
    '' => '',
    'on' => '在',
    'before' => '之前',
    'after' => '之後',
    'between_dates' => '是否在之間',
    'last_7_days' => '過去7天',
    'next_7_days' => '未來7天',
    'last_month' => '上個月',
    'this_month' => '這個月',
    'next_month' => '下個月',
    'last_30_days' => '過去30天',
    'next_30_days' => '未來30天',
    'last_year' => '去年',
    'this_year' => '今年',
    'next_year' => '明年',
    'isnull' => '是否空',
        );

    $app_list_strings['countries_dom'] = array(
        '' => '',
        'ABU DHABI' => '阿布扎比',
        'ADEN' => '亞丁',
        'AFGHANISTAN' => '阿富汗伊斯蘭共和國',
        'ALBANIA' => '阿爾巴尼亞',
        'ALGERIA' => '阿爾及利亞',
        'AMERICAN SAMOA' => '美屬薩摩亞',
        'ANDORRA' => '安道爾',
        'ANGOLA' => '安哥拉',
        'ANTARCTICA' => '南極洲',
        'ANTIGUA' => '安提瓜',
        'ARGENTINA' => '阿根廷',
        'ARMENIA' => '亞美尼亞',
        'ARUBA' => '阿魯巴',
        'AUSTRALIA' => '澳大利亞',
        'AUSTRIA' => '奧地利',
        'AZERBAIJAN' => '亞塞拜然',
        'BAHAMAS' => '巴哈馬',
        'BAHRAIN' => '巴林',
        'BANGLADESH' => '孟加拉',
        'BARBADOS' => '巴貝多',
        'BELARUS' => '白俄羅斯',
        'BELGIUM' => '比利時',
        'BELIZE' => '伯里茲',
        'BENIN' => '貝南',
        'BERMUDA' => '百幕達',
        'BHUTAN' => '不丹',
        'BOLIVIA' => '玻利維亞',
        'BOSNIA' => '波斯尼亞',
        'BOTSWANA' => '波札那',
        'BOUVET ISLAND' => '布維島',
        'BRAZIL' => '巴西',
        'BRITISH ANTARCTICA TERRITORY' => '英國南極洲領土',
        'BRITISH INDIAN OCEAN TERRITORY' => '英屬印度洋領地',
        'BRITISH VIRGIN ISLANDS' => '英屬維爾京群島',
        'BRITISH WEST INDIES' => '英屬西印度群島',
        'BRUNEI' => '汶萊',
        'BULGARIA' => '保加利亞',
        'BURKINA FASO' => '布吉納法索',
        'BURUNDI' => '蒲隆地',
        'CAMBODIA' => '柬埔寨',
        'CAMEROON' => '喀麥隆',
        'CANADA' => '加拿大',
        'CANAL ZONE' => '運河區',
        'CANARY ISLAND' => '迦納利島',
        'CAPE VERDI ISLANDS' => '哥連臣角威爾第群島',
        'CAYMAN ISLANDS' => '開曼群島',
        'CEVLON' => 'CEVLON',
        'CHAD' => '查德',
        'CHANNEL ISLAND UK' => '頻道島屋',
        'CHILE' => '智力',
        'CHINA' => '中國',
        'CHRISTMAS ISLAND' => '聖誕島',
        'COCOS (KEELING) ISLAND' => '科科斯（基林）島',
        'COLOMBIA' => '哥倫比亞',
        'COMORO ISLANDS' => '葛摩群島',
        'CONGO' => '剛果',
        'CONGO KINSHASA' => '剛果金沙薩',
        'COOK ISLANDS' => '庫克群島',
        'COSTA RICA' => '哥斯大黎加',
        'CROATIA' => '克羅埃西亞',
        'CUBA' => '古巴',
        'CURACAO' => '庫拉索',
        'CYPRUS' => '塞普勒斯',
        'CZECH REPUBLIC' => '捷克共和國',
        'DAHOMEY' => '達荷美',
        'DENMARK' => '丹麥',
        'DJIBOUTI' => '吉布地',
        'DOMINICA' => '多米尼亞',
        'DOMINICAN REPUBLIC' => '多明尼加共和國',
        'DUBAI' => '迪拜',
        'ECUADOR' => '厄瓜多',
        'EGYPT' => '埃及',
        'EL SALVADOR' => '薩爾瓦多',
        'EQUATORIAL GUINEA' => '赤道幾內亞',
        'ESTONIA' => '愛沙尼亞',
        'ETHIOPIA' => '衣索比亞',
        'FAEROE ISLANDS' => '法羅群島',
        'FALKLAND ISLANDS' => '福克蘭群島',
        'FIJI' => '斐濟',
        'FINLAND' => '芬蘭',
        'FRANCE' => '法國',
        'FRENCH GUIANA' => '法屬蓋亞那',
        'FRENCH POLYNESIA' => '法屬玻利尼西亞',
        'GABON' => '加彭',
        'GAMBIA' => '甘比亞',
        'GEORGIA' => '喬治亞',
        'GERMANY' => '德國',
        'GHANA' => '迦納',
        'GIBRALTAR' => '直布羅陀',
        'GREECE' => '希臘',
        'GREENLAND' => '格林蘭',
        'GUADELOUPE' => '哥德洛普',
        'GUAM' => '關島',
        'GUATEMALA' => '瓜地馬拉',
        'GUINEA' => '幾內亞',
        'GUYANA' => '蓋亞那',
        'HAITI' => '海地',
        'HONDURAS' => '宏都拉斯',
        'HONG KONG' => '香港',
        'HUNGARY' => '匈牙利',
        'ICELAND' => '冰島',
        'IFNI' => '伊夫尼',
        'INDIA' => '印度',
        'INDONESIA' => '印度尼西亞',
        'IRAN' => '伊朗',
        'IRAQ' => '伊拉克',
        'IRELAND' => '愛爾蘭',
        'ISRAEL' => '以色列',
        'ITALY' => '義大利',
        'IVORY COAST' => '象牙海岸',
        'JAMAICA' => '牙買加',
        'JAPAN' => '日本',
        'JORDAN' => '約旦',
        'KAZAKHSTAN' => '哈薩克',
        'KENYA' => '肯亞',
        'KOREA' => '韓國',
        'KOREA, SOUTH' => '南朝鮮',
        'KUWAIT' => '科威特',
        'KYRGYZSTAN' => '吉爾吉斯斯坦',
        'LAOS' => '寮國',
        'LATVIA' => '拉托維亞',
        'LEBANON' => '黎巴嫩',
        'LEEWARD ISLANDS' => '背風群島',
        'LESOTHO' => '賴索托',
        'LIBYA' => '利比亞',
        'LIECHTENSTEIN' => '列支敦斯登',
        'LITHUANIA' => '立陶宛',
        'LUXEMBOURG' => '盧森堡',
        'MACAO' => '澳門',
        'MACEDONIA' => '馬其頓',
        'MADAGASCAR' => '馬達加斯加',
        'MALAWI' => '馬拉維',
        'MALAYSIA' => '馬來西亞',
        'MALDIVES' => '馬爾地夫',
        'MALI' => '馬裡',
        'MALTA' => '馬爾他',
        'MARTINIQUE' => '馬提尼克',
        'MAURITANIA' => '茅利塔尼亞',
        'MAURITIUS' => '模里西斯',
        'MELANESIA' => '美拉尼西亞',
        'MEXICO' => '墨西哥',
        'MOLDOVIA' => '摩爾多瓦',
        'MONACO' => '摩納哥',
        'MONGOLIA' => '內蒙古',
        'MOROCCO' => '摩洛哥',
        'MOZAMBIQUE' => '莫三比克',
        'MYANAMAR' => '緬甸',
        'NAMIBIA' => '納米比亞',
        'NEPAL' => '尼泊爾',
        'NETHERLANDS' => '荷蘭共和國',
        'NETHERLANDS ANTILLES' => '荷屬安的列斯群島',
        'NETHERLANDS ANTILLES NEUTRAL ZONE' => '荷屬安的列斯群島中立區',
        'NEW CALADONIA' => '新加多利亞',
        'NEW HEBRIDES' => '新赫布里底',
        'NEW ZEALAND' => '紐西蘭',
        'NICARAGUA' => '尼加拉瓜',
        'NIGER' => '尼日',
        'NIGERIA' => '奈及利亞',
        'NORFOLK ISLAND' => '諾福克島',
        'NORWAY' => '挪威',
        'OMAN' => '阿曼',
        'OTHER' => '其它',
        'PACIFIC ISLAND' => '太平洋島國',
        'PAKISTAN' => '巴基斯坦',
        'PANAMA' => '巴拿馬',
        'PAPUA NEW GUINEA' => '巴布亞紐幾內亞',
        'PARAGUAY' => '巴拉圭',
        'PERU' => '秘魯',
        'PHILIPPINES' => '菲律賓群島',
        'POLAND' => '波蘭',
        'PORTUGAL' => '葡萄牙',
        'PORTUGUESE TIMOR' => 'EAST TIMOR',
        'PUERTO RICO' => '波多黎各',
        'QATAR' => '卡達',
        'REPUBLIC OF BELARUS' => '白俄羅斯共和國',
        'REPUBLIC OF SOUTH AFRICA' => '南非共和國',
        'REUNION' => '留尼汪',
        'ROMANIA' => '羅馬尼亞',
        'RUSSIA' => '前蘇聯',
        'RWANDA' => '盧安達',
        'RYUKYU ISLANDS' => '琉球群島',
        'SABAH' => '沙巴',
        'SAN MARINO' => '聖馬利諾',
        'SAUDI ARABIA' => '沙烏地阿拉伯',
        'SENEGAL' => '塞內加爾',
        'SERBIA' => '塞爾維亞',
        'SEYCHELLES' => '塞舌耳',
        'SIERRA LEONE' => '獅子山',
        'SINGAPORE' => '新加坡',
        'SLOVAKIA' => '斯洛伐克',
        'SLOVENIA' => '斯洛維尼亞',
        'SOMALILIAND' => '索馬利亞蘭',
        'SOUTH AFRICA' => '南非',
        'SOUTH YEMEN' => '南葉門',
        'SPAIN' => '西班牙',
        'SPANISH SAHARA' => '西班牙撒哈拉',
        'SRI LANKA' => '斯裡蘭卡',
        'ST. KITTS AND NEVIS' => '聖.基茨和尼維斯',
        'ST. LUCIA' => '聖.露西婭',
        'SUDAN' => '蘇丹',
        'SURINAM' => '蘇利南',
        'SW AFRICA' => '西南非洲',
        'SWAZILAND' => '史瓦濟蘭',
        'SWEDEN' => '瑞典',
        'SWITZERLAND' => '瑞士',
        'SYRIA' => '敘利亞',
        'TAIWAN' => '臺灣',
        'TAJIKISTAN' => '塔吉克',
        'TANZANIA' => '坦尚尼亞',
        'THAILAND' => '泰國',
        'TONGA' => '湯加',
        'TRINIDAD' => '專案熾暄',
        'TUNISIA' => '突尼西亞',
        'TURKEY' => '土耳其',
        'UGANDA' => '烏乾達',
        'UKRAINE' => '烏克蘭',
        'UNITED ARAB EMIRATES' => '阿拉伯聯合大公國',
        'UNITED KINGDOM' => '聯合王國',
        'UPPER VOLTA' => '  上沃爾特 ',
        'URUGUAY' => '  烏拉圭 ',
        'US PACIFIC ISLAND' => '美軍太平洋島嶼',
        'US VIRGIN ISLANDS' => '美屬維爾京群島',
        'USA' => '美國',
        'UZBEKISTAN' => '烏茲別克',
        'VANUATU' => '  萬那杜 ',
        'VATICAN CITY' => '梵蒂岡城',
        'VENEZUELA' => '委內瑞拉',
        'VIETNAM' => '越南',
        'WAKE ISLAND' => '威克島',
        'WEST INDIES' => '西印度群島',
        'WESTERN SAHARA' => '西撒哈拉',
        'YEMEN' => '葉門',
        'ZAIRE' => '扎伊爾',
        'ZAMBIA' => '尚比亞',
        'ZIMBABWE' => '辛巴威',
    );

  $app_list_strings['charset_dom'] = array(
    'BIG-5'     => 'BIG-5 (臺灣和香港)',
    /*'CP866'     => 'CP866', // ms-dos Cyrillic */
    /*'CP949'     => 'CP949 (Microsoft Korean)', */
    'CP1251'    => 'CP1251 (微軟西里爾)',
    'CP1252'    => 'CP1252 (微軟西歐和美國)',
    'EUC-CN'    => 'EUC-CN (繁體中文GB2312)',
    'EUC-JP'    => 'EUC-JP (Unix日本)',
    'EUC-KR'    => 'EUC-KR (韓國)',
    'EUC-TW'    => 'EUC-TW (臺灣)',
    'ISO-2022-JP' => 'ISO-2022-JP (日本)',
    'ISO-2022-KR' => 'ISO-2022-KR (韓國)',
    'ISO-8859-1'  => 'ISO-8859-1 (西歐和美國)',
    'ISO-8859-2'  => 'ISO-8859-2 (中東歐)',
    'ISO-8859-3'  => 'ISO-8859-3 (拉丁3)',
    'ISO-8859-4'  => 'ISO-8859-4 (拉丁4)',
    'ISO-8859-5'  => 'ISO-8859-5 (西里爾)',
    'ISO-8859-6'  => 'ISO-8859-6 (阿拉伯)',
    'ISO-8859-7'  => 'ISO-8859-7 (希臘)',
    'ISO-8859-8'  => 'ISO-8859-8 (希伯來)',
    'ISO-8859-9'  => 'ISO-8859-9 (拉丁5)',
    'ISO-8859-10' => 'ISO-8859-10 (拉丁6)',
    'ISO-8859-13' => 'ISO-8859-13 (拉丁7)',
    'ISO-8859-14' => 'ISO-8859-14 (拉丁8)',
    'ISO-8859-15' => 'ISO-8859-15 (拉丁9)',
    'KOI8-R'    => 'KOI8-R (西里爾俄羅斯)',
    'KOI8-U'    => 'KOI8-U (西里爾烏克蘭)',
    'SJIS'      => 'SJIS (微軟日本)',
    'UTF-8'     => 'UTF-8',
  );

  $app_list_strings['timezone_dom'] = array(

  'Africa/Algiers' => '非洲/阿爾及爾',
  'Africa/Luanda' => '非洲/羅安達',
  'Africa/Porto-Novo' => '非洲/波多諾伏',
  'Africa/Gaborone' => '非洲/哈博羅內',
  'Africa/Ouagadougou' => '非洲/瓦加杜古',
  'Africa/Bujumbura' => '非洲/布瓊布拉',
  'Africa/Douala' => '非洲/杜阿拉',
  'Atlantic/Cape_Verde' => '大西洋/維德角',
  'Africa/Bangui' => '非洲/班吉',
  'Africa/Ndjamena' => '非洲/恩賈梅納',
  'Indian/Comoro' => '印度洋/葛摩',
  'Africa/Kinshasa' => '非洲/金沙薩',
  'Africa/Lubumbashi' => '非洲/盧本巴希',
  'Africa/Brazzaville' => '非洲/布拉柴維爾',
  'Africa/Abidjan' => '非洲/阿比讓',
  'Africa/Djibouti' => '非洲/吉布地',
  'Africa/Cairo' => '非洲/開羅',
  'Africa/Malabo' => '非洲/馬拉博',
  'Africa/Asmera' => '非洲/阿斯馬拉',
  'Africa/Addis_Ababa' => '非洲/亞的斯亞貝巴',
  'Africa/Libreville' => '非洲/利伯維爾',
  'Africa/Banjul' => '非洲/班珠爾',
  'Africa/Accra' => '非洲/阿克拉',
  'Africa/Conakry' => '非洲/科納克裡',
  'Africa/Bissau' => '非洲/比紹',
  'Africa/Nairobi' => '非洲/內羅畢',
  'Africa/Maseru' => '非洲/馬塞盧',
  'Africa/Monrovia' => '非洲/蒙羅維亞',
  'Africa/Tripoli' => '非洲/的黎波里',
  'Indian/Antananarivo' => '印度洋/塔那那利佛',
  'Africa/Blantyre' => '非洲/布蘭太爾',
  'Africa/Bamako' => '非洲/巴馬科',
  'Africa/Nouakchott' => '非洲/努瓦克肖特',
  'Indian/Mauritius' => '印度洋/模里西斯',
  'Indian/Mayotte' => '印度洋/馬約特',
  'Africa/Casablanca' => '非洲/卡薩布蘭卡',
  'Africa/El_Aaiun' => '非洲/阿尤恩',
  'Africa/Maputo' => '非洲/馬普托',
  'Africa/Windhoek' => '非洲/溫得和克',
  'Africa/Niamey' => '非洲/尼亞美',
  'Africa/Lagos' => '非洲/拉各斯',
  'Indian/Reunion' => '印度洋/留尼汪島',
  'Africa/Kigali' => '非洲/基加利',
  'Atlantic/St_Helena' => '大西洋/聖赫勒拿島',
  'Africa/Sao_Tome' => '非洲/聖多美',
  'Africa/Dakar' => '非洲/達喀爾',
  'Indian/Mahe' => '印度洋/馬埃',
  'Africa/Freetown' => '非洲/弗里敦',
  'Africa/Mogadishu' => '非洲/摩加迪沙',
  'Africa/Johannesburg' => '非洲/約翰內斯堡',
  'Africa/Khartoum' => '非洲/喀土穆',
  'Africa/Mbabane' => '非洲/姆巴巴內',
  'Africa/Dar_es_Salaam' => '非洲/達累斯薩拉姆',
  'Africa/Lome' => '非洲/洛美',
  'Africa/Tunis' => '非洲/突尼西亞',
  'Africa/Kampala' => '非洲/坎帕拉',
  'Africa/Lusaka' => '非洲/盧薩卡',
  'Africa/Harare' => '非洲/哈爾',
  'Antarctica/Casey' => '南極洲/凱西站',
  'Antarctica/Davis' => '南極洲/戴維斯站',
  'Antarctica/Mawson' => '南極洲/莫森站',
  'Indian/Kerguelen' => '印度洋/克爾格倫群島',
  'Antarctica/DumontDUrville' => '南極洲/都蒙特得烏爾維爾站',
  'Antarctica/Syowa' => '南極洲/斯由瓦站',
  'Antarctica/Vostok' => '南極洲/東方站',
  'Antarctica/Rothera' => '南極洲/羅西拉',
  'Antarctica/Palmer' => '南極洲/帕瑪',
  'Antarctica/McMurdo' => '南極洲/麥克默多站',
  'Asia/Kabul' => '亞洲/喀布爾',
  'Asia/Yerevan' => '亞洲/埃里溫',
  'Asia/Baku' => '亞洲/巴庫',
  'Asia/Bahrain' => '亞洲/巴林',
  'Asia/Dhaka' => '亞洲/達卡',
  'Asia/Thimphu' => '亞洲/廷布',
  'Indian/Chagos' => '印度洋/查戈斯群島',
  'Asia/Brunei' => '亞洲/汶萊',
  'Asia/Rangoon' => '亞洲/仰光',
  'Asia/Phnom_Penh' => '亞洲/金邊',
  'Asia/Beijing' => '亞洲/北京',
  'Asia/Harbin' => '亞洲/哈爾濱',
  'Asia/Shanghai' => '亞洲/上海',
  'Asia/Chongqing' => '亞洲/重慶',
  'Asia/Urumqi' => '亞洲/烏魯木齊',
  'Asia/Kashgar' => '亞洲/喀什',
  'Asia/Hong_Kong' => '亞洲/香港',
  'Asia/Taipei' => '亞洲/臺北',
  'Asia/Macau' => '亞洲/澳門',
  'Asia/Nicosia' => '亞洲/尼科西亞',
  'Asia/Tbilisi' => '亞洲/梯比利斯',
  'Asia/Dili' => '亞洲/帝力',
  'Asia/Calcutta' => '亞洲/加爾各答',
  'Asia/Jakarta' => '亞洲/雅加達',
  'Asia/Pontianak' => '亞洲/坤甸',
  'Asia/Makassar' => '亞洲/望加錫',
  'Asia/Jayapura' => '亞洲/查亞普拉',
  'Asia/Tehran' => '亞洲/德黑蘭',
  'Asia/Baghdad' => '亞洲/巴格達',
  'Asia/Jerusalem' => '亞洲/耶路撒冷',
  'Asia/Tokyo' => '亞洲/東京',
  'Asia/Amman' => '亞洲/安曼',
  'Asia/Almaty' => '亞洲/阿拉木圖',
  'Asia/Qyzylorda' => '亞洲/奧爾達',
  'Asia/Aqtobe' => '亞洲/阿克托博',
  'Asia/Aqtau' => '亞洲/阿克陶',
  'Asia/Oral' => '亞洲/烏拉爾',
  'Asia/Bishkek' => '亞洲/比什凱克',
  'Asia/Seoul' => '亞洲/漢城',
  'Asia/Pyongyang' => '亞洲/平壤',
  'Asia/Kuwait' => '亞洲/科威特',
  'Asia/Vientiane' => '亞洲/萬象',
  'Asia/Beirut' => '亞洲/貝魯特',
  'Asia/Kuala_Lumpur' => '亞洲/吉隆坡',
  'Asia/Kuching' => '亞洲/古晉',
  'Indian/Maldives' => '印度洋/馬爾地夫',
  'Asia/Hovd' => '亞洲/霍伏得',
  'Asia/Ulaanbaatar' => '亞洲/烏蘭巴托',
  'Asia/Choibalsan' => '亞洲/喬巴山',
  'Asia/Katmandu' => '亞洲/加德滿都',
  'Asia/Muscat' => '亞洲/馬斯喀特',
  'Asia/Karachi' => '亞洲/卡拉奇',
  'Asia/Gaza' => '亞洲/加沙',
  'Asia/Manila' => '亞洲/馬尼拉',
  'Asia/Qatar' => '亞洲/卡達',
  'Asia/Riyadh' => '亞洲/利雅得',
  'Asia/Singapore' => '亞洲/新加坡',
  'Asia/Colombo' => '亞洲/科倫坡',
  'Asia/Damascus' => '亞洲/大馬士革',
  'Asia/Dushanbe' => '亞洲/杜尚別',
  'Asia/Bangkok' => '亞洲/曼谷',
  'Asia/Ashgabat' => '亞洲/阿什哈巴德',
  'Asia/Dubai' => '亞洲/迪拜',
  'Asia/Samarkand' => '亞洲/撒馬爾罕',
  'Asia/Tashkent' => '亞洲/塔什乾',
  'Asia/Saigon' => '亞洲/西貢',
  'Asia/Aden' => '亞洲/亞丁',
  'Australia/Darwin' => '澳大利亞/達爾文',
  'Australia/Perth' => '澳大利亞/佩思',
  'Australia/Brisbane' => '澳大利亞/布裡斯班',
  'Australia/Lindeman' => '澳大利亞/林德曼島',
  'Australia/Adelaide' => '澳大利亞/阿得雷德',
  'Australia/Hobart' => '澳大利亞/霍巴特',
  'Australia/Currie' => '澳大利亞/柯里',
  'Australia/Melbourne' => '澳大利亞/墨爾本',
  'Australia/Sydney' => '澳大利亞/悉尼',
  'Australia/Broken_Hill' => '澳大利亞/斷山',
  'Indian/Christmas' => '印度洋/聖誕島',
  'Pacific/Rarotonga' => '太平洋/拉羅湯加島',
  'Indian/Cocos' => '印度洋/可可斯島',
  'Pacific/Fiji' => '太平洋/斐濟',
  'Pacific/Gambier' => '太平洋/甘比亞島',
  'Pacific/Marquesas' => '太平洋/馬爾薩斯群島',
  'Pacific/Tahiti' => '太平洋/塔希提島',
  'Pacific/Guam' => '太平洋/關島',
  'Pacific/Tarawa' => '太平洋/塔拉瓦島',
  'Pacific/Enderbury' => '太平洋/恩的伯利',
  'Pacific/Kiritimati' => '太平洋/基里提馬蒂',
  'Pacific/Saipan' => '太平洋/塞班島',
  'Pacific/Majuro' => '太平洋/馬朱羅',
  'Pacific/Kwajalein' => '太平洋/卡瓦加蘭',
  'Pacific/Truk' => '太平洋/特魯克群島',
  'Pacific/Pohnpei' => 'Pacific/Pohnpei',
  'Pacific/Kosrae' => '太平洋/庫賽埃',
  'Pacific/Nauru' => '太平洋/諾魯',
  'Pacific/Noumea' => '太平洋/努美阿',
  'Pacific/Auckland' => '太平洋/奧克蘭',
  'Pacific/Chatham' => '太平洋/查塔姆',
  'Pacific/Niue' => '太平洋/扭埃',
  'Pacific/Norfolk' => '太平洋/諾福克',
  'Pacific/Palau' => '太平洋/帛琉',
  'Pacific/Port_Moresby' => '太平洋/莫爾茲比港',
  'Pacific/Pitcairn' => '太平洋/皮特克恩島',
  'Pacific/Pago_Pago' => '太平洋/帕果帕果',
  'Pacific/Apia' => '太平洋/阿批亞',
  'Pacific/Guadalcanal' => '太平洋/瓜達爾卡納爾島',
  'Pacific/Fakaofo' => '太平洋/法考福',
  'Pacific/Tongatapu' => '太平洋/湯加塔埔',
  'Pacific/Funafuti' => '太平洋/富納富提',
  'Pacific/Johnston' => '太平洋/約翰斯頓島',
  'Pacific/Midway' => '太平洋/中途島',
  'Pacific/Wake' => '太平洋/威克島',
  'Pacific/Efate' => '太平洋/埃法特',
  'Pacific/Wallis' => '太平洋/瓦利斯島',
  'Europe/London' => '歐洲/倫敦',
  'Europe/Dublin' => '歐洲/都伯林',
  'WET' => '西部歐洲時間',
  'CET' => '中部歐洲時間',
  'MET' => '中部歐洲時間',
  'EET' => '歐洲東部時間',
  'Europe/Tirane' => '歐洲/地拉那',
  'Europe/Andorra' => '歐洲/安道爾',
  'Europe/Vienna' => '歐洲/維也納',
  'Europe/Minsk' => '歐洲/明斯克',
  'Europe/Brussels' => '歐洲/布魯塞爾',
  'Europe/Sofia' => '歐洲/索非亞',
  'Europe/Prague' => '歐洲/布拉格',
  'Europe/Copenhagen' => '歐洲/哥本哈根',
  'Atlantic/Faeroe' => '大西洋/法羅群島',
  'America/Danmarkshavn' => '美洲/格陵蘭東北城市',
  'America/Scoresbysund' => '美洲/斯格裡斯比桑得',
  'America/Godthab' => '美洲/戈德霍普',
  'America/Thule' => '美洲/圖列',
  'Europe/Tallinn' => '歐洲/塔林',
  'Europe/Helsinki' => '歐洲/赫爾辛基',
  'Europe/Paris' => '歐洲/巴黎',
  'Europe/Berlin' => '歐洲/伯林',
  'Europe/Gibraltar' => '歐洲/直布羅陀',
  'Europe/Athens' => '歐洲/雅典',
  'Europe/Budapest' => '歐洲/佈達佩斯',
  'Atlantic/Reykjavik' => '大西洋/雷克雅未克',
  'Europe/Rome' => '歐洲/羅馬',
  'Europe/Riga' => '歐洲/裡加',
  'Europe/Vaduz' => '歐洲/瓦杜茲',
  'Europe/Vilnius' => '歐洲/維爾紐斯',
  'Europe/Luxembourg' => '歐洲/盧森堡',
  'Europe/Malta' => '歐洲/馬爾他',
  'Europe/Chisinau' => '歐洲/基希訥烏',
  'Europe/Monaco' => '歐洲/摩納哥',
  'Europe/Amsterdam' => '歐洲/阿姆斯特丹',
  'Europe/Oslo' => '歐洲/奧斯陸',
  'Europe/Warsaw' => '歐洲/華沙',
  'Europe/Lisbon' => '歐洲/裡斯本',
  'Atlantic/Azores' => '大西洋/亞速爾',
  'Atlantic/Madeira' => '大西洋/馬德拉群島',
  'Europe/Bucharest' => '歐洲/布加勒斯特',
  'Europe/Kaliningrad' => '歐洲/加裡寧格勒',
  'Europe/Moscow' => '歐洲/莫斯科',
  'Europe/Samara' => '歐洲/薩馬拉',
  'Asia/Yekaterinburg' => '亞洲/葉卡捷琳堡',
  'Asia/Omsk' => '亞洲/鄂木斯克',
  'Asia/Novosibirsk' => '亞洲/諾夫哥羅德',
  'Asia/Krasnoyarsk' => '亞洲/克拉斯諾亞爾斯克',
  'Asia/Irkutsk' => '亞洲/伊爾庫茨克',
  'Asia/Yakutsk' => '亞洲/雅庫次克',
  'Asia/Vladivostok' => '亞洲/符拉迪沃斯托克',
  'Asia/Sakhalin' => '亞洲/薩哈林',
  'Asia/Magadan' => '亞洲/瑪格丹',
  'Asia/Kamchatka' => '亞洲/勘察加',
  'Asia/Anadyr' => '亞洲/阿納德爾',
  'Europe/Belgrade' => '歐洲/貝爾格萊德' ,
  'Europe/Madrid' =>'歐洲/馬德里' ,
  'Africa/Ceuta' => '非洲/休達',
  'Atlantic/Canary' => '大西洋/加那利',
  'Europe/Stockholm' => '歐洲/斯德哥爾摩',
  'Europe/Zurich' => '歐洲/蘇黎世' ,
  'Europe/Istanbul' => '歐洲/伊斯坦布爾',
  'Europe/Kiev' => '歐洲/基輔',
  'Europe/Uzhgorod' => '歐洲/烏茲哥羅德',
  'Europe/Zaporozhye' => '歐洲/扎波羅熱',
  'Europe/Simferopol' => '歐洲/辛菲羅波爾',
  'America/New_York' => '美洲/紐約',
  'America/Chicago' =>'美洲/芝加哥' ,
  'America/North_Dakota/Center' => '美洲/北達科達州/中部',
  'America/Denver' => '美洲/丹佛',
  'America/Los_Angeles' => '美洲/洛杉磯',
  'America/Juneau' => '美洲/朱諾',
  'America/Yakutat' => '美洲/亞庫塔特',
  'America/Anchorage' => '美洲/安科雷齊',
  'America/Nome' =>'美洲/諾姆' ,
  'America/Adak' => '美洲/埃達克',
  'Pacific/Honolulu' => '太平洋/火奴魯魯',
  'America/Phoenix' => '美洲/菲尼克斯',
  'America/Boise' => '美洲/博伊西',
  'America/Indiana/Indianapolis' => '美洲/印第安那/印第安納波利斯',
  'America/Indiana/Marengo' => '美洲/印第安那/馬倫哥',
  'America/Indiana/Knox' =>  '美洲/印第安那/諾克斯',
  'America/Indiana/Vevay' => '美洲/印第安那/瓦維',
  'America/Kentucky/Louisville' =>'美洲/肯塔基/路易斯維爾'  ,
  'America/Kentucky/Monticello' =>  '美洲/肯塔基/蒙帝塞羅' ,
  'America/Detroit' => '美洲/底特律',
  'America/Menominee' => '美洲/梅諾米尼',
  'America/St_Johns' => '美洲/聖約翰',
  'America/Goose_Bay' => '美洲/古斯貝' ,
  'America/Halifax' => '美洲/哈利法克斯',
  'America/Glace_Bay' =>'美洲/格雷斯灣' ,
  'America/Montreal' => '美洲/蒙特利爾',
  'America/Toronto' => '美洲/多倫多',
  'America/Thunder_Bay' => '美洲/桑德貝' ,
  'America/Nipigon' => '美洲/尼皮岡',
  'America/Rainy_River' => '美洲/多雨河',
  'America/Winnipeg' => '美洲/溫尼伯',
  'America/Regina' => '美洲/里迦納',
  'America/Swift_Current' => '美洲/斯威福特卡潤特',
  'America/Edmonton' =>  '美洲/埃德蒙頓',
  'America/Vancouver' => '美洲/溫哥華',
  'America/Dawson_Creek' => '美洲/道森溪',
  'America/Pangnirtung' => '美洲/潘尼爾頓'  ,
  'America/Iqaluit' => '美洲/伊魁特' ,
  'America/Coral_Harbour' => '美洲/珊瑚港' ,
  'America/Rankin_Inlet' => '美洲/',
  'America/Cambridge_Bay' => '美洲/劍橋灣',
  'America/Yellowknife' => '美洲/黃刀鎮',
  'America/Inuvik' =>'美洲/伊努維克' ,
  'America/Whitehorse' => '美洲/白馬' ,
  'America/Dawson' => '美洲/道森',
  'America/Cancun' => '美洲/坎昆',
  'America/Merida' => '美洲/梅里達',
  'America/Monterrey' => '美洲/蒙特雷',
  'America/Mexico_City' => '美洲/墨西哥城',
  'America/Chihuahua' => '美洲/奇瓦瓦',
  'America/Hermosillo' => '美洲/埃爾莫西略',
  'America/Mazatlan' => '美洲/馬薩特蘭',
  'America/Tijuana' => '美洲/蒂華納',
  'America/Anguilla' => '美洲/安圭拉',
  'America/Antigua' => '美洲/安提瓜島',
  'America/Nassau' =>'美洲/拿騷' ,
  'America/Barbados' => '美洲/巴貝多',
  'America/Belize' => '美洲/貝裡斯',
  'Atlantic/Bermuda' => '大西洋/百慕大',
  'America/Cayman' => '美洲/開曼',
  'America/Costa_Rica' => '美洲/哥斯大黎加',
  'America/Havana' => '美洲/哈瓦那',
  'America/Dominica' => '美洲/多明尼加',
  'America/Santo_Domingo' => '美洲/聖多明各',
  'America/El_Salvador' => '美洲/薩爾瓦多',
  'America/Grenada' => '美洲/格瑞那達',
  'America/Guadeloupe' => '美洲/瓜德羅普島',
  'America/Guatemala' => '美洲/瓜地馬拉',
  'America/Port-au-Prince' => '美洲/太子港',
  'America/Tegucigalpa' => '美洲/特古西加爾巴',
  'America/Jamaica' => '美洲/牙買加',
  'America/Martinique' => '美洲/馬提尼克島',
  'America/Montserrat' => '美洲/蒙特塞拉特',
  'America/Managua' => '美洲/馬那瓜',
  'America/Panama' => '美洲/巴拿馬',
  'America/Puerto_Rico' =>'美洲/波多黎各' ,
  'America/St_Kitts' => '美洲/聖基茨',
  'America/St_Lucia' => '美洲/聖露西亞',
  'America/Miquelon' => '美洲/密克隆',
  'America/St_Vincent' => '美洲/聖文森特',
  'America/Grand_Turk' => '美洲/大特克島',
  'America/Tortola' => '美洲/托投拉',
  'America/St_Thomas' => '美洲/聖托馬斯',
  'America/Argentina/Buenos_Aires' => '美洲/阿根廷/布宜諾斯艾利斯',
  'America/Argentina/Cordoba' => '美洲/阿根廷/科爾多瓦',
  'America/Argentina/Tucuman' => '美洲/阿根廷/圖庫曼',
  'America/Argentina/La_Rioja' => '美洲/阿根廷/里奧哈',
  'America/Argentina/San_Juan' => '美洲/阿根廷/聖胡安',
  'America/Argentina/Jujuy' => '美洲/阿根廷/胡胡伊',
  'America/Argentina/Catamarca' => '美洲/阿根廷/卡塔馬卡',
  'America/Argentina/Mendoza' => '美洲/阿根廷/門多薩',
  'America/Argentina/Rio_Gallegos' => '美洲/阿根廷/里約熱內盧',
  'America/Argentina/Ushuaia' =>  '美洲/阿根廷/烏斯懷亞',
  'America/Aruba' => '美洲/阿魯巴',
  'America/La_Paz' => '美洲/拉巴斯',
  'America/Noronha' => '美洲/諾羅尼亞',
  'America/Belem' => '美洲/貝倫',
  'America/Fortaleza' => '美洲/福塔雷薩',
  'America/Recife' => '美洲/累西腓',
  'America/Araguaina' => '美洲/阿拉瓜伊納',
  'America/Maceio' => '美洲/馬塞約',
  'America/Bahia' => '美洲/Bahia',
  'America/Sao_Paulo' => '美洲/聖保羅',
  'America/Campo_Grande' => '美洲/大坎普',
  'America/Cuiaba' => '美洲/庫亞巴',
  'America/Porto_Velho' => '美洲/波多韋柳',
  'America/Boa_Vista' => '美洲/泊亞維斯特',
  'America/Manaus' => '美洲/馬瑙斯',
  'America/Eirunepe' => '美洲/依倫尼貝',
  'America/Rio_Branco' => '美洲/里約布蘭科',
  'America/Santiago' => '美洲/聖地亞哥',
  'Pacific/Easter' => '太平洋/複活節島' ,
  'America/Bogota' => '美洲/波哥大',
  'America/Curacao' => '美洲/庫拉索',
  'America/Guayaquil' => '美洲/瓜亞基爾',
  'Pacific/Galapagos' => '太平洋/加拉帕戈斯群島' ,
  'Atlantic/Stanley' => '大西洋/斯坦利',
  'America/Cayenne' => '美洲/卡宴',
  'America/Guyana' => '美洲/蓋亞那',
  'America/Asuncion' => '美洲/亞松森',
  'America/Lima' => '美洲/利馬',
  'Atlantic/South_Georgia' => '大西洋/南喬治亞',
  'America/Paramaribo' => '美洲/帕拉馬裡博',
  'America/Port_of_Spain' => '美洲/西班牙港',
  'America/Montevideo' => '美洲/蒙得維的亞',
  'America/Caracas' => '美洲/加拉加斯',
  );

  $app_list_strings['moduleList']['Sugar_Favorites'] = '收藏夾';
  $app_list_strings['eapm_list']= array(
    'Sugar'=>'SuiteCRM',
    'WebEx'=>'WebEx',
    'GoToMeeting'=>'GoToMeeting',
    'IBMSmartCloud'=>'IBM SmartCloud',
    'Google' => 'Google聯繫人',
    'Box' => 'Box.net',
    'Facebook'=>'Facebook',
    'Twitter'=>'Twitter',
  );
  $app_list_strings['eapm_list_import']= array(
  	'Google' => 'Google Contacts',
  );
$app_list_strings['eapm_list_documents']= array(
  	'Google' => 'Google Docs',
  );
	$app_list_strings['token_status'] = array(
        1 => 'Request',
        2 => '進入',
        3 => '無效',
    );

$app_list_strings ['emailTemplates_type_list'] = array (
    '' => '' ,
    'campaign' => '市場活動' ,
    'email' => '電子郵件',
  );

$app_list_strings ['emailTemplates_type_list_campaigns'] = array (
    '' => '' ,
    'campaign' => '市場活動' ,
  );

$app_list_strings ['emailTemplates_type_list_no_workflow'] = array (
    '' => '' ,
    'campaign' => '市場活動' ,
    'email' => '電子郵件',
  );
$app_strings ['documentation'] = array (
    'LBL_DOCS' => '文件',
    'ULT' => '02_Sugar_Ultimate',
	'ENT' => '02_Sugar_Enterprise',
	'CORP' => '03_Sugar_Corporate',
	'PRO' => '04_Sugar_Professional',
	'COM' => '05_Sugar_Community_Edition'
);


// knowledge base
$app_list_strings['moduleList']['AOK_KnowledgeBase'] = '基礎知識';
$app_list_strings['moduleList']['AOK_Knowledge_Base_Categories'] = 'KB Categories';
$app_list_strings['aok_status_list']['Draft'] = '草稿';
$app_list_strings['aok_status_list']['Expired'] = '有效期';
$app_list_strings['aok_status_list']['In_Review'] = '審查中';
//$app_list_strings['aok_status_list']['Published'] = 'Published';
$app_list_strings['aok_status_list']['published_private'] = '私有';
$app_list_strings['aok_status_list']['published_public'] = '公共';


$app_list_strings['moduleList']['Reminders'] = 'Reminders';
$app_list_strings['moduleListSingular']['Reminders'] = 'Reminder';

$app_list_strings['moduleList']['Reminders_Invitees'] = 'Reminders_Invitees';
$app_list_strings['moduleListSingular']['Reminders_Invitees'] = 'Reminder_Invitee';

$app_list_strings['moduleList']['FP_events'] = '事件';
$app_list_strings['moduleList']['FP_Event_Locations'] = '地點';
$app_list_strings['invite_template_list'][''] = '';

//events
$app_list_strings['fp_event_invite_status_dom']['Invited'] = '受邀請';
$app_list_strings['fp_event_invite_status_dom']['Not Invited'] = '未受邀請';
$app_list_strings['fp_event_invite_status_dom']['Attended'] = '有參加';
$app_list_strings['fp_event_invite_status_dom']['Not Attended'] = '未參加';
$app_list_strings['fp_event_status_dom']['Accepted'] = '已接受';
$app_list_strings['fp_event_status_dom']['Declined'] = '已拒絕';
$app_list_strings['fp_event_status_dom']['No Response'] = '無回應';

$app_strings['LBL_STATUS_EVENT'] = '邀請狀態';
$app_strings['LBL_ACCEPT_STATUS'] = '接受狀態';
$app_strings['LBL_LISTVIEW_OPTION_CURRENT'] = '當前頁';
$app_strings['LBL_LISTVIEW_OPTION_ENTIRE'] = '整個列表';
$app_strings['LBL_LISTVIEW_NONE'] = '無';

//aod
$app_list_strings['moduleList']['AOD_IndexEvent'] = '索引事件';
$app_list_strings['moduleList']['AOD_Index'] = '索引';

$app_list_strings['moduleList']['AOP_AOP_Case_Events'] = '案件事件';
$app_list_strings['moduleList']['AOP_AOP_Case_Updates'] = '案件更新';
$app_list_strings['moduleList']['AOP_Case_Events'] = '案件事件';
$app_list_strings['moduleList']['AOP_Case_Updates'] = '案件更新';
$app_strings['LBL_AOP_EMAIL_REPLY_DELIMITER'] = '========== Please reply above this line ==========';

//aop
$app_list_strings['case_state_default_key'] = 'Open';
$app_list_strings['case_state_dom'] =
    array (
        'Open' => 'Opened',
        'Closed' => '關閉',
    );

$app_list_strings['case_status_default_key'] = '新增';
$app_list_strings['case_status_dom'] =
    array (
        'Open_New' => '新增',
        'Open_Assigned' => '已分配',
        'Closed_Closed' => '關閉',
        'Open_Pending Input' => '等待輸入',
        'Closed_Rejected' => '拒絕',
        'Closed_Duplicate' => '重覆',
    );
$app_list_strings['contact_portal_user_type_dom'] =
    array (
        'Single' => '單一使用者',
        'Account' => '帳戶使用者',
    );
$app_list_strings['dom_email_distribution_for_auto_create']=array (
    'AOPDefault' => '使用AOP預設',
    'singleUser' => '單一使用者',
    'roundRobin' => '循環',
    'leastBusy' => '最少忙碌',
    'random' => '隨機',
);

//aor
$app_list_strings['moduleList']['AOR_Reports'] = '報表';
$app_list_strings['moduleList']['AOR_Conditions'] = '報表條件';
$app_list_strings['moduleList']['AOR_Charts'] = '報表圖表';
$app_list_strings['moduleList']['AOR_Fields'] = '報表欄位';
$app_list_strings['moduleList']['AOR_Scheduled_Reports'] = 'DCE 報告';
$app_list_strings['aor_operator_list']['Equal_To'] = '等於';
$app_list_strings['aor_operator_list']['Not_Equal_To'] = '不等於';
$app_list_strings['aor_operator_list']['Greater_Than'] = '大於';
$app_list_strings['aor_operator_list']['Less_Than'] = '小於';
$app_list_strings['aor_operator_list']['Greater_Than_or_Equal_To'] = '大於等於';
$app_list_strings['aor_operator_list']['Less_Than_or_Equal_To'] = '小於等於';
$app_list_strings['aor_operator_list']['Contains'] = '包括';
$app_list_strings['aor_operator_list']['Starts_With'] = '開始於';
$app_list_strings['aor_operator_list']['Ends_With'] = 'Ends With';
$app_list_strings['aor_format_options'][''] = '';
$app_list_strings['aor_format_options']['Y-m-d'] = 'Y-m-d';
$app_list_strings['aor_format_options']['Ymd'] = 'Ymd';
$app_list_strings['aor_format_options']['Y-m'] = 'Y-m';
$app_list_strings['aor_format_options']['d/m/Y'] = 'd/m/Y';
$app_list_strings['aor_format_options']['Y'] = 'Y';
$app_list_strings['aor_sql_operator_list']['Equal_To'] = '=';
$app_list_strings['aor_sql_operator_list']['Not_Equal_To'] = '!=';
$app_list_strings['aor_sql_operator_list']['Greater_Than'] = '>';
$app_list_strings['aor_sql_operator_list']['Less_Than'] = '<';
$app_list_strings['aor_sql_operator_list']['Greater_Than_or_Equal_To'] = '>=';
$app_list_strings['aor_sql_operator_list']['Less_Than_or_Equal_To'] = '<=';
$app_list_strings['aor_sql_operator_list']['Contains'] = 'LIKE';
$app_list_strings['aor_sql_operator_list']['Starts_With'] = 'LIKE';
$app_list_strings['aor_sql_operator_list']['Ends_With'] = 'LIKE';
$app_list_strings['aor_condition_operator_list']['And'] = '和';
$app_list_strings['aor_condition_operator_list']['OR'] = '或者';
$app_list_strings['aor_condition_type_list']['Value'] = '值';
$app_list_strings['aor_condition_type_list']['Field'] = '欄位';
$app_list_strings['aor_condition_type_list']['Date'] = '日期';
$app_list_strings['aor_condition_type_list']['Multi'] = 'One of';
$app_list_strings['aor_condition_type_list']['Period'] = 'Period';
$app_list_strings['aor_condition_type_list']['CurrentUserID'] = 'Current User';
$app_list_strings['aor_date_type_list'][''] = '';
$app_list_strings['aor_date_type_list']['minute'] = '分鐘';
$app_list_strings['aor_date_type_list']['hour'] = '小時';
$app_list_strings['aor_date_type_list']['day'] = '天';
$app_list_strings['aor_date_type_list']['week'] = '周';
$app_list_strings['aor_date_type_list']['month'] = '月';
$app_list_strings['aor_date_type_list']['business_hours'] = '工時';
$app_list_strings['aor_date_options']['now'] = '現在';
$app_list_strings['aor_date_options']['field'] = '此欄位';
$app_list_strings['aor_date_operator']['now'] = '';
$app_list_strings['aor_date_operator']['plus'] = '+';
$app_list_strings['aor_date_operator']['minus'] = '-';
$app_list_strings['aor_sort_operator'][''] = '';
$app_list_strings['aor_sort_operator']['ASC'] = '升序';
$app_list_strings['aor_sort_operator']['DESC'] = '降序';
$app_list_strings['aor_function_list'][''] = '';
$app_list_strings['aor_function_list']['COUNT'] = '合計';
$app_list_strings['aor_function_list']['MIN'] = '最小';
$app_list_strings['aor_function_list']['MAX'] = '最大';
$app_list_strings['aor_function_list']['SUM'] = '總計';
$app_list_strings['aor_function_list']['AVG'] = '平均';
$app_list_strings['aor_total_options'][''] = '';
$app_list_strings['aor_total_options']['COUNT'] = '合計';
$app_list_strings['aor_total_options']['SUM'] = '總計';
$app_list_strings['aor_total_options']['AVG'] = '平均';
$app_list_strings['aor_chart_types']['bar'] = '柱狀圖表';
$app_list_strings['aor_chart_types']['line'] = '折線圖表';
$app_list_strings['aor_chart_types']['pie'] = '餅狀圖表';
$app_list_strings['aor_chart_types']['radar'] = '雷達圖表';
$app_list_strings['aor_chart_types']['polar'] = '座標圖表';
$app_list_strings['aor_chart_types']['stacked_bar'] = 'Stacked bar';
$app_list_strings['aor_chart_types']['grouped_bar'] = 'Grouped bar';
$app_list_strings['aor_scheduled_report_schedule_types']['monthly'] = '月';
$app_list_strings['aor_scheduled_report_schedule_types']['weekly'] = '周';
$app_list_strings['aor_scheduled_report_schedule_types']['daily'] = '日';
$app_list_strings['aor_scheduled_reports_status_dom']['active'] = '啟用';
$app_list_strings['aor_scheduled_reports_status_dom']['inactive'] = '停用';
$app_list_strings['aor_email_type_list']['Email Address'] = '電子郵件';
$app_list_strings['aor_email_type_list']['Specify User'] = '用戶';
$app_list_strings['aor_email_type_list']['Users'] = '用戶';
$app_list_strings['aor_assign_options']['all'] = '所有用戶';
$app_list_strings['aor_assign_options']['role'] = '所有用戶角色';
$app_list_strings['aor_assign_options']['security_group'] = '所有用戶群組';
$app_list_strings['date_time_period_list']['today'] = '今天';
$app_list_strings['date_time_period_list']['yesterday'] = '昨天';
$app_list_strings['date_time_period_list']['this_week'] = 'This Week';
$app_list_strings['date_time_period_list']['last_week'] = '上周';
$app_list_strings['date_time_period_list']['last_month'] = '上個月';
$app_list_strings['date_time_period_list']['this_quarter'] = '這個季度';
$app_list_strings['date_time_period_list']['last_quarter'] = '上個季度';
$app_list_strings['date_time_period_list']['this_year'] = 'This year';
$app_list_strings['date_time_period_list']['last_year'] = 'Last year';
$app_strings['LBL_CRON_ON_THE_MONTHDAY'] = '於';
$app_strings['LBL_CRON_ON_THE_WEEKDAY'] = '在';
$app_strings['LBL_CRON_AT'] = '在';
$app_strings['LBL_CRON_RAW'] = '高級';
$app_strings['LBL_CRON_MIN'] = '分';
$app_strings['LBL_CRON_HOUR'] = '時';
$app_strings['LBL_CRON_DAY'] = '日';
$app_strings['LBL_CRON_MONTH'] = '月';
$app_strings['LBL_CRON_DOW'] = 'DOW';
$app_strings['LBL_CRON_DAILY'] = '日';
$app_strings['LBL_CRON_WEEKLY'] = '周';
$app_strings['LBL_CRON_MONTHLY'] = '月';

//aos
$app_list_strings['moduleList']['AOS_Contracts'] = '合同';
$app_list_strings['moduleList']['AOS_Invoices'] = '出貨單';
$app_list_strings['moduleList']['AOS_PDF_Templates'] = '模板';
$app_list_strings['moduleList']['AOS_Product_Categories'] = '產品類別';
$app_list_strings['moduleList']['AOS_Products'] = '產品';
$app_list_strings['moduleList']['AOS_Products_Quotes'] = 'Line Items';
$app_list_strings['moduleList']['AOS_Line_Item_Groups'] = 'Line Item Groups';
$app_list_strings['moduleList']['AOS_Quotes'] = '報價';
$app_list_strings['aos_quotes_type_dom'][''] = '';
$app_list_strings['aos_quotes_type_dom']['Analyst'] = '分析者';
$app_list_strings['aos_quotes_type_dom']['Competitor'] = '競爭者';
$app_list_strings['aos_quotes_type_dom']['Customer'] = '客戶';
$app_list_strings['aos_quotes_type_dom']['Integrator'] = '整合者';
$app_list_strings['aos_quotes_type_dom']['Investor'] = '投資者';
$app_list_strings['aos_quotes_type_dom']['Partner'] = '合作者';
$app_list_strings['aos_quotes_type_dom']['Press'] = '出版商';
$app_list_strings['aos_quotes_type_dom']['Prospect'] = '銷售前景';
$app_list_strings['aos_quotes_type_dom']['Reseller'] = '批發商';
$app_list_strings['aos_quotes_type_dom']['Other'] = '其它';
$app_list_strings['template_ddown_c_list'][''] = '';
$app_list_strings['quote_stage_dom']['Draft'] = '草稿';
$app_list_strings['quote_stage_dom']['Negotiation'] = '談判';
$app_list_strings['quote_stage_dom']['Delivered'] = '已交付';
$app_list_strings['quote_stage_dom']['On Hold'] = '等待';
$app_list_strings['quote_stage_dom']['Confirmed'] = '已確認';
$app_list_strings['quote_stage_dom']['Closed Accepted'] = '談成結束';
$app_list_strings['quote_stage_dom']['Closed Lost'] = '丟單結束';
$app_list_strings['quote_stage_dom']['Closed Dead'] = '未成結束';
$app_list_strings['quote_term_dom']['Net 15'] = '貨到15天付款';
$app_list_strings['quote_term_dom']['Net 30'] = '貨到30天付款';
$app_list_strings['quote_term_dom'][''] = '';
$app_list_strings['approval_status_dom']['Approved'] = '已審核';
$app_list_strings['approval_status_dom']['Not Approved'] = '未審核';
$app_list_strings['approval_status_dom'][''] = '';
$app_list_strings['vat_list']['0.0'] = '0%';
$app_list_strings['vat_list']['5.0'] = '5%';
$app_list_strings['vat_list']['7.5'] = '7.5%';
$app_list_strings['vat_list']['17.5'] = '17.5%';
$app_list_strings['vat_list']['20.0'] = '20$';
$app_list_strings['discount_list']['Percentage'] = '件Pct';
$app_list_strings['discount_list']['Amount'] = '量Amt';
$app_list_strings['aos_invoices_type_dom'][''] = '';
$app_list_strings['aos_invoices_type_dom']['Analyst'] = '分析者';
$app_list_strings['aos_invoices_type_dom']['Competitor'] = '競爭者';
$app_list_strings['aos_invoices_type_dom']['Customer'] = '客戶';
$app_list_strings['aos_invoices_type_dom']['Integrator'] = '整合者';
$app_list_strings['aos_invoices_type_dom']['Investor'] = '投資者';
$app_list_strings['aos_invoices_type_dom']['Partner'] = '合作者';
$app_list_strings['aos_invoices_type_dom']['Press'] = '出版商';
$app_list_strings['aos_invoices_type_dom']['Prospect'] = '銷售前景';
$app_list_strings['aos_invoices_type_dom']['Reseller'] = '批發商';
$app_list_strings['aos_invoices_type_dom']['Other'] = '其它';
$app_list_strings['invoice_status_dom']['Paid'] = '已付款';
$app_list_strings['invoice_status_dom']['Unpaid'] = '未付款';
$app_list_strings['invoice_status_dom']['Cancelled'] = '已取消';
$app_list_strings['invoice_status_dom'][''] = '';
$app_list_strings['quote_invoice_status_dom']['Not Invoiced'] = '未出貨';
$app_list_strings['quote_invoice_status_dom']['Invoiced'] = '已出貨';
$app_list_strings['product_code_dom']['XXXX'] = 'XXXX';
$app_list_strings['product_code_dom']['YYYY'] = 'YYYY';
$app_list_strings['product_category_dom']['Laptops'] = '筆電';
$app_list_strings['product_category_dom']['Desktops'] = '桌電';
$app_list_strings['product_category_dom'][''] = '';
$app_list_strings['product_type_dom']['Good'] = '好';
$app_list_strings['product_type_dom']['Service'] = '服務';
$app_list_strings['product_quote_parent_type_dom']['AOS_Quotes'] = '報價';
$app_list_strings['product_quote_parent_type_dom']['AOS_Invoices'] = '出貨單';
$app_list_strings['product_quote_parent_type_dom']['AOS_Contracts'] = '合同';
$app_list_strings['pdf_template_type_dom']['AOS_Quotes'] = '報價';
$app_list_strings['pdf_template_type_dom']['AOS_Invoices'] = '出貨單';
$app_list_strings['pdf_template_type_dom']['AOS_Contracts'] = '合同';
$app_list_strings['pdf_template_type_dom']['Accounts'] = '帳戶名稱';
$app_list_strings['pdf_template_type_dom']['Contacts'] = '合同名稱';
$app_list_strings['pdf_template_type_dom']['Leads'] = '潛在客戶';
$app_list_strings['pdf_template_sample_dom'][''] = '';
$app_list_strings['contract_status_list']['Not Started'] = '未開始';
$app_list_strings['contract_status_list']['In Progress'] = '處理中';
$app_list_strings['contract_status_list']['Signed'] = '已簽署';
$app_list_strings['contract_type_list']['Type'] = '類型';
$app_strings['LBL_GENERATE_LETTER'] = '產生信件';
$app_strings['LBL_SELECT_TEMPLATE'] = '請選擇一個模板';
$app_strings['LBL_NO_TEMPLATE'] = 'ERROR\n查無模板。\n請前往PDF模板模組並新增一個';

//aow
$app_list_strings['moduleList']['AOW_WorkFlow'] = '工作流程';
$app_list_strings['moduleList']['AOW_Conditions'] = 'WorkFlow Conditions';
$app_list_strings['moduleList']['AOW_Processed'] = 'Process Audit';
$app_list_strings['moduleList']['AOW_Actions'] = '觸發器';
$app_list_strings['aow_status_list']['Active'] = '啟用';
$app_list_strings['aow_status_list']['Inactive'] = '停用';
$app_list_strings['aow_operator_list']['Equal_To'] = '等於';
$app_list_strings['aow_operator_list']['Not_Equal_To'] = '不等於';
$app_list_strings['aow_operator_list']['Greater_Than'] = '大於';
$app_list_strings['aow_operator_list']['Less_Than'] = '小於';
$app_list_strings['aow_operator_list']['Greater_Than_or_Equal_To'] = '大於等於';
$app_list_strings['aow_operator_list']['Less_Than_or_Equal_To'] = '小於等於';
$app_list_strings['aow_operator_list']['Contains'] = '包括';
$app_list_strings['aow_operator_list']['Starts_With'] = '開始於';
$app_list_strings['aow_operator_list']['Ends_With'] = 'Ends With';
$app_list_strings['aow_operator_list']['is_null'] = '是否空';
$app_list_strings['aow_sql_operator_list']['Equal_To'] = '=';
$app_list_strings['aow_sql_operator_list']['Not_Equal_To'] = '!=';
$app_list_strings['aow_sql_operator_list']['Greater_Than'] = '>';
$app_list_strings['aow_sql_operator_list']['Less_Than'] = '<';
$app_list_strings['aow_sql_operator_list']['Greater_Than_or_Equal_To'] = '>=';
$app_list_strings['aow_sql_operator_list']['Less_Than_or_Equal_To'] = '<=';
$app_list_strings['aow_sql_operator_list']['Contains'] = 'LIKE';
$app_list_strings['aow_sql_operator_list']['Starts_With'] = 'LIKE';
$app_list_strings['aow_sql_operator_list']['Ends_With'] = 'LIKE';
$app_list_strings['aow_sql_operator_list']['is_null'] = 'IS NULL';
$app_list_strings['aow_process_status_list']['Complete'] = '完成';
$app_list_strings['aow_process_status_list']['Running'] = 'Running';
$app_list_strings['aow_process_status_list']['Pending'] = '未決定';
$app_list_strings['aow_process_status_list']['Failed'] = '失敗';
$app_list_strings['aow_condition_operator_list']['And'] = '和';
$app_list_strings['aow_condition_operator_list']['OR'] = '或者';
$app_list_strings['aow_condition_type_list']['Value'] = '值';
$app_list_strings['aow_condition_type_list']['Field'] = '欄位';
$app_list_strings['aow_condition_type_list']['Any_Change'] = '任何改變';
$app_list_strings['aow_condition_type_list']['SecurityGroup'] = 'In SecurityGroup';
$app_list_strings['aow_condition_type_list']['Date'] = '日期';
$app_list_strings['aow_condition_type_list']['Multi'] = 'One of';
$app_list_strings['aow_action_type_list']['Value'] = '值';
$app_list_strings['aow_action_type_list']['Field'] = '欄位';
$app_list_strings['aow_action_type_list']['Date'] = '日期';
$app_list_strings['aow_action_type_list']['Round_Robin'] = '輪詢';
$app_list_strings['aow_action_type_list']['Least_Busy'] = '最少忙碌';
$app_list_strings['aow_action_type_list']['Random'] = '隨機';
$app_list_strings['aow_rel_action_type_list']['Value'] = '值';
$app_list_strings['aow_rel_action_type_list']['Field'] = '欄位';
$app_list_strings['aow_date_type_list'][''] = '';
$app_list_strings['aow_date_type_list']['minute'] = '分鐘';
$app_list_strings['aow_date_type_list']['hour'] = '小時';
$app_list_strings['aow_date_type_list']['day'] = '天';
$app_list_strings['aow_date_type_list']['week'] = '周';
$app_list_strings['aow_date_type_list']['month'] = '月';
$app_list_strings['aow_date_type_list']['business_hours'] = '工時';
$app_list_strings['aow_date_options']['now'] = '現在';
$app_list_strings['aow_date_options']['today'] = '今天';
$app_list_strings['aow_date_options']['field'] = '此欄位';
$app_list_strings['aow_date_operator']['now'] = '';
$app_list_strings['aow_date_operator']['plus'] = '+';
$app_list_strings['aow_date_operator']['minus'] = '-';
$app_list_strings['aow_assign_options']['all'] = '所有用戶';
$app_list_strings['aow_assign_options']['role'] = '所有用戶角色';
$app_list_strings['aow_assign_options']['security_group'] = '所有用戶群組';
$app_list_strings['aow_email_type_list']['Email Address'] = '電子郵件';
$app_list_strings['aow_email_type_list']['Record Email'] = 'Record Email';
$app_list_strings['aow_email_type_list']['Related Field'] = '相關欄位';
$app_list_strings['aow_email_type_list']['Specify User'] = '用戶';
$app_list_strings['aow_email_type_list']['Users'] = '用戶';
$app_list_strings['aow_email_to_list']['to'] = '到';
$app_list_strings['aow_email_to_list']['cc'] = '副本';
$app_list_strings['aow_email_to_list']['bcc'] = '密件副本';
$app_list_strings['aow_run_on_list']['All_Records'] = '所有紀錄';
$app_list_strings['aow_run_on_list']['New_Records'] = '新紀錄';
$app_list_strings['aow_run_on_list']['Modified_Records'] = '已修改紀錄';
$app_list_strings['aow_run_when_list']['Always'] = '始終';
$app_list_strings['aow_run_when_list']['On_Save'] = 'Only On Save';
$app_list_strings['aow_run_when_list']['In_Scheduler'] = 'Only In The Scheduler';

//gant
$app_list_strings['moduleList']['AM_ProjectTemplates'] = '模板';
$app_list_strings['moduleList']['AM_TaskTemplates'] = '專案工作模板';
$app_list_strings['relationship_type_list']['FS'] = '完成到開始';
$app_list_strings['relationship_type_list']['SS'] = '開始到開始';
$app_list_strings['moduleList']['AM_ProjectHolidays'] = '專案假期';
$app_list_strings['holiday_resource_dom']['Contacts'] = '合同名稱';
$app_list_strings['holiday_resource_dom']['Users'] = '用戶';
$app_list_strings['duration_unit_dom']['Days'] = '天';
$app_list_strings['duration_unit_dom']['Hours'] = '小時';
$app_strings['LBL_GANTT_BUTTON_LABEL'] = '甘特圖';
$app_strings['LBL_GANTT_BUTTON_TITLE'] = '甘特圖';
$app_strings['LBL_CREATE_PROJECT'] = '創建項目';

//gmaps
$app_strings['LBL_MAP'] = '地圖';
$app_strings['LBL_MAPS'] = '地圖';

$app_strings['LBL_JJWG_MAPS_LNG'] = '經度';
$app_strings['LBL_JJWG_MAPS_LAT'] = '緯度';
$app_strings['LBL_JJWG_MAPS_GEOCODE_STATUS'] = '地理編碼狀態';
$app_strings['LBL_JJWG_MAPS_ADDRESS'] = '地址';
$app_strings['LBL_BUG_FIX'] = '臭蟲修改';

$app_list_strings['moduleList']['jjwg_Maps'] = '地圖';
$app_list_strings['moduleList']['jjwg_Markers'] = '地圖標記';
$app_list_strings['moduleList']['jjwg_Areas'] = '地圖區域';
$app_list_strings['moduleList']['jjwg_Address_Cache'] = '地圖地址快取';

$app_list_strings['map_unit_type_list']['mi'] = '哩';
$app_list_strings['map_unit_type_list']['km'] = '公里';

$app_list_strings['map_module_type_list']['Accounts'] = '帳戶名稱';
$app_list_strings['map_module_type_list']['Contacts'] = '合同名稱';
$app_list_strings['map_module_type_list']['Cases'] = '客戶反饋';
$app_list_strings['map_module_type_list']['Leads'] = '潛在客戶';
$app_list_strings['map_module_type_list']['Meetings'] = '會議';
$app_list_strings['map_module_type_list']['Opportunities'] = '商業機會';
$app_list_strings['map_module_type_list']['Project'] = '項目管理';
$app_list_strings['map_module_type_list']['Prospects'] = '目標';

$app_list_strings['map_relate_type_list']['Accounts'] = '客戶';
$app_list_strings['map_relate_type_list']['Contacts'] = '聯繫人檔案';
$app_list_strings['map_relate_type_list']['Cases'] = '客戶反饋';
$app_list_strings['map_relate_type_list']['Leads'] = '潛在客戶';
$app_list_strings['map_relate_type_list']['Meetings'] = '會議';
$app_list_strings['map_relate_type_list']['Opportunities'] = '商業機會';
$app_list_strings['map_relate_type_list']['Project'] = '項目管理';
$app_list_strings['map_relate_type_list']['Prospects'] = '目標';

$app_list_strings['marker_image_list']['accident'] = '意外';
$app_list_strings['marker_image_list']['administration'] = '管理員';
$app_list_strings['marker_image_list']['agriculture'] = '農業';
$app_list_strings['marker_image_list']['aircraft_small'] = '小型飛行器';
$app_list_strings['marker_image_list']['airplane_tourism'] = '飛機旅遊';
$app_list_strings['marker_image_list']['airport'] = '機場';
$app_list_strings['marker_image_list']['amphitheater'] = '競技場';
$app_list_strings['marker_image_list']['apartment'] = '公寓';
$app_list_strings['marker_image_list']['aquarium'] = '水族館';
$app_list_strings['marker_image_list']['arch'] = '拱門';
$app_list_strings['marker_image_list']['atm'] = '自動取款機';
$app_list_strings['marker_image_list']['audio'] = '音訊';
$app_list_strings['marker_image_list']['bank'] = '銀行';
$app_list_strings['marker_image_list']['bank_euro'] = '歐元銀行';
$app_list_strings['marker_image_list']['bank_pound'] = '英鎊銀行';
$app_list_strings['marker_image_list']['bar'] = '酒吧';
$app_list_strings['marker_image_list']['beach'] = '海灘';
$app_list_strings['marker_image_list']['beautiful'] = '美麗的';
$app_list_strings['marker_image_list']['bicycle_parking'] = '自行車停車';
$app_list_strings['marker_image_list']['big_city'] = '大城市';
$app_list_strings['marker_image_list']['bridge'] = '橋';
$app_list_strings['marker_image_list']['bridge_modern'] = '現代橋樑';
$app_list_strings['marker_image_list']['bus'] = '公共汽車';
$app_list_strings['marker_image_list']['cable_car'] = '纜車';
$app_list_strings['marker_image_list']['car'] = '車';
$app_list_strings['marker_image_list']['car_rental'] = '租車';
$app_list_strings['marker_image_list']['carrepair'] = 'Carrepair';
$app_list_strings['marker_image_list']['castle'] = '城堡';
$app_list_strings['marker_image_list']['cathedral'] = '大教堂';
$app_list_strings['marker_image_list']['chapel'] = '禮拜堂';
$app_list_strings['marker_image_list']['church'] = '教堂';
$app_list_strings['marker_image_list']['city_square'] = '市中心';
$app_list_strings['marker_image_list']['cluster'] = 'Cluster';
$app_list_strings['marker_image_list']['cluster_2'] = 'Cluster 2';
$app_list_strings['marker_image_list']['cluster_3'] = 'Cluster 3';
$app_list_strings['marker_image_list']['cluster_4'] = 'Cluster 4';
$app_list_strings['marker_image_list']['cluster_5'] = 'Cluster 5';
$app_list_strings['marker_image_list']['coffee'] = '咖啡';
$app_list_strings['marker_image_list']['community_centre'] = '活動中心';
$app_list_strings['marker_image_list']['company'] = '公司';
$app_list_strings['marker_image_list']['conference'] = '會議';
$app_list_strings['marker_image_list']['construction'] = '建築';
$app_list_strings['marker_image_list']['convenience'] = '便利';
$app_list_strings['marker_image_list']['court'] = '法院';
$app_list_strings['marker_image_list']['cruise'] = 'Cruise';
$app_list_strings['marker_image_list']['currency_exchange'] = '貨幣兌換';
$app_list_strings['marker_image_list']['customs'] = 'Customs';
$app_list_strings['marker_image_list']['cycling'] = 'Cycling';
$app_list_strings['marker_image_list']['dam'] = 'Dam';
$app_list_strings['marker_image_list']['days_dim'] = 'Days Dim';
$app_list_strings['marker_image_list']['days_dom'] = 'Days Dom';
$app_list_strings['marker_image_list']['days_jeu'] = 'Days Jeu';
$app_list_strings['marker_image_list']['days_jue'] = 'Days Jue';
$app_list_strings['marker_image_list']['days_lun'] = 'Days Lun';
$app_list_strings['marker_image_list']['days_mar'] = 'Days Mar';
$app_list_strings['marker_image_list']['days_mer'] = 'Days Mer';
$app_list_strings['marker_image_list']['days_mie'] = 'Days Mie';
$app_list_strings['marker_image_list']['days_qua'] = 'Days Qua';
$app_list_strings['marker_image_list']['days_qui'] = 'Days Qui';
$app_list_strings['marker_image_list']['days_sab'] = 'Days Sab';
$app_list_strings['marker_image_list']['days_sam'] = 'Days Sam';
$app_list_strings['marker_image_list']['days_seg'] = 'Days Seg';
$app_list_strings['marker_image_list']['days_sex'] = 'Days Sex';
$app_list_strings['marker_image_list']['days_ter'] = 'Days Ter';
$app_list_strings['marker_image_list']['days_ven'] = 'Days Ven';
$app_list_strings['marker_image_list']['days_vie'] = 'Days Vie';
$app_list_strings['marker_image_list']['dentist'] = '牙科診所';
$app_list_strings['marker_image_list']['deptartment_store'] = '百貨公司';
$app_list_strings['marker_image_list']['disability'] = 'Disability';
$app_list_strings['marker_image_list']['disabled_parking'] = '身心障礙停車';
$app_list_strings['marker_image_list']['doctor'] = '醫生';
$app_list_strings['marker_image_list']['dog_leash'] = 'Dog Leash';
$app_list_strings['marker_image_list']['down'] = '下';
$app_list_strings['marker_image_list']['down_left'] = '向下左';
$app_list_strings['marker_image_list']['down_right'] = '向下右';
$app_list_strings['marker_image_list']['down_then_left'] = '向下後向左';
$app_list_strings['marker_image_list']['down_then_right'] = '向下後向右';
$app_list_strings['marker_image_list']['drugs'] = '藥品';
$app_list_strings['marker_image_list']['elevator'] = '電梯';
$app_list_strings['marker_image_list']['embassy'] = '大使館';
$app_list_strings['marker_image_list']['expert'] = 'Expert';
$app_list_strings['marker_image_list']['factory'] = '工廠';
$app_list_strings['marker_image_list']['falling_rocks'] = '落石';
$app_list_strings['marker_image_list']['fast_food'] = '速食';
$app_list_strings['marker_image_list']['festival'] = '節日';
$app_list_strings['marker_image_list']['fjord'] = 'Fjord';
$app_list_strings['marker_image_list']['forest'] = '森林';
$app_list_strings['marker_image_list']['fountain'] = '噴泉';
$app_list_strings['marker_image_list']['friday'] = '星期五';
$app_list_strings['marker_image_list']['garden'] = '花園';
$app_list_strings['marker_image_list']['gas_station'] = '加油站';
$app_list_strings['marker_image_list']['geyser'] = 'Geyser';
$app_list_strings['marker_image_list']['gifts'] = '禮品';
$app_list_strings['marker_image_list']['gourmet'] = '美食';
$app_list_strings['marker_image_list']['grocery'] = '雜貨';
$app_list_strings['marker_image_list']['hairsalon'] = 'Hairsalon';
$app_list_strings['marker_image_list']['helicopter'] = '直昇機';
$app_list_strings['marker_image_list']['highway'] = '高速公路';
$app_list_strings['marker_image_list']['historical_quarter'] = '歷史街區';
$app_list_strings['marker_image_list']['home'] = '首頁';
$app_list_strings['marker_image_list']['hospital'] = '醫院';
$app_list_strings['marker_image_list']['hostel'] = '旅社';
$app_list_strings['marker_image_list']['hotel'] = '旅館';
$app_list_strings['marker_image_list']['hotel_1_star'] = '1星旅館';
$app_list_strings['marker_image_list']['hotel_2_stars'] = '2星旅館';
$app_list_strings['marker_image_list']['hotel_3_stars'] = '3星旅館';
$app_list_strings['marker_image_list']['hotel_4_stars'] = '4星旅館';
$app_list_strings['marker_image_list']['hotel_5_stars'] = '5星旅館';
$app_list_strings['marker_image_list']['info'] = '信息';
$app_list_strings['marker_image_list']['justice'] = 'Justice';
$app_list_strings['marker_image_list']['lake'] = '湖';
$app_list_strings['marker_image_list']['laundromat'] = '自助洗衣';
$app_list_strings['marker_image_list']['left'] = '左';
$app_list_strings['marker_image_list']['left_then_down'] = '向左後向下';
$app_list_strings['marker_image_list']['left_then_up'] = '向左後向上';
$app_list_strings['marker_image_list']['library'] = '圖書館';
$app_list_strings['marker_image_list']['lighthouse'] = '燈塔';
$app_list_strings['marker_image_list']['liquor'] = '酒品';
$app_list_strings['marker_image_list']['lock'] = 'Lock';
$app_list_strings['marker_image_list']['main_road'] = 'Main Road';
$app_list_strings['marker_image_list']['massage'] = '按摩';
$app_list_strings['marker_image_list']['mobile_phone_tower'] = 'Mobile Phone Tower';
$app_list_strings['marker_image_list']['modern_tower'] = 'Modern Tower';
$app_list_strings['marker_image_list']['monastery'] = '修道院';
$app_list_strings['marker_image_list']['monday'] = '星期一';
$app_list_strings['marker_image_list']['monument'] = '紀念碑';
$app_list_strings['marker_image_list']['mosque'] = 'Mosque';
$app_list_strings['marker_image_list']['motorcycle'] = '摩托車';
$app_list_strings['marker_image_list']['museum'] = '博物館';
$app_list_strings['marker_image_list']['music_live'] = 'Music Live';
$app_list_strings['marker_image_list']['oil_pump_jack'] = 'Oil Pump Jack';
$app_list_strings['marker_image_list']['pagoda'] = '寶塔';
$app_list_strings['marker_image_list']['palace'] = '宮殿';
$app_list_strings['marker_image_list']['panoramic'] = 'Panoramic';
$app_list_strings['marker_image_list']['park'] = '停車';
$app_list_strings['marker_image_list']['park_and_ride'] = '停車換乘';
$app_list_strings['marker_image_list']['parking'] = '停車場';
$app_list_strings['marker_image_list']['photo'] = '照片';
$app_list_strings['marker_image_list']['picnic'] = '野餐';
$app_list_strings['marker_image_list']['places_unvisited'] = '未拜訪地點';
$app_list_strings['marker_image_list']['places_visited'] = '已拜訪地點';
$app_list_strings['marker_image_list']['playground'] = '運動場';
$app_list_strings['marker_image_list']['police'] = '警察';
$app_list_strings['marker_image_list']['port'] = '埠';
$app_list_strings['marker_image_list']['postal'] = '郵務';
$app_list_strings['marker_image_list']['power_line_pole'] = '電線桿';
$app_list_strings['marker_image_list']['power_plant'] = '電廠';
$app_list_strings['marker_image_list']['power_substation'] = '變電所';
$app_list_strings['marker_image_list']['public_art'] = '公共藝術';
$app_list_strings['marker_image_list']['rain'] = '雨';
$app_list_strings['marker_image_list']['real_estate'] = '房地產';
$app_list_strings['marker_image_list']['regroup'] = '重組';
$app_list_strings['marker_image_list']['resort'] = '渡假村';
$app_list_strings['marker_image_list']['restaurant'] = '餐廳';
$app_list_strings['marker_image_list']['restaurant_african'] = '非洲餐廳';
$app_list_strings['marker_image_list']['restaurant_barbecue'] = '燒烤餐廳';
$app_list_strings['marker_image_list']['restaurant_buffet'] = '自助餐廳';
$app_list_strings['marker_image_list']['restaurant_chinese'] = '中國餐廳';
$app_list_strings['marker_image_list']['restaurant_fish'] = '魚餐廳';
$app_list_strings['marker_image_list']['restaurant_fish_chips'] = '魚薯條餐廳';
$app_list_strings['marker_image_list']['restaurant_gourmet'] = '美食餐廳';
$app_list_strings['marker_image_list']['restaurant_greek'] = '希臘餐廳';
$app_list_strings['marker_image_list']['restaurant_indian'] = '印度餐廳';
$app_list_strings['marker_image_list']['restaurant_italian'] = '義大利餐廳';
$app_list_strings['marker_image_list']['restaurant_japanese'] = '日本餐廳';
$app_list_strings['marker_image_list']['restaurant_kebab'] = '烤肉餐廳';
$app_list_strings['marker_image_list']['restaurant_korean'] = '韓國餐廳';
$app_list_strings['marker_image_list']['restaurant_mediterranean'] = '地中海餐廳';
$app_list_strings['marker_image_list']['restaurant_mexican'] = '墨西哥餐廳';
$app_list_strings['marker_image_list']['restaurant_romantic'] = '浪漫餐廳';
$app_list_strings['marker_image_list']['restaurant_thai'] = '泰國餐廳';
$app_list_strings['marker_image_list']['restaurant_turkish'] = '土耳其餐廳';
$app_list_strings['marker_image_list']['right'] = '右';
$app_list_strings['marker_image_list']['right_then_down'] = '向右然後向下';
$app_list_strings['marker_image_list']['right_then_up'] = '向右然後向上';
$app_list_strings['marker_image_list']['satursday'] = '星期六';
$app_list_strings['marker_image_list']['school'] = '學校';
$app_list_strings['marker_image_list']['shopping_mall'] = '購物中心';
$app_list_strings['marker_image_list']['shore'] = '岸';
$app_list_strings['marker_image_list']['sight'] = 'Sight';
$app_list_strings['marker_image_list']['small_city'] = '小城市';
$app_list_strings['marker_image_list']['snow'] = '雪';
$app_list_strings['marker_image_list']['spaceport'] = '太空站';
$app_list_strings['marker_image_list']['speed_100'] = '速限100';
$app_list_strings['marker_image_list']['speed_110'] = '速限110';
$app_list_strings['marker_image_list']['speed_120'] = '速限120';
$app_list_strings['marker_image_list']['speed_130'] = '速限130';
$app_list_strings['marker_image_list']['speed_20'] = '速限20';
$app_list_strings['marker_image_list']['speed_30'] = '速限30';
$app_list_strings['marker_image_list']['speed_40'] = '速限40';
$app_list_strings['marker_image_list']['speed_50'] = '速限50';
$app_list_strings['marker_image_list']['speed_60'] = '速限60';
$app_list_strings['marker_image_list']['speed_70'] = '速限70';
$app_list_strings['marker_image_list']['speed_80'] = '速限80';
$app_list_strings['marker_image_list']['speed_90'] = '速限90';
$app_list_strings['marker_image_list']['speed_hump'] = '減速帶';
$app_list_strings['marker_image_list']['stadium'] = 'Stadium';
$app_list_strings['marker_image_list']['statue'] = '雕像';
$app_list_strings['marker_image_list']['steam_train'] = '蒸氣火車';
$app_list_strings['marker_image_list']['stop'] = '停';
$app_list_strings['marker_image_list']['stoplight'] = 'Stoplight';
$app_list_strings['marker_image_list']['subway'] = '地下鐵';
$app_list_strings['marker_image_list']['sun'] = '晴';
$app_list_strings['marker_image_list']['sunday'] = '星期日';
$app_list_strings['marker_image_list']['supermarket'] = '超市';
$app_list_strings['marker_image_list']['synagogue'] = 'Synagogue';
$app_list_strings['marker_image_list']['tapas'] = '小吃';
$app_list_strings['marker_image_list']['taxi'] = '計程車';
$app_list_strings['marker_image_list']['taxiway'] = '滑行道';
$app_list_strings['marker_image_list']['teahouse'] = '茶館';
$app_list_strings['marker_image_list']['telephone'] = '電話';
$app_list_strings['marker_image_list']['temple_hindu'] = '印度廟';
$app_list_strings['marker_image_list']['terrace'] = '陽台';
$app_list_strings['marker_image_list']['text'] = 'Text';
$app_list_strings['marker_image_list']['theater'] = '戲院';
$app_list_strings['marker_image_list']['theme_park'] = '主題公園';
$app_list_strings['marker_image_list']['thursday'] = '星期四';
$app_list_strings['marker_image_list']['toilets'] = '廁所';
$app_list_strings['marker_image_list']['toll_station'] = '收費站';
$app_list_strings['marker_image_list']['tower'] = '塔';
$app_list_strings['marker_image_list']['traffic_enforcement_camera'] = '交通管制照相';
$app_list_strings['marker_image_list']['train'] = '火車';
$app_list_strings['marker_image_list']['tram'] = 'Tram';
$app_list_strings['marker_image_list']['truck'] = '卡車';
$app_list_strings['marker_image_list']['tuesday'] = '星期二';
$app_list_strings['marker_image_list']['tunnel'] = '隧道';
$app_list_strings['marker_image_list']['turn_left'] = '左轉';
$app_list_strings['marker_image_list']['turn_right'] = '右轉';
$app_list_strings['marker_image_list']['university'] = '大學';
$app_list_strings['marker_image_list']['up'] = '上';
$app_list_strings['marker_image_list']['up_left'] = '向上左';
$app_list_strings['marker_image_list']['up_right'] = '向上右';
$app_list_strings['marker_image_list']['up_then_left'] = '向上後向左';
$app_list_strings['marker_image_list']['up_then_right'] = '向上後向右';
$app_list_strings['marker_image_list']['vespa'] = 'Vespa';
$app_list_strings['marker_image_list']['video'] = 'Video';
$app_list_strings['marker_image_list']['villa'] = '別墅';
$app_list_strings['marker_image_list']['water'] = '水';
$app_list_strings['marker_image_list']['waterfall'] = '瀑布';
$app_list_strings['marker_image_list']['watermill'] = '水車';
$app_list_strings['marker_image_list']['waterpark'] = '水上公園';
$app_list_strings['marker_image_list']['watertower'] = '水塔';
$app_list_strings['marker_image_list']['wednesday'] = '星期三';
$app_list_strings['marker_image_list']['wifi'] = '無線上網';
$app_list_strings['marker_image_list']['wind_turbine'] = '風力發電';
$app_list_strings['marker_image_list']['windmill'] = '風車';
$app_list_strings['marker_image_list']['winery'] = '酒廠';
$app_list_strings['marker_image_list']['work_office'] = '工作辦公室';
$app_list_strings['marker_image_list']['world_heritage_site'] = '世界遺產';
$app_list_strings['marker_image_list']['zoo'] = '動物園';


//Reschedule
$app_list_strings['call_reschedule_dom'][''] = '';
$app_list_strings['call_reschedule_dom']['Out of Office'] = '外出';
$app_list_strings['call_reschedule_dom']['In a Meeting'] = '會議中';

$app_strings['LBL_RESCHEDULE_LABEL'] = '再預約';
$app_strings['LBL_RESCHEDULE_TITLE'] = '請輸入再預約資訊';
$app_strings['LBL_RESCHEDULE_DATE'] = '日期:';
$app_strings['LBL_RESCHEDULE_REASON'] = '原因:';
$app_strings['LBL_RESCHEDULE_ERROR1'] = '請選擇有效日期';
$app_strings['LBL_RESCHEDULE_ERROR2'] = '請選擇原因';

$app_strings['LBL_RESCHEDULE_PANEL'] = '再預約';
$app_strings['LBL_RESCHEDULE_HISTORY'] = '通聯記錄';
$app_strings['LBL_RESCHEDULE_COUNT'] = '通聯';

//SecurityGroups
$app_list_strings["moduleList"]["SecurityGroups"] = '群組管理';
$app_strings['LBL_LOGIN_AS'] = "登入以";
$app_strings['LBL_LOGOUT_AS'] = "登出以";
$app_strings['LBL_SECURITYGROUP'] = '群組';

//social
$app_strings['FACEBOOK_USER_C'] = 'Facebook';
$app_strings['TWITTER_USER_C'] = 'Twitter';
$app_strings['LBL_FACEBOOK_USER_C'] = 'Facebook用戶';
$app_strings['LBL_TWITTER_USER_C'] = 'Twitter用戶';
$app_strings['LBL_PANEL_SOCIAL_FEED'] = '社群來源詳情';

$app_strings['LBL_SUBPANEL_FILTER_LABEL'] = '過濾器';

$app_strings['LBL_QUICK_ACCOUNT'] = '新建帳戶';
$app_strings['LBL_QUICK_CONTACT'] = '新增聯繫人';
$app_strings['LBL_QUICK_OPPORTUNITY'] = '新增商業機會';
$app_strings['LBL_QUICK_LEAD'] = '新增潛在客戶';
$app_strings['LBL_QUICK_DOCUMENT'] = '新增文檔';
$app_strings['LBL_QUICK_CALL'] = '安排電話';
$app_strings['LBL_QUICK_TASK'] = '新增任務';
$app_strings['LBL_COLLECTION_TYPE'] = '類型';

$app_strings['LBL_ADD_TAB'] = '新增標籤';
$app_strings['LBL_SUITE_DASHBOARD'] = '儀表頁面';
$app_strings['LBL_ENTER_DASHBOARD_NAME'] = '輸入儀表名稱:';
$app_strings['LBL_NUMBER_OF_COLUMNS'] = '點擊一個圖表來選擇列的編號';
$app_strings['LBL_DELETE_DASHBOARD1'] = '您確定要刪除';
$app_strings['LBL_DELETE_DASHBOARD2'] = '儀表?';
$app_strings['LBL_ADD_DASHBOARD_PAGE'] = '新增儀表頁面';
$app_strings['LBL_DELETE_DASHBOARD_PAGE'] = '刪除此儀表頁面';
$app_strings['LBL_RENAME_DASHBOARD_PAGE'] = '重新命名儀表頁面';

$app_strings['LBL_DISCOVER_SUITECRM'] = '探索SuiteCRM';

$app_list_strings['collection_temp_list'] = array ( 'Tasks' => '任務', 'Meetings' => '會議', 'Calls' => '電話', 'Notes' => '備忘錄', 'Emails' => '電子郵件' );

?>
