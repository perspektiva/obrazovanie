<?php $pageSize = Yii::app()->user->getState("pageSize",20); ?>
<h2>Управление</h2>

<?php echo CHtml::link(Yii::t('admin','Добавить'), array('create'), array('class'=>'btn btn-info')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'courses-ku-grid',
	'dataProvider'=>$model->search(),
        //'ajaxUpdate'=>false,
	'filter'=>$model,
	'columns'=>array(
                array(
                        'header'=>'№',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                        'htmlOptions'=>array(
                                'width'=>'25',
                                'class'=>'centered'
                        )
                ),
                array(
                        'name'=>'name',
                        'value'=>'CHtml::link($data->name, array("/coursesKu/update/".$data->id))',
                        'type'=>'raw',
                ),
		'price',
		'duration',
		'srok_podachi',
		array(
			'class'=>'CButtonColumn',
                        'header'=>CHtml::dropDownList('pageSize',$pageSize,array(20=>20,50=>50,100=>100,200=>200),array(
                                'onchange'=>"$.fn.yiiGridView.update('courses-ku-grid',{ data:{pageSize: $(this).val() }})",
                                'class'=>'span1'
                        )),
		),
	),
)); ?>
