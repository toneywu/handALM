<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2017 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */


class HAOS_Payments extends Basic
{
    public $new_schema = true;
    public $module_dir = 'HAOS_Payments';
    public $object_name = 'HAOS_Payments';
    public $table_name = 'haos_payments';
    public $importable = true;

    public $id;
    public $name;
    public $date_entered;
    public $date_modified;
    public $modified_user_id;
    public $modified_by_name;
    public $created_by;
    public $created_by_name;
    public $description;
    public $deleted;
    public $created_by_link;
    public $modified_user_link;
    public $assigned_user_id;
    public $assigned_user_name;
    public $assigned_user_link;
    public $SecurityGroups;
    public $haa_frameworks_id_c;
    public $frameworks;
    public $payment_date;
    public $haa_periods_id_c;
    public $period_name;
    public $currency_id;
    public $payment_amount;
    public $payment_amount_usdollar;
    public $payment_method_type;
    public $contact_id_c;
    public $responsible_person;
    public $payment_status;
    public $account_id_c;
    public $cust_account_name;
    public $hpr_am_roles_id_c;
    public $contact_number;

    public function bean_implements($interface)
    {
        switch($interface)
        {
            case 'ACL':
            return true;
        }

        return false;
    }


    function __construct(){
        parent::__construct();
    }

   

    function save($check_notify = FALSE){
        global $sugar_config;

        // if ($this->batch_number == '') {
        //  $bean_frameworks = BeanFactory :: getBean('HAA_Frameworks', $this->haa_frameworks_id_c);//以参数传值时只能传ID值，否则发创建Bean，因此用以下方法创建。
        //  $bean_numbering = BeanFactory :: getBean('HAA_Numbering_Rule',$bean_frameworks->haa_asset_counting_rule_id);
        //  if (!empty($bean_numbering)) {
        //          //取得当前的编号
        //      $this->batch_number = $bean_numbering->nextval;
        //          //预生成下一个编号，并保存在$bean_numbering中
        //      $current_number = ($bean_numbering->current_number) + 1;
        //      $current_numberstr = "" . $current_number;
        //      $padding_str = "";
        //      for ($i = 0; $i < ($bean_numbering->min_num_strlength); $i++) {
        //          $padding_str = $padding_str +"0";
        //      }
        //      $padding_str = substr($padding_str, 0, strlen($padding_str) - strlen($current_numberstr)) + $current_numberstr;
        //      $nextval_str = ($bean_numbering->perfix) . $padding_str;
        //      $bean_numbering->current_number = $current_number;
        //      $bean_numbering->nextval = $nextval_str;
        //      $bean_numbering->save();
        //  }
        // }
        require_once('modules/AOS_Products_Quotes/AOS_Utils.php');
        perform_aos_save($this);

    
            $sql = "SELECT
             perl.id,
             perl.name
           from 
             haa_period_sets perh,
             haa_periods perl
           where 1=1
           and perh.deleted = 0
           and perl.deleted = 0
           and perh.haa_frameworks_id_c = '".$this->haa_frameworks_id_c."'
           and perh.enabled_flag = 1
           and perh.id = perl.haa_period_sets_id_c
           and perl.start_date <= '".$this->payment_date."'
           and perl.end_date >= '".$this->payment_date."'"
           ;
        $result = $this->db->query($sql);
           while ($row = $this->db->fetchByAssoc($result)) {
            //$line_data = json_encode($row);
            $this->haa_periods_id_c = $row['id'];
            $this->period_name = $row['name'];
         }


        //$this->name =  $this->calendar_name;
        $this->id=parent::save($check_notify);
        $post_data=$_POST;
        $line_count = isset($post_data['line_deleted']) ? count($post_data['line_deleted']) : 0;
        
        for ($i = 0; $i < $line_count; ++$i) {
            $key="line_";
            $lines = new HAOS_Payment_Invoices();
            if ($post_data[$key . 'deleted'][$i] == 1) {
                $lines->mark_deleted($post_data[$key . 'id'][$i]);
            } else {
                foreach ($lines->field_defs as $field_def) {
                    $field_name = $field_def['name'];
                    if (isset($post_data[$key . $field_name][$i])) {
                        $lines->$field_name = $post_data[$key . $field_name][$i];
                    }
                }
                $lines->currency_id=$this->currency_id;
                $lines->aos_invoices_id_c = $post_data['line_invoice_id'][$i];
                $lines->haos_payments_id_c = $this->id;
                 //$lines->name = $post_data[$key .'period_name'][$i];;
                // var_dump($lines->sort_order);
                perform_aos_save($lines);
                $lines->save($check_notify);

               $this->updateInvPayStatus($post_data['line_invoice_id'][$i]);
            }
        }
        
    }


    function updateInvPayStatus($id){
   
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
        sum(payl.amount) amount
        from 
        haos_payment_invoices payl,
        aos_invoices ainv
        where 1=1
        and payl.deleted = 0
        and ainv.deleted = 0
        and payl.aos_invoices_id_c = ainv.id
        and ainv.id='".$id."'";

        $result = $this->db->query($sql);
        while ($row = $this->db->fetchByAssoc($result)) {
            $payAmount = $row['amount'];
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
  



    function get_list_view_data(){
        $fields = $this->get_list_view_array();
         //获取当前记录的PRODUCT_ID获取产品数据库记录
        $bean_contact= BeanFactory::getBean('Contacts', $this->contact_id1_c);
        //var_dump($this->contact_id1_c);
        if ($bean_contact) {
            $sql = "SELECT
             cc.employee_number_c,
             cc.chinese_name_c,
             ct.name
           from contacts_cstm cc,
                contacts ct
           where 1=1
           and ct.id = cc.id_c
           and ct.deleted=0
           and cc.id_c ='".$this->contact_id1_c."'"
           ;
            // and ha.id  ='".$focus->id."'"


           $result = $this->db->query($sql);
           //var_dump($sql);
           while ($row = $this->db->fetchByAssoc($result)) {
             //$line_data = json_encode($row);
             $fields['CONTACT_NUMBER'] = $this->bean->contact_number = $row['employee_number_c']; 
             $fields['CONTACT_NAME'] = $this->bean->contact_name =$row['name'];
             //
             }

            //$fields['CONTACT_NUMBER']  = $this->bean->name;
           
         

            // $fields['CONTACT_NUMBER'] = $this->bean->contact_number = isset($bean_contact->employee_number_c)?$bean_contact->employee_number_c:''; 

            // $fields['CONTACT_NAME'] = $this->bean->contact_name = isset($bean_contact->chinese_name_c)?$bean_contact->chinese_name_c:''; 
           //根据产品的类别ID获取产品类别数据库记录
            // $bean_category = BeanFactory::getBean('AOS_Product_Categories', $bean_contact->aos_product_category_id);
            // if ($bean_category) { 
            // //赋值
            //     $fields['PRODUCT_CATEGORY'] = $this->bean->product_category = isset($bean_category->name)?$bean_category->name:''; 
            // }
      }
      return $fields;
  }



}
