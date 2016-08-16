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
}
