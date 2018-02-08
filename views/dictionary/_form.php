<?php

use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dictionary */
/* @var $form yii\widgets\ActiveForm */
/* @var $category_data app\models\Dictionary */
?>

<div class="dictionary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'word')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'translate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->widget(FileInput::className(), [
        'pluginOptions' => [
            'allowedFileExtensions' => ['jpg','gif','png'],
            'showUpload' => false,
        ],
        'value' => $model->image
    ])?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'category_id')->widget(Select2::className(),[
        'data' => ArrayHelper::map($category_data, 'id', 'name'),
        'options' => ['placeholder' => 'Select a state ...'],
    ]);?>

    <?= $form->field($model, 'type')->dropDownList(\Yii::$app->params['wordTypes'])?>

    <?php //echo $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
