<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rules */

$this->title = 'Create Rules';
$this->params['breadcrumbs'][] = ['label' => 'Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rules-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category_data' => $category_data,
    ]) ?>

</div>
