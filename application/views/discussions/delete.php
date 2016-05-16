
    
	<!-- Form - begin form section -->

<p>are you sure?</p>

<?php echo form_open('discussions/delete','role="form"') ; ?>
 	
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