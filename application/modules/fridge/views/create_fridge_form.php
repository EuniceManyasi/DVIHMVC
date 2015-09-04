<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>',' </b></div>');
    ?>
	<?php 
		$type_array = array(
		'CFAC' => 'CFAC',
		'CFEG' => 'CFEG',
		'CFEK' => 'CFEK',
		'CRAK' => 'CRAK',
		'CREG' => 'CREG',
		'CREK' => 'CREK',
		'CRFR' => 'CRFR',
		'CRFR' => 'CRFR',
		'IFAC' => 'IFAC',
		'IFEK' => 'IFEK',
		'ILR'  => 'ILR',
		'SPR'  => 'SPR',
		'UREG' => 'UREG',
		'UREK' => 'UREK',
		'CRRF' => 'CRRF',
	);
	$gas_array = array(
		'R134A' => 'R134A',
		'NH3' 	=> 'NH3',
		'R134a' => 'R134a'
	);
	$zone_array = array(
		'Hot'  => 'Hot',
		'Temperature' => 'Temperature'
	);
	$power_array = array(
		'E'  => 'Electricity',
		'EG' => 'Electricity, Gas',
		'EK' => 'Electricity, Kerosene',
		'S'  => 'Solar'	
	);
	
	?>
	
      <h1>Add Fridge</h1>
      <?php echo form_open('fridge/submit',array('class'=>'form-horizontal'));?>
	   <div class="form-group">
        <?php
        echo form_label('Item Type','item_type');
        echo form_error('item_type');
		echo form_dropdown('item_type',$type_array , '', 'class="form-control"');
        ?>
      </div>	
	  
      <div class="form-group">
        <?php
        echo form_label('Library ID','library_id');
        echo form_error('library_id');
        echo form_input(['name' => 'library_id', 'id' => 'library_id',  'value' =>  $library_id,'class' => 'form-control']);
        ?>
      </div>	
	  
      <div class="form-group">
        <?php
        echo form_label('PQS','pqs');
        echo form_error('pqs');
		echo form_input(['name' => 'pqs', 'id' => 'pqs',  'value' =>  $pqs,'class' => 'form-control']);
        ?>
      </div>	
	  
      <div class="form-group">
        <?php
        echo form_label('Model Name','model_name');
        echo form_error('model_name');
        echo form_input(['name' => 'model_name', 'id' => 'model_name',  'value' =>  $model_name,'class' => 'form-control']);
        ?>
      </div>
	  
      <div class="form-group">
        <?php
		echo form_label('Manufacturer','manufacturer');
        echo form_error('manufacturer');
		echo form_input(['name' => 'manufacturer', 'id' => 'manufacturer',  'value' =>  $manufacturer,'class' => 'form-control']);
        ?>
      </div>
	  
      <div class="form-group">
        <?php	
		echo form_label('Power Source','power_source');
        echo form_error('power_source');
		echo form_dropdown('power_source',$power_array , $power_source, 'id="power_source" class="form-control"');
        ?>
      </div>
      
      <div class="form-group">
        <?php		
		echo form_label('Refrigerant Gas Type','refrigerant_gas_type');
        echo form_error('refrigerant_gas_type');	    
		echo form_dropdown('refrigerant_gas_type',$gas_array , $refrigerant_gas_type, 'id="refrigerant_gas_type" class="form-control"');
		?>
      </div>  
	  
 	  <div class="form-group">
        <?php
		echo form_label('Net Volume','positive_net_volume');
        echo form_error('positive_net_volume');
		echo form_input(['name' => 'positive_net_volume', 'id' => 'positive_net_volume',  'value' =>  $positive_net_volume, 'class' => 'form-control']);
		?>
      </div> 
	  
	  <div class="form-group">
        <?php
		echo form_label('Net Volume','negative_net_volume');
        echo form_error('negative_net_volume');
		echo form_input(['name' => 'negative_net_volume', 'id' => 'negative_net_volume',  'value' =>  $negative_net_volume, 'class' => 'form-control']);
		?>
      </div>
 	  <div class="form-group">
        <?php
		echo form_label('Gross Volume (4 degrees)','positive_gross_volume');
        echo form_error('positive_gross_volume');
		echo form_input(['name' => 'positive_gross_volume', 'id' => 'positive_gross_volume',  'value' =>  $positive_gross_volume, 'class' => 'form-control']);
		?>
      </div> 
	  
	  <div class="form-group">
        <?php
		echo form_label('Net Volume','negative_gross_volume');
        echo form_error('negative_net_volume');
		echo form_input(['name' => 'negative_gross_volume', 'id' => 'negative_gross_volume',  'value' =>  $negative_gross_volume, 'class' => 'form-control']);
		?>
      </div>
	  
 	  <div class="form-group">
        <?php
		echo form_label('Freezing Capacity','freezing_capacity');
        echo form_error('freezing_capacity');
		echo form_input(['name' => 'freezing_capacity', 'id' => 'freezing_capacity',  'value' =>  $freezing_capacity, 'class' => 'form-control']);
        ?>
      </div>
	  
      <div class="form-group">
        <?php		
		echo form_label('Price','price');
        echo form_error('price');	    
        echo form_input(['name' => 'price', 'id' => 'price',  'value' =>  $price, 'class' => 'form-control']);
        ?>
      </div>      
 	  
      <div class="form-group">
        <?php		
		echo form_label('Electricity to run','electricity');
        echo form_error('electricity');	    
		echo form_input(['name' => 'electricity', 'id' => 'electricity',  'value' =>  $electricity, 'class' => 'form-control']);
        ?>
      </div>       
	  
	  <div class="form-group">
        <?php		
		echo form_label('Gas to run','gas');
        echo form_error('gas');	    
		echo form_input(['name' => 'gas', 'id' => 'gas',  'value' =>  $gas, 'class' => 'form-control']);
	   ?>	  
		</div> 
		
		<div class="form-group">
        <?php		
		echo form_label('Kerosene to run','kerosene');
        echo form_error('kerosene');	    
		echo form_input(['name' => 'kerosene', 'id' => 'kerosene',  'value' =>  $kerosene, 'class' => 'form-control']);
		?>
		</div>  		
		
		<div class="form-group">
        <?php		
		echo form_label('Zone','zone');
        echo form_error('zone');	    
		echo form_dropdown('zone',$zone_array , 'Hot', 'class="form-control"');
        ?>
      </div>      
      
	  <?php echo form_submit('submit', 'Add Fridge', 'class="btn btn-primary btn-lg btn-block"');?>
      <?php       
	  if (isset($update_id)){
          echo form_hidden('update_id', $update_id);
      }
      echo form_close();?>
    </div>
  </div>
