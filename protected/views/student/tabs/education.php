<div class='tab-title'>
        <?php echo CHtml::link(
                CHtml::image(Yii::app()->baseUrl.'/css/images/edit_big.png'), 
                array('/student/updateEducation/', 'id'=>$model->student_id)
        ); ?>
        Образование студента
</div>


<h1><small>Среднее образование</small></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                'school_name',
                'school_city',
                array(
                        'name'=>'school_type',
                        'value'=>($model->school_type == 1) ? 'Государственная':'Частная',
                ),
                'school_start',
                'school_end',
	),
        'htmlOptions'=>array('class'=>'table side-table table-hover table-bordered'),
)); ?>

<h1><small>Высшее образование (если есть)</small></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                'university_name',
                'university_speciality',
                'university_title',
                'university_start',
                'university_end',
	),
        'htmlOptions'=>array('class'=>'table side-table table-hover table-bordered'),
)); ?>
