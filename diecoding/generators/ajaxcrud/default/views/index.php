<?php
/**
 * @link http://www.diecoding.com/
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright Copyright (c) 2018
 */

 
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
echo "<?php\n";
?>
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>

<div id="ajaxCrudDatatable">
  <?="<?="?>
  GridView::widget([
    'id'           => 'crud-datatable',
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'pjax'         => true,
    'columns'      => require(__DIR__.'/_columns.php'),
    'toolbar'      => [
      [
        'content' => Html::a('<i class="fa fa-plus"></i>', ['create'], ['role' => 'modal-remote', 'title' => <?= $generator->generateString('Tambah Data') ?>, 'class'=>'btn btn-default']) .
        Html::a('<i class="fa fa-repeat"></i>', [''], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => <?= $generator->generateString('Reset Grid') ?>]) .
        '{toggleData}' .
        '{export}'
      ],
    ],
    'striped'        => true,
    'condensed'      => true,
    'responsive'     => true,
    'responsiveWrap' => false,
    'panel' => [
      'type'       => 'default',
      // 'heading' => '<i class="fa fa-list"></i>',
      // 'before'  => '<em>'.<?= $generator->generateString('* Resize table columns just like a spreadsheet by dragging the column edges.') ?>.'</em>',
      'after'      => BulkButtonWidget::widget([
        'buttons' => Html::a('<i class="fa fa-trash"></i>&nbsp; ' . <?= $generator->generateString('Hapus Semua') ?>,
        ['bulk-delete'],
        [
          'class' => 'btn btn-danger btn-xs',
          'role'  => 'modal-remote-bulk',
          'data'  => [
            'confirm'         => false,
            'method'          => false, // for overide yii data api
            'request-method'  => 'post',
            'confirm-title'   => <?= $generator->generateString('Are you sure?') ?>,
            'confirm-message' => <?= $generator->generateString('Are you sure want to delete this item') ?>
          ]
        ]
      ),
      ]) .

      '<div class="clearfix py-20"></div>',
    ]
  ]
  ) <?="?>\n"?>

</div>

<?=
'<?php

Modal::begin([
  "id"     => "ajaxCrudModal",
  "footer" => "", // always need it for jquery plugin
]);

Modal::end();

?>'
?>
