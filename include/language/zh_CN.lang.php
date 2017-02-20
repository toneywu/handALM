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
  'language_pack_name' => '简体中文 Chinese (Simplified) - zh_CN',
  'moduleList' =>
  array (
    'Home' => '首页',
    'Contacts' => '联系人',
    'Accounts' => '客户',
    'Opportunities' => '商业机会',
    'Cases' => '客户反馈',
    'Notes' => '备忘录',
    'Calls' => '电话',
    'Emails' => '电子邮件',
    'Meetings' => '会议',
    'Tasks' => '任务',
    'Calendar' => '日程安排',
    'Leads' => '潜在客户',
    'Currencies' => '货币',
    'Activities' => '活动',
    'Bugs' => '缺陷追踪',
    'Feeds' => 'RSS',
    'iFrames'=>'我的网站',
    'TimePeriods'=>'时段',
    'TaxRates'=>'税率',
    'ContractTypes' => '合同类型',
    'Schedulers'=>'任务计划',
    'Project'=>'项目',
    'ProjectTask'=>'项目任务',
    'Campaigns'=>'市场活动',
    'CampaignLog'=>'市场活动日志',
    'Documents'=>'文档',
    'DocumentRevisions'=>'文档版本',
    'Connectors'=>'连接器',
    'Roles'=>'角色',
    'Notifications'=>'提醒',
    'Sync'=>'同步',
    'Users' => '用户',
    'Employees' => '员工',
    'Administration' => '管理员',
    'ACLRoles' => '角色',
    'InboundEmail' => '收件箱',
    'Releases' => '版本',
    'Prospects' => '目标',
    'Queues' => '队列',
    'EmailMarketing' => '电子邮件营销',
    'EmailTemplates' => '电子邮件模版',
    'SNIP' => "Email归档",
    'ProspectLists' => '目标列表',
    'SavedSearch' => '已保存的查询结果',
    'UpgradeWizard' => '升级向导',
    'Trackers' => '追踪',
    'TrackerPerfs' => '性能追踪',
    'TrackerSessions' => 'Session追踪',
    'TrackerQueries' => '查询追踪',
    'FAQ' => '常见问题',
    'Newsletters' => '列表',
    'SugarFeed'=>'SuiteCRM Feed',
    'KBDocuments' => '基础知识',
  'SugarFavorites'=>'SuiteCRM 收藏夹',

    'OAuthKeys' => 'OAuth 消费者密钥',
    'OAuthTokens' => 'OAuth 令牌（Tokens）',
  ),

  'moduleListSingular' =>
  array (
    'Home' => '首页',
    'Dashboard' => '统计图',
    'Contacts' => '联系人',
    'Accounts' => '客户',
    'Opportunities' => '商业机会',
    'Cases' => '客户反馈',
    'Notes' => '备忘录',
    'Calls' => '电话',
    'Emails' => '电子邮件',
    'Meetings' => '会议',
    'Tasks' => '任务',
    'Calendar' => '日程安排',
    'Leads' => '潜在客户',
    'Activities' => '活动',
    'Bugs' => '缺陷追踪',
    'KBDocuments' => '基础知识',
    'Feeds' => 'RSS',
    'iFrames'=>'我的网站',
    'TimePeriods'=>'时段',
    'Project'=>'项目管理',
    'ProjectTask'=>'项目任务',
    'Prospects' => '目标',
    'Campaigns'=>'市场活动',
    'Documents'=>'文档',
    'SugarFollowing'=>'SuiteCRM 跟随',
    'Sync'=>'同步',
    'Users' => '用户',
  'SugarFavorites'=>'SuiteCRM 收藏夹'

        ),

  'checkbox_dom'=> array(
    ''=>'',
    '1'=>'是',
    '2'=>'中 Boost',
  ),

  //e.g. en franï¿½ais 'Analyst'=>'Analyste',
  'account_type_dom' =>
  array (
    '' => '',
    'Analyst' => '分析者',
    'Competitor' => '竞争对手',
    'Customer' => '客户',
    'Integrator' => '总包方',
    'Investor' => '投资者',
    'Partner' => '合作伙伴',
    'Press' => '出版商',
    'Prospect' => '设计院',
    'Reseller' => '经销商',
    'Other' => '其它',
  ),
  //e.g. en espaï¿½ol 'Apparel'=>'Ropa',
  'industry_dom' =>
  array (
    '' => '',
    'Apparel' => '服裝',
    'Banking' => '银行',
    'Biotechnology' => '生物技术',
    'Chemicals' => '化学化工',
    'Communications' => '通讯',
    'Construction' => '建筑',
    'Consulting' => '咨询',
    'Education' => '教育',
    'Electronics' => '电子',
    'Energy' => '能源',
    'Engineering' => '工程设计',
    'Entertainment' => '文化',
    'Environmental' => '环境保护',
    'Finance' => '金融',
    'Government' => '政府机构',
    'Healthcare' => '卫生保健',
    'Hospitality' => '医疗机构',
    'Insurance' => '保险',
    'Machinery' => '机械',
    'Manufacturing' => '制造业',
    'Media' => '新闻媒介',
    'Not For Profit' => '非盈利机构',
    'Recreation' => '娱乐',
    'Retail' => '批发零售',
    'Shipping' => '海运',
    'Technology' => '科技',
    'Telecommunications' => '电信',
    'Transportation' => '运输',
    'Utilities' => '公用事业',
    'Other' => '其它',
  ),
  'lead_source_default_key' => 'Self Generated',
  'lead_source_dom' =>
  array (
    '' => '',
    'Cold Call' => '意外来访',
    'Existing Customer' => '现有客户',
    'Self Generated' => '自产',
    'Employee' => '员工',
    'Partner' => '合作伙伴',
    'Public Relations' => '公共关系',
    'Direct Mail' => '直邮',
    'Conference' => '会议',
    'Trade Show' => '展览',
    'Web Site' => '网站',
    'Word of mouth' => '他人介紹',
    'Email' => '电子邮件',
    'Campaign'=>'市场活动',
    'Other' => '其它',
  ),
  'opportunity_type_dom' =>
  array (
    '' => '',
    'Existing Business' => '置换项目',
    'New Business' => '新项目',
  ),
  'roi_type_dom' =>
    array (
    'Revenue' => '收入',
    'Investment'=>'投资',
    'Expected_Revenue'=>'期望收入',
    'Budget'=>'预算',

  ),
  //Note:  do not translate opportunity_relationship_type_default_key
//       it is the key for the default opportunity_relationship_type_dom value
  'opportunity_relationship_type_default_key' => 'Primary Decision Maker',
  'opportunity_relationship_type_dom' =>
  array (
    '' => '',
    'Primary Decision Maker' => '主要决策人',
    'Business Decision Maker' => '商业决策者',
    'Business Evaluator' => '商业评估者',
    'Technical Decision Maker' => '技术决策者',
    'Technical Evaluator' => '技术评估人',
    'Executive Sponsor' => '主管助理',
    'Influencer' => '影响者',
    'Other' => '其它',
  ),
  //Note:  do not translate case_relationship_type_default_key
//       it is the key for the default case_relationship_type_dom value
  'case_relationship_type_default_key' => 'Primary Contact',
  'case_relationship_type_dom' =>
  array (
    '' => '',
    'Primary Contact' => '主要联系人',
    'Alternate Contact' => '其他联系人',
  ),
  'payment_terms' =>
  array (
    '' => '',
    'Net 15' => '货到15天付款',
    'Net 30' => '货到30天付款',
  ),
  'sales_stage_default_key' => 'Prospecting',
  'fts_type' => array (
      '' => '',
      'Elastic' => '弹性搜索'
  ),
  'sales_stage_dom' =>
  array (
    'Prospecting' => '销售前景',
    'Qualification' => '资格合格',
    'Needs Analysis' => '需要分析',
    'Value Proposition' => '价值陈述',
    'Id. Decision Makers' => '辨识决策者',
    'Perception Analysis' => '感觉分析',
    'Proposal/Price Quote' => '建议/出价',
    'Negotiation/Review' => '谈判/回顾',
    'Closed Won' => '成单',
    'Closed Lost' => '丢单',
  ),
  'in_total_group_stages' => array (
    'Draft' => '草稿',
    'Negotiation' => '谈判',
    'Delivered' => '已交付',
    'On Hold' => '等待',
    'Confirmed' => '已确认',
    'Closed Accepted' => '谈成结束',
    'Closed Lost' => '丢单',
    'Closed Dead' => '未成结束',
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
    'Call' => '电话',
    'Meeting' => '会议',
    'Task' => '任务',
    'Email' => '电子邮件',
    'Note' => '备忘录',
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
  'reminder_time_options' => array( 60=> '1分钟前',
                                  300=> '5分钟前',
                                  600=> '10分钟前',
                                  900=> '15分钟前',
                                  1800=> '30分钟前',
                                  3600=> '1小时前',
                                  7200 => '2小时前',
                                  10800 => '3小时前',
                                  18000 => '5小时前',
                                  86400 => '1天前',
                                 ),

  'task_priority_default' => '中',
  'task_priority_dom' =>
  array (
    'High' => '高',
    'Medium' => '中',
    'Low' => '低',
  ),
  'task_status_default' => '未开始',
  'task_status_dom' =>
  array (
    'Not Started' => '未开始',
    'In Progress' => '处理中',
    'Completed' => '完成',
    'Pending Input' => '等待输入',
    'Deferred' => '延期',
  ),
  'meeting_status_default' => 'Planned',
  'meeting_status_dom' =>
  array (
    'Planned' => '已计划',
    'Held' => '完成',
    'Not Held' => '未开始',
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
    'Planned' => '已计划',
    'Held' => '完成',
    'Not Held' => '未开始',
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
    'In Process' => '处理中',
    'Converted' => '已转换',
    'Recycled' => '已重复',
    'Dead' => '终止',
  ),
   'gender_list' =>
  array (
    'male' => '男性',
    'female' => '女性',
  ),
  //Note:  do not translate case_status_default_key
//       it is the key for the default case_status_dom value
  'case_status_default_key' => '新建',
  'case_status_dom' =>
  array (
    'New' => '新增',
    'Assigned' => '已分配',
    'Closed' => '结束',
    'Pending Input' => '等待输入',
    'Rejected' => '拒绝',
    'Duplicate' => '重复',
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
    'RegularUser' => '普通用户',
    'Administrator' => '管理员',
  ),
  'user_status_dom' =>
  array (
    'Active' => '启用',
    'Inactive' => '停用',
  ),
  'employee_status_dom' =>
  array (
    'Active' => '启用',
    'Terminated' => '离职',
    'Leave of Absence' => '休假',
  ),
  'messenger_type_dom' =>
  array (
    '' => '',
    'MSN' => 'MSN',
    'Yahoo!' => '雅虎',
    'AOL' => 'QQ',
  ),
    'project_task_priority_options' => array (
        'High' => '高',
        'Medium' => '中',
        'Low' => '低',
    ),
    'project_task_priority_default' => '中',

    'project_task_status_options' => array (
        'Not Started' => '未开始',
        'In Progress' => '处理中',
        'Completed' => '完成',
        'Pending Input' => '等待输入',
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
        'In Review' => '审查中',
        'Underway' => '正在经行中',
        'On_Hold' => '等待',
        'Completed' => '完成',
    ),
    'project_status_default' => '拟订',

    'project_duration_units_dom' => array (
        'Days' => '天',
        'Hours' => '小时',
    ),

    'project_priority_options' => array (
        'High' => '高',
        'Medium' => '中',
        'Low' => '低',
    ),
    'project_priority_default' => '中',
  //Note:  do not translate record_type_default_key
//       it is the key for the default record_type_module value
  'record_type_default_key' => '帐户名称',
  'record_type_display' =>
  array (
    '' => '',
    'Accounts' => '客户',
    'Opportunities' => '商业机会',
    'Cases' => '客户反馈',
    'Leads' => '潜在客户',
    'Contacts' => '联系人', // cn (11/22/2005) added to support Emails


    'Bugs' => '缺陷追踪',
    'Project' => '项目管理',

    'Prospects' => '目标',
    'ProjectTask' => '项目任务',


    'Tasks' => '任务',

  ),

  'record_type_display_notes' =>
  array (
    'Accounts' => '客户',
    'Contacts' => '联系人',
    'Opportunities' => '商业机会',
    'Tasks' => '任务',
    'Emails' => '电子邮件',

    'Bugs' => '缺陷追踪',
    'Project' => '项目管理',
    'ProjectTask' => '项目任务',
    'Prospects' => '目标',
    'Cases' => '客户反馈',
    'Leads' => '潜在客户',

    'Meetings' => '会议',
    'Calls' => '电话',
  ),

  'parent_type_display' =>
  array (
    'Accounts' => '客户',
    'Contacts' => '联系人',
    'Tasks' => '任务',
    'Opportunities' => '商业机会',



    'Bugs' => '缺陷追踪',
    'Cases' => '客户反馈',
    'Leads' => '潜在客户',

    'Project' => '项目管理',
    'ProjectTask' => '项目任务',

    'Prospects' => '目标',

  ),

  'issue_priority_default_key' => '中',
  'issue_priority_dom' =>
  array (
    'Urgent' => '紧急',
    'High' => '高',
    'Medium' => '中',
    'Low' => '低',
  ),
  'issue_resolution_default_key' => '',
  'issue_resolution_dom' =>
  array (
    '' => '',
    'Accepted' => '已接受',
    'Duplicate' => '重复',
    'Closed' => '结束',
    'Out of Date' => '过期',
    'Invalid' => '无效',
  ),

  'issue_status_default_key' => '新建',
  'issue_status_dom' =>
  array (
    'New' => '新增',
    'Assigned' => '已分配',
    'Closed' => '结束',
    'Pending' => '未决定',
    'Rejected' => '拒绝',
  ),

  'bug_priority_default_key' => '中',
  'bug_priority_dom' =>
  array (
    'Urgent' => '紧急',
    'High' => '高',
    'Medium' => '中',
    'Low' => '低',
  ),
   'bug_resolution_default_key' => '',
  'bug_resolution_dom' =>
  array (
    '' => '',
    'Accepted' => '已接受',
    'Duplicate' => '重复',
    'Fixed' => '固定价格',
    'Out of Date' => '过期',
    'Invalid' => '无效',
    'Later' => '以后',
  ),
  'bug_status_default_key' => '新建',
  'bug_status_dom' =>
  array (
    'New' => '新增',
    'Assigned' => '已分配',
    'Closed' => '结束',
    'Pending' => '未决定',
    'Rejected' => '拒绝',
  ),
   'bug_type_default_key' => '缺陷追踪',
  'bug_type_dom' =>
  array (
    'Defect' => '缺陷',
    'Feature' => '特性',
  ),
 'case_type_dom' =>
  array (
    'Administration' => '管理员',
    'Product' => '产品',
    'User' => '用户',
  ),

  'source_default_key' => '',
  'source_dom' =>
  array (
    '' => '',
    'Internal' => '内部',
    'Forum' => '论坛',
    'Web' => '网络',
    'InboundEmail' => '收件箱'
  ),

  'product_category_default_key' => '',
  'product_category_dom' =>
  array (
    '' => '',
    'Accounts' => '客户',
    'Activities' => '活动',
    'Bugs' => '缺陷追踪',
    'Calendar' => '日程安排',
    'Calls' => '电话',
    'Campaigns' => '市场活动',
    'Cases' => '客户反馈',
    'Contacts' => '联系人',
    'Currencies' => '货币',
  'Dashboard' => '统计图',
  'Documents' => '文档',
    'Emails' => '电子邮件',
    'Feeds' => 'Feeds',
    'Forecasts' => '销售预测',
    'Help' => '帮助',
    'Home' => '首页',
  'Leads' => '潜在客户',
  'Meetings' => '会议',
    'Notes' => '备忘录',
    'Opportunities' => '商业机会',
    'Outlook Plugin' => 'Outlook插件',
    'Projects' => '项目',
    'Quotes' => '报价',
    'Releases' => '版本',
    'RSS' => 'RSS',
    'Studio' => '工作室',
    'Upgrade' => '更新',
    'Users' => '用户',
  ),
  /*Added entries 'Queued' and 'Sending' for 4.0 release..*/
  'campaign_status_dom' =>
  array (
        '' => '',
        'Planning' => '计划中',
        'Active' => '启用',
        'Inactive' => '停用',
        'Complete' => '完成',
        'In Queue' => '队列中',
        'Sending'=> '发送中',
  ),
  'campaign_type_dom' =>
  array (
        '' => '',
        'Telesales' => '电话行销',
        'Mail' => '邮件',
        'Email' => '电子邮件',
        'Print' => '打印',
        'Web' => '网络',
        'Radio' => '广播',
        'Television' => '电视',
        'NewsLetter' => '简讯',
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
                '1'=>"一月",
                '2'=>"二月",
                '3'=>"高 Boost",
                '4'=>"(GMT+4)喀布尔",
                '5'=>"(GMT+5)叶卡特琳堡",
                '6'=>"(GMT+6)阿斯塔纳",
                '7'=>"(GMT+7)曼谷",
                '8'=>"(GMT+8)珀斯",
                '9'=>"(GMT+9)汉城",
                '10'=>"(GMT+10)布里斯班",
                '11'=>"(GMT+11)索罗门群岛",
                '12'=>"(GMT+12)奥克兰",
                ),
        'dom_cal_month_short'=>array(
                '0'=>"",
                '1'=>"一月",
                '2'=>"二月",
                '3'=>"三月",
                '4'=>"四月",
                '5'=>"(GMT+5)叶卡特琳堡",
                '6'=>"六月",
                '7'=>"七月",
                '8'=>"八月",
                '9'=>"九月",
                '10'=>"十月",
                '11'=>"十一月",
                '12'=>"十二月",
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
                '1'=>"星期日",
                '2'=>"星期一",
                '3'=>"星期二",
                '4'=>"星期三",
                '5'=>"星期四",
                '6'=>"星期五",
                '7'=>"星期六",
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
                'tabular'=>'行与列',
                'summary'=>'合计',
                'detailed_summary'=>'细节合计',
                'Matrix' => '报表',
        ),


    'dom_email_types'=> array(
        'out'       => '已发送',
        'archived'  => '已存档',
        'draft'     => '草稿',
        'inbound'   => '打入',
        'campaign'  => '市场活动'
    ),
    'dom_email_status' => array (
        'archived'  => '已存档',
        'closed'    => '结束',
        'draft'     => '草稿',
        'read'      => '已阅读',
        'replied'   => '已回复',
        'sent'      => '已发送',
        'send_error'=> '发送错误',
        'unread'    => '未阅读',
    ),
    'dom_email_archived_status' => array (
        'archived'  => '已存档',
    ),

    'dom_email_server_type' => array(   ''          => '无',
                                        'imap'      => 'IMAP',
    ),
    'dom_mailbox_type'      => array(/*''           => '--None Specified--',*/
                                     'pick'     => '新增[任何]',
                                     'createcase'  => '新建客户反馈',
                                     'bounce'   => '处理退信',
    ),
    'dom_email_distribution'=> array(''             => '无',
                                     'direct'       => '直接指派',
                                     'roundRobin'   => '循环',
                                     'leastBusy'    => '最少忙碌',
    ),
    'dom_email_distribution_for_auto_create'=> array('roundRobin'   => '循环',
                                                     'leastBusy'    => '最少忙碌',
    ),
    'dom_email_errors'      => array(1 => '当直接分配物品时只能选择一个用户',
                                     2 => '当直接分配物品时您只能分配查询过的物品',
    ),
    'dom_email_bool'        => array('bool_true' => '是',
                                     'bool_false' => '否',
    ),
    'dom_int_bool'          => array(1 => '是',
                                     0 => '否',
    ),
    'dom_switch_bool'       => array ('on' => '是',
                                        'off' => '否',
                                        '' => '无', ),

    'dom_email_link_type'   => array(   'sugar'     => 'SuiteCRM 电子邮件客户端',
                                        'mailto'    => '外部邮件客户端'),


    'dom_email_editor_option'=> array(  ''          => '无',
                                        'html'      => 'HTML电子邮件',
                                        'plain'     => '纯文本电子邮件'),

    'schedulers_times_dom'  => array(   'not run'       => '超时, 没有被执行',
                                        'ready'         => '就绪',
                                        'in progress'   => '处理中',
                                        'failed'        => '失败',
                                        'completed'     => '完成',
                                        'no curl'       => '未运行:没有可利用的cURL',
    ),

    'scheduler_status_dom' =>
        array (
        'Active' => '启用',
        'Inactive' => '停用',
        ),

    'scheduler_period_dom' =>
        array (
        'min' => '分钟',
        'hour' => '小时',
        ),
    'forecast_schedule_status_dom' =>
    array (
    'Active' => '启用',
    'Inactive' => '停用',
  ),
    'forecast_type_dom' =>
    array (
    'Direct' => '直接',
    'Rollup' => '上滚',
  ),
    'document_category_dom' =>
    array (
    '' => '',
    'Marketing' => '市场',
    'Knowledege Base' => '基础知识',
    'Sales' => '销售',
  ),

    'document_subcategory_dom' =>
    array (
    '' => '',
    'Marketing Collateral' => '市场营销',
    'Product Brochures' => '产品手册',
    'FAQ' => '常见问题',
  ),

    'document_status_dom' =>
    array (
    'Active' => '启用',
    'Draft' => '草稿',
    'FAQ' => '常见问题',
    'Expired' => '有效期',
    'Under Review' => '审查中',
    'Pending' => '未决定',
  ),
  'document_template_type_dom' =>
  array(
    ''=>'',
    'mailmerge'=>'邮件合并',
    'eula'=>'最终用户许可协议',
    'nda'=>'保密协议',
    'license'=>'许可证协议',
  ),
    'dom_meeting_accept_options' =>
    array (
    'accept' => '接受',
    'decline' => '拒绝',
    'tentative' => '搁置',
  ),
    'dom_meeting_accept_status' =>
    array (
    'accept' => '已接受',
    'decline' => '拒绝',
    'tentative' => '搁置',
    'none'      => '无',
  ),
    'duration_intervals' => array('0'=>'00',
                                    '15'=>'15',
                                    '30'=>'30',
                                    '45'=>'45',
  ),
    'repeat_type_dom' => array(
    	'' => '无',
    	'Daily'	=> '日',
	'Weekly' => '周',
	'Monthly' => '月',
	'Yearly' => '年',
    ),

    'repeat_intervals' => array(
        '' => '',
        'Daily' => '天',
        'Weekly' => '星期',
        'Monthly' => '月',
        'Yearly' => '年',
    ),

    'duration_dom' => array(
    	'' => '无',
    	'900' => '15分钟',
	'1800' => '30分钟',
	'2700' => '45分钟',
	'3600' => '1小时',
	'5400' => '1.5小时',
	'7200' => '2小时',
	'10800' => '3小时',
	'21600' => '6小时',
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
    'default' => '默认',
    'seed' => '种子',
    'exempt_domain' => '阻止列表 – 根据域',
    'exempt_address' => '阻止列表 – 根据电子邮件地址',
    'exempt' => '阻止列表 – 根据编号',
    'test' => '测试',
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
    'active'=>'启用',
    'inactive'=>'停用'
  ),

  'campainglog_activity_type_dom' =>
  array (
    ''=>'',
    'targeted' => '尝试发送/发送消息',
    'send error'=>'退信，其它',
    'invalid email'=>'退信，无效的邮箱',
    'link'=>'点击链接',
    'viewed'=>'已查看的信息',
    'removed'=>'可退出的邮件',
    'lead'=>'现有销售潜在客户',
    'contact'=>'新增联系人',
    'blocked'=>'禁止的邮件地址或域',
  ),

  'campainglog_target_type_dom' =>
  array (
    'Contacts' => '联系人',
    'Users'=>'用户',
    'Prospects'=>'目标',
    'Leads'=>'潜在客户',
    'Accounts'=>'客户',
  ),
  'merge_operators_dom' => array (
    'like'=>'包括',
    'exact'=>'精确地',
    'start'=>'开始于',
  ),

  'custom_fields_importable_dom' => array (
    'true'=>'是',
    'false'=>'否',
    'required'=>'必要',
  ),

    'Elastic_boost_options' => array (
        '0' =>'已停用',
        '1'=>'低推进',
        '2'=>'中推进',
        '3'=>'高推进',
    ),

  'custom_fields_merge_dup_dom'=> array (
        0=>'已停用',
        1=>'已启用',
  ),

  'navigation_paradigms' => array(
        'm'=>'模块',
        'gm'=>'分组模块',
  ),


    'projects_priority_options' => array (
        'high'      => '高',
        'medium'    => '中',
        'low'       => '低',
    ),

    'projects_status_options' => array (
        'notstarted'    => '未开始',
        'inprogress'    => '处理中',
        'completed'     => '完成',
    ),
    // strings to pass to Flash charts
    'chart_strings' => array (
        'expandlegend'      => '打开图例',
        'collapselegend'    => '关闭图例',
        'clickfordrilldown' => '单击获取更多信息',
        'drilldownoptions'  => '获取何种信息',
        'detailview'        => '更多细节...',
        'piechart'          => '饼状图表',
        'groupchart'        => '图表组',
        'stackedchart'      => '图表栈',
        'barchart'      => '柱状图表',
        'horizontalbarchart'   => '水平柱状图表',
        'linechart'         => '线状图表',
        'noData'            => '无效数据',
        'print'       => '打印',
        'pieWedgeName'      => '段',
    ),
    'release_status_dom' =>
    array (
        'Active' => '启用',
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
        '\'' => '单引号 (\')',
        '"' => '双引号 (")',
        '' => '无',
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
        '_self' => '当前窗口',
    ),
    'dashlet_auto_refresh_options' =>
    array (
        '-1'  => '(GMT-1)亚述尔群岛',
        '30'  => '每隔 30 秒',
        '60'  => '每1分钟',
        '180'   => '每3分钟',
        '300'   => '每5分钟',
        '600'   => '每10分钟',
    ),
  'dashlet_auto_refresh_options_admin' =>
    array (
        '-1'  => '从不',
        '30'  => '每30秒',
        '60'  => '每1分钟',
        '180'   => '每3分钟',
        '300'   => '每5分钟',
        '600'   => '每10分钟',
    ),
  'date_range_search_dom' =>
  array(
    '=' => '等于',
    'not_equal' => '不等于',
    'greater_than' => '以后',
    'less_than' => '以前',
    'last_7_days' => '过去7天',
    'next_7_days' => '未来7天',
    'last_30_days' => '过去30天',
    'next_30_days' => '未来30天',
    'last_month' => '上个月',
    'this_month' => '这个月',
    'next_month' => '下个月',
    'last_year' => '去年',
    'this_year' => '今年',
    'next_year' => '明年',
    'between' => '在该范围内',
  ),
  'numeric_range_search_dom' =>
  array(
    '=' => '等于',
    'not_equal' => '不等于',
    'greater_than' => '大于',
    'greater_than_equals' => '大于等于',
    'less_than' => '小于',
    'less_than_equals' => '小于等于',
    'between' => '在该范围内',
  ),
  'lead_conv_activity_opt' =>
  array(
        'copy' => '拷贝',
        'move' => '移动',
        'donothing' => '什么都不做',
  ),
);

