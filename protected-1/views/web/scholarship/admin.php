
<?php

echo phpinfo();
$this->breadcrumbs=array(
	'Scholarships'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Scholarship', 'url'=>array('index')),
	array('label'=>'Create Scholarship', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('scholarship-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Scholarships</h1>

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
	'id'=>'scholarship-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'scholar_enroll_id',
		'title_th',
		'title_en',
		'name_th',
		'surename_th',
		'name_en',
		/*
		'surename_en',
		'nickname_th',
		'nickname_en',
		'id_card',
		'birthday',
		'age',
		'school',
		'major',
		'address',
		'phone',
		'email',
		'parent_name',
		'parent_phone',
		'disease',
		'talent',
		'language',
		'language_other',
		'travel_abroad_status',
		'travel_abroad_detail',
		'image',
		'portfolio',
		'how_to_know',
		'how_to_know_other',
		'profile',
		'reason',
		'message',
		'scholarship_type',
		'payment_status',
		'payment_method',
		'payment_amount',
		'inv_id',
		'date_created',
		'date_modified',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
