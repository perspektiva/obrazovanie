<div class='tab-title'>
        Приезд студента
</div>

<?php echo CHtml::link('Редактировать', array('/student/updateArrival/', 'id'=>$model->student_id)); ?>

<br><br>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array(
                        'name'=>'transport',
                        'value'=>Arrival::getTransportValue($model->transport),
                ),
                'reis',
                'arrival_date',
                'arrival_time',
                'phone',
                array(
                        'name'=>'comments',
                        'value'=>nl2br($model->comments),
                        'type'=>'html',
                ),
	),
        'htmlOptions'=>array('class'=>'table side-table table-hover'),
)); ?>
