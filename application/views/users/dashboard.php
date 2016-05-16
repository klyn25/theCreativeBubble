
<div class="row">
<?php foreach ($user->result() as $result) : ?>
  <div id="user-port-bkd" style="background:url(<?php echo base_url('assets/img/'.$result->userBkrnd) ?>) no-repeat center center; background-size: cover; height: 80vh;" class="large-12 columns">
    <div id="user-portal" class=" large-12 columns">
      <div id="avatar" class="large-2 centered columns">
      
        <p><img src="<?php echo base_url('assets/img/avatars/'.$result->userAvatar); ?>" /></p>
        
       <?php endforeach ; ?>
      </div>
      <div class="large-10 centered columns">
      	<h2> Apprentice</h2>
       
      </div>
    </div>
  </div>
  <div class="row">
    <div class="small-12 columns"> </div>
  </div>
  <section id="user-section" class="secondary-tabs">
  <div class="row">
    <div class="small-12 columns">
      <ul class="tabs" data-tab>
        <li class="tab-title active"><a href="#panel-1"><i class="fi-wrench"></i>Notifications</a></li>
        <li class="tab-title"><a href="#panel-2"><i class="fi-widget"></i>Settings</a></li>
        <li class="tab-title"><a href="#panel-3"><i class="fi-video"></i>Awards</a></li>
        <li class="tab-title"><a href="#panel-4"><i class="fi-photo"></i>Images</a></li>
        <li class="tab-title"><a href="#panel-5"><i class="fi-video"></i>Badges</a></li>
      </ul>
      <div class="tabs-content">
        <div class="content active" id="panel-1">
          <div class="row">
            <div class="small-12 columns"> 
              <!-- Main Feed --> 
              <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
              <div class="large-10 large-offset-1 medium-11 small-8 small-centered large-uncentered columns">
                <?php /*?>SORT: <?php echo anchor('discussions/index/sort/age/' . (($dir == 'ASC') ? 'DESC' : 'ASC'),'Newest ' 
                . (($dir == 'ASC') ? 'DESC' : 'ASC'));?><?php */?>
                <!-- Feed Entry -->
                <?php foreach ($query->result() as $notification) : ?>
                <div data-alert class="row alert-box info">
                  <div id="avatar" class="large-1 medium-1 small-1 centered columns avatar"><img src="<?php echo base_url('assets/img/avatars/'.$notification->userAvatar.''); ?>" /> </div>
                  <div class="large-10 medium-10 small-10 columns"><h3><?php echo $notification->userName ;?><span class="tagline"> &hellip;<?php echo $notification->messBody ;?> artwork: &emsp;</span><?php echo $notification->imgTitle ;?></h3><a href="#" class="close">&CircleTimes;</a>
                   
                  </div>
                </div>
                <!-- End Feed Entry -->
                <?php endforeach ; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="content" id="panel-2">
          <div class="row large-12 medium-12 text-center">
          <h3>Change my dashboard image</h3>
          <hr>
          <?php echo form_open('userPortal/save', 'role="form"');?>
            <div class="large-3 medium-3 columns text-center">
              <div class="switch round">
                <input id="on-off1" type="radio" name="user_background" value="bubble_splash.png" checked>
                <label for="on-off1"> <span class="switch-on">ON</span> <span class="switch-off">OFF</span> </label>
              </div>
              <p> <img id="i1" class="th" src="<?php echo base_url('assets/img/bubble_splash.png'); ?>"></p>
            </div>
            <div class="large-3 medium-3 columns text-center">
              <div class="switch round">
                <input id="on-off3" type="radio" name="user_background" value="bubble_splash3.jpg">
                <label for="on-off3"> <span class="switch-on">ON</span> <span class="switch-off">OFF</span> </label>
              </div>
              <p> <img id="i1" class="th" src="<?php echo base_url('assets/img/bubble_splash3.jpg'); ?>"></p>
            </div>
            <div class="large-3 medium-3 columns text-center">
              <div class="switch round">
                <input id="on-off4" type="radio" name="user_background" value="bubble_splash4.jpg">
                <label for="on-off4"> <span class="switch-on">ON</span> <span class="switch-off">OFF</span> </label>
              </div>
              <p> <img id="i1" class="th" src="<?php echo base_url('assets/img/bubble_splash4.jpg'); ?>"></p>
            </div>
            <div class="large-3 medium-3 columns text-center">
              <div class="switch round">
                <input id="on-off2" type="radio" name="user_background" value="bubble_splash2.jpg">
                <label for="on-off2"> <span class="switch-on">ON</span> <span class="switch-off">OFF</span> </label>
              </div>
              <p> <img id="i1" class="th" src="<?php echo base_url('assets/img/bubble_splash2.jpg'); ?>"></p>
            </div>
            </div>
            <hr>
          
          <div class="row large-12 medium-12 text-center">
          <h3>Change my avatar</h3>
          <hr>
          
            <div class="large-3 medium-3 columns text-center">
              <div class="switch round">
                <input id="on-off-avatar1" type="radio" name="user_avatar" value="avatar.jpg" checked>
                <label for="on-off-avatar1"> <span class="switch-on">ON</span> <span class="switch-off">OFF</span> </label>
              </div>
              <p> <img id="i1" class="th" src="<?php echo base_url('assets/img/avatars/avatar.jpg'); ?>"></p>
            </div>
            <div class="large-3 medium-3 columns text-center">
              <div class="switch round">
                <input id="on-off-avatar2" type="radio" name="user_avatar" value="avatar2.jpg">
                <label for="on-off-avatar2"> <span class="switch-on">ON</span> <span class="switch-off">OFF</span> </label>
              </div>
              <p> <img id="i1" class="th" src="<?php echo base_url('assets/img/avatars/avatar2.jpg'); ?>"></p>
            </div>
            <div class="large-3 medium-3 columns text-center">
              <div class="switch round">
                <input id="on-off-avatar3" type="radio" name="user_avatar" value="avatar3.jpg">
                <label for="on-off-avatar3"> <span class="switch-on">ON</span> <span class="switch-off">OFF</span> </label>
              </div>
              <p> <img id="i1" class="th" src="<?php echo base_url('assets/img/avatars/avatar3.jpg'); ?>"></p>
            </div>
            <div class="large-3 medium-3 columns text-center">
              <div class="switch round">
                <input id="on-off-avatar4" type="radio" name="user_avatar" value="avatar4.jpg">
                <label for="on-off-avatar4"> <span class="switch-on">ON</span> <span class="switch-off">OFF</span> </label>
              </div>
              <p> <img id="i1" class="th" src="<?php echo base_url('assets/img/avatars/avatar4.jpg'); ?>"></p>
            </div>
            </div>
            
            <div class="row">
            <div class="medium-6 columns"> 
            <button type="submit2" class="fancy radius button">Save</button>
            </div>
            </div>
          </form>
         
        
         
        </div>
        
        
        <div class="content" id="panel-3">
          <div class="row">
            <div class="medium-6 large-9 large-centered medium-centered columns"> 
              <!-- Main Feed --> 
              
                   		<p>Welcome to The Creative Bubble! We are happy to have you as our Apprentice! Now get working and show us what you are made of!</p>
                        <p>Make sure to check back often, you never know what you may find.</p>
                  
                <hr />
                <!-- End Feed Entry -->
                
              
            </div>
          </div>
        </div>
        
        
        <div class="content" id="panel-4">
          <div class="row">
            <div class="small-11 large-11 large-centered columns">
            	<h3>Change my avatar</h3>
          		<hr>
              <ul class="small-block-grid-3 medium-block-grid-6 large-block-grid-8">
              <?php foreach ($images->result() as $image) : ?>
                <li><img class="th" src="<?php echo base_url('assets/img/user_uploads/'.$image->userID.'/'.$image->imgName); ?>"></li>
                <?php endforeach ; ?>
                <li><img class="th" src="http://placehold.it/150x150"></li>
                <li><img class="th" src="http://placehold.it/150x150"></li>
                <li><img class="th" src="http://placehold.it/150x150"></li>
                <li><img class="th" src="http://placehold.it/150x150"></li>
                <li><img class="th" src="http://placehold.it/150x150"></li>
                <li><img class="th" src="http://placehold.it/150x150"></li>
                <li><img class="th" src="http://placehold.it/150x150"></li>
               
                 
              </ul>
            </div>
            <div class="row">
            	<hr>
               </div>
            <div class="large-12 columns"> 
              <div class="large-10 large-centered columns">
             	 <?php echo form_open_multipart('images/do_upload');?>
                <input type="file" name="userfile" size="20" />
                <input type="text" name="imgTitle" size="50" placeholder="title" />
                <button type="submit" class="fancy radius button">Upload</button>
              
              </form>
              </div>
            </div>
          </div>
          </div>
          <div class="content" id="panel-5">
          <div class="row">
          <div class="small-8 large-8 large-centered columns">
          	<h2>Complete all goals in each section to aquire a new title.</h2>
          
          
            <hr />
              <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-6">
              
               <h3>Impressionist Goals:</h3>
         	   <hr />
              <?php /*?><?php foreach ($images->result() as $image) : ?><?php */?>
                <li><img class="th " src="<?php echo base_url('assets/img/bubbles/blue1.png'); ?>">
                <p class="small">Upload 1 Image</p></li>
                <?php /*?><?php endforeach ; ?><?php */?>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/blue2.png'); ?>">
                <p class="small">Upload 3 Images</p></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/blue3.png'); ?>">
                <p class="small">Upload 5 Images</p></li>
                <li><img class="th" src="<?php echo base_url('assets/img/bubbles/blue4.png'); ?>">
                <p class="small">Make 1 Comment</p></li>
                <li><img class="th" src="<?php echo base_url('assets/img/bubbles/blue5.png'); ?>">
                <p class="small">Make 3 Comments</p></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/blue6.png'); ?>">
                <p class="small">Make 5 Comments</p></li>
              </ul>
              <hr />
              <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-6">
               <h3>Expressionist Goals:</h3>
         	   <hr />
              <?php /*?><?php foreach ($images->result() as $image) : ?><?php */?>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/pink1.png'); ?>">
                <p class="small">Upload 12 Images</p></li>
                <?php /*?><?php endforeach ; ?><?php */?>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/pink2.png'); ?>">
                <p class="small">Upload 20 Images</p></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/pink3.png'); ?>">
                <p class="small">Upload 30 Images</p></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/pink4.png'); ?>">
                <p class="small">Make 12 Comments</p></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/pink5.png'); ?>">
                <p class="small">Make 20 Comments</p></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/pink6.png'); ?>">
                <p class="small">Make 30 Comments</p></li>
              </ul>
              <hr />
               <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-6">
               <h3>Cubist Goals:</h3>
         	   <hr />
              <?php /*?><?php foreach ($images->result() as $image) : ?><?php */?>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/green1.png'); ?>"></li>
                <?php /*?><?php endforeach ; ?><?php */?>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/green2.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/green3.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/green4.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/green5.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/green6.png'); ?>"></li>
              </ul>
              <hr />
               <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-6">
               <h3>Surrealist Goals:</h3>
         	   <hr />
              <?php /*?><?php foreach ($images->result() as $image) : ?><?php */?>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/orange1.png'); ?>"></li>
                <?php /*?><?php endforeach ; ?><?php */?>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/orange2.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/orange3.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/orange4.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/orange5.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/orange6.png'); ?>"></li>
              </ul>
              <hr />
               <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-6">
               <h3>Abstract Expressionist Goals:</h3>
         	   <hr />
              <?php /*?><?php foreach ($images->result() as $image) : ?><?php */?>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/yellow1.png'); ?>"></li>
                <?php /*?><?php endforeach ; ?><?php */?>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/yellow2.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/yellow3.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/yellow4.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/yellow5.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/yellow6.png'); ?>"></li>
              </ul>
              <hr />
              
               <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-6">
               <h3>Degenerate Goals:</h3>
         	   <hr />
              <?php /*?><?php foreach ($images->result() as $image) : ?><?php */?>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/purple1.png'); ?>"></li>
                <?php /*?><?php endforeach ; ?><?php */?>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/purple2.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/purple3.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/purple4.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/purple5.png'); ?>"></li>
                <li><img class="th locked" src="<?php echo base_url('assets/img/bubbles/purple6.png'); ?>"></li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>



<?php /*?><?php 
	echo '<pre>';
	print_r($query);
	echo '</pre>';
	?><?php */?>