<?php
$doc_id = $_REQUEST['document_id1'];
$status = $_REQUEST['status_id'];
$revision = $_REQUEST['revision'];
$active_date = $_REQUEST['active_date'];
$document_name = $_REQUEST['document_name'];
$file_name = iconv("UTF-8", "gbk",$_FILES["filename_file"]["name"]);
$file_name = $file_name==''?$document_name:$file_name;
$file_type = $_FILES["filename_file"]["type"];
global $db;
$result_data = array();
//判断选择上传的文件是否存在
if(!$_FILES['filename_file']['name']) {
	$result_data['result_status'] = 'W'; 
	$result_data['msg_data'] = '文件已失效，请重新选择文件！';
	echo json_encode($result_data);
	return;
}
//判断文件类型是否符合
if($file_type!='text/comma-separated-values'&&$file_type!='application/vnd.ms-excel'){
	$result_data['result_status'] = 'W'; 
	$result_data['msg_data'] = '请上传CSV文件或XLS文件！';
	echo json_encode($result_data);
	return;
}
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

$import_set = BeanFactory::getBean('HAA_Import_Sets', $_REQUEST['id']);
$import_set->document_id_c = $document->id;
$import_set->save();

$result_data['document_id'] = $document->id;  
$sql="delete from haa_import_datas where document_id_c='".$document->id."'";
$result_data['file_type'] = $file_type; 

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
	
	if($file_type=='text/comma-separated-values'){
		echo '1';
		$myfile = fopen("upload/". $file_name, "r") or die("Unable to open file!");
		$result = $db->query($sql);
       	$row_num=0;
		// 输出单行直到 end-of-file
		while(!feof($myfile)) {
		//echo fgets($myfile). "<br> ";
		//echo mb_convert_encoding(fgets($myfile),'UTF-8'). "<br>";
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
			$import_datas ->save();
		}
		fclose($myfile);
	}else if($file_type=='application/vnd.ms-excel'){
		echo '2';
		$result = $db->query($sql);
		require_once 'include/PHPExcel.php';
        $reader = PHPExcel_IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)
        $PHPExcel = $reader->load("upload/". $file_name); // 载入excel文件
        $sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumm = $sheet->getHighestColumn(); // 取得总列数
        $highestColumm= PHPExcel_Cell::columnIndexFromString($highestColumm); //字母列转换为数字列 如:AA变为27
        /** 循环读取每个单元格的数据 */
        for ($row = 1; $row <= $highestRow; $row++){//行数是以第1行开始
        	$import_datas = BeanFactory::newBean('HAA_Import_Datas');
			$import_datas->document_id_c = $document->id;
			$import_datas->line_number = $row-1;
			$import_datas->import_status = '';
			$import_datas->error_message = '';
			$import_datas->warning_message = '';
            for ($column = 0; $column < $highestColumm; $column++) {//列数是以第0列开始
                $columnName = PHPExcel_Cell::stringFromColumnIndex($column);
                //$result_data['datass'][]= $sheet->getCellByColumnAndRow($column, $row)->getValue()."<br />";
                $c_name = 'column_value'.($column+1);
                $c_data = $sheet->getCellByColumnAndRow($column, $row)->getValue();
				$import_datas->$c_name =  is_null($c_data)?'':$c_data;
            }
            $import_datas ->save();
        }
	}
	
}
$result_data['result_status'] = 'S'; 
echo json_encode($result_data);

?>