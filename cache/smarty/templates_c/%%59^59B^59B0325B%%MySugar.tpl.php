<?php /* Smarty version 2.6.29, created on 2016-08-14 21:20:14
         compiled from themes/SuiteR_HANDALM/tpls/MySugar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getscript', 'themes/SuiteR_HANDALM/tpls/MySugar.tpl', 58, false),array('function', 'counter', 'themes/SuiteR_HANDALM/tpls/MySugar.tpl', 112, false),array('function', 'sugar_getjspath', 'themes/SuiteR_HANDALM/tpls/MySugar.tpl', 212, false),)), $this); ?>
<?php echo '
    <style>
        .menu {
            z-index: 100;
        }

        .subDmenu {
            z-index: 100;
        }

        div.moduleTitle {
            height: 10px;
        }
    </style>
'; ?>


<?php echo smarty_function_sugar_getscript(array('file' => "cache/include/javascript/sugar_grp_yui_widgets.js"), $this);?>

<?php echo smarty_function_sugar_getscript(array('file' => 'include/javascript/dashlets.js'), $this);?>


<?php echo $this->_tpl_vars['chartResources']; ?>

<?php echo $this->_tpl_vars['mySugarChartResources']; ?>


<ul class="dashboardTabList">

    
        <?php $_from = $this->_tpl_vars['dashboardPages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tabNum'] => $this->_tpl_vars['tab']):
?>
        <?php if ($this->_tpl_vars['tabNum'] == 0): ?> <li id="pageNum_<?php echo $this->_tpl_vars['tabNum']; ?>
">
            <a id="pageNum_<?php echo $this->_tpl_vars['tabNum']; ?>
_anchor" style='cursor: pointer;'  onClick=retrievePage(<?php echo $this->_tpl_vars['tabNum']; ?>
);>
                <span><?php echo $this->_tpl_vars['tab']['pageTitle']; ?>
</span>
            </a>

        </li>
        <?php else: ?> <li id="pageNum_<?php echo $this->_tpl_vars['tabNum']; ?>
">
            <a id="pageNum_<?php echo $this->_tpl_vars['tabNum']; ?>
_anchor" style='cursor: pointer;' <?php if (! $this->_tpl_vars['lock_homepage']): ?>ondblclick="renameTab(<?php echo $this->_tpl_vars['tabNum']; ?>
)"<?php endif; ?> onClick=retrievePage(<?php echo $this->_tpl_vars['tabNum']; ?>
);>
                <span id="name_<?php echo $this->_tpl_vars['tabNum']; ?>
"><?php echo $this->_tpl_vars['tab']['pageTitle']; ?>
</span>
            </a>
            <?php if (! $this->_tpl_vars['lock_homepage']): ?><a id="removeTab_anchor"  onClick=removeDashboardForm(<?php echo $this->_tpl_vars['tabNum']; ?>
);><span class="glyphicon glyphicon-remove"></span></a><?php endif; ?>

            </li><?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php if (! $this->_tpl_vars['lock_homepage']): ?>
        <li class="addButton">
            <a style='cursor: pointer;' onclick="return SUGAR.mySugar.showDashletsDialog();"><?php echo $this->_tpl_vars['lblAddDashlets']; ?>
</a>
        </li>

        <li class="addButton">
            <a style='cursor: pointer;' onclick="addDashboardForm(<?php echo $this->_tpl_vars['tabNum']; ?>
);">
                <span><?php echo $this->_tpl_vars['lblAddTab']; ?>
</span>
            </a>
        </li>
    <?php endif; ?>
</ul>

<div class="clear"></div>

<!-- Construct Dashlets -->
<div id="pageContainer" class="yui-skin-sam">
    <div id="pageNum_<?php echo $this->_tpl_vars['activePage']; ?>
_div">
        <table width="100%">
            <tr>
                <td align='right'>
                    <?php if (! $this->_tpl_vars['lock_homepage']): ?><input id="add_dashlets" class="button" type="button"
                                               value="<?php echo $this->_tpl_vars['lblAddDashlets']; ?>
"
                                               onclick="return SUGAR.mySugar.showDashletsDialog();"/><?php endif; ?>
                </td>
            </tr>
            <tr>
                <?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

                <?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
                    <td class="dashletcontainer" valign='top' width='<?php echo $this->_tpl_vars['data']['width']; ?>
'>
                        <ul class='noBullet' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
'>
                            <li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b'
                                style='height: 5px; margin-top:12px;' class='noBullet'>
                                &nbsp;&nbsp;&nbsp;</li>
                            <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
                                <li class='noBullet' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
'>
                                    <div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
' class='dashletPanel'>
                                        <?php echo $this->_tpl_vars['dashlet']['script']; ?>

                                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

                                        <?php echo $this->_tpl_vars['dashlet']['display']; ?>

                                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

                                    </div>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                            <li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
' style='height: 5px'
                                class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
                        </ul>
                    </td>
                    <?php echo smarty_function_counter(array(), $this);?>

                <?php endforeach; endif; unset($_from); ?>
            </tr>
        </table>
    </div>
    <?php $_from = $this->_tpl_vars['divPages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['divPageIndex'] => $this->_tpl_vars['divPageNum']):
?>
        <div id="pageNum_<?php echo $this->_tpl_vars['divPageNum']; ?>
_div" style="display:none;">
        </div>
    <?php endforeach; endif; unset($_from); ?>

    <div id="dashletsDialog" style="display:none;">
        <div class="hd" id="dashletsDialogHeader"><a href="javascript:void(0)"
                                                     onClick="javascript:SUGAR.mySugar.closeDashletsDialog();">
                <div class="container-close">&nbsp;</div>
            </a><?php echo $this->_tpl_vars['lblAdd']; ?>

        </div>
        <div class="bd" id="dashletsList">
            <form></form>
        </div>
    </div>

</div>
<script type="text/javascript" src="include/MySugar/javascript/AddRemoveDashboardPages.js"></script>
<script type="text/javascript" src="include/MySugar/javascript/retrievePage.js"></script>
<link rel="stylesheet" type="text/css" href="themes/SuiteR/css/dashboardstyle.css">
<script type="text/javascript">

    var activePage = <?php echo $this->_tpl_vars['activePage']; ?>
;
    var theme = '<?php echo $this->_tpl_vars['theme']; ?>
';
    current_user_id = '<?php echo $this->_tpl_vars['current_user']; ?>
';
    jsChartsArray = new Array();
    var moduleName = '<?php echo $this->_tpl_vars['module']; ?>
';
    document.body.setAttribute("class", "yui-skin-sam");
    <?php echo '
    var mySugarLoader = new YAHOO.util.YUILoader({
        require: ["my_sugar", "sugar_charts"],
        // Bug #48940 Skin always must be blank
        skin: {
            base: \'blank\',
            defaultSkin: \'\'
        },
        onSuccess: function () {
            initMySugar();
            initmySugarCharts();
            SUGAR.mySugar.maxCount =    '; ?>
<?php echo $this->_tpl_vars['maxCount']; ?>
<?php echo ';
            SUGAR.mySugar.homepage_dd = new Array();
            var j = 0;

            '; ?>

            var dashletIds = <?php echo $this->_tpl_vars['dashletIds']; ?>
;

            <?php if (! $this->_tpl_vars['lock_homepage']): ?>
            for (i in dashletIds) {
                SUGAR.mySugar.homepage_dd[j] = new ygDDList('dashlet_' + dashletIds[i]);
                SUGAR.mySugar.homepage_dd[j].setHandleElId('dashlet_header_' + dashletIds[i]);
                // Bug #47097 : Dashlets not displayed after moving them
                // add new property to save real id of dashlet, it needs to have ability reload dashlet by id
                SUGAR.mySugar.homepage_dd[j].dashletID = dashletIds[i];
                SUGAR.mySugar.homepage_dd[j].onMouseDown = SUGAR.mySugar.onDrag;
                SUGAR.mySugar.homepage_dd[j].afterEndDrag = SUGAR.mySugar.onDrop;
                j++;
                }
            <?php if ($this->_tpl_vars['hiddenCounter'] > 0): ?>
            for (var wp = 0; wp <= <?php echo $this->_tpl_vars['hiddenCounter']; ?>
; wp++) {
                SUGAR.mySugar.homepage_dd[j++] = new ygDDListBoundary('page_' + activePage + '_hidden' + wp);
                }
            <?php endif; ?>
            YAHOO.util.DDM.mode = 1;
            <?php endif; ?>
            <?php echo '
            SUGAR.mySugar.renderDashletsDialog();
            SUGAR.mySugar.sugarCharts.loadSugarCharts(activePage);
            '; ?>

            <?php echo '
        }
    });
    mySugarLoader.addModule({
        name: "my_sugar",
        type: "js",
        fullpath: '; ?>
"<?php echo smarty_function_sugar_getjspath(array('file' => 'include/MySugar/javascript/MySugar.js'), $this);?>
"<?php echo ',
        varName: "initMySugar",
        requires: []
    });
    mySugarLoader.addModule({
        name: "sugar_charts",
        type: "js",
        fullpath: '; ?>
"<?php echo smarty_function_sugar_getjspath(array('file' => "include/SugarCharts/Jit/js/mySugarCharts.js"), $this);?>
"<?php echo ',
        varName: "initmySugarCharts",
        requires: []
    });
    mySugarLoader.insert();
    '; ?>

</script>