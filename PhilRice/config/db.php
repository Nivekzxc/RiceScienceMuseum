<?php 
	$Kunek = mysql_connect("localhost","root","");
		if(!$Kunek)
			die("di makaKunek sa database ng museum!!".mysql_error());

	$SelectDB = mysql_select_db("ricemuseum",$Kunek);
		if(!$SelectDB)
			die("please create a database...");;
?>