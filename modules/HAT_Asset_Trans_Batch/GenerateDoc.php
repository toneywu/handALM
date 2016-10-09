<?php
//**************************************************************/
////本文件基于aso_pdf_template/generatePdf.php进行扩展
//扩展主要包括以下关键点
//1、从实体中加载TemplateID
//2、引入资产事务处理行
//by toney.wu 2016.09.27 for HandALM
//**************************************************************/

if(!isset($_REQUEST['uid']) || empty($_REQUEST['uid']) || !isset($_REQUEST['templateID']) || empty($_REQUEST['templateID'])){
        die('Error retrieving record. This record may be deleted or you may not be authorized to view it.');
    }
    //error_reporting(0);

    echo '<script src="custom/resources/tinymce/js/tinymce/tinymce.min.js"></script>';
    //echo '<script src="custom/resources/tinymce/js/tinymce/langs/zh_CN.js"></script>';
    echo '<script src="modules/HAT_Asset_Trans_Batch/js/GenerateDoc.js"></script>';


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

    $task = $_REQUEST['task'];

    $template_id = $_REQUEST['templateID'];//'ba6bc1c1-ecd1-1e4f-8a3d-57e9db73341f';//'99d601b6-0a58-bf2e-4c33-57e5249af624';//
    $template = new AOS_PDF_Templates();
    $template->retrieve($template_id);

    //分以下几种情况
    //1-Task为空，则判断是否有存档的记录，如果有，就从存档的DOC中读取，如果没有存档记录，则从模板生成
    //2-Task=new，直接从模板进行生成
    //3-Task=save/pdf/emailpdf将已有的记录进行存档，按最新的存档进行读取
	if($task == '') {
		$saved_doc = BeanFactory::getBean('HAA_Docs') ->retrieve_by_string_fields(array('parent_type'=>$module_type, 'parent_id'=>$_REQUEST['uid']));
		if (empty($saved_doc)) { 
			//读取不到历史记录，就重新生成
			$text = $template->description;
		}else{
			//如果已经有已存档的记录，就从存档的记录中读取
			$text = $saved_doc->description;
		}
	} elseif ($task == 'new') {
		//重新生成当前的模板数据
		$text = $template->description;
	} elseif ($task == 'save'|| $task == 'pdf' || $task == 'emailpdf') {
		if (isset($_REQUEST['DocText'])) {
			//从提交的数据中，保存已经生成的内容
			$saved_doc = BeanFactory::getBean('HAA_Docs') ->retrieve_by_string_fields(array('parent_type'=>$module_type, 'parent_id'=>$_REQUEST['uid']));
			if (empty($saved_doc)) { //读取不到历史记录，就进行新增记录
				$saved_doc = BeanFactory::getBean('HAA_Docs');
			}
			//将POST的内容进行保存
	   		$saved_doc->description = $_REQUEST['DocText'];
			$saved_doc->parent_type = $module_type;
			$saved_doc->parent_id = $_REQUEST['uid'];
			$saved_doc->save();
		}
   		$text = $saved_doc->description;
	}

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
    $text = preg_replace($search, $replace,  $text);
    $text = str_replace("<p><pagebreak /></p>", "<pagebreak />", $text);
    $text = preg_replace_callback('/\{DATE\s+(.*?)\}/',
        function ($matches) { return date($matches[1]); },
        $text );

    $text = populate_template_lines($text, $lineItems,'tr','HAT_Asset_Trans');//完成行字段的覆盖
    $text = populate_template_lines($text, $lineItems,'tr','HAM_WO_Lines');//完成行字段的覆盖
    $text = populate_template_lines($text, $lineItems,'tr','HIT_IP_TRANS');//完成行字段的覆盖

	$converted = templateParser::parse_template($text, $object_arr);//这里完成了字段的替换
    $header = templateParser::parse_template($header, $object_arr);
    $footer = templateParser::parse_template($footer, $object_arr);

    $printable = str_replace("\n","<br />",$converted);

