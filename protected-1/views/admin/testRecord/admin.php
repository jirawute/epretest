<?php
$this->breadcrumbs=array(
	'Test Records'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TestRecord', 'url'=>array('index')),
	//array('label'=>'Create TestRecord', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('test-record-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Test Records</h1>

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
	'id'=>'test-record-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            	array(
			'name'=>'test_record_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 90px;'),
		),
            	array(
			'name'=>'exam_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
		),
            	array(
			'name'=>'student_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 60px;'),
		),
            	array(
			'name'=>'score',
			'htmlOptions'=>array('style'=>'text-align: center;width: 70px;'),
		),            
		'date_attended',
		array(
			'name'=>'elapse_time',
                        'header'=>'เวลาที่เหลือ (min.)',
			'htmlOptions'=>array('style'=>'text-align: center;width: 100px;'),
		),  
		/*
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}&nbsp;&nbsp;{delete}',
			'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
			
		),
	),
)); ?>
