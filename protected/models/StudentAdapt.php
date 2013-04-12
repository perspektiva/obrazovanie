<?php

/**
 * This is the model class for table "obr_student_adapt".
 *
 * The followings are the available columns in table 'obr_student_adapt':
 * @property integer $id
 * @property integer $student_id
 * @property integer $item_id
 * @property integer $ready
 */
class StudentAdapt extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_student_adapt';
	}

	public function rules()
	{
		return array(
			array('student_id, item_id, ready', 'required'),
			array('student_id, item_id, ready', 'numerical', 'integerOnly'=>true),

                        array('comment, file', 'safe'),

			array('id, student_id, item_id, ready', 'safe', 'on'=>'search'),
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
			'id'         => 'ID',
			'student_id' => 'Student',
			'item_id'    => 'Item',
			'comment'    => 'Комментарий',
			'file'       => 'Файл',
			'ready'      => 'Ready',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('ready',$this->ready);

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
         * Показывает статус для элемента адаптационной программы у этого студента 
         * 
         * @param int $student_id 
         * @param int $item_id 
         * @return boolean
         */
        public static function isItemReady($student_id, $item_id)
        {
                $model = self::model()->findByAttributes(array('student_id'=>$student_id, 'item_id'=>$item_id));
                return ($model AND $model->ready) ? true:false;
        }

        /**
         * Показывает время готовности для элемента адаптационной программы у этого студента 
         * 
         * @param int $student_id 
         * @param int $item_id 
         * @return string
         */
        public static function getItemReadyDate($student_id, $item_id)
        {
                $model = self::model()->findByAttributes(array('student_id'=>$student_id, 'item_id'=>$item_id));
                echo ($model AND $model->ready_date) ? $model->ready_date : '';
        }

        /**
         * Показывает комментарий для элемента адаптационной программы у этого студента 
         * 
         * @param int $student_id 
         * @param int $item_id 
         * @return string
         */
        public static function getItemComment($student_id, $item_id)
        {
                $model = self::model()->findByAttributes(array('student_id'=>$student_id, 'item_id'=>$item_id));

                if ($model AND $model->comment) 
                {
                        echo CHtml::image(Yii::app()->baseUrl.'/css/images/search.png', null, array(
                                'class'=>'comment_lupa', 'title'=>nl2br($model->comment),
                        ));
                }
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
