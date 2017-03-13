<?php 

$revenuesID = $_POST['revenuesID'];
 $return_result = array(
  	    		'return_status'=>'S',
  	    		'return_msg'=>'',
  	    		'return_data'=>array(),
  	    		);
  	$err_msg = '';
 $return_result = getRevenuesInfo($revenuesID);
 echo json_encode($return_result);


function getRevenuesInfo($id){
	global $db;
    
    $return_result = array(
  	    		'return_status'=>'S',
  	    		'return_msg'=>'',
  	    		'return_data'=>array(),
  	    		);
  	$err_msg = '';

    $sql="SELECT
    	apq.product_total_price total_price
       from haos_revenues_quotes arq,
       aos_products_quotes apq
       WHERE apq.parent_id=arq.id 
       		AND apq.parent_type='HAOS_Revenues_Quotes' 
       		AND apq.parent_id=arq.id 
       		AND arq.id = '" . $id . "'";
    $total_price = 0;
    $result = $db->query($sql);
		while ($row = $db->fetchByAssoc($result)) {
			$total_price =$row['total_price'];
		}  

   $return_result['return_data']['total_price'] = $total_price;
   $return_result['return_data']['revenuesID'] = $id;
   return $return_result; 		
}