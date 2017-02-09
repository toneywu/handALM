<?php
/********************************/
/*在EditView中进行初始化界面，新增时将打开的面板进行自动折叠*/
// para:
// ff_obj_id 对应的FF对象的ID，如界面由EventType触发，则传入应当为HAT_EventType_ID，在对方应当为$this->bean->hat_eventtype_id。不过在引用前需要判断$this->bean->hat_eventtype_id是否为空，否则会PHP警告
/********************************/

function initEditViewByFF($ff_obj_id, $module_name) {

	if(!empty($ff_obj_id)){
		//有对应的FF触发对象ID，比如处于修改的状态
        $bean_ff_obj = BeanFactory::getBean($module_name, $ff_obj_id);
        if (isset($bean_ff_obj->haa_ff_id)) {
            $ff_id = $bean_ff_obj->haa_ff_id;
        } elseif (isset($bean_ff_obj->haa_ff_id_c)) {
            $ff_id = $bean_ff_obj->haa_ff_id_c;
        }
	    //有EventType值，保持展开
	 } else {
	 	//有对应的FF触发对象的ID，比如处于新增状态
	    //没有EventType值，保持通过模拟点击实现面板的关闭
	    echo '<script>$(document).ready(function(){SUGAR.util.doWhen("typeof $(\"a[data-toggle=\'collapse\']\").click == \'function\'", function(){
	            $(".panel-content").find(".panel-heading a[data-toggle=\'collapse\']:not(.collapsed)").click();
	        })});</script>';

	}

    if (!empty($ff_id)) {
        //如果分类有对应的FlexForm，些建立一个对象去存储FF_ID
        //需要注意的是在Metadata中是不包括这个ID的，如果这里没有加载则在后续的JS文件中加载
        $ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden '.(isset($ff_id)?'value='.$ff_id:'').'>';
        echo '<script>$(document).ready(function(){if($("#haa_ff_id").length==0) { $("#EditView").append("'.$ff_id_field.'");}else{$("#haa_ff_id").val("'.$ff_id.'")};SUGAR.util.doWhen("typeof setFF == \'function\'", function(){
        call_ff();
      });});</script>';
    } else {
        $ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden>';
        echo '<script>$(document).ready(function(){if($("#haa_ff_id").length==0) { $("#EditView").append("'.$ff_id_field.'");}});</script>';
    }

}
?>