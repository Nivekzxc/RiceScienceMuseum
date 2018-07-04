<?php 
	session_start();
	include('../config/db.php');

	if(isset($_POST['SubmitEdit'])){
		$item = $_GET['Item'];
		$Accession = $_POST['AccessionNumber'];
		$LocalName = $_POST['LocalName'];
		$TagalogTerm = $_POST['TagalogTerm'];
		$Classification = $_POST['Classification'];
		$ArtistMaker = $_POST['ArtistMaker'];
		$GeographicLocation = $_POST['GeographicLocation'];
		$PhysicalDescription = $_POST['PhysicalDescription'];
		$Height = $_POST['Length'];
		$Width = $_POST['Width'];
		$Depth = $_POST['Depth'];
		$Weight = $_POST['Weight'];
		$MeasuringRemarks = $_POST['MeasuringRemarks'];
		$Condition = $_POST['Condition'];
		$Materials = $_POST['Materials'];
		$PublishedDescription = $_POST['PublishedDescription'];
		$Description = $_POST['Description'];
		$Exhibition = $_POST['Exhibition'];
		$Notes = $_POST['Notes'];
		$ArcheologicalData = $_POST['ArcheologicalData'];
		$CreditLine = $_POST['CreditLineDedication'];
		$Reproduction = $_POST['Reproduction'];
		$ReproductionInformation = $_POST['ReproductionInformation'];

		echo $Accession." ".$LocalName." ".$TagalogTerm." ".$Classification." ".$ArtistMaker." ".$GeographicLocation." ".$PhysicalDescription." ".$Height." ".$Width." ".$Depth." ".$Weight." ".$MeasuringRemarks." ".$Condition." ".$Materials." ".$PublishedDescription." ".$Description." ".$Exhibition." ".$Notes." ".$ArcheologicalData." ".$CreditLine." ".$Reproduction." ".$ReproductionInformation ;

			
			$QueryUpdateBI = mysql_query("UPDATE `basicinfo` SET `Classification`='$Classification' ,`Artist`='$ArtistMaker' ,`GeoLoc`='$GeographicLocation' ,`LocalName`='$LocalName' ,`TagalogTerm`='$TagalogTerm' ,`AccessionNumber`='$Accession' WHERE `ArtifactItemID`='$item'");

			$QueryUpdateAI = mysql_query("UPDATE `physicalanalysis` SET `PhysicalDescription`='$PhysicalDescription',`Height`='$Height',`Width`='$Width',`Depth`='$Depth',`Weight`='$Weight',`MeasureRemarks`='$MeasuringRemarks',`Materials`='$Materials',`ConditionItem`='Condition' WHERE `ArtifactItemID`='$item'");
			
			$QueryUpdateRR = mysql_query("UPDATE `researchremarks` SET `PublishedDesc`='$PublishedDescription',`Description`='$Description',`Exhibitions`='$Exhibition' WHERE `ArtifactItemID`='$item'");

			$QueryUpdateAH = mysql_query("UPDATE `artifacthistory` SET `CurrentLocation`='$ArcheologicalData',`Credit`='$CreditLine',`Repro`='$Reproduction',`ReproInfo`='$ReproductionInformation',`Notes`='$Notes' WHERE `ArtifactItemID`='$item'");

			if (mysql_affected_rows()>0) {
				header("location:../viewitem.php?item=$item");
			}
			else{
				header("location:../viewitem.php?item=$item");
			}
	}
 ?>