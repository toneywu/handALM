<?php
global $current_user,$current_language;
$record=$_POST['record'];
$frameworkId=$_POST['frameworkId'];
$nowpage = $_POST['nowpage'];
$listviewCode = $_POST['listviewCode'];

$current_user_id =$current_user->id;
$result["is_correct"]= true;
if($nowpage == ""){
 $nowpage = 1;
}

if ($frameworkId==''){
    $frameworkId=$_SESSION["current_framework"];
}
if($record==''&&$listviewCode!=''){
 $beanListview = BeanFactory :: getBean('HAA_ListViews')->retrieve_by_string_fields(array (
    'listview_code' => $listviewCode,
    'haa_frameworks_id_c' => $frameworkId
    ));
 if ($beanListview) { 
    $record=isset($beanListview->id)?$beanListview->id:'';
}
}

$bean_v = BeanFactory::getBean('HAA_ListViews',$record);
$result["title"] = $bean_v->name;
$view_name = $bean_v->data_source_view_name;
$where_clause = $bean_v->where_clause;
if($where_clause == ""){
 $where_clause = "1=1";
}

    //处理默认关键字
$where_clause=str_replace("%CURR_FRAME_ID%", "'".$frameworkId."'", $where_clause);
$where_clause=str_replace("%CURR_USER_ID%", "'".$current_user_id."'", $where_clause);

$sort_order = "";
$sort_column1 = $bean_v->sort_column1;
$sort_column1_order = $bean_v->sort_column1_order;
if ($sort_column1 != "") {
 $sort_order .= $sort_column1." ".$sort_column1_order;
}
$sort_column2 = $bean_v->sort_column2;
$sort_column2_order = $bean_v->sort_column2_order;
if ($sort_column2 != "") {
 $sort_order .= ",".$sort_column2." ".$sort_column2_order;
}
$sort_column3 = $bean_v->sort_column3;
$sort_column3_order = $bean_v->sort_column3_order;
if ($sort_column3 != "") {
 $sort_order .= ",".$sort_column3." ".$sort_column3_order;
}
$sort_column4 = $bean_v->sort_column4;
$sort_column4_order = $bean_v->sort_column4_order;
if ($sort_column4 != "") {
 $sort_order .= ",".$sort_column4." ".$sort_column4_order;
}
$page_rows = $bean_v->page_rows;

global $db;

    //获取页数
$sql1 = "";
$sql1 .= "SELECT count(*) sumpage"." FROM ".$view_name. " WHERE " .$where_clause;

$result1=$db->query($sql1);
if ($result1 == false) {
 $result["is_correct"]= false;
}
$row1=$db->fetchByAssoc($result1);
$result["sumpage"] = ceil($row1["sumpage"]/$page_rows);

if ($nowpage > $result["sumpage"]) {
  $nowpage = $result["sumpage"];
}
if ($nowpage < 1) {
  $nowpage = 1;
}
$n = ($nowpage - 1)*$page_rows;
$result["nowpage"] = $nowpage;    
    //获取列
$sql_column = "SELECT DISTINCT
%field_lable% lable_name,
c.column_name,
c.link_id_column,
c.link_module,
c.display_type_code,
c.value_return_flag,
c.popup_visible_flag,
c.dashlet_visible_flag,
c.cell_alignment_code,
c.display_hsize,
c.query_allowed_flag,
c.header_alignment_code
FROM
haa_listview_columns c 
WHERE c.deleted = 0
AND c.enabled_flag = 1
AND c.haa_listviews_id_c = '".$record."' 
ORDER BY
c.sort_order";
if ($current_language == "zh_CN") {
    $sql_column=str_replace("%field_lable%", "c.field_lable_zhs", $sql_column);
}else{
  $sql_column=str_replace("%field_lable%", "c.field_lable_us", $sql_column);
}

$result_column=$db->query($sql_column);
$list_column="";
while($row_column=$db->fetchByAssoc($result_column)){
  if ($row_column['column_name'] != '') {
   $list_column .= $row_column['column_name'].",";
   $result["column"][]= $row_column['lable_name'];
   $result["popup_visible"][]= $row_column['popup_visible_flag'];
   $result["dashlet_visible"][]= $row_column['dashlet_visible_flag'];
   $result["value_return"][] = $row_column['value_return_flag'];

   $result["columns"][] = $row_column;
}
}

$list_column = substr($list_column, 0,strlen($list_column)-1);

    //获取数据
$sql = "";
$sql .= "SELECT ".$list_column." FROM ".$view_name. " WHERE " .$where_clause. " ORDER BY ". $sort_order. " LIMIT ".$n.",".$page_rows;

$result_sql=$db->query($sql);
if ($result_sql == false) {
 $result["is_correct"]= false;
}

while($row_sql=$db->fetchByAssoc($result_sql)){
  $result["data"][]= $row_sql;
  $i = 0;
  foreach ($row_sql as $key=>$value){ 
   if ($result["value_return"][$i] == 1) {
    $new_key = $result["column"][$i];
    $line_data[$new_key] = $value;
}
$i++;
} 
		//点击popup的图标需要获取的数组
$result["column_popup"][] = $line_data;
unset($line_data);
}

echo json_encode($result);