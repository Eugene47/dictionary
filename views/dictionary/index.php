<?php

use app\models\Category;
use app\models\Dictionary;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DictionarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dictionary';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add word', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php \yii\widgets\Pjax::begin()?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'word',
            'translate',
            /*[
                'attribute' => 'translate',
                'contentOptions' => [
                    'style' => 'font-size: 30px'
                ]
            ],*/
            /*[
                'attribute' => 'image',
                'format' => ['image',[
                    'style' => 'width: 200px'
                ]]
            ],*/
            'description',
            [
                'attribute'=>'category.id',
                'value'=>'category.name',
                'label' => 'Category',
                'filter' => Html::activeDropDownList($searchModel, 'category_id', ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name'),['class' => 'form-control', 'prompt' => 'Select category'])
            ],
            [
                'attribute'=>'type',
                'label' => 'Type',
                'filter' => Html::activeDropDownList($searchModel, 'type', \Yii::$app->params['wordTypes'],['class' => 'form-control', 'prompt' => 'Select type']),
                'content'=>function ($model,$key,$index,$column) {
                    return \Yii::$app->params['wordTypes'][$model->type] ?? 'undefined' ;
                },
            ],
            ['class' => 'yii\grid\ActionColumn', 'contentOptions' => ['style' => 'width:67px'],],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end()?>
</div>
