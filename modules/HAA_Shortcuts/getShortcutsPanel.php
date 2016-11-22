<?php

$Bean_list = BeanFactory::getBean('HAA_Shortcuts')->get_full_list('haa_shortcuts.sequence_number, haa_shortcuts.name',"haa_shortcuts.haa_frameworks_id='".$_REQUEST['framework_id']."'");



if (isset($Bean_list)) {

    for($x = 0; $x < count($Bean_list); $x++){

		$html_str="";
    	$html_str_icon = '<i class="zmdi '.$Bean_list[$x]->shortcut_icon.' icon-hc-3x shortcut_icon"></i>';
    	$html_str_title = '<span class="shortcut_title">'.$Bean_list[$x]->name.'</span>';

		if ($Bean_list[$x]->shortcut_action=="Edit") {
    		if(ACLController::checkAccess($Bean_list[$x]->shortcut_module, 'edit', true)) {
    			if (empty($Bean_list[$x]->url)) { //如果没有指定特殊的URL，按Module和Action进行指向
    				$html_str_url = "<a href='index.php?module=".$Bean_list[$x]->shortcut_module."&action=EditView' title='".$Bean_list[$x]->shortcut_module."'>";
				} else {//如果有指定URL，则按指定进行导向
					$html_str_url = "<a href='".$Bean_list[$x]->url."'>";
				}
    		}//end if for access check
		}else {
    		if(ACLController::checkAccess($Bean_list[$x]->shortcut_module, 'list', true)) {
    			if (empty($Bean_list[$x]->url)) { //如果没有指定特殊的URL，按Module和Action进行指向
    				$html_str_url = "<a href='index.php?module=".$Bean_list[$x]->shortcut_module."&action=index' title='".$Bean_list[$x]->shortcut_module."'>";
				} else {//如果有指定URL，则按指定进行导向
					$html_str_url = "<a href='".$Bean_list[$x]->url."'>";
				}
    		}//end if for access check
		}//end if for Edit/List action check

		if (isset($html_str_url)&&$html_str_url!=""){
	    	$html_str .=  $html_str_url.$html_str_icon.$html_str_title."</a>";
	        echo ("<div class='shortcut_set col-md-2'>".$html_str."</div>");
	        //每个图标都被显示在class=shortcut_set对象中
        }
    }//for next
}

?>