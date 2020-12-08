                <div class="card">
                      <div class="card-header">
                        <strong>Change Password </strong> 
                      </div>
                        <div class="card-body card-block">
                          <?= $this->session->flashdata('message');?>
                          <form action="<?php echo base_url().'admin/ganti_password_act' ?>" method="post">
                              <div class="row form-group">
                                  <div class="col col-md-2"><label for="text-input" class=" form-control-label">Password Lama</label></div>
                                    <div class="col-12 col-md-5">
                                    <input type="password" name="current_password" id="current_password" class="form-control"> </div>
                                    <?php echo form_error('current_password'); ?>
                              </div>
                               <div class="row form-group">
                                  <div class="col col-md-2"><label for="text-input" class=" form-control-label">Password Baru</label></div>
                                    <div class="col-12 col-md-5">
                                    <input type="text" name="new_password1" id="new_password1" class="form-control"> </div>
                                    <?php echo form_error('new_password1'); ?>
                              </div>
                               <div class="row form-group">
                                  <div class="col col-md-2"><label for="text-input" class=" form-control-label">Ulangi Password</label></div>
                                    <div class="col-12 col-md-5">
                                    <input type="password" name="new_password2" id="new_password2" class="form-control"> </div>
                                    <?php echo form_error('new_password2'); ?>
                              </div>
                              <div class="form-group">
    <button type="submit"  class="btn btn-info">Ganti Password</button>
  
  </div>
                          </form>
                           

                        </div>
                      
                        
