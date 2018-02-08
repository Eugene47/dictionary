<?php

namespace app\controllers;

use app\models\Category;
use app\models\User;
use Yii;
use app\models\Dictionary;
use app\models\DictionarySearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DictionaryController implements the CRUD actions for Dictionary model.
 */
class DictionaryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'view', 'delete'],
                        'allow' => true,
                        'roles' => $this->getAccessName(),
                    ]
                ],
            ],
        ];

        return $behaviors;
    }

    /**
     * Lists all Dictionary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DictionarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->setPageSize(\Yii::$app->params['pageSize']);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dictionary model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Dictionary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dictionary();

        $category_data = Category::find()->all();;

        if ($model->load(Yii::$app->request->post())) {
            $imageName = $model->word.'_'.date('YmdHms');
            $model->file = UploadedFile::getInstance($model, 'file');
            if (isset($model->file)){
                $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
                $model->image = $imageName.'.'.$model->file->extension;
            }
            $model->save();

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'category_data' => $category_data,
            ]);
        }
    }

    /**
     * Updates an existing Dictionary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $category_data = Category::find()->all();;

        if ($model->load(Yii::$app->request->post())) {
            $imageName = $model->word.'_'.date('YmdHms');
            $model->file = UploadedFile::getInstance($model, 'file');
            if (isset($model->file)){
                if (!empty($model->image)){
                    unlink('uploads/'.$model->image);
                }
            }
            if (isset($model->file)){
                $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
                $model->image = $imageName.'.'.$model->file->extension;
            }

            $model->save();

            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'category_data' => $category_data,
            ]);
        }
    }

    /**
     * Deletes an existing Dictionary model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (!empty($model->image)){
            unlink('uploads/'.$model->image);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dictionary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dictionary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dictionary::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function getAccessName()
    {
        return ['manageDictionary'];
    }
}
