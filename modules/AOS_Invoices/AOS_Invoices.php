<?php
/**
 * Products, Quotations & Invoices modules.
 * Extensions to SugarCRM
 * @package Advanced OpenSales for SugarCRM
 * @subpackage Products
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
 * @author Salesagility Ltd <support@salesagility.com>
 */

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/AOS_Invoices/AOS_Invoices_sugar.php');
class AOS_Invoices extends AOS_Invoices_sugar {

	function __construct(){
		parent::__construct();
	}

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    function AOS_Invoices(){
      $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
      if(isset($GLOBALS['log'])) {
        $GLOBALS['log']->deprecated($deprecatedMessage);
      }
      else {
        trigger_error($deprecatedMessage, E_USER_DEPRECATED);
      }
      self::__construct();
    }


    function save($check_notify = FALSE){
      global $sugar_config;
         // var_dump($this);
         // exit();
      if (empty($this->id)  || $this->new_with_id){


            //add by hq 20170317             
        if(isset($_POST['revenues_source_code_id'])&&isset($_POST['revenues_source_code_c'])&& !empty($_POST['revenues_source_code_c'])&& !empty($_POST['revenues_source_code_id'])){
          if($_POST['revenues_source_code_c']=='AOS_Contracts'){ 
            $_POST = $this->createRevenueFromContracts($_POST);
            // var_dump($_POST);
            // exit();
          }else{              
            $_POST = $this->createHaosRevenueQuotes($_POST);
          }
        }
            //end add 20170317

        if(isset($_POST['group_id'])) unset($_POST['group_id']);
        if(isset($_POST['product_id'])) unset($_POST['product_id']);
        if(isset($_POST['service_id'])) unset($_POST['service_id']);

        if($sugar_config['dbconfig']['db_type'] == 'mssql'){
          $this->number = $this->db->getOne("SELECT MAX(CAST(number as INT))+1 FROM aos_invoices");
        } else {
          $this->number = $this->db->getOne("SELECT MAX(CAST(number as UNSIGNED))+1 FROM aos_invoices");
        }

        if($this->number < $sugar_config['aos']['invoices']['initialNumber']){
          $this->number = $sugar_config['aos']['invoices']['initialNumber'];
        }
             //
        $this->status = $_POST['status_hide'];
        $this->amount_c =$_POST['amount_c_hide'];
             //
      }
        // var_dump($_POST);
        // exit();
      require_once('modules/AOS_Products_Quotes/AOS_Utils.php');      

      perform_aos_save($this);

      parent::save($check_notify);

      require_once('modules/AOS_Line_Item_Groups/AOS_Line_Item_Groups.php');
      $productQuoteGroup = new AOS_Line_Item_Groups();
      $productQuoteGroup->save_groups($_POST, $this, 'group_');
    }

    //add by hq 20170317----------
    function createRevenueFromContracts($post_data){
     // require_once('modules/AOS_Contracts/createRevenueFromContract.php');
      // $ccccc = 0;
      // $dddd = 0;
      $post_data = $this->createRevenueFromContract($post_data,'2','product_');
      $post_data = $this->createRevenueFromContract($post_data,'2','service_');

      //var_dump($ccccc);
      // var_dump($post_data);
      // exit();
      return $post_data;
    }

