<?php
	session_start();
	include('../config/db.php');
				if (isset($_POST['FVSUBMIT'])) {
					$FVLINK = $_POST['NewFV'];
						$Update = mysql_query("UPDATE `Links` SET VideoLinks = '$FVLINK'");
						$AffectedRows = mysql_affected_rows();
						if ($AffectedRows > 0) {
							header("location:../Links.php?FV=Updated");
						}
						else{
							header("location:../Links.php?FV=Failed");
						}
				}
				else{
					die("Access Denied...");
				}
			?>