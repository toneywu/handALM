<?php
/**
 *This moudle is extended from AOW
 *by Toney Wu @handALM
 */

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
//require_once("modules/AOW_WorkFlow/aow_utils.php");

class HAA_FFController extends SugarController {

    public function action_setFF() {
        //设置界面，返回界面结果
        global $db, $current_language;

        $html='';
        if(isset($_REQUEST['ff_id']) && $_REQUEST['ff_id'] != ''){
        	$this_FF = BeanFactory::getBean('HAA_FF',$_REQUEST['ff_id']);
            //END=-读取行上的设置
            $sql = "SELECT
                          haa_ff_fields.`id`,
                          haa_ff_fields.`field`,
                          haa_ff_fields.`fieldtype`,
                          haa_ff_fields.`listfilter`,
                          haa_ff_fields.`mask`,
                          haa_ff_fields.`att_required`,
                          haa_ff_fields.`default_val`,
                          haa_ff_labels.`name` label
                        FROM
                          haa_ff_fields
                          LEFT JOIN haa_ff_labels
                            ON haa_ff_fields.`id` = haa_ff_labels.`haa_ff_field_id`
                            AND haa_ff_labels.`deleted` = 0
                            AND haa_ff_labels.`lang` = '".(isset($current_language)?$current_language:'en_us')."'
                        WHERE haa_ff_fields.`haa_ff_id`  = '".$_REQUEST['ff_id']."'";
                         // echo $sql;
            $result = $db->query($sql);
            while ($row = $db->fetchByAssoc($result)) {
                  $line_data = json_encode($row);
                  if ($html =="") {
                    $html=$line_data;
                  }else{
                    $html .= ','.$line_data;
                  }
            }//END=-读取行上的设置

        }//END if
        if (!empty($this_FF->triget_js)) {
        	echo '{"FF": ['.$html.'],"JS":"'.htmlspecialchars($this_FF->triget_js).'"}';
        } else {
        	echo '{"FF": ['.$html.']}';
        }
    }

    public function action_save()  {
        $sugarbean = new HAA_FF();
        $sugarbean->retrieve($_POST['record']);

        if(!$sugarbean->ACLAccess('Save')){//确认访问权限
            ACLController::displayNoAccess(true);
            sugar_cleanup(true);
        }

        require_once('include/formbase.php');
        $sugarbean = populateFromPost('', $sugarbean);//调用populateFromPost写入POST的数据

        $GLOBALS['log']->debug("Header Saved");
        $sugarbean->save($check_notify);
        $return_id = $sugarbean->id;

        $GLOBALS['log']->debug("Saved HAA_FF record with id of ".$return_id);
        //****************** END: Save the header normally******************//
        //$GLOBALS['log']->error(create_guid());

        $fieldLine = array();

        $this->save_lines($_POST, $sugarbean, 'ff_field_');

       // handleRedirect($return_id, 'HAA_FF');
       //die;
    }

