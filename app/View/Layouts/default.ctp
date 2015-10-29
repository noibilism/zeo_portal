<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Ogun State Ministry of Education - IFO ZEO Portal</title>
    <meta name="description" content="Ogun State Ministry of Education - IFO ZEO Portal">
    <meta name="author" content="Noibi Kazeem">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <?php $css = array('login/oneui.css', 'bootstrap-datepicker3.min.css', 'bootstrap-colorpicker.min.css', 'select2.min', 'select2-bootstrap', 'dropzone.min', 'jquery.tagsinput.min' ,'login/slick.min', 'login/slick-theme.min','jquery.dataTables.min'); ?>
    <?php echo $this->Html->css($css); ?>
</head>

<body>
<!-- Page Container -->
<!--
    Available Classes:

    'sidebar-l'                  Left Sidebar and right Side Overlay
    'sidebar-r'                  Right Sidebar and left Side Overlay
    'sidebar-mini'               Mini hoverable Sidebar (> 991px)
    'sidebar-o'                  Visible Sidebar by default (> 991px)
    'sidebar-o-xs'               Visible Sidebar by default (< 992px)

    'side-overlay-hover'         Hoverable Side Overlay (> 991px)
    'side-overlay-o'             Visible Side Overlay by default (> 991px)

    'side-scroll'                Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (> 991px)

    'header-navbar-fixed'        Enables fixed header
-->
<div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
<!-- Side Overlay-->
<aside id="side-overlay">
    <!-- Side Overlay Scroll Container -->
    <div id="side-overlay-scroll">
        <!-- Side Header -->
        <div class="side-header side-content">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">
                <i class="fa fa-times"></i>
            </button>
                        <span>
                            <img class="img-avatar img-avatar32" src="assets/img/avatars/avatar10.jpg" alt="">
                            <span class="font-w600 push-10-l">Roger Hart</span>
                        </span>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="side-content remove-padding-t">
            <!-- Notifications -->
            <div class="block pull-r-l">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Recent Activity</h3>
                </div>
                <div class="block-content">
                    <!-- Activity List -->
                    <ul class="list list-activity">
                        <li>
                            <i class="si si-wallet text-success"></i>
                            <div class="font-w600">New sale ($15)</div>
                            <div><a href="javascript:void(0)">Admin Template</a></div>
                            <div><small class="text-muted">3 min ago</small></div>
                        </li>
                        <li>
                            <i class="si si-pencil text-info"></i>
                            <div class="font-w600">You edited the file</div>
                            <div><a href="javascript:void(0)"><i class="fa fa-file-text-o"></i> Documentation.doc</a></div>
                            <div><small class="text-muted">15 min ago</small></div>
                        </li>
                        <li>
                            <i class="si si-close text-danger"></i>
                            <div class="font-w600">Project deleted</div>
                            <div><a href="javascript:void(0)">Line Icon Set</a></div>
                            <div><small class="text-muted">4 hours ago</small></div>
                        </li>
                        <li>
                            <i class="si si-wrench text-warning"></i>
                            <div class="font-w600">Core v2.5 is available</div>
                            <div><a href="javascript:void(0)">Update now</a></div>
                            <div><small class="text-muted">6 hours ago</small></div>
                        </li>
                    </ul>
                    <div class="text-center">
                        <small><a href="javascript:void(0)">Load More..</a></small>
                    </div>
                    <!-- END Activity List -->
                </div>
            </div>
            <!-- END Notifications -->

            <!-- Online Friends -->
            <div class="block pull-r-l">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Online Friends</h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- Users Navigation -->
                    <ul class="nav-users">
                        <li>
                            <a href="base_pages_profile.html">
                                <img class="img-avatar" src="assets/img/avatars/avatar4.jpg" alt="">
                                <i class="fa fa-circle text-success"></i> Rebecca Gray
                                <div class="font-w400 text-muted"><small>Copywriter</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="base_pages_profile.html">
                                <img class="img-avatar" src="assets/img/avatars/avatar10.jpg" alt="">
                                <i class="fa fa-circle text-success"></i> Dennis Ross
                                <div class="font-w400 text-muted"><small>Web Developer</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="base_pages_profile.html">
                                <img class="img-avatar" src="assets/img/avatars/avatar6.jpg" alt="">
                                <i class="fa fa-circle text-success"></i> Denise Watson
                                <div class="font-w400 text-muted"><small>Web Designer</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="base_pages_profile.html">
                                <img class="img-avatar" src="assets/img/avatars/avatar1.jpg" alt="">
                                <i class="fa fa-circle text-warning"></i> Denise Watson
                                <div class="font-w400 text-muted"><small>Photographer</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="base_pages_profile.html">
                                <img class="img-avatar" src="assets/img/avatars/avatar10.jpg" alt="">
                                <i class="fa fa-circle text-warning"></i> John Parker
                                <div class="font-w400 text-muted"><small>Graphic Designer</small></div>
                            </a>
                        </li>
                    </ul>
                    <!-- END Users Navigation -->
                </div>
            </div>
            <!-- END Online Friends -->

            <!-- Quick Settings -->
            <div class="block pull-r-l">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Quick Settings</h3>
                </div>
                <div class="block-content">
                    <!-- Quick Settings Form -->
                    <form class="form-bordered" action="index.html" method="post" onsubmit="return false;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="font-s13 font-w600">Online Status</div>
                                    <div class="font-s13 font-w400 text-muted">Show your status to all</div>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <label class="css-input switch switch-sm switch-primary push-10-t">
                                        <input type="checkbox"><span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="font-s13 font-w600">Auto Updates</div>
                                    <div class="font-s13 font-w400 text-muted">Keep up to date</div>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <label class="css-input switch switch-sm switch-primary push-10-t">
                                        <input type="checkbox"><span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="font-s13 font-w600">Notifications</div>
                                    <div class="font-s13 font-w400 text-muted">Do you need them?</div>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <label class="css-input switch switch-sm switch-primary push-10-t">
                                        <input type="checkbox" checked><span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="font-s13 font-w600">API Access</div>
                                    <div class="font-s13 font-w400 text-muted">Enable/Disable access</div>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <label class="css-input switch switch-sm switch-primary push-10-t">
                                        <input type="checkbox" checked><span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END Quick Settings Form -->
                </div>
            </div>
            <!-- END Quick Settings -->
        </div>
        <!-- END Side Content -->
    </div>
    <!-- END Side Overlay Scroll Container -->
