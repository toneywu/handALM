<?php

function display_lines($focus,$field,$value,$view){

	$html='';
	if($view=='EditView'){
		$html.='<script src="modules/HAOS_Insurance_Claims/line_items.js"></script>';
		$html.="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>";
		$html.='<script>insertLineHeader(\'lineItems\');</script>';
		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			$sql="SELECT
			hicl.id,
			hi.name relate_insurance_number,
			hicl.haos_insurances_id_c, 
			hicl.claim_amount,
			hicl.other_side_amount,
			hicl.gap_amount,
			hicl.actual_amount,
			hicl.other_side_act_amt,
			hicl.document_ready_flag,
			hicl.document_deliver_date,
			hicl.premium_payment_date,
			hicl.gap_payment_date,
			hicl.accident_experience,
			hicl.additional_comments   
			FROM
			haos_insurance_claims_haos_insurance_claims_lines_c hhc,
			haos_insurance_claims_lines hicl,
			haos_insurances hi
			WHERE hicl.deleted=0
			AND hicl.haos_insurances_id_c=hi.id
			AND hhc.haos_insurf06es_lines_idb = hicl.id
			AND hhc.haos_insurefcc_claims_ida='".$focus->id."'";
			$result=$focus->db->query($sql);
			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				$html.="<script>insertLineData(".$line_data.");</script>";
			}
		}
		$html.='<script>insertLineFootor(\'lineItems\');</script>';
	}else if($view=='DetailView'){
	}
	return $html;
}