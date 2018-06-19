<?php
/**
 * @link http://www.diecoding.com/
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright Copyright (c) 2018
 */

namespace themes;

use yii\web\AssetBundle;

class DiecodingAsset extends AssetBundle
{
  public $sourcePath = '@themes/diecoding/assets';
  public $css = [
    'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900',
    'css/style.min.css',
    'css/media-screen.min.css',
  ];
  public $js = [
    'js/plugins.min.js',
    'js/scripts.min.js',
  ];
  public $depends = [
    'rmrevin\yii\fontawesome\AssetBundle',
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
    'yii\bootstrap\BootstrapPluginAsset',
  ];
}