    Private function save_lines($post_data, $parent, $key = ''){

        $line_count = isset($post_data[$key.'field']) ? count($post_data[$key.'field']) : 0; //判断记录的行数

        for ($i = 0; $i < $line_count; ++$i) {

            if ($post_data[$key.'deleted'][$i] == 1 && $post_data[$key.'id'][$i] != '') {
                //需要删除记录
                $field_lines = new HAA_FF_Fields();
                $field_lines -> retrieve($post_data[$key.'id'][$i]);
                $field_lines -> mark_deleted($post_data[$key.'id'][$i]);
                //将Label表中的也同步清除
                $field_label_lines = BeanFactory::getBean('HAA_FF_Labels');
                $field_label_lines -> retrieve_by_string_fields(array('haa_ff_field_id'=> $post_data[$key.'id'][$i]));
                $field_label_lines -> mark_deleted();
                $field_label_lines -> save();
            } else if ($post_data[$key.'field'][$i]!='') {
                //只保存字段名不为空时继续，否则直接到下一循环
                //新增或修改行
                if($post_data[$key.'id'][$i] == ''){//新增行
                    $field_lines = new HAA_FF_Fields();
                    $field_lines = BeanFactory::getBean('HAA_FF_Fields');
                } else {//修改行
                    echo ("line should be modified<br/>");
                    $field_lines = BeanFactory::getBean('HAA_FF_Fields') -> retrieve($post_data[$key.'id'][$i]);
                }

                //echo "(".$post_data[$key.'field'][$i].") ->att_hide=".((is_null($post_data[$key.'att_hide'][$i])||$post_data[$key.'att_hide'][$i]==0)?0:1)."[".$post_data[$key.'att_hide'][$i]."]<br/>";

                $field_lines ->field = $post_data[$key.'field'][$i];
                $field_lines ->fieldtype = $post_data[$key.'fieldtype'][$i];
                $field_lines ->listfilter = $post_data[$key.'listfilter'][$i];
                $field_lines ->att_required = is_null($post_data[$key.'att_required'][$i])?0:1;
                $field_lines ->mask = $post_data[$key.'mask'][$i];
                //$field_lines ->att_hide = is_null($post_data[$key.'att_hide'][$i])?0:1;//Checkbox传递过来时空为没有选，0为选中。
                //$field_lines ->att_keep_position = is_null($post_data[$key.'att_keep_position'][$i])?0:1;
                $field_lines ->default_val = $post_data[$key.'default_val'][$i];
                $field_lines->haa_ff_id = $parent->id;//父ID

                $field_lines->save();

                  //写入多语言表
                  //
                $current_line_id = $field_lines->id;
                echo $current_line_id." ".$post_data[$key.'label2'][$i]."<br/>";

                $field_label_lines = new HAA_FF_Labels();
                if ($current_line_id != '') {
                     $field_label_lines -> retrieve_by_string_fields(array('haa_ff_field_id'=> $current_line_id,'lang'=>'en_us'));
                 }
                if (empty($field_label_lines->haa_ff_field_id) and $field_label_lines->haa_ff_field_id=="") {
                    //如果没有分配ID，则可能是个新记录
                    $field_label_lines = BeanFactory::getBean('HAA_FF_Labels');
                    $field_label_lines->haa_ff_field_id = $current_line_id; 
                }

                if ($field_label_lines->name !=''||$post_data[$key.'label'][$i]!='') {
                            //如果原先记录就存在（需要覆盖或清空），或者记录不存在但新数据存在，则进行数据记录
                    $field_label_lines->name = $post_data[$key.'label'][$i];
                    $field_label_lines->lang = 'en_us';
                    $field_label_lines->save();
                }

                $field_label_lines = new HAA_FF_Labels();//准备写入中文标签
                if ($current_line_id!=''){
                    //读取已经存在的标签
                    $field_label_lines -> retrieve_by_string_fields(array('haa_ff_field_id'=> $current_line_id,'lang'=>'zh_CN'));
                }

                if (empty($field_label_lines->haa_ff_field_id) or $field_label_lines->haa_ff_field_id=="") {
                    //如果没有分配ID，则可能是个新记录
                    $field_label_lines = BeanFactory::getBean('HAA_FF_Labels');
                    $field_label_lines->haa_ff_field_id = $current_line_id;
                    echo "new <br/>";
                }else{echo "old [".$field_label_lines->haa_ff_field_id."][".$post_data[$key.'label_b'][$i]."]<br/>";
            	}

                if ($field_label_lines->name !=''||$post_data[$key.'label_b'][$i]!='') {
                            //如果原先记录就存在，或者记录不存在但新数据存在，则进行数据记录
                    $field_label_lines->name = $post_data[$key.'label_b'][$i];
                    $field_label_lines->lang = 'zh_CN';
                    $field_label_lines->save();
                }

            } else {
                    //empty line jumped
            }

        } //结束行for 循环
    } //end function save_lines

}
