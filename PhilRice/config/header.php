<?php
	session_start();
	date_default_timezone_set("Asia/Manila");
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rice Science Museum</title>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet" >
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<link href="img/rice-museum-logo.png" rel="shortcut icon" >
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery.js"></script>
		<script src="/js/myjs.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    
    <script type="text/javascript">
	$(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });   
  });
    </script>

</head>
<body>
	<nav class="navbar navbar-default hidden-xs hidden-md">
		<div class="container">
	<div class="navbar-header">
      <button type="button" class="navbar-toggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
			<div class="row">
				<div>
				<ul class="nav navbar-nav navbar-right">
					<li><input type="text" name="Searchh" class="input-search" placeholder="Search..."></li>
					<li class="icon"><a onclick="openInNewTab('https://www.facebook.com/ricesciencemuseum/');"><i class="fa fa-facebook  fa-2x"></i></a></li>
					<li class="icon"><a href="#"><i class="fa fa-instagram  fa-2x"></i></a></li>
					<li class="icon"><a href="#"><i class="fa fa-pinterest fa-2x"></i></a></li>
					<script type="text/javascript">
						function openInNewTab(url) {
						  var win = window.open(url, '_blank');
						  win.focus();
						}
					</script>
				<?php 
				include("./config/db.php");
				if(isset($_SESSION['myUser'])){
					$myUsername = $_SESSION['myUser'];
						$QueryAcc = mysql_query("SELECT * FROM accountinfo WHERE Username='$myUsername'");
						if ($QueryAcc==false) {
							die(mysql_error());
						}
						else{
							$fetch = mysql_fetch_array($QueryAcc);
							$Fname = $fetch['FirstName'];
							$Mname = $fetch['MiddleName'];
							$Lname = $fetch['LastName'];
							$FullName = $Fname." ".$Mname." ".$Lname;
							$myPassw = $_SESSION['myPass'];
						}
					?>
					</li>
							</ul>
							<ul class="nav navbar-nav navbar-left">
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADMIN MENU<span class="caret"></span></a>
									<ul class="dropdown-menu arrow_box drop-menu">
											<li><a onclick="window.location='add.php?Item'">Add Museum Item</a></li>
											<li><a onclick="window.location='add.php?Research'">Add Research</a></li>
											<li><a onclick="window.location='add.php?PhotoEssay'">Add PhotoEssay</a></li>
											<li><a onclick="window.location='Links.php'">Links</a></li>
									</ul>
								</li>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADMIN SETTINGS<span class="caret"></span></a>
								<ul class="dropdown-menu arrow_box drop-menu">
										<li><a data-toggle="modal" data-target="#ChangePass">Change Password</a></li>
										<li><a data-toggle="modal" data-target="#AddAdmin">Add Administrator</a></li>
								</ul>
								</li>
					<?php
					}
					 ?>

					</ul>
				</div>
			</div>

			<div class="row text-center">
				<div class="col-xs-11 col-xs-offset-1">
					<ul class="nav navbar-nav main-nav">
						<li><a onclick="window.location='./'">HOME</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">STORIES<span class="caret"></span></a>
							<ul class="dropdown-menu arrow_box drop-menu">
								<li><a onclick="window.location='#'">News</a></li>
								<li><a onclick="window.location='#'">Feature</a></li>
								<li><a onclick="openInNewTab('https://www.youtube.com/user/philricetv');">Video</a></li>
								<li><a onclick="window.location='photoessay.php'">Photo Essay</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">EXPLORE<span class="caret"></span></a>
							<ul class="dropdown-menu arrow_box drop-menu">
								<li><a onclick="window.location='explore.php'">Things to Do</a></li>
								<li><a onclick="window.location='visit.php'">Getting Here</a></li>
							</ul>
						</li>
						<li style="transform:translateY(-50%);"><a onclick="window.location='./'" id="logo"><img style="height:100px; padding-top:10px;" src="img/rice-museum-logo.png"></a></li>	
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">EXHIBITIONS AND EVENTS<span class="caret"></span></a>
							<ul class="dropdown-menu arrow_box drop-menu">
								<li><a onclick="window.location='#'">Current</a></li>
								<li><a onclick="window.location='#'">Special</a></li>
								<li><a onclick="window.location='#'">Past</a></li>
								<li><a onclick="window.location='#'">Events</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ABOUT US<span class="caret"></span></a>
							<ul class="dropdown-menu arrow_box drop-menu">
								<li><a onclick="window.location='the-rice-science-museum.php'">The Rice Science Museum</a></li>
								<li><a onclick="window.location='impact-on-food-security.php'">Impact on Food Security</a></li>
								<li><a onclick="window.location='rice-science-exploratorium.php'">Rice Science Exploratorium</a></li>
								<li><a onclick="window.location='friends-of-the-museum.php'">Friends of the Museum</a></li>
								<li><a onclick="window.location='contact-us.php'">Contact Us</a></li>
							</ul>
						</li>


					</ul>
				</div>
			</div>
		</div><!-- /.navbar-collapse -->
	</nav>

<!-- visible -->

