<div class='row'>
        <div class='span24'>
                <div class='tab-title'>
                        Документы студента
                </div>

                <table class='table table-hover table-condensed table-bordered'>
                        <thead>
                                <tr>
                                        <th style='width:25px' class='centered'>№</th>
                                        <th>Название документа</th>
                                        <th>Файл</th>
                                        <th style='width:115px'>Готовность</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php $i = 0; ?>
                                <?php foreach($allFiles as $file): ?>
                                        <?php $studentFile = StudentFiles::isStudentHasFile($student, $file->id) ?>
                                        <tr>
                                                <td class='centered'><?php echo ++$i; ?></td>

                                                <td><?php echo $file->name; ?></td>

                                                <td style='width:320px'>
                                                        <?php if(StudentFiles::isStudentFileExists($studentFile)): ?>

                                                                <a href="<?php echo Yii::app()->baseUrl.'/student_files/'.$studentFile->file; ?>">Скачать</a> ---- 

                                                                <?php echo CHtml::link(
                                                                        "[ Удалить ]", 
                                                                        array('/adminka/deleteStudentFile', 'file_id'=>$file->id, 'id'=>$student->id), 
                                                                        array('confirm'=>'Удалить этот файл с диска ?')
                                                                ); ?>

                                                        <?php else: ?>

                                                                <!-- Форма загрузки -->
                                                                <form style='margin:0' action='' method='POST' accept-charset='utf-8' enctype="multipart/form-data" >
                                                                        <input type='hidden' name='file_id' value='<?php echo $file->id; ?>' />
                                                                        <input type='hidden' name='YII_CSRF_TOKEN' value='<?php echo Yii::app()->request->csrfToken ?>' />
                                                                        <div class='row'>
                                                                                <div class='span4'>
                                                                                        <input type='file' name='student_file' size='4' />
                                                                                </div>

                                                                                <div class='span2'>
                                                                                        <input name='StudentFiles' type='submit' value='Загрузить' class='btn btn-small' />
                                                                                </div>
                                                                        </div>
                                                                </form>
                                                                <!--  -->

                                                        <?php endif ?>
                                                </td>

                                                <td class='centered'>
                                                        <?php
                                                        if ( $studentFile AND ($studentFile->ready == 1) )
                                                        {
                                                                echo CHtml::link("Готов", 
                                                                        array('/adminka/fileToggleReady', 'file_id'=>$file->id, 'id'=>$student->id), 
                                                                        array('class'=>'btn btn-success btn-small'));
                                                        }
                                                        else 
                                                        {
                                                                echo CHtml::link("Не готов", 
                                                                        array('/adminka/fileToggleReady', 'file_id'=>$file->id, 'id'=>$student->id), 
                                                                        array('class'=>'btn btn-danger btn-small'));
                                                        }
                                                        ?>
                                                </td>
                                        </tr>
                                <?php endforeach ?>
                        </tbody>
                </table>
        </div>
</div>

<hr class='huge-separator'>
<div class='row'>
        <div class='span24'>
                <div class='tab-title centered'>
                        Внутренние документы
                </div>

                <ul>
                        <li><?php echo CHtml::link("Plna moc (RU)", array('/generator/generateDogovor/', 'id'=>$student->id, 'type'=>'plna_moc_ru', 'to'=>'doc'), array('target'=>'_blank')); ?></li>
                        <li><?php echo CHtml::link("Plna moc (CZ)", array('/generator/generateDogovor/', 'id'=>$student->id, 'type'=>'plna_moc_cz', 'to'=>'doc'), array('target'=>'_blank')); ?></li>
                </ul>
        </div>
</div>
