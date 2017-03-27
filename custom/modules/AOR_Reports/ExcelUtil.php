<?php
class ExcelUtil {

    private $_objPHPExcel;
    private $excel_name='ppp';
    private $sheet_count = 0;
    private $sheet_data_count = 0;

    private $columnArray=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

    public function __construct() {
        require_once 'include/PHPExcel.php';
        $this->_objPHPExcel = new PHPExcel();
            
        $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory_serialized; 
        PHPExcel_Settings::setCacheStorageMethod($cacheMethod);
        $this->setActiveSheet(0);
        /*$cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp; 
        $cacheSettings = array( ' memoryCacheSize '  => '12MB'  ); 

        if(PHPExcel_Settings::setCacheStorageMethod($cacheMethod,$cacheSettings)){
            $this->_objPHPExcel = new PHPExcel();
            $this->setActiveSheet(0);
            $this->_objPHPExcel->getProperties()
                      ->setTitle("import_excel");
            
        }*/
    }

    public function setActiveSheet($n){
        $this->_objPHPExcel->setActiveSheetIndex($n);
        /*if($n==$this->sheet_count){
            $this->sheet_count=$n+1;
        }*/
    }

    public function getPHPExcelObj(){
        return $this->_objPHPExcel; 
      
    }
    private function getColIndex($n){
        $t = floor($n/26)-1;
        $y = $n%26;
        if($t<0){
            return $this->columnArray[$y];
        }else{
            return $this->columnArray[$t].$this->columnArray[$y];
        }
    }
    public function buildColumnName($c_name){
        for ($i=0; $i < count($c_name) ; $i++) { 
            $this->_objPHPExcel->getActiveSheet()->setCellValue($this->getColIndex($i).'1', $c_name[$i]) ;
            
            

        }
        $this->sheet_data_count++;
    }

    public function buildExcelContent($data,$rownum=0){
        $sCount = $this->sheet_data_count;
        foreach($data as $k => $r_data){
            $num=$k+1+$sCount;
            $this->sheet_data_count++;
            for ($i=0; $i < count($r_data) ; $i++) { 
               /* $this->_objPHPExcel->getActiveSheet()->setCellValue($this->getColIndex($i).$num, $r_data[$i]) ;*/
               //设置成文本的
                $this->_objPHPExcel->getActiveSheet()->setCellValueExplicit($this->getColIndex($i).$num, $r_data[$i], PHPExcel_Cell_DataType::TYPE_STRING) ;
            }
        } 
        /*if($this->sheet_data_count>3000){
           $this->_objPHPExcel->createSheet();
           $this->sheet_count++;
           $this->setActiveSheet($this->sheet_count);
           $this->sheet_data_count=0;
        }  */
    }
    public function createExcelFile($file_path='',$file_name=''){
        $file_path = empty($file_path)?$this->getDefaultPath():$file_path;
        $file_name = empty($file_name)?$this->getMillisecond():$file_name;
        //$file_name .= $this->getMillisecond();
        $file=$file_path.$file_name.'.xls';
        $objWriter = PHPExcel_IOFactory::createWriter($this->_objPHPExcel, 'Excel5');
        $objWriter->save($file);
        return $file_name.'.xls';
    }

    private function getMillisecond(){ 
        list($s1,$s2)=explode(' ',microtime()); 
        return sprintf('%.0f',(floatval($s1)+floatval($s2))*1000); 
    } 
    private function getDefaultPath(){
        return 'custom/modules/AOR_Reports/rpt_data_files/';
    }

    public function setSheetTitle($title,$index=''){
        if($index!=''){
            $this->setActiveSheet($index);
        }
        $this->_objPHPExcel->getActiveSheet()->setTitle($title);
        
    }
}



    /*以下是一些设置 ，什么作者  标题啊之类的*/
      /*$objPHPExcel->getProperties()->setCreator("转弯的阳光")
      ->setLastModifiedBy("转弯的阳光")
      ->setTitle("数据EXCEL导出")
      ->setSubject("数据EXCEL导出")
      ->setDescription("备份数据")
      ->setKeywords("excel")
      ->setCategory("result file");*/
      /*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/