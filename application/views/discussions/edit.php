<div class="row">

<?php echo form_open('discussions/save','role="form"') ; ?>
  <?php foreach ($query->result() as $result) : ?>
    <div class="large-10 columns">
    <input type="hidden" name="discID" class="form-control" id="discID"  value="<?php echo set_value('discID', $result->discID); ?>">
      <label for="discTitle">Title</label>
      <input type="text" name="discTitle" class="form-control" id="discTitle"  value="<?php echo set_value('discTitle', $result->discTitle); ?>">
    </div>    
    <div class="large-10 columns">
      <label for="discBody">Message:</label>
      <textarea class="form-control" rows="3" name="discBody"  id="discBody"><?php echo set_value('discBody', $result->discBody); ?></textarea>
    </div>
    <div class="large-10 columns">
      <button type="submit" class="fancy radius button">Finished</button>
    </div>
     <?php endforeach ; ?>
<?php echo form_close() ; ?>

</div>

