<?php
class Users extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'users';
	}


        public function defaultScope()
        {
                return array(
                        'condition' => "active = 'on'",
                );
        }

}
