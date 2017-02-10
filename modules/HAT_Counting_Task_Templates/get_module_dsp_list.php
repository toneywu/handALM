<?php
global $app_strings, $beanList;
$module=$_POST["module_name"];
		$fields = array(''=>$app_strings['LBL_NONE']);

		if ($module != '') {
			if(isset($beanList[$module]) && $beanList[$module]){
				$mod = new $beanList[$module]();
				foreach($mod->field_defs as $name => $arr){
					if(ACLController::checkAccess($mod->module_dir, 'list', true)) {
						if(isset($arr['vname']) && $arr['vname'] != ''){
							$fields[$name] = rtrim(translate($arr['vname'],$mod->module_dir), ':');
						} else {
							$fields[$name] = $name;
						}
					}
            } //End loop.

        }
    }
    //echo get_select_options_with_id($fields, '');
    echo json_encode($fields);