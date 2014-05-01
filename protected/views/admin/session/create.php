<?php
$this->breadcrumbs=array(
	'Answer Sheet'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Answer Sheet', 'url'=>array('index')),
	array('label'=>'Manage Answer Sheet', 'url'=>array('admin')),
);
?>

<h1>Create Answer Sheet</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'examOption'=>$examOption,'answerTypeOption'=>$answerTypeOption)); ?>