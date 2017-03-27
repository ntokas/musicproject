<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Music Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<style type="text/css">
.top_bar{padding-left: 5%;};
</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">My Music Store</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      	
      <ul class="nav navbar-nav top_bar" style="padding-left:15%;">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-list-alt"></i> Genre<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <?php
              $sql = "SELECT * FROM Genre;";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  ?>
                  <li><a href="genre_tracks.php?genre_id=<?php echo $row['GenreId'];?>"><?php echo $row['Name'];?></a></li>
                  <?php
                }
              }

              ?>
            
          </ul>
        </li>
      </ul>


      <form class="navbar-form navbar-left" action="search_data.php">
        	<div class="form-group">
            <input type="text" class="form-control" pattern=".{1,}" title="Enter text to search..." name="q" value="<?php if(isset($_GET['q'])) echo $_GET['q'];?>" size="35" placeholder="Search" required>
          </div>
          <div class="form-group">
            	<div class="dropdown">
        			  <select class="btn btn-default" id="dropdownMenu1" name="type_id">
        			    <option value="1">Song</a></option>
                  <option value="2">Artist</a></option>
                  <option value="3">Album</a></option>
                  
        			  </select>
  			     </div>
          </div>
          <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Search</button>        
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        <li><a href="admin/"><span class="glyphicon glyphicon-log-in"></span> Admin</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
