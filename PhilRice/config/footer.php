	<div class="container">
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog modal-sm">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Admin Log In</h4>
	        </div>
	        <div class="modal-body">
	        	<div class="center-block">
		        	<div>
			        	<form method="POST" action="action/login.php" class="form-group">
				          <input type="text" name="username" placeholder="Username..." class="form-group-input">
				          <input type="password" name="password" placeholder="Password..." class="form-group-input">
				          <input type="submit" name="LogIn" value="Log In" class="btn btn-primary btn-center">
			        	</form>
		        	</div>
	        	</div>
	        </div>
	      </div>
	      
	    </div>
	  </div>
	  
	</div>
	<footer class="footer-bs" id="contact">
		<div class="row">
			<div class="col-md-3 footer-brand animated fadeInLeft hidden-xs">
				<!-- FOOTER VIDEO -->
					<?php 
						$Lnks = mysql_query("SELECT * FROM Links");
						$fetch = mysql_fetch_array($Lnks);
						$VL = $fetch['VideoLinks'];
						echo $VL;

					?>
				<!-- FOOTER VIDEO -->
				
			</div>
			<div class="col-md-3 footer-nav animated fadeInUp" onclick="window.location='collections.php'">
				<h5>COLLECTION</h5>
				<hr>
				<p class="text-justify">Our collections include material culture of rice-farming communities such as implements used from land preparation to post-harvest production, rice seeds, photographs, and artwork.</p>
				
			</div>
			<div class="col-md-3 footer-social animated fadeInDown">
				<h5>RESEARCH</h5>
				<hr>
				<ul>
					<li></li>
				</ul>
			</div>
			<div class="col-md-3 footer-social animated fadeInRight">
				<ul>
					<li>
						<?php 
							if (isset($_SESSION['myUser'])) {
								echo '<h3>Admin: </h3><h5>'.$FullName.'</h5><hr>';
								echo '<button type="button" class="btn btn-info"><a href="./action/logout.php"><span class="fa ahref">Log Out</span></a></button>';
							}
							else{
								echo '<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Log In <span class="fa fa-user"></span></button>';
							}

							if(isset($_POST['logout'])){
								session_destroy();
								header("location:../index.php?logout");
							}
						 ?>
						
					</li>
				</ul>
			</div>
			</div>
	</footer>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>