<?php
/* @var $this yii\web\View */
use \yii\helpers\Url;
?>
<?php foreach($models as $row): ?>
    <div class="content-grid">
        <a href="<?=Url::to(['show', 'id'=>$row->game_id]) ?>" class="b-link-stripe b-animate-go thickbox">
            <img  src='<?= $row->game_img ?>'>
            <div class="b-wrapper">
                <h2 class="b-animate b-from-left    b-delay03 ">
                    <span><?= $row->game_title ?></span>
                    <i> </i>
                </h2>
            </div>
        </a>
    </div>
<?php endforeach ?>
<div class="clear"> </div>
</div>
<div class="clear"> </div>
</div>