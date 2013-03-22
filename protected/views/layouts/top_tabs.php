<?php $this->beginContent('//layouts/main'); ?>

<div class='row'>
        <div class='span24'>
                <div class='name-title'>
                        <?php echo $this->student_surname.' '.$this->student_name ?>
                        (<?php echo $this->student_status; ?>)
                </div>
        </div>

        <div class='span24'>
                <div class='top-tabs'>
                        <?php
                        $this->widget('zii.widgets.CMenu',array(
                                'items'=>array(
                                        array('label'=>"Инфо", 'url'=>array('/student/shortInfo/', 'id'=>$this->student_id)),
                                        array('label'=>"Анкета", 'url'=>array('/student/view/', 'id'=>$this->student_id)),
                                        array('label'=>"Договор и фактура", 'url'=>array('/student/dogovor/', 'id'=>$this->student_id)),
                                        array('label'=>"Образование", 'url'=>array('/student/education/', 'id'=>$this->student_id)),
                                        array('label'=>"Визы", 'url'=>array('/student/visa/', 'id'=>$this->student_id)),
                                        array('label'=>"Приезд", 'url'=>array('/student/arrival/', 'id'=>$this->student_id)),
                                        array('label'=>"Адапт. программа", 'url'=>array('/student/adapt/', 'id'=>$this->student_id)),
                                        array('label'=>"Успеваемость", 'url'=>array('/student/progress/', 'id'=>$this->student_id)),
                                        array('label'=>"Почта", 'url'=>array('/student/post/', 'id'=>$this->student_id)),
                                        array('label'=>"Документы", 'url'=>array('/student/docs/', 'id'=>$this->student_id)),
                                ),
                                'htmlOptions'=>array(
                                        'class'=>'nav nav-tabs'
                                ),
                                'encodeLabel'=>false
                        ));
                        ?>
                </div>
        </div>
</div>
<?php echo $content; ?>

<?php $this->endContent(); ?>
