<?php

class DefaultController extends Controller
{
        public $layout = 'moduleLogin';

	public function actionIndex()
	{
                $model = new LoginModuleForm;

                if (isset($_POST['LoginModuleForm'])) 
                {
                        $model->attributes = $_POST['LoginModuleForm'];
                        if ($model->validate())
                                $this->redirect(Yii::app()->user->returnUrl);
                }

                $this->render('index',array(
                        'model'=>$model,
                ));
	}

        public function actionEasyInstall()
        {
                if (! in_array('module_login',Yii::app()->db->schema->tableNames))
                {
                        $sql = file_get_contents(Yii::getPathOfAlias('login.data').'/module_login.sql');
                        Yii::app()->db->createCommand($sql)->execute();

                        echo "<div style='width:400px; margin:100 auto;'>";
                        echo '<h3>Table "module_login" succesefully created</h3>';
                        echo "<p>You can start use module ".CHtml::link('Go the manage panel',Yii::app()->createUrl('login/modulelogin/admin'))."</p>";
                        echo '<p>Use "admin/admin" as name/password<p>';
                        echo "</div>";
                }
                else
                        $this->redirect(Yii::app()->createUrl('login/default/index'));
        }


        public function actionLogout()
        {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
        }
}
