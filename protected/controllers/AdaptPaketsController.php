<?php

class AdaptPaketsController extends DefaultController
{
        public $modelName = 'AdaptPakets';
        public $admin = true;
        //public $layout = 'back';
        public $createRedirect = array('/adaptPakets/index');
        public $updateRedirect = array('/adaptPakets/index');


        public function actionIndex()
        {
                $pakets = AdaptPakets::model()->findAll();
                $this->render('index', array(
                        'pakets'=>$pakets,
                ));
        }
}
