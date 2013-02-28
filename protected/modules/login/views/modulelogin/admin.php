<?php
$this->breadcrumbs=array(
	Yii::t("LoginModule.crumbs",'Manage'),
);
?>

<h2><?php echo Yii::t("LoginModule.settings",'Manage Admins'); ?></h2>

<?php if(isset(Yii::app()->user->isAdmin)): ?>
        <?php echo CHtml::link(Yii::t("LoginModule.settings","Create Someone"), array('create'),array(
                'class'=>'btn btn-info'
        )) ?>
<?php endif ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'module-login-grid',
	'dataProvider'=>$model->search(),
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
                        'name'=>'isadmin',
                        'value'=>'$data->getAdmin($data->isadmin)',
                        'filter'=>CHtml::listData($model->getAdmins(), 'id', 'title'),
                ),
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update} {delete}',
                        'buttons'=>array(
                                'update'=>array(
                                        'visible'=>'isset(Yii::app()->user->isAdmin) OR (Yii::app()->user->name == $data->name)',
                                ),
                                'delete'=>array(
                                        'visible'=>'isset(Yii::app()->user->isAdmin)',
                                )
                        )
		),
	),
)); ?>
