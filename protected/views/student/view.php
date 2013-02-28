<h2>Анкета</h2>

<?php echo CHtml::link('Редактировать', array('/student/update/', 'id'=>$model->id)); ?>
<br><br>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                array(
                        'name'=>'status',
                        'value'=>Student::getStatusValue($model->status),
                        'type'=>'raw',
                ),
		'name_ru',
		'name_en',
		'surname_ru',
		'surname_en',
		'virgin_surname_ru',
		'virgin_surname_en',
		'otchestvo',
                array(
                        'name'=>'sex',
                        'value'=>($model->sex == 1) ? 'Мужской':'Женский',
                ),
                array(
                        'name'=>'citizenship',
                        'value'=>CountryCode::model()->findByAttributes(array('id'=>$model->citizenship))->ru,
                ),
		'passport_number',
		'passport_expiration',
                array(
                        'name'=>'birth_country',
                        'value'=>CountryCode::model()->findByAttributes(array('id'=>$model->birth_country))->ru,
                ),
		'birth_city',
		'email',
		'password',
		'phone',
		'phone_cz',
		'address',
		'address_cz',
                array(
                        'name'=>'courses_ku_id',
                        'value'=>CoursesKu::model()->findByPk($model->courses_ku_id)->name,
                ),
                array(
                        'name'=>'manager_id',
                        'value'=>Users::model()->findByPk($model->manager_id)->name,
                ),
                array(
                        'name'=>'referent_id',
                        'value'=>Users::model()->findByPk($model->referent_id)->name,
                ),
		'start_date',
	),
        'htmlOptions'=>array('class'=>'table side-table'),
)); ?>

<h1><small>Мамуля</small></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mother_name_ru',
		'mother_name_en',
		'mother_surname_ru',
		'mother_surname_en',
		'mother_virgin_surname_ru',
		'mother_virgin_surname_en',
		'mother_email',
	),
        'htmlOptions'=>array('class'=>'table side-table'),
)); ?>

<h1><small>Папуля</small></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'father_name_ru',
		'father_name_en',
		'father_surname_ru',
		'father_surname_en',
		'father_email',
	),
        'htmlOptions'=>array('class'=>'table side-table'),
)); ?>
