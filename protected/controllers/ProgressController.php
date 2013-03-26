<?php
class ProgressController extends Controller
{
        public $layout = 'top_tabs';


        public function filters()
        {
                return array(
                        'accessControl',
                        'paramsForLayout',
                );
        }


        /**
         * Редактирование пропущенного предмета 
         * 
         * @param int $id - id студента
         * @param int $missing_id 
         * @return void
         */
        public function actionEditMissing($id, $missing_id)
        {
                $model = MissingSubjects::model()->findByAttributes(array(
                        'id' => $missing_id,
                        'student_id' => $id,
                ));

                if (! $model)
			throw new CHttpException(404, "Тут ничего нет. Совсем ничегошеньки :(");

                if (isset($_POST['MissingSubjects'])) 
                {
                        $model->attributes = $_POST['MissingSubjects'];
                        $model->student_id = $id;
                        if ($model->save())
                                $this->redirect(array('/student/progress', 'id'=>$id));
                }

                $this->render('/student/tabs/missingEdit', array(
                        'model'=>$model,
                ));
        }


        /**
         * Редактирование результатов теста 
         * 
         * @param int $id - id студента
         * @param int $test_id 
         * @return void
         */
        public function actionEditTest($id, $test_id)
        {
                $model = Tests::model()->findByAttributes(array(
                        'id' => $test_id,
                        'student_id' => $id,
                ));

                if (! $model)
			throw new CHttpException(404, "Тут ничего нет. Совсем ничегошеньки :(");

                if (isset($_POST['Tests'])) 
                {
                        $model->attributes = $_POST['Tests'];
                        $model->student_id = $id;
                        if ($model->save())
                                $this->redirect(array('/student/progress', 'id'=>$id));
                }

                $this->render('/student/tabs/testEdit', array(
                        'model'=>$model,
                ));
        }

}
