<div class='tab-title'>
        <?php echo $model->isNewRecord ? "Добавление почты":"Редактирование почты"; ?>
</div>

<?php $form = $this->beginWidget('CActiveForm') ?>

        <div class='row'>
                <div class='span2'>
                        <?php echo $form->labelEx($model, 'date') ?>
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'model'=>$model,
                                'attribute'=>'date',
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
                        <?php echo $form->error($model, 'date') ?>
                </div>

                <div class='span4'>
                        <?php echo $form->labelEx($model, 'direction') ?>
                        <?php echo $form->dropDownList($model, 'direction', array(0=>'Входящая', 1=>'Исходящая'), array('class'=>'span4')) ?>
                        <?php echo $form->error($model, 'direction') ?>
                </div>

                <div class='span3'>
                        <?php echo $form->labelEx($model, 'number') ?>
                        <?php echo $form->textField($model, 'number', array('class'=>'span3')) ?>
                        <?php echo $form->error($model, 'number') ?>
                </div>
        </div>

        <div class='row'>
                <div class='span8'>
                        <?php echo $form->labelEx($model, 'docs') ?>
                        <?php echo $form->textArea($model, 'docs', array('class'=>'span8', 'rows'=>7)) ?>
                        <?php echo $form->error($model, 'docs') ?>
                </div>

                <div class='span8 offset2'>
                        <?php echo $form->labelEx($model, 'comment') ?>
                        <?php echo $form->textArea($model, 'comment', array('class'=>'span8', 'rows'=>5)) ?>
                        <?php echo $form->error($model, 'comment') ?>
                </div>
        </div>


        <br><br>
        <?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary')) ?>

<?php $this->endWidget() ?>
