<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class AOS_ContractsViewDetail extends ViewDetail {

	function AOS_ContractsViewDetail(){
		parent::ViewDetail();
	}
	
	function display(){
		
		$this->populateContractTemplates();
		$this->displayPopupHtml();
		parent :: Display(); 
		if (isset ($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c) != "") {
			$haa_codes_id_c = $this->bean->haa_codes_id_c;
			$bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id_c);

			$ff_id = $bean_business_type->haa_ff_id;

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAA_FF/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
				echo '<script> 
					function call_ff() {
						triger_setFF($("#haa_ff_id").val(),"AOS_Contracts");
						$(".expandLink").click();
					}
				</script>';
				echo '<script>call_ff();</script>';
			}
		}
		$this->displayLineItems();
	}

	function displayLineItems(){
		$focus=$this->bean;
		$params = array('currency_id' => $focus->currency_id);

		global $sugar_config, $locale, $app_list_strings, $mod_strings;
		$enable_groups = (int)$sugar_config['aos']['lineItems']['enableGroups'];
		$total_tax = (int)$sugar_config['aos']['lineItems']['totalTax'];
		$html = '';

		$sql = "SELECT pg.id, pg.group_id FROM aos_products_quotes pg LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id WHERE pg.parent_type = '".$focus->object_name."' AND pg.parent_id = '".$focus->id."' AND pg.deleted = 0 ORDER BY lig.number ASC, pg.number ASC";

		$result = $focus->db->query($sql);

		$sep = get_number_seperators();

		$html .= "<table border='0' width='100%' cellpadding='0' cellspacing='0'>";

		$i = 0;
		$productCount = 0;
		$serviceCount = 0;
		$group_id = '';
		$groupStart = '';
		$groupEnd = '';
		$product = '';
		$service = '';
		while ($row = $focus->db->fetchByAssoc($result)) {

			$line_item = new AOS_Products_Quotes();
			$line_item->retrieve($row['id']);

			if($enable_groups && ($group_id != $row['group_id'] || $i == 0)){
				$html .= $groupStart.$product.$service.$groupEnd;
				if($i != 0)$html .= "<tr><td colspan='11' nowrap='nowrap'><br></td></tr>";
				$groupStart = '';
				$groupEnd = '';
				$product = '';
				$service = '';
				$i = 1;
				$productCount = 0;
				$serviceCount = 0;
				$group_id = $row['group_id'];

				$group_item = new AOS_Line_Item_Groups();
				$group_item->retrieve($row['group_id']);

				$groupStart .= "<tr>";
				$groupStart .= "<td class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>&nbsp;</td>";
				$groupStart .= "<td class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_GROUP_NAME'].":</td>";
				$groupStart .= "<td class='tabDetailViewDL' colspan='9' style='text-align: left;padding:2px;'>".$group_item->name."</td>";
				$groupStart .= "</tr>";

				$groupEnd = "<tr><td colspan='11' nowrap='nowrap'><br></td></tr>";
				$groupEnd .= "<tr>";
				$groupEnd .= "<td class='tabDetailViewDL' colspan='10' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_TOTAL_AMT'].":&nbsp;&nbsp;</td>";
				$groupEnd .= "<td class='tabDetailViewDL' style='text-align: right;padding:2px;'>".currency_format_number($group_item->total_amt, $params)."</td>";
				$groupEnd .= "</tr>";
				$groupEnd .= "<tr>";

				$groupEnd .= "<td class='tabDetailViewDL' colspan='10' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_DISCOUNT_AMOUNT'].":&nbsp;&nbsp;</td>";
				$groupEnd .= "<td class='tabDetailViewDL' style='text-align: right;padding:2px;'>".currency_format_number($group_item->discount_amount, $params)."</td>";
				$groupEnd .= "</tr>";
				$groupEnd .= "<tr>";
				$groupEnd .= "<td class='tabDetailViewDL' colspan='10' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_SUBTOTAL_AMOUNT'].":&nbsp;&nbsp;</td>";
				$groupEnd .= "<td class='tabDetailViewDL' style='text-align: right;padding:2px;'>".currency_format_number($group_item->subtotal_amount, $params)."</td>";
				$groupEnd .= "</tr>";
				$groupEnd .= "<tr>";
				$groupEnd .= "<td class='tabDetailViewDL' colspan='10' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_TAX_AMOUNT'].":&nbsp;&nbsp;</td>";
				$groupEnd .= "<td class='tabDetailViewDL' style='text-align: right;padding:2px;'>".currency_format_number($group_item->tax_amount, $params)."</td>";
				$groupEnd .= "</tr>";
				$groupEnd .= "<tr>";
				$groupEnd .= "<td class='tabDetailViewDL' colspan='10' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_GRAND_TOTAL'].":&nbsp;&nbsp;</td>";
				$groupEnd .= "<td class='tabDetailViewDL' style='text-align: right;padding:2px;'>".currency_format_number($group_item->total_amount, $params)."</td>";
				$groupEnd .= "</tr>";
			}
			if($line_item->product_id != '0' && $line_item->product_id != null){
				if($productCount == 0)
				{


					$product .= "<tr>";
					$product .= "<td width='5%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>&nbsp;</td>";
					$product .= "<td width='10%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_PRODUCT_QUANITY']."</td>";
					$product .= "<td width='46%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_PRODUCT_NAME']."</td>";
					$product .= "<td width='12%' class='tabDetailViewDL' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_LIST_PRICE']."</td>";
					$product .= "<td width='12%' class='tabDetailViewDL' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_DISCOUNT_AMT']."</td>";
					$product .= "<td width='12%' class='tabDetailViewDL' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_UNIT_PRICE']."</td>";
					$product .= "<td width='12%' class='tabDetailViewDL' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_VAT']."</td>";
					$product .= "<td width='12%' class='tabDetailViewDL' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_VAT_AMT']."</td>";
					$product .= "<td width='20%' class='tabDetailViewDL' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_SETTLEMENT_PERIOD_C']."</td>";
					$product .= "<td width='20%' class='tabDetailViewDL' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_INITIAL_ACCOUNT_DAY']."</td>";
					$product .= "<td width='12%' class='tabDetailViewDL' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_TOTAL_PRICE']."</td>";
					$product .= "</tr>";

				}

				$product .= "<tr>";

				$product_note = wordwrap($line_item->description,40,"<br />\n");
				$product .= "<td class='tabDetailViewDF' style='text-align: left; padding:2px;'>".++$productCount."</td>";
				$product .= "<td class='tabDetailViewDF' style='padding:2px;'>".$line_item->product_qty."</td>";

				$product .= "<td class='tabDetailViewDF' style='padding:2px;'><a href='index.php?module=AOS_Products&action=DetailView&record=".$line_item->product_id."' class='tabDetailViewDFLink'>".$line_item->name."</a><br />".$product_note."</td>";
				$product .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".currency_format_number($line_item->product_list_price,$params)."</td>";

				$product .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".$this->get_discount_string($line_item->discount, $line_item->product_discount, $params, $locale, $sep)."</td>";

				$product .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".currency_format_number($line_item->product_unit_price,$params )."</td>";

				if($locale->getPrecision()){

					$product .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".rtrim(rtrim(format_number($line_item->vat), '0'),$sep[1])."%</td>";
				} else {

					$product .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".format_number($line_item->vat)."%</td>";
				}

				$product .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".currency_format_number($line_item->vat_amt,$params )."</td>";
				$product .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".$app_list_strings['settlement_period_list'][$line_item->settlement_period_c]."</td>";
				$product .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".$line_item->initial_account_day_c."</td>";
				$product .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".currency_format_number($line_item->product_total_price,$params )."</td>";
				$product .= "</tr>";

			} else {
				if($serviceCount == 0)
				{
					$service .= "<tr>";
					$service .= "<td width='5%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>&nbsp;</td>";
					$service .= "<td width='46%' class='dataLabel' style='text-align: left;padding:2px;' colspan='2' scope='row'>".$mod_strings['LBL_SERVICE_NAME']."</td>";
					$service .= "<td width='12%' class='dataLabel' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_SERVICE_LIST_PRICE']."</td>";
					$service .= "<td width='12%' class='dataLabel' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_SERVICE_DISCOUNT']."</td>";
					$service .= "<td width='12%' class='dataLabel' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_SERVICE_PRICE']."</td>";
					$service .= "<td width='12%' class='dataLabel' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_VAT']."</td>";
					$service .= "<td width='12%' class='dataLabel' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_VAT_AMT']."</td>";
					$service .= "<td width='12%' class='dataLabel' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_SETTLEMENT_PERIOD_C']."</td>";
					$service .= "<td width='12%' class='dataLabel' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_INITIAL_ACCOUNT_DAY']."</td>";
					$service .= "<td width='12%' class='dataLabel' style='text-align: right;padding:2px;' scope='row'>".$mod_strings['LBL_TOTAL_PRICE']."</td>";
					$service .= "</tr>";
				}

				$service .= "<tr>";
				$service .= "<td class='tabDetailViewDF' style='text-align: left; padding:2px;'>".++$serviceCount."</td>";
				$service .= "<td class='tabDetailViewDF' style='padding:2px;' colspan='2'>".$line_item->name."</td>";
				$service .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".currency_format_number($line_item->product_list_price,$params)."</td>";

				$service .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".$this->get_discount_string($line_item->discount, $line_item->product_discount, $params, $locale, $sep)."</td>";


				$service .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".currency_format_number($line_item->product_unit_price,$params)."</td>";
				$service .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".rtrim(rtrim(format_number($line_item->vat), '0'), $sep[1])."%</td>";
				$service .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".currency_format_number($line_item->vat_amt,$params )."</td>";
				$service .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".$app_list_strings['settlement_period_list'][$line_item->settlement_period_c]."</td>";
				$service .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".$line_item->initial_account_day_c."</td>";
				$service .= "<td class='tabDetailViewDF' style='text-align: right; padding:2px;'>".currency_format_number($line_item->product_total_price,$params )."</td>";
				$service .= "</tr>";

			}
		}
		$html .= $groupStart.$product.$service.$groupEnd;
		$html .= "</table>";
		echo '<script src="custom/modules/AOS_Products_Quotes/line_items.js"></script>';
		echo "<script>replace_display_lines(" .json_encode($html). ");</script>";
	}
	function get_discount_string($type, $amount, $params, $locale, $sep){

		if($amount != '' && $amount != '0.00')
		{
			if($type == 'Amount')
			{

				return currency_format_number($amount,$params )."</td>";
			}
			else if($locale->getPrecision())
			{

				return rtrim(rtrim(format_number($amount), '0'),$sep[1])."%";
			} else{
				
				return format_number($amount)."%";
			}
		}
		else
		{
			return "-";
		}
	}
	function populateContractTemplates(){
		global $app_list_strings;

		$sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted = 0 AND type='AOS_Contracts' AND active = 1";

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
}
?>
