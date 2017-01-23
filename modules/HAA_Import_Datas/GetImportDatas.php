<?php
$document_id = $_REQUEST["doc_id"];
if($document_id){
   echo  getImportDatas($document_id);
}
function getImportDatas($doc_id){
    global $db;
    $import_datas=array();
    $titles=array();
    $sql="select * from haa_import_datas hid where hid.document_id_c='".$doc_id."' ORDER BY hid.line_number";
    $result = $db->query($sql);
             //echo $sql;
    $cv_n=0;
    while ($row = $db->fetchByAssoc($result)) {
        $row_datas=array();
        $row_datas['line_number']=$row['line_number'];

        if($row['line_number']==0){
            $i=1;
            while($row['column_value'.$i]){
                $row_datas['column_value'.$i]=$row['column_value'.$i];
                $i++;
            }
            $cv_n = $cv_n>=$i-1?$cv_n:$i-1;
            $titles = $row_datas;
        }else{
            for($i=1;$i<=$cv_n;$i++){
                $row_datas['column_value'.$i]=$row['column_value'.$i];
            }
            $row_datas['import_status']=$row['import_status'];
            $row_datas['error_message']=$row['error_message'];
            $row_datas['warning_message']=$row['warning_message'];
            $import_datas[]=$row_datas;
        }
        
    }
    $datas=array(
        'titles'=>$titles,
        'cv_n'=>$cv_n,
        'import_datas'=>$import_datas);
           // var_dump($datas);
    /*echo '<script>var titles = '.json_encode($titles).'; var import_datas = '.json_encode($datas).'; var cv_n = '.$cv_n.';</script>';*/
    return json_encode($datas);
}
?>
