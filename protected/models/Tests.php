<?php

/**
 * This is the model class for table "obr_tests".
 *
 * The followings are the available columns in table 'obr_tests':
 * @property integer $id
 * @property integer $student_id
 * @property string $test_name
 * @property string $test_date
 * @property integer $max_points
 * @property integer $points
 * @property integer $passed
 */
class Tests extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_tests';
	}

	public function rules()
	{
		return array(
			array('test_name, test_date, max_points, points, passed', 'required'),
			array('max_points, points, passed', 'numerical', 'integerOnly'=>true),
			array('test_name', 'length', 'max'=>255),
			array('test_date', 'length', 'max'=>10),

			array('id, student_id, test_name, test_date, max_points, points', 'safe', 'on'=>'search'),
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
			'test_name' => 'Название теста',
			'test_date' => 'Дата',
			'max_points' => 'Макс. баллов',
			'points' => 'Набрано баллов',
			'passed' => 'Сдал',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('test_name',$this->test_name,true);
		$criteria->compare('test_date',$this->test_date,true);
		$criteria->compare('max_points',$this->max_points);
		$criteria->compare('points',$this->points);

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
