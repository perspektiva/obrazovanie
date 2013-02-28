<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>
        <div class='row'>
                <div class='span5 pull-right'>
                        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin','Добавить') : Yii::t('admin','Обновить'), array('class'=>'span5 btn btn-info')); ?>
                </div>
        </div>

        <fieldset class='form'><legend>Разное</legend>
                <div class='row'>
                        <div class='span4'>
                                <?php echo $form->labelEx($model,'status'); ?>
                                <?php echo $form->dropDownList($model,'status', Student::getStatusArray(false), array('class'=>'span4')); ?>
                                <?php echo $form->error($model,'status'); ?>
                        </div>

                        <div class='span8'>
                                <?php echo $form->labelEx($model,'courses_ku_id'); ?>
                                <?php echo $form->dropDownList($model,'courses_ku_id', CHtml::listData(CoursesKu::model()->findAll(), 'id', 'name'), array('class'=>'span8', 'empty'=>'')); ?>
                                <?php echo $form->error($model,'courses_ku_id'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'manager_id'); ?>
                                <?php echo $form->dropDownList($model,'manager_id', CHtml::listData(Users::model()->findAll(array(
                                        'condition'=>'what = 1',
                                        'order'=>'active DESC, name ASC',
                                )), 'id', 'name')); ?>
                                <?php echo $form->error($model,'manager_id'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'referent_id'); ?>
                                <?php echo $form->dropDownList($model,'referent_id', CHtml::listData(Users::model()->findAll(array(
                                        'condition'=>'what = 2',
                                        'order'=>'active DESC, name ASC',
                                )), 'id', 'name')); ?>
                                <?php echo $form->error($model,'referent_id'); ?>
                        </div>

                </div>
        </fieldset>

        <br><br>
        <fieldset class='form'><legend>Личная информация</legend>
                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->labelEx($model,'sex'); ?>
                                <?php echo $form->dropDownList($model,'sex', array(1=>'Мужской', 2=>'Женский')); ?>
                                <?php echo $form->error($model,'sex'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->labelEx($model,'name_ru'); ?>
                                <?php echo $form->textField($model,'name_ru',array('class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'name_ru'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'surname_ru'); ?>
                                <?php echo $form->textField($model,'surname_ru',array('class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'surname_ru'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'otchestvo'); ?>
                                <?php echo $form->textField($model,'otchestvo',array('class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'otchestvo'); ?>
                        </div>

                        <div class='span6'>
                                <?php echo $form->labelEx($model,'virgin_surname_ru'); ?>
                                <?php echo $form->textField($model,'virgin_surname_ru',array('class'=>'span6','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'virgin_surname_ru'); ?>
                        </div>
                </div>
        </fieldset>

        <br><br>
        <fieldset class='form'><legend>Паспортные данные</legend>
                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->labelEx($model,'name_en'); ?>
                                <?php echo $form->textField($model,'name_en',array('class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'name_en'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'surname_en'); ?>
                                <?php echo $form->textField($model,'surname_en',array('class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'surname_en'); ?>
                        </div>

                        <div class='span6'>
                                <?php echo $form->labelEx($model,'virgin_surname_en'); ?>
                                <?php echo $form->textField($model,'virgin_surname_en',array('class'=>'span6','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'virgin_surname_en'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->labelEx($model,'citizenship'); ?>
                                <?php echo $form->dropDownList($model,'citizenship', CHtml::listData(CountryCode::model()->findAll(), 'id', 'ru'), array('class'=>'span5')); ?>
                                <?php echo $form->error($model,'citizenship'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'birth_country'); ?>
                                <?php echo $form->dropDownList($model,'birth_country', CHtml::listData(CountryCode::model()->findAll(), 'id', 'ru'), array('class'=>'span5')); ?>
                                <?php echo $form->error($model,'birth_country'); ?>
                        </div>

                        <div class='span6'>
                                <?php echo $form->labelEx($model,'birth_city'); ?>
                                <?php echo $form->textField($model,'birth_city',array('class'=>'span6','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'birth_city'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->labelEx($model,'passport_number'); ?>
                                <?php echo $form->textField($model,'passport_number',array('size'=>30,'maxlength'=>30)); ?>
                                <?php echo $form->error($model,'passport_number'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'passport_expiration'); ?>
                                <?php echo $form->textField($model,'passport_expiration',array('size'=>10,'maxlength'=>10)); ?>
                                <?php echo $form->error($model,'passport_expiration'); ?>
                        </div>
                </div>
        </fieldset>

        <br><br>
        <fieldset class='form'><legend>Контактная информация</legend>
                <div class='row'>
                        <div class='span6'>
                                <?php echo $form->labelEx($model,'email'); ?>
                                <?php echo $form->textField($model,'email',array('class'=>'span6','maxlength'=>100)); ?>
                                <?php echo $form->error($model,'email'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'phone'); ?>
                                <?php echo $form->textField($model,'phone',array('class'=>'span5','maxlength'=>30)); ?>
                                <?php echo $form->error($model,'phone'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'phone_cz'); ?>
                                <?php echo $form->textField($model,'phone_cz'); ?>
                                <?php echo $form->error($model,'phone_cz'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span11'>
                                <?php echo $form->labelEx($model,'address'); ?>
                                <?php echo $form->textField($model,'address',array('class'=>'span11','maxlength'=>250)); ?>
                                <?php echo $form->error($model,'address'); ?>
                        </div>

                        <div class='span11'>
                                <?php echo $form->labelEx($model,'address_cz'); ?>
                                <?php echo $form->textField($model,'address_cz',array('class'=>'span11','maxlength'=>250)); ?>
                                <?php echo $form->error($model,'address_cz'); ?>
                        </div>
                </div>
        </fieldset>

        <br><br>
        <fieldset class='form'><legend>Родители</legend>
                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->labelEx($model,'father_name_ru'); ?>
                                <?php echo $form->textField($model,'father_name_ru',array('class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'father_name_ru'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'father_surname_ru'); ?>
                                <?php echo $form->textField($model,'father_surname_ru',array('class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'father_surname_ru'); ?>
                        </div>

                        <div class='offset2 span5'>
                                <?php echo $form->labelEx($model,'father_name_en'); ?>
                                <?php echo $form->textField($model,'father_name_en',array('class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'father_name_en'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'father_surname_en'); ?>
                                <?php echo $form->textField($model,'father_surname_en',array('class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'father_surname_en'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span7'>
                                <?php echo $form->labelEx($model,'father_email'); ?>
                                <?php echo $form->textField($model,'father_email',array('class'=>'span7','maxlength'=>100)); ?>
                                <?php echo $form->error($model,'father_email'); ?>
                        </div>
                </div>

                <hr>

                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->labelEx($model,'mother_name_ru'); ?>
                                <?php echo $form->textField($model,'mother_name_ru',array('class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'mother_name_ru'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'mother_surname_ru'); ?>
                                <?php echo $form->textField($model,'mother_surname_ru',array('class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'mother_surname_ru'); ?>
                        </div>

                        <div class='offset2 span5'>
                                <?php echo $form->labelEx($model,'mother_name_en'); ?>
                                <?php echo $form->textField($model,'mother_name_en',array('class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'mother_name_en'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->labelEx($model,'mother_surname_en'); ?>
                                <?php echo $form->textField($model,'mother_surname_en',array('class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'mother_surname_en'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span7'>
                                <?php echo $form->labelEx($model,'mother_virgin_surname_ru'); ?>
                                <?php echo $form->textField($model,'mother_virgin_surname_ru',array('class'=>'span7','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'mother_virgin_surname_ru'); ?>
                        </div>

                        <div class='span7 offset5'>
                                <?php echo $form->labelEx($model,'mother_virgin_surname_en'); ?>
                                <?php echo $form->textField($model,'mother_virgin_surname_en',array('class'=>'span7','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'mother_virgin_surname_en'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span7'>
                                <?php echo $form->labelEx($model,'mother_email'); ?>
                                <?php echo $form->textField($model,'mother_email',array('class'=>'span7','maxlength'=>100)); ?>
                                <?php echo $form->error($model,'mother_email'); ?>
                        </div>
                </div>
        </fieldset>




        <br><br>
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin','Добавить') : Yii::t('admin','Обновить'), array('class'=>'span8 btn btn-info')); ?>

<?php $this->endWidget(); ?>

</div>
