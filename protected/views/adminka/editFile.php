<div class='tab-title'>
        Редактирование студентского файла
</div>

<?php $form = $this->beginWidget('CActiveForm') ?>

        <?php echo $form->labelEx($model, 'name') ?>
        <?php echo $form->textField($model, 'name', array('class'=>'span15')) ?>
        <?php echo $form->error($model, 'name') ?>

        <br><br>
        <?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary')) ?>

<?php $this->endWidget() ?>
