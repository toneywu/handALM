<?php /* Smarty version 2.6.29, created on 2016-08-21 10:55:28
         compiled from include/EditView/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_button', 'include/EditView/footer.tpl', 55, false),array('function', 'sugar_action_menu', 'include/EditView/footer.tpl', 64, false),)), $this); ?>
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
<?php if (empty ( $this->_tpl_vars['form']['button_location'] ) || $this->_tpl_vars['form']['button_location'] == 'bottom'): ?>
<div class="buttons">
<?php if (! empty ( $this->_tpl_vars['form'] ) && ! empty ( $this->_tpl_vars['form']['buttons'] )): ?>
   <?php $_from = $this->_tpl_vars['form']['buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['button']):
?>
      <?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => ($this->_tpl_vars['button']),'form_id' => ($this->_tpl_vars['form_id']),'view' => ($this->_tpl_vars['view']),'appendTo' => 'footer_buttons','location' => 'FOOTER'), $this);?>

   <?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'SAVE','view' => ($this->_tpl_vars['view']),'form_id' => ($this->_tpl_vars['form_id']),'location' => 'FOOTER','appendTo' => 'footer_buttons'), $this);?>

<?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'CANCEL','view' => ($this->_tpl_vars['view']),'form_id' => ($this->_tpl_vars['form_id']),'location' => 'FOOTER','appendTo' => 'footer_buttons'), $this);?>

<?php endif; ?>
<?php if (empty ( $this->_tpl_vars['form']['hideAudit'] ) || ! $this->_tpl_vars['form']['hideAudit']): ?>
<?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'Audit','view' => ($this->_tpl_vars['view']),'form_id' => ($this->_tpl_vars['form_id']),'appendTo' => 'footer_buttons'), $this);?>

<?php endif; ?>
<?php echo smarty_function_sugar_action_menu(array('buttons' => $this->_tpl_vars['footer_buttons'],'class' => 'fancymenu','flat' => true), $this);?>

</div>
<?php endif; ?>
</form>
<?php if ($this->_tpl_vars['externalJSFile']): ?>
{sugar_include include=$externalJSFile}
<?php endif; ?>

{$set_focus_block}

<?php if (isset ( $this->_tpl_vars['scriptBlocks'] )): ?>
<!-- Begin Meta-Data Javascript -->
<?php echo $this->_tpl_vars['scriptBlocks']; ?>

<!-- End Meta-Data Javascript -->
<?php endif; ?>
<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
        function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script>