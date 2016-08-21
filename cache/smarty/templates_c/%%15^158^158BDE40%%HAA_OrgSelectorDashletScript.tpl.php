<?php /* Smarty version 2.6.29, created on 2016-08-21 11:16:42
         compiled from modules/Home/Dashlets/HAA_OrgSelectorDashlet/HAA_OrgSelectorDashletScript.tpl */ ?>


<?php echo '<script>
if(typeof OrgSelector == \'undefined\') { // since the dashlet can be included multiple times a page, don\'t redefine these functions
	OrgSelector = function() {
		return{
			clicked: function(ta, id) {
	        	ajaxStatus.showStatus(\''; ?>
<?php echo $this->_tpl_vars['saving']; ?>
<?php echo '\'); // show that AJAX call is happening
	        	// what data to post to the dashlet
    	    	var va=YAHOO.lang.JSON.stringify(encodeURIComponent(ta.value));
    	    	postData = \'to_pdf=1&module=Home&action=CallMethodDashlet&method=saveText&id=\' + id + \'&savedText=\' + va;
				var cObj = YAHOO.util.Connect.asyncRequest(\'POST\',\'index.php\', 
								  {success: JotPad.saved, failure: JotPad.saved}, postData);
	        },
		}
	}


	JotPad = function() {
	    return {
	    	/**
	    	 * Called when the textarea is blurred
	    	 */
	        blur: function(ta, id) {
	        	ajaxStatus.showStatus(\''; ?>
<?php echo $this->_tpl_vars['saving']; ?>
<?php echo '\'); // show that AJAX call is happening
	        	// what data to post to the dashlet
    	    	var va=YAHOO.lang.JSON.stringify(encodeURIComponent(ta.value));
    	    	postData = \'to_pdf=1&module=Home&action=CallMethodDashlet&method=saveText&id=\' + id + \'&savedText=\' + va;
				var cObj = YAHOO.util.Connect.asyncRequest(\'POST\',\'index.php\', 
								  {success: JotPad.saved, failure: JotPad.saved}, postData);
	        },
		    /**
	    	 * Called when the textarea is double clicked on
	    	 */
			edit: function(divObj, id) {
				ta = document.getElementById(\'jotpad_textarea_\' + id);
				if(SUGAR.isIE) ta.value = divObj.innerHTML.replace(/<br>/gi, "\\n");
				else ta.value = divObj.innerHTML.replace(/<br>/gi, \'\');
				ta.value = ta.value.replace(/&amp;/gi, "&");
				divObj.style.display = \'none\';
				ta.style.display = \'\';
				ta.focus();
			},
		    /**
	    	 * handle the response of the saveText method
	    	 */
	        saved: function(data) {
	        	eval(data.responseText);
	           	ajaxStatus.showStatus(\''; ?>
<?php echo $this->_tpl_vars['saved']; ?>
<?php echo '\');
	           	if(typeof result != \'undefined\') {
					ta = document.getElementById(\'jotpad_textarea_\' + result[\'id\']);
					theDiv = document.getElementById(\'jotpad_\' + result[\'id\']);
					theDiv.innerHTML = result[\'savedText\'];
				}
				ta.style.display = \'none\';
				theDiv.style.display = \'\';
	           	window.setTimeout(\'ajaxStatus.hideStatus()\', 2000);
	        }
	    };
	}();
}
</script>'; ?>
