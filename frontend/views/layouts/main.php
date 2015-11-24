<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <script src="js/jquery.min.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Kappe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>

</head>
<body>
<?php $this->beginBody() ?>

<div class="header-left">
    <div class="logo">
        <a href="http://192.168.10.107/platformer/frontend/web/index.php?r=news"><img src="images/logo.png" alt=""></a>
    </div>
    <div class="top-nav">
        <ul>
            <li class="active" ><a href="http://192.168.10.107/platformer/frontend/web/index.php?r=news" >ГЛАВНАЯ</a></li>

            <li><a href="http://192.168.10.107/platformer/frontend/web/index.php?r=about" class="black1"> О НАС</a></li>
            <li><a href="http://192.168.10.107/platformer/frontend/web/index.php?r=game" class="black1"> ИГРЫ</a></li>
            <li><a href="https://www.youtube.com/watch?v=fWR9d-GehrM" class="black1" > ВИДЕО</a></li>
            <li><a href="http://192.168.10.107/platformer/backend/web/index.php" >ВХОД</a></li>
        </ul>
    </div>


</div>

<div class="container">
    <?= $content ?>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
