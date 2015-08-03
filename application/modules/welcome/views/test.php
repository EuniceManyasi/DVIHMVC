  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Create File</h1>
      <?php echo form_open_multipart('uploads/do_upload',array('class'=>'form-horizontal'));?>
        <div class="form-group">
        <?php
        echo form_label('File Name','file_name');
        echo form_error('file_name');
        echo form_input('file_name',set_value('file_name'),'class="form-control"');
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Choose File','select_file');
        echo form_error('userfile');
        echo form_upload('userfile',set_value('userfile'),'class="form-control"');
        ?>
      </div>
     <!-- <div class="form-group">-->
        <?php
       /* echo form_label('First name','first_name');
        echo form_error('first_name');
        echo form_input('first_name',set_value('first_name'),'class="form-control"');*/
        ?>
     <!-- </div>-->
     
      <?php echo form_submit('submit', 'Upload File', 'class="btn btn-primary btn-lg btn-block"');?>
      <?php echo form_close();?>
    </div>
  </div>