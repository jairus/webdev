<hr />
<div class="row-fluid">
            <div class="span12" >
            <?php  
                    if(is_active_sidebar("footer-widget-1")){ ?>
                 <div class="span3">
              <div class="footer-widget-1">
                   <?php dynamic_sidebar("footer-widget-1"); ?>
                </div>	
            </div><!--/span--> <?php } ?>
            
            <?php  
                    if(is_active_sidebar("footer-widget-2")){ ?>
                 <div class="span3">
              <div class="footer-widget-1">
                   <?php dynamic_sidebar("footer-widget-2"); ?>
                </div>	
            </div><!--/span--> <?php } ?>
            
            <?php  
                    if(is_active_sidebar("footer-widget-3")){ ?>
                 <div class="span3">
              <div class="footer-widget-1">
                   <?php dynamic_sidebar("footer-widget-3"); ?>
                </div>	
            </div><!--/span--> <?php } ?>
           
				   <?php  
                    if(is_active_sidebar("footer-widget-4")){ ?>
                 <div class="span3">
              <div class="footer-widget-1">
                   <?php dynamic_sidebar("footer-widget-4"); ?>
                </div>	
            </div><!--/span--> <?php } ?>
             </div><!--/span-->
            
          </div><!--/row-->
          <div class="span11">
  		   <hr>
     <footer>
        <p>&copy; Zurpay 2012</p>
      </footer>
     </div>
	</div><!--/.fluid-container-->     
    <?php wp_footer() ?>
    <!-- Le Script : To load the site faster-->
	<!--<script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/jquery.js"></script>-->
    <script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/bootstrap-button.js"></script>
    <script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo get_bloginfo('template_directory')?>/twitter-bootstrap-v2/docs/assets/js/bootstrap-typeahead.js"></script>
	</body>
</html>