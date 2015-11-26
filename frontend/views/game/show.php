<?php
/**
 * Created by PhpStorm.
 * User: Chaya
 * Date: 22.11.2015
 * Time: 20:07
 */
?>
<div class="content">
    <div class="single">
        <div class="single-top">
            <script src="js/responsiveslides.min.js"></script>
            <?php $images = $data->getImages(); ?>
            <?php foreach($images as $image): ?>
                <img  src='<?= $image->getUrl()?>'>
            <?php endforeach; ?>
            <h2><?= $data->games_title ?></h2>
            <p class="para"><?= $data->games_text ?></p>
        </div>
