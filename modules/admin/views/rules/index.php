<?php

use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RulesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rules-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rules', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'text:ntext',
            [
                'attribute'=>'category.id',
                'value'=>'category.name',
                'label' => 'Category',
                'filter' => Html::activeDropDownList($searchModel, 'category_id', ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name'),['class' => 'form-control', 'prompt' => 'Select category'])
            ],
            [
                'attribute'=>'creator.id',
                'value'=>'creator.username',
                'label' => 'Creator',
                'filter' => Html::activeDropDownList($searchModel, 'category_id', ArrayHelper::map(\app\models\User::find()->asArray()->all(), 'id', 'username'),['class' => 'form-control', 'prompt' => 'Select category'])
            ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn', 'contentOptions' => ['style' => 'width:67px'],],
        ],
    ]); ?>
</div>
