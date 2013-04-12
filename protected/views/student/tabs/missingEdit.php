<div class='tab-title'>
        Редактирование пропущенного предмета
</div>

<?php $form = $this->beginWidget('CActiveForm') ?>

        <?php echo $form->labelEx($model, 'missing_subject') ?>
        <?php echo $form->textField($model, 'missing_subject', array('class'=>'span10')) ?>
        <?php echo $form->error($model, 'missing_subject') ?>

        <?php echo $form->labelEx($model, 'missing_date') ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'=>$model,
                'attribute'=>'missing_date',
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
        <?php echo $form->error($model, 'missing_date') ?>

        <?php echo $form->labelEx($model, 'missing_comment') ?>
        <?php echo $form->textArea($model, 'missing_comment', array('class'=>'span15', 'rows'=>7)) ?>
        <?php echo $form->error($model, 'missing_comment') ?>

        <br><br>
        <?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary')) ?>

<?php $this->endWidget() ?>
