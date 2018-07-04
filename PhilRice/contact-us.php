<?php include("/config/header.php"); ?>
		<div class="container-fluid">
		<div class="row"> 
		
		</div>
		<div class="col-md-4 col-md-offset-2 hidden-xs">
			<img src="img/ricemuseum.png" class="img-responsive contact-img">
		</div>
		<div class="col-md-4">
            <h2>Contact us</h2>
			<div class="well">
				<strong>
				Rice Science Museum <br>
				DA-Philippine Rice Research Institute <br>
				</strong>
				<i class="fa fa-home fa-2x fa-fw"></i> Maligaya, Science City of Muñoz, Nueva Ecija, 3119 <br>
				<i class="fa fa-phone fa-2x fa-fw"></i> Landline: (044) 456 0285 loc 530 <br>
				<i class="fa fa-mobile fa-2x fa-fw"></i> Mobile: (09xx) xxx-xxxx <br>
				<i class="fa fa-envelope fa-2x fa-fw"></i> E-mail: ricesciencemuseum@gmail.com <br>
				<hr>
				
				<div class="container-fluid">
					<form class="form-horizontal" role="form" method="POST">
					<div class="form-group">
	                        <input type="text" id="Name" name="Name" placeholder="Name" class="form-control" autofocus required>
	                </div>
	                <div class="form-group">
	                        <input type="email" name="Email" id="email" placeholder="Email" class="form-control" required>
	                </div>
	                <div class="form-group">
	                        <input type="text" name="ContactNo" id="contact" placeholder="Contact No." class="form-control" required>
	                </div>
	                <div class="form-group">
	                        <input type="text" id="Subject" name="Subject" placeholder="Subject" class="form-control" required>
	                </div>
					<div class="form-group">
	                        <select name="Category" class="form-control" required>
								<option value="Category" disabled selected>Category</option>
								<option value="Visit">Visit</option>
								<option value="Inquiry">Inquiry</option>
								<option value="Others">Others</option>
							</select>
							
	                </div>
					<div class="form-group">
							<label for="date">*Date of visit <i>(for visitation only)</i></label>
	                        <input type="date" id="date" placeholder="Date of Visit" name="DateOfVisit" class="form-control">
	                </div>
					
					<div class="form-group">
							<label for="time">*Time of visit <i>(for visitation only)</i></label>
	                        <input type="time" id="time" placeholder="Time of Visit" name="TimeOfVisit" class="form-control">
	                </div>
						
						
	                <div class="form-group">
	                    	<textarea class="form-control" name="Message" placeholder="Write message here..." rows="6" required></textarea>
	                </div>
	                <div class="form-group">
 				 		<input type="submit" name="send" class="pull-left contact-us">
 				 	</div>
		            </form>
		            <?php 
		            	if (isset($_POST['send'])) {
		            		$to = 'nivekzxc@gmail.com';
		            		$from = $_POST['Name'];
		            		$fromEmail = $_POST['Email'];
		            		$fromContact = $_POST['ContactNo'];
		            		$ESubject = "Form Submitted from rice science museum website.";
		            		$subject = $_POST['Subject'];
		            		$Category = $_POST['Category'];
		            		$DateOfVisit = $_POST['DateOfVisit'];
		            		$TimeOfVisit = $_POST['TimeOfVisit'];
		            		$Message = $_POST['Message'];

		            		$EmailFrom = $fromEmail;
		            		$EmailSubject = $ESubject;


		            		require_once "contact-us.php";
							$from = "Website Sender <ricesciencemuseum@gmail.com>";
							$to = "Admin Recipient <nivekzxc@gmail.com>";
							$subject = $ESubject;
							$body = "Subject: ".$subject."\nCategory: ".$Category."\nName: ".$from."\nSender's Email: ".$EmailFrom."\nContact: ".$fromContact."\nMessage: ".$Message."\nDate of Visit: ".$DateOfVisit."\nTime of Visit: ".$TimeOfVisit;
							$host = "ssl://mail.gmail.com";
							$port = "465";
							$username = "smtp_username";
							$password = "smtp_password";
							$headers = array ('From' => $from,
							  'To' => $to,
							  'Subject' => $subject);
							$smtp = Mail::factory('smtp',
							  array ('host' => $host,
							    'port' => $port,
							    'auth' => true,
							    'username' => $username,
							    'password' => $password));
							$mail = $smtp->send($to, $headers, $body);
							if (PEAR::isError($mail)) {
							  echo("<p>" . $mail->getMessage() . "</p>");
							 } else {
							  echo("<p>Message successfully sent!</p>");
							 }
		            	}
		            ?>
		        </div>
				</div>
			</div>
		</div>
		</div>
		<br>
<?php include("/config/footer.php"); ?>