    function createRevenueFromContract($post_data,$type,$key){
      global $db;
      
      require_once('modules/HAOS_Revenues_Quotes/createRevenue.php');
      $contract = new AOS_Contracts();
      $contract->retrieve($post_data['revenues_source_code_id']);
      if ($contract->status!='Signed' and $type==0){
        die('已签约的合同才能创建收支计费项!');
      }else if ($contract->status!='Signed' and $type==1){
        die('已签约的合同才能收取预付款!');
      }else if ($contract->status!='Signed' and $type==2){
        die('已签约的合同才能收取押金!');
      }


      $rawRow['haa_frameworks_id_c'] = $contract->haa_frameworks_id_c;
      $rawRow['revenue_quote_number'] = '';
      $rawRow['clear_status'] = 'Unclear';

      $rawRow['source_code'] = 'AOS_Contracts';
      $rawRow['source_id'] = $contract->id;
      $rawRow['source_reference'] = $contract->contract_number_c;
      $rawRow['contact_id_c'] = $contract->contact_id;
      $rawRow['account_id_c'] = $contract->contract_account_id;
      
      $line_count = isset($post_data[$key . 'name']) ? count($post_data[$key . 'name']) : 0;
      $j = 0;
      for ($i = 0; $i < $line_count; ++$i) {


        $quoteBean = new AOS_Products_Quotes();
        $quoteBean->retrieve($post_data[$key.'id'][$i]);
        //var_dump($post_data[$key . 'id'][$i]);
        if ($quoteBean->settlement_period_c=='Once'&&$quoteBean->final_account_day_c!='') {
          continue;
        }
        $next_account_day_old=date_format(date_create($quoteBean->next_account_day_c),"Y-m-d");
        if ($quoteBean->settlement_period_c=='Monthly') {
          if ($quoteBean->effective_end_c!=''&&$quoteBean->effective_end_c<$next_account_day_old){
            continue;
          }
          else{
            $next_account_day_new=date('Y-m-d',strtotime("{$next_account_day_old} +1 month"));
            $quoteBean->next_account_day_c=$next_account_day_new;
          }
          $revenues_count = $db->getOne("select count(*) cnt from haos_revenues_quotes where 1=1 and aos_source_products_quotes_id_c='".$quoteBean->id."' and source_code='AOS_Contracts' and source_id='".$contract->id."'");
          if($revenues_count>=$quoteBean->number_of_periods_c){
            continue;
          }
        }

        $rawRow['aos_source_products_quotes_id_c'] = $quoteBean->id;

        $groupBean=BeanFactory::getBean('AOS_Line_Item_Groups',$quoteBean->group_id);
        $rawRow['expense_group'] = $groupBean->name;
        $rawRow['prepay_flag'] = $quoteBean->prepay_flag_c;
        $rawRow['deposit_flag'] = $quoteBean->deposit_flag_c;
        $rawRow['name'] = $contract->name.'-'.$groupBean->name.'-收支';
        $rawRow['event_date'] = $next_account_day_old;
    //add by tangqi 20172024 获取期间字段

        $sql="SELECT
        hp.`name`
        FROM
        haa_frameworks hf,
        haa_period_sets hps,
        haa_periods hp
        WHERE 1=1
        and hf.deleted=0
        and hps.deleted=0
        and hp.deleted=0
        and hf.haa_period_sets_id_c=hps.id
        and hps.id=hp.haa_period_sets_id_c
        and hp.start_date<='".$next_account_day_old."'".
        "and hp.end_date>='".$next_account_day_old."'".
        "and hf.id='".$contract->haa_frameworks_id_c."'";

        //var_dump($sql);

        $result=$db->query($sql);
        $row=$db->fetchByAssoc($result);  
        $rawRow['period_name']=$row['name']; 
        $quoteBean->final_account_day_c=$rawRow['event_date'];
        $quoteRow=$quoteBean->fetched_row;
       
        if ($quoteRow['product_id']!=''&&$quoteRow['product_id']!='0'){
          $quoteRow['line_item_type_c']='Product';
        }
        else{
          $quoteRow['line_item_type_c']='Service';
        }
        
        $haos_revenues_quotes_id=$this->createRevenueFC($rawRow,$quoteRow);
        
        $quoteBean->save();
       
          //$idArray[]=$haos_revenues_quotes_id;
        $revenueSql='select aop.id from AOS_Products_Quotes aop where aop.parent_id="'.$haos_revenues_quotes_id.'"';
        $sqlResult=$this->db->query($revenueSql);
        while ($row =$this->db->fetchByAssoc($sqlResult)) {
          $ProductId =$row['id'];
        }

        //var_dump('proID:'.$ProductId);
        $product_quote = new AOS_Products_Quotes();
        $product_quote->retrieve($ProductId);
        $product_quote->haos_revenues_quotes_id_c=$haos_revenues_quotes_id;
        $product_quote->save();

        $post_data[$key .'haos_revenues_quotes_id_c'][$i] = $haos_revenues_quotes_id;
      }

      return $post_data;
    }

