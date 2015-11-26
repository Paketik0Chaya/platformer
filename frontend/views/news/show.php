<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* @var $newsModel common\models\News */
?>
<div class="content">
        <div class="single">
            <div class="single-top">
                <script src="js/responsiveslides.min.js"></script>
                <?php $images = $newsModel->getImages(); ?>
                <?php foreach($images as $image): ?>
                    <img  src='<?= $image->getUrl()?>'>
                <?php endforeach; ?>
                <h2><?= $newsModel->news_title ?></h2>
                <p class="para"><?= $newsModel->news_text ?></p>
            </div>

            <div class="single-in">
                <div class="comment-form">
                    <?php $form = ActiveForm::begin([
                        'id' => 'form-group',
                        'options' => [
                            'class' => 'form-horizontal col-lg-11',
                        ],
                    ]); ?>

                    <?= $form->field($commentModel, 'comment_text')->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'basic'
                    ]) ?>


                    <div class="form-group">
                        <?= Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']); ?>
                    </div>


                    <?php ActiveForm::end(); ?>
            </div>
                 <div class="top-single">

                     </div>
        </div>
    <div class="single-in">
                        <div class="comments">
                            <h3>Комментарии:</h3>
                            <br>

                            <?php foreach($newsModel->comments as $comment): ?>

                                <div class="top-comment-right">
                                    <ul>
                                        <li><span > <a href="#"><?= $comment->comment_autor_name ?></a></span></li>
                                     </ul>
                                    <p><?= $comment->comment_text ?></p>
                                </div>
                                <div class="clear"> </div>
                                <label> </label>
                                <br>

                            <?php endforeach; ?>
                        </div>
                    </div>
            <div class="clear"></div>

</div>
</div>
