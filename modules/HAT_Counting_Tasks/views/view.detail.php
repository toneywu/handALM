<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');
require_once('modules/HAT_Counting_Tasks/populateLineCountInfo.php');

class HAT_Counting_TasksViewDetail extends ViewDetail  {
	
	function display()
	{	
		$this->populateBatchInfo();
		
		require_once('modules/HAA_Frameworks/orgSelector_class.php');
		$current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
		$current_module = $this->module;
		$current_action = $this->action;
		$beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
		if (isset($beanFramework)) {
			$bean_framework_id = $_SESSION["current_framework"];
			$bean_framework_name = $beanFramework->name;
		}
		$this->ss->assign('FRAMEWORK_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id_c'));
		$modules = array('HAT_Counting_Tasks', 'HAT_Counting_Lines'
        );

        foreach ($modules as $module) {
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once 'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
        };
		parent::display();
		$this->display_lines();
		$countInfo= new CountInfo();
		$count=$countInfo->populateLineCountInfo($this->bean->id);
		echo "<script>
		$('#total_counting').html('".$count['total_counting']."');
		$('#actual_counting').html('".$count['actual_counting']."');
		$('#amt_actual_counting').html('".$count['matched_count']."');
		$('#profit_counting').html('".$count['overage_count']."');
		$('#loss_counting').html('".$count['loss_count']."');
		$('#diff_counting').html('".$count['different_count']."');
		$('#actual_adjust_count').html('".$count['processed_count']."');
		$('#un_actual_counting').html('".$count['un_actual_counting']."');
	</script>";
	echo "<script>
	$('#task_number').val('".$this->bean->task_number."');
	$('#planed_start_date').val('".$this->bean->planed_start_date."');
	$('#planed_complete_date').val('".$this->bean->planed_complete_date."');
	$('#snapshot_date').val('".$this->bean->snapshot_date."');
</script>";

echo '<input  id="location_attr" value="" type="hidden">';
echo '<input  id="oranization_attr"  type="hidden" value="">';
echo '<input  id="major_attr"  type="hidden" value="">';
echo '<input  id="category_attr"  type="hidden" value="">';

}

function populateBatchInfo(){

	if($_REQUEST['hat_counting_batchs_id']){
		$bean_request=BeanFactory::getBean("HAT_Counting_Batchs",$_REQUEST['hat_counting_batchs_id']);

		$this->bean->name=$bean_request->name ;
		$this->bean->hat_counting_batchs_id_c=$bean_request->id ;
		$this->bean->counting_batch_name=$bean_request->name ;
		$this->bean->task_number=$bean_request->batch_number ;
		$this->bean->planed_start_date=$bean_request->planed_start_date ;
		$this->bean->planed_complete_date=$bean_request->planed_complete_date ;
		$this->bean->snapshot_date=$bean_request->snapshot_date ;
		$this->bean->objects_type=$bean_request->objects_type ;
		$this->bean->counting_by_location=$bean_request->counting_by_location ;
		$this->bean->counting_mode=$bean_request->counting_mode ;
		$this->bean->counting_scene=$bean_request->counting_scene ;
		$this->bean->offline_flag=$bean_request->offline_flag;
	}
}

function display_lines(){

   global $sugar_config, $locale, $app_list_strings, $mod_strings;
   $focus=$this->bean;
    //以下开始处理行显示相关的内容
   $html = '';
   	echo '<script type="text/javascript" src="custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>';
		echo '<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">';
      $html .= '<script src="modules/HAT_Counting_Tasks/js/line_items.js"></script>';
      echo $html;
      $html .= "<table border='0' cellspacing='4'  id='lineItems_line' class='list view table'></table>";
      echo "<script>replace_display_lines(" .json_encode($html).",'line_items_detail_span'".");</script>";

      $sql = "SELECT
      hcl.id,
      ha.NAME asset_desc,
      hcl.NAME line_name,";

      $sql_template="SELECT
      hctd.field_lable,
      hctd.column_name,
      hctd.field_type,
      hctd.relate_module,
      hctd.module_dsp,
      hctd.list_name
      FROM
      hat_counting_tasks hct,
      hat_counting_task_templates_hat_counting_template_details_c h,
      hat_counting_template_details hctd
      WHERE
      1 = 1
      AND hct.hat_counting_task_templates_id_c = h.hat_countid917mplates_ida
      AND h.hat_countib27cdetails_idb = hctd.id
      AND hctd.table_names = 'INV_TASK_DETAILS'
      AND hct.id='".$focus->id."'";
      $result_template = $focus->db->query($sql_template);
      $attr_label =array();
      $attr_data =array();
      $attr_type =array();
      $attr_module =array();
      $attr_dsp =array();
      $attr_name =array();
      $num=0;
      while ($row_template = $focus->db->fetchByAssoc($result_template)) {
         $sql.="hcl.".$row_template["column_name"].",";
         $attr_label[$num]=$row_template["field_lable"];
         $attr_data[$num]=$row_template["column_name"];
         $attr_type[$num]=$row_template["field_type"];
         $attr_module[$num]=$row_template["relate_module"];
         $attr_dsp[$num]=$row_template["module_dsp"];
         $attr_name[$num]=$row_template["list_name"];
         $num++;
      }
      $sql .= "hcl.counting_status
      FROM
      hat_counting_tasks hct,
      hat_counting_lines hcl
      LEFT JOIN hat_assets ha ON ha.id = hcl.hat_assets_id_c
      WHERE
      1 = 1
      AND hct.deleted=0
      and hcl.deleted=0
      AND hct.id = hcl.hat_counting_tasks_id_c
      AND hct.id ='".$focus->id."'";
      //var_dump($sql);
      $result = $focus->db->query($sql);
      $attr_label= json_encode($attr_label);
      $attr_column= json_encode($attr_data);
      $html1 = '<script>
      var attr_label=\''.$attr_label.'\';
      insertLineHeader("lineItems_line",attr_label);</script>';
      echo $html1;
      //echo "<script>insertLineFootor('lineItems_line');</script>";
      $html .= "<script>$(document).ready(function(){";
      while ($row = $focus->db->fetchByAssoc($result)) {
         $row["counting_status"]=$app_list_strings["hat_counting_line_status_list"][$row["counting_status"]];
         for($i=0;$i<$num;$i++){
            if($attr_type[$i]=='LOV'){
               if($row[$attr_data[$i]]){
                  $sql_attr="SELECT
                  ".$attr_dsp[$i]." name
                  FROM ".$attr_module[$i]." 
                  WHERE
                  id = '".$row[$attr_data[$i]]."'";
                  $result_attr = $focus->db->query($sql_attr);
                  $row_attr = $focus->db->fetchByAssoc($result_attr);
                  $row[$attr_data[$i]]=$row_attr["name"];
               }
               }else if ($attr_type[$i]=='LIST') {
                 $row[$attr_data[$i]]=$app_list_strings[$attr_name[$i]][$row[$attr_data[$i]]];
         }
      }
         $line_data = json_encode($row);
         $html .='var attr_data=\''.$attr_column.'\';';
         $html .= "insertLineData(" . $line_data .",'DetailView',attr_data,'".$focus->id."');";
         $html .= 'resetLineNum();';
      }
      $html .= "goPagefist();";
      $html .= "})</script>";
      echo $html;

}

}
?>
