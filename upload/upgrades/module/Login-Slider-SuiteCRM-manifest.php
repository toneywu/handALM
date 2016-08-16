<?php

$manifest = array(
    0 =>
    array(
        'acceptable_sugar_versions' => array(
            'regex_matches' => array(
                0 => "6.5.*",
            ),
        ),
    ),
    1 =>
    array(
        'acceptable_sugar_flavors' =>
        array(
            0 => 'CE',
            1 => 'PRO',
            2 => 'ENT',
        ),
    ),
    'readme' => 'README.txt',
    'key' => 'bc',
    'author' => 'Biztech',
    'description' => 'Package to add image slider feature in login page',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'LoginSliderPlugin',
    'published_date' => '2014-10-06 11:48:56',
    'type' => 'module',
    'version' => 1,
    'remove_tables' => 'prompt',
);


$installdefs = array(
    'id' => 'LoginSliderPlugin',
    'pre_execute' => array(
        0 => '<basepath>/scripts/pre_execute.php',
    ),
    'post_uninstall' => array(
        0 => '<basepath>/scripts/post_uninstall.php',
    ),
    'copy' =>
    array(
        0 =>
        array(
            'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Administration/loginPageSliderGallery.php',
            'to' => 'custom/Extension/modules/Administration/Ext/Administration/loginPageSliderGallery.php',
        ),
        1 =>
        array(
            'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/en_us.loginPageSliderGallery.php',
            'to' => 'custom/Extension/modules/Administration/Ext/Language/en_us.loginPageSliderGallery.php',
        ),
        2 =>
        array(
            'from' => '<basepath>/custom/include/loginSlider/',
            'to' => 'custom/include/loginSlider/',
        ),
        3 =>
        array(
            'from' => '<basepath>/custom/modules/Administration/views/view.loginpagesliderconfiguration.php',
            'to' => 'custom/modules/Administration/views/view.loginpagesliderconfiguration.php',
        ),
        4 =>
        array(
            'from' => '<basepath>/custom/modules/Administration/views/view.loginpageslidergallery.php',
            'to' => 'custom/modules/Administration/views/view.loginpageslidergallery.php',
        ),
        5 =>
        array(
            'from' => '<basepath>/custom/modules/Administration/controller.php',
            'to' => 'custom/modules/Administration/controller.php',
        ),
        6 =>
        array(
            'from' => '<basepath>/custom/modules/Users/Login.php',
            'to' => 'custom/modules/Users/Login.php',
        ),
        7 =>
        array(
            'from' => '<basepath>/custom/modules/Administration/slider_function.php',
            'to' => 'custom/modules/Administration/slider_function.php',
        ),
    ),
);
