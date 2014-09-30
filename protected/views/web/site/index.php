<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!-- Top Banner -->
<div class="ads">
	<ul id="ads_carousel" class="jcarousel-skin-estudio">
		<?php foreach($top_banners as $top_banner) { ?>
			<li><a href="<?php echo $top_banner->link; ?>" alt="<?php echo $top_banner->title; ?>"><?php echo CHtml::image(Yii::app()->baseUrl . '/uploads/banner/' . $top_banner->image); ?></a></li>
		<?php } ?>
	</ul>
</div>

<div class="clear"></div><!-- close Top Banner -->



<!-- Hall of Frames -->
<div class="grid_12 title_bar">
	<span class="before"></span>
	<h2>คลังข้อสอบ</h2>
	<span class="after"></span>
</div>

<div class="clear"></div>
<?php foreach($levels as $level) { ?>
<div class="grid_4 col1 list_subject">

	<h3>ชุดข้อสอบ</h3>

	<div class="menu_tab_home">
		<a class="selected">แอดมิดชัน</a>
		<a>บุคคลทั่วไป</a>
	</div>

	<ul class="menu_list menu_tab1">
            <?php
                $level_id = $level->level_id;
                $type_criteria = new CDbCriteria();
		$type_criteria->select = '*';
		/*$type_criteria->condition = 'status=:status AND level_id=:level_id AND exam_type=:exam_type';
		$type_criteria->params=array(':status'=>1,':level_id'=>$level_id,':exam_type'=>'Exam');
		*/$type_criteria->order='sort_order';
		$Types = Type::model()->findAll($type_criteria);?>

               <?php foreach($Types  as $type) { ?>
		<li>
			<span><?php echo $type->name;?></span>
			<ul>
                            <?php
                                $type_id = $type->type_id;
                                $sub_criteria = new CDbCriteria();
                                $sub_criteria->select = '*';
                                $sub_criteria->condition = 'status=:status AND level_id=:level_id AND type_id=:type_id';
                                $sub_criteria->params=array(':status'=>1,':level_id'=>$level_id,':type_id'=>$type_id);
                                $sub_criteria->order='sort_order';
                                $Subjects = Subject::model()->findAll($sub_criteria);
                            ?>
                            <?php foreach($Subjects  as $Subject) { ?>
                                <li style="float:left"><a href="<?php echo Yii::app()->createUrl('student/view');?>"><?php echo $Subject->name;?><?php if($Subject->show_new==1){?><span>NEW</span><?php }else if ($Subject->show_new==2) {?><span class="hot">HOT</span><?php }?></a></li>
                            <?php } ?>
			</ul>
		</li>
                <?php } ?>

	</ul>

	<ul class="menu_list menu_tab2">
            <?php
                $level_id = $level->level_id;
                $type_criteria = new CDbCriteria();
		$type_criteria->select = '*';
		$type_criteria->condition = 'status=:status AND level_id=:level_id ';
		$type_criteria->params=array(':status'=>1,':level_id'=>14);
		$type_criteria->order='sort_order';
		$Types = Type::model()->findAll($type_criteria);?>

               <?php foreach($Types  as $type) { ?>
		<li>
			<span><?php echo $type->name;?></span>
			<ul>
                            <?php
                                $type_id = $type->type_id;
                                $sub_criteria = new CDbCriteria();
                                $sub_criteria->select = '*';
                                $sub_criteria->condition = 'status=:status AND level_id=:level_id AND type_id=:type_id';
                                $sub_criteria->params=array(':status'=>1,':level_id'=>$level_id,':type_id'=>$type_id);
                                $sub_criteria->order='sort_order';
                                $Subjects = Subject::model()->findAll($sub_criteria);
                            ?>
                            <?php foreach($Subjects  as $Subject) { ?>
				<li style="float:left"><a href="<?php echo Yii::app()->createUrl('student/view', array('type'=>$type->type_id,'level'=>$level_id,'subject'=>$Subject->subject_id));?>"><?php echo $Subject->name;?><?php if($Subject->show_new==1){?><span>NEW</span><?php } ?></a></li>
                            <?php } ?>
			</ul>
		</li>
                <?php } ?>

	</ul>

	<h4>ผู้ได้รับคะแนนสูงสุด</h4>
        <?php
            $std = new TestRecord();
            $top_std = $std->getTopStudentByLevel($level_id);
            $total = strval($top_std['total']);
            $score = array();

            $score = explode('.',$total);
            foreach($score as $value){}
            if($value=='00'){
                $total_score = number_format($top_std['total']);
            }else{
                $total_score = $top_std['total'];
            }

        ?>

	<div class="tops_profile">

		<div class="tops_pic_student">
                    <?php if($top_std['image']){?>
			<img src="uploads/student/<?php echo $top_std['image'];?>" style="width:72px"/>
                    <?php }else{ ?>
                        <img src="images/web/nopic.png" style="width:72px"/>
                    <?php } ?>
		</div>

		<div class="tops_profile_student">
			<h3><?php echo $top_std['firstname']." ".$top_std['lastname'];?></h3>
			<p class="school">โรงเรียน: <?php echo $top_std['school'];?></p>
			<p class="point">คะแนนรวม: <?php echo $total_score;?></p>
			<a href="<?php echo Yii::app()->createUrl('student/viewall', array('level_id'=>$level_id));?>" class="view_student">ดูทั้งหมด</a>
		</div>

	</div>
</div>
<?php } ?>

