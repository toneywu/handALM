<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAA_Menu_GroupsViewDetail extends ViewDetail {

    function display(){
        parent::display();
        echo '<script>
        $(function(){
        	$(".listViewTdToolsS1").each(function(){
				if ($(this).text().trim()=="编辑") {
					$(this).remove();
				}
        	});
        });
        </script>';
    }
}
?>
