<?php
include_once "db_connect.php";
include_once "helper.php";
$sql = "SELECT Name FROM Genre WHERE GenreId = {$_GET['genre_id']};";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $Genre_name = $row['Name'];
    }
  }
  else{
    header("Location:index.php");
  }
include_once "header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h3>My Music Store</h3>
    </div>
    <div class="col-md-6 text-right">
      <h3><i><?php echo $Genre_name;?> : Genre</i></h3>
    </div>
  </div>
  <div id="alert_box"></div>
  <hr>
  <?php
	$sql = "SELECT *,a.Title as al_title,m.Name as media_type,g.Name as g_name,t.Name FROM Track t, Album a, Genre g, MediaType m WHERE t.MediaTypeId = m.MediaTypeId and t.AlbumId = a.AlbumId and t.GenreId = g.GenreId and t.status>0 and t.GenreId={$_GET['genre_id']};";
	$result = $conn->query($sql);
  //var_dump($result);die;
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
                <td><button class="btn btn-success" onClick="AddToCart(<?php echo $row['TrackId'];?>);">Add to Cart(<?php echo "$ ".$row["UnitPrice"];?>)</button></td>                
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


function AddToCart(id) {
    var data_url = "addToCart.php?id="+id;
      $.get( data_url, function( data ) {
        $('#alert_box').html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong>Track Added to Cart!</strong>'+
            '</div>');
    });
   }

</script>
</body>
<?php $conn->close();?>
</html>
