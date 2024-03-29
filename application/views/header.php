<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Petty Cash Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ski service, rental products">
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
    <link href='/assets/css/fullcalendar.print.css' rel='stylesheet' media='print'>
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



    <script src="#http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

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
	<script src='/assets/js/jquery.dataTables.min.js'></script>

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
	<script src="/assets/js/jquery.history1.js"></script>
	<!-- application script for Charisma demo -->
	<script src="/assets/js/charisma1.js"></script>


</head>

<body>

<!-- topbar starts -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse"
               data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index.html"> <span>Petty Cash</span></a>


            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-user"></i><span class="hidden-phone"> admin</span>

                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/auth/logout">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <div class="top-nav nav-collapse">
                <ul class="nav">
                    <li><a href="<?php echo base_url(); ?>">Visit Site</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- topbar ends -->

<div class="container-fluid">
    <div class="row-fluid">

        <div class="span2 main-menu-span">

            <div class="well nav-collapse sidebar-nav">
                <ul class="nav nav-tabs nav-stacked main-menu">
                    <?php if(($this->session->userdata('group') == 'members')){ ?>
                    <li><a class="ajax-link" href="/admin/dashboard"><i class="icon-home"></i><span
                        class="hidden-tablet"> Dashboard</span></a></li>


             <?php   } else{ ?>

                    <li><a class="ajax-link" href="/admin/dashboard"><i class="icon-home"></i><span
                            class="hidden-tablet"> Dashboard</span></a></li>
                    <li><a class="ajax-link" href="/auth/user_info"><i class="icon-align-justify"></i><span
                            class="hidden-tablet">&nbsp;&nbsp;Users</span></a></li>
                    <li><a class="ajax-link" href="/admin/companies"><i class="icon-align-justify"></i><span
                        class="hidden-tablet">&nbsp;&nbsp;Companies</span></a></li>
                    <li><a class="ajax-link" href="/admin/projects"><i class="icon-align-justify"></i><span
                        class="hidden-tablet">&nbsp;&nbsp;Insert Project</span></a></li>
                    <li><a class="ajax-link" href="/admin/cash_memos"><i class="icon-align-justify"></i><span
                        class="hidden-tablet">&nbsp;&nbsp;Insert Cash memo</span></a></li>
                    <li><a class="ajax-link" href="/admin/archives"><i class="icon-align-justify"></i><span
                        class="hidden-tablet">&nbsp;&nbsp;Archives</span></a></li>

        <?php } ?>
                </ul>

            </div>
        </div>
