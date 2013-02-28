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
			array('status, name_ru, name_en, surname_ru, surname_en, virgin_surname_ru, virgin_surname_en, otchestvo, sex, citizenship, passport_number, passport_expiration, birth_country, birth_city, email, phone, phone_cz, address, address_cz, father_name_ru, father_name_en, father_surname_ru, father_surname_en, father_email, mother_name_ru, mother_name_en, mother_surname_ru, mother_surname_en, mother_virgin_surname_ru, mother_virgin_surname_en, mother_email, courses_ku_id, manager_id, referent_id', 'required'),

			array('status, sex, citizenship, birth_country, phone_cz, courses_ku_id, manager_id, referent_id', 'numerical', 'integerOnly'=>true),

			array('name_ru, name_en, father_name_ru, father_name_en, mother_name_ru, mother_name_en', 'length', 'max'=>50),
			array('surname_ru, surname_en, virgin_surname_ru, virgin_surname_en, otchestvo, father_surname_ru, father_surname_en, mother_surname_ru, mother_surname_en, mother_virgin_surname_ru, mother_virgin_surname_en', 'length', 'max'=>80),
			array('passport_number, phone, start_date', 'length', 'max'=>30),
			array('passport_expiration', 'length', 'max'=>10),
			array('email, birth_city, father_email, mother_email', 'length', 'max'=>100),
			array('address, address_cz', 'length', 'max'=>250),

                        array('email, mother_email, father_email', 'email'),

			array('id, status, name_en, surname_en, manager_id, referent_id, start_date', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
                        'manager'=>array(self::BELONGS_TO, 'Users', 'manager_id'),
                        'referent'=>array(self::BELONGS_TO, 'Users', 'referent_id'),
                        'birth_country'=>array(self::BELONGS_TO, 'CountryCode', 'birth_country'),
                        'birth_city'=>array(self::BELONGS_TO, 'CityCode', 'birth_city'),
                        'courses_ku'=>array(self::BELONGS_TO, 'CoursesKu', 'courses_ku_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status' => 'Статус',
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
			'passport_expiration' => 'Passport Expiration',
			'birth_country' => 'Страна рождения',
			'birth_city' => 'Город рождения',
			'email' => 'Email',
			'password' => 'Password',
			'phone' => 'Телефон (основной)',
			'phone_cz' => 'Телефон (чешский)',
			'address' => 'Address',
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
			'manager_id' => 'Менеджер',
			'referent_id' => 'Референт',
			'start_date' => 'Добавлен',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('status',$this->status);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('surname_en',$this->surname_en,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('manager_id',$this->manager_id);
		$criteria->compare('referent_id',$this->referent_id);

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
        public function managersAndReferents()
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
        public function getManagerValue($managers, $manager_id)
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
        public function getReferentValue($referents, $referent_id)
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
        public function getStatusValue($status)
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
                        3 => "<span class='status-serverd'>Обслуженный</span>",
                        4 => "<span class='status-rejected'>Отказался</span>",
                );

                return $html ? $arrayHtml : $array;
        }

}
