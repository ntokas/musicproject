<?php include_once "db_connect.php";?>
<?php include_once 'helper.php';?>  
<?php include_once 'header.php';?>  
<div class="container" style="margin-top:5%">
  <h3 class="text-center">MyMusic Receipt : Invoice ID : <?php echo $_GET['id'];?></h3>
  <hr>
   <?php
   $id = $_GET['id'];
  $sql = "SELECT a.*,b.FirstName,B.LastName FROM Invoice as a,Customer as b WHERE a.CustomerId=b.CustomerId AND InvoiceId=$id;";
  //var_dump($sql);
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Customer Name</h3>
      </div>
      <div class="panel-body text-center">
        <?php echo html_entity_decode($row["FirstName"]);?>&nbsp;<?php echo html_entity_decode($row["LastName"]);?>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Address</h3>
      </div>
      <div class="panel-body text-center">
        <?php echo html_entity_decode($row["BillingAddress"]).", ";?>
        <?php if(trim($row["BillingCity"])) echo html_entity_decode($row["BillingCity"]).", ";?>
        <?php if(trim($row["BillingState"])) echo html_entity_decode($row["BillingState"]).", ";?><?php echo html_entity_decode($row["BillingCountry"]);?>
        <br>
        <?php echo html_entity_decode($row["BillingPostalCode"]);?>
      </div>
    </div>
  </div>
  
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Date</h3>
      </div>
      <div class="panel-body text-center">
        <?php echo date('M d, Y',strtotime($row["InvoiceDate"]));?>
      </div>
    </div>
  </div>

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Total</h3>
        </div>
        <div class="panel-body text-center">
          <?php echo "$".$row["Total"];?>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <h3 class="text-center">Tracks Purchased</h3>
  <hr>
<?php
}} else {
    echo "0 results";
}
$sql = "SELECT * FROM InvoiceLine WHERE InvoiceId=$id;";
$result1 = $conn->query($sql);

  if ($result1->num_rows > 0) {
   
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
                <th width="8%">File Size</th>
                <th width="5%">Price</th>                              
                <th width="5%">Quantity</th>                              
            </tr>
        </thead>
        <tbody>
          <?php 
           // output data of each row
        while($row1 = $result1->fetch_assoc()) {
          //var_dump($row1);die;
          $track_id = $row1['TrackId'];
          $sql = "SELECT *,a.Title as al_title,m.Name as media_type,g.Name as g_name,t.Name FROM Track t, Album a, Genre g, MediaType m WHERE t.MediaTypeId = m.MediaTypeId and t.AlbumId = a.AlbumId and t.GenreId = g.GenreId and t.TrackId=$track_id;";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              //var_dump($row1);die;
          ?>
          <tr>
                <td><?php echo html_entity_decode($row["Name"]);?></td>
                <td><?php echo html_entity_decode($row["al_title"]);?></td>
                <td><?php echo html_entity_decode($row["g_name"]);?></td>
                <td><?php echo html_entity_decode($row["Composer"]);?></td>
                <td><?php echo html_entity_decode($row["media_type"]);?></td>
                <td><?php echo formatSeconds($row["Milliseconds"]);?></td>
                <td><?php echo FileSizeConvert($row["Bytes"]);?></td>
                <td><?php echo "$".$row1["UnitPrice"];?></td>                
                <td><?php echo $row1["Quantity"];?></td> 
                </tr>               
            <?php }}}?>
        </tbody>
    </table>
<?php
} else {
    echo "0 results";
}

?>

  
  <hr>

  
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#music_table').DataTable( {
    responsive: true,bSort: false
} );
} );

</script>
</body>
</html>