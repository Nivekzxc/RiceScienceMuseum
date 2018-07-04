<?php
session_start();
include('../config/db.php');
				if (isset($_POST['submit_image'])) {
					$ItemName = $_POST['ItemName'];
					$ArtifactItemID = $_POST['ArtifactItemID'];
					$ArtifactID = $_POST['ArtifactID'];
					$Classification = $_POST['Classification'];
					$ArtistMaker = $_POST['ArtistMaker'];
					$GeographicLocation = $_POST['GeographicLocation'];
					$LocalName = $_POST['LocalName'];
					$TagalogTerm = $_POST['TagalogTerm'];
					$PhysicalDesc = $_POST['PhysicalDescription'];
					$Length = $_POST['Length'];
					$Width = $_POST['Width'];
					$Weight = $_POST['Weight'];
					$Depth = $_POST['Depth'];
					$MeasuringRemarks = $_POST['MeasuringRemarks'];
					$Materials = $_POST['Materials'];
					$Condition = $_POST['Condition'];
					$PublishedDescription = $_POST['PublishedDescription'];
					$Description = $_POST['Description'];
					$Exhibition = $_POST['Exhibition'];
					$ArcheologicalData = $_POST['ArcheologicalData'];
					$CreditLineDedication = $_POST['CreditLineDedication'];
					$Reproduction = $_POST['Reproduction'];
					$ReproductionInformation = $_POST['ReproductionInformation'];
					$Notes = $_POST['Notes'];
					$curdate = $_POST['curdate'];
				    $error=array();
				    $extension=array("jpeg","jpg","png","gif");

				    $target_names=$_FILES["ItemPrimaryPhoto"]["name"];
					$target_tmp=$_FILES["ItemPrimaryPhoto"]["tmp_name"];
					$target_ext=pathinfo($target_names,PATHINFO_EXTENSION);
					$targetname=basename($target_names,$target_ext);
					$target_name=md5($target_names).".".$target_ext;
					$Primary = "YES";
				    $uploaded = move_uploaded_file($_FILES["ItemPrimaryPhoto"]["tmp_name"],"../uploads/collections/primaryimage/".$ArtifactItemID.$target_name);
				    $Name = $ArtifactItemID.$target_name;

			        $insertprimaryinfo = mysql_query("INSERT INTO `artifactinfo`(`ArtifactItemID`, `ArtifactName`,`DateAdded`) VALUES ('$ArtifactItemID','$ItemName','$curdate')");
			        $count = mysql_affected_rows();

			        $insertprimaryimg = mysql_query("INSERT INTO `artifactimage`(`Image`, `Primary_Image`, `ArtifactItemID`) VALUES ('$Name','$Primary','$ArtifactItemID')");
					$countpimg = mysql_affected_rows();

			        if ($count > 0 && $countpimg > 0) {
			        	$insertbasicinfo = mysql_query("INSERT INTO `basicinfo`(`Classification`, `Artist`, `GeoLoc`, `LocalName`, `TagalogTerm`,`AccessionNumber`,`ArtifactItemID`) VALUES ('$Classification','$ArtistMaker','$GeographicLocation','$LocalName','$TagalogTerm','$ArtifactID','$ArtifactItemID')");
			        	$count1 = mysql_affected_rows();

			            $insertphysicalinfo = mysql_query("INSERT INTO `physicalanalysis`(`PhysicalDescription`, `Height`, `Width`, `Depth`, `Weight`, `MeasureRemarks`, `Materials`, `ConditionItem`, `ArtifactItemID`) VALUES ('$PhysicalDesc','$Length','$Width','$Depth','$Weight','$MeasuringRemarks','$Materials','$Condition','$ArtifactItemID')");
			            $count2 = mysql_affected_rows();

			            $insertresearchremarks = mysql_query("INSERT INTO `researchremarks`(`PublishedDesc`, `Description`, `Exhibitions`, `ArtifactItemID`) VALUES ('$PublishedDescription','$Description','$Exhibition','$ArtifactItemID')");
			            $count3 = mysql_affected_rows();

			            $insertartifacthistory = mysql_query("INSERT INTO `artifacthistory`(`CurrentLocation`, `Credit`, `Repro`, `ReproInfo`, `Notes`, `ArtifactItemID`) VALUES ('$ArcheologicalData','$CreditLineDedication','$Reproduction','$ReproductionInformation','$Notes','$ArtifactItemID')");


			                if ($count1>0 && $count2>0 && $count3>0) {
			                	$Primary = 'NO';
			                	foreach ($_FILES["ItemPhoto"]["tmp_name"] as $key=>$tmp_name) {
								 	$file_names=$_FILES["ItemPhoto"]["name"][$key];
					                $file_tmp=$_FILES["ItemPhoto"]["tmp_name"][$key];
					                $ext=pathinfo($file_names,PATHINFO_EXTENSION);
					                $filename=basename($file_names,$ext);
					                $file_name=md5($file_names).".".$ext;

					                
			                		if(in_array($ext,$extension)){
			                    		if(!file_exists("uploads/".$ArtifactItemID.$file_name)){
			                    	// echo $file_names."<br>".$filename."<br>".$file_name;
			                       		$uploadd = move_uploaded_file($file_tmp=$_FILES["ItemPhoto"]["tmp_name"][$key],"../uploads/collections/".$ArtifactItemID.$file_name);
			                       		$insertimage = mysql_query("INSERT INTO `artifactimage`(`Image`,`Primary_Image`, `ArtifactItemID`) VALUES ('$ArtifactItemID$file_name','$Primary','$ArtifactItemID')");
			        					$countimg = mysql_affected_rows();

			        					$Success = '1';
			                    		}
					                    else
					                    {
					                        $filename=basename($file_name,$ext);
					                        $newFileName=$filename.time().".".$ext;
					                        $Success = '0';
					                    }
			                		}
			                		else
					                {
					                	$Success = '0';
					                    array_push($error,"$file_name");
					                }
							}
			                }
			                else{
			                    die("error inserting basic info please reload the page...".mysql_error());
			                    $Success = '0';
			                }
			        }
			        else{
			            $Success = '0';
			        }
			        if($Success > 0){
				                header("location:../Collections.php?Added");
							}
							else{
								header("location:../Collections.php?Failed");
							}
				}
			 ?>