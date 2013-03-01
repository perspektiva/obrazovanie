<div class='tab-title'>
        Редактирование визовой информации
</div>


<?php $form = $this->beginWidget('CActiveForm') ?>

        <div class='row'>
                <div class='span5'>
                        <?php echo $form->labelEx($model, 'send_city') ?>
                        <?php echo $form->dropDownList($model, 'send_city', CityCode::getCitiesArray(), array('class'=>'span5')) ?>
                        <?php echo $form->error($model, 'send_city') ?>
                </div>

                <div class='span3'>
                        <?php echo $form->labelEx($model, 'send_date') ?>
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'model'=>$model,
                                'attribute'=>'send_date',
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
                        <?php echo $form->error($model, 'send_date') ?>
                </div>
        </div>

        <br><br>
        <?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary')) ?>

<?php $this->endWidget() ?>
