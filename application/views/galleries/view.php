<!-- *********************  user Nav   ******************** -->

<div class="row gallery">
  <div class="large-12 columns">
  <?php $this->load->view('common/user_nav'); ?>
    <?php /*?><nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name text-left">
          <h3> <a href="<?php echo base_url('gallery'); ?>"> &larr; Back To Gallery </a> </h3>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
      </ul>
      <section class="top-bar-section">
        <ul class="right">
          <li class="divider"></li>
          <?php if(isset($_SESSION['userID'])){ ?>
          <li class="has-dropdown"> <a href="#">My Bubble</a>
            <ul class="dropdown">
              <li>
                <label>My Options</label>
              </li>
              <li class="has-dropdown"> <a href="<?php echo base_url('myportal'); ?>" class="">My Portal</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('myportal'); ?>">Notifications</a></li>
                  <li><a href="<?php echo base_url('myportal'); ?>">Prefrences</a></li>
                  <li><a href="<?php echo base_url('myportal'); ?>">Awards</a></li>
                  <li><a href="<?php echo base_url('myportal'); ?>">Images</a></li>
                  <li><a href="<?php echo base_url('myportal'); ?>">Badges</a></li>
                </ul>
              </li>
              <li><a href="#">My Gallery</a></li>
              <li><a href="#">Random Gallery</a></li>
              <li class="divider"></li>
              <li>
                <li><label>Sketchbook</label></li>
                        <li><a href="<?php echo base_url('sketchbook'); ?>">Sketch</a></li>
                        <li><a href="<?php echo base_url('sketchbook/gallery'); ?>">Sketchbook Gallery</a></li>
                        <li><a href="<?php echo base_url('book'); ?>">My Sketchbook</a></li>
              <li class="divider"></li>
              <li><a href="#">See all →</a></li>
            </ul>
          </li>
          <?php }else{ ?>
          <li class="divider"></li>
          <li><a href="#">Random Gallery</a></li>
          <li class="divider"></li>
          <?php } ?>
        </ul>
      </section>
    </nav><?php */?>
    
    
    
<!-- *****************    Content Below    ******************** -->



    <div class="row">
    <?php foreach ($artist->result() as $a) : ?>
      <div class="large-3 small-12 columns side"><div id="artist"> <img src="<?php echo base_url('assets/img/avatars/'.$a->userAvatar); ?>" ></div>
        <div class="hide-for-small panel">
          <h3><?php echo $a->userName;?> says: </h3>
          <p>I like making stuff. But so far all of my "art" was googled. I am not sorry that it's not original, but it gave me the inspiration I needed to be here on The Creative Bubble.<p>
        </div>
        <a href="#">
        <div class="panel callout radius">
          <h6>some&nbsp; items in <?php echo $a->userName;?>'s Gallery</h6>
        </div>
        </a> </div><?php endforeach ; ?>
     <?php /*?> <div class="row large-9 large-centered text-center columns">
      <?php foreach ($user->result() as $u) : ?>
      <div class="large-3 small-12 columns"> <img src="<?php echo base_url('assets/img/user_uploads/'.$u->userID.'/'.$u->imgName); ?>">
        <h5 class="h5-title-margin-top"><strong><?php echo anchor('galleries/view_image/'.$u->userID.'/'.$u->imgID,$u->imgTitle);?></strong></a></h5>
        <div class="title-blue-line-content"></div>
        <p>By: <?php echo anchor('galleries/view/'.$u->userID,$u->userName);?></p>
      </div>
      <?php endforeach ; ?>
    </div>
  </div>  <?php */?>
        
      <div class="large-9 columns">
        <div class="row user-gallery">
        	<?php /*?><?php foreach ($user->result() as $u) : ?>
          <div class="large-4 small-6 columns thumbs"> <img src="<?php echo base_url('assets/img/user_uploads/'.$u->userID.'/'.$u->imgName); ?>">
            <div class="panel">
              <h5><?php echo anchor('galleries/view_image/'.$u->userID.'/'.$u->imgID,$u->imgTitle);?></h5>
              <h6 class="subheader">By: <?php echo anchor('galleries/view/'.$u->userID,$u->userName);?></h6>
            </div>
          </div>
          
          <?php endforeach ; ?>
         
        </div><?php */?>
        <!-- photo -->
        	<?php foreach ($user->result() as $u) : ?>
			<div class="box_fluid col_fluid">
            
				<a href="#"><img src='<?php echo base_url('assets/img/user_uploads/'.$u->userID.'/'.$u->imgName); ?>' alt="desc" /></a>
                <div class="box_fluid_inner">
                    <h4><strong><?php echo anchor('galleries/view_image/'.$u->userID.'/'.$u->imgID,$u->imgTitle);?></strong></h4>
                    <p>By: <?php echo anchor('galleries/view/'.$u->userID,$u->userName);?></p>
                </div>
                <div class="box_comment"><p>Amazing Picture!</p></div>
                <div class="box_comment"><p>Love this!</p></div>
                <div class="box_comment"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit?</p></div>
			</div>
            <?php endforeach ; ?>
        </div>
      </div>
    </div>
   <?php /*?> <div class="row large-9 large-centered text-center columns">
      <?php foreach ($user->result() as $u) : ?>
      <div class="large-3 small-12 columns"> <img src="<?php echo base_url('assets/img/user_uploads/'.$u->userID.'/'.$u->imgName); ?>">
        <h5 class="h5-title-margin-top"><strong><?php echo anchor('galleries/view_image/'.$u->userID.'/'.$u->imgID,$u->imgTitle);?></strong></a></h5>
        <div class="title-blue-line-content"></div>
        <p>By: <?php echo anchor('galleries/view/'.$u->userID,$u->userName);?></p>
      </div>
      <?php endforeach ; ?>
    </div>
  </div><?php */?>
</div>
</div>
<?php /*?><?php 
	echo '<pre>';
	print_r($user);
	
	echo '</pre>';
	?><?php */?>
