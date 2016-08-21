

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
<div class="action_buttons">{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='HAA_Frameworks'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if}  {if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='HAA_Frameworks'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if}  {if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='HAA_Frameworks'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if}  {if $bean->aclAccess("edit") && $bean->aclAccess("delete")}<input title="{$APP.LBL_DUP_MERGE}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='HAA_Frameworks'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='Step1'; _form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Merge" value="{$APP.LBL_DUP_MERGE}" id="merge_duplicate_button">{/if}  {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=HAA_Frameworks", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</td>
<td align="right" width="20%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="HAA_Frameworks_detailview_tabs"
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
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='HAA_Frameworks'}{/capture}
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
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
&nbsp;
</td>
<td class="" type="" field="" width='37.5%'  >
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
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="text" field="description" width='37.5%'  >
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|escape:'html'|url2html|nl2br}">{$fields.description.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.logo_image.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LOGO_IMAGE' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="image" field="logo_image" width='37.5%'  >
{if !$fields.logo_image.hidden}
{counter name="panelFieldCount"}
<span id="logo_image" class="sugar_field"><img src="{$fields.logo_image.value}"/></span>
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
{sugar_translate label='LBL_EDITVIEW_PANEL1' module='HAA_Frameworks'}
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
{if !$fields.default_product_uom.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DEFAULT_PRODUCT_UOM' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="default_product_uom" width='37.5%'  >
{if !$fields.default_product_uom.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.default_product_uom_id.value)}
{capture assign="detail_url"}index.php?module=HAA_UOM&action=DetailView&record={$fields.default_product_uom_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="default_product_uom_id" class="sugar_field" data-id-value="{$fields.default_product_uom_id.value}">{$fields.default_product_uom.value}</span>
{if !empty($fields.default_product_uom_id.value)}</a>{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
&nbsp;
</td>
<td class="" type="" field="" width='37.5%'  >
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
{if !$fields.default_time_uom_class.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DEFAULT_TIME_UOM_CLASS' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="default_time_uom_class" width='37.5%'  >
{if !$fields.default_time_uom_class.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.default_time_uom_class_id.value)}
{capture assign="detail_url"}index.php?module=HAA_UOM_Classes&action=DetailView&record={$fields.default_time_uom_class_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="default_time_uom_class_id" class="sugar_field" data-id-value="{$fields.default_time_uom_class_id.value}">{$fields.default_time_uom_class.value}</span>
{if !empty($fields.default_time_uom_class_id.value)}</a>{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.default_area_uom_class.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DEFAULT_AREA_UOM_CLASS' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="default_area_uom_class" width='37.5%'  >
{if !$fields.default_area_uom_class.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.default_area_uom_class_id.value)}
{capture assign="detail_url"}index.php?module=HAA_UOM_Classes&action=DetailView&record={$fields.default_area_uom_class_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="default_area_uom_class_id" class="sugar_field" data-id-value="{$fields.default_area_uom_class_id.value}">{$fields.default_area_uom_class.value}</span>
{if !empty($fields.default_area_uom_class_id.value)}</a>{/if}
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
{sugar_translate label='LBL_EDITVIEW_PANEL2' module='HAA_Frameworks'}
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
{if !$fields.asset_numbering_rule.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSET_NUMBERING_RULE' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="asset_numbering_rule" width='37.5%'  >
{if !$fields.asset_numbering_rule.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.haa_asset_numbering_rule_id.value)}
{capture assign="detail_url"}index.php?module=HAA_Numbering_Rule&action=DetailView&record={$fields.haa_asset_numbering_rule_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="haa_asset_numbering_rule_id" class="sugar_field" data-id-value="{$fields.haa_asset_numbering_rule_id.value}">{$fields.asset_numbering_rule.value}</span>
{if !empty($fields.haa_asset_numbering_rule_id.value)}</a>{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.at_numbering_rule.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_AT_NUMBERING_RULE' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="at_numbering_rule" width='37.5%'  >
{if !$fields.at_numbering_rule.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.haa_at_numbering_rule_id.value)}
{capture assign="detail_url"}index.php?module=HAA_Numbering_Rule&action=DetailView&record={$fields.haa_at_numbering_rule_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="haa_at_numbering_rule_id" class="sugar_field" data-id-value="{$fields.haa_at_numbering_rule_id.value}">{$fields.at_numbering_rule.value}</span>
{if !empty($fields.haa_at_numbering_rule_id.value)}</a>{/if}
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
{if !$fields.owning_person_field_rule.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OWNING_PERSON_FIELD_RULE' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="enum" field="owning_person_field_rule" width='37.5%'  >
{if !$fields.owning_person_field_rule.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.owning_person_field_rule.options)}
<input type="hidden" class="sugar_field" id="{$fields.owning_person_field_rule.name}" value="{ $fields.owning_person_field_rule.options }">
{ $fields.owning_person_field_rule.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.owning_person_field_rule.name}" value="{ $fields.owning_person_field_rule.value }">
{ $fields.owning_person_field_rule.options[$fields.owning_person_field_rule.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.owning_person_rule.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OWNING_PERSON_RULE' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="enum" field="owning_person_rule" width='37.5%'  >
{if !$fields.owning_person_rule.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.owning_person_rule.options)}
<input type="hidden" class="sugar_field" id="{$fields.owning_person_rule.name}" value="{ $fields.owning_person_rule.options }">
{ $fields.owning_person_rule.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.owning_person_rule.name}" value="{ $fields.owning_person_rule.value }">
{ $fields.owning_person_rule.options[$fields.owning_person_rule.value]}
{/if}
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
{if !$fields.using_person_field_rule.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_USING_PERSON_FIELD_RULE' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="enum" field="using_person_field_rule" width='37.5%'  >
{if !$fields.using_person_field_rule.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.using_person_field_rule.options)}
<input type="hidden" class="sugar_field" id="{$fields.using_person_field_rule.name}" value="{ $fields.using_person_field_rule.options }">
{ $fields.using_person_field_rule.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.using_person_field_rule.name}" value="{ $fields.using_person_field_rule.value }">
{ $fields.using_person_field_rule.options[$fields.using_person_field_rule.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.using_person_rule.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_USING_PERSON_RULE' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="enum" field="using_person_rule" width='37.5%'  >
{if !$fields.using_person_rule.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.using_person_rule.options)}
<input type="hidden" class="sugar_field" id="{$fields.using_person_rule.name}" value="{ $fields.using_person_rule.options }">
{ $fields.using_person_rule.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.using_person_rule.name}" value="{ $fields.using_person_rule.value }">
{ $fields.using_person_rule.options[$fields.using_person_rule.value]}
{/if}
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
{sugar_translate label='LBL_EDITVIEW_PANEL3' module='HAA_Frameworks'}
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
{if !$fields.sales_person_field_rule.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SALES_PERSON_FIELD_RULE' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="enum" field="sales_person_field_rule" width='37.5%'  >
{if !$fields.sales_person_field_rule.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.sales_person_field_rule.options)}
<input type="hidden" class="sugar_field" id="{$fields.sales_person_field_rule.name}" value="{ $fields.sales_person_field_rule.options }">
{ $fields.sales_person_field_rule.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.sales_person_field_rule.name}" value="{ $fields.sales_person_field_rule.value }">
{ $fields.sales_person_field_rule.options[$fields.sales_person_field_rule.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.service_person_field_rule.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICE_PERSON_FIELD_RULE' module='HAA_Frameworks'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="enum" field="service_person_field_rule" width='37.5%'  >
{if !$fields.service_person_field_rule.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.service_person_field_rule.options)}
<input type="hidden" class="sugar_field" id="{$fields.service_person_field_rule.name}" value="{ $fields.service_person_field_rule.options }">
{ $fields.service_person_field_rule.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.service_person_field_rule.name}" value="{ $fields.service_person_field_rule.value }">
{ $fields.service_person_field_rule.options[$fields.service_person_field_rule.value]}
{/if}
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
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
        function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script><script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
<script type="text/javascript" src="modules/Favorites/favorites.js"></script>