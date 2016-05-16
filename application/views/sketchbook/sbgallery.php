		 <div class="row">
            <div class="large-12 columns">
     			<?php $this->load->view('common/user_nav'); ?>
             <?php /*?> <nav class="top-bar" data-topbar>
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
               
            </div>
          </div>
        
        <section>
        <div id="container" class="centered">
        <div class="row">
        		
                <?php foreach ($query->result() as $u) : ?>
			<div class='box photo col2'>
				<a href="#"><img src='<?php echo base_url('assets/img/user_uploads/'.$u->userID.'/'.$u->imgName); ?>' alt="<?php echo $u->imgTitle ; ?>" /></a>
                <h4 style="text-align:center"><strong><?php echo $u->imgTitle ; ?></strong></h4>
                <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vel ligula vel felis pretium gravida...</small></p>
                <p style="text-align:center" class="button small radius"><?php echo anchor('galleries/view/'.$u->userID,$u->userName);?></p>
			</div>
         <?php endforeach ; ?>
		 </div>
		 
		<?php /*?> <?php foreach ($query->result() as $result) : ?>
        <div class="large-3 small-12 columns">
          <img src="<?php echo base_url('assets/img/user_uploads/'.$result->userID.'/'.$result->imgName); ?>">
          <h5 class="h5-title-margin-top"><strong><?php echo anchor('galleries/view_image/'.$result->userID.'/'.$result->imgID,$result->imgTitle);?></strong></a></h5>
          <div class="title-blue-line-content"></div>
          <p>By: <?php echo anchor('galleries/view/'.$result->userID,$result->userName);?></p>
        </div>
     <?php endforeach ; ?>	<?php */?>


		</div> <!-- end Masonry container -->
		</div>
        </section>
        
		<!-- end section -->
        
		




		
		<!-- Masonry for galleries -->
		<script src="javascripts/masonry.js" type="text/javascript">
		</script>
		<script type="text/javascript">
//<![CDATA[
      $(function(){
        var $container = $('#container');
        $container.imagesLoaded( function(){
          $container.masonry({
            itemSelector : '.box',
                        isFitWidth: true,
                        isAnimated: true
          });
        });
      });
  //]]>
  


  
  </script>
  
<?php /*?>  <?php 
	echo '<pre>';
	print_r($query);
	
	echo '</pre>';
	?><?php */?>