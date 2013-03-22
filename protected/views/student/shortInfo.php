<div class='tab-title' style='text-align:left'>
        Главная информация о студенте
</div>

<!-- // =========== Состояние студента ===========  -->
<div class='row'>
        <div class='span18'>
                <fieldset><legend>Состояние студента</legend>
                        <table class='table side-table table-hover table-condensed table-bordered'>
                                <tr>
                                        <th>Номер в БД</th>
                                        <td><?php echo $student->id; ?></td>
                                </tr>
                                <tr>
                                        <th>Статус</th>
                                        <td><?php echo $this->student_status; ?></td>
                                </tr>
                                <tr>
                                        <th>Приехал(а)</th>
                                        <td><?php echo ($student->arrived == 1) ? "<span style='color:green'>Да</span>" : "<span style='color:red'>Нет</span>" ?></td>
                                </tr>
                                <tr>
                                        <th>Учебный год</th>
                                        <td><?php echo $student->study_year; ?></td>
                                </tr>
                                <tr>
                                        <th>Менеджер</th>
                                        <td><?php echo $student->manager->name; ?></td>
                                </tr>
                                <tr>
                                        <th>Референт</th>
                                        <td><?php echo $student->referent->name; ?></td>
                                </tr>
                                <tr>
                                        <th>Полная сдача документов</th>
                                        <td><?php echo ($student->ready == 1) ? "<span style='color:green'>Да</span>" : "<span style='color:red'>Нет</span>" ?></td>
                                </tr>
                        </table>

                </fieldset>
        </div>
</div>

<!-- // =========== Оплаты ===========  -->
<br>
<div class='row'>
        <div class='span18'>
                <fieldset><legend>Оплаты</legend>
                        <table class='table side-table table-condensed table-bordered'>
                                <thead>
                                        <tr>
                                                <th>Дата</th>
                                                <th>Примечание</th>
                                                <th>Сумма</th>
                                                <th>Валюта</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php foreach($cashflow as $cash): ?>
                                        <?php $bgcolor = ($cash->realizovano == 'off') ? "bgcolor='red' title='Не оплачен'" : "bgcolor='#37c54c' title='Оплачено'" ?>
                                        <tr>
                                                <td><?php echo $cash->datum; ?></td>
                                                <td><?php echo $cash->usluga; ?></td>
                                                <td <?php echo $bgcolor; ?>><?php echo $cash->castka; ?></td>
                                                <td><?php echo ($cash->mena == 'czk') ? 'CZK':'EUR'; ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                </tbody>
                        </table>
                </fieldset>
        </div>
</div>
