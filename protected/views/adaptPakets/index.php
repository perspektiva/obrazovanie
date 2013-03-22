<h2>
        <?php echo CHtml::link(
                CHtml::image(Yii::app()->baseUrl.'/css/images/add.png'), 
                array('create')
        ); ?>
        Адаптационная программа
</h2>
<br>

<table class='table side-table'>
        <?php foreach($pakets as $paket): ?>
        <tr>
                <th>
                        <h3>
                                <?php echo CHtml::link(
                                        CHtml::image(Yii::app()->baseUrl.'/css/images/edit_small.png'), 
                                        array('/adaptPakets/update/'.$paket->id)
                                ); ?> 
                                <?php echo $paket->name; ?>
                                <?php echo CHtml::link(
                                        CHtml::image(Yii::app()->baseUrl.'/css/images/delete.gif'), 
                                        array('/adaptPakets/delete/'.$paket->id),
                                        array('confirm'=>'Точно удалить ?')
                                ); ?> 
                        </h3>
                </th>

                <td>
                        <h3 class='centered'><?php echo CHtml::link('Редактировать элементы', array('/adaptItems/admin/', 'paket_id'=>$paket->id)); ?></h3>
                </td>
        </tr>
        <?php endforeach ?>
</table>
