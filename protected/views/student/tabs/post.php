<div class='tab-title' style='margin-bottom:-10px;'>
        <?php echo CHtml::link(
                CHtml::image(Yii::app()->baseUrl.'/css/images/add.png'), 
                array('/post/add','id'=>$student->id)
        ); ?>
        Почта
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$postDataProvider,
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
                        'header'=>'Дата',
                        'name'=>'date'
                ),
                array(
                        'header'=>'Входящая/исходящая',
                        'value'=>'($data->direction == 1) ? "Исходящая":"Входящая"'
                ),
                array(
                        'header'=>'Список документов',
                        'value'=>'nl2br($data->docs)',
                        'type'=>'raw',
                ),
                array(
                        'header'=>'Номер посылки',
                        'name'=>'number'
                ),
                array(
                        'header'=>'Комментарий',
                        'value'=>'nl2br($data->comment)',
                        'type'=>'raw',
                ),
                array(
                        'class'=>'CButtonColumn',
                        'template'=>'{update}',
                        'updateButtonUrl'=>'Yii::app()->createUrl("/post/update", array("id" => '.$student->id.', "post_id" => $data->id))',
                ),
        ),
        'itemsCssClass'=>'table table-hover table-condensed table-bordered'
));
?>
