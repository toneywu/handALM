<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAT_AssetsViewList extends ViewList
{
    function Display() {
        global $app_list_strings;
        $this->ss->assign('APP_LIST', $app_list_strings);
        
		parent::Display();
    }
	
	public function preDisplay(){
        parent::preDisplay();
        //$this->lv->actionsMenuExtraItems[] = $this->getNewActionMenuItem();
        $this->lv->actionsMenuExtraItems[] = $this->buildMyMenuItem();
    }
	
	
protected function buildMyMenuItem()
    {
        global $app_strings;
        return <<<EOHTML
<a class="menuItem" style="width:150px;" href="#" onmouseover='hiliteItem(this,"yes");'
        onmouseout='unhiliteItem(this);'
        onclick="sugarListView.get_checks();
        if(sugarListView.get_checks_count() &lt; 1) {
            alert('{$app_strings['LBL_LISTVIEW_NO_SELECTED']}');
            return false;
        }
        document.MassUpdate.action.value='displaypassedids';
        document.MassUpdate.submit();">传递资产到EBS</a>
EOHTML;
    }

}
