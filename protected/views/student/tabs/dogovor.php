<div class='tab-title'>
        Договор
</div>


<ul class='adminka-ul'>
        <li><h4>Предпросмотр договора:</h4></li>
        <ul>
                <li><?php echo CHtml::link("Базовый", array('/generator/generateDogovor', 'id'=>$this->student_id, 'type'=>'base'), array('target'=>'_blank')); ?></li>
                <li><?php echo CHtml::link("Стандарт", array('/generator/generateDogovor', 'id'=>$this->student_id, 'type'=>'standart'), array('target'=>'_blank')); ?></li>
                <li><?php echo CHtml::link("Всё включено", array('/generator/generateDogovor', 'id'=>$this->student_id, 'type'=>'all'), array('target'=>'_blank')); ?></li>
        </ul>
</ul>
