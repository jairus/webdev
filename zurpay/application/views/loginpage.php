<body>
	<div id="mom247-container">
    	<table width="100%" cellspacing="0" cellpadding="0">
        	<tbody>
            	<tr>
                	<td id="header">
                    	<table width="100%" cellspacing="0" cellpadding="0">
                        	<tbody>
                            	<tr>
                                	<td><a href=""><img src="<?php //echo base_url('media/images/header-logo.png');?>"/></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> <!--end of header -->
                <tr>
                	<td id="menu">
                			    
                    </td>
                </tr> <!-- end of menu -->
                
                <tr>
                	<td id="content">
                  		<center>
                        	<img src="<?php //echo base_url('media/images/header-logo.png'); ?>" />
                            <form action="<?php echo base_url();?>login/action" method="post" style="margin-top: 20px">
                            	<table cellpadding="3">
                                	<tbody>
                                    	<tr>
                                        	<td class="center bold font18" style="color:#F00" colspan="2">
											<?php if (validation_errors()) { 

												//if ($errors['no_match']) echo "No match was found, please try again";
											
												echo validation_errors();
											
												}elseif($error){
													echo "No match found!";
												}
											?>
                    						</td>
                                        </tr>
                                    	<tr>
                                        	<td class="center bold font18" colspan="2">Log In</td>
                                        </tr>
                                        <tr>
                                        	<td class=""> Username </td>
                                            <td><input type="text" name="username" id="username" /></td> 
                                        </tr>
                                        <tr>
                                        	<td class=""> Password </td>
                                            <td><input type="password" name="password" id="password" /></td> 
                                        </tr>
                                        <tr>
                                        	<td class="center" colspan="2"><input type="submit" name="submit" id="submit" value="Login"/></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </center> 
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="footer">
        	<img src="<?php //echo base_url('media/images/footer-content-image.png'); ?>" />
        </div>
    </div>
</body>
</html>