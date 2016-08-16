<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAT_Meters'] = array ( //这里是主模块

    'subpanel_setup' => array (
        'hat_meters_subpanel_hat_meter_reading' => array (
            'order' => 10,
            'module' => 'HAT_Meter_Readings', //这里是子模块
            'sort_order' => 'asc',
            'sort_by' => 'reading_date',
            'subpanel_name' => 'default', //这个是指向布局文件
            'get_subpanel_data' => 'hat_meters_hat_meter_readings', //这个指向vardef中定义的Link
            'title_key' => 'LBL_METER_READING_SUBPANEL_TITLE',
            'top_buttons'  => array (
                0 => array('widget_class' => 'SubPanelTopCreateButton'),
               //如果需要可以加入更多按钮
                )
            )
        )
    );

    ?>