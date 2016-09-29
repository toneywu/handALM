<?php
//**************************************************************/
////本文件基于aso_pdf_template/generatePdf.php进行扩展
//扩展主要包括以下关键点
//1、从实体中加载TemplateID
//2、引入资产事务处理行
//by toney.wu 2016.09.27 for HandALM
//**************************************************************/

/*if(!isset($_REQUEST['uid']) || empty($_REQUEST['uid']) || !isset($_REQUEST['templateID']) || empty($_REQUEST['templateID'])){
        die('Error retrieving record. This record may be deleted or you may not be authorized to view it.');
    }*/
    //error_reporting(0);
    require_once('modules/AOS_PDF_Templates/PDF_Lib/mpdf.php');
    require_once('modules/AOS_PDF_Templates/templateParser.php');
    require_once('modules/AOS_PDF_Templates/sendEmail.php');
    require_once('modules/AOS_PDF_Templates/AOS_PDF_Templates.php');

    global $mod_strings,$sugar_config;

    $module_type = $_REQUEST['module'];
    $module_type_file = strtoupper(ltrim(rtrim($module_type,'s'),'AOS_'));
    $module_type_low = strtolower($module_type);
    $module = new $module_type();
    $module->retrieve($_REQUEST['uid']);

    $template_id = 'ba6bc1c1-ecd1-1e4f-8a3d-57e9db73341f';//'99d601b6-0a58-bf2e-4c33-57e5249af624';//
    $template = new AOS_PDF_Templates();
    $template->retrieve($template_id);

    $object_arr = array();
    $object_arr[$module_type] = $module->id;

    $lineItems = array();
    $sql = "SELECT id FROM hat_asset_trans WHERE hat_asset_trans.`batch_id`='".$_REQUEST['uid']."' AND hat_asset_trans.`deleted`=0 ORDER BY hat_asset_trans.`id`";
    $res = $module->db->query($sql);
    while($row = $module->db->fetchByAssoc($res)){
            $lineItems[$row['id']]= $row['id'];
    }


    //backward compatibility
    $object_arr['Accounts'] = $module->billing_account_id;
    $object_arr['Contacts'] = $module->billing_contact_id;
    $object_arr['Users'] = $module->assigned_user_id;
    $object_arr['Currencies'] = $module->currency_id;


    $search = array ('@<script[^>]*?>.*?</script>@si',      // Strip out javascript
                    '@<[\/\!]*?[^<>]*?>@si',        // Strip out HTML tags
                    '@([\r\n])[\s]+@',          // Strip out white space
                    '@&(quot|#34);@i',          // Replace HTML entities
                    '@&(amp|#38);@i',
                    '@&(lt|#60);@i',
                    '@&(gt|#62);@i',
                    '@&(nbsp|#160);@i',
                    '@&(iexcl|#161);@i',
                    '@&#(\d+);@e',
                    '@<address[^>]*?>@si'
    );

    $replace = array ('',
                     '',
                     '\1',
                     '"',
                     '&',
                     '<',
                     '>',
                     ' ',
                     chr(161),
                     'chr(\1)',
                     '<br>'
        );


    $header = preg_replace($search, $replace, $template->pdfheader);
    $footer = preg_replace($search, $replace, $template->pdffooter);
    $text = preg_replace($search, $replace, $template->description);
    $text = str_replace("<p><pagebreak /></p>", "<pagebreak />", $text);
    $text = preg_replace_callback('/\{DATE\s+(.*?)\}/',
        function ($matches) { return date($matches[1]); },
        $text );

    $text = populate_asset_trans_lines($text, $lineItems);//完成行字段的覆盖

    $converted = templateParser::parse_template($text, $object_arr);//这里完成了字段的替换
    $header = templateParser::parse_template($header, $object_arr);
    $footer = templateParser::parse_template($footer, $object_arr);

    $printable = str_replace("\n","<br />",$converted);

    echo $header;
    echo $printable;
    echo $footer;


//本函数添加资产事务处理行
function populate_asset_trans_lines($text, $lineItems, $element = 'tr'){
    $firstValue = '';
    $firstNum = 0;

    $lastValue = '';
    $lastNum = 0;

    $startElement = '<'.$element; //这里是重复行，按默认的调用是TR行完整的重复
    $endElement = '</'.$element.'>';

    //Find first and last valid line values
    $trans_lines = new HAT_Asset_Trans();
    foreach($trans_lines->field_defs as $name => $arr){
        if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){

            $curNum = strpos($text,'$hat_asset_trans_'.$name);//strpos是 在字符串中第一次出现的位置：

            if($curNum) //以下的判断是为了定位出第一个和最后一个行中的字段名。分别存在FirstNUM和lastNum中
            {
                if($curNum < $firstNum || $firstNum == 0)
                {
                    $firstValue = '$hat_asset_trans_'.$name;
                    $firstNum = $curNum;
                }
                if($curNum > $lastNum)
                {
                    $lastValue = '$hat_asset_trans_'.$name;
                    $lastNum = $curNum;

                }
            }
        }
    }


    if($firstValue !== '' && $lastValue !== ''){

        //Converting Text
        $tparts = explode($firstValue,$text);//把字符串打散为数组
        $temp = $tparts[0];

        //check if there is only one line item
        //如果只有1个行上的字段，就直接等于当前第一个字段
        if($firstNum == $lastNum){
            $linePart = $firstValue;
        }
        else{
            //如果不止有1个行上的字段
            $tparts = explode($lastValue,$tparts[1]);//把字符串打散为数组
            $linePart = $firstValue . $tparts[0] . $lastValue;
        }


        $tcount = strrpos($temp,$startElement);
        $lsValue = substr($temp,$tcount);
        $tcount=strpos($lsValue,">")+1;
        $lsValue = substr($lsValue,0,$tcount);

        //Read line end values
        $tcount=strpos($tparts[1],$endElement)+strlen($endElement);
        $leValue = substr($tparts[1],0,$tcount);
        $tdTemp = explode($lsValue,$temp);

        $linePart = $lsValue.$tdTemp[count($tdTemp)-1].$linePart.$leValue;
        $parts = explode($linePart,$text);
        $text = $parts[0];

        /*print_r ($lineItems);*/
        //echo $text;

        //Converting Line Items
        $obb = array();

        foreach ($lineItems as $id => $lineItemsArray){
            $obb['HAT_Asset_Trans'] = $lineItemsArray;
            $linePart = templateParser::parse_template($linePart, $obb);
            $linePart = str_replace("&lt;strong&gt;", "", $linePart);
            $linePart = str_replace("&lt;/strong&gt;", "", $linePart);
            $text .= $linePart;
        }

        $text .= $parts[1];
    }
    return $text;
}

?>