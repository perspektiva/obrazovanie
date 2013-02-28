<?php
Yii::app()->assetManager->publish(
        Yii::getPathOfAlias('login.assets')
);
$pathToCss = Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('login.assets'));
?>
<!DOCTYPE HTML>
<html>
<head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="<?php echo $pathToCss ?>/bootstrap.min.css" type="text/css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="<?php echo $pathToCss ?>/style.css" type="text/css" media="screen" charset="utf-8">
        <title>Login</title>
</head>
<body>
<?php echo $content; ?>
</body>
</html>
