<?php

/**
 * This is the model class for table "obr_education".
 *
 * The followings are the available columns in table 'obr_education':
 * @property integer $id
 * @property integer $student_id
 * @property string $school_name
 * @property string $school_start
 * @property string $school_end
 * @property string $school_city
 * @property integer $school_type
 * @property string $university_name
 * @property string $university_speciality
 * @property string $university_title
 * @property string $university_start
 * @property string $university_end
 */
class Education extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_education';
	}

	public function rules()
	{
		return array(
			array('student_id, school_name, school_start, school_end, school_city, school_type', 'required'),
			array('student_id, school_type', 'numerical', 'integerOnly'=>true),
			array('school_name, university_name, university_speciality, university_title', 'length', 'max'=>255),
			array('school_start, school_end, university_start, university_end', 'length', 'max'=>20),
			array('school_city', 'length', 'max'=>100),

			array('id, student_id, school_name, school_start, school_end, school_city, school_type, university_name, university_speciality, university_title, university_start, university_end', 'safe', 'on'=>'search'),
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
			'school_name' => 'Название школы',
			'school_start' => 'Дата начала',
			'school_end' => 'Дата окончания',
			'school_city' => 'Город обучения',
			'school_type' => 'Тип школы',
			'university_name' => 'Название университета',
			'university_speciality' => 'Специальность',
			'university_title' => 'Титул',
			'university_start' => 'Дата начала',
			'university_end' => 'Дата окончания',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('school_name',$this->school_name,true);
		$criteria->compare('school_start',$this->school_start,true);
		$criteria->compare('school_end',$this->school_end,true);
		$criteria->compare('school_city',$this->school_city,true);
		$criteria->compare('school_type',$this->school_type);
		$criteria->compare('university_name',$this->university_name,true);
		$criteria->compare('university_speciality',$this->university_speciality,true);
		$criteria->compare('university_title',$this->university_title,true);
		$criteria->compare('university_start',$this->university_start,true);
		$criteria->compare('university_end',$this->university_end,true);

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
