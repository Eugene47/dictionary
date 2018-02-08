<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rules */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rules-view">

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
    <div>Id: <?= $model->id?></div>
    <div>Title: <?= $model->title?></div>
    <div>Text: <?= $model->text?></div>
    <div>Creator: <?= $model->getCreatorName($model->creator_id)?></div>
    <div>created_at: <?= $model->created_at?></div>
    <div>updated_at: <?= $model->updated_at?></div>

</div>
