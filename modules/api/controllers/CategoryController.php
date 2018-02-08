<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Category;
use yii\web\Controller;
use yii\web\Response;

class CategoryController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionCreateCategory(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new Category();
        $model->scenario = Category::SCENARIO_CREATE;
        $model->attributes = \Yii::$app->request->post();

        if ($model->validate()){
            $model->save();
            return array('status' => true, 'data' => 'Category created successfully.');
        }else{
            return array('status' => false, 'data' => $model->getErrors());
        }
    }

    public function actionListCategory(){
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $model = Category::find()->all();
        if (count($model) > 0){
            return array('status' => true, 'data' => $model);
        }else{
            return array('status' => false, 'data' => 'No Categories');
        }
    }
}
