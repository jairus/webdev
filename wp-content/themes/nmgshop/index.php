<?php get_header(); ?>
<?php
if(is_home()){
	include_once(dirname(__FILE__)."/ext/home.php");
}
elseif(is_single())
{
	include_once(dirname(__FILE__)."/ext/single.php");
}
elseif(is_search()){
	include_once(dirname(__FILE__)."search.php");	
}
else{
	include_once(dirname(__FILE__)."/ext/page.php");
}
?>
<?php get_footer(); ?>