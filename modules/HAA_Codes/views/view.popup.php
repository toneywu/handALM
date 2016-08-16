<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HAA_CodesViewPopup extends ViewPopup
{

    function Display() {
       parent::Display();
        echo'<script>$("#code_type_advanced").closest("td").hide()</script>';
        echo'<script>$("#code_type_advanced").closest("td").prev("td").hide()</script>';
    }

}
