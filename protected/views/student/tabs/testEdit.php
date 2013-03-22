<div class='tab-title'>
        Редактирование результатов теста
</div>


<?php $form = $this->beginWidget('CActiveForm') ?>

        <?php echo $form->labelEx($model, 'test_name') ?>
        <?php echo $form->textField($model, 'test_name', array('class'=>'span10')) ?>
        <?php echo $form->error($model, 'test_name') ?>

        <div class='row'>
                <div class='span2'>
                        <?php echo $form->labelEx($model, 'test_date') ?>
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'model'=>$model,
                                'attribute'=>'test_date',
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
                        <?php echo $form->error($model, 'test_date') ?>
                </div>

                <div class='span3'>
                        <?php echo $form->labelEx($model, 'max_points') ?>
                        <?php echo $form->textField($model, 'max_points', array('class'=>'span3')) ?>
                        <?php echo $form->error($model, 'max_points') ?>
                </div>

                <div class='span3'>
                        <?php echo $form->labelEx($model, 'points') ?>
                        <?php echo $form->textField($model, 'points', array('class'=>'span3')) ?>
                        <?php echo $form->error($model, 'points') ?>
                </div>

                <div class='span2 offset1'>
                        <?php echo $form->labelEx($model, 'passed') ?>
                        <?php echo $form->dropDownList($model, 'passed', array(0=>'Нет', 1=>'Да'), array('empty'=>'', 'class'=>'span2')) ?>
                        <?php echo $form->error($model, 'passed') ?>
                </div>
        </div>

        <br><br>
        <?php echo CHtml::submitButton('Добавить результаты теста',array('class'=>'btn')) ?>

<?php $this->endWidget() ?>
