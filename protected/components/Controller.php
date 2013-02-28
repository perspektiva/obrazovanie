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
}
