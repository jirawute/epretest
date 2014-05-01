<?php
$this->breadcrumbs=array(
        'Payment',
	'Bank Transfers'=>array('index'),
	$model->inv_id,
);

$this->menu=array(
	array('label'=>'List Bank Transfer', 'url'=>array('index')),
	//array('label'=>'Create Transfer', 'url'=>array('create')),
	//array('label'=>'Update Transfer', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Transfer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Bank Transfer', 'url'=>array('admin')),
);
?>
<script type="text/javascript">
    function ShowData(){
        var inv_id = document.getElementById('inv_id').value;
        var order_id = document.getElementById('order_id').value;
        var student_id = document.getElementById('student_id').value;
        var student_name = document.getElementById('student_name').value;
        var old_credit = document.getElementById('old_credit').value;
        var credit = document.getElementById('credit').value;
        var new_credit = parseInt(old_credit)+ parseInt(credit);
        
        var result= confirm('คุณต้องการเติมเครดิตจำนวน '+credit+' เครดิต ให้กับนักเรียนชื่อ '+
                           student_name+' ใช่หรือไม่?\n'+
                           'เครดิตก่อนเติม : '+old_credit+' เครดิต\n'+
                           'เครดิตหลังเติม : '+new_credit+' เครดิต\n'
                              );
         if (result== true){
              document.forms['transfer-form'].action = "topup";
              document.forms['transfer-form'].submit();
         }else{
             return false;
         }
    }
</script>
<h1>Bank Transfer ID #<?php echo $model->id; ?></h1>

<?php
$bUrl=Yii::app()->baseUrl; //base URL
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'inv_id',
		'name',
		'email',
		'phone',
		'amount',
		'bank',
		'date',
                array(
                    'name'=>'Slip',
                    'type'=>'html',
                    'value'=>CHtml::image('../../uploads/slip/'.$model->images,'Slip'),
                   
                ),
		'detail',
		array(
			'name'=> 'send_email',
			'value'=> ($model->send_email=="Y")? 'Sent' : 'Not Send',
		),
                array(
			'name'=> 'status',
			'value'=> ($model->status=="Y")? 'เติมเครดิตแล้ว' : 'ยังไม่ได้เติม',
		),
	),
     

));

?>
<?php if($model->status=='N' && $model->send_email=='N'){?>
<form name="transfer-form" id="transfer-form" method="post" action="">
    <input type="hidden" name="trans_id" id="trans_id" value="<?php echo $model->id;?>"/>
    <input type="hidden" name="student_id" id="student_id" value="<?php echo $data['student_id'];?>"/>
    <input type="hidden" name="student_name" id="student_name" value="<?php echo $data['firstname']." ".$data['lastname'];?>"/>
    <input type="hidden" name="inv_id" id="inv_id" value="<?php echo $model->inv_id;?>"/>
    <input type="hidden" name="order_id" id="order_id" value="<?php echo $data['order_id']?>"/>
    <input type="hidden" name="old_credit" id="old_credit" value="<?php echo $data['old_credit'];?>"/>
    <input type="hidden" name="credit" id="credit" value="<?php echo $data['credit'];?>"/>
    <p align="center">
        <input type="button" name="btn" id="btn" value="เติมเครดิต และส่งอีเมล์" onclick="ShowData();"/>
    </p>
</form>
<?php }?>
