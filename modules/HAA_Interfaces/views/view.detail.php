<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.detail.php');

class HAA_InterfacesViewDetail extends ViewDetail
{
    function display()
    {
        
        parent::display();
        if(isset($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c)!=""){
            $haa_codes_id_c = $this->bean->haa_codes_id_c;
            $bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id_c);
            $ff_id = $bean_business_type->haa_ff_id;
        }
        if (isset ($ff_id) && $ff_id != "") {
            echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
        }
        
    }
}