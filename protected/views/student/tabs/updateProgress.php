<div class='tab-title'>
        Редактирование информации о прибытии студента
</div>


<?php $form = $this->beginWidget('CActiveForm') ?>

        <div class='row'>
                <div class='span4'>
                        <?php echo $form->labelEx($model, 'transport') ?>
                        <?php echo $form->dropDownList($model, 'transport', Arrival::getTransportTypes(), array('class'=>'span3')) ?>
                        <?php echo $form->error($model, 'transport') ?>
                </div>

                <div class='span4'>
                        <?php echo $form->labelEx($model, 'reis') ?>
                        <?php echo $form->textField($model, 'reis', array('class'=>'span3')) ?>
                        <?php echo $form->error($model, 'reis') ?>
                </div>

                <div class='span3'>
                        <?php echo $form->labelEx($model, 'arrival_date') ?>
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'model'=>$model,
                                'attribute'=>'arrival_date',
                                'options'=>array(
                                        'changeYear'=>true,
                                        'changeMonth'=>true,
                                        'dateFormat'=>'dd.mm.yy',
                                        'showAnim'=>'fold',
                                        'yearRange'=>'1980:2030',
                                        'firstDay'=>1,
                                ),
                                'htmlOptions'=>array(
                                        'maxlength'=>20,
                                        'class'=>'span2',
                                ),
                        )); 
                        ?>
                        <?php echo $form->error($model, 'arrival_date') ?>
                </div>

                <div class='span3'>
                        <?php echo $form->labelEx($model, 'arrival_time') ?>
                        <?php
                        $this->widget('CMaskedTextField', array(
                                'model' => $model,
                                'attribute' => 'arrival_time',
                                'mask' => '99:99',
                                'htmlOptions' => array('class' => 'span2')
                        ));
                        ?>
                        <?php echo $form->error($model, 'arrival_time') ?>
                </div>

                <div class='span4'>
                        <?php echo $form->labelEx($model, 'phone') ?>
                        <?php echo $form->textField($model, 'phone', array('class'=>'span4')) ?>
                        <?php echo $form->error($model, 'phone') ?>
                </div>
        </div>

        <br>
        <div class='row'>
                <div class='span18'>
                        <?php echo $form->labelEx($model, 'comments') ?>
                        <?php echo $form->textArea($model, 'comments', array('class'=>'span18', 'rows'=>7)) ?>
                        <?php echo $form->error($model, 'comments') ?>
                </div>
        </div>

        <br><br>
        <?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary')) ?>

<?php $this->endWidget() ?>
