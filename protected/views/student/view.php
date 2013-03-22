<div class='tab-title'>
        <?php echo CHtml::link(
                CHtml::image(Yii::app()->baseUrl.'/css/images/edit_big.png'), 
                array('/student/update/', 'id'=>$model->id)
        ); ?>
        Анкета
</div>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array(
                        'name'=>'Номер в БД',
                        'value'=>$model->id,
                ),
                array(
                        'name'=>'status',
                        'value'=>Student::getStatusValue($model->status),
                        'type'=>'raw',
                ),
                array(
                        'name'=>'arrived',
                        'value'=>($model->arrived == 1) ? "<span style='color:green'>Да</span>" : "<span style='color:red'>Нет</span>",
                        'type'=>'raw',
                ),
		'study_year',
		'name_ru',
		'surname_ru',
		'otchestvo',
		'virgin_surname_ru',
		'name_en',
		'surname_en',
		'virgin_surname_en',
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
		'birthday',
                array(
                        'name'=>'birth_country',
                        'value'=>CountryCode::model()->findByAttributes(array('id'=>$model->birth_country))->ru,
                ),
		'birth_city',
                array(
                        'name'=>'apostil',
                        'value'=>($model->apostil == 1) ? "Да":"Нет",
                ),
		'email',
		'phone',
		'phone_cz',
		'address',
		'address_cz',
                array(
                        'name'=>'courses_ku_id',
                        'value'=>(isset($model->courses_ku->name)) ? $model->courses_ku->name." (".$model->courses_ku->duration_from." - ".$model->courses_ku->duration_to.")" : '',
                ),
                array(
                        'name'=>'need_dorm',
                        'value'=>($model->need_dorm AND isset($model->dorm->name)) ? $model->dorm->name : "Не требуется",
                ),
                array(
                        'name'=>'adapt_paket_id',
                        'value'=>(isset($model->adapt_paket->name)) ? $model->adapt_paket->name : '',
                ),
                array(
                        'name'=>'manager_id',
                        'value'=>$model->manager->name,
                ),
                array(
                        'name'=>'referent_id',
                        'value'=>$model->referent->name,
                ),
		'start_date',
	),
        'htmlOptions'=>array('class'=>'table side-table table-bordered'),
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
        'htmlOptions'=>array('class'=>'table side-table table-bordered'),
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
        'htmlOptions'=>array('class'=>'table side-table table-bordered'),
)); ?>
