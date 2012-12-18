<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mommies 247 | Site List</title>
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
                                    <td class="right"> Welcome <?=$username;?>!  <a href="<?php echo base_url(); ?>home/logout">Log out</a>	</td>
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
                        	<label>Search:</label>
                        	<input type="text" />
                            <b>[ </b><a id="new-site-link" href="home/add">Create New Site</a><b> ]</b>	    
                        </center> 
                    	<div class="list">
                        	<table>
                            	<tbody>
                                	<tr>
                                    	<th style="width: 20px"></th>
                                        <th>Site Name</th>
                                        <th>Subdomain</th>
                                        <th>Actions</th>
                                    </tr>
                                    <tr>
                                    	<td style="vertical-align:middle; text-align:center;">1</td>
                                        <td style="vertical-align:middle; text-align:center;">Shop 1</td>
                                        <td style="vertical-align:middle; text-align:center;">shop.zurpay.com</td>
                                        <td style="vertical-align:middle; text-align:center;"> 
                                        <b>[ </b><a href="#" id="login-text">Login</a><b> ]</b>
                                        <b>[ </b><a href="#" id="delete-text">Delete</a><b> ]</b>
                                        </td>
                                    </tr>
                                    <tr><td width="100%" colspan="5" style="text-align:center;">1 Item</td></tr>
                                </tbody>
                            </table>
                        </div>
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
