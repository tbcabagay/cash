<?php

namespace app\modules\cash\controllers;

use Yii;
use app\models\Checks;
use app\models\ChecksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ChecksController implements the CRUD actions for Checks model.
 */
class ChecksController extends Controller
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
     * Lists all Checks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ChecksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Checks model.
     * @param string $checkno
     * @param integer $recno
     * @return mixed
     */
    public function actionView($checkno, $recno)
    {
        return $this->render('view', [
            'model' => $this->findModel($checkno, $recno),
        ]);
    }

    /**
     * Creates a new Checks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Checks();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'checkno' => $model->checkno, 'recno' => $model->recno]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Checks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $checkno
     * @param integer $recno
     * @return mixed
     */
    public function actionUpdate($checkno, $recno)
    {
        $model = $this->findModel($checkno, $recno);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'checkno' => $model->checkno, 'recno' => $model->recno]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Checks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $checkno
     * @param integer $recno
     * @return mixed
     */
    public function actionDelete($checkno, $recno)
    {
        $this->findModel($checkno, $recno)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Checks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $checkno
     * @param integer $recno
     * @return Checks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($checkno, $recno)
    {
        if (($model = Checks::findOne(['checkno' => $checkno, 'recno' => $recno])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
