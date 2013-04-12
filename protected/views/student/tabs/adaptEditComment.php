<div class='tab-title'>
        Редактирование комментария
</div>
<?php $form = $this->beginWidget('CActiveForm') ?>

        <?php echo $form->labelEx($model, 'comment') ?>
        <?php echo $form->textArea($model, 'comment', array('class'=>'span15', 'rows'=>7)) ?>
        <?php echo $form->error($model, 'comment') ?>

        <br><br>
        <?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary')) ?>

<?php $this->endWidget() ?>
