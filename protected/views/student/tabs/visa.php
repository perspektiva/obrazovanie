<div class='tab-title'>
        Визовая информация
</div>

<?php echo CHtml::link('Редактировать', array('/student/updateVisa/', 'id'=>$model->student_id)); ?>

<br><br>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array(
                        'name'=>'send_city',
                        'value'=>CityCode::getCityValue($model->send_city),
                ),
                'send_date',
	),
        'htmlOptions'=>array('class'=>'table side-table table-hover'),
)); ?>
