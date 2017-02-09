<?php

global $db, $current_user;

$html_head='<head>
<title>handALM 资产云</title>
<link rel="stylesheet" type="text/css" href="include/javascript/qtip/jquery.qtip.min.css">
<link rel="stylesheet" type="text/css" href="cache/themes/SuiteR_HANDALM/css/yui.css?v=6T2wqZkzRRtQXSbbOJRC2A">
<link rel="stylesheet" type="text/css" href="include/javascript/jquery/themes/base/jquery.ui.all.css">
<link rel="stylesheet" type="text/css" href="cache/themes/SuiteR_HANDALM/css/deprecated.css?v=6T2wqZkzRRtQXSbbOJRC2A">
<link rel="stylesheet" type="text/css" href="cache/themes/SuiteR_HANDALM/css/style.css?v=6T2wqZkzRRtQXSbbOJRC2A">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<link href="themes/SuiteR/css/bootstrap.min.css" rel="stylesheet">
<link href="themes/SuiteR/css/colourSelector.php" rel="stylesheet">
<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css">
</head>';
echo $html_head;

$id_column_name=$_REQUEST['id_column_name'];
$value_column_name=$_REQUEST['value_column_name'];
$meaning_column_name=$_REQUEST['meaning_column_name'];
$form_name=$_REQUEST['form_name'];
$sql=$_REQUEST['sql'];
$value_set_code=$_REQUEST['value_set_code'];
$offset=($_REQUEST['next_offset']==''?0:$_REQUEST['next_offset']);
$offsetF = $offset + 1;
$offsetT = $offset + 25;
$tbody='';
$ln = ($_REQUEST['data_count']==''?0:$_REQUEST['data_count']); 
if($sql==''&&$value_set_code!=''){
	$sql0 = "SELECT
				hv.application_table_name,
				hv.value_column_name,
				hv.id_column_name,
				hv.meaning_column_name,
				hv.additional_where_clause
			FROM
				haa_valuesets hv 
			WHERE hv.name = '".$value_set_code."'";
	$result0=$db->query($sql0);
	$rtsql = 'select count(*) data_count ';
	while($row0=$db->fetchByAssoc($result0)){ 
		$sql = "select ".$row0['value_column_name'];
		$value_column_name=$row0['value_column_name'];
		if($row0['id_column_name']!=''){
			$sql.= ",".$row0['id_column_name'];
			$id_column_name = $row0['id_column_name'];
		}else{
			$sql.= ",".$row0['value_column_name']." id_column";
			$id_column_name = 'id_column';
		}
		if($row0['meaning_column_name']!=''){
			$sql.= ",".$row0['meaning_column_name'];
		}
		$sql.= " from ".$row0['application_table_name'];
		$rtsql .= " from ".$row0['application_table_name'];
		if($row0['additional_where_clause']!=''){
			$whereClause = $row0['additional_where_clause'];
			if(strpos($whereClause, '$CURRENT_FRAMEWORK')!=false){
				$whereClause = substr_replace($whereClause,"'".$_SESSION["current_framework"]."'",strpos($whereClause, '$CURRENT_FRAMEWORK'),18);
			}
			if(strpos($whereClause, '$CURRENT_USER')!=false){
				$whereClause = substr_replace($whereClause,"'".$current_user->id."'",strpos($whereClause, '$CURRENT_USER'),13);
			}
			$whereClause = str_replace("@","",$whereClause,$count);
			echo $count."||";
			$whereClause = str_replace("&quot;","'",$whereClause,$count);
			//echo $count."|||";
			$whereClause = str_replace("&#039;","'",$whereClause,$count);
			//echo $count."|||".$whereClause;
			$sql.= " where ".$whereClause;
			$rtsql.= " where ".$whereClause;
		}
	}
	$rtt = $db->query($rtsql);
	while($rowc=$db->fetchByAssoc($rtt)){
		$ln = $rowc['data_count'];
	}
	
}
$psql=$sql;

if($offsetT > $ln){
	$offsetT = $ln;
}
if($offsetF < 1){
	$offsetF = 1;
}
$end_offset = intval($ln/25)*25;
if($ln%25==0){
	$end_offset = $end_offset-25;
}
$sql .=' limit '.$offset.',25';
$sql = str_replace("&#039;","'",$sql,$count);
echo $sql;

$result=$db->query($sql);

while($row=$db->fetchByAssoc($result)){
	$tbody.='<tr class="oddListRowS1" height="20">
	<td scope="row" class="oddListRowS1" valign="top" bgcolor="" align="left">
		<a href="javascript:void(0)" onclick="send_back(\''.$row[$id_column_name].'\',\''.$row[$value_column_name].'\',\''.$row[$meaning_column_name].'\');">'.$row[$value_column_name].'</a>

	</td>

	<td scope="row" class="oddListRowS1" valign="top" bgcolor="" align="left">

		'.$row[$meaning_column_name].'

	</td>
</tr>';
}
$html ='<body class="popupBody"><script src="modules/HAA_ValueSets/js/value_set_open_windows.js"></script>';
$html.='<table class="formHeader h3Row" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody><tr>
	<td nowrap="">
		<h3><span>列表</span></h3>
	</td>
	<td width="100%"><img src="themes/SuiteR_HANDALM/images/blank.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="" width="1" height="1"></td>