$app_strings = array (
  'LBL_TOUR_NEXT' => '下页',
  'LBL_TOUR_SKIP' => '跳过',
  'LBL_TOUR_BACK' => '返回',
  'LBL_TOUR_CLOSE' => '关闭',
  'LBL_TOUR_TAKE_TOUR' => '请浏览',
  'LBL_MY_AREA_LINKS' => '我的链接: ' /*for 508 compliance fix*/,
  'LBL_GETTINGAIR' => '获得Air' /*for 508 compliance fix*/,
  'LBL_WELCOMEBAR' => '欢迎' /*for 508 compliance fix*/,
  'LBL_ADVANCEDSEARCH' => '高级搜索' /*for 508 compliance fix*/,
  'LBL_MOREDETAIL' => '详细信息' /*for 508 compliance fix*/,
  'LBL_EDIT_INLINE' => '内联编辑' /*for 508 compliance fix*/,
  'LBL_VIEW_INLINE' => '查看' /*for 508 compliance fix*/,
  'LBL_BASIC_SEARCH' => '筛选' /*for 508 compliance fix*/,
  'LBL_PROJECT_MINUS' => '移除' /*for 508 compliance fix*/,
  'LBL_PROJECT_PLUS' => '添加' /*for 508 compliance fix*/,
  'LBL_Blank' => ' ' /*for 508 compliance fix*/,
  'LBL_ICON_COLUMN_1' => '1 列' /*for 508 compliance fix*/,
  'LBL_ICON_COLUMN_2' => '2 列' /*for 508 compliance fix*/,
  'LBL_ICON_COLUMN_3' => '3 列' /*for 508 compliance fix*/,
  'LBL_ID_FF_ADD' => '添加' /*for 508 compliance fix*/,
  'LBL_HIDE_SHOW' => '隐藏/显示' /*for 508 compliance fix*/,
  'LBL_DELETE_INLINE' => '删除' /*for 508 compliance fix*/,
  'LBL_PLUS_INLINE' => '添加' /*for 508 compliance fix*/,
  'LBL_ID_FF_CLEAR' => '清除' /*for 508 compliance fix*/,
  'LBL_ID_FF_VCARD' => '电子名片' /*for 508 compliance fix*/,
  'LBL_ID_FF_REMOVE' => '移除' /*for 508 compliance fix*/,
  'LBL_ADD' => '添加' /*for 508 compliance fix*/,
  'LBL_COMPANY_LOGO' => '公司徽标' /*for 508 compliance fix*/,
  'LBL_JS_CALENDAR' => '日历' /*for 508 compliance fix*/,
    'LBL_ADVANCED' => '高级',
    'LBL_BASIC' => '基础',
    'LBL_MODULE_FILTER' => '过滤条件',
    'LBL_CONNECTORS_POPUPS'=>'连接器弹出窗口',
    'LBL_CLOSEINLINE'=>'关闭',
    'LBL_EDITINLINE'=>'编辑',
    'LBL_VIEWINLINE'=>'查看',
    'LBL_INFOINLINE'=>'信息',
    'LBL_POWERED_BY_SUGARCRM' => '由 SugarCRM 系统架构而成',
    'LBL_PRINT' => '打印',
    'LBL_HELP' => '帮助',
    'LBL_ID_FF_SELECT' => '选择',
    'DEFAULT'                              => '基本',
    'LBL_SORT'                              => '排序',
    'LBL_OUTBOUND_EMAIL_ADD_SERVER'         => '添加服务器...',
    'LBL_EMAIL_SMTP_SSL_OR_TLS'         => '以SSL或TLS启用SMTP',
    'LBL_NO_ACTION'                         => '没有找到对应action名。',
    'LBL_NO_DATA'                           => '无数据',
    'LBL_ROUTING_ADD_RULE'                  => '添加规则',
    'LBL_ROUTING_ALL'                       => '全部',
    'LBL_ROUTING_ANY'                       => '任何',
    'LBL_ROUTING_BREAK'                     => '--',
    'LBL_ROUTING_BUTTON_CANCEL'             => '取消',
    'LBL_ROUTING_BUTTON_SAVE'               => '保存规则',

    'LBL_ROUTING_ACTIONS_COPY_MAIL'         => '复制邮件',
    'LBL_ROUTING_ACTIONS_DELETE_BEAN'       => '删除 SuiteCRM 物件',
    'LBL_ROUTING_ACTIONS_DELETE_FILE'       => '删除文件',
    'LBL_ROUTING_ACTIONS_DELETE_MAIL'       => '删除邮件',
    'LBL_ROUTING_ACTIONS_FORWARD'           => '转交邮件',
    'LBL_ROUTING_ACTIONS_MARK_FLAGGED'      => '标志邮件',
    'LBL_ROUTING_ACTIONS_MARK_READ'         => '标注邮件',
    'LBL_ROUTING_ACTIONS_MARK_UNREAD'       => '标注未读',
    'LBL_ROUTING_ACTIONS_MOVE_MAIL'         => '移动邮件',
    'LBL_ROUTING_ACTIONS_PEFORM'            => '执行接下来的动作',
    'LBL_ROUTING_ACTIONS_REPLY'             => '回复邮件',

    'LBL_ROUTING_CHECK_RULE'                => '一个错误被防护:\n',
    'LBL_ROUTING_CHECK_RULE_DESC'           => '请验证所有被标注的字段.',
    'LBL_ROUTING_CONFIRM_DELETE'            => '您确定您要删除这条规则么?\n这不能被重做.',

    'LBL_ROUTING_FLAGGED'                   => '标识设置',
    'LBL_ROUTING_FORM_DESC'                 => '保存的规则被立即激活.',
    'LBL_ROUTING_FW'                        => '转发: ',
    'LBL_ROUTING_LIST_TITLE'                => '规则',
    'LBL_ROUTING_MATCH'                     => '如果',
    'LBL_ROUTING_MATCH_2'                   => '以下条件被遇到:',
    'LBL_NOTIFICATIONS'                     => '提醒',
    'LBL_ROUTING_MATCH_CC_ADDR'             => '抄送',
    'LBL_ROUTING_MATCH_DESCRIPTION'         => '主要内容',
    'LBL_ROUTING_MATCH_FROM_ADDR'           => '来自',
    'LBL_ROUTING_MATCH_NAME'                => '主题',
    'LBL_ROUTING_MATCH_PRIORITY_HIGH'       => '高优先级',
    'LBL_ROUTING_MATCH_PRIORITY_NORMAL'     => '中优先级 ',
    'LBL_ROUTING_MATCH_PRIORITY_LOW'        => '低优先级',
    'LBL_ROUTING_MATCH_TO_ADDR'             => '到',
    'LBL_ROUTING_MATCH_TYPE_MATCH'          => '包含',
    'LBL_ROUTING_MATCH_TYPE_NOT_MATCH'      => '不包含',

    'LBL_ROUTING_NAME'                      => '规则名称',
    'LBL_ROUTING_NEW_NAME'                  => '新规则',
    'LBL_ROUTING_ONE_MOMENT'                => '请稍等...',
    'LBL_ROUTING_ORIGINAL_MESSAGE_FOLLOWS'  => '原始信息跟随.',
    'LBL_ROUTING_RE'                        => '回复: ',
    'LBL_ROUTING_SAVING_RULE'               => '保存规则',
    'LBL_ROUTING_SUB_DESC'                  => '检查的规则是有效的. 点击名称来编辑.',
    'LBL_ROUTING_TO'                        => '到',
    'LBL_ROUTING_TO_ADDRESS'                => '到地址',
    'LBL_ROUTING_WITH_TEMPLATE'             => '与模板',
  'NTC_OVERWRITE_ADDRESS_PHONE_CONFIRM' => '当前表单中的电话和地址字段不为空，覆盖选中客户的电话和地址信息，请点击"OK".保持原值，请点击"取消".',
  'LBL_DROP_HERE' => '[拖放到这里]',
    'LBL_EMAIL_ACCOUNTS_EDIT'               => '编辑',
    'LBL_EMAIL_ACCOUNTS_GMAIL_DEFAULTS'     => '设置邮件缺省值',
    'LBL_EMAIL_ACCOUNTS_NAME'               => '名称',
    'LBL_EMAIL_ACCOUNTS_OUTBOUND'           => '外部邮件服务器',
    'LBL_EMAIL_ACCOUNTS_SENDTYPE'           => '邮件转交代理',
    'LBL_EMAIL_ACCOUNTS_SMTPAUTH_REQ'       => '使用SMTP认证?',
    'LBL_EMAIL_ACCOUNTS_SMTPPASS'           => 'SMTP密码',
    'LBL_EMAIL_ACCOUNTS_SMTPPORT'           => 'SMTP端口',
    'LBL_EMAIL_ACCOUNTS_SMTPSERVER'         => 'SMTP服务器',
    'LBL_EMAIL_ACCOUNTS_SMTPSSL'            => '连接时使用SSL',
    'LBL_EMAIL_ACCOUNTS_SMTPUSER'           => 'SMTP用户名',
    'LBL_EMAIL_ACCOUNTS_SMTPDEFAULT'        => '缺省',
    'LBL_EMAIL_WARNING_MISSING_USER_CREDS'  => '警告：没有发信电子邮件帐号的用户名和密码。',
    'LBL_EMAIL_ACCOUNTS_SMTPUSER_REQD'      => '必须输入 SMTP 用户名',
    'LBL_EMAIL_ACCOUNTS_SMTPPASS_REQD'      => '必须输入 SMTP 密码',
    'LBL_EMAIL_ACCOUNTS_TITLE'              => '邮件帐户管理',
    'LBL_EMAIL_POP3_REMOVE_MESSAGE'     => '从下个版本开始, 我们将不再支持POP3协议, 我们只支持IMAP协议.',
  'LBL_EMAIL_ACCOUNTS_SUBTITLE'           => '设置接收的电子邮件帐号。',
  'LBL_EMAIL_ACCOUNTS_OUTBOUND_SUBTITLE'  => '提供SMTP服务器相关设置。',
    'LBL_EMAIL_ADD'                         => '添加地址',

    'LBL_EMAIL_ADDRESS_BOOK_ADD'            => '添加',
    'LBL_EMAIL_ADDRESS_BOOK_CLEAR'          => '清除',
    'LBL_EMAIL_ADDRESS_BOOK_ADD_TO'         => '至：',
    'LBL_EMAIL_ADDRESS_BOOK_ADD_CC'         => '抄送：',
    'LBL_EMAIL_ADDRESS_BOOK_ADD_BCC'        => '密送：',
    'LBL_EMAIL_ADDRESS_BOOK_ADRRESS_TYPE'   => '致/抄送/密送',
    'LBL_EMAIL_ADDRESS_BOOK_ADD_LIST'       => '新建列表',
    'LBL_EMAIL_ADDRESS_BOOK_EMAIL_ADDR'     => '邮件地址',
    'LBL_EMAIL_ADDRESS_BOOK_ERR_NOT_CONTACT'=> '现在只有编辑联系人是被支持的.',
    'LBL_EMAIL_ADDRESS_BOOK_FILTER'         => '过滤器',
    'LBL_EMAIL_ADDRESS_BOOK_FIRST_NAME'     => '名字',
    'LBL_EMAIL_ADDRESS_BOOK_LAST_NAME'      => '姓',
    'LBL_EMAIL_ADDRESS_BOOK_MY_CONTACTS'    => '我的联系人',
    'LBL_EMAIL_ADDRESS_BOOK_MY_LISTS'       => '我的邮件列表',
    'LBL_EMAIL_ADDRESS_BOOK_NAME'           => '名称',
    'LBL_EMAIL_ADDRESS_BOOK_NOT_FOUND'      => '无地址被发现',
    'LBL_EMAIL_ADDRESS_BOOK_SAVE_AND_ADD'   => '保存 & 添加到地址薄',
    'LBL_EMAIL_ADDRESS_BOOK_SEARCH'         => '查找',
    'LBL_EMAIL_ADDRESS_BOOK_SELECT_TITLE'   => '选择地址薄入口',
    'LBL_EMAIL_ADDRESS_BOOK_TITLE'          => '地址薄',
    'LBL_EMAIL_REPORTS_TITLE'               => '报表',
    'LBL_EMAIL_ADDRESS_BOOK_TITLE_ICON'     => SugarThemeRegistry::current()->getImage('icon_email_addressbook', "", null, null, ".gif", 'Address Book').' 通讯簿：',
    'LBL_EMAIL_ADDRESS_BOOK_TITLE_ICON_SHORT'     => SugarThemeRegistry::current()->getImage('icon_email_addressbook', 'align=absmiddle border=0', 14, 14, ".gif", ''),
    'LBL_EMAIL_REMOVE_SMTP_WARNING'         => '警告! 你要删除的电子邮件外发帐号已经与一个电子邮件接收帐号绑定。你是否确信要删除这个帐号？',
    'LBL_EMAIL_ADDRESSES'                   => '邮件地址',
    'LBL_EMAIL_ADDRESS_PRIMARY'             => '邮件地址',
    'LBL_EMAIL_ADDRESSES_TITLE'             => '邮件地址',
    'LBL_EMAIL_ARCHIVE_TO_SUGAR'            => '导入到 SuiteCRM',
    'LBL_EMAIL_ASSIGNMENT'                  => '分配',
    'LBL_EMAIL_ATTACH_FILE_TO_EMAIL'        => '添加邮件附件到邮件中',
    'LBL_EMAIL_ATTACHMENT'                  => '附件',
    'LBL_EMAIL_ATTACHMENTS'                 => '附件文件',
    'LBL_EMAIL_ATTACHMENTS2'                => '从 SuiteCRM 文件',
    'LBL_EMAIL_ATTACHMENTS3'                => '模板附件',
    'LBL_EMAIL_ATTACHMENTS_FILE'            => '文件',
    'LBL_EMAIL_ATTACHMENTS_DOCUMENT'        => '文档',
    'LBL_EMAIL_ATTACHMENTS_EMBEDED'         => '插入邮件',
    'LBL_EMAIL_BCC'                         => '密送',
    'LBL_EMAIL_CANCEL'                      => '取消',
    'LBL_EMAIL_CC'                          => '抄送',
    'LBL_EMAIL_CHARSET'                     => '字符集设置',
    'LBL_EMAIL_CHECK'                       => '接收邮件',
    'LBL_EMAIL_CHECKING_NEW'                => '为新邮件标记',
    'LBL_EMAIL_CHECKING_DESC'               => '为新邮件标记. <br><br>如果这是为邮件帐户做第一次标记, 它将花费一些时间.',
    'LBL_EMAIL_CLOSE'                       => '关闭',
    'LBL_EMAIL_COFFEE_BREAK'                => '为新邮件标记. <br><br>大邮件帐户可能花费更多一些时间.',
    'LBL_EMAIL_COMMON'                      => '普通',

    'LBL_EMAIL_COMPOSE'                     => '撰写邮件',
    'LBL_EMAIL_COMPOSE_ERR_NO_RECIPIENTS'   => '请为邮件输入接受人.',
    'LBL_EMAIL_COMPOSE_LINK_TO'             => '关联人',
    'LBL_EMAIL_COMPOSE_NO_BODY'             => '邮件内容为空.  无论如何都发送吗?',
    'LBL_EMAIL_COMPOSE_NO_SUBJECT'          => '这个邮件没有主题.  无论如何都发送吗?',
    'LBL_EMAIL_COMPOSE_NO_SUBJECT_LITERAL'  => '(无主题)',
    'LBL_EMAIL_COMPOSE_READ'                => '读 & 排列邮件',
    'LBL_EMAIL_COMPOSE_SEND_FROM'           => '从邮件帐户中发送',
    'LBL_EMAIL_COMPOSE_OPTIONS'             => '选项',
    'LBL_EMAIL_COMPOSE_INVALID_ADDRESS'     => '请输入有效的邮件地址在到, 抄送和密送位置',

    'LBL_EMAIL_CONFIRM_CLOSE'               => '放弃这封邮件吗?',
    'LBL_EMAIL_CONFIRM_DELETE'              => '要从您的地址薄中移除这些输入吗?',
    'LBL_EMAIL_CONFIRM_DELETE_SIGNATURE'    => '确认删除此签名?',

    'LBL_EMAIL_CREATE_NEW'                  => '--保存后创建--',
    'LBL_EMAIL_MULT_GROUP_FOLDER_ACCOUNTS'  => '多用户',
    'LBL_EMAIL_MULT_GROUP_FOLDER_ACCOUNTS_EMPTY' => '空',
    'LBL_EMAIL_DATE_SENT_BY_SENDER'         => '接收时间',
  'LBL_EMAIL_DATE_RECEIVED'               => '发送时间',
    'LBL_EMAIL_ASSIGNED_TO_USER'            => '分配给用户',
    'LBL_EMAIL_DATE_TODAY'                  => '今天',
    'LBL_EMAIL_DATE_YESTERDAY'              => '昨天',
    'LBL_EMAIL_DD_TEXT'                     => '选择的邮件.',
    'LBL_EMAIL_DEFAULTS'                    => '缺省',
    'LBL_EMAIL_DELETE'                      => '删除',
    'LBL_EMAIL_DELETE_CONFIRM'              => '删除选择的信息吗?',
    'LBL_EMAIL_DELETE_SUCCESS'              => '邮件删除成功.',
    'LBL_EMAIL_DELETING_MESSAGE'            => '删除信息中',
    'LBL_EMAIL_DETAILS'                     => '详细',
    'LBL_EMAIL_DISPLAY_MSG'                 => '显示邮件 {0} - {1} 之 {2}',
    'LBL_EMAIL_ADDR_DISPLAY_MSG'            => '显示邮件地址(es) {0} - {1} 之 {2}',

    'LBL_EMAIL_EDIT_CONTACT'                => '编辑联系人',
    'LBL_EMAIL_EDIT_CONTACT_WARN'           => '当与联系人工作时只有主要地址被使用.',
    'LBL_EMAIL_EDIT_MAILING_LIST'           => '编辑邮件列表',

    'LBL_EMAIL_EMPTYING_TRASH'              => '清空垃圾箱',
    'LBL_EMAIL_DELETING_OUTBOUND'           => '删除发件服务器',
    'LBL_EMAIL_CLEARING_CACHE_FILES'        => '清除缓存文件',
    'LBL_EMAIL_EMPTY_MSG'                   => '无邮件显示.',
    'LBL_EMAIL_EMPTY_ADDR_MSG'              => '无邮件地址显示.',

    'LBL_EMAIL_ERROR_ADD_GROUP_FOLDER'      => '文件夹名称必须独特且不为空。请再试一次。',
    'LBL_EMAIL_ERROR_DELETE_GROUP_FOLDER'   => '不能删除文件夹. 文件夹和它的子文件夹都与一个邮箱相关联.',
    'LBL_EMAIL_ERROR_CANNOT_FIND_NODE'      => '从上下文不能确定文件夹的用意,重试.',
    'LBL_EMAIL_ERROR_CHECK_IE_SETTINGS'     => '请查看您的设置.',
    'LBL_EMAIL_ERROR_CONTACT_NAME'          => '请确定您输入了一个姓.',
    'LBL_EMAIL_ERROR_DESC'                  => '发现错误: ',
    'LBL_EMAIL_DELETE_ERROR_DESC'           => '您没有足够的访问权限，请联系管理员.',
    'LBL_EMAIL_ERROR_DUPE_FOLDER_NAME'      => 'SuiteCRM 文件夹名称必须是独特的。',
    'LBL_EMAIL_ERROR_EMPTY'                 => '请输入一些查找标准.',
    'LBL_EMAIL_ERROR_GENERAL_TITLE'         => '一个错误已经发生',
    'LBL_EMAIL_ERROR_LIST_NAME'             => '一封名称已经存在的电子邮件',
    'LBL_EMAIL_ERROR_MESSAGE_DELETED'       => '消息从服务器上移除',
    'LBL_EMAIL_ERROR_IMAP_MESSAGE_DELETED'  => '消息不是被从服务器上删除就是转移到一个不同的文件夹中',
    'LBL_EMAIL_ERROR_MAILSERVERCONNECTION'  => '连接邮件服务器失败. 请联系您的管理员',
    'LBL_EMAIL_ERROR_MOVE'                  => '在服务器和邮件帐户中移动邮件目前还不被支持.',
    'LBL_EMAIL_ERROR_MOVE_TITLE'            => '移动错误',
    'LBL_EMAIL_ERROR_NAME'                  => '名称是被需要的.',
    'LBL_EMAIL_ERROR_FROM_ADDRESS'          => '来源地址是需要的.',
    'LBL_EMAIL_ERROR_NO_FILE'               => '请提供一个文件.',
    'LBL_EMAIL_ERROR_NO_IMAP_FOLDER_RENAME' => 'IMAP文件夹重命名这次不被支持.',
    'LBL_EMAIL_ERROR_SERVER'                => '一个邮件服务器地址是需要的.',
    'LBL_EMAIL_ERROR_SAVE_ACCOUNT'          => '邮件帐户可能未被保存.',
    'LBL_EMAIL_ERROR_TIMEOUT'               => '一个错误发生在与邮件服务器通信时.',
    'LBL_EMAIL_ERROR_USER'                  => '一个登陆名称被需要.',
    'LBL_EMAIL_ERROR_PASSWORD'              => '一个密码被需要.',
    'LBL_EMAIL_ERROR_PORT'                  => '一个邮件服务端口被需要.',
    'LBL_EMAIL_ERROR_PROTOCOL'              => '一个服务协议被需要.',
    'LBL_EMAIL_ERROR_MONITORED_FOLDER'      => '需要设定被监督的文件夹.',
    'LBL_EMAIL_ERROR_TRASH_FOLDER'          => '需要设定垃圾文件夹.',
    'LBL_EMAIL_ERROR_VIEW_RAW_SOURCE'       => '这个信息是无效的',
    'LBL_EMAIL_ERROR_NO_OUTBOUND'           => '没有指定发送电子邮件帐号',
    'LBL_EMAIL_FOLDERS'                     => SugarThemeRegistry::current()->getImage('icon_email_folder', 'align=absmiddle border=0', null, null, ".gif", '').'文件夹',
    'LBL_EMAIL_FOLDERS_SHORT'               => SugarThemeRegistry::current()->getImage('icon_email_folder', 'align=absmiddle border=0', null, null, ".gif", ''),
    'LBL_EMAIL_FOLDERS_ACTIONS'             => '移动到',
    'LBL_EMAIL_FOLDERS_ADD'                 => '添加',
    'LBL_EMAIL_FOLDERS_ADD_DIALOG_TITLE'    => '添加新文件夹',
    'LBL_EMAIL_FOLDERS_RENAME_DIALOG_TITLE' => '重命名文件夹',
    'LBL_EMAIL_FOLDERS_ADD_NEW_FOLDER'      => '添加新文件夹组',
    'LBL_EMAIL_FOLDERS_ADD_THIS_TO'         => '添加这个文件夹到',
    'LBL_EMAIL_FOLDERS_CHANGE_HOME'         => '这个文件夹不能被改变',
    'LBL_EMAIL_FOLDERS_DELETE_CONFIRM'      => '您确定您要删除这个文件夹吗?\n这个过程不能被回滚.\n文件夹删除将关联到所有包含的文件夹.',
    'LBL_EMAIL_FOLDERS_NEW_FOLDER'          => '新建文件夹',
    'LBL_EMAIL_FOLDERS_NO_VALID_NODE'       => '请选择一个文件夹在执行这个动作前.',
    'LBL_EMAIL_FOLDERS_TITLE'               => 'Sugar文件夹管理',
    'LBL_EMAIL_FOLDERS_USING_GROUP_USER'    => '使用组',

    'LBL_EMAIL_FORWARD'                     => '转发',
    'LBL_EMAIL_DELIMITER'                   => '::;::',
    'LBL_EMAIL_DOWNLOAD_STATUS'             => '下载 [[count]] / [[total]] 邮件',
    'LBL_EMAIL_FOUND'                       => '发现',
    'LBL_EMAIL_FROM'                        => '从',
    'LBL_EMAIL_GROUP'                       => '组',
    'LBL_EMAIL_UPPER_CASE_GROUP'            => '组',
    'LBL_EMAIL_HOME_FOLDER'                 => '主页',
    'LBL_EMAIL_HTML_RTF'                    => '发送HTML',
    'LBL_EMAIL_IE_DELETE'                   => '删除邮件帐户',
    'LBL_EMAIL_IE_DELETE_SIGNATURE'         => '删除签名',
    'LBL_EMAIL_IE_DELETE_CONFIRM'           => '您确定您要删除这个邮件帐户吗?',
    'LBL_EMAIL_IE_DELETE_SUCCESSFUL'        => '删除成功.',
    'LBL_EMAIL_IE_SAVE'                     => '保存邮件帐户信息',
    'LBL_EMAIL_IMPORTING_EMAIL'             => '导入邮件',
    'LBL_EMAIL_IMPORT_EMAIL'                => '导入到 SuiteCRM',
    'LBL_EMAIL_IMPORT_SETTINGS'                => '导入设置',
    'LBL_EMAIL_INVALID'                     => '无效',
    'LBL_EMAIL_LOADING'                     => '加载...',
    'LBL_EMAIL_MARK'                        => '标记',
    'LBL_EMAIL_MARK_FLAGGED'                => '作为标志',
    'LBL_EMAIL_MARK_READ'                   => '作为已读',
    'LBL_EMAIL_MARK_UNFLAGGED'              => '作为无标志',
    'LBL_EMAIL_MARK_UNREAD'                 => '作为未读',
    'LBL_EMAIL_ASSIGN_TO'                   => '分配给',

    'LBL_EMAIL_MENU_ADD_FOLDER'             => '创建文件夹',
    'LBL_EMAIL_MENU_COMPOSE'                => '排版',
    'LBL_EMAIL_MENU_DELETE_FOLDER'          => '删除文件夹',
    'LBL_EMAIL_MENU_EDIT'                   => '编辑',
    'LBL_EMAIL_MENU_EMPTY_TRASH'            => '清空垃圾箱',
    'LBL_EMAIL_MENU_SYNCHRONIZE'            => '同步',
    'LBL_EMAIL_MENU_CLEAR_CACHE'            => '清除缓存文件',
    'LBL_EMAIL_MENU_REMOVE'                 => '删除',
    'LBL_EMAIL_MENU_RENAME'                 => '重命名',
    'LBL_EMAIL_MENU_RENAME_FOLDER'          => '重命名文件夹',
    'LBL_EMAIL_MENU_RENAMING_FOLDER'        => '重命名文件夹',
    'LBL_EMAIL_MENU_MAKE_SELECTION'         => '请做一个选择在做此操作之前.',

    'LBL_EMAIL_MENU_HELP_ADD_FOLDER'        => '删除一个文件 (远程或在SuiteCRM中)',
    'LBL_EMAIL_MENU_HELP_ARCHIVE'           => '把这些电子邮件存档到 SuiteCRM',
    'LBL_EMAIL_MENU_HELP_COMPOSE_TO_LIST'   => '邮件选择邮件列表',
    'LBL_EMAIL_MENU_HELP_CONTACT_COMPOSE'   => '发邮件给这个联系人',
    'LBL_EMAIL_MENU_HELP_CONTACT_REMOVE'    => '移除一个联系人',
    'LBL_EMAIL_MENU_HELP_DELETE'            => '删除这些邮件',
    'LBL_EMAIL_MENU_HELP_DELETE_FOLDER'     => '删除一个文件夹 (远程或在SuiteCRM中)',
    'LBL_EMAIL_MENU_HELP_EDIT_CONTACT'      => '编辑一个联系人',
    'LBL_EMAIL_MENU_HELP_EDIT_LIST'         => '编辑一个邮件列表',
    'LBL_EMAIL_MENU_HELP_EMPTY_TRASH'       => '为您邮件庄户清空所有破损的文件夹',
    'LBL_EMAIL_MENU_HELP_MARK_FLAGGED'      => '标记这些邮件为标志的',
    'LBL_EMAIL_MENU_HELP_MARK_READ'         => '标记这些邮件已读',
    'LBL_EMAIL_MENU_HELP_MARK_UNFLAGGED'    => '标记这些邮件未标志',
    'LBL_EMAIL_MENU_HELP_MARK_UNREAD'       => '标记这写邮件未读',
    'LBL_EMAIL_MENU_HELP_REMOVE_LIST'       => '删除邮件列表',
    'LBL_EMAIL_MENU_HELP_RENAME_FOLDER'     => '重命名一个文件夹 (远程或在SuiteCRM中)',
    'LBL_EMAIL_MENU_HELP_REPLY'             => '回复这些邮件',
    'LBL_EMAIL_MENU_HELP_REPLY_ALL'         => '回复给所有这些邮件的接受者',

    'LBL_EMAIL_MESSAGES'                    => '消息',

    'LBL_EMAIL_ML_NAME'                     => '列表名称',
    'LBL_EMAIL_ML_ADDRESSES_1'              => '选择列表地址',
    'LBL_EMAIL_ML_ADDRESSES_2'              => '有效列表地址',

    'LBL_EMAIL_MULTISELECT'                 => '<b>Ctrl-点击</b> 选择多个<br />(Mac用户使用 <b>CMD-点击</b>)',

    'LBL_EMAIL_NO'                          => '不',
    'LBL_EMAIL_NOT_SENT'                    => '系统不能处理你的请求。请联系系统管理员。',

    'LBL_EMAIL_OK'                          => '确定',
    'LBL_EMAIL_ONE_MOMENT'                  => '请等一会...',
    'LBL_EMAIL_OPEN_ALL'                    => '打开多行消息',
    'LBL_EMAIL_OPTIONS'                     => '选项',
    'LBL_EMAIL_QUICK_COMPOSE'       => '快速编写电子邮件',
    'LBL_EMAIL_OPT_OUT'                     => '选出',
    'LBL_EMAIL_OPT_OUT_AND_INVALID'         => '选出,无效',
    'LBL_EMAIL_PAGE_AFTER'                  => '的{0}',
    'LBL_EMAIL_PAGE_BEFORE'                 => '页',
    'LBL_EMAIL_PERFORMING_TASK'             => '完成任务',
    'LBL_EMAIL_PRIMARY'                     => '主要',
    'LBL_EMAIL_PRINT'                       => '打印',

    'LBL_EMAIL_QC_BUGS'                     => '缺陷',
    'LBL_EMAIL_QC_CASES'                    => '客户反馈信息',
    'LBL_EMAIL_QC_LEADS'                    => '潜在客户',
    'LBL_EMAIL_QC_CONTACTS'                 => '联系人',
    'LBL_EMAIL_QC_TASKS'                    => '任务',
    'LBL_EMAIL_QC_OPPORTUNITIES'            => '商业机会',
    'LBL_EMAIL_QUICK_CREATE'                => '快速创建',

    'LBL_EMAIL_REBUILDING_FOLDERS'          => '重建文件夹',
    'LBL_EMAIL_RELATE_TO'                   => '相关',
    'LBL_EMAIL_VIEW_RELATIONSHIPS'          => '查看关系',
    'LBL_EMAIL_RECORD'                => '邮件记录',
    'LBL_EMAIL_REMOVE'                      => '移除',
    'LBL_EMAIL_REPLY'                       => '回复',
    'LBL_EMAIL_REPLY_ALL'                   => '全部回复',
    'LBL_EMAIL_REPLY_TO'                    => '回复',
    'LBL_EMAIL_RETRIEVING_LIST'             => '查询邮件列表',
    'LBL_EMAIL_RETRIEVING_MESSAGE'          => '查询消息',
    'LBL_EMAIL_RETRIEVING_RECORD'           => '查询邮件记录',
    'LBL_EMAIL_SELECT_ONE_RECORD'           => '请选择一条邮件记录',
    'LBL_EMAIL_RETURN_TO_VIEW'              => '返回到前一个模块',
    'LBL_EMAIL_REVERT'                      => '查询',
    'LBL_EMAIL_RELATE_EMAIL'                => '相关邮件',

    'LBL_EMAIL_RULES_TITLE'                 => '规则管理',

    'LBL_EMAIL_SAVE'                        => '保存',
    'LBL_EMAIL_SAVE_AND_REPLY'              => '保存 & 回复',
    'LBL_EMAIL_SAVE_DRAFT'                  => '保存草稿',

    'LBL_EMAIL_SEARCHING'                   => '引导查找',
    'LBL_EMAIL_SEARCH'                      => SugarThemeRegistry::current()->getImage('Search', 'align=absmiddle border=0', null, null, ".gif", ''),
    'LBL_EMAIL_SEARCH_SHORT'                => SugarThemeRegistry::current()->getImage('Search', 'align=absmiddle border=0', null, null, ".gif", ''),
    'LBL_EMAIL_SEARCH_ADVANCED'             => '高级搜索',
    'LBL_EMAIL_SEARCH_DATE_FROM'            => '开始日期',
    'LBL_EMAIL_SEARCH_DATE_UNTIL'           => '结束日期',
    'LBL_EMAIL_SEARCH_FULL_TEXT'            => '文章内容',
    'LBL_EMAIL_SEARCH_NO_RESULTS'           => '无结果匹配您的查找规则.',
    'LBL_EMAIL_SEARCH_RESULTS_TITLE'        => '查找结果',
    'LBL_EMAIL_SEARCH_TITLE'                => '简单查找',
    'LBL_EMAIL_SEARCH__FROM_ACCOUNTS'       => '查找邮件帐户',

    'LBL_EMAIL_SELECT'                      => '选择',

    'LBL_EMAIL_SEND'                        => '发送',
    'LBL_EMAIL_SENDING_EMAIL'               => '发送邮件',

    'LBL_EMAIL_SETTINGS'                    => '设置',
    'LBL_EMAIL_SETTINGS_2_ROWS'             => '2行',
    'LBL_EMAIL_SETTINGS_3_COLS'             => '3列',
    'LBL_EMAIL_SETTINGS_LAYOUT'             => '版面布局风格',
    'LBL_EMAIL_SETTINGS_ACCOUNTS'           => '邮件帐户',
    'LBL_EMAIL_SETTINGS_ADD_ACCOUNT'        => '清除窗口',
    'LBL_EMAIL_SETTINGS_AUTO_IMPORT'        => '在视图上导入邮件',
    'LBL_EMAIL_SETTINGS_CHECK_INTERVAL'     => '查找新邮件',
    'LBL_EMAIL_SETTINGS_COMPOSE_INLINE'     => '使用前一个面板',
    'LBL_EMAIL_SETTINGS_COMPOSE_POPUP'      => '使用弹出窗口',
    'LBL_EMAIL_SETTINGS_DISPLAY_NUM'        => '每页邮件数量',
    'LBL_EMAIL_SETTINGS_EDIT_ACCOUNT'       => '编辑邮件帐户',
    'LBL_EMAIL_SETTINGS_FOLDERS'            => '文件夹',
    'LBL_EMAIL_SETTINGS_FROM_ADDR'          => '来源地址',
    'LBL_EMAIL_SETTINGS_FROM_TO_EMAIL_ADDR' => '提醒测试电子邮件地址：',
    'LBL_EMAIL_SETTINGS_TO_EMAIL_ADDR'      => '收件人电子邮件地址',
    'LBL_EMAIL_SETTINGS_FROM_NAME'          => '来源名称',
    'LBL_EMAIL_SETTINGS_REPLY_TO_ADDR'      =>'回复电子邮件地址',
    'LBL_EMAIL_SETTINGS_FULL_SCREEN'        => '全屏幕',
    'LBL_EMAIL_SETTINGS_FULL_SYNC'          => '同步所有邮件帐户',
    'LBL_EMAIL_TEST_NOTIFICATION_SENT'      => '已经通过这个外发电子邮件服务器发送了一封测试电子邮件。请检查受否收到。',
    'LBL_EMAIL_SETTINGS_FULL_SYNC_DESC'     => '执行本动作将同步邮件帐户和它们的内容.',
    'LBL_EMAIL_SETTINGS_FULL_SYNC_WARN'     => '执行一个全同步吗?\n大邮件帐户可能会花费几分钟.',
    'LBL_EMAIL_SUBSCRIPTION_FOLDER_HELP'    => '按Shift键或Ctrl键来选在多个文件夹.',
    'LBL_EMAIL_SETTINGS_GENERAL'            => '全部',
    'LBL_EMAIL_SETTINGS_GROUP_FOLDERS'      => '有效组文件夹',
    'LBL_EMAIL_SETTINGS_GROUP_FOLDERS_CREATE'   => '创建组文件夹',
    'LBL_EMAIL_SETTINGS_GROUP_FOLDERS_Save' => '保存组文件夹',
    'LBL_EMAIL_SETTINGS_RETRIEVING_GROUP'   => '恢复组文件夹',

    'LBL_EMAIL_SETTINGS_GROUP_FOLDERS_EDIT' => '编辑组文件夹',

    'LBL_EMAIL_SETTINGS_NAME'               => '名称',
    'LBL_EMAIL_SETTINGS_REQUIRE_REFRESH'    => '这些设置将需要页面刷新被激活.',
    'LBL_EMAIL_SETTINGS_RETRIEVING_ACCOUNT' => '恢复邮件帐户',
    'LBL_EMAIL_SETTINGS_RULES'              => '规则',
    'LBL_EMAIL_SETTINGS_SAVED'              => '设置已经保存.\n\n您必须重新加载页面使新设置有效.',
    'LBL_EMAIL_SETTINGS_SEND_EMAIL_AS'      => '象平时的文本发送邮件',
    'LBL_EMAIL_SETTINGS_SHOW_IN_FOLDERS'    => '激活邮件帐户',
    'LBL_EMAIL_SETTINGS_SHOW_NUM_IN_LIST'   => '每页邮件数量',
    'LBL_EMAIL_SETTINGS_TAB_POS'            => '在底部放入标签',
    'LBL_EMAIL_SETTINGS_TITLE_LAYOUT'       => '可视设置',
    'LBL_EMAIL_SETTINGS_TITLE_PREFERENCES'  => '偏好',
    'LBL_EMAIL_SETTINGS_TOGGLE_ADV'         => '显示高级',
    'LBL_EMAIL_SETTINGS_USER_FOLDERS'       => '有效用户文件夹',
    'LBL_EMAIL_ERROR_PREPEND'               => '电子邮件发送出错：',
  'LBL_EMAIL_INVALID_PERSONAL_OUTBOUND' => '你选择的外发电子邮件帐户无效。请检查配置，或尝试一下其他帐户。',
  'LBL_EMAIL_INVALID_SYSTEM_OUTBOUND' => '您的电子邮件帐户还没有配置外发电子邮件服务器。请为这个帐户选择或新加一个外发电子邮件服务器。',
    'LBL_EMAIL_SHOW_READ'                   => '显示所有',
    'LBL_EMAIL_SHOW_UNREAD_ONLY'            => '只显示未读',
    'LBL_EMAIL_SIGNATURES'                  => '签名',
    'LBL_EMAIL_SIGNATURE_CREATE'            => '创建签名',
    'LBL_EMAIL_SIGNATURE_NAME'              => '签名名称',
    'LBL_EMAIL_SIGNATURE_TEXT'              => '签名内容',
  'LBL_SMTPTYPE_GMAIL'                    => 'Gmail',
  'LBL_SMTPTYPE_YAHOO'                    => '雅虎邮件',
  'LBL_SMTPTYPE_EXCHANGE'                 => 'Microsoft Exchange',
    'LBL_SMTPTYPE_OTHER'                  => '其它',
    'LBL_EMAIL_SPACER_MAIL_SERVER'          => '[ 远程文件夹 ]',
    'LBL_EMAIL_SPACER_LOCAL_FOLDER'         => '[SuiteCRM 文件夹]',
    'LBL_EMAIL_SUBJECT'                     => '主题',
    'LBL_EMAIL_SUCCESS'                     => '成功',
    'LBL_EMAIL_SUGAR_FOLDER'                => 'SuiteCRM 文件夹',
    'LBL_EMAIL_TEMPLATE_EDIT_PLAIN_TEXT'    => '电子邮件模板的纯文本为空',
    'LBL_EMAIL_TEMPLATES'                   => '模板',
    'LBL_EMAIL_TEXT_FIRST'                  => '首页',
    'LBL_EMAIL_TEXT_PREV'                   => '前一页',
    'LBL_EMAIL_TEXT_NEXT'                   => '下一页',
    'LBL_EMAIL_TEXT_LAST'                   => '最后一页',
    'LBL_EMAIL_TEXT_REFRESH'                => '刷新',
    'LBL_EMAIL_TO'                          => '到',
    'LBL_EMAIL_TOGGLE_LIST'                 => '切换邮件列表',
    'LBL_EMAIL_VIEW'                        => '视图',
    'LBL_EMAIL_VIEWS'                       => '视图',
    'LBL_EMAIL_VIEW_HEADERS'                => '查看头',
    'LBL_EMAIL_VIEW_PRINTABLE'              => '打印版',
    'LBL_EMAIL_VIEW_RAW'                    => '显示原始邮件',
    'LBL_EMAIL_VIEW_UNSUPPORTED'            => '当使用POP3协议这项功能不被支持.',
    'LBL_DEFAULT_LINK_TEXT'                 => '缺省连文本.',
    'LBL_EMAIL_YES'                         => '是的',
    'LBL_EMAIL_TEST_OUTBOUND_SETTINGS'      => '发送测试电子邮件',
    'LBL_EMAIL_TEST_OUTBOUND_SETTINGS_SENT' => '测试电子邮件已发送',
    'LBL_EMAIL_MESSAGE_NO'                  => '消息',
    'LBL_EMAIL_IMPORT_SUCCESS'              => '导入成功',
    'LBL_EMAIL_IMPORT_FAIL'                 => '导入失败，该消息已导入或已从服务器删除',

    'LBL_LINK_NONE'=> '无',
    'LBL_LINK_ALL'=> '全部',
    'LBL_LINK_RECORDS'=> '记录',
    'LBL_LINK_SELECT'=> '选择',
    'LBL_LINK_ACTIONS'=> '操作',
    'LBL_LINK_MORE'=> '更多',
    'LBL_CLOSE_ACTIVITY_HEADER' => "确定",
    'LBL_CLOSE_ACTIVITY_CONFIRM' => "您确定要关闭 #module# 吗？",
    'LBL_CLOSE_ACTIVITY_REMEMBER' => "以后不要再显示这条信息: &nbsp;",
    'LBL_INVALID_FILE_EXTENSION' => '文件扩展名无效',
    'LBL_SUITE_DASHBOARD_ACTIONS' => '面板设置',

    'ERR_AJAX_LOAD'     => '发生错误:',
    'ERR_AJAX_LOAD_FAILURE'     => '处理过程中出现错误，请稍候重试。',
    'ERR_AJAX_LOAD_FOOTER' => '如果这个错误一直出现，请联系管理员禁用这个模块的Ajax特性',
    'ERR_CREATING_FIELDS' => '填写附加细节字段错误:',
    'ERR_CREATING_TABLE' => '新增表错误:',
    'ERR_DECIMAL_SEP_EQ_THOUSANDS_SEP'  => "小数分隔符和千分符不能相同。\n\n请更改它们的值。",
    'ERR_DELETE_RECORD' => '必须指定记录编号才能删除客户。',
    'ERR_EXPORT_DISABLED' => '禁止导出。',
    'ERR_EXPORT_TYPE' => '错误导出',
    'ERR_INVALID_AMOUNT' => '请输入有效金额:',
    'ERR_INVALID_DATE_FORMAT' => '日期格式必须是:',
    'ERR_INVALID_DATE' => '请输入有效日期。',
    'ERR_INVALID_DAY' => '请输入有效天数。',
    'ERR_INVALID_EMAIL_ADDRESS' => '不是有效的电子邮件地址。',
    'ERR_INVALID_FILE_REFERENCE' => '无效文件引用',
    'ERR_INVALID_HOUR' => '请输入有效小时。',
    'ERR_INVALID_MONTH' => '请输入有效月份。',
    'ERR_INVALID_TIME' => '请输入有效时间。',
    'ERR_INVALID_YEAR' => '请输入有4位数。',
    'ERR_NEED_ACTIVE_SESSION' => '需要一个可用的会话来导出内容。',
    'ERR_NO_HEADER_ID' => '此功能在本主题中无效.',
    'ERR_NOT_ADMIN' => "没有管理权限。",
    'ERR_MISSING_REQUIRED_FIELDS' => '缺少必填字段:',
    'ERR_INVALID_REQUIRED_FIELDS' => '无效的必填字段:',
    'ERR_INVALID_VALUE' => '无效值:',
    'ERR_NO_SUCH_FILE' =>'文件在系统中不存在',
    'ERR_NO_SINGLE_QUOTE' => '不可以使用单引号',
    'ERR_NOTHING_SELECTED' =>'继续之前请选择。',
    'ERR_OPPORTUNITY_NAME_DUPE' => '商业机会名称已存在，请输入另一个名称。',
    'ERR_OPPORTUNITY_NAME_MISSING' => '商业机会名称不能为空。请输入以下的商业机会名称。',
    'ERR_POTENTIAL_SEGFAULT' => '检测到潜在的 Apache 分割故障。 请通知您的系统管理员以确认此问题并要求他/她向 SuiteCRM 报告。',
    'ERR_SELF_REPORTING' => '用户不可以给自己汇报。',
    'ERR_SINGLE_QUOTE'  => '这个字段不支持使用单引号。请改变字段值。',
    'ERR_SQS_NO_MATCH_FIELD' => '没有匹配字段:',
    'ERR_SQS_NO_MATCH' =>'没有匹配',
    'ERR_ADDRESS_KEY_NOT_SPECIFIED' => '请声明 \'关键值\' 索引在显示参数属性中为元数据定义',
    'ERR_EXISTING_PORTAL_USERNAME'=>'错误: 门户名称是意匠分配给另外联系人.',
    'ERR_COMPATIBLE_PRECISION_VALUE' => '数值与精度不匹配',
    'ERR_EXTERNAL_API_SAVE_FAIL' => '保存外部帐号是出错.',
    'ERR_EXTERNAL_API_UPLOAD_FAIL' => '上传时出错,请确保上传的不是空文件.',
    'ERR_NO_DB' => '无法连接到数据库。请参阅 SuiteCRM 错误日志文件的详细信息。',
    'ERR_DB_FAIL' => '数据库失败。请参阅 SuiteCRM 错误日志文件的详细信息。',
    'ERR_EXTERNAL_API_403' => '不支持的文件类型.',
    'ERR_EXTERNAL_API_NO_OAUTH_TOKEN' => 'OAuth访问令牌丢失。',
    'ERR_DB_VERSION' => 'SuiteCRM {0} 文件只能与 SuiteCRM {1} 数据库使用。',


    'LBL_ACCOUNT'=>'客户',
    'LBL_OLD_ACCOUNT_LINK'=>'旧账号',
    'LBL_ACCOUNTS'=>'客户',
    'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'活动',
    'LBL_ACCUMULATED_HISTORY_BUTTON_KEY' => 'H',
    'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => '查看摘要',
    'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => '查看摘要[Alt+H]',
    'LBL_ADD_BUTTON_KEY' => 'A',
    'LBL_ADD_BUTTON_TITLE' => '新增[Alt+A]',
    'LBL_ADD_BUTTON' => '增加',
    'LBL_ADD_DOCUMENT' => '增加文档',
    'LBL_REPLACE_BUTTON' => '替代',
    'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY' => 'L',
    'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => '增加到目标列表',
    'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => '增加到目标列表',
    'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => '关闭',
    'LBL_ADDITIONAL_DETAILS_CLOSE' => '关闭',
    'LBL_ADDITIONAL_DETAILS' => '其它细节',
    'LBL_ADMIN' => '系统管理',
    'LBL_ALT_HOT_KEY' => '',
    'LBL_ARCHIVE' => '存档',
    'LBL_ASSIGNED_TO_USER'=>'负责人:',
    'LBL_ASSIGNED_TO' => '负责人:',
    'LBL_BACK' => '上一步',
    'LBL_BILL_TO_ACCOUNT'=>'付款客户',
    'LBL_BILL_TO_CONTACT'=>'付款联系人',
    'LBL_BILLING_ADDRESS'=>'帐单地址',
    'LBL_QUICK_CREATE_TITLE' => '快速创建',
    'LBL_BROWSER_TITLE' => 'SuiteCRM-开源 CRM',
    'LBL_BUGS'=>'缺陷追踪',
    'LBL_BY' => '被',
    'LBL_CALLS'=>'电话',
    'LBL_CALL'=>'电话',
    'LBL_CAMPAIGNS_SEND_QUEUED' => '发送队列中的市场活动邮件',
    'LBL_SUBMIT_BUTTON_LABEL' => '提交',
    'LBL_CASE'=>'用户反馈',
    'LBL_CASES'=>'客户反馈',
    'LBL_CHANGE_BUTTON_KEY' => 'G',
    'LBL_CHANGE_PASSWORD' => '修改密码',
    'LBL_CHANGE_BUTTON_LABEL' => '更改',
    'LBL_CHANGE_BUTTON_TITLE' => '更改[Alt+G]',
    'LBL_CHARSET' => 'UTF-8',
    'LBL_CHECKALL' => '全选',
    'LBL_CITY' => '城市',
    'LBL_CLEAR_BUTTON_KEY' => 'C',
    'LBL_CLEAR_BUTTON_LABEL' => '清除',
    'LBL_CLEAR_BUTTON_TITLE' => '清除[Alt+C]',
    'LBL_CLEARALL' => '全部清除',
    'LBL_CLOSE_BUTTON_TITLE' =>'关闭',
    'LBL_CLOSE_BUTTON_KEY'=>'C',
    'LBL_CLOSE_WINDOW'=>'关闭窗口',
    'LBL_CLOSEALL_BUTTON_KEY' => 'C',
    'LBL_CLOSEALL_BUTTON_LABEL' => '全部关闭',
    'LBL_CLOSEALL_BUTTON_TITLE' => '全部关闭[Alt+I]',
    'LBL_CLOSE_AND_CREATE_BUTTON_LABEL' => '关闭并且新增',
    'LBL_CLOSE_AND_CREATE_BUTTON_TITLE' => '关闭并且新增[Alt+C]',
    'LBL_CLOSE_AND_CREATE_BUTTON_KEY' => 'C',
    'LBL_OPEN_ITEMS' => '打开的项目:',
    'LBL_COMPOSE_EMAIL_BUTTON_KEY' => 'L',
    'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => '撰写电子邮件',
    'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => '撰写电子邮件[Alt+L]',
    'LBL_SEARCH_DROPDOWN_YES'=>'是',
    'LBL_SEARCH_DROPDOWN_NO'=>'否',
    'LBL_CONTACT_LIST' => '联系人列表',
    'LBL_CONTACT'=>'联系人',
    'LBL_CONTACTS'=>'联系人',
    'LBL_CONTRACTS'=>'合同',
    'LBL_COUNTRY' => '国家:',
    'LBL_CREATE_BUTTON_LABEL' => '新增',
    'LBL_CREATED_BY_USER'=>'创建人',
    'LBL_CREATED_USER'=>'创建者',
    'LBL_CREATED_ID' => '创建人编号',
    'LBL_CREATED' => '创建人',
    'LBL_CURRENT_USER_FILTER' => '只显示我的记录:',
    'LBL_CURRENCY'=>'货币:',
    'LBL_DOCUMENTS'=>'文档',
    'LBL_DATE_ENTERED' => '创建日期:',
    'LBL_DATE_MODIFIED' => '最后修改:',
    'LBL_EDIT_BUTTON' => '编辑',
    'LBL_DUPLICATE_BUTTON' => '复制',
    'LBL_DELETE_BUTTON' => '删除',
    'LBL_DELETE' => '删除',
    'LBL_DELETED'=>'已删除',
    'LBL_DIRECT_REPORTS'=>'直接下属',
    'LBL_DONE_BUTTON_KEY' => 'X',
    'LBL_DONE_BUTTON_LABEL' => '完成',
    'LBL_DONE_BUTTON_TITLE' => '完成[Alt+X]',
    'LBL_DST_NEEDS_FIXIN' => '应用程序需要设置夏令时时间。请转到管理员控制台下的<a href="index.php?module=Administration&action=DstFix">修复</a>链接，设置夏令时时间。',
    'LBL_EDIT_AS_NEW_BUTTON_LABEL' => '编辑时新建',
    'LBL_EDIT_AS_NEW_BUTTON_TITLE' => '编辑时新建',
    'LBL_FAVORITES' => '收藏夹',
    'LBL_FILTER_MENU_BY' => '菜单过滤',
    'LBL_VCARD' => '电子名片',
    'LBL_EMPTY_VCARD' => '请选择一个vCard文件',
    'LBL_EMPTY_REQUIRED_VCARD' => 'vCard没有获得所有此模块所需的必填字段的条件。 详情请参照sugarcrm.log。',
    'LBL_VCARD_ERROR_FILESIZE' => '上传的文件大小超过了HTML表单中指定的30000B限制',
    'LBL_VCARD_ERROR_DEFAULT' => '上传vCard 文件时出现错误，如需要获得详情，请参照sugarcrm.log。',
    'LBL_IMPORT_VCARD' => '导入vCard:',
    'LBL_IMPORT_VCARD_BUTTON_KEY' => 'I',
    'LBL_IMPORT_VCARD_BUTTON_LABEL' => '导入vCard',
    'LBL_IMPORT_VCARD_BUTTON_TITLE' => '导入vCard [Alt+I]',
    'LBL_VIEW_BUTTON_KEY' => 'V',
    'LBL_VIEW_BUTTON_LABEL' => '查看',
    'LBL_VIEW_BUTTON_TITLE' => '查看[Alt+V]',
    'LBL_VIEW_BUTTON' => '查看',
    'LBL_EMAIL_PDF_BUTTON_KEY' => 'M',
    'LBL_EMAIL_PDF_BUTTON_LABEL' => '以PDF格式发送电子邮件',
    'LBL_EMAIL_PDF_BUTTON_TITLE' => '以PDF格式发送电子邮件[Alt+M]',
    'LBL_EMAILS'=>'电子邮件',
    'LBL_EMPLOYEES' => '员工',
    'LBL_ENTER_DATE' => '输入日期',
    'LBL_EXPORT_ALL' => '全部导出',
    'LBL_EXPORT' => '导出',
    'LBL_FAVORITES_FILTER' => '我的收藏:',
    'LBL_GO_BUTTON_LABEL' => '执行',
    'LBL_GS_HELP' => '该模块中的这些字段用于上面显示的搜索，符合搜索添加的文字将高亮显示。',
    'LBL_HIDE'=>'隐藏',
    'LBL_ID'=>'编号',
    'LBL_IMPORT' => '导入',
    'LBL_IMPORT_STARTED' => '已开始导入:',
    'LBL_MISSING_CUSTOM_DELIMITER' => '必须指定一个字定义的分隔符。',
    'LBL_LAST_VIEWED' => '最近查看',
    'LBL_SHOW_LESS' => '显示精简',
    'LBL_SHOW_MORE' => '显示更多',
    'LBL_TODAYS_ACTIVITIES' => '今日市场活动',
    'LBL_LEADS'=>'潜在客户',
    'LBL_LESS' => '少于',
    'LBL_CAMPAIGN' => '市场活动:',
    'LBL_CAMPAIGNS' => '市场活动',
    'LBL_CAMPAIGNLOG' => '市场活动日志',
    'LBL_CAMPAIGN_CONTACT'=>'市场活动',
    'LBL_CAMPAIGN_ID'=>'市场活动编号',
    'LBL_SITEMAP'=>'站点地图',
    'LBL_THEME'=>'主题:',
    'LBL_THEME_PICKER'=>'页面样式',
    'LBL_THEME_PICKER_IE6COMPAT_CHECK' => '警告：所选主题不支持IE6。点击确定应用所选主题，或者点击取消选择其他主题。',
    'LBL_FOUND_IN_RELEASE'=>'在发布版本中存在',
    'LBL_FIXED_IN_RELEASE'=>'在发布版本中已修改',
    'LBL_LIST_ACCOUNT_NAME' => '客户名称',
    'LBL_LIST_ASSIGNED_USER' => '用户',
    'LBL_LIST_CONTACT_NAME' => '联系人姓名',
    'LBL_LIST_CONTACT_ROLE' => '联系人角色',
    'LBL_LIST_DATE_ENTERED'=>'创建日期',
    'LBL_LIST_EMAIL' => '电子邮件',
    'LBL_LIST_NAME' => '名称',
    'LBL_LIST_OF' => '的',
    'LBL_LIST_PHONE' => '电话',
    'LBL_LIST_RELATED_TO' => '相关',
    'LBL_LIST_USER_NAME' => '用户名',
    'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => '您确定您要更新整个列表?',
    'LBL_LISTVIEW_NO_SELECTED' => '请选择至少1条记录进行操作。',
    'LBL_LISTVIEW_TWO_REQUIRED' => '请选择至少2条记录进行操作。',
    'LBL_LISTVIEW_LESS_THAN_TEN_SELECT' => '请选择10条以下的记录来执行操作.',
    'LBL_LISTVIEW_ALL' => '全部',
    'LBL_LISTVIEW_NONE' => '无',
    'LBL_LISTVIEW_OPTION_CURRENT' => '当前页',
    'LBL_LISTVIEW_OPTION_ENTIRE' => '整个列表',
    'LBL_LISTVIEW_OPTION_SELECTED' => '已选择的记录',
    'LBL_LISTVIEW_SELECTED_OBJECTS' => '已选择',

    'LBL_LOCALE_NAME_EXAMPLE_FIRST' => '大卫',
    'LBL_LOCALE_NAME_EXAMPLE_LAST' => '李文斯顿',
    'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => '博士',
    'LBL_LOCALE_NAME_EXAMPLE_TITLE' => 'Code Monkey Extraordinaire',
    'LBL_LOGIN_TO_ACCESS' => '请登录以访问这个区域.',
    'LBL_LOGOUT' => '注销',
    'LBL_PROFILE' => '帐号',
    'LBL_MAILMERGE_KEY' => 'M',
    'LBL_MAILMERGE' => '邮件合并',
    'LBL_MASS_UPDATE' => '批量更新',
    'LBL_NO_MASS_UPDATE_FIELDS_AVAILABLE' => '没有支持批量操作的字段',
    'LBL_OPT_OUT_FLAG_PRIMARY' => '主邮箱添加剔除标记',
    'LBL_MEETINGS'=>'会议',
    'LBL_MEETING'=>'会议',
    'LBL_MEETING_GO_BACK'=>'返回会议',
    'LBL_MEMBERS'=>'成员',
    'LBL_MEMBER_OF'=>'属于',
    'LBL_MODIFIED_BY_USER'=>'修改人',
    'LBL_MODIFIED_USER'=>'修改用户',
    'LBL_MODIFIED' => '修改人',
    'LBL_MODIFIED_NAME'=>'修改者',
    'LBL_MODIFIED_ID'=>'修改人编号',
    'LBL_MORE' => '更多',
    'LBL_MY_ACCOUNT' => '我的帐户',
    'LBL_NAME' => '名称',
    'LBL_NEW_BUTTON_KEY' => 'N',
    'LBL_NEW_BUTTON_LABEL' => '新增',
    'LBL_NEW_BUTTON_TITLE' => '新增[Alt+N]',
    'LBL_NEXT_BUTTON_LABEL' => '下一步',
    'LBL_NONE' => '--无--',
    'LBL_NOTES'=>'备忘录',
    'LBL_OPENALL_BUTTON_KEY' => 'O',
    'LBL_OPENALL_BUTTON_LABEL' => '全部开放',
    'LBL_OPENALL_BUTTON_TITLE' => '全部开放[Alt+O]',
    'LBL_OPENTO_BUTTON_KEY' => 'T',
    'LBL_OPENTO_BUTTON_LABEL' => '开放到:',
    'LBL_OPENTO_BUTTON_TITLE' => '开放到:[Alt+T]',
    'LBL_OPPORTUNITIES'=>'商业机会',
    'LBL_OPPORTUNITY_NAME' => '商业机会名称',
    'LBL_OPPORTUNITY'=>'商业机会',
    'LBL_OR' => '或者',
    'LBL_LOWER_OR' => '或',
    'LBL_PANEL_OVERVIEW' => '客户反馈信息',
    'LBL_PANEL_ASSIGNMENT' => '其它',
    'LBL_PANEL_ADVANCED' => '更多信息',
    'LBL_PARENT_TYPE' => '父类型',
    'LBL_PERCENTAGE_SYMBOL' => '%',
    'LBL_PHASE' => '阶段',
    'LBL_POSTAL_CODE' => '邮政编码:',
    'LBL_PRIMARY_ADDRESS_CITY' => '主要地址城市:',
    'LBL_PRIMARY_ADDRESS_COUNTRY' => '主要地址国家:',
    'LBL_PRIMARY_ADDRESS_POSTALCODE' => '主要地址邮政编码:',
    'LBL_PRIMARY_ADDRESS_STATE' => '主要地址洲:',
    'LBL_PRIMARY_ADDRESS_STREET_2' => '主要地址街道 2:',
    'LBL_PRIMARY_ADDRESS_STREET_3' => '主要地址街道 3:',
    'LBL_PRIMARY_ADDRESS_STREET' => '主要地址街道:',
    'LBL_PRIMARY_ADDRESS' => '主要地址:',

	'LBL_BILLING_STREET'=> '街道:',
	'LBL_SHIPPING_STREET'=> '街道:',

    'LBL_PROSPECTS'=>'指望',
    'LBL_PRODUCT_BUNDLES'=>'产品包',
    'LBL_PRODUCTS'=>'产品',
    'LBL_PROJECT_TASKS'=>'项目任务',
    'LBL_PROJECTS'=>'项目',
    'LBL_QUOTE_TO_OPPORTUNITY_KEY' => 'O',
    'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => '根据报价创建商业机会',
    'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => '根据报价创建商业机会[Alt+O]',
    'LBL_QUOTES_SHIP_TO'=>'运往',
    'LBL_QUOTES'=>'报价',

    'LBL_RELATED' => '关联',
    'LBL_RELATED_INFORMATION' => '相关信息',
    'LBL_RELATED_RECORDS' => '相关记录',
    'LBL_REMOVE' => '移除',
    'LBL_REPORTS_TO' => '报告给',
    'LBL_REQUIRED_SYMBOL' => '*',
    'LBL_REQUIRED_TITLE' => '必填字段提示',
    'LBL_EMAIL_DONE_BUTTON_LABEL' => '完成',
    'LBL_SAVE_AS_BUTTON_KEY' => 'A',
    'LBL_SAVE_AS_BUTTON_LABEL' => '另存为',
    'LBL_SAVE_AS_BUTTON_TITLE' => '另存为',
    'LBL_FULL_FORM_BUTTON_KEY' => 'F',
    'LBL_FULL_FORM_BUTTON_LABEL' => '完全式',
    'LBL_FULL_FORM_BUTTON_TITLE' => '完全式',
    'LBL_SAVE_NEW_BUTTON_KEY' => 'V',
    'LBL_SAVE_NEW_BUTTON_LABEL' => '保存并且新增',
    'LBL_SAVE_NEW_BUTTON_TITLE' => '保存并且新增[Alt+V]',
    'LBL_SAVE_OBJECT' => '保存 {0}',
    'LBL_SEARCH_BUTTON_KEY' => 'C',
    'LBL_SEARCH_BUTTON_LABEL' => '查找',
    'LBL_SEARCH_BUTTON_TITLE' => '查找[Alt+Q]',
    'LBL_SEARCH' => '查找',
    'LBL_SEARCH_TIPS' => "单击搜索按钮或按回车键，进行精确匹配。",
    'LBL_SEARCH_TIPS_2' => "单击搜索按钮或按回车键，进行精确匹配",
    'LBL_SEARCH_MORE' => '更多',
    'LBL_SEE_ALL' => '查看所有',
    'LBL_UPLOAD_IMAGE_FILE_INVALID' => '文件格式无效，只能上传图片文件。',
    'LBL_SELECT_BUTTON_KEY' => 'T',
    'LBL_SELECT_BUTTON_LABEL' => '选择',
    'LBL_SELECT_BUTTON_TITLE' => '选择[Alt+T]',
    'LBL_SELECT_TEAMS_KEY' => 'Z',
    'LBL_SELECT_TEAMS_LABEL' => '添加团队',
    'LBL_SELECT_TEAMS_TITLE' => '添加团队[Alt+Z]',
    'LBL_BROWSE_DOCUMENTS_BUTTON_KEY' => 'B',
    'LBL_BROWSE_DOCUMENTS_BUTTON_LABEL' => '浏览文档',
    'LBL_BROWSE_DOCUMENTS_BUTTON_TITLE' => '浏览文档 [Alt+B]',
    'LBL_SELECT_CONTACT_BUTTON_KEY' => 'T',
    'LBL_SELECT_CONTACT_BUTTON_LABEL' => '选择联系人',
    'LBL_SELECT_CONTACT_BUTTON_TITLE' => '选择联系人[Alt+T]',
    'LBL_GRID_SELECTED_FILE' => '选择的文件',
    'LBL_GRID_SELECTED_FILES' => '已选择的文件',
    'LBL_SELECT_REPORTS_BUTTON_LABEL' => '从报表中选择',
    'LBL_SELECT_REPORTS_BUTTON_TITLE' => '选择报表',
    'LBL_SELECT_USER_BUTTON_KEY' => 'U',
    'LBL_SELECT_USER_BUTTON_LABEL' => '选择用户',
    'LBL_SELECT_USER_BUTTON_TITLE' => '选择用户[Alt+U]',
    // Clear buttons take up too many keys, lets default the relate and collection ones to be empty
    'LBL_ACCESSKEY_CLEAR_RELATE_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_RELATE_TITLE' => '清除选择',
    'LBL_ACCESSKEY_CLEAR_RELATE_LABEL' => '清除选择',
    'LBL_ACCESSKEY_CLEAR_COLLECTION_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_COLLECTION_TITLE' => '清除选择',
    'LBL_ACCESSKEY_CLEAR_COLLECTION_LABEL' => '清除选择',
    'LBL_ACCESSKEY_SELECT_FILE_KEY' => 'F',
    'LBL_ACCESSKEY_SELECT_FILE_TITLE' => '选择文件',
    'LBL_ACCESSKEY_SELECT_FILE_LABEL' => '选择文件',
    'LBL_ACCESSKEY_CLEAR_FILE_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_FILE_TITLE' => '清除文件',
    'LBL_ACCESSKEY_CLEAR_FILE_LABEL' => '清除文件',


    'LBL_ACCESSKEY_SELECT_USERS_KEY' => 'U',
    'LBL_ACCESSKEY_SELECT_USERS_TITLE' => '选择用户',
    'LBL_ACCESSKEY_SELECT_USERS_LABEL' => '选择用户',
    'LBL_ACCESSKEY_CLEAR_USERS_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_USERS_TITLE' => '清除用户',
    'LBL_ACCESSKEY_CLEAR_USERS_LABEL' => '清除用户',
    'LBL_ACCESSKEY_SELECT_ACCOUNTS_KEY' => 'A',
    'LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE' => '选择客户',
    'LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL' => '选择客户',
    'LBL_ACCESSKEY_CLEAR_ACCOUNTS_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE' => '清除客户',
    'LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL' => '清除客户',
    'LBL_ACCESSKEY_SELECT_CAMPAIGNS_KEY' => 'M',
    'LBL_ACCESSKEY_SELECT_CAMPAIGNS_TITLE' => '选择市场活动',
    'LBL_ACCESSKEY_SELECT_CAMPAIGNS_LABEL' => '选择市场活动',
    'LBL_ACCESSKEY_CLEAR_CAMPAIGNS_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_CAMPAIGNS_TITLE' => '清除市场活动',
    'LBL_ACCESSKEY_CLEAR_CAMPAIGNS_LABEL' => '清除市场活动',
    'LBL_ACCESSKEY_SELECT_CONTACTS_KEY' => 'C',
    'LBL_ACCESSKEY_SELECT_CONTACTS_TITLE' => '选择联系人',
    'LBL_ACCESSKEY_SELECT_CONTACTS_LABEL' => '选择联系人',
    'LBL_ACCESSKEY_CLEAR_CONTACTS_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE' => '清除联系人',
    'LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL' => '清除联系人',
    'LBL_ACCESSKEY_SELECT_TEAMSET_KEY' => 'Z',
    'LBL_ACCESSKEY_SELECT_TEAMSET_TITLE' => '选择团队',
    'LBL_ACCESSKEY_SELECT_TEAMSET_LABEL' => '选择团队',
    'LBL_ACCESSKEY_CLEAR_TEAMS_KEY' => ' ',
    'LBL_ACCESSKEY_CLEAR_TEAMS_TITLE' => '清除团队',
    'LBL_ACCESSKEY_CLEAR_TEAMS_LABEL' => '清除团队',
    'LBL_SERVER_RESPONSE_RESOURCES' => '创建这个页面的资源(查询，文件)',
    'LBL_SERVER_RESPONSE_TIME_SECONDS' => '秒。',
    'LBL_SERVER_RESPONSE_TIME' => '服务器响应时间:',
    'LBL_SERVER_MEMORY_BYTES' => '字节',
    'LBL_SERVER_MEMORY_USAGE' => '服务器内存使用: {0} ({1})',
    'LBL_SERVER_MEMORY_LOG_MESSAGE' => '使用: - 模块: {0} - 行动: {1}',
    'LBL_SERVER_PEAK_MEMORY_USAGE' => '服务器峰值内存使用: {0} ({1})',
    'LBL_SHIP_TO_ACCOUNT'=>'收货客户',
    'LBL_SHIP_TO_CONTACT'=>'收货联系人',
    'LBL_SHIPPING_ADDRESS'=>'装运地址',
    'LBL_SHORTCUTS' => '快捷方式',
    'LBL_SHOW'=>'显示',
    'LBL_SQS_INDICATOR' => '',
    'LBL_STATE' => '洲:',
    'LBL_STATUS_UPDATED'=>'对于这个事件，您的状态已更新！',
    'LBL_STATUS'=>'状态:',
    'LBL_STREET'=>'街道',
    'LBL_SUBJECT' => '主题',

    'LBL_INBOUNDEMAIL_ID' => '接收电子邮件ID',

    /* The following version of LBL_SUGAR_COPYRIGHT is intended for Sugar Open Source only. */

    'LBL_SUGAR_COPYRIGHT' => '&copy; 2004-2009 <a href="http://www.sugarcrm.com" target="_blank" class="copyRightLink">SugarCRM Inc.</a> 保留所有权利.',



    // The following version of LBL_SUGAR_COPYRIGHT is for Professional and Enterprise editions.

    'LBL_SUGAR_COPYRIGHT_SUB' => '&copy; 2004-2011 <a href="http://www.sugarcrm.com" target="_blank" class="copyRightLink">SugarCRM Inc.</a> All Rights Reserved.<br />SugarCRM is a trademark of SugarCRM, Inc. All other company and product names may be trademarks of the respective companies with which they are associated.',


    'LBL_SYNC' => '同步',
    'LBL_TABGROUP_ALL' => '[全部功能]',
    'LBL_TABGROUP_ACTIVITIES' => 'Activities活动',
    'LBL_TABGROUP_COLLABORATION' => 'Collaboration协作',
    'LBL_TABGROUP_HOME' => '统计图',
    'LBL_TABGROUP_MARKETING' => 'Marketing市场营销',
    'LBL_TABGROUP_MY_PORTALS' => '我的网站',
    'LBL_TABGROUP_OTHER' => '其他',
    'LBL_TABGROUP_REPORTS' => '报表',
    'LBL_TABGROUP_SALES' => 'S销售',
    'LBL_TABGROUP_SUPPORT' => 'Support服务',
    'LBL_TABGROUP_TOOLS' => '工具',
    'LBL_TASKS'=>'任务',
    'LBL_TEAMS_LINK'=>'团队',
    'LBL_THEME_COLOR'=>'颜色',
    'LBL_THEME_FONT'=>'字体',
    'LBL_THOUSANDS_SYMBOL' => 'K',
    'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
    'LBL_TRACK_EMAIL_BUTTON_LABEL' => '存档电子邮件',
    'LBL_TRACK_EMAIL_BUTTON_TITLE' => '存档电子邮件[Alt+K]',
    'LBL_UNAUTH_ADMIN' => '没有管理权限',
    'LBL_UNDELETE_BUTTON_LABEL' => '不删除',
    'LBL_UNDELETE_BUTTON_TITLE' => '不删除',
    'LBL_UNDELETE_BUTTON' => '不删除',
    'LBL_UNDELETE' => '不删除',
    'LBL_UNSYNC' => '不同步',
    'LBL_UPDATE' => '更新',
    'LBL_USER_LIST' => '用户列表',
    'LBL_USERS_SYNC'=>'用户同步',
    'LBL_USERS'=>'用户',
    'LBL_VERIFY_EMAIL_ADDRESS'=>'查看是否存在新邮件...',
    'LBL_VERIFY_PORTAL_NAME'=>'查看存在的门户名称...',
    'LBL_VIEW_IMAGE' => '查看',
    'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
    'LBL_VIEW_PDF_BUTTON_LABEL' => '以PDF格式打印',
    'LBL_VIEW_PDF_BUTTON_TITLE' => '以PDF格式打印[Alt+P]',


    'LNK_ABOUT' => '关于',
    'LNK_ADVANCED_FILTER' => '高级筛选',
    'LNK_BASIC_FILTER' => '快速筛选',
    'LBL_ADVANCED_SEARCH' => '高级筛选',
    'LBL_QUICK_FILTER' => '快速筛选',
    'LNK_SEARCH_FTS_VIEW_ALL' => '查看所有结果',
    'LNK_SEARCH_NONFTS_VIEW_ALL' => '显示所有',
    'LNK_CLOSE' => '关闭',
    'LBL_MODIFY_CURRENT_SEARCH'=> '修改当前筛选条件',
    'LNK_SAVED_VIEWS' => '保存查找和布局',
    'LNK_DELETE_ALL' => '删除所有记录',
    'LNK_DELETE' => '删除',
    'LNK_EDIT' => '编辑',
    'LNK_GET_LATEST'=>'获取最新的',
    'LNK_GET_LATEST_TOOLTIP'=>'用最新版本替换',
    'LNK_HELP' => '帮助',
    'LNK_CREATE' => '创建',
    'LNK_LIST_END' => '末页',
    'LNK_LIST_NEXT' => '下页',
    'LNK_LIST_PREVIOUS' => '上页',
    'LNK_LIST_RETURN' => '返回列表',
    'LNK_LIST_START' => '首页',
    'LNK_LOAD_SIGNED'=>'签署',
    'LNK_LOAD_SIGNED_TOOLTIP'=>'用签署文件代替',
    'LNK_PRINT' => '打印',
    'LNK_BACKTOTOP' => '返回顶端',
    'LNK_REMOVE' => '移除',
    'LNK_RESUME' => '重试',
    'LNK_VIEW_CHANGE_LOG' => '查看更改日志',


    'NTC_CLICK_BACK' => '请按浏览器的“返回”按钮返回，并纠正错误。',
    'NTC_DATE_FORMAT' => '(yyyy-mm-dd)',
    'NTC_DATE_TIME_FORMAT' => '(yyyy-mm-dd 24:00)',
    'NTC_DELETE_CONFIRMATION_MULTIPLE' => '确定要删除所选择的记录吗?',
    'NTC_TEMPLATE_IS_USED' => '这个模板至少被1个营销活动所使用。你确定要删除它吗？',
    'NTC_TEMPLATES_IS_USED' => '下列模板在营销活动中被使用。你确定要删除它们吗？\n',
    'NTC_DELETE_CONFIRMATION' => '您确定要删除这条记录?',
    'NTC_DELETE_CONFIRMATION_NUM' => '您确定要删除 ',
    'NTC_UPDATE_CONFIRMATION_NUM' => '您确定要更新 ',
    'NTC_DELETE_SELECTED_RECORDS' =>' 选择记录?',
    'NTC_LOGIN_MESSAGE' => '请输入用户名和密码。',
    'NTC_NO_ITEMS_DISPLAY' => '无',
    'NTC_REMOVE_CONFIRMATION' => '您确定要移除这个关系吗?',
    'NTC_REQUIRED' => '表示必填字段',
    'NTC_TIME_FORMAT' => '(24:00)',
    'NTC_WELCOME' => '欢迎',
    'NTC_YEAR_FORMAT' => '(yyyy)',
    'LOGIN_LOGO_ERROR'=> '请替换 SuiteCRM 标志。',
    'WARN_ONLY_ADMINS'=> "只有管理员才可以登录。",
    'WARN_UNSAVED_CHANGES'=> "当前记录已修改，离开当前界面，修改数据将丢失。您确定要离开当前界面吗？",
    'ERROR_NO_RECORD' => '检索记录出错。这条记录可能已被删除，或者您可能没有权限查看它。',
    'WARN_BROWSER_VERSION_WARNING' => "<b>警告：</b> 您使用的浏览器不被支持<p></p>推荐使用一下版本浏览器<p></p><ul><li>Internet Explorer 10 (不支持兼容性试图)<li>Firefox 32.0<li>Safari 5.1<li>Chrome 37</ul>",
    'WARN_BROWSER_IE_COMPATIBILITY_MODE_WARNING' => "<b>警告：</b>您的IE浏览器兼容试图不被支持。",
    'ERROR_TYPE_NOT_VALID' => '错误. 无效的类型.',
    'ERROR_NO_BEAN' => '未能获取 bean。', 
    'LBL_DUP_MERGE'=>'查找重复记录',
    'LBL_MANAGE_SUBSCRIPTIONS'=>'管理订阅',
    'LBL_MANAGE_SUBSCRIPTIONS_FOR'=>'管理订阅为',
    'LBL_SUBSCRIBE'=>'订阅',
    'LBL_UNSUBSCRIBE'=>'不订阅',
    // Ajax status strings
    'LBL_LOADING' => '加载中...',
    'LBL_SEARCHING' => '查找...',
    'LBL_SAVING_LAYOUT' => '布局保存中...',
    'LBL_SAVED_LAYOUT' => '布局已被保存。',
    'LBL_SAVED' => '已保存',
    'LBL_SAVING' => '保存中',
    'LBL_FAILED' => '失败！',
    'LBL_DISPLAY_COLUMNS' => '显示列',
    'LBL_HIDE_COLUMNS' => '隐藏列',
    'LBL_SEARCH_CRITERIA' => '查找标准',
    'LBL_SAVED_VIEWS' => '已保存的视图',
    'LBL_PROCESSING_REQUEST'=>'处理中...',
    'LBL_REQUEST_PROCESSED'=>'完成',
    'LBL_AJAX_FAILURE' => 'Ajax调用失败',
    'LBL_MERGE_DUPLICATES'  => '合并重复',
    'LBL_SAVED_SEARCH_SHORTCUT' => '预存的筛选条件',
    'LBL_FILTER_HEADER_TITLE'=> '筛选条件',
    'LBL_SEARCH_POPULATE_ONLY'=> '用上面的查找表单进行查找',
    'LBL_DETAILVIEW'=>'详情视图',
    'LBL_LISTVIEW'=>'列表视图',
    'LBL_EDITVIEW'=>'编辑视图',
    'LBL_SEARCHFORM'=>'查找表单',
    'LBL_SAVED_SEARCH_ERROR' => '请为这个视图提供一个名称。',
    'LBL_DISPLAY_LOG' => '显示日志',
    'ERROR_JS_ALERT_SYSTEM_CLASS' => '系统',
    'ERROR_JS_ALERT_TIMEOUT_TITLE' => '会话过期',
    'ERROR_JS_ALERT_TIMEOUT_MSG_1' => '您的会话将在2分钟后过期。请保存您的工作。',
    'ERROR_JS_ALERT_TIMEOUT_MSG_2' =>'您的会话已经过期。',
    'MSG_JS_ALERT_MTG_REMINDER_AGENDA' => "\n议题:",
    'MSG_JS_ALERT_MTG_REMINDER_MEETING' => '会议',
    'MSG_JS_ALERT_MTG_REMINDER_CALL' => '电话',
    'MSG_JS_ALERT_MTG_REMINDER_TIME' => '时间:',
    'MSG_JS_ALERT_MTG_REMINDER_LOC' => '地点:',
    'MSG_JS_ALERT_MTG_REMINDER_DESC' => '说明:',
    'MSG_JS_ALERT_MTG_REMINDER_STATUS' => '状态:',
    'MSG_JS_ALERT_MTG_REMINDER_RELATED_TO' => '关联到',
    'MSG_JS_ALERT_MTG_REMINDER_CALL_MSG' => "
	点击确定查看呼叫,或者点击取消放弃查看.",
  	'MSG_JS_ALERT_MTG_REMINDER_MEETING_MSG' => "
	点击确定查看会议,或者点击取消放弃查看.",
	'MSG_JS_ALERT_MTG_REMINDER_NO_EVENT_NAME' => '事件',
	'MSG_JS_ALERT_MTG_REMINDER_NO_DESCRIPTION' => '事件还没被设置。',
	'MSG_JS_ALERT_MTG_REMINDER_NO_LOCATION' => '位置还没被设置。',
	'MSG_JS_ALERT_MTG_REMINDER_NO_START_DATE' => '开始日期还没被定义。',
 	'MSG_LIST_VIEW_NO_RESULTS_BASIC' => "找不到任何结果。",
	'MSG_LIST_VIEW_NO_RESULTS' => "找不到任何结果： <item1>",
 	'MSG_LIST_VIEW_NO_RESULTS_SUBMSG' => "创建 <item1> 作为一个新的 <item2>",
	'MSG_EMPTY_LIST_VIEW_NO_RESULTS' => "你现在还没有保存任何记录。 现在保存 <item2> 或 <item3> 。",
	'MSG_EMPTY_LIST_VIEW_NO_RESULTS_SUBMSG' =>	"<item4> 了解更多的模块 <item1> 的信息. 使用主导航上的用户下拉菜单获取帮助。",

    'LBL_CLICK_HERE' => "点击这里",
    // contextMenu strings
    'LBL_ADD_TO_FAVORITES' => '增加到我的收藏夹',
    'LBL_MARK_AS_FAVORITES' => '标记为收藏',
    'LBL_CREATE_CONTACT' => '新增联系人',
    'LBL_CREATE_CASE' => '新增客户反馈',
    'LBL_CREATE_NOTE' => '新增备忘录',
    'LBL_CREATE_OPPORTUNITY' => '新增商业机会',
    'LBL_SCHEDULE_CALL' => '安排电话',
    'LBL_SCHEDULE_MEETING' => '安排会议',
    'LBL_CREATE_TASK' => '新增任务',
    'LBL_REMOVE_FROM_FAVORITES' => '从我的收藏夹中移除',
    //web to lead
    'LBL_GENERATE_WEB_TO_LEAD_FORM' => '产生表单',
    'LBL_SAVE_WEB_TO_LEAD_FORM' =>'保存潜在用户表单的网页',

    'LBL_PLEASE_SELECT' => '请选择',
    'LBL_REDIRECT_URL'=>'转载网址',
    'LBL_RELATED_CAMPAIGN' =>'相关的市场活动',
    'LBL_ADD_ALL_LEAD_FIELDS' => '增加所有的字段',
    'LBL_REMOVE_ALL_LEAD_FIELDS' => '移除所有的字段',
    'LBL_ONLY_IMAGE_ATTACHMENT' => '只有图片类型的附件才可以被嵌入',
    'LBL_TRAINING' => '培训',
    'ERR_DATABASE_CONN_DROPPED'=>'执行查询出现错误。很可能是数据库未被连接上。请刷新当前页，您可能需要重新启动网络服务。',
    'ERR_MSSQL_DB_CONTEXT' =>'修改数据库文本',
  'ERR_MSSQL_WARNING' =>'警告:',

    //Meta-Data framework
    'ERR_MISSING_VARDEF_NAME' => '警告: 字段 [[field]] 不能有一个映射入口在 [moduleDir] vardefs.php 文件',
    'ERR_CANNOT_CREATE_METADATA_FILE' => '错误: 文件 [[file]] 丢失. 不能创建因为没有对应的 HTML 文件可以找到.',
  'ERR_CANNOT_FIND_MODULE' => '错误: Module [module] 不存在.',
  'LBL_ALT_ADDRESS' => '其他地址:',
    'ERR_SMARTY_UNEQUAL_RELATED_FIELD_PARAMETERS' => '错误: 有一些不相等若干论据关于 \'key\' 和 \'copy\' 元素在显示参数的数组中.',
    'ERR_SMARTY_MISSING_DISPLAY_PARAMS' => '在显示参数数组丢失索引关于: ',

    /* MySugar Framework (for Home and Dashboard) */
    'LBL_DASHLET_CONFIGURE_GENERAL' => '整体',
    'LBL_DASHLET_CONFIGURE_FILTERS' => '过滤器',
    'LBL_DASHLET_CONFIGURE_MY_ITEMS_ONLY' => '仅我的条目',
    'LBL_DASHLET_CONFIGURE_TITLE' => '标题',
    'LBL_DASHLET_CONFIGURE_DISPLAY_ROWS' => '显示行',

    // MySugar status strings
    'LBL_CREATING_NEW_PAGE' => '创建新页 ...',
    'LBL_NEW_PAGE_FEEDBACK' => '您已经创建了新的一页。 您可以使用“添加Dashlets菜单选项“来添加新的内容。',
    'LBL_DELETE_PAGE_CONFIRM' => '您确定您要删除本页吗?',
    'LBL_SAVING_PAGE_TITLE' => '保存页标题 ...',
    'LBL_RETRIEVING_PAGE' => '恢复页面 ...',
    'LBL_MAX_DASHLETS_REACHED' => '你已经达到管理员设置的 SuiteCRM Dashlets 最大数目。若要添加更多 SuiteCRM Dashlet， 请移除一个现有的。',
    'LBL_ADDING_DASHLET' => '添加 SuiteCRM Dashlet 中...',
    'LBL_ADDED_DASHLET' => '已成功加入 SuiteCRM Dashlet',
    'LBL_REMOVE_DASHLET_CONFIRM' => '您确定要移除这个新增栏吗?',
    'LBL_REMOVING_DASHLET' => '移除新增栏中...',
    'LBL_REMOVED_DASHLET' => '新增栏已移除',

    // MySugar Menu Options
    'LBL_ADD_PAGE' => '添加页',
    'LBL_DELETE_PAGE' => '删除页',
    'LBL_CHANGE_LAYOUT' => '改变布局',
    'LBL_RENAME_PAGE' => '重命名布局',

    'LBL_LOADING_PAGE' => '加载页面, 请等待...',

    'LBL_RELOAD_PAGE' => '请<a href="javascript:window.location.reload()">重新加载窗口</a>来使用这个SuiteCRM Dashlet。',
    'LBL_ADD_DASHLETS' => '添加新增栏',
    'LBL_CLOSE_DASHLETS' => '关闭',
    'LBL_OPTIONS' => '选项',
    'LBL_NUMBER_OF_COLUMNS' => '点击一个图表来选择列的编号',
    'LBL_1_COLUMN' => '1 列',
    'LBL_2_COLUMN' => '2 列',
    'LBL_3_COLUMN' => '3 列',
    'LBL_PAGE_NAME' => '页名称',

    'LBL_SEARCH_RESULTS' => '查找结果',
    'LBL_SEARCH_MODULES' => '模块',
    'LBL_SEARCH_CHARTS' => '图表',
    'LBL_SEARCH_REPORT_CHARTS' => '报表图表',
    'LBL_SEARCH_TOOLS' => '工具',
    'LBL_SEARCH_HELP_TITLE' => '多项选择和保存查找条件',
    'LBL_SEARCH_HELP_CLOSE_TOOLTIP' => '关闭',
    'LBL_SEARCH_RESULTS_FOUND' => '搜索结果',
    'LBL_SEARCH_RESULTS_TIME' => '毫秒',
    'ERR_BLANK_PAGE_NAME' => '请输入一个页名称.',
    /* End MySugar Framework strings */

    'LBL_NO_IMAGE' => '无图象',

    'LBL_MODULE' => '模块',

    //adding a label for address copy from left
    'LBL_COPY_ADDRESS_FROM_LEFT' => '从左侧复制地址:',
    'LBL_SAVE_AND_CONTINUE' => '保存并继续',

    'LBL_SEARCH_HELP_TEXT' => '<p><br /><strong>多项选择控制</strong></p><ul><li>点击一个值选择一个属性.</li><li>Ctrl-点击&nbsp;来&nbsp;选择多个. Mac用户使用 CMD-点击.</li><li>在两个属性中来选择所有值,&nbsp; 点击第一个值&nbsp;之后shift-点击最后一个值.</li></ul><p><strong>高级查找 & 布局选项</strong><br><br>使用 <b>保存查找 & 布局</b> 选项, 您可以保存一组查找参数和/或一个客户化列表显示界面为了快速获得将来想要得到的查找结果. 您能保存一个不受限数目的客户化查找和布局. 所有保存的查找以名称的形式出现在保存的查找列表中, 与上次加载保存的查找出现在列表顶部.<br><br>客户化订制列表显示布局, 使用隐藏列框来选择哪个字段显示在查找结果中. 例如, 您可以显示或隐藏细节如记录名称和负责用户,负责团队在查找结果中. 添加一列来显示列, 在隐藏列表中选择字段并使用左边箭头符号来移动它显示的列表. 从列表显示中移动一列, 从显示的列表中选择它并用右箭头符号移动它到隐藏列中.<br><br>如果您保存布局设置, 您将能够加载它们在任何时间来显示查找结果在客户布局中.<br><br>保存和更新一个查找和/或布局:<ol><li>输入一个名称为查找结果在 <b>保存这个查找为</b> 字段并点击 <b>保存</b>.当前名称显示在保存的查找列表邻近<b>清除</b> 按钮.</li><li>查看保存查找, 选择它从保存的查找列表中. 查找结果显示在列表显示中.</li><li>更新保存的查找属性, 在列表中选择保存的查找, 输入新查找规则
      和/或布局悬想在高级查找区域, 并点击 <b>更新</b> 邻近 <b>修改当前查找</b>.</li><li>删除一个保存的查找, 选择它在保存的查找列表中, 点击 <b>删除</b> 邻近于 <b>修改当前查找</b>, 并之后点击 <b>确定</b> 来确认删除.</li></ol>' ,

    //resource management
    'ERR_QUERY_LIMIT' => 'Error:达到 $module module 查询上限 $limit.',
    'ERROR_NOTIFY_OVERRIDE' => '错误: ResourceObserver->notify() 需要被重写.',

    //tracker labels
    'ERR_MONITOR_FILE_MISSING' => '错误: 无法创建监视器，因为metedata文件为空或者不存在',
    'ERR_MONITOR_NOT_CONFIGURED' => '错误: 不存在为被请求的名字配置的监视器',
    'ERR_UNDEFINED_METRIC' => '错误: 不能为未定义量设置值',
    'ERR_STORE_FILE_MISSING' => '错误: 不能找到实现存储的文件',

    'LBL_MONITOR_ID' => '监视器编号',
    'LBL_USER_ID' => '用户编号',
    'LBL_MODULE_NAME' => '模块名称',
    'LBL_ITEM_ID' => '项目编号',
    'LBL_ITEM_SUMMARY' => '项目汇总',
    'LBL_ACTION' => '操作',
    'LBL_SESSION_ID' => 'Session编号',
    'LBL_BREADCRUMBSTACK_CREATED' => 'BreadCrumbStack 为用户 id {0} 创建',
    'LBL_VISIBLE' => '记录可见',
    'LBL_DATE_LAST_ACTION' => '上次操作日期',





    //jc:#12287 - For javascript validation messages
    'MSG_IS_NOT_BEFORE' => '必须早于',
  'MSG_IS_MORE_THAN' => '大于',
  'MSG_IS_LESS_THAN' => '小于',
  'MSG_SHOULD_BE' => '应该是',
  'MSG_OR_GREATER' => '或者大于',

    'LBL_PORTAL_WELCOME_TITLE' => '欢迎来到 SuiteCRM 门户网站',
    'LBL_PORTAL_WELCOME_INFO' => 'SuiteCRM门户是一个框架，给客户实时提供视图例、 bug 及通讯等。这是SuiteCRM可以部署在任何网站面向外部的接口。',
    'LBL_LIST' => '列表',
    'LBL_CREATE_BUG' => '创建缺陷追踪',
    'LBL_NO_RECORDS_FOUND' => '- 0 条记录被找到 -',

    'DATA_TYPE_DUE' => '到期:',
    'DATA_TYPE_START' => '开始:',
    'DATA_TYPE_SENT' => '已发送:',
    'DATA_TYPE_MODIFIED' => '已修改:',


    //jchi at 608/06/2008 10913am china time for the bug 12253.
    'LBL_REPORT_NEWREPORT_COLUMNS_TAB_COUNT' => '合计',
    //jchi #19433
    'LBL_OBJECT_IMAGE' => '图形',
    //jchi #12300
    'LBL_MASSUPDATE_DATE' => '请选择日期',

    'LBL_VALIDATE_RANGE' => '不在有效范围之内',
    'LBL_CHOOSE_START_AND_END_DATES' => '请选择开始日期和结束日期的范围',
    'LBL_CHOOSE_START_AND_END_ENTRIES' => '请选择开始日期和结束日期的范围',

    //jchi #  20776
    'LBL_DROPDOWN_LIST_ALL' => '所有',

    'LBL_OPERATOR_IN_TEXT' => '属于:',
    'LBL_OPERATOR_NOT_IN_TEXT' => '不属于:',


  //Connector
    'ERR_CONNECTOR_FILL_BEANS_SIZE_MISMATCH' => '错误: Bean参数的数组个数和结果数组的个数不相符。',
  'ERR_MISSING_MAPPING_ENTRY_FORM_MODULE' => '错误：模块映射入口不存在。',
  'ERROR_UNABLE_TO_RETRIEVE_DATA' => '错误：连接器不能获得数据。',
  'LBL_MERGE_CONNECTORS' => '获取数据',
  'LBL_MERGE_CONNECTORS_BUTTON_KEY' => '[D]',
  'LBL_REMOVE_MODULE_ENTRY' => '你确定要对这个模块停用连接器吗？',

    // fastcgi checks
    'LBL_FASTCGI_LOGGING'      => '为了使用IIS/FastCGI sapi的最佳体验，请在你的php.ini文件中设置fastcgi.logging为0。',

    //cma
    'LBL_MASSUPDATE_DELETE_GLOBAL_TEAM'=> '对不起，你不能删除全局团队. 异常退出。',
    'LBL_MASSUPDATE_DELETE_USER_EXISTS'=>'这个私有组 [{0}] 不能被删除, 除非用户 [{1}] 也被删除.',

    //martin #25548
    'LBL_NO_FLASH_PLAYER' => '请先安装或者打开已经安装的Flash. <a href="http://www.adobe.com/go/getflashplayer/">点击获得最新的Flash播放器</a>.',
  //Collection Field
  'LBL_COLLECTION_NAME' => '名称',
  'LBL_COLLECTION_PRIMARY' => '主要团队',
  'ERROR_MISSING_COLLECTION_SELECTION' => '必填字段',
    'LBL_COLLECTION_EXACT' => '确切团队',

    //MB -Fixed Bug #32812 -Max
    'LBL_ASSIGNED_TO_NAME' => '指派给',
    'LBL_DESCRIPTION' => '描述',

  'LBL_YESTERDAY'=> '昨天',
  'LBL_TODAY'=>'今天',
  'LBL_TOMORROW'=>'明天',
  'LBL_NEXT_WEEK'=> '下一周',
  'LBL_NEXT_MONDAY'=>'下周一',
  'LBL_NEXT_FRIDAY'=>'下周五',
  'LBL_TWO_WEEKS'=> '两周',
  'LBL_NEXT_MONTH'=> '下个月',
  'LBL_FIRST_DAY_OF_NEXT_MONTH'=> '下个月第一天',
  'LBL_THREE_MONTHS'=> '三个月',
  'LBL_SIXMONTHS'=> '两个月',
  'LBL_NEXT_YEAR'=> '明年',
    'LBL_FILTERED' => '过滤掉',

    //Datetimecombo fields
    'LBL_HOURS' => '小时',
    'LBL_MINUTES' => '分钟',
    'LBL_MERIDIEM' => '正午',
    'LBL_DATE' => '日期',
    'LBL_DASHLET_CONFIGURE_AUTOREFRESH' => '自动刷新',

    'LBL_DURATION_DAY' => '天',
    'LBL_DURATION_HOUR' => '小时',
    'LBL_DURATION_MINUTE' => '分钟',
    'LBL_DURATION_DAYS' => '天',
    'LBL_DURATION_HOURS' => '小时',
    'LBL_DURATION_MINUTES' => '分钟',

    //Calendar widget labels
    'LBL_CHOOSE_MONTH' => '选择月份',
    'LBL_ENTER_YEAR' => '输入年',
    'LBL_ENTER_VALID_YEAR' => '请输入一个有效的年份',

    //SugarFieldPhone labels
    'LBL_INVALID_USA_PHONE_FORMAT' => '请输入数字格式的电话号码，包含区号。',

    //File write error label
    'ERR_FILE_WRITE' => '错误: 无法写入文件 {0}. 请检查服务器配置.',
  'ERR_FILE_NOT_FOUND' => '错误: 无法加载文件 {0}. 请检查服务器配置.',

    'LBL_AND' => '和',
    'LBL_BEFORE' => '之前',

    // File fields
    'LBL_UPLOAD_FROM_COMPUTER' => '从您的计算机上传',
    'LBL_SEARCH_EXTERNAL_API' => '文件在外部源',
    'LBL_EXTERNAL_SECURITY_LEVEL' => '安全',
    'LBL_SHARE_PRIVATE' => '私有',
    'LBL_SHARE_COMPANY' => '公司',
    'LBL_SHARE_LINKABLE' => '可连接',
    'LBL_SHARE_PUBLIC' => '公共',


    // Web Services REST RSS
    'LBL_RSS_FEED' => 'Rss 订阅源',
    'LBL_RSS_RECORDS_FOUND' => '记录被找到',
    'ERR_RSS_INVALID_INPUT' => 'RSS 不是有效的输入类型',
    'ERR_RSS_INVALID_RESPONSE' => 'RSS is not a valid response_type for this method',

    //External API Error Messages
    'ERR_GOOGLE_API_415' => '谷歌文档不支持您所提供的文件格式。',

    'LBL_EMPTY' => '空',
    'LBL_IS_EMPTY' => '空',
    'LBL_IS_NOT_EMPTY' => '非空',
    //IMPORT SAMPLE TEXT
    'LBL_IMPORT_SAMPLE_FILE_TEXT' => '
“这是一个提供准备好导入文件内容的例子的样品导入文件。”

“此文件是用逗号分隔的.csv文件，使用双引号作为领域限定符。”

“就像您会在程序中看到的，头行在文件中为最顶端行列并且包含领域标签。”
这些标签在程序中是用来测绘文件中的数据到领域。”

“提示：数据库名称也能在头行里使用。 这在您正使用phpMyAdmin或其他数据库工具来提供一个导入数据的导出单时很实用。”
“导入进程与根据头行合适领域数据不匹配时，纵向按序排列不是决定性的。”


“要使用此文件作为模板，请参照：”
“1. 移出样板行数据”
“2.移出您正在阅读的帮助文本”
“3.输入您自己的数据到相应的行列”
“4.保存此文件到您系统上的一个可知位置”
“5.在程序里的行动目录中点击导入选项，选择上传文件。”',
    //define labels to be used for overriding local values during import/export
    'LBL_EXPORT_ASSIGNED_USER_ID' => '负责人ID',
    'LBL_EXPORT_ASSIGNED_USER_NAME' => '负责人姓名',
    'LBL_EXPORT_REPORTS_TO_ID' => '汇报人ID',
    'LBL_EXPORT_FULL_NAME' => '全名',
    'LBL_EXPORT_TEAM_ID' => '组ID',
    'LBL_EXPORT_TEAM_NAME' => '组名称',
    'LBL_EXPORT_TEAM_SET_ID' => '组集合ID',

    'LBL_QUICKEDIT_NODEFS_NAVIGATION'=> '导航... ',

    'LBL_PENDING_NOTIFICATIONS' => '通知',
    'LBL_NOTIFICATIONS_NONE' => '无新通知',
    'LBL_ALT_ADD_TEAM_ROW' => '添加新行',
    'LBL_ALT_REMOVE_TEAM_ROW' => '删除组',
    'LBL_ALT_SPOT_SEARCH' => '热点搜索',
    'LBL_ALT_SORT_DESC' => '降序',
    'LBL_ALT_SORT_ASC' => '升序',
    'LBL_ALT_SORT' => '排序',
    'LBL_ALT_SHOW_OPTIONS' => '显示选项',
    'LBL_ALT_HIDE_OPTIONS' => '隐藏选项',
    'LBL_ALT_MOVE_COLUMN_LEFT' => '把选中的记录移动到左侧列表',
    'LBL_ALT_MOVE_COLUMN_RIGHT' => '把选中的记录移动到右侧列表',
    'LBL_ALT_MOVE_COLUMN_UP' =>'把选中的记录靠前显示',
    'LBL_ALT_MOVE_COLUMN_DOWN' => '把选中的记录靠后显示',
    'LBL_ALT_INFO' => '信息',
	'MSG_DUPLICATE' => '将要创建的记录 {0} ，可能跟已有记录 {0} 重复。记录 {1} 含有相同的名字，如下所示。<br>点击创建 {1} 来创建一个新的 {0}, 或者从下面列表选择一个已存在的 {0} 。',
    'MSG_SHOW_DUPLICATES' => '将要创建的记录 {0} ，可能跟已有记录 {0} 重复。 {1} 含有相同的名字，如下所示。 点击保存将创建一个新的 {0} ，或者点击取消返回模块{0}，不创建新纪录。',
    'LBL_EMAIL_TITLE' => 'Email地址',
    'LBL_EMAIL_OPT_TITLE' => '选出Email地址',
    'LBL_EMAIL_INV_TITLE' => '无效的Email地址',
    'LBL_EMAIL_PRIM_TITLE' => '主Email地址',
    'LBL_SELECT_ALL_TITLE' => '全选',
    'LBL_SELECT_THIS_ROW_TITLE' => '选择该行',
    'LBL_TEAM_SELECTED_TITLE' => '选中组 ',
    'LBL_TEAM_SELECT_AS_PRIM_TITLE' => '选择主组',

    //for upload errors
    'UPLOAD_ERROR_TEXT'          => '错误: 上传时发生错误。 错误编号{0} - {1}',
    'UPLOAD_ERROR_TEXT_SIZEINFO' => '错误: 上传时发生错误。 错误编号{0} - {1}. 最大上传大小： {2} ',
    'UPLOAD_ERROR_HOME_TEXT'     => '错误: 上传时发生错误，请联系管理员解决。',
    'UPLOAD_MAXIMUM_EXCEEDED'    => '上传大小 ({0} bytes) 超出了最大限制: {1} bytes',
    'UPLOAD_REQUEST_ERROR'    => '发生错误。请刷新页面，然后重试。',


    //508 used Access Keys
    'LBL_EDIT_BUTTON_KEY' => 'E',
    'LBL_EDIT_BUTTON_LABEL' => '编辑',
    'LBL_EDIT_BUTTON_TITLE' => '编辑[Alt+E]',
    'LBL_DUPLICATE_BUTTON_KEY' => 'U',
    'LBL_DUPLICATE_BUTTON_LABEL' => '复制',
    'LBL_DUPLICATE_BUTTON_TITLE' => '复制[Alt+U]',
    'LBL_DELETE_BUTTON_KEY' => 'D',
    'LBL_DELETE_BUTTON_LABEL' => '删除',
    'LBL_DELETE_BUTTON_TITLE' => '删除[Alt+D]',
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
    'LBL_KEYBOARD_SHORTCUTS_HELP_TITLE' => '键盘快捷键',
    'LBL_KEYBOARD_SHORTCUTS_HELP' => '<p><strong>表单功能 - Alt+</strong><br/> I = 编辑<b>I</b> (详细视图)<br/> U = 复制<b>U</b> (详细视图)<br/> D = 删除<b>D</b> (详细视图)<br/> A = 保存<b>A</b> (编辑视图)<br/> L = 取消<b>L</b> (编辑视图) <br/><br/></p><p><strong>搜索和导航  - Alt+</strong><br/> 7 = 编辑表单上的第一个字段<br/> 8 = 高级搜索链接<br/> 9 = 搜索表单上的第一个字段<br/> 0 = 全局搜索<br></p>' ,

    'ERR_CONNECTOR_NOT_ARRAY' => '连接器中的 {0} 配置不正确，无法使用。',
    'ERR_SUHOSIN' => 'Upload stream is blocked by Suhosin, please add &quot;upload&quot; to suhosin.executor.include.whitelist (See suitecrm.log for more information)',
    'ERR_BAD_RESPONSE_FROM_SERVER' => '服务器未正确响应',
    'LBL_ACCOUNT_PRODUCT_QUOTE_LINK' => '引用',
    'LBL_ACCOUNT_PRODUCT_SALE_PRICE' => '实际服务费',
    'LBL_EMAIL_CHECK_INTERVAL_DOM'          => array(
        '-1' => '手动',
        '5' => '每5分钟',
        '15' => '每15分钟',
        '30' => '每30分钟',
        '60' => '每小时',
    ),

    'ERR_A_REMINDER_IS_EMPTY_OR_INCORRECT' => '提醒是空的或不正确。',
    'ERR_REMINDER_IS_NOT_SET_POPUP_OR_EMAIL' => '未设置自动弹出式视窗或电子邮件提醒。',
    'ERR_NO_INVITEES_FOR_REMINDER' => '未设置自动提醒的受邀者。',

    'LBL_COLUMNS_FILTER_HEADER_TITLE' => '挑选列表字段',
    'LBL_SAVE_CHANGES_BUTTON_TITLE' => '保存',
    'LBL_DISPLAYED' => '显示列',
    'LBL_HIDDEN' => '隐藏列',
    'ERR_EMPTY_COLUMNS_LIST' => '必须至少选择1列',

    'LBL_AOP_INTERNAL' => '内部的',
    'LBL_SAVED_FILTER_SHORTCUT' => '我预存的筛选条件',
    );




