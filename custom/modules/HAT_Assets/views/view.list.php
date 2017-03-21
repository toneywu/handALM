<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAT_AssetsViewList extends ViewList
{
  function Display() {
    global $app_list_strings;
    $this->ss->assign('APP_LIST', $app_list_strings);

	echo '<script src="modules/HAT_Assets/js/listview_HAT_Assets.js"></script>';
	echo '<script src="cache/include/javascript/sugar_grp_yui_widgets.js"></script>';
	echo '<script src="custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js"></script>';
	echo '<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />';
    parent::Display();

	if(isset($_GET['error_message'])&&!empty($_GET['error_message'])){
		echo '<script>var return_msg="'.$_GET['error_message'].'"</script>';
		//echo '<script>alert('.$_GET['error_message'].');</script>';
	}
  }
/*
 *  重写方法，添加where条件
 */
function processSearchForm(){
  parent::processSearchForm();
  $haa_frameworks_id=$_SESSION["current_framework"];
  if ($this->where) {
    $this->where.=" and hat_assets.haa_frameworks_id='".$haa_frameworks_id."'";
  }else{
    $this->where=" hat_assets.haa_frameworks_id='".$haa_frameworks_id."'";
  }
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

/*
    function listViewProcess(){


		$c = BeanFactory::getBean('HAT_Assets',$this->bean->id);
		   //because that field is not included in my list view. By using the $bean id to retrieve a copy of the full bean (which I called $c)
		   //Ref:http://developer.sugarcrm.com/2012/10/15/conditional-formatting-on-cases-list-view-and-dashlets/
		$val = translate($c->field_defs['asset_status']['options'],'', $c->asset_status);
		//$this->bean->asset_status_displayed = "<span class='color_tag color_asset_status_{$c->asset_status}'>tag:{$val}</span>";

		$this->bean->asset_status = "test";//"<span class='color_tag color_asset_status_{$c->asset_status}'>tag:{$val}</span>";

		foreach($this->bean as $key => $value) {
           print "$key => $value\n";
       }

        parent::listViewProcess();
      }
    }
  }
}
*/