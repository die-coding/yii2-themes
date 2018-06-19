<?php
/**
* @link http://www.diecoding.com/
* @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
* @copyright Copyright (c) 2018
*/


use yii\helpers\Html;

themes\DiecodingAsset::register($this);

$params = [
  'themeActiveDir' => $themeActiveDir,
  'meta'           => $meta,
];

?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= $meta['language'] ?>">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?= Html::csrfMetaTags() ?>

  <?= $meta['main'] ?>

  <?php $this->head() ?>
</head>

<body class="nice-scroll-on">
  <?php $this->beginBody() ?>

  <div class="wrap">
    <?= $this->render('header.php', ['params' => $params]) ?>
    <?= $this->render('menu.php') ?>

    <div class="content">
      <div class="container">

        <?= \yii\widgets\Breadcrumbs::widget([
          'homeLink' => [
            'label' => '<i class="fa fa-home"></i>',
            'url' => Yii::$app->homeUrl,
          ],
          'encodeLabels' => false,
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]
        ) ?>

        <?php if (!Yii::$app->user->isGuest && (Yii::$app->assign->isGuest() || Yii::$app->assign->isAssign('Peserta'))) { ?>
          <div class="row">
            <?php foreach (Yii::$app->notification->getUserNotification() as $i => $n) { ?>
              <div class="col-xs-12">
                <div class="alert alert-<?= $n['alert'] ?> alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?= $n['content'] ?>
                </div>
              </div>
            <?php } ?>
          </div>
        <?php } ?>

        <?= $content ?>
      </div>
    </div>
  </div>

  <footer>
    <?= $this->render('footer.php', ['params' => $params]) ?>
  </footer>

  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
