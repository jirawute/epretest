<?php
/* @var $this AdminInformationController */
/* @var $model Information */
/* @var $form CActiveForm */
?>

<div class="form" style="padding:0 15px;">
<?php echo CHtml::beginForm('','post', array('name'=>'coupon_form')); ?>
<table id="table">
<tr>
	<th>Bar Code</th>
	<th>Point</th>
	<th style="width: 60px;">Status</th>
	<th style="width: 80px;">Action</th>
</tr>
<?php for($i=1;$i<=count($coupons);$i++) { ?>
<tr id="coupon_' <?php echo $i; ?>'">
	<td><?php echo CHtml::textField('coupon[coupon_' . $i . '][code]', $coupons[$i-1]['code']) ?></td>
	<td><?php echo CHtml::textField('coupon[coupon_' . $i . '][point]', $coupons[$i-1]['point']) ?></td>
	<td><?php echo CHtml::hiddenField('coupon[coupon_' . $i . '][status]', $coupons[$i-1]['status']) ?><?php echo ($coupons[$i-1]['status'] == 1)?  'Unused' : 'Used'; ?></td>
	<td><?php echo CHtml::link('<span class="icon icon-delete">Remove</span>','javascript:removeRow(' . $i . ');'); ?></td>
</tr>
<?php } ?>
</table>

<div class="row"><?php echo CHtml::link('<span class="icon icon-add">Add new</span>','javascript:addRow();'); ?></div>

<div class="row buttons">
	<?php echo CHtml::submitButton('Save',array('name'=>'coupon_submit')); ?>
</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->	

<script type="text/javascript">
	var row = <?php echo $row ?>;
	
	var html = '';
	
	html += '<tr id="coupon_' + row + '">';
	html += '<td><?php echo CHtml::textField('coupon[coupon_{row}][code]','',array('readonly'=>'readonly')); ?></td>';
	html += '<td><?php echo CHtml::textField('coupon[coupon_{row}][point]'); ?></td>';
	html += '<td><?php echo CHtml::hiddenField('coupon[coupon_{row}][status]', '1'); ?>Unused</td>';
	html += '<td><?php echo CHtml::link('<span class="icon icon-delete">Remove</span>','javascript:removeRow(' . $i . ');'); ?></td>';
	html += '</tr>';

	var form = $('#table');
	
	function addRow() {

		var new_row = html.replace(/{row}/g, row);
		
		$(form).append(new_row);
		
		row++;
	}
	
	function removeRow(index) {
		$('#coupon_' + index).remove();
	}
	
</script>