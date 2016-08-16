<?php /* Smarty version 2.6.29, created on 2016-08-14 21:20:55
         compiled from modules/SavedSearch/SavedSearchSelects.tpl */ ?>

<?php if ($this->_tpl_vars['SAVED_SEARCHES_OPTIONS'] != null): ?>
<select style="width: auto !important; min-width: 150px;" name='saved_search_select' id='saved_search_select' onChange='SUGAR.savedViews.shortcut_select(this, "<?php echo $this->_tpl_vars['SEARCH_MODULE']; ?>
");'>
	<?php echo $this->_tpl_vars['SAVED_SEARCHES_OPTIONS']; ?>

</select>
<script>
<?php echo '
	//if the function exists, call the function that will populate the searchform
	//labels based on the value of the saved search dropdown
	if(typeof(fillInLabels)==\'function\'){
		fillInLabels();
	}
'; ?>
	
</script>
<?php endif; ?>
