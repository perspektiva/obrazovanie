<?php $pageSize = Yii::app()->user->getState("pageSize",20); ?>
<h2>
        <?php echo CHtml::link(
                CHtml::image(Yii::app()->baseUrl.'/css/images/add.png'), 
                array('create')
        ); ?>
        Студенты
</h2>

<?php echo CHtml::link(
        'Расширенный поиск'.CHtml::image(Yii::app()->baseUrl.'/css/images/search.png', '', array('class'=>'search-img')),
        '#',array('class'=>'search-link rounded3')
); ?>

<div class="search-form" style="display:none">
        <?php $this->renderPartial('_search',array(
                'model'=>$model,
        )); ?>
</div>


<?php
Yii::app()->clientScript->registerScript('my-list-search', "
        $('.search-link').click(function(){
                $('.search-form').toggle();
                return false;
        });
        $('.search-form form').submit(function(){
                $.fn.yiiListView.update('student-grid', {
                        data: $(this).serialize()
                });
                return false;
        });
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
        //'ajaxUpdate'=>false,
	'filter'=>$model,
	'columns'=>array(
                array(
                        'name'=>'id',
                        'htmlOptions'=>array(
                                'width'=>'40',
                                'class'=>'centered'
                        ),
                ),
                array(
                        'name'=>'name_en',
                        'value'=>'CHtml::link($data->name_en, array("/student/shortinfo/".$data->id))',
                        'type'=>'raw',
                ),
		'surname_en',
                array(
                        'name'=>'manager_id',
                        'value'=>function($data, $row) use ($managers) {
                                return Student::getManagerValue($managers, $data->manager_id);
                        },
                        'filter'=>CHtml::listData($managers, "id", "name"),
                ),
                array(
                        'name'=>'referent_id',
                        'value'=>function($data, $row) use ($referents) {
                                return Student::getReferentValue($referents, $data->referent_id);
                        },
                        'filter'=>CHtml::listData($referents, "id", "name"),
                ),
                array(
                        'name'=>'study_year',
                        'htmlOptions'=>array(
                                'width'=>'110',
                                'class'=>'centered'
                        ),
                ),
                array(
                        'name'=>'status',
                        'value'=>'Student::getStatusValue($data->status)',
                        'filter'=>Student::getStatusArray(false),
                        'type'=>'raw',
                        'htmlOptions'=>array(
                                'width'=>'110',
                                'class'=>'centered'
                        ),
                ),
		array(
			'class'=>'CButtonColumn',
                        'header'=>CHtml::dropDownList('pageSize',$pageSize,array(20=>20,50=>50,100=>100,200=>200),array(
                                'onchange'=>"$.fn.yiiGridView.update('student-grid',{ data:{pageSize: $(this).val() }})",
                                'class'=>'span1'
                        )),
		),
	),
)); ?>
