<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>',' </b></div>');

      $array = array();
      $x=0;
      foreach($maregion as $row ){
          //$new_arr[$v[0]] = end($v); 
          //$array[] = end($row->county_name);
      //    $array = [
      //    $row-> => $row->county_name
      //];
         $array[$row->region_name] = $row->region_name;
        // $array[$row->region_id] = $row->id;

}
 
    ?>
      <h1>Add New County</h1>
      <?php echo form_open('county/submit',array('class'=>'form-horizontal'));?>
      <div class="form-group">
        <?php
        echo form_label('County Name','county_name');
        echo form_error('county_name');
        echo form_input(['name' => 'county_name', 'id' => 'county',  'value' => $county_name ,'class' => 'form-control', 'placeholder' => 'Enter County Name']);
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('County Headquater','county_headquater');
        echo form_error('county_headquater');
        echo form_input(['name' => 'county_headquater', 'id' => 'county_headquater',  'value' => $county_headquater ,'class' => 'form-control', 'placeholder' => 'Enter County Headquater']);
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Region','region_id');
        echo form_error('region_id');
        //echo form_input(['name' => 'region_id', 'id' => 'region_id',  'value' => $region_id ,'class' => 'form-control', 'placeholder' => 'Enter Region']);
        echo form_dropdown('region_id',$array , $region_id, 'id="region_id" class="form-control"'); 
        ?>
      </div>
      <button class="btn btn-lg btn-danger btn-block" name="submit" type="submit">Create County</button>
      <?php 
      if (isset($update_id)){
          echo form_hidden('update_id', $update_id);
      }
      echo form_close();?>
    </div>
  </div>
