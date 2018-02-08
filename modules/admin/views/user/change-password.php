<?php


use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => \Yii::t('app','Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-change-password">

    <h1><?= \Yii::t('app','Change password')?>: <b><?= $model->username?></b></h1>

    <div class="user-change-password-form">
        <?php $form = ActiveForm::begin(); ?>

        <?php
            Pjax::begin();
            echo $form->field($model, 'password', [
                'template' =>
                    '<label class="uk-form-label" for="user-password">'.\Yii::t('app','Password').'</label>'.
                    '<div class="input-group">{input}<span class="input-group-btn">'.
                    Html::a(\Yii::t('app','Generate'), ['user/create'], ['class' => 'btn btn-default']).
                    '</span></div>'
            ])->textInput(
                [
                    'value' => $password,
                ]);
            Pjax::end();
        ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
