<?php

$settings = array();

$tmp = array(

    'api_url'         => array(
        'value' => 'https://iiko.biz:9900',
        'xtype' => 'textfield',
        'area'  => 'modiiko_main',
    ),
    'api_user_id'     => array(
        'value' => '',
        'xtype' => 'textfield',
        'area'  => 'modiiko_main',
    ),
    'api_user_secret' => array(
        'value' => '',
        'xtype' => 'textfield',
        'area'  => 'modiiko_main',
    ),


    //временные
    'assets_path'     => array(
        'value' => '{base_path}modiiko/assets/components/modiiko/',
        'xtype' => 'textfield',
        'area'  => 'modiiko_temp',
    ),
    'assets_url'      => array(
        'value' => '/modiiko/assets/components/modiiko/',
        'xtype' => 'textfield',
        'area'  => 'modiiko_temp',
    ),
    'core_path'       => array(
        'value' => '{base_path}modiiko/core/components/modiiko/',
        'xtype' => 'textfield',
        'area'  => 'modiiko_temp',
    )

    /*
	'some_setting' => array(
		'xtype' => 'combo-boolean',
		'value' => true,
		'area' => 'modiiko_main',
	),
	*/
);

foreach ($tmp as $k => $v) {
    /* @var modSystemSetting $setting */
    $setting = $modx->newObject('modSystemSetting');
    $setting->fromArray(array_merge(
        array(
            'key'       => 'modiiko_' . $k,
            'namespace' => PKG_NAME_LOWER,
        ), $v
    ), '', true, true);

    $settings[] = $setting;
}

unset($tmp);
return $settings;
