<?php /* Smarty version 2.6.29, created on 2016-08-23 14:14:53
         compiled from themes/SuiteR_HANDALM/tpls/header.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/SuiteR_HANDALM/tpls/_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body onMouseOut="closeMenus();">
<?php echo $this->_tpl_vars['DCSCRIPT']; ?>

<?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
    <div id="ajaxHeader">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "custom/themes/SuiteR_HANDALM/tpls/_headerModuleList.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
<?php endif; ?>
<?php echo '
    <iframe id=\'ajaxUI-history-iframe\' src=\'index.php?entryPoint=getImage&imageName=blank.png\' title=\'empty\' style=\'display:none\'></iframe>
    <input id=\'ajaxUI-history-field\' type=\'hidden\'>
    <script type=\'text/javascript\'>
        if (SUGAR.ajaxUI && !SUGAR.ajaxUI.hist_loaded) {
            YAHOO.util.History.register(\'ajaxUILoc\', "", SUGAR.ajaxUI.go);
            '; ?>
<?php if ($_REQUEST['module'] != 'ModuleBuilder'): ?>            YAHOO.util.History.initialize("ajaxUI-history-field", "ajaxUI-history-iframe");
            <?php endif; ?><?php echo '
        }
    </script>
'; ?>

<!-- Start of page content -->
<?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
    <div id="bootstrap-container"  class="<?php if ($this->_tpl_vars['THEME_CONFIG']['display_sidebar'] && $_COOKIE['sidebartoggle'] != 'collapsed'): ?>col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2<?php endif; ?> main">
        <div id="content">
            <div id="pagecontent">
<?php endif; ?>