<div class='tab-title'>
        <?php echo $model->name; ?>
</div>

<?php if(Yii::app()->user->hasFlash('success')): ?>
        <div class='alert alert-success centered'>
                <?php echo Yii::app()->user->getFlash('success') ?>
        </div>
<?php endif ?>

<?php $form = $this->beginWidget('CActiveForm') ?>

        <?php echo $form->textArea($model, 'body', array('class'=>'span10', 'id'=>'ckeditor')) ?>
        <?php echo $form->error($model, 'body') ?>

        <br><br>
        <?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary span5')) ?>

<?php $this->endWidget() ?>

<hr>
<h2><small>Можно использовать следующие переменные:</small></h2>

<div class='row'>
        <div class='span8'>
<pre>
---------- Информация о студенте ------------

Имя (ru)        = %student_name_ru%
Фамилия (ru)    = %student_surname_ru%
Имя (en)        = %student_name_en%
Фамилия (en)    = %student_surname_en%
День рождения   = %student_birthday%
Номер пасспорта = %student_passport_number%
Адрес прописки  = %student_address%
</pre>
        </div>

        <div class='span8'>
<pre>
------ Информация о референте/менеджере ------

Менеджер = %manager%
Референт = %referent%
</pre>
        </div>

        <div class='span8'>
<pre>
---------- Разное ------------

Сегодняшняя дата = %date%
Номер договора   = %dogovor%
</pre>
        </div>
</div>


<script type="text/javascript">
CKEDITOR.replace( 'ckeditor', {
        height : '700px'
});
</script>
