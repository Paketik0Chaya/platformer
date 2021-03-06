<?php

namespace backend\controllers;

use Yii;
use common\models\News;
use backend\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $userName = \Yii::$app->user->identity->username;//получаем имя пользователя оставившего нововсть
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->news_author = $userName;
            $model->news_date = time();
            $model->save();
            $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
            if($model->image){
                $path = Yii::getAlias('@frontend/web/images/temp/'. $model->image->baseName . '.' . $model->image->extension);
                $model->image->saveAs($path);
                $model->attachImage($path,true);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $userName = \Yii::$app->user->identity->username;//получаем имя пользователя оставившего нововсть
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->news_author = $userName;
            $model->news_date = time();
            $model->save();
            $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
            if($model->image){
                $path = Yii::getAlias('@frontend/web/images/temp/', $model->image->baseName . '.' . $model->image->extension);
                $model->image->saveAs($path);
                $model->attachImage($path);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
