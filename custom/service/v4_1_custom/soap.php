<?php
    chdir('../../..');
    require_once('ProcessAssetWSCustom.php');
    require_once('interfacePublicEntry.php');
    $webservice_class = 'SugarSoapService2';
    $webservice_path = 'service/v2/SugarSoapService2.php';
    $webservice_impl_class = 'ProcessAssetWSCustom';
    $webservice_impl_class = 'interfacePublicEntry';
    $registry_class = 'registry_v4_1_custom';
    $registry_path = 'custom/service/v4_1_custom/registry.php';
    $location = 'custom/service/v4_1_custom/soap.php';
    require_once('service/core/webservice.php');    
?>