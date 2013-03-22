<?php

/**
 * This is the model class for table "obr_missing_subjects".
 *
 * The followings are the available columns in table 'obr_missing_subjects':
 * @property integer $id
 * @property integer $student_id
 * @property string $missing_subject
 * @property string $missing_date
 * @property string $missing_comment
 */
class MissingSubjects extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_missing_subjects';
	}

	public function rules()
	{
		return array(
                        array('missing_subject, missing_date', 'required', 'on'=>array('progress')),
			array('missing_subject', 'length', 'max'=>100),
			array('missing_date', 'length', 'max'=>20),

			array('id, missing_subject, missing_date, missing_comment', 'safe', 'on'=>'search'),
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
			'missing_subject' => 'Название пропущенного предмета',
			'missing_date' => 'Дата пропуска',
			'missing_comment' => 'Комментарий студента',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('missing_subject',$this->missing_subject,true);
		$criteria->compare('missing_date',$this->missing_date,true);
		$criteria->compare('missing_comment',$this->missing_comment,true);

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
