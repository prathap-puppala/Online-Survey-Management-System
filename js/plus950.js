function pick(field)
		{
			return document.getElementById(field).value;
		}
		

function login()
{
	var uid=pick("uid");
	var passwd=pick("passwd");

 if(uid.length==7 && passwd.length>=1)
{
	dhtmlx.message("Authenticating <b>"+uid+"</b>...");
	$.post("login_check.php",{uid:uid,passwd:passwd},function(data){if(data.indexOf("invalid")!=-1){dhtmlx.message({ type:"error", text:"Invalid Credentials" })} else if(data.indexOf("success")!=-1){dhtmlx.message("<font style='color:green;font-weight:bold;'>Login successful</font>");location.reload();}else if(data.indexOf("not a student")!=-1){dhtmlx.message({ type:"error", text:"Not a CSE Student" })}else{dhtmlx.message({ type:"error", text:data })} });

}
else
{
	dhtmlx.message({ type:"error", text:"*All fields are required" });
	return false;
}
}

function post()
{
var qns="";
qns=qns+"que1="+document.getElementById("que1").value;
if($('input[name=que2]:checked').val()!=undefined){qns=qns+"&que2="+$('input[name=que2]:checked').val();}
else{qns=qns+"&que2=NULL";}

qns=qns+"&que3="+document.getElementById("que3").value;

for(var i=4;i<=9;i++)
{
var ter=$('input[name=que'+i+']:checked').val();
if(ter==undefined){qns=qns+"&que"+i+"=NULL";}
else{qns=qns+"&que"+i+"="+ter;}	
}


qns=qns+"&que10="+document.getElementById("que10").value;

if($('input[name=que11]:checked').val()!=undefined){qns=qns+"&que11="+$('input[name=que11]:checked').val();}
else{qns=qns+"&que11=NULL";}	

qns=qns+"&que12="+document.getElementById("que12").value;


for(var i=13;i<=59;i++)
{
var ter=$('input[name=que'+i+']:checked').val();
if(ter==undefined){qns=qns+"&que"+i+"=NULL";}
else{qns=qns+"&que"+i+"="+ter;}	
}

qns=qns+"&que60="+document.getElementById("que60").value;

var datastring=qns;

$.ajax({
type:"POST",
url:"postform.php",
data:datastring,
cache:false,
async:true,	
beforeSend:function(data){$("#subm").hide();$("#load").show();},
success:function(data){if(data.indexOf("sent")!=-1){dhtmlx.alert({title:"Message", text:"Successfully Submitted"});window.location='logout.php';}else{dhtmlx.message({ type:"error", text:data });$("#subm").show();$("#load").hide();}}
});
}
