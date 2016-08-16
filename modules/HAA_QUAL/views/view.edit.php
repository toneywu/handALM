<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAA_QUALViewEdit extends ViewEdit
{


    function Display() {

/*        foreach ($_REQUEST as $key => $value) {
            echo '</br>'.$key ." = ".$value;
        }
*/        if(isset($_REQUEST['account_id']) && $_REQUEST['account_id'] !="") {
            $this->bean->org_id = $_REQUEST['account_id'];
            $this->bean->org = $_REQUEST['account_name'];
        }


        parent::Display();

        if(isset($this->bean->code_qualification_type_id) && ($this->bean->code_qualification_type_id)!=""){
            //加载Type对应的FF界面数据
            //
            $code_qualification_type_id = $this->bean->code_qualification_type_id;
            $bean_codes = BeanFactory::getBean('HAA_Codes',$code_qualification_type_id);

            $ff_id = $bean_codes->haa_ff_id;
            //如果分类有对应的FlexForm，些建立一个对象去存储FF_ID
            //需要注意的是在Metadata中是不包括这个ID的，如果这里没有加载则在后续的JS文件中加载
        } 

        $ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden '.(isset($ff_id)?'value='.$ff_id:'').'>';
        echo '<script>if($("#haa_ff_id").length==0) { $("#EditView").append("'.$ff_id_field.'");}</script>';

        if(isset($this->bean->haa_ff_id) && ($this->bean->haa_ff_id)!=""){
        //如果已经选择类型，无论是否类型对应的FlexForm有值，值将界面展开。
        //（如果没有类型，则界面保持折叠状态。）
            echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
         } else {
            echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
         }

    }


}//end class
