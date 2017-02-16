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

        $this->serviceClass->registerFunction(
            'interfaceEntry',
            array('session'=>'xsd:string', 'interface_code'=>'xsd:string',  'ifc_header_list'=>'tns:ifc_header_list','ifc_line_lists'=>'tns:name_value_lists'),
            array('return'=>'tns:interface_return_result'));
    }
    protected function registerTypes() {

     parent::registerTypes();

            //modified_relationship_result
            //the top level result array
     $this->serviceClass->registerType
     (
        'interface_return_result',
        'complexType',
        'struct',
        'all',
        '',
        array(
         'return_status' => array('name'=>'return_status', 'type'=>'xsd:string'),
         'msg_data' => array('name'=>'msg_data', 'type'=>'xsd:string'),
         'rtn_key' => array('name'=>'rtn_key', 'type'=>'xsd:string'),
         'rtn_attr1' => array('name'=>'rtn_attr1', 'type'=>'xsd:string'),
         'rtn_attr2' => array('name'=>'rtn_attr2', 'type'=>'xsd:string'),
         'rtn_attr3' => array('name'=>'rtn_attr3', 'type'=>'xsd:string'),
         'rtn_attr4' => array('name'=>'rtn_attr4', 'type'=>'xsd:string'),
         'rtn_attr5' => array('name'=>'rtn_attr5', 'type'=>'xsd:string'),
         'rtn_attr6' => array('name'=>'rtn_attr6', 'type'=>'xsd:string'),
         'rtn_attr7' => array('name'=>'rtn_attr7', 'type'=>'xsd:string'),
         'rtn_attr8' => array('name'=>'rtn_attr8', 'type'=>'xsd:string'),
         )
        );

     $this->serviceClass->registerType
     (
        'ifc_header_list',
        'complexType',
        'struct',
        'all',
        '',
        array(
         'ext_batch_number' => array('name'=>'ext_batch_number', 'type'=>'xsd:string'),
         'line_cnt' => array('name'=>'line_cnt', 'type'=>'xsd:string'),
         'reference1' => array('name'=>'reference1', 'type'=>'xsd:string'),
         'reference2' => array('name'=>'reference2', 'type'=>'xsd:string'),
         'reference3' => array('name'=>'reference3', 'type'=>'xsd:string'),
         'reference4' => array('name'=>'reference4', 'type'=>'xsd:string'),
         )
        );
 }
}
?>