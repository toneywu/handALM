<?php
    $record=$_POST['record'];
    $frameworkId=$_POST['frameworkId'];
    $nowpage = $_POST['nowpage'];
    $result["is_correct"]= true;
    global $current_language;
    if($nowpage == ""){
    	$nowpage = 1;
    }
    $bean_v = BeanFactory::getBean('HAA_ListViews',$this->bean->id);
    $result["title"] = $bean_v->name;
    $view_name = $bean_v->data_source_view_name;
    $where_clause = $bean_v->where_clause;
    if($where_clause == ""){
    	$where_clause = "1=1";
    }
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
    //$result["language"] = $current_language;
    if ($current_language == "zh_CN") {
    	$sql_column = "SELECT DISTINCT
				c.field_lable_zhs lable_name,
				c.column_name,
				c.link_id_column,
	            c.link_module,
	            c.display_type_code,
				c.value_return_flag
			FROM
				haa_listview_columns c 
			WHERE c.deleted = 0
			AND	c.haa_listviews_id_c = '".$record."' 
			ORDER BY
				c.sort_order";
    }else{
    	$sql_column = "SELECT DISTINCT
				c.field_lable_us lable_name,
				c.column_name,
				c.link_id_column,
	            c.link_module,
	            c.display_type_code,
				c.value_return_flag
			FROM
				haa_listview_columns c 
			WHERE c.deleted = 0
			AND	c.haa_listviews_id_c = '".$record."' 
			ORDER BY
				c.sort_order";
    }
    
	$result_column=$db->query($sql_column);
	$list_column="";
	while($row_column=$db->fetchByAssoc($result_column)){
		if ($row_column['column_name'] != '') {
			$list_column .= $row_column['column_name'].",";
			$result["column"][]= $row_column['lable_name'];
			$result["column_display"][] = $row_column['value_return_flag'];
			
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
			if ($result["column_display"][$i] == 1) {
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