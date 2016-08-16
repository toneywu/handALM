<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

$mod_strings  = array(
    'LBL_MODULE_NAME' => '主頁',
    'LBL_MODULES_TO_SEARCH' => '搜索模塊',
    'LBL_NEW_FORM_TITLE' => '新增聯繫人',
    'LBL_FIRST_NAME' => '名:',
    'LBL_LAST_NAME' => '姓:',
    'LBL_LIST_LAST_NAME' => '姓',
    'LBL_PHONE' => '電話:',
    'LBL_EMAIL_ADDRESS' => '電子郵件:',
    'LBL_MY_PIPELINE_FORM_TITLE' => '我的管道',
    'LBL_PIPELINE_FORM_TITLE' => '我的銷售數據',
		'LBL_RGraph_PIPELINE_FORM_TITLE' => 'RGRAPH Pipeline By Sales Stage',
    'LBL_CAMPAIGN_ROI_FORM_TITLE' => '營銷活動投資彙報率',
    'LBL_MY_CLOSED_OPPORTUNITIES_GAUGE' => '我談成結束的商業機會',
    'LNK_NEW_CONTACT' => '新增聯繫人',
    'LNK_NEW_ACCOUNT' => '新增客戶',
    'LNK_NEW_OPPORTUNITY' => '新增商業機會',
    'LNK_NEW_LEAD' => '新增潛在客戶',
    'LNK_NEW_CASE' => '新增客戶反饋',
    'LNK_NEW_NOTE' => '新增備忘錄',
    'LNK_NEW_CALL' => '安排電話',
    'LNK_NEW_EMAIL' => '存檔電子郵件',
    'LNK_COMPOSE_EMAIL' => '撰寫電子郵件',
    'LNK_NEW_MEETING' => '安排會議',
    'LNK_NEW_TASK' => '新增任務',
    'LNK_NEW_BUG' => '彙報缺陷',
    'LBL_ADD_BUSINESSCARD' => '新增名片',
    'ERR_ONE_CHAR' => '請至少輸入一個文字或者數字再查找...',
    'LBL_OPEN_TASKS' => '我要完成的任務',
    'LBL_SEARCH_RESULTS_IN' => '中',
    'LNK_NEW_SEND_EMAIL' => '撰寫電子郵件',
    'LBL_NO_ACCESS' => '你沒有許可權訪問這個模塊，請聯繫管理員解決。',
    'LBL_NO_RESULTS_IN_MODULE' => '--沒有結果--',
    'LBL_NO_RESULTS' => '<h2>未發現結果。請重新查找。</h2><br>',
    'LBL_NO_RESULTS_TIPS' => '<h3>查找技巧:</h3><ul><li>確信您選擇了上面合適的分類。</li><li>拓寬您的查找標準</li><li>如果您還不可以找到結果，請使用那個模塊的高級查找。</li></ul>',

  'LBL_RELOAD_PAGE' => 'Please <a href="javascript: window.location.reload()">reload the window</a> to use this SuiteCRM Dashlet.',
  'LBL_ADD_DASHLETS' => '增加新增欄',
  'LBL_ADD_PAGE' => '添加頁',
  'LBL_DEL_PAGE' => '刪除頁面',
  'LBL_WEBSITE_TITLE' => '網站',
  'LBL_RSS_TITLE' => '新聞Feed',
  'LBL_DELETE_PAGE' => '刪除頁',
  'LBL_CHANGE_LAYOUT' => '改變佈局',
  'LBL_RENAME_PAGE' => '重命名頁',
  'LBL_CLOSE_DASHLETS' => '關閉',
  'LBL_OPTIONS' => '選項',
  // dashlet search fields
  'LBL_TODAY'=>'今天',
  'LBL_YESTERDAY' => '昨天',
  'LBL_TOMORROW'=>'明天',
  'LBL_LAST_WEEK'=>'上周',
  'LBL_NEXT_WEEK'=>'下周',
  'LBL_LAST_7_DAYS'=>'過去7天',
  'LBL_NEXT_7_DAYS'=>'未來7天',
  'LBL_LAST_MONTH'=>'上月',
  'LBL_NEXT_MONTH'=>'下月',
  'LBL_LAST_QUARTER'=>'上個季度',
  'LBL_THIS_QUARTER'=>'這個季度',
  'LBL_LAST_YEAR'=>'去年',
  'LBL_NEXT_YEAR'=>'明年',
  'LBL_LAST_30_DAYS' => '過去30天',
  'LBL_NEXT_30_DAYS' => '未來30天',
  'LBL_THIS_MONTH' => '本月',
  'LBL_THIS_YEAR' => '今年',

    'LBL_MODULES' => '模塊',
    'LBL_CHARTS' => '圖表',
    'LBL_TOOLS' => '工具',
    'LBL_WEB' => '網路',
    'LBL_SEARCH_RESULTS' => '查找結果',

  // Dashlet Categories
  'dashlet_categories_dom' => array(
      'Module Views' => '模塊視圖',
      'Portal' => '門戶網站',
      'Charts' => '圖表',
      'Tools' => '工具',
      'Miscellaneous' => '混合'),
  'LBL_MAX_DASHLETS_REACHED' => 'You have reached the maximum number of SuiteCRM Dashlets your administrator has set. Please remove a SuiteCRM Dashlet to add a new one.',
  'LBL_ADDING_DASHLET' => 'Adding SuiteCRM Dashlet ...',
  'LBL_ADDED_DASHLET' => 'SuiteCRM Dashlet Added',
  'LBL_REMOVE_DASHLET_CONFIRM' => 'Are you sure you want to remove this SuiteCRM Dashlet?',
  'LBL_REMOVING_DASHLET' => 'Removing SuiteCRM Dashlet ...',
  'LBL_REMOVED_DASHLET' => 'SuiteCRM Dashlet removed',
  'LBL_DASHLET_CONFIGURE_GENERAL' => '常規',
  'LBL_DASHLET_CONFIGURE_FILTERS' => '過濾',
  'LBL_DASHLET_CONFIGURE_MY_ITEMS_ONLY' => '只顯示我的記錄',
  'LBL_DASHLET_CONFIGURE_TITLE' => '職稱',
  'LBL_DASHLET_CONFIGURE_DISPLAY_ROWS' => '顯示行數:',

  'LBL_DASHLET_DELETE' => 'Delete SuiteCRM Dashlet',
  'LBL_DASHLET_REFRESH' => 'Refresh SuiteCRM Dashlet',
  'LBL_DASHLET_EDIT' => 'Edit SuiteCRM Dashlet',

    'LBL_TRAINING_TITLE' => '培訓',

  'LBL_CREATING_NEW_PAGE' => '創建新頁中...',
  'LBL_NEW_PAGE_FEEDBACK' => 'You have created a new page. You can add new content with the Add SuiteCRM Dashlets option.',
  'LBL_DELETE_PAGE_CONFIRM' => '您確定您要刪除這一頁嗎?',
  'LBL_SAVING_PAGE_TITLE' => '保存頁標題...',
  'LBL_RETRIEVING_PAGE' => '輓救頁面...',

  // Default out-of-box names for tabs
  'LBL_HOME_PAGE_1_NAME' => 'My CRM',
  'LBL_HOME_PAGE_2_NAME' => '銷售頁面',
  'LBL_HOME_PAGE_3_NAME' => '客戶支持',
  'LBL_HOME_PAGE_6_NAME' => '市場頁面',//bug 16510, separate the support and marketing page from each other
  'LBL_HOME_PAGE_4_NAME' => '追蹤',
  'LBL_CLOSE_SITEMAP' => '關閉',

    'LBL_SEARCH' => '查找',
    'LBL_CLEAR' => '清除',

    'LBL_BASIC_CHARTS' => '基本視圖',
    'LBL_REPORT_CHARTS' => '報表視圖',

    'LBL_MY_FAVORITE_REPORT_CHARTS' => '我喜歡的報表',
    'LBL_GLOBAL_REPORT_CHARTS' => '全局團隊報表',
    'LBL_MY_TEAM_REPORT_CHARTS' => '我團隊的報表',
    'LBL_MY_SAVED_REPORT_CHARTS' => '我保存的報表',

  'LBL_DASHLET_SEARCH' => 'Find SuiteCRM Dashlet',

//ABOUT page
    'LBL_VERSION' => '版本',
    'LBL_BUILD' => '創建',


    'LBL_VIEWLICENSE_COM' => '<P>這段程序是免費軟體; 您可以重新分配和/或修改條款下的GNU通用公共許可證版本3 <a href="LICENSE.txt" target="_blank" class="body">  </a> 作為出版自由軟體基金會包括附加許可所列的源代碼頭.</P>',
    'LBL_ADD_TERM_COM' => '<P>互動的用戶界面在修改這個程序源和目標代碼版本必須顯示適當的法律通告, a按照條例第5條的GNU通用公共許可證的第3版。按照第七條第（二）的GNU通用公共許可證，第3版, 這些適當的法律告示必須保留展示的"動力SugarCRM公司"; 徽標。如果顯示器的標誌，是不是合理可行的技術原因，制定適當的法律告示必須展示話： "供電所的SugarCRM ".</P>',


  'LBL_SUGAR_COMMUNITY_EDITION' => 'Sugar版本一致性',
  'LBL_AND' => "和",
  'LBL_ARE' => "是",
  'LBL_TRADEMARKS' => '商標',
  'LBL_OF' => '的',
  'LBL_FOUNDERS' => '創辦人',
  'LBL_JOIN_SUGAR_COMMUNITY' => 'Join the SuiteCRM Community',
  'LBL_DETAILS_SUGARFORGE' => 'Collaborate and develop SuiteCRM extensions',
  'LBL_DETAILS_SUGAREXCHANGE' => 'Buy and sell certified SuiteCRM extensions',
  'LBL_TRAINING' => '培訓',
  'LBL_DETAILS_TRAINING' => 'Learn about SuiteCRM using online and interactive learning content',
  'LBL_FORUMS' => '評論',
  'LBL_DETAILS_FORUMS' => 'Discuss SuiteCRM with expert community users and developers',
  'LBL_WIKI' => 'Wiki',
  'LBL_DETAILS_WIKI' => '搜索知識庫中的用戶和開發者話題',
  'LBL_DEVSITE' => '開發者論壇',
  'LBL_DETAILS_DEVSITE' => 'Discover resources, tutorials, and helpful links to get you up to speed on SuiteCRM development',
 'LBL_GET_SUGARCRM_RSS' => 'Get SuiteCRM RSS',
  'LBL_SUGARCRM_NEWS' => 'SuiteCRM News',
  'LBL_SUGARCRM_TRAINING_NEWS' => 'SuiteCRM Training News',
  'LBL_SUGARCRM_FORUMS' => 'SuiteCRM Forums',
  'LBL_SUGARFORGE_NEWS' => 'SuiteCRM News',
  'LBL_ALL_NEWS' => '所有新聞',
  'LBL_SOURCE_CODE' => '源代碼',
    'LBL_SOURCE_SUGAR' => 'SugarCRM Inc - providers of CE framework',
  'LBL_SOURCE_XTEMPLATE' => 'XTemplate - Barnabás Debreceni開發的PHP的模板引擎',
  'LBL_SOURCE_NUSOAP' => 'NuSOAP - NuSphere公司和Dietrich Ayala開發的一組PHP類，它允許開發者創建和使用web服務',
  'LBL_SOURCE_JSCALENDAR' => 'JS Calendar - Mihai Bazon開發的用於輸入日期的日曆',
  'LBL_SOURCE_PHPPDF' => 'PHP PDF - Wayne Munro開發的用於創建PDF文檔的庫',
  'LBL_SOURCE_HTTP_WEBDAV_SERVER' => 'HTTP_WebDAV_Server - PHP實現的WebDAV伺服器.',
  'LBL_SOURCE_PCLZIP' => 'PclZip - Vincent Blavet開發的為Zip格式的文章提供壓縮和抽取功能的庫',
  'LBL_SOURCE_SMARTY' => 'Smarty - 一個PHP的模板引擎.',
  'LBL_SOURCE_YAHOO_UI_LIB' => 'Yahoo! User Interface Library - 用於實施豐富的客戶端功能的用戶界面庫.',
  'LBL_SOURCE_PHPMAILER' => 'PHPMailer - 一個對PHP的全面功能郵件轉換類',
  'LBL_SOURCE_JSHRINK' => 'JShrink - A Javascript minifier written in PHP',
  'LBL_SOURCE_CRYPT_BLOWFISH' => 'Crypt_Blowfish - 允許快速的雙工 blowfish 加密，無需mcrypt PHP擴展.',
  'LBL_SOURCE_XML_HTMLSAX3' => 'XML_HTMLSax3 - 一個SAX 解析器為HTML 和其它非法形成的XML文檔',
  'LBL_SOURCE_YAHOO_UI_LIB_EXT' => 'Yahoo! UI Extensions Library -  Yahoo的擴展功能! 用戶界面庫是 Jack Slocum創建',
  'LBL_SOURCE_SWFOBJECT' => 'SWFObject - Javascript Flash 播放器檢測和嵌入腳本.',
  'LBL_SOURCE_TINYMCE' => 'TinyMCE - 所見即所得編輯器控制的網頁瀏覽器，使用戶可以編輯HTML內容',
  'LBL_SOURCE_EXT' => 'Ext - 一個客戶端JavaScript框架用於搭建web應用.',
  'LBL_SOURCE_RECAPTCHA' => 'reCAPTCHA幫助您阻止自動濫用您的站點(例如：垃圾評論或虛假註冊)通過使用CAPTCHA確保只有真實用戶執行了操作.',
  'LBL_SOURCE_TCPDF' => 'TCPDF - 一個生成PDF文檔的PHP類 .',
  'LBL_SOURCE_CSSMIN' => 'CssMin - A css parser and minifier.',
  'LBL_SOURCE_PHPSAML' => 'PHP-SAML - A simple SAML toolkit for PHP.',
  'LBL_SOURCE_ISCROLL' => 'iScroll - The overflow:scroll for mobile webkit.  Native scrolling inside a fixed width/height element.',
  'LBL_SOURCE_FLASHCANVAS' => 'FlashCanvas - FlashCanvas is a JavaScript library which adds the HTML5 Canvas support to Internet Explorer. It renders shapes and images via Flash drawing API. It supports almost all Canvas APIs and, in many cases, runs faster than other similar libraries which use VML or Silverlight.',
  'LBL_SOURCE_JIT' => 'JavaScript InfoVis Toolkit - The JavaScript InfoVis Toolkit provides tools for creating Interactive Data Visualizations for the Web.',
  'LBL_SOURCE_ZEND' => 'Zend Framework - An open source, object oriented web application framework for PHP5.',
  'LBL_SOURCE_PARSECSV' => 'parseCSV - CSV data parser for PHP',
  'LBL_SOURCE_PHPJS' => 'php.js - Use PHP functions in JavaScript',
  'LBL_SOURCE_PHPSQL' => 'PHP SQL Parser',
  'LBL_SOURCE_HTMLPURIFIER' => 'HTML Purifier - A standards-compliant HTML filtering library.',
  'LBL_SOURCE_XHPROF' => 'XHProf - A function-level hierarchical profiler for PHP.',
  'LBL_SOURCE_ELASTICA' => 'Elastica - PHP client for the distributed search engine elasticsearch ',
  'LBL_SOURCE_FACEBOOKSDK' => 'Facebook PHP SDK',
  'LBL_SOURCE_JQUERY' => 'jQuery - jQuery is a fast, small, and feature-rich JavaScript library.',
  'LBL_SOURCE_JQUERY_UI' => 'jQuery UI - jQuery UI is a curated set of user interface interactions, effects, widgets, and themes built on top of the jQuery JavaScript Library.',
  'LBL_SOURCE_OVERLIB' => 'OverlibMWS - The overlibmws library uses javascript for DHTML popups that serve as informational and navigational aids for websites.',

  'LBL_DASHLET_TITLE' => '我的網站',
  'LBL_DASHLET_OPT_TITLE' => '標題',
  'LBL_DASHLET_INCORRECT_URL' => 'Incorrect website location is specified',
  'LBL_DASHLET_OPT_URL' => '網站地址',
  'LBL_DASHLET_OPT_HEIGHT' => '小工具高度(像素)',
  'LBL_DASHLET_SUGAR_NEWS' => 'SuiteCRM News',
  'LBL_DASHLET_DISCOVER_SUGAR_PRO' => '探索SuiteCRM',
	'LBL_POWERED_BY_SUGAR' => 'Powered By SugarCRM' /*for 508 compliance fix*/,
	'LBL_MORE_DETAIL' => '詳細信息' /*for 508 compliance fix*/,
	'LBL_BASIC_SEARCH' => '搜索' /*for 508 compliance fix*/,
	'LBL_ADVANCED_SEARCH' => '高級搜索' /*for 508 compliance fix*/,
    'LBL_TOUR_HOME' => 'Home Icon',
    'LBL_TOUR_HOME_DESCRIPTION' => 'Quickly get back to your Home Page dashboard in one click.',
    'LBL_TOUR_MODULES' => '模塊',
    'LBL_TOUR_MODULES_DESCRIPTION' => 'All your important modules are here.',
    'LBL_TOUR_MORE' => 'More Modules',
    'LBL_TOUR_MORE_DESCRIPTION' => 'The rest of your modules are here.',
    'LBL_TOUR_SEARCH' => 'Full Text Search',
    'LBL_TOUR_SEARCH_DESCRIPTION' => 'Search just got a whole lot better.',
    'LBL_TOUR_NOTIFICATIONS' => '提醒',
    'LBL_TOUR_NOTIFICATIONS_DESCRIPTION' => 'SuiteCRM application notifications would go here.',
    'LBL_TOUR_PROFILE' => '帳號',
    'LBL_TOUR_PROFILE_DESCRIPTION' => 'Access profile, settings and logout.',
    'LBL_TOUR_QUICKCREATE' => '快速創建',
    'LBL_TOUR_QUICKCREATE_DESCRIPTION' => 'Quickly create records without losing your place.',
    'LBL_TOUR_FOOTER' => 'Collapsible Footer',
    'LBL_TOUR_FOOTER_DESCRIPTION' => 'Easily expand and collapse the footer.',
    'LBL_TOUR_CUSTOM' => 'Custom Apps',
    'LBL_TOUR_CUSTOM_DESCRIPTION' => 'Custom integrations would go here.',
    'LBL_TOUR_BRAND' => 'Your Brand',
    'LBL_TOUR_BRAND_DESCRIPTION' => 'Your logo goes here. You can mouse over for more info.',
    'LBL_TOUR_WELCOME' => 'Welcome to SuiteCRM',
    'LBL_TOUR_WATCH' => 'Watch What\'s New in SuiteCRM',
    'LBL_TOUR_FEATURES' => '<ul style=""><li class="icon-ok">New simplifed navigation bar</li><li class="icon-ok">New collapsible footer</li><li class="icon-ok">Improved Search</li><li class="icon-ok">Updated actions menu</li></ul><p>and much more!</p>',
    'LBL_TOUR_VISIT' => 'For more information please visit our application',
    'LBL_TOUR_DONE' => 'You\'re Done!',
    'LBL_TOUR_REFERENCE_1' => 'You can always reference our',
    'LBL_TOUR_REFERENCE_2' => 'through the "Support" link under the profile tab.',
    'LNK_TOUR_DOCUMENTATION' => 'documentation',
    'LBL_TOUR_CALENDAR_URL_1' => 'Do you share your SuiteCRM calendar with 3rd party applications, such as Microsoft Outlook or Exchange? If so, you have a new URL. This new, more secure URL includes a personal key which will prevent unauthorized publishing of your calendar.',
    'LBL_TOUR_CALENDAR_URL_2' => 'Retrieve your new shared calendar URL.',
    'LBL_ABOUT' => '關於',
    'LBL_CONTRIBUTORS' => '貢獻者',
    'LBL_ABOUT_SUITE' => '關於SuiteCRM',
    'LBL_PARTNERS' => '合作夥伴',
    'LBL_FEATURING' => 'SalesAgility提供的AOS、AOW、AOR、AOP、AOE及再預約模組。',

    'LBL_CONTRIBUTOR_SUITECRM' => 'SuiteCRM - Open source CRM for the world',
    'LBL_CONTRIBUTOR_SECURITY_SUITE' => 'Jason Eggers提供的SecuritySuite',
    'LBL_CONTRIBUTOR_JJW_GMAPS' => 'Jeffrey J. Walters提供的JJWDesign Google Maps',
    'LBL_CONTRIBUTOR_CONSCIOUS' => 'Conscious Solutions提供的SuiteCRM LOGO',
    'LBL_CONTRIBUTOR_RESPONSETAP' => 'Contribution to SuiteCRM 7.3 release by ResponseTap',


    'LBL_LANGUAGE_SPANISH' => 'Disytel openConsulting提供的西班牙語翻譯',

    'LBL_ABOUT_SUITE_1' => 'SuiteCRM是SugarCRM的一個分支。網路上有許多文章解釋為什麼SugarCRM的分支是必要的。',
    'LBL_ABOUT_SUITE_2' => 'SuiteCRM發布為開源授權 GPL3',
    'LBL_ABOUT_SUITE_3' => 'SuiteCRM與SugarCRM 6.5.x完全相容',
    'LBL_ABOUT_SUITE_4' => '所有SuiteCRM程式碼的管理及開發都會以開源GPL3方式釋出',
    'LBL_ABOUT_SUITE_5' => 'SuiteCRM的支援可以免費及付費方式。',

    'LBL_SUITE_PARTNERS' => '我們有一群忠於SuiteCRM且熱情的開源合作夥伴。我們的網站可閱讀完整合作夥伴列表。',

);
