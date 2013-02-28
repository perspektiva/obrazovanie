<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>
        <div class='row'>
                <div class='span5'>
                        <?php echo CHtml::link('Редактировать', array('/student/update', 'id'=>$model->id)); ?>
                </div>
        </div>
        <br>

        <fieldset class='form'><legend>Разное</legend>
                <div class='row'>
                        <div class='span4'>
                                <?php echo $form->label($model,'status'); ?>
                                <?php echo $form->dropDownList($model,'status', Student::getStatusArray(false), array('disabled'=>'true', 'class'=>'span4')); ?>
                                <?php echo $form->error($model,'status'); ?>
                        </div>

                        <div class='span8'>
                                <?php echo $form->label($model,'courses_ku_id'); ?>
                                <?php echo $form->dropDownList($model,'courses_ku_id', CHtml::listData(CoursesKu::model()->findAll(), 'id', 'name'), array('disabled'=>'true', 'class'=>'span8', 'empty'=>'')); ?>
                                <?php echo $form->error($model,'courses_ku_id'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'manager_id'); ?>
                                <?php echo $form->dropDownList($model,'manager_id', CHtml::listData(Users::model()->findAll(array(
                                        'condition'=>'what = 1',
                                        'order'=>'active DESC, name ASC',
                                )), 'id', 'name'), array('disabled'=>'true')); ?>
                                <?php echo $form->error($model,'manager_id'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'referent_id'); ?>
                                <?php echo $form->dropDownList($model,'referent_id', CHtml::listData(Users::model()->findAll(array(
                                        'condition'=>'what = 2',
                                        'order'=>'active DESC, name ASC',
                                )), 'id', 'name'), array('disabled'=>'true')); ?>
                                <?php echo $form->error($model,'referent_id'); ?>
                        </div>

                </div>
        </fieldset>

        <br><br>
        <fieldset class='form'><legend>Личная информация</legend>
                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->label($model,'sex'); ?>
                                <?php echo $form->dropDownList($model,'sex', array(1=>'Мужской', 2=>'Женский'),array('disabled'=>'true')); ?>
                                <?php echo $form->error($model,'sex'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->label($model,'name_ru'); ?>
                                <?php echo $form->textField($model,'name_ru',array('disabled'=>'true', 'class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'name_ru'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'surname_ru'); ?>
                                <?php echo $form->textField($model,'surname_ru',array('disabled'=>'true', 'class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'surname_ru'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'otchestvo'); ?>
                                <?php echo $form->textField($model,'otchestvo',array('disabled'=>'true', 'class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'otchestvo'); ?>
                        </div>

                        <div class='span6'>
                                <?php echo $form->label($model,'virgin_surname_ru'); ?>
                                <?php echo $form->textField($model,'virgin_surname_ru',array('disabled'=>'true', 'class'=>'span6','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'virgin_surname_ru'); ?>
                        </div>
                </div>
        </fieldset>

        <br><br>
        <fieldset class='form'><legend>Паспортные данные</legend>
                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->label($model,'name_en'); ?>
                                <?php echo $form->textField($model,'name_en',array('disabled'=>'true', 'class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'name_en'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'surname_en'); ?>
                                <?php echo $form->textField($model,'surname_en',array('disabled'=>'true', 'class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'surname_en'); ?>
                        </div>

                        <div class='span6'>
                                <?php echo $form->label($model,'virgin_surname_en'); ?>
                                <?php echo $form->textField($model,'virgin_surname_en',array('disabled'=>'true', 'class'=>'span6','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'virgin_surname_en'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->label($model,'citizenship'); ?>
                                <?php echo $form->dropDownList($model,'citizenship', CHtml::listData(CountryCode::model()->findAll(), 'id', 'ru'), array('disabled'=>'true', 'class'=>'span5')); ?>
                                <?php echo $form->error($model,'citizenship'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'birth_country'); ?>
                                <?php echo $form->dropDownList($model,'birth_country', CHtml::listData(CountryCode::model()->findAll(), 'id', 'ru'), array('disabled'=>'true', 'class'=>'span5')); ?>
                                <?php echo $form->error($model,'birth_country'); ?>
                        </div>

                        <div class='span6'>
                                <?php echo $form->label($model,'birth_city'); ?>
                                <?php echo $form->textField($model,'birth_city',array('disabled'=>'true', 'class'=>'span6','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'birth_city'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->label($model,'passport_number'); ?>
                                <?php echo $form->textField($model,'passport_number',array('disabled'=>'true', 'size'=>30,'maxlength'=>30)); ?>
                                <?php echo $form->error($model,'passport_number'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'passport_expiration'); ?>
                                <?php echo $form->textField($model,'passport_expiration',array('disabled'=>'true', 'size'=>10,'maxlength'=>10)); ?>
                                <?php echo $form->error($model,'passport_expiration'); ?>
                        </div>
                </div>
        </fieldset>

        <br><br>
        <fieldset class='form'><legend>Контактная информация</legend>
                <div class='row'>
                        <div class='span6'>
                                <?php echo $form->label($model,'email'); ?>
                                <?php echo $form->textField($model,'email',array('disabled'=>'true', 'class'=>'span6','maxlength'=>100)); ?>
                                <?php echo $form->error($model,'email'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'phone'); ?>
                                <?php echo $form->textField($model,'phone',array('disabled'=>'true', 'class'=>'span5','maxlength'=>30)); ?>
                                <?php echo $form->error($model,'phone'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'phone_cz'); ?>
                                <?php echo $form->textField($model,'phone_cz', array('disabled'=>'true')); ?>
                                <?php echo $form->error($model,'phone_cz'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span11'>
                                <?php echo $form->label($model,'address'); ?>
                                <?php echo $form->textField($model,'address',array('disabled'=>'true', 'class'=>'span11','maxlength'=>250)); ?>
                                <?php echo $form->error($model,'address'); ?>
                        </div>

                        <div class='span11'>
                                <?php echo $form->label($model,'address_cz'); ?>
                                <?php echo $form->textField($model,'address_cz',array('disabled'=>'true', 'class'=>'span11','maxlength'=>250)); ?>
                                <?php echo $form->error($model,'address_cz'); ?>
                        </div>
                </div>
        </fieldset>

        <br><br>
        <fieldset class='form'><legend>Родители</legend>
                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->label($model,'father_name_ru'); ?>
                                <?php echo $form->textField($model,'father_name_ru',array('disabled'=>'true', 'class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'father_name_ru'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'father_surname_ru'); ?>
                                <?php echo $form->textField($model,'father_surname_ru',array('disabled'=>'true', 'class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'father_surname_ru'); ?>
                        </div>

                        <div class='offset2 span5'>
                                <?php echo $form->label($model,'father_name_en'); ?>
                                <?php echo $form->textField($model,'father_name_en',array('disabled'=>'true', 'class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'father_name_en'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'father_surname_en'); ?>
                                <?php echo $form->textField($model,'father_surname_en',array('disabled'=>'true', 'class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'father_surname_en'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span7'>
                                <?php echo $form->label($model,'father_email'); ?>
                                <?php echo $form->textField($model,'father_email',array('disabled'=>'true', 'class'=>'span7','maxlength'=>100)); ?>
                                <?php echo $form->error($model,'father_email'); ?>
                        </div>
                </div>

                <hr>

                <div class='row'>
                        <div class='span5'>
                                <?php echo $form->label($model,'mother_name_ru'); ?>
                                <?php echo $form->textField($model,'mother_name_ru',array('disabled'=>'true', 'class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'mother_name_ru'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'mother_surname_ru'); ?>
                                <?php echo $form->textField($model,'mother_surname_ru',array('disabled'=>'true', 'class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'mother_surname_ru'); ?>
                        </div>

                        <div class='offset2 span5'>
                                <?php echo $form->label($model,'mother_name_en'); ?>
                                <?php echo $form->textField($model,'mother_name_en',array('disabled'=>'true', 'class'=>'span5','maxlength'=>50)); ?>
                                <?php echo $form->error($model,'mother_name_en'); ?>
                        </div>

                        <div class='span5'>
                                <?php echo $form->label($model,'mother_surname_en'); ?>
                                <?php echo $form->textField($model,'mother_surname_en',array('disabled'=>'true', 'class'=>'span5','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'mother_surname_en'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span7'>
                                <?php echo $form->label($model,'mother_virgin_surname_ru'); ?>
                                <?php echo $form->textField($model,'mother_virgin_surname_ru',array('disabled'=>'true', 'class'=>'span7','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'mother_virgin_surname_ru'); ?>
                        </div>

                        <div class='span7 offset5'>
                                <?php echo $form->label($model,'mother_virgin_surname_en'); ?>
                                <?php echo $form->textField($model,'mother_virgin_surname_en',array('disabled'=>'true', 'class'=>'span7','maxlength'=>80)); ?>
                                <?php echo $form->error($model,'mother_virgin_surname_en'); ?>
                        </div>
                </div>
                <br>

                <div class='row'>
                        <div class='span7'>
                                <?php echo $form->label($model,'mother_email'); ?>
                                <?php echo $form->textField($model,'mother_email',array('disabled'=>'true', 'class'=>'span7','maxlength'=>100)); ?>
                                <?php echo $form->error($model,'mother_email'); ?>
                        </div>
                </div>
        </fieldset>



<?php $this->endWidget(); ?>

</div>

