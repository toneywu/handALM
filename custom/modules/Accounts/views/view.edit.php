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


class AccountsViewEdit extends ViewEdit
{

	function Display() {

		parent::Display();


		//*********************处理业务框架，以及业务框架下销售及服务人员是List或是Text START********************



		//*********************处理业务框架，以及业务框架下销售及服务人员是List或是Text END********************


		//*********************处理FF界面 START********************
		if(isset($this->bean->haa_codes_id1_c) && ($this->bean->haa_codes_id1_c)!=""){
            //判断是否已经设置有组织的业务类型，如果有组织的业务类型，则进一步的加载产品对应的FlexForm

			$haa_codes_id1_c = $this->bean->haa_codes_id1_c;
			$bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id1_c);

			$ff_id = $bean_business_type->haa_ff_id;
            //如果分类有对应的FlexForm，些建立一个对象去存储FF_ID
            //需要注意的是在Metadata中是不包括这个ID的，如果这里没有加载则在后续的JS文件中加载
		}
        $ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden '.(isset($ff_id)?'value='.$ff_id:'').'>';
        echo '<script>if($("#haa_ff_id").length==0) { $("#EditView").append("'.$ff_id_field.'");}</script>';

		//如果已经选择business_type，无论是否business_type对应的FlexForm有值，值将界面展开。
	    //（如果没有产品，则界面保持折叠状态。）
		if(isset($this->bean->haa_codes_id1_c) && ($this->bean->haa_codes_id1_c)!=""){
                	echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
         } else {
            	echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
         }
		//*********************处理FF界面 END********************
}


 	public function __construct()
 	{
 		parent::ViewEdit();
 		$this->useForSubpanel = true;
 		$this->useModuleQuickCreateTemplate = true;
 	}

}