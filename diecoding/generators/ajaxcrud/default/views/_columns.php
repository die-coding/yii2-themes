<?php
/**
 * @link http://www.diecoding.com/
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright Copyright (c) 2018
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$modelClass = StringHelper::basename($generator->modelClass);
$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
$actionParams = $generator->generateActionParams();

echo "<?php\n";

?>

use yii\helpers\Html;
use yii\helpers\Url;

return [
  [
    'class' => 'kartik\grid\CheckboxColumn',
    'width' => '20px',
  ],
  [
    'class' => 'kartik\grid\SerialColumn',
    'width' => '30px',
  ],
<?php
$count = 0;
foreach ($generator->getColumnNames() as $name) {
  if ($name=='id'||$name=='created_at'||$name=='updated_at'){
    echo "  // [\n";
    echo "    // 'class'     => '\kartik\grid\DataColumn',\n";
    echo "    // 'attribute' => '" . $name . "',\n";
    echo "  // ],\n";
  } else if (++$count < 6) {
    echo "  [\n";
    echo "    'class'     => '\kartik\grid\DataColumn',\n";
    echo "    'attribute' => '" . $name . "',\n";
    echo "  ],\n";
  } else {
    echo "  // [\n";
    echo "    // 'class'     => '\kartik\grid\DataColumn',\n";
    echo "    // 'attribute' => '" . $name . "',\n";
    echo "  // ],\n";
  }
}
?>
  [
    'class'      => 'kartik\grid\ActionColumn',
    'options' => [
      'style' => 'min-width: 100px',
    ],
    'template'   => '{view} {update} {delete}',
    'dropdown'   => false,
    'vAlign'     => 'middle',
    'urlCreator' => function($action, $model, $key, $index) {
      $url = Url::to([$action, 'id' => $key]);
      return $url;
    },

    'buttons' => [
      'view'   => function ($url, $model) {
        return Html::a('<i class="fa fa-eye"></i>', $url, [
          'data-original-title' => <?= $generator->generateString('Lihat') ?>,
          'title'               => <?= $generator->generateString('Lihat') ?>,
          'data-toggle'         => 'tooltip',
          'class'               => 'btn btn-primary btn-xs',
          'role'                => 'modal-remote',
        ]);
      },
      'update' => function ($url, $model) {
        return Html::a('<i class="fa fa-pencil"></i>', $url, [
          'data-original-title' => <?= $generator->generateString('Perbarui') ?>,
          'title'               => <?= $generator->generateString('Perbarui') ?>,
          'data-toggle'         => 'tooltip',
          'class'               => 'btn btn-warning btn-xs',
          'role'                => 'modal-remote',
        ]);
      },
      'delete' => function ($url, $model) {
        return Html::a('<i class="fa fa-trash"></i>', $url, [
          'data-original-title'  => <?= $generator->generateString('Hapus') ?>,
          'title'                => <?= $generator->generateString('Hapus') ?>,
          'data-toggle'          => 'tooltip',
          'class'                => 'btn btn-danger btn-xs',
          'role'                 => 'modal-remote',
          'data-confirm'         => false,
          'data-method'          => false, // for overide yii data api
          'data-request-method'  => 'post',
          'data-confirm-title'   => <?= $generator->generateString('Are you sure?') ?>,
          'data-confirm-message' => <?= $generator->generateString('Are you sure want to delete this item') ?>,
        ]);
      }
    ],

    'contentOptions' => [
      'class' => 'td-actions skip-export kv-align-center kv-align-middle',
    ],
  ],

];
