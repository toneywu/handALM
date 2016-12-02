 <?php
 $layout_defs["AOS_Contracts"]["subpanel_setup"]['haos_revenues_quotes'] = array (
    'order' => 30,
    'module' => 'HAOS_Revenues_Quotes',
    'sort_order' => 'asc',
    'sort_by' => 'name',
    'subpanel_name' => 'AOS_Contracts_subpanel_haos_revenues_quotes',
            'get_subpanel_data' => 'function:get_revenue_quotes',//这里没有指向传统的link，而是指向了一个function
            'generate_select' => true,
            'title_key' => 'LBL_HAOS_REVENUES_QUOTES',
            'top_buttons'  => array (),
            'function_parameters' => array(
                'import_function_file' => 'modules/HAOS_Revenues_Quotes/RevenueSubpanel.php',//指向特定的文件
                'aos_source_id' => $this->_focus->id,
                'return_as_array' => 'true'
                ),
            );
