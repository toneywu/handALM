<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.popup.php');

class HIT_IP_SubnetsViewPopup extends ViewPopup {

	function Display() {

		global $mod_strings, $app_strings, $app_list_strings;
		global $db;
		if (isset($_REQUEST['current_mode']) && $_REQUEST['current_mode'] == "TREE") {

			/*        if(($this->bean instanceOf SugarBean) && !$this->bean->ACLAccess('list')){
			            ACLController::displayNoAccess();
			            sugar_cleanup(true);
			        }
			*/

			/***************************************************************/
			/* 以下为自定义的界面 by toney.wu
			/*****************************************************************/

			echo ('<script type="text/javascript" src="include/javascript/popup_helper.js"></script>');
			echo ('<script type="text/javascript" src="modules/HIT_IP_Subnets/js/HIT_IP_Subnets_popupview.js"></script>'); //

			echo '<form id="popup_query_form" name="popup_query_form">';
			echo '<h3>' . $mod_strings['LBL_LIST_FORM_TITLE'] . '</h3>';
			echo ('<div style="font-size:larger" id="PopupView"></div>');
			//这个是放置树型控件的容器

			echo '<input type="text" name="val_selected"  tabindex="0" id="val_selected" size="" value="" title="" autocomplete="off">';
			echo '<input type="button" name="btn_submit" id="btn_submit" value="' . $app_strings['LBL_ID_FF_SELECT'] . '" class="yui-ac-input" onclick="btn_submit_clicked()">';
			//以上是选择框

			echo '<input type="hidden" name="module" value="' . $this->module . '">';
			echo '<input type="hidden" name="action" value="Popup">';
			echo '<input type="hidden" name="request_data" >'; //所有的参数都存在在这里，参数会被自动填充

			echo '</form>';

			/***************************************************************/
			/* 以下为加载数据 by toney.wu
			/*****************************************************************/
			$beanIP = BeanFactory :: getBean('HIT_IP')->get_full_list('name', "");

			$txt_jason = "";
			$txt_jason = '{name:"IP Addresses", open:true, isParent:true, pId:0, id:"ROOT"},';
			if (isset ($beanIP)) {
				foreach ($beanIP as $thisIP) {
					$txt_jason .= "{";
					$txt_jason .= '"name":"<strong>[Class C] </strong>' . $thisIP->name . '",';
					$txt_jason .= '"id":"' . $thisIP->id . '",';
					$txt_jason .= '"pID":0';
					$txt_jason .= "},";

					$beanIPSubnets = BeanFactory :: getBean('HIT_IP_Subnets')->get_full_list('hit_ip_subnets, name', "hit_ip_subnets.parent_hit_ip_id='" .
					$thisIP->id . "'
										                                                                             AND hit_ip_subnets.name = hit_ip_subnets.ip_subnet");
					//加载精确IP与子IP相同的数据，也就是只有第2层IP段网的内容
					if (isset ($beanIPSubnets)) {
						foreach ($beanIPSubnets as $beanIPSubnet) {
							$txt_jason .= "{";
							foreach ($beanIPSubnet->field_name_map as $key => $value) {
								if ($key == 'parent_hit_ip_id') {
									//Parent_eventtype_id需要特别处理
									$txt_jason .= 'pId:"' . $thisIP->id . '",';
								} else
									if ($key == 'name') {
										//Parent_eventtype_id需要特别处理
										$txt_jason .= 'return_name:"' . $beanIPSubnet->name . '",';
										$txt_jason .= 'name:"<strong>' . $beanIPSubnet->name . '</strong> : <span class=\"input_desc\">' . $beanIPSubnet->ip_lowest . '~' . $beanIPSubnet->ip_highest . ' / ' . $beanIPSubnet->ip_netmask . '</span>",';
									} else {
										if (isset ($beanIPSubnet-> $key)) {
											$txt_jason .= $key . ':"' . $beanIPSubnet-> $key . '",';
										}
									}
							}
							$txt_jason = substr($txt_jason, 0, strlen($txt_jason) - 1); //去除最后一个,
							$txt_jason .= "},";
						}
					}

					$beanIPSubnets = BeanFactory :: getBean('HIT_IP_Subnets')->get_full_list('hit_ip_subnets, name', "hit_ip_subnets.parent_hit_ip_id='" .
					$thisIP->id . "'
										                                                                             AND hit_ip_subnets.name = hit_ip_subnets.ip_subnet");
					//加载精确IP与子IP不相同的数据，也就是第3层IP段网的内容
					if (isset ($beanIPSubnets)) {
						foreach ($beanIPSubnets as $beanIPSubnet) {
							$txt_jason .= "{";
							foreach ($beanIPSubnet->field_name_map as $key => $value) {
								if ($key == 'parent_hit_ip_id') {
									//Parent_eventtype_id需要特别处理
									$txt_jason .= 'pId:"' . $thisIP->id . '",';
								} else
									if ($key == 'name') {
										//Parent_eventtype_id需要特别处理
										$txt_jason .= 'return_name:"' . $beanIPSubnet->hit_ip_subnets . '",';
										$txt_jason .= 'name:"<strong>' . $beanIPSubnet->hit_ip_subnets . '</strong> : <span class=\"input_desc\">' . $beanIPSubnet->ip_lowest . '~' . $beanIPSubnet->ip_highest . ' / ' . $beanIPSubnet->ip_netmask . '</span>",';
									} else {
										if (isset ($beanIPSubnet-> $key)) {
											$txt_jason .= $key . ':"' . $beanIPSubnet-> $key . '",';
										}
									}
							}
							$txt_jason = substr($txt_jason, 0, strlen($txt_jason) - 1); //去除最后一个,
							$txt_jason .= "},";
						}
					}

				}
				$txt_jason = substr($txt_jason, 0, strlen($txt_jason) - 1); //去除最后一个,
			}

			//$txt_jason  = substr($txt_jason,0,strlen($txt_jason)-1);//去除最后一个,
			//$txt_jason .= "}";

			//$txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);
			//$txt_jason='{"node":['.$txt_jason.']}';
			$txt_jason = '[' . $txt_jason . ']';
			// echo($txt_jason);
			echo ('<script>var zNodes = ' . $txt_jason . '</script>');
			echo "REQUEST".var_dump($_SESSION);	
			// parent::Display();
		} else {
			insert_popup_header(null, false);
			echo '<script src="modules/HIT_IP_Allocations/js/popup_view.js"></script>';
			//echo "<input type='hidden' id='target_owning_org_id_advanced' value='".$_REQUEST["target_owning_org_id_advanced"]."'>";
			parent :: Display();
			//echo "REQUEST".var_dump($_SESSION);

		}
	}
}