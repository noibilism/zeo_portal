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
    <?php echo $this->Html->css('login/oneui.css'); ?>
</head>
<body>
<!-- Login Content -->
<div class="content overflow-hidden">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <!-- Login Block -->
            <div class="block block-themed animated fadeIn">
                <div class="block-header bg-primary">
                    <ul class="block-options">
                        <li>
                            <a href="#">Forgot Password?</a>
                        </li>
                    </ul>
                    <h3 class="block-title">IFO Z.E.O - Portal</h3>
                </div>
                <div class="block-content block-content-full block-content-narrow">
                    <!-- Login Title -->
                    <h1 class="h2 font-w600 push-30-t push-5"></h1>
                    <p>Welcome, please login.</p>
                    <!-- END Login Title -->

                    <!-- Login Form -->
                    <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->

                    <?php echo $this->Form->create('User', array('class'=>'js-validation-login form-horizontal push-30-t push-50')); ?>
                    <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <span style="color: #ff0000"><?php echo $this->Session->flash(); ?></span>
                                    <?php echo $this->Form->input('username', array('class'=>'form-control', 'id'=>'login-username', 'label'=>false, 'placeholder'=>'Username')); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <?php echo $this->Form->input('password', array('class'=>'form-control', 'id'=>'login-username', 'label'=>false, 'placeholder'=>'Password')); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label class="css-input switch switch-sm switch-primary">
                                    <input type="checkbox" id="login-remember-me" name="login-remember-me"><span></span> Remember Me?
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <button class="btn btn-block btn-primary" type="submit"><i class="si si-login pull-right"></i> Log in</button>
                            </div>
                        </div>
                    </form>
                    <!-- END Login Form -->
                </div>
            </div>
            <!-- END Login Block -->
        </div>
    </div>
</div>
<!-- END Login Content -->

<!-- Login Footer -->
<div class="push-10-t text-center animated fadeInUp">
    <small class="text-muted font-w600"><span class="js-year-copy"></span> &copy; Copyright <?php echo date('Y'); ?>. All Rights Reserved. Powered By <a href="http://www.olivesolutions.com.ng" target="_blank">Olive Web Solutions</a>.</small>
</div>
<?php
        $js = array('login/core/jquery.min', 'login/core/bootstrap.min', 'login/core/jquery.slimscroll.min', 'login/core/jquery.scrollLock.min', 'login/core/jquery.appear.min', 'login/core/jquery.countTo.min', 'login/core/jquery.placeholder.min', 'login/core/js.cookie.min','login/app','plugins/jquery-validation/jquery.validate.min','pages/base_pages_login' );
		echo $this->Html->script($js);
?>
</body>
</html>