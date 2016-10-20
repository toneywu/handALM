<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class TasksViewDetail extends ViewDetail
{
	public function __construct()
    {
        if(isset($this->bean->id) && ($this->bean->id)!=""){
            $id_c = $this->bean->id;
            $haa_codes=BeanFactory::getBean('Tasks',$id_c);
            $haa_codes->haa_frameworks_id_c=$_SESSION["current_framework"];
            $haa_codes->save();
        }
        parent::ViewDetail();
        $this->useForSubpanel = true;
        $this->useModuleQuickCreateTemplate = true;
    }
    
	function display()
	{
        if(isset($this->bean->id) && ($this->bean->id)!=""){
            $id_c = $this->bean->id;
            $haa_codes=BeanFactory::getBean('Tasks',$id_c);
            $haa_codes_id_c=$haa_codes->haa_codes_id_c;
            $bean_code = BeanFactory::getBean('HAA_Codes',$haa_codes_id_c);
            $ff_id = $bean_code->haa_ff_id;
            if (isset($ff_id) && $ff_id!="") {
                echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="'.$ff_id.'">';
            }
        }
		parent::display();
	}
}