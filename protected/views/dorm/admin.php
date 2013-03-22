<?php $pageSize = Yii::app()->user->getState("pageSize",20); ?>
<h2>
        <?php echo CHtml::link(
                CHtml::image(Yii::app()->baseUrl.'/css/images/add.png'), 
                array('create')
        ); ?>
        Управление общагами
</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dorm-grid',
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
                        'value'=>'CHtml::link($data->name, array("/dorm/update/".$data->id))',
                        'type'=>'raw',
                ),
		'price',
		'address',
		'from',
		'to',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update} {delete}',
                        'header'=>CHtml::dropDownList('pageSize',$pageSize,array(20=>20,50=>50,100=>100,200=>200),array(
                                'onchange'=>"$.fn.yiiGridView.update('dorm-grid',{ data:{pageSize: $(this).val() }})",
                                'class'=>'span1'
                        )),
		),
	),
)); ?>
