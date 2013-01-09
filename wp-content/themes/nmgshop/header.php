<link href="<?php echo bloginfo("template_url"); ?>/twitter-bootstrap-v2/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">
<div class="navbar"> <!--navbar-fixed-top-->
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><img src="<?php bloginfo("template_url"); ?>/images/zurpay.png" width="111" height="30" alt="zurpay logo" /></a>
          <div class="nav-collapse">
             <?php include_once (dirname(__FILE__)."/ext/mainmenus.php") ?>
            <p class="navbar-text pull-right">Logged in as <a href="#">username</a></p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>