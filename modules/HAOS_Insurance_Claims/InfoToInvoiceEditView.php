<?php
//error_reporting(E_ALL);
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');


function getInfo($ATId){
	$return_result = array(
                  'return_status'=>'S',
                  'return_msg'=>'', 
                  'return_data'=>array(), 
                  );
              $err_msg = '';


	if(!(ACLController::checkAccess('HAOS_Revenues_Quotes', 'edit', true))){
		ACLController::displayNoAccess();
		die;
	}

	$at = new HAOS_Insurance_Claims();
	$at->retrieve($Id);
	if ($at->claim_treated_status!='Treated'){
		//die('已处理的保险理赔才能创建收支计费项!');
		$return_result['return_status']='E';
		$err_msg.='已处理的保险理赔才能创建收支计费项!';
	}
    
    //modify by hq 20170312
	//$rawRow['haa_frameworks_id_c'] = $rawRow['haa_frameworks_id_c'];
	$rawRow['haa_frameworks_id_c'] = $at->haa_frameworks_id_c;
	//end modify 20170312
	$rawRow['revenue_quote_number'] = '';
	$rawRow['name'] = $at->name.'收支';
	$rawRow['clear_status'] = 'Unclear';
	$rawRow['event_date'] = date_format(date_create($at->time),"Y-m-d") ;
	require_once('modules/HAOS_Revenues_Quotes/getPeriodForPHP.php');
	$rawRow['period_name'] = getPeriod($rawRow['event_date'],$rawRow['haa_frameworks_id_c']);
	$rawRow['source_code'] = 'HAOS_Insurance_Claims';
	$rawRow['source_id'] = $at->id;

	$rawRow['source_reference'] =  $at->claim_number;
	if($at->parent_type=='Contacts'){
		$rawRow['contact_id_c'] = $at->parent_id;
	}
	elseif($at->parent_type=='Accounts'){
		$rawRow['account_id_c'] = $at->parent_id;
	}

	$rawRow['expense_group'] = $at->claim_type;

	$quoteRow['line_item_type_c']='Service';
	$quoteRow['vat']="0.0";
	$quoteRow['product_total_price']=$at->act_claim_total_amt;
	$quoteRow['product_list_price']=$at->act_claim_total_amt;
	$quoteRow['product_unit_price']=$at->act_claim_total_amt;
	$quoteRow['name']=$at->comment;

    $cord = array();
    $cord[]='';
	$cord[]='';

	$event_date = $rawRow['event_date'];
	$name = '';
	// $at->haos_revenues_quotes_id=createRevenue($rawRow,$quoteRow);
	// $at->save();

   $return_result['return_msg'] = $err_msg;
   $return_result['return_data']['quoteRow']=$quoteRow;
   $return_result['return_data']['rawRow']=$rawRow;
   $return_result['return_data']['cord']=$cord;
   $return_result['return_data']['name']=$name;
   $return_result['return_data']['event_date']=$event_date;
   return $return_result;
 
}



?>