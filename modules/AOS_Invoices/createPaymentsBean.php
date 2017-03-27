<?php
//if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
 * Advanced OpenSales, Advanced, robust set of sales modules.
 * @package Advanced OpenSales for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SalesAgility <info@salesagility.com>
 */

   //require_once('modules/AOS_Invoices/createPaymentsBean.php');
  //global $db;

  /**
  *约定数据$arr格式
  *  $arr=array('payment_date'=>payment_date,
  		  'payment_amount'=>payment_amount,
  		  'payment_method_type'=>payment_method_type,
  		  'description'=>description,
        'all_pay_flag'=>all_pay_flag,
  		  'haa_frameworks_id_c'=>haa_frameworks_id_c,
  		  'billing_contact_id'=>billing_contact_id,
  		  'billing_account_id'=>billing_account_id,
  		  'currency_id'=>currency_id,
  		  'line_data'=>array(
  		  				'0'=>array('invoices_id'=>invoices_id,
								'line_amount'=>line_amount
  								),
  						'1'=>array('invoices_id'=>invoices_id,
								'line_amount'=>line_amount
  								),
  							),
  						...
  	    ),
  */
  	    function createPayment($arr){
  	    	$result = array(
  	    		'return_status'=>'S',
  	    		'return_msg'=>'',
  	    		'return_data'=>array(),
  	    		);
  	    	$err_msg = '';
 	// echo 'sdfdddddddsf';
  	    	require_once('modules/HAOS_Payments/HAOS_Payments.php');
  	    	require_once('modules/HAOS_Payment_Invoices/HAOS_Payment_Invoices.php');

  	    	if($arr['payment_date']!=''
  	    		&& $arr['payment_amount']!=''
  	    		&& $arr['payment_method_type']!=''){


  	    		$PaymentBean = BeanFactory::newBean("HAOS_Payments");

 		//赋值
  	    	$PaymentBean->haa_frameworks_id_c = $arr['haa_frameworks_id_c']; 
  	    	$PaymentBean->contact_id1_c =$arr['billing_contact_id']; 
  	    	$PaymentBean->account_id_c = $arr['billing_account_id'];
  	    	$PaymentBean->currency_id= $arr['currency_id'];
  	    	//$PaymentBean->payment_date = $arr['payment_date']; 
          $PaymentBean->payment_date = date_format(date_create($arr['payment_date']),"Y-m-d");
  	    	$PaymentBean->payment_amount = $arr['payment_amount']; 

  	    	$PaymentBean->name = getMaxPaymentsNum($arr['haa_frameworks_id_c']);
          $PaymentBean->haa_periods_id_c = getPeriodName($arr['haa_frameworks_id_c'],$arr['payment_date']);
 		//$PaymentBean->period_name = $arr['description_r']; //会计期间

  	    	$PaymentBean->payment_method_type = $arr['payment_method_type']; 
  	    	$PaymentBean->payment_status = 'P'; 
  	    	$PaymentBean->description = $arr['description']; 

  	    	$PaymentBean->save();

 		/*
			* 循环创建所有行
 		*/
			foreach ($arr['line_data'] as $key => $line) {

				$AosInvoicesBean = BeanFactory::getBean('AOS_Invoices',$line['invoices_id']);
				$PaymentInvoiceBean = BeanFactory::newBean("HAOS_Payment_Invoices");
  		//  $PaymentInvoiceBean = new HAOS_Payment_Invoices();
				$PaymentInvoiceBean->haos_payments_id_c = $PaymentBean->id;
				$PaymentInvoiceBean->aos_invoices_id_c = $AosInvoicesBean->id; 
				$PaymentInvoiceBean->currency_id= $AosInvoicesBean->currency_id;
        if($arr['all_pay_flag']=='Y'){
				  $PaymentInvoiceBean->amount = $line['line_amount'];
        }else{
          $PaymentInvoiceBean->amount = $arr['payment_amount'];
       }
				$PaymentInvoiceBean->save();

        updateInvPayStatus($line['invoices_id']);
			}
 

			$result['return_status'] = 'S'; 
		}else{
			$result['return_status'] = 'E';
		}
		return $result;
	}

	function updateInvPayStatus($id){
    global $db;
		$result = array(
  	    		'return_status'=>'S',
  	    		'return_msg'=>'',
  	    		'return_data'=>array(),
  	    		);
  	$err_msg = '';

		$Bean = BeanFactory::getBean('AOS_Invoices',$id);
    //发票金额？
		$InvAmount = $Bean->total_amount;
		$payAmount = 0;
		$sql="SELECT
		payl.amount
		from 
		haos_payment_invoices payl,
		aos_invoices ainv,
    haos_payments payh
		where 1=1
    and payh.deleted = 0
		and payl.deleted = 0
		and ainv.deleted = 0
    and payh.id = payl.haos_payments_id_c
    and payh.payment_status = 'P'
		and payl.aos_invoices_id_c = ainv.id
		and ainv.id='".$id."'";

		$result = $db->query($sql);
		while ($row = $db->fetchByAssoc($result)) {
			$payAmount = $payAmount+$row['amount'];
		}

		if($payAmount==$InvAmount){
			$Bean->status = 'Paid';
		}
		if($payAmount == 0){
			$Bean->status = 'Unpaid';
		}
		if($payAmount>0 && $payAmount<$InvAmount){
			$Bean->status = 'PartedPaid';
		}
    $Bean->unpaied_amount_c = $InvAmount-$payAmount;
    $Bean->amount_c = $payAmount;
		$Bean->save();

    return $result;
	}
  

  /**

  */

  function getMaxPaymentsNum($frm_id){
    global $db;
      $sql="SELECT
          max(hp.name+0) maxnum
        from haos_payments hp
        where hp.deleted = 0
        and hp.haa_frameworks_id_c='".$frm_id."'";

     $maxnum = 1;
     $result = $db->query($sql);
    while ($row = $db->fetchByAssoc($result)) {
      if($row['maxnum']){
        $maxnum = $row['maxnum']+1;
      }else{
        $maxnum=1;
      }
    }
    return $maxnum;
  }


  function getPeriodName($frm_id,$pay_date){
    global $db;
      $periods_id = '';

      $sql = "SELECT
             perl.id,
             perl.name
           from 
             haa_period_sets perh,
             haa_periods perl
           where 1=1
           and perh.deleted = 0
           and perl.deleted = 0
           and perh.haa_frameworks_id_c = '".$frm_id."'
           and perh.enabled_flag = 1
           and perh.id = perl.haa_period_sets_id_c
           and perl.start_date <= '".$pay_date."'
           and perl.end_date >= '".$pay_date."'"
           ;
        $result = $db->query($sql);
           while ($row = $db->fetchByAssoc($result)) {
            //$line_data = json_encode($row);
            $periods_id = $row['id'];
         }
       
       return $periods_id;
  }
