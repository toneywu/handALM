<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.edit.php');

class HAA_FunctionsViewEdit extends ViewEdit
{

	function Display(){
        echo '<link rel="stylesheet" href="custom/resources/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>
<link rel="stylesheet" href="custom/resources/bootstrap-iconpicker/icon-fonts/icomoon/css/style.css"/>';
        echo '<script src="modules/HAA_Functions/js/editview_icon_picker.js"></script>';
        parent::Display();
        
        echo '<script>console.log($("#func_icon"));icon_edit_init($("#func_icon"));</script>';
    }
}