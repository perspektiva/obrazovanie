<div class='row'>
        <?php echo CHtml::link('Добавить', array('/adaptPakets/create'), array('class'=>'btn btn-info span3')); ?>
</div>
<br><br>

<table class='table side-table'>
        <?php foreach($pakets as $paket): ?>
        <tr>
                <th>
                        <?php echo $paket->name.' [ '.CHtml::link('Редактировать', array('/AdaptPakets/update/'.$paket->id)).' ] '.
                        '[-- '.CHtml::link('Удалить', array('/AdaptPakets/delete/'.$paket->id), array('confirm'=>'Точно удалить ?')).' --]'; ?>
                </th>

                <td>
                        <h3 class='centered'><?php echo CHtml::link('Редактировать элементы', array('/adaptItems/admin/', 'paket_id'=>$paket->id)); ?></h3>
                </td>
        </tr>
        <?php endforeach ?>
</table>