$app_list_strings['moduleList']['Library'] = '图书馆';
$app_list_strings['library_type'] = array('Books'=>'书籍', 'Music'=>'音乐', 'DVD'=>'DVD', 'Magazines'=>'杂志');
$app_list_strings['moduleList']['EmailAddresses'] = '邮件地址';
$app_list_strings['project_priority_default'] = '中';
$app_list_strings['project_priority_options'] = array (
    'High' => '高',
    'Medium' => '中',
    'Low' => '低',
);

$app_list_strings['kbdocument_status_dom'] = array (
    'Draft' => '草稿',
    'Expired' => '有效期',
    'In Review' => '审查中',
    'Published' => '发布',
  );

   $app_list_strings['kbadmin_actions_dom'] =
    array (
    ''          => '无',
    'Create New Tag' => '创建新标签',
    'Delete Tag'=>'删除标签',
    'Rename Tag'=>'重命名标签',
    'Move Selected Articles'=>'移动选择的文章',
    'Apply Tags On Articles'=>'为文章应用标签',
    'Delete Selected Articles'=>'删除选择的文章',
  );


  $app_list_strings['kbdocument_attachment_option_dom'] =
    array(
        ''=>'',
        'some' => '有附件',
        'none' => '无',
        'mime' => '说明Mime类型',
        'name' => '说明姓名',
    );

  $app_list_strings['moduleList']['KBDocuments'] = '基础知识';
  $app_strings['LBL_CREATE_KB_DOCUMENT'] = '创建文章';
  $app_list_strings['kbdocument_viewing_frequency_dom'] =
  array(
    ''=>'',
    'Top_5'  => '前 5',
    'Top_10' => '前 10',
    'Top_20' => '前 20',
    'Bot_5'  => '后 5',
    'Bot_10' => '后 10',
    'Bot_20' => '后 20',
  );

   $app_list_strings['kbdocument_canned_search'] =
    array(
        'all'=>'所有相关的',
        'added' => '加上前30天',
        'pending' => '等待中',
        'updated' =>'更新前30天',
        'faqs' => '常见问题解答',
    );
    $app_list_strings['kbdocument_date_filter_options'] =
        array(
    '' => '',
    'on' => '在',
    'before' => '之前',
    'after' => '之后',
    'between_dates' => '是否在之间',
    'last_7_days' => '过去7天',
    'next_7_days' => '未来7天',
    'last_month' => '上个月',
    'this_month' => '这个月',
    'next_month' => '下个月',
    'last_30_days' => '过去30天',
    'next_30_days' => '未来30天',
    'last_year' => '去年',
    'this_year' => '今年',
    'next_year' => '明年',
    'isnull' => '是否空',
        );

    $app_list_strings['countries_dom'] = array(
        '' => '',
        'ABU DHABI' => '阿布扎比',
        'ADEN' => '亚丁',
        'AFGHANISTAN' => '阿富汗伊斯兰共和国',
        'ALBANIA' => '阿尔巴尼亚',
        'ALGERIA' => '阿尔及利亚',
        'AMERICAN SAMOA' => '美属萨摩亚',
        'ANDORRA' => '安道尔',
        'ANGOLA' => '安哥拉',
        'ANTARCTICA' => '南极洲',
        'ANTIGUA' => '安提瓜',
        'ARGENTINA' => '阿根廷',
        'ARMENIA' => '亚美尼亚',
        'ARUBA' => '阿鲁巴',
        'AUSTRALIA' => '澳大利亚',
        'AUSTRIA' => '奥地利',
        'AZERBAIJAN' => '阿塞拜疆',
        'BAHAMAS' => '巴哈马',
        'BAHRAIN' => '巴林',
        'BANGLADESH' => '孟加拉',
        'BARBADOS' => '巴巴多斯',
        'BELARUS' => '白俄罗斯',
        'BELGIUM' => '比利时',
        'BELIZE' => '伯里兹',
        'BENIN' => '贝宁',
        'BERMUDA' => '百幕达',
        'BHUTAN' => '不丹',
        'BOLIVIA' => '玻利维亚',
        'BOSNIA' => '波斯尼亚',
        'BOTSWANA' => '博茨瓦纳',
        'BOUVET ISLAND' => '布维岛',
        'BRAZIL' => '巴西',
        'BRITISH ANTARCTICA TERRITORY' => '英国南极洲领土',
        'BRITISH INDIAN OCEAN TERRITORY' => '英属印度洋领地',
        'BRITISH VIRGIN ISLANDS' => '英属维尔京群岛',
        'BRITISH WEST INDIES' => '英属西印度群岛',
        'BRUNEI' => '文莱',
        'BULGARIA' => '保加利亚',
        'BURKINA FASO' => '布基纳法索',
        'BURUNDI' => '布隆迪',
        'CAMBODIA' => '柬埔寨',
        'CAMEROON' => '喀麦隆',
        'CANADA' => '加拿大',
        'CANAL ZONE' => '运河区',
        'CANARY ISLAND' => '加纳利岛',
        'CAPE VERDI ISLANDS' => '哥连臣角威尔第群岛',
        'CAYMAN ISLANDS' => '开曼群岛',
        'CEVLON' => 'CEVLON',
        'CHAD' => '乍得',
        'CHANNEL ISLAND UK' => '频道岛屋',
        'CHILE' => '智力',
        'CHINA' => '中国',
        'CHRISTMAS ISLAND' => '圣诞岛',
        'COCOS (KEELING) ISLAND' => '科科斯（基林）岛',
        'COLOMBIA' => '哥伦比亚',
        'COMORO ISLANDS' => '科摩罗群岛',
        'CONGO' => '刚果',
        'CONGO KINSHASA' => '刚果金沙萨',
        'COOK ISLANDS' => '库克群岛',
        'COSTA RICA' => '哥斯达黎加',
        'CROATIA' => '克罗地亚',
        'CUBA' => '古巴',
        'CURACAO' => '库拉索',
        'CYPRUS' => '塞浦路斯',
        'CZECH REPUBLIC' => '捷克共和国',
        'DAHOMEY' => '达荷美',
        'DENMARK' => '丹麦',
        'DJIBOUTI' => '吉布提',
        'DOMINICA' => '多米尼亚',
        'DOMINICAN REPUBLIC' => '多米尼加共和国',
        'DUBAI' => '迪拜',
        'ECUADOR' => '厄瓜多尔',
        'EGYPT' => '埃及',
        'EL SALVADOR' => '萨尔瓦多',
        'EQUATORIAL GUINEA' => '赤道几内亚',
        'ESTONIA' => '爱沙尼亚',
        'ETHIOPIA' => '埃塞俄比亚',
        'FAEROE ISLANDS' => '法罗群岛',
        'FALKLAND ISLANDS' => '福克兰群岛',
        'FIJI' => '斐济',
        'FINLAND' => '芬兰',
        'FRANCE' => '法国',
        'FRENCH GUIANA' => '法属圭亚那',
        'FRENCH POLYNESIA' => '法属玻利尼西亚',
        'GABON' => '加蓬',
        'GAMBIA' => '冈比亚',
        'GEORGIA' => '格鲁吉亚',
        'GERMANY' => '德国',
        'GHANA' => '加纳',
        'GIBRALTAR' => '直布罗陀',
        'GREECE' => '希腊',
        'GREENLAND' => '格林兰',
        'GUADELOUPE' => '哥德洛普',
        'GUAM' => '关岛',
        'GUATEMALA' => '危地马拉',
        'GUINEA' => '几内亚',
        'GUYANA' => '圭亚那',
        'HAITI' => '海地',
        'HONDURAS' => '洪都拉斯',
        'HONG KONG' => '香港',
        'HUNGARY' => '匈牙利',
        'ICELAND' => '冰岛',
        'IFNI' => '伊夫尼',
        'INDIA' => '印度',
        'INDONESIA' => '印度尼西亚',
        'IRAN' => '伊朗',
        'IRAQ' => '伊拉克',
        'IRELAND' => '爱尔兰',
        'ISRAEL' => '以色列',
        'ITALY' => '意大利',
        'IVORY COAST' => '象牙海岸',
        'JAMAICA' => '牙买加',
        'JAPAN' => '日本',
        'JORDAN' => '约旦',
        'KAZAKHSTAN' => '哈萨克斯坦',
        'KENYA' => '肯尼亚',
        'KOREA' => '韩国',
        'KOREA, SOUTH' => '南朝鲜',
        'KUWAIT' => '科威特',
        'KYRGYZSTAN' => '吉尔吉斯斯坦',
        'LAOS' => '老挝',
        'LATVIA' => '拉托维亚',
        'LEBANON' => '黎巴嫩',
        'LEEWARD ISLANDS' => '背风群岛',
        'LESOTHO' => '莱索托',
        'LIBYA' => '利比亚',
        'LIECHTENSTEIN' => '列支敦士登',
        'LITHUANIA' => '立陶宛',
        'LUXEMBOURG' => '卢森堡',
        'MACAO' => '澳门',
        'MACEDONIA' => '马其顿',
        'MADAGASCAR' => '马达加斯加',
        'MALAWI' => '马拉维',
        'MALAYSIA' => '马来西亚',
        'MALDIVES' => '马尔代夫',
        'MALI' => '马里',
        'MALTA' => '马耳他',
        'MARTINIQUE' => '马提尼克',
        'MAURITANIA' => '毛里塔尼亚',
        'MAURITIUS' => '毛里求斯',
        'MELANESIA' => '美拉尼西亚',
        'MEXICO' => '墨西哥',
        'MOLDOVIA' => '摩尔多瓦',
        'MONACO' => '摩纳哥',
        'MONGOLIA' => '内蒙古',
        'MOROCCO' => '摩洛哥',
        'MOZAMBIQUE' => '莫桑比克',
        'MYANAMAR' => '缅甸',
        'NAMIBIA' => '纳米比亚',
        'NEPAL' => '尼泊尔',
        'NETHERLANDS' => '荷兰共和国',
        'NETHERLANDS ANTILLES' => '荷属安的列斯群岛',
        'NETHERLANDS ANTILLES NEUTRAL ZONE' => '荷属安的列斯群岛中立区',
        'NEW CALADONIA' => '新加多利亚',
        'NEW HEBRIDES' => '新赫布里底',
        'NEW ZEALAND' => '新西兰',
        'NICARAGUA' => '尼加拉瓜',
        'NIGER' => '尼日尔',
        'NIGERIA' => '尼日利亚',
        'NORFOLK ISLAND' => '诺福克岛',
        'NORWAY' => '挪威',
        'OMAN' => '阿曼',
        'OTHER' => '其它',
        'PACIFIC ISLAND' => '太平洋岛国',
        'PAKISTAN' => '巴基斯坦',
        'PANAMA' => '巴拿马',
        'PAPUA NEW GUINEA' => '巴布亚新几内亚',
        'PARAGUAY' => '巴拉圭',
        'PERU' => '秘鲁',
        'PHILIPPINES' => '菲律宾群岛',
        'POLAND' => '波兰',
        'PORTUGAL' => '葡萄牙',
        'PORTUGUESE TIMOR' => 'EAST TIMOR',
        'PUERTO RICO' => '波多黎各',
        'QATAR' => '卡塔尔',
        'REPUBLIC OF BELARUS' => '白俄罗斯共和国',
        'REPUBLIC OF SOUTH AFRICA' => '南非共和国',
        'REUNION' => '留尼汪',
        'ROMANIA' => '罗马尼亚',
        'RUSSIA' => '前苏联',
        'RWANDA' => '卢旺达',
        'RYUKYU ISLANDS' => '琉球群岛',
        'SABAH' => '沙巴',
        'SAN MARINO' => '圣马力诺',
        'SAUDI ARABIA' => '沙特阿拉伯',
        'SENEGAL' => '塞内加尔',
        'SERBIA' => '塞尔维亚',
        'SEYCHELLES' => '塞舌耳',
        'SIERRA LEONE' => '塞拉利昂',
        'SINGAPORE' => '新加坡',
        'SLOVAKIA' => '斯洛伐克',
        'SLOVENIA' => '斯洛文尼亚',
        'SOMALILIAND' => '索马里兰',
        'SOUTH AFRICA' => '南非',
        'SOUTH YEMEN' => '南也门',
        'SPAIN' => '西班牙',
        'SPANISH SAHARA' => '西班牙撒哈拉',
        'SRI LANKA' => '斯里兰卡',
        'ST. KITTS AND NEVIS' => '圣.基茨和尼维斯',
        'ST. LUCIA' => '圣.露西娅',
        'SUDAN' => '苏丹',
        'SURINAM' => '苏里南',
        'SW AFRICA' => '西南非洲',
        'SWAZILAND' => '斯威士兰',
        'SWEDEN' => '瑞典',
        'SWITZERLAND' => '瑞士',
        'SYRIA' => '叙利亚',
        'TAIWAN' => '台湾',
        'TAJIKISTAN' => '塔吉克斯坦',
        'TANZANIA' => '坦桑尼亚',
        'THAILAND' => '泰国',
        'TONGA' => '汤加',
        'TRINIDAD' => '专案炽暄',
        'TUNISIA' => '突尼斯',
        'TURKEY' => '土耳其',
        'UGANDA' => '乌干达',
        'UKRAINE' => '乌克兰',
        'UNITED ARAB EMIRATES' => '阿拉伯联合酋长国',
        'UNITED KINGDOM' => '联合王国',
        'UPPER VOLTA' => '  上沃尔特 ',
        'URUGUAY' => '  乌拉圭 ',
        'US PACIFIC ISLAND' => '美军太平洋岛屿',
        'US VIRGIN ISLANDS' => '美属维尔京群岛',
        'USA' => '美国',
        'UZBEKISTAN' => '乌兹别克斯坦',
        'VANUATU' => '  瓦努阿图 ',
        'VATICAN CITY' => '梵蒂冈城',
        'VENEZUELA' => '委内瑞拉',
        'VIETNAM' => '越南',
        'WAKE ISLAND' => '威克岛',
        'WEST INDIES' => '西印度群岛',
        'WESTERN SAHARA' => '西撒哈拉',
        'YEMEN' => '也门',
        'ZAIRE' => '扎伊尔',
        'ZAMBIA' => '赞比亚',
        'ZIMBABWE' => '津巴布韦',
    );

  $app_list_strings['charset_dom'] = array(
    'BIG-5'     => 'BIG-5 (台湾和香港)',
    /*'CP866'     => 'CP866', // ms-dos Cyrillic */
    /*'CP949'     => 'CP949 (Microsoft Korean)', */
    'CP1251'    => 'CP1251 (微软西里尔)',
    'CP1252'    => 'CP1252 (微软西欧和美国)',
    'EUC-CN'    => 'EUC-CN (简体中文GB2312)',
    'EUC-JP'    => 'EUC-JP (Unix日本)',
    'EUC-KR'    => 'EUC-KR (韩国)',
    'EUC-TW'    => 'EUC-TW (台湾)',
    'ISO-2022-JP' => 'ISO-2022-JP (日本)',
    'ISO-2022-KR' => 'ISO-2022-KR (韩国)',
    'ISO-8859-1'  => 'ISO-8859-1 (西欧和美国)',
    'ISO-8859-2'  => 'ISO-8859-2 (中东欧)',
    'ISO-8859-3'  => 'ISO-8859-3 (拉丁3)',
    'ISO-8859-4'  => 'ISO-8859-4 (拉丁4)',
    'ISO-8859-5'  => 'ISO-8859-5 (西里尔)',
    'ISO-8859-6'  => 'ISO-8859-6 (阿拉伯)',
    'ISO-8859-7'  => 'ISO-8859-7 (希腊)',
    'ISO-8859-8'  => 'ISO-8859-8 (希伯来)',
    'ISO-8859-9'  => 'ISO-8859-9 (拉丁5)',
    'ISO-8859-10' => 'ISO-8859-10 (拉丁6)',
    'ISO-8859-13' => 'ISO-8859-13 (拉丁7)',
    'ISO-8859-14' => 'ISO-8859-14 (拉丁8)',
    'ISO-8859-15' => 'ISO-8859-15 (拉丁9)',
    'KOI8-R'    => 'KOI8-R (西里尔俄罗斯)',
    'KOI8-U'    => 'KOI8-U (西里尔乌克兰)',
    'SJIS'      => 'SJIS (微软日本)',
    'UTF-8'     => 'UTF-8',
  );

  $app_list_strings['timezone_dom'] = array(

  'Africa/Algiers' => '非洲/阿尔及尔',
  'Africa/Luanda' => '非洲/罗安达',
  'Africa/Porto-Novo' => '非洲/波多诺伏',
  'Africa/Gaborone' => '非洲/哈博罗内',
  'Africa/Ouagadougou' => '非洲/瓦加杜古',
  'Africa/Bujumbura' => '非洲/布琼布拉',
  'Africa/Douala' => '非洲/杜阿拉',
  'Atlantic/Cape_Verde' => '大西洋/佛得角',
  'Africa/Bangui' => '非洲/班吉',
  'Africa/Ndjamena' => '非洲/恩贾梅纳',
  'Indian/Comoro' => '印度洋/科摩罗',
  'Africa/Kinshasa' => '非洲/金沙萨',
  'Africa/Lubumbashi' => '非洲/卢本巴希',
  'Africa/Brazzaville' => '非洲/布拉柴维尔',
  'Africa/Abidjan' => '非洲/阿比让',
  'Africa/Djibouti' => '非洲/吉布提',
  'Africa/Cairo' => '非洲/开罗',
  'Africa/Malabo' => '非洲/马拉博',
  'Africa/Asmera' => '非洲/阿斯马拉',
  'Africa/Addis_Ababa' => '非洲/亚的斯亚贝巴',
  'Africa/Libreville' => '非洲/利伯维尔',
  'Africa/Banjul' => '非洲/班珠尔',
  'Africa/Accra' => '非洲/阿克拉',
  'Africa/Conakry' => '非洲/科纳克里',
  'Africa/Bissau' => '非洲/比绍',
  'Africa/Nairobi' => '非洲/内罗毕',
  'Africa/Maseru' => '非洲/马塞卢',
  'Africa/Monrovia' => '非洲/蒙罗维亚',
  'Africa/Tripoli' => '非洲/的黎波里',
  'Indian/Antananarivo' => '印度洋/塔那那利佛',
  'Africa/Blantyre' => '非洲/布兰太尔',
  'Africa/Bamako' => '非洲/巴马科',
  'Africa/Nouakchott' => '非洲/努瓦克肖特',
  'Indian/Mauritius' => '印度洋/毛里求斯',
  'Indian/Mayotte' => '印度洋/马约特',
  'Africa/Casablanca' => '非洲/卡萨布兰卡',
  'Africa/El_Aaiun' => '非洲/阿尤恩',
  'Africa/Maputo' => '非洲/马普托',
  'Africa/Windhoek' => '非洲/温得和克',
  'Africa/Niamey' => '非洲/尼亚美',
  'Africa/Lagos' => '非洲/拉各斯',
  'Indian/Reunion' => '印度洋/留尼汪岛',
  'Africa/Kigali' => '非洲/基加利',
  'Atlantic/St_Helena' => '大西洋/圣赫勒拿岛',
  'Africa/Sao_Tome' => '非洲/圣多美',
  'Africa/Dakar' => '非洲/达喀尔',
  'Indian/Mahe' => '印度洋/马埃',
  'Africa/Freetown' => '非洲/弗里敦',
  'Africa/Mogadishu' => '非洲/摩加迪沙',
  'Africa/Johannesburg' => '非洲/约翰内斯堡',
  'Africa/Khartoum' => '非洲/喀土穆',
  'Africa/Mbabane' => '非洲/姆巴巴内',
  'Africa/Dar_es_Salaam' => '非洲/达累斯萨拉姆',
  'Africa/Lome' => '非洲/洛美',
  'Africa/Tunis' => '非洲/突尼斯',
  'Africa/Kampala' => '非洲/坎帕拉',
  'Africa/Lusaka' => '非洲/卢萨卡',
  'Africa/Harare' => '非洲/哈尔',
  'Antarctica/Casey' => '南极洲/凯西站',
  'Antarctica/Davis' => '南极洲/戴维斯站',
  'Antarctica/Mawson' => '南极洲/莫森站',
  'Indian/Kerguelen' => '印度洋/克尔格伦群岛',
  'Antarctica/DumontDUrville' => '南极洲/都蒙特得乌尔维尔站',
  'Antarctica/Syowa' => '南极洲/斯由瓦站',
  'Antarctica/Vostok' => '南极洲/东方站',
  'Antarctica/Rothera' => '南极洲/罗西拉',
  'Antarctica/Palmer' => '南极洲/帕玛',
  'Antarctica/McMurdo' => '南极洲/麦克默多站',
  'Asia/Kabul' => '亚洲/喀布尔',
  'Asia/Yerevan' => '亚洲/埃里温',
  'Asia/Baku' => '亚洲/巴库',
  'Asia/Bahrain' => '亚洲/巴林',
  'Asia/Dhaka' => '亚洲/达卡',
  'Asia/Thimphu' => '亚洲/廷布',
  'Indian/Chagos' => '印度洋/查戈斯群岛',
  'Asia/Brunei' => '亚洲/文莱',
  'Asia/Rangoon' => '亚洲/仰光',
  'Asia/Phnom_Penh' => '亚洲/金边',
  'Asia/Beijing' => '亚洲/北京',
  'Asia/Harbin' => '亚洲/哈尔滨',
  'Asia/Shanghai' => '亚洲/上海',
  'Asia/Chongqing' => '亚洲/重庆',
  'Asia/Urumqi' => '亚洲/乌鲁木齐',
  'Asia/Kashgar' => '亚洲/喀什',
  'Asia/Hong_Kong' => '亚洲/香港',
  'Asia/Taipei' => '亚洲/台北',
  'Asia/Macau' => '亚洲/澳门',
  'Asia/Nicosia' => '亚洲/尼科西亚',
  'Asia/Tbilisi' => '亚洲/梯比利斯',
  'Asia/Dili' => '亚洲/帝力',
  'Asia/Calcutta' => '亚洲/加尔各答',
  'Asia/Jakarta' => '亚洲/雅加达',
  'Asia/Pontianak' => '亚洲/坤甸',
  'Asia/Makassar' => '亚洲/望加锡',
  'Asia/Jayapura' => '亚洲/查亚普拉',
  'Asia/Tehran' => '亚洲/德黑兰',
  'Asia/Baghdad' => '亚洲/巴格达',
  'Asia/Jerusalem' => '亚洲/耶路撒冷',
  'Asia/Tokyo' => '亚洲/东京',
  'Asia/Amman' => '亚洲/安曼',
  'Asia/Almaty' => '亚洲/阿拉木图',
  'Asia/Qyzylorda' => '亚洲/奥尔达',
  'Asia/Aqtobe' => '亚洲/阿克托博',
  'Asia/Aqtau' => '亚洲/阿克陶',
  'Asia/Oral' => '亚洲/乌拉尔',
  'Asia/Bishkek' => '亚洲/比什凯克',
  'Asia/Seoul' => '亚洲/汉城',
  'Asia/Pyongyang' => '亚洲/平壤',
  'Asia/Kuwait' => '亚洲/科威特',
  'Asia/Vientiane' => '亚洲/万象',
  'Asia/Beirut' => '亚洲/贝鲁特',
  'Asia/Kuala_Lumpur' => '亚洲/吉隆坡',
  'Asia/Kuching' => '亚洲/古晋',
  'Indian/Maldives' => '印度洋/马尔代夫',
  'Asia/Hovd' => '亚洲/霍伏得',
  'Asia/Ulaanbaatar' => '亚洲/乌兰巴托',
  'Asia/Choibalsan' => '亚洲/乔巴山',
  'Asia/Katmandu' => '亚洲/加德满都',
  'Asia/Muscat' => '亚洲/马斯喀特',
  'Asia/Karachi' => '亚洲/卡拉奇',
  'Asia/Gaza' => '亚洲/加沙',
  'Asia/Manila' => '亚洲/马尼拉',
  'Asia/Qatar' => '亚洲/卡塔尔',
  'Asia/Riyadh' => '亚洲/利雅得',
  'Asia/Singapore' => '亚洲/新加坡',
  'Asia/Colombo' => '亚洲/科伦坡',
  'Asia/Damascus' => '亚洲/大马士革',
  'Asia/Dushanbe' => '亚洲/杜尚别',
  'Asia/Bangkok' => '亚洲/曼谷',
  'Asia/Ashgabat' => '亚洲/阿什哈巴德',
  'Asia/Dubai' => '亚洲/迪拜',
  'Asia/Samarkand' => '亚洲/撒马尔罕',
  'Asia/Tashkent' => '亚洲/塔什干',
  'Asia/Saigon' => '亚洲/西贡',
  'Asia/Aden' => '亚洲/亚丁',
  'Australia/Darwin' => '澳大利亚/达尔文',
  'Australia/Perth' => '澳大利亚/佩思',
  'Australia/Brisbane' => '澳大利亚/布里斯班',
  'Australia/Lindeman' => '澳大利亚/林德曼岛',
  'Australia/Adelaide' => '澳大利亚/阿得雷德',
  'Australia/Hobart' => '澳大利亚/霍巴特',
  'Australia/Currie' => '澳大利亚/柯里',
  'Australia/Melbourne' => '澳大利亚/墨尔本',
  'Australia/Sydney' => '澳大利亚/悉尼',
  'Australia/Broken_Hill' => '澳大利亚/断山',
  'Indian/Christmas' => '印度洋/圣诞岛',
  'Pacific/Rarotonga' => '太平洋/拉罗汤加岛',
  'Indian/Cocos' => '印度洋/可可斯岛',
  'Pacific/Fiji' => '太平洋/斐济',
  'Pacific/Gambier' => '太平洋/冈比亚岛',
  'Pacific/Marquesas' => '太平洋/马尔萨斯群岛',
  'Pacific/Tahiti' => '太平洋/塔希提岛',
  'Pacific/Guam' => '太平洋/关岛',
  'Pacific/Tarawa' => '太平洋/塔拉瓦岛',
  'Pacific/Enderbury' => '太平洋/恩的伯利',
  'Pacific/Kiritimati' => '太平洋/基里提马蒂',
  'Pacific/Saipan' => '太平洋/塞班岛',
  'Pacific/Majuro' => '太平洋/马朱罗',
  'Pacific/Kwajalein' => '太平洋/卡瓦加兰',
  'Pacific/Truk' => '太平洋/特鲁克群岛',
  'Pacific/Pohnpei' => 'Pacific/Pohnpei',
  'Pacific/Kosrae' => '太平洋/库赛埃',
  'Pacific/Nauru' => '太平洋/瑙鲁',
  'Pacific/Noumea' => '太平洋/努美阿',
  'Pacific/Auckland' => '太平洋/奥克兰',
  'Pacific/Chatham' => '太平洋/查塔姆',
  'Pacific/Niue' => '太平洋/扭埃',
  'Pacific/Norfolk' => '太平洋/诺福克',
  'Pacific/Palau' => '太平洋/帕劳',
  'Pacific/Port_Moresby' => '太平洋/莫尔兹比港',
  'Pacific/Pitcairn' => '太平洋/皮特克恩岛',
  'Pacific/Pago_Pago' => '太平洋/帕果帕果',
  'Pacific/Apia' => '太平洋/阿批亚',
  'Pacific/Guadalcanal' => '太平洋/瓜达尔卡纳尔岛',
  'Pacific/Fakaofo' => '太平洋/法考福',
  'Pacific/Tongatapu' => '太平洋/汤加塔埔',
  'Pacific/Funafuti' => '太平洋/富纳富提',
  'Pacific/Johnston' => '太平洋/约翰斯顿岛',
  'Pacific/Midway' => '太平洋/中途岛',
  'Pacific/Wake' => '太平洋/威克岛',
  'Pacific/Efate' => '太平洋/埃法特',
  'Pacific/Wallis' => '太平洋/瓦利斯岛',
  'Europe/London' => '欧洲/伦敦',
  'Europe/Dublin' => '欧洲/都伯林',
  'WET' => '西部欧洲时间',
  'CET' => '中部欧洲时间',
  'MET' => '中部欧洲时间',
  'EET' => '欧洲东部时间',
  'Europe/Tirane' => '欧洲/地拉那',
  'Europe/Andorra' => '欧洲/安道尔',
  'Europe/Vienna' => '欧洲/维也纳',
  'Europe/Minsk' => '欧洲/明斯克',
  'Europe/Brussels' => '欧洲/布鲁塞尔',
  'Europe/Sofia' => '欧洲/索非亚',
  'Europe/Prague' => '欧洲/布拉格',
  'Europe/Copenhagen' => '欧洲/哥本哈根',
  'Atlantic/Faeroe' => '大西洋/法罗群岛',
  'America/Danmarkshavn' => '美洲/格陵兰东北城市',
  'America/Scoresbysund' => '美洲/斯格里斯比桑得',
  'America/Godthab' => '美洲/戈德霍普',
  'America/Thule' => '美洲/图列',
  'Europe/Tallinn' => '欧洲/塔林',
  'Europe/Helsinki' => '欧洲/赫尔辛基',
  'Europe/Paris' => '欧洲/巴黎',
  'Europe/Berlin' => '欧洲/伯林',
  'Europe/Gibraltar' => '欧洲/直布罗陀',
  'Europe/Athens' => '欧洲/雅典',
  'Europe/Budapest' => '欧洲/布达佩斯',
  'Atlantic/Reykjavik' => '大西洋/雷克雅未克',
  'Europe/Rome' => '欧洲/罗马',
  'Europe/Riga' => '欧洲/里加',
  'Europe/Vaduz' => '欧洲/瓦杜兹',
  'Europe/Vilnius' => '欧洲/维尔纽斯',
  'Europe/Luxembourg' => '欧洲/卢森堡',
  'Europe/Malta' => '欧洲/马尔他',
  'Europe/Chisinau' => '欧洲/基希讷乌',
  'Europe/Monaco' => '欧洲/摩纳哥',
  'Europe/Amsterdam' => '欧洲/阿姆斯特丹',
  'Europe/Oslo' => '欧洲/奥斯陆',
  'Europe/Warsaw' => '欧洲/华沙',
  'Europe/Lisbon' => '欧洲/里斯本',
  'Atlantic/Azores' => '大西洋/亚速尔',
  'Atlantic/Madeira' => '大西洋/马德拉群岛',
  'Europe/Bucharest' => '欧洲/布加勒斯特',
  'Europe/Kaliningrad' => '欧洲/加里宁格勒',
  'Europe/Moscow' => '欧洲/莫斯科',
  'Europe/Samara' => '欧洲/萨马拉',
  'Asia/Yekaterinburg' => '亚洲/叶卡捷琳堡',
  'Asia/Omsk' => '亚洲/鄂木斯克',
  'Asia/Novosibirsk' => '亚洲/诺夫哥罗德',
  'Asia/Krasnoyarsk' => '亚洲/克拉斯诺亚尔斯克',
  'Asia/Irkutsk' => '亚洲/伊尔库茨克',
  'Asia/Yakutsk' => '亚洲/雅库次克',
  'Asia/Vladivostok' => '亚洲/符拉迪沃斯托克',
  'Asia/Sakhalin' => '亚洲/萨哈林',
  'Asia/Magadan' => '亚洲/玛格丹',
  'Asia/Kamchatka' => '亚洲/勘察加',
  'Asia/Anadyr' => '亚洲/阿纳德尔',
  'Europe/Belgrade' => '欧洲/贝尔格莱德' ,
  'Europe/Madrid' =>'欧洲/马德里' ,
  'Africa/Ceuta' => '非洲/休达',
  'Atlantic/Canary' => '大西洋/加那利',
  'Europe/Stockholm' => '欧洲/斯德哥尔摩',
  'Europe/Zurich' => '欧洲/苏黎世' ,
  'Europe/Istanbul' => '欧洲/伊斯坦布尔',
  'Europe/Kiev' => '欧洲/基辅',
  'Europe/Uzhgorod' => '欧洲/乌兹哥罗德',
  'Europe/Zaporozhye' => '欧洲/扎波罗热',
  'Europe/Simferopol' => '欧洲/辛菲罗波尔',
  'America/New_York' => '美洲/纽约',
  'America/Chicago' =>'美洲/芝加哥' ,
  'America/North_Dakota/Center' => '美洲/北达科达州/中部',
  'America/Denver' => '美洲/丹佛',
  'America/Los_Angeles' => '美洲/洛杉矶',
  'America/Juneau' => '美洲/朱诺',
  'America/Yakutat' => '美洲/亚库塔特',
  'America/Anchorage' => '美洲/安科雷齐',
  'America/Nome' =>'美洲/诺姆' ,
  'America/Adak' => '美洲/埃达克',
  'Pacific/Honolulu' => '太平洋/火奴鲁鲁',
  'America/Phoenix' => '美洲/菲尼克斯',
  'America/Boise' => '美洲/博伊西',
  'America/Indiana/Indianapolis' => '美洲/印第安那/印第安纳波利斯',
  'America/Indiana/Marengo' => '美洲/印第安那/马伦哥',
  'America/Indiana/Knox' =>  '美洲/印第安那/诺克斯',
  'America/Indiana/Vevay' => '美洲/印第安那/瓦维',
  'America/Kentucky/Louisville' =>'美洲/肯塔基/路易斯维尔'  ,
  'America/Kentucky/Monticello' =>  '美洲/肯塔基/蒙帝塞罗' ,
  'America/Detroit' => '美洲/底特律',
  'America/Menominee' => '美洲/梅诺米尼',
  'America/St_Johns' => '美洲/圣约翰',
  'America/Goose_Bay' => '美洲/古斯贝' ,
  'America/Halifax' => '美洲/哈利法克斯',
  'America/Glace_Bay' =>'美洲/格雷斯湾' ,
  'America/Montreal' => '美洲/蒙特利尔',
  'America/Toronto' => '美洲/多伦多',
  'America/Thunder_Bay' => '美洲/桑德贝' ,
  'America/Nipigon' => '美洲/尼皮冈',
  'America/Rainy_River' => '美洲/多雨河',
  'America/Winnipeg' => '美洲/温尼伯',
  'America/Regina' => '美洲/里加纳',
  'America/Swift_Current' => '美洲/斯威福特卡润特',
  'America/Edmonton' =>  '美洲/埃德蒙顿',
  'America/Vancouver' => '美洲/温哥华',
  'America/Dawson_Creek' => '美洲/道森溪',
  'America/Pangnirtung' => '美洲/潘尼尔顿'  ,
  'America/Iqaluit' => '美洲/伊魁特' ,
  'America/Coral_Harbour' => '美洲/珊瑚港' ,
  'America/Rankin_Inlet' => '美洲/',
  'America/Cambridge_Bay' => '美洲/剑桥湾',
  'America/Yellowknife' => '美洲/黄刀镇',
  'America/Inuvik' =>'美洲/伊努维克' ,
  'America/Whitehorse' => '美洲/白马' ,
  'America/Dawson' => '美洲/道森',
  'America/Cancun' => '美洲/坎昆',
  'America/Merida' => '美洲/梅里达',
  'America/Monterrey' => '美洲/蒙特雷',
  'America/Mexico_City' => '美洲/墨西哥城',
  'America/Chihuahua' => '美洲/奇瓦瓦',
  'America/Hermosillo' => '美洲/埃尔莫西略',
  'America/Mazatlan' => '美洲/马萨特兰',
  'America/Tijuana' => '美洲/蒂华纳',
  'America/Anguilla' => '美洲/安圭拉',
  'America/Antigua' => '美洲/安提瓜岛',
  'America/Nassau' =>'美洲/拿骚' ,
  'America/Barbados' => '美洲/巴巴多斯',
  'America/Belize' => '美洲/伯利兹',
  'Atlantic/Bermuda' => '大西洋/百慕大',
  'America/Cayman' => '美洲/开曼',
  'America/Costa_Rica' => '美洲/哥斯达黎加',
  'America/Havana' => '美洲/哈瓦那',
  'America/Dominica' => '美洲/多米尼加',
  'America/Santo_Domingo' => '美洲/圣多明各',
  'America/El_Salvador' => '美洲/萨尔瓦多',
  'America/Grenada' => '美洲/格林纳达',
  'America/Guadeloupe' => '美洲/瓜德罗普岛',
  'America/Guatemala' => '美洲/危地马拉',
  'America/Port-au-Prince' => '美洲/太子港',
  'America/Tegucigalpa' => '美洲/特古西加尔巴',
  'America/Jamaica' => '美洲/牙买加',
  'America/Martinique' => '美洲/马提尼克岛',
  'America/Montserrat' => '美洲/蒙特塞拉特',
  'America/Managua' => '美洲/马那瓜',
  'America/Panama' => '美洲/巴拿马',
  'America/Puerto_Rico' =>'美洲/波多黎各' ,
  'America/St_Kitts' => '美洲/圣基茨',
  'America/St_Lucia' => '美洲/圣卢西亚',
  'America/Miquelon' => '美洲/密克隆',
  'America/St_Vincent' => '美洲/圣文森特',
  'America/Grand_Turk' => '美洲/大特克岛',
  'America/Tortola' => '美洲/托投拉',
  'America/St_Thomas' => '美洲/圣托马斯',
  'America/Argentina/Buenos_Aires' => '美洲/阿根廷/布宜诺斯艾利斯',
  'America/Argentina/Cordoba' => '美洲/阿根廷/科尔多瓦',
  'America/Argentina/Tucuman' => '美洲/阿根廷/图库曼',
  'America/Argentina/La_Rioja' => '美洲/阿根廷/里奥哈',
  'America/Argentina/San_Juan' => '美洲/阿根廷/圣胡安',
  'America/Argentina/Jujuy' => '美洲/阿根廷/胡胡伊',
  'America/Argentina/Catamarca' => '美洲/阿根廷/卡塔马卡',
  'America/Argentina/Mendoza' => '美洲/阿根廷/门多萨',
  'America/Argentina/Rio_Gallegos' => '美洲/阿根廷/里约热内卢',
  'America/Argentina/Ushuaia' =>  '美洲/阿根廷/乌斯怀亚',
  'America/Aruba' => '美洲/阿鲁巴',
  'America/La_Paz' => '美洲/拉巴斯',
  'America/Noronha' => '美洲/诺罗尼亚',
  'America/Belem' => '美洲/贝伦',
  'America/Fortaleza' => '美洲/福塔雷萨',
  'America/Recife' => '美洲/累西腓',
  'America/Araguaina' => '美洲/阿拉瓜伊纳',
  'America/Maceio' => '美洲/马塞约',
  'America/Bahia' => '美洲/Bahia',
  'America/Sao_Paulo' => '美洲/圣保罗',
  'America/Campo_Grande' => '美洲/大坎普',
  'America/Cuiaba' => '美洲/库亚巴',
  'America/Porto_Velho' => '美洲/波多韦柳',
  'America/Boa_Vista' => '美洲/泊亚维斯特',
  'America/Manaus' => '美洲/马瑙斯',
  'America/Eirunepe' => '美洲/依伦尼贝',
  'America/Rio_Branco' => '美洲/里约布兰科',
  'America/Santiago' => '美洲/圣地亚哥',
  'Pacific/Easter' => '太平洋/复活节岛' ,
  'America/Bogota' => '美洲/波哥大',
  'America/Curacao' => '美洲/库拉索',
  'America/Guayaquil' => '美洲/瓜亚基尔',
  'Pacific/Galapagos' => '太平洋/加拉帕戈斯群岛' ,
  'Atlantic/Stanley' => '大西洋/斯坦利',
  'America/Cayenne' => '美洲/卡宴',
  'America/Guyana' => '美洲/圭亚那',
  'America/Asuncion' => '美洲/亚松森',
  'America/Lima' => '美洲/利马',
  'Atlantic/South_Georgia' => '大西洋/南乔治亚',
  'America/Paramaribo' => '美洲/帕拉马里博',
  'America/Port_of_Spain' => '美洲/西班牙港',
  'America/Montevideo' => '美洲/蒙得维的亚',
  'America/Caracas' => '美洲/加拉加斯',
  );

  $app_list_strings['moduleList']['Sugar_Favorites'] = '收藏夹';
  $app_list_strings['eapm_list']= array(
    'Sugar'=>'SuiteCRM',
    'WebEx'=>'WebEx',
    'GoToMeeting'=>'GoToMeeting',
    'IBMSmartCloud'=>'IBM SmartCloud （IBM 云计算）',
    'Google' => 'Google联系人',
    'Box' => 'Box.net',
    'Facebook'=>'Facebook',
    'Twitter'=>'推特（Twitter）',
  );
  $app_list_strings['eapm_list_import']= array(
  	'Google' => '谷歌联系人',
  );
