<?php
/* @var $this AdminInformationController */
/* @var $model Information */
/* @var $form CActiveForm */
?>

<div class="form" style="padding:0 15px;">
<?php echo CHtml::beginForm('','post', array('name'=>'credit_form')); ?>
	
	<div id="rows">
	
	<?php for($i=1;$i<=count($credit_points);$i++) { ?>
	<div id="credit_point_<?php echo $i; ?>" style="">
		<h3 style="border-bottom: 1px dotted #bbb;margin-top:20px;">Credit Point <?php echo $i; ?></h3>
		
		<div class="row">
			<?php echo CHtml::label('Point','credit_point[credit_point_' . $i . ']'); ?>
			<?php echo CHtml::textField('credit_point[credit_point_' . $i . '][point]', $credit_points[$i-1]['point']) ?>
		</div>
		
		<div class="row">
			<?php echo CHtml::label('Price','credit_point[credit_point_' . $i . '][price]'); ?>
			<?php echo CHtml::textField('credit_point[credit_point_' . $i . '][price]', $credit_points[$i-1]['price']) ?>
		</div>
		
		<div class="row">
			<?php echo CHtml::label('Status','credit_point[credit_point_' . $i . '][status]'); ?>
			<?php echo CHtml::dropDownList('credit_point[credit_point_' . $i . '][status]', $credit_points[$i-1]['status'], array('1'=>'Enabled','0'=>'Disabled')) ?>
		</div>
		
		<div class="row">
			<?php echo CHtml::label('Sort Order','credit_point[credit_point_' . $i . '][sort_order]'); ?>
			<?php echo CHtml::textField('credit_point[credit_point_' . $i . '][sort_order]', $credit_points[$i-1]['sort_order'], array('size'=>5)) ?>
		</div>
		
		<div class="row">
			<div class="button_list">
				<ul><li><?php echo CHtml::link('<span class="icon icon-delete">Remove</span>','javascript:removeRow(' . $i . ');',array('class'=>'red')); ?></li></ul>
			</div>
		</div>
		<br /><br /><br /><br /><br />
	</div>
	<?php } ?>
	</div>
	
	<div class="row">
		<div class="button_list">
			<ul><li><?php echo CHtml::link('<span class="icon icon-add">Add new</span>','javascript:addRow();',array('class'=>'grey')); ?></li></ul>
		</div>
	</div>
	
	<br /><br /><br /><br />
	<div class="row buttons"><?php echo CHtml::submitButton('Save'); ?></div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->	

<script type="text/javascript">
	var row = <?php echo $row ?>;
	
	var html = '<div id="credit_point_' + row + '">';
	
	html += '<h3 style="border-bottom: 1px dotted #bbb;margin-top:20px">Credit Point {row}</h3>';
	
	html += '<div class="row">';
	html += '<?php echo CHtml::label('Point','credit_point[credit_point_{row}]'); ?>';
	html += '<?php echo CHtml::textField('credit_point[credit_point_{row}][point]'); ?>';
	html += '</div>';
	
	html += '<div class="row">';
	html += '<?php echo CHtml::label('Price','credit_point[credit_point_{row}][price]'); ?>';
	html += '<?php echo CHtml::textField('credit_point[credit_point_{row}][price]'); ?>';
	html += '</div>';
	
	html += '<div class="row">';
	html += '<?php echo CHtml::label('Status','credit_point[credit_point_{row}][status]'); ?>';
	html += '<?php echo trim(preg_replace('/\s+/', ' ',CHtml::dropDownList('credit_point[credit_point_{row}][status]', '1', array('1'=>'Enabled','0'=>'Disabled')))); ?>';
	html += '</div>';
	
	html += '<div class="row">';
	html += '<?php echo CHtml::label('Sort Order','credit_point[credit_point_{row}][sort_order]'); ?>';
	html += '<?php echo CHtml::textField('credit_point[credit_point_{row}][sort_order]', '0', array('size'=>5)); ?>';
	html += '</div>';
	
	
	html += '<div class="row">';
	html += '<div class="button_list">';
	html += '<ul><li><?php echo CHtml::link('<span class="icon icon-delete">Remove</span>','javascript:removeRow(' . $i . ');',array('class'=>'red')); ?></li></ul>';
	html += '</div>';
	html += '</div>';
	
	html += '<br /><br /><br /><br /><br />';
	html += '</div>';

	var form = $('#rows');
	
	function addRow() {

		var new_row = html.replace(/{row}/g, row);
		
		$(form).append(new_row);
		
		row++;
	}
	
	function removeRow(index) {
		$('#credit_point_' + index).remove();
	}
	
</script>
