<?php /* Smarty version 2.6.29, created on 2016-08-14 21:20:13
         compiled from custom/themes/SuiteR_HANDALM/tpls/_headerModuleList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_link', 'custom/themes/SuiteR_HANDALM/tpls/_headerModuleList.tpl', 53, false),)), $this); ?>
<!--Start Responsive Top Navigation Menu -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><!-- <?php echo $this->_tpl_vars['APP']['LBL_BROWSER_TITLE']; ?>
 --><i class="glyphicon glyphicon-home"></i></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile_menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div id="mobileheader">
                <div id="modulelinks" style="display:none">
                    <?php $_from = $this->_tpl_vars['moduleTopMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
        $this->_foreach['moduleList']['iteration']++;
?>
                        <?php if ($this->_tpl_vars['name'] == $this->_tpl_vars['MODULE_TAB']): ?>
                            <span class="modulename" data-toggle="dropdown" aria-expanded="false"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module']), $this);?>
</span>
                            <?php if ($this->_tpl_vars['name'] != 'Home'): ?>
                                <ul class="dropdown-menu" role="menu">
                                    <?php if (count ( $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']] ) > 0): ?>
                                        <?php $_from = $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                            <?php if ($this->_tpl_vars['item']['URL'] == "-"): ?>
                                                <li><a></a><span>&nbsp;</span></li>
                                            <?php else: ?>
                                                <li><a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
"><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</a></li>
                                            <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
                <form id="searchmobile" onsubmit="return SUGAR.unifiedSearchAdvanced.checkUsaAdvanced()" action="index.php" name="UnifiedSearch">
                    <input class="form-control" type="hidden" value="UnifiedSearch" name="action">
                    <input class="form-control" type="hidden" value="Home" name="module">
                    <input class="form-control" type="hidden" value="false" name="search_form">
                    <input class="form-control" type="hidden" value="false" name="advanced">
                <span class="input-group-btn">
                    <input id="query_string" class="form-control" type="text" placeholder="Search..." name="query_string">
                </span>
                </form>
                <div id="mobilegloballinks">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-option-vertical"></span></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <?php $_from = $this->_tpl_vars['GCLS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['gcl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gcl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gcl_key'] => $this->_tpl_vars['GCL']):
        $this->_foreach['gcl']['iteration']++;
?>
                            <li role="presentation">
                                <a id="<?php echo $this->_tpl_vars['gcl_key']; ?>
_link" href="<?php echo $this->_tpl_vars['GCL']['URL']; ?>
"<?php if (! empty ( $this->_tpl_vars['GCL']['ONCLICK'] )): ?> onclick="<?php echo $this->_tpl_vars['GCL']['ONCLICK']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['GCL']['LABEL']; ?>
</a>
                            </li>
                        <?php endforeach; endif; unset($_from); ?>
                        <li role="presentation"><a role="menuitem" id="logout_link" href='<?php echo $this->_tpl_vars['LOGOUT_LINK']; ?>
' class='utilsLink'><?php echo $this->_tpl_vars['LOGOUT_LABEL']; ?>
</a></li>
                    </ul>
                </div>
                <div id="userlinks_head" class="navbar-toggle collapsed">
                    <a href="javascript:void(0)" id="userlinks_togglemobilesearch"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                </div>
            </div>
        </div>
        <div class="hidden-xs hidden-sm" id="bs-example-navbar-collapse-1">
            <?php if ($this->_tpl_vars['USE_GROUP_TABS']): ?>
                <ul class="nav navbar-nav">
                    <?php $this->assign('groupSelected', false); ?>
                    <?php $_from = $this->_tpl_vars['moduleTopMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
        $this->_foreach['moduleList']['iteration']++;
?>
                        <?php if ($this->_tpl_vars['name'] == $this->_tpl_vars['MODULE_TAB']): ?>
                            <li class="topnav">
                                <?php if ($this->_tpl_vars['name'] != 'Home'): ?>
                                    <span class="currentTabLeft">&nbsp;</span>
                                    <span class="currentTab" style="color:#ffffff !important;"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module']), $this);?>
</span><span>&nbsp;</span>
                                <?php endif; ?>
                                <ul class="dropdown-menu" role="menu">
                                    <?php if (count ( $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']] ) > 0): ?>
                                        <h3 class="home_h3"><?php echo $this->_tpl_vars['APP']['LBL_LINK_ACTIONS']; ?>
</h3>
                                        <?php $_from = $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                            <?php if ($this->_tpl_vars['item']['URL'] == "-"): ?>
                                                <li><a></a><span>&nbsp;</span></li>
                                            <?php else: ?>
                                                <li><a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
"><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</a></li>
                                            <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                    <?php endif; ?>
                                    <h3 class="recent_h3"><?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
</h3>
                                    <?php $_from = $this->_tpl_vars['recentRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastViewed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastViewed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['lastViewed']['iteration']++;
?>
                                        <?php if ($this->_tpl_vars['item']['module_name'] == $this->_tpl_vars['name']): ?>
                                            <div class="recently_viewed_link_container">
                                                <li class="recentlinks_topedit">
                                                    <a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'EditView','record' => $this->_tpl_vars['item']['item_id'],'link_only' => 1), $this);?>
" style="margin-left:10px;"><span class=" glyphicon glyphicon-pencil" aria-hidden="true"></a>
                                                </li>
                                                <li class="recentlinks_top" role="presentation">
                                                    <a title="<?php echo $this->_tpl_vars['item']['module_name']; ?>
" accessKey="<?php echo $this->_foreach['lastViewed']['iteration']; ?>
" href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['item_id'],'link_only' => 1), $this);?>
"><?php echo $this->_tpl_vars['item']['item_summary_short']; ?>
</a>
                                                </li>
                                            </div>
                                        <?php endif; ?>
                                        <?php endforeach; else: ?>
                                        <?php echo $this->_tpl_vars['APP']['NTC_NO_ITEMS_DISPLAY']; ?>

                                    <?php endif; unset($_from); ?>
                                    <h3 class="recent_h3"><?php echo $this->_tpl_vars['APP']['LBL_FAVORITES']; ?>
</h3>
                                    <?php $_from = $this->_tpl_vars['favoriteRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastViewed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastViewed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['lastViewed']['iteration']++;
?>
                                        <?php if ($this->_tpl_vars['item']['module_name'] == $this->_tpl_vars['name']): ?>
                                            <div class="recently_viewed_link_container">
                                                <li class="recentlinks_topedit">
                                                    <a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'EditView','record' => $this->_tpl_vars['item']['id'],'link_only' => 1), $this);?>
" style="margin-left:10px;"><span class=" glyphicon glyphicon-pencil" aria-hidden="true"></a>
                                                </li>
                                                <li class="recentlinks_top" role="presentation">
                                                    <a title="<?php echo $this->_tpl_vars['item']['module_name']; ?>
" accessKey="<?php echo $this->_foreach['lastViewed']['iteration']; ?>
" href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['id'],'link_only' => 1), $this);?>
"><?php echo $this->_tpl_vars['item']['item_summary_short']; ?>
</a>
                                                </li>
                                            </div>
                                        <?php endif; ?>
                                        <?php endforeach; else: ?>
                                        <?php echo $this->_tpl_vars['APP']['NTC_NO_ITEMS_DISPLAY']; ?>

                                    <?php endif; unset($_from); ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php $_from = $this->_tpl_vars['groupTabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['groupList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['groupList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group'] => $this->_tpl_vars['modules']):
        $this->_foreach['groupList']['iteration']++;
?>
                        <?php ob_start(); ?>parentTab=<?php echo $this->_tpl_vars['group']; ?>
<?php $this->_smarty_vars['capture']['extraparams'] = ob_get_contents();  $this->assign('extraparams', ob_get_contents());ob_end_clean(); ?>
                        <li class="topnav">
                            <span class="notCurrentTabLeft">&nbsp;</span><span class="notCurrentTab">
                            <a href="#" id="grouptab_<?php echo ($this->_foreach['groupList']['iteration']-1); ?>
" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->_tpl_vars['group']; ?>
</a>
                            <span class="notCurrentTabRight">&nbsp;</span>
                            <ul role="menu" <?php if (($this->_foreach['groupList']['iteration'] == $this->_foreach['groupList']['total'])): ?> class="dropdown-menu All"<?php else: ?> class="dropdown-menu" <?php endif; ?>>
                                <?php $_from = $this->_tpl_vars['modules']['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['modulekey'] => $this->_tpl_vars['module']):
?>
                                    <li>
                                        <?php ob_start(); ?>moduleTab_<?php echo ($this->_foreach['moduleList']['iteration']-1); ?>
_<?php echo $this->_tpl_vars['module']; ?>
<?php $this->_smarty_vars['capture']['moduleTabId'] = ob_get_contents();  $this->assign('moduleTabId', ob_get_contents());ob_end_clean(); ?>
                                        <?php echo smarty_function_sugar_link(array('id' => $this->_tpl_vars['moduleTabId'],'module' => $this->_tpl_vars['modulekey'],'data' => $this->_tpl_vars['module'],'extraparams' => $this->_tpl_vars['extraparams']), $this);?>

                                    </li>
                                <?php endforeach; endif; unset($_from); ?>
                                <?php $_from = $this->_tpl_vars['modules']['extra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submodule'] => $this->_tpl_vars['submodulename']):
?>
                                    <li><a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['submodule'],'link_only' => 1,'extraparams' => $this->_tpl_vars['extraparams']), $this);?>
"><?php echo $this->_tpl_vars['submodulename']; ?>
</a></li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                        </li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
            <?php else: ?>
                <ul class="nav navbar-nav">
                    <?php $_from = $this->_tpl_vars['moduleTopMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
        $this->_foreach['moduleList']['iteration']++;
?>
                        <?php if ($this->_tpl_vars['name'] == $this->_tpl_vars['MODULE_TAB']): ?>
                            <li class="topnav">
                                <?php if ($this->_tpl_vars['name'] != 'Home'): ?>
                                    <span class="currentTabLeft">&nbsp;</span>
                                    <span class="dropdown-toggle headerlinks currentTab"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module']), $this);?>
</span><span>&nbsp;</span>
                                <?php endif; ?>
                                <ul class="dropdown-menu" role="menu">
                                    <?php if (count ( $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']] ) > 0): ?>
                                        <h3 class="home_h3"><?php echo $this->_tpl_vars['APP']['LBL_LINK_ACTIONS']; ?>
</h3>
                                        <?php $_from = $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                            <?php if ($this->_tpl_vars['item']['URL'] == "-"): ?>
                                                <li><a></a><span>&nbsp;</span></li>
                                            <?php else: ?>
                                                <li><a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
" class=""><span><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</span></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                    <?php endif; ?>
                                    <h3 class="recent_h3"><?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
</h3>
                                    <?php $_from = $this->_tpl_vars['recentRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastViewed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastViewed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['lastViewed']['iteration']++;
?>
                                        <?php if ($this->_tpl_vars['item']['module_name'] == $this->_tpl_vars['name']): ?>
                                            <div class="recently_viewed_link_container">
                                                <li class="recentlinks_topedit"><a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'EditView','record' => $this->_tpl_vars['item']['item_id'],'link_only' => 1), $this);?>
" style="margin-left:10px;"><span class=" glyphicon glyphicon-pencil" aria-hidden="true"></a></li>
                                                <li class="recentlinks_top" role="presentation">
                                                    <a title="<?php echo $this->_tpl_vars['item']['module_name']; ?>
"
                                                       accessKey="<?php echo $this->_foreach['lastViewed']['iteration']; ?>
"
                                                       href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['item_id'],'link_only' => 1), $this);?>
">
                                                        <?php echo $this->_tpl_vars['item']['item_summary_short']; ?>

                                                    </a>
                                                </li>
                                            </div>
                                        <?php endif; ?>
                                        <?php endforeach; else: ?>
                                        <?php echo $this->_tpl_vars['APP']['NTC_NO_ITEMS_DISPLAY']; ?>

                                    <?php endif; unset($_from); ?>
                                    <h3 class="recent_h3"><?php echo $this->_tpl_vars['APP']['LBL_FAVORITES']; ?>
</h3>
                                    <?php $_from = $this->_tpl_vars['favoriteRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastViewed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastViewed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['lastViewed']['iteration']++;
?>
                                        <?php if ($this->_tpl_vars['item']['module_name'] == $this->_tpl_vars['name']): ?>
                                            <div class="recently_viewed_link_container">
                                                <li class="recentlinks_topedit">
                                                    <a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'EditView','record' => $this->_tpl_vars['item']['id'],'link_only' => 1), $this);?>
" style="margin-left:10px;"><span class=" glyphicon glyphicon-pencil" aria-hidden="true"></a>
                                                </li>
                                                <li class="recentlinks_top" role="presentation">
                                                    <a title="<?php echo $this->_tpl_vars['item']['module_name']; ?>
" accessKey="<?php echo $this->_foreach['lastViewed']['iteration']; ?>
" href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['id'],'link_only' => 1), $this);?>
"><?php echo $this->_tpl_vars['item']['item_summary_short']; ?>
</a>
                                                </li>
                                            </div>
                                        <?php endif; ?>
                                        <?php endforeach; else: ?>
                                        <?php echo $this->_tpl_vars['APP']['NTC_NO_ITEMS_DISPLAY']; ?>

                                    <?php endif; unset($_from); ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="topnav">
                                <?php if ($this->_tpl_vars['name'] != 'Home'): ?>
                                    <span class="notCurrentTabLeft">&nbsp;</span>
                                    <span class="dropdown-toggle headerlinks notCurrentTab"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module']), $this);?>
</span><span class="notCurrentTabRight">&nbsp;</span>
                                <?php endif; ?>
                                <ul class="dropdown-menu" role="menu">
                                    <?php if (count ( $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']] ) > 0): ?>
                                        <h3 class="home_h3"><?php echo $this->_tpl_vars['APP']['LBL_LINK_ACTIONS']; ?>
</h3>
                                        <?php $_from = $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                            <?php if ($this->_tpl_vars['item']['URL'] == "-"): ?>
                                                <li><a></a><span>&nbsp;</span></li>
                                            <?php else: ?>
                                                <li><a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
"><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</a></li>
                                            <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                    <?php endif; ?>
                                    <h3 class="recent_h3"><?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
</h3>
                                    <?php $_from = $this->_tpl_vars['recentRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastViewed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastViewed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['lastViewed']['iteration']++;
?>
                                        <?php if ($this->_tpl_vars['item']['module_name'] == $this->_tpl_vars['name']): ?>
                                            <div class="recently_viewed_link_container">
                                                <li class="recentlinks_topedit"><a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'EditView','record' => $this->_tpl_vars['item']['item_id'],'link_only' => 1), $this);?>
" style="margin-left:10px;"><span class=" glyphicon glyphicon-pencil" aria-hidden="true"></a></li>
                                                <li class="recentlinks_top" role="presentation">
                                                    <a title="<?php echo $this->_tpl_vars['item']['module_name']; ?>
"
                                                       accessKey="<?php echo $this->_foreach['lastViewed']['iteration']; ?>
"
                                                       href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['item_id'],'link_only' => 1), $this);?>
">
                                                        <?php echo $this->_tpl_vars['item']['item_summary_short']; ?>

                                                    </a>
                                                </li>
                                            </div>
                                        <?php endif; ?>
                                        <?php endforeach; else: ?>
                                        <?php echo $this->_tpl_vars['APP']['NTC_NO_ITEMS_DISPLAY']; ?>

                                    <?php endif; unset($_from); ?>
                                    <h3 class="recent_h3"><?php echo $this->_tpl_vars['APP']['LBL_FAVORITES']; ?>
</h3>
                                    <?php $_from = $this->_tpl_vars['favoriteRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastViewed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastViewed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['lastViewed']['iteration']++;
?>
                                        <?php if ($this->_tpl_vars['item']['module_name'] == $this->_tpl_vars['name']): ?>
                                            <div class="recently_viewed_link_container">
                                                <li class="recentlinks_topedit">
                                                    <a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'EditView','record' => $this->_tpl_vars['item']['id'],'link_only' => 1), $this);?>
" style="margin-left:10px;"><span class=" glyphicon glyphicon-pencil" aria-hidden="true"></a>
                                                </li>
                                                <li class="recentlinks_top" role="presentation">
                                                    <a title="<?php echo $this->_tpl_vars['item']['module_name']; ?>
" accessKey="<?php echo $this->_foreach['lastViewed']['iteration']; ?>
" href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['id'],'link_only' => 1), $this);?>
"><?php echo $this->_tpl_vars['item']['item_summary_short']; ?>
</a>
                                                </li>
                                            </div>
                                        <?php endif; ?>
                                        <?php endforeach; else: ?>
                                        <?php echo $this->_tpl_vars['APP']['NTC_NO_ITEMS_DISPLAY']; ?>

                                    <?php endif; unset($_from); ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php if (count ( $this->_tpl_vars['moduleExtraMenu'] ) > 0): ?>
                        <li class="dropdown-toggle moremenu ">
                            <a class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->_tpl_vars['APP']['LBL_MORE']; ?>
 &raquo;</a>
                            <ul class="dropdown-menu" role="menu">
                                <div class="bigmenu">
                                    <?php $_from = $this->_tpl_vars['moduleExtraMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
        $this->_foreach['moduleList']['iteration']++;
?>
                                        <li><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module']), $this);?>
</li>
                                    <?php endforeach; endif; unset($_from); ?>
                                </div>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
            <div id="globalLinks" class="dropdown nav navbar-nav navbar-right">
                <li id="usermenu" class="dropdown-toggle" aria-expanded="true">
                    <a href='index.php?module=Users&action=EditView&record=<?php echo $this->_tpl_vars['CURRENT_USER_ID']; ?>
'><span class="glyphicon glyphicon-user"> </span> <?php echo $this->_tpl_vars['CURRENT_USER']; ?>

                        <span class="caret"></span>
                    </a>
                </li>
                <button id="usermenucollapsed" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="true">
                    <span class="glyphicon glyphicon-user"> </span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <?php $_from = $this->_tpl_vars['GCLS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['gcl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gcl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gcl_key'] => $this->_tpl_vars['GCL']):
        $this->_foreach['gcl']['iteration']++;
?>
                        <li role="presentation">
                            <a id="<?php echo $this->_tpl_vars['gcl_key']; ?>
_link" href="<?php echo $this->_tpl_vars['GCL']['URL']; ?>
"<?php if (! empty ( $this->_tpl_vars['GCL']['ONCLICK'] )): ?> onclick="<?php echo $this->_tpl_vars['GCL']['ONCLICK']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['GCL']['LABEL']; ?>
</a>
                        </li>
                    <?php endforeach; endif; unset($_from); ?>
                    <li role="presentation"><a role="menuitem" id="logout_link" href='<?php echo $this->_tpl_vars['LOGOUT_LINK']; ?>
' class='utilsLink'><?php echo $this->_tpl_vars['LOGOUT_LABEL']; ?>
</a></li>
                </ul>
            </div>

            <div id="search" class="dropdown nav navbar-nav navbar-right">
                <button id="searchbutton" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="true">
                    <span class="glyphicon glyphicon-search"> </span>
                </button>
                <div  class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <form id="searchformdropdown" name='UnifiedSearch' action='index.php' onsubmit='return SUGAR.unifiedSearchAdvanced.checkUsaAdvanced()'>
                        <input type="hidden" class="form-control" name="action" value="UnifiedSearch">
                        <input type="hidden" class="form-control" name="module" value="Home">
                        <input type="hidden" class="form-control" name="search_form" value="false">
                        <input type="hidden" class="form-control" name="advanced" value="false">
                        <div class="input-group">
                            <input type="text" class="form-control"  name="query_string" id="query_string" placeholder="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH']; ?>
..." value="<?php echo $this->_tpl_vars['SEARCH']; ?>
" />
                            <span class="input-group-btn">
                                <button  type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <form id="searchform" class="navbar-form navbar-right" name='UnifiedSearch' action='index.php' onsubmit='return SUGAR.unifiedSearchAdvanced.checkUsaAdvanced()'>
                <input type="hidden" class="form-control" name="action" value="UnifiedSearch">
                <input type="hidden" class="form-control" name="module" value="Home">
                <input type="hidden" class="form-control" name="search_form" value="false">
                <input type="hidden" class="form-control" name="advanced" value="false">
                <div class="input-group">
                    <input type="text" class="form-control"  name="query_string" id="query_string" placeholder="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH']; ?>
..." value="<?php echo $this->_tpl_vars['SEARCH']; ?>
" />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </span>
                </div>
            </form>
<!--             <div id="quickcreatetop" class="dropdown nav navbar-nav navbar-right">
                <a class="dropdown-toggle" aria-expanded="false">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="index.php?module=Accounts&action=EditView&return_module=Accounts&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_ACCOUNT']; ?>
</a></li>
                    <li><a href="index.php?module=Contacts&action=EditView&return_module=Contacts&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_CONTACT']; ?>
</a></li>
                    <li><a href="index.php?module=Opportunities&action=EditView&return_module=Opportunities&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_OPPORTUNITY']; ?>
</a></li>
                    <li><a href="index.php?module=Leads&action=EditView&return_module=Leads&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_LEAD']; ?>
</a></li>
                    <li><a href="index.php?module=Documents&action=EditView&return_module=Documents&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_DOCUMENT']; ?>
</a></li>
                    <li><a href="index.php?module=Calls&action=EditView&return_module=Calls&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_CALL']; ?>
</a></li>
                    <li><a href="index.php?module=Tasks&action=EditView&return_module=Tasks&return_action=DetailView"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_TASK']; ?>
</a></li>
                </ul>
            </div> -->
            <div id="desktop_notifications" class="dropdown nav navbar-nav navbar-right">
                <button class="alertsButton dropdown-toggle btn btn-success" data-toggle="dropdown" aria-expanded="false">
                   <span class="badge"><span class="alert_count" >0</span> <span class="glyphicon glyphicon-comment"></span>
                </button>
                <div id="alerts" class="dropdown-menu" role="menu"><?php echo $this->_tpl_vars['APP']['LBL_EMAIL_ERROR_VIEW_RAW_SOURCE']; ?>
</div>
            </div>
        </div>

        <div class="collapse navbar-collapse hidden-lg hidden-md" id="mobile_menu">
            <?php $_from = $this->_tpl_vars['groupTabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['groupList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['groupList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group'] => $this->_tpl_vars['modules']):
        $this->_foreach['groupList']['iteration']++;
?>
                <?php if (($this->_foreach['groupList']['iteration'] == $this->_foreach['groupList']['total'])): ?>
                <?php ob_start(); ?>parentTab=<?php echo $this->_tpl_vars['group']; ?>
<?php $this->_smarty_vars['capture']['extraparams'] = ob_get_contents();  $this->assign('extraparams', ob_get_contents());ob_end_clean(); ?>
                                <?php $_from = $this->_tpl_vars['modules']['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['modulekey'] => $this->_tpl_vars['module']):
?>
                                    <?php if ($this->_tpl_vars['modulekey'] != 'Home' && $this->_tpl_vars['modulekey'] != 'Calendar'): ?>
                                        <li style="float:right;">
                                            <a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['modulekey'],'action' => 'EditView','link_only' => 1), $this);?>
"><span class="glyphicon glyphicon-plus"></span></a>
                                        </li>
                                    <?php endif; ?>
                                    <li>
                                        <?php ob_start(); ?>moduleTab_<?php echo ($this->_foreach['moduleList']['iteration']-1); ?>
_<?php echo $this->_tpl_vars['module']; ?>
<?php $this->_smarty_vars['capture']['moduleTabId'] = ob_get_contents();  $this->assign('moduleTabId', ob_get_contents());ob_end_clean(); ?>
                                        <?php echo smarty_function_sugar_link(array('id' => $this->_tpl_vars['moduleTabId'],'module' => $this->_tpl_vars['modulekey'],'data' => $this->_tpl_vars['module'],'extraparams' => $this->_tpl_vars['extraparams']), $this);?>

                                    </li>
                                <?php endforeach; endif; unset($_from); ?>
                                <?php $_from = $this->_tpl_vars['modules']['extra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submodule'] => $this->_tpl_vars['submodulename']):
?>
                                    <li style="float:right;">
                                        <a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['modulekey'],'action' => 'EditView','link_only' => 1), $this);?>
"><span class="glyphicon glyphicon-plus"></span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['submodule'],'link_only' => 1,'extraparams' => $this->_tpl_vars['extraparams']), $this);?>
"><?php echo $this->_tpl_vars['submodulename']; ?>
</a>
                                    </li>
                                <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </div>
</nav>
<!--End Responsive Top Navigation Menu -->
<?php if ($this->_tpl_vars['THEME_CONFIG']['display_sidebar']): ?>
    <!--Start Page Container and Responsive Sidebar -->
    <div id='sidebar_container' class="container-fluid">
        <a href="javascript:void(0)" id="buttontoggle"><span class="glyphicon glyphicon-th-list"></span></a>
        <div class="row">
            <div <?php if ($_COOKIE['sidebartoggle'] == 'collapsed'): ?>style="display:none"<?php endif; ?> class="col-sm-3 col-md-2 sidebar">
                <div id="actionMenuSidebar">
                    <?php $_from = $this->_tpl_vars['moduleTopMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
        $this->_foreach['moduleList']['iteration']++;
?>
                        <?php if ($this->_tpl_vars['name'] == $this->_tpl_vars['MODULE_TAB']): ?>
                            <ul class="nav nav-pills nav-stacked">
                                <?php if (count ( $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']] ) > 0): ?>
                                    <h2 class="recent_h3"><?php echo $this->_tpl_vars['APP']['LBL_LINK_ACTIONS']; ?>
</h2>
                                    <?php $_from = $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                        <?php if ($this->_tpl_vars['item']['URL'] == "-"): ?>
                                            <li><a></a><span>&nbsp;</span></li>
                                        <?php else: ?>
                                            <li class="actionmenulinks" role="presentation"><a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
"><span><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</span></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <br>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
                <div id="recentlyViewedSidebar">
                    <h2 class="recent_h3"><?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <?php $_from = $this->_tpl_vars['recentRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastViewed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastViewed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['lastViewed']['iteration']++;
?>
                            <div class="recently_viewed_link_container_sidebar">
                                <li class="recentlinks_edit"><a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'EditView','record' => $this->_tpl_vars['item']['item_id'],'link_only' => 1), $this);?>
" style="margin-left:10px;"><span class=" glyphicon glyphicon-pencil" aria-hidden="true"></a></li>
                                <li class="recentlinks" role="presentation">
                                    <a title="<?php echo $this->_tpl_vars['item']['module_name']; ?>
"
                                       accessKey="<?php echo $this->_foreach['lastViewed']['iteration']; ?>
"
                                       href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['item_id'],'link_only' => 1), $this);?>
">
                                        <?php echo $this->_tpl_vars['item']['image']; ?>
&nbsp;<span aria-hidden="true"><?php echo $this->_tpl_vars['item']['item_summary_short']; ?>
</span>
                                    </a>
                                </li>
                            </div>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
                </br>
                <div id="favoritesSidebar">
                    <h2 class="recent_h3"><?php echo $this->_tpl_vars['APP']['LBL_FAVORITES']; ?>
</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <?php $_from = $this->_tpl_vars['favoriteRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastViewed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastViewed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['lastViewed']['iteration']++;
?>
                            <div class="recently_viewed_link_container_sidebar" id="<?php echo $this->_tpl_vars['item']['id']; ?>
">
                                <li class="recentlinks_edit"><a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'EditView','record' => $this->_tpl_vars['item']['id'],'link_only' => 1), $this);?>
" style="margin-left:10px;"><span class=" glyphicon glyphicon-pencil" aria-hidden="true"></a></li>
                                <li class="recentlinks" role="presentation">
                                    <a title="<?php echo $this->_tpl_vars['item']['module_name']; ?>
"
                                       accessKey="<?php echo $this->_foreach['lastViewed']['iteration']; ?>
"
                                       href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['id'],'link_only' => 1), $this);?>
">
                                        <?php echo $this->_tpl_vars['item']['image']; ?>
&nbsp;<span aria-hidden="true"><?php echo $this->_tpl_vars['item']['item_summary_short']; ?>
</span>
                                    </a>
                                </li>
                            </div>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End Responsive Sidebar -->
<?php endif; ?>
<!--Start Page content -->