<nav class="navbar navbar-default navbar-fixed-top visible-xs visible-md">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" onclick="window.location='./'" id="logo"><img style="height:50px; width:100px; margin-bottom: 0px; margin-top:0px" src="img/rice-museum-logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a onclick="window.location='index.php'">HOME</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">WHAT'S ON <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a onclick="window.location='visit.php'" style="color:white">Visit</a></li>		
            <li><a onclick="window.location='explore.php'" style="color:white">Explore</a></li>
			<li><a onclick="window.location='learn.php'" style="color:white">Learn</a></li>
            <li><a onclick="window.location='research.php'" style="color:white">Research</a></li>
            <li><a onclick="window.location='collections.php'" style="color:white">Collections</a></li>
            <li><a onclick="window.location='timeline.php'">Timeline</a></li>
          </ul>
        </li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="about-us.html">ABOUT US <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a onclick="window.location='about-us.php'" style="color:white">About us</a></li>
            <li><a onclick="window.location='stories.php'" style="color:white">Our stories</a></li>
			<li><a onclick="window.location='advocate.php'" style="color:white">Be an advocate</a></li>
          </ul>
        </li>
        <li><a onclick="window.location='contact-us.php'">CONTACT US</a></li>
      </ul>

    </div>
  </div>
</nav>
<div class="modal fade" id="ChangePass" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			    	<h4 class="modal-title">Change Password</h4>
			</div>
			<div class="modal-body">
			    <div class="center-block">
				    <div>
				    	<form method="POST">
				    		<table class="table table-style2">
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Old Password</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="password" name="OldPass" id="passcode" class="input-content" required></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >New Password</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="password" name="NewPass" id="password" class="input-content" required></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Retype New Password</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="password" name="RPass" id="confirm_password" class="input-content" required></td></tr>
							</table>
							<hr>
								<button type="submit" class="btn btn-primary center" name="ChangePassw">Change <span class="fa fa-check"></span></button>
						</form>
						<?php
							if(isset($_POST['ChangePassw'])){
								$NewP = $_POST['NewPass'];
								$OldPass = $_POST['OldPass'];
								$OldP = $myPassw;
								$NewP = md5($NewP);
								$OldPass = md5($OldPass);
							if ($OldP == $OldPass) {
									$QueryUpdate = mysql_query("UPDATE `accountinfo` SET `Password`= '$NewP' WHERE `Username`='$myUsername'");

								if (mysql_affected_rows() > 0) {
									echo '<script>
				                        		alert("Password Changed...");
			                        </script>';

								}
								else{
									echo '<script>
				                        		alert("Password Not Changed...");
			                        </script>';
			                        
								}
								}
							else{
									echo '<script>
				                        		alert("Old Password not matched...");
			                        </script>';
			                        
								}
							}
						?>
				    </div>
				    <script type="text/javascript">
									var password = document.getElementById("password")
									  , confirm_password = document.getElementById("confirm_password");

									function validatePassword(){
									  if(password.value != confirm_password.value) {
									    confirm_password.setCustomValidity("Passwords Don't Match");
									  } else {
									    confirm_password.setCustomValidity('');
									  }
									}
									password.onchange = validatePassword;
									confirm_password.onkeyup = validatePassword;
					</script>
			    </div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="AddAdmin" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			    	<h4 class="modal-title center">Add Administrator</h4>
			</div>
			<div class="modal-body">
			    <div class="center-block">
				    <div>
				    	<form method="POST">
				    		<table class="table table-style2">
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Username</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Username" class="input-content" required></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Password</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="password" name="Password" id="passw" class="input-content" required></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Retype Password</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="password" name="RPassword" id="confirmpassword" class="input-content" required></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >First Name</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Fname" class="input-content" required></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Middle Name</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Mname" class="input-content" required></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Last Name</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Lname" class="input-content" required></td></tr>
							</table>
							<hr>
								<button type="submit" class="btn btn-primary center" name="SubmitAdmin">Add <span class="fa fa-check"></span></button>
						</form>
								<script type="text/javascript">
									var password = document.getElementById("passw")
									  , confirm_password = document.getElementById("confirmpassword");

									function validatePassword(){
									  if(password.value != confirm_password.value) {
									    confirm_password.setCustomValidity("Passwords Don't Match");
									  } else {
									    confirm_password.setCustomValidity('');
									  }
									}
									password.onchange = validatePassword;
									confirm_password.onkeyup = validatePassword;
								</script>
								<?php
									if (isset($_POST['SubmitAdmin'])) {
										$Usern = $_POST['Username'];
										$Passw = $_POST['Password'];
										$Fname = $_POST['Fname'];
										$Mname = $_POST['Mname'];
										$Lname = $_POST['Lname'];

										$Username = md5($Usern);
										$Password = md5($Passw);
										$Insert = mysql_query("INSERT INTO `accountinfo`(`Username`, `Password`, `FirstName`, `MiddleName`, `LastName`) VALUES ('$Username','$Password','$Fname','$Mname','$Lname')");
										$Done = mysql_affected_rows();

										if ($Done > 0) {
											header("location:./");
											echo "<script>
												alert('Account Created..');
											</script>";
										}
										else{
											header("location:./");
											echo "<script>
												alert('Failed to create account..');
											</script>";
										}
									}
								?>
				    </div>
			    </div>
			</div>
		</div>
	</div>
</div>