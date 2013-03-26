<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	public $layout='//layouts/main';
	public $menu=array();
	public $breadcrumbs=array();

        /**
         * Передаём значение для layout'a
         *
         * @var string
         */
        public $student_name;

        /**
         * Передаём значение для layout'a
         *
         * @var string
         */
        public $student_surname;

        /**
         * Передаём значение для layout'a
         *
         * @var string
         */
        public $student_status;

        /**
         * Передаём значение для layout'a
         *
         * @var string
         */
        public $student_id;

        public $admins_group    = array(58);
        public $referents_group = array(78);

        //public $admins_group    = array(11, 13, 18, 14, 19);
        //public $referents_group = array(24, 21, 2);


	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
	{
                return array(
                        array('allow',
                                'expression'=>in_array( $_SESSION['group'], array_merge($this->admins_group, $this->referents_group) ),
                        ),
                        array('deny',
                                'users'=>array('*'),
                        ),
                );
	}

        /**
         * Ставим значения для layout'a top_tabs - Иван Сидоров (Потенциальный)
         *
         * Пихать в каждый экшен каждого контроллера кроме тех, где не показывается КОНКРЕТНЫЙ студент (т.е. нет $id)
         * Например:
                        public function filters()
                        {
                                return array(
                                        'paramsForLayout -admin, create, delete',
                                );
                        }
         *
         * @param model Student
         * @return void
         */
        public function filterParamsForLayout($filterChain)
        {
                $student = Student::model()->findByPk((int)$_GET['id']);

                $this->student_name = $student->name_ru;
                $this->student_surname = $student->surname_ru;
                $this->student_id = $student->id;
                $this->student_status = Student::getStatusValue($student->status);

                $filterChain->run();
        }
}
