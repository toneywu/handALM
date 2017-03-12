<?php
$document_id = $_REQUEST["doc_id"];
if($document_id){
   echo  getImportDatas($document_id);
}
function getImportDatas($doc_id){
    global $db;
    $all_datas = array();
    $error_datas = array();
    $warn_datas = array();
    $titles=array();
    $sql="select * from haa_import_datas hid where hid.document_id_c='".$doc_id."' ORDER BY hid.line_number";
    $result = $db->query($sql);
             //echo $sql;
    $cv_n=0;
    $a_n=0;
    $e_n=0;
    $w_n=0;
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
                $row_datas['column_value'.$i]=is_null($row['column_value'.$i])?'':$row['column_value'.$i];
            }
            $row_datas['import_status']=$row['import_status'];
            $row_datas['error_message']=$row['error_message'];
            $row_datas['warning_message']=$row['warning_message'];
            $all_datas[]=$row_datas;
            $a_n++;
            if($row_datas['import_status']=='ERROR'){
                $error_datas[]=$row_datas;
                $e_n++;
            }else if($row_datas['import_status']=='WARN'){
                $warn_datas[]=$row_datas;
                $w_n++;
            }
        }
        
    }
    $datas=array(
        'titles'=>$titles,
        'cv_n'=>$cv_n,
        'all_datas'=>$all_datas,
        'a_n'=>$a_n,
        'error_datas'=>$error_datas,
        'e_n'=>$e_n,
        'warn_datas'=>$warn_datas,
        'w_n'=>$w_n,
        );
           // var_dump($datas);
    /*echo '<script>var titles = '.json_encode($titles).'; var import_datas = '.json_encode($datas).'; var cv_n = '.$cv_n.';</script>';*/
    return json_encode($datas);
}
?>
