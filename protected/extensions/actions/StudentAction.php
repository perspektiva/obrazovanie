<?php
class StudentAction extends CAction
{
        /**
         * Передаём название модеи, с которой будем работать
         * 
         * @var string
         */
        public $actionModel;


        /**
         * Если 'true', то будет выполняться action update
         * 
         * @var boolean
         */
        public $isUpdate = false;


        /**
         * Опредляем, будет ли это index action или update action
         * 
         * @param int $id 
         * @return void
         */
        public function run($id)
        {
                // название модели для класса и POST (Например: 'Arrival')
                $Bmodel = $this->actionModel;

                // название модели мелкими буквами для всяких аттрибутов (Например: 'arrival' для $student->arrival)
                $model = strtolower($this->actionModel);

                $student = $this->controller->loadModel($id);

                // непосредственно логика
                if ($this->isUpdate)
                        $this->update($id, $model, $Bmodel, $student);
                else
                        $this->index($id, $model, $Bmodel, $student);
        }


        /**
         * Рендерит соответствующую index страничку для вкладки. 
         *
         * Например, если $actionModel = 'Arrival', то рендерит 'views/arrival.php'
         */
        public function index($id, $model, $Bmodel, $student)
        {
                if ($student->$model) 
                {
                        $this->controller->render('tabs/'.$model, array(
                                'model'=>$student->$model,
                        ));
                }
                else 
                {
                        // оставил $arrival просто как пример, что происходит
                        $arrival = new $Bmodel;

                        if (isset($_POST[$Bmodel])) 
                        {
                                $arrival->attributes = $_POST[$Bmodel];
                                $arrival->student_id = $student->id;
                                if ($arrival->save()) 
                                        $this->controller->redirect(array('/student/'.$model, 'id'=>$id));
                        }
                        $this->controller->render('tabs/update'.$Bmodel, array(
                                'model'=>$arrival
                        ));
                }
        }


        /**
         * Рендерит соответствующую update страничку для вкладки. 
         *
         * Например, если $actionModel = 'Arrival', то рендерит 'views/updateArrival.php'
         */
        public function update($id, $model, $Bmodel, $student)
        {
                if (isset($_POST[$Bmodel])) 
                {
                        $student->$model->attributes = $_POST[$Bmodel];
                        if ($student->$model->save()) 
                                $this->controller->redirect(array('/student/'.$model, 'id'=>$id));
                }

                $this->controller->render('tabs/update'.$Bmodel, array(
                        'model'=>$student->$model,
                ));
        }
}
