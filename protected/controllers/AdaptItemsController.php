<?php

class AdaptItemsController extends DefaultController
{
        public $modelName = 'AdaptItems';
        public $admin = true;


        public function actionAdmin()
        {
                if (! isset($_GET['paket_id']))
                        $this->redirect(array('/AdaptPakets/index'));
                parent::actionAdmin();
        }


	public function actionCreate($paket_id)
	{
		$model=new $this->modelName;
                $model->paket_id = $paket_id;

		if(isset($_POST[$this->modelName]))
		{
			$model->attributes=$_POST[$this->modelName];
			if($model->save())
                                $this->redirect(array('/AdaptItems/admin/', 'paket_id'=>$paket_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST[$this->modelName]))
		{
			$model->attributes=$_POST[$this->modelName];
			if($model->save())
                                $this->redirect(array('/AdaptItems/admin/', 'paket_id'=>$model->paket_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
}
