{*
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

*}
{{capture name=idname assign=idname}}{{sugarvar key='name'}}{{/capture}}
{{if !empty($displayParams.idName)}}
{{assign var=idname value=$displayParams.idName}}
{{/if}}
{php}
    global $current_language;
    $this->_tpl_vars['current_lang'] = $current_language;
{/php}
<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'}"></script>
{*<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.'|cat:$current_lang|cat:'.js'}"  charset="UTF-8"></script>*}
<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">

<span class='input-group date' id="span_{{$idname}}">
{assign var=date_value value={{sugarvar key='value' string=true}} }
<input class="date_input" autocomplete="off" type="text" name="{{$idname}}" id="{{$idname}}" value="{$date_value}" title='{{$vardef.help}}' {{$displayParams.field}} tabindex='{{$tabindex}}' {{if !empty($displayParams.accesskey)}} accesskey='{{$displayParams.accesskey}}' {{/if}}  >
<span class="input-group-addon">
{{if !$displayParams.hiddeCalendar}}
<span class="glyphicon glyphicon-calendar"></span>
{{/if}}
</span>
{{if $displayParams.showFormats}}
&nbsp;(<span class="dateFormat">{$USER_DATEFORMAT}</span>)
{{/if}}
</span>
{{if !$displayParams.hiddeCalendar}}
<script type="text/javascript">
var Datetimepicker=$('#span_{{$idname}}');
var dateformat="{$CALENDAR_FORMAT|replace:'%':''}";
dateformat = dateformat.replace(/Y/,"yyyy");
dateformat = dateformat.replace(/m/,"mm");
dateformat = dateformat.replace(/d/,"dd");
dateformat = dateformat.replace(/H/,"hh");
dateformat = dateformat.replace(/M/,"ii");
Datetimepicker.datetimepicker({ldelim}
	language: '{$current_lang}',
	format: dateformat,
	showMeridian: true,
	minView: 0,
	todayBtn: true,
	autoclose: true,
{rdelim});
</script>
{{/if}}
