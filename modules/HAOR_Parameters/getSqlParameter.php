<?php

global $db;
$id_file=$_REQUEST['id_file'];
$name_file=$_REQUEST['name_file'];
$form_name=$_REQUEST['form_name'];
$sql=$_REQUEST['sql'];
$id=$_REQUEST['id'];
$offset=($_REQUEST['next_offset']==''?0:$_REQUEST['next_offset']);
$offsetF = $offset + 1;
$offsetT = $offset + 25;
$tbody='';
if($sql==''&&$id!=''){
	$sql0 = "select ap.sql_statement from haor_parameters ap where ap.id = '".$id."'";
	$result0=$db->query($sql0);
	while($row0=$db->fetchByAssoc($result0)){ 
		$sql=$row0['sql_statement'];
	}
}
$psql=$sql;
$ln = 0;
$rt = 'select count(*) data_count from ('.$sql.') dc';
//echo $rt;
$rtt = $db->query($rt);
while($rowc=$db->fetchByAssoc($rtt)){
	$ln = $rowc['data_count'];
}

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
$result=$db->query($sql);

while($row=$db->fetchByAssoc($result)){
	$tbody.='<tr class="oddListRowS1" height="20">
	<td scope="row" class="oddListRowS1" valign="top" bgcolor="" align="left">
		<a href="javascript:void(0)" onclick="send_back(\''.$id_file.'\',\''.$name_file.'\',\''.$row["id"].'\',\''.$row["name"].'\');">'.$row["name"].'</a>

	</td>

	<td scope="row" class="oddListRowS1" valign="top" bgcolor="" align="left">

		'.$row["description"].'

	</td>
</tr>';
}
/*echo '<script>createJumpPageBar();</script>';*/
$html='<head>
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
$html.='<body class="popupBody"><script src="modules/HAOR_Parameters/sqlPopup.js"></script>';
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
				名称</div></th>

			<th scope="col" data-hide="phone,tablet" width="21.43%">
			<div style="white-space: normal;" width="100%" align="left">
				说明</div></th>
			</tr>
		</thead>';
		$html .= '<tbody id="list_tbody">';

		$html .= "<tr class='pagination' role='presentation'>"
		.'        <td colspan="6" align="right">'
		.'			<table width="100%" cellspacing="0" cellpadding="0" border="0">'
		.'				<tbody><tr>'
		.'					<td align="left">&nbsp;</td>'
		.'					<td nowrap="nowrap" align="right">';

		if($ln==0) {
			$html .='					<button type="button" title="首页" class="button" disabled="">'
			.'							<img src="themes/SuiteR_HANDALM/images/start_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="首页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" class="button" disabled="" title="上页">'
			.'							<img src="themes/SuiteR_HANDALM/images/previous_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="上页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<span class="pageNumbers">('.$offsetF.' - '.$offsetT.' 的 '.$ln.')</span>'  
			.'						<button type="button" title="下页" class="button" disabled="">'
			.'							<img src="themes/SuiteR_HANDALM/images/next_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="下页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" title="末页" class="button" disabled="">'
			.'							<img src="themes/SuiteR_HANDALM/images/end_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="末页" border="0" align="absmiddle">'
			.'						</button>';
		}else if($offset==0){
			$html .='					<button type="button" title="首页" class="button" disabled="">'
			.'							<img src="themes/SuiteR_HANDALM/images/start_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="首页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" class="button" disabled="" title="上页">'
			.'							<img src="themes/SuiteR_HANDALM/images/previous_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="上页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<span class="pageNumbers">('.$offsetF.' - '.$offsetT.' 的 '.$ln.')</span>'  
			.'						<button type="button" title="下页" class="button" onclick="onJumpPage('.($offset+25).')">'
			.'							<img src="themes/SuiteR_HANDALM/images/next.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="下页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" title="末页" class="button" onclick="onJumpPage('.$end_offset.')">'
			.'							<img src="themes/SuiteR_HANDALM/images/end.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="末页" border="0" align="absmiddle">'
			.'						</button>';
		}else if ($offsetT==$ln) {
			$html .='					<button type="button" title="首页" class="button" onclick="onJumpPage(0)">'
			.'							<img src="themes/SuiteR_HANDALM/images/start.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="首页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" class="button"  title="上页" onclick="onJumpPage('.($offset-25).')">'
			.'							<img src="themes/SuiteR_HANDALM/images/previous.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="上页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<span class="pageNumbers">('.$offsetF.' - '.$offsetT.' 的 '.$ln.')</span>'  
			.'						<button type="button" title="下页" class="button" disabled="">'
			.'							<img src="themes/SuiteR_HANDALM/images/next_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="下页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" title="末页" class="button" disabled="">'
			.'							<img src="themes/SuiteR_HANDALM/images/end_off.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="末页" border="0" align="absmiddle">'
			.'						</button>';
		}else{
			$html .='					<button type="button" title="首页" class="button" onclick="onJumpPage(0)">'
			.'							<img src="themes/SuiteR_HANDALM/images/start.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="首页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" class="button" title="上页" onclick="onJumpPage('.($offset-25).')">'
			.'							<img src="themes/SuiteR_HANDALM/images/previous.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="上页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<span class="pageNumbers">('.$offsetF.' - '.$offsetT.' 的 '.$ln.')</span>'  
			.'						<button type="button" title="下页" class="button" onclick="onJumpPage('.($offset+25).')">'
			.'							<img src="themes/SuiteR_HANDALM/images/next.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="下页" border="0" align="absmiddle">'
			.'						</button>'
			.'						<button type="button" title="末页" class="button" onclick="onJumpPage('.$end_offset.')">'
			.'							<img src="themes/SuiteR_HANDALM/images/end.gif?v=6T2wqZkzRRtQXSbbOJRC2A" alt="末页" border="0" align="absmiddle">'
			.'						</button>';
		}

		$html.='					</td>'
		.'				</tr></tbody>'
		.'			</table>'
		.'		</td>'
		."	</tr>";
		$html.=$tbody;

		$html.='</tbody></table>';
		$html.="<form id='p_form' action='index.php?to_pdf=true&module=HAOR_Parameters&action=getSqlParameter' method='POST' target='".$form_name."'>
		<input type='hidden' name='id' value='".$id."'>
		<input type='hidden' name='sql' value='".$psql."'>
		<input type='hidden' name='id_file' value='".$id_file."'>
		<input type='hidden' name='name_file' value='".$name_file."'>
		<input type='hidden' name='form_name' value='".$form_name."'>
		<input type='hidden' id='offset' name='offset' value='".$offset."'>
	</form></body>";
	echo $html;

	?>