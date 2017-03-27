<?php
session_start();
if(!isset($_SESSION['cart'])){
	$cart=1;
//  header("Location:index.php");
}

include_once "../db_connect.php";
include_once "../helper.php";
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Flatfy Free Flat and Responsive HTML5 Template ">
    <meta name="author" content="">

    <title>Mystore : Music Store</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
	
    <!-- Custom CSS-->
    <link href="css/general.css" rel="stylesheet">
	
	 <!-- Owl-Carousel -->
    <link href="css/custom.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="css/magnific-popup.css"> 
	
	<script src="js/modernizr-2.8.3.min.js"></script>  <!-- Modernizr /-->

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
    

</head>

<body id="home">

	<!-- Preloader -->
	<div id="preloader">
		<div id="status"></div>
	</div>
	
	<!-- FullScreen -->
    <div class="intro-header">
		<div class="col-xs-12 text-center abcen1">
			<h1 class="h1_home wow fadeIn" data-wow-delay="0.4s" style="color:#fffff;">MUSIC STORE</h1>
			<h3 class="h3_home wow fadeIn" data-wow-delay="0.6s">Find the music you need...</h3>
			<ul class="list-inline intro-social-buttons">
				<li id="download" ><a href="#whatis" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="0.8s"><span class="network-name">Search Music</span></a>
				</li>
				<li><a href="cart.php" id="cart_btn" class="btn  btn-lg btn-success wow fadeIn" data-wow-delay="1.2s"><span class="network-name">Cart</span></a>
				</li>
				<li><a href="admin/" class="btn  btn-lg mybutton_cyano wow fadeIn" data-wow-delay="1.6s"><span class="network-name">Admin</span></a>
				</li>

			</ul>
			<ul class="list-inline intro-social-buttons">
				<li id="download" class="wow fadeIn" data-wow-delay="1.7s">Or Search by First Letter
				</li>
				
			</ul>
			<ul class="list-inline intro-social-buttons">
				<li id="download" ><a onClick="search_music_data('a');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">A</a>
				</li>
				<li id="download" ><a onClick="search_music_data('b');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">B</a>
				</li>
				<li id="download" ><a onClick="search_music_data('c');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">C</a>
				</li>
				<li id="download" ><a onClick="search_music_data('d');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">D</a>
				</li>
				<li id="download" ><a onClick="search_music_data('e');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">E</a>
				</li>
				<li id="download" ><a onClick="search_music_data('f');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">F</a>
				</li>
				<li id="download" ><a onClick="search_music_data('g');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">G</a>
				</li>
				<li id="download" ><a onClick="search_music_data('h');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">H</a>
				</li>
				<li id="download" ><a onClick="search_music_data('i');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">I</a>
				</li>
				<li id="download" ><a onClick="search_music_data('j');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">J</a>
				</li>
				<li id="download" ><a onClick="search_music_data('k');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">K</a>
				</li>
				<li id="download" ><a onClick="search_music_data('l');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">L</a>
				</li>
				<li id="download" ><a onClick="search_music_data('m');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">M</a>
				</li>
				<li id="download" ><a onClick="search_music_data('n');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">N</a>
				</li>
			</ul>
			<ul class="list-inline intro-social-buttons">
			
				<li id="download" ><a onClick="search_music_data('o');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">O</a>
				</li>
				<li id="download" ><a onClick="search_music_data('p');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">P</a>
				</li>
				<li id="download" ><a onClick="search_music_data('q');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">Q</a>
				</li>
				<li id="download" ><a onClick="search_music_data('r');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">R</a>
				</li>
				<li id="download" ><a onClick="search_music_data('s');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">S</a>
				</li>
				<li id="download" ><a onClick="search_music_data('t');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">T</a>
				</li>
				<li id="download" ><a onClick="search_music_data('u');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">U</a>
				</li>
				<li id="download" ><a onClick="search_music_data('v');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">V</a>
				</li>
				<li id="download" ><a onClick="search_music_data('w');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">W</a>
				</li>
				<li id="download" ><a onClick="search_music_data('x');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">X</a>
				</li>
				<li id="download" ><a onClick="search_music_data('y');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">Y</a>
				</li>
				<li id="download" ><a onClick="search_music_data('z');" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.8s">Z</a>
				</li>
				
			</ul>
		</div>    
        <!-- /.container -->
		<div class="col-xs-12 text-center abcen wow fadeIn">
			<div class="button_down "> 
				<a class="imgcircle wow bounceInUp" data-wow-duration="1.5s"  href="#whatis"> <img class="img_scroll" src="img/icon/circle.png" alt=""> </a>
			</div>
		</div>
    </div>
	
	<!-- NavBar-->
	<nav class="navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#home">MyStore</a>
			</div>

			<div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					
					<li class="menuItem"><a href="#whatis">Search</a></li>
					<li class="menuItem"><a href="cart.php">Cart</a></li>
					<li class="menuItem"><a href="admin/">Admin</a></li>
					<!--<li class="menuItem"><a href="#whatis">Search</a></li>
					<li class="menuItem"><a href="#useit">Cart</a></li>
					<li class="menuItem"><a href="#screen">Admin</a></li>
					<li class="menuItem"><a href="#credits">Credits</a></li>
					<li class="menuItem"><a href="#contact">Contact</a></li>
				-->
				</ul>
			</div>
		   
		</div>
	</nav> 
	
	<!-- What is -->
	<div id="whatis" class="content-section-b" style="border-top: 0">
		<div class="container">

			<div class="col-md-12 col-md-offset-3 text-center wrap_title">
				<form class="navbar-form navbar-left" action="search.php">
			        	<div class="form-group">
			            <input type="text" class="form-control" pattern=".{1,}" title="Enter text to search..." name="q" id="music_txt" value="<?php if(isset($_GET['q'])) echo $_GET['q'];?>" size="35" placeholder="Search" required>
			          </div>
			          <div class="form-group">
			            	<div class="dropdown">
			        			  <select class="btn btn-default" name="type_id" id="type_id">
			        			    <option value="1">Song</a></option>
			                  		<option value="2">Artist</a></option>
			                  		<option value="3">Album</a></option>
			                  
			        			  </select>
			  			     </div>
			          </div>
			          <button type="submit" id="music_scan" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Search</button>        
			      </form>
				  
				
				
			</div>
			<hr>
			<div class="row">
			
				<div class="col-lg-12 wow fadeInDown text-center results" id="results" style="display:none;">
				<hr>	  
				  <h3>Search Results</h3>
				<hr>	  
				  <p class="" id="search_results">Epsum factorial non deposit quid pro quo hic escorol. Olypian quarrels et gorilla congolium sic ad nauseum. </p>

				  <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
				</div><!-- /.col-lg-4 -->
				
				
				
			</div><!-- 
			<div class="row">
			
				<div class="col-sm-4 wow fadeInDown text-center">
				  <img class="rotate" src="img/icon/tweet.svg" alt="Generic placeholder image">
				  <h3>Follow Me</h3>
				  <p class="lead">Epsum factorial non deposit quid pro quo hic escorol. Olypian quarrels et gorilla congolium sic ad nauseum. </p>

				<p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> 
				</div>
				
				<div class="col-sm-4 wow fadeInDown text-center">
				  <img  class="rotate" src="img/icon/picture.svg" alt="Generic placeholder image">
				   <h3>Gallery</h3>
				   <p class="lead">Epsum factorial non deposit quid pro quo hic escorol. Olypian quarrels et gorilla congolium sic ad nauseum. </p>
				   
				</div>
				
				<div class="col-sm-4 wow fadeInDown text-center">
				  <img  class="rotate" src="img/icon/retina.svg" alt="Generic placeholder image">
				   <h3>Retina</h3>
					<p class="lead">Epsum factorial non deposit quid pro quo hic escorol. Olypian quarrels et gorilla congolium sic ad nauseum. </p>
				  
				</div>
				
			</div>
			 -->
				
			<!--<div class="row tworow">
			
				<div class="col-sm-4  wow fadeInDown text-center">
				  <img class="rotate" src="img/icon/laptop.svg" alt="Generic placeholder image">
				  <h3>Responsive</h3>
				  <p class="lead">Epsum factorial non deposit quid pro quo hic escorol. Olypian quarrels et gorilla congolium sic ad nauseum. </p>
				 
				</div>
				
				<div class="col-sm-4 wow fadeInDown text-center">
				  <img  class="rotate" src="img/icon/map.svg" alt="Generic placeholder image">
				   <h3>Google</h3>
				   <p class="lead">Epsum factorial non deposit quid pro quo hic escorol. Olypian quarrels et gorilla congolium sic ad nauseum. </p>
				   
				</div>
				
				<div class="col-sm-4 wow fadeInDown text-center">
				  <img  class="rotate" src="img/icon/browser.svg" alt="Generic placeholder image">
				   <h3>Bootstrap</h3>
				 <p class="lead">Epsum factorial non deposit quid pro quo hic escorol. Olypian quarrels et gorilla congolium sic ad nauseum. </p>
				  
				</div>
				
			</div> /.row -->
		</div>
	</div>
	
	
    <footer>
      <div class="container">
        <div class="row">
          
          <div class="col-md-12">
            <div class="footer-banner text-center">
              <h3 class="footer-title">Parallel & Distributed Project</h3>
              <hr>
              
                <h4>Nitin Tokas</h4>
                <h4>Pace University</h4>
                <h4>Master of Science ( Computer Science )</h4>
                <h4>ID : U01372189</h4>
                
              
              
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/script.js"></script>
	<!-- StikyMenu -->
	<script src="js/stickUp.min.js"></script>
	<script type="text/javascript">
	  jQuery(function($) {
		$(document).ready( function() {
		  $('.navbar-default').stickUp();
		  
		});
	  });
	
	</script>
	<!-- Smoothscroll -->
	<script type="text/javascript" src="js/jquery.corner.js"></script> 
	<script src="js/wow.min.js"></script>

	<?php if($cart==1){?>
		<script type="text/javascript">
			$('#cart_btn').attr('disabled','disabled');
		</script>
	<?php }?>
	<script>
	 new WOW().init();
	 $("#music_scan").click(function(event){
      var query = ($("#music_txt").val()).trim();
      if(query.length==0){
      	alert("Please provide an input to search!!!");
      	return false;
      }

      var type_id = $('#type_id :selected').val();
      //console.log()
      //event.preventDefault();
      $( ".results" ).hide();
           $('#music_scan').attr('disabled','disabled');
           $("#music_scan").html('Processing...'); 
           $('#music_scan').val('Processing...');
      var data_url = "search.php?q="+query+"&type_id="+type_id;
      $.get( data_url, function( data ) {

		  $( "#search_results" ).html( data );
		  $('#music_table').DataTable( {
			    responsive: true,
			    searching:false
			} );
		  $( ".results" ).show();
		 
		});
     
      $('#music_scan').removeAttr('disabled');
      $("#music_scan").html('<i class="glyphicon glyphicon-search"></i> Search'); 
      event.preventDefault();
    });

	 function search_music_data (query) {
	 	var data_url = "search.php?q="+query+"&type_id=1";
      $.get( data_url, function( data ) {

		  $( "#search_results" ).html( data );
		  $('#music_table').DataTable( {
			    responsive: true,
			    searching:false
			} );
		  $( ".results" ).show();
		 window.location.hash = "results";
		});
	 }

	 function AddToCart(id) {
	    var data_url = "addToCart.php?id="+id;
	      $.get( data_url, function( data ) {
	        $('#alert_box').html('<div class="alert alert-success alert-dismissible" role="alert">'+
	            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	            '<strong>Track Added to Cart!</strong>'+
	          '</div>');
	    });
	      $('#cart_btn').removeAttr('disabled');
	   }


	</script>
	<script src="js/classie.js"></script>
	<script src="js/uiMorphingButton_inflow.js"></script>
	<!-- Magnific Popup core JS file -->
	<script src="js/jquery.magnific-popup.js"></script> 
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</body>

</html>
