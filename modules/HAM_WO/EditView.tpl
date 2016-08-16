

<script>
    {literal}
    $(document).ready(function(){
	    $("ul.clickMenu").each(function(index, node){
	        $(node).sugarActionMenu();
	    });
    });
    {/literal}
</script>
<div class="clear"></div>
<form action="index.php" method="POST" name="{$form_name}" id="{$form_id}" {$enctype}>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="{$module}">
{if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="{$fields.id.value}">
{else}
<input type="hidden" name="record" value="{$fields.id.value}">
{/if}
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="{$smarty.request.return_module}">
<input type="hidden" name="return_action" value="{$smarty.request.return_action}">
<input type="hidden" name="return_id" value="{$smarty.request.return_id}">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
{if (!empty($smarty.request.return_module) || !empty($smarty.request.relate_to)) && !(isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true")}
<input type="hidden" name="relate_to" value="{if $smarty.request.return_relationship}{$smarty.request.return_relationship}{elseif $smarty.request.relate_to && empty($smarty.request.from_dcmenu)}{$smarty.request.relate_to}{elseif empty($isDCForm) && empty($smarty.request.from_dcmenu)}{$smarty.request.return_module}{/if}">
<input type="hidden" name="relate_id" value="{$smarty.request.return_id}">
{/if}
<input type="hidden" name="offset" value="{$offset}">
{assign var='place' value="_HEADER"} <!-- to be used for id for buttons with custom code in def files-->
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('EditView'); {if $isDuplicate}_form.return_id.value=''; {/if}_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE_HEADER">{/if}  {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && !empty($smarty.request.return_module)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action={$smarty.request.return_action}&module={$smarty.request.return_module|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=HAM_WO'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=HAM_WO", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</td>
<td align='right'>
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<span id='tabcounterJS'><script>SUGAR.TabFields=new Array();//this will be used to track tabindexes for references</script></span>
<div id="EditView_tabs"
>
<div >
<div id="detailpanel_1" >
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='Default_{$module}_Subpanel'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='wo_number_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_WO_NUMBER' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.wo_number.value) <= 0}
{assign var="value" value=$fields.wo_number.default_value }
{else}
{assign var="value" value=$fields.wo_number.value }
{/if}  
<input type='text' name='{$fields.wo_number.name}' 
id='{$fields.wo_number.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      accesskey='7'  >
<td valign="top" id='site_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_SITE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.site.name}" class="sqsEnabled" tabindex="0" id="{$fields.site.name}" size="" value="{$fields.site.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.site.id_name}" 
id="{$fields.site.id_name}" 
value="{$fields.ham_maint_sites_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.site.name}" id="btn_{$fields.site.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.site.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"ham_maint_sites_id","name":"site"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.site.name}" id="btn_clr_{$fields.site.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.site.name}', '{$fields.site.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.site.name}']) != 'undefined'",
		enableQS
);
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='ham_act_id_rule_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='HAM_ACT_ID_RULE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.ham_act_id_rule.name}" class="sqsEnabled" tabindex="0" id="{$fields.ham_act_id_rule.name}" size="" value="{$fields.ham_act_id_rule.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.ham_act_id_rule.id_name}" 
id="{$fields.ham_act_id_rule.id_name}" 
value="{$fields.activity.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.ham_act_id_rule.name}" id="btn_{$fields.ham_act_id_rule.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.ham_act_id_rule.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"setHamActivityReturn","form_name":"EditView","field_to_name_array":{"name":"ham_act_id_rule","id":"activity","act_status":"wo_status","ham_priority_id":"wo_priority_id","priority":"wo_priority","event_type":"event_type","hat_event_type_id":"hat_event_type_id"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.ham_act_id_rule.name}" id="btn_clr_{$fields.ham_act_id_rule.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.ham_act_id_rule.name}', '{$fields.ham_act_id_rule.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.ham_act_id_rule.name}']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if}  
<input type='text' name='{$fields.name.name}' 
id='{$fields.name.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='wo_status_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_WO_STATUS' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.wo_status.name}" 
id="{$fields.wo_status.name}" 
title=''       
>
{if isset($fields.wo_status.value) && $fields.wo_status.value != ''}
{html_options options=$fields.wo_status.options selected=$fields.wo_status.value}
{else}
{html_options options=$fields.wo_status.options selected=$fields.wo_status.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.wo_status.options }
{capture name="field_val"}{$fields.wo_status.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.wo_status.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.wo_status.name}" 
id="{$fields.wo_status.name}" 
title=''          
>
{if isset($fields.wo_status.value) && $fields.wo_status.value != ''}
{html_options options=$fields.wo_status.options selected=$fields.wo_status.value}
{else}
{html_options options=$fields.wo_status.options selected=$fields.wo_status.default}
{/if}
</select>
<input
id="{$fields.wo_status.name}-input"
name="{$fields.wo_status.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.wo_status.name}-image"></button><button type="button"
id="btn-clear-{$fields.wo_status.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.wo_status.name}-input', '{$fields.wo_status.name}');sync_{$fields.wo_status.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.wo_status.name}{literal}");
			
			if (typeof select_defaults =="undefined")
				select_defaults = [];
			
			select_defaults[selectElem.id] = {key:selectElem.value,text:''};

			//get default
			for (i=0;i<selectElem.options.length;i++){
				if (selectElem.options[i].value==selectElem.value)
					select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
			}

			//SUGAR.AutoComplete.{$ac_key}.ds = 
			//get options array from vardefs
			var options = SUGAR.AutoComplete.getOptionsArray("");

			YUI().use('datasource', 'datasource-jsonschema',function (Y) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
				    source: function (request) {
				    	var ret = [];
				    	for (i=0;i<selectElem.options.length;i++)
				    		if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
				    			ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
				    	return ret;
				    }
				});
			});
		})();
		{/literal}
	
	{literal}
		YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
	{/literal}
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.wo_status.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.wo_status.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.wo_status.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.wo_status.name}{literal}");
				var doSimulateChange = false;
				
				if (selectElem.value!=selectme)
					doSimulateChange=true;
				
				selectElem.value=selectme;

				for (i=0;i<selectElem.options.length;i++){
					selectElem.options[i].selected=false;
					if (selectElem.options[i].value==selectme)
						selectElem.options[i].selected=true;
				}

				if (doSimulateChange)
					SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
			}

			//global variable 
			sync_{/literal}{$fields.wo_status.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.wo_status.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.wo_status.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.wo_status.name}{literal}", syncFromHiddenToWidget);
		{/literal}

		SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
		SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
		SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
		if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
			{/literal}
			SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
			{literal}
		}
		{/literal}
		if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
			{/literal}
			SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
			{literal}
		}
		{/literal}
		
	SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
	
	{literal}
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
		activateFirstItem: true,
		{/literal}
		minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
		queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
		zIndex: 99999,

				
		{literal}
		source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
		
		resultTextLocator: 'text',
		resultHighlighter: 'phraseMatch',
		resultFilters: 'phraseMatch',
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
		var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
		if(hover[0] != null){
			if (ex) {
				var h = '1000px';
				hover[0].style.height = h;
			}
			else{
				hover[0].style.height = '';
			}
		}
	}
		
	if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
		// expand the dropdown options upon focus
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
		});
	}

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
		});
		
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
			var selectElem = document.getElementById("{/literal}{$fields.wo_status.name}{literal}");
			//if typed value is a valid option, do nothing
			for (i=0;i<selectElem.options.length;i++)
				if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
					return;
			
			//typed value is invalid, so set the text and the hidden to blank
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
			SyncToHidden(select_defaults[selectElem.id].key);
		});
	
	// when they click on the arrow image, toggle the visibility of the options
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
		if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
		} else {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
		}
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
	});

	// when they select an option, set the hidden input with the KEY, to be saved
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
		SyncToHidden(e.result.raw.key);
	});
 
});
</script> 
{/literal}
{/if}
<td valign="top" id='event_type_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_EVENT_TYPE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.event_type.name}" class="sqsEnabled" tabindex="0" id="{$fields.event_type.name}" size="" value="{$fields.event_type.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.event_type.id_name}" 
id="{$fields.event_type.id_name}" 
value="{$fields.hat_event_type_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.event_type.name}" id="btn_{$fields.event_type.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.event_type.module}", 
600, 
400, 
"&basic_type_advanced=WO", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"hat_event_type_id","name":"event_type"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.event_type.name}" id="btn_clr_{$fields.event_type.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.event_type.name}', '{$fields.event_type.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.event_type.name}']) != 'undefined'",
		enableQS
);
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='description_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}

