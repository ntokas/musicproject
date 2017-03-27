<?php
include_once "db_connect.php";
include_once "helper.php";
include_once "header.php";
?>

<div class="container">
  <h3>My Music Store</h3>
  <hr>
  <?php
	$sql = "SELECT * FROM Artist where status>0";
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
		    //	var_dump($row);die;
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
