<?php /* Smarty version 2.6.29, created on 2016-08-14 21:20:07
         compiled from themes/SuiteR_HANDALM/tpls/footer.tpl */ ?>
</div>
</div>
<!-- END of container-fluid, pageContainer divs -->
<!-- Start Footer Section -->
<?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
<!-- Start generic footer -->
    <footer>
        <div class="serverstats">
            <span class="glyphicon glyphicon-globe"></span> <?php echo $this->_tpl_vars['STATISTICS']; ?>

        </div>
        <div id="links">
            <?php echo $this->_tpl_vars['BOTTOMLINKS']; ?>

        </div>
        <div id="copyright_data">
            <div id="dialog2" title="<?php echo $this->_tpl_vars['MOD']['LBL_SUITE_SUPERCHARGED']; ?>
">
                <p><?php echo $this->_tpl_vars['MOD']['LBL_SUITE_DESC1']; ?>
</p>
                <br>
                <p><?php echo $this->_tpl_vars['MOD']['LBL_SUITE_DESC2']; ?>
</p>
                <br>
                <p><?php echo $this->_tpl_vars['MOD']['LBL_SUITE_DESC3']; ?>
</p>
                <br>
            </div>
            <div id="dialog" title="&copy; <?php echo $this->_tpl_vars['MOD']['LBL_SUITE_POWERED_BY']; ?>
">
                <p><?php echo $this->_tpl_vars['COPYRIGHT']; ?>
</p>
            </div>
            <div id="copyrightbuttons">
            <a id="admin_options">&copy; <?php echo $this->_tpl_vars['MOD']['LBL_SUITE_SUPERCHARGED']; ?>
</a>
            <a id="powered_by" >&copy; <?php echo $this->_tpl_vars['MOD']['LBL_SUITE_POWERED_BY']; ?>
</a>
            </div>
        </div>
    </footer>
<!-- END Generic Footer -->
<?php endif; ?>
<!-- END Footer Section -->
<?php echo '
<script>

//qe_init function sets listeners to click event on elements of \'quickEdit\' class
 if(typeof(DCMenu) !=\'undefined\'){
    DCMenu.qe_refresh = false;
    DCMenu.qe_handle;
 }
function qe_init(){

    //do not process if YUI is undefined
    if(typeof(YUI)==\'undefined\' || typeof(DCMenu) == \'undefined\'){
        return;
    }


    //remove all existing listeners.  This will prevent adding multiple listeners per element and firing multiple events per click
    if(typeof(DCMenu.qe_handle) !=\'undefined\'){
        DCMenu.qe_handle.detach();
    }

    //set listeners on click event, and define function to call
    YUI().use(\'node\', function(Y) {
        var qe = Y.all(\'.quickEdit\');
        var refreshDashletID;
        var refreshListID;

        //store event listener handle for future use, and define function to call on click event
        DCMenu.qe_handle = qe.on(\'click\', function(e) {
            //function will flash message, and retrieve data from element to pass on to DC.miniEditView function
            ajaxStatus.flashStatus(SUGAR.language.get(\'app_strings\', \'LBL_LOADING\'),800);
            e.preventDefault();
            if(typeof(e.currentTarget.getAttribute(\'data-dashlet-id\'))!=\'undefined\'){
                refreshDashletID = e.currentTarget.getAttribute(\'data-dashlet-id\');
            }
            if(typeof(e.currentTarget.getAttribute(\'data-list\'))!=\'undefined\'){
                refreshListID = e.currentTarget.getAttribute(\'data-list\');
            }
            DCMenu.miniEditView(e.currentTarget.getAttribute(\'data-module\'), e.currentTarget.getAttribute(\'data-record\'),refreshListID,refreshDashletID);
        });

    });
}

    qe_init();

	SUGAR_callsInProgress++;
	SUGAR._ajax_hist_loaded = true;
    if(SUGAR.ajaxUI)
    	YAHOO.util.Event.onContentReady(\'ajaxUI-history-field\', SUGAR.ajaxUI.firstLoad);
</script>
'; ?>

</div>
</body>
</html>