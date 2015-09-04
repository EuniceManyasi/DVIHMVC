<?php
$form_attributes = array('id' => 'physical_stock_fm');
echo form_open('',$form_attributes);?>
<table class="table">
	<thead>
		<th style="width:12%;" class="small" align="center">Vaccine Name</th>
							<th style="width:9%;" class="small">Batch Number</th>
							<th style="width:12%;" class="small">Expiry Date</th>
							<th style="width:12%;" class="small">Available Quantity</th>
							<th style="width:12%;" class="small"> Physical Count</th>
							<th style="width:12%;" class="small">Reason</th>
							
							
	</thead>
	<tbody>
		
             	<tr>
             		
             		<td><?php $data=array('name' => '','id'=> '' ,'class'=>'col-xs-12'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=> '','class'=>'col-xs-12' ); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=> '','class'=>'col-xs-12'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=> '','class'=>'col-xs-12' ); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=>'' ,'class'=>'col-xs-12'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=>'' ,'class'=>'col-xs-12'); echo form_input($data);?></td>
               
                
             	</tr>
             	
	</tbody>
</table>

<?php echo form_close();?>