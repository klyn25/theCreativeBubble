<div class="center row">
    <div class="large-6 large-centered columns">
      <div class="signup-panel">
        <p class="welcome"> So you want to create your own bubble&hellip;</p>
        <?php echo form_open('register', 'role="form"');?>
          <div class="row collapse">
            <div class="small-5 columns">
              <input type="text" placeholder="first name" name="userFirst" id="userFirst" required autofocus="autofocus">
              </div>
            <div class="small-6 columns">
              <input type="text" placeholder="last name" name="userLast" id="userLast" required>
            </div>
          </div>
          <div class="row collapse">
            <div class="small-12  columns">
              <input type="text" placeholder="username" name="userName" id="userName" required>
            </div>
          </div>
          <div class="row collapse">
            
            <div class="small-12  columns">
              <input type="text" placeholder="email" name="userEmail" id="userEmail" required>
            </div>
          </div>
          <div class="row collapse">
            
            <div class="small-12 columns ">
              <input type="password" placeholder="password" name="password" id="password" required="required">
            </div>
          </div>
         <div class="row collapse">
            <div class="small-12 columns ">
              <input type="password" placeholder="confirm password" name="password2" id="password2" required="required">
            </div>
          </div>
          <?php echo form_submit('submit', 'Create MY Bubble!');?>
        </form>
        
         <p>Already have a bubble? <a href="<?php echo base_url('login'); ?>">Login here&hellip;</a></p>
      </div>
    </div>
   </div>