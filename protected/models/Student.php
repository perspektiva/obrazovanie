<?php
class Student extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obr_student';
	}

	public function rules()
	{
		return array(
                        array('status, apostil, arrived, study_year, name_ru, name_en, surname_ru, surname_en, otchestvo, sex, citizenship, passport_number,
                        passport_expiration, birth_country, birth_city, email, phone, phone_cz, address, address_cz, courses_ku_id, adapt_paket_id, manager_id, referent_id, birthday', 
                        'required'),

                        array('status, arrived, sex, citizenship, birth_country, phone_cz, courses_ku_id, adapt_paket_id, need_dorm, dorm_id, manager_id, referent_id', 
                        'numerical', 'integerOnly'=>true),

                        array('name_ru, name_en, father_name_ru, father_name_en, mother_name_ru, mother_name_en', 
                        'length', 'max'=>50),

                        array('surname_ru, surname_en, virgin_surname_ru, virgin_surname_en, otchestvo, father_surname_ru, father_surname_en, 
                        mother_surname_ru, mother_surname_en, mother_virgin_surname_ru, mother_virgin_surname_en', 
                        'length', 'max'=>80),

                        array('passport_number, phone, start_date', 
                        'length', 'max'=>30),

			array('passport_expiration, study_year', 'length', 'max'=>10),
			array('email, birth_city, father_email, mother_email', 'length', 'max'=>100),
			array('address, address_cz', 'length', 'max'=>250),

                        array('email, mother_email, father_email', 'email'),

			array('id, status, name_en, surname_en, manager_id, referent_id, start_date', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
                        'files'=>array(self::MANY_MANY, 'Files', 'obr_student_files(student_id, file_id)'),
                        'post'=>array(self::HAS_MANY, 'Post', 'student_id'),
                        'tests'=>array(self::HAS_MANY, 'Tests', 'student_id'),
                        'missing_subjects'=>array(self::HAS_MANY, 'MissingSubjects', 'student_id'),

                        'arrival'=>array(self::HAS_ONE, 'Arrival', 'student_id'),
                        'visa'=>array(self::HAS_ONE, 'Visa', 'student_id'),
                        'education'=>array(self::HAS_ONE, 'Education', 'student_id'),

                        'adapt_paket'=>array(self::BELONGS_TO, 'AdaptPakets', 'adapt_paket_id'),
                        'manager'=>array(self::BELONGS_TO, 'Users', 'manager_id'),
                        'referent'=>array(self::BELONGS_TO, 'Users', 'referent_id'),
                        'birth_country'=>array(self::BELONGS_TO, 'CountryCode', 'birth_country'),
                        'birth_city'=>array(self::BELONGS_TO, 'CityCode', 'birth_city'),
                        'courses_ku'=>array(self::BELONGS_TO, 'CoursesKu', 'courses_ku_id'),
                        'dorm'=>array(self::BELONGS_TO, 'Dorm', 'dorm_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status' => 'Статус',
			'arrived' => 'Приехал(а)',
			'birthday' => 'День рождения',
			'name_ru' => 'Имя (кириллицей)',
			'name_en' => 'Имя (латиницей)',
			'surname_en' => 'Фамилия (латиницей)',
			'surname_ru' => 'Фамилия (кириллицей)',
			'virgin_surname_ru' => 'Фамилия при рождении (кириллицей)',
			'virgin_surname_en' => 'Фамилия при рождении (латиницей)',
			'otchestvo' => 'Отчество',
			'sex' => 'Пол',
			'citizenship' => 'Гражданство',
			'passport_number' => 'Номер паспорта',
			'passport_expiration' => 'Паспорт истекает',
			'birth_country' => 'Страна рождения',
			'apostil' => 'Нужна апостилизация',
			'birth_city' => 'Город рождения',
			'email' => 'Email',
			'password' => 'Password',
			'phone' => 'Телефон (основной)',
			'phone_cz' => 'Телефон (чешский)',
			'address' => 'Адрес прописки',
			'address_cz' => 'Адрес в Чехии',
			'father_name_ru' => 'Имя отца (кириллицей)',
			'father_name_en' => 'Имя отца (латиницей)',
			'father_surname_ru' => 'Фамилия отца (кириллицей)',
			'father_surname_en' => 'Фамилия отца (латиницей)',
			'father_email' => 'Email отца',
			'mother_name_ru' => 'Имя матери (кириллицей)',
			'mother_name_en' => 'Имя матери (латиницей)',
			'mother_surname_ru' => 'Фамилия матери (кириллицей)',
			'mother_surname_en' => 'Фамилия матери (латиницей)',
			'mother_virgin_surname_ru' => 'Девичья фамилия матери (кириллицей)',
			'mother_virgin_surname_en' => 'Девичья фамилия матери (латницей)',
			'mother_email' => 'Email матери',
			'courses_ku_id' => 'Курсы КУ',
			'need_dorm' => 'Общежитие',
			'dorm_id' => 'Выберите общежитие',
			'adapt_paket_id' => 'Адаптационная программа',
			'manager_id' => 'Менеджер',
			'referent_id' => 'Референт',
			'study_year' => 'Учебный год',
			'start_date' => 'Добавлен',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('status',$this->status);
		$criteria->compare('arrived',$this->arrived);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('surname_en',$this->surname_en,true);
		$criteria->compare('name_ru',$this->name_ru,true);
		$criteria->compare('surname_ru',$this->surname_ru,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('study_year',$this->study_year,true);
		$criteria->compare('manager_id',$this->manager_id);
		$criteria->compare('referent_id',$this->referent_id);
		$criteria->compare('courses_ku_id',$this->courses_ku_id);

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
         * managersAndReferents 
         * 
         * Возвращает объект из массива менеджеров и массива референтов (используется в 'student/admin')
         *
         * @return object
         */
        public static function managersAndReferents()
        {
                $users = Users::model()->findAll(array(
                        'condition'=>'what IN (1,2)',
                        'order'=>'active DESC, name ASC',
                ));
                $managers = array();
                $referents = array();
                foreach ($users as $user) 
                {
                        if ($user->what == 1) 
                                $managers[$user->id] = $user;
                        else 
                                $referents[$user->id] = $user;
                }

                $out = array(
                        'managers'=>$managers,
                        'referents'=>$referents,
                );

                return (object)$out;
        }


        /**
         * getManagerValue 
         *
         * Ищет в массиве менеджера по id и возвращает его имя, если оно есть (для грида)
         * 
         * @param array of objects $managers 
         * @param int $manager_id 
         * @return string
         */
        public static function getManagerValue($managers, $manager_id)
        {
                return (isset($managers[$manager_id])) ? $managers[$manager_id]->name : '';
        }


        /**
         * getReferentValue 
         *
         * Ищет в массиве референта по id и возвращает его имя, если оно есть (для грида)
         * 
         * @param array of objects $referents 
         * @param int $referent_id 
         * @return string
         */
        public static function getReferentValue($referents, $referent_id)
        {
                return (isset($referents[$referent_id])) ? $referents[$referent_id]->name : '';
        }


        /**
         * getStatusValue 
         * 
         * Возвращает значение статуса студента с подсветкой (использует в разных местах)
         *
         * @param int $status 
         * @return string
         */
        public static function getStatusValue($status)
        {
                $array = Student::getStatusArray();
                return $array[$status];
        }


        /**
         * getStatusArray 
         * 
         * Возвращает массив статусов с подсветкой (использует в разных местах)
         * Если $html = false возвращает голый масив без html
         *
         * @param boolean $html
         * @return array
         */
        public function getStatusArray($html = true)
        {
                $array = array(
                        1 => "Потенциальный",
                        2 => "Актуальный",
                        3 => "Обслуженный",
                        4 => "Отказался",
                );

                $arrayHtml = array(
                        1 => "<span class='status-potential'>Потенциальный</span>",
                        2 => "<span class='status-actual'>Актуальный</span>",
                        3 => "<span class='status-served'>Обслуженный</span>",
                        4 => "<span class='status-rejected'>Отказался</span>",
                );

                return $html ? $arrayHtml : $array;
        }


        /**
         * Возвращает путь к папке для загрузки файлов 
         * 
         * @return string
         */
        public static function getUploadDir()
        {
                return Yii::getPathOfAlias('webroot.student_files');
        }


        // =====================================================

        public function beforeSave()
        {
                if (! $this->start_date)
                        $this->start_date = date('d.m.Y');

                if (! $this->password)
                        $this->password = substr( md5(time()), -6 );

                return parent::beforeSave();
        }


        /**
         * Удаляем все связи 
         * 
         * @return void
         */
        public function beforeDelete()
        {
                $student = self::model()->findByPk($this->id);

                $student->arrival->delete();
                $student->visa->delete();
                $student->education->delete();

                foreach ($student->post as $m) 
                        $m->delete();

                foreach ($student->tests as $m) 
                        $m->delete();

                foreach ($student->missing_subjects as $m) 
                        $m->delete();

                foreach ($student->files as $m) 
                        $m->delete();

                return parent::beforeDelete();
        }

}
