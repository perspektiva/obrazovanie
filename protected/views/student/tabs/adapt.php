<div class='tab-title'>
        <?php if(isset($student->adapt_paket->name)): ?>
                Адаптационная программа - <?php echo $student->adapt_paket->name; ?>
        <?php else: ?>
                Нет адаптационной программы
        <?php endif ?>
</div>

<table class='table table-bordered table-condensed table-hover'>
        <thead>
                <tr>
                        <th width='30px'>№</th>
                        <th>Название</th>
                        <th width='120px'>Готовность</th>
                </tr>
        </thead>
        <tbody>
                <?php foreach($items as $item): ?>
                <tr>
                        <td class='centered'><?php echo ++$i; ?></td>
                        <td><?php echo $item->name; ?></td>
                        <td class='centered'>
                                <?php
                                if (StudentAdapt::isItemReady($student->id, $item->id)) 
                                {
                                        echo CHtml::link("Готово", 
                                                array('/adminka/adaptToggleReady', 'item_id'=>$item->id, 'student_id'=>$student->id), 
                                                array('class'=>'btn btn-success btn-small'));
                                } 
                                else 
                                {
                                        echo CHtml::link("Не готово", 
                                                array('/adminka/adaptToggleReady', 'item_id'=>$item->id, 'student_id'=>$student->id), 
                                                array('class'=>'btn btn-danger btn-small'));
                                }
                                ?>
                        </td>
                </tr>
                <?php endforeach ?>
        </tbody>
</table>
