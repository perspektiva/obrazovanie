<?php
/* @var $this AdaptItemsController */
/* @var $model AdaptItems */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'adapt-items-form',
	'enableAjaxValidation'=>false,
)); ?>

        <?php echo $form->labelEx($model,'before'); ?>
        <?php echo $form->dropDownList($model,'before', array(1=>'До', 0=>'После')); ?>
        <?php echo $form->error($model,'before'); ?>

        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'name'); ?>

        <br><br><br>
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin','Добавить') : Yii::t('admin','Обновить'), array('class'=>'span4 btn btn-info')); ?>

<?php $this->endWidget(); ?>

</div>
