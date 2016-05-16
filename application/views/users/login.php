<?php if (isset($login_fail)) : ?>
  <div class="alert alert-danger"><?php echo $this->lang->line('admin_login_error') ; ?></div>
<?php endif ; ?>
<div class="center row">
    <div class="large-6 large-centered columns">
      <div class="signup-panel">
        <p class="welcome"> Sign in to your bubble&hellip;</p>
        <?php echo form_open('signin/index', 'role="form"');?>
          
          <div class="row collapse">
            <div class="small-12  columns">
              <input type="text" placeholder="email" name="userEmail" id="userEmail">
            </div>
          </div>
          
          <div class="row collapse">
            
            <div class="small-12 columns ">
              <input type="password" placeholder="password" name="password" id="password">
            </div>
          </div>
         <?php echo form_submit('submit', 'Go to MY Bubble!');?>
        </form>
        <!--<a href="#" class="button ">Take me to MY bubble! </a>-->
         <p>Need a bubble? <a href="<?php echo base_url('register'); ?>">Create yours here &hellip;</a></p>
      </div>
    </div>
   </div>