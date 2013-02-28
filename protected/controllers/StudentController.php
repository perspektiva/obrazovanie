<?php

class StudentController extends DefaultController
{
        public $modelName = 'Student';
        public $layout = 'top_tabs';
        public $createRedirect;
        public $updateRedirect;


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

        public function actionUpdate($id)
        {
                $student = $this->loadModel($id);
                $this->paramsForLayout($student);

                parent::actionUpdate($id);
        }

        /**
         * Вкладка "Инфо"
         */
        public function actionShortInfo($id)
        {
                $student = $this->loadModel($id);
                $this->paramsForLayout($student);

                $this->render('shortInfo', array(
                        'student'=>$student,
                ));
        }


        /**
         * Вкладка "Анкета" оно же 'View'
         */
        public function actionView($id)
        {
                $student = $this->loadModel($id);
                $this->paramsForLayout($student);

                $this->render('view', array(
                        'model'=>$student,
                ));
                
        }


        /**
         * Вкладка "Договор и фактура"
         */
        public function actionDogovor($id)
        {
                $student = $this->loadModel($id);
                $this->paramsForLayout($student);

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
                $this->paramsForLayout($student);

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
                $this->paramsForLayout($student);

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
                $this->paramsForLayout($student);

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
        public function paramsForLayout($student)
        {
                $this->student_name = $student->name_ru;
                $this->student_surname = $student->surname_ru;
                $this->student_id = $student->id;
                $this->student_status = Student::getStatusValue($student->status);
        }
}
