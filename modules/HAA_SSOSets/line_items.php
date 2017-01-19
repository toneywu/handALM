<?php

function display_lines($focus,$field,$value,$view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$html='';
	if($view =='EditView' || $view == 'DetailView'){
		$html.='<script src="modules/HAA_SSOSets/js/line_items.js"></script>';
		$html.="<table border='0'cellspacing='4'width='100%'id='lineItems'class='listviewtable'></table>";
		$html.='<script>insertLineHeader(\'lineItems\');</script>';
    
		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			
			$sql="SELECT log.id,
						ssoset.`name` sso_name,
						log.haa_ssosets_id_c,
						log.seq,
						u.user_name login_user_name,
						log.user_id_c,
						log.login_secs,
						log.login_time,
						log.description
					FROM
						haa_ssosets ssoset,
						haa_sso_login_logs log
					LEFT JOIN users u ON log.user_id_c = u.id
					WHERE
						ssoset.id = log.haa_ssosets_id_c
				    AND log.deleted = 0
			        AND log.haa_ssosets_id_c ='".$focus->id."'";


			$result=$focus->db->query($sql);

			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				$html.="<script>insertLineData(".$line_data.",'".$view."');</script>";
			}
        }
        if ($view == 'EditView') {
             $html.='<script>insertLineFootor(\'lineItems\');</script>';
        }
    }
    return$html;
}
