<div class='tab-title'>
        Редактирование образования
</div>

<?php $form = $this->beginWidget('CActiveForm') ?>

<fieldset class='form'><legend>Среднее образование</legend>
        <div class='row'>
                <div class='span7'>
                        <?php echo $form->labelEx($model, 'school_name') ?>
                        <?php echo $form->textField($model, 'school_name', array('class'=>'span7')) ?>
                        <?php echo $form->error($model, 'school_name') ?>
                </div>

                <div class='span5'>
                        <?php echo $form->labelEx($model, 'school_city') ?>
                        <?php echo $form->textField($model, 'school_city', array('class'=>'span5')) ?>
                        <?php echo $form->error($model, 'school_city') ?>
                </div>

                <div class='span4'>
                        <?php echo $form->labelEx($model, 'school_type') ?>
                        <?php echo $form->dropDownList($model, 'school_type', array(1=>'Государственная', 2=>'Частная'), array('class'=>'span4')) ?>
                        <?php echo $form->error($model, 'school_type') ?>
                </div>

                <div class='span3 offset1'>
                        <?php echo $form->labelEx($model, 'school_start') ?>
                        <?php echo $form->dropDownList($model, 'school_start', Education::yearsForSelect(), array('class'=>'span2')) ?>
                        <?php echo $form->error($model, 'school_start') ?>
                </div>

                <div class='span3'>
                        <?php echo $form->labelEx($model, 'school_end') ?>
                        <?php echo $form->dropDownList($model, 'school_end', Education::yearsForSelect(), array('class'=>'span2')) ?>
                        <?php echo $form->error($model, 'school_end') ?>
                </div>
        </div>
</fieldset>

<br><br><br>
<fieldset class='form'><legend>Высшее образование (опционально)</legend>
        <div class='row'>
                <div class='span8'>
                        <?php echo $form->label($model, 'university_name') ?>
                        <?php echo $form->textField($model, 'university_name', array('class'=>'span8')) ?>
                        <?php echo $form->error($model, 'university_name') ?>
                </div>

                <div class='span8'>
                        <?php echo $form->label($model, 'university_speciality') ?>
                        <?php echo $form->textField($model, 'university_speciality', array('class'=>'span8')) ?>
                        <?php echo $form->error($model, 'university_speciality') ?>
                </div>

                <div class='span5'>
                        <?php echo $form->label($model, 'university_title') ?>
                        <?php echo $form->textField($model, 'university_title', array('class'=>'span5')) ?>
                        <?php echo $form->error($model, 'university_title') ?>
                </div>
        </div>

        <div class='row'>
                <div class='span11'>
                        <?php echo $form->labelEx($model, 'university_address') ?>
                        <?php echo $form->textField($model, 'university_address', array('class'=>'span10')) ?>
                        <?php echo $form->error($model, 'university_address') ?>
                </div>

                <div class='span2'>
                        <?php echo $form->label($model, 'university_start') ?>
                        <?php echo $form->dropDownList($model, 'university_start', Education::yearsForSelect(), array('class'=>'span2')) ?>
                        <?php echo $form->error($model, 'university_start') ?>
                </div>

                <div class='span3 offset1'>
                        <?php echo $form->label($model, 'university_end') ?>
                        <?php echo $form->dropDownList($model, 'university_end', Education::yearsForSelect(), array('class'=>'span2')) ?>
                        <?php echo $form->error($model, 'university_end') ?>
                </div>
        </div>
</fieldset>

        <br><br>
        <?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary')) ?>

<?php $this->endWidget() ?>
