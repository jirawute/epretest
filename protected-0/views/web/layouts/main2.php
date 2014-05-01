<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta http-equiv="content-language" content="th" />
        <meta name="description" content="e-pretest คลังข้อสอบออนไลน์ รวบรวมข้อสอบเข้ามหาวิทยาลัย (Admissions) ทั้ง O-net, GAT, PAT, 7 วิชาสามัญ และแบบฝึกหัดข้อสอบภาษาต่าง ๆ " />
        <meta name="keywords" content="ข้อสอบ o net, สอบ o net , o-net, โอเน็ต, ข้อสอบโอเน็ต, GAT PAT, สอบ GAT PAT, ข้อสอบ GAT PAT, 7 วิชาสามัญ, 7 วิชา, 7 สามัญ, วิชา สามัญ, สอบ 7 วิชา, วิชา 7 สามัญ, ข้อสอบออนไลน์, เตรียมสอบ, แอดมินชั่น, Admissions" />
        <meta name="robots" content="index,follow" />
        <meta name="author" content="E-pretest.com" />

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
        <script type="text/javascript">

            window.onbeforeunload = function (e) {
                document.forms['ExamForm'].action = "index.php?r=exam/save";
                document.forms['ExamForm'].submit();
                e = e || window.event;
               

                // For IE and Firefox prior to version 4
                if (e) {
                    e.returnValue = 'คุณต้องการออกจากโปรแกรม/โหลดหน้าเว็บซ้ำ ใช่หรือไม่? หากใช่เวลาในการทำข้อสอบจะถูกลดไปครั้งละ 5 นาที';

                }

                // For Safari
                return 'คุณต้องการออกจากโปรแกรม/โหลดหน้าเว็บซ้ำ ใช่หรือไม่? หากใช่เวลาในการทำข้อสอบจะถูกลดไปครั้งละ 5 นาที';
            };            
          
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-41611206-2']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>
        <script type="text/javascript">
            function OpenLink(url) {
                document.location.href = url;
            }
            
            function ChangeRadioLabel(textValue, id) {
                document.getElementById('append_' + id).innerHTML = textValue.value;
            }
        </script>
        <script type="text/javascript">
