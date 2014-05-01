<?php
$this->breadcrumbs=array(
	'Answer Sheet'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Session', 'url'=>array('index')),
	array('label'=>'Create Answer Sheet', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('session-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Answer Sheet</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
        'answerTypeOption'=>$answerTypeOption,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'session-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
			'name'=>'session_id',
                        'header'=>'ID',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
		
		//'exam_id',
                array(
			'name'=>'exam_id',
                        'header'=>'Exam ID',
                        //'value'=> '$data->exam->name',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
		),
		array(
			'name'=>'session_name',
                        'header'=>'คำชี้แจง/คำสั่ง',
			'htmlOptions'=>array('style'=>'text-align: left;'),
		),
                array(
			'name'=>'answer_type_id',
                        'header'=>'ประเภท',
                        'value'=> '$data->answer_type_id',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
		),
		/*array(
			'name'=>'answer_type_id',
                        'header'=>'ประเภท',
                        'value'=> '$data->answer_type->answer_type_name',
			'htmlOptions'=>array('style'=>'text-align: left;width: 150px;'),
		),*/
		array(
			'name'=>'session_order',
                        'header'=>'ตอนที่',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
		),
                array(
			'name'=>'session_total',
                        'header'=>'จำนวน',
			'htmlOptions'=>array('style'=>'text-align: center;width: 50px;'),
		),
		/*
		'session_start',
		'session_end',
		'session_score_total',
		'session_status',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update}&nbsp;&nbsp;{delete}',
		),
	),
)); ?>
