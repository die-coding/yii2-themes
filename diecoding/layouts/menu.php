<?php
/**
 * @link http://www.diecoding.com/
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright Copyright (c) 2018
 */


use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

// $this->registerJs('$("#snfi").click(function(){$("#nfi").submit();$("#nfi").hide(function(){$("#lnfi").show()})});');

$items = Yii::$app->option->listMenu();

NavBar::begin([
  'options' => [
    'class' => 'navbar navbar-default',
  ],
]);

echo Nav::widget([
  'options' => ['class' => 'navbar-nav'],
  'items'   => $items,
]);

// echo Yii::$app->option->isBackend ? '' : '
// <form id="nfi" method="get" class="navbar-form navbar-right" action="' . Yii::$app->homeUrl . 'site">
// <div class="form-group"><div class="input-group">
// <input id="nfi-nisn" type="text" class="form-control" placeholder="Masukan NISN" name="log[nisn]">
// <a id="snfi" class="btn input-group-addon">CEK STATUS</a>
// <span id="lnfi" style="display:none;" class="input-group-addon">Loading...</span>
// </div></div>
// </form>';

NavBar::end();
