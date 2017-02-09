<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.detail.php');

class HAOS_InsurancesViewDetail extends ViewDetail
{

	function display(){
        parent::display();
        //ff 在DetailView显示之前中进行初始化数据的加载 
          if(isset($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c)!=""){
            $haa_codes_id_c = $this->bean->haa_codes_id_c;
            $bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id_c);
            $ff_id = $bean_business_type->haa_ff_id;
       }

            if (isset ($ff_id) && $ff_id != "") {
                echo '<script src="modules/HAA_FF/ff_include.js"></script>';
                echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
                echo '<script> function call_ff() {
                    triger_setFF($("#haa_ff_id").val(),"HAOS_Insurances","DetailView");
                    $("a.collapsed").click();
                    
                }</script>';
                echo '<script>call_ff()</script>';
            }
    }

}
