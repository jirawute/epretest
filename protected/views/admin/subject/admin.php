<?php
/* @var $this SubjectController */
/* @var $model Subject */

$this->breadcrumbs=array(
	'Subjects'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Subject', 'url'=>array('index')),
	array('label'=>'Create Subject', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#subject-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Subjects</h1>

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
	'id'=>'subject-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        
	'columns'=>array(
		array(
			'name'=>'subject_id',
			'header'=>'ID',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
		'name',
                array(
			'name'=> 'type_id',
			'value'=> '$data->type->name',
			'htmlOptions'=>array('style'=>'text-align: left; width: 120px;'),
                        'filter'=>CHtml::listData(Type::model()->findAll('status=1'), 'type_id', 'name'),
		),
                array(
			'name'=> 'level_id',
			'value'=> '$data->level->name',
			'htmlOptions'=>array('style'=>'text-align: left; width: 90px;'),
                        'filter'=>CHtml::listData(Level::model()->findAll('status=1'), 'level_id', 'name'),
		),
                array(
			'name'=> 'sort_order',
			'htmlOptions'=>array('style'=>'text-align: center; width: 70px;'),
		),

		array(
			'name'=> 'status',
			'value'=> '($data->status)? \'Enabled\' : \'Disabled\'',
			'htmlOptions'=>array('style'=>'text-align: left; width: 60px;'),
                        'filter'=>array('1'=>'Enabled','0'=>'Disabled'),
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}&nbsp;&nbsp;{delete}',
			'headerHtmlOptions'=>array('style'=>'width:40px;'),
                        'htmlOptions' => array('style'=>'width:40px; text-align:center'),
			
		),
	),
)); ?>
