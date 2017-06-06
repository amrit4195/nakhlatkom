<?php	
	session_start();
	
	if(!isset($_REQUEST['s'])){
		if($_REQUEST['s'] == "e") {
			session_destroy();
			header('Location: ./index.php');
		}
	}	
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Testing 123</title>
        <!-- Vendor CSS -->
        <link href="/dp/vendors/animate.css/animate.min.css" rel="stylesheet">
        <link href="/dp/vendors/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- Dashplus CSS -->
        <link href="/dp/dist/css/dashplus_1.min.css" rel="stylesheet">
        <link href="/dp/dist/css/dashplus_2.min.css" rel="stylesheet">
        
        <style>
			.login-content {
				background-color: #0079ba;
				background-image: url("https://www.transparenttextures.com/patterns/brushed-alum-dark.png");			
			}
			.lc-block {
				max-width: 400px;
			}
			.lcb-form .input-group  {
				display: inline-block;
				width: 100%;
			}
			
			.lc-block:not(.lc-block-alt) .lcb-form {
				padding: 35px 55px 35px 55px;
			}
			
			.lcb-form {
				padding: 35px 55px 35px 55px;
			}
			
			.lc-block .checkbox {
				margin: 5px 0 0 5px;
				text-align: left;
			}
			.lc-block:not(.toggled) {
				display: inline-block;
			}
		</style>
    </head>
    <body>
        <div class="login-content">
            <!-- Login -->
            <div class="lc-block " id="l-login">				
                <div class="lcb-form">
				<h3 class="text-center c-grey-800">	<img src="../images/esg_logo_blk.png" width="150" alt="" style="margin-top: -10px;"/></h3>
                	<h3 class="text-center c-grey-800">Job Management System</h3>		
					<br />
                     <div class="input-group m-b-20">
                        <div class="fg-line">
                            <input type="text" id ="u" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="input-group m-b-20">
                        <div class="fg-line">
                            <input type="password" id ="p" class="form-control" placeholder="Password">
                        </div>
                    </div>
                  
                    <div class="input-group m-t-20">
						<button id="go" class="btn btn-primary btn-lg btn-block waves-effect" onClick="processLogin(); return false;">Sign In</button>                    
                     </div>
                     <div class="m-t-20">
                        <p><a href="#" onClick="notify('top', 'right', 'fa fa-remove', 'danger', '&nbsp;&nbsp;&nbsp;Not available yet, contact admin.'); return false;">Forgot Password?</a></p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Javascript Libraries -->
        <script src="/dp/vendors/jquery/dist/jquery.min.js"></script>
        <script src="/dp/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/dp/vendors/Waves/dist/waves.min.js"></script>
        <script src="/dp/dist/js/dashplus.min.js"></script>
		<script src="/dp/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
		<script>		 
			window.addEventListener("load",function() { getLoc(); });	
			window.addEventListener("keypress", function(event) { if (event.keyCode == 13) { processLogin();}});
			
			var x=0; var y=0; var i="-"; 
			function getLoc() { navigator.geolocation.getCurrentPosition(function(location) { x = location.coords.latitude; y = location.coords.longitude; }); }			
			function showError(error) {
				switch(error.code) {
					case error.PERMISSION_DENIED:
						i = "User denied the request for Geolocation.";
						break;
					case error.POSITION_UNAVAILABLE:
						i = "Location information is unavailable.";
						break;
					case error.TIMEOUT:
						i = "The request to get user location timed out.";
						break;
					case error.UNKNOWN_ERROR:
						i = "An unknown error occurred.";
						break;
				}
			}
				
			function notify(from, align, icon, type, msg, animIn, animOut){
                $.growl({ icon: icon, message: msg },{
					element: 'body', 
					type: type, 
					allow_dismiss: true,
					placement: { from: from, align: align },
					offset: { x: 20,y: 85 },
					spacing: 10,
					z_index: 1031,
					delay: 2500,
					timer: 1000,
					url_target: '_blank',
					mouse_over: false,
					animate: { enter: animIn, exit: animOut },
					icon_type: 'class',
					template: '<div data-growl="container" class="alert alert-bordered" role="alert">' +
									'<button type="button" class="close" data-growl="dismiss">' +
										'<span aria-hidden="true">&times;</span>' +
										'<span class="sr-only">Close</span>' +
									'</button>' +
									'<span data-growl="icon"></span>' +
									'<span data-growl="title"></span>' +
									'<span data-growl="message"></span>' +
									'<a href="#" data-growl="url"></a>' +
								'</div>'
				});
            };
					
			function redirect(u) { window.location = u; } 
			function processLogin(){ $.post("./login/login.php", { u: $("#u").val(), p: $("#p").val(), x: x, y: y, i: i})
			.done(function(msg) { if(msg != "false"){ redirect(msg); } else { notify("top", "right", "fa fa-remove", "danger", "&nbsp;&nbsp;&nbsp;ERROR: Invalid Login.");}})
			.fail(function() {  notify("top", "right", "fa fa-remove", "danger", "&nbsp;&nbsp;&nbsp;ERROR: There was an error contacting the auth server. Please try again.");});
		}		
		</script>
		
    </body>
</html>