<?php
/**
 * @link http://www.diecoding.com/
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright Copyright (c) 2018
 */


use yii\helpers\Html;

?>
<div class="header-top navbar-fixed-top">
  <div class="container">
    <div class="countdown pull-left hidden-xs">
        <!-- echo "Admin <strong>Dashboard</strong>"; -->
    </div>
    <div class="navbar-top">
      <ul class="nav nav-pills">
        <?php if (Yii::$app->user->isGuest) { ?>
          <?= Yii::$app->option->isBackend ? null : '<li>' . Html::a('<i class="fa fa-credit-card"></i> BAYAR',
          ['/site/laman', 'p' => 'Konfirmasi Bayar']
          ) . '</li>'
          ?>
          <?= Yii::$app->option->isBackend ? null : '<li>' . Html::a('<i class="fa fa-id-badge"></i> DAFTAR',
          ['/site/signup']
          ) . '</li>'
          ?>
          <?= '<li>' . Html::a('<i class="fa fa-sign-in"></i> LOGIN',
          ['/site/login']
          ) . '</li>'
          ?>
        <?php } else { ?>
          <?= Yii::$app->option->isBackend ? null : '<li>' . Html::a('<i class="fa fa-file-text"></i> MATERI',
          ['/profil/download']
          ) . '</li>'
          ?>
          <?= '<li>' . Html::a('<i class="fa fa-user"></i> PROFIL',
          ['/profil']
          ) . '</li>'
          ?>
          <?= '<li>' . Html::a('<i class="fa fa-sign-out"></i> LOGOUT',
          ['/site/logout'],
          ['style' => 'background-color: #b71c1c', 'data-method' => 'post']
          ) . '</li>'
          ?>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>

<div class="header-main">
  <div class="container">
    <div class="row items-center">
      <div class="logo-left">
        <?= Html::a(Html::img(Yii::$app->secure->base64_encode("@webroot/images/logo.png"), ['alt' => Yii::$app->option->extends('name', 'main')]),
        ['/'],
        ['data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => Yii::$app->option->extends('name', 'main')]
        ) ?>
      </div>
      <div class="logo-right hidden-xs">
        <div class="pull-right">
          <?= Html::a(Html::img(Yii::$app->secure->base64_encode("@webroot/images/logo-uns.png"), ['alt' => 'Universitas Sebelas Maret']),
          '//uns.ac.id', ['data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Universitas Sebelas Maret', 'target' => '_blank']
          ) ?>
          <?= Html::a(Html::img(Yii::$app->secure->base64_encode("@webroot/images/logo-himmadika.png"), ['alt' => 'Himmadika FKIP UNS']),
          '//himmadika.fkip.uns.ac.id', ['data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Himmadika FKIP UNS', 'target' => '_blank']
          ) ?>
        </div>
      </div>
    </div>
  </div>
</div>
