<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAM_SRViewDetail extends ViewDetail
{

    function Display() {

    /*    if (isset($this->bean->ham_wo_name) &&$this->bean->ham_wo_name!="") {
            //$this->ss->assign('HAM_WO_NAME', $this->bean->$ham_wo_name);
        }*/
        if (isset($this->bean->ham_wo_number) && $this->bean->ham_wo_number!="") { //将工作单号与说明合成到一个字段中显示
            $this->bean->ham_wo_name="[".$this->bean->ham_wo_number."] ".$this->bean->ham_wo_name;
        } else {
           // if (is_null($this->bean->ham_wo_number) || $this->bean->ham_wo_name=="") {
                $this->bean->ham_wo_name=translate('LBL_SR_NOT_ASSIGED_TO_WO', 'HAM_SR');
            //}
        }
        parent::Display();
    }
}
