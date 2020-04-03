<?php
// return [
//     'aliases' => [
//         '@bower' => '@vendor/bower-asset',
//         '@npm'   => '@vendor/npm-asset',
//     ],
//     'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
//     'components' => [
//         'cache' => [
//             'class' => 'yii\caching\FileCache',
//         ],
//     ],
// ];

return [
'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
'modules' => [
'social' => [
// the module class
'class' => 'kartik\social\Module',
// the global settings for the disqus widget
'disqus' => [
'settings' => ['shortname' => 'DISQUS_SHORTNAME'] // default settings
],
// the global settings for the facebook plugins widget
'facebook' => [
'appId' => '663868757757715',
'secret' =>'87607ba4494c72bffbe7cbd32b1f3b98',
],
// the global settings for the google plugins widget
'google' => [
'clientId' => 'GOOGLE_API_CLIENT_ID',
'pageId' => 'GOOGLE_PLUS_PAGE_ID',
'profileId' => 'GOOGLE_PLUS_PROFILE_ID',
],
// the global settings for the google analytic plugin widget
'googleAnalytics' => [
'id' => 'TRACKING_ID',
'domain' => 'TRACKING_DOMAIN',
],
// the global settings for the twitter plugin widget
'twitter' => [
'screenName' => 'TWITTER_SCREEN_NAME'
],
],
// your other modules
],
'components' => [
'cache' => [
'class' => 'yii\caching\FileCache',
],
],
];
