<?php $pageSize = Yii::app()->user->getState("pageSize",20); ?>
<h2>Элементы для пакета "<?php echo AdaptPakets::model()->findByPk((int)$_GET['paket_id'])->name; ?>"</h2>

<?php echo CHtml::link(Yii::t('admin','Добавить'), array('create', 'paket_id'=>$_GET['paket_id']), array('class'=>'btn btn-info')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'adapt-items-grid',
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
		'name',
                array(
                        'name'=>'before',
                        'filter'=>array(1=>'До', 0=>'После'),
                        'value'=>'($data->before == 1) ? "До приезда" : "После приезда"',
                ),
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update} {delete}',
                        'header'=>CHtml::dropDownList('pageSize',$pageSize,array(20=>20,50=>50,100=>100,200=>200),array(
                                'onchange'=>"$.fn.yiiGridView.update('adapt-items-grid',{ data:{pageSize: $(this).val() }})",
                                'class'=>'span1'
                        )),
		),
	),
)); ?>