/**
* function:validateAosInvoices
* 验证发票信息，并获取相关数据
* created by hq 2017-02-26
*/
 /**
  *约定数据$data格式
  *  $arr('payment_date'=>payment_date,
  		  'payment_amount'=>payment_amount,
  		  'payment_method_type'=>payment_method_type,
  		  'description'=>description,  		 
  		  'line_data'=>array(
  		  				'0'=>array('invoices_id'=>invoices_id,
								'line_amount'=>line_amount
  								),
  						'1'=>array('invoices_id'=>invoices_id,
								'line_amount'=>line_amount
  								),
  							),
  						...
  	    ),
  */
        
  	    function validateAosInvoices($data){
  	    	$result = array(
  	    		'return_status'=>'S',
  	    		'return_msg'=>'',
  	    		'return_data'=>array(),
  	    		);
  	    	$err_msg = '';

  	    	if($data['payment_date']==''){
  	    		$err_msg .= '付款时间不能为空;';
  	    		$result['return_status'] = 'E';
  	    	}
  	    	if($data['payment_amount']=='' || $data['payment_amount']<=0){
  	    		if($data['payment_amount']==''){
  	    			$err_msg .= '付款金额不能为空;';
  	    		}else{
  	    			$err_msg .= '付款金额必须大于0;';
  	    		}
  	    		$result['return_status'] = 'E';
  	    	}
  	    	if($data['payment_method_type']==''){
  	    		$err_msg .= '付款方式不能为空;';
  	    		$result['return_status'] = 'E';
  	    	}


    //
    $line_count = 0;//计数
    //框架，客户，人员相同标志
    $frameworks_flag = true;
    $account_flag = true;
    $contact_flag = true;
    foreach ($data['line_data'] as $key => $line) {
     
    	$AosInvoicesBean = BeanFactory::getBean('AOS_Invoices',$line['invoices_id']);
    	if($line_count == 0){
    		$frameworks_id = $AosInvoicesBean->haa_frameworks_id_c;
    		$account_id = $AosInvoicesBean->billing_account_id;
    		$contact_id = $AosInvoicesBean->billing_contact_id;
    		$currency_id = $AosInvoicesBean->currency_id;
    	}else{
    		if($frameworks_id != $AosInvoicesBean->haa_frameworks_id_c){
    			$frameworks_flag = false;
    		}
    		if($account_id != $AosInvoicesBean->billing_account_id){
    			$account_flag =false;
    		}
    		if($contact_id != $AosInvoicesBean->billing_contact_id){
    			$contact_flag = false;
    		}
    	}
    	
    	$line_count = $line_count+1;
    }


    if($frameworks_flag == false){
    	$err_msg .= '必须是同一业务框架;';
    	$result['return_status'] = 'E';
    }
    if($account_flag == false){
    	$err_msg .= '必须是同一客户;';
      $result['return_status'] = 'E';
    }
    if($contact_flag == false){
    	$err_msg .= '必须是同一人员;';
      $result['return_status'] = 'E';
    }
    $result['return_msg'] = $err_msg;
    return $result;
}

