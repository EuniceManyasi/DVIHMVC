<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>',' </b></div>');?>
      <h1>Add New Region</h1>
      <?php echo form_open('region/submit',array('class'=>'form-horizontal'));?>
      <div class="form-group">
        <?php
        echo form_label('Region Name','region_name');
        echo form_error('region_name');
        echo form_input(['name' => 'region_name', 'id' => 'region',  'value' => $region_name ,'class' => 'form-control', 'placeholder' => 'Enter Region Name']);
        ?>
      </div>
     <div class="form-group">
        <?php
        echo form_label('Region Headquater','region_headquater');
        echo form_error('region_headquater');
        echo form_input(['name' => 'region_headquater', 'id' => 'region',  'value' => $region_headquater ,'class' => 'form-control', 'placeholder' => 'Enter region Name']);
        ?>
      </div>
      <div >
      <button class="btn btn-lg btn-danger btn-block" name="submit" type="submit">Create Region</button>
      </div>
      <?php 
      if (isset($update_id)){
          echo form_hidden('update_id', $update_id);
      }
      echo form_close();?>
    </div>
  </div>
