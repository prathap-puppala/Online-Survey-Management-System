<?php
session_start();
require_once("config.php");
if(isset($_POST['uid']) && isset($_POST['passwd']))
{
$uid=mysql_real_escape_string(strip_tags(htmlspecialchars(addslashes(strtoupper($_POST['uid'])))));
$passwd=mysql_real_escape_string(strip_tags(htmlspecialchars(addslashes($_POST['passwd']))));

if(mysql_num_rows(mysql_query("SELECT * FROM data WHERE id='$uid'"))>=1)
	{
$dup=mysql_query("SELECT * FROM passwords WHERE stuid='$uid' AND Password='$passwd'");
if(mysql_num_rows($dup)==1)
{
if(mysql_num_rows(mysql_query("SELECT * FROM submits WHERE stuid='".$uid."'"))>=1)
{
echo "Already Submitted";
}
else
{
$_SESSION['userid']=$uid;
echo "success";
}
}
else
{
echo "invalid";
}
	}
	else
	{
	echo "not a student";
	}
}

else
{
header("location:index.php");
}
?>
