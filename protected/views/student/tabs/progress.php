<div class='tab-title'>
        Успеваемость студента
</div>

<div class='row'>
        <!-- Пропущенные предметы --!>
        <div class='span12'>
                <fieldset class='form'><legend>Статистика посещаемости</legend>
                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                                'dataProvider'=>$missingDataProvider,
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
                                                'header'=>'Пропущенный предмет',
                                                'name'=>'missing_subject'
                                        ),
                                        array(
                                                'header'=>'Дата',
                                                'name'=>'missing_date'
                                        ),
                                        array(
                                                'class'=>'CButtonColumn',
                                                'template'=>'{update}',
                                                'updateButtonUrl'=>'Yii::app()->createUrl("/progress/editMissing", array("id" => '.$student->id.', "missing_id" => $data->id))',
                                                'htmlOptions'=>array(
                                                        'width'=>'25',
                                                        'class'=>'centered'
                                                ),
                                                'headerHtmlOptions'=>array(
                                                        'width'=>'25',
                                                        'class'=>'centered'
                                                ),
                                        ),
                                ),
                                'itemsCssClass'=>'table table-hover table-condensed table-bordered'
                        ));
                        ?>


                        <h2><small>Добавление пропущеных предметов</small></h2>
                        <hr>
                        <?php $form = $this->beginWidget('CActiveForm') ?>
                        
                                <?php echo $form->labelEx($missing, 'missing_subject') ?>
                                <?php echo $form->textField($missing, 'missing_subject', array('class'=>'span10')) ?>
                                <?php echo $form->error($missing, 'missing_subject') ?>
                        
                                <?php echo $form->labelEx($missing, 'missing_date') ?>
                                <?php
                                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'model'=>$missing,
                                        'attribute'=>'missing_date',
                                        'options'=>array(
                                                'changeYear'=>true,
                                                'changeMonth'=>true,
                                                'dateFormat'=>'dd.mm.yy',
                                                'showAnim'=>'fold',
                                                'yearRange'=>'1970:2030',
                                                'firstDay'=>1,
                                        ),
                                        'htmlOptions'=>array(
                                                'maxlength'=>20,
                                                'class'=>'span2',
                                        ),
                                )); 
                                ?>
                                <?php echo $form->error($missing, 'missing_date') ?>
                        
                                <?php echo $form->labelEx($missing, 'missing_comment') ?>
                                <?php echo $form->textArea($missing, 'missing_comment', array('class'=>'span10', 'rows'=>5)) ?>
                                <?php echo $form->error($missing, 'missing_comment') ?>
                        
                                <br><br>
                                <?php echo CHtml::submitButton('Добавить пропущенное занятие',array('class'=>'btn')) ?>
                        
                        <?php $this->endWidget() ?>
                </fieldset>
        </div>

        <!-- Результаты тестов --!>
        <div class='span12'>
                <fieldset class='form'><legend>Статистика успеваемости</legend>
                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                                'dataProvider'=>$testsDataProvider,
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
                                                'header'=>'Тест',
                                                'name'=>'test_name'
                                        ),
                                        array(
                                                'header'=>'Набрано',
                                                'name'=>'points'
                                        ),
                                        array(
                                                'header'=>'Макс',
                                                'name'=>'max_points'
                                        ),
                                        array(
                                                'header'=>'Сдал',
                                                'value'=>'($data->passed == 1) ? "Да":"Нет"'
                                        ),
                                        array(
                                                'header'=>'Дата',
                                                'name'=>'test_date'
                                        ),
                                        array(
                                                'class'=>'CButtonColumn',
                                                'template'=>'{update}',
                                                'updateButtonUrl'=>'Yii::app()->createUrl("/progress/editTest", array("id" => '.$student->id.', "test_id" => $data->id))',
                                                'htmlOptions'=>array(
                                                        'width'=>'25',
                                                        'class'=>'centered'
                                                ),
                                                'headerHtmlOptions'=>array(
                                                        'width'=>'25',
                                                        'class'=>'centered'
                                                ),
                                        ),
                                ),
                                'itemsCssClass'=>'table table-hover table-condensed table-bordered'
                        ));
                        ?>


                        <h2><small>Добавление результатов теста</small></h2>
                        <hr>
                        <?php $form = $this->beginWidget('CActiveForm') ?>
                        
                                <?php echo $form->labelEx($tests, 'test_name') ?>
                                <?php echo $form->textField($tests, 'test_name', array('class'=>'span10')) ?>
                                <?php echo $form->error($tests, 'test_name') ?>

                                <div class='row'>
                                        <div class='span2'>
                                                <?php echo $form->labelEx($tests, 'test_date') ?>
                                                <?php
                                                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                                        'model'=>$tests,
                                                        'attribute'=>'test_date',
                                                        'options'=>array(
                                                                'changeYear'=>true,
                                                                'changeMonth'=>true,
                                                                'dateFormat'=>'dd.mm.yy',
                                                                'showAnim'=>'fold',
                                                                'yearRange'=>'1970:2030',
                                                                'firstDay'=>1,
                                                        ),
                                                        'htmlOptions'=>array(
                                                                'maxlength'=>20,
                                                                'class'=>'span2',
                                                        ),
                                                )); 
                                                ?>
                                                <?php echo $form->error($tests, 'test_date') ?>
                                        </div>

                                        <div class='span3'>
                                                <?php echo $form->labelEx($tests, 'max_points') ?>
                                                <?php echo $form->textField($tests, 'max_points', array('class'=>'span3')) ?>
                                                <?php echo $form->error($tests, 'max_points') ?>
                                        </div>

                                        <div class='span3'>
                                                <?php echo $form->labelEx($tests, 'points') ?>
                                                <?php echo $form->textField($tests, 'points', array('class'=>'span3')) ?>
                                                <?php echo $form->error($tests, 'points') ?>
                                        </div>

                                        <div class='span2 offset1'>
                                                <?php echo $form->labelEx($tests, 'passed') ?>
                                                <?php echo $form->dropDownList($tests, 'passed', array(0=>'Нет', 1=>'Да'), array('empty'=>'', 'class'=>'span2')) ?>
                                                <?php echo $form->error($tests, 'passed') ?>
                                        </div>
                                </div>
                        
                                <br><br>
                                <?php echo CHtml::submitButton('Добавить результаты теста',array('class'=>'btn')) ?>
                        
                        <?php $this->endWidget() ?>
                </fieldset>
        </div>
</div>

<br><br>
