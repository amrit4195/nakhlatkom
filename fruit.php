
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Crops Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- //js -->	
<!-- start-smoth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smoth-scrolling-->
</head>

<body>
	<!--header-->
	<div class="logo">
		<div class="container">
			<div class="logo-info">
				<a href="index.html">
					<h1>Diet OPtimization</h1>	
					<span class="glyphicon glyphicon-grain" aria-hidden="true"></span>
				</a>
			</div>
		</div>	
	</div>
	<!--//header-->		
	<!--navigation-->
	<div class="top-nav">
		<nav class="navbar navbar-default">
			<div class="container">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu						
				</button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="hvr-bounce-to-bottom"><a href="index.php">Home</a></li>
					<li class="hvr-bounce-to-bottom"><a href="diet.php">My Diet</a></li>
					<li><a href="#" class="dropdown-toggle hvr-bounce-to-bottom active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Food Catalog<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a class="hvr-bounce-to-bottom" href="carbohyrate.php">Carbohydrate</a></li>
							<li><a class="hvr-bounce-to-bottom" href="fruit.php">Fruit</a></li>
							<li><a class="hvr-bounce-to-bottom" href="protein.php">Protein</a></li> 
                            <li><a class="hvr-bounce-to-bottom" href="vegetable.php">Vegatables</a></li>          
						</ul>
					</li>	
					<li class="hvr-bounce-to-bottom"><a href="account.php">My Account</a></li>
					
				</ul>
				<div class="clearfix"> </div>
			</div>	
		</nav>		
	</div>	
	<!--//navigation-->
    <div class="baner">
		<div class="container">
			<div class="baner-foods">
   <?php
 //get all the information of flowers from table flowers; 
$sql = "SELECT * FROM foods ORDER BY id";

$stmt = oci_parse($connection, $sql); 
  
if(!$stmt)  {
    echo "An error occurred in parsing the sql string.\n"; 
    exit; 
  }
oci_execute($stmt); 

$count=0;

while(oci_fetch_array($stmt))
{
	$count++;
$name= oci_result($stmt,"NAME");
$type= oci_result($stmt,"TYPE");
$energy= oci_result($stmt,"ENERGY");
$protein= oci_result($stmt,"PROTEIN");
$sugar= oci_result($stmt,"SUGAR");
$fat= oci_result($stmt,"FAT");
$fibre= oci_result($stmt,"FIBRE");
$price=oci_result($stmt,"PRICE");
$photo=oci_result($stmt,"PICTURE");
$fid = oci_result($stmt,"ID");
if($type=="fruit")
{
if($count==1||$count==4||$count==7||$count==10)
{
	print("
	<div class='baner-row'>
					<div class='col-md-4 baner-bottom'>
						<figure class='effect-bubba'>
							<img src=foodpics/".$photo."  alt='' />
							<figcaption>
							    <p>Name:".$name."</p>
								<p>Energy:".$energy."</p>
								<p>Protein:".$protein."</p>
								<p>Satuarted Fat:".$fat."</p>
								<p>Sugar:".$sugar."</p>
								<p>Detary Fibre:".$fibre."</p>
								<p>Price:".$price."</p>	
							</figcaption>			
						</figure>	
					</div>
	");
}
else if($count==3||$count==6||$count==9)
{
	print("
 
					<div class='col-md-4 baner-bottom'>
						<figure class='effect-bubba'>
							<img src=foodpics/".$photo."  alt='' />
							<figcaption>
							    <p>Name:".$name."</p>
								<p>Energy:".$energy."</p>
								<p>Protein:".$protein."</p>
								<p>Satuarted Fat:".$fat."</p>
								<p>Sugar:".$sugar."</p>
								<p>Detary Fibre:".$fibre."</p>
								<p>Price:".$price."</p>		
							</figcaption>			
						</figure>	
					</div><div class='clearfix'> </div></div>");
}
else
{
	print("
    <div class='col-md-4 baner-bottom'>
						<figure class='effect-bubba'>
							<img src=foodpics/".$photo."  alt='' />
							<figcaption>
							    <p>Name:".$name."</p>
								<p>Energy:".$energy."</p>
								<p>Protein:".$protein."</p>
								<p>Satuarted Fat:".$fat."</p>
								<p>Sugar:".$sugar."</p>
								<p>Detary Fibre:".$fibre."</p>
								<p>Price:".$price."</p>	
							</figcaption>			
						</figure>	
					</div>");
}
}
}
?>
<!--
          <div class="baner-row">
					<div class="col-md-4 baner-bottom">
						<figure class="effect-bubba">
							<img src="images/img3.jpg" alt=""/>
							<figcaption>
						    <h4>Enimet pulvinar posuere</h4>
								<p>In sit amet sapien eros Integer dolore magna aliqua</p>	
							</figcaption>			
						</figure>	
					</div>
					<div class="col-md-4 baner-bottom">
						<figure class="effect-bubba">
							<img src="images/img4.jpg" alt=""/>
							<figcaption>
						    <h4>Enimet pulvinar posuere</h4>
								<p>In sit amet sapien eros Integer dolore magna aliqua</p>	
							</figcaption>			
						</figure>	
					</div>
					<div class="col-md-4 baner-bottom">
						<figure class="effect-bubba">
							<img src="images/img5.jpg" alt=""/>
							<figcaption>
						    <h4>Enimet pulvinar posuere</h4>
								<p>In sit amet sapien eros Integer dolore magna aliqua</p>	
							</figcaption>			
						</figure>	
					</div>
					<div class="clearfix"> </div>
				</div>	
                -->			
			</div>
		</div>
	</div>
<?php require_once 'footer.php';?>
	<!--//footer-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!--//smooth-scrolling-of-move-up-->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>

</body>
</html>