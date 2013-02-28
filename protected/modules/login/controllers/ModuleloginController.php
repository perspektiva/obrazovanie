<?php

class ModuleloginController extends Controller
{
	public $layout='//layouts/back';

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
                                'actions'=>array('admin', 'index', 'update'),
                                'expression'=>'!$user->isGuest',
			),
			array('allow',
                                'expression'=>'isset($user->isAdmin)',
			),
			array('deny', 
				'users'=>array('*'),
			),
		);
	}


	public function actionCreate()
	{
		$model=new ModuleLogin;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ModuleLogin']))
		{
			$model->attributes=$_POST['ModuleLogin'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

                if ($this->updateAccess($model))
                {
                        throw new CHttpException('006','Not enough James Bond');
                        Yii::app()->end();
                }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ModuleLogin']))
		{
			$model->attributes=$_POST['ModuleLogin'];
			if($model->save())
				$this->redirect(array('admin'));
		}
                $model->pass='';

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionIndex()
	{
                $this->redirect(array('/login/modulelogin/admin'));
	}

	public function actionAdmin()
	{
		$model=new ModuleLogin('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ModuleLogin']))
			$model->attributes=$_GET['ModuleLogin'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=ModuleLogin::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='module-login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

        protected function updateAccess($model)
        {
                if ( (! isset(Yii::app()->user->isAdmin)) AND (Yii::app()->user->name != $model->name) )
                        return true;
                else
                        return false;
        }
}
