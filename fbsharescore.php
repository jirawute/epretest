
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include"config/connect.php";
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
$imageURL = "http://www.e-pretest.com/images/web/logo.png";
$url = explode('-', $_GET['parm']);
$exam_id = $url[0];
$score = $url[1];
$score_total = $url[2];
$pr =$url[3];
$total = $url[4];
//execute the SQL query and return records
$result = mysql_query("SELECT * FROM esto_exam WHERE exam_id=".$exam_id);

//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
    $name = $row['name'];
}
//close the connection
mysql_close($dbhandle);

?>
<meta property="og:title" content="คุณทำ <?php echo $name;?> ได้ <?php echo $score."/".$score_total;?> คะแนน ได้ลำดับที่ <?php echo $pr;?> จากทั้งหมด <?php echo $total;?> คน" />
<meta property="og:image" content="<?php echo $imageURL;?>" />
<meta name="description" content="e-pretest คลังข้อสอบออนไลน์ รวบรวมข้อสอบเข้ามหาวิทยาลัย (Admissions) ทั้ง O-net, GAT, PAT, 7 วิชาสามัญ และแบบฝึกหัดข้อสอบภาษาต่าง ๆ " />
<link rel="image_src" href="http://www.e-pretest.com/images/web/logo.png" />
</head>

<body>
</body>
</html>

