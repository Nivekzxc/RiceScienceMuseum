<?php
session_start();
include("../config/db.php");
if(isset($_SESSION['myUser'])) {

	if(isset($_GET['item'])){
		$Item = $_GET['item'];
		mysql_query("DELETE FROM `artifactinfo` WHERE ArtifactItemID = '$Item'");
		$count = mysql_affected_rows();
		$DQ = mysql_query("SELECT * FROM `artifactimage` WHERE item='$Item'");
			$fetch = mysql_fetch_array($DQ);
			$DIMAGE = $fetch['Image'];
		if ($count > 0) {
			unlink('../');
			header("location:../collections.php?Deleted=$Item");
		}
		else{
			die("Delete Failed.".mysql_error());
		}
	}
}
else{
	die("Access Denied!");
}
?>