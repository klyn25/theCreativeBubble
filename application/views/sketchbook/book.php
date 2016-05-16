
		
		
        <link rel="stylesheet" href="<?php echo base_url("assets/css/jquery.jscrollpane.custom.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bookblock.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css"); ?>" />
        <script src="<?php echo base_url('assets/js/book/modernizr.custom.79639.js'); ?>"></script>
		 <div class="row">
            <div class="large-12 columns">
     			<?php /*?><?php $this->load->view('common/user_nav'); ?><?php */?>
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
          
		<div id="container" class="container">	

			<div class="menu-panel">
				<h3>Table of Contents</h3>
				<ul id="menu-toc" class="menu-toc">
					<li class="menu-toc-current"><a href="#artist">Artist Sketchbook</a></li>
                    <?php $count = 1; ?>
                	<?php foreach ($query->result() as $u) : ?>
					<li><a href="#item<?php echo $count;?>">Page <?php echo $count; ; ?></a></li>
                    <?php $count++;?>
                    <?php endforeach ; ?>
				</ul>
				
			</div>
			<?php /*?><?php foreach ($query->result() as $u) : ?>
	        <div title="<?php echo $u->imgTitle ; ?>">
	            <h3><?php echo $u->imgTitle ; ?></h3>
                <div ><img src="<?php echo base_url('assets/img/user_uploads/'.$u->userID.'/'.$u->imgName); ?>" /></div>
            <?php endforeach ; ?><?php */?>
			<div class="bb-custom-wrapper">
				<div id="bb-bookblock" class="bb-bookblock">
                
                <div class="bb-item" id="artist">
						<div class="content">
							<div class="scroller">
								<h2>Sketchbook</h2>
							</div>
						</div>
					</div>
                
                <?php $count = 1; ?>
                <?php foreach ($query->result() as $u) : ?>
					<div class="bb-item" id="item<?php echo $count;?>">
						<div class="content">
							<div class="scroller">
								<?php /*?><h2><?php echo $u->imgTitle ; ?></h2><?php */?>
								<?php echo '<img src="data:image/png;base64,'. base64_encode($u->sbSave).'"/>' ;?>
							</div>
						</div>
					</div>
                    <?php $count++;?>
                    <?php endforeach ; ?>
                  
				</div>
				
				<nav>
					<span id="bb-nav-prev">&larr;</span>
					<span id="bb-nav-next">&rarr;</span>
				</nav>

				<span id="tblcontents" class="menu-button">Table of Contents</span>

			</div>
				
		</div><!-- /container -->
         <script src="<?php echo base_url('assets/js/book/jquery.mousewheel.js'); ?>"></script>
         <script src="<?php echo base_url('assets/js/book/jquery.jscrollpane.min.js'); ?>"></script>
         <script src="<?php echo base_url('assets/js/book/jquerypp.custom.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/book/jquery.bookblock.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/book/page.js'); ?>"></script>
		
		<script>
			$(function() {

				Page.init();

			});
		</script>
       
	</body>
</html>

    
	