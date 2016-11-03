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
		//1、业务框架
		//2、处理FF
		//3、Display
		//4、读取Frame中销售及服务人员字段
		//5、处理FF展开

        //1、初始化Framework
        require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $this->ss->assign('FRAMEWORK_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_framework_id_c'));



		//*********************处理业务框架，以及业务框架下销售及服务人员是List或是Text END********************



		//*********************处理FF界面 START********************
		if(isset($this->bean->haa_codes_id1_c) && ($this->bean->haa_codes_id1_c)!=""){
            //判断是否已经设置有组织的业务类型，如果有组织的业务类型，则进一步的加载产品对应的FlexForm

			$haa_codes_id1_c = $this->bean->haa_codes_id1_c;
			$bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id1_c);

			$ff_id = $bean_business_type->haa_ff_id;
            //如果分类有对应的FlexForm，些建立一个对象去存储FF_ID
            //需要注意的是在Metadata中是不包括这个ID的，如果这里没有加载则在后续的JS文件中加载
			/*if (isset($ff_id) && $ff_id!="") {
                //如果分类有对应的FlexForm，些建立一个对象去存储FF_ID
                //需要注意的是在Metadata中是不包括这个ID的，如果这里没有加载则在后续的JS文件中加载
                echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="'.$ff_id.'">';
            }*/
		}
        

		parent::Display();
		$ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden '.(isset($ff_id)?'value='.$ff_id:'').'>';
        echo '<script>if($("#haa_ff_id").length==0) { $("#EditView").append("'.$ff_id_field.'");}</script>';

        $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
        if(isset($beanFramework)) {
            if($beanFramework->sales_person_field_rule=='TEXT'){
	        	$current_sales_responsible_person_c = isset($this->bean->sales_responsible_person_c)?($this->bean->sales_responsible_person_c):"";
    	    	$current_contact_id_c=isset($this->bean->contact_id_c)?$this->bean->contact_id_c:"";
        		$current_sales_person_desc_c=isset($this->bean->sales_person_desc_c)?$this->bean->sales_person_desc_c:"";
                echo ('<script>$("#sales_responsible_person_c").parent().html(\'<input type="hidden" name="sales_responsible_person_c" id="sales_responsible_person_c" value="'.$current_sales_responsible_person_c.'"/><input type="hidden" name="contact_id_c" id="contact_id_c" value="'.$current_contact_id_c.'"/><input type="text" name="sales_person_desc_c" id="sales_person_desc_c" value="'.$current_sales_person_desc_c.'"/>\');</script>');
            }


            if($beanFramework->service_person_field_rule=='TEXT'){
        		$current_service_responsible_person_c = isset($this->bean->service_responsible_person_c)?($this->bean->service_responsible_person_c):"";
        		$current_contact_id1_c=isset($this->bean->contact_id1_c)?$this->bean->contact_id1_c:"";
        		$current_service_person_desc_c=isset($this->bean->service_person_desc_c)?$this->bean->service_person_desc_c:"";
        	    echo ('<script>$("#service_responsible_person_c").parent().html(\'<input type="hidden" name="service_responsible_person_c" id="service_responsible_person_c" value="'.$current_service_responsible_person_c.'"/><input type="hidden" name="contact_id1_c" id="contact_id1_c" value="'.$current_contact_id1_c.'"/><input type="text" name="service_person_desc_c" id="service_person_desc_c" value="'.$current_service_person_desc_c.'"/>\');</script>');
            }
        }

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