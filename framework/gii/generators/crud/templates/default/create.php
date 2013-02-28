<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<h2><?php echo Yii::t("admin","Создание"); ?></h2>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
