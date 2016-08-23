<?php /* Smarty version 2.6.29, created on 2016-08-23 14:17:25
         compiled from modules/ModuleBuilder/tpls/listView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_translate', 'modules/ModuleBuilder/tpls/listView.tpl', 69, false),array('function', 'counter', 'modules/ModuleBuilder/tpls/listView.tpl', 77, false),array('function', 'math', 'modules/ModuleBuilder/tpls/listView.tpl', 81, false),array('function', 'sugar_getimage', 'modules/ModuleBuilder/tpls/listView.tpl', 108, false),array('function', 'sugar_getimagepath', 'modules/ModuleBuilder/tpls/listView.tpl', 114, false),array('modifier', 'substr', 'modules/ModuleBuilder/tpls/listView.tpl', 116, false),array('modifier', 'escape', 'modules/ModuleBuilder/tpls/listView.tpl', 119, false),)), $this); ?>
<form name='edittabs' id='edittabs' method='POST' action='index.php'>
<?php echo '
<script>
studiotabs.reset();
</script>
'; ?>

<input type='hidden' name='action' value=<?php echo $this->_tpl_vars['action']; ?>
>
<input type='hidden' name='view' value=<?php echo $this->_tpl_vars['view']; ?>
>
<input type='hidden' name='module' value='<?php echo $this->_tpl_vars['module']; ?>
'>
<input type='hidden' name='subpanel' value='<?php echo $this->_tpl_vars['subpanel']; ?>
'>
<input type='hidden' name='subpanelLabel' value='<?php echo $this->_tpl_vars['subpanelLabel']; ?>
'>
<input type='hidden' name='local' value='<?php echo $this->_tpl_vars['local']; ?>
'>
<input type='hidden' name='view_module' value='<?php echo $this->_tpl_vars['view_module']; ?>
'>
<?php if ($this->_tpl_vars['fromPortal']): ?>
    <input type='hidden' name='PORTAL' value='1'>
<?php endif; ?>
<input type='hidden' name='view_package' value='<?php echo $this->_tpl_vars['view_package']; ?>
'>
<input type='hidden' name='to_pdf' value='1'>
<link rel="stylesheet" type="text/css" href="modules/ModuleBuilder/tpls/ListEditor.css"/>

<table id="editor-content" class="list-editor">
<tr><td colspan=3><?php echo $this->_tpl_vars['buttons']; ?>
</td></tr>
<?php if (isset ( $this->_tpl_vars['subpanel'] ) && isset ( $this->_tpl_vars['subpanel_label'] )): ?>
<tr>
    <td colspan=3>
    <span class='mbLBL'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_SUBPANEL_TITLE'), $this);?>
</span>
    <input id ="subpanel_title" type="text" name="subpanel_title" value="<?php echo $this->_tpl_vars['subpanel_title']; ?>
">
    <input id ="subpanel_title_key" type="hidden" name="subpanel_title_key" value="<?php echo $this->_tpl_vars['subpanel_label']; ?>
">
    </td>
</tr>
<?php endif; ?>
<tr>

<?php echo smarty_function_counter(array('start' => 0,'name' => 'groupCounter','print' => false,'assign' => 'groupCounter'), $this);?>

<?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['list']):
?>
    <?php echo smarty_function_counter(array('name' => 'groupCounter'), $this);?>

<?php endforeach; endif; unset($_from); ?>
<?php echo smarty_function_math(array('assign' => 'groupWidth','equation' => "100/".($this->_tpl_vars['groupCounter'])."-3"), $this);?>


<?php echo smarty_function_counter(array('start' => 0,'name' => 'slotCounter','print' => false,'assign' => 'slotCounter'), $this);?>

<?php echo smarty_function_counter(array('start' => 0,'name' => 'modCounter','print' => false,'assign' => 'modCounter'), $this);?>


<?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['list']):
?>

<td id=<?php echo $this->_tpl_vars['label']; ?>
  width="30%" VALIGN="top" style="float: left; border: 1px gray solid; padding:4px; margin-right:4px; margin-top: 8px;  overflow-x: hidden;">
<h3 ><?php echo $this->_tpl_vars['label']; ?>
</h3>
<ul id='ul<?php echo $this->_tpl_vars['slotCounter']; ?>
' style="overflow-y: auto; overflow-x: hidden;">

<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>

<li name="width=<?php echo $this->_tpl_vars['value']['width']; ?>
%" id='subslot<?php echo $this->_tpl_vars['modCounter']; ?>
' class='draggable' >
    <table width='100%'>
        <tr>
            <td id='subslot<?php echo $this->_tpl_vars['modCounter']; ?>
label' style="font-weight: bold;">
            <?php if ($this->_tpl_vars['MB']): ?>
            <?php if (! empty ( $this->_tpl_vars['value']['label'] )): ?><?php echo $this->_tpl_vars['current_mod_strings'][$this->_tpl_vars['value']['label']]; ?>
<?php elseif (! empty ( $this->_tpl_vars['value']['vname'] )): ?><?php echo $this->_tpl_vars['current_mod_strings'][$this->_tpl_vars['value']['vname']]; ?>
<?php else: ?><?php echo $this->_tpl_vars['key']; ?>
<?php endif; ?>
            <?php else: ?>
            <?php if (! empty ( $this->_tpl_vars['value']['label'] )): ?><?php echo smarty_function_sugar_translate(array('label' => $this->_tpl_vars['value']['label'],'module' => $this->_tpl_vars['language']), $this);?>
<?php elseif (! empty ( $this->_tpl_vars['value']['vname'] )): ?><?php echo smarty_function_sugar_translate(array('label' => $this->_tpl_vars['value']['vname'],'module' => $this->_tpl_vars['language']), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['key']; ?>
<?php endif; ?>
            <?php endif; ?>
            </td>
            <td></td>
            <td align="right" class="editIcon">
                                <?php if (isset ( $this->_tpl_vars['field_defs'][$this->_tpl_vars['key']]['calculated'] ) && $this->_tpl_vars['field_defs'][$this->_tpl_vars['key']]['calculated']): ?>
                    <?php echo smarty_function_sugar_getimage(array('name' => "SugarLogic/icon_calculated",'alt' => $this->_tpl_vars['mod_strings']['LBL_CALCULATED'],'ext' => ".png",'other_attributes' => ''), $this);?>

                <?php endif; ?>
                <?php if (isset ( $this->_tpl_vars['field_defs'][$this->_tpl_vars['key']]['dependency'] ) && $this->_tpl_vars['field_defs'][$this->_tpl_vars['key']]['dependency']): ?>
                    <?php echo smarty_function_sugar_getimage(array('name' => "SugarLogic/icon_dependent",'alt' => $this->_tpl_vars['mod_strings']['LBL_DEPENDANT'],'ext' => ".png",'other_attributes' => ''), $this);?>

                <?php endif; ?>
                                <img src="<?php echo smarty_function_sugar_getimagepath(array('file' => 'edit_inline.gif'), $this);?>
" style="cursor: pointer;"
				onclick="var value_label = document.getElementById('subslot<?php echo $this->_tpl_vars['modCounter']; ?>
label').innerHTML.replace(/^\s+|\s+$/g,''); 
				    <?php if (! ( ((is_array($_tmp=$this->_tpl_vars['view'])) ? $this->_run_mod_handler('substr', true, $_tmp, -6) : substr($_tmp, -6)) == 'search' )): ?>
					var value_width = document.getElementById('subslot<?php echo $this->_tpl_vars['modCounter']; ?>
width').innerHTML;
					<?php endif; ?>
					ModuleBuilder.getContent('module=ModuleBuilder&action=editProperty&view_module=<?php echo ((is_array($_tmp=$this->_tpl_vars['view_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'+
							'<?php if (isset ( $this->_tpl_vars['subpanel'] )): ?>&subpanel=<?php echo ((is_array($_tmp=$this->_tpl_vars['subpanel'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
<?php endif; ?>'+
							'<?php if ($this->_tpl_vars['MB']): ?>&MB=<?php echo ((is_array($_tmp=$this->_tpl_vars['MB'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&view_package=<?php echo ((is_array($_tmp=$this->_tpl_vars['view_package'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
<?php endif; ?>'+
							'&id_label=subslot<?php echo $this->_tpl_vars['modCounter']; ?>
label'+
							'&name_label=label_'+
							  '<?php if (isset ( $this->_tpl_vars['value']['label'] )): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['label'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'+
							  '<?php elseif (! empty ( $this->_tpl_vars['value']['vname'] )): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['value']['vname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'+
							  '<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
<?php endif; ?>'+
							'&title_label=<?php echo $this->_tpl_vars['MOD']['LBL_LABEL_TITLE']; ?>
&value_label=' + encodeURIComponent(value_label)
							<?php if (( ((is_array($_tmp=$this->_tpl_vars['view'])) ? $this->_run_mod_handler('substr', true, $_tmp, -6) : substr($_tmp, -6)) != 'search' )): ?>
							+ '&id_width=subslot<?php echo $this->_tpl_vars['modCounter']; ?>
width&name_width=<?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_WIDTH'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&value_width=' + encodeURIComponent(value_width)
							<?php endif; ?>
					);"
				>
            </td>
            </tr>
            <tr class='fieldValue'>
                <?php if (empty ( $this->_tpl_vars['hideKeys'] )): ?><td>[<?php echo $this->_tpl_vars['key']; ?>
]</td><?php endif; ?>
                <td align="right" colspan="2" class="percentage">
					<?php if (((is_array($_tmp=$this->_tpl_vars['view'])) ? $this->_run_mod_handler('substr', true, $_tmp, -6) : substr($_tmp, -6)) == 'search'): ?>
					<span style="display:none" id='subslot<?php echo $this->_tpl_vars['modCounter']; ?>
width'><?php echo $this->_tpl_vars['value']['width']; ?>
</span>	<span style="display:none">%</span>
					<?php else: ?>
					<span id='subslot<?php echo $this->_tpl_vars['modCounter']; ?>
width'><?php echo $this->_tpl_vars['value']['width']; ?>
</span> <span>%</span>
					<?php endif; ?>
				</td>
        </tr>
    </table>
</li>

<script>
studiotabs.tabLabelToValue['<?php echo $this->_tpl_vars['value']['label']; ?>
|<?php echo $this->_tpl_vars['key']; ?>
'] = '<?php echo $this->_tpl_vars['key']; ?>
';
if(typeof(studiotabs.subtabModules['subslot<?php echo $this->_tpl_vars['modCounter']; ?>
']) == 'undefined')studiotabs.subtabModules['subslot<?php echo $this->_tpl_vars['modCounter']; ?>
'] = '<?php echo $this->_tpl_vars['value']['label']; ?>
|<?php echo $this->_tpl_vars['key']; ?>
';
</script>

<?php echo smarty_function_counter(array('name' => 'modCounter'), $this);?>

<?php endforeach; endif; unset($_from); ?>

<li id='topslot<?php echo $this->_tpl_vars['slotCounter']; ?>
' class='noBullet'>&nbsp;</li>

</ul>
</td>

<?php echo smarty_function_counter(array('name' => 'slotCounter'), $this);?>

<?php endforeach; endif; unset($_from); ?>
</td>
</tr></table>

<script>

<?php echo '
function dragDropInit(){
    studiotabs.fields = {};
    studiotabs.slotCount = '; ?>
<?php echo $this->_tpl_vars['slotCounter']; ?>
;
    studiotabs.modCount = <?php echo $this->_tpl_vars['modCounter']; ?>
;
    <?php echo '
    for(msi = 0; msi < studiotabs.slotCount ; msi++){
        studiotabs.fields["topslot"+ msi] = new Studio2.ListDD("topslot" + msi, "subTabs", true);
    }
    for(msi = 0; msi < studiotabs.modCount ; msi++){
            studiotabs.fields["subslot"+ msi] = new Studio2.ListDD("subslot" + msi, "subTabs", false);
    }

    if(studiotabs.modCount > 0) {
        studiotabs.fields["subslot" + (msi - 1)].updateTabs();
    }
};

resizeDDLists = function() {
	var Dom = YAHOO.util.Dom;
	if (!Dom.get(\'ul0\'))
            return;
    var body = document.getElementById(\'mbtabs\');
    for(var msi = 0; msi < studiotabs.slotCount ; msi++){
        var targetHeight =  body.offsetHeight - (Dom.getY("ul" + msi) - Dom.getY(body)) - 20;
        if (SUGAR.isIE) {
            targetHeight -= 10;
        }

        if (targetHeight > 0 )
        	Dom.setStyle("ul" + msi, "height", targetHeight + "px");
    }
	Studio2.scrollZones = {}
	for (var i = 0; Dom.get("ul" + i); i++){
		Studio2.scrollZones["ul" + i] = Studio2.getScrollZones("ul" + i);
	}
};

function countListFields() {
	var count = 0;
	var divs = document.getElementById( \'ul0\' ).getElementsByTagName( \'li\' ) ;		
	for ( var j=0;j<divs.length;j++) {
		if (divs[j].className == \'draggable\') count++;
	}
	return count;
};

'; ?>

dragDropInit();
setTimeout(resizeDDLists, 100);
ModuleBuilder.helpRegister('edittabs');
ModuleBuilder.helpRegisterByID('content', 'div');
studiotabs.view = '<?php echo $this->_tpl_vars['view']; ?>
';
ModuleBuilder.helpSetup('<?php echo $this->_tpl_vars['helpName']; ?>
', '<?php echo $this->_tpl_vars['helpDefault']; ?>
');
if('<?php echo $this->_tpl_vars['from_mb']; ?>
')
    ModuleBuilder.helpUnregisterByID('savebtn');
ModuleBuilder.MBpackage = '<?php echo $this->_tpl_vars['view_package']; ?>
';
</script>



<div id='logDiv' style='display:none'>
</div>

<?php echo $this->_tpl_vars['additionalFormData']; ?>


</form>

