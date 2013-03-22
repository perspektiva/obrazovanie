<?php

/**
 * This is the model class for table "obr_student_files".
 *
 * The followings are the available columns in table 'obr_student_files':
 * @property integer $id
 * @property integer $student_id
 * @property integer $file_id
 * @property string $file
 * @property integer $ready
 */
class StudentFiles extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_student_files';
	}

	public function rules()
	{
		return array(
			array('student_id, file_id, file, ready', 'required'),
			array('student_id, file_id, ready', 'numerical', 'integerOnly'=>true),
			array('file', 'length', 'max'=>255),

			array('id, student_id, file_id, file, ready', 'safe', 'on'=>'search'),
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
			'file_id' => 'File',
			'file' => 'File',
			'ready' => 'Ready',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('file_id',$this->file_id);
		$criteria->compare('file',$this->file,true);
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
         * Проверяет, кроме всего прочего, есть ли файл на диске 
         * 
         * @param CActiveRecord $studentFile 
         * @return boolean
         */
        public static function isStudentFileExists($studentFile)
        {
                if ( ! $studentFile OR ! $studentFile->file OR ! file_exists(Student::getUploadDir().'/'.$studentFile->file) )
                        return false;
                else
                        return true;

        }
        

        /**
         * Возвращает Модель связывающей таблицы, если есть хоть какие-то связанные записи в obr_student_files
         * Иначе возвращает "false"
         * Служит как передовой рубеж проверки, есть ли файл документа и готов ли он 
         * 
         * @param Model $student 
         * @param int $file_id 
         * @return mixed  false / CActiveRecord StudentFiles
         */
        public static function isStudentHasFile($student, $file_id)
        {
                foreach ($student->files as $file) 
                {
                        if ($file->id == $file_id)
                                return self::model()->findByPk((int)$file_id);
                }
                return false;
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
