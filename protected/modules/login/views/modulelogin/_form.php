<hr>
<?php if(isset(Yii::app()->user->isAdmin)): ?>
<p class="alert alert-info">
<?php echo Yii::t("LoginModule.settings","Moderators have same rights as Administrators, 
        but cannot create, delete or update another Administrators or Moderators 
        (although they can change they own password)"); ?>
</p>
<?php endif ?>

<div class="form well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'module-login-form',
	'enableAjaxValidation'=>false,
)); ?>

        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('class'=>'span4','maxlength'=>80)); ?>
        <?php echo $form->error($model,'name'); ?>

        <?php echo $form->labelEx($model,'pass'); ?>
        <?php echo $form->textField($model,'pass',array('class'=>'span4','maxlength'=>80)); ?>
        <?php echo $form->error($model,'pass'); ?>

        <?php if(isset(Yii::app()->user->isAdmin)): ?>
		<?php echo $form->label($model,'isadmin'); ?>
                <?php echo $form->dropDownList($model,'isadmin',array(
                        1=>Yii::t("LoginModule.settings",'Administrator'), 0=>Yii::t("LoginModule.settings",'Moderator')
                )); ?>
		<?php echo $form->error($model,'isadmin'); ?>
        <?php endif ?>

        </br></br></br>
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t("LoginModule.settings",'Create') : Yii::t("LoginModule.settings",'Save'),array(
                'class'=>'btn btn-primary span2'
        )); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->
