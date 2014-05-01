<?php
/* @var $this InformationController */
/* @var $model Information */

$this->breadcrumbs=array(
	'Informations'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Information', 'url'=>array('index')),
	array('label'=>'Create Information', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#information-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Informations</h1>

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
	'id'=>'information-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'information_id',
			'header'=>'ID',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
		array(
			'name'=>'title',
			'htmlOptions'=>array('style'=>'text-align: left;'),
		),
		array(
			'name'=>'user_id',
			'header'=>'Posted by',
			'value'=> '$data->user->username',
			'htmlOptions'=>array('style'=>'text-align: center; width: 90px;'),
                        'filter'=>CHtml::listData(User::model()->findAll('user_group_id <>3'), 'user_id', 'username'),
		),
		array(
			'name'=> 'date_added',
			'header'=> 'Date Created',
			'value'=> 'date(\'j-M-Y\', strtotime($data->date_added))',
			'htmlOptions'=>array('style'=>'text-align: center; width: 90px;'),
                        'filter'=>FALSE,
		),
		array(
			'name'=> 'status',
			'value'=> '($data->status)? \'Enabled\' : \'Disabled\'',
			'htmlOptions'=>array('style'=>'text-align: center; width: 80px;'),
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
