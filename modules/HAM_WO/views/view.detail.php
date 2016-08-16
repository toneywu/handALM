<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAM_WOViewDetail extends ViewDetail
{

    function Display() {

        //之前可以有许多内容，在此不在显示
        /*echo "ViewDetail";
        foreach ($this->bean as $key => $value) {
            echo '</br>'.$key;
        }*/
        parent::Display();//调用父类方法

    }

}