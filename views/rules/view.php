<?php

use app\models\Category;
use app\models\User;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rules */

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Rules', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rules-view">
    <div class="row">
        <div class="col-md-8">
            <div class="rule-simple">
                <div class="rule-title">
                    <h1><?= Html::encode($this->title) ?></h1>
                    <br>
                    <div><?= $model->text?></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="sidebar-nav">
                <div class="well side-bar" style="width:300px; padding: 8px 0;">
                    <ul class="nav nav-list">
                        <?php
                            if(\Yii::$app->user->can(User::EDITOR_ROLE)) {
                                echo "<div class='side-bar-buttons'>";
                                    echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                    echo Html::a('Delete', ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                echo "</div>";
                            }
                        ?>
                        <li><a href="#">Category: <?= Category::findOne($model->category_id)->name?></a></li>
                        <li><a href="#">Creator: <?= $model->getCreatorName($model->creator_id)?></a></li>
                        <li><a href="#">Created: <?= $model->created_at?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
