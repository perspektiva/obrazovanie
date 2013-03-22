<?php
/* @var $this AdaptPaketsController */
/* @var $model AdaptPakets */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'adapt-pakets-form',
	'enableAjaxValidation'=>false,
)); ?>

        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('class'=>'span10')); ?>
        <?php echo $form->error($model,'name'); ?>

        <br><br><br>
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin','Добавить') : Yii::t('admin','Обновить'), array('class'=>'span4 btn btn-info')); ?>

<?php $this->endWidget(); ?>

</div>
