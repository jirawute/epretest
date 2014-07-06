<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <meta http-equiv="content-language" content="th" />
        <meta name="description" content="e-pretest คลังข้อสอบออนไลน์ รวบรวมข้อสอบเข้ามหาวิทยาลัย (Admissions) ทั้ง O-net, GAT, PAT, 7 วิชาสามัญ และแบบฝึกหัดข้อสอบภาษาต่าง ๆ " />
        <meta name="keywords" content="ข้อสอบ o net, สอบ o net , o-net, โอเน็ต, ข้อสอบโอเน็ต, GAT PAT, สอบ GAT PAT, ข้อสอบ GAT PAT, 7 วิชาสามัญ, 7 วิชา, 7 สามัญ, วิชา สามัญ, สอบ 7 วิชา, วิชา 7 สามัญ, ข้อสอบออนไลน์, เตรียมสอบ, แอดมินชั่น, Admissions" />
        <meta name="robots" content="index,follow" />
        <meta name="author" content="E-pretest.com" />
        <link rel="image_src" href="http://www.e-pretest.com/images/web/logo.png" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/960.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/font.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/carousel/skin.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/custom.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/apprise.css">

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/less-1.3.3.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/selectivizr-min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ellipsis.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/apprise-1.5.full.js"></script>
        <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>
        <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>

        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-41611206-2']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                showPDF();
            });
            function OpenLink(url) {
                document.location.href = url;
            }
            ;
            function ChangeRadioLabel(textValue, id) {
                document.getElementById('append_' + id).innerHTML = textValue.value;
            }
        </script>


    </head>

    <body>
        <div class="container_12"onmousedown="return false" ><!--lock whole sheet to prevent copy-->
<?php if (Yii::app()->user->isGuest) { ?>
                <div id="header" class="grid_12">

                    <h1 class="logo"><a href="index.php">eStudio</a></h1>

                    <div class="home_menu">

                        <div class="aboutus">

                            <ul class="aboutus_nav">
                                <li><a href="javascript:void(0);">About Us</a>

                                    <ul>
                                        <li><a href="<?php echo Yii::app()->createUrl('site/page', array('view' => 'about')); ?>">เราคือ?</a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl('site/page', array('view' => 'teacher')); ?>">อาจารย์ออกข้อสอบ</a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>">ติดต่อเรา</a></li>
                                    </ul>

                                </li>
                            </ul>

                        </div>

                        <form name="frmLoginUser" id="frmLoginUser" method="post" action="?r=site/checklogin">
                            <div class="form">

                                <div class="name_box">
                                    <p>ชื่อผู้ใช้ / อีเมล์:</p>
                                    <!-- text field -->
                                    <input type="text" name="LoginForm[username]" id="username" size="50" />

                                </div>

                                <div class="password_box">
                                    <p>รหัสผ่าน:</p>
                                    <!-- password field -->
                                    <input type="password" name="LoginForm[password]" id="password" /><br />

                                    <!-- hidden field -->
                                    <input type="hidden" name="LoginForm[hddnValue]" id="hddnValue" value="login" />
                                </div>

                                <div class="clear"></div>

                                <p>
                                    <input type="checkbox" name="chkRemember" id="chkRemember" />
                                    <label for="chkRemember">จำรหัสผ่าน</label>
                                    <a href="<?php echo Yii::app()->createUrl('site/forgetpassword'); ?>">ลืมรหัสผ่าน</a>
                                </p>

                            </div>

                            <div class="button">

                                <input type="submit" value="Login" name="btn_login" id="login" onclick="OpenLink('?r=site/checklogin')" />
                                <input type="button" value="Sign Up" name="btn_signup" id="signup" onclick="OpenLink('?r=student/signup')" />

                            </div>
                        </form>
                    </div>
                </div>
            <?php
            } else {
                $student = Student::model()->findByPk(Yii::app()->user->id);
                $exam_id =  $_GET['id'];
                $exam = Exam::model()->findByPk($exam_id);
                
                if($exam['status']==1){//show detail only if exam status =1
                $student_id = $student->student_id;
                $testRecoed = new TestRecord;

                $row = $testRecoed->getTestRecordDetailByStudentIdExamId($student_id, $exam_id);
                $test_static = $testRecoed->getTestRecordDetailByExamId($exam_id);
                

                /* Find Rank by exam_id and student_id */
                $test_all = $testRecoed->getAllTestRecordByExamId($exam_id);
                foreach ($test_all as $key => $static) {
                    if ($student_id == $static['student_id']) {
                        $test_rank = ($key + 1);
                    } else {
                        $test_rank = ($key);
                    }
                }
//                            echo "<br> ===> ";
//                            echo "<pre>";
//                            print_r($test_all);
//                            echo "</pre>";
//                            echo $test_rank;
                $score = explode('.', $row['score']);
                foreach ($score as $value) {
                    
                }
                if ($value == '00') {
                    $score = number_format($row['score']);
                } else {
                    $score = $row['score'];
                }
                }
                ?>
                <div id="header" class="grid_12 do_exercise">

                    <div class="point_detail">
                        <div class="box">คะแนนเฉลี่ย : <?php $exam_id; echo number_format($test_static['score_avg']); ?></div>
                        <div class="box">คะแนนสูงสุด : <?php echo number_format($test_static['score_max']); ?></div>
                        <div class="box">คุณได้ลำดับที่ : <?php echo $test_rank; ?></div>
                        <div class="box">จากผู้เข้าสอบทั้งหมด : <?php echo number_format($test_static['student_total']); ?> คน</div>
                    </div>
                    <div style="float:left;margin:10px">
                        <!--<a name="fb_share" type="button" share_url="http://www.e-pretest.com/fbsharepage.php">Share Facebook</a>-->
                        <!--<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php"  share_url="http://www.e-pretest.com/index.php?r=exam/answer&id=10">Share</a>-->
    <?php
    $parm = $exam_id . "-" . $score . "-" . intval($exam->score_total) . "-" . $test_rank . "-" . $test_static['student_total'];
    $url = "www.e-pretest.com/fbsharescore.php?parm=" . $parm;
    //echo $url;
    ?>
                        <script type="text/javascript">
                function fbshare()
                {
                    window.open("http://www.facebook.com/share.php?u=<?php echo $url ?>", "Facebook_Share", "menubar=1,resizable=1,width=600,height=400");
                    //window.open("http://www.javascript-coder.com","mywindow","menubar=1,resizable=1,width=900,height=500");
                }
                        </script>
                        <a href="javascript:fbshare()">
                            <img src="http://www.e-pretest.com/images/web/facebook.png" />
                        </a>
                    </div>
                    <div class="time_countdown time_countdown_mini_long">                                    
                        <div class="time_text"><span class="point">คะแนนที่ได้:</span><?php echo  $score . "/" . intval($exam->score_total); ?></div>
                    </div>

                </div>
<?php } ?>




            <div class="clear"></div>

            <div id="content" class="grid_12 do_exercise_window"><?php echo $content; ?></div>

            <div class="clear"></div>

        </div>

        <div id="footer">

            <div class="container_12">

                <div class="grid_3 logo_footer" style="width:150px;">
                    <h1>eStudio</h1>
                </div>
                <div class="grid_3 contact">
                    <h2>ติดต่อเรา</h2>
                    <p>
                        บริษัท เอ็ดดูเคชั่น สตูดิโอ จำกัด<br/>
                        159/40 ถนนสุขุมวิท 21 (อาคารเสริมมิตร) <br/>
                        แขวงคลองเตยเหนือ เขตวัฒนา กรุงเทพฯ 10110<br/>
                        Tel: +66 2 665 7445<br/>
                        Fax: +66 2 665 7405<br/>
                        Email : epretest@e-studio.co.th
                    </p>
                </div>

                <div class="grid_3 sitemap">
                    <h2>แผนผังเว็บไซต์</h2>
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('site/page', array('view' => 'about')); ?>">เราคือ?</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('site/page', array('view' => 'teacher')); ?>">อาจารย์ออกข้อสอบ</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('payment'); ?>">เติมเครดิต</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>">ติดต่อเรา</a></li>
                    </ul>
                </div>
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
                <div class="social">
                    <div class="fb-like-box" data-href="https://www.facebook.com/estudiothailand" data-width="290" data-height="192" data-show-faces="true" data-stream="false" data-border-color="#cccccc" data-header="false"></div>
                </div>

            </div>

        </div>

        <script>

            (function() {
                function stuffForRezieAndReady() {
                    $(".question_content").height(Math.floor($(window).height() * 77 / 100));

                    $(".answer_content").height(Math.floor($(window).height() * 77 / 100 - 60));

                    $(function() {
                        var minHeight = Math.floor($(window).height() - 370);
                        $('#content').css({'min-height': minHeight});
                    });
                }

                $(window).on("resize", stuffForRezieAndReady);
                $(document).on("ready", stuffForRezieAndReady);

            })();

            $(".answer_content > ul").children("li:odd").css("background", "#e8e8e8");

