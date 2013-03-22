<?php
/**
 * Класс для редактирования всякой шняжки, типа текста договора и т.д и т.п.
 * 
 * @version 1.0
 * @author Я
 * @license MIT
 */
class AdminkaController extends Controller
{
        public $layout = 'main';

        /**
         * Редактирование текста договора, доверенностей и прочего
         * 
         * @param int $id - id студента (нужно для top_tabs)
         * @param string $type 
         * @return void
         */
        public function actionDogovor($type)
        {
                $model = Dogovor::model()->findByAttributes(array('type'=>$type));
                if (! $model)
                        throw new CHttpException(404, 'Тут ничего нет. Совсем ничего =(');

                if (isset($_POST['Dogovor'])) 
                {
                        $model->attributes = $_POST['Dogovor'];
                        if ($model->save())
                                Yii::app()->user->setFlash('success','Изменения сохранены');
                }

                $this->render('dogovor', array(
                        'model'=>$model,
                ));
        }


        /**
         * Редактирование название студентского файла - для student/adminka/3
         * 
         * @param int $id - id студента
         * @param int $file_id 
         * @return void
         */
        public function actionEditFile($file_id)
        {
                $model = Files::model()->findByPk((int)$file_id);

                if (! $model)
                        throw new CHttpException(404, 'Ничего тут нет');

                if (isset($_POST['Files'])) 
                {
                        $model->attributes = $_POST['Files'];
                        if ($model->save())
                                $this->redirect(array('/student/adminka'));
                }

                $this->render('editFile', array(
                        'model'=>$model,
                ));
        }


        /**
         * Удаление студентского файла (не самого файла, а элемента из списка файлов) - для student/adminka/3
         * 
         * @param int $file_id 
         * @return void
         */
        public function actionDeleteFile($file_id)
        {
                $model = Files::model()->findByPk((int)$file_id);
                if (! $model)
                        throw new CHttpException(404, 'Ничего тут нет');

                $model->delete();
        }


        /**
         * Удаляет нпосредственно файл с диска и ставит "null" в поле файла - для student/docs/3
         * 
         * @param int $file_id 
         * @return void
         */
        public function actionDeleteStudentFile($file_id, $id)
        {
                $model = StudentFiles::model()->findByAttributes(array('file_id'=>$file_id, 'student_id'=>$id));

                if (! $model)
                        throw new CHttpException(404, 'Ничего тут нет');

                $file = Student::getUploadDir().'/'.$model->file;
                if (file_exists($file)) 
                {
                        $model->file = null;
                        $model->save(false);
                        unlink($file);
                }

                $this->redirect(array('/student/docs', 'id'=>$model->student_id));
        }


        /**
         * Переключение готовности файла - для student/docs/3
         * 
         * @param int $file_id 
         * @param int $id - id студента 
         * @return void
         */
        public function actionFileToggleReady($file_id, $id)
        {
                $model = StudentFiles::model()->findByAttributes(array('file_id'=>$file_id, 'student_id'=>$id));

                if (! $model)
                        throw new CHttpException(404, 'Ничего тут нет');

                $model->ready = ($model->ready == 1) ? 0:1;

                $model->save(false);

                $this->redirect(array('/student/docs','id'=>$model->student_id));
        }


        /**
         * Переключение готовности элемента адаптационной программы - для student/adapt/3
         * 
         * @param int $file_id 
         * @param int $student_id
         * @return void
         */
        public function actionAdaptToggleReady($item_id, $student_id)
        {
                $model = StudentAdapt::model()->findByAttributes(array('item_id'=>$item_id, 'student_id'=>$student_id));

                if (! $model)
                {
                        $model = new StudentAdapt;
                        $model->student_id = $student_id;
                        $model->item_id = $item_id;
                }

                $model->ready = ($model->ready == 1) ? 0:1;

                $model->save(false);

                $this->redirect(array('/student/adapt','id'=>$model->student_id));
        }
}
