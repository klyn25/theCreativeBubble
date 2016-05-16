<nav class="top-bar" data-topbar>
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
              </nav>