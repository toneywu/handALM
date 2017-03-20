<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class AOS_InvoicesViewDetail extends ViewDetail {

	function AOS_InvoicesViewDetail(){
		parent::ViewDetail();
	}
	
	function display(){
		$this->populateInvoiceTemplates();
		$this->displayPopupHtml();
		$this->populateBillContactInfo();
		parent::display();
		//ff 在DetailView显示之前中进行初始化数据的加载 
		if (isset ($this->bean->hat_eventtype_id_c) && ($this->bean->hat_eventtype_id_c) != "") {
			$hat_eventtype_id_c = $this->bean->hat_eventtype_id_c;
			$bean_event_type = BeanFactory::getBean('HAT_EventType',$hat_eventtype_id_c);

			$ff_id = $bean_event_type->haa_ff_id;

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAA_FF/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
				echo '<script> function call_ff() {
					triger_setFF($("#haa_ff_id").val(),"AOS_Invoices","DetailView");
					$("a.collapsed").click();
					
				}</script>';
				echo '<script>call_ff()</script>';
			}
		}
		$paid_amount=($this->bean->total_amount)-($this->bean->unpaied_amount_c);
		echo "<script>
			$('#status').parent().text($('#status').parent().text()+' ".$paid_amount."');
		</script>";
		echo '<script src="custom/modules/AOS_Invoices/js/AOS_Invoices_detailview.js"></script>';
		echo "<script>
		$('#delete_button').attr('onclick','deleteButtonClick(\"".$this->bean->id."\")');
		</script>";
		echo '<script>
		if(("'.$this->bean->status.'"=="Paid"||"'.$this->bean->status.'"=="PartedPaid")&&'.$this->bean->amount_c.'!=0){
			$("#delete_button").css("display","none");
		}
		</script>';
	} 
	
	function populateInvoiceTemplates(){
		global $app_list_strings;
		
		$sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted = 0 AND type='AOS_Invoices' AND active = 1";

		$res = $this->bean->db->query($sql);
		$app_list_strings['template_ddown_c_list'] = array();
		while($row = $this->bean->db->fetchByAssoc($res)){
			$app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
		}
	}
	
	function displayPopupHtml(){
		global $app_list_strings,$app_strings, $mod_strings;
		$templates = array_keys($app_list_strings['template_ddown_c_list']);
		if($templates){

			echo '	<div id="popupDiv_ara" style="display:none;position:fixed;top: 39%; left: 41%;opacity:1;z-index:9999;background:#FFFFFF;">
			<form id="popupForm" action="index.php?entryPoint=generatePdf" method="post">
				<table style="border: #000 solid 2px;padding-left:40px;padding-right:40px;padding-top:10px;padding-bottom:10px;font-size:110%;" >
					<tr height="20">
						<td colspan="2">
							<b>'.$app_strings['LBL_SELECT_TEMPLATE'].':-</b>
						</td>
					</tr>';
					foreach($templates as $template){
						$template = str_replace('^','',$template);
						$js = "document.getElementById('popupDivBack_ara').style.display='none';document.getElementById('popupDiv_ara').style.display='none';var form=document.getElementById('popupForm');if(form!=null){form.templateID.value='".$template."';form.submit();}else{alert('Error!');}";
						echo '<tr height="20">
						<td width="17" valign="center"><a href="#" onclick="'.$js.'"><img src="themes/default/images/txt_image_inline.gif" width="16" height="16" /></a></td>
						<td><b><a href="#" onclick="'.$js.'">'.$app_list_strings['template_ddown_c_list'][$template].'</a></b></td></tr>';
					}
					echo '		<input type="hidden" name="templateID" value="" />
					<input type="hidden" name="task" value="pdf" />
					<input type="hidden" name="module" value="'.$_REQUEST['module'].'" />
					<input type="hidden" name="uid" value="'.$this->bean->id.'" />
				</form>
				<tr style="height:10px;"><tr><tr><td colspan="2"><button style=" display: block;margin-left: auto;margin-right: auto" onclick="document.getElementById(\'popupDivBack_ara\').style.display=\'none\';document.getElementById(\'popupDiv_ara\').style.display=\'none\';return false;">Cancel</button></td></tr>
			</table>
		</div>
		<div id="popupDivBack_ara" onclick="this.style.display=\'none\';document.getElementById(\'popupDiv_ara\').style.display=\'none\';" style="top:0px;left:0px;position:fixed;height:100%;width:100%;background:#000000;opacity:0.5;display:none;vertical-align:middle;text-align:center;z-index:9998;">
		</div>
		<script>
			function showPopup(task){
				var form=document.getElementById(\'popupForm\');
				var ppd=document.getElementById(\'popupDivBack_ara\');
				var ppd2=document.getElementById(\'popupDiv_ara\');
				if('.count($templates).' == 1){
					form.task.value=task;
					form.templateID.value=\''.$template.'\';
					form.submit();
				}else if(form!=null && ppd!=null && ppd2!=null){
					ppd.style.display=\'block\';
					ppd2.style.display=\'block\';
					form.task.value=task;
				}else{
					alert(\'Error!\');
				}
			}
		</script>';
	}
	else{
		echo '<script>
		function showPopup(task){
			alert(\''.$mod_strings['LBL_NO_TEMPLATE'].'\');
		}
	</script>';
}
}

function populateBillContactInfo(){
	$bean_contact= BeanFactory::getBean('Contacts', $this->bean->billing_contact_id);
	if ($bean_contact) { 
		$this->bean->billing_contact_number = isset($bean_contact->employee_number_c)?$bean_contact->employee_number_c:'';
	}
}

}
?>
