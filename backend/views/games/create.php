<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Games */

$this->title = 'Опубликовать игру';
$this->params['breadcrumbs'][] = ['label' => 'Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="games-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
