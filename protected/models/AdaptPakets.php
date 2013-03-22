<?php

/**
 * This is the model class for table "obr_adapt_pakets".
 *
 * The followings are the available columns in table 'obr_adapt_pakets':
 * @property integer $id
 * @property string $name
 */
class AdaptPakets extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_adapt_pakets';
	}

	public function rules()
	{
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>255),

			array('id, name', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
                        'items'=>array(self::HAS_MANY, 'AdaptItems', 'paket_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
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
         * Удаляем связанные итемы 
         */
        protected function afterDelete()
        {
                foreach ($this->items as $item) 
                        $item->delete();
                parent::afterDelete();
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
