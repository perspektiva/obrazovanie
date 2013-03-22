<?php

class DormController extends DefaultController
{
        public $modelName = 'Dorm';
        public $admin = true;
        //public $layout = 'back';
        public $createRedirect = array('/dorm/admin');
        public $updateRedirect = array('/dorm/admin');


        public function actionIndex()
        {
                $this->redirect(array('admin'));
        }
}
