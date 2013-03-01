<?php

/**
 * This is the model class for table "obr_arrival".
 *
 * The followings are the available columns in table 'obr_arrival':
 * @property integer $id
 * @property integer $student_id
 * @property integer $transport
 * @property string $arrival_date
 * @property string $arrival_time
 * @property string $reis
 * @property string $phone
 */
class Arrival extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_arrival';
	}

	public function rules()
	{
		return array(
			array('student_id, transport, arrival_date, arrival_time, reis, phone', 'required'),
			array('student_id, transport', 'numerical', 'integerOnly'=>true),
			array('arrival_date', 'length', 'max'=>20),
			array('arrival_time', 'length', 'max'=>5),
			array('reis, phone', 'length', 'max'=>50),

                        array('comments', 'safe'),

			array('id, student_id, transport, arrival_date, arrival_time, reis, phone', 'safe', 'on'=>'search'),
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
			'transport' => 'Тип транспорта',
			'arrival_date' => 'Дата прибытия',
			'arrival_time' => 'Время прибытия',
			'reis' => 'Номер рейса',
			'phone' => 'Телефон',
			'comments' => 'Комментарии',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('transport',$this->transport);
		$criteria->compare('arrival_date',$this->arrival_date,true);
		$criteria->compare('arrival_time',$this->arrival_time,true);
		$criteria->compare('reis',$this->reis,true);
		$criteria->compare('phone',$this->phone,true);

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
         * Возвращает массив типов транспорта для dropDownList 
         * 
         * @return array
         */
        public function getTransportTypes()
        {
                return array(
                        1=>'Самолёт',
                        2=>'Поезд',
                        3=>'Автобус',
                        4=>'Машина',
                );
        }


        /**
         * Вовращает название транспорта
         * 
         * @param int $id
         * @return string
         */
        public function getTransportValue($id)
        {
                $array = Arrival::getTransportTypes();
                return $array[$id];
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
