<?php
include_once "../db_connect.php";
include_once "../helper.php";

if($_GET['type_id']==1)
    $search_type = "Song(s)";
elseif($_GET['type_id']==2)
    $search_type = "Artist(s)";
elseif($_GET['type_id']==3)
    $search_type = "Album(s)";
elseif($_GET['type_id']==4)
    $search_type = "Genre";
elseif($_GET['type_id']==5)
    $search_type = "Keyword";

?>

<div class="container">
  <div class="row">
    <div class="col-md-6 text-left">
      <h4><i>Search Type</i></h4>
    </div>
    <div class="col-md-6 text-right">
      <h4><i><?php echo $search_type;?></i></h4>
    </div>
  </div>
  <div id="alert_box"></div>
  <hr>
  <div class="row">
    <div class="col-md-12 text-center">
      <h4><i>Search Text : <?php echo $_GET['q'];?></i></h4>
    </div>
  </div>
  <hr>
  
  <?php
  if($_GET['type_id']==1||$_GET['type_id']==5) {
	$sql = "SELECT *,a.Title as al_title,m.Name as media_type,g.Name as g_name,t.Name FROM Track t, Album a, Genre g, MediaType m WHERE t.MediaTypeId = m.MediaTypeId and t.AlbumId = a.AlbumId and t.GenreId = g.GenreId and t.status>0 and t.Name LIKE '{$_GET['q']}%';";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
   
  ?>
  <table id="music_table" class="table table-striped table-bordered dt-responsive" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="20%">Track Name</th>
                <th width="20%">Album Name</th>
                <th width="5%">Genre</th>
                <th width="20%">Composer</th>
                <th width="10%">Media Type</th>
                <th width="5%">Duration</th>
                <th width="8%">Bytes</th>
                <th width="5%">Price</th>                
            </tr>
        </thead>
        <tbody>
        	<?php 
        	 // output data of each row
		    while($row = $result->fetch_assoc()) {
		    //	var_dump($row);die;
        	?>
            <tr>
                <td><?php echo html_entity_decode($row["Name"]);?></td>
                <td><?php echo html_entity_decode($row["al_title"]);?></td>
                <td><?php echo html_entity_decode($row["g_name"]);?></td>
                <td><?php echo html_entity_decode($row["Composer"]);?></td>
                <td><?php echo html_entity_decode($row["media_type"]);?></td>
                <td><?php echo formatSeconds($row["Milliseconds"]);?></td>
                <td><?php echo FileSizeConvert($row["Bytes"]);?></td>
                <td>
                    <button class="btn btn-success" onClick="AddToCart(<?php echo $row['TrackId'];?>);">Add to Cart(<?php echo "$ ".$row["UnitPrice"];?>)</button>
                </td>                
            </tr>
            <?php }?>
        </tbody>
    </table>
<?php
        } else {
        echo "0 results";
        }
    }
    //end of songs search
    elseif ($_GET['type_id']==2) {

    $sql = "SELECT * FROM Artist WHERE status>0 and Name LIKE '{$_GET['q']}%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
   
  ?>
  <table id="music_table" class="table table-striped table-bordered dt-responsive" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Artist</th>                
            </tr>
        </thead>
        <tbody>
            <?php 
             // output data of each row
            while($row = $result->fetch_assoc()) {
            //  var_dump($row);die;
            ?>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-md-7"><?php echo html_entity_decode($row["Name"]);?></div>
                        <div class="col-md-5 text-right">
                            <a class="btn btn-default" href="artist_album.php?id=<?php echo $row['ArtistId']?>">
                                <i class="glyphicon glyphicon-cd"></i> Show Albums
                            </a>
                        </div>
                    </div>
            </tr>
            <?php }?>
        </tbody>
    </table>
<?php
        } else {
            echo "0 results";
        }
    }
        //end of artist search
    elseif ($_GET['type_id']==3) {
        
    $sql = "SELECT * FROM Album WHERE status>0 and Title LIKE '{$_GET['q']}%';";
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
            //  var_dump($row);die;
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
    }
    //end of album search

?>
</div>

<script type="text/javascript">
$(document).ready(function() {
    
} );
</script>
<?php $conn->close();?>
