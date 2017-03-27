<?php
session_start();
if(!isset($_SESSION['cart'])){
  header("Location:index.php");
}
include_once "db_connect.php";
include_once "helper.php";
include_once "header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h3>My Music Store</h3>
    </div>
    <div class="col-md-6 text-right">
      <h3><i>Cart Details</i></h3>
    </div>
  </div>
  <hr>
  <?php
  $cart_tracks = join($_SESSION['cart']['u_items'],',');
  $total_price = 0;
  //var_dump($cart_tracks);die;
  //var_dump($_SESSION);die;
	$sql = "SELECT *,a.Title as al_title,m.Name as media_type,g.Name as g_name,t.Name FROM Track t, Album a, Genre g, MediaType m WHERE t.MediaTypeId = m.MediaTypeId and t.AlbumId = a.AlbumId and t.GenreId = g.GenreId and t.trackId IN ($cart_tracks);";
  //var_dump($sql);
	$result = $conn->query($sql);
  //var_dump($result);die;
	if ($result->num_rows > 0) {
   
  ?>
  <table id="music_table" class="table table-striped table-bordered dt-responsive" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="18%">Track Name</th>
                <th width="18%">Album Name</th>
                <th width="5%">Genre</th>
                <th width="18%">Composer</th>
                <th width="10%">Media Type</th>
                <th width="5%">Duration</th>
                <th width="8%">Bytes</th>
                <th width="5%">Quantity</th>                
                <th width="5%">Price</th>                
            </tr>
        </thead>
        <tbody>
        	<?php 
        	 // output data of each row
		    while($row = $result->fetch_assoc()) {
		      //var_dump($row);die;
          $current_quantity = $_SESSION['cart']['items'][$row['TrackId']]['quantity'];
          $total_price = $current_quantity+$total_price;
        	?>
            <tr>
                <td><?php echo html_entity_decode($row["Name"]);?></td>
                <td><?php echo html_entity_decode($row["al_title"]);?></td>
                <td><?php echo html_entity_decode($row["g_name"]);?></td>
                <td><?php echo html_entity_decode($row["Composer"]);?></td>
                <td><?php echo html_entity_decode($row["media_type"]);?></td>
                <td><?php echo formatSeconds($row["Milliseconds"]);?></td>
                <td><?php echo FileSizeConvert($row["Bytes"]);?></td>
                <td><?php echo $current_quantity;?></td>
                <td><?php echo "$".$current_quantity*0.99;?></td>                
            </tr>
            <?php }?>
        </tbody>
    </table>
<?php
} else {
    echo "0 results";
}
$_SESSION['cart']['total_price'] = $total_price;
?>
<br>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
      <div class="col-md-6">
        <h3>Total Price</h3>
      </div>
      <div class="col-md-6 text-right">
        <h3><?php echo "$".$total_price*0.99;?></h3>
      </div>
    </div>

      <hr>
      <div class="row">
        <div class="col-md-6 text-left">
          <a href="clear_cart.php" class="btn btn-danger">Clear Cart</a>
        </div>
        <div class="col-md-6 text-right">
          <a href="checkout.php" class="btn btn-success"><h4>Checkout</h4></a>
        </div>
      </div>
   </div>
</div>



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
