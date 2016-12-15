<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Theme_Starter
 * @since Theme Starter 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
  		<div class="navbar-header">
    		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      	<span class="sr-only">Toggle navigation</span>
      	<span class="icon-bar"></span>
      	<span class="icon-bar"></span>
      	<span class="icon-bar"></span>
    		</button>
    		<a class="navbar-brand" href="#">Project name</a>
  		</div>
	  	<div id="navbar" class="collapse navbar-collapse">
	    	<ul class="nav navbar-nav">
	      	<li class="active"><a href="#">Home</a></li>
	      	<li><a href="#about">About</a></li>
	      	<li><a href="#contact">Contact</a></li>
	    	</ul>
	  	</div><!--/.nav-collapse -->
	</div>
</nav>


