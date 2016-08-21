<?php /* Smarty version 2.6.29, created on 2016-08-21 10:58:44
         compiled from include/SugarFields/Fields/Base/ListView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_fetch', 'include/SugarFields/Fields/Base/ListView.tpl', 42, false),)), $this); ?>

<?php echo smarty_function_sugar_fetch(array('object' => $this->_tpl_vars['parentFieldArray'],'key' => $this->_tpl_vars['col']), $this);?>
