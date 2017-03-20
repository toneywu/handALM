<?php
//error_reporting(E_ALL);
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');


function getInfo($Id){
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

	$event = new HAT_Incidents();
	$event->retrieve($Id);
	$event->save();

	$rawRow = $event->fetched_row;
    //add by hq 20170311
	$beanAT = BeanFactory :: getBean('HAT_EventType',$event->hat_eventtype_id_c);
	$rawRow['event_type']='';
	if ($beanAT->revenue_eventtype_id_c!='') { 
		$beanRevenue = BeanFactory :: getBean('HAT_EventType',$beanAT->revenue_eventtype_id_c); 

		if ($beanRevenue){
			$rawRow['event_type'] = $beanRevenue->name;
		}
	}else{
		//die('事务单的事件类型未设置对应的收支计费项的事务类型，请联系运维人员!'.$ATId);
		$return_result['return_status']='E';
		$err_msg .= '事务单的事件类型未设置对应的收支计费项的事务类型，请联系运维人员!';
	}
	//end add 20170311
	//Setting Invoice Values

	$rawRow['id'] = '';
//modify by hq 20170312
//$rawRow['haa_frameworks_id_c'] = $rawRow['haa_frameworks_id_c'];
	$rawRow['haa_frameworks_id_c'] = $event->haa_frameworks_id;
//end modify 
	$rawRow['revenue_quote_number'] = '';
	$rawRow['clear_status'] = 'Unclear';
	$rawRow['event_date'] = date_format(date_create($event->event_date),"Y-m-d");
	require_once('modules/HAOS_Revenues_Quotes/getPeriodForPHP.php');
	$rawRow['period_name'] = getPeriod($rawRow['event_date'],$rawRow['haa_frameworks_id_c']);

	$rawRow['source_code'] = 'HAT_Incidents';
	$rawRow['source_id'] = $event->id;

	$rawRow['source_reference'] =  $event->event_number;
	$rawRow['contract_number'] = $event->person_number;
	$rawRow['contact_id_c'] = $event->contact_id_c;
	$rawRow['contract_name'] = $event->person_name;
	$rawRow['hat_assets_id'] = $event->hat_assets_id_c;

	$rawRow['expense_group'] = $event->event_type;
//$rawRow['event_type'] =$event->event_type;
	$rawRow['name']=$event->name.'收支';
	
//Setting Line Items
	$quoteRow['line_item_type_c']='Service';
	$quoteRow['vat']="0.0";
	$quoteRow['product_total_price']=$event->fine;
	$quoteRow['product_list_price']=$event->fine;
	$quoteRow['product_unit_price']=$event->fine;
	$quoteRow['name']=$event->name;


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