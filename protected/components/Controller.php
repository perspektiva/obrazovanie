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

        public $admins_group    = array(11, 13, 18, 14, 19);
        public $referents_group = array(24, 21, 2);


	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
	{
                $isAllowed = $this->_expressionForRules();
                return array(
                        array('allow',
                                'actions'=>array('noAccess'),
                                'users'=>array('*'),
                        ),
                        array('allow',
                                'expression'=>"{$isAllowed}",
                        ),
                        array('deny',
                                'users'=>array('*'),
                        ),
                );
	}

        /**
         * Expression для accessRules 
         * 
         * @return boolean
         */
        private function _expressionForRules()
        {
                if ($_SERVER['HTTP_HOST'] == 'localhost')
                        return true;

                if (! isset($_SESSION['group']))
                        return false;

                if ( in_array($_SESSION['group'], array_merge($this->admins_group, $this->referents_group)) )
                        return true;

                return false;
        }

        /**
         * Показывать или нет "Админка" в верхнем меню 
         * 
         * @return boolean
         */
        public function isAdminkaVisible()
        {
                
                if ($_SERVER['HTTP_HOST'] == 'localhost')
                        return true;

                if (! isset($_SESSION['group']))
                        return false;

                if ( in_array($_SESSION['group'], $this->admins_group) )
                        return true;

                return false;
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
