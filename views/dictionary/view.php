<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dictionary */

$this->title = $model->word.' - '.$model->translate;
$this->params['breadcrumbs'][] = ['label' => 'Dictionary', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'word',
            'translate',
            [
                'attribute' => 'image',
                'value' => '@web/uploads/'.$model->image,
                'format' => ['image',['width'=>'300']],
            ],
            'description',
            [
                'attribute'=>'category.name',
                'label' => 'Category',
            ],
            [
                'attribute' => 'type',
                'value' => function ($model) {
                    return \Yii::$app->params['wordTypes'][$model->type];
                }
            ],
            [
                'attribute' => 'creator.username',
                'label' => 'Creator',
            ],
        ],
    ]) ?>

</div>
