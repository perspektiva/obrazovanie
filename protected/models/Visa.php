<?php

/**
 * This is the model class for table "obr_visa".
 *
 * The followings are the available columns in table 'obr_visa':
 * @property integer $id
 * @property integer $student_id
 * @property integer $send_city
 * @property string $send_date
 */
class Visa extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_visa';
	}

	public function rules()
	{
		return array(
			array('student_id, send_city, send_date', 'required'),
			array('student_id, send_city', 'numerical', 'integerOnly'=>true),
			array('send_date', 'length', 'max'=>20),

			array('id, student_id, send_city, send_date', 'safe', 'on'=>'search'),
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
			'student_id' => 'Student',
			'send_city' => 'Город подачи',
			'send_date' => 'Дата подачи',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('send_city',$this->send_city);
		$criteria->compare('send_date',$this->send_date,true);

		return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'sort'=>array(
                    'defaultOrder'=>'id DESC',
                ),
                'pagination'=>array(
                        'pageSize'=>Yii::app()->user->getState('pageSize',20), 
                ),
		));
	}


        /**
        //================= Caching =================
        protected function afterSave() {
                Yii::app()->cache->set(get_class($this), microtime(true), 0);
                parent::afterSave();
        }


        protected function afterDelete() {
                Yii::app()->cache->set(get_class($this), microtime(true), 0);
                parent::afterDelete();
        }


        protected function beforeFind() {
                $this->cache(3600, new CTagCacheDependency(get_class($this), 'cache'));
                parent::beforeFind();
        }
        //--------------- Caching ----------------
        **/

}