    function createRevenueFC($revenueRow,$quoteRow){
    require_once('modules/HAOS_Revenues_Quotes/HAOS_Revenues_Quotes.php');
    require_once('modules/AOS_Products_Quotes/AOS_Products_Quotes.php');
//Setting Revenue Values
    $revenue = new HAOS_Revenues_Quotes();
    $revenueRow['id'] = '';
    $revenueRow['haa_frameworks_id_c'] = $revenueRow['haa_frameworks_id_c'];
    $revenueRow['prepay_flag'] = $revenueRow['prepay_flag'];
    $revenueRow['deposit_flag'] = $revenueRow['deposit_flag'];
    $revenueRow['revenue_quote_number'] = '';
    $revenueRow['date_entered'] = ''; 
    $revenueRow['date_modified'] = '';
    $revenueRow['period_name'] = $revenueRow['period_name'];
    //处理事件类型
    if ($revenueRow['event_type']!=''){
        $bean_types = BeanFactory :: getBean('HAT_EventType')->retrieve_by_string_fields(array (
            'name' =>  $revenueRow['event_type'],
            'basic_type' => 'REVENUE'
            ));
        if ($bean_types) { 
            $revenueRow['hat_eventtype_id_c']= isset($bean_types->id)?$bean_types->id:'';
            $revenueRow['event_type'] = $revenueRow['event_type'] ;
        }
        else{
            $revenueRow['event_type'] = '';
            $revenueRow['hat_eventtype_id_c']= '';
        }
    }
    else { 
        $bean_types = BeanFactory :: getBean('HAT_EventType')->retrieve_by_string_fields(array (
            'event_short_desc' => 'default',
            'basic_type' => 'REVENUE'
            )); 
        if ($bean_types) { 
            $revenueRow['hat_eventtype_id_c']= isset($bean_types->id)?$bean_types->id:'';
            $revenueRow['event_type'] = isset($bean_types->name)?$bean_types->name:'' ;
        }
        else{
            $revenueRow['event_type'] = '';
            $revenueRow['hat_eventtype_id_c']= '';
        }
    }
//处理费用组
    $bean_codes = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
        'name' =>  $revenueRow['expense_group'],
        'code_module'=>'revenue'
        ));
    if ($bean_codes) { 
        $revenueRow['haa_codes_id_c']= isset($bean_codes->id)?$bean_codes->id:'';
        $revenueRow['expense_group']=$revenueRow['expense_group'];
    }
    else{
        $revenueRow['expense_group'] = '';
        $revenueRow['haa_codes_id_c']= '';
    }

    $revenue->populateFromRow($revenueRow);
    $revenue->process_save_dates =false; 
    $revenue->hat_eventtype_id_c =$revenueRow['hat_eventtype_id_c'];
    $revenue->source_id = $revenueRow['source_id'];
    $revenue->save(false,false);
    $revenue_quote_id=$revenue->id;

