<?php 
//$url='http://szdctest.chinacache.com:8020/OA_HTML/fndgfm.jsp?mode=download_blob&fid=355400&accessid=108429170876125188266234367401499523895';
//$url='http://www.handalm.com/suite/index.php/index.php?entryPoint=download&id=1809a72d-baaa-05a1-bb7a-5819998c61f2&type=Documents';

function curl_post($header,$data,$url)
{
 $ch = curl_init();
 $res= curl_setopt ($ch, CURLOPT_URL,$url);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 curl_setopt ($ch, CURLOPT_HEADER, 0);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
 
 $result = curl_exec ($ch);
 curl_close($ch);
 if ($result == NULL) {
  return 0;
 }
 

$file1 = 'd:\\hhhh.txt';
$fp = fopen($file1, 'w');
fwrite($fp, $result);
fclose($fp);
 
 return $result;
}  
 $url = 'http://szdctest.chinacache.com:8020/OA_HTML/fndgfm.jsp' ;  
 $header = array("Host:szdctest.chinacache.com",
  "Content-Type:application/x-www-form-urlencoded",
  'User-Agent: Mozilla/4.0 (compatible; MSIE .0; Windows NT 6.1; Trident/4.0; SLCC2;)'); 
$data = 'mode=download_blob&fid=355400&accessid=108429170876125188266234367401499523895';
$ret = curl_post($header, $data,$url);
//需将内容显示修改为文件下载
echo $ret;


 
?>