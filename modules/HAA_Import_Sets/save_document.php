<?php
global $db, $current_user; 
$flag=0; // 识别的文件类型标志，0:不支持上传的类型； 1:CSV类型；2:Excel类型；
$result_data = array();
$doc_id = $_REQUEST['document_id1'];
$status = $_REQUEST['status_id'];
$revision = $_REQUEST['revision'];
$active_date = $_REQUEST['active_date'];
$document_name = $_REQUEST['document_name'];
$user_id = $current_user->id; 
/*$file_name = iconv("UTF-8", "gbk",$_FILES["filename_file"]["name"]);
$file_name = $file_name==''?$document_name:$file_name;*/
$file_type = $_FILES["filename_file"]["type"];
$file_mime_name = end(explode('.', $_FILES["filename_file"]["name"])); 
$result_data['file_type'] = $file_type; 
$result_data['file_mime_name'] = $file_mime_name; 
//判断选择上传的文件是否存在
if(!$_FILES['filename_file']['name']) {
	$result_data['result_status'] = 'W'; 
	$result_data['msg_data'] = '文件已失效，请重新选择文件。';
	echo json_encode($result_data);
	return;
}

//判断文件类型是否符合
/*if($file_type!='text/comma-separated-values'&&$file_type!='application/vnd.ms-excel'&&$file_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
	&&$file_type!='csv'&&$file_type!='xls'&&$file_type!='xlsx'){
	$result_data['result_status'] = 'W'; 
	$result_data['msg_data'] = '请上传CSV或者Excel类型的文件。';
	echo json_encode($result_data);
	return;
}*/
if($file_mime_name=='csv'){
	$flag=1;
}else if($file_mime_name=='xls'){
	$flag=2;
	require_once 'include/PHPExcel.php';
    $reader = PHPExcel_IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)
}
else if($file_mime_name=='xlsx'){
	$flag=2;
	require_once 'include/PHPExcel.php';
    $reader = PHPExcel_IOFactory::createReader('Excel2007'); 
}else{
	$result_data['result_status'] = 'W'; 
	$result_data['msg_data'] = '请上传CSV或者Excel类型的文件。';
	echo json_encode($result_data);
	return;
}
//$result_data['date1'] = getMillisecond(); 
//将文件信息保存到文档模块
if($doc_id){
	$document = BeanFactory::getBean('Documents', $doc_id);
} else {
	$document = BeanFactory::newBean('Documents');
}
$document->document_name = $document_name;
$document->status_id = $status;
$document->active_date = $active_date;
$document->revision = $revision;
$file_arr=preg_split('/[.]/', $_FILES['filename_file']['name']);
$document->file_ext=$file_arr[sizeof($file_arr)-1];
$document->file_mime_type=$_FILES['filename_file']['type'];
$document->filename=$_FILES['filename_file']['name'];
@$document->save();
//$result_data['date3'] = getMillisecond(); 
//写入文档ID
$import_set = BeanFactory::getBean('HAA_Import_Sets', $_REQUEST['id']);
$import_set->document_id_c = $document->id;
$import_set->save();
//$result_data['date2'] = getMillisecond(); 
$result_data['document_id'] = $document->id;  
$sql="delete from haa_import_datas where document_id_c='".$document->id."'";
//$result_data['revision'] = $document->document_revision_id;
$file_name = $document->document_revision_id;
if ($_FILES["filename_file"]["error"] > 0)
{
	$result_data['result_status'] = 'E'; 
	$result_data['msg_data'] = $_FILES["filename_file"]["error"]; 
	echo json_encode($result_data);
	return;
}
else
{
	move_uploaded_file($_FILES["filename_file"]["tmp_name"],
		"upload/" . $file_name);
	$insert_sql = "insert into haa_import_datas";
	if($flag==1){
		$myfile = fopen("upload/". $file_name, "r") or die("Unable to open file!");
		$result = $db->query($sql);
       	$row_num=0; //行号
		$insert_flag = 0; // 是否需要在循环外执行插入，0 不需要，1 需要
		$insert_limit = 0; // 插入限制的循环标志
		while(!feof($myfile)) {
			$insert_flag=1;
			$rowData = iconv("gbk", "UTF-8",fgets($myfile));
			$req = array('"'=>'');
			$rowData = strtr($rowData,$req); 
			$datas = explode(',',$rowData);
			if($insert_limit == 0){ // 标志为0 封装需要插入的列
				$insert_column = "(id,date_entered,date_modified,modified_user_id,created_by,document_id_c,line_number,import_status,error_message,warning_message";
				$column_num = count($datas); // 可变的列数
				if (is_null($datas[($column_num-1)])||$datas[($column_num-1)]=="\r\n"){
					$column_num = $column_num-1;
				} 
		        for($i = 0; $i < $column_num; $i++){
		        	$c_name = 'column_value'.($i+1);
		        	$insert_column .= ",".$c_name;
		    	}
		    	$insert_column .= ")";
		    	$insert_sql .= $insert_column."values";
				$insert_sql100 = $insert_sql;
		    	$insert_limit++;
			}
			$row_id = create_guid();
        	$insert_data="('".$row_id."','"
        		.date("Y-m-d H:i:sa")."','"
        		.date("Y-m-d H:i:sa")."','"
        		.$user_id."','"
        		.$user_id."','"
        		.$document->id."',"
        		.$row_num.",'','',''";
			for($i = 0; $i < $column_num; $i++)
			{
				$insert_data.=",'".$datas[$i]."'";
			} 
			$insert_data.=")";
            if($insert_limit != 1){
            	$insert_sql100 .= ",";
            }
            $insert_sql100 .= $insert_data;
            if($insert_limit == 100){
            	$insert_limit = 0;
            	$result = $db->query($insert_sql100);
            	$result_data['insert_sql_result'.($row_num+1)] = $result; 
            	$insert_sql100 = $insert_sql;
            	$insert_flag = 0;
            }
			$row_num++;
			$insert_limit++;
		}
		fclose($myfile);
		if ($insert_flag!=0){
        	$result = $db->query($insert_sql100);
        	$result_data['insert_sql_result'] = $result; 
    	}
		// 输出单行直到 end-of-file
		/*while(!feof($myfile)) {
			$rowData = iconv("gbk", "UTF-8",fgets($myfile));
			$req = array('"'=>'');
			$rowData = strtr($rowData,$req); 
			$datas = explode(',',$rowData);
			$import_datas = BeanFactory::newBean('HAA_Import_Datas');
			$import_datas->document_id_c = $document->id;
			$import_datas->line_number = $row_num++;
			$import_datas->import_status = '';
			$import_datas->error_message = '';
			$import_datas->warning_message = '';
			for($i = 0; $i < count($datas)-1; $i++)
			{
				$c_name = 'column_value'.($i+1);
				$import_datas->$c_name = $datas[$i];
			} 
			if(!is_null($datas[$i])){
				$c_name = 'column_value'.($i+1);
				$import_datas->$c_name = $datas[$i];
			}
			$import_datas ->save();
		}
		fclose($myfile);*/

	}else if($flag==2){
		$result = $db->query($sql);
        $PHPExcel = $reader->load("upload/". $file_name); // 载入excel文件
        $sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumn = $sheet->getHighestColumn(); // 取得总列数
        $highestColumn= PHPExcel_Cell::columnIndexFromString($highestColumn); //字母列转换为数字列 如:AA变为27
		
		$insert_column = "(id,date_entered,date_modified,modified_user_id,created_by,document_id_c,line_number,import_status,error_message,warning_message";
        for($i = 0; $i < $highestColumn; $i++){
        	$c_name = 'column_value'.($i+1);
        	$insert_column .= ",".$c_name;
    	}
    	$insert_column .= ")";
    	$insert_sql .= $insert_column."values";
		$insert_sql100 = $insert_sql;
		$insert_flag = 0; // 是否需要在循环外执行插入，0 不需要，1 需要
    	for ($row = 1,$insert_limit = 1; $row <= $highestRow; $row++,$insert_limit++){//行数是以第1行开始
    		$insert_flag=1;
    		//$row_id = getMillisecond().$row;
    		$row_id = create_guid();
        	$insert_data="('".$row_id."','"
        		.date("Y-m-d H:i:sa")."','"
        		.date("Y-m-d H:i:sa")."','"
        		.$user_id."','"
        		.$user_id."','"
        		.$document->id."',"
        		.($row-1).",'','',''";
            for ($column = 0; $column < $highestColumn; $column++) {//列数是以第0列开始
                $columnName = PHPExcel_Cell::stringFromColumnIndex($column);
                $c_data = $sheet->getCellByColumnAndRow($column, $row)->getValue();
				$c_data = is_null($c_data)?'':$c_data;
				$insert_data.=",'".$c_data."'";
            }
            $insert_data.=")";
            if($insert_limit != 1){
            	$insert_sql100 .= ",";
            }
            $insert_sql100 .= $insert_data;
            if($insert_limit == 100){
            	$insert_limit = 0;
            	$result = $db->query($insert_sql100);
            	$result_data['insert_sql_result'.$row] = $result; 
            	$insert_sql100 = $insert_sql;
            	$insert_flag = 0;
            }
        }
        if ($insert_flag!=0){
        	$result = $db->query($insert_sql100);
        	$result_data['insert_sql_result'] = $result; 
    	}
        //$result_data['insert_sql'] = $insert_sql; 
        //
        /** 循环读取每个单元格的数据 */
        /*for ($row = 1; $row <= $highestRow; $row++){//行数是以第1行开始
        	$import_datas = BeanFactory::newBean('HAA_Import_Datas');
			$import_datas->document_id_c = $document->id;
			$import_datas->line_number = $row-1;
			$import_datas->import_status = '';
			$import_datas->error_message = '';
			$import_datas->warning_message = '';
            for ($column = 0; $column < $highestColumn; $column++) {//列数是以第0列开始
                $columnName = PHPExcel_Cell::stringFromColumnIndex($column);
                $c_name = 'column_value'.($column+1);
                $c_data = $sheet->getCellByColumnAndRow($column, $row)->getValue();
				$import_datas->$c_name =  is_null($c_data)?'':$c_data;
            }
            $import_datas ->save();
        }*/
	}
	
}
$result_data['result_status'] = 'S'; 
echo json_encode($result_data);

?>