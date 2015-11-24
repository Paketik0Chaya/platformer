<?php

namespace frontend\controllers;

use Yii;
use common\models\News;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $models = News::find()->where(['news_status' => 1])->all();
        return $this->render('index', ['models' => $models]);
    }

    public function actionShow($id)
    {
        $newsModel = News::findOne(['news_id'=>$id, 'news_status'=>1]);
        $commentModel = new \common\models\Comment();
        return $this->render('show',['newsModel'=>$newsModel, 'commentModel'=>$commentModel, 'id'=>$id]);
    }



}