<?php
$exam = new Exam;
$exam_info = $exam->getExamDetailById($_GET['id']);
?>
            var exam_id = <?php echo $_GET['id']; ?>;
            var credit_require = <?php echo $exam_info['credit_required']; ?>;
            $(document).ready(function() {
                $.ajax({
                    url: '?r=exam/checktest&exam_id=' + exam_id,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data, textStatus, xhr) {
                        //alert(data);
                        if (data == 0) {
                            apprise('เครดิตของคุณจะถูกหักไป ' + credit_require + ' เครดิต<br/>และเมื่อคลิก "ยืนยันการทำข้อสอบ" จะเป็นการเริ่มทำข้อสอบเสมือนจริง<br/>เวลาจะเริ่มเดินและไม่สามารถย้อนกลับมาทำข้อสอบชุดนี้ได้ใหม่<br/> เมื่อส่งคำตอบแล้ว สามารถกลับมาดูเฉลยแบบละเอียดได้โดยไม่จำกัดเวลา<br/> คำเตือน : ห้ามคลิกออกจากโปรแกรมและห้ามคลิกปุ่มย้อนกลับระหว่างทำข้อสอบ', {'verify': true, 'textYes': 'ยืนยันการทำข้อสอบ', 'textNo': 'ยกเลิก'}, function(r) {
                                if (r) {
                                    useCredit(credit_require, exam_id);
                                } else {
                                    OpenLink("index.php?r=student/view");
                                }
                            });


                        } else {

                            if (typeof time_dec == 'undefined') {
                                clearInterval(cinterval);
                            } else {
                                cinterval = setInterval('time_dec()', 1000);
                            }

                        }


                    },
                    error: function(request, status, error) {
                        alert("Error: " + error + "\nResponseText: " + request.responseText);
                    }
                });

            });


            function useCredit(credit_require, exam_id) {
                $.ajax({
                    url: '?r=exam/usecredit&credit=' + credit_require + '&id=' + exam_id,
                    type: 'GET',
                    dataType: 'html',
                    success: function(temp, textStatus, xhr) {
                        //alert(temp);
                        if (temp == 'Y') {
                            allowExit = false;
                            cinterval = setInterval('time_dec()', 1000);
                        } else {

                            alert('ขออภัยค่ะ ไม่สามารถตัดเครดิตได้');
                            OpenLink("index.php?r=student/view");
                        }
                    }
                });

            }
        </script>


    </head>

    <body onunload="decreaseTime()">
        <div class="container_12">
            <?php if (Yii::app()->user->isGuest) { ?>

                <?php
            } else {

                $student = Student::model()->findByPk(Yii::app()->user->id);
                $exam = Exam::model()->findByPk($_GET['id']);

                $testRecord = new TestRecord;
                $Total = $testRecord->getTestRecordByStudentIdExamId($student->student_id, $exam->exam_id);
                if ($Total > 0) {
                    $test_record_id = $testRecord->getIdByStudentIdExamId($student->student_id, $exam->exam_id);
                    $model = $testRecord->loadTestRecord($test_record_id);
                    $start_time = (int) $exam->time_limited - $model->elapse_time;
                } else {
                    //$start_time = $exam->time_limited;
                    $test_record_id = 0;
                    $start_time = $exam->time_limited;
                }
                //$time_limit = $exam->time_limited;
                if ($start_time > 0) {
                    $time_limit = date("H:i:s", mktime(0, $start_time, 0, 0, 0, 0));
                } else {
                    $time_limit = date("H:i:s", mktime(0, 0, 0, 0, 0, 0));
                }
                ?>
                <script language="javascript">
                    function decreaseTime(){

                          $.ajax({
                            url: '?r=exam/decreaseTime&id=<?php echo $test_record_id;?>',
                            type: 'GET',
                            dataType: 'html',
                            success: function(data) {
                                //alert(data);
                            }
                        });

                    }
                               
                    var test_rec_id = <?php echo $test_record_id; ?>;

                    var min = <?php echo $start_time; ?>;

                    if (min > 0) {

                        var time_left = min * 60;

                        var cinterval;

                        var elapse_time;

                        var timeTxt = "time_text";

                        function time_dec() {

                            time_left--;
                            //alert(time_left);

                            // 5 Min. = 300 Sec.

                            /* Test 10 Sec.
                             if (time_left % 300 == 0) {

                             document.forms['ExamForm'].action = "index.php?r=exam/save";
                             //document.forms['AnswerForm'].action = "index.php?r=exam/saveanswer";

                             document.forms['ExamForm'].submit();
                             //document.forms['AnswerForm'].submit();


                             }*/
                            if (time_left < 300) {
                                if (timeTxt == 'time_text') {
                                    timeTxt = 'time_text blink';
                                } else {
                                    timeTxt = 'time_text';
                                }
                                document.getElementById("timeTxt").setAttribute('class', timeTxt);
                            }
                            var hours = Math.floor(time_left / (60 * 60));

                            var divisor_for_minutes = time_left % (60 * 60);
                            var minutes = Math.floor(divisor_for_minutes / 60);

                            var divisor_for_seconds = divisor_for_minutes % 60;
                            var seconds = Math.ceil(divisor_for_seconds);


                            if (hours < 10) {
                                hours = "0" + hours;
                            }
                            if (minutes < 10) {
                                minutes = "0" + minutes;
                            }
                            if (seconds < 10) {
                                seconds = "0" + seconds;
                            }
                            if (!hours) {
                                hours = "00";
                            }


                            var obj = hours + ':' + minutes + ':' + seconds;

                            //return obj;


                            document.getElementById('countdown').innerHTML = obj;
                            if (time_left == 0) {

                                alert("หมดเวลาทำข้อสอบแล้วคะ");
                                clearInterval(cinterval);

                            }
                        }
                    } else {
                        if (test_rec_id != 0) {
                            alert("หมดเวลาทำข้อสอบแล้วคะ");
                            clearInterval(cinterval);
                            document.location.href = 'index.php?r=exam/answer&id=' + test_rec_id;
                        }


                    }

                    //cinterval = setInterval('time_dec()', 1000);
                </script>
                <div id="header" class="grid_12 do_exercise">
                    <div class="point_detail">
                            คำเตือน : ในระหว่างทำข้อสอบไม่ควรกดปิดบราวเซอร์ หรือกดรีเฟรชเพื่อโหลดหน้าเว็บใหม่ เพราะเวลาจะถูกลดลงครั้งละ 5 นาที
                    </div>
                    <div class="time_countdown time_countdown_mini">
                        <span class="time_icon"></span>
                        <div class="time_text" id="timeTxt"><span id="countdown"><?php echo $time_limit; ?></span></div>
                    </div>
                </div>

            <?php } ?>
            <div class="clear"></div>

            <div id="content" class="grid_12 do_exercise_window" ><?php echo $content; ?></div>

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
                        ชั้น 29 อาคารดิออฟฟิศแอทเซ็นทรัลเวิล์ด<br/>
                        999/9 ถนนพระราม 1 ปทุมวัน กรุงเทพฯ 10330


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
                }, 1000);
            });

        </script>

        <script type="text/javascript" src="js/jquery.dataTables.myconfig.js"></script>

        <script type="text/javascript" >document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

    </body>

</html>