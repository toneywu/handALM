<?php
/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/HAM_WO/HAM_WO_sugar.php');
class HAM_WO extends HAM_WO_sugar {
	
	function save($check_notify=false){
		
		
		//在保存之前通过getNumbering生成WO编号
		// 用于产生自动编号
    	if ($this->wo_number=='') {
    		$bean_site = BeanFactory::getBean('HAM_Maint_Sites',$this->ham_maint_sites_id);
			$bean_numbering = BeanFactory::getBean('HAA_Numbering_Rule',$bean_site->wo_haa_numbering_rule_id);

			if (!empty($bean_numbering)) {
			    //取得当前的编号
			    $this->wo_number=$bean_numbering->nextval;
			    //预生成下一个编号，并保存在$bean_numbering中
			    $current_number    =    $bean_numbering->current_number +1;
		        $current_numberstr = "".$current_number;
		        $padding_str ="";
		        for($i=0; $i<$bean_numbering->min_num_strlength; $i++) {
		        	$padding_str =  $padding_str+ "0";
		        }

		        $padding_str = substr($padding_str,0, strlen($padding_str) - strlen($current_numberstr)) + $current_numberstr;
		        $nextval_str = $bean_numbering->perfix.$padding_str;
		        $bean_numbering->current_number = $current_number;
				$bean_numbering->nextval = $nextval_str;
				$bean_numbering->save();
	    	}
		}

		// 在资产事务处理保存时判断，如果事务处理的行状态达标，则更新资产状态
		$focus_wo_status = $this->wo_status;
		if ($focus_wo_status=='SUBMITTED') {
				$this->wo_status = 'APPROVED';
			//TODO:以后再加入真正的工作流判断，临时只要提交都会通过
		} else if ($focus_wo_status=='APPROVED') {
		}
		
		     parent::save($check_notify); //保存WO主体
		
			//add by yuan.chen@2016-07-22
			$bean_id = $this->activity;
			echo "bean_id".$bean_id;
			//活动头
		    $ham_act = BeanFactory::getBean('HAM_ACT', $bean_id);
		
			$ham_act_op = BeanFactory::newBean('HAM_ACT_OP');
			$ham_act_ops = $ham_act_op->get_full_list('',"ham_act_op.ham_act_id ='".$bean_id."'");
			
			$checkBean = BeanFactory::getBean("HAM_WOOP");
			$ham_woops = $checkBean->get_full_list('',"ham_woop.ham_wo_id ='".$this->id."'");
			
			if(count($ham_woops)==0){
			
			if($ham_act_ops!=null){
				$index=1;
				$pre_date_target_finish=null;
				$pre_date_schedualed_finish=null;
				
				foreach ($ham_act_ops as $ham_act_op) {   
					$ham_woop = BeanFactory::getBean('HAM_WOOP');
					$ham_woop->name=$ham_act_op->name;
					$ham_woop->woop_status=$ham_act_op->activity_status;
					$ham_woop->ham_work_center_id=$ham_act_op->sr_work_center_rule_id;
					$ham_woop->work_center_res_id=$ham_act_op->work_center_res_id;
					$ham_woop->ham_wo_id=$this->id;
					$ham_woop->woop_number=$ham_act_op->activity_op_number;
				    //$ham_woop->description=$this->name;
				if($index==1){
					$ham_woop->date_target_start=$this->date_target_start;
					$ham_woop->date_target_finish=$this->date_target_finish;
					$ham_woop->date_schedualed_start=$this->date_schedualed_start;
					$ham_woop->date_schedualed_finish=$this->date_schedualed_finish;
					$pre_date_target_finish=$this->date_target_finish;
					$pre_date_schedualed_finish=$this->date_schedualed_finish;
					echo "woop_number=".$ham_woop->woop_number."<br>";
					echo "ham_woop->date_target_finish".$ham_woop->date_target_finish."<br>";
					echo "ham_woop->date_schedualed_finish".$ham_woop->date_schedualed_finish."<br>";
				}else{
					$ham_woop->date_target_start=$pre_date_target_finish;
					$ham_woop->date_schedualed_start=$pre_date_schedualed_finish;
					//计划开始时间+Duration后，计划出计划完成时间
					$ham_woop->date_target_finish=$this->get_finish_date($pre_date_target_finish,$ham_act_op->standard_hour);
					$ham_woop->date_schedualed_finish=$this->get_finish_date($pre_date_schedualed_finish,$ham_act_op->standard_hour);
					echo "woop_number=".$ham_woop->woop_number."<br>";
					echo "ham_woop->date_target_finish".$ham_woop->date_target_finish."<br>";
					echo "ham_woop->date_schedualed_finish".$ham_woop->date_schedualed_finish."<br>";
					
					$pre_date_target_finish=$ham_woop->date_target_finish;
					$pre_date_schedualed_finish=$ham_woop->date_schedualed_finish;
				}
				
					echo "pre_date_target_finish=".$pre_date_target_finish."<br>";
					echo "pre_date_schedualed_finish=".$pre_date_schedualed_finish."<br>";
					echo "duration=".$ham_act_op->standard_hour."<br>";	
				
					$ham_woop->autoOpen_next_task=$ham_act_op->autoopen_next_task;
					$ham_woop->act_module=$ham_act_op->act_module;
					$ham_woop->save();
					$index++;
			}	
		  }
		}
		//end by yuan.chen@2016-07-22	
		//add by yuan.chen@2016-07-31
		    $contract_id = $this->contract_id;
			echo "<br> contract_id=".$contract_id;
			//合同
		    $contacts_bean = BeanFactory::getBean('AOS_Contracts', $contract_id);
		
			$contact_products_bean = BeanFactory::newBean('AOS_Products_Quotes');
			$contact_products_beans = $contact_products_bean->get_full_list('',"aos_products_quotes.parent_id ='".$contract_id."'");
			
			$check_wo_line = BeanFactory::getBean("HAM_WO_Lines");
			//importantent
			$check_wo_lines = BeanFactory::getBean('HAM_WO_Lines')->get_full_list('', "ham_wo_lines.contract_id = '{$this->contract_id}' AND ham_wo_lines.ham_wo_id = '{$this->id}'");
			
			if(count($check_wo_lines)==0){
				
				if($contact_products_beans!=null){
				foreach ($contact_products_beans as $contact_products_bean) {  
					$ham_wo_line = BeanFactory::getBean('HAM_WO_Lines');
					$ham_wo_line->contract_id=$this->contract_id;
					$ham_wo_line->ham_wo_id=$this->id;
					$ham_wo_line->product_id=$contact_products_bean->product_id;
					$ham_wo_line->quantity=$contact_products_bean->product_qty;
					$ham_wo_line->uom_id=$contact_products_bean->product_qty;
					//通过产品 找到 单位 
					
					$product_bean =  BeanFactory::getBean("AOS_Products",$contact_products_bean->product_id);
					/*foreach($product_bean as $key=>$value){
						echo "<br> key = ".$key."--->".var_dump($value);
					}*/
					$ham_wo_line->uom_id=$product_bean->haa_uom_id_c;
					$ham_wo_line->save();
				}
			  }
			}		
		//die();
	
		//工作单保存之后，将对应的SR关联到工作单上
		//TODO：SR状态可能是WORKING或是完成
        if ($this->source_type == "SR" & !empty($this->source_id)) { //将对应的SR进行关联
			$bean_sr = BeanFactory::getBean('HAM_SR',$this->source_id);
			$bean_sr->ham_wo_id = $this->id;
			$bean_sr->sr_status = "WORKING";
			$bean_sr->save();
		}

	}
	
	function get_finish_date($star_date,$duration){
		$finishi_date=null;
		
		if(empty($duration)){
			$duration=0;
		}
		
		if(empty($star_date)){
			$finishi_date=null;
		}else{
			$finishi_date=date("Y-m-d  H:i:s",strtotime("$star_date   +$duration   hour"));
		}
		//echo   "start_date = ".date("Y-m-d  H:i:s",strtotime("$star_date   +$duration   hour"))+"<br>";
		
		echo "get_finish_date====>start_date = ".$star_date.",duration=".$duration.",finishi_date=".$finishi_date."<br>";
		return $finishi_date;
	}

	function get_list_view_data(){
	//refer to the task module as an example
	//or refer to the asset module as the first customzation module with this feature
	global $app_list_strings, $timedate;

		$WO_fields = $this->get_list_view_array();
		//为工作单的状态着色
		if (!empty($this->wo_status))
			$WO_fields['WO_STATUS'] = "<span class='color_tag color_doc_status_{$this->wo_status}'>".$app_list_strings['ham_wo_status_list'][$this->wo_status]."</span>";

		return $WO_fields;
	}

	
	function __construct(){
		parent::__construct();
	}
	
}
?>