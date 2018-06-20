<?php
session_start();
require_once("config.php");
if(isset($_SESSION['userid']) && !empty($_SESSION['userid']))
{
$user=strip_tags(trim($_SESSION['userid']));
			
$que=mysql_query("SELECT * FROM submits WHERE  stuid='".mysql_real_escape_string($user)."'");
	
			//main action start
			$qns="INSERT INTO submits(stuid";
for($i=1;$i<=60;$i++)
{
$qns=$qns.",que".$i."";
}
$qns=$qns.",ip";
$qns=$qns.") VALUES('".$_SESSION['userid']."'";

for($i=1;$i<=60;$i++)
{
$qns=$qns.",'".$_POST['que'.$i]."'";
}
$qns=$qns.",'$ip')";

if(mysql_query($qns))
{
echo "sent";	
}
else{echo "fail";}
}
?>
