<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Games */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="games-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'game_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'game_text')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?php
    $images = $model->getImages();
    ?>
    <?php foreach($images as $image): ?>

        <img  src='<?= $image->getUrl('300x243') ?>'>

    <?php endforeach; ?>

    <?= $form->field($model, 'game_status')->checkbox(['options' => ['value' => 1]]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
