<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HAT_EventTypeViewPopup extends ViewPopup
{


    function Display() {
       parent::Display();
        echo'<script>$("#basic_type_advanced").closest("td").hide()</script>';
        echo'<script>$("#basic_type_advanced").closest("td").prev("td").hide()</script>';
    }
}
