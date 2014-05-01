
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//if user come from facebook by clicking on the link, we can redirect user to the post page.
//Referer address is the address where user comes from by clicking on the link in this case facebook is the referer.
if(isset($_SERVER['HTTP_REFERER']))
{
	//a regular expression to match the facebook address from the referer address
	if(preg_match("/www.facebook.com/",$_SERVER['HTTP_REFERER']))
	{
		?>
		<SCRIPT type="text/javascript">
		window.location="http://www.e-pretest.com";
		</SCRIPT>
		<?php
	}
}
?>
<meta property="og:title" content="เลิกมโน แล้วมาโชว์ความสามารถกับข้อสอบจริงกันดีกว่า" />
<meta property="og:image" content="http://www.e-pretest.com/images/web/logo.png" />
<meta name="description" content="e-pretest คลังข้อสอบออนไลน์ รวบรวมข้อสอบเข้ามหาวิทยาลัย (Admissions) ทั้ง O-net, GAT, PAT, 7 วิชาสามัญ และแบบฝึกหัดข้อสอบภาษาต่าง ๆ " />
<link rel="image_src" href="http://www.e-pretest.com/images/web/logo.png" />
</head>

<body>
</body>
</html>

