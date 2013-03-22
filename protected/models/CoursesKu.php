<?php

/**
 * This is the model class for table "obr_courses_ku".
 *
 * The followings are the available columns in table 'obr_courses_ku':
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property string $duration_from
 * @property string $duration_to
 * @property string $srok_podachi
 */
class CoursesKu extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_courses_ku';
	}

	public function rules()
	{
		return array(
			array('name, price, duration_from, duration_to, srok_podachi', 'required'),
			array('name', 'length', 'max'=>250),
			array('price, duration_from, duration_to, srok_podachi', 'length', 'max'=>20),

			array('id, name, price, duration_from, duration_to, srok_podachi', 'safe', 'on'=>'search'),
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
			'name' => 'Название',
			'price' => 'Цена',
			'duration_from' => 'От',
			'duration_to' => 'До',
			'srok_podachi' => 'Срок подачи',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('duration_from',$this->duration_from,true);
		$criteria->compare('duration_to',$this->duration_to,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('srok_podachi',$this->srok_podachi,true);

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
