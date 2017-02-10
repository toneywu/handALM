<?php
global $db;
$template_id=$_POST["id"];
$sql_template="SELECT
hctd.field_lable,
hctd.column_name,
hctd.field_type,
hctd.relate_module,
hctd.module_dsp,
hctd.list_name
FROM
hat_counting_task_templates_hat_counting_template_details_c h,
hat_counting_template_details hctd
WHERE
1 = 1
and h.deleted=0
and hctd.deleted=0
AND h.hat_countib27cdetails_idb = hctd.id
AND hctd.table_names = 'INV_DETAIL_RESULTS'
AND h.hat_countid917mplates_ida='".$template_id."'";

$result_template = $db->query($sql_template);
$attr_label =array();
$attr_data =array();
$attr_type =array();
$attr_module =array();
$attr_dsp =array();
$attr_name =array();
$num=0;
while ($row_template = $db->fetchByAssoc($result_template)) {
	$sql.="hcr.".$row_template["column_name"].",";
	$attr_label[$num]=$row_template["field_lable"];
	$attr_data[$num]=$row_template["column_name"];
	$attr_type[$num]=$row_template["field_type"];
	$attr_module[$num]=$row_template["relate_module"];
	$attr_dsp[$num]=$row_template["module_dsp"];
	$attr_name[$num]=$row_template["list_name"];
	$num++;
}
$arr_temp=array('attr_label'=>$attr_label,'attr_data'=>$attr_data,'attr_type'=>$attr_type);
echo json_encode($arr_temp);