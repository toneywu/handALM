<?php /* Smarty version 2.6.29, created on 2016-08-21 10:55:27
         compiled from include/SugarFields/Fields/Enum/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Enum/EditView.tpl', 43, false),)), $this); ?>
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

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
	<select name="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>" 
	id="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>" 
	title='<?php echo $this->_tpl_vars['vardef']['help']; ?>
' <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php endif; ?>
    <?php if (! empty ( $this->_tpl_vars['displayParams']['accesskey'] )): ?> accesskey='<?php echo $this->_tpl_vars['displayParams']['accesskey']; ?>
' <?php endif; ?>  <?php echo $this->_tpl_vars['displayParams']['field']; ?>

	<?php if (isset ( $this->_tpl_vars['displayParams']['javascript'] )): ?><?php echo $this->_tpl_vars['displayParams']['javascript']; ?>
<?php endif; ?>>

	{if isset(<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
) && <?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
 != ''}
		{html_options options=<?php echo smarty_function_sugarvar(array('key' => 'options','string' => true), $this);?>
 selected=<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
}
	{else}
		{html_options options=<?php echo smarty_function_sugarvar(array('key' => 'options','string' => true), $this);?>
 selected=<?php echo smarty_function_sugarvar(array('key' => 'default','string' => true), $this);?>
}
	{/if}
	</select>
{else}
	{assign var="field_options" value=<?php echo smarty_function_sugarvar(array('key' => 'options','string' => 'true'), $this);?>
 }
	{capture name="field_val"}<?php echo smarty_function_sugarvar(array('key' => 'value'), $this);?>
{/capture}
	{assign var="field_val" value=$smarty.capture.field_val}
	{capture name="ac_key"}<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
{/capture}
	{assign var="ac_key" value=$smarty.capture.ac_key}

	<?php if (empty ( $this->_tpl_vars['vardef']['autocomplete_ajax'] )): ?>
		<select style='display:none' name="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>" 
		id="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>" 
		title='<?php echo $this->_tpl_vars['vardef']['help']; ?>
' <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php endif; ?>
        <?php if (! empty ( $this->_tpl_vars['displayParams']['accesskey'] )): ?> accesskey='<?php echo $this->_tpl_vars['displayParams']['accesskey']; ?>
' <?php endif; ?> <?php echo $this->_tpl_vars['displayParams']['field']; ?>

		<?php if (isset ( $this->_tpl_vars['displayParams']['javascript'] )): ?><?php echo $this->_tpl_vars['displayParams']['javascript']; ?>
<?php endif; ?>>

		{if isset(<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
) && <?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
 != ''}
			{html_options options=<?php echo smarty_function_sugarvar(array('key' => 'options','string' => true), $this);?>
 selected=<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
}
		{else}
			{html_options options=<?php echo smarty_function_sugarvar(array('key' => 'options','string' => true), $this);?>
 selected=<?php echo smarty_function_sugarvar(array('key' => 'default','string' => true), $this);?>
}
		{/if}
		</select>
	<?php else: ?>
		<input type="hidden"
		    id="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>"
		    name="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>"
		    value="<?php echo smarty_function_sugarvar(array('key' => 'value'), $this);?>
">
	<?php endif; ?>

	<input
		id="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>-input"
		name="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>-input"
		size="30"
		value="{$field_val|lookup:$field_options}"
		type="text" style="vertical-align: top;">

		
	<span class="id-ff multiple">
	    <button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>-image"></button><button type="button"
	        id="btn-clear-<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>-input"
	        title="Clear"
	        onclick="SUGAR.clearRelateField(this.form, '<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>-input', '<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>');sync_<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
	</span>

	{literal}
	<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

	<?php if (empty ( $this->_tpl_vars['vardef']['autocomplete_ajax'] )): ?>
		{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>{literal}");
			
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
			var options = SUGAR.AutoComplete.getOptionsArray("<?php echo $this->_tpl_vars['vardef']['autocomplete_options']; ?>
");

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
	<?php else: ?>
		{literal}
		// Create a new YUI instance and populate it with the required modules.
		YUI().use('datasource', 'datasource-jsonschema',function (Y) {
			// DataSource is available and ready for use.
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Get({
				source: 'index.php?module=Accounts&action=ajaxautocomplete&to_pdf=1'
			});
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds.plug(Y.Plugin.DataSourceJSONSchema, {
				schema: {
					resultListLocator: "option_items",
					resultFields: ["text", "key"],
					matchKey: "text",
				}
			});
		});
		{/literal}
	<?php endif; ?>

	{literal}
		YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
	{/literal}
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>');
	
	<?php if (empty ( $this->_tpl_vars['vardef']['autocomplete_ajax'] )): ?>
		{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>{literal}");
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
			sync_{/literal}<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>{literal}", syncFromHiddenToWidget);
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
	<?php else: ?>
		{literal}
		function SyncToHidden(e){
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', e);
		}
		{/literal}
		
		SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
		SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
	<?php endif; ?>
	
	SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
	
	{literal}
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
		activateFirstItem: true,
		{/literal}
		minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
		queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
		zIndex: 99999,

		<?php if (! empty ( $this->_tpl_vars['vardef']['autocomplete_ajax'] )): ?>
				requestTemplate: '&options=<?php echo $this->_tpl_vars['vardef']['autocomplete_options']; ?>
&q={literal}{query}{/literal}',
		<?php endif; ?>
		
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

	<?php if (empty ( $this->_tpl_vars['vardef']['autocomplete_ajax'] )): ?>
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
			var selectElem = document.getElementById("{/literal}<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?><?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['displayParams']['idName']; ?>
<?php endif; ?>{literal}");
			//if typed value is a valid option, do nothing
			for (i=0;i<selectElem.options.length;i++)
				if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
					return;
			
			//typed value is invalid, so set the text and the hidden to blank
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
			SyncToHidden(select_defaults[selectElem.id].key);
		});
	<?php else: ?>		
		// when they focus away from the field...
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
			if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value') != '') { // value entered
				if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.get('value') == '') { // none selected, we clear their text and hide
					SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', '');
				}
				else{ // they have something selected, we accept their selection and contract
				}
			}
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
		});
	<?php endif; ?>

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