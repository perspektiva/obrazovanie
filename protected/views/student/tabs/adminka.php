<div class='tab-title'>
        Редактирование всякой всячины
</div>

<div class='row'>
        <div class='span5 thumbnail'>
                <ul class='adminka-ul'>
                        <li><h4>Договор:</h4></li>
                        <ul>
                                <li><?php echo CHtml::link("Базовый", array('/adminka/dogovor', 'type'=>'base')); ?></li>
                                <li><?php echo CHtml::link("Стандарт", array('/adminka/dogovor', 'type'=>'standart')); ?></li>
                                <li><?php echo CHtml::link("Всё включено", array('/adminka/dogovor', 'type'=>'all')); ?></li>
                        </ul>
                </ul>

                <hr>

                <ul class='adminka-ul'>
                        <li><h4>Доверенности:</h4></li>
                        <ul>
                                <li><?php echo CHtml::link("Plna moc (RU)", array('/adminka/dogovor', 'type'=>'plna_moc_ru')); ?></li>
                                <li><?php echo CHtml::link("Plna moc (CZ)", array('/adminka/dogovor', 'type'=>'plna_moc_cz')); ?></li>
                        </ul>
                </ul>
        </div>

        <div class='span16 offset1 thumbnail padding20'>
                <h4 class='centered'>Список документов студента</h4>
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                        'dataProvider'=>$filesDataProvider,
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
                                        'header'=>'Название документа',
                                        'name'=>'name'
                                ),
                                array(
                                        'class'=>'CButtonColumn',
                                        'template'=>'{update} {delete}',
                                        'updateButtonUrl'=>'Yii::app()->createUrl("/adminka/editFile", array("file_id" => $data->id))',
                                        'deleteButtonUrl'=>'Yii::app()->createUrl("/adminka/deleteFile", array("file_id" => $data->id))',
                                        'htmlOptions'=>array(
                                                'width'=>'45',
                                                'class'=>'centered'
                                        ),
                                        'headerHtmlOptions'=>array(
                                                'width'=>'45',
                                                'class'=>'centered'
                                        ),
                                ),
                        ),
                        'itemsCssClass'=>'table table-hover table-condensed table-bordered'
                ));
                ?>

                <?php $form = $this->beginWidget('CActiveForm') ?>
                
                        <?php echo $form->labelEx($file_model, 'name') ?>
                        <?php echo $form->textField($file_model, 'name', array('class'=>'span15')) ?>
                        <?php echo $form->error($file_model, 'name') ?>
                
                        <br>
                        <?php echo CHtml::submitButton('Добавить',array('class'=>'btn span4')) ?>
                
                <?php $this->endWidget() ?>
        </div>
</div>
