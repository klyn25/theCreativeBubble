<!-- Header and Nav -->
<div class="row">
            <div class="large-12 columns">
     			<?php $this->load->view('common/user_nav'); ?>
             <?php /*?> <nav class="top-bar" data-topbar>
                <ul class="title-area">
                   
                  <li class="name text-left">
                    <h3>
                      <a href="<?php echo base_url('gallery'); ?>">
                        &larr; Back To Gallery
                      </a>
                    </h3>
                  </li>
                  <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
                </ul>
             
                <section class="top-bar-section">
                   
                  <ul class="right">
                    <li class="divider"></li>
                    <?php if(isset($_SESSION['userID'])){ ?>
                    <li class="has-dropdown">
                      <a href="#">My Bubble</a>
                      <ul class="dropdown">
                        <li><label>My Options</label></li>
                        <li class="has-dropdown">
                          <a href="<?php echo base_url('myportal'); ?>" class="">My Portal</a>
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
                        <li><label>Section Name</label></li>
                        <li><a href="#">Dropdown Option</a></li>
                        <li><a href="#">Dropdown Option</a></li>
                        <li><a href="#">Dropdown Option</a></li>
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
               
            </div>
          </div>
          

  <div class="row">
    <div class="large-12 centered columns">
      <div id="test" class="panel">
      <?php foreach ($user->result() as $u) : ?>
        <img src="<?php echo base_url('assets/img/user_uploads/'.$u->userID.'/'.$u->imgName); ?>" /><br />
        <h3 class="text-center"><?php echo $u->imgTitle ; ?></h3>
        <?php endforeach ; ?> 
      </div>
    </div>
  </div>

<div id="disc" class="row">
 <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="large-3 medium-11 medium-centered small-11 small-centered large-uncentered columns">
      <div class="panel">
      <?php foreach ($user->result() as $u) : ?>
        <a href="#"><img src="<?php echo base_url('assets/img/avatars/'.$u->userAvatar); ?>" /></a>
        <h5>Artist: <?php echo $u->userName ; ?></h5>
       
      <?php endforeach ; ?>  
          <div class="section-container vertical-nav hide-for-small-only" data-section data-options="deep_linking: false; one_up: true">
          
        </div>
 
      </div>
    </div>


<!-- Main Feed -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div id="comments" class="large-6 large-offset-1 medium-11 small-8 small-centered large-uncentered columns">
 	<?php /*?>SORT: <?php echo anchor('discussions/index/sort/age/' . (($dir == 'ASC') ? 'DESC' : 'ASC'),'Newest ' 
                . (($dir == 'ASC') ? 'DESC' : 'ASC'));?><?php */?>
      <!-- Feed Entry -->
      <?php foreach ($comments->result() as $result) : ?>
          <div class="row">
            <div id="avatar" class="large-3 centered columns avatar"><img src="<?php echo base_url('assets/img/avatars/'.$result->userAvatar); ?>" />
          </div>
            <div class="large-10 columns">
              <p><strong><?php echo $result->discTitle . '</strong> by  <span class="small">'
                        . $result->userName; ?></span><br /> <?php echo $result->discBody ; ?></p>
              <?php if(isset($_SESSION['userID']) && ($_SESSION['userName'] == $result->userName)){ ?>
                  <ul class="inline-list">
                    <?php /*?><li><span class="small"><?php echo anchor('discussions/edit/'.$result->discID,"Reply");?></span></li><?php */?>
                    <li><span class="small"><?php echo anchor('discussions/edit/'.$result->discID,"Edit");?></span></li>
                    <li><span class="small"><?php echo anchor('discussions/delete/'.$result->discID,"Delete");?></span></li>
                    <?php /*?><li><span class="small"><?php echo anchor('discussions/edit/'.$result->discID,"Flag");?></span></li><?php */?>
                  </ul>
		  
             <?php } ?>
              
 		<?php /*?><?php foreach($query->result() as $result);?>
          <h6>2 Comments</h6>
          <div class="row">
            <div class="large-2 columns small-3"><img src="http://placehold.it/50x50&text=[img]" /></div>
            <div class="large-10 columns"><span class="small"><?php echo $this->lang->line('comments_created_by') . $result->$userName; ?></span><p><?php echo $result->$comBody; ?></p></div>
          </div><?php */?>
        
        </div>
      </div>
      <hr />
      <!-- End Feed Entry -->
  <?php endforeach ; ?>
      

      
 
    
	<!-- Form - begin form section -->
<?php if(isset($_SESSION['userID'])){ ?>
<?php echo form_open('discussions/create','role="form"') ; ?>
  
    <div class="large-10 columns">
       <input type="hidden" name="userID" class="form-control" id="userID"  value="<?php echo $_SESSION['userID']; ?>">
        <input type="hidden" name="imgID" class="form-control" id="imgID"  value="<?php echo $_SESSION['imgID']; ?>">	 
      <label for="discTitle">Title</label>
      <input type="text" name="discTitle" class="form-control" id="discTitle" placeholder="Title" value="<?php echo set_value('discTitle'); ?>">
    </div>    
    <div class="large-10 columns">
      <label for="discBody">Message:</label>
      <textarea class="form-control" rows="3" name="discBody" placeholder="Message" id="discBody"><?php echo set_value('discBody'); ?></textarea>
    </div>
    <div class="large-10 columns">
      <button type="submit" id="addComment" class="fancy radius button">Add Comment</button>
    </div>
<?php echo form_close() ; ?>
<?php } ?>

<?php /*?><?php echo form_open('discussions/create','role="form"') ; ?>
 
    <div class="large-10 columns">
      <button type="submit" class="fancy radius button">Add Comment</button>
    </div>
<?php echo form_close() ; ?><?php */?>

</div>



 
  </div>
 
<?php /*?><?php 
	echo '<pre>';
	print_r($user);
	print_r($this->session->all_userdata());
	echo '</pre>';
	?><?php */?>