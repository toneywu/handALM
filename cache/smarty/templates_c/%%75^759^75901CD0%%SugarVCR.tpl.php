<?php /* Smarty version 2.6.29, created on 2016-08-21 10:55:27
         compiled from include/EditView/SugarVCR.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getimage', 'include/EditView/SugarVCR.tpl', 53, false),)), $this); ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td nowrap class="paginationWrapper">
            <?php if (! empty ( $this->_tpl_vars['list_link'] )): ?>
            <button type="button" id="save_and_continue" class="button" title="<?php echo $this->_tpl_vars['app_strings']['LBL_SAVE_AND_CONTINUE']; ?>
" onClick="this.form.action.value='Save';if(check_form('EditView')){sendAndRedirect('EditView', '<?php echo $this->_tpl_vars['app_strings']['LBL_SAVING']; ?>
 <?php echo $this->_tpl_vars['module']; ?>
...', '<?php echo $this->_tpl_vars['list_link']; ?>
');}">
                <?php echo $this->_tpl_vars['app_strings']['LBL_SAVE_AND_CONTINUE']; ?>

            </button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <?php endif; ?>
            <span class="pagination">
                <?php if (! empty ( $this->_tpl_vars['previous_link'] )): ?>
                <button type="button" class="button" title="<?php echo $this->_tpl_vars['app_strings']['LNK_LIST_PREVIOUS']; ?>
" onClick="document.location.href='<?php echo $this->_tpl_vars['previous_link']; ?>
';">
                    <?php echo smarty_function_sugar_getimage(array('name' => 'previous','attr' => "border=\"0\" align=\"absmiddle\"",'ext' => ".gif",'alt' => $this->_tpl_vars['app_strings']['LNK_LIST_PREVIOUS']), $this);?>

                </button>
                <?php else: ?>
                <button type="button" class="button" title="<?php echo $this->_tpl_vars['app_strings']['LNK_LIST_PREVIOUS']; ?>
" disabled='true'>
                    <?php echo smarty_function_sugar_getimage(array('name' => 'previous_off','attr' => "border=\"0\" align=\"absmiddle\"",'ext' => ".gif",'alt' => $this->_tpl_vars['app_strings']['LNK_LIST_PREVIOUS']), $this);?>

                </button>
                <?php endif; ?>
                &nbsp;&nbsp;
                (<?php echo $this->_tpl_vars['offset']; ?>
<?php if (! empty ( $this->_tpl_vars['total'] )): ?> <?php echo $this->_tpl_vars['app_strings']['LBL_LIST_OF']; ?>
 <?php echo $this->_tpl_vars['total']; ?>
<?php echo $this->_tpl_vars['plus']; ?>
<?php endif; ?>)
                &nbsp;&nbsp;
                <?php if (! empty ( $this->_tpl_vars['next_link'] )): ?>
                <button type="button" class="button" title="<?php echo $this->_tpl_vars['app_strings']['LNK_LIST_NEXT']; ?>
" onClick="document.location.href='<?php echo $this->_tpl_vars['next_link']; ?>
';">
                    <?php echo smarty_function_sugar_getimage(array('name' => 'next','attr' => "border=\"0\" align=\"absmiddle\"",'ext' => ".gif",'alt' => $this->_tpl_vars['app_strings']['LNK_LIST_NEXT']), $this);?>

                </button>
                <?php else: ?>
                <button type="button" class="button" title="<?php echo $this->_tpl_vars['app_strings']['LNK_LIST_NEXT']; ?>
" disabled="true">
                    <?php echo smarty_function_sugar_getimage(array('name' => 'next_off','attr' => "border=\"0\" align=\"absmiddle\"",'ext' => ".gif",'alt' => $this->_tpl_vars['app_strings']['LNK_LIST_NEXT']), $this);?>

                </button>
                <?php endif; ?>
            </span>
            &nbsp;&nbsp;
        </td>
    </tr>
</table>