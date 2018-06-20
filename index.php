<?php
session_start();
@include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Survey Form</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/message_default.css" type="text/css" />
<script src="js/Jquery.js"></script>
<script src="js/plus950.js"></script>
<script src="js/message.js"></script>
</head>

<body class="login">
<!-- header starts here -->
<div id="cse-Bar">
  <div id="cse-Frame">
    <div id="logo"> <a href="">CSIIITN</a> </div>
    
         
        <div id="header-main-right">
          <div id="header-main-nav" style="margin-top:20px;">
 <h4 style="color:#fff;">     <?php 
      if(isset($_SESSION["userid"])){echo "Welcome ".$_SESSION['userid']. ", <a style='text-decoration:none;color:yellow;' href='logout.php'>Logout</a>";}else{echo "Welcome Guest";} 
      ?></h4>
              </div>
          </div>
      </div>
</div>
<!-- header ends here -->
<div id="loadi">
	
                	<?php if(!isset($_SESSION["userid"])){ ?>
<div class="loginbox radius">
<h2 style="color:#141823; text-align:center;">Welcome to CSIIITN Survey</h2>
	<div class="loginboxinner radius">
        
        <div class="loginform">
			
                	<br>
                <h4 class="title" style="color:red;">Please Login to Continue</h5>
        	<form id="login" method="post">
				<table border="0">
			<tr><td style="padding-left:50px;">
                 <p style="font-size:14px;" class="title">University ID</p></td><td>&nbsp;</td><td> <input autofocus type="text" id="uid" maxlength="7" class="radius mini" />
            </td></tr>
        	<tr><td  style="padding-left:50px;">
                 <p style="font-size:14px;" class="title">Password</p></td><td>&nbsp;</td><td> <input type="password" id="passwd"   class="radius mini" />
            </td></tr>
        <tr><td>&nbsp;</td><td colspan="3"><p>
                	<a class="button" class="radius title" onclick="login()" name="client_login" style="width:180px;padding:7px;">Sign in</a>
                </p>
                </td></tr>
                
                </table>
            </form>
                  
        </div><!--loginform-->
    </div><!--loginboxinner-->
</div><!--loginbox-->


</div>

            <?php } 
            else
            {
				$ru=mysql_fetch_array(mysql_query("SELECT * FROM data where id='".$_SESSION['userid']."'"));
			$questions=file("questions.txt");
			function blank($que){return "<textarea id='que".$que."' rows='5' cols='32' ></textarea>";}
			function opt1($que){return "<input type='radio' name='que".$que."' value='Yes' >Yes <br><input type='radio' name='que".$que."' value='No' >No <br> <input type='radio' name='que".$que."' value='Not Attempted Any' >Not Attempted Any";}
			function opt2($que){return "<input type='radio' name='que".$que."' value='Below Average(Less than 5)' >Below Average(Less than 5) <br><input type='radio' name='que".$que."' value='Average(6 to 7)' >Average(6 to 7) <br> <input type='radio' name='que".$que."' value='Above Average(8 to 9)' >Above Average(8 to 9) <br> <input type='radio' name='que".$que."' value='Perfect (10)' >Perfect (10)";}
			function opt3($que){return "<input type='radio' name='que".$que."' value='Very Bad'>Very Bad <br><input type='radio' name='que".$que."' value='Average' >Average <br> <input type='radio' name='que".$que."' value='Good' >Good <br> <input type='radio' name='que".$que."' value='Excellent' >Excellent";}
			function opt4($que){return "<input type='radio' name='que".$que."' value='Not Satisfactory'>Not Satisfactory <br><input type='radio' name='que".$que."' value='Average but not upto the mark' >Average but not upto the mark <br> <input type='radio' name='que".$que."' value='Very much satisfied' >Very much satisfied";}
			function opt5($que){return "<input type='radio' name='que".$que."' value='<50%'><50% <br><input type='radio' name='que".$que."' value='50% to 75%' >50% to 75% <br> <input type='radio' name='que".$que."' value='75% - 90%' >75% - 90% <br> <input type='radio' name='que".$que."' value='100%' >100%";}
			function opt6($que){return "<input type='radio' name='que".$que."' value='Dont Know'>Dont Know <br><input type='radio' name='que".$que."' value='Notsure' >Not sure <br><input type='radio' name='que".$que."' value='Requires More Time' >Requires More Time <br> <input type='radio' name='que".$que."' value='Can Can' >Can Can(I can do)";}
			function opt7($que){return "<input type='radio' name='que".$que."' value='Dont Know'>Dont Know <br><input type='radio' name='que".$que."' value='Upto Definitions Level' >Upto Definitions Level<br> <input type='radio' name='que".$que."' value='Basic level standard questions(important)' >Basic Level Standard Questions <br> <input type='radio' name='que".$que."' value='Can Answer any question' >Can Answer any question";}
			function opt8($que){$stri="";for($i=1;$i<=10;$i++){$stri=$stri."<input type='radio' name='que".$que."' value='".$i."'> ".$i." <br>";} return $stri;}
			
			$options=array(blank(1),opt1(2),blank(3),opt2(4),opt2(5),opt2(6),opt2(7),opt2(8),opt2(9),blank(10),
			           opt1(11),blank(12),opt2(13),opt3(14),opt3(15),opt3(16),opt3(17),opt2(18),opt2(19),opt4(20),
			           opt5(21),opt1(22),opt5(23),opt6(24),opt6(25),opt6(26),opt6(27),opt5(28),opt6(29),opt6(30),
			           opt5(31),opt6(32),opt6(33),opt6(34),opt5(35),opt6(36),opt7(37),opt7(38),opt7(39),opt8(40),
			           opt7(41),opt7(42),opt7(43),opt7(44),opt7(45),opt7(46),opt7(47),opt7(48),opt7(49),opt8(50),
			           opt7(51),opt7(52),opt7(53),opt7(54),opt7(55),opt7(56),opt7(57),opt7(58),opt7(59),blank(60)
			           
			           );
			
			?>
			
        </div><!--loginform-->
    </div><!--loginboxinner-->
</div><!--loginbox-->


</div>

		<center>
				<table width="90%"  style="background:#fff;" id="customers">
					<tr><th colspan="2">Survey Form </th></tr>
                   <tr class="alt"><td>Name : <b><?php echo $ru['name'];?></b></td><td>Year : <b>E4</b></td></tr>
                   <!--    <tr><td colspan="2" style='color:maroon;'><center><p style="text-align:center;"><span style='border:1px solid green;padding:5px;'><b>1</b> = Rarely</span><br>&nbsp; <span style='border:1px solid green;padding:5px;'> <b>2</b> = Once in a while</span> <br>&nbsp;<span style='border:1px solid green;padding:5px;'> <b>3</b> = Sometimes</span> <br>&nbsp;<span style='border:1px solid green;padding:5px;'> <b>4</b> = Most of the time</span> <br>&nbsp;<span style='border:1px solid green;padding:5px;'> <b>5</b> = Almost always</span></p></center></td></tr>-->
               
                   <tr class="alt"><td colspan="2">General Questions </td></td></tr>
               <?php 
               for($i=0;$i<20;$i++)
               {
				   ?>
				   <tr><td style='text-align:left;'><?php echo $questions[$i];?> </td><td style='text-align:justify;'><?php echo $options[$i];?></tr>
               
				   <?php
			   }
               ?>
                   <tr class="alt"><td colspan="2">Technical Ability </td></td></tr>
               <?php 
               for($i=20;$i<60;$i++)
               {
				   ?>
				   <tr><td style='text-align:left;'><?php echo $questions[$i];?> </td><td style='text-align:justify;'><?php echo $options[$i];?></tr>
               
				   <?php
			   }
               ?>
               
                <tr><td colspan="2"><span  id='subm'><a class='my-button medium green' style='cursor:pointer;text-decoration:none;' onclick="post()">Submit</a></span><span id='load' style='display:none;'><img src='ajax-loading.gif'></span></td></td></tr>
                </table></center>	<?php	
			}
            ?>
      

<p style="font-size:12px;">
  <center><br>
    <a href="javascript:void(0);" style="text-decoration:none;">Prathap Puppala,N130950</a>
  </center>
</p>

</body>

</html>
