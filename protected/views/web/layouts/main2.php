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

        <?php
        $exam_id = $_GET['id'];
        $exam = new Exam;
        $exam_info = $exam->getExamDetailById($exam_id);
        ?>
        <script type="text/javascript">

            function
                    saveThisForm() {
                document.forms['ExamForm'].action = "index.php?r=exam/save";
                document.forms['ExamForm'].submit();
            }
            window.onbeforeunload = function () {
                saveThisForm();
            };

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-41611206-2']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();


            function OpenLink(url) {
                document.location.href = url;
            }

            function ChangeRadioLabel(textValue, id) {
                document.getElementById('append_' + id).innerHTML = textValue.value;
            }
            function ClearForm7(i, j) {
                document.getElementById('append_' + i + '_' + j + '_1').innerHTML = "-";
                document.getElementById('append_' + i + '_' + j + '_2').innerHTML = "-";
                document.getElementById('append_' + i + '_' + j + '_3').innerHTML = "-";

                document.getElementById('ans' + i + '_' + j + '_1').checked = true;
                document.getElementById('ans' + i + '_' + j + '_2').checked = true;//hide selected radio button
            }
        </script>


        <script type="text/javascript">
            var exam_id = <?php echo $exam_id ?>;
            var credit_require = <?php echo $exam_info['credit_required']; ?>;
            var message = 'เครดิตของคุณจะถูกหักไป ' + credit_require + ' เครดิต<br/>และเมื่อคลิก "ยืนยันการทำข้อสอบ" \n\
                    จะเป็นการเริ่มทำข้อสอบเสมือนจริง<br/>เวลาจะเริ่มเดินและไม่สามารถย้อนกลับมาทำข้อสอบชุดนี้ได้ใหม่<br/> เมื่อส่งคำตอบแล้ว\n\
 สามารถกลับมาดูเฉลยแบบละเอียดได้โดยไม่จำกัดเวลา<br/> คำเตือน : ห้ามคลิกออกจากโปรแกรมและห้ามคลิกปุ่มย้อนกลับระหว่างทำข้อสอบ';
            function createNewTest() {

<?php if ($exam_info['voice_file'] == 1) { ?>
        var fullPath = "" when Offline
        //var fullPath = "http://www.e-pretest.com/";
                    message = "<b>มีข้อสอบเสียง</b><br/>\n\
                กรุณาปรับระดับความดังของลำโพงให้เหมาะสม" + message;
                    var x = document.createElement("AUDIO");
                    x.src = fullPath+"uploads/mp3/voice.mp3";
                    x.setAttribute("controls", "controls");
                    x.setAttribute("autoplay", "autoplay");


<?php } ?>
                apprise(message, {'verify': true, 'textYes': 'ยืนยันการทำข้อสอบ', 'textNo': 'ยกเลิก'}, function (r) {
                    if (r) {
                        useCredit(credit_require, exam_id);

<?php if ($exam_info['voice_file'] == 1) { ?>
                            var y = document.createElement("AUDIO");
                            y.setAttribute("src", fullPath+"uploads/mp3/<?php echo $exam_info['exam_id']; ?>.mp3");//
                            y.setAttribute("controls", "controls");
                            y.setAttribute("autoplay", "autoplay");
<?php } ?>
                    } else {
                        OpenLink("index.php?r=student/view");
                    }
                });
            }
            $(document).ready(function () {
                $.ajax({
                    url: '?r=exam/checkRecord&exam_id=' + exam_id,
                    type: 'GET',
                    dataType: 'html',
                    success: function (isStarted, textStatus, xhr) {
                        //alert(data);
                        if (isStarted == 0) {
                            createNewTest();

                        } else {
                            showPDF();
                            if (typeof time_dec == 'undefined') {
                                clearInterval(cinterval);
                            }

                        }


                    },
                    error: function (request, status, error) {
                        alert("Error: " + error + "\nResponseText: " + request.responseText);
                    }
                });

            });


            function useCredit(credit_require, exam_id) {
                $.ajax({
                    url: '?r=exam/usecredit&credit=' + credit_require + '&id=' + exam_id,
                    type: 'POST',
                    dataType: 'html',
                    success: function (data) {
                        if (data) {
                            showPDF();
                        } else {
                            alert('ขออภัยค่ะ ไม่สามารถตัดเครดิตได้ จำเป็นต้องมีเครดิตขั้นต่ำ: ' + credit_require);
                            OpenLink("index.php?r=student/view");
                        }
                    }
                });

            }
        </script>


    </head>

    <body onbeforeunload="saveThisForm()" >

        <div class="container_12">
            <?php if (Yii::app()->user->isGuest) { ?>

                <?php
            } else {
                $student = Student::model()->findByPk(Yii::app()->user->id);
                $exam = Exam::model()->findByPk($exam_id);

                $testRecord = new TestRecord;
                $Total = $testRecord->getTestRecordByStudentIdExamId($student->student_id, $exam->exam_id);
                if ($Total > 0) {
                    $test_record_id = $testRecord->getIdByStudentIdExamId($student->student_id, $exam->exam_id);
                    $model = $testRecord->loadTestRecord($test_record_id);
                    $status = $model->status;
                    $t1 = strtotime(date('Y-m-d H:i:s'));
                    $t0 = strtotime($model->date_attended);
                    $dif = ($t1 - $t0) / 60;

                    //echo $t0;exit();
                    $start_countdown = max(0, (int) ($exam->time_limited - $dif));
                } else {
                    //$start_time = $exam->time_limited;
                    $test_record_id = 0;
                    $start_countdown = $exam->time_limited;
                }
                //echo $start_countdown;exit();

                $time_limit = date("H:i:s", mktime(0, $start_countdown, 0, 0, 0, 0));
                ?>
                <script language="javascript">

                    var test_rec_id = <?php echo $test_record_id; ?>;

                    var exam_id = <?php echo $exam_id ?>;

                    var min = <?php echo $start_countdown; ?>;

                    var time_left = min * 60;

                    //var cinterval;

                    var elapse_time;

                    var timeTxt = "time_text";

                    function time_dec() {
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

                        time_left--;
                        var obj = hours + ':' + minutes + ':' + seconds;

                        //return obj;
                        if (time_left < 0) {
                            //saveThisForm();
                            clearInterval(cinterval);
                            alert("หมดเวลาทำข้อสอบแล้วคะ");
                            document.forms['ExamForm'].action = "index.php?r=exam/submit&id=" + exam_id;
                            document.forms['ExamForm'].submit();
                        } else {

                            document.getElementById('countdown').innerHTML = obj;
                        }
                    }
                    // } 

                    //cinterval = setInterval('time_dec()', 1000);
                </script>
                <div id="header" class="grid_12 do_exercise">
                    <!--div class="point_detail">
                        แนะนำ : หากโหลดข้อสอบไม่ขึ้น ให้กดที่ปุ่ม Refresh ด้านล่าง
                    </div-->
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
                <script>(function (d, s, id) {
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

            (function () {
                function stuffForRezieAndReady() {

                    $(".question_content").height(Math.floor($(window).height() * 77 / 100));

                    $(".answer_content").height(Math.floor($(window).height() * 77 / 100 - 60));

                    $(function () {
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

            $(".menu_test ul.menu_list li ul li a").click(function () {
                $(".list_test > .list_test_unselect").hide();
                $(".list_test > .list_test_box").css({visibility: "visible"});
                $(".menu_test ul.menu_list li ul li a").removeAttr('style');
                $(this).css("background", "#ff9c00");
            });

            $(".about_dialog .close").click(function () {
                $(".about_dialog").slideUp(500);
                $(".about_dialog .pic").fadeOut(100);
            });

            $(".menu_tab_home a:nth-child(1), .menu_tab a:nth-child(1)").click(function () {
                $(this).addClass("selected");
                $(this).siblings("a:nth-child(2)").removeClass("selected");
                $(this).parent().siblings(".menu_tab1").show();
                $(this).parent().siblings(".menu_tab2").hide();
            });

            $(".menu_tab_home a:nth-child(2), .menu_tab a:nth-child(2)").click(function () {
                $(this).addClass("selected");
                $(this).siblings("a:nth-child(1)").removeClass("selected");
                $(this).parent().siblings(".menu_tab1").hide();
                $(this).parent().siblings(".menu_tab2").show();
            });

            $(".credit_box .credit_select ul li input:radio").bind("click", function () {
                $(this).parents().eq(8).find('.credit_option').slideDown("slow");
                $(this).parents().eq(8).find('.credit_box').animate({'top': '-=25px'}, 'slow');
                $(this).parents().eq(8).find('.goback a').animate({'top': '-=15px'}, 'slow');
                $(".credit_box .credit_select ul li input:radio").unbind();
            });

        </script>

        <script>

            $(function () {
                var $post = $(".blink");
                setInterval(function () {
                    $post.toggleClass("blink");
                }, 1000);
            });

        </script>

        <script type="text/javascript" src="js/jquery.dataTables.myconfig.js"></script>

        <script type="text/javascript" >document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>


    </body>

</html>