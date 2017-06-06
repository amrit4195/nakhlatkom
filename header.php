
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
<div class="logo">
		<div class="container">
			<div class="logo-info">
				<a href="index.php">
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
					<li class="hvr-bounce-to-bottom active"><a href="deit.php">My Diet</a></li>
					<li><a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Food Catalog<span class="caret"></span></a>
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