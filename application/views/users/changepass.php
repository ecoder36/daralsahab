<?php echo form_open('users/changepass'); ?>
  <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>">
  <fieldset>
  <legend>تغيير الباسوورد</legend>
   
    <div class="form-group">
       <div class="col-lg-8">
        <input type="password" class="form-control" name="oldpassword" id="inputPassword" placeholder="Password">
      </div>
      <label for="inputPassword" class="col-lg-2 control-label">كلمة المرور القديمة</label>
    </div><br><br><br>  
     <div class="form-group">
      <div class="col-lg-8">
        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
      </div>
      <label for="inputPassword" class="col-lg-2 control-label">كلمة المرور الجديدة</label>
    </div> <br><br><br>  
    <div class="form-group">
      <div class="col-lg-8">
        <input type="password" class="form-control" name="password2" id="inputPassword" placeholder="Password">
      </div>
      <label for="inputPassword" class="col-lg-2 control-label">تأكيد كلمة المرور الجديدة</label>
    </div> <br><br><br>  
    <div class="form-group">
      <div class="col-lg-6 col-lg-offset-2">
        <button type="reset" class="btn btn-default">إلغاء</button>
        <button type="submit" class="btn btn-primary">تغيير كلمة المرور</button>
      </div>
    </div>
  </fieldset>
<?php echo form_close(); ?>
   