$app_list_strings['eapm_list_documents']= array(
  	'Google' => '谷歌文档',
  );
	$app_list_strings['token_status'] = array(
        1 => '要求',
        2 => '访问',
        3 => '无效',
    );

$app_list_strings ['emailTemplates_type_list'] = array (
    '' => '' ,
    'campaign' => '市场活动' ,
    'email' => '电子邮件',
  );

$app_list_strings ['emailTemplates_type_list_campaigns'] = array (
    '' => '' ,
    'campaign' => '市场活动' ,
  );

$app_list_strings ['emailTemplates_type_list_no_workflow'] = array (
    '' => '' ,
    'campaign' => '市场活动' ,
    'email' => '电子邮件',
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
$app_list_strings['moduleList']['AOK_KnowledgeBase'] = '知识库';
$app_list_strings['moduleList']['AOK_Knowledge_Base_Categories'] = '知识库分类';
$app_list_strings['aok_status_list']['Draft'] = '拟订';
$app_list_strings['aok_status_list']['Expired'] = '到期';
$app_list_strings['aok_status_list']['In_Review'] = '审查中';
//$app_list_strings['aok_status_list']['Published'] = 'Published';
$app_list_strings['aok_status_list']['published_private'] = '私有';
$app_list_strings['aok_status_list']['published_public'] = '公共';


$app_list_strings['moduleList']['Reminders'] = '提醒';
$app_list_strings['moduleListSingular']['Reminders'] = '提醒';

$app_list_strings['moduleList']['Reminders_Invitees'] = 'Reminders_Invitees';
$app_list_strings['moduleListSingular']['Reminders_Invitees'] = 'Reminder_Invitee';

$app_list_strings['moduleList']['FP_events'] = '事件';
$app_list_strings['moduleList']['FP_Event_Locations'] = '地点';
$app_list_strings['invite_template_list'][''] = '';

//events
$app_list_strings['fp_event_invite_status_dom']['Invited'] = '已邀请';
$app_list_strings['fp_event_invite_status_dom']['Not Invited'] = '未邀请';
$app_list_strings['fp_event_invite_status_dom']['Attended'] = '确认参会';
$app_list_strings['fp_event_invite_status_dom']['Not Attended'] = '不参会';
$app_list_strings['fp_event_status_dom']['Accepted'] = '接受';
$app_list_strings['fp_event_status_dom']['Declined'] = '拒绝';
$app_list_strings['fp_event_status_dom']['No Response'] = '未反馈';

$app_strings['LBL_STATUS_EVENT'] = '邀请状态';
$app_strings['LBL_ACCEPT_STATUS'] = '接受状态';
$app_strings['LBL_LISTVIEW_OPTION_CURRENT'] = '当前页';
$app_strings['LBL_LISTVIEW_OPTION_ENTIRE'] = '整个列表';
$app_strings['LBL_LISTVIEW_NONE'] = '无';

//aod
$app_list_strings['moduleList']['AOD_IndexEvent'] = '索引事件';
$app_list_strings['moduleList']['AOD_Index'] = '索引';

$app_list_strings['moduleList']['AOP_AOP_Case_Events'] = '客服反馈事件';
$app_list_strings['moduleList']['AOP_AOP_Case_Updates'] = '客户反馈更新';
$app_list_strings['moduleList']['AOP_Case_Events'] = '客服反馈事件';
$app_list_strings['moduleList']['AOP_Case_Updates'] = '客户反馈更新';
$app_strings['LBL_AOP_EMAIL_REPLY_DELIMITER'] = '========== 请在这条线上回复 ==========';

//aop
$app_list_strings['case_state_default_key'] = 'Open';
$app_list_strings['case_state_dom'] =
    array (
        'Open' => '打开的',
        'Closed' => '关闭',
    );

$app_list_strings['case_status_default_key'] = '新建';
$app_list_strings['case_status_dom'] =
    array (
        'Open_New' => '新建',
        'Open_Assigned' => '负责人',
        'Closed_Closed' => '关闭',
        'Open_Pending Input' => '等待输入',
        'Closed_Rejected' => '拒绝',
        'Closed_Duplicate' => '复制',
    );
$app_list_strings['contact_portal_user_type_dom'] =
    array (
        'Single' => '单用户',
        'Account' => '多用户',
    );
$app_list_strings['dom_email_distribution_for_auto_create']=array (
    'AOPDefault' => '使用默认值',
    'singleUser' => '单用户',
    'roundRobin' => '循环',
    'leastBusy' => '最少忙碌',
    'random' => '随机',
);

//aor
$app_list_strings['moduleList']['AOR_Reports'] = '报表';
$app_list_strings['moduleList']['AOR_Conditions'] = '报告状况';
$app_list_strings['moduleList']['AOR_Charts'] = '报表图表';
$app_list_strings['moduleList']['AOR_Fields'] = '报告领域';
$app_list_strings['moduleList']['AOR_Scheduled_Reports'] = '任务计划报表';
$app_list_strings['aor_operator_list']['Equal_To'] = '等于';
$app_list_strings['aor_operator_list']['Not_Equal_To'] = '不等于';
$app_list_strings['aor_operator_list']['Greater_Than'] = '大于';
$app_list_strings['aor_operator_list']['Less_Than'] = '小于';
$app_list_strings['aor_operator_list']['Greater_Than_or_Equal_To'] = '大于或等于';
$app_list_strings['aor_operator_list']['Less_Than_or_Equal_To'] = '小于或等于';
$app_list_strings['aor_operator_list']['Contains'] = '包括';
$app_list_strings['aor_operator_list']['Starts_With'] = '开始于';
$app_list_strings['aor_operator_list']['Ends_With'] = '来结束';
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
$app_list_strings['aor_condition_type_list']['Field'] = '字段';
$app_list_strings['aor_condition_type_list']['Date'] = '日期';
$app_list_strings['aor_condition_type_list']['Multi'] = '之一';
$app_list_strings['aor_condition_type_list']['Period'] = '时段';
$app_list_strings['aor_condition_type_list']['CurrentUserID'] = '当前用户';
$app_list_strings['aor_date_type_list'][''] = '';
$app_list_strings['aor_date_type_list']['minute'] = '分钟';
$app_list_strings['aor_date_type_list']['hour'] = '小时';
$app_list_strings['aor_date_type_list']['day'] = '天';
$app_list_strings['aor_date_type_list']['week'] = '周';
$app_list_strings['aor_date_type_list']['month'] = '月';
$app_list_strings['aor_date_type_list']['business_hours'] = '营业时间';
$app_list_strings['aor_date_options']['now'] = '现在';
$app_list_strings['aor_date_options']['field'] = '此字段';
$app_list_strings['aor_date_operator']['now'] = '';
$app_list_strings['aor_date_operator']['plus'] = '+';
$app_list_strings['aor_date_operator']['minus'] = '--';
$app_list_strings['aor_sort_operator'][''] = '';
$app_list_strings['aor_sort_operator']['ASC'] = '升序';
$app_list_strings['aor_sort_operator']['DESC'] = '降序';
$app_list_strings['aor_function_list'][''] = '';
$app_list_strings['aor_function_list']['COUNT'] = '合计';
$app_list_strings['aor_function_list']['MIN'] = '最少';
$app_list_strings['aor_function_list']['MAX'] = '是多';
$app_list_strings['aor_function_list']['SUM'] = '一共';
$app_list_strings['aor_function_list']['AVG'] = '平均';
$app_list_strings['aor_total_options'][''] = '';
$app_list_strings['aor_total_options']['COUNT'] = '合计';
$app_list_strings['aor_total_options']['SUM'] = '一共';
$app_list_strings['aor_total_options']['AVG'] = '平均';
$app_list_strings['aor_chart_types']['bar'] = '条线图';
$app_list_strings['aor_chart_types']['line'] = '线形图';
$app_list_strings['aor_chart_types']['pie'] = '饼图';
$app_list_strings['aor_chart_types']['radar'] = '梯形图';
$app_list_strings['aor_chart_types']['polar'] = 'Polar chart';
$app_list_strings['aor_chart_types']['stacked_bar'] = 'Stacked bar';
$app_list_strings['aor_chart_types']['grouped_bar'] = '分组栏';
$app_list_strings['aor_scheduled_report_schedule_types']['monthly'] = '月';
$app_list_strings['aor_scheduled_report_schedule_types']['weekly'] = '周';
$app_list_strings['aor_scheduled_report_schedule_types']['daily'] = '日';
$app_list_strings['aor_scheduled_reports_status_dom']['active'] = '活动';
$app_list_strings['aor_scheduled_reports_status_dom']['inactive'] = '停用';
$app_list_strings['aor_email_type_list']['Email Address'] = '电子邮件';
$app_list_strings['aor_email_type_list']['Specify User'] = '用户';
$app_list_strings['aor_email_type_list']['Users'] = '用户';
$app_list_strings['aor_assign_options']['all'] = '所有用户';
$app_list_strings['aor_assign_options']['role'] = '所有职能用户';
$app_list_strings['aor_assign_options']['security_group'] = '所有安全团队用户';
$app_list_strings['date_time_period_list']['today'] = '今天';
$app_list_strings['date_time_period_list']['yesterday'] = '昨天';
$app_list_strings['date_time_period_list']['this_week'] = '本周';
$app_list_strings['date_time_period_list']['last_week'] = '上周';
$app_list_strings['date_time_period_list']['last_month'] = '上个月';
$app_list_strings['date_time_period_list']['this_quarter'] = '这个季度';
$app_list_strings['date_time_period_list']['last_quarter'] = '上个季度';
$app_list_strings['date_time_period_list']['this_year'] = '今年';
$app_list_strings['date_time_period_list']['last_year'] = '去年';
$app_strings['LBL_CRON_ON_THE_MONTHDAY'] = '在';
$app_strings['LBL_CRON_ON_THE_WEEKDAY'] = '在';
$app_strings['LBL_CRON_AT'] = '在';
$app_strings['LBL_CRON_RAW'] = '高级';
$app_strings['LBL_CRON_MIN'] = '分';
$app_strings['LBL_CRON_HOUR'] = '小时';
$app_strings['LBL_CRON_DAY'] = '日';
$app_strings['LBL_CRON_MONTH'] = '月';
$app_strings['LBL_CRON_DOW'] = 'DOW';
$app_strings['LBL_CRON_DAILY'] = '日';
$app_strings['LBL_CRON_WEEKLY'] = '周';
$app_strings['LBL_CRON_MONTHLY'] = '月';

//aos
$app_list_strings['moduleList']['AOS_Contracts'] = '合同';
$app_list_strings['moduleList']['AOS_Invoices'] = '发票';
$app_list_strings['moduleList']['AOS_PDF_Templates'] = 'PDF模板';
$app_list_strings['moduleList']['AOS_Product_Categories'] = '产品类别';
$app_list_strings['moduleList']['AOS_Products'] = '产品';
$app_list_strings['moduleList']['AOS_Products_Quotes'] = '条目';
$app_list_strings['moduleList']['AOS_Line_Item_Groups'] = '排列项组';
$app_list_strings['moduleList']['AOS_Quotes'] = '报价';
$app_list_strings['aos_quotes_type_dom'][''] = '';
$app_list_strings['aos_quotes_type_dom']['Analyst'] = '分析者';
$app_list_strings['aos_quotes_type_dom']['Competitor'] = '竞争对手';
$app_list_strings['aos_quotes_type_dom']['Customer'] = '客户';
$app_list_strings['aos_quotes_type_dom']['Integrator'] = '总包方';
$app_list_strings['aos_quotes_type_dom']['Investor'] = '投资者';
$app_list_strings['aos_quotes_type_dom']['Partner'] = '合作伙伴';
$app_list_strings['aos_quotes_type_dom']['Press'] = '出版商';
$app_list_strings['aos_quotes_type_dom']['Prospect'] = '设计院';
$app_list_strings['aos_quotes_type_dom']['Reseller'] = '经销商';
$app_list_strings['aos_quotes_type_dom']['Other'] = '其他';
$app_list_strings['template_ddown_c_list'][''] = '';
$app_list_strings['quote_stage_dom']['Draft'] = '拟订';
$app_list_strings['quote_stage_dom']['Negotiation'] = '谈判';
$app_list_strings['quote_stage_dom']['Delivered'] = '已交付';
$app_list_strings['quote_stage_dom']['On Hold'] = '等待';
$app_list_strings['quote_stage_dom']['Confirmed'] = '已确认';
$app_list_strings['quote_stage_dom']['Closed Accepted'] = '谈成结束';
$app_list_strings['quote_stage_dom']['Closed Lost'] = '丢单';
$app_list_strings['quote_stage_dom']['Closed Dead'] = '未成结束';
$app_list_strings['quote_term_dom']['Net 15'] = '货到15天付款';
$app_list_strings['quote_term_dom']['Net 30'] = '货到30天付款';
$app_list_strings['quote_term_dom'][''] = '';
$app_list_strings['approval_status_dom']['Approved'] = '已审批';
$app_list_strings['approval_status_dom']['Not Approved'] = '未审批';
$app_list_strings['approval_status_dom'][''] = '';
$app_list_strings['vat_list']['0.0'] = '0%';
$app_list_strings['vat_list']['5.0'] = '5%';
$app_list_strings['vat_list']['7.5'] = '7.5%';
$app_list_strings['vat_list']['17.5'] = '17.5%';
$app_list_strings['vat_list']['20.0'] = '20%';
$app_list_strings['discount_list']['Percentage'] = '百分比';
$app_list_strings['discount_list']['Amount'] = '数量';
$app_list_strings['aos_invoices_type_dom'][''] = '';
$app_list_strings['aos_invoices_type_dom']['Analyst'] = '分析者';
$app_list_strings['aos_invoices_type_dom']['Competitor'] = '竞争对手';
$app_list_strings['aos_invoices_type_dom']['Customer'] = '客户';
$app_list_strings['aos_invoices_type_dom']['Integrator'] = '总包方';
$app_list_strings['aos_invoices_type_dom']['Investor'] = '投资者';
$app_list_strings['aos_invoices_type_dom']['Partner'] = '合作伙伴';
$app_list_strings['aos_invoices_type_dom']['Press'] = '出版商';
$app_list_strings['aos_invoices_type_dom']['Prospect'] = '设计院';
$app_list_strings['aos_invoices_type_dom']['Reseller'] = '经销商';
$app_list_strings['aos_invoices_type_dom']['Other'] = '其他';
$app_list_strings['invoice_status_dom']['Paid'] = '已付';
$app_list_strings['invoice_status_dom']['Unpaid'] = '未付';
$app_list_strings['invoice_status_dom']['Cancelled'] = '已取消';
$app_list_strings['invoice_status_dom'][''] = '';
$app_list_strings['quote_invoice_status_dom']['Not Invoiced'] = '未开发票';
$app_list_strings['quote_invoice_status_dom']['Invoiced'] = '已开发票';
$app_list_strings['product_code_dom']['XXXX'] = 'XXXX';
$app_list_strings['product_code_dom']['YYYY'] = 'YYYY';
$app_list_strings['product_category_dom']['Laptops'] = '笔记本';
$app_list_strings['product_category_dom']['Desktops'] = '台式机';
$app_list_strings['product_category_dom'][''] = '';
$app_list_strings['product_type_dom']['Good'] = '货物';
$app_list_strings['product_type_dom']['Service'] = '服务';
$app_list_strings['product_quote_parent_type_dom']['AOS_Quotes'] = '报价';
$app_list_strings['product_quote_parent_type_dom']['AOS_Invoices'] = '发票';
$app_list_strings['product_quote_parent_type_dom']['AOS_Contracts'] = '合同';
$app_list_strings['pdf_template_type_dom']['AOS_Quotes'] = '报价';
$app_list_strings['pdf_template_type_dom']['AOS_Invoices'] = '发票';
$app_list_strings['pdf_template_type_dom']['AOS_Contracts'] = '合同';
$app_list_strings['pdf_template_type_dom']['Accounts'] = '帐户名称';
$app_list_strings['pdf_template_type_dom']['Contacts'] = '合同名称';
$app_list_strings['pdf_template_type_dom']['Leads'] = '潜在客户';
$app_list_strings['pdf_template_sample_dom'][''] = '';
$app_list_strings['contract_status_list']['Not Started'] = '未开始';
$app_list_strings['contract_status_list']['In Progress'] = '处理中';
$app_list_strings['contract_status_list']['Signed'] = '已签署';
$app_list_strings['contract_type_list']['Type'] = '类型';
$app_strings['LBL_GENERATE_LETTER'] = '生成信件';
$app_strings['LBL_SELECT_TEMPLATE'] = '请选择一个模板';
$app_strings['LBL_NO_TEMPLATE'] = '出错啦：没有找到模板。请到PDF模板模块去创建一个模板';

//aow
$app_list_strings['moduleList']['AOW_WorkFlow'] = '工作流';
$app_list_strings['moduleList']['AOW_Conditions'] = '工作流条件';
$app_list_strings['moduleList']['AOW_Processed'] = '操作日志';
$app_list_strings['moduleList']['AOW_Actions'] = '工作流动作';
$app_list_strings['aow_status_list']['Active'] = '活动';
$app_list_strings['aow_status_list']['Inactive'] = '停用';
$app_list_strings['aow_operator_list']['Equal_To'] = '等于';
$app_list_strings['aow_operator_list']['Not_Equal_To'] = '不等于';
$app_list_strings['aow_operator_list']['Greater_Than'] = '大于';
$app_list_strings['aow_operator_list']['Less_Than'] = '小于';
$app_list_strings['aow_operator_list']['Greater_Than_or_Equal_To'] = '大于或等于';
$app_list_strings['aow_operator_list']['Less_Than_or_Equal_To'] = '小于或等于';
$app_list_strings['aow_operator_list']['Contains'] = '包括';
$app_list_strings['aow_operator_list']['Starts_With'] = '开始于';
$app_list_strings['aow_operator_list']['Ends_With'] = '来结束';
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
$app_list_strings['aow_sql_operator_list']['is_null'] = '为空';
$app_list_strings['aow_process_status_list']['Complete'] = '完成';
$app_list_strings['aow_process_status_list']['Running'] = '运行中';
$app_list_strings['aow_process_status_list']['Pending'] = '未决定';
$app_list_strings['aow_process_status_list']['Failed'] = '失败';
$app_list_strings['aow_condition_operator_list']['And'] = '和';
$app_list_strings['aow_condition_operator_list']['OR'] = '或者';
$app_list_strings['aow_condition_type_list']['Value'] = '值';
$app_list_strings['aow_condition_type_list']['Field'] = '字段';
$app_list_strings['aow_condition_type_list']['Any_Change'] = '任何改变';
$app_list_strings['aow_condition_type_list']['SecurityGroup'] = '在用户组中';
$app_list_strings['aow_condition_type_list']['Date'] = '日期';
$app_list_strings['aow_condition_type_list']['Multi'] = '之一';
$app_list_strings['aow_action_type_list']['Value'] = '值';
$app_list_strings['aow_action_type_list']['Field'] = '字段';
$app_list_strings['aow_action_type_list']['Date'] = '日期';
$app_list_strings['aow_action_type_list']['Round_Robin'] = '循环';
$app_list_strings['aow_action_type_list']['Least_Busy'] = '最不忙碌的';
$app_list_strings['aow_action_type_list']['Random'] = '随机';
$app_list_strings['aow_rel_action_type_list']['Value'] = '值';
$app_list_strings['aow_rel_action_type_list']['Field'] = '字段';
$app_list_strings['aow_date_type_list'][''] = '';
$app_list_strings['aow_date_type_list']['minute'] = '分钟';
$app_list_strings['aow_date_type_list']['hour'] = '小时';
$app_list_strings['aow_date_type_list']['day'] = '天';
$app_list_strings['aow_date_type_list']['week'] = '周';
$app_list_strings['aow_date_type_list']['month'] = '月';
$app_list_strings['aow_date_type_list']['business_hours'] = '营业时间';
$app_list_strings['aow_date_options']['now'] = '现在';
$app_list_strings['aow_date_options']['today'] = '今天';
$app_list_strings['aow_date_options']['field'] = '此字段';
$app_list_strings['aow_date_operator']['now'] = '';
$app_list_strings['aow_date_operator']['plus'] = '+';
$app_list_strings['aow_date_operator']['minus'] = '--';
$app_list_strings['aow_assign_options']['all'] = '所有用户';
$app_list_strings['aow_assign_options']['role'] = '所有职能用户';
$app_list_strings['aow_assign_options']['security_group'] = '所有安全团队用户';
$app_list_strings['aow_email_type_list']['Email Address'] = '电子邮件';
$app_list_strings['aow_email_type_list']['Record Email'] = '记录的电子邮件';
$app_list_strings['aow_email_type_list']['Related Field'] = '相关的领域';
$app_list_strings['aow_email_type_list']['Specify User'] = '用户';
$app_list_strings['aow_email_type_list']['Users'] = '用户';
$app_list_strings['aow_email_to_list']['to'] = '到';
$app_list_strings['aow_email_to_list']['cc'] = '抄送';
$app_list_strings['aow_email_to_list']['bcc'] = '密送';
$app_list_strings['aow_run_on_list']['All_Records'] = '所有记录';
$app_list_strings['aow_run_on_list']['New_Records'] = '新记录';
$app_list_strings['aow_run_on_list']['Modified_Records'] = '已修改的记录';
$app_list_strings['aow_run_when_list']['Always'] = '始终';
$app_list_strings['aow_run_when_list']['On_Save'] = '只有在保存时';
$app_list_strings['aow_run_when_list']['In_Scheduler'] = '只有在调度程序中';

//gant
$app_list_strings['moduleList']['AM_ProjectTemplates'] = '项目模板';
$app_list_strings['moduleList']['AM_TaskTemplates'] = '项目任务模板';
$app_list_strings['relationship_type_list']['FS'] = '完成到开始';
$app_list_strings['relationship_type_list']['SS'] = '开始到开始';
$app_list_strings['moduleList']['AM_ProjectHolidays'] = '项目假期';
$app_list_strings['holiday_resource_dom']['Contacts'] = '合同名称';
$app_list_strings['holiday_resource_dom']['Users'] = '用户';
$app_list_strings['duration_unit_dom']['Days'] = '天';
$app_list_strings['duration_unit_dom']['Hours'] = '小时';
$app_strings['LBL_GANTT_BUTTON_LABEL'] = '查看甘特图';
$app_strings['LBL_GANTT_BUTTON_TITLE'] = '查看甘特图';
$app_strings['LBL_CREATE_PROJECT'] = '创建项目';

//gmaps
$app_strings['LBL_MAP'] = '地图';
$app_strings['LBL_MAPS'] = '地图';

$app_strings['LBL_JJWG_MAPS_LNG'] = '经度';
$app_strings['LBL_JJWG_MAPS_LAT'] = '纬度';
$app_strings['LBL_JJWG_MAPS_GEOCODE_STATUS'] = '地理编码状态';
$app_strings['LBL_JJWG_MAPS_ADDRESS'] = '地址';
$app_strings['LBL_BUG_FIX'] = 'Bug修复';

$app_list_strings['moduleList']['jjwg_Maps'] = '地图';
$app_list_strings['moduleList']['jjwg_Markers'] = '地图编辑器';
$app_list_strings['moduleList']['jjwg_Areas'] = '地图区域';
$app_list_strings['moduleList']['jjwg_Address_Cache'] = '地图地址缓存';

$app_list_strings['map_unit_type_list']['mi'] = '里';
$app_list_strings['map_unit_type_list']['km'] = '公里';

$app_list_strings['map_module_type_list']['Accounts'] = '帐户名称';
$app_list_strings['map_module_type_list']['Contacts'] = '合同名称';
$app_list_strings['map_module_type_list']['Cases'] = '客户反馈';
$app_list_strings['map_module_type_list']['Leads'] = '潜在客户';
$app_list_strings['map_module_type_list']['Meetings'] = '会议';
$app_list_strings['map_module_type_list']['Opportunities'] = '商业机会';
$app_list_strings['map_module_type_list']['Project'] = '项目管理';
$app_list_strings['map_module_type_list']['Prospects'] = '目标';

$app_list_strings['map_relate_type_list']['Accounts'] = '客户';
$app_list_strings['map_relate_type_list']['Contacts'] = '联系人';
$app_list_strings['map_relate_type_list']['Cases'] = '客户反馈';
$app_list_strings['map_relate_type_list']['Leads'] = '潜在客户';
$app_list_strings['map_relate_type_list']['Meetings'] = '会议';
$app_list_strings['map_relate_type_list']['Opportunities'] = '商业机会';
$app_list_strings['map_relate_type_list']['Project'] = '项目管理';
$app_list_strings['map_relate_type_list']['Prospects'] = '目标';

$app_list_strings['marker_image_list']['accident'] = '意外';
$app_list_strings['marker_image_list']['administration'] = '管理员';
$app_list_strings['marker_image_list']['agriculture'] = '农业';
$app_list_strings['marker_image_list']['aircraft_small'] = '小飞机';
$app_list_strings['marker_image_list']['airplane_tourism'] = '飞行旅游';
$app_list_strings['marker_image_list']['airport'] = '机场';
$app_list_strings['marker_image_list']['amphitheater'] = '露天剧场';
$app_list_strings['marker_image_list']['apartment'] = '公寓';
$app_list_strings['marker_image_list']['aquarium'] = '水族馆';
$app_list_strings['marker_image_list']['arch'] = '拱门';
$app_list_strings['marker_image_list']['atm'] = '取款机';
$app_list_strings['marker_image_list']['audio'] = '音频';
$app_list_strings['marker_image_list']['bank'] = '银行';
$app_list_strings['marker_image_list']['bank_euro'] = '欧元银行';
$app_list_strings['marker_image_list']['bank_pound'] = '英镑银行';
$app_list_strings['marker_image_list']['bar'] = '酒吧';
$app_list_strings['marker_image_list']['beach'] = '海滩';
$app_list_strings['marker_image_list']['beautiful'] = '漂亮';
$app_list_strings['marker_image_list']['bicycle_parking'] = '自行车停车场';
$app_list_strings['marker_image_list']['big_city'] = '大城市';
$app_list_strings['marker_image_list']['bridge'] = '桥';
$app_list_strings['marker_image_list']['bridge_modern'] = '现代桥';
$app_list_strings['marker_image_list']['bus'] = '巴士';
$app_list_strings['marker_image_list']['cable_car'] = '缆车';
$app_list_strings['marker_image_list']['car'] = '车';
$app_list_strings['marker_image_list']['car_rental'] = '租车行';
$app_list_strings['marker_image_list']['carrepair'] = '汽车修理';
$app_list_strings['marker_image_list']['castle'] = '城堡';
$app_list_strings['marker_image_list']['cathedral'] = '主教堂';
$app_list_strings['marker_image_list']['chapel'] = '小教会';
$app_list_strings['marker_image_list']['church'] = '教堂';
$app_list_strings['marker_image_list']['city_square'] = '城市广场';
$app_list_strings['marker_image_list']['cluster'] = '公路';
$app_list_strings['marker_image_list']['cluster_2'] = '公路2';
$app_list_strings['marker_image_list']['cluster_3'] = '公路3';
$app_list_strings['marker_image_list']['cluster_4'] = '公路4';
$app_list_strings['marker_image_list']['cluster_5'] = '公路5';
$app_list_strings['marker_image_list']['coffee'] = '咖啡馆';
$app_list_strings['marker_image_list']['community_centre'] = '社区中心';
$app_list_strings['marker_image_list']['company'] = '公司';
$app_list_strings['marker_image_list']['conference'] = '会议';
$app_list_strings['marker_image_list']['construction'] = '建筑';
$app_list_strings['marker_image_list']['convenience'] = '便利店';
$app_list_strings['marker_image_list']['court'] = '法院';
$app_list_strings['marker_image_list']['cruise'] = '轮船';
$app_list_strings['marker_image_list']['currency_exchange'] = '换钱所';
$app_list_strings['marker_image_list']['customs'] = '海关';
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
$app_list_strings['marker_image_list']['dentist'] = '牙医';
$app_list_strings['marker_image_list']['deptartment_store'] = '部门商店';
$app_list_strings['marker_image_list']['disability'] = '残疾人';
$app_list_strings['marker_image_list']['disabled_parking'] = '残疾人专用停车场';
$app_list_strings['marker_image_list']['doctor'] = '医生';
$app_list_strings['marker_image_list']['dog_leash'] = '宠物寄存处';
$app_list_strings['marker_image_list']['down'] = '朝下';
$app_list_strings['marker_image_list']['down_left'] = '朝下往左';
$app_list_strings['marker_image_list']['down_right'] = '朝下往右';
$app_list_strings['marker_image_list']['down_then_left'] = '朝下转左';
$app_list_strings['marker_image_list']['down_then_right'] = '朝下转右';
$app_list_strings['marker_image_list']['drugs'] = '医药';
$app_list_strings['marker_image_list']['elevator'] = '电梯';
$app_list_strings['marker_image_list']['embassy'] = '大使馆';
$app_list_strings['marker_image_list']['expert'] = '专家';
$app_list_strings['marker_image_list']['factory'] = '工厂';
$app_list_strings['marker_image_list']['falling_rocks'] = '	落石';
$app_list_strings['marker_image_list']['fast_food'] = '快餐';
$app_list_strings['marker_image_list']['festival'] = '节日';
$app_list_strings['marker_image_list']['fjord'] = '峡湾';
$app_list_strings['marker_image_list']['forest'] = '森林';
$app_list_strings['marker_image_list']['fountain'] = '喷泉';
$app_list_strings['marker_image_list']['friday'] = '星期五';
$app_list_strings['marker_image_list']['garden'] = '花园';
$app_list_strings['marker_image_list']['gas_station'] = '加油站';
$app_list_strings['marker_image_list']['geyser'] = '间歇喷泉';
$app_list_strings['marker_image_list']['gifts'] = '礼品';
$app_list_strings['marker_image_list']['gourmet'] = '美食家';
$app_list_strings['marker_image_list']['grocery'] = '杂货铺';
$app_list_strings['marker_image_list']['hairsalon'] = '发廊';
$app_list_strings['marker_image_list']['helicopter'] = '直升机';
$app_list_strings['marker_image_list']['highway'] = '高速公路';
$app_list_strings['marker_image_list']['historical_quarter'] = 'Historical Quarter';
$app_list_strings['marker_image_list']['home'] = '首页';
$app_list_strings['marker_image_list']['hospital'] = '医院';
$app_list_strings['marker_image_list']['hostel'] = '旅馆';
$app_list_strings['marker_image_list']['hotel'] = '酒店';
$app_list_strings['marker_image_list']['hotel_1_star'] = '一星级酒店';
$app_list_strings['marker_image_list']['hotel_2_stars'] = '二星级酒店';
$app_list_strings['marker_image_list']['hotel_3_stars'] = '三星级酒店';
$app_list_strings['marker_image_list']['hotel_4_stars'] = '四星级酒店';
$app_list_strings['marker_image_list']['hotel_5_stars'] = '五星级酒店';
$app_list_strings['marker_image_list']['info'] = '信息';
$app_list_strings['marker_image_list']['justice'] = '法院';
$app_list_strings['marker_image_list']['lake'] = '湖';
$app_list_strings['marker_image_list']['laundromat'] = '自助洗衣店';
$app_list_strings['marker_image_list']['left'] = '左';
$app_list_strings['marker_image_list']['left_then_down'] = '左转后';
$app_list_strings['marker_image_list']['left_then_up'] = '左转前';
$app_list_strings['marker_image_list']['library'] = '图书馆';
$app_list_strings['marker_image_list']['lighthouse'] = ' 灯塔';
$app_list_strings['marker_image_list']['liquor'] = '酒馆';
$app_list_strings['marker_image_list']['lock'] = '存物箱';
$app_list_strings['marker_image_list']['main_road'] = '主道';
$app_list_strings['marker_image_list']['massage'] = '按摩';
$app_list_strings['marker_image_list']['mobile_phone_tower'] = '手机信号塔';
$app_list_strings['marker_image_list']['modern_tower'] = '现代塔';
$app_list_strings['marker_image_list']['monastery'] = '修道院';
$app_list_strings['marker_image_list']['monday'] = '星期一';
$app_list_strings['marker_image_list']['monument'] = '山';
$app_list_strings['marker_image_list']['mosque'] = '清真寺';
$app_list_strings['marker_image_list']['motorcycle'] = '摩托车';
$app_list_strings['marker_image_list']['museum'] = '博物馆';
$app_list_strings['marker_image_list']['music_live'] = '音乐现场';
$app_list_strings['marker_image_list']['oil_pump_jack'] = 'Oil Pump Jack';
$app_list_strings['marker_image_list']['pagoda'] = '宝塔';
$app_list_strings['marker_image_list']['palace'] = '宫殿';
$app_list_strings['marker_image_list']['panoramic'] = '景区';
$app_list_strings['marker_image_list']['park'] = '公园';
$app_list_strings['marker_image_list']['park_and_ride'] = 'Park And Ride';
$app_list_strings['marker_image_list']['parking'] = '停车场';
$app_list_strings['marker_image_list']['photo'] = '照片';
$app_list_strings['marker_image_list']['picnic'] = '野餐';
$app_list_strings['marker_image_list']['places_unvisited'] = '未访问地点';
$app_list_strings['marker_image_list']['places_visited'] = '已访问地点';
$app_list_strings['marker_image_list']['playground'] = '游乐场';
$app_list_strings['marker_image_list']['police'] = '警察';
$app_list_strings['marker_image_list']['port'] = '端口';
$app_list_strings['marker_image_list']['postal'] = '邮局';
$app_list_strings['marker_image_list']['power_line_pole'] = 'Power Line Pole';
$app_list_strings['marker_image_list']['power_plant'] = '发电站';
$app_list_strings['marker_image_list']['power_substation'] = '变电所';
$app_list_strings['marker_image_list']['public_art'] = '公共艺术';
$app_list_strings['marker_image_list']['rain'] = '雨';
$app_list_strings['marker_image_list']['real_estate'] = '不动产';
$app_list_strings['marker_image_list']['regroup'] = 'Regroup';
$app_list_strings['marker_image_list']['resort'] = '度假胜地';
$app_list_strings['marker_image_list']['restaurant'] = '餐厅';
$app_list_strings['marker_image_list']['restaurant_african'] = '非洲餐厅';
$app_list_strings['marker_image_list']['restaurant_barbecue'] = '烧烤餐厅';
$app_list_strings['marker_image_list']['restaurant_buffet'] = '自助餐厅';
$app_list_strings['marker_image_list']['restaurant_chinese'] = '中餐厅';
$app_list_strings['marker_image_list']['restaurant_fish'] = '鱼餐厅';
$app_list_strings['marker_image_list']['restaurant_fish_chips'] = '炸鱼薯条餐厅';
$app_list_strings['marker_image_list']['restaurant_gourmet'] = '美食餐厅';
$app_list_strings['marker_image_list']['restaurant_greek'] = '希腊餐厅';
$app_list_strings['marker_image_list']['restaurant_indian'] = '印度餐厅';
$app_list_strings['marker_image_list']['restaurant_italian'] = '意大利餐厅';
$app_list_strings['marker_image_list']['restaurant_japanese'] = '日本餐厅';
$app_list_strings['marker_image_list']['restaurant_kebab'] = '烤串餐厅';
$app_list_strings['marker_image_list']['restaurant_korean'] = '韩国餐厅';
$app_list_strings['marker_image_list']['restaurant_mediterranean'] = '地中海餐厅';
$app_list_strings['marker_image_list']['restaurant_mexican'] = '墨西哥餐厅';
$app_list_strings['marker_image_list']['restaurant_romantic'] = '罗马尼亚餐厅';
$app_list_strings['marker_image_list']['restaurant_thai'] = '泰国餐厅';
$app_list_strings['marker_image_list']['restaurant_turkish'] = '土耳其餐厅';
$app_list_strings['marker_image_list']['right'] = '右';
$app_list_strings['marker_image_list']['right_then_down'] = '右转下行';
$app_list_strings['marker_image_list']['right_then_up'] = '右转前行';
$app_list_strings['marker_image_list']['satursday'] = 'Satursday';
$app_list_strings['marker_image_list']['school'] = '学校';
$app_list_strings['marker_image_list']['shopping_mall'] = '购物中心';
$app_list_strings['marker_image_list']['shore'] = '海岸';
$app_list_strings['marker_image_list']['sight'] = '风景';
$app_list_strings['marker_image_list']['small_city'] = '小城市';
$app_list_strings['marker_image_list']['snow'] = '雪';
$app_list_strings['marker_image_list']['spaceport'] = '火箭发射中心';
$app_list_strings['marker_image_list']['speed_100'] = '限速100';
$app_list_strings['marker_image_list']['speed_110'] = '限速110';
$app_list_strings['marker_image_list']['speed_120'] = '限速120';
$app_list_strings['marker_image_list']['speed_130'] = '限速130';
$app_list_strings['marker_image_list']['speed_20'] = '限速20';
$app_list_strings['marker_image_list']['speed_30'] = '限速30';
$app_list_strings['marker_image_list']['speed_40'] = '限速40';
$app_list_strings['marker_image_list']['speed_50'] = '限速50';
$app_list_strings['marker_image_list']['speed_60'] = '限速60';
$app_list_strings['marker_image_list']['speed_70'] = '限速70';
$app_list_strings['marker_image_list']['speed_80'] = '限速80';
$app_list_strings['marker_image_list']['speed_90'] = '限速90';
$app_list_strings['marker_image_list']['speed_hump'] = '减速路脊';
$app_list_strings['marker_image_list']['stadium'] = '体育馆';
$app_list_strings['marker_image_list']['statue'] = '雕像';
$app_list_strings['marker_image_list']['steam_train'] = '蒸汽火车';
$app_list_strings['marker_image_list']['stop'] = '停止';
$app_list_strings['marker_image_list']['stoplight'] = '停行灯';
$app_list_strings['marker_image_list']['subway'] = '地铁';
$app_list_strings['marker_image_list']['sun'] = '星期日';
$app_list_strings['marker_image_list']['sunday'] = '星期日';
$app_list_strings['marker_image_list']['supermarket'] = '超市';
$app_list_strings['marker_image_list']['synagogue'] = '犹太教堂';
$app_list_strings['marker_image_list']['tapas'] = 'Tapas';
$app_list_strings['marker_image_list']['taxi'] = '出租车';
$app_list_strings['marker_image_list']['taxiway'] = '出租车道';
$app_list_strings['marker_image_list']['teahouse'] = '茶馆';
$app_list_strings['marker_image_list']['telephone'] = '电话';
$app_list_strings['marker_image_list']['temple_hindu'] = '印度庙';
$app_list_strings['marker_image_list']['terrace'] = '梯田';
$app_list_strings['marker_image_list']['text'] = '文本';
$app_list_strings['marker_image_list']['theater'] = '剧场';
$app_list_strings['marker_image_list']['theme_park'] = '主题公园';
$app_list_strings['marker_image_list']['thursday'] = '星期四';
$app_list_strings['marker_image_list']['toilets'] = '厕所';
$app_list_strings['marker_image_list']['toll_station'] = '收费站';
$app_list_strings['marker_image_list']['tower'] = '塔';
$app_list_strings['marker_image_list']['traffic_enforcement_camera'] = '公路摄像头';
$app_list_strings['marker_image_list']['train'] = '火车';
$app_list_strings['marker_image_list']['tram'] = '矿车';
$app_list_strings['marker_image_list']['truck'] = '卡车';
$app_list_strings['marker_image_list']['tuesday'] = '星期二';
$app_list_strings['marker_image_list']['tunnel'] = '隧道';
$app_list_strings['marker_image_list']['turn_left'] = '左转';
$app_list_strings['marker_image_list']['turn_right'] = '右转';
$app_list_strings['marker_image_list']['university'] = '大学';
$app_list_strings['marker_image_list']['up'] = '前';
$app_list_strings['marker_image_list']['up_left'] = '左前方';
$app_list_strings['marker_image_list']['up_right'] = '右前方';
$app_list_strings['marker_image_list']['up_then_left'] = '前转左';
$app_list_strings['marker_image_list']['up_then_right'] = '前转右';
$app_list_strings['marker_image_list']['vespa'] = '小型摩托车';
$app_list_strings['marker_image_list']['video'] = '视频';
$app_list_strings['marker_image_list']['villa'] = '别墅';
$app_list_strings['marker_image_list']['water'] = '水';
$app_list_strings['marker_image_list']['waterfall'] = '瀑布';
$app_list_strings['marker_image_list']['watermill'] = '水力磨坊';
$app_list_strings['marker_image_list']['waterpark'] = '水上公园';
$app_list_strings['marker_image_list']['watertower'] = '水塔';
$app_list_strings['marker_image_list']['wednesday'] = '星期三';
$app_list_strings['marker_image_list']['wifi'] = '无线网';
$app_list_strings['marker_image_list']['wind_turbine'] = '风力涡轮机';
$app_list_strings['marker_image_list']['windmill'] = '风力磨坊';
$app_list_strings['marker_image_list']['winery'] = '酿酒厂';
$app_list_strings['marker_image_list']['work_office'] = '办公室';
$app_list_strings['marker_image_list']['world_heritage_site'] = '世界遗产地';
$app_list_strings['marker_image_list']['zoo'] = '动物园';


//Reschedule
$app_list_strings['call_reschedule_dom'][''] = '';
$app_list_strings['call_reschedule_dom']['Out of Office'] = '不在办公室';
$app_list_strings['call_reschedule_dom']['In a Meeting'] = '会议中';

$app_strings['LBL_RESCHEDULE_LABEL'] = '重新调度';
$app_strings['LBL_RESCHEDULE_TITLE'] = '请输入重新排定信息';
$app_strings['LBL_RESCHEDULE_DATE'] = '日期:';
$app_strings['LBL_RESCHEDULE_REASON'] = '原因';
$app_strings['LBL_RESCHEDULE_ERROR1'] = '请选择有效的日期';
$app_strings['LBL_RESCHEDULE_ERROR2'] = '请选择一个理由';

$app_strings['LBL_RESCHEDULE_PANEL'] = '重新调度';
$app_strings['LBL_RESCHEDULE_HISTORY'] = '试呼历史';
$app_strings['LBL_RESCHEDULE_COUNT'] = '试呼';

//SecurityGroups
$app_list_strings["moduleList"]["SecurityGroups"] = '用户组';
$app_strings['LBL_LOGIN_AS'] = "登录";
$app_strings['LBL_LOGOUT_AS'] = "注销";
$app_strings['LBL_SECURITYGROUP'] = '用户组';

//social
$app_strings['FACEBOOK_USER_C'] = 'Facebook';
$app_strings['TWITTER_USER_C'] = '推特（Twitter）';
$app_strings['LBL_FACEBOOK_USER_C'] = 'Facebook用户';
$app_strings['LBL_TWITTER_USER_C'] = 'Twitter用户';
$app_strings['LBL_PANEL_SOCIAL_FEED'] = '社交网络详情';

$app_strings['LBL_SUBPANEL_FILTER_LABEL'] = '过滤器';

$app_strings['LBL_QUICK_ACCOUNT'] = '新建帐户';
$app_strings['LBL_QUICK_CONTACT'] = '新增联系人';
$app_strings['LBL_QUICK_OPPORTUNITY'] = '新增商业机会';
$app_strings['LBL_QUICK_LEAD'] = '新增潜在客户';
$app_strings['LBL_QUICK_DOCUMENT'] = '新建文档';
$app_strings['LBL_QUICK_CALL'] = '安排电话';
$app_strings['LBL_QUICK_TASK'] = '新增任务';
$app_strings['LBL_COLLECTION_TYPE'] = '类型';

$app_strings['LBL_ADD_TAB'] = '添加仪表盘';
$app_strings['LBL_SUITE_DASHBOARD'] = '仪表板';
$app_strings['LBL_ENTER_DASHBOARD_NAME'] = '输入仪表盘名称';
$app_strings['LBL_NUMBER_OF_COLUMNS'] = '点击一个图表来选择列的编号';
$app_strings['LBL_DELETE_DASHBOARD1'] = '你确定要删除这个';
$app_strings['LBL_DELETE_DASHBOARD2'] = '仪表盘吗?';
$app_strings['LBL_ADD_DASHBOARD_PAGE'] = '添加仪表盘';
$app_strings['LBL_DELETE_DASHBOARD_PAGE'] = '移除仪表盘';
$app_strings['LBL_RENAME_DASHBOARD_PAGE'] = '重命名仪表盘';

$app_strings['LBL_DISCOVER_SUITECRM'] = '探索 SuiteCRM';

$app_list_strings['collection_temp_list'] = array ( 'Tasks' => '任务', 'Meetings' => '会议', 'Calls' => '电话', 'Notes' => '备忘录', 'Emails' => '电子邮件' );

?>
