<?php
    require_once('service/v4_1/registry.php');
    class registry_v4_1_custom extends registry_v4_1
    {
        protected function registerFunction()
        {
            parent::registerFunction();
            $this->serviceClass->registerFunction(
		    'process_asset_info',
		    array('session'=>'xsd:string', 'module_name'=>'xsd:string',  'name_value_list'=>'tns:name_value_list'),
		    array('return'=>'tns:new_set_entry_result'));
        }
    }
?>