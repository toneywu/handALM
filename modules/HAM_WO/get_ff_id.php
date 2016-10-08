<?php 

error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
  
$hat_event_type_id = $_GET['hat_event_type_id']; 

 if(isset($hat_event_type_id) && ($hat_event_type_id)!=""){
            //判断是否已经设置有位置分类，如果有分类，则进一步的加载分类对应的FlexForm
            $event_type_id = $this->bean->hat_event_type_id;
            $bean_code = BeanFactory::getBean('HAT_EventType',$hat_event_type_id);
            if (isset($bean_code->haa_ff_id)) {
                $ff_id = $bean_code->haa_ff_id;
            }
            if (isset($ff_id) && $ff_id!="") {
                //如果分类有对应的FlexForm，些建立一个对象去存储FF_ID
                //需要注意的是在Metadata中是不包括这个ID的，如果这里没有加载则在后续的JS文件中加载
                //echo '<script>console.log('.$ff_id.');$("#haa_ff_id").val('.$ff_id.');</script>';
				echo $ff_id;	
            }
        }
?>