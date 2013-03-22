<div class='tab-title'>
        <?php echo CHtml::link(
                CHtml::image(Yii::app()->baseUrl.'/css/images/edit_big.png'), 
                array('/student/updateArrival/', 'id'=>$model->student_id)
        ); ?>
        Приезд студента
</div>

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
        'htmlOptions'=>array('class'=>'table side-table table-hover table-bordered'),
)); ?>
