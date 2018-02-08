<?php

namespace app\modules\admin\controllers;

use app\controllers\MainController;
use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends MainController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        return $behaviors;
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {

            //var_dump(Yii::$app->request->post());die();

            $model->setPassword(\Yii::$app->request->post('User')['password']);

            $model->save();

            return $this->redirect(['index']);

        }

        if ($model->hasErrors()){
            $password = \Yii::$app->request->post('User')['password'];
        }
        else{
            $password = \Yii::$app->security->generateRandomString(USER::LENGTH_PASS);
        }

        return $this->render('create', [
            'model' => $model,
            'password' => $password,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionPassword($id)
    {
        $model = $this->findModel($id);

        if (\Yii::$app->request->isPost) {
            if (!empty(\Yii::$app->request->post('User')['password'])) {
                $model->setPassword(\Yii::$app->request->post('User')['password']);
                $model->save();
                return $this->redirect(['index']);
            }else{
                $model->addError('password', \Yii::t( 'app','empty field'));
            }
        }

        if ($model->hasErrors()){
            $password = \Yii::$app->request->post('Account')['password'];
        }
        else{
            $password = \Yii::$app->security->generateRandomString(User::LENGTH_PASS);
        }

        return $this->render('change-password', ['model' => $model, 'password' => $password]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
