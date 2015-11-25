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
        $newsModel = News::findOne(['id'=>$id, 'news_status'=>1]);

        $userID = \Yii::$app->user->identity->id;//получаем ID пользователя оставившего коментарий
        $userName = \Yii::$app->user->identity->username;//получаем имя пользователя оставившего коментарий

        $commentModel = new \common\models\Comment(); //делаем новую модель для сохранения данных в бд

        if($commentModel->load(Yii::$app->request->post()) && $commentModel->validate()) //load(Yii::$app->request->post()) проверяет пришли с нашего ActiveForm(из файла /views/news/show.php) данные в массиве $_POST и загружает их, а $commentModel->validate() проверяет наши данные на соответсвие public function rules() из файла common/models/Comment.php
        {
            $commentModel->comment_autor_id = $userID; //получаем ID пользователя оставившего коментарий
            $commentModel->comment_autor_name = $userName; //получаем имя пользователя оставившего коментарий
            $commentModel->comment_news_id = $id; //ID нашей новости
            $commentModel->comment_date = time(); //Текущие время

            $commentModel->save(); //Заносим все это дело в БД
            return $this->refresh(); //Обновляем страницу и чистим POST
        }
        return $this->render('show',['newsModel'=>$newsModel, 'commentModel'=>$commentModel, 'id'=>$id]);

    }




}
