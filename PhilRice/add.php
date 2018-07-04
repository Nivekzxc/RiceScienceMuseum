<?php
	include('./config/header.php');
if (isset($_SESSION['myUser'])){
	if(isset($_GET['Item'])){
?>	
	<div class="container">
		<div class="collections">
			<div class="collection-head form-group">
				<hr>
			</div>
			<div class="collection-head">
			<form method="post" enctype="multipart/form-data" action="action/AddItem.php">
				<h2><input type="text" name="ItemName" placeholder="Item Name..." class="input-content center" required></h2>
				<h6><?php 
						$curdate = date("m-d-Y h:i:sa");
						$identifier = hash("crc32b", $curdate);
						echo $identifier;
					?>
				</h6>
			</div>	
					<div class="container">
					<div class="col-lg-11">
						<div class="row center">
							<label for="ItemPrimaryPhoto">Choose Primary Photo</label>
							<input type="file" accept="image/*" onchange="loadFile(event)" name="ItemPrimaryPhoto" class="form-control">
							<img id="output" class="col-xs-4" />
							<script>
							  var loadFile = function(event) {
							    var output = document.getElementById('output');
							    output.src = URL.createObjectURL(event.target.files[0]);
							  };
							</script>
						</div>
					</div>
					<div class="col-lg-11">
					    <div class="row">
								<div class="col-lg-12">
									<label for="ItemPhoto">Choose Additional Photos(can choose multiple photos)</label>
									<input type="file" class="form-control" id="piktyur" name="ItemPhoto[]" onchange="preview_images();" multiple accept="image/*" />
								</div>
						</div>
						<div class="row" id="Pakita_piktyur"></div>
					</div>
					</div>
					<div class="container">
						<div class="col-xs-3">
							
						</div>
					</div>
					<script>
					function preview_images() 
					{
						var total_file=document.getElementById("piktyur").files.length;
						for(var i=0;i<total_file;i++)
						{
							$('#Pakita_piktyur').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
						}
					}
					</script>
					<input type="text" name="ArtifactItemID" class="input-content" hidden value="<?php echo $identifier; ?>">
					<input type="text" name="curdate" class="input-content" hidden value="<?php echo $curdate; ?>">
			<div class="no-top-space">
			<div class="collections-body-half collections-body-half-mobile">
				<table class="table table-style1">
					<th colspan="2" class="text-center"><h3>Basic Information</h3></th>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Accession Number</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="ArtifactID" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Local Name</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="LocalName" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Tagalog Term</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="TagalogTerm" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Classification</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Classification" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Artist / Maker</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="ArtistMaker" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Location / Providence</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="GeographicLocation" class="input-content" required></td>
				</table>
			</div>
			<div class="collections-body-half collections-body-half-mobile">
				<table class="table table-style1">
					<th colspan="2" class="text-center"><h3>Artifact Description</h3></th>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Physical Description</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="PhysicalDescription" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Height</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Length" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Width</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Width" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Depth</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Depth" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Weight</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Weight" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Measuring Remarks</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="MeasuringRemarks" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Condition</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Condition" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Materials</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Materials" class="input-content" required></td></tr>
				</table>
			</div>
			</div>
			<div class="no-top-space">
			<div class="collections-body-half collections-body-half-mobile">
				<table class="table table-style1">
					<th colspan="2" class="text-center"><h3>Research Remarks</h3></th>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Published Description</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="PublishedDescription" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Description</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Description" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Exhibition Used</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Exhibition" class="input-content" required></td></tr>
				</table>
			</div>
			<div class="collections-body-half collections-body-half-mobile">
				<table class="table table-style1">
					<th colspan="2" class="text-center"><h3>History</h3></th>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Notes</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Notes" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Current Location</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="ArcheologicalData" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Credit Line / Dedication</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="CreditLineDedication" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Reproduction</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="Reproduction" class="input-content" required></td></tr>
					<tr class="text-left">
					<td class="col-xs-3 td-mobile-xs-3" >Reproduction Information</td>
					<td class="col-xs-9 td-mobile-xs-9" ><input type="text" name="ReproductionInformation" class="input-content" required></td></tr>
				</table>
			</div>
			<br><hr>
				<input type="submit" class="btn btn-primary" name='submit_image' value="Upload Item" data-toggle="modal" data-target=".bs-example-modal-lg"/>
			</form>
			
		</div>
	</div>
</div>
<?php
	}
	else if(isset($_GET['Research'])){
?>
	<div class="container">
		<div class="collections-left">
			<div class="collection-head form-group">
				<form method="post" enctype="multipart/form-data" action="action/add.php">
					<h2><input type="text" name="Title" placeholder="Title" class="input-content border-input" required></h2>
					<h3><input type="text" name="Subject" placeholder="Subject" class="input-content border-input" required></h3>
					<h5>By: <?php echo $FullName; ?></h5>
					<h6><?php 
							$curdatehrs = date("m-d-Y h:i:sa");
							$curdate = date("M d, Y");
							$identifier = hash("crc32b", $curdatehrs);
							echo $curdate;
						?>
					</h6>
					<div class="container">
						<div class="col-xs-4">
						    <div class="form-group">
						        <label>Attach Image</label>
						        <div class="input-group">
						            <span class="input-group-btn">
						                <span class="btn btn-default btn-file">
						                    Browse… <input type="file" id="imgInp" name="file[]" required accept="image/*">
						                </span>
						            </span>
						            <input type="text" class="form-control" readonly>
						        </div>
						        <img id='img-upload'/>
						    </div>
						</div>
					</div>
					<div>
						<textarea class="text-area border-input" name="Content" placeholder="Content" rows="25"></textarea>
					</div>
					<div class="display-inline">
						<h4>Allowed on Footer?</h4>
							<label>Yes <input type="radio" name="Allowed" value="Yes"></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label>No <input type="radio" name="Allowed" value="No"></label>
					</div>
					<hr>
					<input type="submit" class="btn btn-primary" name='submit_research' value="Upload Research" data-toggle="modal" data-target=".bs-example-modal-lg"/>
				</form>
			</div>
		</div>
	</div>
<?php
	}
	elseif(isset($_GET['PhotoEssay'])){
		?>
		<div class="container">
			<h1>Photo Essay</h1>
			<hr>
				<div class="form-group">
					<label>Choose photo</label>
						<div class="input-group col-xs-7">
						    <span class="input-group-btn">
						        <span class="btn btn-default btn-file">
						            Browse… <input type="file" id="imgInp" name="PhotoImg" required accept="image/*">
						        </span>
						    </span>
						    <input type="text" class="form-control" readonly>
						</div>
						<div class="photoessay-upload">
							<img id='img-upload'>
						</div>
					<div class="input-group col-xs-12">
						<textarea class="text-area border-input" name="PhotoEssayDesc" placeholder="Text for the photo..." rows="5"></textarea>
					</div>
				</div>
				<hr>
				<button type="submit" class="btn btn-primary">ADD</button>
				<br>
		</div>
		<br>
<?php
	}
	else{
		echo "<h1>No Content...</h1>";
	}
	include('./config/footer.php');
}
	else{
		die("Restricted... for admin only..");
	}
?>