//	$(function(){
//		$("h2.profile_name").each(function(i){
//			len=$(this).text().length;
//			if(len>18)
//			{
//				$(this).text($(this).text().substr(0,18)+'...');
//			}
//		});
//	});

            $(".menu_test ul.menu_list li ul li a").click(function() {
                $(".list_test > .list_test_unselect").hide();
                $(".list_test > .list_test_box").css({visibility: "visible"});
                $(".menu_test ul.menu_list li ul li a").removeAttr('style');
                $(this).css("background", "#ff9c00");

            });


            $(".about_dialog .close").click(function() {
                $(".about_dialog").slideUp(500);
                $(".about_dialog .pic").fadeOut(100);
            });


            $(".menu_tab_home a:nth-child(1), .menu_tab a:nth-child(1)").click(function() {
                $(this).addClass("selected");
                $(this).siblings("a:nth-child(2)").removeClass("selected");
                $(this).parent().siblings(".menu_tab1").show();
                $(this).parent().siblings(".menu_tab2").hide();
            });

            $(".menu_tab_home a:nth-child(2), .menu_tab a:nth-child(2)").click(function() {
                $(this).addClass("selected");
                $(this).siblings("a:nth-child(1)").removeClass("selected");
                $(this).parent().siblings(".menu_tab1").hide();
                $(this).parent().siblings(".menu_tab2").show();
            });

            $(".credit_box .credit_select ul li input:radio").bind("click", function() {
                $(this).parents().eq(8).find('.credit_option').slideDown("slow");
                $(this).parents().eq(8).find('.credit_box').animate({'top': '-=25px'}, 'slow');
                $(this).parents().eq(8).find('.goback a').animate({'top': '-=15px'}, 'slow');
                $(".credit_box .credit_select ul li input:radio").unbind();
            });

        </script>

        <script>

            $(function() {
                var $post = $(".blink");
                setInterval(function() {
                    $post.toggleClass("blink");
                }, 500);
            });

        </script>

        <script type="text/javascript" src="js/jquery.dataTables.myconfig.js"></script>

        <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

    </body>

</html>