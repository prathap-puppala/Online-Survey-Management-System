<?php
require_once("config.php");
$year=date("Y");
$tyear="submits";
$script="CREATE TABLE IF NOT EXISTS $tyear 
	(stuid varchar(50),
	PRIMARY KEY(stuid),";
	for ($i=1;$i<=60;$i++)
	{
	$script=$script."que".$i." varchar(250),";
	}
	$script=$script."ip varchar(10))";
    $rest=mysql_query($script);
	if (!$rest)
		{
		echo "Error Occured on Creating Table :: ".$tyear."<br>Error is ".mysqL_error();
		}
	


	 ?>
