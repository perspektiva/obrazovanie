<?php
/* @var $this CoursesKuController */
/* @var $model CoursesKu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'courses-ku-form',
	'enableAjaxValidation'=>false,
)); ?>

        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('class'=>'span18','maxlength'=>250)); ?>
        <?php echo $form->error($model,'name'); ?>

        <?php echo $form->labelEx($model,'price'); ?>
        <?php echo $form->textField($model,'price',array('class'=>'span3','maxlength'=>20)); ?>
        <?php echo $form->error($model,'price'); ?>

        <?php echo $form->labelEx($model,'duration'); ?>
        <?php echo $form->textField($model,'duration',array('class'=>'span2','maxlength'=>20)); ?>
        <?php echo $form->error($model,'duration'); ?>

        <?php echo $form->labelEx($model,'srok_podachi'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'=>$model,
                'attribute'=>'srok_podachi',
                'options'=>array(
                        'changeYear'=>true,
                        'changeMonth'=>true,
                        'dateFormat'=>'dd.mm.yy',
                        'showAnim'=>'fold',
                        'yearRange'=>'2000:2030',
                        'firstDay'=>1,
                ),
                'htmlOptions'=>array(
                        'maxlength'=>20,
                        'class'=>'span2',
                ),
        )); 
        ?>
        <?php echo $form->error($model,'srok_podachi'); ?>

        <br><br><br>
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin','Добавить') : Yii::t('admin','Обновить'), array('class'=>'span8 btn btn-info')); ?>

<?php $this->endWidget(); ?>

</div>
