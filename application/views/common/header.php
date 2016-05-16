<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once BASEPATH . '/helpers/url_helper.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
    <?php /*?><link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/slick/slick.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/foundation.css"); ?>" /><?php */?>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <?php /*?><script src="<?php echo base_url('assets/js/turn/scissor.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/turn/turn.html4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/turn/turn.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/turn/zoom.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/turn/hash.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/turn/jquery-ui-1.8.20.custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/turn/jquery.mousewheel.min.js'); ?>"></script><?php */?>
    <!--<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>-->
    
	<link rel='stylesheet prefetch' href='http://cdn.jsdelivr.net/jquery.slick/1.3.7/slick.css'>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/slick/slick-theme.css"); ?>" />
    <link rel='stylesheet prefetch' href='http://cdn.foundation5.zurb.com/foundation.css'>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/double-page.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/styles.css"); ?>" />
	<title>The Creative Bubble</title>

	
</head>
<body>
	<div>
	<nav class="menu" data-topbar role="navigation" >
    
  <h1 class="name small-text-center medium-text-center"><i class="fi-widget"></i>The Creative Bubble</a></h1>
  <ul class="inline-list">
    <li><a href="<?php echo base_url(''); ?>">Home</a></li>
    <li><a href="<?php echo base_url('gallery'); ?>">Gallery</a></li>
    <?php /*?><li><a href="<?php echo base_url('prompts'); ?>">Prompts</a></li><?php */?>
    <li><a href="<?php echo base_url('sketchbook'); ?>">Sketch</a></li>
  </ul>
  <ul class="inline-list hide-for-small hide-for-medium account-action">
 <?php if(!isset($_SESSION['userID'])){
	 		 echo '<li><a href="'. base_url('login').'">Login</a></li>';
    		 echo '<li class=""><a class="signup" href="'.base_url('signup').'">Signup</a></li>';
 		}else{
  
  			echo '<li><a href="'.base_url('logout').'">Logout</a></li>';
   
	
		}?>
  </ul>
  <a class="account hide-for-medium-up" href="#" data-reveal-id="myModal"><i class="fi-unlock"></i></a>
</nav>
</div>
<!-- modal content -->

<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="login or sign up" aria-hidden="true" role="dialog">
  <div class="row">
    <div class="large-6 columns auth-plain">
      <div class="signup-panel left-solid">
        <p class="welcome">Registered Users</p>
        <form>
          <div class="row collapse">
            <div class="small-2  columns">
              <span class="prefix"><i class="fi-torso-female"></i></span>
            </div>
            <div class="small-10  columns">
              <input type="text" placeholder="username">
            </div>
          </div>
          <div class="row collapse">
            <div class="small-2 columns ">
              <span class="prefix"><i class="fi-lock"></i></span>
            </div>
            <div class="small-10 columns ">
              <input type="text" placeholder="password">
            </div>
          </div>
        </form>
        <a href="#" class="button ">Log In </a>
      </div>
    </div>

    <div class="large-6 columns auth-plain">
    	<div class="signup-panel newusers">
    		<p class="welcome"> New User?</p>
    		<p>By creating an account with us, you will be able to move through the checkout process faster, view and track your orders, and more.</p><br>
    		<a href="#" class="button ">Sign Up</a></br>
    	</div>
    </div>

   </div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div class="row">