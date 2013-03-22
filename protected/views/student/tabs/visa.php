<div class='tab-title'>
        <?php echo CHtml::link(
                CHtml::image(Yii::app()->baseUrl.'/css/images/edit_big.png'), 
                array('/student/updateVisa/', 'id'=>$model->student_id)
        ); ?>
        Визовая информация
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array(
                        'name'=>'send_city',
                        'value'=>CityCode::getCityValue($model->send_city),
                ),
                'send_date',
	),
        'htmlOptions'=>array('class'=>'table side-table table-hover table-bordered'),
)); ?>
