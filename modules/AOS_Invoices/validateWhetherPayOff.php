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

 $accountId = $_POST['accountId'];
 $contactId = $_POST['contactId']; 
 $id_arr = $_POST['invoiceIdArr'];
 $frm_id = $_POST['frameworksId'];
 $return_result = validate($accountId,$contactId,$id_arr,$frm_id);
echo json_encode($return_result);

function validate($accountId,$contactId,$invoiceId,$frm_id){
    global $db;
    $return_result = array(
                  'return_status'=>'S',
                  'return_msg'=>'',
                  'return_data'=>array(),
                  );
              $err_msg = '';
    $idArrStr = implode("','",$invoiceId);

    $count = $db->getOne("select count(*) cnt 
                    from aos_invoices aoi,
                         aos_invoices_cstm aoic
                    where 1=1 
                    and aoi.deleted=0
                    and aoi.id=aoic.id_c
                    and aoic.haa_frameworks_id_c = '".$frm_id."'
                    and aoi.id not in('".$idArrStr."')
                    and aoi.billing_account_id='".$accountId."'
                    and aoi.billing_contact_id='".$contactId."'
                    and aoi.status in('PartedPaid','Unpaid')");
        
    if($count>0){
      $return_result['return_status'] = 'E';
      $return_result['return_msg'] = '以往租金包括未完全支付后剩余款项';
    }
    // $return_result['return_data']['sqlq'] = "select count(*) cnt 
    //                 from aos_invoices aoi,
    //                      aos_invoices_cstm aoic
    //                 where 1=1 
    //                 and aoi.deleted=0
    //                 and aoi.id=aoic.id_c
    //                 and aoic.haa_frameworks_id_c = '".$frm_id."'
    //                 and aoi.id not in('".$idArrStr."')
    //                 and aoi.billing_account_id='".$accountId."'
    //                 and aoi.billing_contact_id='".$contactId."'
    //                 and aoi.status in('PartedPaid','Unpaid')";
    return $return_result;  
  }


 