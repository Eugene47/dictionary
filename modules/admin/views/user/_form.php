<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php
        if ($model->isNewRecord) {
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
        }
    ?>

    <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['userStatus']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