{if empty($fields.description.value)}
{assign var="value" value=$fields.description.default_value }
{else}
{assign var="value" value=$fields.description.value }
{/if}
<script src="custom/include/SugarFields/Fields/Text/js/auto_growing_textareas.js"></script>
<textarea  id='{$fields.description.name}' name='{$fields.description.name}' rows="2" cols="50" title='' tabindex="0" 
 style="overflow: hidden;">{$value}</textarea>
<script>
	$("#{$fields.description.name}").autogrow();
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
<div id="detailpanel_2" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<img border="0" id="detailpanel_2_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL1' module='HAM_WO'}
<script>
      document.getElementById('detailpanel_2').className += ' expanded';
    </script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL1'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='location_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_LOCATION' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.location.name}" class="sqsEnabled" tabindex="0" id="{$fields.location.name}" size="" value="{$fields.location.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.location.id_name}" 
id="{$fields.location.id_name}" 
value="{$fields.hat_asset_locations_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.location.name}" id="btn_{$fields.location.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.location.module}", 
600, 
400, 
"&maint_site_advanced="+encodeURIComponent(document.getElementById("site").value)+"", 
true, 
false, 
{literal}{"call_back_function":"setLocationPopupReturn","form_name":"EditView","field_to_name_array":{"name":"location","id":"hat_asset_locations_id","location_title":"location_desc","map_zoom":"map_zoom","map_lat":"map_lat","map_lng":"map_lng","map_address":"map_search_text","map_type":"map_type","map_enabled":"location_map_enabled"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.location.name}" id="btn_clr_{$fields.location.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.location.name}', '{$fields.location.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.location.name}']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='asset_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSET' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.asset.name}" class="sqsEnabled" tabindex="0" id="{$fields.asset.name}" size="" value="{$fields.asset.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.asset.id_name}" 
id="{$fields.asset.id_name}" 
value="{$fields.hat_assets_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.asset.name}" id="btn_{$fields.asset.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.asset.module}", 
600, 
400, 
"&hat_asset_locations_hat_assets_name_advanced="+encodeURIComponent(document.getElementById("location").value)+"", 
true, 
false, 
{literal}{"call_back_function":"setAssetPopupReturn","form_name":"EditView","field_to_name_array":{"name":"asset","id":"hat_assets_id","asset_desc":"asset_desc","location_desc":"location_extra_desc"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.asset.name}" id="btn_clr_{$fields.asset.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.asset.name}', '{$fields.asset.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.asset.name}']) != 'undefined'",
		enableQS
);
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='location_extra_desc_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_LOCATION_EXTRA_DESC' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.location_extra_desc.value) <= 0}
{assign var="value" value=$fields.location_extra_desc.default_value }
{else}
{assign var="value" value=$fields.location_extra_desc.value }
{/if}  
<input type='text' name='{$fields.location_extra_desc.name}' 
id='{$fields.location_extra_desc.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
<td valign="top" id='map_enabled_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_ENABLED' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.map_enabled.value) == "1" || strval($fields.map_enabled.value) == "yes" || strval($fields.map_enabled.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.map_enabled.name}" value="0"> 
<input type="checkbox" id="{$fields.map_enabled.name}" 
name="{$fields.map_enabled.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
<div id="detailpanel_3" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
<img border="0" id="detailpanel_3_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
<img border="0" id="detailpanel_3_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL2' module='HAM_WO'}
<script>
      document.getElementById('detailpanel_3').className += ' expanded';
    </script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL2'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='map_search_area_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_SEARCH_AREA' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}
