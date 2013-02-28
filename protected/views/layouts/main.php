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
        <title>Образование</title>
        
</head>
<body>
        <div class='container'>
                <div class='row'>
                        <div class='span24'>
                                <?php echo CHtml::image(Yii::app()->baseUrl.'/css/images/banner.png','', array('style'=>'margin:0 -20px')) ?>
                        </div>
                </div>
        </div>
        <div class='container main-container'>
                <?php
                $this->widget('zii.widgets.CMenu',array(
                        'items'=>array(
                                array('label'=>"<i class='icon-user'></i> Студенты", 'url'=>array('/student/admin')),
                                array('label'=>"<i class='icon-list-alt'></i> Курсы КУ", 'url'=>array('/coursesKu/admin')),
                                array('label'=>"<i class='icon-cog'></i> Адаптационная программа", 'url'=>array('pages/settings')),
                        ),
                        'htmlOptions'=>array(
                                'class'=>'nav nav-pills'
                        ),
                        'encodeLabel'=>false
                ));
                ?>
                <?php echo $content; ?>
        </div>
</body>
</html>
