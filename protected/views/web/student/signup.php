<div class="grid_10 push_1 login_signup">
        <h2>สมัครสมาชิก</h2>

        <div class="signup_box">

                <div class="signup_normal_box" style="width:300px;padding-bottom:10px;">
                        <!--h3>สมัครสมาชิกแบบพิเศษ</h3--><br/><br/>
                        <div align="center">
                            <input onclick="OpenLink('<?php echo Yii::app()->createUrl('student/extra'); ?>')" type="button" value="สมัครเลย" class="submit_button">
                        </div><br/>
                        <ul>
                                <li>ทำข้อสอบและทราบผลคะแนนสอบ</li>
                                <li>เติมเครดิตผ่านช่องทางต่าง ๆ</li>
                                <li>รับข้อมูลข่าวสารต่าง ๆ ของทางเว็บไซต์</li>
                                <li>รับข้อมูลข่าวสารทุนการศึกษา</li>
                                <li>สามารถสะสมเครดิตเพื่อรับสิทธิพิเศษอื่น ๆ ได้</li>
                                <li>ร่วมสนุกและรับของรางวัลจากทางเว็บไซต์ได้</li>
                                <li>รับสิทธิร่วมกิจกรรมอื่น ๆ ของทางเว็บไซต์</li>
                                <li>สามารถปริ๊นบัตรนักเรียนเพื่อใช้เป็นส่วนลดร้านค้า หรือรับสิทธิพิเศษอื่น ๆ ได้</li>
                        </ul>
                       
                </div>

                <div class="signup_with_facebook_box" style="width:270px;padding-bottom:10px;">
                        <!--h3>สมัครสมาชิกแบบธรรมดา</h3>
                        <div align="center">
                            <input onclick="OpenLink('<?php echo Yii::app()->createUrl('student/create'); ?>')" type="button" value="สมัครเลย" class="submit_button">
                        </div><br/>
                        <ul>
                                <li>ทำข้อสอบและทราบผลคะแนนสอบ</li>
                                <li>เติมเครดิตผ่านช่องทางต่าง ๆ</li>
                                <li>รับข้อมูลข่าวสารต่าง ๆ ของทางเว็บไซต์</li>
                                <li>รับเครดิตเพิ่มจาก Invite Friends (สูงสุด 50 เครดิต)</li>
                        </ul-->
                                    <?php
                                                $key = 'facebook';
                                                $cc = Yii::app()->crugeconnector;
                                                $imagen = CHtml::image($cc->getClientDefaultImage($key));
                                                //echo CHtml::link($imagen,$cc->getClientLoginUrl($key));
                                                $url = $cc->getClientLoginUrl($key);
                                    ?>
                                    <a class="facebook_button" href="<?php echo Yii::app()->createUrl($url[0], array('crugekey'=>$url['crugekey'],'crugemode'=>$url['crugemode'])); ?>">Facebook Login</a>
                                    <ul>
                                            <li>สมัครง่าย ไม่ต้องเสียเวลากรอกข้อมูล</li>
                                            <li>ใช้งานได้ทันที ไม่ต้องกดยืนยันในอีเมล</li>
                                    </ul>
                </div>

        </div>

</div>