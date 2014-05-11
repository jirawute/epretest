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
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web/cssmenu.css">
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/less-1.3.3.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/selectivizr-min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ellipsis.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/apprise-1.5.full.js"></script>
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
        <div class="container_12">
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

                                <input type="submit" value="เข้าสู่ระบบ" name="btn_login" id="login" onclick="OpenLink('?r=site/checklogin')" />
                                <input type="button" value="สมัครสมาชิก" name="btn_signup" id="signup" onclick="OpenLink('?r=student/signup')" />

                            </div>
                        </form>
                    </div>
                </div>
<?php } else { ?>
                <div id="header" class="grid_12">
                    <h1 class="logo"><a href="index.php">eStudio</a></h1>
                    <div id="cssmenu">
                        <ul>
                            <li class="active"><a href="<?php echo Yii::app()->createUrl('student/view'); ?>"><span>หน้าหลัก</span></a></li>
                            <li class="has-sub"><a href="#"><span>ข้อมูลส่วนตัว</span></a>
                                <ul>
                                    <li><a href="<?php echo Yii::app()->createUrl('student/update'); ?>"><span>แก้ไขข้อมูลส่วนตัว</span></a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('student/history'); ?>"><span>ประวัติการทำข้อสอบ</span></a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('student/viewall'); ?>"><span>สถิติการทำข้อสอบทั้งหมด</span></a></li>

                                </ul>
                            </li>
                            <li class="has-sub"><a href="#"><span>เครดิต</span></a>
                                <ul>
                                    <li><a href="<?php echo Yii::app()->createUrl('payment'); ?>"><span>เติมเครดิต</span></a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('order'); ?>"><span>ประวัติการสั่งซื้อ</span></a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('transfer'); ?>"><span>ส่งหลักฐานการชำระเงิน</span></a></li>

                                </ul>
                            </li>
                            <li class="last"><a href="<?php echo Yii::app()->createUrl('site/page&view=importance'); ?>"><span>ช่วยเหลือ</span></a>
<!--                                <ul>
                                    <li><a href="<?php //echo Yii::app()->createUrl('student/history'); ?>"><span>ประวัติการทำข้อสอบ</span></a></li>
                                    <li><a href="<?php //echo Yii::app()->createUrl('student/viewall'); ?>"><span>สถิติการทำข้อสอบทั้งหมด</span></a></li>

                                </ul>-->
                            </li>
                            <li class="last"><a href="<?php echo Yii::app()->createUrl('site/logout'); ?>"><span>ออกจากระบบ</span></a></li>
                        </ul>
                    </div>
                    <div class="credit">
                        <div class="credit_text">
    <?php $student = Student::model()->findByPk(Yii::app()->user->id); ?>
                            <span class="your_credit"></span><span class="points"><?php echo $student->credit; ?></span>
                        </div>
                    </div>

                </div>
<?php } ?>




            <div class="clear"></div>

            <div id="content"><?php echo $content; ?></div>

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
                        Email : contact@e-studio.co.th
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
                    <div class="fb-like-box" data-href="https://www.facebook.com/estudiothailand" data-width="290" data-height="190" data-show-faces="true" data-stream="false" data-border-color="#cccccc" data-background="#ffffff" data-header="false"></div>
                </div>
            </div>

        </div>

        <script>

            (function() {
                function stuffForRezieAndReady() {

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