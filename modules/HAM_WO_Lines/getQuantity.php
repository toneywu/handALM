<?php

    $contract_id = $_REQUEST['contract_id'];
    $product_id = $_REQUEST['product_id'];
    //echo($product_id);
    global $db;
	if($product_id != "" && $contract_id !=""){//
		
		$sql="SELECT
					l.product_qty
				FROM
					aos_contracts h,
					aos_products_quotes l
				WHERE
					h.id = l.parent_id
				AND h.id = '".$contract_id."'
				AND l.product_id= '".$product_id."'
				LIMIT 0,1";
    	$result=$db->query($sql);
		while($row=$db->fetchByAssoc($result)){
			if ($row['product_qty'] != "") {
				if ($row['product_qty'] >= 9999999999) {
					echo 9999999999;
				}
			    else{
			    	echo $row['product_qty'];
			    }
			}else{
				echo 222;
			}
			
        }
    }
    else{
    	echo 111;
    }
 

