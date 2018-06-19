<?php
/**
 * @link http://www.diecoding.com/
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright Copyright (c) 2018
 */

 
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
?>

<div class="table-responsive">

  <?= "<?= " ?>DetailView::widget([
    'model'      => $model,
    'attributes' => [
    <?php
    if (($tableSchema = $generator->getTableSchema()) === false) {
      foreach ($generator->getColumnNames() as $name) {
        echo "     '" . $name . "',\n";
      }
    } else {
      foreach ($generator->getTableSchema()->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        echo "      '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
      }
    }
    ?>
    ],
  ]
  ) ?>

</div>
