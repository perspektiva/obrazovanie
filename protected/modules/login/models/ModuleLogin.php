<?php

/**
 * This is the model class for table "module_login".
 *
 * The followings are the available columns in table 'module_login':
 * @property integer $id
 * @property string $name
 * @property string $pass
 * @property integer $isadmin
 */
class ModuleLogin extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'module_login';
	}

	public function rules()
	{
		return array(
			array('name, pass, isadmin', 'required'),
                        array('name', 'unique'),
			array('isadmin', 'numerical', 'integerOnly'=>true),
			array('name, pass', 'length', 'max'=>80),

			array('id, name, isadmin', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => Yii::t("LoginModule.settings","Name"),
			'pass' => Yii::t("LoginModule.settings",'Password'),
			'isadmin' => Yii::t("LoginModule.settings",'Role'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('isadmin',$this->isadmin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        protected function beforeDelete()
        {
                if(count(ModuleLogin::model()->findAll()) == 1)
                        return false;
                return parent::beforeDelete();
        }

        protected function beforeSave()
        {
                // additional barrier against smart and evil Moderators
                if (! isset(Yii::app()->user->isAdmin))
                        $this->isadmin = 0;

                $this->pass=md5($this->pass);
                return parent::beforeSave();
        }


        public function getAdmin($isadmin)
        {
                return ($isadmin == 1) ? Yii::t("LoginModule.settings",'Administrator') : Yii::t("LoginModule.settings",'Moderator');
        }


        public function getAdmins()
        {
               return array(
                    array('id'=>'1', 'title'=>Yii::t("LoginModule.settings",'Administrator')),
                    array('id'=>'0', 'title'=>Yii::t("LoginModule.settings",'Moderator')),
                ); 
        }
}
