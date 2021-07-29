<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\Column;
use yii\grid\ActionColumn;

$this->title = 'BookLibary';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class='site-contact'>
  <h1><?= Html::encode($this->title) ?></h1>

  <?= GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
      'id',
      'name:text:书名',
      'author:text:作者',
      'describe:text:描述',
      [
        'attribute' => 'adddate',
        'label' => '添加时间',
        'value' => function ($model) {
          return date("Y-m-d H:i", strtotime($model->adddate));
        }
      ],
      [
        'class' => ActionColumn::class,
        'template' => '{view} {update}',
        'urlCreator' => function ($action, $model, $key,  $index) {
          return '123';
        }
      ],
    ]
  ]) ?>


</div>