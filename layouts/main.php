<?php
/**
 * @link http://www.diecoding.com/
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright Copyright (c) 2018
 */


use yii\helpers\Html;

$name = Yii::$app->option->extends('name', 'main');
$desc = Yii::$app->option->extends('description', 'main');
$char = Yii::$app->charset;
$lang = Yii::$app->language;

$mt   = isset($this->title) ? Html::encode($this->title) . " - " . $name : $name . " - " . $desc;

$mf   = "
  <link rel=\"shortcut icon\" href=\"". Yii::$app->homeUrl . "images/favicon.png\" type=\"image/png\">
  <link rel=\"apple-touch-icon\" sizes=\"194x194\" href=\"". Yii::$app->homeUrl ."images/apple.png\" type=\"image/png\">
";

$mc   = "<meta charset=\"". $char ."\">";
$main = "<title>{$mt}</title>\n  {$mc}{$mf}";

$meta = [
  "main"      => $main,
  "language"  => $lang,
  "copyright" => "Copyright &copy; ". date("Y") . " " . Html::a($name, ['/']),
  "author"    => "Dikembangkan oleh " . Html::a('Die Coding', '/site/laman?p=Tentang+Die+Coding', ['target' => '_blank']),
];

// =====================================================================================
echo "
<!-- =================================================

/**
 * @Author    : Die Coding <www.diecoding.com>
 * @Email     : diecoding@gmail.com
 * @License   : MIT
 * @Copyright : 2018
 */

================================================== -->
";

if (Yii::$app->controller->module->id === 'rbac') {
  \diecoding\rbac\MainAsset::register($this);
}
\diecoding\widgets\toastr\NotificationFlash::widget();

$dirCustomTemplate = dirname(__DIR__) . DIRECTORY_SEPARATOR . "_custom" . DIRECTORY_SEPARATOR;

if (isset($this->params["template"]) && $this->params['template'] !== 'default') {

  if (!is_file("{$dirCustomTemplate}{$this->params['template']}.php")) {
    echo "<code>File {$dirCustomTemplate}{$this->params['template']}.php tidak tersedia.</code>";
    exit;
  }

  echo $this->render(
    "{$dirCustomTemplate}{$this->params['template']}",
    [
      "content" => $content,
      "meta"    => $meta,
    ]
  );
} else {

  echo $this->render(
    Yii::$app->option->themeActive(),
    [
      "content"        => $content,
      "meta"           => $meta,
      "themeActiveDir" => Yii::$app->option->themeActiveDir(),
    ]
  );
}

\themes\AppAsset::register($this);
