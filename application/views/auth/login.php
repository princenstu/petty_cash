<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>Ski Service Admin Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="/assets/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="/assets/css/charisma-app.css" rel="stylesheet">
	<link href="/assets/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='/assets/css/fullcalendar.css' rel='stylesheet'>
	<link href='/assets/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='/assets/css/chosen.css' rel='stylesheet'>
	<link href='/assets/css/uniform.default.css' rel='stylesheet'>
	<link href='/assets/css/colorbox.css' rel='stylesheet'>
	<link href='/assets/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='/assets/css/jquery.noty.css' rel='stylesheet'>
	<link href='/assets/css/noty_theme_default.css' rel='stylesheet'>
	<link href='/assets/css/elfinder.min.css' rel='stylesheet'>
	<link href='/assets/css/elfinder.theme.css' rel='stylesheet'>
	<link href='/assets/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='/assets/css/opa-icons.css' rel='stylesheet'>
	<link href='/assets/css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->


</head>

<body>
		<div class="container-fluid">
		<div class="row-fluid">

			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Welcome to Skiservice</h2>
				</div><!--/span-->
			</div><!--/row-->

			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						<strong><b style="color:red;"><?php echo $message;?></b></strong>
                        Please login with your Email and Password.

					</div>
					<form class="form-horizontal" action="" method="post">
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="email" id="username" type="text"  />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" />
							</div>
                            <div class="add-on">
                               <span><input type="checkbox" name="remember" id="remember">Remember Me</span>

                            </div>
							<div class="clearfix"></div>

							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary">Login</button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->

	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="/assets/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="/assets/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="/assets/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="/assets/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="/assets/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="/assets/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="/assets/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="/assets/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="/assets/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="/assets/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="/assets/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="/assets/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="/assets/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="/assets/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="/assets/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="/assets/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='/assets/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="/assets/js/excanvas.js"></script>
	<script src="/assets/js/jquery.flot.min.js"></script>
	<script src="/assets/js/jquery.flot.pie.min.js"></script>
	<script src="/assets/js/jquery.flot.stack.js"></script>
	<script src="/assets/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="/assets/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="/assets/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="/assets/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="/assets/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="/assets/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="/assets/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="/assets/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="/assets/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="/assets/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="/assets/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="/assets/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="/assets/js/charisma.js"></script>


</body>
</html>
