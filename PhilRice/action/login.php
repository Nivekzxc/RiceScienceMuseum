<?php
	include("../config/db.php"); 
	if(isset($_POST['LogIn'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];


		$usern = md5($user);
		$passw = md5($pass);
		echo $usern.' '.$passw;
		$Queryy = mysql_query("SELECT Username FROM AccountInfo WHERE `Username` = '$usern'");
		if($Queryy == false){
			die(mysql_error());
		}
		else{
			$UserConfirm = mysql_num_rows($Queryy);
		}
		echo $UserConfirm;
		if($UserConfirm>0){

				$Query = mysql_query("SELECT * FROM accountinfo WHERE `Username` = '$usern' AND `Password` = '$passw'");
					if($Query == false){
						die(mysql_error());
					}
					else{
				$checkAccount = mysql_num_rows($Query);
				echo $checkAccount;
						if($checkAccount != 0){
							session_start();
								$_SESSION['myUser'] = $usern;
								$_SESSION['myPass'] = $passw;
								header("Location:../index.php?LogInComplete");

							}
						else{
								header("Location:../index.php?IncorrectUsernameOrPassword");
							}
				}
				}
		else{
				header("Location:../index.php?IncorrectUsernameOrPassword");
			}
		}
 ?>