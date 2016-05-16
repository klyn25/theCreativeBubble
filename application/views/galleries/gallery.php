  <div class="row gallery">
        <div class="large-12 columns">
     
         
          <div class="row">
            <div class="large-12 columns">
     			<?php $this->load->view('common/user_nav'); ?>
              <?php /*?><nav class="top-bar" data-topbar>
                <ul class="title-area">
                   
                  <li class="name">
                    <h3>
                      <a href="#">
                        Gallery
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
                          
                            <li><a href="<?php echo base_url('myportal#panel-1'); ?>">Notifications</a></li>
                            <li><a href="<?php echo base_url('myportal#panel-2'); ?>">Prefrences</a></li>
                            <li><a href="<?php echo base_url('myportal#panel-3'); ?>">Awards</a></li>
                            <li><a href="<?php echo base_url('myportal#panel-4'); ?>">Images</a></li>
                            <li><a href="<?php echo base_url('myportal#panel-5'); ?>">Badges</a></li>
                          </ul>
                        </li>
                        <li><a href="#">My Gallery</a></li>
                        <li><a href="<?php echo base_url('random'); ?>">Random Gallery</a></li>
                        <li class="divider"></li>
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
                    <li><a href="<?php echo base_url('random'); ?>">Random Gallery</a></li>
                    <li class="divider"></li>
				 <?php } ?>
                  </ul>
                </section>
              </nav><?php */?>
               
            </div>
          </div>
          
    	
      <div class="row large-9 large-centered medium-11 small-8 small-centered text-center slick-slider columns">
      <?php foreach ($query->result() as $result) : ?>
        <div class="large-3 small-12 columns">
          <img src="<?php echo base_url('assets/img/user_uploads/'.$result->userID.'/'.$result->imgName); ?>">
          <h5 class="h5-title-margin-top"><strong><?php echo anchor('galleries/view_image/'.$result->userID.'/'.$result->imgID,$result->imgTitle);?></strong></a></h5>
          <div class="title-blue-line-content"></div>
          <p>By: <?php echo anchor('galleries/view/'.$result->userID,$result->userName);?></p>
        </div>
     <?php endforeach ; ?>
        </div>
     
        
            
     
     			
                
             <!-- <div class="panel no-margin">
                <h3>Header</h3>
                <h5 class="subheader">Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Donec dignissim nibh fermentum odio ornare sagittis.
                </h5>
              </div>-->
     
     
         
     
         
     
     
         
     
          
                 

             
     
            </div><!-- end row -->
          </div><!-- end col -->
         
          
</div>
     
         
<?php /*?>   <?php 
	echo '<pre>';
	//print_r($query);
	print_r($query);
	echo '</pre>';
	?>  <?php */?>
         