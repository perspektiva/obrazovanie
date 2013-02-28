<?php
class LoginModuleForm extends CFormModel
{
        public $name;
        public $pass;
        public $rememberMe;

        public function rules()
        {
                return array(
                        array('name, pass', 'required'),
			array('rememberMe', 'boolean'),
                        array('pass', 'auth'),
                );
        }

        public function attributeLabels()
        {
                return array(
                        'name'=>Yii::t("LoginModule.login",'Login'),
                        'pass'=>Yii::t("LoginModule.login",'Password'),
                        'rememberMe'=>Yii::t("LoginModule.login",'Remember me'),
                );
        }

        public function auth()
        {
                $user = ModuleLogin::model()->findByAttributes(array(
                        'name' => $this->name,
                        'pass' => md5($this->pass),
                ));

                if ($user)
                {
                        $name = new CUserIdentity($this->name,2);
                        ($user->isadmin == 1) ? $name->setState('isAdmin',1) : '';
                        $duration = $this->rememberMe ? 3600*24*30 : 0; // 30 days
                        Yii::app()->user->login($name, $duration);
                        return true;
                }
                else
                        $this->addError('pass',Yii::t("LoginModule.login",'Wrong login or password'));
        }
}
