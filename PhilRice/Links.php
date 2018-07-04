<?php
	include('config/header.php');
	if (isset($_SESSION['myUser'])) {
?>
	<div class="container container-bottom">
		<div class="row">			
			<form class="form-group" method="POST" action="action/UpdateLinks.php">
			<div class="col-xs-4">
				<fieldset class="">
				<?php 
						$Lnks = mysql_query("SELECT * FROM Links");
						$fetch = mysql_fetch_array($Lnks);
						$VL = $fetch['VideoLinks'];
					?>
					<legend>Footer Video</legend>
					<label>Current Link</label>
					<textarea rows="5" class="text-area border-input" readonly><?php echo $VL; ?></textarea>
					<label>New Link</label>
					<p class="p-blue">Set the width="274" height="200"</p>
					<textarea class="text-area border-input" name="NewFV" rows="5" placeholder="Insert new link..."></textarea>
					<?php if (isset($_GET['FV'])) {
						$Status = $_GET['FV'];
						if ($Status == 'Updated') {
							echo "<p class='p-green'>Footer Video Link Updated.</p>";
						}
						else{
							echo "<p class='p-red'>Footer Video Link Failed to Update.</p>";
						}
					} ?>
					<hr>
					<button type="submit" name="FVSUBMIT" class="btn btn-primary">Submit</button>
					<br>
				</fieldset>

			</div>
			<div class="col-xs-4">
				<fieldset class="">
					<legend>Footer Research</legend>
					<label>Current Link</label>
					<textarea rows="5" class="text-area border-input" readonly></textarea>
					<label>New Link</label>
					<textarea class="text-area border-input" name="NewFR" rows="5" placeholder="Insert new link..."></textarea><br><hr>
					<button type="submit" name="FRSUBMIT" class="btn btn-primary">Submit</button>
				</fieldset>
				
			</div>
			<div class="col-xs-4">
				<fieldset class="">
					<legend>Video Links</legend>
					<label>Current Link</label>
					<textarea rows="5" class="text-area border-input" readonly></textarea>
					<label>New Link</label>
					<textarea class="text-area border-input" name="NewVL" rows="5" placeholder="Insert new link..."></textarea><br><hr>
					<button type="submit" name="VLSUBMIT" class="btn btn-primary">Submit</button>
				</fieldset>
				
			</div>
			</form>
		</div>
	</div>
<?php
	}
	else{
		die('Access Denied...');
	}
	include('config/footer.php');
?>