</tr>
</tbody></table>';
$html.='<table class="list view" width="100%" cellspacing="0" cellpadding="0" border="0">
<thead>
	<tr height="20">
		<th scope="col" data-toggle="true" width="28.57%">
			<div style="white-space: normal;" width="100%" align="left">
				值列</div></th>

			<th scope="col" data-hide="phone,tablet" width="21.43%">
			<div style="white-space: normal;" width="100%" align="left">
				说明列</div></th>
			</tr>
		</thead>';
		$html .= '<tbody id="list_tbody">';

		$html_t = "<tr class='pagination' role='presentation'>"
		.'        <td colspan="6" align="right">'
		.'			<table width="100%" cellspacing="0" cellpadding="0" border="0">'
		.'				<tbody><tr>'
		.'					<td align="left">&nbsp;</td>'
		.'					<td nowrap="nowrap" align="right">';

		if($ln==0||$ln<=25) {
			$html_t .='					<button type="button" title="首页" class="button" disabled="">'
			.'							<img src="themes/SuiteR_HANDALM/images/start_off.gif" alt="首页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" class="button" disabled="" title="上页">'
			.'							<img src="themes/SuiteR_HANDALM/images/previous_off.gif" alt="上页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<span class="pageNumbers">('.$offsetF.' - '.$offsetT.' 的 '.$ln.')</span>'  
			.'						<button type="button" title="下页" class="button" disabled="">'
			.'							<img src="themes/SuiteR_HANDALM/images/next_off.gif" alt="下页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" title="末页" class="button" disabled="">'
			.'							<img src="themes/SuiteR_HANDALM/images/end_off.gif" alt="末页" border="0" align="absmiddle">'
			.'						</button>';
		}else if($offset==0){
			$html_t .='					<button type="button" title="首页" class="button" disabled="">'
			.'							<img src="themes/SuiteR_HANDALM/images/start_off.gif" alt="首页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" class="button" disabled="" title="上页">'
			.'							<img src="themes/SuiteR_HANDALM/images/previous_off.gif" alt="上页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<span class="pageNumbers">('.$offsetF.' - '.$offsetT.' 的 '.$ln.')</span>'  
			.'						<button type="button" title="下页" class="button" onclick="onJumpPage('.($offset+25).')">'
			.'							<img src="themes/SuiteR_HANDALM/images/next.gif" alt="下页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" title="末页" class="button" onclick="onJumpPage('.$end_offset.')">'
			.'							<img src="themes/SuiteR_HANDALM/images/end.gif" alt="末页" border="0" align="absmiddle">'
			.'						</button>';
		}else if ($offsetT==$ln) {
			$html_t .='					<button type="button" title="首页" class="button" onclick="onJumpPage(0)">'
			.'							<img src="themes/SuiteR_HANDALM/images/start.gif" alt="首页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" class="button"  title="上页" onclick="onJumpPage('.($offset-25).')">'
			.'							<img src="themes/SuiteR_HANDALM/images/previous.gif" alt="上页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<span class="pageNumbers">('.$offsetF.' - '.$offsetT.' 的 '.$ln.')</span>'  
			.'						<button type="button" title="下页" class="button" disabled="">'
			.'							<img src="themes/SuiteR_HANDALM/images/next_off.gif" alt="下页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" title="末页" class="button" disabled="">'
			.'							<img src="themes/SuiteR_HANDALM/images/end_off.gif" alt="末页" border="0" align="absmiddle">'
			.'						</button>';
		}else{
			$html_t .='					<button type="button" title="首页" class="button" onclick="onJumpPage(0)">'
			.'							<img src="themes/SuiteR_HANDALM/images/start.gif" alt="首页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" class="button" title="上页" onclick="onJumpPage('.($offset-25).')">'
			.'							<img src="themes/SuiteR_HANDALM/images/previous.gif" alt="上页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<span class="pageNumbers">('.$offsetF.' - '.$offsetT.' 的 '.$ln.')</span>'  
			.'						<button type="button" title="下页" class="button" onclick="onJumpPage('.($offset+25).')">'
			.'							<img src="themes/SuiteR_HANDALM/images/next.gif" alt="下页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" title="末页" class="button" onclick="onJumpPage('.$end_offset.')">'
			.'							<img src="themes/SuiteR_HANDALM/images/end.gif" alt="末页" border="0" align="absmiddle">'
			.'						</button>';
		}

		$html_t.='					</td>'
		.'				</tr></tbody>'
		.'			</table>'
		.'		</td>'
		."	</tr>";
		$html.=$html_t.$tbody.$html_t;

		$html.='</tbody></table>';

		$psql = str_replace("'","\\'",$psql,$count);
		$html.="<form id='p_form' action='index.php?to_pdf=true&module=HAA_ValueSets&action=ValueSetOpenWindows&valueColumnName=".$_REQUEST['valueColumnName']."&idColumnName=".$_REQUEST['idColumnName']."&meanColumnName=".$_REQUEST['meanColumnName']."' method='POST' target='".$form_name."'>
		<input type='hidden' name='value_set_code' value='".$value_set_code."'>
		<input type='hidden' name='data_count' value='".$ln."'>
		<input type='hidden' name='id_column_name' value='".$id_column_name."'>
		<input type='hidden' name='value_column_name' value='".$value_column_name."'>
		<input type='hidden' name='meaning_column_name' value='".$meaning_column_name."'>
		<input type='hidden' name='form_name' value='".$form_name."'>
		<input type='hidden' id='offset' name='offset' value='".$offset."'>
	</form></body>";
	echo $html;
	echo "<script>psql=\"".$psql."\";</script>";
	?>