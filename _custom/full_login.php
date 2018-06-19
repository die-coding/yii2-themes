<?php
/**
 * @link http://www.diecoding.com/
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright Copyright (c) 2018
 */

use yii\helpers\Html;

app\assets\FullLoginAsset::register($this);
unset($this->assetBundles['yii\bootstrap\BootstrapAsset']);

$h     = Yii::$app->homeUrl;
$s     = Yii::$app->secure;

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= $meta['language'] ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?= Html::csrfMetaTags() ?>

  <?= $meta['main'] ?>

  <?php $this->head() ?>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>
  <?php $this->beginBody(); ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-bi">
    <div class="container">
      <a class="navbar-brand" href="<?= $h ?>">
        <?= Html::img($s->base64_encode("@webroot/images/logo_.png"), ['style' => 'height: 30px']) ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <?php
          foreach (Yii::$app->option->listMenu('full_login') as $i => $m) {
            $a[$i] = '';
            $span  = '';

            if (Yii::$app->controller->id == $m['controller'] && Yii::$app->controller->action->id == $m['action']) {
              $a[$i] = ' active';
              $span  = '<span class="sr-only">(current)</span>';
            }
            echo "
            <li class=\"nav-item{$a[$i]}\">
            <a class=\"nav-link\" href=\"{$h}{$m['controller']}/{$m['action']}\">
            {$m['label']}
            </a>
            </li>
            ";
          }
          ?>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Header - set the background image for the header in the line below -->
  <header class="py-5 bg-image-full" style="background-image: url('<?= $h ?>images/home.jpg');">
    <?= Html::img($s->base64_encode("@webroot/images/img_logo.png"), ['class' => 'img-fluid d-block mx-auto']) ?>
  </header>

  <!-- Content section -->
  <section class="py-5">
    <div class="container">

      <?= $content ?>

    </div>
  </section>

  <!-- Footer -->
  <footer class="py-16 bg-bi">
    <div class="container">
      <p class="m-0 text-center text-white"><?= $meta['copyright'] ?></p>
    </div>
    <!-- /.container -->
  </footer>

  <?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
