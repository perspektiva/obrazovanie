<?php

/**
 * This is the model class for table "obr_post".
 *
 * The followings are the available columns in table 'obr_post':
 * @property integer $id
 * @property integer $student_id
 * @property string $date
 * @property integer $direction
 * @property string $number
 * @property string $comment
 * @property string $docs
 */
class Post extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_post';
	}

	public function rules()
	{
		return array(
			array('date, direction, number, docs', 'required'),
			array('direction', 'numerical', 'integerOnly'=>true),
			array('number', 'length', 'max'=>50),
                        array('comment', 'safe'),

			array('id, student_id, date, direction, number, comment, docs', 'safe', 'on'=>'search'),
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
			'date' => 'Дата',
			'direction' => 'Входящая/исходящая',
			'number' => 'Номер посылки',
			'comment' => 'Комментарий',
			'docs' => 'Список документов',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('direction',$this->direction);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('docs',$this->docs,true);

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
