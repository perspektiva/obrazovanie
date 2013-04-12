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
                        <th width='50px' title='Комментарий'>Комм.</th>
                        <th width='120px' title='Дата готовности'>Дата</th>
                        <th width='120px'>Готовность</th>
                </tr>
        </thead>
        <tbody>
                <?php foreach($items as $item): ?>
                <tr>
                        <td class='centered'><?php echo ++$i; ?></td>
                        <td><?php echo $item->name; ?></td>
                        <td>
                                <?php StudentAdapt::getItemComment($student->id, $item->id); ?>
                                <?php echo CHtml::link(
                                        CHtml::image(Yii::app()->baseUrl.'/css/images/edit_small.png'),
                                        array('/adminka/adaptEditComment', 'student_id'=>$student->id, 'item_id'=>$item->id),
                                        array('class'=>'pull-right')
                                ); ?>
                        </td>
                        <td><?php StudentAdapt::getItemReadyDate($student->id, $item->id); ?></td>
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
