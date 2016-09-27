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

    $text = populate_asset_trans_lines($text, $lineItemsGroups, $lineItems);

    $converted = templateParser::parse_template($text, $object_arr);
    $header = templateParser::parse_template($header, $object_arr);
    $footer = templateParser::parse_template($footer, $object_arr);

    $printable = str_replace("\n","<br />",$converted);

    echo $header;
    echo $printable;
    echo $footer;


//本函数添加资产事务处理行
function populate_asset_trans_lines($text, $lineItemsGroups, $lineItems, $element = 'table'){

    $firstValue = '';
    $firstNum = 0;

    $lastValue = '';
    $lastNum = 0;

    $startElement = '<'.$element;
    $endElement = '</'.$element.'>';

    $line = new HAT_Asset_Trans();
    foreach($line->field_defs as $name => $arr){
        if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){

            $curNum = strpos($text,'$hat_asset_trans'.$name);
            if($curNum)
            {
                if($curNum < $firstNum || $firstNum == 0)
                {
                    $firstValue = '$hat_asset_trans'.$name;
                    $firstNum = $curNum;
                }
                if($curNum > $lastNum)
                {
                    $lastValue = '$hat_asset_trans'.$name;
                    $lastNum = $curNum;
                }
            }
        }
    }
    if($firstValue !== '' && $lastValue !== ''){

        //Converting Text
        $tparts = explode($firstValue,$text);
        $temp = $tparts[0];

        //check if there is only one line item
        if($firstNum == $lastNum){
            $linePart = $firstValue;
        }
        else{
            $tparts = explode($lastValue,$tparts[1]);
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

        //Converting Line Items
        if(count($lineItems) != 0){
            foreach($lineItems as $id => $productId){
                if($productId != null && $productId != '0'){
                    $obb['AOS_Products_Quotes'] = $id;
                    $obb['AOS_Products'] = $productId;
                    $text .= templateParser::parse_template($linePart, $obb);
                }
            }
        }

        $text .= $parts[1];
    }

    return $text;

}

?>