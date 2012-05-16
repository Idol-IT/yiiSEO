<?php
$this->breadcrumbs=array(
	'Yiiseo Urls'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List YiiseoUrl', 'url'=>array('index')),
	array('label'=>'Create YiiseoUrl', 'url'=>array('create')),
	array('label'=>'Update YiiseoUrl', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete YiiseoUrl', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View YiiseoUrl #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'url',
		'language',
	),
)); ?>
