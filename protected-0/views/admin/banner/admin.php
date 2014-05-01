<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->breadcrumbs=array(
	'Banners'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Banner', 'url'=>array('index')),
	array('label'=>'Create Banner', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#banner-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Banners</h1>

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
	'id'=>'banner-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'banner_id',
			'header'=>'ID',
			'htmlOptions'=>array('style'=>'text-align: center;width: 30px;'),
		),
		array(
			'name'=>'image',
			'type'=>'raw',
			'value'=> 'CHtml::image(Yii::app()->request->baseUrl . "/uploads/banner/" . $data->image, "", array("style"=>"width: 100px;background: white;border:1px solid #999;"))',
			'htmlOptions'=>array('style'=>'text-align: center; width: 120px;height: 60px;'),
                        'filter'=> FALSE,
		),
		'title',
		array(
			'name'=>'group',
			'htmlOptions'=>array('style'=>'text-align: center; width: 100px;'),
                        'filter'=> FALSE,
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
