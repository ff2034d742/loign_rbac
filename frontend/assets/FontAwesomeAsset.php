<?php
/**
* @link http://www.yiiframework.com/
* @copyright Copyright (c) 2008 Yii Software LLC
* @license http://www.yiiframework.com/license/
*/
namespace frontend\assets;
use yii\web\AssetBundle;
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yidas\yii\fontawesome\FontawesomeAsset',
    ];
}
'components' => [
    'assetManager' => [
        'bundles' => [
            'yidas\yii\fontawesome\FontawesomeAsset' => [
                'cdn' => true,
                // 'cdnVersion' => '5.11.0',
            ],
        ],
    ],
],