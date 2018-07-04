<?php 
	include('./config/header.php');
?>
	<div class="container">
		<div class="collections">
			<div class="collection-head form-group">
				<form method="POST">
					<input type="text" name="search" placeholder="Search collections..." class="form-input-custom">
					<button type="submit" class="btn btn-default form-control-sm"><i class="fa fa-search"></i></button>
				</form>
				<hr>
			</div>
			<div class="collection-head">
				<?php
					if(isset($_GET['item'])){
						$item = $_GET['item'];
						$Querry = mysql_query("SELECT * FROM `basicinfo` a ,`artifactinfo` b ,`artifacthistory` c ,`artifactimage` d,`physicalanalysis` e,`researchremarks` f WHERE a.`artifactItemID` = '$item' AND b.`artifactItemID` = '$item' AND c.`artifactItemID` = '$item' AND d.`artifactItemID` = '$item' AND e.`artifactItemID` = '$item' and f.`artifactItemID` = '$item' AND d.`Primary_Image` = 'YES'");
							$Count = mysql_num_rows($Querry);
							if ($Count == 1) {
								$fetch = mysql_fetch_array($Querry);
								$Img = $fetch['Image'];
								$Name = $fetch['ArtifactName'];
								$Class = $fetch['Classification'];
								$Artist = $fetch['Artist'];
								$GeoLoc = $fetch['GeoLoc'];
								$LocalName = $fetch['LocalName'];
								$TagalogTerm = $fetch['TagalogTerm'];
								$AccessionNumber = $fetch['AccessionNumber'];
								$PhysicalDescription = $fetch['PhysicalDescription'];
								$Height = $fetch['Height'];
								$Width = $fetch['Width'];
								$Depth = $fetch['Depth'];
								$Weight = $fetch['Weight'];
								$MeasureRemarks = $fetch['MeasureRemarks'];
								$Materials = $fetch['Materials'];
								$ConditionItem = $fetch['ConditionItem'];
								$PublishedDesc = $fetch['PublishedDesc'];
								$Description = $fetch['Description'];
								$Exhibitions = $fetch['Exhibitions'];
								$CurrentLocation = $fetch['CurrentLocation'];
								$Credit = $fetch['Credit'];
								$Repro = $fetch['Repro'];
								$ReproInfo= $fetch['ReproInfo'];
								$Notes = $fetch['Notes'];

								$Q = mysql_query("SELECT * FROM `artifactimage` WHERE `primary_image` = 'YES' AND `artifactItemID` = '$item'");

								$Kuha = mysql_fetch_array($Q);

								$PrimaryImage = $Kuha['Image'];
							}
							else{
								die("No Result Found".mysql_error());
							}
					}
					else{
						header("location:collections.php?ChooseAnItem");
					}

				 ?>
				<h2><?php echo $Name ?></h2>
				<h6><?php echo $item ?></h6>

			</div>
			<!-- <div class="collections-image-div">
				<img src="uploads/collections/primaryimage/<?php echo $PrimaryImage;?>" class="collections-image" data-toggle="modal" data-target="#ImageModal">
			</div><br> -->
			<div class="collections-image-div">
				<div class="row overflow-x">
					<?php
						$QImage = mysql_query("SELECT * FROM `artifactimage` WHERE `primary_image` = 'NO' AND `artifactItemID` = '$item'");
							
							while($Pakita = mysql_fetch_array($QImage)){
								$ZXC = $Pakita['Image'];
								echo '<img src="uploads/collections/'.$ZXC.'" class="collections-image" data-toggle="modal" data-target="#ImageModal">';
							}

					?>
				</div>
			</div>
			<div class="modal fade" id="ImageModal" role="dialog">
			    <div class="modal-dialog modal-xlg">
			    
			      <!-- Modal content-->
			      	<div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title"><?php echo $Name; ?> Photos</h4>
			        </div>
			        	<div class="modal-body">
			        		<div class="item-image-modal">
			        			<img src="uploads/collections/primaryimage/<?php echo $PrimaryImage; ?>" class="image-modal" id='imageselected'>
			        		</div>
			        		<hr>
			        		<div class="row">
			        			<?php
			        				$viewq = mysql_query("");
			        			?>
			        		</div>
			        	</div>
			      	</div>
			    </div>
			</div>
			<div class="no-top-space">
			<div class="collections-body-half collections-body-half-mobile">
				<table class="table table-style1">
					<th colspan="2" class="text-center"><h3>Basic Information</h3></th>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Accession Number</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $AccessionNumber; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Local Name</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $LocalName; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Tagalog Term</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $TagalogTerm; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Classification</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $Class; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Artist / Maker</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $Artist; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Location / Providence</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $GeoLoc; ?></td></tr>
				</table>
			</div>
			<div class="collections-body-half collections-body-half-mobile">
				<table class="table table-style1">
					<th colspan="2" class="text-center"><h3>Artifact Description</h3></th>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Physical Description</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $PhysicalDescription; ?></td></tr>
					<tr class="text-left">
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Length</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $Height; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Width</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $Width; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Depth</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $Depth; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Weight</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $Weight; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Measuring Remarks</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $MeasureRemarks; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Materials</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $Materials; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Condition</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $ConditionItem; ?></td></tr>
				</table>
			</div>
			</div>
			<div class="no-top-space">
			<div class="collections-body-half collections-body-half-mobile">
				<table class="table table-style1">
					<th colspan="2" class="text-center"><h3>Research Remarks</h3></th>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Published Description</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $PublishedDesc; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Description</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $Description; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Exhibition Used</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $Exhibitions; ?></td></tr>
				</table>
			</div>
			<div class="collections-body-half collections-body-half-mobile">
				<table class="table table-style1">
					<th colspan="2" class="text-center"><h3>Artifact History</h3></th>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Notes</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $Notes; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Current Location</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $CurrentLocation; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Credit Line / Dedication</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $Credit; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Reproduction</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $Repro; ?></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Reproduction Information</td>
					<td class="col-xs-9 td-mobile-xs-9" ><?php echo $ReproInfo; ?></td></tr>
				</table>
			</div>
			<br><hr>
			<?php
				if (isset($_SESSION['myUser'])) {
					?>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#EditModal">EDIT <span class="fa fa-pencil"></span></button>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal">DELETE <span class="fa fa-times"></span></button>
			<?php
				}
			 ?>
			</div>
			<div class="modal fade" id="EditModal" role="dialog">
			    <div class="modal-dialog modal-lg">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Edit Content</h4>
			        </div>
			        <div class="modal-body">
			        <form method="POST" action="action/edit.php?Item=<?php echo $item; ?>" enctype="multipart/form-data">
			        	<div class="div-inline-input">
				        	<div class="collections-body-half">
				        	<div class="collections-image-div">
								<img src="uploads/collections/<?php echo $ZXC;?>" class="collections-image">
							</div><br>
					        	<table class="table table-style1">
									<th colspan="2" class="text-center"><h3>Basic Information</h3></th>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Accession Number</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="AccessionNumber" value="<?php echo $AccessionNumber; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Local Name</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="LocalName" value="<?php echo $LocalName; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Tagalog Term</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="TagalogTerm" value="<?php echo $TagalogTerm; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Classification</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Classification" value="<?php echo $Class; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Artist / Maker</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="ArtistMaker" value="<?php echo $Artist; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Location / Providence</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="GeographicLocation" value="<?php echo $GeoLoc; ?>" class="input-content"></td>
								</table><br>
								<table class="table table-style1">
									<th colspan="2" class="text-center"><h3>Artifact Description</h3></th>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Physical Description</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="PhysicalDescription" value="<?php echo $LocalName; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Height</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Length" value="<?php echo $Height; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Width</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Width" value="<?php echo $Width; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Depth</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Depth" value="<?php echo $Depth; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Weight</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Weight" value="<?php echo $Weight; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Measuring Remarks</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="MeasuringRemarks" value="<?php echo $MeasureRemarks; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Condition</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Condition" value="<?php echo $ConditionItem; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Materials</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Materials" value="<?php echo $Materials; ?>" class="input-content"></td></tr>
								</table><br>
								<table class="table table-style1">
									<th colspan="2" class="text-center"><h3>Research Remarks</h3></th>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Published Description</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="PublishedDescription" value="<?php echo $PublishedDesc; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Description</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Description" value="<?php echo $Description; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Exhibition Used</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Exhibition" value="<?php echo $Exhibitions; ?>" class="input-content"></td></tr>
								</table><br>
								<table class="table table-style1">
									<th colspan="2" class="text-center"><h3>History</h3></th>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Notes</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Notes" value="<?php echo $Notes; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Current Location</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="ArcheologicalData" value="<?php echo $CurrentLocation; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Credit Line / Dedication</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="CreditLineDedication" value="<?php echo $Credit; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Reproduction</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Reproduction" value="<?php echo $Repro; ?>" class="input-content"></td></tr>
									<tr class="text-left">
									<td class="col-xs-3 td-mobile-xs-3" >Reproduction Information</td>
									<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="ReproductionInformation" value="<?php echo $ReproInfo; ?>" class="input-content"></td></tr>
								</table>
								<hr>
								<button type="submit" class="btn btn-primary" name="SubmitEdit">Update<span class="fa fa-check"></span></button>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</form>
				        		<button type="button" class="btn btn-info" data-dismiss="modal">Cancel <span class="fa fa-arrow-left"></span></button>
				        	</div>

			        	</div>
			        </div>
			      </div>
			      
			    </div>
			</div>
			<div class="modal fade" id="DeleteModal" role="dialog">
			    <div class="modal-dialog modal-sm">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Delete this item?</h4>
			        </div>
			        <div class="modal-body">
			        	<div class="center-block">
				        	<div class="input-group form-group">
					        	<button type="button" class="btn btn-info" data-dismiss="modal">Cancel <span class="fa fa-arrow-left"></span></button>
						    	<a href="action/delete.php?item=<?php echo $item ?>"><div class="btn btn-danger padding-left">Delete <span class="fa fa-close"></span></div></a>
				        	</div>
			        	</div>
			        </div>
			      </div>
			      </div>
			    </div>
			  </div>
		</div>
	</div>
<?php 
	include('./config/footer.php');
?>