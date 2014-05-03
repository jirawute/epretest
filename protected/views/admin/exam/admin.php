<?php
/* @var $this ExamController */
/* @var $model Exam */

$this->breadcrumbs=array(
	'Exams'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Exam', 'url'=>array('index')),
	array('label'=>'Create Exam', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#exam-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Exams</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'exam-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'exam_id',
			'header'=>'Exam ID',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
		),
		array(
			'name'=>'name',
			'htmlOptions'=>array('style'=>'text-align: left;'),
		),

		array(
			'name'=> 'subject_id',
			'value'=> '$data->subject->name',
                        'filter'=>CHtml::listData(Subject::model()->findAll('status=1'), 'type_id', 'name'),
		),
                array(
			'name'=> 'type_id',
			'value'=> '$data->type->name',
			'htmlOptions'=>array('style'=>'text-align: left; width: 90px;'),
                        'filter'=>CHtml::listData(Type::model()->findAll('status=1'), 'type_id', 'name'),
		),
		array(
			'name'=> 'level_id',
			'value'=> '$data->level->name',
			'htmlOptions'=>array('style'=>'text-align: left; width: 90px;'),
                        'filter'=>CHtml::listData(Level::model()->findAll('status=1'), 'level_id', 'name'),
		),
		/*
		'credit_required',
		'time_limited',
		'score_total',
		'score_avg',
		'score_max',
		'date_added',
		'sort_order',
		'status',
		*/
		array(
			'name'=> 'status',
			'value'=> '($data->status)? \'Enabled|Hide\' : \'Disabled\'',
			'htmlOptions'=>array('style'=>'text-align: center; width: 60px;'),
                        'filter'=>array('0'=>'0-Disabled','1'=>'1-Enabled','2'=>'2-HideAnswer'),
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}&nbsp;&nbsp;{delete}',
			'headerHtmlOptions'=>array('style'=>'width:40px;'),
      		'htmlOptions' => array('style'=>'width:40px; text-align:center'),
			
		),
	),
)); ?>
