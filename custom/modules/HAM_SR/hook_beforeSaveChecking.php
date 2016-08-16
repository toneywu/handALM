<?php

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
	class beforeSaveChecking {
        /**
         * @param $bean
         * @param $event
         * @param $arguments
         */

        function getNumbering($focus, $event, $arguments) {
			// 用于产生自动编号
			$GLOBALS['log']->infor("checkApprovalWorkflow logic hook called. beforesave HAM_SR;".$focus->ham_maint_sites_id);

        	if ($focus->sr_number=='') {
        		
        		$bean_site = BeanFactory::getBean('HAM_Maint_Sites',$focus->ham_maint_sites_id);
				$bean_numbering = BeanFactory::getBean('HAA_Numbering_Rule',$bean_site->sr_haa_numbering_rule_id);

				if (!empty($bean_numbering)) {
				    
				    $focus->sr_number=$bean_numbering->nextval;

				    $current_number    =    $bean_numbering->current_number +1;
			        $current_numberstr = "".$current_number;
			        $padding_str ="";
			        for($i=0; $i<$bean_numbering->min_num_strlength; $i++) {
			        	$padding_str =  $padding_str+ "0";
			        }

			        $padding_str = substr($padding_str,0, strlen($padding_str) - strlen($current_numberstr)) + $current_numberstr;
			        $nextval_str = $bean_numbering->perfix.$padding_str;
/*
			        $GLOBALS['log']->error("perfix =".$bean_numbering->perfix);
			        $GLOBALS['log']->error("padding_str =".$padding_str);
			        $GLOBALS['log']->error("current_number =".$current_number);
					$GLOBALS['log']->error("nextval_str =".$nextval_str);*/

			        $bean_numbering->current_number = $current_number;
					$bean_numbering->nextval = $nextval_str;
					$bean_numbering->save();

		    }
		}


		}
	}
		
    

	?>