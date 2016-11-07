<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class AccountsViewDetail extends ViewDetail
{

        protected function _displaySubPanels()
        {
            if (isset($this->bean) && !empty($this->bean->id) && (file_exists('modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/Ext/Layoutdefs/layoutdefs.ext.php'))) {
                $GLOBALS['focus'] = $this->bean;
                require_once ('include/SubPanel/SubPanelTiles.php');
                $subpanel = new SubPanelTiles($this->bean, $this->module);

                //Dependent logic
                if ($this->bean->org_type_c == 'INTERNAL')
                {
                    //Subpanels to hide
                    $hideSubpanels=array( //如果是内部用户，隐藏以下Tab页
                        'activities',
						'history',
                        'opportunities',
						'leads',
						'campaigns',
                        //'documents',
                        'cases',
						'bugs',
						//'contacts',
						'account_aos_quotes',
						'account_aos_invoices',
						'account_aos_contracts',
						'products_services_purchased',
						'project'
                    );
				}else{
                    $hideSubpanels=array( //如果是外部用户，隐藏以下Tab页
                        'activities',
						'history',
                        'opportunities',
						'leads',
						'campaigns',
                        'documents',
                        'cases',
						'bugs',
						//'contacts',
						'account_aos_quotes',
						'account_aos_invoices',
						'account_aos_contracts',
						'products_services_purchased',
						'project');
				}
                    foreach ($hideSubpanels as $subpanelKey)
                    {
                        //Remove subpanel if set
                        if (isset($subpanel->subpanel_definitions->layout_defs['subpanel_setup'][$subpanelKey]))
                        {
                            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup'][$subpanelKey]);
                        }
                    }
                echo $subpanel->display();
            }
        }
		
  function Display() {
		parent :: Display();      //ff 在DetailView显示之前中进行初始化数据的加载 
		if (isset ($this->bean->haa_codes_id1_c) && ($this->bean->haa_codes_id1_c) != "") {
			//判断是否已经设置有组织的业务类型，如果有组织的业务类型，则进一步的加载产品对应的FlexForm
			$haa_codes_id1_c = $this->bean->haa_codes_id1_c;
			$bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id1_c);

			$ff_id = $bean_business_type->haa_ff_id;

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAA_FF/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
/*				echo '<script> function call_ff() {
				    triger_setFF($("#haa_ff_id").val(),"Accounts","DetailView");
				    $(".expandLink").click();
				 
				}</script>';
				echo '<script>call_ff()</script>';*/
			}
		}
}

}