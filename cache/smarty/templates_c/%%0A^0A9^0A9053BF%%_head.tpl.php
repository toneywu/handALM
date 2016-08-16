<?php /* Smarty version 2.6.29, created on 2016-08-14 21:20:13
         compiled from themes/SuiteR_HANDALM/tpls/_head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getimagepath', 'themes/SuiteR_HANDALM/tpls/_head.tpl', 63, false),array('function', 'sugar_getjspath', 'themes/SuiteR_HANDALM/tpls/_head.tpl', 74, false),)), $this); ?>
<!DOCTYPE html>
<html <?php echo $this->_tpl_vars['langHeader']; ?>
>
<head>
    <link rel="SHORTCUT ICON" href="<?php echo $this->_tpl_vars['FAVICON_URL']; ?>
">
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['APP']['LBL_CHARSET']; ?>
">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <!-- Bootstrap -->
    <link href="themes/SuiteR/css/bootstrap.min.css" rel="stylesheet">
    <link href="themes/SuiteR/css/footable.core.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
    <title><?php echo $this->_tpl_vars['APP']['LBL_BROWSER_TITLE']; ?>
</title>
    <?php echo $this->_tpl_vars['SUGAR_JS']; ?>

    <?php echo '
    <script type="text/javascript">
        <!--
        SUGAR.themes.theme_name      = \''; ?>
<?php echo $this->_tpl_vars['THEME']; ?>
<?php echo '\';
        SUGAR.themes.theme_ie6compat = \''; ?>
<?php echo $this->_tpl_vars['THEME_IE6COMPAT']; ?>
<?php echo '\';
        SUGAR.themes.hide_image      = \''; ?>
<?php echo smarty_function_sugar_getimagepath(array('file' => "hide.gif"), $this);?>
<?php echo '\';
        SUGAR.themes.show_image      = \''; ?>
<?php echo smarty_function_sugar_getimagepath(array('file' => "show.gif"), $this);?>
<?php echo '\';
        SUGAR.themes.loading_image   = \''; ?>
<?php echo smarty_function_sugar_getimagepath(array('file' => "img_loading.gif"), $this);?>
<?php echo '\';
        SUGAR.themes.allThemes       = eval('; ?>
<?php echo $this->_tpl_vars['allThemes']; ?>
<?php echo ');
        if ( YAHOO.env.ua )
            UA = YAHOO.env.ua;
        -->
    </script>
    '; ?>

    <?php echo $this->_tpl_vars['SUGAR_CSS']; ?>

    <link rel="stylesheet" type="text/css" href="themes/SuiteR/css/colourSelector.php">
    <script type="text/javascript" src='<?php echo smarty_function_sugar_getjspath(array('file' => "themes/SuiteR/js/jscolor.js"), $this);?>
'></script>
    <script type="text/javascript" src='<?php echo smarty_function_sugar_getjspath(array('file' => "cache/include/javascript/sugar_field_grp.js"), $this);?>
'></script>
</head>