<?php 
	include('./config/header.php');
?>
	<div class="container">
		<div class="collection-head form-group">
                        <form class="form-group" method="GET">
                              <select name="By" class="form-input-custom">
                                    <option>All</option>
                                    <option value="ItemName">Item Name</option>
                                    <option value="ArtifactID">Artifact ID</option>
                                    <option value="Description">Description</option>
                              </select><br>
					<input type="text" name="Search" placeholder="Search collections..." class="form-input-custom">
					<button type="submit" class="btn btn-default form-control-sm"><i class="fa fa-search"></i></button> 
				</form>
				<hr>
		</div>
      <!-- Page Heading -->
            <h1>PhilRice Rice Science Museum Collection</h1>
      <div class="row">
      	<div class="collection-body">
                  <?php
                        if (isset($_GET['search'])) {
                              $SearchBy = $_GET['By'];
                              $SearchContent = $_GET['Search'];

                              $query = mysql_query("SELECT * FROM artifactinfo, artifactimage , basicinfo WHERE `artifactinfo`.ArtifactItemID = `artifactimage`.ArtifactItemID AND `artifactinfo`.ArtifactItemID = `basicinfo`.ArtifactItemID AND `artifactimage`.Primary_Image = 'YES'  ORDER BY `basicinfo`.AccessionNumber DESC");
                              $count = mysql_num_rows($query);
                              if ($count>0) {
                                    // $kuha = mysql_query("SELECT * FROM `artifactimage`, `artifactinfo` WHERE `artifactinfo`.ArtifactItemID = `artifactimage`.ArtifactItemID");
                                     while($fetchh = mysql_fetch_array($query)){
                                          // $fetchh = mysql_fetch_array($kuha);
                                          $Image = $fetchh['Image'];
                                          $ArtifactName = $fetchh['ArtifactName'];
                                          $ArtifactItemID = $fetchh['ArtifactItemID'];
                                          $AccessionNumber = $fetchh['AccessionNumber'];
                                          ?>
                                          <a class="href" href='viewitem.php?item=<?php echo $ArtifactItemID; ?>'>
                                          <div class="col-xs-3 hover-pointer collection-padding collection-mobile-view">
                                          <?php
                                                echo "<img src='uploads/Collections/PrimaryImage/".$Image."' class='collection-img img-rounded'>
                                                      <h4 class='black'>".$ArtifactName."</h4>
                                                      <p class='black'>".$AccessionNumber."</p>
                                                </div></a>";
                                    
                              }
                              }
                              else{
                                    echo "NO CONTENT";
                              }
                        }
                        else{
                              $query = mysql_query("SELECT * FROM artifactinfo, artifactimage , basicinfo WHERE `artifactinfo`.ArtifactItemID = `artifactimage`.ArtifactItemID AND `artifactinfo`.ArtifactItemID = `basicinfo`.ArtifactItemID AND `artifactimage`.Primary_Image = 'YES' ORDER BY `basicinfo`.AccessionNumber DESC");
                              $count = mysql_num_rows($query);
                              if ($count>0) {
                                    // $kuha = mysql_query("SELECT * FROM `artifactimage`, `artifactinfo` WHERE `artifactinfo`.ArtifactItemID = `artifactimage`.ArtifactItemID");
                                     while($fetchh = mysql_fetch_array($query)){
                                          // $fetchh = mysql_fetch_array($kuha);
                                          $Image = $fetchh['Image'];
                                          $ArtifactName = $fetchh['ArtifactName'];
                                          $ArtifactItemID = $fetchh['ArtifactItemID'];
                                          $AccessionNumber = $fetchh['AccessionNumber'];
                                          ?>
                                          <a class="href" href='viewitem.php?item=<?php echo $ArtifactItemID; ?>'>
                                          <div class="col-xs-3 hover-pointer collection-padding collection-mobile-view">
                                          <?php
                                                echo "<img src='uploads/Collections/PrimaryImage/".$Image."' class='collection-img img-rounded'>
                                                      <h4 class='black'>".$ArtifactName."</h4>
                                                      <p class='black'>".$AccessionNumber."</p>
                                                </div></a>";
                                    
                              }
                              }
                              else{
                                    echo "NO CONTENT";
                              }
                        }
                             
                  ?>
      	</div>
      </div>
      </div>
<?php 
	include('./config/footer.php');
?>