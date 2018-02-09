<?php

namespace app\controllers;

use app\models\Category;
use Yii;
use app\models\Rules;
use app\models\RulesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RulesController implements the CRUD actions for Rules model.
 */
class RulesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Rules models.
     * @return mixed
     */
    public function actionIndex()
    {
        $rules = Rules::find()->orderBy(['id' => SORT_DESC])->all();
        $category = Category::find()->all();

        return $this->render('index', [
            'rules' => $rules,
            'category' => $category,
        ]);
    }

    /**
     * Displays a single Rules model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Rules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rules the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rules::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
