<?php
//本文件被 js/HAT_Asset_Trans_Batch_editview.js以Ajax的形式调用

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*global $db;
$sql = "SELECT
		hnr.nextval
		FROM
		haa_numbering_rule hnr,
		haa_frameworks hf
		WHERE
		hnr.id = hf.haa_at_numbering_rule_id
		AND hf.id = '".$_REQUEST['haa_frameworks_id']."'";
$trackNumber='';
$result = $db->query($sql);
while ($row = $db->fetchByAssoc($result)) {
    $trackNumber = $row['nextval'];
}*/
   $trackNumber='';
   $bean_frame = BeanFactory :: getBean('HAA_Frameworks', $_REQUEST['haa_frameworks_id']);
   $bean_numbering = BeanFactory :: getBean('HAA_Numbering_Rule', $bean_frame->haa_at_numbering_rule_id);

	if (!empty ($bean_numbering)) {
				//取得当前的编号
	$trackNumber = $bean_numbering->nextval;
	//预生成下一个编号，并保存在$bean_numbering中
	$current_number = $bean_numbering->current_number + 1;
	$current_numberstr = "" . $current_number;
	$padding_str = "";
	for ($i = 0; $i < $bean_numbering->min_num_strlength; $i++) {
		$padding_str = $padding_str +"0";
	}
	$padding_str = substr($padding_str, 0, strlen($padding_str) - strlen($current_numberstr)) + $current_numberstr;
	$nextval_str = $bean_numbering->perfix . $padding_str;
	$bean_numbering->current_number = $current_number;
	$bean_numbering->nextval = $nextval_str;
	$bean_numbering->save();
	}

print $trackNumber;