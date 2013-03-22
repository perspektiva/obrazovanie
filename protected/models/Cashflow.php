<?php

/**
 * This is the model class for table "cashflow".
 *
 * The followings are the available columns in table 'cashflow':
 * @property integer $id
 * @property string $sro
 * @property string $storno
 * @property integer $zl
 * @property integer $student_id
 * @property string $mena
 * @property string $datum
 * @property string $usluga
 * @property integer $castka
 * @property string $realizovano
 */
class Cashflow extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'cashflow';
	}

	public function rules()
	{
		return array(
			array('sro, storno, zl, student_id, mena, datum, usluga, castka, realizovano', 'required'),
			array('zl, student_id, castka', 'numerical', 'integerOnly'=>true),
			array('mena', 'length', 'max'=>10),
			array('datum', 'length', 'max'=>15),
			array('usluga', 'length', 'max'=>100),
			array('realizovano', 'length', 'max'=>3),

			array('id, sro, storno, zl, student_id, mena, datum, usluga, castka, realizovano', 'safe', 'on'=>'search'),
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
			'sro' => 'Sro',
			'storno' => 'Storno',
			'zl' => 'Zl',
			'student_id' => 'Student',
			'mena' => 'Mena',
			'datum' => 'Datum',
			'usluga' => 'Usluga',
			'castka' => 'Castka',
			'realizovano' => 'Realizovano',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('sro',$this->sro,true);
		$criteria->compare('storno',$this->storno,true);
		$criteria->compare('zl',$this->zl);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('mena',$this->mena,true);
		$criteria->compare('datum',$this->datum,true);
		$criteria->compare('usluga',$this->usluga,true);
		$criteria->compare('castka',$this->castka);
		$criteria->compare('realizovano',$this->realizovano,true);

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
