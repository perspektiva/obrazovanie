<?php

class DefaultController extends Controller
{
	public $layout='//layouts/main';
        public $modelName;
        public $ajaxValidation = false;
        public $admin = false;
        public $createRedirect = array();
        public $updateRedirect = array();

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new $this->modelName;

                if ($this->ajaxValidation)
                        $this->performAjaxValidation($model);

		if(isset($_POST[$this->modelName]))
		{
			$model->attributes=$_POST[$this->modelName];
			if($model->save())
                        {
                                if($this->createRedirect)
                                        $this->redirect($this->createRedirect);
                                else
                                        $this->redirect(array('view','id'=>$model->id));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

                if ($this->ajaxValidation)
                        $this->performAjaxValidation($model);

		if(isset($_POST[$this->modelName]))
		{
			$model->attributes=$_POST[$this->modelName];
			if($model->save())
                        {
                                if($this->updateRedirect)
                                        $this->redirect($this->updateRedirect);
                                else
                                        $this->redirect(array('view','id'=>$model->id));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			$this->loadModel($id)->delete();

			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider($this->modelName);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
                if (isset($_GET['pageSize'])) {
                        Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
                        unset($_GET['pageSize']);  
                }

		$model=new $this->modelName('search');
		$model->unsetAttributes();  
		if(isset($_GET[$this->modelName]))
			$model->attributes=$_GET[$this->modelName];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
                $modelName = $this->modelName;
		$model=$modelName::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']===''.strtolower($this->modelName).'-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
