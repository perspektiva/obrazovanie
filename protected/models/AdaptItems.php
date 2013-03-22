<?php

/**
 * This is the model class for table "obr_adapt_items".
 *
 * The followings are the available columns in table 'obr_adapt_items':
 * @property integer $id
 * @property integer $paket_id
 * @property integer $before
 * @property string $name
 */
class AdaptItems extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_adapt_items';
	}

	public function rules()
	{
		return array(
			array('before, name', 'required'),
			array('paket_id, before', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),

			array('id, paket_id, before, name', 'safe', 'on'=>'search'),
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
			'paket_id' => 'Paket',
			'before' => 'До/после приезда',
			'name' => 'Название',
			'ready' => 'Ready',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('paket_id',$_GET['paket_id']);
		$criteria->compare('t.before',$this->before);
		$criteria->compare('name',$this->name,true);

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
