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

                <div class='row'>
                        <?php
                        $this->widget('zii.widgets.CMenu',array(
                                'items'=>array(
                                        array('label'=>"<i class='icon-user'></i> Студенты", 'url'=>array('/student/admin')),
                                        array('label'=>"<i class='icon-list-alt'></i> Курсы КУ", 'url'=>array('/coursesKu/admin')),
                                        array('label'=>"<i class='icon-list-alt'></i> Общаги", 'url'=>array('/dorm/admin')),
                                        array('label'=>"<i class='icon-cog'></i> Адаптационная программа", 'url'=>array('/adaptPakets/index')),
                                ),
                                'htmlOptions'=>array(
                                        'class'=>'nav nav-pills span17'
                                ),
                                'encodeLabel'=>false
                        ));
                        ?>
                        <?php
                        $this->widget('zii.widgets.CMenu',array(
                                'items'=>array(
                                        array('label'=>"<i class='icon-wrench'></i> Админка", 'url'=>array('/student/adminka')),
                                ),
                                'htmlOptions'=>array(
                                        'class'=>'nav nav-pills pull-right span3'
                                ),
                                'encodeLabel'=>false
                        ));
                        ?>
                </div>
                <?php echo $content; ?>

                <?php 
                        error_reporting(-1);
include('/../end.php'); 
                ?>
        </div>
</body>
</html>
