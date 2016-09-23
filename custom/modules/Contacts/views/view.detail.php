<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/


require_once('include/MVC/View/views/view.detail.php');

class ContactsViewDetail extends ViewDetail
{
 	/**
 	 * @see SugarView::display()
	 *
 	 * We are overridding the display method to manipulate the portal information.
 	 * If portal is not enabled then don't show the portal fields.
 	 */
	 /*
	public function display(){
		global $sugar_config;

		$aop_portal_enabled = !empty($sugar_config['aop']['enable_portal']) && !empty($sugar_config['aop']['enable_aop']);

		$this->ss->assign("AOP_PORTAL_ENABLED", $aop_portal_enabled);

		require_once('modules/AOS_PDF_Templates/formLetter.php');
		formLetter::DVPopupHtml('Contacts');

		$admin = new Administration();
		$admin->retrieveSettings();
		if(isset($admin->settings['portal_on']) && $admin->settings['portal_on']) {
			$this->ss->assign("PORTAL_ENABLED", true);
		}
		parent::display();
	}*/
	
	/**
         * Override - Called from process(). This method will display subpanels.
         */
        protected function _displaySubPanels()
        {
            if (isset($this->bean) && !empty($this->bean->id) && (file_exists('modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/Ext/Layoutdefs/layoutdefs.ext.php'))) {
                $GLOBALS['focus'] = $this->bean;
                require_once ('include/SubPanel/SubPanelTiles.php');
                $subpanel = new SubPanelTiles($this->bean, $this->module);
  
                //Dependent logic
                if ($this->bean->type_c == 'INTERNAL')
                {
                    //Subpanels to hide
                    $hideSubpanels=array( //如果是内部用户，隐藏以下Tab页
                        'activities',
						'history',
                        'opportunities',
						'leads',
						'campaigns',
                        'documents',
                        'cases',
						'bugs',
						//'contacts',
						'contact_aos_quotes"',
						'contact_aos_invoices"',
						'contact_aos_contracts"',
						'fp_events_contacts',
						'Project'
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
						'contact_aos_quotes"',
						'contact_aos_invoices"',
						'contact_aos_contracts"',
						'fp_events_contacts',
						//'hat_assets_contacts',
						'hpr_am_roles_contacts','project');
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
		if (isset ($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c) != "") {
			//判断是否已经设置有组织的业务类型，如果有组织的业务类型，则进一步的加载产品对应的FlexForm
			$haa_codes_id_c = $this->bean->haa_codes_id_c;
			$bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id_c);

			$ff_id = $bean_business_type->haa_ff_id;

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAA_FF/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
				echo '<script> function call_ff() {
				    triger_setFF($("#haa_ff_id").val(),"Accounts","DetailView");
				    $(".expandLink").click();
				 
				}</script>';
				echo '<script>call_ff()</script>';
			}
		}
}

}
