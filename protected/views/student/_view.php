<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_ru')); ?>:</b>
	<?php echo CHtml::encode($data->name_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surname_ru')); ?>:</b>
	<?php echo CHtml::encode($data->surname_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surname_en')); ?>:</b>
	<?php echo CHtml::encode($data->surname_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('virgin_surname_ru')); ?>:</b>
	<?php echo CHtml::encode($data->virgin_surname_ru); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('virgin_surname_en')); ?>:</b>
	<?php echo CHtml::encode($data->virgin_surname_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otchestvo')); ?>:</b>
	<?php echo CHtml::encode($data->otchestvo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('citizenship')); ?>:</b>
	<?php echo CHtml::encode($data->citizenship); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passport_number')); ?>:</b>
	<?php echo CHtml::encode($data->passport_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passport_expiration')); ?>:</b>
	<?php echo CHtml::encode($data->passport_expiration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_country')); ?>:</b>
	<?php echo CHtml::encode($data->birth_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_city')); ?>:</b>
	<?php echo CHtml::encode($data->birth_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_cz')); ?>:</b>
	<?php echo CHtml::encode($data->phone_cz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_cz')); ?>:</b>
	<?php echo CHtml::encode($data->address_cz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_name_ru')); ?>:</b>
	<?php echo CHtml::encode($data->father_name_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_name_en')); ?>:</b>
	<?php echo CHtml::encode($data->father_name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_surname_ru')); ?>:</b>
	<?php echo CHtml::encode($data->father_surname_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_surname_en')); ?>:</b>
	<?php echo CHtml::encode($data->father_surname_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_email')); ?>:</b>
	<?php echo CHtml::encode($data->father_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_name_ru')); ?>:</b>
	<?php echo CHtml::encode($data->mother_name_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_name_en')); ?>:</b>
	<?php echo CHtml::encode($data->mother_name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_surname_ru')); ?>:</b>
	<?php echo CHtml::encode($data->mother_surname_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_surname_en')); ?>:</b>
	<?php echo CHtml::encode($data->mother_surname_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_virgin_surname_ru')); ?>:</b>
	<?php echo CHtml::encode($data->mother_virgin_surname_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_virgin_surname_en')); ?>:</b>
	<?php echo CHtml::encode($data->mother_virgin_surname_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_email')); ?>:</b>
	<?php echo CHtml::encode($data->mother_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('courses_ku_id')); ?>:</b>
	<?php echo CHtml::encode($data->courses_ku_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manager_id')); ?>:</b>
	<?php echo CHtml::encode($data->manager_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referent_id')); ?>:</b>
	<?php echo CHtml::encode($data->referent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	*/ ?>

</div>