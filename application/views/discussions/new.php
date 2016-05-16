<div class="row">

<?php echo form_open('discussions/create','role="form"') ; ?>
  
    <div class="large-10 columns">
       <input type="hidden" name="userID" class="form-control" id="userID"  value="<?php echo set_value('userID'); ?>">
        <input type="hidden" name="imgID" class="form-control" id="imgID"  value="<?php echo set_value('imgID'); ?>">	 
      <label for="discTitle">Title</label>
      <input type="text" name="discTitle" class="form-control" id="discTitle" placeholder="Title" value="<?php echo set_value('discTitle'); ?>">
    </div>    
    <div class="large-10 columns">
      <label for="discBody">Message:</label>
      <textarea class="form-control" rows="3" name="discBody" placeholder="Message" id="discBody"><?php echo set_value('discBody'); ?></textarea>
    </div>
    <div class="large-10 columns">
      <button type="submit" class="fancy radius button">Add Comment</button>
    </div>
<?php echo form_close() ; ?>

</div>

