<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>',' </b></div>');?>
    <?php 
    $vaccine_array = array(
    'BCG' => 'BCG',
    'ROTA'   => 'ROTA',
    'TT' => 'TT',
    'PCV' => 'PCV'

  );
  ?>
     
     <h1>Update Inventory</h1>
      <?php echo form_open('inventory/submit',array('class'=>'form-horizontal'));?>
      <div class="form-group">
        <?php
        echo form_label('Vaccine Name','Vaccine_name');
        echo form_error('Vaccine_name');
        echo form_dropdown('Vaccine_name',$vaccine_array , '', 'class="form-control"');        
        ?>
      </div>
     <div class="form-group">
        <?php
        echo form_label('Maximum Stock','max_stock');
        echo form_error('max_stock');
        echo form_input(['name' => 'max_stock', 'id' => 'inventory',  'value' => $max_stock ,'class' => 'form-control', 'placeholder' => 'Enter max stock']);
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Minimum Stock','min_stock');
        echo form_error('min_stock');
        echo form_input(['name' => 'min_stock', 'id' => 'inventory',  'value' => $min_stock ,'class' => 'form-control', 'placeholder' => 'Enter min stock']);
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Period Stock','period_stock');
        echo form_error('period_stock');
        echo form_input(['name' => 'period_stock', 'id' => 'inventory',  'value' => $period_stock ,'class' => 'form-control', 'placeholder' => 'Enter period stock']);
        ?>
      </div>
      <div class="col-lg-14 col-lg-offset-0.3">
      <button class="btn btn-lg btn-danger btn-block" name="submit" type="submit">Update Inventory</button>
      </div>
      <?php 
      if (isset($update_id)){
          echo form_hidden('update_id', $update_id);
      }
      echo form_close();?>
    </div>
  </div>
