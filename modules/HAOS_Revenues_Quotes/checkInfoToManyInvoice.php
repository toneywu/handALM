<?php
error_reporting(E_ALL);
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
	global $db,$app_list_strings;
	$cord_array=$_POST["data"];
	if (preg_match("/[']|[\"]/", $cord_array)) {//简单防止sql注入
		$sql='';
	}else{
		$cord_array=preg_split('/,/', $cord_array);
		foreach ($cord_array as $k => $v) {
			$cord_array[$k]="'".$cord_array[$k]."'";
		}
		$strAll=implode(',', $cord_array);
		
		//Add By osmond.liu 170108 
		//增加收支项状态验证
		$cleared_cnt=$db->getOne("select count(*) cnt from haos_revenues_quotes where id in(".$strAll.") and clear_status='Cleared'");
		if ($cleared_cnt>0){
			echo json_encode(array('type'=>-1));
		}
		else{ 
		    //End Add 170108			
			
			$sql="select contact_id_c,account_id_c,case when period_name = '' then '' when  period_name is null then '' else period_name end as period_name,haa_frameworks_id_c  from haos_revenues_quotes where id in(".$strAll.") group by contact_id_c,account_id_c,case when period_name = '' then '' when  period_name is null then '' else period_name end,haa_frameworks_id_c";
			$result=$db->query($sql);
			
			$account=array();
			while ($result_record = $db->fetchByAssoc($result)){
				$contact_id=$result_record["contact_id_c"];
				$account_id=$result_record["account_id_c"];
				$period_name = $result_record["period_name"];
				$haa_frameworks_id_c = $result_record["haa_frameworks_id_c"];

				$revSql="select id,contact_id_c,account_id_c,period_name  from haos_revenues_quotes where id in(".$strAll.") and contact_id_c='".$contact_id."' and account_id_c='".$account_id."' and (case when period_name = '' then '' when  period_name is null then '' else period_name end)='".$period_name."'";
				$revResult=$db->query($revSql);
				$idArr = array();
				while ($revResult_record = $db->fetchByAssoc($revResult)) {
					$idArr[]="'".$revResult_record['id']."'";
				}
				$str=implode(',', $idArr);
				
		 	   //add by hq 20170309 判断勾选有且只有一个合同
				$sourceTypeSql = 'select count(*) result,source_id from haos_revenues_quotes where id in('.$str.') and source_code="AOS_Contracts" group by source_id';
				$sourceTypeResult=$db->query($sourceTypeSql);
				$sourceCount=array();
				$name='';
				$source_id = '';
				$isOneContracts = 'N';
				while ($countResult = $db->fetchByAssoc($sourceTypeResult)){
					$sourceCount[]=$countResult["result"];	
					$source_id = $countResult["source_id"];				
				}

				if(sizeof($sourceCount) == 1 && $source_id!=''){
					$sourceSql = 'select source_code,source_reference from haos_revenues_quotes where deleted=0 and id in('.$str.') and source_code="AOS_Contracts" group by source_id';
					$sourceResult=$db->query($sourceSql);
					$source_code = '';
					$source_reference = '';
					while ($souResult = $db->fetchByAssoc($sourceResult)) {
						$source_code=$souResult["source_code"];	
						$source_reference=$souResult["source_reference"];			
					}
					
					$source_name = $app_list_strings['haos_source_code_list'][$source_code];
					if($source_name!='' && $source_reference!=''){
						$isOneContracts = 'Y';
						$name=$source_name.' '.$source_reference;
					}
				}

			    //end add 20170309

			   //add by hq 20170309 判断收支发生日期
				$event_date='';
				$eventDateSql='';
				$revenues_count=$db->getOne("select count(*) cnt from haos_revenues_quotes where id in(".$str.")");
				if ($revenues_count>1){
					$AOS_Contracts_count=$db->getOne('select min(event_date) from haos_revenues_quotes where id in('.$str.') and source_code="AOS_Contracts"');
					if($AOS_Contracts_count>=1){
						$eventDateSql = 'select min(event_date) min_event_date from haos_revenues_quotes where id in('.$str.') and source_code="AOS_Contracts"';
						$eventDateResult=$db->query($eventDateSql);
						while ($eventDate = $db->fetchByAssoc($eventDateResult)) {
							$event_date=$eventDate["min_event_date"];			
						}
					}	
				}else if($revenues_count==1){
					$eventDateSql = 'select event_date from haos_revenues_quotes where id in('.$str.')';
					$eventDateResult=$db->query($eventDateSql);
					while ($eventDate = $db->fetchByAssoc($eventDateResult)) {
						$event_date=$eventDate["event_date"];			
					}
				}	
				
			    //end add 20170309
			   // $InvoicesBean = BeanFactory :: newBean();
				
				$source_code_for_event ='HAOS_Revenues_Quotes';
				$eventtypeInfo = getEventTypeInfo($source_code_for_event);
				
				require_once('modules/AOS_Invoices/AOS_Invoices.php');
				$InvoicesBean = new AOS_Invoices();
				$InvoicesBean->source_code_c='HAOS_Revenues_Quotes';
				$InvoicesBean->name=$name;
				$InvoicesBean->hat_eventtype_id_c=$eventtypeInfo['eventTypeId'];
				$InvoicesBean->haa_frameworks_id_c=$haa_frameworks_id_c;
				$InvoicesBean->due_date=$event_date;
				$InvoicesBean->amount_c='0.0';
				$InvoicesBean->status='Unpaid';

				$InvoicesBean->billing_account_id=$account_id;
				$InvoicesBean->billing_contact_id=$contact_id;
				
				//$InvoicesBean->period_name_c=
				//$InvoicesBean->currency_id='-99';
				$InvoicesBean->saveFromManyRev();
				// $revSql="select hrq.id,hrq.contact_id_c,hrq.account_id_c,hrq.period_name,apq.id 'apqid'  from haos_revenues_quotes hrq,aos_products_quotes apq where hrq.deleted=0 and apq.deleted=0 and hrq.id=apq.parent_id and hrq.id in(".$str.") and hrq.contact_id_c='".$contact_id."' and hrq.account_id_c='".$account_id."' and (hrq.period_name='".$result_record["period_name"]."' or hrq.period_name is null)";
				$revSql2="select hrq.id,hrq.contact_id_c,hrq.account_id_c,hrq.period_name,apq.id 'apqid',apq.group_id  from haos_revenues_quotes hrq,aos_products_quotes apq where hrq.deleted=0 and apq.deleted=0 and hrq.id=apq.parent_id and hrq.id in(".$str.") order by hrq.haa_codes_id_c,apq.group_id";
				//var_dump('$revSql2:'.$revSql2);
				$revResult2=$db->query($revSql2);

				$currency_id = '';
				$total_amt=0;
				$total_amount = 0;
				$discount_amount = 0;
				$subtotal_amount = 0;
				$tax_amount = 0;
				
				$group_total_amt=0;
				$group_total_amount = 0;
				$group_discount_amount = 0;
				$group_subtotal_amount = 0;
				$group_tax_amount = 0;
				$groupId='';
				$groupFlag=false;
				$groupBean = new AOS_Line_Item_Groups();				

				while ($revResult2_record = $db->fetchByAssoc($revResult2)) {

					$revId=$revResult2_record['id'];
					$quoteId = $revResult2_record['apqid'];					
					$revBean=new HAOS_Revenues_Quotes();
					$revBean->retrieve($revId);
					$revBean->aos_invoices_id_c=$InvoicesBean->id;
					$revBean->clear_status='Cleared';
					$revBean->save();

					//$quotesBean = BeanFactory :: getBean('AOS_Products_Quotes',$quoteId);
					$QuoteGroupId='';
					$QuoteGroupType='';
					$groupsql = "SELECT hr.haa_codes_id_c FROM haos_revenues_quotes hr WHERE hr.deleted=0 and hr.id='".$revBean->id."' group by hr.haa_codes_id_c ORDER BY pg.number ASC";
					$groupResult = $db->query($groupsql);
					while ( $grow = $db->fetchByAssoc($groupResult)) {//分组->组下的条目
						if ($grow['haa_codes_id_c'] != null && $grow['haa_codes_id_c'] != '') {
							$QuoteGroupId=$grow['haa_codes_id_c'];
							$QuoteGroupType='HAA_Codes';
						}else if(isset($revResult2_record['group_id'])){
							$QuoteGroupId=$revResult2_record['group_id'];
						}
					}

					$quotesBean=new AOS_Products_Quotes();
					$quotesBean->retrieve($quoteId);
					
					$quotesBean->id='';
					$quotesBean->parent_id=$InvoicesBean->id;
					$quotesBean->date_entered=date('Y-m-d H:i:s');
					$quotesBean->parent_type='AOS_Invoices';
					$quotesBean->haos_revenues_quotes_id_c=$revId;
					//$quotesBean->group_id=$QuoteGroupId;
					$quotesBean->save();

					$currency_id = $quotesBean->currency_id;

					$quoteqty = isset($quotesBean->product_list_priceproduct_qty)?$quotesBean->product_list_priceproduct_qty:0;
					if($quoteqty==''){
						$quoteqty=0;
					}
					$quotelist = isset($quotesBean->product_list_price)?$quotesBean->product_list_price:0;
					if($quotelist==''){
						$quotelist=0;
					}
					$quoteunit =isset($quotesBean->product_unit_price)?$quotesBean->product_unit_price:0;
					if($quoteunit==''){
						$quoteunit=0;
					}
					$quotediscountType = $quotesBean->discount;
					$quotediscountAmt = isset($quotesBean->product_discount_amount)?$quotesBean->product_discount_amount:0;
					if($quotediscountAmt==''){
						$quotediscountAmt=0;
					}
					$quoteTotalAmt = isset($quotesBean->product_total_price)?$quotesBean->product_total_price:0;
					if($quoteTotalAmt==''){
						$quoteTotalAmt=0;
					}
					$quoteVatAmt = isset($quotesBean->vat_amt)?$quotesBean->vat_amt:0;
					if($quoteVatAmt==''){
						$quoteVatAmt=0;
					}
					// var_dump('id:'.$revResult2_record['apqid']);
					// var_dump('$quoteqty:'.$quoteqty);
					// var_dump('$quotelist:'.$quotelist);
					// var_dump('$quoteunit:'.$quoteunit);
					// var_dump('$quotediscountType:'.$quotediscountType);
					// var_dump('$quotediscountAmt:'.$quotediscountAmt);
					// var_dump('$quoteTotalAmt:'.$quoteTotalAmt);
					// var_dump('$quoteVatAmt:'.$quoteVatAmt);
					if($quoteTotalAmt != 0 && $quoteTotalAmt != null && $quoteTotalAmt!=''){
            			$total_amt =$total_amt+ $quoteTotalAmt;
       				}
       				if($quotediscountAmt != 0 && $quotediscountAmt != null && $quotediscountAmt!=''){
       					$discount_amount = $discount_amount+$quotediscountAmt;
       				}
       				if($quoteVatAmt != 0 && $quoteVatAmt != null && $quoteVatAmt!=''){
       					$tax_amount = $discount_amount+$quoteVatAmt;
       				}
       				$subtotal_amount = $total_amt+$discount_amount;
					$total_amount =$total_amt+$discount_amount+$tax_amount;

					// var_dump('$total_amt:'.$total_amt.';'.$quoteTotalAmt);
					// var_dump('$discount_amount:'.$discount_amount.';'.$quotediscountAmt);
					// var_dump('$tax_amount:'.$tax_amount.';'.$quoteVatAmt);
					// var_dump('$subtotal_amount:'.$subtotal_amount);
					// var_dump('$total_amount:'.$total_amount);

					//创建条目组					
					if(isset($QuoteGroupId) && !empty($QuoteGroupId)){
						if($groupId==$QuoteGroupId){
							
							$groupBean->id='';
							//$groupBean->name='';
							$groupBean->parent_type='AOS_Invoices';
							$groupBean->parent_id=$InvoicesBean->id;

							$group_total_amt=$group_total_amt+(isset($quoteTotalAmt)?$quoteTotalAmt:0);	
							$group_discount_amount =$group_discount_amount+(isset($quotediscountAmt)?$quotediscountAmt:0);
							$group_tax_amount =$group_tax_amount+ (isset($quoteVatAmt)?$quoteVatAmt:0);

							$group_subtotal_amount =  $group_total_amt+$group_discount_amount;
							$group_total_amount = $group_total_amt+$group_discount_amount+$group_tax_amount;

							$groupBean->total_amt=$group_total_amt;
							$groupBean->total_amount=$group_total_amount;
							$groupBean->discount_amount=$group_discount_amount;
							$groupBean->subtotal_amount=$group_subtotal_amount;
							$groupBean->tax_amount=$group_tax_amount;
						}else{
							if($groupFlag){
								
								$groupBean->save();
								$groupBean->id='';
								$groupBean->save();			
							}
							else{
								
								$groupBean->id='';
								$groupBean->save();	
							}
							
							if($QuoteGroupType=='HAA_Codes'){
								$groupBeanOld = new HAA_Codes();
								$groupBeanOld->retrieve($QuoteGroupId);
								$groupBean->name=$groupBeanOld->name;
							}else{
								$groupBeanOld = new AOS_Line_Item_Groups();
								$groupBeanOld->retrieve($QuoteGroupId);
								$groupBean->name=$groupBeanOld->name;
							}
							
							$groupFlag=true;
							
							$groupBean->currency_id=$currency_id;
							$groupBean->parent_type='AOS_Invoices';
							$groupBean->parent_id=$InvoicesBean->id;
							$groupId=$QuoteGroupId;

							$group_total_amt=isset($quoteTotalAmt)?$quoteTotalAmt:0;	
							$group_discount_amount = isset($quotediscountAmt)?$quotediscountAmt:0;
							$group_tax_amount = isset($quoteVatAmt)?$quoteVatAmt:0;

							$group_subtotal_amount =  $group_total_amt+$group_discount_amount;
							$group_total_amount = $group_total_amt+$group_discount_amount+$group_tax_amount;

							$groupBean->total_amt=$group_total_amt;
							$groupBean->total_amount=$group_total_amount;
							$groupBean->discount_amount=$group_discount_amount;
							$groupBean->subtotal_amount=$group_subtotal_amount;
							$groupBean->tax_amount=$group_tax_amount;
						}	
					}else{
						if(!$groupFlag){
							
							$groupBean->id='';
							$groupBean->save();
						}
						
						$groupFlag=true;						
						$groupBean->name='';
						$groupBean->currency_id=$currency_id;
						$groupBean->parent_type='AOS_Invoices';
						$groupBean->parent_id=$InvoicesBean->id;

						$group_total_amt=$group_total_amt+(isset($quoteTotalAmt)?$quoteTotalAmt:0);	
						$group_discount_amount =$group_discount_amount+(isset($quotediscountAmt)?$quotediscountAmt:0);
						$group_tax_amount =$group_tax_amount+ (isset($quoteVatAmt)?$quoteVatAmt:0);

						$group_subtotal_amount =  $group_total_amt+$group_discount_amount;
						$group_total_amount = $group_total_amt+$group_discount_amount+$group_tax_amount;

						$groupBean->total_amt=$group_total_amt;
						$groupBean->total_amount=$group_total_amount;
						$groupBean->discount_amount=$group_discount_amount;
						$groupBean->subtotal_amount=$group_subtotal_amount;
						$groupBean->tax_amount=$group_tax_amount;
					}


					//保存条目的组ID
					$quotesBean->group_id=$groupBean->id;
					$quotesBean->save();
					//
				}
				if($groupFlag){
					$groupBean->save();
				}
				//var_dump($total_amount);
				$InvoicesBean->total_amt=$total_amt;
				$InvoicesBean->total_amount=$total_amount;
				$InvoicesBean->discount_amount=$discount_amount;
				$InvoicesBean->subtotal_amount=$subtotal_amount;
				$InvoicesBean->tax_amount=$tax_amount;
				$InvoicesBean->unpaied_amount_c=$total_amount;
				$InvoicesBean->currency_id=$currency_id;
				$InvoicesBean->saveFromManyRev();
				// $sqlstr="select pg.id from aos_products_quotes pg LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id WHERE pg.deleted = 0 and pg.parent_id in(".$str.") ORDER BY lig.number ASC,pg.number ASC";
				// $results=$db->query($sqlstr);
				// $re_cords=array();
				// while ($record = $db->fetchByAssoc($results)) {
				// 	$re_cords[]=$record["id"];
				// }

				
				//echo json_encode(array('type'=>1,'value'=>$re_cords,'cord'=>$account,'name'=>$name,'event_date'=>$event_date));
				// if($isOneContracts == 'Y'){
				// 	$isOneContracts = 'Y';
				// 	echo json_encode(array('type'=>1,'value'=>$re_cords,'cord'=>$account,'name'=>$name,'isOneContracts'=>$isOneContracts));
				// }else{
				// 	$isOneContracts = 'N';
				// 	echo json_encode(array('type'=>1,'value'=>$re_cords,'cord'=>$account,'isOneContracts'=>$isOneContracts));
				// }

			}//结束循环
			ob_clean();
			echo json_encode(array('type'=>1));
		}
	}
	

function getEventTypeInfo($source_code_c){
	global $db;
	$EventTypeInfo = array();
	$tag = '';
	
	if($source_code_c=='HAOS_Revenues_Quotes'){
		$tag = 'Invoice';
	}else if($source_code_c=='AOS_Contracts'){
		$tag = 'Deposit';
	}

	$sql = 'select id,name from hat_eventtype
	where 1=1
	and tag="'.$tag.'"';
	$res = $db->query($sql);
	
	while($row = $db->fetchByAssoc($res)){
		$EventTypeInfo['eventTypeId'] = $row['id'];
		$EventTypeInfo['eventTypeName'] = $row['name'];
	}

	return $EventTypeInfo;
	
}
?>