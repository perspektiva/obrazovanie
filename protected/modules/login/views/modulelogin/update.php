<?php
$this->breadcrumbs=array(
	Yii::t("LoginModule.crumbs",'Manage Admins')=>array('admin'),
	Yii::t("LoginModule.crumbs",'Update'),
);

$this->menu=array(
	array('label'=>Yii::t("LoginModule.settings",'Create Someone'), 'url'=>array('create')),
	array('label'=>Yii::t("LoginModule.settings",'Manage Admins'), 'url'=>array('admin')),
);
?>

<h2><?php echo Yii::t("LoginModule.settings",'Update "{name}"',array('{name}'=>$model->name)); ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
