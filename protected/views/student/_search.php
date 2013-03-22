<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'id'=>'search-form',
)); ?>

                <div class='row'>
                        <div class='span2'>
                                <?php echo $form->label($model, 'arrived') ?>
                                <?php echo $form->dropDownList($model, 'arrived', array(0=>'Нет',1=>'Да'), array('empty'=>'', 'class'=>'span2')) ?>
                                <?php echo $form->error($model, 'arrived') ?>
                        </div>

                        <div class='span3'>
                                <?php echo $form->label($model, 'study_year') ?>
                                <?php echo $form->textField($model, 'study_year', array('class'=>'span2')) ?>
                                <?php echo $form->error($model, 'study_year') ?>
                        </div>

                        <div class='span8'>
                                <?php echo $form->label($model,'courses_ku_id'); ?>
                                <?php echo $form->dropDownList($model,'courses_ku_id', CHtml::listData(CoursesKu::model()->findAll(), 'id', 'name'), array('class'=>'span8', 'empty'=>'')); ?>
                                <?php echo $form->error($model,'courses_ku_id'); ?>
                        </div>
                        


                        <div class='span5'>
                                <?php echo $form->label($model,'name_ru'); ?>
                                <?php echo $form->textField($model,'name_ru',array('class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'name_ru'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'surname_ru'); ?>
                                <?php echo $form->textField($model,'surname_ru',array('class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'surname_ru'); ?>
                        </div>

                </div>

        <br>
        <?php echo CHtml::submitButton("Фильтровать", array('class'=>'span3 btn btn-success')); ?>

<?php $this->endWidget(); ?>

</div>
