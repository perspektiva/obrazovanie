<?php
/* @var $this DormController */
/* @var $model Dorm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dorm-form',
	'enableAjaxValidation'=>false,
)); ?>

        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('class'=>'span15')); ?>
        <?php echo $form->error($model,'name'); ?>

        <?php echo $form->labelEx($model,'price'); ?>
        <?php echo $form->textField($model,'price'); ?>
        <?php echo $form->error($model,'price'); ?>

        <?php echo $form->labelEx($model,'address'); ?>
        <?php echo $form->textField($model,'address',array('class'=>'span15')); ?>
        <?php echo $form->error($model,'address'); ?>

        <div class='row'>
                <div class='span3'>
                        <?php echo $form->labelEx($model,'from'); ?>
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'model'=>$model,
                                'attribute'=>'from',
                                'options'=>array(
                                        'changeYear'=>true,
                                        'changeMonth'=>true,
                                        'dateFormat'=>'dd.mm.yy',
                                        'showAnim'=>'fold',
                                        'yearRange'=>'1970:2030',
                                        'firstDay'=>1,
                                ),
                                'htmlOptions'=>array(
                                        'maxlength'=>20,
                                        'class'=>'span2',
                                ),
                        )); 
                        ?>
                        <?php echo $form->error($model,'from'); ?>
                </div>

                <div class='span3'>
                        <?php echo $form->labelEx($model,'to'); ?>
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'model'=>$model,
                                'attribute'=>'to',
                                'options'=>array(
                                        'changeYear'=>true,
                                        'changeMonth'=>true,
                                        'dateFormat'=>'dd.mm.yy',
                                        'showAnim'=>'fold',
                                        'yearRange'=>'1970:2030',
                                        'firstDay'=>1,
                                ),
                                'htmlOptions'=>array(
                                        'maxlength'=>20,
                                        'class'=>'span2',
                                ),
                        )); 
                        ?>
                        <?php echo $form->error($model,'to'); ?>
                </div>
        </div>

        <br><br><br>
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin','Добавить') : Yii::t('admin','Обновить'), array('class'=>'span4 btn btn-info')); ?>

<?php $this->endWidget(); ?>

</div>
