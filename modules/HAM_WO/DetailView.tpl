

<script language="javascript">
{literal}
SUGAR.util.doWhen(function(){
    return $("#contentTable").length == 0;
}, SUGAR.themes.actionMenu);
{/literal}
</script>
<table cellpadding="0" cellspacing="0" border="0" width="100%" id="">
<tr>
<td class="buttons" align="left" NOWRAP width="80%">
<div class="actionsContainer">
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="{$module}">
<input type="hidden" name="record" value="{$fields.id.value}">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="{$offset}">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
</form>
<div class="action_buttons">{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='HAM_WO'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if}  {if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='HAM_WO'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if}  {if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='HAM_WO'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if}  {if $bean->aclAccess("edit") && $bean->aclAccess("delete")}<input title="{$APP.LBL_DUP_MERGE}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='HAM_WO'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='Step1'; _form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Merge" value="{$APP.LBL_DUP_MERGE}" id="merge_duplicate_button">{/if}  {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=HAM_WO", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</td>
<td align="right" width="20%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="HAM_WO_detailview_tabs"
>
<div >
<div id='detailpanel_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table id='DEFAULT' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.wo_number.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_WO_NUMBER' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="wo_number" width='37.5%'  >
{if !$fields.wo_number.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.wo_number.value) <= 0}
{assign var="value" value=$fields.wo_number.default_value }
{else}
{assign var="value" value=$fields.wo_number.value }
{/if} 
<span class="sugar_field" id="{$fields.wo_number.name}">{$fields.wo_number.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.site.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SITE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="site" width='37.5%'  >
{if !$fields.site.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.ham_maint_sites_id.value)}
{capture assign="detail_url"}index.php?module=HAM_Maint_Sites&action=DetailView&record={$fields.ham_maint_sites_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="ham_maint_sites_id" class="sugar_field" data-id-value="{$fields.ham_maint_sites_id.value}">{$fields.site.value}</span>
{if !empty($fields.ham_maint_sites_id.value)}</a>{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.ham_act_id_rule.hidden}
{capture name="label" assign="label"}{sugar_translate label='HAM_ACT_ID_RULE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="ham_act_id_rule" width='37.5%'  >
{if !$fields.ham_act_id_rule.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.activity.value)}
{capture assign="detail_url"}index.php?module=HAM_ACT&action=DetailView&record={$fields.activity.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="activity" class="sugar_field" data-id-value="{$fields.activity.value}">{$fields.ham_act_id_rule.value}</span>
{if !empty($fields.activity.value)}</a>{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="name" field="name" width='37.5%'  >
{if !$fields.name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if} 
<span class="sugar_field" id="{$fields.name.name}">{$fields.name.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.wo_status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_WO_STATUS' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="enum" field="wo_status" width='37.5%'  >
{if !$fields.wo_status.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.wo_status.options)}
<input type="hidden" class="sugar_field" id="{$fields.wo_status.name}" value="{ $fields.wo_status.options }">
{ $fields.wo_status.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.wo_status.name}" value="{ $fields.wo_status.value }">
{ $fields.wo_status.options[$fields.wo_status.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.event_type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EVENT_TYPE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="event_type" width='37.5%'  >
{if !$fields.event_type.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.hat_event_type_id.value)}
{capture assign="detail_url"}index.php?module=HAT_EventType&action=DetailView&record={$fields.hat_event_type_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="hat_event_type_id" class="sugar_field" data-id-value="{$fields.hat_event_type_id.value}">{$fields.event_type.value}</span>
{if !empty($fields.hat_event_type_id.value)}</a>{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="text" field="description" width='37.5%' colspan='3' >
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|escape:'html'|url2html|nl2br}">{$fields.description.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
<div id='detailpanel_2' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<img border="0" id="detailpanel_2_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL1' module='HAM_WO'}
<script>
      document.getElementById('detailpanel_2').className += ' expanded';
    </script>
</h4>
<table id='LBL_EDITVIEW_PANEL1' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.location.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LOCATION' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="location" width='37.5%'  >
{if !$fields.location.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.hat_asset_locations_id.value)}
{capture assign="detail_url"}index.php?module=HAT_Asset_Locations&action=DetailView&record={$fields.hat_asset_locations_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="hat_asset_locations_id" class="sugar_field" data-id-value="{$fields.hat_asset_locations_id.value}">{$fields.location.value}</span>
{if !empty($fields.hat_asset_locations_id.value)}</a>{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.asset.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSET' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="asset" width='37.5%'  >
{if !$fields.asset.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.hat_assets_id.value)}
{capture assign="detail_url"}index.php?module=HAT_Assets&action=DetailView&record={$fields.hat_assets_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="hat_assets_id" class="sugar_field" data-id-value="{$fields.hat_assets_id.value}">{$fields.asset.value}</span>
{if !empty($fields.hat_assets_id.value)}</a>{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.location_extra_desc.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LOCATION_EXTRA_DESC' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="location_extra_desc" width='37.5%'  >
{if !$fields.location_extra_desc.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.location_extra_desc.value) <= 0}
{assign var="value" value=$fields.location_extra_desc.default_value }
{else}
{assign var="value" value=$fields.location_extra_desc.value }
{/if} 
<span class="sugar_field" id="{$fields.location_extra_desc.name}">{$fields.location_extra_desc.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.map_enabled.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_ENABLED' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="bool" field="map_enabled" width='37.5%'  >
{if !$fields.map_enabled.hidden}
{counter name="panelFieldCount"}

{if strval($fields.map_enabled.value) == "1" || strval($fields.map_enabled.value) == "yes" || strval($fields.map_enabled.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.map_enabled.name}" id="{$fields.map_enabled.name}" value="$fields.map_enabled.value" disabled="true" {$checked}>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
<div id='detailpanel_3' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
<img border="0" id="detailpanel_3_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
<img border="0" id="detailpanel_3_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL2' module='HAM_WO'}
<script>
      document.getElementById('detailpanel_3').className += ' expanded';
    </script>
</h4>
<table id='LBL_EDITVIEW_PANEL2' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.map_search_area.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_SEARCH_AREA' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="map_search_area" width='37.5%' colspan='3' >
{if !$fields.map_search_area.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.map_search_area.value) <= 0}
{assign var="value" value=$fields.map_search_area.default_value }
{else}
{assign var="value" value=$fields.map_search_area.value }
{/if} 
<span class="sugar_field" id="{$fields.map_search_area.name}">{$fields.map_search_area.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.map_type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_TYPE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="enum" field="map_type" width='37.5%'  >
{if !$fields.map_type.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.map_type.options)}
<input type="hidden" class="sugar_field" id="{$fields.map_type.name}" value="{ $fields.map_type.options }">
{ $fields.map_type.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.map_type.name}" value="{ $fields.map_type.value }">
{ $fields.map_type.options[$fields.map_type.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.map_zoom.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_ZOOM' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="int" field="map_zoom" width='37.5%'  >
{if !$fields.map_zoom.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.map_zoom.name}">
{sugar_number_format precision=0 var=$fields.map_zoom.value}
</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.map_lat.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_LAT' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="float" field="map_lat" width='37.5%'  >
{if !$fields.map_lat.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.map_lat.name}">
{sugar_number_format var=$fields.map_lat.value precision=8 }
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.map_lng.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_LNG' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="float" field="map_lng" width='37.5%'  >
{if !$fields.map_lng.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.map_lng.name}">
{sugar_number_format var=$fields.map_lng.value precision=8 }
</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.map_display_area.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MAP_DISPLAY_AREA' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="map_display_area" width='37.5%' colspan='3' >
{if !$fields.map_display_area.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.map_display_area.value) <= 0}
{assign var="value" value=$fields.map_display_area.default_value }
{else}
{assign var="value" value=$fields.map_display_area.value }
{/if} 
<span class="sugar_field" id="{$fields.map_display_area.name}">{$fields.map_display_area.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(3, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL2").style.display='none';</script>
{/if}
<div id='detailpanel_4' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(4);">
<img border="0" id="detailpanel_4_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(4);">
<img border="0" id="detailpanel_4_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL3' module='HAM_WO'}
<script>
      document.getElementById('detailpanel_4').className += ' expanded';
    </script>
</h4>
<table id='LBL_EDITVIEW_PANEL3' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.wo_priority.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_WO_PRIORITY' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="wo_priority" width='37.5%'  >
{if !$fields.wo_priority.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.wo_priority_id.value)}
{capture assign="detail_url"}index.php?module=HAM_Priority&action=DetailView&record={$fields.wo_priority_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="wo_priority_id" class="sugar_field" data-id-value="{$fields.wo_priority_id.value}">{$fields.wo_priority.value}</span>
{if !empty($fields.wo_priority_id.value)}</a>{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.plan_fixed.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PLAN_FIXED' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="bool" field="plan_fixed" width='37.5%'  >
{if !$fields.plan_fixed.hidden}
{counter name="panelFieldCount"}

{if strval($fields.plan_fixed.value) == "1" || strval($fields.plan_fixed.value) == "yes" || strval($fields.plan_fixed.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.plan_fixed.name}" id="{$fields.plan_fixed.name}" value="$fields.plan_fixed.value" disabled="true" {$checked}>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.date_target_start.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TARGET_START_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="datetimecombo" field="date_target_start" width='37.5%'  >
{if !$fields.date_target_start.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.date_target_start.value) <= 0}
{assign var="value" value=$fields.date_target_start.default_value }
{else}
{assign var="value" value=$fields.date_target_start.value }
{/if} 
<span class="sugar_field" id="{$fields.date_target_start.name}">{$fields.date_target_start.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.date_target_finish.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TARGET_FINISH_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="datetimecombo" field="date_target_finish" width='37.5%'  >
{if !$fields.date_target_finish.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.date_target_finish.value) <= 0}
{assign var="value" value=$fields.date_target_finish.default_value }
{else}
{assign var="value" value=$fields.date_target_finish.value }
{/if} 
<span class="sugar_field" id="{$fields.date_target_finish.name}">{$fields.date_target_finish.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.date_schedualed_start.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SCHEDUALED_START_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="datetimecombo" field="date_schedualed_start" width='37.5%'  >
{if !$fields.date_schedualed_start.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.date_schedualed_start.value) <= 0}
{assign var="value" value=$fields.date_schedualed_start.default_value }
{else}
{assign var="value" value=$fields.date_schedualed_start.value }
{/if} 
<span class="sugar_field" id="{$fields.date_schedualed_start.name}">{$fields.date_schedualed_start.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.date_schedualed_finish.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SCHEDUALED_FINISH_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="datetimecombo" field="date_schedualed_finish" width='37.5%'  >
{if !$fields.date_schedualed_finish.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.date_schedualed_finish.value) <= 0}
{assign var="value" value=$fields.date_schedualed_finish.default_value }
{else}
{assign var="value" value=$fields.date_schedualed_finish.value }
{/if} 
<span class="sugar_field" id="{$fields.date_schedualed_finish.name}">{$fields.date_schedualed_finish.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.date_start_not_earlier.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_START_NOT_EARLIER_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="datetimecombo" field="date_start_not_earlier" width='37.5%'  >
{if !$fields.date_start_not_earlier.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.date_start_not_earlier.value) <= 0}
{assign var="value" value=$fields.date_start_not_earlier.default_value }
{else}
{assign var="value" value=$fields.date_start_not_earlier.value }
{/if} 
<span class="sugar_field" id="{$fields.date_start_not_earlier.name}">{$fields.date_start_not_earlier.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.date_finish_not_later.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FINISH_NOT_LATER_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="datetimecombo" field="date_finish_not_later" width='37.5%'  >
{if !$fields.date_finish_not_later.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.date_finish_not_later.value) <= 0}
{assign var="value" value=$fields.date_finish_not_later.default_value }
{else}
{assign var="value" value=$fields.date_finish_not_later.value }
{/if} 
<span class="sugar_field" id="{$fields.date_finish_not_later.name}">{$fields.date_finish_not_later.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.date_actual_start.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACTUAL_START_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="datetimecombo" field="date_actual_start" width='37.5%'  >
{if !$fields.date_actual_start.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.date_actual_start.value) <= 0}
{assign var="value" value=$fields.date_actual_start.default_value }
{else}
{assign var="value" value=$fields.date_actual_start.value }
{/if} 
<span class="sugar_field" id="{$fields.date_actual_start.name}">{$fields.date_actual_start.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.date_actual_finish.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACTUAL_FINISH_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="datetimecombo" field="date_actual_finish" width='37.5%'  >
{if !$fields.date_actual_finish.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.date_actual_finish.value) <= 0}
{assign var="value" value=$fields.date_actual_finish.default_value }
{else}
{assign var="value" value=$fields.date_actual_finish.value }
{/if} 
<span class="sugar_field" id="{$fields.date_actual_finish.name}">{$fields.date_actual_finish.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(4, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL3").style.display='none';</script>
{/if}
<div id='detailpanel_5' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(5);">
<img border="0" id="detailpanel_5_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(5);">
<img border="0" id="detailpanel_5_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL4' module='HAM_WO'}
<script>
      document.getElementById('detailpanel_5').className += ' expanded';
    </script>
</h4>
<table id='LBL_EDITVIEW_PANEL4' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.reporter.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REPORTER' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="reporter" width='37.5%'  >
{if !$fields.reporter.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.contact_id.value)}
{capture assign="detail_url"}index.php?module=Contacts&action=DetailView&record={$fields.contact_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="contact_id" class="sugar_field" data-id-value="{$fields.contact_id.value}">{$fields.reporter.value}</span>
{if !empty($fields.contact_id.value)}</a>{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.reporter_org.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REPORTER_ORG' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="reporter_org" width='37.5%'  >
{if !$fields.reporter_org.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.account_id.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.account_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="account_id" class="sugar_field" data-id-value="{$fields.account_id.value}">{$fields.reporter_org.value}</span>
{if !empty($fields.account_id.value)}</a>{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.reported_date.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REPORTED_DATE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="datetimecombo" field="reported_date" width='37.5%'  >
{if !$fields.reported_date.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.reported_date.value) <= 0}
{assign var="value" value=$fields.reported_date.default_value }
{else}
{assign var="value" value=$fields.reported_date.value }
{/if} 
<span class="sugar_field" id="{$fields.reported_date.name}">{$fields.reported_date.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.priority.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIORITY' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="priority" width='37.5%'  >
{if !$fields.priority.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.ham_priority_id.value)}
{capture assign="detail_url"}index.php?module=HAM_Priority&action=DetailView&record={$fields.ham_priority_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="ham_priority_id" class="sugar_field" data-id-value="{$fields.ham_priority_id.value}">{$fields.priority.value}</span>
{if !empty($fields.ham_priority_id.value)}</a>{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.source_type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SOURCE_TYPE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="source_type" width='37.5%'  >
{if !$fields.source_type.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.source_type.value) <= 0}
{assign var="value" value=$fields.source_type.default_value }
{else}
{assign var="value" value=$fields.source_type.value }
{/if} 
<span class="sugar_field" id="{$fields.source_type.name}">{$fields.source_type.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.source_reference.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SOURCE_REFERENCE' module='HAM_WO'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="source_reference" width='37.5%'  >
{if !$fields.source_reference.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.source_reference.value) <= 0}
{assign var="value" value=$fields.source_reference.default_value }
{else}
{assign var="value" value=$fields.source_reference.value }
{/if} 
<span class="sugar_field" id="{$fields.source_reference.name}">{$fields.source_reference.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(5, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL4").style.display='none';</script>
{/if}
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
        function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script><script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
<script type="text/javascript" src="modules/Favorites/favorites.js"></script>