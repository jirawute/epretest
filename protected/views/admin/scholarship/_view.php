<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('scholar_enroll_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->scholar_enroll_id), array('view', 'id'=>$data->scholar_enroll_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('scholar_id')); ?>:</b>
	<?php echo CHtml::encode($data->scholar_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_th')); ?>:</b>
	<?php echo CHtml::encode($data->title_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_en')); ?>:</b>
	<?php echo CHtml::encode($data->title_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_th')); ?>:</b>
	<?php echo CHtml::encode($data->name_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surename_th')); ?>:</b>
	<?php echo CHtml::encode($data->surename_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('surename_en')); ?>:</b>
	<?php echo CHtml::encode($data->surename_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nickname_th')); ?>:</b>
	<?php echo CHtml::encode($data->nickname_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nickname_en')); ?>:</b>
	<?php echo CHtml::encode($data->nickname_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_card')); ?>:</b>
	<?php echo CHtml::encode($data->id_card); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthday')); ?>:</b>
	<?php echo CHtml::encode($data->birthday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('school')); ?>:</b>
	<?php echo CHtml::encode($data->school); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major')); ?>:</b>
	<?php echo CHtml::encode($data->major); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_name')); ?>:</b>
	<?php echo CHtml::encode($data->parent_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_phone')); ?>:</b>
	<?php echo CHtml::encode($data->parent_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disease')); ?>:</b>
	<?php echo CHtml::encode($data->disease); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('talent')); ?>:</b>
	<?php echo CHtml::encode($data->talent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language')); ?>:</b>
	<?php echo CHtml::encode($data->language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language_other')); ?>:</b>
	<?php echo CHtml::encode($data->language_other); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('travel_abroad_status')); ?>:</b>
	<?php echo CHtml::encode($data->travel_abroad_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('travel_abroad_detail')); ?>:</b>
	<?php echo CHtml::encode($data->travel_abroad_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('portfolio')); ?>:</b>
	<?php echo CHtml::encode($data->portfolio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('how_to_know')); ?>:</b>
	<?php echo CHtml::encode($data->how_to_know); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('how_to_know_other')); ?>:</b>
	<?php echo CHtml::encode($data->how_to_know_other); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile')); ?>:</b>
	<?php echo CHtml::encode($data->profile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reason')); ?>:</b>
	<?php echo CHtml::encode($data->reason); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('scholarship_type')); ?>:</b>
	<?php echo CHtml::encode($data->scholarship_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_status')); ?>:</b>
	<?php echo CHtml::encode($data->payment_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_method')); ?>:</b>
	<?php echo CHtml::encode($data->payment_method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_amount')); ?>:</b>
	<?php echo CHtml::encode($data->payment_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inv_id')); ?>:</b>
	<?php echo CHtml::encode($data->inv_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>