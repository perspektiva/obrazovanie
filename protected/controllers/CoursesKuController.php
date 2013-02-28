<?php

class CoursesKuController extends DefaultController
{
        public $modelName = 'CoursesKu';
        public $admin = true;
        //public $layout = 'back';
        public $createRedirect = array('/coursesKu/admin');
        public $updateRedirect = array('/coursesKu/admin');
}
