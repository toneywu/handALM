<?php
$layout_defs['HIT_IP_TRANS_BATCH'] = array ( //这里是主模块
 
    'subpanel_setup' => array (
        'hit_ip_trans_batch_hit_ip_trans' => array (
            'order' => 10,
            'module' => 'HIT_IP_TRANS', //这里是子模块
            'sort_order' => 'asc',
            'sort_by' => 'name',
            'subpanel_name' => 'default', //这个是指向布局文件
            'get_subpanel_data' => 'hit_ip_trans_batch_hit_ip_trans', //这个指向vardef中定义的Link
            'title_key' => 'LBL_HIT_IP_TRANS_BATCH_HIT_IP_TRANS_TITLE',
            'top_buttons'  => array (
                0 => array('widget_class' => 'SubPanelTopCreateButton'),
               //如果需要可以加入更多按钮
            ),
        ),
 
     //这里可能加入更多的subpanel
),
);

?>