<?php

namespace frontend\controllers;

use common\models\Games;

class GameController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $models = Games::find()->where(['game_status' => 1])->all();
        return $this->render('index', ['models' => $models]);
    }

    public function actionShow($id)
    {
        $data = Games::findOne(['game_id'=>$id, 'game_status'=>1]);
        return $this->render('show',['data'=>$data, 'id' => $id]);
    }
}