</aside>
<!-- END Side Overlay -->

<!-- Sidebar -->
<nav id="sidebar">
<!-- Sidebar Scroll Container -->
<div id="sidebar-scroll">
<!-- Sidebar Content -->
<!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
<div class="sidebar-content">
<!-- Side Header -->
<!-- END Side Header -->
    <?php echo $this->element('headers/side_header'); ?>
<!-- Side Content -->
    <?php echo $this->element('menus/side_menu'); ?>
    <!-- END Side Content -->
</div>
<!-- Sidebar Content -->
</div>
<!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->

<!-- Header -->
<?php echo $this->element('headers/right_header'); ?>
<!-- END Header -->

<!-- Main Container -->
<main id="main-container">
    <?php echo $this->element('headers/page_header'); ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h3 class="font-w300 push-15"><?php echo $this->Session->flash(); ?></h3>
    </div>
    <?php
            echo $this->fetch('content');
    ?>
</main>
<!-- END Main Container -->

<!-- Footer -->
<footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
    <div class="pull-right">
        Powered <i class="fa fa-heart text-city"></i> by <a class="font-w600" href="http://www.olivesolutions.com.ng" target="_blank">Olive Solutions</a>
    </div>
    <div class="pull-left">
        <a class="font-w600" href="javascript:void(0)" target="_blank">IFO ZEO</a> &copy; <span class="js-year-copy"></span>
    </div>
</footer>
<!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Apps Modal -->
<!-- Opens from the button in the header -->
<!-- END Apps Modal -->
<?php
        $js = array('login/core/jquery.min',
                    'login/plugins/bootstrap-datepicker/bootstrap-datepicker.min',
                    'login/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min',
                    'login/plugins/select2/select2.full.min',
                    'login/plugins/dropzonejs/dropzone.min',
                    'login/plugins/jquery-tags-input/jquery.tagsinput.min',
                    'login/plugins/masked-inputs/jquery.maskedinput.min',
                    'login/pages/base_tables_datatables',
                    'login/plugins/datatables/jquery.dataTables.min',
                    'login/core/bootstrap.min',
                    'login/pages/base_pages_dashboard',
                    'login/plugins/chartjs/Chart.min',
                    'login/plugins/slick/slick.min',
                    'login/core/jquery.slimscroll.min',
                    'login/core/jquery.scrollLock.min',
                    'login/core/jquery.appear.min',
                    'login/core/jquery.countTo.min',
                    'login/core/jquery.placeholder.min',
                    'login/core/js.cookie.min',
                    'login/app',
                    'plugins/jquery-validation/jquery.validate.min',
                    'pages/base_pages_login' );
		echo $this->Html->script($js);
?>
<!-- Page JS Code -->
<script>
    $(function () {
        // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
        App.initHelpers(['datepicker', 'colorpicker', 'select2', 'masked-inputs', 'tags-inputs']);
    });
</script>
<script>
    $(function () {
        // Init page helpers (Slick Slider plugin)
        App.initHelpers('slick');
    });
</script>
</body>
</html>