<input accesskey=""  tabindex="0"  type="text" id="map_search_text" name="map_search_text"/><input accesskey=""  tabindex="0"  type="button" id="btn_map_search" name="btn_map_search" value="Search on Map" size="30";/> <input accesskey=""  tabindex="0"  type="checkbox" id="chk_rewrite_address" checked="true">Rewrite Address
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='map_type_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_TYPE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.map_type.name}" 
id="{$fields.map_type.name}" 
title=''       
>
{if isset($fields.map_type.value) && $fields.map_type.value != ''}
{html_options options=$fields.map_type.options selected=$fields.map_type.value}
{else}
{html_options options=$fields.map_type.options selected=$fields.map_type.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.map_type.options }
{capture name="field_val"}{$fields.map_type.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.map_type.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.map_type.name}" 
id="{$fields.map_type.name}" 
title=''          
>
{if isset($fields.map_type.value) && $fields.map_type.value != ''}
{html_options options=$fields.map_type.options selected=$fields.map_type.value}
{else}
{html_options options=$fields.map_type.options selected=$fields.map_type.default}
{/if}
</select>
<input
id="{$fields.map_type.name}-input"
name="{$fields.map_type.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.map_type.name}-image"></button><button type="button"
id="btn-clear-{$fields.map_type.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.map_type.name}-input', '{$fields.map_type.name}');sync_{$fields.map_type.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.map_type.name}{literal}");
			
			if (typeof select_defaults =="undefined")
				select_defaults = [];
			
			select_defaults[selectElem.id] = {key:selectElem.value,text:''};

			//get default
			for (i=0;i<selectElem.options.length;i++){
				if (selectElem.options[i].value==selectElem.value)
					select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
			}

			//SUGAR.AutoComplete.{$ac_key}.ds = 
			//get options array from vardefs
			var options = SUGAR.AutoComplete.getOptionsArray("");

			YUI().use('datasource', 'datasource-jsonschema',function (Y) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
				    source: function (request) {
				    	var ret = [];
				    	for (i=0;i<selectElem.options.length;i++)
				    		if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
				    			ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
				    	return ret;
				    }
				});
			});
		})();
		{/literal}
	
	{literal}
		YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
	{/literal}
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.map_type.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.map_type.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.map_type.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.map_type.name}{literal}");
				var doSimulateChange = false;
				
				if (selectElem.value!=selectme)
					doSimulateChange=true;
				
				selectElem.value=selectme;

				for (i=0;i<selectElem.options.length;i++){
					selectElem.options[i].selected=false;
					if (selectElem.options[i].value==selectme)
						selectElem.options[i].selected=true;
				}

				if (doSimulateChange)
					SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
			}

			//global variable 
			sync_{/literal}{$fields.map_type.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.map_type.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.map_type.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.map_type.name}{literal}", syncFromHiddenToWidget);
		{/literal}

		SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
		SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
		SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
		if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
			{/literal}
			SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
			{literal}
		}
		{/literal}
		if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
			{/literal}
			SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
			{literal}
		}
		{/literal}
		
	SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
	
	{literal}
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
		activateFirstItem: true,
		{/literal}
		minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
		queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
		zIndex: 99999,

				
		{literal}
		source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
		
		resultTextLocator: 'text',
		resultHighlighter: 'phraseMatch',
		resultFilters: 'phraseMatch',
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
		var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
		if(hover[0] != null){
			if (ex) {
				var h = '1000px';
				hover[0].style.height = h;
			}
			else{
				hover[0].style.height = '';
			}
		}
	}
		
	if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
		// expand the dropdown options upon focus
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
		});
	}

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
		});
		
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
			var selectElem = document.getElementById("{/literal}{$fields.map_type.name}{literal}");
			//if typed value is a valid option, do nothing
			for (i=0;i<selectElem.options.length;i++)
				if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
					return;
			
			//typed value is invalid, so set the text and the hidden to blank
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
			SyncToHidden(select_defaults[selectElem.id].key);
		});
	
	// when they click on the arrow image, toggle the visibility of the options
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
		if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
		} else {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
		}
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
	});

	// when they select an option, set the hidden input with the KEY, to be saved
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
		SyncToHidden(e.result.raw.key);
	});
 
});
</script> 
{/literal}
{/if}
<td valign="top" id='map_zoom_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_ZOOM' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.map_zoom.value) <= 0}
{assign var="value" value=$fields.map_zoom.default_value }
{else}
{assign var="value" value=$fields.map_zoom.value }
{/if}  
<input type='text' name='{$fields.map_zoom.name}' 
id='{$fields.map_zoom.name}' size='30'  value='{sugar_number_format precision=0 var=$value}' title='' tabindex='0'    >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='map_lat_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_LAT' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.map_lat.value) <= 0}
{assign var="value" value=$fields.map_lat.default_value }
{else}
{assign var="value" value=$fields.map_lat.value }
{/if}  
<input type='text' name='{$fields.map_lat.name}'
id='{$fields.map_lat.name}'
size='30'
maxlength='11'value='{sugar_number_format var=$value precision=8 }'
title=''
tabindex='0'
>
<td valign="top" id='map_lng_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_LNG' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.map_lng.value) <= 0}
{assign var="value" value=$fields.map_lng.default_value }
{else}
{assign var="value" value=$fields.map_lng.value }
{/if}  
<input type='text' name='{$fields.map_lng.name}'
id='{$fields.map_lng.name}'
size='30'
maxlength='11'value='{sugar_number_format var=$value precision=8 }'
title=''
tabindex='0'
>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='map_display_area_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_DISPLAY_AREA' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}
<div id="cuxMap" style="background-color: #efefef; ">map will be loaded here</div>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(3, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL2").style.display='none';</script>
{/if}
<div id="detailpanel_4" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(4);">
<img border="0" id="detailpanel_4_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(4);">
<img border="0" id="detailpanel_4_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL3' module='HAM_WO'}
<script>
      document.getElementById('detailpanel_4').className += ' expanded';
    </script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL3'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='wo_priority_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_WO_PRIORITY' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.wo_priority.name}" class="sqsEnabled" tabindex="0" id="{$fields.wo_priority.name}" size="" value="{$fields.wo_priority.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.wo_priority.id_name}" 
id="{$fields.wo_priority.id_name}" 
value="{$fields.wo_priority_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.wo_priority.name}" id="btn_{$fields.wo_priority.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.wo_priority.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"setWoPriorityReturn","form_name":"EditView","field_to_name_array":{"name":"wo_priority","id":"wo_priority_id"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.wo_priority.name}" id="btn_clr_{$fields.wo_priority.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.wo_priority.name}', '{$fields.wo_priority.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.wo_priority.name}']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='plan_fixed_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PLAN_FIXED' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.plan_fixed.value) == "1" || strval($fields.plan_fixed.value) == "yes" || strval($fields.plan_fixed.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.plan_fixed.name}" value="0"> 
<input type="checkbox" id="{$fields.plan_fixed.name}" 
name="{$fields.plan_fixed.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='date_target_start_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_TARGET_START_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{php}
global $current_language;
$this->_tpl_vars['current_lang'] = $current_language;
{/php}
<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'}"></script>
{*<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.'|cat:$current_lang|cat:'.js'}"  charset="UTF-8"></script>*}
<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<span class='input-group date' id="span_{$fields.date_target_start.name}">
{assign var=date_value value=$fields.date_target_start.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.date_target_start.name}" id="{$fields.date_target_start.name}" value="{$date_value}" title=''  tabindex='0'   >
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</span>
<script type="text/javascript">
var Datetimepicker=$('#span_{$fields.date_target_start.name}');
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
<td valign="top" id='date_target_finish_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_TARGET_FINISH_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{php}
global $current_language;
$this->_tpl_vars['current_lang'] = $current_language;
{/php}
<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'}"></script>
{*<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.'|cat:$current_lang|cat:'.js'}"  charset="UTF-8"></script>*}
<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<span class='input-group date' id="span_{$fields.date_target_finish.name}">
{assign var=date_value value=$fields.date_target_finish.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.date_target_finish.name}" id="{$fields.date_target_finish.name}" value="{$date_value}" title=''  tabindex='0'   >
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</span>
<script type="text/javascript">
var Datetimepicker=$('#span_{$fields.date_target_finish.name}');
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
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='date_schedualed_start_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_SCHEDUALED_START_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{php}
global $current_language;
$this->_tpl_vars['current_lang'] = $current_language;
{/php}
<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'}"></script>
{*<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.'|cat:$current_lang|cat:'.js'}"  charset="UTF-8"></script>*}
<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<span class='input-group date' id="span_{$fields.date_schedualed_start.name}">
{assign var=date_value value=$fields.date_schedualed_start.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.date_schedualed_start.name}" id="{$fields.date_schedualed_start.name}" value="{$date_value}" title=''  tabindex='0'   >
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</span>
<script type="text/javascript">
var Datetimepicker=$('#span_{$fields.date_schedualed_start.name}');
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
<td valign="top" id='date_schedualed_finish_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_SCHEDUALED_FINISH_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{php}
global $current_language;
$this->_tpl_vars['current_lang'] = $current_language;
{/php}
<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'}"></script>
{*<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.'|cat:$current_lang|cat:'.js'}"  charset="UTF-8"></script>*}
<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<span class='input-group date' id="span_{$fields.date_schedualed_finish.name}">
{assign var=date_value value=$fields.date_schedualed_finish.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.date_schedualed_finish.name}" id="{$fields.date_schedualed_finish.name}" value="{$date_value}" title=''  tabindex='0'   >
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</span>
<script type="text/javascript">
var Datetimepicker=$('#span_{$fields.date_schedualed_finish.name}');
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
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='date_start_not_earlier_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_START_NOT_EARLIER_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{php}
global $current_language;
$this->_tpl_vars['current_lang'] = $current_language;
{/php}
<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'}"></script>
{*<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.'|cat:$current_lang|cat:'.js'}"  charset="UTF-8"></script>*}
<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<span class='input-group date' id="span_{$fields.date_start_not_earlier.name}">
{assign var=date_value value=$fields.date_start_not_earlier.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.date_start_not_earlier.name}" id="{$fields.date_start_not_earlier.name}" value="{$date_value}" title=''  tabindex='0'   >
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</span>
<script type="text/javascript">
var Datetimepicker=$('#span_{$fields.date_start_not_earlier.name}');
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
<td valign="top" id='date_finish_not_later_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FINISH_NOT_LATER_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{php}
global $current_language;
$this->_tpl_vars['current_lang'] = $current_language;
{/php}
<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'}"></script>
{*<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.'|cat:$current_lang|cat:'.js'}"  charset="UTF-8"></script>*}
<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<span class='input-group date' id="span_{$fields.date_finish_not_later.name}">
{assign var=date_value value=$fields.date_finish_not_later.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.date_finish_not_later.name}" id="{$fields.date_finish_not_later.name}" value="{$date_value}" title=''  tabindex='0'   >
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</span>
<script type="text/javascript">
var Datetimepicker=$('#span_{$fields.date_finish_not_later.name}');
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
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='date_actual_start_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ACTUAL_START_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{php}
global $current_language;
$this->_tpl_vars['current_lang'] = $current_language;
{/php}
<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'}"></script>
{*<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.'|cat:$current_lang|cat:'.js'}"  charset="UTF-8"></script>*}
<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<span class='input-group date' id="span_{$fields.date_actual_start.name}">
{assign var=date_value value=$fields.date_actual_start.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.date_actual_start.name}" id="{$fields.date_actual_start.name}" value="{$date_value}" title=''  tabindex='0'   >
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</span>
<script type="text/javascript">
var Datetimepicker=$('#span_{$fields.date_actual_start.name}');
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
<td valign="top" id='date_actual_finish_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ACTUAL_FINISH_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{php}
global $current_language;
$this->_tpl_vars['current_lang'] = $current_language;
{/php}
<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'}"></script>
{*<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.'|cat:$current_lang|cat:'.js'}"  charset="UTF-8"></script>*}
<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<span class='input-group date' id="span_{$fields.date_actual_finish.name}">
{assign var=date_value value=$fields.date_actual_finish.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.date_actual_finish.name}" id="{$fields.date_actual_finish.name}" value="{$date_value}" title=''  tabindex='0'   >
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</span>
<script type="text/javascript">
var Datetimepicker=$('#span_{$fields.date_actual_finish.name}');
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
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(4, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL3").style.display='none';</script>
{/if}
<div id="detailpanel_5" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(5);">
<img border="0" id="detailpanel_5_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(5);">
<img border="0" id="detailpanel_5_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL4' module='HAM_WO'}
<script>
      document.getElementById('detailpanel_5').className += ' expanded';
    </script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL4'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='reporter_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REPORTER' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.reporter.name}" class="sqsEnabled" tabindex="0" id="{$fields.reporter.name}" size="" value="{$fields.reporter.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.reporter.id_name}" 
id="{$fields.reporter.id_name}" 
value="{$fields.contact_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.reporter.name}" id="btn_{$fields.reporter.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_LABEL"}"
onclick='open_popup(
"{$fields.reporter.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"contact_id","name":"reporter"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.reporter.name}" id="btn_clr_{$fields.reporter.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.reporter.name}', '{$fields.reporter.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.reporter.name}']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='reporter_org_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REPORTER_ORG' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.reporter_org.name}" class="sqsEnabled" tabindex="0" id="{$fields.reporter_org.name}" size="" value="{$fields.reporter_org.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.reporter_org.id_name}" 
id="{$fields.reporter_org.id_name}" 
value="{$fields.account_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.reporter_org.name}" id="btn_{$fields.reporter_org.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL"}"
onclick='open_popup(
"{$fields.reporter_org.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"account_id","name":"reporter_org"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.reporter_org.name}" id="btn_clr_{$fields.reporter_org.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.reporter_org.name}', '{$fields.reporter_org.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.reporter_org.name}']) != 'undefined'",
		enableQS
);
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='reported_date_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REPORTED_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{php}
global $current_language;
$this->_tpl_vars['current_lang'] = $current_language;
{/php}
<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'}"></script>
{*<script type="text/javascript" src="{sugar_getjspath file='custom/resources/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.'|cat:$current_lang|cat:'.js'}"  charset="UTF-8"></script>*}
<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<span class='input-group date' id="span_{$fields.reported_date.name}">
{assign var=date_value value=$fields.reported_date.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.reported_date.name}" id="{$fields.reported_date.name}" value="{$date_value}" title=''  tabindex='0'   >
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</span>
<script type="text/javascript">
var Datetimepicker=$('#span_{$fields.reported_date.name}');
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
<td valign="top" id='priority_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIORITY' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.priority.name}" class="sqsEnabled" tabindex="0" id="{$fields.priority.name}" size="" value="{$fields.priority.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.priority.id_name}" 
id="{$fields.priority.id_name}" 
value="{$fields.ham_priority_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.priority.name}" id="btn_{$fields.priority.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.priority.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"setHamPriorityReturn","form_name":"EditView","field_to_name_array":{"name":"priority","id":"ham_priority_id"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.priority.name}" id="btn_clr_{$fields.priority.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.priority.name}', '{$fields.priority.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.priority.name}']) != 'undefined'",
		enableQS
);
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='source_type_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_SOURCE_TYPE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
<input accesskey=""  tabindex="0"  type="text" id="source_type" name="source_type" value="{$fields.source_type.value}"><input accesskey=""  tabindex="0"  type="hidden" id="source_id" name="source_id" value="{$fields.source_id.value}">
<td valign="top" id='source_reference_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_SOURCE_REFERENCE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.source_reference.value) <= 0}
{assign var="value" value=$fields.source_reference.default_value }
{else}
{assign var="value" value=$fields.source_reference.value }
{/if}  
<input type='text' name='{$fields.source_reference.name}' 
id='{$fields.source_reference.name}' size='30' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(5, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL4").style.display='none';</script>
{/if}
</div></div>

<script language="javascript">
    var _form_id = '{$form_id}';
    {literal}
    SUGAR.util.doWhen(function(){
        _form_id = (_form_id == '') ? 'EditView' : _form_id;
        return document.getElementById(_form_id) != null;
    }, SUGAR.themes.actionMenu);
    {/literal}
</script>
{assign var='place' value="_FOOTER"} <!-- to be used for id for buttons with custom code in def files-->
<div class="buttons">
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('EditView'); {if $isDuplicate}_form.return_id.value=''; {/if}_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE_FOOTER">{/if}  {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && !empty($smarty.request.return_module)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action={$smarty.request.return_action}&module={$smarty.request.return_module|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=HAM_WO'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=HAM_WO", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</form>
{$set_focus_block}
<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
        function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script><script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () {ldelim} initEditView(document.forms.EditView) {rdelim});
//window.setTimeout(, 100);
window.onbeforeunload = function () {ldelim} return onUnloadEditView(); {rdelim};
// bug 55468 -- IE is too aggressive with onUnload event
if ($.browser.msie) {ldelim}
$(document).ready(function() {ldelim}
    $(".collapseLink,.expandLink").click(function (e) {ldelim} e.preventDefault(); {rdelim});
  {rdelim});
{rdelim}
</script>{literal}
<script type="text/javascript">
addForm('EditView');addToValidate('EditView', 'name', 'name', true,'{/literal}{sugar_translate label='LBL_NAME' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'date_entered_date', 'date', false,'创建日期' );
addToValidate('EditView', 'date_modified_date', 'date', false,'修改日期' );
addToValidate('EditView', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'description', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'ham_maint_sites_id', 'id', false,'{/literal}{sugar_translate label='LBL_SITE_HAM_MAINT_SITES_ID' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'site', 'relate', true,'{/literal}{sugar_translate label='LBL_SITE' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'location_extra_desc', 'varchar', false,'{/literal}{sugar_translate label='LBL_LOCATION_EXTRA_DESC' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'ham_priority_id', 'id', false,'{/literal}{sugar_translate label='LBL_PRIORITY_HAM_PRIORITY_ID' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'priority', 'relate', true,'{/literal}{sugar_translate label='LBL_PRIORITY' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'wo_number', 'varchar', false,'{/literal}{sugar_translate label='LBL_WO_NUMBER' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'contact_id', 'id', false,'{/literal}{sugar_translate label='LBL_REPORTER_CONTACT_ID' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'reporter', 'relate', false,'{/literal}{sugar_translate label='LBL_REPORTER' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'account_id', 'id', false,'{/literal}{sugar_translate label='LBL_REPORTER_ORG_ACCOUNT_ID' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'reporter_org', 'relate', false,'{/literal}{sugar_translate label='LBL_REPORTER_ORG' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'reported_date_date', 'date', false,'报告时间' );
addToValidate('EditView', 'date_target_start_date', 'date', true,'目标开始时间' );
addToValidate('EditView', 'date_target_finish_date', 'date', true,'目标完成时间' );
addToValidate('EditView', 'date_actual_start_date', 'date', false,'实际开始时间' );
addToValidate('EditView', 'date_actual_finish_date', 'date', false,'实际完成时间' );
addToValidate('EditView', 'date_schedualed_start_date', 'date', false,'已计划开始时间' );
addToValidate('EditView', 'date_schedualed_finish_date', 'date', false,'已计划完成时间' );
addToValidate('EditView', 'date_start_not_earlier_date', 'date', false,'最早开始时间' );
addToValidate('EditView', 'date_finish_not_later_date', 'date', false,'最晚完成时间' );
addToValidate('EditView', 'wo_status', 'enum', true,'{/literal}{sugar_translate label='LBL_WO_STATUS' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'hat_event_type_id', 'id', false,'{/literal}{sugar_translate label='LBL_EVENT_TYPE_ID' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'event_type', 'relate', true,'{/literal}{sugar_translate label='LBL_EVENT_TYPE' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'hat_asset_locations_id', 'id', false,'{/literal}{sugar_translate label='LBL_LOCATION_HAT_ASSET_LOCATIONS_ID' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'location', 'relate', true,'{/literal}{sugar_translate label='LBL_LOCATION' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'hat_assets_id', 'id', false,'{/literal}{sugar_translate label='LBL_HAT_ASSETS_ID' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'asset', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSET' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'asset_desc', 'varchar', false,'{/literal}{sugar_translate label='LBL_ASSET_DESC' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'location_desc', 'varchar', false,'{/literal}{sugar_translate label='LBL_LOCATION_DESC' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'location_map_enabled', 'bool', false,'{/literal}{sugar_translate label='LBL_LOCATION_MAP_ENABLED' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'map_type', 'enum', false,'{/literal}{sugar_translate label='LBL_MAP_TYPE' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'map_lat', 'float', true,'{/literal}{sugar_translate label='LBL_MAP_LAT' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'map_lng', 'float', true,'{/literal}{sugar_translate label='LBL_MAP_LNG' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'map_zoom', 'int', true,'{/literal}{sugar_translate label='LBL_MAP_ZOOM' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'map_enabled', 'bool', false,'{/literal}{sugar_translate label='LBL_MAP_ENABLED' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'map_address', 'varchar', false,'{/literal}{sugar_translate label='LBL_MAP_ADDRESS' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'map_search_area', 'varchar', false,'{/literal}{sugar_translate label='LBL_MAP_SEARCH_AREA' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'map_display_area', 'varchar', false,'{/literal}{sugar_translate label='LBL_MAP_DISPLAY_AREA' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'source_type', 'varchar', false,'{/literal}{sugar_translate label='LBL_SOURCE_TYPE' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'source_id', 'varchar', false,'{/literal}{sugar_translate label='LBL_SOURCE_ID' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'source_reference', 'varchar', false,'{/literal}{sugar_translate label='LBL_SOURCE_REFERENCE' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'plan_fixed', 'bool', false,'{/literal}{sugar_translate label='LBL_PLAN_FIXED' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'activity', 'id', false,'{/literal}{sugar_translate label='ACTIVITY' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'ham_act_id_rule', 'relate', false,'{/literal}{sugar_translate label='HAM_ACT_ID_RULE' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'wo_priority_id', 'id', false,'{/literal}{sugar_translate label='LBL_WO_PRIORITY_ID' module='HAM_WO' for_js=true}{literal}' );
addToValidate('EditView', 'wo_priority', 'relate', true,'{/literal}{sugar_translate label='LBL_WO_PRIORITY' module='HAM_WO' for_js=true}{literal}' );
addToValidateBinaryDependency('EditView', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='HAM_WO' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='HAM_WO' for_js=true}{literal}', 'assigned_user_id' );
addToValidateBinaryDependency('EditView', 'site', 'alpha', true,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='HAM_WO' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_SITE' module='HAM_WO' for_js=true}{literal}', 'ham_maint_sites_id' );
addToValidateBinaryDependency('EditView', 'priority', 'alpha', true,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='HAM_WO' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_PRIORITY' module='HAM_WO' for_js=true}{literal}', 'ham_priority_id' );
addToValidateBinaryDependency('EditView', 'reporter', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='HAM_WO' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_REPORTER' module='HAM_WO' for_js=true}{literal}', 'contact_id' );
addToValidateBinaryDependency('EditView', 'reporter_org', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='HAM_WO' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_REPORTER_ORG' module='HAM_WO' for_js=true}{literal}', 'account_id' );
addToValidateBinaryDependency('EditView', 'event_type', 'alpha', true,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='HAM_WO' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_EVENT_TYPE' module='HAM_WO' for_js=true}{literal}', 'hat_event_type_id' );
addToValidateBinaryDependency('EditView', 'location', 'alpha', true,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='HAM_WO' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_LOCATION' module='HAM_WO' for_js=true}{literal}', 'hat_asset_locations_id' );
addToValidateBinaryDependency('EditView', 'asset', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='HAM_WO' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSET' module='HAM_WO' for_js=true}{literal}', 'hat_assets_id' );
addToValidateBinaryDependency('EditView', 'ham_act_id_rule', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='HAM_WO' for_js=true}{literal}: {/literal}{sugar_translate label='HAM_ACT_ID_RULE' module='HAM_WO' for_js=true}{literal}', 'activity' );
addToValidateBinaryDependency('EditView', 'wo_priority', 'alpha', true,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='HAM_WO' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_WO_PRIORITY' module='HAM_WO' for_js=true}{literal}', 'wo_priority_id' );
</script><script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['EditView_site']={"form":"EditView","method":"query","modules":["HAM_Maint_Sites"],"group":"or","field_list":["name","id"],"populate_list":["site","ham_maint_sites_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"\u6ca1\u6709\u5339\u914d"};sqs_objects['EditView_ham_act_id_rule']={"form":"EditView","method":"query","modules":["HAM_ACT"],"group":"or","field_list":["name","id"],"populate_list":["ham_act_id_rule","activity"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"\u6ca1\u6709\u5339\u914d"};sqs_objects['EditView_event_type']={"form":"EditView","method":"query","modules":["HAT_EventType"],"group":"or","field_list":["name","id"],"populate_list":["event_type","hat_event_type_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"\u6ca1\u6709\u5339\u914d"};sqs_objects['EditView_location']={"form":"EditView","method":"query","modules":["HAT_Asset_Locations"],"group":"or","field_list":["name","id"],"populate_list":["location","hat_asset_locations_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"\u6ca1\u6709\u5339\u914d"};sqs_objects['EditView_asset']={"form":"EditView","method":"query","modules":["HAT_Assets"],"group":"or","field_list":["name","id"],"populate_list":["asset","hat_assets_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"\u6ca1\u6709\u5339\u914d"};sqs_objects['EditView_wo_priority']={"form":"EditView","method":"query","modules":["HAM_Priority"],"group":"or","field_list":["name","id"],"populate_list":["wo_priority","wo_priority_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"\u6ca1\u6709\u5339\u914d"};sqs_objects['EditView_reporter']={"form":"EditView","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","first_name","last_name","id"],"populate_list":["reporter","contact_id","contact_id","contact_id"],"required_list":["contact_id"],"group":"or","conditions":[{"name":"first_name","op":"like_custom","end":"%","value":""},{"name":"last_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"\u6ca1\u6709\u5339\u914d"};sqs_objects['EditView_reporter_org']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["EditView_reporter_org","account_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["account_id"],"order":"name","limit":"30","no_match_text":"\u6ca1\u6709\u5339\u914d"};sqs_objects['EditView_priority']={"form":"EditView","method":"query","modules":["HAM_Priority"],"group":"or","field_list":["name","id"],"populate_list":["priority","ham_priority_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"\u6ca1\u6709\u5339\u914d"};</script>{/literal}
