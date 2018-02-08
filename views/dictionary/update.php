<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dictionary */

$this->title = 'Update Dictionary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dictionary', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dictionary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category_data' => $category_data,
    ]) ?>

</div>
