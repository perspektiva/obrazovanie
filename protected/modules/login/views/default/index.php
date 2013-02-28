<div id='m_login'>
<div class='form'>
        <?php $form = $this->beginWidget('CActiveForm',array(
                'focus'=>array($model,'name'),
        )) ?>

        <div class='row'>
                <?php echo $form->label($model, 'name') ?>
                <?php echo $form->textField($model, 'name') ?>
                <?php echo $form->error($model, 'name') ?>
        </div>

        <div class='row'>
                <?php echo $form->label($model, 'pass') ?>
                <?php echo $form->textField($model, 'pass') ?>
                <?php echo $form->error($model, 'pass') ?>
        </div>

        <div class='row rememberMe'>
                <?php echo $form->label($model, 'rememberMe') ?>
                <?php echo $form->checkBox($model, 'rememberMe') ?>
        </div>

        <div class='row buttons'>
                <?php echo CHtml::submitButton('Login',array('class'=>'btn span2')) ?>
        </div>

        <?php $this->endWidget() ?>
        
</div>
</div>