/*echo "<pre>";
print_r ($module);
*/
echo '<div class="moduleTitle">
<h2> <a href="index.php?module=HAT_Asset_Trans_Batch&amp;action=DetailView&amp;record='.$module->id.'">'.$module->name.'</a><span class="pointer">»</span>'.translate('LBL_GENERATE_DOC','HAT_Asset_Trans_Batch').'</h2><div class="clear"></div></div>';

    echo '<form id="GenerateDocForm" name="GenerateDoc" method="post" >';
    echo '<input name="BtnSave" id="BtnSaveAsPDF" type="button" value="Save and Continue" onclick="SaveAsPDF(\'save\',\''.$_REQUEST['uid'].'\',\''.$template_id.'\')">';
    echo '<input name="BtnRegenerate" id="BtnRegenerate" type="button" value="Regenerate Doc" onclick="SaveAsPDF(\'new\',\''.$_REQUEST['uid'].'\',\''.$template_id.'\')">';
    echo '<input name="BtnSaveAsPDF" id="BtnSaveAsPDF" type="button" value="Achive as PDF" onclick="SaveAsPDF(\'pdf\',\''.$_REQUEST['uid'].'\',\''.$template_id.'\')">';
    echo $header;
    echo '<textarea name="DocText" id="DocText">'.$printable.'</textarea>';
    echo $footer;
    echo '</form>';

if($task == 'pdf' || $task == 'emailpdf')
    {
        $file_name = $mod_strings['LBL_PDF_NAME']."_".str_replace(" ","_",$module->name).".pdf";

        ob_clean();
        try{
            $pdf=new mPDF('en','A4','','DejaVuSansCondensed',$template->margin_left,$template->margin_right,$template->margin_top,$template->margin_bottom,$template->margin_header,$template->margin_footer);
            $stylesheet = file_get_contents('custom/themes/pdf.css');
            $pdf->WriteHTML($stylesheet,1);
            $pdf->setAutoFont();
            $pdf->SetHTMLHeader($header);
            $pdf->SetHTMLFooter($footer);
            $pdf->writeHTML($printable);
            if($task == 'pdf'){
                $pdf->Output($file_name, "D");
            }else{
                $fp = fopen($sugar_config['upload_dir'].'attachfile.pdf','wb');
                fclose($fp);
                $pdf->Output($sugar_config['upload_dir'].'attachfile.pdf','F');
                sendEmail::send_email($module,$module_type, '',$file_name, true,$module->id);
            }
        }catch(mPDF_exception $e){
            echo $e;
        }
    }
    else if($task == 'email')
    {
        sendEmail::send_email($module,$module_type, $printable,'', false);
    }
?>



<?php
//本函数添加资产事务处理行
function populate_template_lines($text, $lineItems, $element = 'tr', $module){

    //module采用小写名称，例如$module=hat_asset_trans
    $firstValue = '';
    $firstNum = 0;

    $lastValue = '';
    $lastNum = 0;

    $startElement = '<'.$element; //这里是重复行，按默认的调用是TR行完整的重复
    $endElement = '</'.$element.'>';

    //Find first and last valid line values
    $trans_lines = new $module();

    foreach($trans_lines->field_defs as $name => $arr){
        if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){

            $curNum = strpos($text,'$'.strtolower($module).'_'.$name);//strpos是 在字符串中第一次出现的位置：

            if($curNum) //以下的判断是为了定位出第一个和最后一个行中的字段名。分别存在FirstNUM和lastNum中
            {
                if($curNum < $firstNum || $firstNum == 0)
                {
                    $firstValue = '$'.strtolower($module).'_'.$name;
                    $firstNum = $curNum;
                }
                if($curNum > $lastNum)
                {
                    $lastValue = '$'.strtolower($module).'_'.$name;
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
            $obb[$module] = $lineItemsArray;
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