<?php
session_start();
if(!isset($_SESSION['cart'])){
  header("Location:index.php");
}
include_once "db_connect.php";
if(isset($_GET['f_name'])){
  $f_name = $_GET['f_name'];
  $l_name = $_GET['l_name'];
  $company = $_GET['company'];
  $address = $_GET['address'];
  $city = $_GET['city'];
  $state = $_GET['state'];
  $country = $_GET['country'];
  $postalcode = $_GET['postalcode'];
  $phone = $_GET['phone'];
  $fax = $_GET['fax'];
  $email = $_GET['email'];

  $customer_sql= "INSERT INTO `Customer`(`FirstName`, `LastName`, `Company`, `Address`, `City`, `State`, `Country`, `PostalCode`, `Phone`, `Fax`, `Email`, `SupportRepId`, `status`) VALUES ('$f_name','$l_name','$company','$address','$city','$state','$country','$postalcode','$phone','$fax','$email',3,2)";
  $result = $conn->query($customer_sql);
  $customer_id = $conn->insert_id;

  $invoice_sql = "INSERT INTO `Invoice`(`CustomerId`, `InvoiceDate`, `BillingAddress`, `BillingCity`, `BillingState`, `BillingCountry`, `BillingPostalCode`, `Total`, `status`) VALUES ($customer_id,'".date('Y-m-d H:i:s')."','$address','$city','$state','$country','$postalcode','".$_SESSION['cart']['total_price']*0.99."',2)";
  $result = $conn->query($invoice_sql);
  $invoice_id = $conn->insert_id;

  foreach ($_SESSION['cart']['items'] as $key => $value) {
    $invoice_line_sql = "INSERT INTO `InvoiceLine`(`InvoiceId`, `TrackId`, `UnitPrice`, `Quantity`, `status`) VALUES ($invoice_id, {$value['id']},0.99,{$value['quantity']},2);";
    $result = $conn->query($invoice_line_sql);

  }
  unset($_SESSION['cart']);
  header("Location:invoice_detail.php?id=$invoice_id");

}

include_once "helper.php";
include_once "header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h3>My Music Store</h3>
    </div>
    <div class="col-md-6 text-right">
      <h3><i>Please Provide Your Details</i></h3>
    </div>
  </div>
  <hr>
  <form class="form-horizontal">
    <div class="form-group">
      <label for="f_name" class="col-sm-3 control-label">First Name *</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="f_name" id="f_name" placeholder="First Name" required>
      </div>
    </div>
    
    <div class="form-group">
      <label for="l_name" class="col-sm-3 control-label">Last Name *</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Last Name" required>
      </div>
    </div>
    
    <div class="form-group">
      <label for="company" class="col-sm-3 control-label">Company</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="company" id="company" placeholder="Company">
      </div>
    </div>
    
    <div class="form-group">
      <label for="address" class="col-sm-3 control-label">Address *</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
      </div>
    </div>
    
    <div class="form-group">
      <label for="city" class="col-sm-3 control-label">City</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="city" id="city" placeholder="City">
      </div>
    </div>
    
    <div class="form-group">
      <label for="state" class="col-sm-3 control-label">State</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="state" id="state" placeholder="State">
      </div>
    </div>
    
    <div class="form-group">
      <label for="country" class="col-sm-3 control-label">Country *</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="country" id="country" placeholder="Country" required>
      </div>
    </div>
    
    <div class="form-group">
      <label for="postalcode" class="col-sm-3 control-label">Postal Code *</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="postalcode" id="postalcode" placeholder="Postal Code" required>
      </div>
    </div>
    
    <div class="form-group">
      <label for="phone" class="col-sm-3 control-label">Phone *</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required>
      </div>
    </div>
    
    <div class="form-group">
      <label for="fax" class="col-sm-3 control-label">Fax</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax">
      </div>
    </div>
    
    <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Email *</label>
      <div class="col-sm-6">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-success">Place Order</button>
      </div>
    </div>
  </form>
  <hr>
  <hr>
</div>

<script type="text/javascript">
</script>

</body>
<?php $conn->close();?>
</html>
