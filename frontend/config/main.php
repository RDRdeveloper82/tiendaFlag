<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'tiendaFlag',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
    	'user' => [
    			'identityClass' => 'common\models\user',
    			'enableAutoLogin' => true,
    			'enableSession' => true,
    			'loginUrl'=>['site/login'],
    			'identityCookie' => [
    					'name' => '_frontendUser',
    					]
    		],
    	'session' => [
    			'name' => 'PHPFRONTSESSID',
    			'savePath' => sys_get_temp_dir(),
    		],
    	'request' => [
    			'cookieValidationKey' => 'OUmzDiJZWXrQSZNjMpfV',
    			'csrfParam' => '_frontendCSRF',
    		],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        		'rules' => [
        				'<controller:\w+>/<id:\d+>' => '<controller>/view',
        				'<controller:\w+>' => '<controller>/index',
        		],

        ],
    	
        'view' => [
            'class' => '\rmrevin\yii\minify\View',
            'enableMinify' => !YII_DEBUG,
            'web_path' => '@web', // path alias to web base
            'base_path' => '@webroot', // path alias to web base
            'minify_path' => '@webroot/assets', // path alias to save minify result
            'js_position' => [\yii\web\View::POS_END], // positions of js files to be minified
            'force_charset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
            'expand_imports' => true, // whether to change @import on content
            'compress_output' => true, // compress result html page
        ],
    	
    ],

	
    'params' => $params,
];
