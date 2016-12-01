<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.detail.php');

class HAOS_Insurance_ClaimsViewDetail extends ViewDetail
{
	function display()
	{
		require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
        if (isset($beanFramework)) {
            $bean_framework_id = $_SESSION["current_framework"];
            $bean_framework_name = $beanFramework->name;
        }
        $this->ss->assign('FRAMEWORK_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id_c'));
        $event_id=$this->bean->hat_incidents_id_c;
        $event=BeanFactory::getBean('HAT_Incidents', $event_id);
        $this->bean->relate_event_number=$event->event_number;
        $this->bean->time=$event->event_date;
        $this->bean->location=$event->event_location;
        $this->bean->comment=$event->name;
		parent::display();
        
        if(isset($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c)!=""){
            $haa_codes_id_c = $this->bean->haa_codes_id_c;
            $bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id_c);
            $ff_id = $bean_business_type->haa_ff_id;
        }
        if (isset ($ff_id) && $ff_id != "") {
                echo '<script src="modules/HAA_FF/ff_include.js"></script>';
                echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
                echo '<script> function call_ff() {
                    triger_setFF($("#haa_ff_id").val(),"HAOS_Insurance_Claims","DetailView");
                    $(".expandLink").click();
                    
                }</script>';
                echo '<script>call_ff()</script>';
            }
        echo "<script type='text/javascript'>
        $(function(){
            $('#claim_total_amount').html('￥'+$('#claim_total_amount').html().trim());
            $('#act_claim_total_amt').html('￥'+$('#act_claim_total_amt').html().trim());
            $('#gap_amount').html('￥'+$('#gap_amount').html().trim());
            $('#haos_insurance_claims_haos_insurance_claims_lines_新增_button').remove();
            $('#haos_insurance_claims_haos_insurance_claims_lines_select_button').remove();
        });
        </script>";
	}
}