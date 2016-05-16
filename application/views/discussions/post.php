<!-- Header and Nav -->
  <div class="row">
    <div class="large-12 columns">
      <div id="test" class="panel">
        <h1>Feed Template</h1>
      </div>
    </div>
  </div>

<div class="row">
 <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="large-3 columns ">
      <div class="panel">
        <a href="#"><img src="http://placehold.it/300x240&text=[img]" /></a>
        <h5><a href="#">Your Name</a></h5>
          <div class="section-container vertical-nav" data-section data-options="deep_linking: false; one_up: true">
          <section class="section">
            <h5 class="title"><a href="#">Section 1</a></h5>
          </section>
          <section class="section">
            <h5 class="title"><a href="#">Section 2</a></h5>
          </section>
          <section class="section">
            <h5 class="title"><a href="#">Section 3</a></h5>
          </section>
          <section class="section">
            <h5 class="title"><a href="#">Section 4</a></h5>
          </section>
          <section class="section">
            <h5 class="title"><a href="#">Section 5</a></h5>
          </section>
          <section class="section">
            <h5 class="title"><a href="#">Section 6</a></h5>
          </section>
        </div>
 
      </div>
    </div>


<!-- Main Feed -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="large-9 columns">
 	<?php /*?>SORT: <?php echo anchor('discussions/index/sort/age/' . (($dir == 'ASC') ? 'DESC' : 'ASC'),'Newest ' 
                . (($dir == 'ASC') ? 'DESC' : 'ASC'));?><?php */?>
      <!-- Feed Entry -->
      <?php foreach ($query->result() as $result) : ?>
          <div class="row">
            <div class="large-2 columns small-3"><img src="http://placehold.it/80x80&text=[img]" /></div>
            <div class="large-10 columns">
              <p><strong><?php echo anchor('discussions/view/'.$result->discID,$result->discTitle) . '</strong> by  <span class="small">'
                        . $this->lang->line('comments_created_by') . $result->userName; ?></span><br /> <?php echo $result->discBody ; ?></p>
             <!-- <ul class="inline-list">
                <li><a href="">Reply</a></li>
                <li><a href="">Share</a></li>
                <li><a href="">Report</a></li>
              </ul>-->
		  
             
              <br />
              
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



<?php echo form_open('discussions/create','role="form"') ; ?>
 
    <div class="large-10 columns">
      <button type="submit" class="fancy radius button">Add Comment</button>
    </div>
<?php echo form_close() ; ?>

</div>



 
  </div>
 
<?php 
	echo '<pre>';
	print_r($query);
	print_r($coms);
	echo '</pre>';
	?>