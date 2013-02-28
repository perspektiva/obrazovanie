<?php
$this->breadcrumbs=array(
	Yii::t("LoginModule.crumbs",'Manage Admins')=>array('admin'),
	Yii::t("LoginModule.crumbs",'Create'),
);

$this->menu=array(
	array('label'=>Yii::t("LoginModule.settings",'Manage Admins'), 'url'=>array('admin')),
);
?>

<h2><?php echo Yii::t("LoginModule.settings",'Create Someone'); ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
