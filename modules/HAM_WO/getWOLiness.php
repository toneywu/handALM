<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

global $mod_strings;

$current_id = (isset($wo_id))?$wo_id:$_REQUEST['id'];
$lines_bean = BeanFactory::getBean('HAM_WO_Lines')->get_full_list('name',"and ham_wo_lines.ham_wo_id is not null and ham_wo_lines.ham_wo_id='".$current_id."'");;
//http://localhost/handALM/index.php?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3DAOS_Contracts%26action%3DDetailView%26record%3D891e8fc8-b793-d4bd-25dd-57d10b94d4f7

$current_module = $_REQUEST['module'];
$current_action = $this->action;

/*echo "<pre>";
print_r($_REQUEST[]);

if ($current_module == 'HAM_WO') {
    echo '<input title="新增[Alt+N]" accesskey="N" class="button" type="submit" name="HAM_WO_Lines_新增_button" id="HAM_WO_Lines_新增_button" value="新增">';
}*/

echo '<table class="list view"><tr>';
echo '<th>'.translate('LBL_CONTRACT','HAM_WO_Lines').'</th>';
echo '<th>'.translate('LBL_PRODUCT','HAM_WO_Lines').'</th>';
echo '<th>'.translate('LBL_ASSET','HAM_WO_Lines').'</th>';
echo '<th>'.translate('LBL_QUANTITY','HAM_WO_Lines').'</th>';
echo '</tr>';
if (isset($lines_bean)) {
    foreach ($lines_bean as $thisLine) {
    	echo '<tr>';
    	echo '<td><a href="index.php?module=AOS_Contracts&action=DetailView&record='.$thisLine->contract_id.'">'.$thisLine->contract.'</a></td>';
    	echo '<td>'.$thisLine->product.'</td>';
    	echo '<td>'.$thisLine->asset.'</td>';
    	echo '<td>'.floatval($thisLine->quantity)." ".$thisLine->uom_code.'</td>';
       	echo '</tr>';
    }
} else {
	echo '<tr><td colspan="4">no-data</td></tr>';
}
echo '</table>';