//Setting Quote Items
   
    $quote = new AOS_Products_Quotes();
    $quoteRow['id'] = '';
    $quoteRow['parent_id']=$revenue_quote_id;
    $quoteRow['parent_type']='HAOS_Revenues_Quotes';
    if($quoteRow['line_item_type_c']=='Service'){
        $quoteRow['product_id']='0';
    }
    $quote->populateFromRow($quoteRow);
    $quote->process_save_dates =false;

    $quote->save();

    return $revenue_quote_id;
}

    function createHaosRevenueQuotes($post_data){
      $post_data=$this->updateAOSProductsQuotes($post_data, 'product_');
      $post_data=$this->updateAOSProductsQuotes($post_data, 'service_');
      return  $post_data;
    }

    function createInvoiceRevenue($post_data){
      $haos_revenues_id='';

      if($_POST['revenues_source_code_c']=='HAT_Asset_Trans_Batch'){   

        require_once('modules/HAT_Asset_Trans_Batch/createRevenueFromAT.php');
        $result = createRevenueFromAT($post_data['revenues_source_code_id']);
        $haos_revenues_id = $result['return_data']['haos_revenues_quotes_id'];

      }else if($_POST['revenues_source_code_c']=='HAM_WO'){

       require_once('modules/HAM_WO/createRevenueFromWONew.php');
       $result = createRevenueFromWO($post_data['revenues_source_code_id']);
       $haos_revenues_id = $result['return_data']['haos_revenues_quotes_id'];

     }else if($_POST['revenues_source_code_c']=='HAT_Incidents'){

       require_once('modules/HAT_Incidents/createRevenueFromHI.php');
       $result = createRevenueFromHI($post_data['revenues_source_code_id']);
       $haos_revenues_id = $result['return_data']['haos_revenues_quotes_id'];

     }else if($_POST['revenues_source_code_c']=='HAOS_Insurance_Claims'){

      require_once('modules/HAOS_Insurance_Claims/createRevenueFromClaim.php');
      $result = createRevenueFromClaim($post_data['revenues_source_code_id']);
      $haos_revenues_id = $result['return_data']['haos_revenues_quotes_id'];

    }


    return $haos_revenues_id;
  }

  function updateAOSProductsQuotes($post_data, $key = '')
  {  

    $line_count = isset($post_data[$key . 'name']) ? count($post_data[$key . 'name']) : 0;
    $j = 0;
    for ($i = 0; $i < $line_count; ++$i) {

      $post_data[$key .'haos_revenues_quotes_id_c'][$i]='';

      if($post_data[$key . 'deleted'][$i] == 1) { 
      }else{

        $revenuesId = $this->createInvoiceRevenue($post_data);

        $sql='select aop.id from AOS_Products_Quotes aop where aop.parent_id="'.$revenuesId.'"';
        $sqlResult=$this->db->query($sql);
        $ProductId ='';
        while ($row =$this->db->fetchByAssoc($sqlResult)) {
          $ProductId =$row['id'];
        }

        $product_quote = new AOS_Products_Quotes();
        $product_quote->retrieve($ProductId);
        $product_quote->haos_revenues_quotes_id_c=$revenuesId;
        $product_quote->vat=$post_data[$key .'vat'][$i];
        $product_quote->product_total_price=$post_data[$key .'product_total_price'][$i];
        $product_quote->product_list_price=$post_data[$key .'product_list_price'][$i];
        $product_quote->product_unit_price=$post_data[$key .'product_unit_price'][$i];
        $product_quote->vat_amt=$post_data[$key .'vat_amt'][$i];
        $product_quote->product_discount=$post_data[$key .'product_discount'][$i];
        $product_quote->discount=$post_data[$key .'discount'][$i];
        $product_quote->product_discount_amount=$post_data[$key .'product_discount_amount'][$i];
        $product_quote->deposit_flag_c=$post_data[$key .'deposit_flag_c'][$i];
        $product_quote->prepay_flag_c=$post_data[$key .'prepay_flag_c'][$i];
        $product_quote->item_description=$post_data[$key .'item_description'][$i];
        $product_quote->description=$post_data[$key .'description'][$i];

        $product_quote->currency_id=$post_data['currency_id'];
        $product_quote->save();


                // var_dump($product_quote);
                // exit();
                // foreach ($product_quote->field_defs as $field_def) {
                //     $field_name = $field_def['name'];
                //     if (isset($post_data[$key . $field_name][$i])) {
                //         $product_quote->$field_name = $post_data[$key . $field_name][$i];
                //     }
                // }
                // $product_quote->parent_id = $revenuesId;
                // $product_quote->haos_revenues_quotes_id_c=$revenuesId;
                // $product_quote->save();

        $post_data[$key .'haos_revenues_quotes_id_c'][$i] = $revenuesId;
                //$post_data[$key .'id'][$i]=$product_quote->id;              
      }
    }
    return $post_data;
  }
   //end add 20170317

  function mark_deleted($id)
  {
    $productQuote = new AOS_Products_Quotes();
    $productQuote->mark_lines_deleted($this);
    parent::mark_deleted($id);
  }
}
?>
