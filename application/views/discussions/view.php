<!-- Header and Nav -->

<div class="row">
            <div class="large-12 columns">
     
              <nav class="top-bar" data-topbar>
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
                    <li class="has-dropdown">
                      <a href="#">Main Item 1</a>
                      <ul class="dropdown">
                        <li><label>Section Name</label></li>
                        <li class="has-dropdown">
                          <a href="#" class="">Has Dropdown, Level 1</a>
                          <ul class="dropdown">
                            <li><a href="#">Dropdown Options</a></li>
                            <li><a href="#">Dropdown Options</a></li>
                            <li><a href="#">Level 2</a></li>
                            <li><a href="#">Subdropdown Option</a></li>
                            <li><a href="#">Subdropdown Option</a></li>
                            <li><a href="#">Subdropdown Option</a></li>
                          </ul>
                        </li>
                        <li><a href="#">Dropdown Option</a></li>
                        <li><a href="#">Dropdown Option</a></li>
                        <li class="divider"></li>
                        <li><label>Section Name</label></li>
                        <li><a href="#">Dropdown Option</a></li>
                        <li><a href="#">Dropdown Option</a></li>
                        <li><a href="#">Dropdown Option</a></li>
                        <li class="divider"></li>
                        <li><a href="#">See all →</a></li>
                      </ul>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#">Main Item 2</a></li>
                    <li class="divider"></li>
                    <li class="has-dropdown">
                      <a href="#">Main Item 3</a>
                      <ul class="dropdown">
                        <li><a href="#">Dropdown Option</a></li>
                        <li><a href="#">Dropdown Option</a></li>
                        <li><a href="#">Dropdown Option</a></li>
                        <li class="divider"></li>
                        <li><a href="#">See all →</a></li>
                      </ul>
                    </li>
                  </ul>
                </section>
              </nav>
               
            </div>
          </div>
          

  <div class="row">
    <div class="large-12 centered columns">
      <div id="test" class="panel">
        <img src="<?php echo base_url("assets/img/user_uploads/1/wookiee.jpg"); ?>" /><br />
        <h3 class="text-center">Warhol Wookiee</h3>
        
      </div>
    </div>
  </div>

<div id="disc" class="row">
 <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="large-3 medium-11 medium-centered small-11 small-centered large-uncentered columns">
      <div class="panel">
        <a href="#"><img src="<?php echo base_url("assets/img/user_uploads/1/avatar.jpg"); ?>" /></a>
        <h5>Artist: <a href="#">T-Bone</a></h5>
        
          <div class="section-container vertical-nav hide-for-small-only" data-section data-options="deep_linking: false; one_up: true">
          <section class="section">
            <h6 class="title"><a href="#">Section 1</a></h6>
          </section>
          <section class="section">
            <h6 class="title"><a href="#">Section 2</a></h6>
          </section>
          <section class="section">
            <h6 class="title"><a href="#">Section 3</a></h6>
          </section>
          <section class="section">
            <h6 class="title"><a href="#">Section 4</a></h6>
          </section>
          <section class="section">
            <h6 class="title"><a href="#">Section 5</a></h6>
          </section>
          <section class="section">
            <h6 class="title"><a href="#">Section 6</a></h6>
          </section>
        </div>
 
      </div>
    </div>

</div>
<div>
<!-- Main Feed -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div id="comments" class="large-6 large-offset-1 medium-11 small-8 small-centered large-uncentered columns">
    <?php /*?>SORT: <?php echo anchor('discussions/index/sort/age/' . (($dir == 'ASC') ? 'DESC' : 'ASC'),'Newest ' 
                . (($dir == 'ASC') ? 'DESC' : 'ASC'));?><?php */?>
    <!-- Feed Entry -->
    <?php foreach ($comments->result() as $result) : ?>
    <div class="row">
        <div id="avatar" class="large-3 centered columns avatar"><img src="<?php echo base_url("assets/img/user_uploads/1/avatar.jpg"); ?>" /> </div>
        <div class="large-10 columns">
        <p><strong><?php echo anchor('discussions/post/'.$result->discID,$result->discTitle) . '</strong> by  <span class="small">'
                        . $result->userName; ?></span><br />
            <?php echo $result->discBody ; ?></p>
        <ul class="inline-list">
            <li><span class="small"><?php echo anchor('discussions/edit/'.$result->discID,"Reply");?></span></li>
            <li><span class="small"><?php echo anchor('discussions/edit/'.$result->discID,"Edit");?></span></li>
            <li><span class="small"><?php echo anchor('discussions/delete/'.$result->discID,"Delete");?></span></li>
            <li><span class="small"><?php echo anchor('discussions/edit/'.$result->discID,"Flag");?></span></li>
          </ul>
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
    </div>
    <?php echo form_open('discussions/create','role="form"', 'id="country_search') ; ?>
    <div class="large-10 columns">
        <input type="hidden" name="userID" class="form-control" id="userID"  value="1">
        <input type="hidden" name="imgID" class="form-control" id="imgID"  value="1">
        <label for="discTitle">Title</label>
        <input type="text" name="discTitle" class="form-control" id="discTitle" placeholder="Title" value="<?php echo set_value('discTitle'); ?>">
      </div>
    <div class="large-10 columns">
        <label for="discBody">Message:</label>
        <textarea class="form-control" rows="3" name="discBody" placeholder="Message" id="discBody"><?php echo set_value('discBody'); ?></textarea>
      </div>
    <div class="large-10 columns">
        <button type="submit" id="display" class="fancy radius button">Add Comment</button>
      </div>
    <?php echo form_close() ; ?> </div>
    <?php /*?><form class="pull-right" id="country_search" method="post" action="<?php echo base_url("disc"); ?>">
        <input type="button" name="display" id="display" value="Count">
    </form> <?php */?>
</div>
<script src="<?php echo base_url("assets/js/ajax.js"); ?>"></script> 
<!-- not working because I changed the get_discussions FIX IT -->

<?php 
	echo '<pre>';
	print_r($this->session->all_userdata());
	echo '</pre>';
	?>
