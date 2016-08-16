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
	'ERR_DELETE_RECORD' => '必须指定记录编号才能删除客户。',
	'LBL_ACCOUNT_ID' => '客户ID',
	'LBL_CASE_ID' => '客户反馈ID：',
	'LBL_CLOSE' => '关闭：',
	'LBL_COLON' => ':',
	'LBL_CONTACT_ID' => '联系人ID：',
	'LBL_CONTACT_NAME' => '联系人：',
	'LBL_DEFAULT_SUBPANEL_TITLE' => '备忘录',
	'LBL_DESCRIPTION' => '备忘录',
	'LBL_EMAIL_ADDRESS' => '电子邮件地址：',
    'LBL_EMAIL_ATTACHMENT' => '电子邮件附件',
	'LBL_FILE_MIME_TYPE' => 'Mime类型',
	'LBL_FILE_URL' => '文件URL',
	'LBL_FILENAME' => '附件：',
	'LBL_LEAD_ID' => '潜在客户ID',
	'LBL_LIST_CONTACT_NAME' => '联系人',
	'LBL_LIST_DATE_MODIFIED' => '最新修改',
	'LBL_LIST_FILENAME' => '附件',
	'LBL_LIST_FORM_TITLE' => '备忘录列表',
	'LBL_LIST_RELATED_TO' => '关联到',
	'LBL_LIST_SUBJECT' => '主题',
	'LBL_LIST_STATUS' => '状态',
	'LBL_LIST_CONTACT' => '联系人',
	'LBL_MODULE_NAME' => '备忘录',
	'LBL_MODULE_TITLE' => '备忘录：首页',
	'LBL_NEW_FORM_TITLE' => '创建备忘录或添加附件',
	'LBL_NOTE_STATUS' => '备忘录',
	'LBL_NOTE_SUBJECT' => '主题：',
	'LBL_NOTES_SUBPANEL_TITLE' => '附件',
	'LBL_NOTE' => '备忘录：',
	'LBL_OPPORTUNITY_ID' => '商业机会ID：',
	'LBL_PARENT_ID' => '上级ID：',
	'LBL_PARENT_TYPE' => '上级类型：',
	'LBL_PHONE' => '电话：',
	'LBL_PORTAL_FLAG' => '在门户网站中显示?',
	'LBL_EMBED_FLAG' => '嵌入到电子邮件中?',
	'LBL_PRODUCT_ID' => '产品ID：',
	'LBL_QUOTE_ID' => '报价ID：',
	'LBL_RELATED_TO' => '关联到：',
	'LBL_SEARCH_FORM_TITLE' => '查找备忘录',
	'LBL_STATUS' => '状态',
	'LBL_SUBJECT' => '主题：',
	'LNK_IMPORT_NOTES' => '导入备忘录',
	'LNK_NEW_NOTE' => '创建备忘录',
	'LNK_NOTE_LIST' => '查看备忘录',
	'LBL_MEMBER_OF' => '上级单位：',
	'LBL_LIST_ASSIGNED_TO_NAME' => '负责人',
    'LBL_REMOVING_ATTACHMENT'=>'正在删除附件……',
    'ERR_REMOVING_ATTACHMENT'=>'删除附件失败……',
    'LBL_CREATED_BY'=>'创建人',
    'LBL_MODIFIED_BY'=>'修改人',
    'LBL_SEND_ANYWAYS'=> '电子邮件没有主题，一定要发送/保存吗?',
	'LBL_LIST_EDIT_BUTTON' => '编辑',
	'LBL_ACTIVITIES_REPORTS' => '活动报表',
	'LBL_PANEL_DETAILS' => '详细信息',
	'LBL_NOTE_INFORMATION' => '备忘录概览',
	'LBL_MY_NOTES_DASHLETNAME' => '我的备忘录',
	'LBL_EDITLAYOUT' => '编辑布局' /*for 508 compliance fix*/,
    //For export labels
	'LBL_FIRST_NAME' => '名',
    'LBL_LAST_NAME' => '姓',
    'LBL_EXPORT_PARENT_TYPE' => '关联到模块',
    'LBL_EXPORT_PARENT_ID' => '关联ID',
    'LBL_DATE_ENTERED' => '创建日期',
    'LBL_DATE_MODIFIED' => '修改日期',
    'LBL_DELETED' => '已删除',
);

?>
