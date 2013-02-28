<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<h2><?php echo Yii::t("admin","Просмотр"); ?></h2>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
