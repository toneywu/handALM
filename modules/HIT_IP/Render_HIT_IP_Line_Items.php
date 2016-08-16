<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$html = '';
	if($view == 'DetailView'){
		$html .= '<script src="modules/HIT_IP_Subnets/js/subnet_line_items.js"></script>';
		$html .= "<form id='EditView'><table border='0' cellspacing='4' id='lineItems' class='list view table'></table>";
		$html .= '<input id="btnAddNewLine" type="button" class="button" onclick="addNewLine(&quot;lineItems&quot;)" value="Save & Commit All Changes">';
		$html .= "</form>";
		$html .= '<script>insertTransLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
         	$sql = "SELECT
					  hit_ip_subnets.`name`
					FROM
					  hit_ip,
					  hit_ip_subnets
					WHERE hit_ip.id = hit_ip_subnets.parent_hit_ip_id
					  AND hit_ip.id = '".$focus->id."'
					  AND hit_ip.`deleted` = 0
					  AND hit_ip_subnets.`deleted` = 0
					ORDER BY INET_ATON(hit_ip_subnets.`name`) ";//INET_ATON是为了让IP有正确的排序

         	$result = $focus->db->query($sql);

         	while ($row = $focus->db->fetchByAssoc($result)) {
         		$line_data = json_encode($row);
         		$html .= "<script>insertLineData(" . $line_data . ",".$view.");</script>";
			//REF:custom/modules/HAT_Asset_Trans/js/line_items.js
            //通过insertLineData向已经完成初始化的页面要素中，写入值
         	}

    	//在编辑模式下显示按钮
         $html .= '<script>insertTransLineFootor(\'lineItems\');</script>';
		}
        return $html;

     }
 }