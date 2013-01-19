<div class="row-fluid"><div class="span12" ><hr /></div></div>
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
          <div class="row-fluid">
          <div class="span12">
  		   <hr>
     <footer>
        <p>&copy; Zurpay 2012</p>
      </footer>
     </div>
     </div>
	</div><!--/.fluid-container-->     
    <?php wp_footer() ?>
	</body>
</html>