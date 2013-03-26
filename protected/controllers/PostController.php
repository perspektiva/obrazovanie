<?php
class PostController extends Controller
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
         * Добавляет почту студента 
         * 
         * @param int $id - id студента 
         * @return void
         */
        public function actionAdd($id)
        {
                $model = new Post;

                if (isset($_POST['Post'])) 
                {
                        $model->attributes = $_POST['Post'];
                        $model->student_id = $id;
                        if ($model->save())
                                $this->redirect(array('/student/post', 'id'=>$id));
                }
                $this->render('/student/tabs/postEdit', array(
                        'model'=>$model,
                ));
        }



        /**
         * Редактирование почты студента 
         * 
         * @param int $id - id студента 
         * @param int $post_id 
         * @return void
         */
        public function actionUpdate($id, $post_id)
        {
                $model = Post::model()->findByAttributes(array(
                        'id' => $post_id,
                        'student_id' => $id,
                ));

                if (! $model)
			throw new CHttpException(404,'The requested page does not exist.');

                if (isset($_POST['Post'])) 
                {
                        $model->attributes = $_POST['Post'];
                        $model->student_id = $id;
                        if ($model->save())
                                $this->redirect(array('/student/post', 'id'=>$id));
                }

                $this->render('/student/tabs/postEdit', array(
                        'model'=>$model,
                ));
        }

}
