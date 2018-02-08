<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dictionary */

$this->title = 'Create Dictionary';
$this->params['breadcrumbs'][] = ['label' => 'Dictionary', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category_data' => $category_data
    ]) ?>

</div>
