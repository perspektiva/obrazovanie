<div class='tab-title'>
        Главная информация о студенте
</div>

<!-- // =========== Состояние студента ===========  --!>
<div class='row'>
        <div class='span18'>
                <fieldset><legend>Состояние студента</legend>
                        <table class='table side-table table-hover table-condensed'>
                                <tr>
                                        <th>Номер в БД</th>
                                        <td><?php echo $student->id; ?></td>
                                </tr>
                                <tr>
                                        <th>Статус</th>
                                        <td><?php echo $this->student_status; ?></td>
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
                                        <td><?php echo $student->id; ?></td>
                                </tr>
                        </table>

                </fieldset>
        </div>
</div>

<!-- // =========== Договоры ===========  --!>
<br>
<div class='row'>
        <div class='span18'>
                <fieldset><legend>Договоры</legend>
                        <table class='table'>
                                <thead>
                                        <tr>
                                                <th>Сгененированный договор</th>
                                                <th>Дата</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                </tbody>
                        </table>
                </fieldset>
        </div>
</div>

<!-- // =========== Оплаты ===========  --!>
<br>
<div class='row'>
        <div class='span18'>
                <fieldset><legend>Оплаты</legend>
                        <table class='table'>
                                <thead>
                                        <tr>
                                                <th>Дата</th>
                                                <th>Примечание</th>
                                                <th>Сумма</th>
                                                <th>Валюта</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                </tbody>
                        </table>
                </fieldset>
        </div>
</div>
