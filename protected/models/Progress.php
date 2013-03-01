<?php

/**
 * This is the model class for table "obr_progress".
 *
 * The followings are the available columns in table 'obr_progress':
 * @property integer $id
 * @property integer $student_id
 * @property string $missing_subject
 * @property string $missing_date
 * @property string $missing_comment
 * @property string $test_name
 * @property string $test_date
 * @property integer $max_points
 * @property integer $points
 */
class Progress extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_progress';
	}

	public function rules()
	{
		return array(
			array('student_id, missing_subject, missing_date, missing_comment, test_name, test_date, max_points, points', 'required'),
			array('student_id, max_points, points', 'numerical', 'integerOnly'=>true),
			array('missing_subject', 'length', 'max'=>100),
			array('missing_date', 'length', 'max'=>20),
			array('test_name', 'length', 'max'=>255),
			array('test_date', 'length', 'max'=>10),

			array('id, student_id, missing_subject, missing_date, missing_comment, test_name, test_date, max_points, points', 'safe', 'on'=>'search'),
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
			'missing_subject' => 'Пропущенный предмет',
			'missing_date' => 'Дата пропуска',
			'missing_comment' => 'Причина пропуска',
			'test_name' => 'Название теста',
			'test_date' => 'Дата тестирования',
			'max_points' => 'Макс. баллов за тест',
			'points' => 'Набранно баллов за тест',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('missing_subject',$this->missing_subject,true);
		$criteria->compare('missing_date',$this->missing_date,true);
		$criteria->compare('missing_comment',$this->missing_comment,true);
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
