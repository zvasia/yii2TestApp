<?php

namespace frontend\controllers;

use app\models\AdditionSearch;
use app\models\Addition;
use app\models\UpdateBalance;
use Yii;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Users models.
     * @return mixed
     */

    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate()
    {
        $form = new UpdateBalance();
        $add = new Addition();
        $test = null;

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $request = Yii::$app->request;
            $id = Yii::$app->request->post('UpdateBalance')['id'];
            $newBalance = Yii::$app->request->post('UpdateBalance')['sum'];
            $model = Users::findOne(['id' => $id]);
            if ($model !== null && $model->status === 1) {
                $model->balance += $newBalance;
                $model->save();
                $add->user_id = $id;
                $add->addition_sum = $newBalance;
                $add->save();
                $test = $add;
            } else {
                $test = 'Пользователь не найден или заблокирован';
            }
            return $this->redirect(['index']);

        } // если произошла отправка фориы и валидация успешна

        return $this->renderAjax('update', [
            'model' => $form, 'test' => $test
        ]);


    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionBalanceOperations()
    {
        $searchModel = new AdditionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('balanceOperations', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCancelAddition($userId, $operationId) {
        $add = new Addition();
        $users = new Users();

        $operation = $add::findOne(['operation_id' => $operationId]);
        $user = $users::findOne(['id' => $userId]);
        if ($operation !== null && $user !== null){
            $user->balance -= $operation->addition_sum;
            $user->save();
            $operation->delete();
            $operation->save();
        }
        return $this->redirect(['users/index']);
    }

    public function actionChangestatus($id, $status) {
        $users = new Users();
        $user = $users::findOne(['id' => $id]);
        $user->status = $status;
        $user->save();
    }


}
