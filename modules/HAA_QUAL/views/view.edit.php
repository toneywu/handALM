<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAA_QUALViewEdit extends ViewEdit
{


    function Display() {

/*        foreach ($_REQUEST as $key => $value) {
            echo '</br>'.$key ." = ".$value;
        }
*/        if(isset($_REQUEST['account_id']) && $_REQUEST['account_id'] !="") {
            $this->bean->org_id = $_REQUEST['account_id'];
            $this->bean->org = $_REQUEST['account_name'];
        }

        require_once('modules/HAA_FF/ff_include_editview.php');
        initEditViewByFF((!empty($this->bean->code_qualification_type_id))?$this->bean->code_qualification_type_id:"",'HAA_Codes');

        parent::Display();

    }


}//end class
