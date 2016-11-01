<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.popup.php');

class HIT_RacksViewPopup extends ViewPopup {

	function Display() {

		global $mod_strings, $app_strings, $app_list_strings;
		global $db;
		global $popupMeta;

		if (isset ($_REQUEST['current_mode']) && $_REQUEST['current_mode'] != "") {
			//如果当前没有current_mode就按常规的列表显示
			//if (isset($_REQUEST['target_owning_org_id_advanced'])&&$_REQUEST['target_owning_org_id_advanced']!="") {
			//echo '<script>var owning_org_id="'.$_REQUEST['target_owning_org_id_advanced'].'"</script>';
			//}
			require_once('include/Popups/PopupSmarty.php');
			//require_once 'modules/ModuleBuilder/parsers/ParserFactory.php' ;
			//$parser = ParserFactory::getParser ( $this->editLayout, $this->editModule, $this->editPackage) ;

			//$smarty = $this->constructSmarty ( $parser ) ;
			if (($this->bean instanceOf SugarBean) && !$this->bean->ACLAccess('list')) {
				ACLController :: displayNoAccess();
				sugar_cleanup(true);
			}
			insert_popup_header(null, false);
			$popup = new PopupSmarty($this->bean, $this->module);
			echo "ddd".var_dump($popup->_popupMeta);
			parent :: Display();
			
		} else {

			//require_once('include/Popups/PopupSmarty.php');
			insert_popup_header(null, false);

			require_once ('modules/HAT_Asset_Locations/selector.php');
			//parent::Display();

		}
	}
}