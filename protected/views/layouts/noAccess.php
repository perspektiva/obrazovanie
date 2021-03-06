<!DOCTYPE HTML>
<html>
<head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fixes.css" type="text/css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/default.css" type="text/css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/back.css" type="text/css" media="screen" charset="utf-8">


        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ckeditor/ckeditor.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/default.js" type="text/javascript" charset="utf-8"></script>
        <title>Образование</title>
        
</head>
<body>
        <div class='container main-container'>
                <div class='banner'>
                        <?php echo CHtml::link(
                                CHtml::image(Yii::app()->baseUrl.'/css/images/logo.png','', array('class'=>'banner-logo')),
                                'https://bd.po4ta.cz/index.php'
                        ); ?>
                </div>

                <?php echo $content; ?>

                <?php if($_SERVER['HTTP_HOST'] != 'localhost'): ?>
                        <?php include('../connect_utf8.php'); ?>

                        <div class='stupid-footer'>
                                <div class='stupid-footer-catcher'>
                                        <?php include('../includes/end-unicode.php'); ?>
                                </div>
                                
                        </div>
                <?php endif ?>
        </div>
</body>
</html>
