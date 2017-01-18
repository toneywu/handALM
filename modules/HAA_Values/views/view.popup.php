<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HAA_ValuesViewPopup extends ViewPopup
{

    function Display() {
       parent::Display();
       //var_dump($_SESSION['HAA_Values2_QUERY']);
    }

}