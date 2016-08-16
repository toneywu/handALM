<?php

//这个文件由HAA_FF中Metadata直接调用。
function display_field_lines($focus, $field, $value, $view){

    global $locale, $app_list_strings, $mod_strings;

    $html = '';

    //加载行模块的语言包（父模块不会自动加载，所以在此需要手工处理）
    if (!is_file('cache/jsLanguage/HAA_FF_Fields/' . $GLOBALS['current_language'] . '.js')) {
        require_once ('include/language/jsLanguage.php');
        jsLanguage::createModuleStringsCache('HAA_FF_Fields', $GLOBALS['current_language']);
    }
    $html .= '<script src="cache/jsLanguage/HAA_FF_Fields/'. $GLOBALS['current_language'] . '.js"></script>';

    //处理编辑视图
    if($view == 'EditView'||$view == 'DetailView'){

        //加载已经保存的数据，一行行的进行读取。
        $html .= '<script src="modules/HAA_FF_Fields/js/fieldLines.js"></script>';
        $html .= "<table border='0' cellspacing='4' width='100%' id='fieldLines'></table>";

      //加载自定义的Code清单
        echo "<script>ff_extended_list ='<option></option>";
/*        $codesBean = BeanFactory::getBean('HAA_Codes');
        $codesBeanList = $codesBean->get_full_list('name',"haa_codes.code_type = 'flexform_extended_list'");
        foreach ($codesBeanList as $codelist) {
            echo "<option>".$codelist->name."</option>";
        }*/
        $sql = "SELECT DISTINCT 
                  code_tag 
                FROM
                  haa_codes 
                WHERE haa_codes.deleted = 0 
                  AND haa_codes.code_type = 'flexform_extended_list'  ORDER BY code_tag ASC";
                $result = $focus->db->query($sql);
                //$GLOBALS['log']->error($sql);
                while ($row = $focus->db->fetchByAssoc($result)) {
                    if ($row['code_tag']!="")
                      echo "<option>".$row['code_tag']."</option>";
                }
        echo"'</script>";

      //加载主要的行内容
        $html .= "<div style='padding-top: 10px; padding-bottom:10px;'>";
        $html .= "<input type=\"button\" tabindex=\"116\" class=\"button\" value=\"".$mod_strings['LBL_ADD_FIELD']."\" id=\"btn_FieldLine\" onclick=\"insertFieldLine()\" disabled/>";
        $html .= "</div>";

        if(isset($focus->id) && $focus->id != ''){ //父ID
            //require_once("modules/AOW_WorkFlow/aow_utils.php");
            $html .= "<script>";
            $html .= "haa_ff_id = \"".$focus->id."\";";
            $html .= "showModuleFields();";
            $html .= "document.getElementById('btn_FieldLine').disabled = '';"; //将按钮设置为可以点击
            if($focus->id != ''){
                $sql = "SELECT
                          haa_ff_fields.id,
                          haa_ff_fields.`field`,
                          haa_ff_fields.fieldtype,
                          haa_ff_fields.listfilter,
                          haa_ff_fields.mask,
                          haa_ff_fields.`att_required`,
                          haa_ff_fields.`default_val`,
                          ff_labels1.`name` label,
                          ff_labels2.`name` label_b
                        FROM
                          haa_ff_fields
                          LEFT JOIN haa_ff_labels ff_labels1
                            ON haa_ff_fields.id = ff_labels1.`haa_ff_field_id`
                            AND ff_labels1.deleted = 0
                            AND ff_labels1.lang = 'en_us'
                          LEFT JOIN haa_ff_labels ff_labels2
                            ON haa_ff_fields.id = ff_labels2.`haa_ff_field_id`
                            AND ff_labels2.deleted = 0
                            AND ff_labels2.lang = 'zh_CN'
                        WHERE 
                        haa_ff_fields.`haa_ff_id`= '".$focus->id."' AND haa_ff_fields.deleted = 0 ORDER BY field ASC";
                $result = $focus->db->query($sql);
//                $GLOBALS['log']->error($sql);
                while ($row = $focus->db->fetchByAssoc($result)) {
                      $line_data = json_encode($row);
                      $html .= "loadFieldLine(".$line_data.");";
                }
            }
            $html .= "</script>";
            //$GLOBALS['log']->error("Load HAA_FF record with id of ".$html);
        }

    }

    if ($view == 'DetailView') {
        //在查看模式下不显示按钮
        $html .= "<script>$('#btn_FieldLine').hide()</script>";
    }

    return $html;
}

?>