/**
* 校验客户、人员、业务框架并获取相关需要的信息。
* 约定参数格式 $data ID数组
* 
*/
function validataCheck($data){
	$result = array(
  	    		'return_status'=>'S',
  	    		'return_msg'=>'',
  	    		'return_data'=>array(),
  	    		);
  	$err_msg = '';

  	//
    $line_count = 0;//计数
    //框架，客户，人员相同标志
    $frameworks_flag = true;
    $account_flag = true;
    $contact_flag = true;
    $unpaiedAllAmount = 0;
    foreach ($data as  $line) {
      if($line){
       $AosInvoicesBean = BeanFactory::getBean('AOS_Invoices',$line);
       $result['return_data']['line_data'][$line_count]['invoices_id'] = $line;
       $result['return_data']['line_data'][$line_count]['line_amount'] = $AosInvoicesBean->unpaied_amount_c;
    	 if($line_count == 0){
    	   	$frameworks_id = $AosInvoicesBean->haa_frameworks_id_c;
    		  $account_id = $AosInvoicesBean->billing_account_id;
    		  $contact_id = $AosInvoicesBean->billing_contact_id;
    		  $currency_id = $AosInvoicesBean->currency_id;
    	 }else{
    		  if($frameworks_id != $AosInvoicesBean->haa_frameworks_id_c){
    			 $frameworks_flag = false;
    		  }
    		  if($account_id != $AosInvoicesBean->billing_account_id){
    			 $account_flag =false;
    	   	}
    		  if($contact_id != $AosInvoicesBean->billing_contact_id){
    			 $contact_flag = false;
    		  }
    	 }
        $unpaiedAllAmount =  $unpaiedAllAmount + $AosInvoicesBean->unpaied_amount_c;
    	  $line_count=$line_count+1;
      }
    }

    if($frameworks_flag == false){
    	$err_msg .= '必须是同一业务框架;';
    	$result['return_status'] = 'E';
    }
    if($account_flag == false){
    	$err_msg .= '必须是同一客户;';
      $result['return_status'] = 'E';
    }
    if($contact_flag == false){
    	$err_msg .= '必须是同一人员;';
      $result['return_status'] = 'E';
    }

    if($result['return_status']!='E'){
      $result['return_data']['haa_frameworks_id_c'] = $AosInvoicesBean->haa_frameworks_id_c;
      $result['return_data']['billing_contact_id'] = $AosInvoicesBean->billing_contact_id;
      $result['return_data']['billing_account_id'] = $AosInvoicesBean->billing_account_id;
      $result['return_data']['currency_id'] = $AosInvoicesBean->currency_id;
      $result['return_data']['unpaiedAllAmount'] = $unpaiedAllAmount;
    }
    $result['return_msg'] = $err_msg;
    return $result;
}



