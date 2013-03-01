<?php

class StudentController extends DefaultController
{
        public $modelName = 'Student';
        public $layout = 'top_tabs';
        public $createRedirect;
        public $updateRedirect;

        public function actions()
        {
                $path = 'ext.actions.StudentAction';

                return array(
                        'progress'=>array(
                                'class'=>$path,
                                'actionModel'=>'Progress',
                        ),
                        // вкладка "Виза"
                        'visa'=>array(
                                'class'=>$path,
                                'actionModel'=>'Visa',
                        ),
                        // редактирование вкладки "Виза"
                        'updateVisa'=>array(
                                'class'=>$path,
                                'actionModel'=>'Visa',
                                'isUpdate'=>true,
                        ),
                        // вкладка "Образование"
                        'education'=>array(
                                'class'=>$path,
                                'actionModel'=>'Education',
                        ),
                        // редактирование вкладки "Образование"
                        'updateEducation'=>array(
                                'class'=>$path,
                                'actionModel'=>'Education',
                                'isUpdate'=>true,
                        ),
                        // вкладка "Приезд"
                        'arrival'=>array(
                                'class'=>$path,
                                'actionModel'=>'Arrival',
                        ),
                        // редактирование вкладки "Приезд"
                        'updateArrival'=>array(
                                'class'=>$path,
                                'actionModel'=>'Arrival',
                                'isUpdate'=>true,
                        ),
                );
        }

        public function filters()
        {
                return array(
                        'paramsForLayout -admin, create, delete',
                );
        }

        public function actionIndex()
        {
                $this->redirect('admin');
        }

	public function actionAdmin()
	{
                $this->layout = 'main';

                if (isset($_GET['pageSize'])) {
                        Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
                        unset($_GET['pageSize']);  
                }

		$model=new $this->modelName('search');
		$model->unsetAttributes();  
		if(isset($_GET[$this->modelName]))
			$model->attributes=$_GET[$this->modelName];

                // Создание массивов менеджеров и референтов для грида
                $users = Student::managersAndReferents();

		$this->render('admin',array(
			'model'=>$model,
                        'managers'=>$users->managers,
                        'referents'=>$users->referents,
		));
	}

        public function actionCreate()
        {
                $this->layout = 'main';
                parent::actionCreate();
        }


        /**
         * Вкладка "Инфо"
         */
        public function actionShortInfo($id)
        {
                $student = $this->loadModel($id);

                $this->render('shortInfo', array(
                        'student'=>$student,
                ));
        }


        /**
         * Вкладка "Договор и фактура"
         */
        public function actionDogovor($id)
        {
                $student = $this->loadModel($id);

                $this->render('dogovor', array(
                        'student'=>$student,
                ));
                
        }


        /**
         * Вкладка "Почта"
         */
        public function actionPost($id)
        {
                $student = $this->loadModel($id);

                $this->render('post', array(
                        'student'=>$student,
                ));
                
        }


        /**
         * Вкладка "Переводы"
         */
        public function actionTranslations($id)
        {
                $student = $this->loadModel($id);

                $this->render('translations', array(
                        'student'=>$student,
                ));
                
        }


        /**
         * Вкладка "Доверенности"
         */
        public function actionDoverennosti($id)
        {
                $student = $this->loadModel($id);

                $this->render('doverennosti', array(
                        'student'=>$student,
                ));
                
        }


        /**
         * Ставим значения для layout'a top_tabs - Иван Сидоров (Потенциальный)
         * Пихать в каждый экшен
         *
         * @param model Student
         * @return void
         */
        public function filterParamsForLayout($filterChain)
        {
                $student = $this->loadModel((int)$_GET['id']);

                $this->student_name = $student->name_ru;
                $this->student_surname = $student->surname_ru;
                $this->student_id = $student->id;
                $this->student_status = Student::getStatusValue($student->status);

                $filterChain->run();
        }
}
