<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact form with AJax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <style>

#frmContact {
    border-top:#F0F0F0 2px solid;
    background:#FAF8F8;
    padding:10px;
    
}
#frmContact div{
    margin-bottom: 15px
    
}
#frmContact div label{
    margin-left: 5px;
}
.demoInputBox{
    padding:10px; 
    border:#F0F0F0 1px solid; 
    border-radius:4px;
}
.error{
    background-color: #FF6600;
    border:#AA4502 1px solid;
    padding: 5px 10px;
    color: #FFFFFF;
    border-radius:4px;
    
}
.success{
    background-color: #12CC1A;
    border:#0FA015 1px solid;
    padding: 5px 10px;
    color: #FFFFFF;
    border-radius:4px;
    
}
.info{
    font-size:.8em;
    color: #FF6600;
    letter-spacing:2px;
    padding-left:5px;
    
}
.btnAction{
    background-color:#2FC332;
    border:0;padding:10px 40px;
    color:#FFF;border:#F0F0F0 1px solid; 
    border-radius:4px;
    
}
</style>

<div class="container">
    <h1 class="text-center">Send us a mail</h1>
    <div id="frmContact">
   <div id="mail-status"></div>
   <div>
      <label style="padding-top:20px;">Name</label>
      <span id="userName-info" class="info"></span><br/>
      <input type="text" name="userName" id="userName" class="demoInputBox form-control">
   </div>
   <div>
      <label>Email</label>
      <span id="userEmail-info" class="info"></span><br/>
      <input type="text" name="userEmail" id="userEmail" class="demoInputBox form-control">
   </div>
   <div>
      <label>Subject</label> 
      <span id="subject-info" class="info"></span><br/>
      <input type="text" name="subject" id="subject" class="demoInputBox form-control">
   </div>
   <div>
      <label>Content</label> 
      <span id="content-info" class="info"></span><br/>
      <textarea name="content" id="content" class="demoInputBox form-control" cols="60" rows="6"></textarea>
   </div>
   <div>
      <button name="submit" class="btnAction" onClick="sendContact();">Send</button>
   </div>
</div>
</div>


<script>
function sendContact() {
	var valid;	
	valid = validateContact();
	if(valid) {
		jQuery.ajax({
		url: "contact_mail.php",
		data:'userName='+$("#userName").val()+'&userEmail='+$("#userEmail").val()+'&subject='+$("#subject").val()+'&content='+$(content).val(),
		type: "POST",
		success:function(data){
		$("#mail-status").html(data);
		},
		error:function (){}
		});
	}
}

function validateContact() {
	var valid = true;	
	$(".demoInputBox").css('background-color','');
	$(".info").html('');
	
	if(!$("#userName").val()) {
		$("#userName-info").html("(required)");
		$("#userName").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#userEmail").val()) {
		$("#userEmail-info").html("(required)");
		$("#userEmail").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		$("#userEmail-info").html("(invalid)");
		$("#userEmail").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#subject").val()) {
		$("#subject-info").html("(required)");
		$("#subject").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#content").val()) {
		$("#content-info").html("(required)");
		$("#content").css('background-color','#FFFFDF');
		valid = false;
	}
	
	return valid;
}
</script>

</body>
</html>