<div class="clear"></div><!-- Hall of Fames -->
<!--เริ่มตะลุย-->

<div class="go_signup">
	<a href="<?php echo Yii::app()->createUrl('student/view') ?>">เริ่มตะลุยโจทย์!</a>
	<hr>
</div>

<div class="clear"></div>
<!-- 3 Step easy -->
<div class="grid_12 title_bar">
	<span class="before"></span>
	<h2>ทำข้อสอบได้ง่ายๆ ใน 3 ขั้นตอน</h2>
	<span class="after"></span>
</div>

<div class="clear"></div>

<div class="grid12 box_3step">
	<div class="box_3step_block one">
		<div class="number num1"></div>
            <!--a class="fancybox" rel="group" href="./images/popup_promotion.gif"-->
		<div class="pic_orange one_o"></div>
		<div class="pic_black one_b"></div></a>
		<h4>เติม</h4>
	</div>
	<div class="arrow a_1"></div>
	<div class="box_3step_block two">
		<div class="number num2"></div>
		<div class="pic_orange two_o"></div>
		<div class="pic_black two_b"></div>
		<h4>เลือก</h4>
	</div>
	<div class="arrow a_2"></div>
	<div class="box_3step_block three">
		<div class="number num3"></div>
		<div class="pic_orange three_o"></div>
		<div class="pic_black three_b"></div>
		<h4>ทำ</h4>
	</div>
	<div class="clear"></div>
	<div class="box_3step_description one">
		<p class="oneline_description">ชำระเงินผ่านช่องทางต่างๆ ของเรา</p>
	</div>
	<div class="box_3step_description two">
            <p class="oneline_description">เลือกข้อสอบจากคลังข้อสอบของเรา</p>
		
	</div>
	<div class="box_3step_description three">
            <p class="oneline_description">ลงมือทำ<h1>ข้อสอบ</h1></p>
		
	</div>
</div>

<div class="clear"></div><!-- close 3 Step easy -->

<div class="ads" align="center"><br/>
<iframe width="100%" height="450"  src="http://www.youtube.com/embed/z-ZFpbpLuhc" frameborder="0" allowfullscreen></iframe>
</div>

<!-- Information -->
<div class="grid_12 title_bar">
	<span class="before"></span>
	<h2>สาระน่ารู้</h2>
	<span class="after"></span>
</div>

<div class="news_box">
	<?php foreach($informations as $information) { ?>
	<div class="grid_3">
		<div class="news">
                <?php if($information->image){?>
		<a href="<?php echo Yii::app()->createUrl('information/view', array('id'=>$information->information_id)) ?>"><?php echo CHtml::image(Yii::app()->baseUrl . '/uploads/information/' . $information->image, $information->title, array('class'=>'news_pic','width'=>220,'height'=>220)); ?></a>
                <?php }else{?>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/web/no-pic.jpg" width="220" height="220" border="0"/>
                <?php }?>
                <p class="news_desc" style="height:250px"><?php echo $information->description; ?></hp>
                
		<!--h3 class="news_title" style="height:100px"><a href="<?php echo Yii::app()->createUrl('information/view', array('id'=>$information->information_id)) ?>"><?php echo $information->title; ?></a></h3-->
		<p class="news_timestamp"><?php echo date('j F Y', strtotime($information->date_added)); ?></p>
		<p class="readmore"><a href="<?php echo Yii::app()->createUrl('information/view', array('id'=>$information->information_id)) ?>">อ่านต่อ...</a></p>
		</div>
	</div>
	<?php } ?>
</div>

<div class="clear"></div>

<div class="go_news"><a href="<?php echo Yii::app()->createUrl('information') ?>">ดูทั้งหมด</a></div>

<div class="clear"></div><!-- close Information -->

<!-- Bottom Banner -->
<hr class="hr_dot">

<div class="partner">
	<ul id="school_carousel" class="jcarousel-skin-estudio">
		<?php foreach($bottom_banners as $bottom_banner) { ?>
			<li><a href="<?php echo $bottom_banner->link; ?>" title="<?php echo $bottom_banner->title; ?>"><?php echo CHtml::image(Yii::app()->baseUrl . '/uploads/banner/' . $bottom_banner->image,$bottom_banner->title, array('width'=>154,'height'=>120) ); ?></a></li>
		<?php } ?>
	</ul>
</div>

<hr class="hr_dot"><!-- close Bottom Banner -->


<script type="text/javascript">

	$("#ads_carousel").jcarousel({
		scroll: 1,
		auto: 4,
		wrap: 'last'
	});

	$("#school_carousel").jcarousel({
		scroll: 5,
		auto: 4,
		wrap: 'last'
	});

	$(".ellipsis").ellipsis();

</script>