<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Students</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
        'option_levels'=>$option_levels,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            	array(
			'name'=>'student_id',
			'header'=>'ID',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
                array(
			'name'=>'username',
			'htmlOptions'=>array('style'=>'text-align: left;width: 80px;'),
		),

		'firstname',
		'lastname',
                array(
			'name'=> 'level_id',
			'value'=> '$data->level->name',
			'htmlOptions'=>array('style'=>'text-align: left; width: 90px;'),
                        'filter'=>CHtml::listData(Level::model()->findAll('status=1'), 'level_id', 'name'),
		),
//                array(
//			'name'=>'credit',
//			'htmlOptions'=>array('style'=>'text-align: left;width: 50px;'),
//		),
            	array(
			'name'=> 'status',
			'value'=> '($data->status)? \'Activate\' : \'Deactivate\'',
			'htmlOptions'=>array('style'=>'text-align: left; width: 80px;'),
                        'filter'=>array('1'=>'Activate','0'=>'Deactivate'),
		),
		/*
		
		'email',
		'address',
		'birthday',
		'subject',
		'faculty',
		'phone',
		'image',
		'credit',
		'username',
		'password',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}&nbsp;&nbsp;{delete}',
			'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
		),
	),
)); ?>
