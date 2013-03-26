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
                        'paramsForLayout -admin, create, delete, adminka, noAccess',
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
                $cashflow = Cashflow::model()->findAllByAttributes(array('student_id'=>$id));

                $this->render('shortInfo', array(
                        'student'  => $student,
                        'cashflow' => $cashflow,
                ));
        }


        /**
         * Вкладка "Успеваемость"
         */
        public function actionProgress($id)
        {
                $student = $this->loadModel($id);
                $tests = new Tests;
                $missing = new MissingSubjects('progress');

                //Добавление пропущенного предмета
                if (isset($_POST['MissingSubjects'])) 
                {
                        $missing->student_id = $student->id;
                        $missing->attributes = $_POST['MissingSubjects'];
                        if ($missing->save())
                                $this->redirect(array('/student/progress', 'id'=>$student->id));
                }

                //Добавление результатов теста
                if (isset($_POST['Tests'])) 
                {
                        $tests->student_id = $student->id;
                        $tests->attributes = $_POST['Tests'];
                        if ($tests->save())
                                $this->redirect(array('/student/progress', 'id'=>$student->id));
                }

                $testsDataProvider = new CArrayDataProvider($student->tests, array(
                        'sort'=>array(
                            'defaultOrder'=>'id DESC',
                        ),
                        'pagination'=>array(
                                'pageSize'=>10,
                        ),
                )); 
                $missingDataProvider = new CArrayDataProvider($student->missing_subjects, array(
                        'sort'=>array(
                            'defaultOrder'=>'id DESC',
                        ),
                        'pagination'=>array(
                                'pageSize'=>10,
                        ),
                )); 

                $this->render('tabs/progress', array(
                        'student'             => $student,
                        'tests'               => $tests,
                        'testsDataProvider'   => $testsDataProvider,
                        'missing'             => $missing,
                        'missingDataProvider' => $missingDataProvider,
                ));
        }


        /**
         * Вкладка "Договор и фактура"
         */
        public function actionDogovor($id)
        {
                $student = $this->loadModel($id);

                $this->render('tabs/dogovor', array(
                        'student'=>$student,
                ));
                
        }


        /**
         * Вкладка "Адапт. программа"
         */
        public function actionAdapt($id)
        {
                $student = $this->loadModel($id);
                $items = isset($student->adapt_paket->items) ? $student->adapt_paket->items : array();

                $this->render('tabs/adapt', array(
                        'items'=>$items,
                        'student'=>$student,
                        'i'=>0,
                ));
                
        }


        /**
         * Вкладка "Почта"
         */
        public function actionPost($id)
        {
                $student = $this->loadModel($id);

                $postDataProvider = new CArrayDataProvider($student->post, array(
                        'sort'=>array(
                            'defaultOrder'=>'id DESC',
                        ),
                        'pagination'=>array(
                                'pageSize'=>20,
                        ),
                )); 

                $this->render('tabs/post', array(
                        'student'=>$student,
                        'postDataProvider'=>$postDataProvider,
                ));
                
        }


        /**
         * Вкладка "Документы"
         */
        public function actionDocs($id)
        {
                $student = $this->loadModel($id);
                $allFiles = Files::model()->findAll();

                //Загружаем файлы
                if ( isset($_POST['StudentFiles']) AND ($_FILES['student_file']['error'] == 0) ) 
                {
                        $fileName = $student->id.'_'.time().'_'.$_FILES['student_file']['name'];
                        if ( move_uploaded_file($_FILES['student_file']['tmp_name'], 'student_files/'.$fileName) )
                        {
                                $file = StudentFiles::model()->findByPk((int)$_POST['file_id']);
                                if (! $file)
                                        $file = new StudentFiles;

                                $file->student_id = $student->id;
                                $file->file_id = $_POST['file_id'];
                                $file->file = $fileName;
                                $file->save(false);
                        }
                }

                $this->render('tabs/docs', array(
                        'student' => $student,
                        'allFiles' => $allFiles,
                ));
                
        }


        /**
         * Вкладка "Админка"
         *
         * Дальше работает могучий AdminkaController
         */
        public function actionAdminka()
        {
                $this->layout = 'main';
                $file_model = new Files;

                if (isset($_POST['Files'])) 
                {
                        $file_model->name = $_POST['Files']['name'];
                        if ($file_model->save())
                                $file_model->unsetAttributes();
                }

                $filesDataProvider = new CActiveDataProvider('Files', array(
                        'sort'=>array(
                            'defaultOrder'=>'id DESC',
                        ),
                        'pagination'=>array(
                                'pageSize'=>15,
                        ),
                ));

                $this->render('tabs/adminka', array(
                        'file_model'        => $file_model,
                        'filesDataProvider' => $filesDataProvider,
                ));
                
        }

        public function actionNoAccess()
        {
                $this->layout = 'noAccess';
                $this->render('noAccess');
        }
}
