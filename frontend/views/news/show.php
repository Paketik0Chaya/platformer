<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* @var $newsModel common\models\News */
?>

        <div class="single">
            <div class="single-top">
                <script src="js/responsiveslides.min.js"></script>
                <img src="<?= $newsModel->news_img?>">
                <h2><?= $newsModel->news_title ?></h2>
                <p class="para"><?= $newsModel->news_text ?></p>
            </div>

            <div class="single-in">
            </div>

                <div class="top-single">
                <div class="comments">
                    <h3>Комментарии:</h3>

                    <?php foreach($newsModel->comments as $comment): ?>
                        <div class="comment-author">
                            <?= $comment->comment_autor_id ?>
                        </div>
                        <div class="comment-text">
                            <?= $comment->comment_text ?>
                        </div>
                    <?php endforeach; ?>

                    <?php $form = ActiveForm::begin([
                        'id' => 'form-group',
                        'options' => [
                            'class' => 'form-horizontal col-lg-11',
                        ],
                    ]); ?>

                    <?= $form->field($commentModel, 'comment_news_id')->textInput() ?>
                    <?= $form->field($commentModel, 'comment_text')->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'basic'
                    ]) ?>
                    <?= $form->field($commentModel, 'comment_autor_id')->textInput() ?>
                    <?= $form->field($commentModel, 'comment_date')->textInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']); ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <?php
                    $commentModel->load($_POST);
                    $commentModel->save();
                    ?>

                </div>
                </div>
        </div>
<div class="single-in">
            <div class="clear"> </div>

        </div>
