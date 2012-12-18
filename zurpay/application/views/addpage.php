<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mommies 247 | Create Site</title>
   <link type="text/css" rel="stylesheet" href="<?php echo base_url('media/css/style.css'); ?>" />
</head>

<body>
	<div id="mom247-container">
    	<table width="100%" cellspacing="0" cellpadding="0">
        	<tbody>
            	<tr>
                	<td id="header">
                    	<table width="100%" cellspacing="0" cellpadding="0">
                        	<tbody>
                            	<tr>
                                	<td><a href="<?php echo base_url();?>"><img src="<?php //echo base_url('media/images/header-logo.png');?>"/></a></td>
                                    <td class="right"> Welcome <?php echo $username;?>!  <a href="<?php echo base_url(); ?>home/logout">Log out</a>	</td>
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
                        <form method="post" id="site_form">
                        <table width="100%" cellpadding="10px">
                        <tbody>
                          <tr>
                          	<td class="bold font18">Create New Site</td>
                            <td></td>
                          </tr>
                          <tr>
                          	<td width="50%">
                                <table width="100%" cellpadding="2">
                                  <tr class="even">
                                    <td>*Shop URL</td>                            
                                    <td><input type="text" name="subdomain_name" size="40">.zurpay.com</td>
                                  </tr>
                                  <tr class="odd">
                                    <td>*Shop Title</td>
                                    <td><input type="text" name="site_title" size="40"></td>
                                  </tr>
                                  <tr class="even">
                                    <td>*Shop Manager Username:</td>
                                    <td>
                                    <input type="text" name="admin_username" size="35"/>
                                    </td>
                                  </tr>
                                  <tr class="odd">
                                    <td>*Shop Manager Password:</td>
                                    <td>
                                    <input type="password" name="admin_password" size="35"/>
                                    </td>
                                  </tr>
                                  <tr class="even">
                                    <td>*Shop Manager Email Address: </td>
                                    <td><input type="text" name="email_addr" size="35"></td>
                                  </tr>
                                </table>
                            </td>
                           </tr>
                          <tr>
                          	<td class="center" colspan="2">
                            	<table width="100%">
                                	<tbody>
                                    	<tr>
                                        	<td width="100%">
                                            	<input id="save_button" type="submit" value="Create" name="sub1">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                        </form>
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