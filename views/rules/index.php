<?php

use app\models\Category;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DictionarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rules';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-md-8">
            <?php foreach ($rules as $rule):?>
            <div class="rule-card">
                <div class="rule-title">
                    <h2><a href="rules/view/?id=<?= $rule->id?>"><?= $rule->title?></a></h2>
                    <span class="label label-info"><?= Category::findOne($rule->category_id)->name?></span>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="col-md-4">
            <div class="sidebar-nav">
                <div class="well side-bar" style="width:300px; padding: 8px 0;">
                    <ul class="nav nav-list">
                        <li class="nav-header">Categories</li>
                        <?php foreach ($category as $cat):?>
                            <li><a href="#"> <?= $cat->name?> <span class="badge badge-info"><?= count(\app\models\Rules::find()->where(['category_id' => $cat->id])->all())?></span></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
