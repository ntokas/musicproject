<?php
include_once "db_connect.php";
include_once "helper.php";
$sql = "SELECT Name FROM Artist WHERE ArtistId = {$_GET['id']};";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $artist_name = $row['Name'];
    }
  }
  else{
    header("Location:artist.php");
  }
include_once "header.php";

?>

  
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h3>My Music Store</h3>
    </div>
    <div class="col-md-6 text-right">
      <h3><i><?php echo $artist_name;?> Album(s)</i></h3>
    </div>
  </div>
  <hr>
  <?php
	$sql = "SELECT * FROM Album WHERE status>0 and ArtistId = {$_GET['id']};";
  $result = $conn->query($sql);
	if ($result->num_rows > 0) {
   
  ?>
  <table id="music_table" class="table table-striped table-bordered dt-responsive" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Album(s)</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
        	 // output data of each row
		    while($row = $result->fetch_assoc()) {
		    //	var_dump($row);die;
        	?>
            <tr>
                <td>
                  <div class="row">
                    <div class="col-md-9"><?php echo html_entity_decode($row["Title"]);?></div>
                    <div class="col-md-3 text-right">
                      <a class="btn btn-default" href="album_tracks.php?id=<?php echo $row['AlbumId']?>">
                        <i class="glyphicon glyphicon-music"></i> Show Tracks
                      </a>
                    </div>
                  </div>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
<?php
} else {
    echo "0 results";
}

?>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#music_table').DataTable( {
    responsive: true,
    searching:false
} );
} );
</script>
</body>
<?php $conn->close();?>
</html>
